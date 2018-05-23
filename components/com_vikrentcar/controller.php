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

jimport('joomla.application.component.controller');

class VikrentcarController extends JControllerLegacy {
	function display() {
		$view=JRequest :: getVar('view', '');
		if($view == 'carslist') {
			JRequest :: setVar('view', 'carslist');
		}elseif($view == 'cardetails') {
			JRequest :: setVar('view', 'cardetails');
		}elseif($view == 'loginregister') {
			JRequest :: setVar('view', 'loginregister');
		}elseif($view == 'locationsmap') {
			JRequest :: setVar('view', 'locationsmap');
		}elseif($view == 'locationslist') {
			JRequest :: setVar('view', 'locationslist');
		}elseif($view == 'userorders') {
			JRequest :: setVar('view', 'userorders');
		}else {
			JRequest :: setVar('view', 'vikrentcar');
		}
		parent :: display();
	}

	function search() {
		JRequest :: setVar('view', 'search');
		parent :: display();
	}

	function showprc() {
		JRequest :: setVar('view', 'showprc');
		parent :: display();
	}

	function oconfirm() {
		$requirelogin = vikrentcar::requireLogin();
		if($requirelogin) {
			if(vikrentcar::userIsLogged()) {
				JRequest :: setVar('view', 'oconfirm');
			}else {
				JRequest :: setVar('view', 'loginregister');
			}
		}else {
			JRequest :: setVar('view', 'oconfirm');
		}
		parent :: display();
	}

	function register() {
		$mainframe =& JFactory::getApplication();
		$dbo = & JFactory :: getDBO();
		//user data
		$pname = JRequest :: getString('name', '', 'request');
		$plname = JRequest :: getString('lname', '', 'request');
		$pemail = JRequest :: getString('email', '', 'request');
		$pusername = JRequest :: getString('username', '', 'request');
		$ppassword = JRequest :: getString('password', '', 'request');
		$pconfpassword = JRequest :: getString('confpassword', '', 'request');
		//
		//order data
		$ppriceid = JRequest :: getString('priceid', '', 'request');
		$pplace = JRequest :: getString('place', '', 'request');
		$preturnplace = JRequest :: getString('returnplace', '', 'request');
		$pcarid = JRequest :: getString('carid', '', 'request');
		$pdays = JRequest :: getString('days', '', 'request');
		$ppickup = JRequest :: getString('pickup', '', 'request');
		$prelease = JRequest :: getString('release', '', 'request');
		$pitemid = JRequest :: getString('Itemid', '', 'request');
		$copts = array();
		$q = "SELECT * FROM `#__vikrentcar_optionals`;";
		$dbo->setQuery($q);
		$dbo->Query($q);
		if ($dbo->getNumRows() > 0) {
			$optionals = $dbo->loadAssocList();
			foreach ($optionals as $opt) {
				$tmpvar = JRequest :: getString('optid' . $opt['id'], '', 'request');
				if (!empty ($tmpvar)) {
					$copts[$opt['id']] = $tmpvar;
				}
			}
		}
		$chosenopts = "";
		if(is_array($copts) && @count($copts) > 0) {
			foreach($copts as $idopt => $quanopt) {
				$chosenopts .= "&optid".$idopt."=".$quanopt;
			}
		}
		$qstring = "priceid=".$ppriceid."&place=".$pplace."&returnplace=".$preturnplace."&carid=".$pcarid."&days=".$pdays."&pickup=".$ppickup."&release=".$prelease.(!empty($chosenopts) ? $chosenopts : "").(!empty($pitemid) ? "&Itemid=".$pitemid : "");
		//
		if(!vikrentcar::userIsLogged()) {
			if (!empty($pname) && !empty($plname) && !empty($pusername) && validEmail($pemail) && $ppassword == $pconfpassword) {
				//save user
				$newuserid=vikrentcar::addJoomlaUser($pname." ".$plname, $pusername, $pemail, $ppassword);
				if ($newuserid!=false && strlen($newuserid)) {
					//registration success
					$credentials = array('username' => $pusername, 'password' => $ppassword );
					//autologin
					$mainframe->login($credentials);
					$currentUser = JFactory::getUser();
					$currentUser->setLastVisit(time());
					$currentUser->set('guest', 0);
					//
					if (!empty($ppriceid)) {
						$mainframe->redirect(JRoute::_('index.php?option=com_vikrentcar&task=oconfirm&'.$qstring, false));
					}else {
						$mainframe->redirect(JRoute::_('index.php?option=com_vikrentcar&view=userorders', false));
					}
				}else {
					//error while saving new user
					JError :: raiseWarning('', JText::_('VRCREGERRSAVING'));
					$mainframe->redirect(JRoute::_('index.php?option=com_vikrentcar&view=loginregister&'.$qstring, false));
				}
			}else {
				//invalid data
				JError :: raiseWarning('', JText::_('VRCREGERRINSDATA'));
				$mainframe->redirect(JRoute::_('index.php?option=com_vikrentcar&view=loginregister&'.$qstring, false));
			}
		}else {
			//user is already logged in, proceed
			$mainframe->redirect(JRoute::_('index.php?option=com_vikrentcar&task=oconfirm&'.$qstring, false));
		}
	}

