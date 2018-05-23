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

jimport('joomla.application.component.view');

class VikrentcarViewShowprc extends JViewLegacy {
	function display($tpl = null) {
		$pcaropt = JRequest :: getString('caropt', '', 'request');
		$pdays = JRequest :: getString('days', '', 'request');
		$ppickup = JRequest :: getString('pickup', '', 'request');
		$prelease = JRequest :: getString('release', '', 'request');
		$pplace = JRequest :: getString('place', '', 'request');
		$preturnplace = JRequest :: getString('returnplace', '', 'request');
		$nowdf = vikrentcar :: getDateFormat();
		if ($nowdf == "%d/%m/%Y") {
			$df = 'd/m/Y';
		}elseif ($nowdf == "%m/%d/%Y") {
			$df = 'm/d/Y';
		}else {
			$df = 'Y/m/d';
		}
		$dbo = & JFactory :: getDBO();
		$q = "SELECT `units` FROM `#__vikrentcar_cars` WHERE `id`=" . $dbo->quote($pcaropt) . ";";
		$dbo->setQuery($q);
		$dbo->Query($q);
		$units = $dbo->loadResult();
		//vikrentcar 1.5
		$checkhourly = false;
		//vikrentcar 1.6
		$checkhourscharges = 0;
		//
		$hoursdiff = 0;
		$secdiff = $prelease - $ppickup;
		$daysdiff = $secdiff / 86400;
		if (is_int($daysdiff)) {
			if ($daysdiff < 1) {
				$daysdiff = 1;
			}
		}else {
			if ($daysdiff < 1) {
				$daysdiff = 1;
				$checkhourly = true;
				$ophours = $secdiff / 3600;
				$hoursdiff = intval(round($ophours));
				if($hoursdiff < 1) {
					$hoursdiff = 1;
				}
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
		$groupdays = vikrentcar::getGroupDays($ppickup, $prelease, $daysdiff);
		$morehst = vikrentcar :: getHoursCarAvail() * 3600;
		$goonunits = true;
		$check = "SELECT `id`,`ritiro`,`consegna` FROM `#__vikrentcar_busy` WHERE `idcar`=" . $dbo->quote($pcaropt) . ";";
		$dbo->setQuery($check);
		$dbo->Query($check);
		if ($dbo->getNumRows() > 0) {
			$busy = $dbo->loadAssocList();
			foreach ($groupdays as $gday) {
				$bfound = 0;
				foreach ($busy as $bu) {
					if ($gday >= $bu['ritiro'] && $gday <= ($morehst + $bu['consegna'])) {
						$bfound++;
					}
				}
				if ($bfound >= $units) {
					$goonunits = false;
					break;
				}
			}
		}
		//
		if ($goonunits) {
			$q = "SELECT * FROM `#__vikrentcar_dispcost` WHERE `days`=" . $dbo->quote($pdays) . " AND `idcar`=" . $dbo->quote($pcaropt) . " ORDER BY `#__vikrentcar_dispcost`.`cost` ASC;";
			$dbo->setQuery($q);
			$dbo->Query($q);
			if ($dbo->getNumRows() > 0) {
				$tars = $dbo->loadAssocList();
				//vikrentcar 1.5
				if($checkhourly) {
					$tars = vikrentcar::applyHourlyPricesCar($tars, $hoursdiff, $pcaropt);
				}
				//
				//vikrentcar 1.6
				if($checkhourscharges > 0 && $aehourschbasp == true) {
					$tars = vikrentcar::applyExtraHoursChargesCar($tars, $pcaropt, $checkhourscharges, $daysdiff);
				}
				//
				$q = "SELECT * FROM `#__vikrentcar_cars` WHERE `id`=" . $dbo->quote($pcaropt) . "" . (!empty ($pplace) ? "  AND `idplace` LIKE '%" . $pplace . ";%'" : "") . ";";
				$dbo->setQuery($q);
				$dbo->Query($q);
				if ($dbo->getNumRows() == 1) {
					$car = $dbo->loadAssocList();
					if (intval($car[0]['avail']) == 1) {
						if (vikrentcar :: dayValidTs($pdays, $ppickup, $prelease)) {
							//vikrentcar 1.6
							if($checkhourscharges > 0 && $aehourschbasp == false) {
								$tars = vikrentcar::extraHoursSetPreviousFareCar($tars, $pcaropt, $checkhourscharges, $daysdiff);
								$tars = vikrentcar :: applySeasonsCar($tars, $ppickup, $prelease, $pplace);
								$tars = vikrentcar::applyExtraHoursChargesCar($tars, $pcaropt, $checkhourscharges, $daysdiff, true);
							}else {
								$tars = vikrentcar :: applySeasonsCar($tars, $ppickup, $prelease, $pplace);
							}
							//
							//apply locations fee
							if (!empty ($pplace) && !empty ($preturnplace)) {
								$locfee = vikrentcar :: getLocFee($pplace, $preturnplace);
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
										if (array_key_exists($pdays, $arrvaloverrides)) {
											$locfee['cost'] = $arrvaloverrides[$pdays];
										}
									}
									//end VikRentCar 1.7 - Location fees overrides
									$locfeecost = intval($locfee['daily']) == 1 ? ($locfee['cost'] * $pdays) : $locfee['cost'];
									$lfarr = array ();
									foreach ($tars as $kat => $at) {
										$newcost = $at['cost'] + $locfeecost;
										$at['cost'] = $newcost;
										$lfarr[$kat] = $at;
									}
									$tars = $lfarr;
								}
							}
							//
							$this->assignRef('tars', $tars);
							$this->assignRef('car', $car[0]);
							$this->assignRef('pickup', $ppickup);
							$this->assignRef('release', $prelease);
							$this->assignRef('place', $pplace);
							//theme
							$theme = vikrentcar::getTheme();
							if($theme != 'default') {
								$thdir = JPATH_SITE.DS.'components'.DS.'com_vikrentcar'.DS.'themes'.DS.$theme.DS.'showprc';
								if(is_dir($thdir)) {
									$this->_setPath('template', $thdir.DS);
								}
							}
							//
							parent :: display($tpl);
						}else {
							showSelect(JText :: _('VRERRCALCTAR'));
						}
					}else {
						showSelect(JText :: _('VRCARNOTAV'));
					}
				}else {
					showSelect(JText :: _('VRCARNOTFND'));
				}
			}else {
				showSelect(JText :: _('VRNOTARFNDSELO'));
			}
		}else {
			showSelect(JText :: _('VRCARNOTRIT') . " " . date($df . ' H:i', $ppickup) . " " . JText :: _('VRCARNOTCONSTO') . " " . date($df . ' H:i', $prelease));
		}
	}
}
?>