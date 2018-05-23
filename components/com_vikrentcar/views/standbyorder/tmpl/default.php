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
$imp = vikrentcar :: sayCostMinusIva($tar['cost'], $tar['idprice'], $ord);
$isdue = vikrentcar :: sayCostPlusIva($tar['cost'], $tar['idprice'], $ord);
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
				$imp += vikrentcar :: sayOptionalsMinusIva($realcost, $actopt[0]['idiva'], $ord);
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
		$locfeewithout = vikrentcar :: sayLocFeeMinusIva($locfeecost, $locfee['idiva'], $ord);
		$locfeewith = vikrentcar :: sayLocFeePlusIva($locfeecost, $locfee['idiva'], $ord);
		$imp += $locfeewithout;
		$isdue += $locfeewith;
	}
}
$tax = $isdue - $imp;

//vikrentcar 1.6 coupon
$usedcoupon = false;
$origisdue = $isdue;
if(strlen($ord['coupon']) > 0) {
	$usedcoupon = true;
	$expcoupon = explode(";", $ord['coupon']);
	$isdue = $isdue - $expcoupon[1];
}
//

//echo vikrentcar :: getFullFrontTitle();

?>

<div class="reserva-comun-cont wizardresumen">
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
                    <li  class="disabled">
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
                    <li class="active">
                        <a href="#" title="">
<img src="http://carflet.es/images/carflet/pagarblue.svg" class="bubble-icon">
                        </a>
                        <p>Pago</p>
                    </li>
                </ul>
            </div>
        </div>
    </section>
<div class="reserva-inner-cont">
		<header>
            <div class="imagen-reserva" style="background-position: center center; background-size: cover;">
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
        <div class="card-info uncompleted">
            <div class="circled"></div>
            <p class="aviso"><?php echo JText::_('VRORDEREDON'); ?> <?php echo date($df.' H:i', $ord['ts']); ?> <?php echo JText::_('VRWAITINGPAYM'); ?></p>
        </div>

        <div class="resumen-cont" style="background-size: cover; background-position: center center; background-image: url('http://www.carflet.es/images/back.jpg')">
        <div class="overlay-tarifa">

        <div class="bubble-info">
            <div class="vrcvordudataREM info-inner nocompletado">
                <img src="http://www.carflet.es/images/carflet/drivers.svg" class="item-resumen">
                <span class="vrhword"><?php echo JText::_('VRPERSDETS'); ?></span>
                <p><?php echo nl2br($ord['custdata']); ?></p>
            </div>
        </div>

		<div class="vrcvordcarinfoREM info-inner nocompletado">
            <img src="http://www.carflet.es/images/carflet/cochewhite.svg" class="item-resumen">
            <span class="vrcvordcarinfotitleREM vrhword"><?php echo JText::_('VRCARRENTED'); ?>:</span>
            <p><?php echo $carinfo['name']; ?></p>

		</div>

            <div class="vrcvordcarinfoREM info-inner nocompletado">
                <img src="http://www.carflet.es/images/carflet/lugarwhite.svg" class="item-resumen">
                <span class="vrhword">Recogida y Devolución</span>
            			<p><span class="vrcvordcarinfotitle"><?php echo JText::_('VRDAL'); ?></span> <?php echo date($df.' H:i', $ord['ritiro']); ?> - <span class="vrcvordcarinfotitle"><?php echo JText::_('VRAL'); ?></span> <?php echo date($df.' H:i', $ord['consegna']); ?></p>
			<?php if(!empty($ord['idplace'])) { ?>
			<p><span class="vrcvordcarinfotitle"><?php echo JText::_('VRRITIROCAR'); ?>:</span> <?php echo vikrentcar::getPlaceName($ord['idplace']); ?></p>
			<?php } ?>
			<?php if(!empty($ord['idreturnplace'])) { ?>
			<p><span class="vrcvordcarinfotitle"><?php echo JText::_('VRRETURNCARORD'); ?>:</span> <?php echo vikrentcar::getPlaceName($ord['idreturnplace']); ?></p>
			<?php } ?>

            </div>









		<div class="vrcvordcostsREM info-inner nocompletado">
            <img src="http://www.carflet.es/images/carflet/tarjeta.svg" class="item-resumen">
                <span class="vrhword">Desglose de Precio</span>
			<p><span class="vrcvordcoststitle"><?php echo vikrentcar::getPriceName($tar['idprice']); ?>:</span> <?php echo $currencysymb; ?> <?php echo vikrentcar::numberFormat(vikrentcar::sayCostPlusIva($tar['cost'], $tar['idprice'], $ord)); ?></p>
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
		</div>

		<?php

