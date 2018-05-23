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

$ord = $this->ord;
$tar = $this->tar;
$payment = $this->payment;
//vikrentcar 1.6
$calcdays = $this->calcdays;
if(strlen($calcdays) > 0) {
	$origdays = $ord['days'];
	$ord['days'] = $calcdays;
}
//

$currencysymb = vikrentcar :: getCurrencySymb();
$nowdf = vikrentcar :: getDateFormat();
if ($nowdf == "%d/%m/%Y") {
	$df = 'd/m/Y';
}elseif ($nowdf == "%m/%d/%Y") {
	$df = 'm/d/Y';
}else {
	$df = 'Y/m/d';
}
$dbo = & JFactory :: getDBO();
$carinfo = vikrentcar :: getCarInfo($ord['idcar']);
if (is_array($tar)) {
	$prname = vikrentcar :: getPriceName($tar['idprice']);
	$isdue = vikrentcar :: sayCostPlusIva($tar['cost'], $tar['idprice'], $ord);
} else {
	$prname = "";
	$isdue = 0;
}
if (!empty ($ord['optionals'])) {
	$stepo = explode(";", $ord['optionals']);
	foreach ($stepo as $one) {
		if (!empty ($one)) {
			$stept = explode(":", $one);
			$q = "SELECT * FROM `#__vikrentcar_optionals` WHERE `id`=" . $dbo->quote($stept[0]) . ";";
			$dbo->setQuery($q);
			$dbo->Query($q);
			if ($dbo->getNumRows() == 1) {
				$actopt = $dbo->loadAssocList();
				$realcost = (intval($actopt[0]['perday']) == 1 ? ($actopt[0]['cost'] * $ord['days'] * $stept[1]) : ($actopt[0]['cost'] * $stept[1]));
				if (!empty ($actopt[0]['maxprice']) && $actopt[0]['maxprice'] > 0 && $realcost > $actopt[0]['maxprice']) {
					$realcost = $actopt[0]['maxprice'];
					if(intval($actopt[0]['hmany']) == 1 && intval($stept[1]) > 1) {
						$realcost = $actopt[0]['maxprice'] * $stept[1];
					}
				}
				$tmpopr = vikrentcar :: sayOptionalsPlusIva($realcost, $actopt[0]['idiva'], $ord);
				$isdue += $tmpopr;
				$optbought .= ($stept[1] > 1 ? $stept[1] . " " : "") . $actopt[0]['name'] . ": " . $currencysymb . " " . vikrentcar::numberFormat($tmpopr) . "<br/>";
			}
		}
	}
}
if (!empty ($ord['idplace']) && !empty ($ord['idreturnplace'])) {
	$locfee = vikrentcar :: getLocFee($ord['idplace'], $ord['idreturnplace']);
	if ($locfee) {
		//VikRentCar 1.7 - Location fees overrides
		if (strlen($locfee['losoverride']) > 0) {
			$arrvaloverrides = array();
			$valovrparts = explode('_', $locfee['losoverride']);
			foreach($valovrparts as $valovr) {
				if (!empty($valovr)) {
					$ovrinfo = explode(':', $valovr);
					$arrvaloverrides[$ovrinfo[0]] = $ovrinfo[1];
				}
			}
			if (array_key_exists($ord['days'], $arrvaloverrides)) {
				$locfee['cost'] = $arrvaloverrides[$ord['days']];
			}
		}
		//end VikRentCar 1.7 - Location fees overrides
		$locfeecost = intval($locfee['daily']) == 1 ? ($locfee['cost'] * $ord['days']) : $locfee['cost'];
		$locfeewith = vikrentcar :: sayLocFeePlusIva($locfeecost, $locfee['idiva'], $ord);
		$isdue += $locfeewith;
	}
}

//vikrentcar 1.6 coupon
$usedcoupon = false;
$origisdue = $isdue;
if(strlen($ord['coupon']) > 0) {
	$usedcoupon = true;
	$expcoupon = explode(";", $ord['coupon']);
	$isdue = $isdue - $expcoupon[1];
}
//

