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
<div class="vrcmodcarscontainer container">
    <ul class="nada"></ul>
<ul class="vrcmodcars<?php echo $params->get('stylecar'); ?> row">
<?php
foreach($cars as $c) {
	?>
	<div class="col-sm-6 col-md-4 col-lg-3">
	<div class="vrcmodcarsboxdiv clearfix">	
        <?php
        if(strlen($c['moreimgs']) > 0) {
            $moreimages = explode(';;', $c['moreimgs']);
            $imgbuena = $moreimages[0];
            if(!empty($imgbuena)){
        ?>
        <img src="<?php echo JURI::root(); ?>administrator/components/com_vikrentcar/resources/<?php echo $imgbuena; ?>"/>}}
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
	</div>
	<?php
}
?>
</ul>
</div>