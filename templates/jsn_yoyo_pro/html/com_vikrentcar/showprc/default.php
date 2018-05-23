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

//load jQuery lib and navigation J3.x
$document = & JFactory :: getDocument();
if(vikrentcar::loadJquery()) {
	JHtml::_('jquery.framework', true, true);
	JHtml::_('script', JURI::root().'components/com_vikrentcar/resources/jquery-1.10.2.min.js', false, true, false, false);
}
$document->addStyleSheet(JURI::root().'components/com_vikrentcar/resources/jquery.fancybox.css');
JHtml::_('script', JURI::root().'components/com_vikrentcar/resources/jquery.fancybox.js', false, true, false, false);
$navdecl = '
jQuery.noConflict();
jQuery(document).ready(function() {
	jQuery(".vrcmodal").fancybox({
		"helpers": {
			"overlay": {
				"locked": false
			}
		},"padding": 0
	});
});';
$document->addScriptDeclaration($navdecl);
//

$tars=$this->tars;
$car=$this->car;
$pickup=$this->pickup;
$release=$this->release;
$place=$this->place;

$document->addStyleSheet(JURI::root().'templates/e4jeasyhiring/html/com_vikrentcar/vikrentcar_theme.css');
$document->addStyleSheet(JURI::root().'templates/jsn_yoyo_pro/html/com_vikrentcar/vikrentcar_theme.css');

$nowdf = vikrentcar :: getDateFormat();
if ($nowdf == "%d/%m/%Y") {
	$df = 'd/m/Y';
}elseif ($nowdf == "%m/%d/%Y") {
	$df = 'm/d/Y';
}else {
	$df = 'Y/m/d';
}

//echo vikrentcar :: getFullFrontTitle();

$preturnplace = JRequest :: getString('returnplace', '', 'request');
//$carats=vikrentcar::getCarCarat($car['idcarat']);
$carats = vikrentcar::getCarCaratOriz($car['idcarat']);
$currencysymb = vikrentcar :: getCurrencySymb();
if (!empty ($car['idopt'])) {
	$optionals = vikrentcar :: getCarOptionals($car['idopt']);
}
$discl = vikrentcar :: getDisclaimer();
$categoriavehiculo = $car['idcat'];
if($categoriavehiculo == 15){
	$flagcar = false;
	$proba = "es furgo";
} else {
	$flagcar = true;
	$proba = "es coche";
}
?>

         <?php
                if(strlen($car['moreimgs']) > 0) {
                        $moreimages = explode(';;', $car['moreimgs']);
                    $imagencool = $moreimages[0];
                }
         ?>

<div class="reserva-comun-cont wizardoptions test2">
    <section>
        <div class="wizard">
            <div class="wizard-inner">
                <div class="connecting-line"></div>
                <div class="connecting-checked2"></div>
                     <ul class="nav nav-tabs">
                        <li class="disabled">
                            <a href="#" class="wizard-checked" title="">
                                <img src="http://carflet.es/images/carflet/checked.svg" class="bubble-icon">
                            </a>
                            <p>Recogida y Devolución</p>
                        </li>

                    <li class="disabled">
											<?php if($flagcar == true) {?>
                        <a href="#" class="wizard-checked" title="">
<img src="http://carflet.es/images/carflet/checked.svg" class="bubble-icon">
                        </a>
													<p>Coche</p>
												<?php } else {?>
													<a href="#" title="" class="wizard-checked">
	<img src="http://carflet.es/images/carflet/checked.svg" class="bubble-icon">
													</a>
													<p>Furgoneta</p>
                        <?php } ?>
                    </li>
                    <li  class="active">
                        <a href="#" title="">
<img src="http://carflet.es/images/carflet/opcionesblue.svg" class="bubble-icon">
                        </a>
                        <p>Tarifa y Opciones</p>
                    </li>

                    <li class="disabled">
                        <a href="#" title="">
<img src="http://carflet.es/images/carflet/desgloseblue.svg" class="bubble-icon">
                        </a>
                        <p>Resumen</p>
                    </li>
                </ul>
            </div>
        <div class="card-info">
        <div class="circled"></div>
        <h2>Tarifa y Opciones</h2>
                        <img src="http://carflet.es/images/carflet/locate.svg" class="avatar-icon">
</div>
        </div>

    </section>

<div class="main-cont-coche">
    <div class="reserva-inner-cont" style="padding-bottom: 0;">
<div class="cardetallado">
<!--<header>
    <div class="imagen-reserva">
        <div class="desc">
            <div class="avatar-car-cont">
                <img src="http://carflet.es/images/carflet/reservar2.svg" class="avatar-car">                 </div>
            <h1>Reserva en Carflet</h1>
            <ul class="guide">
              <li></li>
              <li></li>
              <li class="selected"></li>
              <li></li>
            </ul>
        </div>
    </div>
