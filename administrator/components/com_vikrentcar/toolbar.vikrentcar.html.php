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

defined('_JEXEC') or die('Restricted access');
error_reporting(VIKRENTCAR_ERROR_REPORTING);

class TOOLBAR_vikrentcar {
	function DEFAULT_MENU() {
		JToolBarHelper :: title(JText :: _('VRMAINDASHBOARDTITLE'), 'vikrentcar');
	}
	
	function CARS_MENU() {
		JToolBarHelper :: title(JText :: _('VRMAINDEAFULTTITLE'), 'vikrentcar');
		JToolBarHelper :: addNew('newcar', JText :: _('VRMAINDEFAULTNEW'));
		JToolBarHelper :: spacer();
		JToolBarHelper :: custom( 'calendar', 'edit', 'edit', JText :: _('VRMAINDEFAULTCAL'), true, false);
		JToolBarHelper :: spacer();
		JToolBarHelper :: editList('viewtariffe', JText :: _('VRMAINDEFAULTEDITT'));
		JToolBarHelper :: spacer();
		JToolBarHelper :: editList('editcar', JText :: _('VRMAINDEFAULTEDITC'));
		JToolBarHelper :: spacer();
		JToolBarHelper :: deleteList('', 'removecar', JText :: _('VRMAINDEFAULTDEL'));
		JToolBarHelper :: spacer();
	}
	
	function CUSTOMF_MENU() {
		JToolBarHelper :: title(JText :: _('VRMAINCUSTOMFTITLE'), 'vikrentcar');
		JToolBarHelper :: addNew('newcustomf', JText :: _('VRMAINCUSTOMFNEW'));
		JToolBarHelper :: spacer();
		JToolBarHelper :: editList('editcustomf', JText :: _('VRMAINCUSTOMFEDIT'));
		JToolBarHelper :: spacer();
		JToolBarHelper :: deleteList('', 'removecustomf', JText :: _('VRMAINCUSTOMFDEL'));
		JToolBarHelper :: spacer();
	}
	
	function COUPON_MENU() {
		JToolBarHelper :: title(JText :: _('VRMAINCOUPONTITLE'), 'vikrentcar');
		JToolBarHelper :: addNew('newcoupon', JText :: _('VRMAINCOUPONNEW'));
		JToolBarHelper :: spacer();
		JToolBarHelper :: editList('editcoupon', JText :: _('VRMAINCOUPONEDIT'));
		JToolBarHelper :: spacer();
		JToolBarHelper :: deleteList('', 'removecoupons', JText :: _('VRMAINCOUPONDEL'));
		JToolBarHelper :: spacer();
	}
	
	function PLACE_MENU() {
		JToolBarHelper :: title(JText :: _('VRMAINPLACETITLE'), 'vikrentcar');
		JToolBarHelper :: addNew('newplace', JText :: _('VRMAINPLACENEW'));
		JToolBarHelper :: spacer();
		JToolBarHelper :: editList('editplace', JText :: _('VRMAINPLACEEDIT'));
		JToolBarHelper :: spacer();
		JToolBarHelper :: deleteList('', 'removeplace', JText :: _('VRMAINPLACEDEL'));
		JToolBarHelper :: spacer();
	}
	
	function LOCFEES_MENU() {
		JToolBarHelper :: title(JText :: _('VRMAINLOCFEESTITLE'), 'vikrentcar');
		JToolBarHelper :: addNew('newlocfee', JText :: _('VRMAINLOCFEENEW'));
		JToolBarHelper :: spacer();
		JToolBarHelper :: editList('editlocfee', JText :: _('VRMAINLOCFEEEDIT'));
		JToolBarHelper :: spacer();
		JToolBarHelper :: deleteList('', 'removelocfee', JText :: _('VRMAINLOCFEEDEL'));
		JToolBarHelper :: spacer();
	}
	
