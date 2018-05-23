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

$res=$this->res;
$days=$this->days;
$pickup=$this->pickup;
$release=$this->release;
$place=$this->place;
$navig=$this->navig;
$tars=$this->tars;

$document->addStyleSheet(JURI::root().'templates/e4jeasyhiring/html/com_vikrentcar/vikrentcar_theme.css');
$document->addStyleSheet(JURI::root().'templates/jsn_yoyo_pro/html/com_vikrentcar/vikrentcar_theme.css');

$currencysymb = vikrentcar :: getCurrencySymb();
$nowdf = vikrentcar :: getDateFormat();
if ($nowdf == "%d/%m/%Y") {
	$df = 'd/m/Y';
}elseif ($nowdf == "%m/%d/%Y") {
	$df = 'm/d/Y';
}else {
	$df = 'Y/m/d';
}

$flagcoche = false;
$proba = "es furgo";

foreach ($res as $k => $r) {
	$getcarsample = vikrentcar :: getCarInfo($k);
	$carsamplecat = vikrentcar::sayCategory($getcarsample['idcat']);
	if($carsamplecat != "Furgonetas"){
		$flagcoche = true;
		$proba = "es coche";
	}
}



?>

<div class="reserva-comun-cont wizardcoches testfurgos8">
    <section>
        <div class="wizard">
            <div class="wizard-inner">
                <div class="connecting-line"></div>
                <div class="connecting-checked1"></div>
                     <ul class="nav nav-tabs">
                        <li class="disabled">
                            <a href="#" class="wizard-checked" title="">
                                <img src="http://carflet.es/images/carflet/checked.svg" class="bubble-icon">
                            </a>
                            <p>Recogida y Devolución</p>
														<h2></h2>
                        </li>

                    <li class="active">
											<?php if($flagcoche == true) {?>
                        <a href="#" title="">
<img src="http://carflet.es/images/carflet/cocheblue.svg" class="bubble-icon">
                        </a>
													<p>Coche</p>
												<?php } else {?>
													<a href="#" title="">
	<img src="http://carflet.es/images/carflet/cocheblue.svg" class="bubble-icon">
													</a>
													<p>Furgoneta</p>
                        <?php } ?>
                    </li>
                    <li  class="disabled">
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
        </div>
    <div class="card-info">
      <div class="circled"></div>
			<?php if($flagcoche == true) {?>
      		<h2>Selección de Coche</h2>
       		<img src="http://carflet.es/images/carflet/cochewhite.svg" class="avatar-icon"/>
			<?php } else {?>
					<h2>Selección de Furgoneta</h2>
					<img src="http://carflet.es/images/carflet/cochewhite.svg" class="avatar-icon"/>
			<?php } ?>
    </div>
    </section>
    <div class="main-cont-cars">
        <p class="pie-coche test">*Descuentos y cupones no aplicables en tarifa básica</p>
    <div class="reserva-cars-inner-cont">
                <header>
<!--                  <div class="imagen-reserva">
                    <div class="desc">
                        <div class="avatar-car-cont">
                          <img src="http://carflet.es/images/carflet/reservar2.svg" class="avatar-car"/>
                        </div>
                        <h1>Reserva en Carflet</h1>
                        <ul class="guide">
                          <li></li>
                          <li class="selected"></li>
                          <li></li>
                          <li></li>
                        </ul>
                    </div>
                  </div>-->
                </header>


        <div class="listadocochesreserva">             
            <div class="cards flex-element flex-row flex-row-wrap flex-hcenter">

		<?php