</header>-->


<form action="<?php echo JRoute::_('index.php?option=com_vikrentcar'); ?>" method="post">
        <div class="tarifa-cont" style="background-size: cover; background-position: center center; background-image: url('<?php echo JURI::root(); ?>administrator/components/com_vikrentcar/resources/big_<?php echo $imagencool; ?>')">
        <div class="overlay-tarifa">
		<div class="car_container">
            <div class="bubble-tarifa" style="width:90%; margin: 0 auto; margin-top: 10px;">
                <img width="200" style="display:block;" src="<?php echo JURI::root(); ?>administrator/components/com_vikrentcar/resources/big_<?php echo $imagencool; ?>";
			<?php
			if(array_key_exists('hours', $tars[0])) {
				?>
                
				<p class="car_title"><span class="vrthemenamecar"><?php echo $car['name']; ?></span> <span class="vrhwordthemefor">Precios <?php echo JText::_('VRFOR'); ?> <?php echo (intval($tars[0]['hours']) == 1 ? "1 ".JText::_('VRCHOUR') : $tars[0]['hours']." ".JText::_('VRCHOURS')); ?></span></p>

				<?php
			}else {
				?>
            
				<p class="car_title"><span class="vrthemenamecar"> <?php echo $car['name']; ?></span> <span class="vrhwordthemefor">Precios <?php echo JText::_('VRFOR'); ?> <?php echo (intval($tars[0]['days']) == 1 ? "1 ".JText::_('VRDAY') : $tars[0]['days']." ".JText::_('VRDAYS')); ?></span></p>
				<?php
			}
			?>
            </div>
        <!--inicio car cont-->
		<!--end car cont -->

		<div class="car_pricesREMOVE bubble-precios">
					<span class="vrhword"><?php echo JText::_('VRPRICE'); ?>:</span>
					<div class="vrccarpricethemeREMOVE listatarifas">
					<?php foreach($tars as $k=>$t){ ?>
						<div class="vrccarpricethemedivREMOVE tarifaslistadas">
							<?php if($flagcar == true) {?>
								<div class="vrccarpriceqnttheme"><input type="radio" name="priceid" id="pid<?php echo $t['idprice']; ?>" value="<?php echo $t['idprice']; ?>"<?php echo ($k==1 ? " checked=\"checked\"" : ""); ?>/></div>
							<?php } else {?>
								<div class="vrccarpriceqnttheme"><input type="radio" name="priceid" id="pid<?php echo $t['idprice']; ?>" value="<?php echo $t['idprice']; ?>"<?php echo ($k==0 ? " checked=\"checked\"" : ""); ?>/></div>
							<?php }?>
		                    <?php if($k==1){ ?>
		                    <div class="tarifa-tooltip" id="ampliada-tooltip">
		                    </div>
		                    <?php } ?>
							<div class="vrccarpricedettheme">
                                <label for="pid<?php echo $t['idprice']; ?>">
                                    <div>
                                        <span class="vrccarpricedetnametheme">
                                            <?php echo vikrentcar::getPriceName($t['idprice']).":</span> <span class=\"vrccarpricepricetheme\">".$currencysymb." ".vikrentcar::numberFormat(vikrentcar::sayCostPlusIva($t['cost'], $t['idprice']))."</span>".(strlen($t['attrdata']) ? "</div><div>".vikrentcar::getPriceAttr($t['idprice']).": ".$t['attrdata'] : ""); ?></div></label><div class="check"></div>
                           	<?php if($k==0){ ?>
		                    <div class="tarifa-tooltip" id="hola-basica-tooltip">
                                  <img src="http://www.carflet.es/images/carflet/km.svg"><p>350km/dia |</p>
                                  <img src="http://www.carflet.es/images/carflet/robo.svg"><p> Cobertura colisión y robo | </p>
                                  <img src="http://www.carflet.es/images/carflet/heart.svg"><p>Asistencia daños personales |</p>
                                  <img src="http://www.carflet.es/images/carflet/franquicia.svg"><p>Franquicia de al menos 1200€</p>
		                    </div>
		                    		<?php } ?>
														<?php if($k==1){ ?>
		                    <div class="tarifa-tooltip" id="hola-ampliada-tooltip">
                                  <img src="http://www.carflet.es/images/carflet/km.svg"><p>Km ilimitados |</p>
                                  <img src="http://www.carflet.es/images/carflet/robo.svg"><p>Protección contra robo | </p>
                                  <img src="http://www.carflet.es/images/carflet/lunas.svg"><p>Protección de lunas |</p>
                                  <img src="http://www.carflet.es/images/carflet/plane.svg"><p>Tasas aeropuerto y estación |</p>
																	<img src="http://www.carflet.es/images/carflet/adicional.svg"><p>Conductor adicional</p>
		                    </div>
		                    		<?php } ?>

                            </div>
						</div>
					<?php } ?>
					<p style="text-align: left;">*Cupones y descuentos no aplicables en tarifa básica</p>
					<p style="display:none;"><?php print_r($tars) ?></p>
					</div>
		</div>
		<?php

