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

$rows = $this->rows;
$searchorder = $this->searchorder;
$islogged = $this->islogged;
$pagelinks = $this->pagelinks;

$nowdf = vikrentcar::getDateFormat();
if ($nowdf=="%d/%m/%Y") {
	$df='d/m/Y';
}elseif ($nowdf=="%m/%d/%Y") {
	$df='m/d/Y';
}else {
	$df='Y/m/d';
}

if ($searchorder == 1) {
	?>
    <div class="titlecover cover-buscareservas">
        <div class="titlecovername"><div class="titlestep"><img src="http://carflet.es/images/carflet/key.svg"></div><h3>Mi Reserva</h3><h4>Recuperar Reserva</h4></div>
    <div class="buscareservas">
        <div class="steps-head">Mi Reserva</div>
        <div class="vrcsearchconfnumb">
            <form action="<?php echo JRoute::_('index.php?option=com_vikrentcar&view=userorders'); ?>" method="post">
                <input type="hidden" name="option" value="com_vikrentcar"/>
                <input type="hidden" name="view" value="userorders"/>
                <input type="hidden" name="searchorder" value="1"/>
                <div class="vrcconfnumbinp">
                    <label for="vrcconfnum"><?php echo JText::_('VRCCONFNUMBERLBL'); ?></label>
                    <input type="text" name="confirmnum" value="" size="25" id="vrcconfnum"/>
                </div>
                                        <div class="vrcconfnumbsubm">
                    <input type="submit" name="searchconfnum" value="<?php echo JText::_('VRCCONFNUMBERSEARCHBTN'); ?>"/>
                </div>
            </form>
        </div>

    </div>
        
	<?php
}

if ($islogged == 1) {
	?>
	<h3><?php echo JText::_('VRCYOURRESERVATIONS'); ?></h3>
	<?php
}else {
	?>
	<p><a href="<?php echo JRoute::_('index.php?option=com_vikrentcar&view=loginregister'); ?>"><?php echo JText::_('VRCRESERVATIONSLOGIN'); ?></a></p>
	<?php
}

if (is_array($rows) && count($rows) > 0) {
	?>
	<table class="vrcuserorderstable">
		<tr class="vrcuserorderstablerow"><td><?php echo JText::_('VRCUSERRESDATE'); ?></td><td><?php echo JText::_('VRCUSERRESSTATUS'); ?></td></tr>
	<?php
	foreach($rows as $ord) {
		?>
		<tr><td><a href="<?php echo JRoute::_('index.php?option=com_vikrentcar&task=vieworder&sid='.$ord['sid'].'&ts='.$ord['ts']); ?>"><?php echo date($df.' H:i', $ord['ts']); ?></a></td><td><span style="color: <?php echo ($ord['status'] == "confirmed" ? "green" : "red"); ?>;"><?php echo ($ord['status'] == "confirmed" ? JText::_('VRCONFIRMED') : JText::_('VRSTANDBY')); ?></span></td></tr>
		<?php
	}
	?>
	</table>
	<?php
}else {
	?>
	<p class="vrcuserordersparag"><?php echo JText::_('VRCNOUSERRESFOUND'); ?></p>
	<?php
}

echo $pagelinks;

?>