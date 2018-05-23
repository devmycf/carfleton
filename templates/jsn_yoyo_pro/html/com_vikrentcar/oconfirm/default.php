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

$car=$this->car;
$price=$this->price;
$selopt=$this->selopt;
$days=$this->days;
//vikrentcar 1.6
$calcdays=$this->calcdays;
if((int)$days != (int)$calcdays) {
	$origdays = $days;
	$days=$calcdays;
}
$coupon=$this->coupon;
//
$first=$this->first;
$second=$this->second;
$ftitle=$this->ftitle;
$place=$this->place;
$returnplace=$this->returnplace;
$payments=$this->payments;
$cfields=$this->cfields;

$categoriavehiculo = $car['idcat'];
if($categoriavehiculo == 15){
	$flagcar = false;
	$proba = "es furgo";
} else {
	$flagcar = true;
	$proba = "es coche";
}

$document->addStyleSheet(JURI::root().'templates/jsn_yoyo_pro/html/com_vikrentcar/vikrentcar_theme.css');


if (@ is_array($cfields)) {
	foreach ($cfields as $cf) {
		if (!empty ($cf['poplink'])) {
			JHTML :: _('behavior.modal');
			break;
		}
	}
	foreach ($cfields as $cf) {
		if ($cf['type'] == 'date') {
			JHTML::_('behavior.calendar');
			break;
		}
	}
}
$currencysymb = vikrentcar :: getCurrencySymb();
$nowdf = vikrentcar :: getDateFormat();
if ($nowdf == "%d/%m/%Y") {
	$df = 'd/m/Y';
}elseif ($nowdf == "%m/%d/%Y") {
	$df = 'm/d/Y';
}else {
	$df = 'Y/m/d';
}
if (vikrentcar :: tokenForm()) {
	session_start();
	$vikt = uniqid(rand(17, 1717), true);
	$_SESSION['vikrtoken'] = $vikt;
	$tok = "<input type=\"hidden\" name=\"viktoken\" value=\"" . $vikt . "\"/>\n";
} else {
	$tok = "";
}

//echo $ftitle;

$tarifa = vikrentcar::getPriceName($price['idprice']);
$carats = vikrentcar :: getCarCarat($car['idcarat']);
$imp = vikrentcar :: sayCostMinusIva($price['cost'], $price['idprice']);
$totdue = vikrentcar :: sayCostPlusIva($price['cost'], $price['idprice']);
$saywithout = $imp;
$saywith = $totdue;
if (is_array($selopt)) {
	foreach ($selopt as $selo) {
		$wop .= $selo['id'] . ":" . $selo['quan'] . ";";
		$realcost = (intval($selo['perday']) == 1 ? ($selo['cost'] * $days * $selo['quan']) : ($selo['cost'] * $selo['quan']));
		if (!empty ($selo['maxprice']) && $selo['maxprice'] > 0 && $realcost > $selo['maxprice']) {
			$realcost = $selo['maxprice'];
			if(intval($selo['hmany']) == 1 && intval($selo['quan']) > 1) {
				$realcost = $selo['maxprice'] * $selo['quan'];
			}
		}
		$imp += vikrentcar :: sayOptionalsMinusIva($realcost, $selo['idiva']);
		$totdue += vikrentcar :: sayOptionalsPlusIva($realcost, $selo['idiva']);
	}
} else {
	$wop = "";
}
?>

         <?php
                if(strlen($car['moreimgs']) > 0) {
                        $moreimages = explode(';;', $car['moreimgs']);
                    $imagencool = $moreimages[0];
                }

                $imgnormal = $car['img'];
         ?>

<div class="reserva-comun-cont wizardresumen t1">
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
												<?php if($flagcar == true) {?>
                        <p>Coche</p>
												<?php } else {?>
												<p>Furgoneta</p>
											  <?php }?>
                    </li>
                    <li  class="disabled">
                        <a href="#" class="wizard-checked" title="">
<img src="http://carflet.es/images/carflet/checked.svg" class="bubble-icon">
                        </a>
                        <p>Tarifa y Opciones</p>
                    </li>

                    <li class="active">
                        <a href="#" title="">
