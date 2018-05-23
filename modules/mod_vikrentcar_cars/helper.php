<?php
/**------------------------------------------------------------------------
 * mod_vikrentcar_cars - VikRentCar
 * ------------------------------------------------------------------------
 * author    Alessio Gaggii - Extensionsforjoomla.com
 * copyright Copyright (C) 2013 extensionsforjoomla.com. All Rights Reserved.
 * @license - http://www.gnu.org/licenses/gpl-2.0.html GNU/GPL
 * Websites: http://www.extensionsforjoomla.com
 * Technical Support:  tech@extensionsforjoomla.com
 * ------------------------------------------------------------------------
*/

// no direct access
defined('_JEXEC') or die;

class modvikrentcar_carsHelper {
	static function getCars($params) {
		$dbo = & JFactory :: getDBO();
		$showcatname = intval($params->get('showcatname')) == 1 ? true : false;
		$cars = array();
		$query = $params->get('query');
		if($query == 'price') {
			//simple order by price asc
			$q = "SELECT `id`,`name`,`img`,`idcat`,`startfrom` FROM `#__vikrentcar_cars` WHERE `avail`='1';";
			$dbo->setQuery($q);
			$dbo->Query($q);
			if($dbo->getNumRows() > 0) {
				$cars=$dbo->loadAssocList();
				foreach($cars as $k=>$c) {
					if($showcatname) $cars[$k]['catname'] = self::getCategoryName($c['idcat']);
					if(strlen($c['startfrom']) > 0 && $c['startfrom'] > 0.00) {
						$cars[$k]['cost']=$c['startfrom'];
					}else {
						$q="SELECT `id`,`cost` FROM `#__vikrentcar_dispcost` WHERE `idcar`='".$c['id']."' AND `days`='1' ORDER BY `#__vikrentcar_dispcost`.`cost` ASC LIMIT 1;";
						$dbo->setQuery($q);
						$dbo->Query($q);
						if($dbo->getNumRows() == 1) {
							$tar=$dbo->loadAssocList();
							$cars[$k]['cost']=$tar[0]['cost'];
						}else {
							$q="SELECT `id`,`days`,`cost` FROM `#__vikrentcar_dispcost` WHERE `idcar`='".$c['id']."' ORDER BY `#__vikrentcar_dispcost`.`cost` ASC LIMIT 1;";
							$dbo->setQuery($q);
							$dbo->Query($q);
							if($dbo->getNumRows() == 1) {
								$tar=$dbo->loadAssocList();
								$cars[$k]['cost']=($tar[0]['cost'] / $tar[0]['days']);
							}else {
								$cars[$k]['cost']=0;
							}
						}
					}
				}
			}
			$cars = self::sortCarsByPrice($cars, $params);
		}elseif($query == 'name') {
			//order by name
			$q = "SELECT `id`,`name`,`img`,`idcat`,`startfrom` FROM `#__vikrentcar_cars` WHERE `avail`='1' ORDER BY `#__vikrentcar_cars`.`name` ".strtoupper($params->get('order'))." LIMIT ".$params->get('numb').";";
			$dbo->setQuery($q);
			$dbo->Query($q);
			if($dbo->getNumRows() > 0) {
				$cars=$dbo->loadAssocList();
				foreach($cars as $k=>$c) {
					if($showcatname) $cars[$k]['catname'] = self::getCategoryName($c['idcat']);
					if(strlen($c['startfrom']) > 0 && $c['startfrom'] > 0.00) {
						$cars[$k]['cost']=$c['startfrom'];
					}else {
						$q="SELECT `id`,`cost` FROM `#__vikrentcar_dispcost` WHERE `idcar`='".$c['id']."' AND `days`='1' ORDER BY `#__vikrentcar_dispcost`.`cost` ASC LIMIT 1;";
						$dbo->setQuery($q);
						$dbo->Query($q);
						if($dbo->getNumRows() == 1) {
							$tar=$dbo->loadAssocList();
							$cars[$k]['cost']=$tar[0]['cost'];
						}else {
							$q="SELECT `id`,`days`,`cost` FROM `#__vikrentcar_dispcost` WHERE `idcar`='".$c['id']."' ORDER BY `#__vikrentcar_dispcost`.`cost` ASC LIMIT 1;";
							$dbo->setQuery($q);
							$dbo->Query($q);
							if($dbo->getNumRows() == 1) {
								$tar=$dbo->loadAssocList();
								$cars[$k]['cost']=($tar[0]['cost'] / $tar[0]['days']);
							}else {
								$cars[$k]['cost']=0;
							}
						}
					}
				}
			}
		}else {
			//sort by category
			$q = "SELECT `id`,`name`,`img`,`idcat`,`idcarat`,`info`,`startfrom` FROM `#__vikrentcar_cars` WHERE `avail`='1' AND (`idcat`='".$params->get('catid').";' OR `idcat` LIKE '".$params->get('catid').";%' OR `idcat` LIKE '%;".$params->get('catid').";%' OR `idcat` LIKE '%;".$params->get('catid').";') ORDER BY `#__vikrentcar_cars`.`name` ".strtoupper($params->get('order'))." LIMIT ".$params->get('numb').";";
			$dbo->setQuery($q);
			$dbo->Query($q);
			if($dbo->getNumRows() > 0) {
				$cars=$dbo->loadAssocList();
				foreach($cars as $k=>$c) {
					if($showcatname) $cars[$k]['catname'] = self::getCategoryName($c['idcat']);
					if(strlen($c['startfrom']) > 0 && $c['startfrom'] > 0.00) {
						$cars[$k]['cost']=$c['startfrom'];
					}else {
						$q="SELECT `id`,`cost` FROM `#__vikrentcar_dispcost` WHERE `idcar`='".$c['id']."' AND `days`='1' ORDER BY `#__vikrentcar_dispcost`.`cost` ASC LIMIT 1;";
						$dbo->setQuery($q);
						$dbo->Query($q);
						if($dbo->getNumRows() == 1) {
							$tar=$dbo->loadAssocList();
							$cars[$k]['cost']=$tar[0]['cost'];
						}else {
							$q="SELECT `id`,`days`,`cost` FROM `#__vikrentcar_dispcost` WHERE `idcar`='".$c['id']."' ORDER BY `#__vikrentcar_dispcost`.`cost` ASC LIMIT 1;";
							$dbo->setQuery($q);
							$dbo->Query($q);
							if($dbo->getNumRows() == 1) {
								$tar=$dbo->loadAssocList();
								$cars[$k]['cost']=($tar[0]['cost'] / $tar[0]['days']);
							}else {
								$cars[$k]['cost']=0;
							}
						}
					}
				}
			}
			if($params->get('querycat') == 'price') {
				$cars = self::sortCarsByPrice($cars, $params);
			}
		}
		return $cars;
	}
	
	static function sortCarsByPrice($arr, $params) {
		$newarr = array ();
		foreach ($arr as $k => $v) {
			$newarr[$k] = $v['cost'];
		}
		asort($newarr);
		$sorted = array ();
		foreach ($newarr as $k => $v) {
			$sorted[$k] = $arr[$k];
		}
		return $params->get('order') == 'desc' ? array_reverse($sorted) : $sorted;
	}
	
	static function getCategoryName($idcat) {
		$dbo = & JFactory :: getDBO();
		$q = "SELECT `id`,`name` FROM `#__vikrentcar_categories` WHERE `id`='" . str_replace(";", "", $idcat) . "';";
		$dbo->setQuery($q);
		$dbo->Query($q);
		$p = @ $dbo->loadAssocList();
		return $p[0]['name'];
	}
	
	static function limitRes($cars, $params) {
		return array_slice($cars, 0, $params->get('numb'));
	}
	
}