	function SEASONS_MENU() {
		JToolBarHelper :: title(JText :: _('VRMAINSEASONSTITLE'), 'vikrentcar');
		JToolBarHelper :: addNew('newseason', JText :: _('VRMAINSEASONSNEW'));
		JToolBarHelper :: spacer();
		JToolBarHelper :: editList('editseason', JText :: _('VRMAINSEASONSEDIT'));
		JToolBarHelper :: spacer();
		JToolBarHelper :: deleteList('', 'removeseasons', JText :: _('VRMAINSEASONSDEL'));
		JToolBarHelper :: spacer();
	}
	
	function PAYMENTS_MENU() {
		JToolBarHelper :: title(JText :: _('VRMAINPAYMENTSTITLE'), 'vikrentcar');
		JToolBarHelper :: addNew('newpayment', JText :: _('VRMAINPAYMENTSNEW'));
		JToolBarHelper :: spacer();
		JToolBarHelper :: editList('editpayment', JText :: _('VRMAINPAYMENTSEDIT'));
		JToolBarHelper :: spacer();
		JToolBarHelper :: deleteList('', 'removepayments', JText :: _('VRMAINPAYMENTSDEL'));
		JToolBarHelper :: spacer();
	}
	
	function IVA_MENU() {
		JToolBarHelper :: title(JText :: _('VRMAINIVATITLE'), 'vikrentcar');
		JToolBarHelper :: addNew('newiva', JText :: _('VRMAINIVANEW'));
		JToolBarHelper :: spacer();
		JToolBarHelper :: editList('editiva', JText :: _('VRMAINIVAEDIT'));
		JToolBarHelper :: spacer();
		JToolBarHelper :: deleteList('', 'removeiva', JText :: _('VRMAINIVADEL'));
		JToolBarHelper :: spacer();
	}
	
	function CAT_MENU() {
		JToolBarHelper :: title(JText :: _('VRMAINCATTITLE'), 'vikrentcar');
		JToolBarHelper :: addNew('newcat', JText :: _('VRMAINCATNEW'));
		JToolBarHelper :: spacer();
		JToolBarHelper :: editList('editcat', JText :: _('VRMAINCATEDIT'));
		JToolBarHelper :: spacer();
		JToolBarHelper :: deleteList('', 'removecat', JText :: _('VRMAINCATDEL'));
		JToolBarHelper :: spacer();
	}
	
	function CARAT_MENU() {
		JToolBarHelper :: title(JText :: _('VRMAINCARATTITLE'), 'vikrentcar');
		JToolBarHelper :: addNew('newcarat', JText :: _('VRMAINCARATNEW'));
		JToolBarHelper :: spacer();
		JToolBarHelper :: editList('editcarat', JText :: _('VRMAINCARATEDIT'));
		JToolBarHelper :: spacer();
		JToolBarHelper :: deleteList('', 'removecarat', JText :: _('VRMAINCARATDEL'));
		JToolBarHelper :: spacer();
	}
	
	function OPTIONALS_MENU() {
		JToolBarHelper :: title(JText :: _('VRMAINOPTTITLE'), 'vikrentcar');
		JToolBarHelper :: addNew('newoptionals', JText :: _('VRMAINOPTNEW'));
		JToolBarHelper :: spacer();
		JToolBarHelper :: editList('editoptional', JText :: _('VRMAINOPTEDIT'));
		JToolBarHelper :: spacer();
		JToolBarHelper :: deleteList('', 'removeoptionals', JText :: _('VRMAINOPTDEL'));
		JToolBarHelper :: spacer();
	}
	
	function PRICE_MENU() {
		JToolBarHelper :: title(JText :: _('VRMAINPRICETITLE'), 'vikrentcar');
		JToolBarHelper :: addNew('newprice', JText :: _('VRMAINPRICENEW'));
		JToolBarHelper :: spacer();
		JToolBarHelper :: editList('editprice', JText :: _('VRMAINPRICEEDIT'));
		JToolBarHelper :: spacer();
		JToolBarHelper :: deleteList('', 'removeprice', JText :: _('VRMAINPRICEDEL'));
		JToolBarHelper :: spacer();
	}
	
	function NEWPLACE_MENU() {
		JToolBarHelper :: title(JText :: _('VRMAINPLACETITLENEW'), 'vikrentcar');
		JToolBarHelper::save( 'createplace', JText::_('VRSAVE'));
		JToolBarHelper::spacer();
		JToolBarHelper::cancel( 'cancelplace', JText::_('VRANNULLA'));
		JToolBarHelper::spacer();
	}
	