<img src="http://carflet.es/images/carflet/desgloseblue.svg" class="bubble-icon">
                        </a>
                        <p>Resumen</p>
                    </li>
                </ul>
            </div>
        </div>
    </section>
    <div class="reserva-inner-cont test1">
		<p class="vrcrentalriepilogo"><?php echo JText::_('VRRIEPILOGOORD'); ?>:</p>
		<header>
            <div class="imagen-reserva" style="background:url('<?php echo JURI::root(); ?>administrator/components/com_vikrentcar/resources/big_<?php echo $imagencool; ?>'); background-position: center center; background-size: cover;">
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
        <div class="card-info">
            <div class="circled"></div>
            <h2>Resumen y Confirmación</h2>
            <img src="http://carflet.es/images/carflet/locate.svg" class="avatar-icon">
        </div>
        <div class="resumen-cont" style="background-size: cover; background-position: center center; background-image: url('<?php echo JURI::root(); ?>administrator/components/com_vikrentcar/resources/big_<?php echo $imagencool; ?>')">
            <div class="overlay-tarifa">
        <div class="bubble-tarifa">
            <div class="tarifa-inner">
            <img class="car-icon" src="<?php echo JURI::root(); ?>administrator/components/com_vikrentcar/resources/<?php echo $imgnormal; ?>">
            <?php
		      if(array_key_exists('hours', $price)) {
			?>
            <p class="car_title"><span class="vrthemenamecar"><?php echo $car['name']; ?></span><span class="vrhwordthemefor"><?php echo JText::_('VRFOR'); ?><?php echo (intval($price['hours']) == 1 ? "1 ".JText::_('VRCHOUR') : $price['hours']." ".JText::_('VRCHOURS')); ?>
                  </span></p>
            <?php
              }else { ?>
            <p class="car_title"><span class="vrthemenamecar"><?php echo $car['name']; ?></span><span class="vrhwordthemefor"><?php echo JText::_('VRFOR'); ?> <?php echo (intval($days)==1 ? "1 ".JText::_('VRDAY') : $days." ".JText::_('VRDAYS')); ?></span></p>
            <?php }
			?>
                </div>
        </div>
        <div class="bubble-recodevo">

            <div class="recodevo-inner">

							<div class="warning-sect">
																<img src="http://www.carflet.es/images/warning.svg">
																<p>La política de combustible es, en cualquier reserva, Lleno-Lleno</p>
							</div>
                <div class="reco-cont">
                    <div class="rowres">
                        <img class="item-resumen fix-reco" src="http://www.carflet.es/images/carflet/calendariowh.svg"/>
                        <span class="resumen-fecha"><?php echo date($df.' H:i', $first); ?></span>
                    </div>
                    <div class="rowres">
                        <img class="item-resumen fix-reco" src="http://carflet.es/images/carflet/locate.svg">
                        <?php if(!empty($place)) { ?>
                          <p class="recogida">
                              <span class="reco-name"><?php echo vikrentcar::getPlaceName($place); ?></span>
                          </p>
                        <?php } ?>
                    </div>
                </div>

                <img class="arrows" src="http://www.carflet.es/images/carflet/arrows.svg">
                <div class="reco-cont">
                    <div class="rowres">
                        <img class="item-resumen fix-devo" src="http://www.carflet.es/images/carflet/calendariowh.svg"/>
                        <span class="resumen-fecha"><?php echo date($df.' H:i', $second); ?></span>
                    </div>
                    <div class="rowres">
                        <img class="item-resumen fix-devo" src="http://carflet.es/images/carflet/locate.svg">
            		    <?php if(!empty($returnplace)) { ?>
		                <p class="devolucion">
                            <span class="reco-name"><?php echo vikrentcar::getPlaceName($returnplace); ?></span>                            </p>
		                <?php } ?>
                    </div>
                </div>



            </div>

        </div>

        <div class="bubble-table">

            <div class="table-inner">
                <img src="http://www.carflet.es/images/carflet/desglose.svg" class="item-resumen"/><span class="vrhword"><?php echo JText::_('VRDESGLOSE'); ?></span>
		<table class="vrctableorder">
		<tr class="vrctableorderfrow"><td>&nbsp;</td><td align="center"><?php echo (array_key_exists('hours', $price) ? JText::_('VRCHOURS') : JText::_('ORDDD')); ?></td><td align="center"><?php echo JText::_('ORDNOTAX'); ?></td><td align="center"><?php echo JText::_('ORDTAX'); ?></td><td align="center"><?php echo JText::_('ORDWITHTAX'); ?></td></tr>
		<tr class="vrctableordercar"><td align="left"><?php echo $car['name']; ?><br/><?php echo vikrentcar::getPriceName($price['idprice']).(!empty($price['attrdata']) ? "<br/>".vikrentcar::getPriceAttr($price['idprice']).": ".$price['attrdata'] : ""); ?></td>
		<td align="center"><?php echo (array_key_exists('hours', $price) ? $price['hours'] : $days); ?></td><td align="center"><span class="vrccurrency"><?php echo $currencysymb; ?></span> <span class="vrcprice"><?php echo vikrentcar::numberFormat($saywithout); ?></span></td><td align="center"><span class="vrccurrency"><?php echo $currencysymb; ?></span> <span class="vrcprice"><?php echo vikrentcar::numberFormat($saywith - $saywithout); ?></span></td><td align="center"><span class="vrccurrency"><?php echo $currencysymb; ?></span> <span class="vrcprice"><?php echo vikrentcar::numberFormat($saywith); ?></span></td></tr>
		<?php