$returnplace = JRequest :: getInt('returnplace', '', 'request');
$pitemid = JRequest :: getInt('Itemid', '', 'request'); ?>
<!--<ul class="vrclist">-->
<?php
foreach ($res as $k => $r) {
	$getcar = vikrentcar :: getCarInfo($k);
	//$carats = vikrentcar :: getCarCarat($getcar['idcarat']);
	$carats = vikrentcar :: getCarCaratOriz($getcar['idcarat']);
	$categoria = vikrentcar::sayCategory($getcar['idcat']);

	$r[1]['affdays'] = $r[0]['affdays'];

	if($r[1]['affdays'] != 0){
            //CAMBIAR EL MES CUANDO SEA OPORTUNO
			if(date('m',$pickup) == "3"){
                if(date('d',$pickup) > 16){
                        $r[1]['cost'] = round($r[1]['cost']*1.1, 2, PHP_ROUND_HALF_UP);
                }

                if (date('d',$pickup) < 12) {
                        $r[1]['cost'] = round($r[1]['cost']*0.6, 2, PHP_ROUND_HALF_UP);
                }
			}

			if(date('m',$pickup) == "4"){
				$r[1]['cost'] = round($r[1]['cost']*1.2, 2, PHP_ROUND_HALF_UP); 
			}
        //DESCUENTO, NO HAY NADA MAS
        $r[1]['cost'] = round($r[1]['cost'], 0, PHP_ROUND_HALF_UP) - round($r[1]['cost']*0.2, 0, PHP_ROUND_HALF_UP);

	}
    
    if($place != $returnplace){
        $r[1]['cost'] = $r[1]['cost'] + 20;
    }
    
    
    
//        if($pickup == 56 && $release == 3){
//            $r[1]['cost'] = $r[1]['cost'] - 40;
//        } else {
////            
//        }

?>
<!--            <div class="row row-card">-->
			<?php

					if($flagcoche == true) {
						if($categoria != "Furgonetas"){
			?>
			<div class="car-card">
			<form action="<?php echo JRoute::_('index.php?option=com_vikrentcar'); ?>" method="get">
			<input type="hidden" name="option" value="com_vikrentcar"/>
  			<input type="hidden" name="caropt" value="<?php echo $k; ?>"/>
  			<input type="hidden" name="days" value="<?php echo $days; ?>"/>
  			<input type="hidden" name="pickup" value="<?php echo $pickup; ?>"/>
  			<input type="hidden" name="release" value="<?php echo $release; ?>"/>
  			<input type="hidden" name="place" value="<?php echo $place; ?>"/>
  			<input type="hidden" name="returnplace" value="<?php echo $returnplace; ?>"/>
  			<input type="hidden" name="task" value="showprc"/>
  			<?php
				$vcategory = vikrentcar::sayCategory($getcar['idcat']);
			?>
<!--				<div class="vrcthemeinfocar">
					<span class="vrclistcarname"><?php echo $getcar['name']; ?></span>
					<span class="vrclistcarcat"><?php echo $vcategory; ?></span>
				</div>-->


            <div class="flex-element flex-row flex-row-wrap">
                <?php
                    if(strlen($getcar['moreimgs']) > 0) {
                    $moreimages = explode(';;', $getcar['moreimgs']);
                    $imagencool = $moreimages[0];
                ?>

                     <img class="vrclistcarsimagen" src="<?php echo JURI::root(); ?>administrator/components/com_vikrentcar/resources/big_<?php echo $imagencool; ?>"/>
                <?php
                    }
                ?>
                <div class="bubble-car">
                    <h1><?php echo $getcar['name']; ?></h1>
                    <h2><?php echo $vcategory;?></h2>
                    <div class="vrclistcardescr"><?php echo (strlen(strip_tags($getcar['info'])) > 200 ? substr(strip_tags($getcar['info']), 0, 200).' ...' : $getcar['info']); ?></div>
                                    <p class="tank">Combustible Lleno/Lleno</p>
                    <div class="bubble-caracts">
                        <?php echo $carats;?>
                    </div>
                   
                </div>


                <div class="bubble-price test3">
                                <?php if($flagcoche == true) {?>
                                        <div class="tarifas">
                            <p>*Básica Precio Final</p>
                                            <p><?php echo ""."</span> <span class=\"vrccarpricepricetheme\">"." ".vikrentcar::numberFormat(vikrentcar::sayCostPlusIva($r[0]['cost'], $r[0]['idprice']))."</span>".(strlen($r[0]['attrdata']) ? "</div><div>".vikrentcar::getPriceAttr($r[0]['idprice']).": ".$r[0]['attrdata'] : "".$currencysymb); ?></p>
                                        </div>
                                        <div class="tarifas">
                                            <p>Ampliada Precio Final</p>
                                            <p><?php echo ""."</span> <span class=\"vrccarpricepricetheme\">"." ".vikrentcar::numberFormat(vikrentcar::sayCostPlusIva($r[1]['cost'], $r[1]['idprice']))."</span>".(strlen($r[1]['attrdata']) ? "</div><div>".vikrentcar::getPriceAttr($r[1]['idprice']).": ".$r[1]['attrdata'] : "".$currencysymb); ?></p>
                                        </div>
                                <?php } else {?>
                                    <div class="tarifas">
                                        <p>*Furgonetas Precio Final</p>
                                        <p><?php echo ""."</span> <span class=\"vrccarpricepricetheme\">"." ".vikrentcar::numberFormat(vikrentcar::sayCostPlusIva($r[0]['cost'], $r[0]['idprice']))."</span>".(strlen($r[0]['attrdata']) ? "</div><div>".vikrentcar::getPriceAttr($r[0]['idprice']).": ".$r[0]['attrdata'] : "".$currencysymb); ?></p>
                                    </div>
                                <?php } ?>
                </div>
                <div class="bubble-elegir">
                    <input type="submit" name="goon" value="<?php echo JText::_('VRPROSEGUI'); ?>" class="booknow3"/>
                </div>
            </div>

			<?php

	if (!empty ($pitemid)) {
?>
				<input type="hidden" name="Itemid" value="<?php echo $pitemid; ?>"/>
				<?php

	}
?>
			</form>
    </div>


		<?php } } else {?>
			<div class="car-card">
			<form action="<?php echo JRoute::_('index.php?option=com_vikrentcar'); ?>" method="get">
			<input type="hidden" name="option" value="com_vikrentcar"/>
  			<input type="hidden" name="caropt" value="<?php echo $k; ?>"/>
  			<input type="hidden" name="days" value="<?php echo $days; ?>"/>
  			<input type="hidden" name="pickup" value="<?php echo $pickup; ?>"/>
  			<input type="hidden" name="release" value="<?php echo $release; ?>"/>
  			<input type="hidden" name="place" value="<?php echo $place; ?>"/>
  			<input type="hidden" name="returnplace" value="<?php echo $returnplace; ?>"/>
  			<input type="hidden" name="task" value="showprc"/>
  			<?php
				$vcategory = vikrentcar::sayCategory($getcar['idcat']);
			?>
<!--				<div class="vrcthemeinfocar">
					<span class="vrclistcarname"><?php echo $getcar['name']; ?></span>
					<span class="vrclistcarcat"><?php echo $vcategory; ?></span>
				</div>--><!--				<div class="vrcthemeinfocar">
					<span class="vrclistcarname"><?php echo $getcar['name']; ?></span>
					<span class="vrclistcarcat"><?php echo $vcategory; ?></span>
				</div>-->

                
            <div class="flex-element flex-row flex-row-wrap">
                            <?php
                    if(strlen($getcar['moreimgs']) > 0) {
                    $moreimages = explode(';;', $getcar['moreimgs']);
                    $imagencool = $moreimages[0];
                ?>

                     <img class="vrclistcarsimagen" src="<?php echo JURI::root(); ?>administrator/components/com_vikrentcar/resources/big_<?php echo $imagencool; ?>"/>
                			<?php
			}
			?>
                            <div class="bubble-car">
                <h1><?php echo $getcar['name']; ?></h1>
                <h2><?php echo $vcategory; ?></h2>
                <div class="vrclistcardescr"><?php echo (strlen(strip_tags($getcar['info'])) > 200 ? substr(strip_tags($getcar['info']), 0, 200).' ...' : $getcar['info']); ?></div>
								<p class="tank">Combustible Lleno/Lleno</p>
                                            <div class="bubble-caracts">
                <?php echo $carats; ?>
                <p class="pie-coche test">*Descuentos y cupones no aplicables en tarifa básica</p>
            </div>
            </div>


            <div class="bubble-price">
							<?php if($flagcoche == true) {?>
									<div class="tarifas">
		                <p>*Básica Precio Final</p>
										<p><?php echo ""."</span> <span class=\"vrccarpricepricetheme\">"." ".vikrentcar::numberFormat(vikrentcar::sayCostPlusIva($r[0]['cost'], $r[0]['idprice']))."</span>".(strlen($r[0]['attrdata']) ? "</div><div>".vikrentcar::getPriceAttr($r[0]['idprice']).": ".$r[0]['attrdata'] : "".$currencysymb); ?></p>
									</div>
									<div class="tarifas">
										<p>Ampliada Precio Final</p>
										<p><?php echo ""."</span> <span class=\"vrccarpricepricetheme\">"." ".vikrentcar::numberFormat(vikrentcar::sayCostPlusIva($r[0]['cost'], $r[1]['idprice']))."</span>".(strlen($r[1]['attrdata']) ? "</div><div>".vikrentcar::getPriceAttr($r[1]['idprice']).": ".$r[1]['attrdata'] : "".$currencysymb); ?></p>
									</div>
							<?php } else {?>
								<div class="tarifas">
									<p>*Furgonetas Precio Final</p>
									<p><?php echo ""."</span> <span class=\"vrccarpricepricetheme\">"." ".vikrentcar::numberFormat(vikrentcar::sayCostPlusIva($r[0]['cost'], $r[0]['idprice']))."</span>".(strlen($r[0]['attrdata']) ? "</div><div>".vikrentcar::getPriceAttr($r[0]['idprice']).": ".$r[0]['attrdata'] : "".$currencysymb); ?></p>
								</div>
							<?php } ?>
            </div>
						<?php if($flagcoche == true) {?>
						<?php }?>
            <div class="bubble-elegir">
                <input type="submit" name="goon" value="<?php echo JText::_('VRPROSEGUI'); ?>" class="booknow3"/>
            </div>
                
            </div>






			<?php

	if (!empty ($pitemid)) {
?>
				<input type="hidden" name="Itemid" value="<?php echo $pitemid; ?>"/>
				<?php

	}
?>
			</form>
    </div>
		<?php } ?>
		<?php if($categoria != "Furgonetas"){?>
											<p style="display:none;"><?php print_r(date('m',$pickup)) ?></p>
											<p style="display:none;"><?php print_r($release) ?></p>
													
		<?php }?>



			<?php

}
?>
<!--ESA ES LA LLAVE DEL FOREACH-->

        </div>
                <?php

                    //pagination
                    if(strlen($navig) > 0) {
                        echo $navig;
                    }

                ?>
        </div>