	function NEWCUSTOMF_MENU() {
		JToolBarHelper :: title(JText :: _('VRMAINCUSTOMFTITLE'), 'vikrentcar');
		JToolBarHelper::save( 'createcustomf', JText::_('VRSAVE'));
		JToolBarHelper::spacer();
		JToolBarHelper::cancel( 'cancelcustomf', JText::_('VRANNULLA'));
		JToolBarHelper::spacer();
	}
	
	function EDITCUSTOMF_MENU() {
		JToolBarHelper :: title(JText :: _('VRMAINCUSTOMFTITLE'), 'vikrentcar');
		JToolBarHelper::save( 'updatecustomf', JText::_('VRSAVE'));
		JToolBarHelper::spacer();
		JToolBarHelper::cancel( 'cancelcustomf', JText::_('VRANNULLA'));
		JToolBarHelper::spacer();
	}
	
	function NEWCOUPON_MENU() {
		JToolBarHelper :: title(JText :: _('VRMAINCOUPONTITLE'), 'vikrentcar');
		JToolBarHelper::save( 'createcoupon', JText::_('VRSAVE'));
		JToolBarHelper::spacer();
		JToolBarHelper::cancel( 'cancelcoupon', JText::_('VRANNULLA'));
		JToolBarHelper::spacer();
	}
	
	function EDITCOUPON_MENU() {
		JToolBarHelper :: title(JText :: _('VRMAINCOUPONTITLE'), 'vikrentcar');
		JToolBarHelper::save( 'updatecoupon', JText::_('VRSAVE'));
		JToolBarHelper::spacer();
		JToolBarHelper::cancel( 'cancelcoupon', JText::_('VRANNULLA'));
		JToolBarHelper::spacer();
	}
	
	function EDITPLACE_MENU() {
		JToolBarHelper :: title(JText :: _('VRMAINPLACETITLEEDIT'), 'vikrentcar');
		JToolBarHelper::save( 'updateplace', JText::_('VRSAVE'));
		JToolBarHelper::spacer();
		JToolBarHelper::cancel( 'cancelplace', JText::_('VRANNULLA'));
		JToolBarHelper::spacer();
	}
	
	function NEWLOCFEE_MENU() {
		JToolBarHelper :: title(JText :: _('VRMAINLOCFEETITLENEW'), 'vikrentcar');
		JToolBarHelper::save( 'createlocfee', JText::_('VRSAVE'));
		JToolBarHelper::spacer();
		JToolBarHelper::cancel( 'cancellocfee', JText::_('VRANNULLA'));
		JToolBarHelper::spacer();
	}
	
	function EDITLOCFEE_MENU() {
		JToolBarHelper :: title(JText :: _('VRMAINLOCFEETITLEEDIT'), 'vikrentcar');
		JToolBarHelper::save( 'updatelocfee', JText::_('VRSAVE'));
		JToolBarHelper::spacer();
		JToolBarHelper::cancel( 'cancellocfee', JText::_('VRANNULLA'));
		JToolBarHelper::spacer();
	}
	
	function NEWSEASON_MENU() {
		JToolBarHelper :: title(JText :: _('VRMAINSEASONTITLENEW'), 'vikrentcar');
		JToolBarHelper::save( 'createseason', JText::_('VRSAVE'));
		JToolBarHelper::spacer();
		JToolBarHelper::cancel( 'cancelseason', JText::_('VRANNULLA'));
		JToolBarHelper::spacer();
	}
	
	function EDITSEASON_MENU() {
		JToolBarHelper :: title(JText :: _('VRMAINSEASONTITLEEDIT'), 'vikrentcar');
		JToolBarHelper::save( 'updateseason', JText::_('VRSAVE'));
		JToolBarHelper::spacer();
		JToolBarHelper::cancel( 'cancelseason', JText::_('VRANNULLA'));
		JToolBarHelper::spacer();
	}
	