$sf = 2;
if (is_array($selopt)) {
	foreach ($selopt as $aop) {
		if (intval($aop['perday']) == 1) {
			$thisoptcost = ($aop['cost'] * $aop['quan']) * $days;
		} else {
			$thisoptcost = $aop['cost'] * $aop['quan'];
		}
		if (!empty ($aop['maxprice']) && $aop['maxprice'] > 0 && $thisoptcost > $aop['maxprice']) {
			$thisoptcost = $aop['maxprice'];
			if(intval($aop['hmany']) == 1 && intval($aop['quan']) > 1) {
				$thisoptcost = $aop['maxprice'] * $aop['quan'];
			}
		}
		$optwithout = (intval($aop['perday']) == 1 ? vikrentcar :: sayOptionalsMinusIva($thisoptcost, $aop['idiva']) : vikrentcar :: sayOptionalsMinusIva($thisoptcost, $aop['idiva']));
		$optwith = (intval($aop['perday']) == 1 ? vikrentcar :: sayOptionalsPlusIva($thisoptcost, $aop['idiva']) : vikrentcar :: sayOptionalsPlusIva($thisoptcost, $aop['idiva']));
		$opttax = vikrentcar::numberFormat($optwith - $optwithout);
		?>
			<tr<?php echo (($sf % 2) == 0 ? " class=\"vrcordrowtwo\"" : " class=\"vrcordrowone\""); ?>><td><?php echo $aop['name'].($aop['quan'] > 1 ? " <small>(x ".$aop['quan'].")</small>" : ""); ?></td><td align="center"><?php echo (array_key_exists('hours', $price) ? $price['hours'] : $days); ?></td><td align="center"><span class="vrccurrency"><?php echo $currencysymb; ?></span> <span class="vrcprice"><?php echo vikrentcar::numberFormat($optwithout); ?></span></td><td align="center"><span class="vrccurrency"><?php echo $currencysymb; ?></span> <span class="vrcprice"><?php echo $opttax; ?></span></td><td align="center"><span class="vrccurrency"><?php echo $currencysymb; ?></span> <span class="vrcprice"><?php echo vikrentcar::numberFormat($optwith); ?></span></td></tr>
		<?php

		$sf++;
	}
}
if (!empty ($place) && !empty ($returnplace)) {
	$locfee = vikrentcar :: getLocFee($place, $returnplace);
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
			if (array_key_exists($days, $arrvaloverrides)) {
				$locfee['cost'] = $arrvaloverrides[$days];
			}
		}
		//end VikRentCar 1.7 - Location fees overrides
		$locfeecost = intval($locfee['daily']) == 1 ? ($locfee['cost'] * $days) : $locfee['cost'];
		$locfeewithout = vikrentcar :: sayLocFeeMinusIva($locfeecost, $locfee['idiva']);
		$locfeewith = vikrentcar :: sayLocFeePlusIva($locfeecost, $locfee['idiva']);
		$locfeetax = vikrentcar::numberFormat($locfeewith - $locfeewithout);

		$imp += $locfeewithout;
		$totdue += $locfeewith;
		?>

		<tr<?php echo (($sf % 2) == 0 ? " class=\"vrcordrowtwo\"" : " class=\"vrcordrowone\"");?>>
			<td><?php echo JText::_('VRLOCFEETOPAY'); ?></td>
			<td align="center"><?php echo (array_key_exists('hours', $price) ? $price['hours'] : $days); ?></td>
			<td align="center"><span class="vrccurrency"><?php echo $currencysymb; ?></span> <span class="vrcprice"><?php echo vikrentcar::numberFormat($locfeewithout); ?></span></td>
			<td align="center"><span class="vrccurrency"><?php echo $currencysymb; ?></span> <span class="vrcprice"><?php echo $locfeetax; ?></span></td>
			<td align="center"><span class="vrccurrency"><?php echo $currencysymb; ?></span> <span class="vrcprice"><?php echo vikrentcar::numberFormat($locfeewith); ?></span></td>
		</tr>

		<?php

	}
}