<!--        </div>-->
    </div>

    <div class="sidebar-help">
        <div class="recodevol">
            <div class="recodevo-cont">
                <div class="filainfo">
                <span class="counter numbercoches"> <?php echo count($res); ?></span><p class="numcoches"><?php echo JText::_('VRCARSFND'); ?></p>


                <div class="gobackchangedates">
			         <!--<a href="<?php echo JRoute::_('index.php?option=com_vikrentcar&view=vikrentcar&pickup='.$pickup.'&return='.$release); ?>"><?php echo JText::_('VRCHANGEDATES'); ?></a>-->
							 <a href="http://www.carflet.es"><?php echo JText::_('VRCHANGEDATES'); ?></a>
		      </div>
                </div>
            </div>
        </div>
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
                    <p><?php echo vikrentcar::getPlaceName($returnplace); ?></p>
                </div>
                <div class="row-reco">
                    <img src="http://www.carflet.es/images/carflet/calendarblue.svg" height="32" alt="Fecha y Hora Recogida de Coche" title="Fecha y Hora Recogida del Coche">
                    <p><?php echo date($df.' H:i', $release); ?></p>
                </div>
            </div>

        </div>
        <div class="caracteristicas-cont-sidebar">
            <div class="recodevo-cont">
                <img class="heading-icon" src="http://www.carflet.es/images/carflet/features.svg" alt="Caracteristicas de Coche" title="Caracteristicas del Coche"><span class="title-side">Características</span>
                <div class="row-reco-car">
                    <img src="http://carflet.es/administrator/components/com_vikrentcar/resources/abs2blue.png" height="32" alt="ABS" title="ABS">
                    <p>ABS</p>
                </div>
                <div class="row-reco-car">
                    <img src="http://carflet.es/administrator/components/com_vikrentcar/resources/gps2blue.png" height="32" alt="GPS" title="GPS">
                    <p>GPS</p>
                </div>
                <div class="row-reco-car">
                    <img src="http://carflet.es/administrator/components/com_vikrentcar/resources/auto2blue.png" height="32" alt="Coche Automático" title="Coche Automático">
                    <p>Automático</p>
                </div>
                <div class="row-reco-car">
                    <img src="http://carflet.es/administrator/components/com_vikrentcar/resources/manual2blue.png" height="32" alt="Coche Manual" title="Coche Manual">
                    <p>Manual</p>
                </div>
                <div class="row-reco-car">
                    <img src="http://carflet.es/administrator/components/com_vikrentcar/resources/aire2blue.png" height="32" alt="Aire Acondicionado" title="Aire Acondicionado">
                    <p>Aire Acondicionado</p>
                </div>
            </div>
        </div>

    </div>
    </div>
</div>
