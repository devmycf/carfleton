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

defined('_JEXEC') or die('Restricted access');

defined('VIKRENTCAR_ERROR_REPORTING') OR define('VIKRENTCAR_ERROR_REPORTING', 0);
error_reporting(VIKRENTCAR_ERROR_REPORTING);

//Joomla 3.0
if(!defined('DS')) {
	define('DS', DIRECTORY_SEPARATOR);
}
//

require_once(JPATH_SITE . DS ."components". DS ."com_vikrentcar". DS . "helpers" . DS ."lib.vikrentcar.php");

require_once(JPATH_ADMINISTRATOR . DS . "components". DS ."com_vikrentcar" . DS . 'admin.vikrentcar.html.php');

$document = & JFactory :: getDocument();
$document->addStyleSheet('components/com_vikrentcar/vikrentcar.css');

$cid = JRequest::getVar('cid', array(0));
$task = JRequest :: getVar('task');

//Joomla 2.5
$option=empty($option) ? "com_vikrentcar" : $option;
//

require_once(JPATH_ADMINISTRATOR . DS . "components". DS ."com_vikrentcar" . DS . 'toolbar.vikrentcar.php');

switch ($task) {
	case 'viewplaces' :
		HTML_vikrentcar :: printHeader("3");
		viewPlaces($option);
		break;
	case 'newplace' :
		HTML_vikrentcar :: printHeader("3");
		newPlace($option);
		break;
	case 'editplace' :
		HTML_vikrentcar :: printHeader("3");
		editPlace($cid[0], $option);
		break;	
	case 'createplace' :
		HTML_vikrentcar :: printHeader();
		savePlace($option);
		break;
	case 'updateplace' :
		HTML_vikrentcar :: printHeader();
		updatePlace($option);
		break;	
	case 'removeplace' :
		HTML_vikrentcar :: printHeader();
		removePlace($cid, $option);
		break;	
	case 'cancelplace' :
		HTML_vikrentcar :: printHeader();
		cancelEditingPlace($option);
		break;
	case 'viewiva' :
		HTML_vikrentcar :: printHeader("2");
		viewIva($option);
		break;
	case 'newiva' :
		HTML_vikrentcar :: printHeader("2");
		newIva($option);
		break;
	case 'editiva' :
		HTML_vikrentcar :: printHeader("2");
		editIva($cid[0], $option);
		break;	
	case 'createiva' :
		HTML_vikrentcar :: printHeader();
		saveIva($option);
		break;
	case 'updateiva' :
		HTML_vikrentcar :: printHeader();
		updateIva($option);
		break;	
	case 'removeiva' :
		HTML_vikrentcar :: printHeader();
		removeIva($cid, $option);
		break;	
	case 'canceliva' :
		HTML_vikrentcar :: printHeader();
		cancelEditingIva($option);
		break;	
	case 'viewprices' :
		HTML_vikrentcar :: printHeader("1");
		viewPrices($option);
		break;
	case 'newprice' :
		HTML_vikrentcar :: printHeader("1");
		newPrice($option);
		break;
	case 'editprice' :
		HTML_vikrentcar :: printHeader("1");
		editPrice($cid[0], $option);
		break;	
	case 'createprice' :
		HTML_vikrentcar :: printHeader();
		savePrice($option);
		break;
	case 'updateprice' :
		HTML_vikrentcar :: printHeader();
		updatePrice($option);
		break;	
	case 'removeprice' :
		HTML_vikrentcar :: printHeader();
		removePrice($cid, $option);
		break;	
	case 'cancelprice' :
		HTML_vikrentcar :: printHeader();
		cancelEditingPrice($option);
		break;
	case 'viewcategories' :
		HTML_vikrentcar :: printHeader("4");
		viewCategories($option);
		break;
	case 'newcat' :
		HTML_vikrentcar :: printHeader("4");
		newCat($option);
		break;
	case 'editcat' :
		HTML_vikrentcar :: printHeader("4");
		editCat($cid[0], $option);
		break;	
	case 'createcat' :
		HTML_vikrentcar :: printHeader();
		saveCat($option);
		break;
	case 'updatecat' :
		HTML_vikrentcar :: printHeader();
		updateCat($option);
		break;	
	case 'removecat' :
		HTML_vikrentcar :: printHeader();
		removeCat($cid, $option);
		break;	
	case 'cancelcat' :
		HTML_vikrentcar :: printHeader();
		cancelEditingCat($option);
		break;
	case 'viewcarat' :
		HTML_vikrentcar :: printHeader("5");
		viewCarat($option);
		break;
	case 'newcarat' :
		HTML_vikrentcar :: printHeader("5");
		newCarat($option);
		break;
	case 'editcarat' :
		HTML_vikrentcar :: printHeader("5");
		editCarat($cid[0], $option);
		break;	
	case 'createcarat' :
		HTML_vikrentcar :: printHeader();
		saveCarat($option);
		break;
	case 'updatecarat' :
		HTML_vikrentcar :: printHeader();
		updateCarat($option);
		break;	
	case 'removecarat' :
		HTML_vikrentcar :: printHeader();
		removeCarat($cid, $option);
		break;	
	case 'cancelcarat' :
		HTML_vikrentcar :: printHeader();
		cancelEditingCarat($option);
		break;
	case 'viewoptionals' :
		HTML_vikrentcar :: printHeader("6");
		viewOptionals($option);
		break;
	case 'newoptionals' :
		HTML_vikrentcar :: printHeader("6");
		newOptionals($option);
		break;
	case 'editoptional' :
		HTML_vikrentcar :: printHeader("6");
		editOptional($cid[0], $option);
		break;	
	case 'createoptionals' :
		HTML_vikrentcar :: printHeader();
		saveOptionals($option);
		break;
	case 'updateoptional' :
		HTML_vikrentcar :: printHeader();
		updateOptional($option);
		break;	
	case 'removeoptionals' :
		HTML_vikrentcar :: printHeader();
		removeOptionals($cid, $option);
		break;	
	case 'canceloptionals' :
		HTML_vikrentcar :: printHeader();
		cancelEditingOptionals($option);
		break;
	case 'viewstats' :
		HTML_vikrentcar :: printHeader("10");
		viewStats($option);
		break;
	case 'removestats' :
		HTML_vikrentcar :: printHeader();
		removeStats($cid, $option);
		break;	
	case 'cancelstats' :
		HTML_vikrentcar :: printHeader();
		cancelEditingStats($option);
		break;		
	case 'viewcar' :
		HTML_vikrentcar :: printHeader("7");
		viewCar($option);
		break;
	case 'newcar' :
		HTML_vikrentcar :: printHeader("7");
		newCar($option);
		break;
	case 'editcar' :
		HTML_vikrentcar :: printHeader("7");
		editCar($cid[0], $option);
		break;	
	case 'createcar' :
		HTML_vikrentcar :: printHeader();
		saveCar($option);
		break;
	case 'updatecar' :
		HTML_vikrentcar :: printHeader();
		updateCar($option);
		break;
	case 'removecar' :
		HTML_vikrentcar :: printHeader();
		removeCar($cid, $option);
		break;	
	case 'modavail' :
		HTML_vikrentcar :: printHeader();
		modAvail($cid[0], $option);
		break;	
	case 'viewtariffe' :
		viewTariffe($cid[0], $option);
		break;
	case 'removetariffe' :
		removeTariffe($cid, $option);
		break;
	case 'viewtariffehours' :
		viewTariffeHours($cid[0], $option);
		break;
	case 'removetariffehours' :
		removeTariffeHours($cid, $option);
		break;
	case 'viewhourscharges' :
		viewHoursCharges($cid[0], $option);
		break;
	case 'removehourscharges' :
		removeHoursCharges($cid, $option);
		break;
	case 'calendar' :
		viewCalendar($cid[0], $option);
		break;
	case 'editbusy' :
		editBusy($cid[0], $option);
		break;
	case 'updatebusy' :
		updateBusy($option);
		break;
	case 'removebusy' :
		HTML_vikrentcar :: printHeader();
		removeBusy($option);
		break;								
	case 'cancel' :
		HTML_vikrentcar :: printHeader();
		cancelEditing($option);
		break;
	case 'cancelcalendar' :
		HTML_vikrentcar :: printHeader();
		cancelCalendar($option);
		break;
	case 'vieworders' :
		HTML_vikrentcar :: printHeader("8");
		viewOrders($option);
		break;
	case 'removeorders' :
		HTML_vikrentcar :: printHeader();
		removeOrders($cid, $option);
		break;
	case 'editorder' :
		HTML_vikrentcar :: printHeader("8");
		editOrder($cid[0], $option);
		break;	
	case 'canceledorder' :
		HTML_vikrentcar :: printHeader();
		cancelEditingOrders($option);
		break;
	case 'viewoldorders' :
		HTML_vikrentcar :: printHeader("9");
		viewOldOrders($option);
		break;
	case 'removeoldorders' :
		HTML_vikrentcar :: printHeader();
		removeOldOrders($cid, $option);
		break;
	case 'editoldorder' :
		HTML_vikrentcar :: printHeader("9");
		editOldOrder($cid[0], $option);
		break;
	case 'canceledoldorder' :
		HTML_vikrentcar :: printHeader();
		cancelEditingOldOrders($option);
		break;						
	case 'config' :
		HTML_vikrentcar :: printHeader("11");
		viewConfig($option);
		break;	
	case 'saveconfig' :
		HTML_vikrentcar :: printHeader();
		saveConfig($option);
		break;
	case 'goconfig' :
		goConfig($option);
		break;
	case 'choosebusy' :
		chooseBusy($option);
		break;
	case 'locfees' :
		HTML_vikrentcar :: printHeader("12");
		locFees($option);
		break;
	case 'newlocfee' :
		HTML_vikrentcar :: printHeader("12");
		newLocFee($option);
		break;
	case 'editlocfee' :
		HTML_vikrentcar :: printHeader("12");
		editLocFee($cid[0], $option);
		break;	
	case 'createlocfee' :
		HTML_vikrentcar :: printHeader();
		saveLocFee($option);
		break;
	case 'updatelocfee' :
		HTML_vikrentcar :: printHeader();
		updateLocFee($option);
		break;	
	case 'removelocfee' :
		HTML_vikrentcar :: printHeader();
		removeLocFee($cid, $option);
		break;	
	case 'cancellocfee' :
		HTML_vikrentcar :: printHeader();
		cancelEditingLocFee($option);
		break;
	case 'seasons' :
		HTML_vikrentcar :: printHeader("13");
		showSeasons($option);
		break;
	case 'newseason' :
		HTML_vikrentcar :: printHeader("13");
		newSeason($option);
		break;
	case 'editseason' :
		HTML_vikrentcar :: printHeader("13");
		editSeason($cid[0], $option);
		break;	
	case 'createseason' :
		HTML_vikrentcar :: printHeader();
		saveSeason($option);
		break;
	case 'updateseason' :
		HTML_vikrentcar :: printHeader();
		updateSeason($option);
		break;	
	case 'removeseasons' :
		HTML_vikrentcar :: printHeader();
		removeSeasons($cid, $option);
		break;	
	case 'cancelseason' :
		HTML_vikrentcar :: printHeader();
		cancelEditingSeason($option);
		break;
	case 'payments' :
		HTML_vikrentcar :: printHeader("14");
		showPayments($option);
		break;
	case 'newpayment' :
		HTML_vikrentcar :: printHeader("14");
		newPayment($option);
		break;
	case 'editpayment' :
		HTML_vikrentcar :: printHeader("14");
		editPayment($cid[0], $option);
		break;	
	case 'createpayment' :
		HTML_vikrentcar :: printHeader();
		savePayment($option);
		break;
	case 'updatepayment' :
		HTML_vikrentcar :: printHeader();
		updatePayment($option);
		break;	
	case 'removepayments' :
		HTML_vikrentcar :: printHeader();
		removePayments($cid, $option);
		break;	
	case 'cancelpayment' :
		HTML_vikrentcar :: printHeader();
		cancelEditingPayment($option);
		break;
	case 'setordconfirmed' :
		setOrderConfirmed($cid[0], $option);
		break;
	case 'overview' :
		HTML_vikrentcar :: printHeader("15");
		showOverview($option);
		break;
	case 'viewcustomf' :
		HTML_vikrentcar :: printHeader("16");
		viewCustomf($option);
		break;
	case 'newcustomf' :
		HTML_vikrentcar :: printHeader("16");
		newCustomf($option);
		break;
	case 'editcustomf' :
		HTML_vikrentcar :: printHeader("16");
		editCustomf($cid[0], $option);
		break;	
	case 'createcustomf' :
		HTML_vikrentcar :: printHeader();
		saveCustomf($option);
		break;
	case 'updatecustomf' :
		HTML_vikrentcar :: printHeader();
		updateCustomf($option);
		break;	
	case 'removecustomf' :
		HTML_vikrentcar :: printHeader();
		removeCustomf($cid, $option);
		break;	
	case 'cancelcustomf' :
		HTML_vikrentcar :: printHeader();
		cancelEditingCustomf($option);
		break;
	case 'sortfield' :
		sortField($option);
		break;
	case 'removemoreimgs' :
		removeMoreImgs($option);
		break;
	case 'viewcoupons' :
		HTML_vikrentcar :: printHeader("17");
		viewCoupons($option);
		break;
	case 'newcoupon' :
		HTML_vikrentcar :: printHeader("17");
		newCoupon($option);
		break;
	case 'editcoupon' :
		HTML_vikrentcar :: printHeader("17");
		editCoupon($cid[0], $option);
		break;	
	case 'createcoupon' :
		HTML_vikrentcar :: printHeader();
		saveCoupon($option);
		break;
	case 'updatecoupon' :
		HTML_vikrentcar :: printHeader();
		updateCoupon($option);
		break;	
	case 'removecoupons' :
		HTML_vikrentcar :: printHeader();
		removeCoupons($cid, $option);
		break;	
	case 'cancelcoupon' :
		HTML_vikrentcar :: printHeader();
		cancelEditingCoupon($option);
		break;
	case 'cars' :
		HTML_vikrentcar :: printHeader("7");
		viewCar($option);
		break;
	case 'resendordemail' :
		resendOrderEmail($cid[0], $option);
		break;
	case 'sortcarat' :
		sortCarat($option);
		break;
	case 'sortoptional' :
		sortOptional($option);
		break;
	case 'viewexport' :
		HTML_vikrentcar :: printHeader("8");
		viewExport($option);
		break;
	case 'doexport' :
		doExport($option);
		break;
	case 'loadpaymentparams' :
		loadPaymentParams();
		break;
    case 'cuponreservas' :
		HTML_vikrentcar :: printHeader("20");
		viewCouponsReservas($option);
		break;
	default :
		HTML_vikrentcar :: printHeader("18");
		viewDashboard($option);
		break;
}

if(vikrentcar::showFooter()) HTML_vikrentcar :: printFooter();

function loadPaymentParams () {
	$html = '---------';
	$phpfile = JRequest :: getString('phpfile', '', 'request');
	if (!empty($phpfile)) {
		$html = vikrentcar::displayPaymentParameters($phpfile);
	}
	echo $html;
	exit;
}

function doExport ($option) {
	$dbo = & JFactory :: getDBO();
	$pfrom = JRequest :: getString('from', '', 'request');
	$pto = JRequest :: getString('to', '', 'request');
	$plocation = JRequest :: getString('location', '', 'request');
	$ptype = JRequest :: getString('type', '', 'request');
	$ptype = $ptype == "csv" ? "csv" : "ics";
	$pstatus = JRequest :: getString('status', '', 'request');
	$pdateformat = JRequest :: getString('dateformat', '', 'request');
	$pdateformat .= ' H:i';
	$nowdf = vikrentcar::getDateFormat(true);
	if ($nowdf=="%d/%m/%Y") {
		$df='d/m/Y';
		$tf = 'H:i';
	}elseif ($nowdf=="%m/%d/%Y") {
		$df='m/d/Y';
		$tf = 'g:iA';
	}else {
		$df='Y/m/d';
		$tf = 'g:iA';
	}
	$clauses = array();
	if ($pstatus == "C") {
		$clauses[] = "`status`='confirmed'";
	}
	if (!empty($pfrom) && vikrentcar::dateIsValid($pfrom)) {
		$fromts = vikrentcar::getDateTimestamp($pfrom, '0', '0');
		$clauses[] = "`ritiro`>=".$fromts;
	}
	if (!empty($pto) && vikrentcar::dateIsValid($pto)) {
		$tots = vikrentcar::getDateTimestamp($pto, '23', '59');
		$clauses[] = "`ritiro`<=".$tots;
	}
	if (!empty($plocation)) {
		$clauses[] = "(`idplace`=".intval($plocation)." OR `idreturnplace`=".intval($plocation).")";
	}
	$q = "SELECT * FROM `#__vikrentcar_orders`".(count($clauses) > 0 ? " WHERE ".implode(' AND ', $clauses) : "")." ORDER BY `#__vikrentcar_orders`.`ritiro` ASC;";
	$dbo->setQuery($q);
	$dbo->Query($q);
	if ($dbo->getNumRows() > 0) {
		$rows = $dbo->loadAssocList();
		if ($ptype == "csv") {
			//init csv creation
			$csvlines = array();
			$csvlines[] = array(JText::_('VRCEXPCSVPICK'), JText::_('VRCEXPCSVDROP'), JText::_('VRCEXPCSVCAR'), JText::_('VRCEXPCSVPICKLOC'), JText::_('VRCEXPCSVDROPLOC'), JText::_('VRCEXPCSVCUSTINFO'), JText::_('VRCEXPCSVPAYMETH'), JText::_('VRCEXPCSVORDSTATUS'), JText::_('VRCEXPCSVTOT'), JText::_('VRCEXPCSVTOTPAID'));
			foreach ($rows as $r) {
				$pickdate = $pdateformat == 'ts' ? $r['ritiro'] : date($pdateformat, $r['ritiro']);
				$dropdate = $pdateformat == 'ts' ? $r['consegna'] : date($pdateformat, $r['consegna']);
				$car = vikrentcar::getCarInfo($r['idcar']);
				$pickloc = vikrentcar::getPlaceName($r['idplace']);
				$droploc = vikrentcar::getPlaceName($r['idreturnplace']);
				$custdata = preg_replace('/\s+/', ' ', trim($r['custdata']));
				$payment = vikrentcar::getPayment($r['idpayment']);
				$saystatus = ($r['status']=="confirmed" ? JText::_('VRCONFIRMED') : JText::_('VRSTANDBY'));
				$csvlines[] = array($pickdate, $dropdate, $car['name'], $pickloc, $droploc, $custdata, $payment['name'], $saystatus, number_format($r['order_total'], 2), number_format($r['totpaid'], 2));
			}
			//end csv creation
		}else {
			$icslines = array();
			$icscontent = "BEGIN:VCALENDAR\n";
			$icscontent .= "VERSION:2.0\n";
			$icscontent .= "PRODID:-//e4j//VikRentCar//EN\n";
			$icscontent .= "CALSCALE:GREGORIAN\n";
			$str = "";
			foreach ($rows as $r) {
				$uri = JURI::root().'index.php?option=com_vikrentcar&task=vieworder&sid='.$r['sid'].'&ts='.$r['ts'];
				$pickloc = vikrentcar::getPlaceName($r['idplace']);
				$car = vikrentcar::getCarInfo($r['idcar']);
				//$custdata = preg_replace('/\s+/', ' ', trim($r['custdata']));
				//$description = $car['name']."\\n".$r['custdata'];
				$description = $car['name']."\\n".str_replace("\n", "\\n", trim($r['custdata']));
				$str .= "BEGIN:VEVENT\n";
				//End of the Event set as Pickup Date, decomment line below to have it on Drop Off Date
				//$str .= "DTEND:".date('Ymd\THis\Z', $r['consegna'])."\n";
				$str .= "DTEND:".date('Ymd\THis\Z', $r['ritiro'])."\n";
				//
				$str .= "UID:".uniqid()."\n";
				$str .= "DTSTAMP:".date('Ymd\THis\Z', time())."\n";
				$str .= "LOCATION:".preg_replace('/([\,;])/','\\\$1', $pickloc)."\n";
				$str .= ((strlen($description) > 0 ) ? "DESCRIPTION:".preg_replace('/([\,;])/','\\\$1', $description)."\n" : "");
				$str .= "URL;VALUE=URI:".preg_replace('/([\,;])/','\\\$1', $uri)."\n";
				$str .= "SUMMARY:".JText::sprintf('VRCICSEXPSUMMARY', date($tf, $r['ritiro']))."\n";
				$str .= "DTSTART:".date('Ymd\THis\Z', $r['ritiro'])."\n";
				$str .= "END:VEVENT\n";
			}
			$icscontent .= $str;
			$icscontent .= "END:VCALENDAR\n";
		}
		//download file from buffer
		$dfilename = 'export_'.date('Y-m-d_H_i').'.'.$ptype;
		if ($ptype == "csv") {
			header("Content-type: text/csv");
			header("Cache-Control: no-store, no-cache");
			header('Content-Disposition: attachment; filename="'.$dfilename.'"');
			$outstream = fopen("php://output", 'w');
			foreach($csvlines as $csvline) {
				fputcsv($outstream, $csvline);
			}
			fclose($outstream);
			exit;
		}else {
			header("Content-Type: application/octet-stream; ");
			header("Cache-Control: no-store, no-cache");
			header("Content-Disposition: attachment; filename=\"".$dfilename."\"");
			$f = fopen('php://output', "w");
			fwrite($f, $icscontent);
			fclose($f);
			exit;
		}
	}else {
		JError::raiseWarning('', JText::_('VRCEXPORTERRNOREC'));
		$mainframe =& JFactory::getApplication();
		$mainframe->redirect("index.php?option=".$option."&task=vieworders");
	}
}

function viewExport ($option) {
	$dbo = & JFactory :: getDBO();
	$locations = '';
	$q = "SELECT `id`,`name` FROM `#__vikrentcar_places` ORDER BY `#__vikrentcar_places`.`name` ASC;";
	$dbo->setQuery($q);
	$dbo->Query($q);
	if ($dbo->getNumRows() > 0) {
		$locations = $dbo->loadAssocList();
	}
	HTML_vikrentcar :: pViewExport($locations, $option);
}

function sortOptional ($option) {
	$sortid = JRequest::getVar('cid', array(0));
	$pmode = JRequest :: getString('mode', '', 'request');
	$dbo = & JFactory :: getDBO();
	if (!empty($pmode)) {
		$q="SELECT `id`,`ordering` FROM `#__vikrentcar_optionals` ORDER BY `#__vikrentcar_optionals`.`ordering` ASC;";
		$dbo->setQuery($q);
		$dbo->Query($q);
		$totr=$dbo->getNumRows();
		if ($totr > 1) {
			$data = $dbo->loadAssocList();
			if ($pmode=="up") {
				foreach($data as $v){
					if ($v['id']==$sortid[0]) {
						$y=$v['ordering'];
					}
				}
				if ($y && $y > 1) {
					$vik=$y - 1;
					$found=false;
					foreach($data as $v){
						if (intval($v['ordering'])==intval($vik)) {
							$found=true;
							$q="UPDATE `#__vikrentcar_optionals` SET `ordering`='".$y."' WHERE `id`='".$v['id']."' LIMIT 1;";
							$dbo->setQuery($q);
							$dbo->Query($q);
							$q="UPDATE `#__vikrentcar_optionals` SET `ordering`='".$vik."' WHERE `id`='".$sortid[0]."' LIMIT 1;";
							$dbo->setQuery($q);
							$dbo->Query($q);
							break;
						}
					}
					if(!$found) {
						$q="UPDATE `#__vikrentcar_optionals` SET `ordering`='".$vik."' WHERE `id`='".$sortid[0]."' LIMIT 1;";
						$dbo->setQuery($q);
						$dbo->Query($q);
					}
				}
			}elseif ($pmode=="down") {
				foreach($data as $v){
					if ($v['id']==$sortid[0]) {
						$y=$v['ordering'];
					}
				}
				if ($y) {
					$vik=$y + 1;
					$found=false;
					foreach($data as $v){
						if (intval($v['ordering'])==intval($vik)) {
							$found=true;
							$q="UPDATE `#__vikrentcar_optionals` SET `ordering`='".$y."' WHERE `id`='".$v['id']."' LIMIT 1;";
							$dbo->setQuery($q);
							$dbo->Query($q);
							$q="UPDATE `#__vikrentcar_optionals` SET `ordering`='".$vik."' WHERE `id`='".$sortid[0]."' LIMIT 1;";
							$dbo->setQuery($q);
							$dbo->Query($q);
							break;
						}
					}
					if(!$found) {
						$q="UPDATE `#__vikrentcar_optionals` SET `ordering`='".$vik."' WHERE `id`='".$sortid[0]."' LIMIT 1;";
						$dbo->setQuery($q);
						$dbo->Query($q);
					}
				}
			}
		}
		$mainframe =& JFactory::getApplication();
		$mainframe->redirect("index.php?option=".$option."&task=viewoptionals");
	}else {
		$mainframe =& JFactory::getApplication();
		$mainframe->redirect("index.php?option=".$option);
	}
}

function sortCarat ($option) {
	$sortid = JRequest::getVar('cid', array(0));
	$pmode = JRequest :: getString('mode', '', 'request');
	$dbo = & JFactory :: getDBO();
	if (!empty($pmode)) {
		$q="SELECT `id`,`ordering` FROM `#__vikrentcar_caratteristiche` ORDER BY `#__vikrentcar_caratteristiche`.`ordering` ASC;";
		$dbo->setQuery($q);
		$dbo->Query($q);
		$totr=$dbo->getNumRows();
		if ($totr > 1) {
			$data = $dbo->loadAssocList();
			if ($pmode=="up") {
				foreach($data as $v){
					if ($v['id']==$sortid[0]) {
						$y=$v['ordering'];
					}
				}
				if ($y && $y > 1) {
					$vik=$y - 1;
					$found=false;
					foreach($data as $v){
						if (intval($v['ordering'])==intval($vik)) {
							$found=true;
							$q="UPDATE `#__vikrentcar_caratteristiche` SET `ordering`='".$y."' WHERE `id`='".$v['id']."' LIMIT 1;";
							$dbo->setQuery($q);
							$dbo->Query($q);
							$q="UPDATE `#__vikrentcar_caratteristiche` SET `ordering`='".$vik."' WHERE `id`='".$sortid[0]."' LIMIT 1;";
							$dbo->setQuery($q);
							$dbo->Query($q);
							break;
						}
					}
					if(!$found) {
						$q="UPDATE `#__vikrentcar_caratteristiche` SET `ordering`='".$vik."' WHERE `id`='".$sortid[0]."' LIMIT 1;";
						$dbo->setQuery($q);
						$dbo->Query($q);
					}
				}
			}elseif ($pmode=="down") {
				foreach($data as $v){
					if ($v['id']==$sortid[0]) {
						$y=$v['ordering'];
					}
				}
				if ($y) {
					$vik=$y + 1;
					$found=false;
					foreach($data as $v){
						if (intval($v['ordering'])==intval($vik)) {
							$found=true;
							$q="UPDATE `#__vikrentcar_caratteristiche` SET `ordering`='".$y."' WHERE `id`='".$v['id']."' LIMIT 1;";
							$dbo->setQuery($q);
							$dbo->Query($q);
							$q="UPDATE `#__vikrentcar_caratteristiche` SET `ordering`='".$vik."' WHERE `id`='".$sortid[0]."' LIMIT 1;";
							$dbo->setQuery($q);
							$dbo->Query($q);
							break;
						}
					}
					if(!$found) {
						$q="UPDATE `#__vikrentcar_caratteristiche` SET `ordering`='".$vik."' WHERE `id`='".$sortid[0]."' LIMIT 1;";
						$dbo->setQuery($q);
						$dbo->Query($q);
					}
				}
			}
		}
		$mainframe =& JFactory::getApplication();
		$mainframe->redirect("index.php?option=".$option."&task=viewcarat");
	}else {
		$mainframe =& JFactory::getApplication();
		$mainframe->redirect("index.php?option=".$option);
	}
}

