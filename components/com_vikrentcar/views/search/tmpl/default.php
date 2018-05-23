<?php
/**
 * Copyright (c) Extensionsforjoomla.com - E4J - Alessio <tech@extensionsforjoomla.com>
 * 
 * You should have received a copy of the License
 * along with this program.  If not, see <http://www.extensionsforjoomla.com/>.
 * 
 * For any bug, error please contact <tech@extensionsforjoomla.com>
 * We will try to fix it.
 * 
 * Extensionsforjoomla.com - All Rights Reserved
 * 
 */

defined('_JEXEC') OR die('Restricted Area');
error_reporting(VIKRENTCAR_ERROR_REPORTING);

$res=$this->res;
$days=$this->days;
$pickup=$this->pickup;
$release=$this->release;
$place=$this->place;
$navig=$this->navig;

$currencysymb = vikrentcar :: getCurrencySymb();
?>
		<p class="vrcarsfound"><?php echo JText::_('VRCARSFND'); ?>: <?php echo count($res); ?></p>
		<?php

$returnplace = JRequest :: getInt('returnplace', '', 'request');
$pitemid = JRequest :: getInt('Itemid', '', 'request');
foreach ($res as $k => $r) {
	$getcar = vikrentcar :: getCarInfo($k);
	$carats = vikrentcar :: getCarCaratOriz($getcar['idcarat']);
?>

			<div class="car_result">
			<form action="<?php echo JRoute::_('index.php?option=com_vikrentcar'); ?>" method="get">
			<input type="hidden" name="option" value="com_vikrentcar"/>
  			<input type="hidden" name="caropt" value="<?php echo $k; ?>"/>
  			<input type="hidden" name="days" value="<?php echo $days; ?>"/>
  			<input type="hidden" name="pickup" value="<?php echo $pickup; ?>"/>
  			<input type="hidden" name="release" value="<?php echo $release; ?>"/>
  			<input type="hidden" name="place" value="<?php echo $place; ?>"/>
  			<input type="hidden" name="returnplace" value="<?php echo $returnplace; ?>"/>
  			<input type="hidden" name="task" value="showprc"/>
			<table class="vrcstablecar"><tr>
			<?php
			$imgpath = file_exists(JPATH_ADMINISTRATOR.DS.'components'.DS.'com_vikrentcar'.DS.'resources'.DS.'vthumb_'.$getcar['img']) ? 'administrator/components/com_vikrentcar/resources/vthumb_'.$getcar['img'] : 'administrator/components/com_vikrentcar/resources/'.$getcar['img'];
			?>
			<td width="130px" valign="top" align="left"><img class="imgresult" alt="<?php echo $getcar['name']; ?>" src="<?php echo JURI::root().$imgpath; ?>"/></td>
			<td valign="top" align="left" width="80%">
			<table>
			<?php
			$vcategory = vikrentcar::sayCategory($getcar['idcat']);
			?>
			<tr><td class="vrcrowcname"><?php echo $vcategory; ?> <?php echo strlen($vcategory) > 0 ? ':' : ''; ?> <?php echo $getcar['name']; ?></td></tr>
			<tr><td class="vrcrowcdescr"><?php echo (strlen(strip_tags($getcar['info'])) > 200 ? substr(strip_tags($getcar['info']), 0, 200).' ...' : $getcar['info']); ?></td></tr>
			<tr><td class="vrcsrowprice"><div class="vrcsrowpricediv"><span class="vrcstartfrom"><?php echo JText::_('VRSTARTFROM'); ?></span> <span class="car_cost"><?php echo $currencysymb; ?> <?php echo vikrentcar::numberFormat(vikrentcar::sayCostPlusIva($r[0]['cost'], $r[0]['idprice'])); ?></span></div></td></tr>
			<tr><td><?php echo $carats; ?></td></tr>
			<tr><td><input type="submit" name="goon" value="<?php echo JText::_('VRPROSEGUI'); ?>" class="booknow"/></td></tr>
			</table>
			
			</td>
			</tr>
			</table>
			<?php

	if (!empty ($pitemid)) {
?>
				<input type="hidden" name="Itemid" value="<?php echo $pitemid; ?>"/>
				<?php

	}
?>
			</form>
			</div>
			<div class="car_separator"></div>
			<?php

}
?>
		<div class="goback">
			<a href="<?php echo JRoute::_('index.php?option=com_vikrentcar&view=vikrentcar&pickup='.$pickup.'&return='.$release); ?>"><?php echo JText::_('VRCHANGEDATES'); ?></a>
		</div>
<?php

//pagination
if(strlen($navig) > 0) {
	echo $navig;
}

?>