$printer = JRequest :: getInt('printer', '', 'request');
if ($printer != 1) {
?>


<div class="reserva-comun-cont wizardcompletada">
    <section>
            <div class="wizard">
                <div class="wizard-inner">
                    <div class="connecting-line"></div>
                    <div class="connecting-checked3"></div>
                         <ul class="nav nav-tabs">
                            <li class="disabled">
                                <a href="#" class="wizard-checked" title="">
                                    <img src="http://carflet.es/images/carflet/checked.svg" class="bubble-icon">
                                </a>
                                <p>Recogida y Devolución</p>
                            </li>
                        <li class="disabled">
                            <a href="#" class="wizard-checked" title="">
    <img src="http://carflet.es/images/carflet/checked.svg" class="bubble-icon">
                            </a>
                            <p>Coche</p>
                        </li>
                        <li class="disabled">
                            <a href="#" class="wizard-checked" title="">
    <img src="http://carflet.es/images/carflet/checked.svg" class="bubble-icon">
                            </a>
                            <p>Tarifa y Opciones</p>
                        </li>
                        <li class="disabled">
                            <a href="#" class="wizard-checked" title="">
    <img src="http://carflet.es/images/carflet/checked.svg" class="bubble-icon">
                            </a>
                            <p>Resumen</p>
                        </li>
                    <li class="disabled">
                        <a href="#" class="wizard-checked" title="">
<img src="http://carflet.es/images/carflet/checked.svg" class="bubble-icon">
                        </a>
                        <p>Pago</p>
                    </li>
                    </ul>
                </div>
            </div>
    </section>
<div class="reserva-inner-cont">
    <header>
            <div class="imagen-reserva" style="background:url('http://www.carflet.es/images/city.jpg'); background-position: center center; background-size: cover;">
                <div class="desc">
                    <div class="avatar-car-cont">
                        <img src="http://carflet.es/images/carflet/reservar2.svg" class="avatar-car">                 </div>
                    <h1>Reserva en Carflet</h1>
                    <ul class="guide">
                      <li></li>
                      <li></li>
                      <li></li>
                      <li class="selected"></li>
                    </ul>
                </div>
            </div>
        </header>
    <div class="card-info completada">
            <div class="circled"></div>
            <h2>Reserva Confirmada</h2>
            <p><?php echo JText::_('VRCORDERNUMBER'); ?> <?php echo $ord['id'];?> - <?php echo JText::_('VRCCONFIRMATIONNUMBER'); ?> <?php echo $ord['sid'].'_'.$ord['ts'];?> - <?php echo JText::_('VRORDEREDON'); ?> <?php echo date($df.' H:i', $ord['ts']); ?></p>
    </div>
 <div class="resumen-cont" style="background-size: cover; background-position: center center; background-image: url('http://www.carflet.es/images/back.jpg')">
     <div class="overlay-tarifa">




<?php
}

//echo vikrentcar :: getFullFrontTitle();
?>

    <div class="bubble-info">
        <div class="info-inner">
            <div class="vrcvordudataREM completado">
                <img src="http://www.carflet.es/images/carflet/drivers.svg" class="item-resumen">

                <span class="vrhword"><?php echo JText::_('VRPERSDETS'); ?>:</span>
                <p><?php echo nl2br($ord['custdata']); ?>	</p>
            </div>
        </div>
    </div>

    <div class="bubble-info">
		<div class="info-inner">
		<div class="vrcvordcarinfoREM completado">
            <img src="http://carflet.es/images/carflet/key.svg" class="item-resumen">
            <span class="vrhword">Información de la Reserva</span>
			<p><?php echo JText::_('VRCARRENTED'); ?>:<?php echo $carinfo['name']; ?></p>
			<p><?php echo JText::_('VRDAL'); ?><?php echo date($df.' H:i', $ord['ritiro']); ?> - <?php echo JText::_('VRAL'); ?><?php echo date($df.' H:i', $ord['consegna']); ?></p>

			<?php if(!empty($ord['idplace'])) { ?>
			<p><?php echo JText::_('VRRITIROCAR'); ?>:<?php echo vikrentcar::getPlaceName($ord['idplace']); ?></p>
			<?php } ?>
			<?php if(!empty($ord['idreturnplace'])) { ?>
			<p><?php echo JText::_('VRRETURNCARORD'); ?>:<?php echo vikrentcar::getPlaceName($ord['idreturnplace']); ?></p>
			<?php } ?>
		</div>
        </div>
     </div>
     <div class="bubble-info">
        <div class="info-inner">
		<div class="vrcvordcostsREM completado">
                        <img src="http://www.carflet.es/images/carflet/tarjeta.svg" class="item-resumen">
            <span class="vrhword">Precio</span>
            <p><span class="vrcvordudatatitle">Tarifa</span></p>
			<?php
			if(is_array($tar)){
			?>
			<p><span class="vrcvordcoststitle"><?php echo $prname; ?>:</span> <?php echo $currencysymb; ?> <?php echo vikrentcar::numberFormat(vikrentcar::sayCostPlusIva($tar['cost'], $tar['idprice'], $ord)); ?></p>
			<?php } ?>
			<?php if(strlen($optbought)){ ?>
			<p><span class="vrcvordcoststitle"><?php echo JText::_('VROPTS'); ?>:</span><div class="vrcvordcostsoptionals"><?php echo $optbought; ?></div></p>
			<?php } ?>
			<?php if($locfeewith) { ?>
			<p><span class="vrcvordcoststitle"><?php echo JText::_('VRLOCFEETOPAY'); ?>:</span> <?php echo $currencysymb; ?> <?php echo vikrentcar::numberFormat($locfeewith); ?></p>
			<?php } ?>
			<?php if($usedcoupon == true) { ?>
			<p><span class="vrcvordcoststitle"><?php echo JText::_('VRCCOUPON').' '.$expcoupon[2]; ?>:</span> - <?php echo $currencysymb; ?> <?php echo vikrentcar::numberFormat($expcoupon[1]); ?></p>
			<?php } ?>
			<p class="vrcvordcoststot"><span class="vrcvordcoststitle"><?php echo JText::_('VRTOTAL'); ?>:</span> <?php echo $currencysymb; ?> <?php echo vikrentcar::numberFormat($isdue); ?></p>
			<?php
			if($ord['totpaid'] > 0.00 && number_format($isdue, 2) != number_format($ord['totpaid'], 2)) {
				?>
				<p class="vrcvordcoststot"><span class="vrcvordcoststitle"><?php echo JText::_('VRCAMOUNTPAID'); ?>:</span> <?php echo $currencysymb; ?> <?php echo vikrentcar::numberFormat($ord['totpaid']); ?></p>
				<?php
			}
			?>
		</div>
     </div>
    </div>
		<?php