if (!empty ($car['idopt']) && is_array($optionals)) {
?>
		<div class="car_optionsREMOVE bubble-opciones">
			<span class="vrhword"><?php echo JText::_('VRACCOPZ'); ?>:</span>
            <div class="listaopciones">

			<?php

	foreach ($optionals as $k => $o) {
		$optcost = intval($o['perday']) == 1 ? ($o['cost'] * $tars[0]['days']) : $o['cost'];
		if (!empty ($o['maxprice']) && $o['maxprice'] > 0 && $optcost > $o['maxprice']) {
			$optcost = $o['maxprice'];
		}
		$optcost = $optcost * 1;
		//VRC 1.7 Rev.2
		if(!((int)$tars[0]['days'] > (int)$o['forceifdays'])) {
			continue;
		}
		//
		//vikrentcar 1.6
		if(intval($o['forcesel']) == 1) {
			//VRC 1.7 Rev.2
			if((int)$tars[0]['days'] > (int)$o['forceifdays']) {
				$forcedquan = 1;
				$forceperday = false;
				if(strlen($o['forceval']) > 0) {
					$forceparts = explode("-", $o['forceval']);
					$forcedquan = intval($forceparts[0]);
					$forceperday = intval($forceparts[1]) == 1 ? true : false;
				}
				$setoptquan = $forceperday == true ? $forcedquan * $tars[0]['days'] : $forcedquan;
				if(intval($o['hmany']) == 1) {
					$optquaninp = "<input type=\"hidden\" name=\"optid".$o['id']."\" value=\"".$setoptquan."\"/><span class=\"vrcoptionforcequant\"><small>x</small> ".$setoptquan."</span>";
				}else {
					$optquaninp = "<input type=\"hidden\" name=\"optid".$o['id']."\" value=\"".$setoptquan."\"/><span class=\"vrcoptionforcequant\"><small>x</small> ".$setoptquan."</span>";
				}
			}else {
				continue;
			}
			//
		}else {
			if(intval($o['hmany']) == 1) {
				$optquaninp = "<input type=\"text\" name=\"optid".$o['id']."\" value=\"0\" size=\"1\"/>";
			}else {
				$optquaninp = "<input type=\"checkbox\" name=\"optid".$o['id']."\" value=\"1\"/>";
			}
		}
		//
		$classAmpli = (($o['id'] == 5) || ($o['id'] == 6)) ? 'solo-ampli' : '';
		?>
			<div class="vrcoptiontheme opcioneslistadas <?php echo $classAmpli; ?>">
				<div class="vrcoptionqnttheme"><?php echo $optquaninp; ?></div>
				<div class="vrcoptionimgtheme">
				<?php echo (!empty($o['img']) ? "<img class=\"maxthirty\" src=\"".JURI::root()."administrator/components/com_vikrentcar/resources/".$o['img']."\" align=\"middle\" />" : "") ?>
                </div>
				<div class="vrcoptiondetailstheme">
				<span class="vrcoptionnamethemeREMOVE"><?php echo $o['name']; ?></span>
				<?php if(strlen(strip_tags(str_replace("&#160;", "", trim($o['descr']))))){ ?>
					<div class="vrcoptionaldescr"><?php echo $o['descr']; ?></div>
				<?php } ?>
				</div>
				<div class="vrcoptionpricetheme"><?php echo $currencysymb; ?> <?php echo vikrentcar::numberFormat(vikrentcar::sayOptionalsPlusIva($optcost, $o['idiva'])); ?></div>

			</div>


			<?php

	}
	?>

		</div>
	</div>
		<?php

}
?>

		<input type="hidden" name="place" value="<?php echo $place; ?>"/>
		<input type="hidden" name="returnplace" value="<?php echo $preturnplace; ?>"/>
		<input type="hidden" name="carid" value="<?php echo $car['id']; ?>"/>
  		<input type="hidden" name="days" value="<?php echo $tars[0]['days']; ?>"/>
  		<input type="hidden" name="pickup" value="<?php echo $pickup; ?>"/>
  		<input type="hidden" name="release" value="<?php echo $release; ?>"/>
  		<input type="hidden" name="task" value="oconfirm"/>
  		<?php