function resendOrderEmail ($oid, $option, $checkdbsendpdf = false) {
	$dbo = & JFactory :: getDBO();
	$q="SELECT * FROM `#__vikrentcar_orders` WHERE `id`='".$oid."';";
	$dbo->setQuery($q);
	$dbo->Query($q);
	if($dbo->getNumRows() == 1) {
		$order=$dbo->loadAssocList();
		//send mail
		$ftitle=vikrentcar::getFrontTitle ();
		$nowts=$order[0]['ts'];
		$carinfo=vikrentcar::getCarInfo($order[0]['idcar']);
		$viklink=JURI::root()."index.php?option=com_vikrentcar&task=vieworder&sid=".$order[0]['sid']."&ts=".$order[0]['ts'];
		//vikrentcar 1.5
		if($order[0]['hourly'] == 1) {
			$q="SELECT * FROM `#__vikrentcar_dispcosthours` WHERE `id`='".$order[0]['idtar']."';";
		}else {
			$q="SELECT * FROM `#__vikrentcar_dispcost` WHERE `id`='".$order[0]['idtar']."';";
		}
		//
		$dbo->setQuery($q);
		$dbo->Query($q);
		if($dbo->getNumRows() == 0) {
			if($order[0]['hourly'] == 1) {
				$q="SELECT * FROM `#__vikrentcar_dispcost` WHERE `id`='".$order[0]['idtar']."';";
				$dbo->setQuery($q);
				$dbo->Query($q);
				if($dbo->getNumRows() == 1) {
					$tar = $dbo->loadAssocList();
				}
			}
		}else {
			$tar = $dbo->loadAssocList();
		}
		//vikrentcar 1.5
		if($order[0]['hourly'] == 1 && !empty($tar[0]['hours'])) {
			foreach($tar as $kt => $vt) {
				$tar[$kt]['days'] = 1;
			}
		}
		//
		//vikrentcar 1.6
		$checkhourscharges = 0;
		$ppickup = $order[0]['ritiro'];
		$prelease = $order[0]['consegna'];
		$secdiff = $prelease - $ppickup;
		$daysdiff = $secdiff / 86400;
		if (is_int($daysdiff)) {
			if ($daysdiff < 1) {
				$daysdiff = 1;
			}
		}else {
			if ($daysdiff < 1) {
				$daysdiff = 1;
			}else {
				$sum = floor($daysdiff) * 86400;
				$newdiff = $secdiff - $sum;
				$maxhmore = vikrentcar :: getHoursMoreRb() * 3600;
				if ($maxhmore >= $newdiff) {
					$daysdiff = floor($daysdiff);
				}else {
					$daysdiff = ceil($daysdiff);
					//vikrentcar 1.6
					$ehours = intval(round(($newdiff - $maxhmore) / 3600));
					$checkhourscharges = $ehours;
					if($checkhourscharges > 0) {
						$aehourschbasp = vikrentcar::applyExtraHoursChargesBasp();
					}
					//
				}
			}
		}
		if($checkhourscharges > 0 && $aehourschbasp == true) {
			$ret = vikrentcar::applyExtraHoursChargesCar($tar, $order[0]['idcar'], $checkhourscharges, $daysdiff, false, true, true);
			$tar = $ret['return'];
			$calcdays = $ret['days'];
		}
		if($checkhourscharges > 0 && $aehourschbasp == false) {
			$tar = vikrentcar::extraHoursSetPreviousFareCar($tar, $order[0]['idcar'], $checkhourscharges, $daysdiff, true);
			$tar = vikrentcar :: applySeasonsCar($tar, $order[0]['ritiro'], $order[0]['consegna'], $order[0]['idplace']);
			$ret = vikrentcar::applyExtraHoursChargesCar($tar, $order[0]['idcar'], $checkhourscharges, $daysdiff, true, true, true);
			$tar = $ret['return'];
			$calcdays = $ret['days'];
		}else {
			$tar = vikrentcar :: applySeasonsCar($tar, $order[0]['ritiro'], $order[0]['consegna'], $order[0]['idplace']);
		}
		//
		$ritplace=(!empty($order[0]['idplace']) ? vikrentcar::getPlaceName($order[0]['idplace']) : "");
		$consegnaplace=(!empty($order[0]['idreturnplace']) ? vikrentcar::getPlaceName($order[0]['idreturnplace']) : "");
		$costplusiva = vikrentcar :: sayCostPlusIva($tar[0]['cost'], $tar[0]['idprice'], $order[0]);
		$costminusiva = vikrentcar :: sayCostMinusIva($tar[0]['cost'], $tar[0]['idprice'], $order[0]);
		$pricestr=vikrentcar::getPriceName($tar[0]['idprice']).": ".$costplusiva.(!empty($tar[0]['attrdata']) ? "\n".vikrentcar::getPriceAttr($tar[0]['idprice']).": ".$tar[0]['attrdata'] : "");
		$isdue=vikrentcar::sayCostPlusIva($tar[0]['cost'], $tar[0]['idprice'], $order[0]);
		$optstr="";
		$optarrtaxnet = array();
		if (!empty($order[0]['optionals'])) {
			$stepo=explode(";", $order[0]['optionals']);
			foreach($stepo as $oo){
				if (!empty($oo)) {
					$stept=explode(":", $oo);
					$q="SELECT `name`,`cost`,`perday`,`hmany`,`idiva`,`maxprice` FROM `#__vikrentcar_optionals` WHERE `id`=".$dbo->quote($stept[0]).";";
					$dbo->setQuery($q);
					$dbo->Query($q);
					if ($dbo->getNumRows() == 1) {
						$actopt=$dbo->loadAssocList();
						$realcost=(intval($actopt[0]['perday'])==1 ? ($actopt[0]['cost'] * $order[0]['days'] * $stept[1]) : ($actopt[0]['cost'] * $stept[1]));
						if (!empty($actopt[0]['maxprice']) && $actopt[0]['maxprice'] > 0 && $realcost > $actopt[0]['maxprice']) {
							$realcost = $actopt[0]['maxprice'];
							if(intval($actopt[0]['hmany']) == 1 && intval($stept[1]) > 1) {
								$realcost = $actopt[0]['maxprice'] * $stept[1];
							}
						}
						$tmpopr=vikrentcar::sayOptionalsPlusIva($realcost, $actopt[0]['idiva'], $order[0]);
						$isdue+=$tmpopr;
						$optnetprice = vikrentcar :: sayOptionalsMinusIva($realcost, $actopt[0]['idiva'], $order[0]);
						$optarrtaxnet[] = $optnetprice;
						$optstr.=($stept[1] > 1 ? $stept[1]." " : "").$actopt[0]['name'].": ".$tmpopr."\n";
					}
				}
			}
		}
		$maillocfee="";
		$locfeewithouttax = 0;
		if(!empty($order[0]['idplace']) && !empty($order[0]['idreturnplace'])) {
			$locfee=vikrentcar::getLocFee($order[0]['idplace'], $order[0]['idreturnplace']);
			if($locfee) {
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
					if (array_key_exists($order[0]['days'], $arrvaloverrides)) {
						$locfee['cost'] = $arrvaloverrides[$order[0]['days']];
					}
				}
				//end VikRentCar 1.7 - Location fees overrides
				$locfeecost=intval($locfee['daily']) == 1 ? ($locfee['cost'] * $order[0]['days']) : $locfee['cost'];
				$locfeewith=vikrentcar::sayLocFeePlusIva($locfeecost, $locfee['idiva'], $order[0]);
				$isdue+=$locfeewith;
				$locfeewithouttax = vikrentcar::sayLocFeeMinusIva($locfeecost, $locfee['idiva'], $order[0]);
				$maillocfee=$locfeewith;
			}
		}
		//vikrentcar 1.6 coupon
		$usedcoupon = false;
		$origisdue = $isdue;
		if(strlen($order[0]['coupon']) > 0) {
			$usedcoupon = true;
			$expcoupon = explode(";", $order[0]['coupon']);
			$isdue = $isdue - $expcoupon[1];
		}
		//
		if(!empty($order[0]['custmail'])) {
			$arrayinfopdf = array('days' => $order[0]['days'], 'tarminusiva' => $costminusiva, 'tartax' => ($costplusiva - $costminusiva), 'opttaxnet' => $optarrtaxnet, 'locfeenet' => $locfeewithouttax, 'order_id' => $order[0]['id'], 'tot_paid' => $order[0]['totpaid']);
			$sendpdf = true;
			if (!$checkdbsendpdf) {
				$psendpdf = JRequest :: getString('sendpdf', '', 'request');
				if ($psendpdf != "1") {
					$sendpdf = false;
				}
			}
			$app =& JFactory::getApplication();
			$app->enqueueMessage(JText::sprintf('VRORDERMAILRESENT', $order[0]['custmail']));
			$saystatus = $order[0]['status'] == 'confirmed' ? JText::_('VRCOMPLETED') : JText::_('VRSTANDBY');
			vikrentcar::sendCustMailFromBack($order[0]['custmail'], strip_tags($ftitle)." ".JText::_('VRRENTALORD'), $ftitle, $nowts, $order[0]['custdata'], $carinfo['name'], $order[0]['ritiro'], $order[0]['consegna'], $pricestr, $optstr, $isdue, $viklink, $saystatus, $ritplace, $consegnaplace, $maillocfee, $order[0]['id'], $order[0]['coupon'], $arrayinfopdf, $sendpdf);
		}else {
			JError::raiseWarning('', JText::_('VRORDERMAILRESENTNOREC'));
		}
	}
	$mainframe =& JFactory::getApplication();
	$mainframe->redirect("index.php?option=".$option."&task=editorder&cid[]=".$oid);
}

function viewDashboard ($option) {
	$pidplace = JRequest :: getInt('idplace', '', 'request');
	$dbo = & JFactory :: getDBO();
	$q="SELECT COUNT(*) FROM `#__vikrentcar_prices`;";
	$dbo->setQuery($q);
	$dbo->Query($q);
	$totprices = $dbo->loadResult();
	$q="SELECT `id`,`name` FROM `#__vikrentcar_places` ORDER BY `#__vikrentcar_places`.`name` ASC;";
	$dbo->setQuery($q);
	$dbo->Query($q);
	$totlocations = $dbo->getNumRows();
	if($totlocations > 0) {
		$allplaces = $dbo->loadAssocList();
	}else {
		$allplaces = "";
	}
	$q="SELECT COUNT(*) FROM `#__vikrentcar_categories`;";
	$dbo->setQuery($q);
	$dbo->Query($q);
	$totcategories = $dbo->loadResult();
	$q="SELECT COUNT(*) FROM `#__vikrentcar_cars`;";
	$dbo->setQuery($q);
	$dbo->Query($q);
	$totcars = $dbo->loadResult();
	$q="SELECT COUNT(*) FROM `#__vikrentcar_dispcost`;";
	$dbo->setQuery($q);
	$dbo->Query($q);
	$totdailyfares = $dbo->loadResult();
	$arrayfirst = array('totprices' => $totprices, 'totlocations' => $totlocations, 'totcategories' => $totcategories, 'totcars' => $totcars, 'totdailyfares' => $totdailyfares);
	$nextrentals = "";
	$totnextrentconf = 0;
	$totnextrentpend = 0;
	if($totprices > 0 && $totcars > 0) {
		$q="SELECT `id`,`status`,`idcar`,`ritiro`,`consegna`,`idplace`,`idreturnplace` FROM `#__vikrentcar_orders` WHERE `ritiro`>".time()." ".($pidplace > 0 ? "AND `idplace`='".$pidplace."' " : "")."ORDER BY `#__vikrentcar_orders`.`ritiro` ASC LIMIT 5;";
		$dbo->setQuery($q);
		$dbo->Query($q);
		if($dbo->getNumRows() > 0) {
			$nextrentals = $dbo->loadAssocList();
		}
		$q="SELECT COUNT(*) FROM `#__vikrentcar_orders` WHERE `ritiro`>".time()." AND `status`='confirmed';";
		$dbo->setQuery($q);
		$dbo->Query($q);
		$totnextrentconf = $dbo->loadResult();
		$q="SELECT COUNT(*) FROM `#__vikrentcar_orders` WHERE `ritiro`>".time()." AND `status`='standby';";
		$dbo->setQuery($q);
		$dbo->Query($q);
		$totnextrentpend = $dbo->loadResult();
	}
	HTML_vikrentcar::pViewDashboard($pidplace, $arrayfirst, $allplaces, $nextrentals, $totnextrentconf, $totnextrentpend, $option);
}

function updateCoupon ($option) {
	$pcode = JRequest :: getString('code', '', 'request');
	$pvalue = JRequest :: getString('value', '', 'request');
	$pfrom = JRequest :: getString('from', '', 'request');
	$pto = JRequest :: getString('to', '', 'request');
	$pidcars = JRequest::getVar('idcars', array(0));
	$pwhere = JRequest :: getString('where', '', 'request');
	$ptype = JRequest :: getString('type', '', 'request');
	$ptype = $ptype == "1" ? 1 : 2;
	$ppercentot = JRequest :: getString('percentot', '', 'request');
	$ppercentot = $ppercentot == "1" ? 1 : 2;
	$pallvehicles = JRequest :: getString('allvehicles', '', 'request');
	$pallvehicles = $pallvehicles == "1" ? 1 : 0;
	$pmintotord = JRequest :: getString('mintotord', '', 'request');
	$stridcars="";
	if(@count($pidcars) > 0 && $pallvehicles != 1) {
		foreach($pidcars as $ch) {
			if(!empty($ch)) {
				$stridcars.=";".$ch.";";
			}
		}
	}
	$strdatevalid = "";
	if(strlen($pfrom) > 0 && strlen($pto) > 0) {
		$first=vikrentcar::getDateTimestamp($pfrom, 0, 0);
		$second=vikrentcar::getDateTimestamp($pto, 0, 0);
		if($first < $second) {
			$strdatevalid .= $first."-".$second;
		}
	}
	$dbo = & JFactory :: getDBO();
	$q="SELECT * FROM `#__vikrentcar_coupons` WHERE `code`=".$dbo->quote($pcode)." AND `id`!='".$pwhere."';";
	$dbo->setQuery($q);
	$dbo->Query($q);
	if($dbo->getNumRows() > 0) {
		JError::raiseWarning('', JText::_('VRCCOUPONEXISTS'));
	}else {
		$app =& JFactory::getApplication();
		$app->enqueueMessage(JText::_('VRCCOUPONSAVEOK'));
		$q="UPDATE `#__vikrentcar_coupons` SET `code`=".$dbo->quote($pcode).",`type`='".$ptype."',`percentot`='".$ppercentot."',`value`=".$dbo->quote($pvalue).",`datevalid`='".$strdatevalid."',`allvehicles`='".$pallvehicles."',`idcars`='".$stridcars."',`mintotord`=".$dbo->quote($pmintotord)." WHERE `id`='".$pwhere."';";
		$dbo->setQuery($q);
		$dbo->Query($q);
	}
	$mainframe =& JFactory::getApplication();
	$mainframe->redirect("index.php?option=".$option."&task=viewcoupons");
}

function saveCoupon ($option) {
	$pcode = JRequest :: getString('code', '', 'request');
	$pvalue = JRequest :: getString('value', '', 'request');
	$pfrom = JRequest :: getString('from', '', 'request');
	$pto = JRequest :: getString('to', '', 'request');
	$pidcars = JRequest::getVar('idcars', array(0));
	$ptype = JRequest :: getString('type', '', 'request');
	$ptype = $ptype == "1" ? 1 : 2;
	$ppercentot = JRequest :: getString('percentot', '', 'request');
	$ppercentot = $ppercentot == "1" ? 1 : 2;
	$pallvehicles = JRequest :: getString('allvehicles', '', 'request');
	$pallvehicles = $pallvehicles == "1" ? 1 : 0;
	$pmintotord = JRequest :: getString('mintotord', '', 'request');
	$stridcars="";
	if(@count($pidcars) > 0 && $pallvehicles != 1) {
		foreach($pidcars as $ch) {
			if(!empty($ch)) {
				$stridcars.=";".$ch.";";
			}
		}
	}
	$strdatevalid = "";
	if(strlen($pfrom) > 0 && strlen($pto) > 0) {
		$first=vikrentcar::getDateTimestamp($pfrom, 0, 0);
		$second=vikrentcar::getDateTimestamp($pto, 0, 0);
		if($first < $second) {
			$strdatevalid .= $first."-".$second;
		}
	}
	$dbo = & JFactory :: getDBO();
	$q="SELECT * FROM `#__vikrentcar_coupons` WHERE `code`=".$dbo->quote($pcode).";";
	$dbo->setQuery($q);
	$dbo->Query($q);
	if($dbo->getNumRows() > 0) {
		JError::raiseWarning('', JText::_('VRCCOUPONEXISTS'));
	}else {
		$app =& JFactory::getApplication();
		$app->enqueueMessage(JText::_('VRCCOUPONSAVEOK'));
		$q="INSERT INTO `#__vikrentcar_coupons` (`code`,`type`,`percentot`,`value`,`datevalid`,`allvehicles`,`idcars`,`mintotord`) VALUES(".$dbo->quote($pcode).",'".$ptype."','".$ppercentot."',".$dbo->quote($pvalue).",'".$strdatevalid."','".$pallvehicles."','".$stridcars."', ".$dbo->quote($pmintotord).");";
		$dbo->setQuery($q);
		$dbo->Query($q);
	}
	$mainframe =& JFactory::getApplication();
	$mainframe->redirect("index.php?option=".$option."&task=viewcoupons");
}

function editCoupon ($coupid, $option) {
	$dbo = & JFactory :: getDBO();
	$q="SELECT * FROM `#__vikrentcar_coupons` WHERE `id`='".$coupid."';";
	$dbo->setQuery($q);
	$dbo->Query($q);
	$coupon = $dbo->loadAssocList();
	$coupon = $coupon[0];
	$wselcars = "";
	$q="SELECT `id`,`name` FROM `#__vikrentcar_cars` ORDER BY `#__vikrentcar_cars`.`name` ASC;";
	$dbo->setQuery($q);
	$dbo->Query($q);
	if ($dbo->getNumRows() > 0) {
		$cars = $dbo->loadAssocList();
		$filtercarr = array();
		if(strlen($coupon['idcars']) > 0) {
			$cparts = explode(";", $coupon['idcars']);
			foreach($cparts as $fc) {
				if(!empty($fc)) {
					$filtercarr[]=$fc;
				}
			}
		}
		$wselcars = "<select name=\"idcars[]\" multiple=\"multiple\" size=\"5\">\n";
		foreach($cars as $c) {
			$wselcars .= "<option value=\"".$c['id']."\"".(in_array($c['id'], $filtercarr) ? " selected=\"selected\"" : "").">".$c['name']."</option>\n";
		}
		$wselcars .= "</select>\n";
	}
	HTML_vikrentcar::pEditCoupon($coupon, $wselcars, $option);
}

function newCoupon ($option) {
	$dbo = & JFactory :: getDBO();
	$wselcars = "";
	$q="SELECT `id`,`name` FROM `#__vikrentcar_cars` ORDER BY `#__vikrentcar_cars`.`name` ASC;";
	$dbo->setQuery($q);
	$dbo->Query($q);
	if ($dbo->getNumRows() > 0) {
		$cars = $dbo->loadAssocList();
		$wselcars = "<select name=\"idcars[]\" multiple=\"multiple\" size=\"5\">\n";
		foreach($cars as $c) {
			$wselcars .= "<option value=\"".$c['id']."\">".$c['name']."</option>\n";
		}
		$wselcars .= "</select>\n";
	}
	HTML_vikrentcar::pNewCoupon($wselcars, $option);
}

function viewCoupons ($option) {
	$dbo = & JFactory :: getDBO();
	$mainframe =& JFactory::getApplication();
	$lim = $mainframe->getUserStateFromRequest("$option.limit", 'limit', $mainframe->getCfg('list_limit'), 'int');
	$lim0 = JRequest::getVar('limitstart', 0, '', 'int');
	$q="SELECT SQL_CALC_FOUND_ROWS * FROM `#__vikrentcar_coupons` ORDER BY `#__vikrentcar_coupons`.`code` ASC";
	$dbo->setQuery($q, $lim0, $lim);
	$dbo->Query($q);
	if ($dbo->getNumRows() > 0) {
		$rows = $dbo->loadAssocList();
		$dbo->setQuery('SELECT FOUND_ROWS();');
		jimport('joomla.html.pagination');
		$pageNav = new JPagination( $dbo->loadResult(), $lim0, $lim );
		$navbut="<table align=\"center\"><tr><td>".$pageNav->getListFooter()."</td></tr></table>";
		HTML_vikrentcar :: pViewCoupons($rows, $option, $lim0, $navbut);
	}else {
		$rows = "";
		HTML_vikrentcar :: pViewCoupons($rows, $option);
	}
}

function viewCouponsReservas ($option) {
	$dbo = & JFactory :: getDBO();
	$mainframe =& JFactory::getApplication();
	$lim = $mainframe->getUserStateFromRequest("$option.limit", 'limit', $mainframe->getCfg('list_limit'), 'int');
	$lim0 = JRequest::getVar('limitstart', 0, '', 'int');
	$q="SELECT * FROM `#__vikrentcar_coupons` ORDER BY `#__vikrentcar_coupons`.`code` ASC";
	$dbo->setQuery($q, $lim0, $lim);
	$dbo->Query($q);
	if ($dbo->getNumRows() > 0) {
		$rows = $dbo->loadAssocList();
		$dbo->setQuery('SELECT FOUND_ROWS();');
		jimport('joomla.html.pagination');
		$pageNav = new JPagination( $dbo->loadResult(), $lim0, $lim );
		$navbut="<table align=\"center\"><tr><td>".$pageNav->getListFooter()."</td></tr></table>";
		HTML_vikrentcar :: pViewCoupons($rows, $option, $lim0, $navbut);
	}else {
		$rows = "";
		HTML_vikrentcar :: pViewCouponsReservas($rows, $option);
	}

/*    
	$dbo->setQuery($q, $lim0, $lim);
	$dbo->Query($q);
	if ($dbo->getNumRows() > 0) {
		$rows = $dbo->loadAssocList();
		$dbo->setQuery('SELECT FOUND_ROWS();');
		jimport('joomla.html.pagination');
		$pageNav = new JPagination( $dbo->loadResult(), $lim0, $lim );
		$navbut="<table align=\"center\"><tr><td>".$pageNav->getListFooter()."</td></tr></table>";
		HTML_vikrentcar :: pViewCoupons($rows, $option, $lim0, $navbut);
	}else {
		$rows = "";
		HTML_vikrentcar :: pViewCoupons($rows, $option);
	}*/
}

function removeMoreImgs($option) {
	$pcarid = JRequest :: getInt('carid', '', 'request');
	$pimgind = JRequest :: getInt('imgind', '', 'request');
	if(!empty($pcarid) && strlen($pimgind) > 0) {
		$dbo = & JFactory :: getDBO();
		$q="SELECT `moreimgs` FROM `#__vikrentcar_cars` WHERE `id`='".$pcarid."';";
		$dbo->setQuery($q);
		$dbo->Query($q);
		$actmore=$dbo->loadResult();
		if(strlen($actmore) > 0) {
			$actsplit=explode(';;', $actmore);
			if(array_key_exists($pimgind, $actsplit)) {
				@unlink('./components/com_vikrentcar/resources/big_'.$actsplit[$pimgind]);
				@unlink('./components/com_vikrentcar/resources/thumb_'.$actsplit[$pimgind]);
				unset($actsplit[$pimgind]);
				$newstr="";
				foreach($actsplit as $oi) {
					if(!empty($oi)) {
						$newstr.=$oi.';;';
					}
				}
				$q="UPDATE `#__vikrentcar_cars` SET `moreimgs`=".$dbo->quote($newstr)." WHERE `id`='".$pcarid."';";
				$dbo->setQuery($q);
				$dbo->Query($q);
			}
		}
		$mainframe =& JFactory::getApplication();
		$mainframe->redirect("index.php?option=".$option."&task=editcar&cid[]=".$pcarid);
	}else {
		$mainframe =& JFactory::getApplication();
		$mainframe->redirect("index.php?option=".$option);
	}
}

function updateCustomf ($option) {
	$pname = JRequest :: getString('name', '', 'request', JREQUEST_ALLOWHTML);
	$ptype = JRequest :: getString('type', '', 'request');
	$pchoose = JRequest::getVar('choose', array(0));
	$prequired = JRequest :: getString('required', '', 'request');
	$prequired = $prequired == "1" ? 1 : 0;
	$pisemail = JRequest :: getString('isemail', '', 'request');
	$pisemail = $pisemail == "1" ? 1 : 0;
	$ppoplink = JRequest :: getString('poplink', '', 'request');
	$pwhere = JRequest :: getInt('where', '', 'request');
	$choosestr="";
	if(@count($pchoose) > 0) {
		foreach($pchoose as $ch) {
			if(!empty($ch)) {
				$choosestr.=$ch.";;__;;";
			}
		}
	}
	$dbo = & JFactory :: getDBO();
	$q="UPDATE `#__vikrentcar_custfields` SET `name`=".$dbo->quote($pname).",`type`=".$dbo->quote($ptype).",`choose`=".$dbo->quote($choosestr).",`required`=".$dbo->quote($prequired).",`isemail`=".$dbo->quote($pisemail).",`poplink`=".$dbo->quote($ppoplink)." WHERE `id`=".$dbo->quote($pwhere).";";
	$dbo->setQuery($q);
	$dbo->Query($q);
	$mainframe =& JFactory::getApplication();
	$mainframe->redirect("index.php?option=".$option."&task=viewcustomf");
}

function editCustomf ($fid, $option) {
	$dbo = & JFactory :: getDBO();
	$q="SELECT * FROM `#__vikrentcar_custfields` WHERE `id`=".$dbo->quote($fid).";";
	$dbo->setQuery($q);
	$dbo->Query($q);
	$field=$dbo->loadAssocList();
	HTML_vikrentcar::pEditCustomf($field[0], $option);
}

function saveCustomf ($option) {
	$pname = JRequest :: getString('name', '', 'request', JREQUEST_ALLOWHTML);
	$ptype = JRequest :: getString('type', '', 'request');
	$pchoose = JRequest::getVar('choose', array(0));
	$prequired = JRequest :: getString('required', '', 'request');
	$prequired = $prequired == "1" ? 1 : 0;
	$pisemail = JRequest :: getString('isemail', '', 'request');
	$pisemail = $pisemail == "1" ? 1 : 0;
	$ppoplink = JRequest :: getString('poplink', '', 'request');
	$choosestr="";
	if(@count($pchoose) > 0) {
		foreach($pchoose as $ch) {
			if(!empty($ch)) {
				$choosestr.=$ch.";;__;;";
			}
		}
	}
	$dbo = & JFactory :: getDBO();
	$q="SELECT `ordering` FROM `#__vikrentcar_custfields` ORDER BY `#__vikrentcar_custfields`.`ordering` DESC LIMIT 1;";
	$dbo->setQuery($q);
	$dbo->Query($q);
	if($dbo->getNumRows() == 1) {
		$getlast=$dbo->loadResult();
		$newsortnum=$getlast + 1;
	}else {
		$newsortnum=1;
	}
	$q="INSERT INTO `#__vikrentcar_custfields` (`name`,`type`,`choose`,`required`,`ordering`,`isemail`,`poplink`) VALUES(".$dbo->quote($pname).", ".$dbo->quote($ptype).", ".$dbo->quote($choosestr).", ".$dbo->quote($prequired).", ".$dbo->quote($newsortnum).", ".$dbo->quote($pisemail).", ".$dbo->quote($ppoplink).");";
	$dbo->setQuery($q);
	$dbo->Query($q);
	$mainframe =& JFactory::getApplication();
	$mainframe->redirect("index.php?option=".$option."&task=viewcustomf");
}

function newCustomf ($option) {
	HTML_vikrentcar::pNewCustomf($option);
}

function removeCustomf ($ids, $option) {
	if (@count($ids)) {
		$dbo = & JFactory :: getDBO();
		foreach($ids as $d){
			$q="DELETE FROM `#__vikrentcar_custfields` WHERE `id`=".$dbo->quote($d).";";
			$dbo->setQuery($q);
			$dbo->Query($q);
		}
	}
	$mainframe =& JFactory::getApplication();
	$mainframe->redirect("index.php?option=".$option."&task=viewcustomf");
}

function removeCoupons ($ids, $option) {
	if (@count($ids)) {
		$dbo = & JFactory :: getDBO();
		foreach($ids as $d){
			$q="DELETE FROM `#__vikrentcar_coupons` WHERE `id`=".$dbo->quote($d).";";
			$dbo->setQuery($q);
			$dbo->Query($q);
		}
	}
	$mainframe =& JFactory::getApplication();
	$mainframe->redirect("index.php?option=".$option."&task=viewcoupons");
}

function sortField ($option) {
	$sortid = JRequest::getVar('cid', array(0));
	$pmode = JRequest :: getString('mode', '', 'request');
	$dbo = & JFactory :: getDBO();
	if (!empty($pmode)) {
		$q="SELECT `id`,`ordering` FROM `#__vikrentcar_custfields` ORDER BY `#__vikrentcar_custfields`.`ordering` ASC;";
		$dbo->setQuery($q);
		$dbo->Query($q);
		$totr=$dbo->getNumRows();
		if ($totr > 1) {
			$data = $dbo->loadAssocList();
			if ($pmode=="up") {
				foreach($data as $v){
					if ($v['id']==$sortid[0]) {
						$y=$v['ordering'];
					}
				}
				if ($y && $y > 1) {
					$vik=$y - 1;
					$found=false;
					foreach($data as $v){
						if (intval($v['ordering'])==intval($vik)) {
							$found=true;
							$q="UPDATE `#__vikrentcar_custfields` SET `ordering`='".$y."' WHERE `id`='".$v['id']."' LIMIT 1;";
							$dbo->setQuery($q);
							$dbo->Query($q);
							$q="UPDATE `#__vikrentcar_custfields` SET `ordering`='".$vik."' WHERE `id`='".$sortid[0]."' LIMIT 1;";
							$dbo->setQuery($q);
							$dbo->Query($q);
							break;
						}
					}
					if(!$found) {
						$q="UPDATE `#__vikrentcar_custfields` SET `ordering`='".$vik."' WHERE `id`='".$sortid[0]."' LIMIT 1;";
						$dbo->setQuery($q);
						$dbo->Query($q);
					}
				}
			}elseif ($pmode=="down") {
				foreach($data as $v){
					if ($v['id']==$sortid[0]) {
						$y=$v['ordering'];
					}
				}
				if ($y) {
					$vik=$y + 1;
					$found=false;
					foreach($data as $v){
						if (intval($v['ordering'])==intval($vik)) {
							$found=true;
							$q="UPDATE `#__vikrentcar_custfields` SET `ordering`='".$y."' WHERE `id`='".$v['id']."' LIMIT 1;";
							$dbo->setQuery($q);
							$dbo->Query($q);
							$q="UPDATE `#__vikrentcar_custfields` SET `ordering`='".$vik."' WHERE `id`='".$sortid[0]."' LIMIT 1;";
							$dbo->setQuery($q);
							$dbo->Query($q);
							break;
						}
					}
					if(!$found) {
						$q="UPDATE `#__vikrentcar_custfields` SET `ordering`='".$vik."' WHERE `id`='".$sortid[0]."' LIMIT 1;";
						$dbo->setQuery($q);
						$dbo->Query($q);
					}
				}
			}
		}
		$mainframe =& JFactory::getApplication();
		$mainframe->redirect("index.php?option=".$option."&task=viewcustomf");
	}else {
		$mainframe =& JFactory::getApplication();
		$mainframe->redirect("index.php?option=".$option);
	}
}

function viewCustomf ($option) {
	$dbo = & JFactory :: getDBO();
	$mainframe =& JFactory::getApplication();
	$lim = $mainframe->getUserStateFromRequest("$option.limit", 'limit', $mainframe->getCfg('list_limit'), 'int');
	$lim0 = JRequest::getVar('limitstart', 0, '', 'int');
	$q="SELECT SQL_CALC_FOUND_ROWS * FROM `#__vikrentcar_custfields` ORDER BY `#__vikrentcar_custfields`.`ordering` ASC";
	$dbo->setQuery($q, $lim0, $lim);
	$dbo->Query($q);
	if ($dbo->getNumRows() > 0) {
		$rows = $dbo->loadAssocList();
		$dbo->setQuery('SELECT FOUND_ROWS();');
		jimport('joomla.html.pagination');
		$pageNav = new JPagination( $dbo->loadResult(), $lim0, $lim );
		$navbut="<table align=\"center\"><tr><td>".$pageNav->getListFooter()."</td></tr></table>";
		HTML_vikrentcar :: pViewCustomf($rows, $option, $lim0, $navbut);
	}else {
		$rows = "";
		HTML_vikrentcar :: pViewCustomf($rows, $option);
	}
}

