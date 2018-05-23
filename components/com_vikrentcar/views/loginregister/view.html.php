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

class VikrentcarViewLoginregister extends JViewLegacy {
	function display($tpl = null) {
		$dbo = & JFactory :: getDBO();
		$ppriceid = JRequest :: getString('priceid', '', 'request');
		$pplace = JRequest :: getString('place', '', 'request');
		$preturnplace = JRequest :: getString('returnplace', '', 'request');
		$pcarid = JRequest :: getString('carid', '', 'request');
		$pdays = JRequest :: getString('days', '', 'request');
		$ppickup = JRequest :: getString('pickup', '', 'request');
		$prelease = JRequest :: getString('release', '', 'request');
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
		$this->assignRef('priceid', $ppriceid);
		$this->assignRef('place', $pplace);
		$this->assignRef('returnplace', $preturnplace);
		$this->assignRef('carid', $pcarid);
		$this->assignRef('days', $pdays);
		$this->assignRef('pickup', $ppickup);
		$this->assignRef('release', $prelease);
		$this->assignRef('copts', $copts);
		//theme
		$theme = vikrentcar::getTheme();
		if($theme != 'default') {
			$thdir = JPATH_SITE.DS.'components'.DS.'com_vikrentcar'.DS.'themes'.DS.$theme.DS.'loginregister';
			if(is_dir($thdir)) {
				$this->_setPath('template', $thdir.DS);
			}
		}
		//
		parent::display($tpl);
	}
}


?>