if (@ is_array($payment) && intval($payment['shownotealw']) == 1) {
	if(strlen($payment['note']) > 0) {
		?>
		<div class="vrcvordpaynote">
		<?php
	}
	echo $payment['note'];
	if(strlen($payment['note']) > 0) {
		?>
		</div>

		<?php
	}
}

if ($printer == 1) {
	?>
	<script language="JavaScript" type="text/javascript">
	window.print();
	</script>
	<?php
}else {
	//VikRentCar 1.7 Download PDF
	if (file_exists(JPATH_SITE . DS ."components". DS ."com_vikrentcar". DS . "resources" . DS . "pdfs" . DS . $ord['id'].'_'.$ord['ts'].'.pdf')) {
		?>
        <div class="acciones colored">
		<a href="<?php echo JURI::root(); ?>components/com_vikrentcar/resources/pdfs/<?php echo $ord['id'].'_'.$ord['ts']; ?>.pdf" target="_blank"><?php echo JText::_('VRCDOWNLOADPDF'); ?></a>

        </div>



		<?php
	}
	//VikRentCar 1.7 Cancellation Request
	?>
	<script language="JavaScript" type="text/javascript">
	function vrcOpenCancOrdForm() {
		document.getElementById('vrcopencancform').style.display = 'none';
		document.getElementById('vrcordcancformbox').style.display = 'block';
	}
	function vrcValidateCancForm() {
		var vrvar = document.vrccanc;
		if(!document.getElementById('vrccancemail').value.match(/\S/)) {
			document.getElementById('vrcformcancemail').style.color='#ff0000';
			return false;
		}else {
			document.getElementById('vrcformcancemail').style.color='';
		}
		if(!document.getElementById('vrccancreason').value.match(/\S/)) {
			document.getElementById('vrcformcancreason').style.color='#ff0000';
			return false;
		}else {
			document.getElementById('vrcformcancreason').style.color='';
		}
		return true;
	}
	</script>
	<!-- Google Code for Alquiler completo Conversion Page -->
	<script type="text/javascript">
	/* <![CDATA[ */
	var google_conversion_id = 893096711;
	var google_conversion_language = "en";
	var google_conversion_format = "3";
	var google_conversion_color = "ffffff";
	var google_conversion_label = "to3_CK2yjmQQh6buqQM";
	var google_remarketing_only = false;
	/* ]]> */
	</script>
	<script type="text/javascript" src="//www.googleadservices.com/pagead/conversion.js">
	</script>
	<noscript>
	<div style="display:inline;">
	<img height="1" width="1" style="border-style:none;" alt="" src="//www.googleadservices.com/pagead/conversion/893096711/?label=to3_CK2yjmQQh6buqQM&amp;guid=ON&amp;script=0"/>
	</div>
	</noscript>


	<div class="vrcordcancbox">
		<h3><?php echo JText::_('VRCREQUESTCANCMOD'); ?></h3>
		<a href="javascript: void(0);" id="vrcopencancform" onclick="javascript: vrcOpenCancOrdForm();"><?php echo JText::_('VRCREQUESTCANCMODOPENTEXT'); ?></a>
		<div class="vrcordcancformbox" id="vrcordcancformbox">
			<form action="<?php echo JRoute::_('index.php?option=com_vikrentcar'); ?>" name="vrccanc" method="post" onsubmit="javascript: return vrcValidateCancForm();">
				<table>
					<tr><td id="vrcformcancemail"><?php echo JText::_('VRCREQUESTCANCMODEMAIL'); ?>: </td><td><input type="text" class="vrcinput" name="email" id="vrccancemail" value="<?php echo $ord['custmail']; ?>"/></td></tr>
					<tr><td style="vertical-align: top;" id="vrcformcancreason"><?php echo JText::_('VRCREQUESTCANCMODREASON'); ?>: </td><td><textarea name="reason" id="vrccancreason" rows="7" cols="30" class="vrctextarea"></textarea></td></tr>
					<tr><td colspan="2" style="text-align: right;"><input type="submit" name="sendrequest" value="<?php echo JText::_('VRCREQUESTCANCMODSUBMIT'); ?>" class="button"/></td></tr>
				</table>
				<input type="hidden" name="sid" value="<?php echo $ord['sid']; ?>"/>
				<input type="hidden" name="idorder" value="<?php echo $ord['id']; ?>"/>
				<input type="hidden" name="option" value="com_vikrentcar"/>
				<input type="hidden" name="task" value="cancelrequest"/>
			</form>
		</div>
    </div>
    </div>
	</div>
</div>
</div>
	<?php
}

?>