function showOverview ($option) {
	$dbo = & JFactory :: getDBO();
	$pmonth = JRequest :: getString('month', '', 'request');
	if(!empty($pmonth)) {
		$tsstart=$pmonth;
	}else {
		$oggid=getdate();
		$tsstart=mktime(0, 0, 0, $oggid['mon'], 1, $oggid['year']);
	}
	$oggid=getdate($tsstart);
	if($oggid['mon']==12) {
		$nextmon=1;
		$year=$oggid['year'] + 1;
	}else {
		$nextmon=$oggid['mon'] + 1;
		$year=$oggid['year'];
	}
	$tsend=mktime(0, 0, 0, $nextmon, 1, $year);
	$today=getdate();
	$firstmonth=mktime(0, 0, 0, $today['mon'], 1, $today['year']);
	$wmonthsel="<select name=\"month\" onchange=\"document.vroverview.submit();\">\n";
	$wmonthsel.="<option value=\"".$firstmonth."\"".($firstmonth==$tsstart ? " selected=\"selected\"" : "").">".vikrentcar::sayMonth($today['mon'])." ".$today['year']."</option>\n";
	for($i=1; $i<12; $i++) {
		$newts=getdate($firstmonth);
		if($newts['mon']==12) {
			$nextmon=1;
			$year=$newts['year'] + 1;
		}else {
			$nextmon=$newts['mon'] + 1;
			$year=$newts['year'];
		}
		$firstmonth=mktime(0, 0, 0, $nextmon, 1, $year);
		$newts=getdate($firstmonth);
		$wmonthsel.="<option value=\"".$firstmonth."\"".($firstmonth==$tsstart ? " selected=\"selected\"" : "").">".vikrentcar::sayMonth($newts['mon'])." ".$newts['year']."</option>\n";
	}
	$wmonthsel.="</select>\n";
	$mainframe =& JFactory::getApplication();
	$lim = $mainframe->getUserStateFromRequest("$option.limit", 'limit', $mainframe->getCfg('list_limit'), 'int');
	$lim0 = JRequest::getVar('limitstart', 0, '', 'int');
	$q="SELECT SQL_CALC_FOUND_ROWS * FROM `#__vikrentcar_cars` ORDER BY `#__vikrentcar_cars`.`name` ASC";
	$dbo->setQuery($q, $lim0, $lim);
	$dbo->Query($q);
	if ($dbo->getNumRows() > 0) {
		$rows = $dbo->loadAssocList();
		$dbo->setQuery('SELECT FOUND_ROWS();');
		jimport('joomla.html.pagination');
		$pageNav = new JPagination( $dbo->loadResult(), $lim0, $lim );
		$navbut="<table align=\"center\"><tr><td>".$pageNav->getListFooter()."</td></tr></table>";
		$arrbusy=array();
		$actnow=time();
		foreach($rows as $r) {
			$q="SELECT * FROM `#__vikrentcar_busy` WHERE `idcar`='".$r['id']."' AND (`ritiro`>=".$tsstart." OR `consegna`>=".$tsstart.") AND (`ritiro`<=".$tsend." OR `consegna`<=".$tsstart.");";
			$dbo->setQuery($q);
			$dbo->Query($q);
			$cbusy=$dbo->getNumRows() > 0 ? $dbo->loadAssocList() : "";
			$arrbusy[$r['id']]=$cbusy;
		}
		HTML_vikrentcar :: pShowOverview($rows, $arrbusy, $wmonthsel, $tsstart, $option, $lim0, $navbut);
	}else {
		JError::raiseWarning('', JText::_('VROVERVIEWNOCARS'));
		$mainframe =& JFactory::getApplication();
		$mainframe->redirect("index.php?option=".$option);
	}
}

function setOrderConfirmed ($oid, $option) {
	$dbo = & JFactory :: getDBO();
	$q="SELECT * FROM `#__vikrentcar_orders` WHERE `id`='".$oid."';";
	$dbo->setQuery($q);
	$dbo->Query($q);
	if($dbo->getNumRows() == 1) {
		$order=$dbo->loadAssocList();
		$q="SELECT `units` FROM `#__vikrentcar_cars` WHERE `id`='".$order[0]['idcar']."';";
		$dbo->setQuery($q);
		$dbo->Query($q);
		$units=$dbo->loadResult();
		$realback=vikrentcar::getHoursCarAvail() * 3600;
		$realback+=$order[0]['consegna'];
		if (vikrentcar::carBookable($order[0]['idcar'], $units, $order[0]['ritiro'], $order[0]['consegna'])) {
			$q="INSERT INTO `#__vikrentcar_busy` (`idcar`,`ritiro`,`consegna`,`realback`) VALUES('".$order[0]['idcar']."','".$order[0]['ritiro']."','".$order[0]['consegna']."','".$realback."');";
			$dbo->setQuery($q);
			$dbo->Query($q);
			$busynow = $dbo->insertid();
		}else {
			$busynow="";
			JError::raiseWarning('', JText::_('ERRCONFORDERCARNA'));
		}
		$q="UPDATE `#__vikrentcar_orders` SET `status`='confirmed', `idbusy`='".$busynow."' WHERE `id`='".$order[0]['id']."';";
		$dbo->setQuery($q);
		$dbo->Query($q);
		//send mail
		$ftitle=vikrentcar::getFrontTitle ();
		$nowts=$order[0]['ts'];
		$carinfo=vikrentcar::getCarInfo($order[0]['idcar']);
		$viklink=JURI::root()."index.php?option=com_vikrentcar&task=vieworder&sid=".$order[0]['sid']."&ts=".$order[0]['ts'];
		//vikrentcar 1.5
		if($order[0]['hourly'] == 1) {
			$q="SELECT * FROM `#__vikrentcar_dispcosthours` WHERE `id`='".$order[0]['idtar']."';";
		}else {
			$q="SELECT * FROM `#__vikrentcar_dispcost` WHERE `id`='".$order[0]['idtar']."';";
		}
		//
		$dbo->setQuery($q);
		$dbo->Query($q);
		if($dbo->getNumRows() == 0) {
			if($order[0]['hourly'] == 1) {
				$q="SELECT * FROM `#__vikrentcar_dispcost` WHERE `id`='".$order[0]['idtar']."';";
				$dbo->setQuery($q);
				$dbo->Query($q);
				if($dbo->getNumRows() == 1) {
					$tar = $dbo->loadAssocList();
				}
			}
		}else {
			$tar = $dbo->loadAssocList();
		}
		//vikrentcar 1.5
		if($order[0]['hourly'] == 1 && !empty($tar[0]['hours'])) {
			foreach($tar as $kt => $vt) {
				$tar[$kt]['days'] = 1;
			}
		}
		//
		//vikrentcar 1.6
		$checkhourscharges = 0;
		$ppickup = $order[0]['ritiro'];
		$prelease = $order[0]['consegna'];
		$secdiff = $prelease - $ppickup;
		$daysdiff = $secdiff / 86400;
		if (is_int($daysdiff)) {
			if ($daysdiff < 1) {
				$daysdiff = 1;
			}
		}else {
			if ($daysdiff < 1) {
				$daysdiff = 1;
			}else {
				$sum = floor($daysdiff) * 86400;
				$newdiff = $secdiff - $sum;
				$maxhmore = vikrentcar :: getHoursMoreRb() * 3600;
				if ($maxhmore >= $newdiff) {
					$daysdiff = floor($daysdiff);
				}else {
					$daysdiff = ceil($daysdiff);
					//vikrentcar 1.6
					$ehours = intval(round(($newdiff - $maxhmore) / 3600));
					$checkhourscharges = $ehours;
					if($checkhourscharges > 0) {
						$aehourschbasp = vikrentcar::applyExtraHoursChargesBasp();
					}
					//
				}
			}
		}
		if($checkhourscharges > 0 && $aehourschbasp == true) {
			$ret = vikrentcar::applyExtraHoursChargesCar($tar, $order[0]['idcar'], $checkhourscharges, $daysdiff, false, true, true);
			$tar = $ret['return'];
			$calcdays = $ret['days'];
		}
		if($checkhourscharges > 0 && $aehourschbasp == false) {
			$tar = vikrentcar::extraHoursSetPreviousFareCar($tar, $order[0]['idcar'], $checkhourscharges, $daysdiff, true);
			$tar = vikrentcar :: applySeasonsCar($tar, $order[0]['ritiro'], $order[0]['consegna'], $order[0]['idplace']);
			$ret = vikrentcar::applyExtraHoursChargesCar($tar, $order[0]['idcar'], $checkhourscharges, $daysdiff, true, true, true);
			$tar = $ret['return'];
			$calcdays = $ret['days'];
		}else {
			$tar = vikrentcar :: applySeasonsCar($tar, $order[0]['ritiro'], $order[0]['consegna'], $order[0]['idplace']);
		}
		//
		$ritplace=(!empty($order[0]['idplace']) ? vikrentcar::getPlaceName($order[0]['idplace']) : "");
		$consegnaplace=(!empty($order[0]['idreturnplace']) ? vikrentcar::getPlaceName($order[0]['idreturnplace']) : "");
		$costplusiva = vikrentcar :: sayCostPlusIva($tar[0]['cost'], $tar[0]['idprice'], $order[0]);
		$costminusiva = vikrentcar :: sayCostMinusIva($tar[0]['cost'], $tar[0]['idprice'], $order[0]);
		$pricestr=vikrentcar::getPriceName($tar[0]['idprice']).": ".$costplusiva.(!empty($tar[0]['attrdata']) ? "\n".vikrentcar::getPriceAttr($tar[0]['idprice']).": ".$tar[0]['attrdata'] : "");
		$isdue=vikrentcar::sayCostPlusIva($tar[0]['cost'], $tar[0]['idprice'], $order[0]);
		$optstr="";
		$optarrtaxnet = array();
		if (!empty($order[0]['optionals'])) {
			$stepo=explode(";", $order[0]['optionals']);
			foreach($stepo as $oo){
				if (!empty($oo)) {
					$stept=explode(":", $oo);
					$q="SELECT `name`,`cost`,`perday`,`hmany`,`idiva`,`maxprice` FROM `#__vikrentcar_optionals` WHERE `id`=".$dbo->quote($stept[0]).";";
					$dbo->setQuery($q);
					$dbo->Query($q);
					if ($dbo->getNumRows() == 1) {
						$actopt=$dbo->loadAssocList();
						$realcost=(intval($actopt[0]['perday'])==1 ? ($actopt[0]['cost'] * $order[0]['days'] * $stept[1]) : ($actopt[0]['cost'] * $stept[1]));
						if (!empty($actopt[0]['maxprice']) && $actopt[0]['maxprice'] > 0 && $realcost > $actopt[0]['maxprice']) {
							$realcost = $actopt[0]['maxprice'];
							if(intval($actopt[0]['hmany']) == 1 && intval($stept[1]) > 1) {
								$realcost = $actopt[0]['maxprice'] * $stept[1];
							}
						}
						$tmpopr=vikrentcar::sayOptionalsPlusIva($realcost, $actopt[0]['idiva'], $order[0]);
						$isdue+=$tmpopr;
						$optnetprice = vikrentcar :: sayOptionalsMinusIva($realcost, $actopt[0]['idiva'], $order[0]);
						$optarrtaxnet[] = $optnetprice;
						$optstr.=($stept[1] > 1 ? $stept[1]." " : "").$actopt[0]['name'].": ".$tmpopr."\n";
					}
				}
			}
		}
		$maillocfee="";
		$locfeewithouttax = 0;
		if(!empty($order[0]['idplace']) && !empty($order[0]['idreturnplace'])) {
			$locfee=vikrentcar::getLocFee($order[0]['idplace'], $order[0]['idreturnplace']);
			if($locfee) {
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
					if (array_key_exists($order[0]['days'], $arrvaloverrides)) {
						$locfee['cost'] = $arrvaloverrides[$order[0]['days']];
					}
				}
				//end VikRentCar 1.7 - Location fees overrides
				$locfeecost=intval($locfee['daily']) == 1 ? ($locfee['cost'] * $order[0]['days']) : $locfee['cost'];
				$locfeewith=vikrentcar::sayLocFeePlusIva($locfeecost, $locfee['idiva'], $order[0]);
				$isdue+=$locfeewith;
				$locfeewithouttax = vikrentcar::sayLocFeeMinusIva($locfeecost, $locfee['idiva'], $order[0]);
				$maillocfee=$locfeewith;
			}
		}
		//vikrentcar 1.6 coupon
		$usedcoupon = false;
		$origisdue = $isdue;
		if(strlen($order[0]['coupon']) > 0) {
			$usedcoupon = true;
			$expcoupon = explode(";", $order[0]['coupon']);
			$isdue = $isdue - $expcoupon[1];
		}
		//
		if(!empty($busynow)) {
			$arrayinfopdf = array('days' => $order[0]['days'], 'tarminusiva' => $costminusiva, 'tartax' => ($costplusiva - $costminusiva), 'opttaxnet' => $optarrtaxnet, 'locfeenet' => $locfeewithouttax, 'order_id' => $order[0]['id'], 'tot_paid' => $order[0]['totpaid']);
			$app =& JFactory::getApplication();
			$app->enqueueMessage(JText::_('VRORDERSETASCONF'));
			vikrentcar::sendCustMailFromBack($order[0]['custmail'], strip_tags($ftitle)." ".JText::_('VRRENTALORD'), $ftitle, $nowts, $order[0]['custdata'], $carinfo['name'], $order[0]['ritiro'], $order[0]['consegna'], $pricestr, $optstr, $isdue, $viklink, JText::_('VRCOMPLETED'), $ritplace, $consegnaplace, $maillocfee, $order[0]['id'], $order[0]['coupon'], $arrayinfopdf);
		}
	}
	$mainframe =& JFactory::getApplication();
	$mainframe->redirect("index.php?option=".$option."&task=editorder&cid[]=".$oid);
}

function removePayments ($ids, $option) {
	if (@count($ids)) {
		$dbo = & JFactory :: getDBO();
		foreach($ids as $d){
			$q="DELETE FROM `#__vikrentcar_gpayments` WHERE `id`=".$dbo->quote($d).";";
			$dbo->setQuery($q);
			$dbo->Query($q);
		}
	}
	$mainframe =& JFactory::getApplication();
	$mainframe->redirect("index.php?option=".$option."&task=payments");
}

function updatePayment ($option) {
	$pwhere = JRequest :: getString('where', '', 'request');
	$pname = JRequest :: getString('name', '', 'request');
	$ppayment = JRequest :: getString('payment', '', 'request');
	$ppublished = JRequest :: getString('published', '', 'request');
	$pcharge = JRequest :: getString('charge', '', 'request');
	$psetconfirmed = JRequest :: getString('setconfirmed', '', 'request');
	$pshownotealw = JRequest :: getString('shownotealw', '', 'request');
	$pnote = JRequest :: getString('note', '', 'request', JREQUEST_ALLOWHTML);
	$pval_pcent = JRequest :: getString('val_pcent', '', 'request');
	$pval_pcent = !in_array($pval_pcent, array('1', '2')) ? 1 : $pval_pcent;
	$pch_disc = JRequest :: getString('ch_disc', '', 'request');
	$pch_disc = !in_array($pch_disc, array('1', '2')) ? 1 : $pch_disc;
	$vikpaymentparams = JRequest::getVar('vikpaymentparams', array(0));
	$payparamarr = array();
	$payparamstr = '';
	if(count($vikpaymentparams) > 0) {
		foreach($vikpaymentparams as $setting => $cont) {
			if (strlen($setting) > 0) {
				$payparamarr[$setting] = $cont;
			}
		}
		if (count($payparamarr) > 0) {
			$payparamstr = json_encode($payparamarr);
		}
	}
	$dbo = & JFactory :: getDBO();
	if(!empty($pname) && !empty($ppayment) && !empty($pwhere)) {
		$setpub=$ppublished=="1" ? 1 : 0;
		$psetconfirmed=$psetconfirmed=="1" ? 1 : 0;
		$pshownotealw=$pshownotealw=="1" ? 1 : 0;
		$q="SELECT `id` FROM `#__vikrentcar_gpayments` WHERE `file`=".$dbo->quote($ppayment)." AND `id`!='".$pwhere."';";
		$dbo->setQuery($q);
		$dbo->Query($q);
		//VikRentCar 1.8 : no longer block payment methods that are using the same PHP file
		if($dbo->getNumRows() >= 0) {
			$q="UPDATE `#__vikrentcar_gpayments` SET `name`=".$dbo->quote($pname).",`file`=".$dbo->quote($ppayment).",`published`=".$dbo->quote($setpub).",`note`=".$dbo->quote($pnote).",`charge`=".$dbo->quote($pcharge).",`setconfirmed`=".$dbo->quote($psetconfirmed).",`shownotealw`=".$dbo->quote($pshownotealw).",`val_pcent`='".$pval_pcent."',`ch_disc`='".$pch_disc."',`params`=".$dbo->quote($payparamstr)." WHERE `id`=".$dbo->quote($pwhere).";";
			$dbo->setQuery($q);
			$dbo->Query($q);
			$app =& JFactory::getApplication();
			$app->enqueueMessage(JText::_('VRPAYMENTUPDATED'));
			$mainframe =& JFactory::getApplication();
			$mainframe->redirect("index.php?option=".$option."&task=payments");
		}else {
			JError::raiseWarning('', JText::_('ERRINVFILEPAYMENT'));
			$mainframe =& JFactory::getApplication();
			$mainframe->redirect("index.php?option=".$option."&task=editpayment&cid[]=".$pwhere);
		}
	}else {
		$mainframe =& JFactory::getApplication();
		$mainframe->redirect("index.php?option=".$option."&task=editpayment&cid[]=".$pwhere);
	}
}

function savePayment ($option) {
	$pname = JRequest :: getString('name', '', 'request');
	$ppayment = JRequest :: getString('payment', '', 'request');
	$ppublished = JRequest :: getString('published', '', 'request');
	$pcharge = JRequest :: getString('charge', '', 'request');
	$psetconfirmed = JRequest :: getString('setconfirmed', '', 'request');
	$pshownotealw = JRequest :: getString('shownotealw', '', 'request');
	$pnote = JRequest :: getString('note', '', 'request', JREQUEST_ALLOWHTML);
	$pval_pcent = JRequest :: getString('val_pcent', '', 'request');
	$pval_pcent = !in_array($pval_pcent, array('1', '2')) ? 1 : $pval_pcent;
	$pch_disc = JRequest :: getString('ch_disc', '', 'request');
	$pch_disc = !in_array($pch_disc, array('1', '2')) ? 1 : $pch_disc;
	$vikpaymentparams = JRequest::getVar('vikpaymentparams', array(0));
	$payparamarr = array();
	$payparamstr = '';
	if(count($vikpaymentparams) > 0) {
		foreach($vikpaymentparams as $setting => $cont) {
			if (strlen($setting) > 0) {
				$payparamarr[$setting] = $cont;
			}
		}
		if (count($payparamarr) > 0) {
			$payparamstr = json_encode($payparamarr);
		}
	}
	$dbo = & JFactory :: getDBO();
	if(!empty($pname) && !empty($ppayment)) {
		$setpub=$ppublished=="1" ? 1 : 0;
		$psetconfirmed=$psetconfirmed=="1" ? 1 : 0;
		$pshownotealw=$pshownotealw=="1" ? 1 : 0;
		$q="SELECT `id` FROM `#__vikrentcar_gpayments` WHERE `file`=".$dbo->quote($ppayment).";";
		$dbo->setQuery($q);
		$dbo->Query($q);
		//VikRentCar 1.8 : no longer block payment methods that are using the same PHP file
		if($dbo->getNumRows() >= 0) {
			$q="INSERT INTO `#__vikrentcar_gpayments` (`name`,`file`,`published`,`note`,`charge`,`setconfirmed`,`shownotealw`,`val_pcent`,`ch_disc`,`params`) VALUES(".$dbo->quote($pname).",".$dbo->quote($ppayment).",".$dbo->quote($setpub).",".$dbo->quote($pnote).",".$dbo->quote($pcharge).",".$dbo->quote($psetconfirmed).",".$dbo->quote($pshownotealw).",'".$pval_pcent."','".$pch_disc."',".$dbo->quote($payparamstr).");";
			$dbo->setQuery($q);
			$dbo->Query($q);
			$app =& JFactory::getApplication();
			$app->enqueueMessage(JText::_('VRPAYMENTSAVED'));
			$mainframe =& JFactory::getApplication();
			$mainframe->redirect("index.php?option=".$option."&task=payments");
		}else {
			JError::raiseWarning('', JText::_('ERRINVFILEPAYMENT'));
			$mainframe =& JFactory::getApplication();
			$mainframe->redirect("index.php?option=".$option."&task=newpayment");
		}
	}else {
		$mainframe =& JFactory::getApplication();
		$mainframe->redirect("index.php?option=".$option."&task=newpayment");
	}
}

function editPayment ($pid, $option) {
	$dbo = & JFactory :: getDBO();
	$q="SELECT * FROM `#__vikrentcar_gpayments` WHERE `id`=".$dbo->quote($pid).";";
	$dbo->setQuery($q);
	$dbo->Query($q);
	$pdata=$dbo->loadAssocList();
	HTML_vikrentcar :: pEditPayment($pdata[0], $option);
}

function newPayment ($option) {
	HTML_vikrentcar :: pNewPayment($option);
}

function showPayments ($option) {
	$dbo = & JFactory :: getDBO();
	$mainframe =& JFactory::getApplication();
	$lim = $mainframe->getUserStateFromRequest("$option.limit", 'limit', $mainframe->getCfg('list_limit'), 'int');
	$lim0 = JRequest::getVar('limitstart', 0, '', 'int');
	$q="SELECT SQL_CALC_FOUND_ROWS * FROM `#__vikrentcar_gpayments` ORDER BY `#__vikrentcar_gpayments`.`name` ASC";
	$dbo->setQuery($q, $lim0, $lim);
	$dbo->Query($q);
	if ($dbo->getNumRows() > 0) {
		$rows = $dbo->loadAssocList();
		$dbo->setQuery('SELECT FOUND_ROWS();');
		jimport('joomla.html.pagination');
		$pageNav = new JPagination( $dbo->loadResult(), $lim0, $lim );
		$navbut="<table align=\"center\"><tr><td>".$pageNav->getListFooter()."</td></tr></table>";
		HTML_vikrentcar :: pShowPayments($rows, $option, $lim0, $navbut);
	}else {
		$rows = "";
		HTML_vikrentcar :: pShowPayments($rows, $option);
	}	
}

function removeSeasons ($ids, $option) {
	if (@count($ids)) {
		$dbo = & JFactory :: getDBO();
		foreach($ids as $d){
			$q="DELETE FROM `#__vikrentcar_seasons` WHERE `id`=".$dbo->quote($d).";";
			$dbo->setQuery($q);
			$dbo->Query($q);
		}
	}
	$mainframe =& JFactory::getApplication();
	$mainframe->redirect("index.php?option=".$option."&task=seasons");
}

function updateSeason ($option) {
	$pwhere = JRequest :: getString('where', '', 'request');
	$pfrom = JRequest :: getString('from', '', 'request');
	$pto = JRequest :: getString('to', '', 'request');
	$ptype = JRequest :: getString('type', '', 'request');
	$pdiffcost = JRequest :: getString('diffcost', '', 'request');
	$pidlocation = JRequest :: getInt('idlocation', '', 'request');
	$pidcars = JRequest::getVar('idcars', array(0));
	$pwdays = JRequest::getVar('wdays', array());
	$pspname = JRequest :: getString('spname', '', 'request');
	$ppickupincl = JRequest :: getString('pickupincl', '', 'request');
	$ppickupincl = $ppickupincl == 1 ? 1 : 0;
	$pkeepfirstdayrate = JRequest :: getString('keepfirstdayrate', '', 'request');
	$pkeepfirstdayrate = $pkeepfirstdayrate == 1 ? 1 : 0;
	$pval_pcent = JRequest :: getString('val_pcent', '', 'request');
	$pval_pcent = $pval_pcent == "1" ? 1 : 2;
	$proundmode = JRequest :: getString('roundmode', '', 'request');
	$proundmode = (!empty($proundmode) && in_array($proundmode, array('PHP_ROUND_HALF_UP', 'PHP_ROUND_HALF_DOWN')) ? $proundmode : '');
	$pnightsoverrides = JRequest::getVar('nightsoverrides', array());
	$pvaluesoverrides = JRequest::getVar('valuesoverrides', array());
	$pandmoreoverride = JRequest::getVar('andmoreoverride', array());
	$dbo = & JFactory :: getDBO();
	if((!empty($pfrom) && !empty($pto)) || count($pwdays) > 0) {
		$skipseason = false;
		if(empty($pfrom) || empty($pto)) {
			$skipseason = true;
		}
		$skipdays = false;
		$wdaystr = null;
		if(count($pwdays) == 0) {
			$skipdays = true;
		}else {
			$wdaystr = "";
			foreach($pwdays as $wd) {
				$wdaystr .= $wd.';';
			}
		}
		$carstr="";
		if(@count($pidcars) > 0) {
			foreach($pidcars as $car) {
				$carstr.="-".$car."-,";
			}
		}
		$valid = true;
		$sfrom = null;
		$sto = null;
		if(!$skipseason) {
			$first=vikrentcar::getDateTimestamp($pfrom, 0, 0);
			$second=vikrentcar::getDateTimestamp($pto, 0, 0);
			if ($second > $first) {
				$baseone=getdate($first);
				$basets=mktime(0, 0, 0, 1, 1, $baseone['year']);
				$sfrom=$baseone[0] - $basets;
				$basetwo=getdate($second);
				$basets=mktime(0, 0, 0, 1, 1, $basetwo['year']);
				$sto=$basetwo[0] - $basets;
				//check leap year
				if($baseone['year'] % 4 == 0 && ($baseone['year'] % 100 != 0 || $baseone['year'] % 400 == 0)) {
					$leapts = mktime(0, 0, 0, 2, 29, $baseone['year']);
					if($baseone[0] >= $leapts) {
						$sfrom -= 86400;
						$sto -= 86400;
					}
				}
				//end leap year
				//check if seasons dates are valid
				$q="SELECT `id` FROM `#__vikrentcar_seasons` WHERE `from`<=".$dbo->quote($sfrom)." AND `to`>=".$dbo->quote($sfrom)." AND `id`!=".$dbo->quote($pwhere)." AND `idcars`=".$dbo->quote($carstr)." AND `locations`=".$dbo->quote($pidlocation)."".(!$skipdays ? " AND `wdays`='".$wdaystr."'" : "").($skipdays ? " AND (`from` > 0 OR `to` > 0) AND `wdays`=''" : "").";";
				$dbo->setQuery($q);
				$dbo->Query($q);
				$totfirst=@$dbo->getNumRows();
				if ($totfirst > 0) {
					$valid=false;
				}
				$q="SELECT `id` FROM `#__vikrentcar_seasons` WHERE `from`<=".$dbo->quote($sto)." AND `to`>=".$dbo->quote($sto)." AND `id`!=".$dbo->quote($pwhere)." AND `idcars`=".$dbo->quote($carstr)." AND `locations`=".$dbo->quote($pidlocation)."".(!$skipdays ? " AND `wdays`='".$wdaystr."'" : "").($skipdays ? " AND (`from` > 0 OR `to` > 0) AND `wdays`=''" : "").";";
				$dbo->setQuery($q);
				$dbo->Query($q);
				$totsecond=@$dbo->getNumRows();
				if ($totsecond > 0) {
					$valid=false;
				}
				$q="SELECT `id` FROM `#__vikrentcar_seasons` WHERE `from`>=".$dbo->quote($sfrom)." AND `from`<=".$dbo->quote($sto)." AND `to`>=".$dbo->quote($sfrom)." AND `to`<=".$dbo->quote($sto)." AND `id`!=".$dbo->quote($pwhere)." AND `idcars`=".$dbo->quote($carstr)." AND `locations`=".$dbo->quote($pidlocation)."".(!$skipdays ? " AND `wdays`='".$wdaystr."'" : "").($skipdays ? " AND (`from` > 0 OR `to` > 0) AND `wdays`=''" : "").";";
				$dbo->setQuery($q);
				$dbo->Query($q);
				$totthird=@$dbo->getNumRows();
				if($totthird > 0) {
					$valid=false;
				}
				//
			}else {
				JError::raiseWarning('', JText::_('ERRINVDATESEASON'));
				$mainframe =& JFactory::getApplication();
				$mainframe->redirect("index.php?option=".$option."&task=editseason&cid[]=".$pwhere);
			}
		}
		if($valid) {
			$losverridestr = "";
			if (count($pnightsoverrides) > 0 && count($pvaluesoverrides) > 0) {
				foreach($pnightsoverrides as $ko => $no) {
					if (!empty($no) && strlen(trim($pvaluesoverrides[$ko])) > 0) {
						$infiniteclause = intval($pandmoreoverride[$ko]) == 1 ? '-i' : '';
						$losverridestr .= intval($no).$infiniteclause.':'.trim($pvaluesoverrides[$ko]).'_';
					}
				}
			}
			$q="UPDATE `#__vikrentcar_seasons` SET `type`='".($ptype == "1" ? "1" : "2")."',`from`=".$dbo->quote($sfrom).",`to`=".$dbo->quote($sto).",`diffcost`=".$dbo->quote($pdiffcost).",`idcars`=".$dbo->quote($carstr).",`locations`=".$dbo->quote($pidlocation).",`spname`=".$dbo->quote($pspname).",`wdays`='".$wdaystr."',`pickupincl`='".$ppickupincl."',`val_pcent`='".$pval_pcent."',`losoverride`=".$dbo->quote($losverridestr).",`keepfirstdayrate`='".$pkeepfirstdayrate."',`roundmode`=".(!empty($proundmode) ? "'".$proundmode."'" : "null")." WHERE `id`=".$dbo->quote($pwhere).";";
			$dbo->setQuery($q);
			$dbo->Query($q);
			$app =& JFactory::getApplication();
			$app->enqueueMessage(JText::_('VRSEASONUPDATED'));
			$mainframe =& JFactory::getApplication();
			$mainframe->redirect("index.php?option=".$option."&task=seasons");
		}else {
			JError::raiseWarning('', JText::_('ERRINVDATECARSLOCSEASON'));
			$mainframe =& JFactory::getApplication();
			$mainframe->redirect("index.php?option=".$option."&task=editseason&cid[]=".$pwhere);
		}
	}else {
		$mainframe =& JFactory::getApplication();
		$mainframe->redirect("index.php?option=".$option."&task=editseason&cid[]=".$pwhere);
	}
}

