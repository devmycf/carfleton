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

class vikRentCarPayment {
	
	private $order_info;
	
	public function __construct ($order) {
		$this->order_info=$order;
	}
	
	public function showPayment () {
		$depositmess="";
		if($this->order_info['leave_deposit']) {
			$depositmess="<br/><p><strong>".JText::_('VRLEAVEDEPOSIT')." ".vikrentcar::numberFormat($this->order_info['total_to_pay'])." ".$this->order_info['currency_symb']."</strong></p><br/>";
		}
		//output
		echo $depositmess;
		echo $this->order_info['payment_info']['note'];
		
		return true;
	}
	
	public function validatePayment () {
		$array_result=array();
		$array_result['verified']=1;
		
		return $array_result;
	}
	
}


?>