if (is_array($payment)) {
	require_once(JPATH_ADMINISTRATOR . DS ."components". DS ."com_vikrentcar". DS . "payments" . DS . $payment['file']);
	$return_url = JURI :: root() . "index.php?option=com_vikrentcar&task=vieworder&sid=" . $ord['sid'] . "&ts=" . $ord['ts'];
	$error_url = JURI :: root() . "index.php?option=com_vikrentcar&task=vieworder&sid=" . $ord['sid'] . "&ts=" . $ord['ts'];
	$notify_url = JURI :: root() . "index.php?option=com_vikrentcar&task=notifypayment&sid=" . $ord['sid'] . "&ts=" . $ord['ts']."&tmpl=component";
	$transaction_name = vikrentcar :: getPaymentName();
	$leave_deposit = 0;
	$percentdeposit = "";
	$array_order = array ();
	$array_order['order'] = $ord;
	$array_order['account_name'] = vikrentcar :: getPaypalAcc();
	$array_order['transaction_currency'] = vikrentcar :: getCurrencyCodePp();
	$array_order['vehicle_name'] = $carinfo['name'];
	$array_order['transaction_name'] = !empty ($transaction_name) ? $transaction_name : $carinfo['name'];
	$array_order['order_total'] = $isdue;
	$array_order['currency_symb'] = $currencysymb;
	$array_order['net_price'] = $imp;
	$array_order['tax'] = $tax;
	$array_order['return_url'] = $return_url;
	$array_order['error_url'] = $error_url;
	$array_order['notify_url'] = $notify_url;
	$array_order['total_to_pay'] = $isdue;
	$array_order['total_net_price'] = $imp;
	$array_order['total_tax'] = $tax;
	$totalchanged = false;
	if ($payment['charge'] > 0.00) {
		$totalchanged = true;
		if($payment['ch_disc'] == 1) {
			//charge
			if($payment['val_pcent'] == 1) {
				//fixed value
				// AQUI METÍ EL MULTIPLICADOR DE DÍAS
				$array_order['total_net_price'] += $payment['charge'];
				$array_order['total_tax'] += $payment['charge'];
				$array_order['total_to_pay'] += $payment['charge'];
				$newtotaltopay = $array_order['total_to_pay'];
			}else {
				//percent value
				$percent_net = $array_order['total_net_price'] * $payment['charge'] / 100;
				$percent_tax = $array_order['total_tax'] * $payment['charge'] / 100;
				$percent_to_pay = $array_order['total_to_pay'] * $payment['charge'] / 100;
				$array_order['total_net_price'] += $percent_net;
				$array_order['total_tax'] += $percent_tax;
				$array_order['total_to_pay'] += $percent_to_pay;
				$newtotaltopay = $array_order['total_to_pay'];
			}
		}else {
			//discount
			if($payment['val_pcent'] == 1) {
				//fixed value
				$array_order['total_net_price'] -= $payment['charge'];
				$array_order['total_tax'] -= $payment['charge'];
				$array_order['total_to_pay'] -= $payment['charge'];
				$newtotaltopay = $array_order['total_to_pay'];
			}else {
				//percent value
				$percent_net = $array_order['total_net_price'] * $payment['charge'] / 100;
				$percent_tax = $array_order['total_tax'] * $payment['charge'] / 100;
				$percent_to_pay = $array_order['total_to_pay'] * $payment['charge'] / 100;
				$array_order['total_net_price'] -= $percent_net;
				$array_order['total_tax'] -= $percent_tax;
				$array_order['total_to_pay'] -= $percent_to_pay;
				$newtotaltopay = $array_order['total_to_pay'];
			}
		}
	}
	if (!vikrentcar :: payTotal()) {
		$percentdeposit = vikrentcar :: getAccPerCent();
		if ($percentdeposit > 0) {
			$leave_deposit = 1;
			$array_order['total_to_pay'] = $array_order['total_to_pay'] * $percentdeposit / 100;
			$array_order['total_net_price'] = $array_order['total_net_price'] * $percentdeposit / 100;
			//$array_order['total_tax'] = $tax * $percentdeposit / 100;
			$array_order['total_tax'] = ($array_order['total_to_pay'] - $array_order['total_net_price']);
		}
	}
	$array_order['leave_deposit'] = $leave_deposit;
	$array_order['percentdeposit'] = $percentdeposit;
	$array_order['payment_info'] = $payment;

	?>
	<div class="vrcvordpaybutton">
	<?php
	if($totalchanged) {
		$chdecimals = $payment['charge'] - (int)$payment['charge'];
		?>
		<p class="vrcpaymentchangetot">
		<?php echo $payment['name']; ?>
		(<?php echo ($payment['ch_disc'] == 1 ? "+" : "-").($chdecimals > 0.00 ? vikrentcar::numberFormat($payment['charge']) : number_format($payment['charge'], 0))." ".($payment['val_pcent'] == 1 ? $currencysymb : "%");?>)
		<span class="vrcorddiffpayment"><?php echo $currencysymb; ?> <?php echo vikrentcar::numberFormat($newtotaltopay); ?></span>
		</p>
		<?php
	}
	$obj = new vikRentCarPayment($array_order, json_decode($payment['params'], true));
	$obj->showPayment();
	?>
	</div>
    </div>
    </div>
</div>
</div>
	<?php
}
?>
