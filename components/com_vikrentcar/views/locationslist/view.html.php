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

class VikrentcarViewLocationslist extends JViewLegacy {
	function display($tpl = null) {
		$dbo = & JFactory :: getDBO();
		$locations = array();
		$q = "SELECT * FROM `#__vikrentcar_places` ORDER BY `#__vikrentcar_places`.`name` ASC;";
		$dbo->setQuery($q);
		$dbo->Query($q);
		if ($dbo->getNumRows() > 0) {
			$places = $dbo->loadAssocList();
			foreach ($places as $pla) {
				if(!empty($pla['lat']) && !empty($pla['lng'])) {
					$locations[] = $pla;
				}
			}
		}
		$this->assignRef('locations', $locations);
		$this->assignRef('alllocations', $places);
		//theme
		$theme = vikrentcar::getTheme();
		if($theme != 'default') {
			$thdir = JPATH_SITE.DS.'components'.DS.'com_vikrentcar'.DS.'themes'.DS.$theme.DS.'locationslist';
			if(is_dir($thdir)) {
				$this->_setPath('template', $thdir.DS);
			}
		}
		//
		parent::display($tpl);
	}
}


?>