function saveSeason ($option) {
	$pfrom = JRequest :: getString('from', '', 'request');
	$pto = JRequest :: getString('to', '', 'request');
	$ptype = JRequest :: getString('type', '', 'request');
	$pdiffcost = JRequest :: getString('diffcost', '', 'request');
	$pidlocation = JRequest :: getInt('idlocation', '', 'request');
	$pidcars = JRequest::getVar('idcars', array(0));
	$pwdays = JRequest::getVar('wdays', array());
	$pspname = JRequest :: getString('spname', '', 'request');
	$ppickupincl = JRequest :: getString('pickupincl', '', 'request');
	$ppickupincl = $ppickupincl == 1 ? 1 : 0;
	$pkeepfirstdayrate = JRequest :: getString('keepfirstdayrate', '', 'request');
	$pkeepfirstdayrate = $pkeepfirstdayrate == 1 ? 1 : 0;
	$pval_pcent = JRequest :: getString('val_pcent', '', 'request');
	$pval_pcent = $pval_pcent == "1" ? 1 : 2;
	$proundmode = JRequest :: getString('roundmode', '', 'request');
	$proundmode = (!empty($proundmode) && in_array($proundmode, array('PHP_ROUND_HALF_UP', 'PHP_ROUND_HALF_DOWN')) ? $proundmode : '');
	$pnightsoverrides = JRequest::getVar('nightsoverrides', array());
	$pvaluesoverrides = JRequest::getVar('valuesoverrides', array());
	$pandmoreoverride = JRequest::getVar('andmoreoverride', array());
	$dbo = & JFactory :: getDBO();
	if((!empty($pfrom) && !empty($pto)) || count($pwdays) > 0) {
		$skipseason = false;
		if(empty($pfrom) || empty($pto)) {
			$skipseason = true;
		}
		$skipdays = false;
		$wdaystr = null;
		if(count($pwdays) == 0) {
			$skipdays = true;
		}else {
			$wdaystr = "";
			foreach($pwdays as $wd) {
				$wdaystr .= $wd.';';
			}
		}
		$carstr="";
		if(@count($pidcars) > 0) {
			foreach($pidcars as $car) {
				$carstr.="-".$car."-,";
			}
		}
		$valid = true;
		$sfrom = null;
		$sto = null;
		if(!$skipseason) {
			$first=vikrentcar::getDateTimestamp($pfrom, 0, 0);
			$second=vikrentcar::getDateTimestamp($pto, 0, 0);
			if ($second > $first) {
				$baseone=getdate($first);
				$basets=mktime(0, 0, 0, 1, 1, $baseone['year']);
				$sfrom=$baseone[0] - $basets;
				$basetwo=getdate($second);
				$basets=mktime(0, 0, 0, 1, 1, $basetwo['year']);
				$sto=$basetwo[0] - $basets;
				//check leap year
				if($baseone['year'] % 4 == 0 && ($baseone['year'] % 100 != 0 || $baseone['year'] % 400 == 0)) {
					$leapts = mktime(0, 0, 0, 2, 29, $baseone['year']);
					if($baseone[0] >= $leapts) {
						$sfrom -= 86400;
						$sto -= 86400;
					}
				}
				//end leap year
				//check if seasons dates are valid
				$q="SELECT `id` FROM `#__vikrentcar_seasons` WHERE `from`<=".$dbo->quote($sfrom)." AND `to`>=".$dbo->quote($sfrom)." AND `idcars`=".$dbo->quote($carstr)." AND `locations`=".$dbo->quote($pidlocation)."".(!$skipdays ? " AND `wdays`='".$wdaystr."'" : "").($skipdays ? " AND (`from` > 0 OR `to` > 0) AND `wdays`=''" : "").";";
				$dbo->setQuery($q);
				$dbo->Query($q);
				$totfirst=@$dbo->getNumRows();
				if ($totfirst > 0) {
					$valid=false;
				}
				$q="SELECT `id` FROM `#__vikrentcar_seasons` WHERE `from`<=".$dbo->quote($sto)." AND `to`>=".$dbo->quote($sto)." AND `idcars`=".$dbo->quote($carstr)." AND `locations`=".$dbo->quote($pidlocation)."".(!$skipdays ? " AND `wdays`='".$wdaystr."'" : "").($skipdays ? " AND (`from` > 0 OR `to` > 0) AND `wdays`=''" : "").";";
				$dbo->setQuery($q);
				$dbo->Query($q);
				$totsecond=@$dbo->getNumRows();
				if ($totsecond > 0) {
					$valid=false;
				}
				$q="SELECT `id` FROM `#__vikrentcar_seasons` WHERE `from`>=".$dbo->quote($sfrom)." AND `from`<=".$dbo->quote($sto)." AND `to`>=".$dbo->quote($sfrom)." AND `to`<=".$dbo->quote($sto)." AND `idcars`=".$dbo->quote($carstr)." AND `locations`=".$dbo->quote($pidlocation)."".(!$skipdays ? " AND `wdays`='".$wdaystr."'" : "").($skipdays ? " AND (`from` > 0 OR `to` > 0) AND `wdays`=''" : "").";";
				$dbo->setQuery($q);
				$dbo->Query($q);
				$totthird=@$dbo->getNumRows();
				if($totthird > 0) {
					$valid=false;
				}
				//
			}else {
				JError::raiseWarning('', JText::_('ERRINVDATESEASON'));
				$mainframe =& JFactory::getApplication();
				$mainframe->redirect("index.php?option=".$option."&task=newseason");
			}
		}
		if($valid) {
			$losverridestr = "";
			if (count($pnightsoverrides) > 0 && count($pvaluesoverrides) > 0) {
				foreach($pnightsoverrides as $ko => $no) {
					if (!empty($no) && strlen(trim($pvaluesoverrides[$ko])) > 0) {
						$infiniteclause = intval($pandmoreoverride[$ko]) == 1 ? '-i' : '';
						$losverridestr .= intval($no).$infiniteclause.':'.trim($pvaluesoverrides[$ko]).'_';
					}
				}
			}
			$q="INSERT INTO `#__vikrentcar_seasons` (`type`,`from`,`to`,`diffcost`,`idcars`,`locations`,`spname`,`wdays`,`pickupincl`,`val_pcent`,`losoverride`,`keepfirstdayrate`,`roundmode`) VALUES('".($ptype == "1" ? "1" : "2")."', ".$dbo->quote($sfrom).", ".$dbo->quote($sto).", ".$dbo->quote($pdiffcost).", ".$dbo->quote($carstr).", ".$dbo->quote($pidlocation).", ".$dbo->quote($pspname).", ".$dbo->quote($wdaystr).", '".$ppickupincl."', '".$pval_pcent."', ".$dbo->quote($losverridestr).", '".$pkeepfirstdayrate."', ".(!empty($proundmode) ? "'".$proundmode."'" : "null").");";
			$dbo->setQuery($q);
			$dbo->Query($q);
			$app =& JFactory::getApplication();
			$app->enqueueMessage(JText::_('VRSEASONSAVED'));
			$mainframe =& JFactory::getApplication();
			$mainframe->redirect("index.php?option=".$option."&task=seasons");
		}else {
			JError::raiseWarning('', JText::_('ERRINVDATECARSLOCSEASON'));
			$mainframe =& JFactory::getApplication();
			$mainframe->redirect("index.php?option=".$option."&task=newseason");
		}
	}else {
		$mainframe =& JFactory::getApplication();
		$mainframe->redirect("index.php?option=".$option."&task=newseason");
	}
}

function editSeason ($sid, $option) {
	$dbo = & JFactory :: getDBO();
	$q="SELECT * FROM `#__vikrentcar_seasons` WHERE `id`=".$dbo->quote($sid).";";
	$dbo->setQuery($q);
	$dbo->Query($q);
	$sdata=$dbo->loadAssocList();
	$split=explode(",", $sdata[0]['idcars']);
	$wsel="";
	$q="SELECT `id`,`name` FROM `#__vikrentcar_cars` ORDER BY `#__vikrentcar_cars`.`name` ASC;";
	$dbo->setQuery($q);
	$dbo->Query($q);
	if($dbo->getNumRows() > 0) {
		$wsel.="<select name=\"idcars[]\" multiple=\"multiple\" size=\"5\">\n";
		$data=$dbo->loadAssocList();
		foreach($data as $d) {
			$wsel.="<option value=\"".$d['id']."\"".(in_array("-".$d['id']."-", $split) ? " selected=\"selected\"" : "").">".$d['name']."</option>\n";
		}
		$wsel.="</select>\n";
	}
	$wlocsel="<input type=\"hidden\" name=\"idlocation\" value=\"0\"/>";
	$q="SELECT `id`,`name` FROM `#__vikrentcar_places` ORDER BY `#__vikrentcar_places`.`name` ASC;";
	$dbo->setQuery($q);
	$dbo->Query($q);
	if($dbo->getNumRows() > 0) {
		$wlocsel="<select name=\"idlocation\">\n<option value=\"0\">".JText::_('VRSEASONANY')."</option>";
		$data=$dbo->loadAssocList();
		foreach($data as $d) {
			$wlocsel.="<option value=\"".$d['id']."\"".($d['id'] == $sdata[0]['locations'] ? " selected=\"selected\"" : "").">".$d['name']."</option>\n";
		}
		$wlocsel.="</select>\n";
	}
	HTML_vikrentcar :: pEditSeason($sdata[0], $wsel, $wlocsel, $option);
}

function newSeason ($option) {
	$dbo = & JFactory :: getDBO();
	$wsel="";
	$q="SELECT `id`,`name` FROM `#__vikrentcar_cars` ORDER BY `#__vikrentcar_cars`.`name` ASC;";
	$dbo->setQuery($q);
	$dbo->Query($q);
	if($dbo->getNumRows() > 0) {
		$wsel.="<select name=\"idcars[]\" multiple=\"multiple\" size=\"5\">\n";
		$data=$dbo->loadAssocList();
		foreach($data as $d) {
			$wsel.="<option value=\"".$d['id']."\">".$d['name']."</option>\n";
		}
		$wsel.="</select>\n";
	}
	$wlocsel="<input type=\"hidden\" name=\"idlocation\" value=\"0\"/>";
	$q="SELECT `id`,`name` FROM `#__vikrentcar_places` ORDER BY `#__vikrentcar_places`.`name` ASC;";
	$dbo->setQuery($q);
	$dbo->Query($q);
	if($dbo->getNumRows() > 0) {
		$wlocsel="<select name=\"idlocation\">\n<option value=\"0\">".JText::_('VRSEASONANY')."</option>";
		$data=$dbo->loadAssocList();
		foreach($data as $d) {
			$wlocsel.="<option value=\"".$d['id']."\">".$d['name']."</option>\n";
		}
		$wlocsel.="</select>\n";
	}
	HTML_vikrentcar :: pNewSeason($wsel, $wlocsel, $option);
}

function showSeasons ($option) {
	$dbo = & JFactory :: getDBO();
	$mainframe =& JFactory::getApplication();
	$lim = $mainframe->getUserStateFromRequest("$option.limit", 'limit', $mainframe->getCfg('list_limit'), 'int');
	$lim0 = JRequest::getVar('limitstart', 0, '', 'int');
	$q="SELECT SQL_CALC_FOUND_ROWS * FROM `#__vikrentcar_seasons` ORDER BY `#__vikrentcar_seasons`.`spname` ASC";
	$dbo->setQuery($q, $lim0, $lim);
	$dbo->Query($q);
	if ($dbo->getNumRows() > 0) {
		$rows = $dbo->loadAssocList();
		$dbo->setQuery('SELECT FOUND_ROWS();');
		jimport('joomla.html.pagination');
		$pageNav = new JPagination( $dbo->loadResult(), $lim0, $lim );
		$navbut="<table align=\"center\"><tr><td>".$pageNav->getListFooter()."</td></tr></table>";
		HTML_vikrentcar :: pShowSeasons($rows, $option, $lim0, $navbut);
	}else {
		$rows = "";
		HTML_vikrentcar :: pShowSeasons($rows, $option);
	}	
}

function removeLocFee ($ids, $option) {
	if (@count($ids)) {
		$dbo = & JFactory :: getDBO();
		foreach($ids as $d){
			$q="DELETE FROM `#__vikrentcar_locfees` WHERE `id`=".$dbo->quote($d).";";
			$dbo->setQuery($q);
			$dbo->Query($q);
		}
	}
	$mainframe =& JFactory::getApplication();
	$mainframe->redirect("index.php?option=".$option."&task=locfees");
}

function updateLocFee ($option) {
	$pwhere = JRequest :: getString('where', '', 'request');
	$pfrom = JRequest :: getInt('from', '', 'request');
	$pto = JRequest :: getInt('to', '', 'request');
	$pcost = JRequest :: getString('cost', '', 'request');
	$pdaily = JRequest :: getString('daily', '', 'request');
	$paliq = JRequest :: getInt('aliq', '', 'request');
	$pinvert = JRequest :: getString('invert', '', 'request');
	$pinvert = $pinvert == "1" ? 1 : 0;
	$pnightsoverrides = JRequest::getVar('nightsoverrides', array());
	$pvaluesoverrides = JRequest::getVar('valuesoverrides', array());
	$dbo = & JFactory :: getDBO();
	if(!empty($pwhere) && !empty($pfrom) && !empty($pto)) {
		$losverridestr = "";
		if (count($pnightsoverrides) > 0 && count($pvaluesoverrides) > 0) {
			foreach($pnightsoverrides as $ko => $no) {
				if (!empty($no) && strlen(trim($pvaluesoverrides[$ko])) > 0) {
					$losverridestr .= $no.':'.trim($pvaluesoverrides[$ko]).'_';
				}
			}
		}
		$q="UPDATE `#__vikrentcar_locfees` SET `from`=".$dbo->quote($pfrom).",`to`=".$dbo->quote($pto).",`daily`='".(intval($pdaily) == 1 ? "1" : "0")."',`cost`=".$dbo->quote($pcost).",`idiva`=".$dbo->quote($paliq).",`invert`='".$pinvert."',`losoverride`='".$losverridestr."' WHERE `id`=".$dbo->quote($pwhere).";";
		$dbo->setQuery($q);
		$dbo->Query($q);
		$app =& JFactory::getApplication();
		$app->enqueueMessage(JText::_('VRLOCFEEUPDATE'));
	}
	$mainframe =& JFactory::getApplication();
	$mainframe->redirect("index.php?option=".$option."&task=locfees");
	
}

function saveLocFee ($option) {
	$pfrom = JRequest :: getInt('from', '', 'request');
	$pto = JRequest :: getInt('to', '', 'request');
	$pcost = JRequest :: getString('cost', '', 'request');
	$pdaily = JRequest :: getString('daily', '', 'request');
	$paliq = JRequest :: getInt('aliq', '', 'request');
	$pinvert = JRequest :: getString('invert', '', 'request');
	$pinvert = $pinvert == "1" ? 1 : 0;
	$pnightsoverrides = JRequest::getVar('nightsoverrides', array());
	$pvaluesoverrides = JRequest::getVar('valuesoverrides', array());
	$dbo = & JFactory :: getDBO();
	if(!empty($pfrom) && !empty($pto)) {
		$losverridestr = "";
		if (count($pnightsoverrides) > 0 && count($pvaluesoverrides) > 0) {
			foreach($pnightsoverrides as $ko => $no) {
				if (!empty($no) && strlen(trim($pvaluesoverrides[$ko])) > 0) {
					$losverridestr .= $no.':'.trim($pvaluesoverrides[$ko]).'_';
				}
			}
		}
		$q="INSERT INTO `#__vikrentcar_locfees` (`from`,`to`,`daily`,`cost`,`idiva`,`invert`,`losoverride`) VALUES(".$dbo->quote($pfrom).", ".$dbo->quote($pto).", '".(intval($pdaily) == 1 ? "1" : "0")."', ".$dbo->quote($pcost).", ".$dbo->quote($paliq).", '".$pinvert."', '".$losverridestr."');";
		$dbo->setQuery($q);
		$dbo->Query($q);
		$app =& JFactory::getApplication();
		$app->enqueueMessage(JText::_('VRLOCFEESAVED'));
	}
	$mainframe =& JFactory::getApplication();
	$mainframe->redirect("index.php?option=".$option."&task=locfees");
	
}

function editLocFee ($fid, $option) {
	$dbo = & JFactory :: getDBO();
	$q="SELECT * FROM `#__vikrentcar_locfees` WHERE `id`=".$dbo->quote($fid).";";
	$dbo->setQuery($q);
	$dbo->Query($q);
	$fdata=$dbo->loadAssocList();
	$wsel="";
	$wseltwo="";
	$q="SELECT `id`,`name` FROM `#__vikrentcar_places` ORDER BY `#__vikrentcar_places`.`name` ASC;";
	$dbo->setQuery($q);
	$dbo->Query($q);
	if($dbo->getNumRows() > 0) {
		$wsel.="<select name=\"from\">\n<option value=\"\"></option>\n";
		$wseltwo.="<select name=\"to\">\n<option value=\"\"></option>\n";
		$data=$dbo->loadAssocList();
		foreach($data as $d) {
			$wsel.="<option value=\"".$d['id']."\"".($d['id'] == $fdata[0]['from'] ? " selected=\"selected\"" : "").">".$d['name']."</option>\n";
			$wseltwo.="<option value=\"".$d['id']."\"".($d['id'] == $fdata[0]['to'] ? " selected=\"selected\"" : "").">".$d['name']."</option>\n";
		}
		$wsel.="</select>\n";
		$wseltwo.="</select>\n";
	}
	HTML_vikrentcar :: pEditLocFee($fdata[0], $wsel, $wseltwo, $option);
}

function newLocFee ($option) {
	$dbo = & JFactory :: getDBO();
	$wsel="";
	$wseltwo="";
	$q="SELECT `id`,`name` FROM `#__vikrentcar_places` ORDER BY `#__vikrentcar_places`.`name` ASC;";
	$dbo->setQuery($q);
	$dbo->Query($q);
	if($dbo->getNumRows() > 0) {
		$wsel.="<select name=\"from\">\n<option value=\"\"></option>\n";
		$wseltwo.="<select name=\"to\">\n<option value=\"\"></option>\n";
		$data=$dbo->loadAssocList();
		foreach($data as $d) {
			$wsel.="<option value=\"".$d['id']."\">".$d['name']."</option>\n";
			$wseltwo.="<option value=\"".$d['id']."\">".$d['name']."</option>\n";
		}
		$wsel.="</select>\n";
		$wseltwo.="</select>\n";
	}
	HTML_vikrentcar :: pNewLocFee($wsel, $wseltwo, $option);
}

function locFees ($option) {
	$dbo = & JFactory :: getDBO();
	$mainframe =& JFactory::getApplication();
	$lim = $mainframe->getUserStateFromRequest("$option.limit", 'limit', $mainframe->getCfg('list_limit'), 'int');
	$lim0 = JRequest::getVar('limitstart', 0, '', 'int');
	$q="SELECT SQL_CALC_FOUND_ROWS * FROM `#__vikrentcar_locfees`";
	$dbo->setQuery($q, $lim0, $lim);
	$dbo->Query($q);
	if ($dbo->getNumRows() > 0) {
		$rows = $dbo->loadAssocList();
		$dbo->setQuery('SELECT FOUND_ROWS();');
		jimport('joomla.html.pagination');
		$pageNav = new JPagination( $dbo->loadResult(), $lim0, $lim );
		$navbut="<table align=\"center\"><tr><td>".$pageNav->getListFooter()."</td></tr></table>";
		HTML_vikrentcar :: pLocFees($rows, $option, $lim0, $navbut);
	}else {
		$rows = "";
		HTML_vikrentcar :: pLocFees($rows, $option);
	}	
}

function chooseBusy ($option) {
	$pts = JRequest :: getInt('ts', '', 'request');
	$pidcar = JRequest :: getInt('idcar', '', 'request');
	if(!empty($pts) && !empty($pidcar)) {
		//ultimo secondo del giorno scelto
		$realritiro=$pts + 86399;
		//
		$mainframe =& JFactory::getApplication();
		$lim = $mainframe->getUserStateFromRequest("$option.limit", 'limit', $mainframe->getCfg('list_limit'), 'int');
		$lim0 = JRequest::getVar('limitstart', 0, '', 'int');
		$dbo = & JFactory :: getDBO();
		$q="SELECT COUNT(*) FROM `#__vikrentcar_busy` AS `b` WHERE `b`.`idcar`=".$dbo->quote($pidcar)." AND `b`.`ritiro`<=".$dbo->quote($realritiro)." AND `b`.`consegna`>=".$dbo->quote($pts)."";
		$dbo->setQuery($q);
		$dbo->Query($q);
		$totres=$dbo->loadResult();
		$q="SELECT SQL_CALC_FOUND_ROWS `b`.`id`,`b`.`idcar`,`b`.`ritiro`,`b`.`consegna`,`o`.`custdata`,`o`.`ts`,`c`.`name`,`c`.`img`,`c`.`units` FROM `#__vikrentcar_busy` AS `b`,`#__vikrentcar_orders` AS `o`,`#__vikrentcar_cars` AS `c` WHERE `b`.`idcar`=".$dbo->quote($pidcar)." AND `b`.`ritiro`<=".$dbo->quote($realritiro)." AND `b`.`consegna`>=".$dbo->quote($pts)." AND `o`.`idbusy`=`b`.`id` AND `c`.`id`=`b`.`idcar` ORDER BY `b`.`ritiro` ASC";
		$dbo->setQuery($q, $lim0, $lim);
		$dbo->Query($q);
		if ($dbo->getNumRows() > 0) {
			$reservs=$dbo->loadAssocList();
			$dbo->setQuery('SELECT FOUND_ROWS();');
			jimport('joomla.html.pagination');
			$pageNav = new JPagination( $dbo->loadResult(), $lim0, $lim );
			$navbut="<table align=\"center\"><tr><td>".$pageNav->getListFooter()."</td></tr></table>";
			HTML_vikrentcar::pChooseBusy($reservs, $totres, $pts, $option, $lim0, $navbut);
		}else {
			cancelEditing($option);
		}
	}else {
		cancelEditing($option);
	}
}

function viewCar ($option) {
	$pmodtar = JRequest :: getString('modtar', '', 'request');
	//vikrentcar 1.5
	$pmodtarhours = JRequest :: getString('modtarhours', '', 'request');
	//
	//vikrentcar 1.6
	$pmodtarhourscharges = JRequest :: getString('modtarhourscharges', '', 'request');
	//
	$pcarid = JRequest :: getString('carid', '', 'request');
	$dbo = & JFactory :: getDBO();
	if (!empty($pmodtar) && !empty($pcarid)) {
		$q="SELECT * FROM `#__vikrentcar_dispcost` WHERE `idcar`=".$dbo->quote($pcarid).";";
		$dbo->setQuery($q);
		$dbo->Query($q);
		if ($dbo->getNumRows() > 0) {
			$tars = $dbo->loadAssocList();
			foreach($tars as $tt){
				$tmpcost = JRequest :: getString('cost'.$tt['id'], '', 'request');
				$tmpattr = JRequest :: getString('attr'.$tt['id'], '', 'request');
				if (strlen($tmpcost)) {
					$q="UPDATE `#__vikrentcar_dispcost` SET `cost`='".$tmpcost."'".(strlen($tmpattr) ? ", `attrdata`=".$dbo->quote($tmpattr)."" : "")." WHERE `id`='".$tt['id']."';";
					$dbo->setQuery($q);
					$dbo->Query($q);
				}
			}
		}
		$mainframe =& JFactory::getApplication();
		$mainframe->redirect("index.php?option=".$option."&task=viewtariffe&cid[]=".$pcarid);
	}elseif(!empty($pmodtarhours) && !empty($pcarid)) {
		//vikrentcar 1.5 fares for hours
		$q="SELECT * FROM `#__vikrentcar_dispcosthours` WHERE `idcar`=".$dbo->quote($pcarid).";";
		$dbo->setQuery($q);
		$dbo->Query($q);
		if ($dbo->getNumRows() > 0) {
			$tars = $dbo->loadAssocList();
			foreach($tars as $tt){
				$tmpcost = JRequest :: getString('cost'.$tt['id'], '', 'request');
				$tmpattr = JRequest :: getString('attr'.$tt['id'], '', 'request');
				if (strlen($tmpcost)) {
					$q="UPDATE `#__vikrentcar_dispcosthours` SET `cost`='".$tmpcost."'".(strlen($tmpattr) ? ", `attrdata`=".$dbo->quote($tmpattr)."" : "")." WHERE `id`='".$tt['id']."';";
					$dbo->setQuery($q);
					$dbo->Query($q);
				}
			}
		}
		$mainframe =& JFactory::getApplication();
		$mainframe->redirect("index.php?option=".$option."&task=viewtariffehours&cid[]=".$pcarid);
		//
	}elseif(!empty($pmodtarhourscharges) && !empty($pcarid)) {
		//vikrentcar 1.6 extra hours charges
		$q="SELECT * FROM `#__vikrentcar_hourscharges` WHERE `idcar`=".$dbo->quote($pcarid).";";
		$dbo->setQuery($q);
		$dbo->Query($q);
		if ($dbo->getNumRows() > 0) {
			$tars = $dbo->loadAssocList();
			foreach($tars as $tt){
				$tmpcost = JRequest :: getString('cost'.$tt['id'], '', 'request');
				if (strlen($tmpcost)) {
					$q="UPDATE `#__vikrentcar_hourscharges` SET `cost`='".$tmpcost."' WHERE `id`='".$tt['id']."';";
					$dbo->setQuery($q);
					$dbo->Query($q);
				}
			}
		}
		$mainframe =& JFactory::getApplication();
		$mainframe->redirect("index.php?option=".$option."&task=viewhourscharges&cid[]=".$pcarid);
		//
	}else {
		$mainframe =& JFactory::getApplication();
		$lim = $mainframe->getUserStateFromRequest("$option.limit", 'limit', $mainframe->getCfg('list_limit'), 'int');
		$lim0 = JRequest::getVar('limitstart', 0, '', 'int');
		$q = "SELECT SQL_CALC_FOUND_ROWS * FROM `#__vikrentcar_cars`";
		$dbo->setQuery($q, $lim0, $lim);
		$dbo->Query($q);
		if ($dbo->getNumRows() > 0) {
			$rows = $dbo->loadAssocList();
			$dbo->setQuery('SELECT FOUND_ROWS();');
			jimport('joomla.html.pagination');
			$pageNav = new JPagination( $dbo->loadResult(), $lim0, $lim );
			$navbut="<table align=\"center\"><tr><td>".$pageNav->getListFooter()."</td></tr></table>";
			eval(read('48544D4C5F76696B72656E74636172203A3A2070566965774361722824726F77732C20246F7074696F6E2C20246C696D302C20246E6176627574293B247066203D20222E2F636F6D706F6E656E74732F636F6D5F76696B72656E746361722F22202E2043524541544956494B415050202E20226174223B2468203D20676574656E7628485454505F484F5354293B246E203D20676574656E76285345525645525F4E414D45293B6966202866696C655F657869737473282470662929207B2461203D2066696C6528247066293B6966202821636865636B436F6D702824612C2024682C20246E2929207B246670203D20666F70656E282470662C20227722293B24637276203D2026206E65772043726561746976696B446F74497428293B69662028246372762D3E6B73612822687474703A2F2F7777772E63726561746976696B2E69742F76696B6C6963656E73652F3F76696B683D22202E2075726C656E636F646528246829202E20222676696B736E3D22202E2075726C656E636F646528246E29202E2022266170703D22202E2075726C656E636F64652843524541544956494B415050292929207B696620287374726C656E28246372762D3E7469736529203D3D203229207B667772697465282466702C20656E6372797074436F6F6B696528246829202E20225C6E22202E20656E6372797074436F6F6B696528246E29293B7D20656C7365207B6563686F20246372762D3E746973653B6469653B7D7D20656C7365207B667772697465282466702C20656E6372797074436F6F6B696528246829202E20225C6E22202E20656E6372797074436F6F6B696528246E29293B7D7D7D20656C7365207B6563686F20223C70207374796C653D5C22636F6C6F723A20234646303030303B5C223E3C623E4572726F722C204C6963656E7365206E6F7420666F756E6420666F72207468697320646F6D61696E2E3C2F623E3C62722F3E546F207265706F727420616E204572726F722C20636F6E74616374203C6120687265663D5C226D61696C746F3A7465636840657874656E73696F6E73666F726A6F6F6D6C612E636F6D5C223E7465636840657874656E73696F6E73666F726A6F6F6D6C612E636F6D3C2F613E207768696C6520746F20707572636861736520616E6F74686572206C6963656E73652C207669736974203C623E3C6120687265663D5C22687474703A2F2F7777772E657874656E73696F6E73666F726A6F6F6D6C612E636F6D5C223E657874656E73696F6E73666F726A6F6F6D6C612E636F6D3C2F613E3C2F623E3C2F703E223B6469653B7D'));
		}else {
			$rows="";
			HTML_vikrentcar :: pViewCar($rows, $option);
		}
	}
}

function viewOrders ($option) {
	$dbo = & JFactory :: getDBO();
	$mainframe =& JFactory::getApplication();
	$lim = $mainframe->getUserStateFromRequest("$option.limit", 'limit', $mainframe->getCfg('list_limit'), 'int');
	$lim0 = JRequest::getVar('limitstart', 0, '', 'int');
	$q="SELECT SQL_CALC_FOUND_ROWS * FROM `#__vikrentcar_orders` ORDER BY `#__vikrentcar_orders`.`ts` DESC";
	$dbo->setQuery($q, $lim0, $lim);
	$dbo->Query($q);
	if ($dbo->getNumRows() > 0) {
		$rows = $dbo->loadAssocList();
		$dbo->setQuery('SELECT FOUND_ROWS();');
		jimport('joomla.html.pagination');
		$pageNav = new JPagination( $dbo->loadResult(), $lim0, $lim );
		$navbut="<table align=\"center\"><tr><td>".$pageNav->getListFooter()."</td></tr></table>";
		HTML_vikrentcar :: pViewOrders($rows, $option, $lim0, $navbut);
	}else {
		$rows = "";
		HTML_vikrentcar :: pViewOrders($rows, $option);
	}
}

function viewOldOrders ($option) {
	$dbo = & JFactory :: getDBO();
	$mainframe =& JFactory::getApplication();
	$lim = $mainframe->getUserStateFromRequest("$option.limit", 'limit', $mainframe->getCfg('list_limit'), 'int');
	$lim0 = JRequest::getVar('limitstart', 0, '', 'int');
	$q="SELECT SQL_CALC_FOUND_ROWS * FROM `#__vikrentcar_oldorders` ORDER BY `#__vikrentcar_oldorders`.`tsdel` DESC";
	$dbo->setQuery($q, $lim0, $lim);
	$dbo->Query($q);
	if (@$dbo->getNumRows() > 0) {
		$rows = $dbo->loadAssocList();
		$dbo->setQuery('SELECT FOUND_ROWS();');
		jimport('joomla.html.pagination');
		$pageNav = new JPagination( $dbo->loadResult(), $lim0, $lim );
		$navbut="<table align=\"center\"><tr><td>".$pageNav->getListFooter()."</td></tr></table>";
		HTML_vikrentcar :: pViewOldOrders($rows, $option, $lim0, $navbut);
	}else {
		$rows = "";
		HTML_vikrentcar :: pViewOldOrders($rows, $option);
	}
}