$pitemid = JRequest :: getInt('Itemid', '', 'request');
if (!empty ($pitemid)) {
?>
			<input type="hidden" name="Itemid" value="<?php echo $pitemid; ?>"/>
			<?php

}
?>
		<br clear="all">

  		<?php if(strlen($discl)){ ?>
			<div class="car_disclaimer"><?php echo $discl; ?></div>
		<?php } ?>

<!--		<div class="car_buttons_box">-->

        <div class="acciones">
            				<a href="javascript: void(0);" onclick="javascript: window.history.back();"><?php echo JText::_('VRBACK'); ?></a>
            <input type="submit" name="goon" value="<?php echo JText::_('VRBOOKNOW'); ?>" class="booknow5"/>
        </div>

		</div>
            </div>
            </div>
</form>
    </div>
        </div>
    </div>
    <div class="sidebar-help">
        <div class="recodevol">
            <div class="recodevo-cont">
                 <img class="heading-icon" src="http://www.carflet.es/images/carflet/arrowright.svg" alt="Recogida de Coche" title="Recogida del Coche"><span class="title-side">Recogida</span>
                <div class="row-reco">
                    <img src="http://www.carflet.es/images/carflet/locateblue.svg" height="32" alt="Lugar Recogida de Coche" title="Lugar Recogida del Coche">
                    <p><?php echo vikrentcar::getPlaceName($place); ?></p>
                </div>
                <div class="row-reco">
                    <img src="http://www.carflet.es/images/carflet/calendarblue.svg" height="32" alt="Fecha y Hora Recogida de Coche" title="Fecha y Hora Recogida del Coche">
                    <p><?php echo date($df.' H:i', $pickup); ?></p>
                </div>
            </div>

        </div>
        <div class="recodevol">
            <div class="recodevo-cont">
                <img class="heading-icon" src="http://www.carflet.es/images/carflet/arrowleft.svg" alt="Devolución de Coche" title="Devolución del Coche"><span class="title-side">Devolución</span>
                <div class="row-reco">
                    <img src="http://www.carflet.es/images/carflet/locateblue.svg" height="32" alt="Lugar Devolución de Coche" title="Lugar Devolución del Coche">
                    <p><?php echo vikrentcar::getPlaceName($preturnplace); ?></p>
                </div>
                <div class="row-reco">
                    <img src="http://www.carflet.es/images/carflet/calendarblue.svg" height="32" alt="Fecha y Hora Recogida de Coche" title="Fecha y Hora Recogida del Coche">
                    <p><?php echo date($df.' H:i', $release); ?></p>
                </div>
            </div>

        </div>

				<?php if($flagcar == true) {?>
        <div class="recodevol">
            <div class="recodevo-cont">
                <img class="heading-icon" src="http://www.carflet.es/images/carflet/tarifas.svg" alt="Tipos de Tarifa" title="Tipos de Tarifa"><span class="title-side">Tipos de Tarifa</span>
                <span class="title-side">Tarifa Básica</span>
                <div class="row-reco">
                    <img src="http://www.carflet.es/images/carflet/km.svg" height="32" alt="Kilometros limitados" title="Kilometros limitados">
                    <p>350 Km/día</p>
                </div>
                <div class="row-reco">
                    <img src="http://www.carflet.es/images/carflet/robo.svg" height="32" alt="Cobertura contra colisión y robo" title="Cobertura contra colisión y robo">
                    <p>Cobertura contra colisión y robo</p>
                </div>
                <div class="row-reco">
                    <img src="http://www.carflet.es/images/carflet/heart.svg" height="32" alt="Asistencia Daños Personales" title="Asistencia Daños Personales">
                    <p>Asistencia Daños Personales</p>
                </div>
                <div class="row-reco">
                    <img src="http://www.carflet.es/images/carflet/franquicia.svg" height="32" alt="Franquicia" title="Franquicia">
                    <p>Franquicia de 1200€ (grupos A,B)</p>
                    <p>1500€ para el resto</p>
                </div>
                <span class="title-side">Tarifa Ampliada</span>
                <div class="row-reco">
                    <img src="http://www.carflet.es/images/carflet/robo.svg" height="32" alt="Proteccion contra robo" title="Proteccion contra robo">
                    <p>Protección contra robo</p>
                </div>
								<div class="row-reco">
										<img src="http://www.carflet.es/images/carflet/robo.svg" height="32" alt="Proteccion contra daños" title="Proteccion contra daños">
										<p>Protección contra daños en el vehículo, causados por propios o ajenos</p>
								</div>
                <div class="row-reco">
                    <img src="http://www.carflet.es/images/carflet/plane.svg" height="32" alt="Tasas aeropuerto y estación" title="Tasas aeropuerto y estación">
                    <p>Tasas aeropuerto y estación</p>
                </div>

            </div>

        </div>
				<?php } ?>


    </div>
    </div>

		<?php

?>