	function NEWPAYMENT_MENU() {
		JToolBarHelper :: title(JText :: _('VRMAINPAYMENTTITLENEW'), 'vikrentcar');
		JToolBarHelper::save( 'createpayment', JText::_('VRSAVE'));
		JToolBarHelper::spacer();
		JToolBarHelper::cancel( 'cancelpayment', JText::_('VRANNULLA'));
		JToolBarHelper::spacer();
	}
	
	function EDITPAYMENT_MENU() {
		JToolBarHelper :: title(JText :: _('VRMAINPAYMENTTITLEEDIT'), 'vikrentcar');
		JToolBarHelper::save( 'updatepayment', JText::_('VRSAVE'));
		JToolBarHelper::spacer();
		JToolBarHelper::cancel( 'cancelpayment', JText::_('VRANNULLA'));
		JToolBarHelper::spacer();
	}
	
	function STATS_MENU() {
		JToolBarHelper :: title(JText :: _('VRMAINSTATSTITLE'), 'vikrentcar');
		JToolBarHelper :: deleteList('', 'removestats', JText :: _('VRELIMINA'));
		JToolBarHelper::spacer();
		JToolBarHelper::spacer();
		JToolBarHelper::cancel( 'cancel', JText::_('VRBACK'));
		JToolBarHelper::spacer();
	}
	
	function NEWIVA_MENU() {
		JToolBarHelper :: title(JText :: _('VRMAINIVATITLENEW'), 'vikrentcar');
		JToolBarHelper::save( 'createiva', JText::_('VRSAVE'));
		JToolBarHelper::spacer();
		JToolBarHelper::cancel( 'canceliva', JText::_('VRANNULLA'));
		JToolBarHelper::spacer();
	}
	
	function EDITIVA_MENU() {
		JToolBarHelper :: title(JText :: _('VRMAINIVATITLEEDIT'), 'vikrentcar');
		JToolBarHelper::save( 'updateiva', JText::_('VRSAVE'));
		JToolBarHelper::spacer();
		JToolBarHelper::cancel( 'canceliva', JText::_('VRANNULLA'));
		JToolBarHelper::spacer();
	}
	
	function NEWPRICE_MENU() {
		JToolBarHelper :: title(JText :: _('VRMAINPRICETITLENEW'), 'vikrentcar');
		JToolBarHelper::save( 'createprice', JText::_('VRSAVE'));
		JToolBarHelper::spacer();
		JToolBarHelper::cancel( 'cancelprice', JText::_('VRANNULLA'));
		JToolBarHelper::spacer();
	}
	
	function EDITPRICE_MENU() {
		JToolBarHelper :: title(JText :: _('VRMAINPRICETITLEEDIT'), 'vikrentcar');
		JToolBarHelper::save( 'updateprice', JText::_('VRSAVE'));
		JToolBarHelper::spacer();
		JToolBarHelper::cancel( 'cancelprice', JText::_('VRANNULLA'));
		JToolBarHelper::spacer();
	}
	
	function NEWCAT_MENU() {
		JToolBarHelper :: title(JText :: _('VRMAINCATTITLENEW'), 'vikrentcar');
		JToolBarHelper::save( 'createcat', JText::_('VRSAVE'));
		JToolBarHelper::spacer();
		JToolBarHelper::cancel( 'cancelcat', JText::_('VRANNULLA'));
		JToolBarHelper::spacer();
	}
	
	function EDITCAT_MENU() {
		JToolBarHelper :: title(JText :: _('VRMAINCATTITLEEDIT'), 'vikrentcar');
		JToolBarHelper::save( 'updatecat', JText::_('VRSAVE'));
		JToolBarHelper::spacer();
		JToolBarHelper::cancel( 'cancelcat', JText::_('VRANNULLA'));
		JToolBarHelper::spacer();
	}
	
	function NEWCARAT_MENU() {
		JToolBarHelper :: title(JText :: _('VRMAINCARATTITLENEW'), 'vikrentcar');
		JToolBarHelper::save( 'createcarat', JText::_('VRSAVE'));
		JToolBarHelper::spacer();
		JToolBarHelper::cancel( 'cancelcarat', JText::_('VRANNULLA'));
		JToolBarHelper::spacer();
	}
	