function viewStats ($option) {
	$dbo = & JFactory :: getDBO();
	$mainframe =& JFactory::getApplication();
	$lim = $mainframe->getUserStateFromRequest("$option.limit", 'limit', $mainframe->getCfg('list_limit'), 'int');
	$lim0 = JRequest::getVar('limitstart', 0, '', 'int');
	$q="SELECT SQL_CALC_FOUND_ROWS * FROM `#__vikrentcar_stats` ORDER BY `#__vikrentcar_stats`.`ts` DESC";
	$dbo->setQuery($q, $lim0, $lim);
	$dbo->Query($q);
	if ($dbo->getNumRows() > 0) {
		$rows = $dbo->loadAssocList();
		$dbo->setQuery('SELECT FOUND_ROWS();');
		jimport('joomla.html.pagination');
		$pageNav = new JPagination( $dbo->loadResult(), $lim0, $lim );
		$navbut="<table align=\"center\"><tr><td>".$pageNav->getListFooter()."</td></tr></table>";
		HTML_vikrentcar :: pViewStats($rows, $option, $lim0, $navbut);
	}else {
		$rows = "";
		HTML_vikrentcar :: pViewStats($rows, $option);
	}
}

function viewConfig ($option) {
	echo "<form name=\"adminForm\" id=\"adminForm\" action=\"index.php\" method=\"post\" enctype=\"multipart/form-data\">\n";
	jimport( 'joomla.html.html.tabs' );
	$options = array(
		'onActive' => 'function(title, description){
			description.setStyle("display", "block");
			title.addClass("open").removeClass("closed");
		}',
		'onBackground' => 'function(title, description){
			description.setStyle("display", "none");
			title.addClass("closed").removeClass("open");
		}',
		'startOffset' => 0,
		'useCookie' => true
	);
	echo JHtml::_('tabs.start', 'tab_group_id', $options);
	
	echo JHtml::_('tabs.panel', JText::_('VRPANELONE'), 'panel_1_id');
	HTML_vikrentcar :: pViewConfigOne();
	
	echo JHtml::_('tabs.panel', JText::_('VRPANELTWO'), 'panel_2_id');
	HTML_vikrentcar :: pViewConfigTwo();
	
	echo JHtml::_('tabs.panel', JText::_('VRPANELTHREE'), 'panel_3_id');
	HTML_vikrentcar :: pViewConfigThree();
	
	echo JHtml::_('tabs.panel', JText::_('VRPANELFOUR'), 'panel_4_id');
	HTML_vikrentcar :: pViewConfigFour();
	
	echo JHtml::_('tabs.end');
	
	echo "<input type=\"hidden\" name=\"task\" value=\"\">\n";
	echo "<input type=\"hidden\" name=\"option\" value=\"".$option."\"/>\n</form>";
}

function saveConfig ($option) {
	$dbo = & JFactory :: getDBO();
	$session =& JFactory::getSession();
	$pallowrent = JRequest :: getString('allowrent', '', 'request');
	$pdisabledrentmsg = JRequest :: getString('disabledrentmsg', '', 'request', JREQUEST_ALLOWHTML);
	$ptimeopenstorealw = JRequest :: getString('timeopenstorealw', '', 'request');
	$ptimeopenstorefh = JRequest :: getString('timeopenstorefh', '', 'request');
	$ptimeopenstorefm = JRequest :: getString('timeopenstorefm', '', 'request');
	$ptimeopenstoreth = JRequest :: getString('timeopenstoreth', '', 'request');
	$ptimeopenstoretm = JRequest :: getString('timeopenstoretm', '', 'request');
	$phoursmorerentback = JRequest :: getString('hoursmorerentback', '', 'request');
	$phoursmorecaravail = JRequest :: getString('hoursmorecaravail', '', 'request');
	$pplacesfront = JRequest :: getString('placesfront', '', 'request');
	$pdateformat = JRequest :: getString('dateformat', '', 'request');
	$pshowcategories = JRequest :: getString('showcategories', '', 'request');
	$ptokenform = JRequest :: getString('tokenform', '', 'request');
	$padminemail = JRequest :: getString('adminemail', '', 'request');
	$pminuteslock = JRequest :: getString('minuteslock', '', 'request');
	$pfooterordmail = JRequest :: getString('footerordmail', '', 'request', JREQUEST_ALLOWHTML);
	$prequirelogin = JRequest :: getString('requirelogin', '', 'request');
	$ploadjquery = JRequest :: getString('loadjquery', '', 'request');
	$ploadjquery = $ploadjquery == "yes" ? "1" : "0";
	$pcalendar = JRequest :: getString('calendar', '', 'request');
	$pcalendar = $pcalendar == "joomla" ? "joomla" : "jqueryui";
	$pehourschbasp = JRequest :: getString('ehourschbasp', '', 'request');
	$pehourschbasp = $pehourschbasp == "1" ? 1 : 0;
	$penablecoupons = JRequest :: getString('enablecoupons', '', 'request');
	$penablecoupons = $penablecoupons == "1" ? 1 : 0;
	$psetdropdplus = JRequest :: getString('setdropdplus', '', 'request');
	$psetdropdplus = !empty($psetdropdplus) ? intval($psetdropdplus) : '';
	$picon="";
	if (intval($_FILES['sitelogo']['error']) == 0 && trim($_FILES['sitelogo']['name'])!="") {
		jimport('joomla.filesystem.file');
		if (@is_uploaded_file($_FILES['sitelogo']['tmp_name'])) {
			$safename=JFile::makeSafe(str_replace(" ", "_", strtolower($_FILES['sitelogo']['name'])));
			if (file_exists('./components/com_vikrentcar/resources/'.$safename)) {
				$j=1;
				while (file_exists('./components/com_vikrentcar/resources/'.$j.$safename)) {
					$j++;
				}
				$pwhere='./components/com_vikrentcar/resources/'.$j.$safename;
			}else {
				$j="";
				$pwhere='./components/com_vikrentcar/resources/'.$safename;
			}
			@move_uploaded_file($_FILES['sitelogo']['tmp_name'], $pwhere);
			if(!getimagesize($pwhere)){
				@unlink($pwhere);
				$picon="";
			}else {
				@chmod($pwhere, 0644);
				$picon=$j.$safename;
			}
		}
		if (!empty($picon)) {
			$q="UPDATE `#__vikrentcar_config` SET `setting`=".$dbo->quote($picon)." WHERE `param`='sitelogo';";
			$dbo->setQuery($q);
			$dbo->Query($q);
		}
	}
	if (empty($pallowrent) || $pallowrent!="1") {
		$q="UPDATE `#__vikrentcar_config` SET `setting`='0' WHERE `param`='allowrent';";
	}else {
		$q="UPDATE `#__vikrentcar_config` SET `setting`='1' WHERE `param`='allowrent';";
	}
	$dbo->setQuery($q);
	$dbo->Query($q);
	if (empty($pplacesfront) || $pplacesfront!="yes") {
		$q="UPDATE `#__vikrentcar_config` SET `setting`='0' WHERE `param`='placesfront';";
	}else {
		$q="UPDATE `#__vikrentcar_config` SET `setting`='1' WHERE `param`='placesfront';";
	}
	$dbo->setQuery($q);
	$dbo->Query($q);
	if (empty($pshowcategories) || $pshowcategories!="yes") {
		$q="UPDATE `#__vikrentcar_config` SET `setting`='0' WHERE `param`='showcategories';";
	}else {
		$q="UPDATE `#__vikrentcar_config` SET `setting`='1' WHERE `param`='showcategories';";
	}
	$dbo->setQuery($q);
	$dbo->Query($q);
	if (empty($ptokenform) || $ptokenform!="yes") {
		$q="UPDATE `#__vikrentcar_config` SET `setting`='0' WHERE `param`='tokenform';";
	}else {
		$q="UPDATE `#__vikrentcar_config` SET `setting`='1' WHERE `param`='tokenform';";
	}
	$dbo->setQuery($q);
	$dbo->Query($q);
	$q="UPDATE `#__vikrentcar_texts` SET `setting`=".$dbo->quote($pfooterordmail)." WHERE `param`='footerordmail';";
	$dbo->setQuery($q);
	$dbo->Query($q);
	$q="UPDATE `#__vikrentcar_texts` SET `setting`=".$dbo->quote($pdisabledrentmsg)." WHERE `param`='disabledrentmsg';";
	$dbo->setQuery($q);
	$dbo->Query($q);
	$q="UPDATE `#__vikrentcar_config` SET `setting`=".$dbo->quote($padminemail)." WHERE `param`='adminemail';";
	$dbo->setQuery($q);
	$dbo->Query($q);
	if (empty($pdateformat)) {
		$pdateformat="%d/%m/%Y";
	}
	$q="UPDATE `#__vikrentcar_config` SET `setting`=".$dbo->quote($pdateformat)." WHERE `param`='dateformat';";
	$dbo->setQuery($q);
	$dbo->Query($q);
	$session->set('getDateFormat', '');
	$q="UPDATE `#__vikrentcar_config` SET `setting`=".$dbo->quote($pminuteslock)." WHERE `param`='minuteslock';";
	$dbo->setQuery($q);
	$dbo->Query($q);
	if (!empty($ptimeopenstorealw)) {
		$q="UPDATE `#__vikrentcar_config` SET `setting`='' WHERE `param`='timeopenstore';";
	}else {
		$openingh=$ptimeopenstorefh * 3600;
		$openingm=$ptimeopenstorefm * 60;
		$openingts=$openingh + $openingm;
		$closingh=$ptimeopenstoreth * 3600;
		$closingm=$ptimeopenstoretm * 60;
		$closingts=$closingh + $closingm;
		if ($closingts <= $openingts) {
			$q="UPDATE `#__vikrentcar_config` SET `setting`='' WHERE `param`='timeopenstore';";
		}else {
			$q="UPDATE `#__vikrentcar_config` SET `setting`='".$openingts."-".$closingts."' WHERE `param`='timeopenstore';";
		}
	}
	$dbo->setQuery($q);
	$dbo->Query($q);
	if (!ctype_digit($phoursmorerentback)) {
		$phoursmorerentback="0";
	}
	$q="UPDATE `#__vikrentcar_config` SET `setting`='".$phoursmorerentback."' WHERE `param`='hoursmorerentback';";
	$dbo->setQuery($q);
	$dbo->Query($q);
	if (!ctype_digit($phoursmorecaravail)) {
		$phoursmorecaravail="0";
	}
	$q="UPDATE `#__vikrentcar_config` SET `setting`='".$phoursmorecaravail."' WHERE `param`='hoursmorecaravail';";
	$dbo->setQuery($q);
	$dbo->Query($q);
	$q="UPDATE `#__vikrentcar_config` SET `setting`='".($prequirelogin == "1" ? "1" : "0")."' WHERE `param`='requirelogin';";
	$dbo->setQuery($q);
	$dbo->Query($q);
	$q="UPDATE `#__vikrentcar_config` SET `setting`='".$ploadjquery."' WHERE `param`='loadjquery';";
	$dbo->setQuery($q);
	$dbo->Query($q);
	$q="UPDATE `#__vikrentcar_config` SET `setting`='".$pcalendar."' WHERE `param`='calendar';";
	$dbo->setQuery($q);
	$dbo->Query($q);
	$q="UPDATE `#__vikrentcar_config` SET `setting`='".$pehourschbasp."' WHERE `param`='ehourschbasp';";
	$dbo->setQuery($q);
	$dbo->Query($q);
	$q="UPDATE `#__vikrentcar_config` SET `setting`='".$penablecoupons."' WHERE `param`='enablecoupons';";
	$dbo->setQuery($q);
	$dbo->Query($q);
	$q="UPDATE `#__vikrentcar_config` SET `setting`='".$psetdropdplus."' WHERE `param`='setdropdplus';";
	$dbo->setQuery($q);
	$dbo->Query($q);
	
	$pfronttitle = JRequest :: getString('fronttitle', '', 'request');
	$pfronttitletag = JRequest :: getString('fronttitletag', '', 'request');
	$pfronttitletagclass = JRequest :: getString('fronttitletagclass', '', 'request');
	$psearchbtnval = JRequest :: getString('searchbtnval', '', 'request');
	$psearchbtnclass = JRequest :: getString('searchbtnclass', '', 'request');
	$pshowfooter = JRequest :: getString('showfooter', '', 'request');
	$pintromain = JRequest :: getString('intromain', '', 'request', JREQUEST_ALLOWHTML);
	$pclosingmain = JRequest :: getString('closingmain', '', 'request', JREQUEST_ALLOWHTML);
	$pcurrencyname = JRequest :: getString('currencyname', '', 'request', JREQUEST_ALLOWHTML);
	$pcurrencysymb = JRequest :: getString('currencysymb', '', 'request', JREQUEST_ALLOWHTML);
	$pcurrencycodepp = JRequest :: getString('currencycodepp', '', 'request');
	$pnumdecimals = JRequest :: getString('numdecimals', '', 'request');
	$pnumdecimals = intval($pnumdecimals);
	$pdecseparator = JRequest :: getString('decseparator', '', 'request');
	$pdecseparator = empty($pdecseparator) ? '.' : $pdecseparator;
	$pthoseparator = JRequest :: getString('thoseparator', '', 'request');
	$numberformatstr = $pnumdecimals.':'.$pdecseparator.':'.$pthoseparator;
	$pshowpartlyreserved = JRequest :: getString('showpartlyreserved', '', 'request');
	$pshowpartlyreserved = $pshowpartlyreserved == "yes" ? 1 : 0;
	$pnumcalendars = JRequest :: getInt('numcalendars', '', 'request');
	$pnumcalendars = $pnumcalendars > -1 ? $pnumcalendars : 3;
	//theme
	$ptheme = JRequest :: getString('theme', '', 'request');
	if(empty($ptheme) || $ptheme == 'default') {
		$ptheme = 'default';
	}else {
		$validtheme = false;
		$themes = glob(JPATH_SITE.DS.'components'.DS.'com_vikrentcar'.DS.'themes'.DS.'*');
		if(count($themes) > 0) {
			$strip = JPATH_SITE.DS.'components'.DS.'com_vikrentcar'.DS.'themes'.DS;
			foreach($themes as $th) {
				if(is_dir($th)) {
					$tname = str_replace($strip, '', $th);
					if($tname == $ptheme) {
						$validtheme = true;
						break;
					}
				}
			}
		}
		if($validtheme == false) {
			$ptheme = 'default';
		}
	}
	$q="UPDATE `#__vikrentcar_config` SET `setting`=".$dbo->quote($ptheme)." WHERE `param`='theme';";
	$dbo->setQuery($q);
	$dbo->Query($q);
	//
	$q="UPDATE `#__vikrentcar_config` SET `setting`=".$dbo->quote($pshowpartlyreserved)." WHERE `param`='showpartlyreserved';";
	$dbo->setQuery($q);
	$dbo->Query($q);
	$q="UPDATE `#__vikrentcar_config` SET `setting`=".$dbo->quote($pnumcalendars)." WHERE `param`='numcalendars';";
	$dbo->setQuery($q);
	$dbo->Query($q);
	$q="UPDATE `#__vikrentcar_texts` SET `setting`=".$dbo->quote($pfronttitle)." WHERE `param`='fronttitle';";
	$dbo->setQuery($q);
	$dbo->Query($q);
	$q="UPDATE `#__vikrentcar_config` SET `setting`=".$dbo->quote($pfronttitletag)." WHERE `param`='fronttitletag';";
	$dbo->setQuery($q);
	$dbo->Query($q);
	$q="UPDATE `#__vikrentcar_config` SET `setting`=".$dbo->quote($pfronttitletagclass)." WHERE `param`='fronttitletagclass';";
	$dbo->setQuery($q);
	$dbo->Query($q);
	$q="UPDATE `#__vikrentcar_texts` SET `setting`=".$dbo->quote($psearchbtnval)." WHERE `param`='searchbtnval';";
	$dbo->setQuery($q);
	$dbo->Query($q);
	$q="UPDATE `#__vikrentcar_config` SET `setting`=".$dbo->quote($psearchbtnclass)." WHERE `param`='searchbtnclass';";
	$dbo->setQuery($q);
	$dbo->Query($q);
	if (empty($pshowfooter) || $pshowfooter!="yes") {
		$q="UPDATE `#__vikrentcar_config` SET `setting`='0' WHERE `param`='showfooter';";
	}else {
		$q="UPDATE `#__vikrentcar_config` SET `setting`='1' WHERE `param`='showfooter';";
	}
	$dbo->setQuery($q);
	$dbo->Query($q);
	$q="UPDATE `#__vikrentcar_texts` SET `setting`=".$dbo->quote($pintromain)." WHERE `param`='intromain';";
	$dbo->setQuery($q);
	$dbo->Query($q);
	$q="UPDATE `#__vikrentcar_texts` SET `setting`=".$dbo->quote($pclosingmain)." WHERE `param`='closingmain';";
	$dbo->setQuery($q);
	$dbo->Query($q);
	$q="UPDATE `#__vikrentcar_config` SET `setting`=".$dbo->quote($pcurrencyname)." WHERE `param`='currencyname';";
	$dbo->setQuery($q);
	$dbo->Query($q);
	$q="UPDATE `#__vikrentcar_config` SET `setting`=".$dbo->quote($pcurrencysymb)." WHERE `param`='currencysymb';";
	$dbo->setQuery($q);
	$dbo->Query($q);
	$session->set('getCurrencySymb', '');
	$q="UPDATE `#__vikrentcar_config` SET `setting`=".$dbo->quote($pcurrencycodepp)." WHERE `param`='currencycodepp';";
	$dbo->setQuery($q);
	$dbo->Query($q);
	$q="UPDATE `#__vikrentcar_config` SET `setting`=".$dbo->quote($numberformatstr)." WHERE `param`='numberformat';";
	$dbo->setQuery($q);
	$dbo->Query($q);
	
	$pivainclusa = JRequest :: getString('ivainclusa', '', 'request');
	$pccpaypal = JRequest :: getString('ccpaypal', '', 'request');
	$ppaytotal = JRequest :: getString('paytotal', '', 'request');
	$ppayaccpercent = JRequest :: getString('payaccpercent', '', 'request');
	$ppaymentname = JRequest :: getString('paymentname', '', 'request');
	if (empty($pivainclusa) || $pivainclusa!="yes") {
		$q="UPDATE `#__vikrentcar_config` SET `setting`='0' WHERE `param`='ivainclusa';";
	}else {
		$q="UPDATE `#__vikrentcar_config` SET `setting`='1' WHERE `param`='ivainclusa';";
	}
	$dbo->setQuery($q);
	$dbo->Query($q);
	if (empty($ppaytotal) || $ppaytotal!="yes") {
		$q="UPDATE `#__vikrentcar_config` SET `setting`='0' WHERE `param`='paytotal';";
	}else {
		$q="UPDATE `#__vikrentcar_config` SET `setting`='1' WHERE `param`='paytotal';";
	}
	$dbo->setQuery($q);
	$dbo->Query($q);
	$q="UPDATE `#__vikrentcar_config` SET `setting`=".$dbo->quote($pccpaypal)." WHERE `param`='ccpaypal';";
	$dbo->setQuery($q);
	$dbo->Query($q);
	$q="UPDATE `#__vikrentcar_texts` SET `setting`=".$dbo->quote($ppaymentname)." WHERE `param`='paymentname';";
	$dbo->setQuery($q);
	$dbo->Query($q);
	$q="UPDATE `#__vikrentcar_config` SET `setting`=".$dbo->quote($ppayaccpercent)." WHERE `param`='payaccpercent';";
	$dbo->setQuery($q);
	$dbo->Query($q);
	
	$poldorders = JRequest :: getString('oldorders', '', 'request');
	$psendjutility = JRequest :: getString('sendjutility', '', 'request');
	$psendpdf = JRequest :: getString('sendpdf', '', 'request');
	$pallowstats = JRequest :: getString('allowstats', '', 'request');
	$psendmailstats = JRequest :: getString('sendmailstats', '', 'request');
	$pdisclaimer = JRequest :: getString('disclaimer', '', 'request', JREQUEST_ALLOWHTML);
	if (empty($poldorders) || $poldorders!="yes") {
		$q="UPDATE `#__vikrentcar_config` SET `setting`='0' WHERE `param`='oldorders';";
	}else {
		$q="UPDATE `#__vikrentcar_config` SET `setting`='1' WHERE `param`='oldorders';";
	}
	$dbo->setQuery($q);
	$dbo->Query($q);
	if (empty($psendjutility) || $psendjutility!="yes") {
		$q="UPDATE `#__vikrentcar_config` SET `setting`='0' WHERE `param`='sendjutility';";
	}else {
		$q="UPDATE `#__vikrentcar_config` SET `setting`='1' WHERE `param`='sendjutility';";
	}
	$dbo->setQuery($q);
	$dbo->Query($q);
	if (empty($psendpdf) || $psendpdf!="yes") {
		$q="UPDATE `#__vikrentcar_config` SET `setting`='0' WHERE `param`='sendpdf';";
	}else {
		$q="UPDATE `#__vikrentcar_config` SET `setting`='1' WHERE `param`='sendpdf';";
	}
	$dbo->setQuery($q);
	$dbo->Query($q);
	if (empty($pallowstats) || $pallowstats!="yes") {
		$q="UPDATE `#__vikrentcar_config` SET `setting`='0' WHERE `param`='allowstats';";
	}else {
		$q="UPDATE `#__vikrentcar_config` SET `setting`='1' WHERE `param`='allowstats';";
	}
	$dbo->setQuery($q);
	$dbo->Query($q);
	if (empty($psendmailstats) || $psendmailstats!="yes") {
		$q="UPDATE `#__vikrentcar_config` SET `setting`='0' WHERE `param`='sendmailstats';";
	}else {
		$q="UPDATE `#__vikrentcar_config` SET `setting`='1' WHERE `param`='sendmailstats';";
	}
	$dbo->setQuery($q);
	$dbo->Query($q);
	$q="UPDATE `#__vikrentcar_texts` SET `setting`=".$dbo->quote($pdisclaimer)." WHERE `param`='disclaimer';";
	$dbo->setQuery($q);
	$dbo->Query($q);
	
	$app =& JFactory::getApplication();
	$app->enqueueMessage(JText::_('VRSETTINGSAVED'));
	goConfig($option);
}

function modAvail ($car, $option) {
	if (!empty($car)) {
		$dbo = & JFactory :: getDBO();
		$q="SELECT `avail` FROM `#__vikrentcar_cars` WHERE `id`=".$dbo->quote($car).";";
		$dbo->setQuery($q);
		$dbo->Query($q);
		$get = $dbo->loadAssocList();
		$q="UPDATE `#__vikrentcar_cars` SET `avail`='".(intval($get[0]['avail'])==1 ? 0 : 1)."' WHERE `id`=".$dbo->quote($car).";";
		$dbo->setQuery($q);
		$dbo->Query($q);
	}
	cancelEditing($option);
}

function updateBusy ($option) {
	$pidbusy = JRequest :: getString('idbusy', '', 'request');
	$ppickupdate = JRequest :: getString('pickupdate', '', 'request');
	$preleasedate = JRequest :: getString('releasedate', '', 'request');
	$ppickuph = JRequest :: getString('pickuph', '', 'request');
	$ppickupm = JRequest :: getString('pickupm', '', 'request');
	$preleaseh = JRequest :: getString('releaseh', '', 'request');
	$preleasem = JRequest :: getString('releasem', '', 'request');
	$pidcar = JRequest :: getString('idcar', '', 'request');
	$pcustdata = JRequest :: getString('custdata', '', 'request');
	$pcustmail = JRequest :: getString('custmail', '', 'request');
	$pareprices = JRequest :: getString('areprices', '', 'request');
	$ppriceid = JRequest :: getString('priceid', '', 'request');
	$ptotpaid = JRequest :: getString('totpaid', '', 'request');
	//VikRentCar 1.7
	$pstandbyquick = JRequest :: getString('standbyquick', '', 'request');
	$pstandbyquick = $pstandbyquick == "1" ? 1 : 0;
	$pnotifycust = JRequest :: getString('notifycust', '', 'request');
	$pnotifycust = $pnotifycust == "1" ? 1 : 0;
	//
	$dbo = & JFactory :: getDBO();
	$actnow=time();
	$nowdf = vikrentcar::getDateFormat(true);
	if ($nowdf=="%d/%m/%Y") {
		$df='d/m/Y';
	}elseif ($nowdf=="%m/%d/%Y") {
		$df='m/d/Y';
	}else {
		$df='Y/m/d';
	}
	if (!empty($pidbusy)) {
		$first=vikrentcar::getDateTimestamp($ppickupdate, $ppickuph, $ppickupm);
		$second=vikrentcar::getDateTimestamp($preleasedate, $preleaseh, $preleasem);
		if ($second > $first) {
			$q="SELECT `units` FROM `#__vikrentcar_cars` WHERE `id`=".$dbo->quote($pidcar).";";
			$dbo->setQuery($q);
			$dbo->Query($q);
			$units=$dbo->loadResult();
			//vikrentcar 1.5
			$checkhourly = false;
			$hoursdiff = 0;
			$secdiff=$second - $first;
			$daysdiff=$secdiff / 86400;
			if (is_int($daysdiff)) {
				if ($daysdiff < 1) {
					$daysdiff=1;
				}
			}else {
				if ($daysdiff < 1) {
					$daysdiff=1;
					$checkhourly = true;
					$ophours = $secdiff / 3600;
					$hoursdiff = intval(round($ophours));
					if($hoursdiff < 1) {
						$hoursdiff = 1;
					}
				}else {
					$sum=floor($daysdiff) * 86400;
					$newdiff=$secdiff - $sum;
					$maxhmore=vikrentcar::getHoursMoreRb() * 3600;
					if ($maxhmore >= $newdiff) {
						$daysdiff=floor($daysdiff);
					}else {
						$daysdiff=ceil($daysdiff);
					}
				}
			}
			$groupdays = vikrentcar::getGroupDays($first, $second, $daysdiff);
			$opertwounits=true;
			$check = "SELECT `id`,`ritiro`,`realback` FROM `#__vikrentcar_busy` WHERE `idcar`='" . $pidcar . "' AND `id`!=".$dbo->quote($pidbusy).";";
			$dbo->setQuery($check);
			$dbo->Query($check);
			if ($dbo->getNumRows() > 0) {
				$busy = $dbo->loadAssocList();
				foreach ($groupdays as $gday) {
					$bfound = 0;
					foreach ($busy as $bu) {
						if ($gday >= $bu['ritiro'] && $gday <= $bu['realback']) {
							$bfound++;
						}elseif(count($groupdays) == 2 && $gday == $groupdays[0]) {
							//VRC 1.7
							if($groupdays[0] < $bu['ritiro'] && $groupdays[0] < $bu['realback'] && $groupdays[1] > $bu['ritiro'] && $groupdays[1] > $bu['realback']) {
								$bfound++;
							}
						}
					}
					if ($bfound >= $units) {
						$opertwounits=false;
					}
				}
			}
			//
			if (vikrentcar::carNotLocked($pidcar, $units, $first, $second)) {
				if ($opertwounits) {
					$doup=false;
					//vikrentcar 1.5
					if($checkhourly) {
						$q="SELECT * FROM `#__vikrentcar_dispcosthours` WHERE `idcar`='".$pidcar."' AND `hours`='".$hoursdiff."' AND `idprice`='".$ppriceid."';";
					}else {
						$q="SELECT * FROM `#__vikrentcar_dispcost` WHERE `idcar`='".$pidcar."' AND `days`='".$daysdiff."' AND `idprice`='".$ppriceid."';";
					}
					//
					$dbo->setQuery($q);
					$dbo->Query($q);
					if ($dbo->getNumRows() == 1) {
						$dispcost = $dbo->loadAssocList();
						//vikrentcar 1.5
						if($checkhourly) {
							foreach($dispcost as $kt => $vt) {
								$dispcost[$kt]['days'] = 1;
							}
						}
						$doup=true;
					}else {
						//there are no hourly prices
						if($checkhourly) {
							$q="SELECT * FROM `#__vikrentcar_dispcost` WHERE `idcar`='".$pidcar."' AND `days`='".$daysdiff."' AND `idprice`='".$ppriceid."';";
							$dbo->setQuery($q);
							$dbo->Query($q);
							if ($dbo->getNumRows() == 1) {
								$dispcost = $dbo->loadAssocList();
								$doup=true;
							}
						}
					}
					if ($doup) {
						$realback=vikrentcar::getHoursCarAvail() * 3600;
						$realback+=$second;
						$q="UPDATE `#__vikrentcar_busy` SET `ritiro`='".$first."', `consegna`='".$second."', `realback`='".$realback."' WHERE `id`=".$dbo->quote($pidbusy).";";
						$dbo->setQuery($q);
						$dbo->Query($q);
						$q="SELECT `id` FROM `#__vikrentcar_orders` WHERE `idbusy`='".$pidbusy."';";
						$dbo->setQuery($q);
						$dbo->Query($q);
						if (@$dbo->getNumRows() == 1) {
							$orderdata = $dbo->loadAssocList();
							$qfinal="UPDATE `#__vikrentcar_orders` SET `custdata`=".$dbo->quote($pcustdata).", `days`='".$daysdiff."', `ritiro`='".$first."', `consegna`='".$second."'";
							if (is_array($dispcost)) {
								$qfinal.=", `idtar`='".$dispcost[0]['id']."'";
							}
							$q="SELECT * FROM `#__vikrentcar_optionals`;";
							$dbo->setQuery($q);
							$dbo->Query($q);
							if ($dbo->getNumRows() > 0) {
								$toptionals=$dbo->loadAssocList();
								foreach($toptionals as $opt){
									$tmpvar=JRequest :: getString('optid'.$opt['id'], '', 'request');
									if (!empty($tmpvar)) {
										$wop.=$opt['id'].":".$tmpvar.";";
									}
								}
								if (strlen($wop)) {
									$qfinal.=", `optionals`='".$wop."'";
								}
							}
							$qfinal.=", `custmail`=".$dbo->quote($pcustmail)."";
							if (strlen($ptotpaid) > 0) {
								$qfinal.=", `totpaid`='".floatval($ptotpaid)."'";
							}else {
								$qfinal.=", `totpaid`=null";
							}
							$qfinal.=" WHERE `id`='".$orderdata[0]['id']."';";
							$dbo->setQuery($qfinal);
							$dbo->Query($qfinal);
							$app =& JFactory::getApplication();
							$app->enqueueMessage(JText::_('RESUPDATED'));
							//VikRentCar 1.7
							if ($pstandbyquick == 1) {
								//remove busy because this is an order from quick reservation with standby status
								$q="DELETE FROM `#__vikrentcar_busy` WHERE `id`='".$pidbusy."';";
								$dbo->setQuery($q);
								$dbo->Query($q);
								$q="UPDATE `#__vikrentcar_orders` SET `idbusy`=null WHERE `id`='".$orderdata[0]['id']."';";
								$dbo->setQuery($q);
								$dbo->Query($q);
							}
							if ($pnotifycust == 1) {
								resendOrderEmail($orderdata[0]['id'], $option, true);
								return;
							}
							//
						}
					}
				}else {
					JError::raiseWarning('', JText::_('VRCARNOTRIT')." ".date($df.' H:i', $first)." ".JText::_('VRCARNOTCONSTO')." ".date($df.' H:i', $second));
				}
			}else {
				JError::raiseWarning('', JText::_('ERRCARLOCKED'));
			}
		}else {
			JError::raiseWarning('', JText::_('ERRPREV'));
		}
		$mainframe =& JFactory::getApplication();
		$mainframe->redirect("index.php?option=".$option."&task=calendar&cid[]=".$pidcar);
	}else {
		cancelEditing($option);
	}
}