//store Order Total in session for modules
$session =& JFactory::getSession();
$session->set('vikrentcar_ordertotal', $totdue);
//

//vikrentcar 1.6
$origtotdue = $totdue;
$usedcoupon = false;
if(is_array($coupon)) {
	//Mira que el cupon cumpla el importe mínimo
	$coupontotok = true;
	if(strlen($coupon['mintotord']) > 0) {
		if($totdue < $coupon['mintotord']) {
			$coupontotok = false;
		}
	}

	//Mira que el cupon cumpla los días mínimos también, si es de importe
	if($coupontotok == true) {
		if($coupon['percentot'] == 2) {
			$couponImporte = $coupon['value'];
			if($couponImporte == 25 && $tarifa != "Ampliada"){
				$coupontotok = false;
			}

			if($couponImporte == 30 && (($days != 1 && $days != 2))){
				$coupontotok = false;
			}
			if($couponImporte == 30 && $tarifa != "Ampliada"){
				$coupontotok = false;
			}

			if($couponImporte == 20 && (($days != 1 && $days != 2))){
				$coupontotok = false;
			}
			if($couponImporte == 20 && $tarifa != "Ampliada"){
				$coupontotok = false;
			}

			// if($couponImporte == 50 && ($days != 3 && $days != 4)){
			// 	$coupontotok = false;
			// }
      //
			// if($couponImporte == 50 && $tarifa != "Ampliada"){
			// 	$coupontotok = false;
			// }

			// if($couponImporte == 40 && ($days != 3 && $days != 4)){
			// 	$coupontotok = false;
			// }

			if($couponImporte == 40 && $tarifa != "Ampliada"){
				$coupontotok = false;
			}

			if($couponImporte == 70 && $tarifa != "Ampliada"){
				$coupontotok = false;
			}

			if($couponImporte == 90 && ($days != 5 && $days != 6)){
				$coupontotok = false;
			}

			if($couponImporte == 90 && $tarifa != "Ampliada"){
				$coupontotok = false;
			}

      if($couponImporte == 50){
        if($tarifa != "Ampliada"){
          $coupontotok = false;
        }
		
		// Ver si es regalo y si no 
		if(0 === strpos($coupon['code'], 'rg')) {
			
		} else {
			if($days != 3 && $days != 4){
			  if(0 === strpos($coupon['code'], 'desc')){
				//
			  } else{
				$coupontotok = false;
			  }
			}
		}
      }

      if($couponImporte == 100){
        if($tarifa != "Ampliada"){
          $coupontotok = false;
        }
		
		//Ver si es regalo y si no 
		if(0 === strpos($coupon['code'], 'rg')) { 
		} else {
		    if($days != 5 && $days != 6){
			  if(0 === strpos($coupon['code'], 'gro') || ($coupon['code']=='lets2qm6r4f100')){
				//
			  } else{
				$coupontotok = false;
			  }
			}	
		}
      }

			// if($couponImporte == 100 && ($days != 5 && $days != 6)){
			// 	$coupontotok = false;
			// }

			// if($couponImporte == 100 && $tarifa != "Ampliada"){
			// 	$coupontotok = false;
			// }
		} else {
			if($tarifa != "Ampliada"){
					$coupontotok = false;
			}
		}

	}

	//Cupon de 20
	if($coupon['code'] == "GOLD20" && $tarifa != "Ampliada"){
		$coupontotok = false;
	}

	//Cupon de 20 Tusidyi
	if($coupon['code'] == "turisdiy20desc" && $tarifa != "Ampliada"){
		$coupontotok = false;
	}


	if($coupontotok == true) {
		if(0 === strpos($coupon['code'], 'gro')){
			$requiereinfo = 1;
		}
		$usedcoupon = true;
		if($coupon['percentot'] == 1) {
			//percent value
			$minuscoupon = 100 - $coupon['value'];
			$couponsave = $totdue * $coupon['value'] / 100;
			$totdue = $totdue * $minuscoupon / 100;
		}else {
			//total value
			$couponsave = $coupon['value'];
			$totdue = $totdue - $coupon['value'];
		}
	}else {
		JError :: raiseWarning('', JText::_('VRCCOUPONINVMINTOTORD'));
	}

	// if($coupon['code'] == "MADCAD20" && $days == 1){
	// 	$madrid = array(4, 56, 60, 64, 65, 66, 155, 156, 157);
	// 	if($returnplace != 3){
	// 		$coupontotok = false;
	// 	}
	// }
}
//

