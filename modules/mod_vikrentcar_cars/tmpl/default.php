<?php
/**------------------------------------------------------------------------
 * mod_vikrentcar_cars - VikRentCar
 * ------------------------------------------------------------------------
 * author    Alessio Gaggii - Extensionsforjoomla.com
 * copyright Copyright (C) 2012 extensionsforjoomla.com. All Rights Reserved.
 * @license - http://www.gnu.org/licenses/gpl-2.0.html GNU/GPL
 * Websites: http://www.extensionsforjoomla.com
 * Technical Support:  tech@extensionsforjoomla.com
 * ------------------------------------------------------------------------
*/

// no direct access
defined('_JEXEC') or die;

$currencysymb = $params->get('currency');
$percent = round((100 / $params->get('numb')));
if ($params->get('stylecar') == 'horizontal') {
	$percentstyle = ' style="width: '. $percent .'%;"';
}else {
	$percentstyle = '';
}

?>
<div class="vrcmodcarscontainer">
<ul class="vrcmodcars<?php echo $params->get('stylecar'); ?>">
<?php
foreach($cars as $c) {
	?>
	<li <?php echo $percentstyle; ?>>
	<div class="vrcmodcarsboxdiv clearfix">	
		<?php
		if(!empty($c['img'])) {
		?>
		<img src="<?php echo JURI::root(); ?>administrator/components/com_vikrentcar/resources/<?php echo $c['img']; ?>" class="vrcmodcarsimg"/>
		<?php
		}
		?>
		<div class="vrcinf">
        <span class="vrcmodcarsname"><?php echo $c['name']; ?></span>
		<?php
		if($showcatname) {
		?>
		<span class="vrcmodcarscat"><?php echo $c['catname']; ?></span>
		<?php
		}
		?>
		<?php
		if($c['cost'] > 0) {
		?>
		<span class="vrcmodcarsstartfrom"><?php echo JText::_('VRCMODCARSTARTFROM'); ?></span>
		<span class="vrcmodcarscarcost"><?php echo $currencysymb; ?> <?php echo $c['cost']; ?></span>
		<?php
		}
		?>
        </div>
		<span class="vrcmodcarsview"><a href="<?php echo JRoute::_('index.php?option=com_vikrentcar&view=cardetails&carid='.$c['id'].'&Itemid='.$params->get('itemid')); ?>"><?php echo JText::_('VRCMODCARCONTINUE'); ?></a></span>
        
	</div>	
	</li>
	<?php
}
?>
</ul>
</div>