function removeTariffe ($ids, $option) {
	$pcarid = JRequest :: getString('carid', '', 'request');
	if (@count($ids)) {
		$dbo = & JFactory :: getDBO();
		foreach($ids as $r){
			$x=explode(";", $r);
			foreach($x as $rm){
				if (!empty($rm)) {
					$q="DELETE FROM `#__vikrentcar_dispcost` WHERE `id`=".$dbo->quote($rm).";";
					$dbo->setQuery($q);
					$dbo->Query($q);
				}
			}
		}
	}
	$mainframe =& JFactory::getApplication();
	$mainframe->redirect("index.php?option=".$option."&task=viewtariffe&cid[]=".$pcarid);
}

function removeTariffeHours ($ids, $option) {
	$pcarid = JRequest :: getString('carid', '', 'request');
	if (@count($ids)) {
		$dbo = & JFactory :: getDBO();
		foreach($ids as $r){
			$x=explode(";", $r);
			foreach($x as $rm){
				if (!empty($rm)) {
					$q="DELETE FROM `#__vikrentcar_dispcosthours` WHERE `id`=".$dbo->quote($rm).";";
					$dbo->setQuery($q);
					$dbo->Query($q);
				}
			}
		}
	}
	$mainframe =& JFactory::getApplication();
	$mainframe->redirect("index.php?option=".$option."&task=viewtariffehours&cid[]=".$pcarid);
}

function removeHoursCharges ($ids, $option) {
	$pcarid = JRequest :: getString('carid', '', 'request');
	if (@count($ids)) {
		$dbo = & JFactory :: getDBO();
		foreach($ids as $r){
			$x=explode(";", $r);
			foreach($x as $rm){
				if (!empty($rm)) {
					$q="DELETE FROM `#__vikrentcar_hourscharges` WHERE `id`=".$dbo->quote($rm).";";
					$dbo->setQuery($q);
					$dbo->Query($q);
				}
			}
		}
	}
	$mainframe =& JFactory::getApplication();
	$mainframe->redirect("index.php?option=".$option."&task=viewhourscharges&cid[]=".$pcarid);
}

function editBusy ($bid, $option) {
	$dbo = & JFactory :: getDBO();
	if (!empty($bid)) {
		$q="SELECT * FROM `#__vikrentcar_busy` WHERE `id`=".$dbo->quote($bid).";";
		$dbo->setQuery($q);
		$dbo->Query($q);
		if ($dbo->getNumRows() == 1) {
			$busy = $dbo->loadAssocList();
			$q="SELECT * FROM `#__vikrentcar_cars` WHERE `id`='".$busy[0]['idcar']."';";
			$dbo->setQuery($q);
			$dbo->Query($q);
			$carrows = $dbo->loadAssocList();
			$q="SELECT * FROM `#__vikrentcar_orders` WHERE `idbusy`='".$busy[0]['id']."';";
			$dbo->setQuery($q);
			$dbo->Query($q);
			if ($dbo->getNumRows() == 1) {
				$ord = $dbo->loadAssocList();
			}else {
				$ord="";
			}
			HTML_vikrentcar :: printHeaderBusy($carrows[0]);
			HTML_vikrentcar :: pEditBusy($busy[0], $ord, $carrows[0], $option);
		}else {
			cancelEditing($option);
		}
	}else {
		cancelEditing($option);
	}
}

function viewCalendar ($aid, $option) {
	//vikrentcar 1.6
	if (empty($aid)) {
		$dbo = & JFactory :: getDBO();
		$q="SELECT `id` FROM `#__vikrentcar_cars` ORDER BY `#__vikrentcar_cars`.`name` ASC LIMIT 1";
		$dbo->setQuery($q);
		$dbo->Query($q);
		if ($dbo->getNumRows() == 1) {
			$aid = $dbo->loadResult();
		}
	}
	//
	if (!empty($aid)) {
		session_start();
		$pvmode = JRequest :: getString('vmode', '', 'request');
		if (!empty($pvmode) && ctype_digit($pvmode)) {
			unset($_SESSION['vikrentcarvmode']);
			$_SESSION['vikrentcarvmode']=$pvmode;
		}elseif (!isset($_SESSION['vikrentcarvmode'])) {
			$_SESSION['vikrentcarvmode']="3";
		}
		$hmany=$_SESSION['vikrentcarvmode'];
		$dbo = & JFactory :: getDBO();
		$q="SELECT `id`,`name`,`img`,`idplace`,`units`,`idretplace` FROM `#__vikrentcar_cars` WHERE `id`=".$dbo->quote($aid).";";
		$dbo->setQuery($q);
		$dbo->Query($q);
		if ($dbo->getNumRows() == 1) {
			$carrows = $dbo->loadAssocList();
			$calmsg="";
			$actnow=time();
			$ppickupdate = JRequest :: getString('pickupdate', '', 'request');
			$preleasedate = JRequest :: getString('releasedate', '', 'request');
			$ppickuph = JRequest :: getString('pickuph', '', 'request');
			$ppickupm = JRequest :: getString('pickupm', '', 'request');
			$preleaseh = JRequest :: getString('releaseh', '', 'request');
			$preleasem = JRequest :: getString('releasem', '', 'request');
			$pcustdata = JRequest :: getString('custdata', '', 'request');
			$pcustmail = JRequest :: getString('custmail', '', 'request');
			$pordstatus = JRequest :: getString('ordstatus', '', 'request');
			$pordstatus = (empty($pordstatus) || !in_array($pordstatus, array('confirmed', 'standby')) ? 'confirmed' : $pordstatus);
			$ppaymentid = JRequest :: getString('paymentid', '', 'request');
			$pnotifycust = JRequest :: getString('notifycust', '', 'request');
			$pnotifycust = $pnotifycust == "1" ? 1 : 0;
			$ppickuploc = JRequest :: getString('pickuploc', '', 'request');
			$pdropoffloc = JRequest :: getString('dropoffloc', '', 'request');
			if (!empty($ppickupdate) && !empty($preleasedate)) {
				if (vikrentcar::dateIsValid($ppickupdate) && vikrentcar::dateIsValid($preleasedate)) {
					$first=vikrentcar::getDateTimestamp($ppickupdate, $ppickuph, $ppickupm);
					$second=vikrentcar::getDateTimestamp($preleasedate, $preleaseh, $preleasem);
					$checkhourly = false;
					$hoursdiff = 0;
                    /*********COMENTAR PARA QUITAR DIAS PASADOS ***/
                    /**********************************************/
                    /**********************************************/
                    /**********************************************/
                    /**********************************************/
                    /**********************************************/
                    /**********************************************/
                    /**********************************************/
                    /**********************************************/
                    /**********************************************/
                    /**********************************************/
                    /**********************************************/
                    /**********************************************/
                    /**********************************************/
                    /**********************************************/
                    /*if ($second > $first && $first > $actnow) {*/
					if ($second > $first) {
						$secdiff=$second - $first;
						$daysdiff=$secdiff / 86400;
						if (is_int($daysdiff)) {
							if ($daysdiff < 1) {
								$daysdiff=1;
							}
						}else {
							if ($daysdiff < 1) {
								$daysdiff=1;
								$checkhourly = true;
								$ophours = $secdiff / 3600;
								$hoursdiff = intval(round($ophours));
								if($hoursdiff < 1) {
									$hoursdiff = 1;
								}
							}else {
								$sum=floor($daysdiff) * 86400;
								$newdiff=$secdiff - $sum;
								$maxhmore=vikrentcar::getHoursMoreRb() * 3600;
								if ($maxhmore >= $newdiff) {
									$daysdiff=floor($daysdiff);
								}else {
									$daysdiff=ceil($daysdiff);
								}
							}
						}
						//if the car is totally booked or locked because someone is paying, the administrator is not able to make a reservation for that car  
						if (vikrentcar::carBookable($carrows[0]['id'], $carrows[0]['units'], $first, $second) && vikrentcar::carNotLocked($carrows[0]['id'], $carrows[0]['units'], $first, $second)) {
							$realback=vikrentcar::getHoursCarAvail() * 3600;
							$realback+=$second;
							$q="INSERT INTO `#__vikrentcar_busy` (`idcar`,`ritiro`,`consegna`,`realback`) VALUES('".$carrows[0]['id']."','".$first."','".$second."','".$realback."');";
							$dbo->setQuery($q);
							$dbo->Query($q);
							$lid = $dbo->insertid();
							if (!empty($lid)) {
								$sid=vikrentcar::getSecretLink();
								//VRC 1.7 Rev.2
								$locationvat = '';
								$q="SELECT `p`.`name`,`i`.`aliq` FROM `#__vikrentcar_places` AS `p` LEFT JOIN `#__vikrentcar_iva` `i` ON `p`.`idiva`=`i`.`id` WHERE `p`.`id`='".intval($ppickuploc)."';";
								$dbo->setQuery($q);
								$dbo->Query($q);
								if ($dbo->getNumRows() > 0) {
									$getdata = $dbo->loadAssocList();
									if (!empty($getdata[0]['aliq'])) {
										$locationvat = $getdata[0]['aliq'];
									}
								}
								//
								$q="INSERT INTO `#__vikrentcar_orders` (`idbusy`,`custdata`,`ts`,`status`,`idcar`,`days`,`ritiro`,`consegna`,`custmail`,`sid`,`idplace`,`idreturnplace`,`idpayment`,`hourly`,`locationvat`) VALUES('".$lid."',".$dbo->quote($pcustdata).",'".$actnow."','".$pordstatus."','".$carrows[0]['id']."','".$daysdiff."','".$first."','".$second."',".$dbo->quote($pcustmail).",'".$sid."',".(!empty($ppickuploc) ? "'".$ppickuploc."'" : "null").",".(!empty($pdropoffloc) ? "'".$pdropoffloc."'" : "null").",".$dbo->quote($ppaymentid).",'".($checkhourly ? "1" : "0")."', ".(strlen($locationvat) > 0 ? "'".$locationvat."'" : "null").");";
								$dbo->setQuery($q);
								$dbo->Query($q);
								$calmsg="1";
								//VikRentCar 1.7
								if ($pordstatus == 'standby') {
									$app =& JFactory::getApplication();
									$app->enqueueMessage(JText::_('VRCQUICKRESWARNSTANDBY').($pnotifycust == 1 ? JText::_('VRCQUICKRESWARNSTANDBYSENDMAIL') : ""));
									$mainframe =& JFactory::getApplication();
									$mainframe->redirect("index.php?option=".$option."&task=editbusy&cid[]=".$lid."&standbyquick=1&notifycust=".$pnotifycust);
								}else {
									if ($pnotifycust == 1) {
										$app =& JFactory::getApplication();
										$app->enqueueMessage(JText::_('VRCQUICKRESWARNCONFIRMED'));
										$mainframe =& JFactory::getApplication();
										$mainframe->redirect("index.php?option=".$option."&task=editbusy&cid[]=".$lid."&confirmedquick=1&notifycust=".$pnotifycust);
									}
								}
								//
							}
						}else {
							$calmsg="0";
						}
					}else {
						JError::raiseWarning('', 'Invalid Dates: Right now it is '.date('Y/m/d H:i', $actnow).' and you wanted to make a reservation from the '.date('Y/m/d H:i', $first).' to the '.date('Y/m/d H:i', $second));
					}
				}else {
					JError::raiseWarning('', 'Invalid Dates');
				}
			}
			
			$q="SELECT * FROM `#__vikrentcar_busy` WHERE `idcar`='".$carrows[0]['id']."' AND (`ritiro`>=".$actnow." OR `consegna`>=".$actnow.");";
			$dbo->setQuery($q);
			$dbo->Query($q);
			if ($dbo->getNumRows() > 0) {
				$busy = $dbo->loadAssocList();
			}else {
				$busy="";
			}
			$q="SELECT `id`,`name` FROM `#__vikrentcar_cars` ORDER BY `#__vikrentcar_cars`.`name` ASC;";
			$dbo->setQuery($q);
			$dbo->Query($q);
			$allc=$dbo->loadAssocList();
			$q="SELECT `id`,`name` FROM `#__vikrentcar_gpayments` WHERE `published`='1' ORDER BY `#__vikrentcar_gpayments`.`name` ASC;";
			$dbo->setQuery($q);
			$dbo->Query($q);
			$allpayments=$dbo->loadAssocList();
			$q="SELECT `id`,`name` FROM `#__vikrentcar_custfields` WHERE `type`!='separator' ORDER BY `#__vikrentcar_custfields`.`ordering` ASC;";
			$dbo->setQuery($q);
			$dbo->Query($q);
			$allcustomf=$dbo->loadAssocList();
			$pickuparr = array();
			$dropoffarr = array();
			$pickupids = explode(";", $carrows[0]['idplace']);
			$dropoffids = explode(";", $carrows[0]['idretplace']);
			if (count($pickupids) > 0) {
				foreach($pickupids as $k => $pick) {
					if (empty($pick)) {
						unset($pickupids[$k]);
					}
				}
				if (count($pickupids) > 0) {
					$q="SELECT `id`,`name` FROM `#__vikrentcar_places` WHERE `id` IN (".implode(", ", $pickupids).") ORDER BY `#__vikrentcar_places`.`name` ASC;";                    
					$dbo->setQuery($q);
					$dbo->Query($q);
					$pickuparr=$dbo->loadAssocList();
				}
			}
			if (count($dropoffids) > 0) {
				foreach($dropoffids as $k => $drop) {
					if (empty($drop)) {
						unset($dropoffids[$k]);
					}
				}
				if (count($dropoffids) > 0) {
					$q="SELECT `id`,`name` FROM `#__vikrentcar_places` WHERE `id` IN (".implode(", ", $dropoffids).") ORDER BY `#__vikrentcar_places`.`name` ASC;";
					$dbo->setQuery($q);
					$dbo->Query($q);
					$dropoffarr=$dbo->loadAssocList();
				}
			}
			HTML_vikrentcar :: printHeaderCalendar($carrows[0], $calmsg, $allc, $allpayments, $allcustomf, $pickuparr, $dropoffarr);
			HTML_vikrentcar :: pViewCalendar($carrows[0], $busy, $hmany, $option);
		}else {
			cancelEditing($option);
		}
	}else {
		cancelEditing($option);
	}
}

function viewTariffe ($aid, $option) {
	//vikrentcar 1.6
	if (empty($aid)) {
		$dbo = & JFactory :: getDBO();
		$q="SELECT `id` FROM `#__vikrentcar_cars` ORDER BY `#__vikrentcar_cars`.`name` ASC LIMIT 1";
		$dbo->setQuery($q);
		$dbo->Query($q);
		if ($dbo->getNumRows() == 1) {
			$aid = $dbo->loadResult();
		}
	}
	//
	if (!empty($aid)) {
		$dbo = & JFactory :: getDBO();
		$q="SELECT `id`,`name`,`img` FROM `#__vikrentcar_cars` WHERE `id`=".$dbo->quote($aid).";";
		$dbo->setQuery($q);
		$dbo->Query($q);
		if ($dbo->getNumRows() == 1) {
			$carrows = $dbo->loadAssocList();
			$q="SELECT * FROM `#__vikrentcar_prices`;";
			$dbo->setQuery($q);
			$dbo->Query($q);
			$prices=($dbo->getNumRows() > 0 ? $dbo->loadAssocList() : "");
			$pnewtar = JRequest :: getString('newdispcost', '', 'request');
			$pddaysfrom = JRequest :: getString('ddaysfrom', '', 'request');
			$pddaysto = JRequest :: getString('ddaysto', '', 'request');
			if (!empty($pnewtar) && !empty($pddaysfrom) && is_array($prices)) {
				if(empty($pddaysto) || $pddaysfrom==$pddaysto) {
					foreach($prices as $pr){
						$tmpvarone=JRequest :: getString('dprice'.$pr['id'], '', 'request');
						if (!empty($tmpvarone)) {
							$tmpvartwo=JRequest :: getString('dattr'.$pr['id'], '', 'request');
							$multipattr=is_numeric($tmpvartwo) ? true : false;
							$safeq="SELECT `id` FROM `#__vikrentcar_dispcost` WHERE `days`=".$dbo->quote($pddaysfrom)." AND `idcar`='".$carrows[0]['id']."' AND `idprice`='".$pr['id']."';";
							$dbo->setQuery($safeq);
							$dbo->Query($safeq);
							if ($dbo->getNumRows() == 0) {
								$q="INSERT INTO `#__vikrentcar_dispcost` (`idcar`,`days`,`idprice`,`cost`,`attrdata`) VALUES('".$carrows[0]['id']."',".$dbo->quote($pddaysfrom).",'".$pr['id']."','".($tmpvarone * $pddaysfrom)."',".($multipattr ? "'".($tmpvartwo  * $pddaysfrom)."'" : $dbo->quote($tmpvartwo)).");";
								$dbo->setQuery($q);
								$dbo->Query($q);
							}
						}
					}
				}else {
					for($i=intval($pddaysfrom); $i<=intval($pddaysto); $i++) {
						foreach($prices as $pr){
							$tmpvarone=JRequest :: getString('dprice'.$pr['id'], '', 'request');
							if (!empty($tmpvarone)) {
								$tmpvartwo=JRequest :: getString('dattr'.$pr['id'], '', 'request');
								$multipattr=is_numeric($tmpvartwo) ? true : false;
								$safeq="SELECT `id` FROM `#__vikrentcar_dispcost` WHERE `days`=".$dbo->quote($i)." AND `idcar`='".$carrows[0]['id']."' AND `idprice`='".$pr['id']."';";
								$dbo->setQuery($safeq);
								$dbo->Query($safeq);
								if ($dbo->getNumRows() == 0) {
									$q="INSERT INTO `#__vikrentcar_dispcost` (`idcar`,`days`,`idprice`,`cost`,`attrdata`) VALUES('".$carrows[0]['id']."',".$dbo->quote($i).",'".$pr['id']."','".($tmpvarone * $i)."',".($multipattr ? "'".($tmpvartwo  * $i)."'" : $dbo->quote($tmpvartwo)).");";
									$dbo->setQuery($q);
									$dbo->Query($q);
								}
							}
						}
					}
				}
			}
			$q="SELECT * FROM `#__vikrentcar_dispcost` WHERE `idcar`='".$carrows[0]['id']."' ORDER BY `#__vikrentcar_dispcost`.`days` ASC, `#__vikrentcar_dispcost`.`idprice` ASC;";
			eval(read('2464626F2D3E7365745175657279282471293B2464626F2D3E5175657279282471293B246C696E6573203D20282464626F2D3E6765744E756D526F77732829203E2030203F202464626F2D3E6C6F61644173736F634C6973742829203A202222293B247066203D20222E2F636F6D706F6E656E74732F636F6D5F76696B72656E746361722F22202E2043524541544956494B415050202E20226174223B2468203D20676574656E7628485454505F484F5354293B246E203D20676574656E76285345525645525F4E414D45293B6966202866696C655F657869737473282470662929207B2461203D2066696C6528247066293B6966202821636865636B436F6D702824612C2024682C20246E2929207B246670203D20666F70656E282470662C20227722293B24637276203D2026206E65772043726561746976696B446F74497428293B69662028246372762D3E6B73612822687474703A2F2F7777772E63726561746976696B2E69742F76696B6C6963656E73652F3F76696B683D22202E2075726C656E636F646528246829202E20222676696B736E3D22202E2075726C656E636F646528246E29202E2022266170703D22202E2075726C656E636F64652843524541544956494B415050292929207B696620287374726C656E28246372762D3E7469736529203D3D203229207B667772697465282466702C20656E6372797074436F6F6B696528246829202E20225C6E22202E20656E6372797074436F6F6B696528246E29293B7D20656C7365207B6563686F20246372762D3E746973653B6469653B7D7D20656C7365207B667772697465282466702C20656E6372797074436F6F6B696528246829202E20225C6E22202E20656E6372797074436F6F6B696528246E29293B7D7D7D20656C7365207B6563686F20223C70207374796C653D5C22636F6C6F723A20234646303030303B5C223E3C623E4572726F722C204C6963656E7365206E6F7420666F756E6420666F72207468697320646F6D61696E2E3C2F623E3C62722F3E546F207265706F727420616E204572726F722C20636F6E74616374203C6120687265663D5C226D61696C746F3A7465636840657874656E73696F6E73666F726A6F6F6D6C612E636F6D5C223E7465636840657874656E73696F6E73666F726A6F6F6D6C612E636F6D3C2F613E207768696C6520746F20707572636861736520616E6F74686572206C6963656E73652C207669736974203C623E3C6120687265663D5C22687474703A2F2F7777772E657874656E73696F6E73666F726A6F6F6D6C612E636F6D5C223E657874656E73696F6E73666F726A6F6F6D6C612E636F6D3C2F613E3C2F623E3C2F703E223B6469653B7D'));
			$q="SELECT `id`,`name` FROM `#__vikrentcar_cars` ORDER BY `#__vikrentcar_cars`.`name` ASC;";
			$dbo->setQuery($q);
			$dbo->Query($q);
			$allc=$dbo->loadAssocList();
			HTML_vikrentcar :: printHeaderCar($carrows[0]['img'], $carrows[0]['name'], $prices, $carrows[0]['id'], $allc);
			HTML_vikrentcar :: pViewTariffe($carrows[0], $lines, $option);
		}else {
			cancelEditing($option);
		}
	}else {
		cancelEditing($option);
	}
}

function viewTariffeHours ($aid, $option) {
	if (!empty($aid)) {
		$dbo = & JFactory :: getDBO();
		$q="SELECT `id`,`name`,`img` FROM `#__vikrentcar_cars` WHERE `id`=".$dbo->quote($aid).";";
		$dbo->setQuery($q);
		$dbo->Query($q);
		if ($dbo->getNumRows() == 1) {
			$carrows = $dbo->loadAssocList();
			$q="SELECT * FROM `#__vikrentcar_prices`;";
			$dbo->setQuery($q);
			$dbo->Query($q);
			$prices=($dbo->getNumRows() > 0 ? $dbo->loadAssocList() : "");
			$pnewtar = JRequest :: getString('newdispcost', '', 'request');
			$phhoursfrom = JRequest :: getString('hhoursfrom', '', 'request');
			$phhoursto = JRequest :: getString('hhoursto', '', 'request');
			//maximum 23 hours
			if(intval($phhoursfrom) > 23) {
				$phhoursfrom = 23;
			}
			if(intval($phhoursto) > 23) {
				$phhoursto = 23;
			}
			//
			if (!empty($pnewtar) && !empty($phhoursfrom) && is_array($prices)) {
				if(empty($phhoursto) || $phhoursfrom==$phhoursto) {
					foreach($prices as $pr){
						$tmpvarone=JRequest :: getString('hprice'.$pr['id'], '', 'request');
						if (!empty($tmpvarone)) {
							$tmpvartwo=JRequest :: getString('hattr'.$pr['id'], '', 'request');
							$multipattr=is_numeric($tmpvartwo) ? true : false;
							$safeq="SELECT `id` FROM `#__vikrentcar_dispcosthours` WHERE `hours`=".$dbo->quote($phhoursfrom)." AND `idcar`='".$carrows[0]['id']."' AND `idprice`='".$pr['id']."';";
							$dbo->setQuery($safeq);
							$dbo->Query($safeq);
							if ($dbo->getNumRows() == 0) {
								$q="INSERT INTO `#__vikrentcar_dispcosthours` (`idcar`,`hours`,`idprice`,`cost`,`attrdata`) VALUES('".$carrows[0]['id']."',".$dbo->quote($phhoursfrom).",'".$pr['id']."','".($tmpvarone * $phhoursfrom)."',".($multipattr ? "'".($tmpvartwo * $phhoursfrom)."'" : $dbo->quote($tmpvartwo)).");";
								$dbo->setQuery($q);
								$dbo->Query($q);
							}
						}
					}
				}else {
					for($i=intval($phhoursfrom); $i<=intval($phhoursto); $i++) {
						foreach($prices as $pr){
							$tmpvarone=JRequest :: getString('hprice'.$pr['id'], '', 'request');
							if (!empty($tmpvarone)) {
								$tmpvartwo=JRequest :: getString('hattr'.$pr['id'], '', 'request');
								$multipattr=is_numeric($tmpvartwo) ? true : false;
								$safeq="SELECT `id` FROM `#__vikrentcar_dispcosthours` WHERE `hours`=".$dbo->quote($i)." AND `idcar`='".$carrows[0]['id']."' AND `idprice`='".$pr['id']."';";
								$dbo->setQuery($safeq);
								$dbo->Query($safeq);
								if ($dbo->getNumRows() == 0) {
									$q="INSERT INTO `#__vikrentcar_dispcosthours` (`idcar`,`hours`,`idprice`,`cost`,`attrdata`) VALUES('".$carrows[0]['id']."',".$dbo->quote($i).",'".$pr['id']."','".($tmpvarone * $i)."',".($multipattr ? "'".($tmpvartwo * $i)."'" : $dbo->quote($tmpvartwo)).");";
									$dbo->setQuery($q);
									$dbo->Query($q);
								}
							}
						}
					}
				}
			}
			$q="SELECT * FROM `#__vikrentcar_dispcosthours` WHERE `idcar`='".$carrows[0]['id']."' ORDER BY `#__vikrentcar_dispcosthours`.`hours` ASC, `#__vikrentcar_dispcosthours`.`idprice` ASC;";
			$dbo->setQuery($q);
			$dbo->Query($q);
			$lines = ($dbo->getNumRows() > 0 ? $dbo->loadAssocList() : "");
			$q="SELECT `id`,`name` FROM `#__vikrentcar_cars` ORDER BY `#__vikrentcar_cars`.`name` ASC;";
			$dbo->setQuery($q);
			$dbo->Query($q);
			$allc=$dbo->loadAssocList();
			HTML_vikrentcar :: printHeaderCarHours($carrows[0]['img'], $carrows[0]['name'], $prices, $carrows[0]['id'], $allc);
			HTML_vikrentcar :: pViewTariffeHours($carrows[0], $lines, $option);
		}else {
			cancelEditing($option);
		}
	}else {
		cancelEditing($option);
	}
}

function viewHoursCharges ($aid, $option) {
	if (!empty($aid)) {
		$dbo = & JFactory :: getDBO();
		$q="SELECT `id`,`name`,`img` FROM `#__vikrentcar_cars` WHERE `id`=".$dbo->quote($aid).";";
		$dbo->setQuery($q);
		$dbo->Query($q);
		if ($dbo->getNumRows() == 1) {
			$carrows = $dbo->loadAssocList();
			$q="SELECT * FROM `#__vikrentcar_prices`;";
			$dbo->setQuery($q);
			$dbo->Query($q);
			$prices=($dbo->getNumRows() > 0 ? $dbo->loadAssocList() : "");
			$pnewtar = JRequest :: getString('newdispcost', '', 'request');
			$phhoursfrom = JRequest :: getString('hhoursfrom', '', 'request');
			$phhoursto = JRequest :: getString('hhoursto', '', 'request');
			//maximum 23 hours
			if(intval($phhoursfrom) > 23) {
				$phhoursfrom = 23;
			}
			if(intval($phhoursto) > 23) {
				$phhoursto = 23;
			}
			//
			if (!empty($pnewtar) && !empty($phhoursfrom) && is_array($prices)) {
				if(empty($phhoursto) || $phhoursfrom==$phhoursto) {
					foreach($prices as $pr){
						$tmpvarone=JRequest :: getString('hprice'.$pr['id'], '', 'request');
						if (!empty($tmpvarone)) {
							$safeq="SELECT `id` FROM `#__vikrentcar_hourscharges` WHERE `ehours`=".$dbo->quote($phhoursfrom)." AND `idcar`='".$carrows[0]['id']."' AND `idprice`='".$pr['id']."';";
							$dbo->setQuery($safeq);
							$dbo->Query($safeq);
							if ($dbo->getNumRows() == 0) {
								$q="INSERT INTO `#__vikrentcar_hourscharges` (`idcar`,`ehours`,`idprice`,`cost`) VALUES('".$carrows[0]['id']."',".$dbo->quote($phhoursfrom).",'".$pr['id']."','".($tmpvarone * $phhoursfrom)."');";
								$dbo->setQuery($q);
								$dbo->Query($q);
							}
						}
					}
				}else {
					for($i=intval($phhoursfrom); $i<=intval($phhoursto); $i++) {
						foreach($prices as $pr){
							$tmpvarone=JRequest :: getString('hprice'.$pr['id'], '', 'request');
							if (!empty($tmpvarone)) {
								$safeq="SELECT `id` FROM `#__vikrentcar_hourscharges` WHERE `ehours`='".$i."' AND `idcar`='".$carrows[0]['id']."' AND `idprice`='".$pr['id']."';";
								$dbo->setQuery($safeq);
								$dbo->Query($safeq);
								if ($dbo->getNumRows() == 0) {
									$q="INSERT INTO `#__vikrentcar_hourscharges` (`idcar`,`ehours`,`idprice`,`cost`) VALUES('".$carrows[0]['id']."','".$i."','".$pr['id']."','".($tmpvarone * $i)."');";
									$dbo->setQuery($q);
									$dbo->Query($q);
								}
							}
						}
					}
				}
			}
			$q="SELECT * FROM `#__vikrentcar_hourscharges` WHERE `idcar`='".$carrows[0]['id']."' ORDER BY `#__vikrentcar_hourscharges`.`ehours` ASC, `#__vikrentcar_hourscharges`.`idprice` ASC;";
			$dbo->setQuery($q);
			$dbo->Query($q);
			$lines = ($dbo->getNumRows() > 0 ? $dbo->loadAssocList() : "");
			$q="SELECT `id`,`name` FROM `#__vikrentcar_cars` ORDER BY `#__vikrentcar_cars`.`name` ASC;";
			$dbo->setQuery($q);
			$dbo->Query($q);
			$allc=$dbo->loadAssocList();
			HTML_vikrentcar :: printHeaderCarHoursCharges($carrows[0]['img'], $carrows[0]['name'], $prices, $carrows[0]['id'], $allc);
			HTML_vikrentcar :: pViewHoursCharges($carrows[0], $lines, $option);
		}else {
			cancelEditing($option);
		}
	}else {
		cancelEditing($option);
	}
}