	function EDITCARAT_MENU() {
		JToolBarHelper :: title(JText :: _('VRMAINCARATTITLEEDIT'), 'vikrentcar');
		JToolBarHelper::save( 'updatecarat', JText::_('VRSAVE'));
		JToolBarHelper::spacer();
		JToolBarHelper::cancel( 'cancelcarat', JText::_('VRANNULLA'));
		JToolBarHelper::spacer();
	}
	
	function NEWOPTIONAL_MENU() {
		JToolBarHelper :: title(JText :: _('VRMAINOPTTITLENEW'), 'vikrentcar');
		JToolBarHelper::save( 'createoptionals', JText::_('VRSAVE'));
		JToolBarHelper::spacer();
		JToolBarHelper::cancel( 'canceloptionals', JText::_('VRANNULLA'));
		JToolBarHelper::spacer();
	}
	
	function EDITOPTIONAL_MENU() {
		JToolBarHelper :: title(JText :: _('VRMAINOPTTITLEEDIT'), 'vikrentcar');
		JToolBarHelper::save( 'updateoptional', JText::_('VRSAVE'));
		JToolBarHelper::spacer();
		JToolBarHelper::cancel( 'canceloptionals', JText::_('VRANNULLA'));
		JToolBarHelper::spacer();
	}
	
	function NEWCAR_MENU() {
		JToolBarHelper :: title(JText :: _('VRMAINCARTITLENEW'), 'vikrentcar');
		JToolBarHelper::save( 'createcar', JText::_('VRSAVE'));
		JToolBarHelper::spacer();
		JToolBarHelper::cancel( 'cancel', JText::_('VRANNULLA'));
		JToolBarHelper::spacer();
	}
	
	function EDITCAR_MENU() {
		JToolBarHelper :: title(JText :: _('VRMAINCARTITLEEDIT'), 'vikrentcar');
		JToolBarHelper::save( 'updatecar', JText::_('VRSAVE'));
		JToolBarHelper::spacer();
		JToolBarHelper::cancel( 'cancel', JText::_('VRANNULLA'));
		JToolBarHelper::spacer();
	}
	
	function TARIFFE_MENU() {
		JToolBarHelper :: title(JText :: _('VRMAINTARIFFETITLE'), 'vikrentcar');
		JToolBarHelper::deleteList('', 'removetariffe', JText :: _('VRMAINTARIFFEDEL'));
		JToolBarHelper::spacer();
		JToolBarHelper::spacer();
		JToolBarHelper::save( 'cancel', JText::_('VRMAINTARIFFEBACK'));
		JToolBarHelper::spacer();
	}
	
	function TARIFFEHOURS_MENU() {
		JToolBarHelper :: title(JText :: _('VRMAINTARIFFETITLE'), 'vikrentcar');
		JToolBarHelper::deleteList('', 'removetariffehours', JText :: _('VRMAINTARIFFEDEL'));
		JToolBarHelper::spacer();
		JToolBarHelper::spacer();
		JToolBarHelper::save( 'cancel', JText::_('VRMAINTARIFFEBACK'));
		JToolBarHelper::spacer();
	}
	
	function HOURSCHARGES_MENU() {
		JToolBarHelper :: title(JText :: _('VRMAINTARIFFETITLE'), 'vikrentcar');
		JToolBarHelper::deleteList('', 'removehourscharges', JText :: _('VRMAINTARIFFEDEL'));
		JToolBarHelper::spacer();
		JToolBarHelper::spacer();
		JToolBarHelper::save( 'cancel', JText::_('VRMAINTARIFFEBACK'));
		JToolBarHelper::spacer();
	}
	
	function ORDERS_MENU() {
		JToolBarHelper :: title(JText :: _('VRMAINORDERTITLE'), 'vikrentcar');
		JToolBarHelper::custom( 'viewexport', 'export', 'export', JText :: _('VRMAINORDERSEXPORT'), false, false);
		JToolBarHelper::spacer();
		JToolBarHelper::spacer();
		JToolBarHelper::deleteList('', 'removeorders', JText :: _('VRMAINORDERDEL'));
		JToolBarHelper::spacer();
		JToolBarHelper::spacer();
		JToolBarHelper :: editList('editorder', JText :: _('VRMAINORDEREDIT'));
		JToolBarHelper :: spacer();
	}
	