?>

		<tr class="vrcordrowtotal"><td class="vrcordrowtotalname"><?php echo JText::_('VRTOTAL'); ?></td><td align="center">&nbsp;</td><td align="center"><span class="vrccurrency"><?php echo $currencysymb; ?></span> <span class="vrcprice"><?php echo vikrentcar::numberFormat($imp); ?></span></td><td align="center"><span class="vrccurrency"><?php echo $currencysymb; ?></span> <span class="vrcprice"><?php echo vikrentcar::numberFormat(($origtotdue - $imp)); ?></span></td><td align="center" class="vrctotalord"><span class="vrccurrency"><?php echo $currencysymb; ?></span> <span class="vrcprice"><?php echo vikrentcar::numberFormat($origtotdue); ?></span></td></tr>
		<?php
		if($usedcoupon == true) {
			?>
			<tr class="vrcordrowtotal"><td><?php echo JText::_('VRCCOUPON'); ?> <?php echo $coupon['code']; ?></td><td align="center">&nbsp;</td><td align="center">&nbsp;</td><td align="center">&nbsp;</td><td align="center" class="vrctotalord"><span class="vrccurrency">- <?php echo $currencysymb; ?></span> <span class="vrcprice"><?php echo vikrentcar::numberFormat($couponsave); ?></span></td></tr>
			<tr class="vrcordrowtotal"><td><?php echo JText::_('VRCNEWTOTAL'); ?></td><td align="center">&nbsp;</td><td align="center">&nbsp;</td><td align="center">&nbsp;</td><td align="center" class="vrctotalord"><span class="vrccurrency"><?php echo $currencysymb; ?></span> <span class="vrcprice"><?php echo vikrentcar::numberFormat($totdue); ?></span></td></tr>
			<?php
		}
		?>
		</table>
                </div>
            </div>

