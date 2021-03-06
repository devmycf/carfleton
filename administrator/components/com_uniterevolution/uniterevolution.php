<?php
/**
 * @package Unite Revolution Slider for Joomla 1.7-2.5
 * @author UniteCMS.net
 * @copyright (C) 2012 Unite CMS, All Rights Reserved. 
 * @license GNU/GPLv3 http://www.gnu.org/licenses/gpl-3.0.html
**/

// no direct access
defined( '_JEXEC' ) or die( 'Restricted access' );

$currentDir = dirname(__FILE__)."/";

require_once $currentDir."includes.php";

//error_reporting(E_ALL); // debug

// Include dependancies
jimport('joomla.application.component.controller');

$controller	= JController::getInstance(GlobalsUniteRev::EXTENSION_NAME);

// Perform the Request task
$task = JRequest::getCmd('task');

$controller->execute($task);
$controller->redirect();

?>