	function EXPORT_MENU() {
		JToolBarHelper :: title(JText :: _('VRMAINEXPORTTITLE'), 'vikrentcar');
		JToolBarHelper::cancel( 'canceledorder', JText::_('VRBACK'));
		JToolBarHelper :: spacer();
	}
	
	function OLDORDERS_MENU() {
		JToolBarHelper :: title(JText :: _('VRMAINOLDORDERTITLE'), 'vikrentcar');
		JToolBarHelper::deleteList('', 'removeoldorders', JText :: _('VRMAINOLDORDERDEL'));
		JToolBarHelper::spacer();
		JToolBarHelper::spacer();
		JToolBarHelper :: editList('editoldorder', JText :: _('VRMAINOLDORDEREDIT'));
		JToolBarHelper :: spacer();
	}
	
	function EDITORDER_MENU() {
		JToolBarHelper :: title(JText :: _('VRMAINORDERTITLEEDIT'), 'vikrentcar');
		JToolBarHelper::cancel( 'canceledorder', JText::_('VRBACK'));
		JToolBarHelper :: spacer();
	}
	
	function EDITOLDORDER_MENU() {
		JToolBarHelper :: title(JText :: _('VRMAINOLDORDERTITLEEDIT'), 'vikrentcar');
		JToolBarHelper::cancel( 'canceledoldorder', JText::_('VRBACK'));
		JToolBarHelper :: spacer();
	}
	
	function CALENDAR_MENU() {
		JToolBarHelper :: title(JText :: _('VRMAINCALTITLE'), 'vikrentcar');
		JToolBarHelper::cancel( 'cancel', JText::_('VRBACK'));
		JToolBarHelper::spacer();
	}
	
	function EBUSY_MENU() {
		JToolBarHelper :: title(JText :: _('VRMAINEBUSYTITLE'), 'vikrentcar');
		JToolBarHelper :: custom( 'removebusy', 'delete', 'delete', JText :: _('VRMAINEBUSYDEL'), false, false);
		JToolBarHelper::spacer();
		JToolBarHelper::spacer();
		JToolBarHelper::save( 'updatebusy', JText::_('VRSAVE'));
		JToolBarHelper::spacer();
		JToolBarHelper::cancel( 'cancelcalendar', JText::_('VRBACK'));
		JToolBarHelper::spacer();
	}
	
	function CONFIG_MENU() {
		JToolBarHelper :: title(JText :: _('VRMAINCONFIGTITLE'), 'vikrentcarconfig');
		JToolBarHelper::save( 'saveconfig', JText::_('VRSAVE'));
		JToolBarHelper::spacer();
		JToolBarHelper::cancel( 'cancel', JText::_('VRANNULLA'));
		JToolBarHelper::spacer();
	}
	
	function CHOOSEBUSY_MENU() {
		$dbo = & JFactory :: getDBO();
		$pts = JRequest :: getInt('ts', '', 'request');
		$pidcar = JRequest :: getInt('idcar', '', 'request');
		$q="SELECT `name` FROM `#__vikrentcar_cars` WHERE `id`=".$dbo->quote($pidcar).";";
		$dbo->setQuery($q);
		$dbo->Query($q);
		$cname=$dbo->loadResult();
		JToolBarHelper :: title(JText :: _('VRMAINCHOOSEBUSY')." ".$cname.", ".date('Y-M-d', $pts), 'vikrentcar');
		JToolBarHelper::cancel( 'cancelcalendar', JText::_('VRBACK'));
		JToolBarHelper::spacer();
	}
	
	function OVERVIEW_MENU() {
		JToolBarHelper :: title(JText :: _('VRMAINOVERVIEWTITLE'), 'vikrentcar');
		JToolBarHelper::cancel( 'cancel', JText::_('VRBACK'));
		JToolBarHelper::spacer();
	}
	
}
?>
  
    
  