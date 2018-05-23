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

defined('VIKRENTCAR_ERROR_REPORTING') OR define('VIKRENTCAR_ERROR_REPORTING', 0);
error_reporting(VIKRENTCAR_ERROR_REPORTING);

//Joomla 3.0
if(!defined('DS')) {
	define('DS', DIRECTORY_SEPARATOR);
}
//

$document = & JFactory :: getDocument();
$document->addStyleSheet(JURI::root().'components/com_vikrentcar/vikrentcar_styles.css');

require_once(JPATH_SITE . DS ."components". DS ."com_vikrentcar". DS . "helpers" . DS ."lib.vikrentcar.php");

//version_compare(JVERSION, '3.0');

jimport('joomla.application.component.controller');
$controller = JControllerLegacy::getInstance('Vikrentcar');
$controller->execute(JRequest::getCmd('task'));
$controller->redirect();



?>
