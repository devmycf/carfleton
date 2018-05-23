<?php
/**
* Mod_VikRentCar_Search
* http://www.extensionsforjoomla.com
*/
 
// no direct access
defined('_JEXEC') or die('Restricted Area');
error_reporting(0);

//Joomla 3.0
if(!defined('DS')) {
	define('DS', DIRECTORY_SEPARATOR);
}
//

require_once (dirname(__FILE__).DS.'helper.php');

$params->def('showloc', 0);
$params->def('showcat', 0);

$vrtext  = modVikrentcarSearchHelper::getFormattingText($params);

require JModuleHelper::getLayoutPath('mod_vikrentcar_search', $params->get('layout', 'default'));

?>
