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
	
	private $login = ""; //Put you Authorize.net Login ID here
	private $transkey = ""; //Put you Authorize.net Transaction Key here
	private $url;
	
	private $params = array();
	private $results = array();
	
	private $approved = false;
	private $declined = false;
	private $error = true;
	
	private $fields;
	private $response;
	
	static $instances = 0;
	
	/**
	 * Do not edit this function unless you know what you are doing
	 * it is just meant to define the parameters of the payment method 
	 */
	static function getAdminParameters () {
		return array(
				'logo' => array('type' => 'custom', 'label' => '', 'html' => '<img src="http://www.authorize.net/resources/images/authorizenet.png" style="width: 200px;"/>'),
				'intro' => array('type' => 'custom', 'label' => '', 'html' => '<strong>All the following settings are required:</strong>'),
				'login' => array('type' => 'text', 'label' => 'Login ID:'),
				'transkey' => array('type' => 'text', 'label' => 'Transaction Key:'),
				'testmode' => array('type' => 'select', 'label' => 'Test Mode:', 'options' => array('ON', 'OFF')),
				'type' => array('type' => 'select', 'label' => 'Transaction Type://Change to AUTH_ONLY for not charging the client, see authorize.net for more details', 'options' => array('AUTH_CAPTURE', 'AUTH_ONLY'))
		);
	}
	
	public function __construct ($order, $params = array()) {
		if (self::$instances == 0) {
			self::$instances++;
			$this->order_info = $order;
			$this->params['x_delim_data'] = "TRUE";
			$this->params['x_delim_char'] = "|";
			$this->params['x_relay_response'] = "FALSE";
			$this->params['x_url'] = "FALSE";
			$this->params['x_version'] = "3.1";
			$this->params['x_method'] = "CC";
			$this->params['x_type'] = !empty($params['type']) ? $params['type'] : "AUTH_CAPTURE"; //Change to AUTH_ONLY for not charging the client, see authorize.net for more details
			$this->params['x_login'] = !empty($params['login']) ? $params['login'] : $this->login;
			$this->params['x_tran_key'] = !empty($params['transkey']) ? $params['transkey'] : $this->transkey;
			$this->url = (empty($params['testmode']) ? 'https://test.authorize.net/gateway/transact.dll' : ($params['testmode'] == 'ON' ? 'https://test.authorize.net/gateway/transact.dll' : 'https://secure.authorize.net/gateway/transact.dll'));
		}else {
			return false;
		}
	}
	
	public function showPayment () {
		$depositmess="";
		$actionurl = $this->order_info['notify_url'];
		//to enable ssl in the payment validation page decomment the line below
		//$actionurl = str_replace('http:', 'https:', $actionurl);
		//
		//to enable ssl in the credit card info page decomment the lines below
		//if ($_SERVER['HTTPS'] != "on") {
			//$url = $this->order_info['return_url'];
			//$mainframe =& JFactory::getApplication();
			//$mainframe->redirect(str_replace('http:', 'https:', $url));
			//exit;
		//}
		//
		$form="<br clear=\"all\"/><form action=\"".$actionurl."\" method=\"post\" name=\"authorizenetpaymform\">\n";
		$form.="<table>\n";
		$form.="<tr><td align=\"right\">".JText::_('VRCCCREDITCARDNUMBER').": </td><td><input type=\"text\" id=\"credit_card_number\" name=\"credit_card_number\" size=\"20\" value=\"\"/></td></tr>\n";
		$form.='<tr><td align="right">'.JText::_('VRCCVALIDTHROUGH').': </td><td><select name="expire_month">
				<option value="01">January</option>
				<option value="02">February</option>
				<option value="03">March</option>
				<option value="04">April</option>
				<option value="05">May</option>
				<option value="06">June</option>
				<option value="07">July</option>
				<option value="08">August</option>
				<option value="09">September</option>
				<option value="10">October</option>
				<option value="11">November</option>
				<option value="12">December</option>
				</select> ';
		$maxyear = date("Y");
		$form.='<select name="expire_year">';
		for ($i = $maxyear; $i <= ($maxyear + 10); $i++) {
			$form.='<option value="'.substr($i, -2, 2).'">'.$i.'</option>';
		}
		$form.='</select></td></tr>'."\n";
		$form.="<tr><td align=\"right\">".JText::_('VRCCCVV').": </td><td><input type=\"text\" id=\"credit_card_cvv\" name=\"credit_card_cvv\" size=\"5\" value=\"\"/></td></tr>\n";
		$form.="<tr><td align=\"right\">".JText::_('VRCCFIRSTNAME').": </td><td><input type=\"text\" id=\"business_first_name\" name=\"business_first_name\" size=\"20\" value=\"\"/></td></tr>\n";
		$form.="<tr><td align=\"right\">".JText::_('VRCCLASTNAME').": </td><td><input type=\"text\" id=\"business_last_name\" name=\"business_last_name\" size=\"20\" value=\"\"/></td></tr>\n";
		$form.="<tr><td align=\"left\" colspan=\"2\"><strong>".JText::_('VRCCBILLINGINFO').":</strong></td></tr>\n";
		$form.="<tr><td align=\"right\">".JText::_('VRCCCOMPANY').": </td><td><input type=\"text\" id=\"business_company\" name=\"business_company\" size=\"20\" value=\"\"/></td></tr>\n";
		$form.="<tr><td align=\"right\">".JText::_('VRCCADDRESS').": </td><td><input type=\"text\" id=\"business_address\" name=\"business_address\" size=\"20\" value=\"\"/></td></tr>\n";
		$form.="<tr><td align=\"right\">".JText::_('VRCCCITY').": </td><td><input type=\"text\" id=\"business_city\" name=\"business_city\" size=\"20\" value=\"\"/></td></tr>\n";
		$form.="<tr><td align=\"right\">".JText::_('VRCCSTATEPROVINCE').": </td><td><input type=\"text\" id=\"business_state_province\" name=\"business_state_province\" size=\"20\" value=\"\"/></td></tr>\n";
		$form.="<tr><td align=\"right\">".JText::_('VRCCZIP').": </td><td><input type=\"text\" id=\"business_zipcode\" name=\"business_zipcode\" size=\"5\" value=\"\"/></td></tr>\n";
		$form.="<tr><td align=\"right\">".JText::_('VRCCCOUNTRY').": </td><td><input type=\"text\" id=\"business_country\" name=\"business_country\" size=\"20\" value=\"\"/></td></tr>\n";
		$form.="<tr><td align=\"right\">".JText::_('VRCCPHONE').": </td><td><input type=\"text\" id=\"business_phone\" name=\"business_phone\" size=\"15\" value=\"\"/></td></tr>\n";
		$form.="<tr><td align=\"right\">".JText::_('VRCCEMAIL').": </td><td><input type=\"text\" id=\"business_email\" name=\"business_email\" size=\"20\" value=\"\"/></td></tr>\n";
		$form.="<tr><td align=\"right\" colspan=\"2\"><input type=\"submit\" id=\"authorizenetsubmit\" name=\"authorizenetsubmit\" class=\"button\" value=\"".JText::_('VRCCPROCESSPAY')."\" onclick=\"javascript: event.preventDefault(); this.disabled = true; this.value = '".addslashes(JText::_('VRCCPROCESSING'))."'; document.authorizenetpaymform.submit(); return true;\"/></td></tr>\n";
		$form.="</table>\n";
		$form.="<input type=\"hidden\" name=\"total\" value=\"".number_format($this->order_info['total_to_pay'], 2)."\"/>\n";
		$form.="<input type=\"hidden\" name=\"description\" value=\"".$this->order_info['rooms_name']."\"/>\n";
		$form.="</form>\n";
		
		if($this->order_info['leave_deposit']) {
			$depositmess="<br/><p><strong>".JText::_('VRLEAVEDEPOSIT')." ".vikrentcar::numberFormat($this->order_info['total_to_pay'])." ".$this->order_info['currency_symb']."</strong></p><br/>";
		}
		//output form
		echo $depositmess;
		echo $this->order_info['payment_info']['note'];
		echo $form;
		
		return true;
	}
	
	public function validatePayment () {
		$log="";
		$array_result=array();
		$array_result['verified'] = 0;
		
		//post data
		$creditcard = JRequest :: getString('credit_card_number', '', 'request');
		$expire_month = JRequest :: getString('expire_month', '', 'request');
		$expire_year = JRequest :: getString('expire_year', '', 'request');
		$cvv = JRequest :: getString('credit_card_cvv', '', 'request');
		$total = JRequest :: getString('total', '', 'request');
		//billing information
		$business_first_name = JRequest :: getString('business_first_name', '', 'request');
		self::setParameter('x_first_name', $business_first_name);
		$business_last_name = JRequest :: getString('business_last_name', '', 'request');
		self::setParameter('x_last_name', $business_last_name);
		$business_company = JRequest :: getString('business_company', '', 'request');
		self::setParameter('x_company', $business_company);
		$business_address = JRequest :: getString('business_address', '', 'request');
		self::setParameter('x_address', $business_address);
		$business_city = JRequest :: getString('business_city', '', 'request');
		self::setParameter('x_city', $business_city);
		$business_state_province = JRequest :: getString('business_state_province', '', 'request');
		self::setParameter('x_state', $business_state_province);
		$business_zipcode = JRequest :: getString('business_zipcode', '', 'request');
		self::setParameter('x_zip', $business_zipcode);
		$business_country = JRequest :: getString('business_country', '', 'request');
		self::setParameter('x_country', $business_country);
		$business_phone = JRequest :: getString('business_phone', '', 'request');
		self::setParameter('x_phone', $business_phone);
		$business_email = JRequest :: getString('business_email', '', 'request');
		self::setParameter('x_email', $business_email);
		$description = JRequest :: getString('description', '', 'request');
		self::setParameter('x_description', $description);
		//end billing information
		//end post data
		
		//post data validation
		$error_redirect_url = 'index.php?option=com_vikrentcar&task=vieworder&sid='.$this->order_info['sid'].'&ts='.$this->order_info['ts'];
		$valid_data = true;
		$current_month = date("m");
		$current_year = date("y");
		if ((int)$expire_year < (int)$current_year) {
			$valid_data = false;
		} else { 
			if ((int)$expire_year == (int)$current_year) {
				if ((int)$expire_month < (int)$current_month) {
					$valid_data = false;
				}
			}
		}
		if(empty($creditcard)) {
			$valid_data = false;
		}
		if(!$valid_data) {
			JError::raiseWarning('', 'Invalid Data Received for processing the payment, please try again');
			$mainframe =& JFactory::getApplication();
			$mainframe->redirect($error_redirect_url);
			exit;
		}
		//end post data validation
		
		self::transaction(trim($creditcard), $expire_month.$expire_year, $total, $cvv);
		self::process();
		
		$log = print_r($this->results, true);
		$array_result['log'] = $log;
		
		if (self::isApproved()) {
			$array_result['verified'] = 1;
			$array_result['tot_paid']=self::getTotalAmountPaid();
		}elseif (self::isDeclined()) {
			$array_result['log'] .= "\nDeclined"; 
		}else {
			$array_result['log'] .= "\nError"; 
		}
		
		return $array_result;
	}
	
	//this function is called after the payment has been validated for redirect actions
	//When this method is called, the class is invoked at the same time as validatePayment()
	public function afterValidation ($esit = 0) {
		$redirect_url = 'index.php?option=com_vikrentcar&task=vieworder&sid='.$this->order_info['sid'].'&ts='.$this->order_info['ts'];
		
		if($esit < 1) {
			$responsetxt = self::getResponseText();
			JError::raiseWarning('', (strlen(trim($responsetxt)) > 0 ? $responsetxt.'<br/>' : '').'The payment was not verified, please try again');
		}else {
			$app =& JFactory::getApplication();
			$app->enqueueMessage('Thank you! The payment was verified successfully');
		}
		
		$mainframe =& JFactory::getApplication();
		$mainframe->redirect($redirect_url);
		exit;
		//
	}
	
	public function transaction($cardnum, $expiration, $amount, $cvv = "", $invoice = "", $tax = "") {
		$this->params['x_card_num'] = trim($cardnum);
		$this->params['x_exp_date'] = trim($expiration);
		$this->params['x_amount'] = trim($amount);
		$this->params['x_po_num'] = trim($invoice);
		$this->params['x_tax'] = trim($tax);
		$this->params['x_card_code'] = trim($cvv);
	}

	public function process($retries = 3) {
		$this->_prepareParameters();
		$ch = curl_init($this->url);
		$count = 0;
		while ($count < $retries) {
			curl_setopt($ch, CURLOPT_HEADER, 0);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
			curl_setopt($ch, CURLOPT_POSTFIELDS, rtrim($this->fields, "& "));
			$this->response = curl_exec($ch);
			$this->_parseResults();
			if ($this->getResultResponseFull() == "Approved") {
				$this->approved = true;
				$this->declined = false;
				$this->error = false;
				break;
			} elseif ($this->getResultResponseFull() == "Declined") {
				$this->approved = false;
				$this->declined = true;
				$this->error = false;
				break;
			}
			$count++;
		}
		curl_close($ch);
	}

	private function _parseResults() {
		$this->results = explode("|", $this->response);
	}

	public function setParameter($param, $value) {
		$param = trim($param);
		$value = trim($value);
		$this->params[$param] = $value;
	}

	public function setTransactionType($type) {
		$this->params['x_type'] = strtoupper(trim($type));
	}

	private function _prepareParameters() {
		foreach ($this->params as $key => $value) {
			if(strlen(trim($value)) > 0) {
				$this->fields .= $key . "=" . urlencode($value) . "&";
			}
		}
	}

	public function getResultResponse() {
		return $this->results[0];
	}

	public function getResultResponseFull() {
		$response = array (
			"",
			"Approved",
			"Declined",
			"Error"
		);
		return $response[$this->results[0]];
	}

	public function isApproved() {
		return $this->approved;
	}

	public function isDeclined() {
		return $this->declined;
	}

	public function isError() {
		return $this->error;
	}
	
	public function getTotalAmountPaid() {
		return $this->results[9];
	}
	
	public function getResponseText() {
		return $this->results[3];
	}

	public function getAuthCode() {
		return $this->results[4];
	}

	public function getAVSResponse() {
		return $this->results[5];
	}

	public function getTransactionID() {
		return $this->results[6];
	}
	
}


?>