<?php
//vikrentcar 1.6
if(vikrentcar::couponsEnabled() && !is_array($coupon)) {
	?>
    <div class="bubble-cupon">
        <div class="cupon-inner">
						<p>Si tiene un cupón o código promocional puede introducirlo y validarlo ahora, antes de introducir sus datos personales</p>
						<p></p>
            <img src="http://www.carflet.es/images/carflet/cupones.svg" class="item-resumen"/><span class="vrhword"><?php echo JText::_('VRINFOCUPON'); ?></span>
        <form class="formcupon" action="<?php echo JRoute::_('index.php?option=com_vikrentcar'); ?>" method="post">
    <!--        <div class="indexado">1</div>-->
            <div class="cuponcontREMOVE">
                <div class="vrcentercouponREMOVE">

                <input type="text" name="couponcode" value="" size="20" class="vrcinputcoupon campoform" placeholder="<?php echo JText::_('VRCHAVEACOUPON'); ?>"/><input type="submit" class="vrcsubmitcoupon botoncupon" name="applyacoupon" value="<?php echo JText::_('VRCSUBMITCOUPON'); ?>"/>
                </div>
            </div>
            <input type="hidden" name="priceid" value="<?php echo $price['idprice']; ?>"/>
            <input type="hidden" name="place" value="<?php echo $place; ?>"/>
            <input type="hidden" name="returnplace" value="<?php echo $returnplace; ?>"/>
            <input type="hidden" name="carid" value="<?php echo $car['id']; ?>"/>
            <input type="hidden" name="days" value="<?php echo $days; ?>"/>
            <input type="hidden" name="pickup" value="<?php echo $first; ?>"/>
            <input type="hidden" name="release" value="<?php echo $second; ?>"/>
            <?php
            if (is_array($selopt)) {
                foreach ($selopt as $aop) {
                    echo '<input type="hidden" name="optid'.$aop['id'].'" value="'.$aop['quan'].'"/>'."\n";
                }
            }
            ?>
            <input type="hidden" name="task" value="oconfirm"/>
        </form>
                </div>
    </div>
	<?php
}
//
?>

		<script language="JavaScript" type="text/javascript">
  		function checkvrcFields(){
  			var vrvar = document.vrc;
			<?php

if (@ is_array($cfields)) {
	foreach ($cfields as $cf) {
		//Si el flag de arriba esta puesto a 1 cambiar el cf del ultimo campo a 1
		if ($cf['id'] == 14 && $requiereinfo == 1){
			//Es el ultimo campo
			$cf['required'] = 1;
		}

		if (intval($cf['required']) == 1) {
			if ($cf['type'] == "text" || $cf['type'] == "textarea" || $cf['type'] == "date") {
			?>
			if(!vrvar.vrcf<?php echo $cf['id']; ?>.value.match(/\S/)) {
				document.getElementById('vrcf<?php echo $cf['id']; ?>').style.color='#ff0000';
				return false;
			}else {
				document.getElementById('vrcf<?php echo $cf['id']; ?>').style.color='';
			}
			<?php

			}elseif ($cf['type'] == "select") {
			?>
			if(!vrvar.vrcf<?php echo $cf['id']; ?>.value.match(/\S/)) {
				document.getElementById('vrcf<?php echo $cf['id']; ?>').style.color='#ff0000';
				return false;
			}else {
				document.getElementById('vrcf<?php echo $cf['id']; ?>').style.color='';
			}
			<?php

			} elseif ($cf['type'] == "checkbox") {
				//checkbox
			?>
			if(vrvar.vrcf<?php echo $cf['id']; ?>.checked) {
				document.getElementById('vrcf<?php echo $cf['id']; ?>').style.color='';
			}else {
				document.getElementById('vrcf<?php echo $cf['id']; ?>').style.color='#ff0000';
				return false;
			}
			<?php

			}
		}
	}
}
?>
  			return true;
  		}
		</script>

        <div class="bubble-cliente test3">
		<form class="formcliente" action="<?php echo JRoute::_('index.php?option=com_vikrentcar'); ?>" name="vrc" method="post" onsubmit="javascript: return checkvrcFields();">
		<?php

