<?php
/**------------------------------------------------------------------------
 * mod_vikrentcar_cars - VikRentCar
 * ------------------------------------------------------------------------
 * author    Alessio Gaggii - Extensionsforjoomla.com
 * copyright Copyright (C) 2012 extensionsforjoomla.com. All Rights Reserved.
 * @license - http://www.gnu.org/licenses/gpl-2.0.html GNU/GPL
 * Websites: http://www.extensionsforjoomla.com
 * Technical Support:  tech@extensionsforjoomla.com
 * ------------------------------------------------------------------------
*/

// no direct access
defined('_JEXEC') or die;

// Include the syndicate functions only once
require_once dirname(__FILE__).'/helper.php';

$document = & JFactory :: getDocument();
$document->addStyleSheet(JURI::root().'modules/mod_vikrentcar_cars/mod_vikrentcar_cars.css');

$params->def('style', 'horizontal');
$params->def('numb', 4);
$params->def('query', 'price');
$params->def('order', 'asc');
$params->def('catid', 0);
$params->def('querycat', 'price');
$params->def('currency', '&euro;');
$params->def('showcatname', 1);
$showcatname = intval($params->get('showcatname')) == 1 ? true : false;

$cars = modvikrentcar_carsHelper::getCars($params);
$cars = modvikrentcar_carsHelper::limitRes($cars, $params);

require JModuleHelper::getLayoutPath('mod_vikrentcar_cars', $params->get('layout', 'default'));
