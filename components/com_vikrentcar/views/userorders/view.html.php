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

class VikrentcarViewUserorders extends JViewLegacy {
	function display($tpl = null) {
		$dbo = & JFactory :: getDBO();
		$pconfirmnum = JRequest :: getString('confirmnum', '', 'request');
		if (!empty($pconfirmnum)) {
			$parts = explode('_', $pconfirmnum);
			$sid = $parts[0];
			$ts = $parts[1];
			if (!empty ($sid) && !empty ($ts)) {
				$q = "SELECT `id`,`ts`,`sid` FROM `#__vikrentcar_orders` WHERE `sid`=" . $dbo->quote($sid) . " AND `ts`=" . $dbo->quote($ts) . ";";
				$dbo->setQuery($q);
				$dbo->Query($q);
				if ($dbo->getNumRows() > 0) {
					$order = $dbo->loadAssocList();
					$mainframe = & JFactory :: getApplication();
					$mainframe->redirect(JRoute::_('index.php?option=com_vikrentcar&task=vieworder&sid='.$order[0]['sid'].'&ts='.$order[0]['ts'], false));
				}else {
					JError :: raiseWarning('', JText::_('VRCINVALIDCONFNUMB'));
				}
			}else {
				JError :: raiseWarning('', JText::_('VRCINVALIDCONFNUMB'));
			}
		}
		$rows = "";
		$pagelinks = "";
		$islogged = 0;
		$psearchorder = JRequest :: getString('searchorder', '', 'request');
		$searchorder = intval($psearchorder) == 1 ? 1 : 0;
		if (vikrentcar::userIsLogged()) {
			$islogged = 1;
			$user = JFactory::getUser();
			//number of orders per page
			$lim=15;
			//
			$lim0 = JRequest::getVar('limitstart', 0, '', 'int');
			$q = "SELECT SQL_CALC_FOUND_ROWS * FROM `#__vikrentcar_orders` WHERE `ujid`='".$user->id."' ORDER BY `#__vikrentcar_orders`.`ts` DESC";
			$dbo->setQuery($q, $lim0, $lim);
			$rows=&$dbo->loadAssocList();
			if (!empty($rows)) {
				$dbo->setQuery('SELECT FOUND_ROWS();');
				jimport('joomla.html.pagination');
				$pageNav = new JPagination( $dbo->loadResult(), $lim0, $lim );
				$pagelinks="<table align=\"center\"><tr><td>".$pageNav->getPagesLinks()."</td></tr></table>";
			}
			$this->assignRef('rows', $rows);
			$this->assignRef('searchorder', $searchorder);
			$this->assignRef('islogged', $islogged);
			$this->assignRef('pagelinks', $pagelinks);
			//theme
			$theme = vikrentcar::getTheme();
			if($theme != 'default') {
				$thdir = JPATH_SITE.DS.'components'.DS.'com_vikrentcar'.DS.'themes'.DS.$theme.DS.'userorders';
				if(is_dir($thdir)) {
					$this->_setPath('template', $thdir.DS);
				}
			}
			//
			parent::display($tpl);
		}else {
			if ($searchorder == 1) {
				$this->assignRef('rows', $rows);
				$this->assignRef('searchorder', $searchorder);
				$this->assignRef('islogged', $islogged);
				$this->assignRef('pagelinks', $pagelinks);
				//theme
				$theme = vikrentcar::getTheme();
				if($theme != 'default') {
					$thdir = JPATH_SITE.DS.'components'.DS.'com_vikrentcar'.DS.'themes'.DS.$theme.DS.'userorders';
					if(is_dir($thdir)) {
						$this->_setPath('template', $thdir.DS);
					}
				}
				//
				parent::display($tpl);
			}else {
				JError :: raiseWarning('', JText::_('VRCLOGINFIRST'));
				$mainframe = & JFactory :: getApplication();
				$mainframe->redirect(JRoute::_('index.php?option=com_vikrentcar&view=loginregister'));
			}
		}
	}
}


?>