if (@ is_array($cfields)) {
	?>
		<div class="cliente-inner">
                        <img src="http://www.carflet.es/images/carflet/drivers.svg" class="item-resumen"/>

            <span class="vrhword"><?php echo JText::_('VRINFOCLIENTE'); ?></span>
<!--            <div class="indexado">1</div>-->
	<?php
	$currentUser = JFactory::getUser();
	$juseremail = !empty($currentUser->email) ? $currentUser->email : "";
	foreach ($cfields as $cf) {
		if ($cf['id'] == 14 && $requiereinfo == 1){
			//Es el ultimo campo
			$cf['required'] = 1;
		}
		if (intval($cf['required']) == 1) {
			$isreq = "<span class=\"vrcrequired\"><sup>*</sup></span> ";
		} else {
			$isreq = "";
		}
		if (!empty ($cf['poplink'])) {
			$fname = "<a href=\"" . $cf['poplink'] . "\" id=\"vrcf" . $cf['id'] . "\" rel=\"{handler: 'iframe', size: {x: 750, y: 600}}\" target=\"_blank\" class=\"modal\">" . JText :: _($cf['name']) . "</a>";
		} else {
			$fname = "<span id=\"vrcf" . $cf['id'] . "\">" . JText :: _($cf['name']) . "</span>";
		}
		if ($cf['type'] == "text") {
			$textmailval = intval($cf['isemail']) == 1 ? $juseremail : "";
		?>
					<div class="vrcdivcustomfield"><div><?php echo $isreq; ?></div><div><input type="text" name="vrcf<?php echo $cf['id']; ?>" value="<?php echo $textmailval; ?>" size="40" class="vrcinputREM campoform" placeholder="<?php echo JText :: _($cf['name']); ?>"/></div></div>
		<?php

		}elseif ($cf['type'] == "textarea") {
		?>
					<div class="vrcdivcustomfield"><div><?php echo $isreq; ?></div><div><textarea name="vrcf<?php echo $cf['id']; ?>" rows="5" cols="30" class="vrctextareaREM campoform" placeholder="<?php echo JText :: _($cf['name']); ?>"></textarea></div></div>
		<?php

		}elseif ($cf['type'] == "date") {
		?>
					<div class="vrcdivcustomfield"><div><?php echo $isreq; ?></div><div><?php echo JHTML::_('calendar', '', 'vrcf'.$cf['id'], 'vrcf'.$cf['id'].'date', $nowdf, array('class'=>'vrcinput', 'size'=>'10',  'maxlength'=>'19')); ?></div></div>
		<?php

		}elseif ($cf['type'] == "select") {
			$answ = explode(";;__;;", $cf['choose']);
			$wcfsel = "<select name=\"vrcf" . $cf['id'] . "\">\n";
			foreach ($answ as $aw) {
				if (!empty ($aw)) {
					$wcfsel .= "<option value=\"" . $aw . "\">" . $aw . "</option>\n";
				}
			}
			$wcfsel .= "</select>\n";
		?>
					<div class="vrcdivcustomfield"><div><?php echo $isreq; ?><?php echo $fname; ?> </div><div><?php echo $wcfsel; ?></div></div>
		<?php

		}elseif ($cf['type'] == "separator") {
			$cfsepclass = strlen(JText::_($cf['name'])) > 30 ? "vrcseparatorcflong" : "vrcseparatorcf";
		?>

		<?php
		}else {
		?>
					<div class="vrcdivcustomfield vrccustomfldinfo"><div><?php echo $isreq; ?><?php echo $fname; ?> </div><div><input type="checkbox" name="vrcf<?php echo $cf['id']; ?>" value="1"/></div></div>
		<?php
		}
	}
?>

	<div class="warning-sect test7">
			<img src="http://www.carflet.es/images/warning.svg">
			<p>Si ha usado un cupón es posible que el último campo le aparezca marcado con un asterisco. Su proveedor de cupones ha debido de facilitarle un código de seguridad que debe introducir en dicho campo.</p>
			<img src="http://www.carflet.es/images/warning.svg">
  		<p>El conductor ha ser mayor de 21 años. Si tiene entre 21 y 25 años tendrá cargos adicionales de 20€/día</p>
			<img src="http://www.carflet.es/images/warning.svg">
			<p>El conductor ha de tener una antigüedad en el permiso de conducir de al menos 12 meses</p>
  </div>
		</div>
		<?php

}
?>
		<input type="hidden" name="days" value="<?php echo $days; ?>"/>
		<?php
		//vikrentcar 1.6
		if($origdays) {
			?>
			<input type="hidden" name="origdays" value="<?php echo $origdays; ?>"/>
			<?php
		}
		//
		?>
		<input type="hidden" name="pickup" value="<?php echo $first; ?>"/>
		<input type="hidden" name="release" value="<?php echo $second; ?>"/>
		<input type="hidden" name="car" value="<?php echo $car['id']; ?>"/>
		<input type="hidden" name="prtar" value="<?php echo $price['id']; ?>"/>
		<input type="hidden" name="priceid" value="<?php echo $price['idprice']; ?>"/>
		<input type="hidden" name="optionals" value="<?php echo $wop; ?>"/>
		<input type="hidden" name="totdue" value="<?php echo $totdue; ?>"/>
		<input type="hidden" name="place" value="<?php echo $place; ?>"/>
		<input type="hidden" name="returnplace" value="<?php echo $returnplace; ?>"/>
		<?php
		if(array_key_exists('hours', $price)) {
			?>
		<input type="hidden" name="hourly" value="<?php echo $price['hours']; ?>"/>
			<?php
		}
		if($usedcoupon == true && is_array($coupon)) {
			?>
		<input type="hidden" name="couponcode" value="<?php echo $coupon['code']; ?>"/>
			<?php
		}
		?>
		<?php echo $tok; ?>
		<input type="hidden" name="task" value="saveorder"/>
		<?php