	function saveorder() {
		$dbo = & JFactory :: getDBO();
		$pcar = JRequest :: getString('car', '', 'request');
		$pdays = JRequest :: getString('days', '', 'request');
		//vikrentcar 1.6
		$porigdays = JRequest :: getString('origdays', '', 'request');
		$pcouponcode = JRequest :: getString('couponcode', '', 'request');
		//
		$ppickup = JRequest :: getString('pickup', '', 'request');
		$prelease = JRequest :: getString('release', '', 'request');
		$pprtar = JRequest :: getString('prtar', '', 'request');
		$poptionals = JRequest :: getString('optionals', '', 'request');
		$ptotdue = JRequest :: getString('totdue', '', 'request');
		$pplace = JRequest :: getString('place', '', 'request');
		$preturnplace = JRequest :: getString('returnplace', '', 'request');
		$pgpayid = JRequest :: getString('gpayid', '', 'request');
		$ppriceid = JRequest :: getString('priceid', '', 'request');
		$phourly = JRequest :: getString('hourly', '', 'request');
		$pitemid = JRequest :: getInt('Itemid', '', 'request');
		$validtoken = false;
		if (vikrentcar :: tokenForm()) {
			$pviktoken = JRequest :: getString('viktoken', '', 'request');
			session_start();
			if (!empty ($pviktoken) && $_SESSION['vikrtoken'] == $pviktoken) {
				unset ($_SESSION['vikrtoken']);
				$validtoken = true;
			}
		} else {
			$validtoken = true;
		}
		if ($validtoken) {
			$q = "SELECT * FROM `#__vikrentcar_custfields` ORDER BY `#__vikrentcar_custfields`.`ordering` ASC;";
			$dbo->setQuery($q);
			$dbo->Query($q);
			$cfields = $dbo->getNumRows() > 0 ? $dbo->loadAssocList() : "";
			$suffdata = true;
			$useremail = "";
			if (@ is_array($cfields)) {
				foreach ($cfields as $cf) {
					if (intval($cf['required']) == 1 && $cf['type'] != 'separator') {
						$tmpcfval = JRequest :: getString('vrcf' . $cf['id'], '', 'request');
						if (strlen(str_replace(" ", "", trim($tmpcfval))) <= 0) {
							$suffdata = false;
							break;
						}
					}
				}
				//save user email and create custdata array
				$arrcustdata = array ();
				$nextorderdata = array();
				$nextorderdata['customfields'] = array();
				$emailwasfound = false;
				foreach ($cfields as $cf) {
					if (intval($cf['isemail']) == 1 && $emailwasfound == false) {
						$useremail = trim(JRequest :: getString('vrcf' . $cf['id'], '', 'request'));
						$emailwasfound = true;
					}
					if($cf['type'] != 'separator') {
						$arrcustdata[JText :: _($cf['name'])] = JRequest :: getString('vrcf' . $cf['id'], '', 'request');
						$nextorderdata['customfields'][$cf['id']] = JRequest :: getString('vrcf' . $cf['id'], '', 'request');
					}
				}
				//
			}
			if ($suffdata == true) {
				//vikrentitems 1.2 Customer Data for Next Order
				$currentUser = JFactory::getUser();
				if (!empty($currentUser->id) && intval($currentUser->id) > 0) {
					$storenextdata = json_encode($nextorderdata);
					$q="SELECT `id` FROM `#__vikrentcar_usersdata` WHERE `ujid`='".(int)$currentUser->id."';";
					$dbo->setQuery($q);
					$dbo->Query($q);
					if ($dbo->getNumRows() > 0) {
						$oldnextid = $dbo->loadAssocList();
						$q="UPDATE `#__vikrentcar_usersdata` SET `data`=".$dbo->quote($storenextdata)." WHERE `id`='".(int)$oldnextid[0]['id']."';";
					}else {
						$q="INSERT INTO `#__vikrentcar_usersdata` (`ujid`,`data`) VALUES('".(int)$currentUser->id."', ".$dbo->quote($storenextdata).");";
					}
					$dbo->setQuery($q);
					$dbo->Query($q);
				}
				//
				//vikrentcar 1.6 for dayValidTs()
				if(strlen($porigdays) > 0) {
					$calcdays = $pdays;
					$pdays = $porigdays;
				}else {
					$calcdays = $pdays;
				}
				//
				if (vikrentcar :: dayValidTs($pdays, $ppickup, $prelease)) {
					$currencyname = vikrentcar :: getCurrencyName();
					//vikrentcar 1.5
					if(intval($phourly) > 0) {
						$q = "SELECT * FROM `#__vikrentcar_dispcosthours` WHERE `id`=" . $dbo->quote($pprtar) . " AND `idcar`=" . $dbo->quote($pcar) . " AND `hours`=" . $dbo->quote($phourly) . ";";
						$usedhourly = true;
					}else {
						//vikrentcar 1.6 for extra hours charges
						if(strlen($porigdays) > 0) {
							$q = "SELECT * FROM `#__vikrentcar_dispcost` WHERE `id`=" . $dbo->quote($pprtar) . " AND `idcar`=" . $dbo->quote($pcar) . " AND `days`=" . $dbo->quote($calcdays) . ";";
						}else {
							$q = "SELECT * FROM `#__vikrentcar_dispcost` WHERE `id`=" . $dbo->quote($pprtar) . " AND `idcar`=" . $dbo->quote($pcar) . " AND `days`=" . $dbo->quote($pdays) . ";";
						}
						//
						$usedhourly = false;
					}
					//
					$dbo->setQuery($q);
					$dbo->Query($q);
					if ($dbo->getNumRows() == 1) {
						$tar = $dbo->loadAssocList();
						//vikrentcar 1.5
						if($usedhourly) {
							foreach($tar as $kt => $vt) {
								$tar[$kt]['days'] = 1;
							}
						}
						//
						//vikrentcar 1.6
						$secdiff = $prelease - $ppickup;
						$daysdiff = $secdiff / 86400;
						if (is_int($daysdiff)) {
							if ($daysdiff < 1) {
								$daysdiff = 1;
							}
						}else {
							if ($daysdiff < 1) {
								$daysdiff = 1;
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
									$ehours = intval(round(($newdiff - $maxhmore) / 3600));
									$checkhourscharges = $ehours;
									if($checkhourscharges > 0) {
										$aehourschbasp = vikrentcar::applyExtraHoursChargesBasp();
									}
								}
							}
						}
						if($checkhourscharges > 0 && $aehourschbasp == true) {
							$ret = vikrentcar::applyExtraHoursChargesCar($tar, $pcar, $checkhourscharges, $daysdiff, false, true, true);
							$tar = $ret['return'];
							$calcdays = $ret['days'];
						}
						if($checkhourscharges > 0 && $aehourschbasp == false) {
							$tar = vikrentcar::extraHoursSetPreviousFareCar($tar, $pcar, $checkhourscharges, $daysdiff, true);
							$tar = vikrentcar::applySeasonsCar($tar, $ppickup, $prelease, $pplace);
							$ret = vikrentcar::applyExtraHoursChargesCar($tar, $pcar, $checkhourscharges, $daysdiff, true, true, true);
							$tar = $ret['return'];
							$calcdays = $ret['days'];
						}else {
							$tar = vikrentcar :: applySeasonsCar($tar, $ppickup, $prelease, $pplace);
						}
						//
						$isdue = vikrentcar :: sayCostPlusIva($tar[0]['cost'], $tar[0]['idprice']);
						$optstr = "";
						$optarrtaxnet = array();
						if (!empty ($poptionals)) {
							$stepo = explode(";", $poptionals);
							foreach ($stepo as $oo) {
								if (!empty ($oo)) {
									$stept = explode(":", $oo);
									$q = "SELECT * FROM `#__vikrentcar_optionals` WHERE `id`=" . $dbo->quote($stept[0]) . ";";
									$dbo->setQuery($q);
									$dbo->Query($q);
									if ($dbo->getNumRows() == 1) {
										$actopt = $dbo->loadAssocList();
										$realcost = (intval($actopt[0]['perday']) == 1 ? ($actopt[0]['cost'] * $pdays * $stept[1]) : ($actopt[0]['cost'] * $stept[1]));
										if (!empty($actopt[0]['maxprice']) && $actopt[0]['maxprice'] > 0 && $realcost > $actopt[0]['maxprice']) {
											$realcost = $actopt[0]['maxprice'];
											if(intval($actopt[0]['hmany']) == 1 && intval($stept[1]) > 1) {
												$realcost = $actopt[0]['maxprice'] * $stept[1];
											}
										}
										$tmpopr = vikrentcar :: sayOptionalsPlusIva($realcost, $actopt[0]['idiva']);
										$isdue += $tmpopr;
										$optnetprice = vikrentcar :: sayOptionalsMinusIva($realcost, $actopt[0]['idiva']);
										$optarrtaxnet[] = $optnetprice;
										$optstr .= ($stept[1] > 1 ? $stept[1] . " " : "") . $actopt[0]['name'] . ": " . $tmpopr . " " . $currencyname . "\n";
									}
								}
							}
						}
						$maillocfee = "";
						$locfeewithouttax = 0;
						$validlocations = true;
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
								$locfeewith = vikrentcar :: sayLocFeePlusIva($locfeecost, $locfee['idiva']);
								$isdue += $locfeewith;
								$locfeewithouttax = vikrentcar::sayLocFeeMinusIva($locfeecost, $locfee['idiva']);
								$maillocfee = $locfeewith;
							}
							//check valid locations
							$q = "SELECT `id`,`idplace`,`idretplace` FROM `#__vikrentcar_cars` WHERE `id`=" . $dbo->quote($pcar) . ";";
							$dbo->setQuery($q);
							$dbo->Query($q);
							$infoplaces = $dbo->loadAssocList();
							if(!empty($infoplaces[0]['idplace']) && !empty($infoplaces[0]['idretplace'])) {
								$actplaces = explode(";", $infoplaces[0]['idplace']);
								$actretplaces = explode(";", $infoplaces[0]['idretplace']);
								if (!in_array($pplace, $actplaces) || !in_array($preturnplace, $actretplaces)) {
									$validlocations = false;
								}
							}
							//
						}
						//vikrentcar 1.6
						$origtotdue = $isdue;
						$usedcoupon = false;
						if(strlen($pcouponcode) > 0) {
							$coupon = vikrentcar::getCouponInfo($pcouponcode);
							if(is_array($coupon)) {
								$coupondateok = true;
								if(strlen($coupon['datevalid']) > 0) {
									$dateparts = explode("-", $coupon['datevalid']);
									$pickinfo = getdate($ppickup);
									$dropinfo = getdate($prelease);
									$coupondescuento = $coupon['value'];
									echo("<script>console.log('en consola');</script>");
									$checkpick = mktime(0, 0, 0, $pickinfo['mon'], $pickinfo['mday'], $pickinfo['year']);
									$checkdrop = mktime(0, 0, 0, $dropinfo['mon'], $dropinfo['mday'], $dropinfo['year']);
									if(!($checkpick >= $dateparts[0] && $checkpick <= $dateparts[1] && $checkdrop >= $dateparts[0] && $checkdrop <= $dateparts[1])) {
										$coupondateok = false;
									}
								}
								if($coupondateok == true) {
									$couponcarok = true;
									if($coupon['allvehicles'] == 0) {
										if(!(preg_match("/;".$pcar.";/i", $coupon['idcars']))) {
											$couponcarok = false;
										}
									}
									if($couponcarok == true) {
										$coupontotok = true;
										if(strlen($coupon['mintotord']) > 0) {
											if($isdue < $coupon['mintotord']) {
												$coupontotok = false;
											}
										}
										if($coupontotok == true) {
											$usedcoupon = true;
											if($coupon['percentot'] == 1) {
												//percent value
												$minuscoupon = 100 - $coupon['value'];
												$coupondiscount = $isdue * $coupon['value'] / 100;
												$isdue = $isdue * $minuscoupon / 100;
											}else {
												//total value
												$coupondiscount = $coupon['value'];
												$isdue = $isdue - $coupon['value'];
											}
											$strcouponeff = $coupon['id'].';'.$coupondiscount.';'.$coupon['code'];
										}
									}
								}
							}

						}
						//
						$strisdue = number_format($isdue, 2)."vikrentcar";
						$ptotdue = number_format($ptotdue, 2)."vikrentcar";

						if ($strisdue == $ptotdue) {
							$nowts = time();
							if ($nowts < $ppickup && $nowts < $prelease && $ppickup < $prelease) {
								if($validlocations == true) {
									$q = "SELECT `units` FROM `#__vikrentcar_cars` WHERE `id`=" . $dbo->quote($pcar) . ";";
									$dbo->setQuery($q);
									$dbo->Query($q);
									$units = $dbo->loadResult();
									if (vikrentcar :: carNotLocked($pcar, $units, $ppickup, $prelease)) {
										if (vikrentcar :: carBookable($pcar, $units, $ppickup, $prelease)) {
											//vikrentcar 1.6 restore $pdays to the actual days used
											if(strlen($porigdays) > 0) {
												$pdays = $calcdays;
											}
											//
											$sid = vikrentcar :: getSecretLink();
											$custdata = vikrentcar :: buildCustData($arrcustdata, "\n");
											$viklink = JURI :: root() . "index.php?option=com_vikrentcar&task=vieworder&sid=" . $sid . "&ts=" . $nowts . (!empty ($pitemid) ? "&Itemid=" . $pitemid : "");
											$admail = vikrentcar :: getAdminMail();
											$ftitle = vikrentcar :: getFrontTitle();
											$carinfo = vikrentcar :: getCarInfo($pcar);
											$costplusiva = vikrentcar :: sayCostPlusIva($tar[0]['cost'], $tar[0]['idprice']);
											$costminusiva = vikrentcar :: sayCostMinusIva($tar[0]['cost'], $tar[0]['idprice']);
											$pricestr = vikrentcar :: getPriceName($tar[0]['idprice']) . ": " . $costplusiva . (!empty ($tar[0]['attrdata']) ? " " . $currencyname . "\n" . vikrentcar :: getPriceAttr($tar[0]['idprice']) . ": " . $tar[0]['attrdata'] : "");
											$ritplace = (!empty ($pplace) ? vikrentcar :: getPlaceName($pplace) : "");
											$consegnaplace = (!empty ($preturnplace) ? vikrentcar :: getPlaceName($preturnplace) : "");
											$currentUser = JFactory::getUser();
											$arrayinfopdf = array('days' => $pdays, 'tarminusiva' => $costminusiva, 'tartax' => ($costplusiva - $costminusiva), 'opttaxnet' => $optarrtaxnet, 'locfeenet' => $locfeewithouttax);
											//VRC 1.7 Rev.2
											$session =& JFactory::getSession();
											$locationvat = $session->get('vrcLocationTaxRate', '');
											//unset session vals for mod_vikrentcar_itinerary
											$session->set('vrcpickupts', '');
											$session->set('vrcplace', '');
											$clienteArray = preg_split( "/[:\n]/", $custdata);
											$nombre = $clienteArray[1];
											$apellidos = $clienteArray[3];
											//
											if (vikrentcar :: areTherePayments()) {
												$payment = vikrentcar :: getPayment($pgpayid);
												$realback = vikrentcar :: getHoursCarAvail() * 3600;
												$realback += $prelease;
												if (is_array($payment)) {
													if (intval($payment['setconfirmed']) == 1) {
														$q = "INSERT INTO `#__vikrentcar_busy` (`idcar`,`ritiro`,`consegna`,`realback`) VALUES(" . $dbo->quote($pcar) . ", " . $dbo->quote($ppickup) . ", " . $dbo->quote($prelease) . ",'" . $realback . "');";
														$dbo->setQuery($q);
														$dbo->Query($q);
														$lid = $dbo->insertid();
														$q = "INSERT INTO `#__vikrentcar_orders` (`idbusy`,`custdata`,`ts`,`status`,`idcar`,`days`,`ritiro`,`consegna`,`idtar`,`optionals`,`custmail`,`sid`,`idplace`,`idreturnplace`,`totpaid`,`idpayment`,`ujid`,`hourly`,`coupon`,`order_total`,`locationvat`) VALUES('" . $lid . "', " . $dbo->quote($custdata) . ",'" . $nowts . "','confirmed'," . $dbo->quote($pcar) . "," . $dbo->quote($pdays) . "," . $dbo->quote($ppickup) . "," . $dbo->quote($prelease) . "," . $dbo->quote($pprtar) . "," . $dbo->quote($poptionals) . "," . $dbo->quote($useremail) . ",'" . $sid . "'," . $dbo->quote($pplace) . "," . $dbo->quote($preturnplace) . "," . $dbo->quote($isdue) . "," . $dbo->quote($payment['id'] . '=' . $payment['name']) . ",'".$currentUser->id."','".($usedhourly ? "1" : "0")."', ".$dbo->quote($strcouponeff).", '".$isdue."', ".(strlen($locationvat) > 0 ? "'".$locationvat."'" : "null").");";
														$dbo->setQuery($q);
														$dbo->Query($q);
														$neworderid = $dbo->insertid();
														if($usedcoupon == true && $coupon['type'] == 2) {
															$q="DELETE FROM `#__vikrentcar_coupons` WHERE `id`='".$coupon['id']."';";
															$dbo->setQuery($q);
															$dbo->Query($q);
														}
														vikrentcar :: sendAdminMail($admail.';;'.$useremail, JText :: _('VRORDNOL').' de '.$nombre.' '.$apellidos, $ftitle, $nowts, $custdata, $carinfo['name'], $ppickup, $prelease, $pricestr, $optstr, $isdue, JText :: _('VRCOMPLETED'), $ritplace, $consegnaplace, $maillocfee, $payment['name'], $strcouponeff);
														vikrentcar :: sendCustMail($useremail, strip_tags($ftitle) . " " . JText :: _('VRORDNOL'), $ftitle, $nowts, $custdata, $carinfo['name'], $ppickup, $prelease, $pricestr, $optstr, $isdue, $viklink, JText :: _('VRCOMPLETED'), $ritplace, $consegnaplace, $maillocfee, $neworderid, $strcouponeff, $arrayinfopdf);
														$mainframe = & JFactory :: getApplication();
														$mainframe->redirect("index.php?option=com_vikrentcar&task=vieworder&sid=" . $sid . "&ts=" . $nowts . (!empty ($pitemid) ? "&Itemid=" . $pitemid : ""));
													} else {
														$q = "INSERT INTO `#__vikrentcar_orders` (`custdata`,`ts`,`status`,`idcar`,`days`,`ritiro`,`consegna`,`idtar`,`optionals`,`custmail`,`sid`,`idplace`,`idreturnplace`,`idpayment`,`ujid`,`hourly`,`coupon`,`order_total`,`locationvat`) VALUES(" . $dbo->quote($custdata) . ",'" . $nowts . "','standby'," . $dbo->quote($pcar) . "," . $dbo->quote($pdays) . "," . $dbo->quote($ppickup) . "," . $dbo->quote($prelease) . "," . $dbo->quote($pprtar) . "," . $dbo->quote($poptionals) . "," . $dbo->quote($useremail) . ",'" . $sid . "'," . $dbo->quote($pplace) . "," . $dbo->quote($preturnplace) . "," . $dbo->quote($payment['id'] . '=' . $payment['name']) . ",'".$currentUser->id."','".($usedhourly ? "1" : "0")."', ".$dbo->quote($strcouponeff).", '".$isdue."', ".(strlen($locationvat) > 0 ? "'".$locationvat."'" : "null").");";
														$dbo->setQuery($q);
														$dbo->Query($q);
														$neworderid = $dbo->insertid();
														if($usedcoupon == true && $coupon['type'] == 2) {
															$q="DELETE FROM `#__vikrentcar_coupons` WHERE `id`='".$coupon['id']."';";
															$dbo->setQuery($q);
															$dbo->Query($q);
														}
														$q = "INSERT INTO `#__vikrentcar_tmplock` (`idcar`,`ritiro`,`consegna`,`until`,`realback`) VALUES(" . $dbo->quote($pcar) . "," . $dbo->quote($ppickup) . "," . $dbo->quote($prelease) . ",'" . vikrentcar :: getMinutesLock(true) . "','" . $realback . "');";
														$dbo->setQuery($q);
														$dbo->Query($q);
														vikrentcar :: sendAdminMail('info@carflet.es'.';;'.$useremail, JText :: _('VRORDNOL').' de '.$nombre.' '.$apellidos, $ftitle, $nowts, $custdata, $carinfo['name'], $ppickup, $prelease, $pricestr, $optstr, $isdue, JText :: _('VRINATTESA'), $ritplace, $consegnaplace, $maillocfee, $payment['name'], $strcouponeff);
														vikrentcar :: sendCustMail($useremail, strip_tags($ftitle) . " " . JText :: _('VRORDNOL'), $ftitle, $nowts, $custdata, $carinfo['name'], $ppickup, $prelease, $pricestr, $optstr, $isdue, $viklink, JText :: _('VRINATTESA'), $ritplace, $consegnaplace, $maillocfee, $neworderid, $strcouponeff, $arrayinfopdf);
														$mainframe = & JFactory :: getApplication();
														$mainframe->redirect("index.php?option=com_vikrentcar&task=vieworder&sid=" . $sid . "&ts=" . $nowts . (!empty ($pitemid) ? "&Itemid=" . $pitemid : ""));
													}
												} else {
													JError :: raiseWarning('', JText :: _('ERRSELECTPAYMENT'));
													$mainframe = & JFactory :: getApplication();
													$mainframe->redirect("index.php?option=com_vikrentcar&priceid=" . $ppriceid . "&place=" . $pplace . "&returnplace=" . $preturnplace . "&carid=" . $pcar . "&days=" . $pdays . "&pickup=" . $ppickup . "&release=" . $prelease . "&task=oconfirm");
												}
											} else {
												$realback = vikrentcar :: getHoursCarAvail() * 3600;
												$realback += $prelease;
												$q = "INSERT INTO `#__vikrentcar_busy` (`idcar`,`ritiro`,`consegna`,`realback`) VALUES(" . $dbo->quote($pcar) . ", " . $dbo->quote($ppickup) . ", " . $dbo->quote($prelease) . ",'" . $realback . "');";
												$dbo->setQuery($q);
												$dbo->Query($q);
												$lid = $dbo->insertid();
												$q = "INSERT INTO `#__vikrentcar_orders` (`idbusy`,`custdata`,`ts`,`status`,`idcar`,`days`,`ritiro`,`consegna`,`idtar`,`optionals`,`custmail`,`sid`,`idplace`,`idreturnplace`,`totpaid`,`ujid`,`hourly`,`coupon`,`order_total`,`locationvat`) VALUES('" . $lid . "', " . $dbo->quote($custdata) . ",'" . $nowts . "','confirmed'," . $dbo->quote($pcar) . "," . $dbo->quote($pdays) . "," . $dbo->quote($ppickup) . "," . $dbo->quote($prelease) . "," . $dbo->quote($pprtar) . "," . $dbo->quote($poptionals) . "," . $dbo->quote($useremail) . ",'" . $sid . "'," . $dbo->quote($pplace) . "," . $dbo->quote($preturnplace) . "," . $dbo->quote($isdue) . ",'".$currentUser->id."','".($usedhourly ? "1" : "0")."', ".$dbo->quote($strcouponeff).", '".$isdue."', ".(strlen($locationvat) > 0 ? "'".$locationvat."'" : "null").");";
												$dbo->setQuery($q);
												$dbo->Query($q);
												$neworderid = $dbo->insertid();
												if($usedcoupon == true && $coupon['type'] == 2) {
													$q="DELETE FROM `#__vikrentcar_coupons` WHERE `id`='".$coupon['id']."';";
													$dbo->setQuery($q);
													$dbo->Query($q);
												}
												vikrentcar :: sendAdminMail($admail.';;'.$useremail, JText :: _('VRORDNOL').' de '.$nombre.' '.$apellidos, $ftitle, $nowts, $custdata, $carinfo['name'], $ppickup, $prelease, $pricestr, $optstr, $isdue, JText :: _('VRCOMPLETED'), $ritplace, $consegnaplace, $maillocfee, $strcouponeff);
												vikrentcar :: sendCustMail($useremail, strip_tags($ftitle) . " " . JText :: _('VRORDNOL'), $ftitle, $nowts, $custdata, $carinfo['name'], $ppickup, $prelease, $pricestr, $optstr, $isdue, $viklink, JText :: _('VRCOMPLETED'), $ritplace, $consegnaplace, $maillocfee, $neworderid, $strcouponeff, $arrayinfopdf);
												echo vikrentcar :: getFullFrontTitle();
												?>
												<p class="successmade"><?php echo JText::_('VRTHANKSONE'); ?></p>
												<br/>
												<p>&bull; <?php echo JText::_('VRTHANKSTWO'); ?> <a href="<?php echo $viklink; ?>"><?php echo JText::_('VRTHANKSTHREE'); ?></a></p>
												<?php
											}
										} else {
											showSelect(JText :: _('VRCARBOOKEDBYOTHER'));
										}
									} else {
										showSelect(JText :: _('VRCARISLOCKED'));
									}
								}else {
									showSelect(JText :: _('VRINVALIDLOCATIONS'));
								}
							} else {
								showSelect(JText :: _('VRINVALIDDATES'));
							}
						} else {
							showSelect(JText :: _('VRINCONGRTOT'));
						}
					} else {
						showSelect(JText :: _('VRINCONGRDATAREC'));
					}
				} else {
					showSelect(JText :: _('VRINCONGRDATA'));
				}
			} else {
				showSelect(JText :: _('VRINSUFDATA'));
			}
		} else {
			showSelect(JText :: _('VRINVALIDTOKEN'));
		}
	}

	function vieworder() {
		$sid = JRequest :: getString('sid', '', 'request');
		$ts = JRequest :: getString('ts', '', 'request');
		if (!empty ($sid) && !empty ($ts)) {
			$dbo = & JFactory :: getDBO();
			$q = "SELECT * FROM `#__vikrentcar_orders` WHERE `sid`=" . $dbo->quote($sid) . " AND `ts`=" . $dbo->quote($ts) . ";";
			$dbo->setQuery($q);
			$dbo->Query($q);
			if ($dbo->getNumRows() == 1) {
				$order = $dbo->loadAssocList();
				if ($order[0]['status'] == "confirmed") {
					JRequest :: setVar('view', 'confirmedorder');
					parent :: display();
				} else {
					$q = "SELECT `units` FROM `#__vikrentcar_cars` WHERE `id`='" . $order[0]['idcar'] . "';";
					$dbo->setQuery($q);
					$dbo->Query($q);
					$cunits = $dbo->loadResult();
					$caravail = vikrentcar :: carBookable($order[0]['idcar'], $cunits, $order[0]['ritiro'], $order[0]['consegna']);
					if (time() > $order[0]['ritiro']) {
						$caravail = false;
					}
					if ($caravail == true) {
						//SHOW PAYMENT FORM
						JRequest :: setVar('view', 'standbyorder');
						parent :: display();
					} else {
						$q = "DELETE FROM `#__vikrentcar_orders` WHERE `id`='" . $order[0]['id'] . "' LIMIT 1;";
						$dbo->setQuery($q);
						$dbo->Query($q);
						if(!empty($order[0]['idbusy'])) {
							$q="DELETE FROM `#__vikrentcar_busy` WHERE `id`='" . $order[0]['idbusy'] . "' LIMIT 1;";
							$dbo->setQuery($q);
							$dbo->Query($q);
						}
						if (time() > $order[0]['ritiro']) {
							showSelect("");
						} else {
							showSelect(JText :: _('VRERRREPSEARCH'));
						}
					}
				}
			} else {
				showSelect(JText :: _('VRORDERNOTFOUND'));
			}
		} else {
			showSelect(JText :: _('VRINSUFDATA'));
		}
	}

	function cancelrequest() {
		$psid = JRequest :: getString('sid', '', 'request');
		$pidorder = JRequest :: getString('idorder', '', 'request');
		$dbo = & JFactory :: getDBO();
		if (!empty($psid) && !empty($pidorder)) {
			$q = sprintf("SELECT * FROM `#__vikrentcar_orders` WHERE `id`='%d' AND `sid`=".$dbo->quote($psid).";", $pidorder);
			$dbo->setQuery($q);
			$dbo->Query($q);
			if ($dbo->getNumRows() == 1) {
				$order = $dbo->loadAssocList();
				$pemail = JRequest :: getString('email', '', 'request');
				$preason = JRequest :: getString('reason', '', 'request');
				if (!empty($pemail) && !empty($preason)) {
					$to = vikrentcar::getAdminMail();
					$subject = JText::_('VRCCANCREQUESTEMAILSUBJ');
					$subject = '=?UTF-8?B?' . base64_encode($subject) . '?=';
					$msg = JText::sprintf('VRCCANCREQUESTEMAILHEAD', $order[0]['id'], JURI::root().'index.php?option=com_vikrentcar&task=vieworder&sid='.$order[0]['sid'].'&ts='.$order[0]['ts'])."\n\n".$preason;
					$mailer =& JFactory::getMailer();
					$sender = array($pemail, $pemail);
					$mailer->setSender($sender);
					$mailer->addRecipient($to);
					$mailer->addReplyTo($pemail);
					$mailer->setSubject($subject);
					$mailer->setBody($msg);
					$mailer->isHTML(false);
					$mailer->Encoding = 'base64';
					$mailer->Send();
					$app =& JFactory::getApplication();
					$app->enqueueMessage(JText::_('VRCCANCREQUESTMAILSENT'));
					$mainframe = & JFactory :: getApplication();
					$mainframe->redirect("index.php?option=com_vikrentcar&task=vieworder&sid=".$order[0]['sid']."&ts=".$order[0]['ts']."&Itemid=".JRequest::getString('Itemid', '', 'request'));
				}else {
					$mainframe = & JFactory :: getApplication();
					$mainframe->redirect("index.php?option=com_vikrentcar&task=vieworder&sid=".$order[0]['sid']."&ts=".$order[0]['ts']);
				}
			}else {
				$mainframe = & JFactory :: getApplication();
				$mainframe->redirect("index.php");
			}
		}else {
			$mainframe = & JFactory :: getApplication();
			$mainframe->redirect("index.php");
		}
	}

	function notifypayment() {
		$psid = JRequest :: getString('sid', '', 'request');
		$pts = JRequest :: getString('ts', '', 'request');
		$dbo = & JFactory :: getDBO();
		$nowdf = vikrentcar :: getDateFormat();
		if ($nowdf == "%d/%m/%Y") {
			$df = 'd/m/Y';
		}elseif ($nowdf == "%m/%d/%Y") {
			$df = 'm/d/Y';
		}else {
			$df = 'Y/m/d';
		}
		if (strlen($psid) && strlen($pts)) {
			$admail = vikrentcar :: getAdminMail();
			$q = "SELECT * FROM `#__vikrentcar_orders` WHERE `ts`=" . $dbo->quote($pts) . " AND `sid`=" . $dbo->quote($psid) . ";";
			$dbo->setQuery($q);
			$dbo->Query($q);
			if ($dbo->getNumRows() > 0) {
				$rows = $dbo->loadAssocList();
				if($rows[0]['status']!='confirmed') {
					$rows[0]['admin_email'] = $admail;
					$exppay = explode('=', $rows[0]['idpayment']);
					$payment = vikrentcar :: getPayment($exppay[0]);
					require_once(JPATH_ADMINISTRATOR . DS ."components". DS ."com_vikrentcar". DS . "payments" . DS . $payment['file']);
					$obj = new vikRentCarPayment($rows[0], json_decode($payment['params'], true));
					$array_result = $obj->validatePayment();
					if ($array_result['verified'] == 1) {
						//valid payment
						$ritplace = (!empty ($rows[0]['idplace']) ? vikrentcar :: getPlaceName($rows[0]['idplace']) : "");
						$consegnaplace = (!empty ($rows[0]['idreturnplace']) ? vikrentcar :: getPlaceName($rows[0]['idreturnplace']) : "");
						$realback = vikrentcar :: getHoursCarAvail() * 3600;
						$realback += $rows[0]['consegna'];
						//send mails
						$ftitle = vikrentcar :: getFrontTitle();
						$nowts = time();
						$carinfo = vikrentcar :: getCarInfo($rows[0]['idcar']);
						$viklink = JURI :: root() . "index.php?option=com_vikrentcar&task=vieworder&sid=" . $psid . "&ts=" . $pts;
						//vikrentcar 1.5
						if($rows[0]['hourly'] == 1) {
							$q = "SELECT * FROM `#__vikrentcar_dispcosthours` WHERE `id`='" . $rows[0]['idtar'] . "';";
						}else {
							$q = "SELECT * FROM `#__vikrentcar_dispcost` WHERE `id`='" . $rows[0]['idtar'] . "';";
						}
						//
						$dbo->setQuery($q);
						$dbo->Query($q);
						$tar = $dbo->loadAssocList();
						//vikrentcar 1.5
						if($rows[0]['hourly'] == 1) {
							foreach($tar as $kt => $vt) {
								$tar[$kt]['days'] = 1;
							}
						}
						//
						//vikrentcar 1.6
						$checkhourscharges = 0;
						$hoursdiff = 0;
						$ppickup = $rows[0]['ritiro'];
						$prelease = $rows[0]['consegna'];
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
						if($checkhourscharges > 0 && $aehourschbasp == true) {
							$ret = vikrentcar::applyExtraHoursChargesCar($tar, $rows[0]['idcar'], $checkhourscharges, $daysdiff, false, true, true);
							$tar = $ret['return'];
							$calcdays = $ret['days'];
						}
						if($checkhourscharges > 0 && $aehourschbasp == false) {
							$tar = vikrentcar::extraHoursSetPreviousFareCar($tar, $rows[0]['idcar'], $checkhourscharges, $daysdiff, true);
							$tar = vikrentcar :: applySeasonsCar($tar, $rows[0]['ritiro'], $rows[0]['consegna'], $rows[0]['idplace']);
							$ret = vikrentcar::applyExtraHoursChargesCar($tar, $rows[0]['idcar'], $checkhourscharges, $daysdiff, true, true, true);
							$tar = $ret['return'];
							$calcdays = $ret['days'];
						}else {
							$tar = vikrentcar :: applySeasonsCar($tar, $rows[0]['ritiro'], $rows[0]['consegna'], $rows[0]['idplace']);
						}
						//
						$costplusiva = vikrentcar :: sayCostPlusIva($tar[0]['cost'], $tar[0]['idprice'], $rows[0]);
						$costminusiva = vikrentcar :: sayCostMinusIva($tar[0]['cost'], $tar[0]['idprice'], $rows[0]);
						$pricestr = vikrentcar :: getPriceName($tar[0]['idprice']) . ": " . $costplusiva . (!empty ($tar[0]['attrdata']) ? "\n" . vikrentcar :: getPriceAttr($tar[0]['idprice']) . ": " . $tar[0]['attrdata'] : "");
						$isdue = vikrentcar :: sayCostPlusIva($tar[0]['cost'], $tar[0]['idprice'], $rows[0]);
						$currencyname = vikrentcar :: getCurrencyName();
						$optstr = "";
						$optarrtaxnet = array();
						if (!empty ($rows[0]['optionals'])) {
							$stepo = explode(";", $rows[0]['optionals']);
							foreach ($stepo as $oo) {
								if (!empty ($oo)) {
									$stept = explode(":", $oo);
									$q = "SELECT * FROM `#__vikrentcar_optionals` WHERE `id`=" . $dbo->quote($stept[0]) . ";";
									$dbo->setQuery($q);
									$dbo->Query($q);
									if ($dbo->getNumRows() == 1) {
										$actopt = $dbo->loadAssocList();
										$realcost = (intval($actopt[0]['perday']) == 1 ? ($actopt[0]['cost'] * $rows[0]['days'] * $stept[1]) : ($actopt[0]['cost'] * $stept[1]));
										if (!empty ($actopt[0]['maxprice']) && $actopt[0]['maxprice'] > 0 && $realcost > $actopt[0]['maxprice']) {
											$realcost = $actopt[0]['maxprice'];
											if(intval($actopt[0]['hmany']) == 1 && intval($stept[1]) > 1) {
												$realcost = $actopt[0]['maxprice'] * $stept[1];
											}
										}
										$tmpopr = vikrentcar :: sayOptionalsPlusIva($realcost, $actopt[0]['idiva'], $rows[0]);
										$isdue += $tmpopr;
										$optnetprice = vikrentcar :: sayOptionalsMinusIva($realcost, $actopt[0]['idiva'], $rows[0]);
										$optarrtaxnet[] = $optnetprice;
										$optstr .= ($stept[1] > 1 ? $stept[1] . " " : "") . $actopt[0]['name'] . ": " . $tmpopr . " " . $currencyname . "\n";
									}
								}
							}
						}
						$maillocfee = "";
						$locfeewithouttax = 0;
						if (!empty ($rows[0]['idplace']) && !empty ($rows[0]['idreturnplace'])) {
							$locfee = vikrentcar :: getLocFee($rows[0]['idplace'], $rows[0]['idreturnplace']);
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
									if (array_key_exists($rows[0]['days'], $arrvaloverrides)) {
										$locfee['cost'] = $arrvaloverrides[$rows[0]['days']];
									}
								}
								//end VikRentCar 1.7 - Location fees overrides
								$locfeecost = intval($locfee['daily']) == 1 ? ($locfee['cost'] * $rows[0]['days']) : $locfee['cost'];
								$locfeewith = vikrentcar :: sayLocFeePlusIva($locfeecost, $locfee['idiva'], $rows[0]);
								$isdue += $locfeewith;
								$locfeewithouttax = vikrentcar::sayLocFeeMinusIva($locfeecost, $locfee['idiva'], $rows[0]);
								$maillocfee = $locfeewith;
							}
						}
						//vikrentcar 1.6 coupon
						$usedcoupon = false;
						$origisdue = $isdue;
						if(strlen($rows[0]['coupon']) > 0) {
							$usedcoupon = true;
							$expcoupon = explode(";", $rows[0]['coupon']);
							$isdue = $isdue - $expcoupon[1];
						}
						//
						$shouldpay = $isdue;
						if ($payment['charge'] > 0.00) {
							if($payment['ch_disc'] == 1) {
								//charge
								if($payment['val_pcent'] == 1) {
									//fixed value
									$shouldpay += $payment['charge'];
								}else {
									//percent value
									$percent_to_pay = $shouldpay * $payment['charge'] / 100;
									$shouldpay += $percent_to_pay;
								}
							}else {
								//discount
								if($payment['val_pcent'] == 1) {
									//fixed value
									$shouldpay -= $payment['charge'];
								}else {
									//percent value
									$percent_to_pay = $shouldpay * $payment['charge'] / 100;
									$shouldpay -= $percent_to_pay;
								}
							}
						}
						if (!vikrentcar :: payTotal()) {
							$percentdeposit = vikrentcar :: getAccPerCent();
							if ($percentdeposit > 0) {
								$shouldpay = $shouldpay * $percentdeposit / 100;
							}
						}
						//check if the total amount paid is the same as the total order
						if(array_key_exists('tot_paid', $array_result)) {
							$shouldpay = round($shouldpay, 2);
							$totreceived = round($array_result['tot_paid'], 2);
							if($shouldpay != $totreceived) {
								//the amount paid is different than the total order
								//fares might have changed or the deposit might be different
								//Sending just an email to the admin that will check
								$mailer =& JFactory::getMailer();
								$sender = array($admail, $admail);
								$mailer->setSender($sender);
								$mailer->addRecipient($admail);
								$mailer->addReplyTo($admail);
								$mailer->setSubject(JText :: _('VRCTOTPAYMENTINVALID'));
								$mailer->setBody(JText::sprintf('VRCTOTPAYMENTINVALIDTXT', $rows[0]['id'], $totreceived." (".$array_result['tot_paid'].")", $shouldpay));
								$mailer->isHTML(false);
								$mailer->Encoding = 'base64';
								$mailer->Send();
							}
						}
						//
						$arrayinfopdf = array('days' => $rows[0]['days'], 'tarminusiva' => $costminusiva, 'tartax' => ($costplusiva - $costminusiva), 'opttaxnet' => $optarrtaxnet, 'locfeenet' => $locfeewithouttax, 'order_id' => $rows[0]['id'], 'tot_paid' => $array_result['tot_paid']);
						$q = "INSERT INTO `#__vikrentcar_busy` (`idcar`,`ritiro`,`consegna`,`realback`) VALUES('" . $rows[0]['idcar'] . "','" . $rows[0]['ritiro'] . "','" . $rows[0]['consegna'] . "','" . $realback . "');";
						$dbo->setQuery($q);
						$dbo->Query($q);
						$busynow = $dbo->insertid();
						$q = "UPDATE `#__vikrentcar_orders` SET `status`='confirmed', `idbusy`='" . $busynow . "'" . ($array_result['tot_paid'] ? ", `totpaid`=" . $dbo->quote($array_result['tot_paid']) : "") . " WHERE `id`='" . $rows[0]['id'] . "';";
						$dbo->setQuery($q);
						$dbo->Query($q);
						$clienteArray = preg_split( "/[:\n]/", $rows[0]['custdata']);
						$nombre = $clienteArray[1];
						$apellidos = $clienteArray[3];
						vikrentcar :: sendAdminMail($admail.';;'.$rows[0]['custmail'], JText :: _('VRRENTALORD') .' de '.$nombre.' '.$apellidos, $ftitle, $nowts, $rows[0]['custdata'], $carinfo['name'], $rows[0]['ritiro'], $rows[0]['consegna'], $pricestr, $optstr, $isdue, JText :: _('VRCOMPLETED'), $ritplace, $consegnaplace, $maillocfee, $payment['name'], $rows[0]['coupon']);
						vikrentcar :: sendCustMail($rows[0]['custmail'], strip_tags($ftitle) . " " . JText :: _('VRRENTALORD'), $ftitle, $nowts, $rows[0]['custdata'], $carinfo['name'], $rows[0]['ritiro'], $rows[0]['consegna'], $pricestr, $optstr, $isdue, $viklink, JText :: _('VRCOMPLETED'), $ritplace, $consegnaplace, $maillocfee, $rows[0]['id'], $rows[0]['coupon'], $arrayinfopdf);

						if(method_exists($obj, 'afterValidation')) {
							$obj->afterValidation(1);
						}

						//AQUI LA CONEXION MONGO


					} else {
						$mailer =& JFactory::getMailer();
						$sender = array($admail, $admail);
						$mailer->setSender($sender);
						$mailer->addRecipient($admail);
						$mailer->addReplyTo($admail);
						$mailer->setSubject(JText :: _('VRPAYMENTNOTVER'));
						$mailer->setBody(JText :: _('VRSERVRESP') . ":\n\n" . $array_result['log']);
						$mailer->isHTML(false);
						$mailer->Encoding = 'base64';
						$mailer->Send();
						if(method_exists($obj, 'afterValidation')) {
							$obj->afterValidation(0);
						}
					}
				}
			}
		}
		exit;
		return true;
	}

	function ajaxlocopentime() {
		$pidloc = JRequest :: getInt('idloc', '', 'request');
		$ppickdrop = JRequest :: getString('pickdrop', '', 'request');
		$dbo = & JFactory :: getDBO();
		$ret = array();
		$q="SELECT `opentime` FROM `#__vikrentcar_places` WHERE `id`='".$pidloc."';";
		$dbo->setQuery($q);
		$dbo->Query($q);
		$opentime = $dbo->loadResult();
		if(strlen($opentime) > 0) {
			//load location time
			$parts = explode("-", $opentime);
			$opent=vikrentcar::getHoursMinutes($parts[0]);
			$closet=vikrentcar::getHoursMinutes($parts[1]);
			if ($opent != $closet) {
				$i = $opent[0];
				$imin = $opent[1];
				$j = $closet[0];
			}else {
				$i = 0;
				$imin = 0;
				$j = 23;
			}
		}else {
			//load global time
			$timeopst = vikrentcar :: getTimeOpenStore();
			if (is_array($timeopst) && $timeopst[0] != $timeopst[1]) {
				$opent = vikrentcar :: getHoursMinutes($timeopst[0]);
				$closet = vikrentcar :: getHoursMinutes($timeopst[1]);
				$i = $opent[0];
				$imin = $opent[1];
				$j = $closet[0];
			}else {
				$i = 0;
				$imin = 0;
				$j = 23;
			}
		}
		$hours = "";
		while ($i <= $j) {
			if ($i < 10) {
				$i = "0" . $i;
			} else {
				$i = $i;
			}
			$hours .= "<option value=\"" . $i . "\">" . $i . "</option>\n";
			$i++;
		}
		$minutes = "";
		for ($i = 0; $i < 60; $i += 15) {
			if ($i < 10) {
				$i = "0" . $i;
			} else {
				$i = $i;
			}
			$minutes .= "<option value=\"" . $i . "\"".((int)$i == $imin ? " selected=\"selected\"" : "").">" . $i . "</option>\n";
		}
		$suffix = $ppickdrop == 'pickup' ? 'pickup' : 'release';

		$ret['hours'] = '<select name="'.$suffix.'h">'.$hours.'</select>';
		$ret['minutes'] = '<select name="'.$suffix.'m">'.$minutes.'</select>';

		echo json_encode($ret);
		exit;
	}

}
?>
