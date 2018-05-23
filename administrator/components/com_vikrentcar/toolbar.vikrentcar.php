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

//Joomla 3.0
if(!defined('DS')) {
	define('DS', DIRECTORY_SEPARATOR);
}
//

require_once(JPATH_ADMINISTRATOR . DS . "components". DS ."com_vikrentcar" . DS . 'toolbar.vikrentcar.html.php');

switch ( $task ) {		
	case 'viewcar':
		TOOLBAR_vikrentcar::DEFAULT_MENU();
		break;
	case 'viewplaces':
		TOOLBAR_vikrentcar::PLACE_MENU();
		break;
	case 'locfees':
		TOOLBAR_vikrentcar::LOCFEES_MENU();
		break;
	case 'seasons':
		TOOLBAR_vikrentcar::SEASONS_MENU();
		break;
	case 'payments':
		TOOLBAR_vikrentcar::PAYMENTS_MENU();
		break;			
	case 'viewiva':
		TOOLBAR_vikrentcar::IVA_MENU();
		break;	
	case 'viewcategories':
		TOOLBAR_vikrentcar::CAT_MENU();
		break;	
	case 'viewprices':
		TOOLBAR_vikrentcar::PRICE_MENU();
		break;
	case 'viewcarat':
		TOOLBAR_vikrentcar::CARAT_MENU();
		break;
	case 'viewoptionals':
		TOOLBAR_vikrentcar::OPTIONALS_MENU();
		break;			
	case 'editplace':
		TOOLBAR_vikrentcar::EDITPLACE_MENU();
		break;
	case 'newplace':
		TOOLBAR_vikrentcar::NEWPLACE_MENU();
		break;
	case 'editlocfee':
		TOOLBAR_vikrentcar::EDITLOCFEE_MENU();
		break;
	case 'newlocfee':
		TOOLBAR_vikrentcar::NEWLOCFEE_MENU();
		break;
	case 'editseason':
		TOOLBAR_vikrentcar::EDITSEASON_MENU();
		break;
	case 'newseason':
		TOOLBAR_vikrentcar::NEWSEASON_MENU();
		break;
	case 'editpayment':
		TOOLBAR_vikrentcar::EDITPAYMENT_MENU();
		break;
	case 'newpayment':
		TOOLBAR_vikrentcar::NEWPAYMENT_MENU();
		break;				
	case 'newiva':
		TOOLBAR_vikrentcar::NEWIVA_MENU();
		break;
	case 'editiva':
		TOOLBAR_vikrentcar::EDITIVA_MENU();
		break;		
	case 'newprice':
		TOOLBAR_vikrentcar::NEWPRICE_MENU();
		break;
	case 'editprice':
		TOOLBAR_vikrentcar::EDITPRICE_MENU();
		break;	
	case 'newcat':
		TOOLBAR_vikrentcar::NEWCAT_MENU();
		break;
	case 'editcat':
		TOOLBAR_vikrentcar::EDITCAT_MENU();
		break;	
	case 'newcarat':
		TOOLBAR_vikrentcar::NEWCARAT_MENU();
		break;
	case 'editcarat':
		TOOLBAR_vikrentcar::EDITCARAT_MENU();
		break;	
	case 'newoptionals':
		TOOLBAR_vikrentcar::NEWOPTIONAL_MENU();
		break;
	case 'editoptional':
		TOOLBAR_vikrentcar::EDITOPTIONAL_MENU();
		break;	
	case 'newcar':
		TOOLBAR_vikrentcar::NEWCAR_MENU();
		break;
	case 'editcar':
		TOOLBAR_vikrentcar::EDITCAR_MENU();
		break;	
	case 'viewtariffe':
		TOOLBAR_vikrentcar::TARIFFE_MENU();
		break;
	case 'viewtariffehours':
		TOOLBAR_vikrentcar::TARIFFEHOURS_MENU();
		break;
	case 'viewhourscharges':
		TOOLBAR_vikrentcar::HOURSCHARGES_MENU();
		break;
	case 'vieworders':
		TOOLBAR_vikrentcar::ORDERS_MENU();
		break;
	case 'viewexport':
		TOOLBAR_vikrentcar::EXPORT_MENU();
		break;
	case 'viewoldorders':
		TOOLBAR_vikrentcar::OLDORDERS_MENU();
		break;	
	case 'editorder':
		TOOLBAR_vikrentcar::EDITORDER_MENU();
		break;
	case 'editoldorder':
		TOOLBAR_vikrentcar::EDITOLDORDER_MENU();
		break;			
	case 'calendar':
		TOOLBAR_vikrentcar::CALENDAR_MENU();
		break;
	case 'editbusy':
		TOOLBAR_vikrentcar::EBUSY_MENU();
		break;		
	case 'config':
		TOOLBAR_vikrentcar::CONFIG_MENU();
		break;
	case 'viewstats':
		TOOLBAR_vikrentcar::STATS_MENU();
		break;
	case 'choosebusy':
		TOOLBAR_vikrentcar::CHOOSEBUSY_MENU();
		break;
	case 'overview':
		TOOLBAR_vikrentcar::OVERVIEW_MENU();
		break;
	case 'viewcustomf':
		TOOLBAR_vikrentcar::CUSTOMF_MENU();
		break;
	case 'newcustomf':
		TOOLBAR_vikrentcar::NEWCUSTOMF_MENU();
		break;
	case 'editcustomf':
		TOOLBAR_vikrentcar::EDITCUSTOMF_MENU();
		break;
	case 'viewcoupons':
		TOOLBAR_vikrentcar::COUPON_MENU();
		break;
	case 'newcoupon':
		TOOLBAR_vikrentcar::NEWCOUPON_MENU();
		break;
	case 'editcoupon':
		TOOLBAR_vikrentcar::EDITCOUPON_MENU();
		break;
	case 'cars':
		TOOLBAR_vikrentcar::CARS_MENU();
		break;
	default:
		TOOLBAR_vikrentcar::DEFAULT_MENU();
		break;
}
?>
  