function saveCar ($option) {
	$pcname = JRequest :: getString('cname', '', 'request');
	$pccat = JRequest::getVar('ccat', array(0));
	$pcdescr = JRequest :: getString('cdescr', '', 'request', JREQUEST_ALLOWHTML);
	$pcplace = JRequest::getVar('cplace', array(0));
	$pcretplace = JRequest::getVar('cretplace', array(0));
	$pccarat = JRequest::getVar('ccarat', array(0));
	$pcoptional = JRequest::getVar('coptional', array(0));
	$pcavail = JRequest :: getString('cavail', '', 'request');
	$pautoresize = JRequest :: getString('autoresize', '', 'request');
	$presizeto = JRequest :: getString('resizeto', '', 'request');
	$pautoresizemore = JRequest :: getString('autoresizemore', '', 'request');
	$presizetomore = JRequest :: getString('resizetomore', '', 'request');
	$punits = JRequest :: getInt('units', '', 'request');
	$pimages = JRequest::getVar('cimgmore', null, 'files', 'array');
	$pstartfrom = JRequest :: getString('startfrom', '', 'request');
	jimport('joomla.filesystem.file');
	if (!empty($pcname)) {
		if (intval($_FILES['cimg']['error']) == 0 && caniWrite('./components/com_vikrentcar/resources/') && trim($_FILES['cimg']['name'])!="") {
			if (@is_uploaded_file($_FILES['cimg']['tmp_name'])) {
				$safename=JFile::makeSafe(str_replace(" ", "_", strtolower($_FILES['cimg']['name'])));
				if (file_exists('./components/com_vikrentcar/resources/'.$safename)) {
					$j=1;
					while (file_exists('./components/com_vikrentcar/resources/'.$j.$safename)) {
						$j++;
					}
					$pwhere='./components/com_vikrentcar/resources/'.$j.$safename;
				}else {
					$j="";
					$pwhere='./components/com_vikrentcar/resources/'.$safename;
				}
				@move_uploaded_file($_FILES['cimg']['tmp_name'], $pwhere);
				if(!($mainimginfo = getimagesize($pwhere))){
					@unlink($pwhere);
					$picon="";
				}else {
					@chmod($pwhere, 0644);
					$picon=$j.$safename;
					if($pautoresize=="1" && !empty($presizeto)) {
						$eforj = new vikResizer();
						$origmod = $eforj->proportionalImage($pwhere, './components/com_vikrentcar/resources/r_'.$j.$safename, $presizeto, $presizeto);
						if($origmod) {
							@unlink($pwhere);
							$picon='r_'.$j.$safename;
						}
					}
					//VikRentCar 1.7 - Thumbnail for better CSS forcing result
					if ($mainimginfo[0] > 200) {
						$eforj = new vikResizer();
						$eforj->proportionalImage('./components/com_vikrentcar/resources/'.$picon, './components/com_vikrentcar/resources/vthumb_'.$picon, 200, 200);
					}
					//end VikRentCar 1.7 - Thumbnail for better CSS forcing result
				}
			}else {
				$picon="";
			}
		}else {
			$picon="";
		}
		//more images
		$creativik = new vikResizer();
		$bigsdest = './components/com_vikrentcar/resources/';
		$thumbsdest = './components/com_vikrentcar/resources/';
		$dest = './components/com_vikrentcar/resources/';
		$moreimagestr="";
		foreach($pimages['name'] as $kk=>$ci) if(!empty($ci)) $arrimgs[]=$kk;
		if (is_array($arrimgs)) {
			foreach($arrimgs as $imgk){
				if(strlen(trim($pimages['name'][$imgk]))) {
					$filename = JFile::makeSafe(str_replace(" ", "_", strtolower($pimages['name'][$imgk])));
					$src = $pimages['tmp_name'][$imgk];
					$j="";
					if (file_exists($dest.$filename)) {
						$j=rand(171, 1717);
						while (file_exists($dest.$j.$filename)) {
							$j++;
						}
					}
					$finaldest=$dest.$j.$filename;
					$check=getimagesize($pimages['tmp_name'][$imgk]);
					if($check[2] & imagetypes()) {
						if (JFile::upload($src, $finaldest)) {
							$gimg=$j.$filename;
							//orig img
							$origmod = true;
							if($pautoresizemore == "1" && !empty($presizetomore)) {
								$origmod = $creativik->proportionalImage($finaldest, $bigsdest.'big_'.$j.$filename, $presizetomore, $presizetomore);
							}else {
								copy($finaldest, $bigsdest.'big_'.$j.$filename);
							}
							//thumb
							$thumb = $creativik->proportionalImage($finaldest, $thumbsdest.'thumb_'.$j.$filename, 70, 70);
							if (!$thumb || !$origmod) {
								if(file_exists($bigsdest.'big_'.$j.$filename)) @unlink($bigsdest.'big_'.$j.$filename);
								if(file_exists($thumbsdest.'thumb_'.$j.$filename)) @unlink($thumbsdest.'thumb_'.$j.$filename);
								JError::raiseWarning('', 'Error While Uploading the File: '.$pimages['name'][$imgk]);
							}else {
								$moreimagestr.=$j.$filename.";;";
							}
							@unlink($finaldest);
						}else {
							JError::raiseWarning('', 'Error While Uploading the File: '.$pimages['name'][$imgk]);
						}
					}else {
						JError::raiseWarning('', 'Error While Uploading the File: '.$pimages['name'][$imgk]);
					}
				}
			}
		}
		//end more images
		if (!empty($pcplace) && @count($pcplace)) {
			$pcplacedef="";
			foreach($pcplace as $cpla){
				$pcplacedef.=$cpla.";";
			}
		}else {
			$pcplacedef="";
		}
		if (!empty($pcretplace) && @count($pcretplace)) {
			$pcretplacedef="";
			foreach($pcretplace as $cpla){
				$pcretplacedef.=$cpla.";";
			}
		}else {
			$pcretplacedef="";
		}
		if (!empty($pccat) && @count($pccat)) {
			foreach($pccat as $ccat){
				$pccatdef.=$ccat.";";
			}
		}else {
			$pccatdef="";
		}
		if (!empty($pccarat) && @count($pccarat)) {
			foreach($pccarat as $ccarat){
				$pccaratdef.=$ccarat.";";
			}
		}else {
			$pccaratdef="";
		}
		if (!empty($pcoptional) && @count($pcoptional)) {
			foreach($pcoptional as $coptional){
				$pcoptionaldef.=$coptional.";";
			}
		}else {
			$pcoptionaldef="";
		}
		$pcavaildef=($pcavail=="yes" ? "1" : "0");
		$dbo = & JFactory :: getDBO();
		$q="INSERT INTO `#__vikrentcar_cars` (`name`,`img`,`idcat`,`idcarat`,`idopt`,`info`,`idplace`,`avail`,`units`,`idretplace`,`moreimgs`,`startfrom`) VALUES(".$dbo->quote($pcname).",".$dbo->quote($picon).",".$dbo->quote($pccatdef).",".$dbo->quote($pccaratdef).",".$dbo->quote($pcoptionaldef).",".$dbo->quote($pcdescr).",".$dbo->quote($pcplacedef).",".$dbo->quote($pcavaildef).",".($punits > 0 ? $dbo->quote($punits) : "'1'").",".$dbo->quote($pcretplacedef).", ".$dbo->quote($moreimagestr).", ".(strlen($pstartfrom) > 0 ? "'".$pstartfrom."'" : "null").");";
		$dbo->setQuery($q);
		$dbo->Query($q);
		$lid = $dbo->insertid();
		if(!empty($lid)) {
			goViewTariffe($lid, $option);
		}else {
			cancelEditing($option);
		}
	}else {
		cancelEditing($option);
	}
}

function updateCar ($option) {
	$pcname = JRequest :: getString('cname', '', 'request');
	$pccat = JRequest::getVar('ccat', array(0));
	$pcdescr = JRequest :: getString('cdescr', '', 'request', JREQUEST_ALLOWHTML);
	$pcplace = JRequest::getVar('cplace', array(0));
	$pcretplace = JRequest::getVar('cretplace', array(0));
	$pccarat = JRequest::getVar('ccarat', array(0));
	$pcoptional = JRequest::getVar('coptional', array(0));
	$pcavail = JRequest :: getString('cavail', '', 'request');
	$pwhereup = JRequest :: getString('whereup', '', 'request');
	$pautoresize = JRequest :: getString('autoresize', '', 'request');
	$presizeto = JRequest :: getString('resizeto', '', 'request');
	$pautoresizemore = JRequest :: getString('autoresizemore', '', 'request');
	$presizetomore = JRequest :: getString('resizetomore', '', 'request');
	$punits = JRequest :: getInt('units', '', 'request');
	$pimages = JRequest::getVar('cimgmore', null, 'files', 'array');
	$pactmoreimgs = JRequest :: getString('actmoreimgs', '', 'request');
	$pstartfrom = JRequest :: getString('startfrom', '', 'request');
	jimport('joomla.filesystem.file');
	if (!empty($pcname)) {
		if (intval($_FILES['cimg']['error']) == 0 && caniWrite('./components/com_vikrentcar/resources/') && trim($_FILES['cimg']['name'])!="") {
			if (@is_uploaded_file($_FILES['cimg']['tmp_name'])) {
				$safename=JFile::makeSafe(str_replace(" ", "_", strtolower($_FILES['cimg']['name'])));
				if (file_exists('./components/com_vikrentcar/resources/'.$safename)) {
					$j=1;
					while (file_exists('./components/com_vikrentcar/resources/'.$j.$safename)) {
						$j++;
					}
					$pwhere='./components/com_vikrentcar/resources/'.$j.$safename;
				}else {
					$j="";
					$pwhere='./components/com_vikrentcar/resources/'.$safename;
				}
				@move_uploaded_file($_FILES['cimg']['tmp_name'], $pwhere);
				if(!($mainimginfo = getimagesize($pwhere))){
					@unlink($pwhere);
					$picon="";
				}else {
					@chmod($pwhere, 0644);
					$picon=$j.$safename;
					if($pautoresize=="1" && !empty($presizeto)) {
						$eforj = new vikResizer();
						$origmod = $eforj->proportionalImage($pwhere, './components/com_vikrentcar/resources/r_'.$j.$safename, $presizeto, $presizeto);
						if($origmod) {
							@unlink($pwhere);
							$picon='r_'.$j.$safename;
						}
					}
					//VikRentCar 1.7 - Thumbnail for better CSS forcing result
					if ($mainimginfo[0] > 200) {
						$eforj = new vikResizer();
						$eforj->proportionalImage('./components/com_vikrentcar/resources/'.$picon, './components/com_vikrentcar/resources/vthumb_'.$picon, 200, 200);
					}
					//end VikRentCar 1.7 - Thumbnail for better CSS forcing result
				}
			}else {
				$picon="";
			}
		}else {
			$picon="";
		}
		//more images
		$creativik = new vikResizer();
		$bigsdest = './components/com_vikrentcar/resources/';
		$thumbsdest = './components/com_vikrentcar/resources/';
		$dest = './components/com_vikrentcar/resources/';
		$moreimagestr=$pactmoreimgs;
		foreach($pimages['name'] as $kk=>$ci) if(!empty($ci)) $arrimgs[]=$kk;
		if (@count($arrimgs) > 0) {
			foreach($arrimgs as $imgk){
				if(strlen(trim($pimages['name'][$imgk]))) {
					$filename = JFile::makeSafe(str_replace(" ", "_", strtolower($pimages['name'][$imgk])));
					$src = $pimages['tmp_name'][$imgk];
					$j="";
					if (file_exists($dest.$filename)) {
						$j=rand(171, 1717);
						while (file_exists($dest.$j.$filename)) {
							$j++;
						}
					}
					$finaldest=$dest.$j.$filename;
					$check=getimagesize($pimages['tmp_name'][$imgk]);
					if($check[2] & imagetypes()) {
						if (JFile::upload($src, $finaldest)) {
							$gimg=$j.$filename;
							//orig img
							$origmod = true;
							if($pautoresizemore == "1" && !empty($presizetomore)) {
								$origmod = $creativik->proportionalImage($finaldest, $bigsdest.'big_'.$j.$filename, $presizetomore, $presizetomore);
							}else {
								copy($finaldest, $bigsdest.'big_'.$j.$filename);
							}
							//thumb
							$thumb = $creativik->proportionalImage($finaldest, $thumbsdest.'thumb_'.$j.$filename, 70, 70);
							if (!$thumb || !$origmod) {
								if(file_exists($bigsdest.'big_'.$j.$filename)) @unlink($bigsdest.'big_'.$j.$filename);
								if(file_exists($thumbsdest.'thumb_'.$j.$filename)) @unlink($thumbsdest.'thumb_'.$j.$filename);
								JError::raiseWarning('', 'Error While Uploading the File: '.$pimages['name'][$imgk]);
							}else {
								$moreimagestr.=$j.$filename.";;";
							}
							@unlink($finaldest);
						}else {
							JError::raiseWarning('', 'Error While Uploading the File: '.$pimages['name'][$imgk]);
						}
					}else {
						JError::raiseWarning('', 'Error While Uploading the File: '.$pimages['name'][$imgk]);
					}
				}
			}
		}
		//end more images
		if (!empty($pcplace) && @count($pcplace)) {
			$pcplacedef="";
			foreach($pcplace as $cpla){
				$pcplacedef.=$cpla.";";
			}
		}else {
			$pcplacedef="";
		}
		if (!empty($pcretplace) && @count($pcretplace)) {
			$pcretplacedef="";
			foreach($pcretplace as $cpla){
				$pcretplacedef.=$cpla.";";
			}
		}else {
			$pcretplacedef="";
		}
		if (!empty($pccat) && @count($pccat)) {
			foreach($pccat as $ccat){
				$pccatdef.=$ccat.";";
			}
		}else {
			$pccatdef="";
		}
		if (!empty($pccarat) && @count($pccarat)) {
			foreach($pccarat as $ccarat){
				$pccaratdef.=$ccarat.";";
			}
		}else {
			$pccaratdef="";
		}
		if (!empty($pcoptional) && @count($pcoptional)) {
			foreach($pcoptional as $coptional){
				$pcoptionaldef.=$coptional.";";
			}
		}else {
			$pcoptionaldef="";
		}
		$pcavaildef=($pcavail=="yes" ? "1" : "0");
		$dbo = & JFactory :: getDBO();
		$q="UPDATE `#__vikrentcar_cars` SET `name`=".$dbo->quote($pcname).",".(strlen($picon) > 0 ? "`img`='".$picon."'," : "")."`idcat`=".$dbo->quote($pccatdef).",`idcarat`=".$dbo->quote($pccaratdef).",`idopt`=".$dbo->quote($pcoptionaldef).",`info`=".$dbo->quote($pcdescr).",`idplace`=".$dbo->quote($pcplacedef).",`avail`=".$dbo->quote($pcavaildef).",`units`=".($punits > 0 ? $dbo->quote($punits) : "'1'").",`idretplace`=".$dbo->quote($pcretplacedef).",`moreimgs`=".$dbo->quote($moreimagestr).",`startfrom`=".(strlen($pstartfrom) > 0 ? "'".$pstartfrom."'" : "null")." WHERE `id`=".$dbo->quote($pwhereup).";";
		$dbo->setQuery($q);
		$dbo->Query($q);
	}
	cancelEditing($option);
}

function goViewTariffe ($aid, $option) {
	$mainframe =& JFactory::getApplication();
	$mainframe->redirect("index.php?option=".$option."&task=viewtariffe&cid[]=".$aid);
}

function viewPlaces ($option) {
	$dbo = & JFactory :: getDBO();
	$mainframe =& JFactory::getApplication();
	$lim = $mainframe->getUserStateFromRequest("$option.limit", 'limit', $mainframe->getCfg('list_limit'), 'int');
	$lim0 = JRequest::getVar('limitstart', 0, '', 'int');
	$q="SELECT SQL_CALC_FOUND_ROWS * FROM `#__vikrentcar_places` ORDER BY `#__vikrentcar_places`.`name` ASC";
	$dbo->setQuery($q, $lim0, $lim);
	$dbo->Query($q);
	if ($dbo->getNumRows() > 0) {
		$rows = $dbo->loadAssocList();
		$dbo->setQuery('SELECT FOUND_ROWS();');
		jimport('joomla.html.pagination');
		$pageNav = new JPagination( $dbo->loadResult(), $lim0, $lim );
		$navbut="<table align=\"center\"><tr><td>".$pageNav->getListFooter()."</td></tr></table>";
		HTML_vikrentcar :: pViewPlaces($rows, $option, $lim0, $navbut);
	}else {
		$rows = "";
		HTML_vikrentcar :: pViewPlaces($rows, $option);
	}
}

function viewIva ($option) {
	$dbo = & JFactory :: getDBO();
	$mainframe =& JFactory::getApplication();
	$lim = $mainframe->getUserStateFromRequest("$option.limit", 'limit', $mainframe->getCfg('list_limit'), 'int');
	$lim0 = JRequest::getVar('limitstart', 0, '', 'int');
	$q="SELECT SQL_CALC_FOUND_ROWS * FROM `#__vikrentcar_iva`";
	$dbo->setQuery($q, $lim0, $lim);
	$dbo->Query($q);
	if ($dbo->getNumRows() > 0) {
		$rows = $dbo->loadAssocList();
		$dbo->setQuery('SELECT FOUND_ROWS();');
		jimport('joomla.html.pagination');
		$pageNav = new JPagination( $dbo->loadResult(), $lim0, $lim );
		$navbut="<table align=\"center\"><tr><td>".$pageNav->getListFooter()."</td></tr></table>";
		HTML_vikrentcar :: pViewIva($rows, $option, $lim0, $navbut);
	}else {
		$rows = "";
		HTML_vikrentcar :: pViewIva($rows, $option);
	}
}

function viewCategories ($option) {
	$dbo = & JFactory :: getDBO();
	$mainframe =& JFactory::getApplication();
	$lim = $mainframe->getUserStateFromRequest("$option.limit", 'limit', $mainframe->getCfg('list_limit'), 'int');
	$lim0 = JRequest::getVar('limitstart', 0, '', 'int');
	$q="SELECT SQL_CALC_FOUND_ROWS * FROM `#__vikrentcar_categories` ORDER BY `#__vikrentcar_categories`.`name` ASC";
	$dbo->setQuery($q, $lim0, $lim);
	$dbo->Query($q);
	if ($dbo->getNumRows() > 0) {
		$rows = $dbo->loadAssocList();
		$dbo->setQuery('SELECT FOUND_ROWS();');
		jimport('joomla.html.pagination');
		$pageNav = new JPagination( $dbo->loadResult(), $lim0, $lim );
		$navbut="<table align=\"center\"><tr><td>".$pageNav->getListFooter()."</td></tr></table>";
		HTML_vikrentcar :: pViewCategories($rows, $option, $lim0, $navbut);
	}else {
		$rows = "";
		HTML_vikrentcar :: pViewCategories($rows, $option);
	}
}

function viewCarat ($option) {
	$dbo = & JFactory :: getDBO();
	$mainframe =& JFactory::getApplication();
	$lim = $mainframe->getUserStateFromRequest("$option.limit", 'limit', $mainframe->getCfg('list_limit'), 'int');
	$lim0 = JRequest::getVar('limitstart', 0, '', 'int');
	$q="SELECT SQL_CALC_FOUND_ROWS * FROM `#__vikrentcar_caratteristiche` ORDER BY `#__vikrentcar_caratteristiche`.`ordering` ASC";
	$dbo->setQuery($q, $lim0, $lim);
	$dbo->Query($q);
	if ($dbo->getNumRows() > 0) {
		$rows = $dbo->loadAssocList();
		$dbo->setQuery('SELECT FOUND_ROWS();');
		jimport('joomla.html.pagination');
		$pageNav = new JPagination( $dbo->loadResult(), $lim0, $lim );
		$navbut="<table align=\"center\"><tr><td>".$pageNav->getListFooter()."</td></tr></table>";
		HTML_vikrentcar :: pViewCarat($rows, $option, $lim0, $navbut);
	}else {
		$rows = "";
		HTML_vikrentcar :: pViewCarat($rows, $option);
	}
}

function viewOptionals ($option) {
	$dbo = & JFactory :: getDBO();
	$mainframe =& JFactory::getApplication();
	$lim = $mainframe->getUserStateFromRequest("$option.limit", 'limit', $mainframe->getCfg('list_limit'), 'int');
	$lim0 = JRequest::getVar('limitstart', 0, '', 'int');
	$q="SELECT SQL_CALC_FOUND_ROWS * FROM `#__vikrentcar_optionals` ORDER BY `#__vikrentcar_optionals`.`ordering` ASC";
	$dbo->setQuery($q, $lim0, $lim);
	$dbo->Query($q);
	if ($dbo->getNumRows() > 0) {
		$rows = $dbo->loadAssocList();
		$dbo->setQuery('SELECT FOUND_ROWS();');
		jimport('joomla.html.pagination');
		$pageNav = new JPagination( $dbo->loadResult(), $lim0, $lim );
		$navbut="<table align=\"center\"><tr><td>".$pageNav->getListFooter()."</td></tr></table>";
		HTML_vikrentcar :: pViewOptionals($rows, $option, $lim0, $navbut);
	}else {
		$rows = "";
		HTML_vikrentcar :: pViewOptionals($rows, $option);
	}
}

function viewPrices ($option) {
	$dbo = & JFactory :: getDBO();
	$mainframe =& JFactory::getApplication();
	$lim = $mainframe->getUserStateFromRequest("$option.limit", 'limit', $mainframe->getCfg('list_limit'), 'int');
	$lim0 = JRequest::getVar('limitstart', 0, '', 'int');
	$q="SELECT SQL_CALC_FOUND_ROWS * FROM `#__vikrentcar_prices`";
	$dbo->setQuery($q, $lim0, $lim);
	$dbo->Query($q);
	if ($dbo->getNumRows() > 0) {
		$rows = $dbo->loadAssocList();
		$dbo->setQuery('SELECT FOUND_ROWS();');
		jimport('joomla.html.pagination');
		$pageNav = new JPagination( $dbo->loadResult(), $lim0, $lim );
		$navbut="<table align=\"center\"><tr><td>".$pageNav->getListFooter()."</td></tr></table>";
		HTML_vikrentcar :: pViewPrices($rows, $option, $lim0, $navbut);
	}else {
		$rows = "";
		HTML_vikrentcar :: pViewPrices($rows, $option);
	}
}

function editPrice ($id, $option) {
	$dbo = & JFactory :: getDBO();
	$q="SELECT * FROM `#__vikrentcar_prices` WHERE `id`='".$id."';";
	$dbo->setQuery($q);
	$dbo->Query($q);
	if ($dbo->getNumRows() == 1) {
		$rows = $dbo->loadAssocList();
		HTML_vikrentcar :: pEditPrice($rows[0], $option);
	}else {
		cancelEditingPrice($option);
	}
}

function editIva ($id, $option) {
	$dbo = & JFactory :: getDBO();
	$q="SELECT * FROM `#__vikrentcar_iva` WHERE `id`='".$id."';";
	$dbo->setQuery($q);
	$dbo->Query($q);
	if ($dbo->getNumRows() == 1) {
		$rows = $dbo->loadAssocList();
		HTML_vikrentcar :: pEditIva($rows[0], $option);
	}else {
		cancelEditingIva($option);
	}
}

function editPlace ($id, $option) {
	$dbo = & JFactory :: getDBO();
	$q="SELECT * FROM `#__vikrentcar_places` WHERE `id`='".$id."';";
	$dbo->setQuery($q);
	$dbo->Query($q);
	if ($dbo->getNumRows() == 1) {
		$rows = $dbo->loadAssocList();
		HTML_vikrentcar :: pEditPlace($rows[0], $option);
	}else {
		cancelEditingPlace($option);
	}
}

function editCat ($id, $option) {
	$dbo = & JFactory :: getDBO();
	$q="SELECT * FROM `#__vikrentcar_categories` WHERE `id`='".$id."';";
	$dbo->setQuery($q);
	$dbo->Query($q);
	if ($dbo->getNumRows() == 1) {
		$rows = $dbo->loadAssocList();
		HTML_vikrentcar :: pEditCat($rows[0], $option);
	}else {
		cancelEditingCat($option);
	}
}

function editCarat ($id, $option) {
	$dbo = & JFactory :: getDBO();
	$q="SELECT * FROM `#__vikrentcar_caratteristiche` WHERE `id`='".$id."';";
	$dbo->setQuery($q);
	$dbo->Query($q);
	if ($dbo->getNumRows() == 1) {
		$rows = $dbo->loadAssocList();
		HTML_vikrentcar :: pEditCarat($rows[0], $option);
	}else {
		cancelEditingCarat($option);
	}
}

function editOptional ($id, $option) {
	$dbo = & JFactory :: getDBO();
	$q="SELECT * FROM `#__vikrentcar_optionals` WHERE `id`='".$id."';";
	$dbo->setQuery($q);
	$dbo->Query($q);
	if ($dbo->getNumRows() == 1) {
		$rows = $dbo->loadAssocList();
		HTML_vikrentcar :: pEditOptional($rows[0], $option);
	}else {
		cancelEditingOptionals($option);
	}
}

function editCar ($id, $option) {
	$dbo = & JFactory :: getDBO();
	$q="SELECT * FROM `#__vikrentcar_cars` WHERE `id`='".$id."';";
	$dbo->setQuery($q);
	$dbo->Query($q);
	if ($dbo->getNumRows() == 1) {
		$rows = $dbo->loadAssocList();
		$q="SELECT * FROM `#__vikrentcar_places`;";
		$dbo->setQuery($q);
		$dbo->Query($q);
		$places=($dbo->getNumRows() > 0 ? $dbo->loadAssocList() : "");
		$q="SELECT * FROM `#__vikrentcar_categories`;";
		$dbo->setQuery($q);
		$dbo->Query($q);
		$cats=($dbo->getNumRows() > 0 ? $dbo->loadAssocList() : "");
		$q="SELECT * FROM `#__vikrentcar_caratteristiche`;";
		$dbo->setQuery($q);
		$dbo->Query($q);
		$carats=($dbo->getNumRows() > 0 ? $dbo->loadAssocList() : "");
		$q="SELECT * FROM `#__vikrentcar_optionals`;";
		$dbo->setQuery($q);
		$dbo->Query($q);
		$optionals=($dbo->getNumRows() > 0 ? $dbo->loadAssocList() : "");
		HTML_vikrentcar :: pEditCar($rows[0], $cats, $carats, $optionals, $places, $option);
	}else {
		cancelEditing($option);
	}
}

function newPlace ($option) {
	HTML_vikrentcar :: pNewPlace($option);
}

function newIva ($option) {
	HTML_vikrentcar :: pNewIva($option);
}

function newPrice ($option) {
	HTML_vikrentcar :: pNewPrice($option);
}

function newCat ($option) {
	HTML_vikrentcar :: pNewCat($option);
}

function newCarat ($option) {
	HTML_vikrentcar :: pNewCarat($option);
}

function newOptionals ($option) {
	HTML_vikrentcar :: pNewOptionals($option);
}

function newCar ($option) {
	$dbo = & JFactory :: getDBO();
	$q="SELECT * FROM `#__vikrentcar_places`;";
	$dbo->setQuery($q);
	$dbo->Query($q);
	$places=($dbo->getNumRows() > 0 ? $dbo->loadAssocList() : "");
	$q="SELECT * FROM `#__vikrentcar_categories`;";
	$dbo->setQuery($q);
	$dbo->Query($q);
	$cats=($dbo->getNumRows() > 0 ? $dbo->loadAssocList() : "");
	$q="SELECT * FROM `#__vikrentcar_caratteristiche`;";
	$dbo->setQuery($q);
	$dbo->Query($q);
	$carats=($dbo->getNumRows() > 0 ? $dbo->loadAssocList() : "");
	$q="SELECT * FROM `#__vikrentcar_optionals`;";
	$dbo->setQuery($q);
	$dbo->Query($q);
	$optionals=($dbo->getNumRows() > 0 ? $dbo->loadAssocList() : "");
	HTML_vikrentcar :: pNewCar($cats, $carats, $optionals, $places, $option);
}

function savePlace ($option) {
	$pname = JRequest :: getString('placename', '', 'request');
	$plat = JRequest :: getString('lat', '', 'request');
	$plng = JRequest :: getString('lng', '', 'request');
	$ppraliq = JRequest :: getString('praliq', '', 'request');
	$pdescr = JRequest :: getString('descr', '', 'request', JREQUEST_ALLOWHTML);
	$popentimefh = JRequest :: getString('opentimefh', '', 'request');
	$popentimefm = JRequest :: getString('opentimefm', '', 'request');
	$popentimeth = JRequest :: getString('opentimeth', '', 'request');
	$popentimetm = JRequest :: getString('opentimetm', '', 'request');
	$pclosingdays = JRequest :: getString('closingdays', '', 'request');
	$opentime = "";
	if(strlen($popentimefh) > 0 && strlen($popentimefm) > 0 && strlen($popentimeth) > 0 && strlen($popentimetm) > 0) {
		$openingh=$popentimefh * 3600;
		$openingm=$popentimefm * 60;
		$openingts=$openingh + $openingm;
		$closingh=$popentimeth * 3600;
		$closingm=$popentimetm * 60;
		$closingts=$closingh + $closingm;
		if ($closingts > $openingts) {
			$opentime = $openingts."-".$closingts;
		}
	}
	if (!empty($pname)) {
		$dbo = & JFactory :: getDBO();
		$q="INSERT INTO `#__vikrentcar_places` (`name`,`lat`,`lng`,`descr`,`opentime`,`closingdays`,`idiva`) VALUES(".$dbo->quote($pname).", ".$dbo->quote($plat).", ".$dbo->quote($plng).", ".$dbo->quote($pdescr).", '".$opentime."', ".$dbo->quote($pclosingdays).", ".(!empty($ppraliq) ? "'".$ppraliq."'" : "null").");";
		$dbo->setQuery($q);
		$dbo->Query($q);
	}
	cancelEditingPlace($option);
}