if (@ is_array($payments)) {
	?>
    <div class="bubble-pagos">
        <div class="pagos-inner">
            <img src="http://www.carflet.es/images/carflet/tarjeta.svg" class="item-resumen"/>
            <span class="vrhword"><?php echo JText::_('VRINFOPAGO'); ?></span>
        <ul style="list-style-type: none;">
        <?php
        foreach ($payments as $pk => $pay) {
            $rcheck = $pk == 1 ? " checked=\"checked\"" : "";
            $saypcharge = "";
            if ($pay['charge'] > 0.00) {
                $decimals = $pay['charge'] - (int)$pay['charge'];
                if($decimals > 0.00) {
                    $okchargedisc = vikrentcar::numberFormat($pay['charge']);
                }else {
                    $okchargedisc = number_format($pay['charge'], 0);
                }
                $saypcharge .= " (".($pay['ch_disc'] == 1 ? "+" : "-");
                $saypcharge .= "<span class=\"vrcprice\">" . $okchargedisc . "</span> <span class=\"vrccurrency\">" . ($pay['val_pcent'] == 1 ? $currencysymb : "%") . "</span>";
                $saypcharge .= ")";
            }
        ?>
            <li><input type="radio" name="gpayid" value="<?php echo $pay['id']; ?>" id="gpay<?php echo $pay['id']; ?>"<?php echo $rcheck; ?>/> <label for="gpay<?php echo $pay['id']; ?>"><?php echo $pay['name'].$saypcharge;?></label></li>
        <?php
        }
        ?>
            </ul>
					<div class="warning-sect">
							<img src="http://www.carflet.es/images/warning.svg">
				  		<p>El uso de tarjetas de débito conlleva 10€ de gastos de gestión</p>
  					</div>
					<div class="warning-sect">
							<img src="http://www.carflet.es/images/warning.svg">
				  		<p>Al recoger el coche deberá presentar: <br>1. Tarjeta de crédito/débito; <br>2. Permiso de conducir; <br>3. DNI o Pasaporte</p>
  					</div>
            </div>
    </div>
		<br/>
		<p class="confirmation-text">Al confirmar reserva recibirá un correo electrónico con los datos de su reserva y se le mostrará una página similar a esta donde podrá proceder al pago.</p>
	<?php
}
?>

        <div class="acciones">
            				<a href="javascript: void(0);" onclick="javascript: window.history.back();"><?php echo JText::_('VRBACK'); ?></a>
            <input type="submit" name="saveorder" value="<?php echo JText::_('VRORDCONFIRM'); ?>" class="booknow5"/>
        </div>



            <?php

    $pitemid = JRequest :: getInt('Itemid', '', 'request');
    if (!empty ($pitemid)) {
    ?>
                <input type="hidden" name="Itemid" value="<?php echo $pitemid; ?>"/>
                <?php

    }
    ?>
            </form>
            </div>
        </div>
        </div>
    </div>
</div>

		<?php

?>
