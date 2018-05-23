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
error_reporting(0);

$document = & JFactory :: getDocument();

$cars=$this->cars;
$category=$this->category;
$navig=$this->navig;

$document->addStyleSheet(JURI::root().'templates/e4jeasyhiring/html/com_vikrentcar/vikrentcar_theme.css');
$document->addStyleSheet(JURI::root().'templates/jsn_yoyo_pro/html/com_vikrentcar/vikrentcar_theme.css');

$currencysymb = vikrentcar :: getCurrencySymb();

if(is_array($category)) {
	?>
    <div class="banner-car-category">
	<h2 class="vrcclistheadt falling-cat"><?php echo $category['name']; ?></h2>
    </div>
	<?php
	if(strlen($category['descr']) > 0) {
		?>
		<div class="vrccatdescr">
			<?php echo $category['descr']; ?>
		</div>
		<?php
	}
}else {
	echo vikrentcar :: getFullFrontTitle();
}

?>
<div class="vrclistcontainer">
<ul class="vrclist">
<?php
foreach($cars as $c) {
	//$carats = vikrentcar::getCarCarat($c['idcarat']);
	$carats = vikrentcar::getCarCaratOriz($c['idcarat']);
	?>
	<li>
		<div class="vrcthemelistcarcnt">
		<div class="vrcthemelistcardiv">
			<div class="vrcthemelistcardivimg">	
                <div class="mask"></div>
                <?php
                    if(strlen($c['moreimgs']) > 0) {
                    $moreimages = explode(';;', $c['moreimgs']);
                    $imagencool = $moreimages[0];    
                ?>    
                <img class="vrclistcarsimagen" src="<?php echo JURI::root(); ?>administrator/components/com_vikrentcar/resources/big_<?php echo $imagencool; ?>"/>               
                			<?php
			}
			?>
                		<div class="vrcthemeinfocar">
				<span class="vrclistcarname"><?php echo $c['name']; ?></span>
				<span class="vrclistcarcat"><?php echo vikrentcar::sayCategory($c['idcat']); ?></span>
			</div>
                <!--<div class="vrclistcardescr"><?php echo $c['info']; ?></div>-->
			
		</div>
			
			<div class="vrcthemelistcost">                
				<?php
				if($c['cost'] > 0) {
				?>
				<div class="vrclistdivcost">
					<span class="vrcliststartfrom"><?php echo JText::_('VRCLISTSFROM'); ?></span>
					<span class="car_cost"><?php echo $currencysymb; ?> <?php echo strlen($c['startfrom']) > 0 ? $c['startfrom'] : $c['cost']; ?></span>
				</div>
				<?php
				}
				?>
                <div class="vrclistcarcarats"><?php echo $carats; ?></div>
				<div class="vrclistsep"></div>
				<span class="vrclistgoon"><a class="booknow" href="<?php echo JRoute::_('index.php?option=com_vikrentcar&view=cardetails&carid='.$c['id']); ?>"><?php echo JText::_('VRCLISTPICK'); ?></a></span>
			</div>
	</div>
	</div>
	</li>
	<?php
}
?>
</ul>
</div>

<?php
//pagination
if(strlen($navig) > 0) {
	echo $navig;
}
?>