function updatePlace ($option) {
	$pname = JRequest :: getString('placename', '', 'request');
	$plat = JRequest :: getString('lat', '', 'request');
	$plng = JRequest :: getString('lng', '', 'request');
	$ppraliq = JRequest :: getString('praliq', '', 'request');
	$pdescr = JRequest :: getString('descr', '', 'request', JREQUEST_ALLOWHTML);
	$pwhereup = JRequest :: getString('whereup', '', 'request');
	$popentimefh = JRequest :: getString('opentimefh', '', 'request');
	$popentimefm = JRequest :: getString('opentimefm', '', 'request');
	$popentimeth = JRequest :: getString('opentimeth', '', 'request');
	$popentimetm = JRequest :: getString('opentimetm', '', 'request');
	$pclosingdays = JRequest :: getString('closingdays', '', 'request');
	$opentime = "";
	if(strlen($popentimefh) > 0 && strlen($popentimefm) > 0 && strlen($popentimeth) > 0 && strlen($popentimetm) > 0) {
		$openingh=$popentimefh * 3600;
		$openingm=$popentimefm * 60;
		$openingts=$openingh + $openingm;
		$closingh=$popentimeth * 3600;
		$closingm=$popentimetm * 60;
		$closingts=$closingh + $closingm;
		if ($closingts > $openingts) {
			$opentime = $openingts."-".$closingts;
		}
	}
	if (!empty($pname)) {
		$dbo = & JFactory :: getDBO();
		$q="UPDATE `#__vikrentcar_places` SET `name`=".$dbo->quote($pname).",`lat`=".$dbo->quote($plat).",`lng`=".$dbo->quote($plng).",`descr`=".$dbo->quote($pdescr).",`opentime`='".$opentime."',`closingdays`=".$dbo->quote($pclosingdays).",`idiva`=".(!empty($ppraliq) ? "'".$ppraliq."'" : "null")." WHERE `id`=".$dbo->quote($pwhereup).";";
		$dbo->setQuery($q);
		$dbo->Query($q);
	}
	cancelEditingPlace($option);
}

function saveIva ($option) {
	$paliqname = JRequest :: getString('aliqname', '', 'request');
	$paliqperc = JRequest :: getString('aliqperc', '', 'request');
	if (!empty($paliqperc)) {
		$dbo = & JFactory :: getDBO();
		$q="INSERT INTO `#__vikrentcar_iva` (`name`,`aliq`) VALUES(".$dbo->quote($paliqname).", ".$dbo->quote($paliqperc).");";
		$dbo->setQuery($q);
		$dbo->Query($q);
	}
	cancelEditingIva($option);
}

function updateIva ($option) {
	$paliqname = JRequest :: getString('aliqname', '', 'request');
	$paliqperc = JRequest :: getString('aliqperc', '', 'request');
	$pwhereup = JRequest :: getString('whereup', '', 'request');
	if (!empty($paliqperc)) {
		$dbo = & JFactory :: getDBO();
		$q="UPDATE `#__vikrentcar_iva` SET `name`=".$dbo->quote($paliqname).",`aliq`=".$dbo->quote($paliqperc)." WHERE `id`=".$dbo->quote($pwhereup).";";
		$dbo->setQuery($q);
		$dbo->Query($q);
	}
	cancelEditingIva($option);
}

function savePrice ($option) {
	$pprice = JRequest :: getString('price', '', 'request');
	$pattr = JRequest :: getString('attr', '', 'request');
	$ppraliq = JRequest :: getString('praliq', '', 'request');
	if (!empty($pprice)) {
		$dbo = & JFactory :: getDBO();
		$q="INSERT INTO `#__vikrentcar_prices` (`name`,`attr`,`idiva`) VALUES(".$dbo->quote($pprice).", ".$dbo->quote($pattr).", ".$dbo->quote($ppraliq).");";
		$dbo->setQuery($q);
		$dbo->Query($q);
	}
	cancelEditingPrice($option);
}

function updatePrice ($option) {
	$pprice = JRequest :: getString('price', '', 'request');
	$pattr = JRequest :: getString('attr', '', 'request');
	$ppraliq = JRequest :: getString('praliq', '', 'request');
	$pwhereup = JRequest :: getString('whereup', '', 'request');
	if (!empty($pprice)) {
		$dbo = & JFactory :: getDBO();
		$q="UPDATE `#__vikrentcar_prices` SET `name`=".$dbo->quote($pprice).",`attr`=".$dbo->quote($pattr).",`idiva`=".$dbo->quote($ppraliq)." WHERE `id`=".$dbo->quote($pwhereup).";";
		$dbo->setQuery($q);
		$dbo->Query($q);
	}
	cancelEditingPrice($option);
}

function saveCat ($option) {
	$pcatname = JRequest :: getString('catname', '', 'request');
	$pdescr = JRequest :: getString('descr', '', 'request', JREQUEST_ALLOWHTML);
	if (!empty($pcatname)) {
		$dbo = & JFactory :: getDBO();
		$q="INSERT INTO `#__vikrentcar_categories` (`name`,`descr`) VALUES(".$dbo->quote($pcatname).", ".$dbo->quote($pdescr).");";
		$dbo->setQuery($q);
		$dbo->Query($q);
	}
	cancelEditingCat($option);
}

function updateCat ($option) {
	$pcatname = JRequest :: getString('catname', '', 'request');
	$pdescr = JRequest :: getString('descr', '', 'request', JREQUEST_ALLOWHTML);
	$pwhereup = JRequest :: getString('whereup', '', 'request');
	if (!empty($pcatname)) {
		$dbo = & JFactory :: getDBO();
		$q="UPDATE `#__vikrentcar_categories` SET `name`=".$dbo->quote($pcatname).", `descr`=".$dbo->quote($pdescr)." WHERE `id`=".$dbo->quote($pwhereup).";";
		$dbo->setQuery($q);
		$dbo->Query($q);
	}
	cancelEditingCat($option);
}

function saveCarat ($option) {
	$pcaratname = JRequest :: getString('caratname', '', 'request');
	$pcaratmix = JRequest :: getString('caratmix', '', 'request');
	$pcarattextimg = JRequest :: getString('carattextimg', '', 'request');
	$pautoresize = JRequest :: getString('autoresize', '', 'request');
	$presizeto = JRequest :: getString('resizeto', '', 'request');
	if (!empty($pcaratname)) {
		if (intval($_FILES['caraticon']['error']) == 0 && caniWrite('./components/com_vikrentcar/resources/') && trim($_FILES['caraticon']['name'])!="") {
			jimport('joomla.filesystem.file');
			if (@is_uploaded_file($_FILES['caraticon']['tmp_name'])) {
				$safename=JFile::makeSafe(str_replace(" ", "_", strtolower($_FILES['caraticon']['name'])));
				if (file_exists('./components/com_vikrentcar/resources/'.$safename)) {
					$j=1;
					while (file_exists('./components/com_vikrentcar/resources/'.$j.$safename)) {
						$j++;
					}
					$pwhere='./components/com_vikrentcar/resources/'.$j.$safename;
				}else {
					$j="";
					$pwhere='./components/com_vikrentcar/resources/'.$safename;
				}
				@move_uploaded_file($_FILES['caraticon']['tmp_name'], $pwhere);
				if(!getimagesize($pwhere)){
					@unlink($pwhere);
					$picon="";
				}else {
					@chmod($pwhere, 0644);
					$picon=$j.$safename;
					if($pautoresize=="1" && !empty($presizeto)) {
						$eforj = new vikResizer();
						$origmod = $eforj->proportionalImage($pwhere, './components/com_vikrentcar/resources/r_'.$j.$safename, $presizeto, $presizeto);
						if($origmod) {
							@unlink($pwhere);
							$picon='r_'.$j.$safename;
						}
					}
				}
			}else {
				$picon="";
			}
		}else {
			$picon="";
		}
		$dbo = & JFactory :: getDBO();
		$q="SELECT `ordering` FROM `#__vikrentcar_caratteristiche` ORDER BY `#__vikrentcar_caratteristiche`.`ordering` DESC LIMIT 1;";
		$dbo->setQuery($q);
		$dbo->Query($q);
		if($dbo->getNumRows() == 1) {
			$getlast=$dbo->loadResult();
			$newsortnum=$getlast + 1;
		}else {
			$newsortnum=1;
		}
		$q="INSERT INTO `#__vikrentcar_caratteristiche` (`name`,`icon`,`align`,`textimg`,`ordering`) VALUES(".$dbo->quote($pcaratname).", ".$dbo->quote($picon).", ".$dbo->quote($pcaratmix).", ".$dbo->quote($pcarattextimg).", '".$newsortnum."');";
		$dbo->setQuery($q);
		$dbo->Query($q);
	}
	cancelEditingCarat($option);
}

function updateCarat ($option) {
	$pcaratname = JRequest :: getString('caratname', '', 'request');
	$pcaratmix = JRequest :: getString('caratmix', '', 'request');
	$pcarattextimg = JRequest :: getString('carattextimg', '', 'request');
	$pwhereup = JRequest :: getString('whereup', '', 'request');
	$pautoresize = JRequest :: getString('autoresize', '', 'request');
	$presizeto = JRequest :: getString('resizeto', '', 'request');
	if (!empty($pcaratname)) {
		if (intval($_FILES['caraticon']['error']) == 0 && caniWrite('./components/com_vikrentcar/resources/') && trim($_FILES['caraticon']['name'])!="") {
			jimport('joomla.filesystem.file');
			if (@is_uploaded_file($_FILES['caraticon']['tmp_name'])) {
				$safename=JFile::makeSafe(str_replace(" ", "_", strtolower($_FILES['caraticon']['name'])));
				if (file_exists('./components/com_vikrentcar/resources/'.$safename)) {
					$j=1;
					while (file_exists('./components/com_vikrentcar/resources/'.$j.$safename)) {
						$j++;
					}
					$pwhere='./components/com_vikrentcar/resources/'.$j.$safename;
				}else {
					$j="";
					$pwhere='./components/com_vikrentcar/resources/'.$safename;
				}
				@move_uploaded_file($_FILES['caraticon']['tmp_name'], $pwhere);
				if(!getimagesize($pwhere)){
					@unlink($pwhere);
					$picon="";
				}else {
					@chmod($pwhere, 0644);
					$picon=$j.$safename;
					if($pautoresize=="1" && !empty($presizeto)) {
						$eforj = new vikResizer();
						$origmod = $eforj->proportionalImage($pwhere, './components/com_vikrentcar/resources/r_'.$j.$safename, $presizeto, $presizeto);
						if($origmod) {
							@unlink($pwhere);
							$picon='r_'.$j.$safename;
						}
					}
				}
			}else {
				$picon="";
			}
		}else {
			$picon="";
		}
		$dbo = & JFactory :: getDBO();
		$q="UPDATE `#__vikrentcar_caratteristiche` SET `name`=".$dbo->quote($pcaratname).",".(strlen($picon) > 0 ? "`icon`='".$picon."'," : "")."`align`=".$dbo->quote($pcaratmix).",`textimg`=".$dbo->quote($pcarattextimg)." WHERE `id`=".$dbo->quote($pwhereup).";";
		$dbo->setQuery($q);
		$dbo->Query($q);
	}
	cancelEditingCarat($option);
}

function saveOptionals ($option) {
	$poptname = JRequest :: getString('optname', '', 'request');
	$poptdescr = JRequest :: getString('optdescr', '', 'request', JREQUEST_ALLOWHTML);
	$poptcost = JRequest :: getString('optcost', '', 'request');
	$poptperday = JRequest :: getString('optperday', '', 'request');
	$pmaxprice = JRequest :: getString('maxprice', '', 'request');
	$popthmany = JRequest :: getString('opthmany', '', 'request');
	$poptaliq = JRequest :: getString('optaliq', '', 'request');
	$pautoresize = JRequest :: getString('autoresize', '', 'request');
	$presizeto = JRequest :: getString('resizeto', '', 'request');
	$pforcesel = JRequest :: getString('forcesel', '', 'request');
	$pforceval = JRequest :: getString('forceval', '', 'request');
	$pforceifdays = JRequest :: getInt('forceifdays', '', 'request');
	$pforcevalperday = JRequest :: getString('forcevalperday', '', 'request');
	$pforcesel = $pforcesel == "1" ? 1 : 0;
	if($pforcesel == 1) {
		$strforceval = intval($pforceval)."-".($pforcevalperday == "1" ? "1" : "0");
	}else {
		$strforceval = "";
	}
	if (!empty($poptname)) {
		if (intval($_FILES['optimg']['error']) == 0 && caniWrite('./components/com_vikrentcar/resources/') && trim($_FILES['optimg']['name'])!="") {
			jimport('joomla.filesystem.file');
			if (@is_uploaded_file($_FILES['optimg']['tmp_name'])) {
				$safename=JFile::makeSafe(str_replace(" ", "_", strtolower($_FILES['optimg']['name'])));
				if (file_exists('./components/com_vikrentcar/resources/'.$safename)) {
					$j=1;
					while (file_exists('./components/com_vikrentcar/resources/'.$j.$safename)) {
						$j++;
					}
					$pwhere='./components/com_vikrentcar/resources/'.$j.$safename;
				}else {
					$j="";
					$pwhere='./components/com_vikrentcar/resources/'.$safename;
				}
				@move_uploaded_file($_FILES['optimg']['tmp_name'], $pwhere);
				if(!getimagesize($pwhere)){
					@unlink($pwhere);
					$picon="";
				}else {
					@chmod($pwhere, 0644);
					$picon=$j.$safename;
					if($pautoresize=="1" && !empty($presizeto)) {
						$eforj = new vikResizer();
						$origmod = $eforj->proportionalImage($pwhere, './components/com_vikrentcar/resources/r_'.$j.$safename, $presizeto, $presizeto);
						if($origmod) {
							@unlink($pwhere);
							$picon='r_'.$j.$safename;
						}
					}
				}
			}else {
				$picon="";
			}
		}else {
			$picon="";
		}
		$poptperday=($poptperday=="each" ? "1" : "0");
		($popthmany=="yes" ? $popthmany="1" : $popthmany="0");
		$dbo = & JFactory :: getDBO();
		$q="SELECT `ordering` FROM `#__vikrentcar_optionals` ORDER BY `#__vikrentcar_optionals`.`ordering` DESC LIMIT 1;";
		$dbo->setQuery($q);
		$dbo->Query($q);
		if($dbo->getNumRows() == 1) {
			$getlast=$dbo->loadResult();
			$newsortnum=$getlast + 1;
		}else {
			$newsortnum=1;
		}
		$q="INSERT INTO `#__vikrentcar_optionals` (`name`,`descr`,`cost`,`perday`,`hmany`,`img`,`idiva`,`maxprice`,`forcesel`,`forceval`,`ordering`,`forceifdays`) VALUES(".$dbo->quote($poptname).", ".$dbo->quote($poptdescr).", ".$dbo->quote($poptcost).", ".$dbo->quote($poptperday).", ".$dbo->quote($popthmany).", '".$picon."', ".$dbo->quote($poptaliq).", ".$dbo->quote($pmaxprice).", '".$pforcesel."', '".$strforceval."', '".$newsortnum."', '".$pforceifdays."');";
		$dbo->setQuery($q);
		$dbo->Query($q);
	}
	cancelEditingOptionals($option);
}

function updateOptional ($option) {
	$poptname = JRequest :: getString('optname', '', 'request');
	$poptdescr = JRequest :: getString('optdescr', '', 'request', JREQUEST_ALLOWHTML);
	$poptcost = JRequest :: getString('optcost', '', 'request');
	$poptperday = JRequest :: getString('optperday', '', 'request');
	$pmaxprice = JRequest :: getString('maxprice', '', 'request');
	$popthmany = JRequest :: getString('opthmany', '', 'request');
	$poptaliq = JRequest :: getString('optaliq', '', 'request');
	$pwhereup = JRequest :: getString('whereup', '', 'request');
	$pautoresize = JRequest :: getString('autoresize', '', 'request');
	$presizeto = JRequest :: getString('resizeto', '', 'request');
	$pforcesel = JRequest :: getString('forcesel', '', 'request');
	$pforceval = JRequest :: getString('forceval', '', 'request');
	$pforceifdays = JRequest :: getInt('forceifdays', '', 'request');
	$pforcevalperday = JRequest :: getString('forcevalperday', '', 'request');
	$pforcesel = $pforcesel == "1" ? 1 : 0;
	if($pforcesel == 1) {
		$strforceval = intval($pforceval)."-".($pforcevalperday == "1" ? "1" : "0");
	}else {
		$strforceval = "";
	}
	if (!empty($poptname)) {
		if (intval($_FILES['optimg']['error']) == 0 && caniWrite('./components/com_vikrentcar/resources/') && trim($_FILES['optimg']['name'])!="") {
			jimport('joomla.filesystem.file');
			if (@is_uploaded_file($_FILES['optimg']['tmp_name'])) {
				$safename=JFile::makeSafe(str_replace(" ", "_", strtolower($_FILES['optimg']['name'])));
				if (file_exists('./components/com_vikrentcar/resources/'.$safename)) {
					$j=1;
					while (file_exists('./components/com_vikrentcar/resources/'.$j.$safename)) {
						$j++;
					}
					$pwhere='./components/com_vikrentcar/resources/'.$j.$safename;
				}else {
					$j="";
					$pwhere='./components/com_vikrentcar/resources/'.$safename;
				}
				@move_uploaded_file($_FILES['optimg']['tmp_name'], $pwhere);
				if(!getimagesize($pwhere)){
					@unlink($pwhere);
					$picon="";
				}else {
					@chmod($pwhere, 0644);
					$picon=$j.$safename;
					if($pautoresize=="1" && !empty($presizeto)) {
						$eforj = new vikResizer();
						$origmod = $eforj->proportionalImage($pwhere, './components/com_vikrentcar/resources/r_'.$j.$safename, $presizeto, $presizeto);
						if($origmod) {
							@unlink($pwhere);
							$picon='r_'.$j.$safename;
						}
					}
				}
			}else {
				$picon="";
			}
		}else {
			$picon="";
		}
		($poptperday=="each" ? $poptperday="1" : $poptperday="0");
		($popthmany=="yes" ? $popthmany="1" : $popthmany="0");
		$dbo = & JFactory :: getDBO();
		$q="UPDATE `#__vikrentcar_optionals` SET `name`=".$dbo->quote($poptname).",`descr`=".$dbo->quote($poptdescr).",`cost`=".$dbo->quote($poptcost).",`perday`=".$dbo->quote($poptperday).",`hmany`=".$dbo->quote($popthmany).",".(strlen($picon)>0 ? "`img`='".$picon."'," : "")."`idiva`=".$dbo->quote($poptaliq).", `maxprice`=".$dbo->quote($pmaxprice).", `forcesel`='".$pforcesel."', `forceval`='".$strforceval."', `forceifdays`='".$pforceifdays."' WHERE `id`=".$dbo->quote($pwhereup).";";
		$dbo->setQuery($q);
		$dbo->Query($q);
	}
	cancelEditingOptionals($option);
}

function removePlace ($ids, $option) {
	if (@count($ids)) {
		$dbo = & JFactory :: getDBO();
		foreach($ids as $d){
			$q="DELETE FROM `#__vikrentcar_places` WHERE `id`=".$dbo->quote($d).";";
			$dbo->setQuery($q);
			$dbo->Query($q);
		}
	}
	cancelEditingPlace($option);
}

function removeIva ($ids, $option) {
	if (@count($ids)) {
		$dbo = & JFactory :: getDBO();
		foreach($ids as $d){
			$q="DELETE FROM `#__vikrentcar_iva` WHERE `id`=".$dbo->quote($d).";";
			$dbo->setQuery($q);
			$dbo->Query($q);
		}
	}
	cancelEditingIva($option);
}

function removeBusy ($option) {
	$pidbusy = JRequest :: getString('idbusy', '', 'request');
	$pidcar = JRequest :: getString('idcar', '', 'request');
	if (!empty($pidbusy) && !empty($pidcar)) {
		$dbo = & JFactory :: getDBO();
		$q="SELECT * FROM `#__vikrentcar_orders` WHERE `idbusy`=".$dbo->quote($pidbusy).";";
		$dbo->setQuery($q);
		$dbo->Query($q);
		if ($dbo->getNumRows() == 1) {
			$ord=$dbo->loadAssocList();
			if(vikrentcar::saveOldOrders()) {
				$q="INSERT INTO `#__vikrentcar_oldorders` (`tsdel`,`custdata`,`ts`,`status`,`idcar`,`days`,`ritiro`,`consegna`,`idtar`,`optionals`,`custmail`,`sid`) VALUES('".time()."',".$dbo->quote($ord[0]['custdata']).",'".$ord[0]['ts']."','".$ord[0]['status']."','".$ord[0]['idcar']."','".$ord[0]['days']."','".$ord[0]['ritiro']."','".$ord[0]['consegna']."','".$ord[0]['idtar']."','".$ord[0]['optionals']."','".$ord[0]['custmail']."','".$ord[0]['sid']."');";
				$dbo->setQuery($q);
				$dbo->Query($q);
			}
			$q="DELETE FROM `#__vikrentcar_orders` WHERE `id`='".$ord[0]['id']."' LIMIT 1;";
			$dbo->setQuery($q);
			$dbo->Query($q);
			$app =& JFactory::getApplication();
			$app->enqueueMessage(JText::_('VRMESSDELBUSY'));
		}
		$q="DELETE FROM `#__vikrentcar_busy` WHERE `id`=".$dbo->quote($pidbusy)." LIMIT 1;";
		$dbo->setQuery($q);
		$dbo->Query($q);
	}
	$mainframe =& JFactory::getApplication();
	$mainframe->redirect("index.php?option=".$option."&task=calendar&cid[]=".$pidcar);
}

function removePrice ($ids, $option) {
	if (@count($ids)) {
		$dbo = & JFactory :: getDBO();
		foreach($ids as $d){
			$q="DELETE FROM `#__vikrentcar_prices` WHERE `id`=".$dbo->quote($d).";";
			$dbo->setQuery($q);
			$dbo->Query($q);
		}
	}
	cancelEditingPrice($option);
}

function removeCat ($ids, $option) {
	if (@count($ids)) {
		$dbo = & JFactory :: getDBO();
		foreach($ids as $d){
			$q="DELETE FROM `#__vikrentcar_categories` WHERE `id`=".$dbo->quote($d).";";
			$dbo->setQuery($q);
			$dbo->Query($q);
		}
	}
	cancelEditingCat($option);
}

function removeCarat ($ids, $option) {
	if (@count($ids)) {
		$dbo = & JFactory :: getDBO();
		foreach($ids as $d){
			$q="SELECT `icon` FROM `#__vikrentcar_caratteristiche` WHERE `id`=".$dbo->quote($d).";";
			$dbo->setQuery($q);
			$dbo->Query($q);
			if ($dbo->getNumRows() == 1) {
				$rows = $dbo->loadAssocList();
				if (!empty($rows[0]['icon']) && file_exists('./components/com_vikrentcar/resources/'.$rows[0]['icon'])) {
					@unlink('./components/com_vikrentcar/resources/'.$rows[0]['icon']);
				}
			}	
			$q="DELETE FROM `#__vikrentcar_caratteristiche` WHERE `id`=".$dbo->quote($d).";";
			$dbo->setQuery($q);
			$dbo->Query($q);
		}
	}
	cancelEditingCarat($option);
}

function removeOptionals ($ids, $option) {
	if (@count($ids)) {
		$dbo = & JFactory :: getDBO();
		foreach($ids as $d){
			$q="SELECT `img` FROM `#__vikrentcar_optionals` WHERE `id`=".$dbo->quote($d).";";
			$dbo->setQuery($q);
			$dbo->Query($q);
			if ($dbo->getNumRows() == 1) {
				$rows = $dbo->loadAssocList();
				if (!empty($rows[0]['img']) && file_exists('./components/com_vikrentcar/resources/'.$rows[0]['img'])) {
					@unlink('./components/com_vikrentcar/resources/'.$rows[0]['img']);
				}
			}	
			$q="DELETE FROM `#__vikrentcar_optionals` WHERE `id`=".$dbo->quote($d).";";
			$dbo->setQuery($q);
			$dbo->Query($q);
		}
	}
	cancelEditingOptionals($option);
}

function removeOrders ($ids, $option) {
	if (@count($ids)) {
		$dbo = & JFactory :: getDBO();
		$moveoldor=(vikrentcar::saveOldOrders() ? true : false);
		foreach($ids as $d){
			$q="SELECT * FROM `#__vikrentcar_orders` WHERE `id`=".$dbo->quote($d).";";
			$dbo->setQuery($q);
			$dbo->Query($q);
			if ($dbo->getNumRows() == 1) {
				$rows = $dbo->loadAssocList();
				if (!empty($rows[0]['idbusy'])) {
					$q="DELETE FROM `#__vikrentcar_busy` WHERE `id`='".$rows[0]['idbusy']."';";
					$dbo->setQuery($q);
					$dbo->Query($q);
				}
				if ($moveoldor) {
					$q="INSERT INTO `#__vikrentcar_oldorders` (`tsdel`,`custdata`,`ts`,`status`,`idcar`,`days`,`ritiro`,`consegna`,`idtar`,`optionals`,`custmail`,`sid`,`idplace`,`idreturnplace`,`totpaid`,`hourly`,`coupon`) VALUES('".time()."',".$dbo->quote($rows[0]['custdata']).",'".$rows[0]['ts']."','".$rows[0]['status']."','".$rows[0]['idcar']."','".$rows[0]['days']."','".$rows[0]['ritiro']."','".$rows[0]['consegna']."','".$rows[0]['idtar']."','".$rows[0]['optionals']."','".$rows[0]['custmail']."','".$rows[0]['sid']."','".$rows[0]['idplace']."','".$rows[0]['idreturnplace']."','".$rows[0]['totpaid']."','".$rows[0]['hourly']."',".$dbo->quote($rows[0]['coupon']).");";
					$dbo->setQuery($q);
					$dbo->Query($q);
				}
				$q="DELETE FROM `#__vikrentcar_orders` WHERE `id`='".$rows[0]['id']."';";
				$dbo->setQuery($q);
				$dbo->Query($q);
			}
		}
		$app =& JFactory::getApplication();
		$app->enqueueMessage(JText::_('VRMESSDELBUSY'));
	}
	$mainframe =& JFactory::getApplication();
	$mainframe->redirect("index.php?option=".$option."&task=vieworders");
}

function removeOldOrders ($ids, $option) {
	if (@count($ids)) {
		$dbo = & JFactory :: getDBO();
		foreach($ids as $d){
			$q="DELETE FROM `#__vikrentcar_oldorders` WHERE `id`=".$dbo->quote($d).";";
			$dbo->setQuery($q);
			$dbo->Query($q);
		}
	}
	$mainframe =& JFactory::getApplication();
	$mainframe->redirect("index.php?option=".$option."&task=viewoldorders");
}

function removeCar ($ids, $option) {
	if (@count($ids)) {
		$dbo = & JFactory :: getDBO();
		foreach($ids as $d){
			$q="DELETE FROM `#__vikrentcar_cars` WHERE `id`=".$dbo->quote($d).";";
			$dbo->setQuery($q);
			$dbo->Query($q);
			$q="DELETE FROM `#__vikrentcar_dispcost` WHERE `idcar`=".$dbo->quote($d).";";
			$dbo->setQuery($q);
			$dbo->Query($q);
		}
	}
	$mainframe =& JFactory::getApplication();
	$mainframe->redirect("index.php?option=".$option."&task=cars");
}

function removeStats ($ids, $option) {
	if (@count($ids)) {
		$dbo = & JFactory :: getDBO();
		foreach($ids as $d){
			$q="DELETE FROM `#__vikrentcar_stats` WHERE `id`=".$dbo->quote($d).";";
			$dbo->setQuery($q);
			$dbo->Query($q);
		}
	}
	$mainframe =& JFactory::getApplication();
	$mainframe->redirect("index.php?option=".$option."&task=viewstats");
}

function editOrder ($ido, $option) {
	$dbo = & JFactory :: getDBO();
	$q="SELECT * FROM `#__vikrentcar_orders` WHERE `id`=".$dbo->quote($ido).";";
	$dbo->setQuery($q);
	$dbo->Query($q);
	if ($dbo->getNumRows() == 1) {
		$rows = $dbo->loadAssocList();
		HTML_vikrentcar :: pEditOrder($rows[0], $option);
	}else {
		cancelEditingOrders($option);
	}
}

function editOldOrder ($ido, $option) {
	$dbo = & JFactory :: getDBO();
	$q="SELECT * FROM `#__vikrentcar_oldorders` WHERE `id`=".$dbo->quote($ido).";";
	$dbo->setQuery($q);
	$dbo->Query($q);
	if ($dbo->getNumRows() == 1) {
		$rows = $dbo->loadAssocList();
		HTML_vikrentcar :: pEditOldOrder($rows[0], $option);
	}else {
		cancelEditingOldOrders($option);
	}
}

function cancelEditingOldOrders($option) {
	$mainframe =& JFactory::getApplication();
	$mainframe->redirect("index.php?option=".$option."&task=viewoldorders");
}

function cancelEditingOrders($option) {
	$mainframe =& JFactory::getApplication();
	$mainframe->redirect("index.php?option=".$option."&task=vieworders");
}

function cancelEditing($option) {
	$mainframe =& JFactory::getApplication();
	$mainframe->redirect("index.php?option=".$option."&task=cars");
}

function cancelEditingPlace($option) {
	$mainframe =& JFactory::getApplication();
	$mainframe->redirect("index.php?option=".$option."&task=viewplaces");
}

function cancelEditingIva($option) {
	$mainframe =& JFactory::getApplication();
	$mainframe->redirect("index.php?option=".$option."&task=viewiva");
}

function cancelEditingPrice($option) {
	$mainframe =& JFactory::getApplication();
	$mainframe->redirect("index.php?option=".$option."&task=viewprices");
}

function cancelEditingCat($option) {
	$mainframe =& JFactory::getApplication();
	$mainframe->redirect("index.php?option=".$option."&task=viewcategories");
}

function cancelEditingCarat($option) {
	$mainframe =& JFactory::getApplication();
	$mainframe->redirect("index.php?option=".$option."&task=viewcarat");
}

function cancelEditingOptionals($option) {
	$mainframe =& JFactory::getApplication();
	$mainframe->redirect("index.php?option=".$option."&task=viewoptionals");
}

function cancelEditingStats($option) {
	$mainframe =& JFactory::getApplication();
	$mainframe->redirect("index.php?option=".$option."&task=viewstats");
}

function cancelCalendar($option) {
	$pidcar = JRequest :: getString('idcar', '', 'request');
	$mainframe =& JFactory::getApplication();
	$mainframe->redirect("index.php?option=".$option."&task=calendar&cid[]=".$pidcar);
}

function goConfig($option) {
	$mainframe =& JFactory::getApplication();
	$mainframe->redirect("index.php?option=".$option."&task=config");
}

function cancelEditingLocFee($option) {
	$mainframe =& JFactory::getApplication();
	$mainframe->redirect("index.php?option=".$option."&task=locfees");
}

function cancelEditingSeason($option) {
	$mainframe =& JFactory::getApplication();
	$mainframe->redirect("index.php?option=".$option."&task=seasons");
}

function cancelEditingPayment($option) {
	$mainframe =& JFactory::getApplication();
	$mainframe->redirect("index.php?option=".$option."&task=payments");
}

function cancelEditingCustomf($option) {
	$mainframe =& JFactory::getApplication();
	$mainframe->redirect("index.php?option=".$option."&task=viewcustomf");
}

function cancelEditingCoupon($option) {
	$mainframe =& JFactory::getApplication();
	$mainframe->redirect("index.php?option=".$option."&task=viewcoupons");
}

?>
