<?php

/**
 * Copyright (c) Extensionsforjoomla.com - E4J - Matteo Galletti <dev@extensionsforjoomla.com>
 *
 * You should have received a copy of the License
 * along with this program.  If not, see <http://www.extensionsforjoomla.com/>.
 *
 * For any bug, error please contact <dev@extensionsforjoomla.com>
 * We will try to fix it.
 *
 * Extensionsforjoomla.com - All Rights Reserved
 *
 */
defined('_JEXEC') OR die('Restricted Area');

class VikRentCarPayment {

	/**
	*	REDSYS SUPPORTED TRANSACTION TYPES
	*	purchase   => '0'
    *	authorize  => '1'
    *	capture    => '2'
    *	refund     => '3'
    *	cancel     => '9'
	*/

	private $params = array();

	private $order_info;

	public static function getAdminParameters() {
		return array(
			'logo' => array(
				'label' => '',
				'type' => 'custom',
				'html' => '<img src="'.JURI::root().'administrator'.DS.'components'.DS.$_REQUEST['option'].DS.'payments'.DS.'Redsys'.DS.'redsys_logo.jpg"/>'
			),
			'fullname' => array(
				'label' => 'Full Name',
				'type' => 'text'
			),
			'merchantname' => array(
				'label' => 'Merchant Name',
				'type' => 'text'
			),
			'terminal' => array(
				'label' => 'Terminal',
				'type' => 'text'
			),
			'code' => array(
				'label' => 'Merchant Code',
				'type' => 'text'
			),
			'secretkey' => array(
				'label' => 'Secret Key',
				'type' => 'text'
			),
			'keysign' => array(
				'label' => 'Key Signature',
				'type' => 'select',
				'options' => array('complete', 'amplified')
			),
			'transactiontype' => array(
				'label' => 'Transaction Type',
				'type' => 'select',
				'options' => array('purchase', 'authorize', 'capture')
			),
			'paymethod' => array(
				'label' => 'Payment Method',
				'type' => 'select',
				'options' => array('All Methods', 'Card Payment', 'Payment Iupay', 'Credit cards and Iupay')
			),
			'tpvurl' => array(
				'label' => 'Test Mode',
				'type' => 'select',
				'options' => array('No', 'Yes')
			),
			'currency' => array(
				'label' => 'Currency',
				'type' => 'select',
				'options' => array('ARS', 'AUD', 'BRL', 'BOB', 'CAD', 'CHF', 'CLP', 'COP', 'EUR', 'GBP', 'GTQ', 'JPY', 'MXN', 'NZD', 'PEN', 'RUB', 'USD', 'UYU')
			),
			'language' => array(
				'label' => 'Language',
				'type' => 'select',
				'options' => array('ES', 'EN', 'CA', 'FR', 'DE', 'NL', 'IT', 'SV', 'PT', 'VA', 'PL', 'GL', 'EU', 'Automatic')
			)
		);
	}

	public function __construct ($order, $params=array()) {
		$this->order_info = $order;

		$this->params = (!empty($params)) ? $params : $this->params;

		if( $this->params['keysign'] == 'complete' ) {
			$this->params['keysign'] = 1;
		} else { // amplified
			$this->params['keysign'] = 2;
		}

		switch( $this->params['transactiontype'] ) {
			case 'purchase': $this->params['transactiontype'] = 0; break;
			case 'authorize': $this->params['transactiontype'] = 1; break;
			case 'capture': $this->params['transactiontype'] = 2; break;
			default: $this->params['transactiontype'] = 1;
		}

		switch( $this->params['paymethod'] ) {
			case 'Card Payment': $this->params['paymethod'] = "C"; break;
			case 'Payment Iupay': $this->params['paymethod'] = "O"; break;
			case 'Credit cards and Iupay': $this->params['paymethod'] = "T"; break;
			default: $this->params['paymethod'] = "";
		}

		if( $this->params['tpvurl'] == 'No' ) {
			$this->params['tpvurl'] = 'https://sis.sermepa.es/sis/realizarPago';
			//$this->params['tpvurl'] = 'https://sis.redsys.es/sis/realizarPago';
		} else {
			$this->params['tpvurl'] = 'https://sis-t.sermepa.es:25443/sis/realizarPago';
			//$this->params['tpvurl'] = 'https://sis-t.redsys.es:25443/sis/realizarPago';
		}

		switch( $this->params['currency'] ) {
			case 'ARS': $this->params['currency'] = 032; break;
			case 'AUD': $this->params['currency'] = 036; break;
			case 'BRL': $this->params['currency'] = 986; break;
			case 'BOB': $this->params['currency'] = 068; break;
			case 'CAD': $this->params['currency'] = 124; break;
			case 'CHF': $this->params['currency'] = 756; break;
			case 'CLP': $this->params['currency'] = 152; break;
			case 'COP': $this->params['currency'] = 170; break;
			case 'EUR': $this->params['currency'] = 978; break;
			case 'GBP': $this->params['currency'] = 826; break;
			case 'GTQ': $this->params['currency'] = 320; break;
			case 'JPY': $this->params['currency'] = 392; break;
			case 'MXN': $this->params['currency'] = 484; break;
			case 'NZD': $this->params['currency'] = 554; break;
			case 'PEN': $this->params['currency'] = 604; break;
			case 'RUB': $this->params['currency'] = 643; break;
			case 'USD': $this->params['currency'] = 840; break;
			case 'UYU': $this->params['currency'] = 858; break;
			default: $this->params['currency'] = 978;
		}

		if($this->params['language'] == 'Automatic') {
			$this->params['language'] = strtoupper(substr(JFactory::getLanguage()->getTag(), 0, 2));
		}

		switch( $this->params['language'] ) {
			case 'ES': $this->params['language'] = '001'; break;
			case 'EN': $this->params['language'] = '002'; break;
			case 'CA': $this->params['language'] = '003'; break;
			case 'FR': $this->params['language'] = '004'; break;
			case 'DE': $this->params['language'] = '005'; break;
			case 'NL': $this->params['language'] = '006'; break;
			case 'IT': $this->params['language'] = '007'; break;
			case 'SV': $this->params['language'] = '008'; break;
			case 'PT': $this->params['language'] = '009'; break;
			case 'VA': $this->params['language'] = '010'; break;
			case 'PL': $this->params['language'] = '011'; break;
			case 'GL': $this->params['language'] = '012'; break;
			case 'EU': $this->params['language'] = '013'; break;
			default: $this->params['language'] = '001';
		}

	}

	public function showPayment() {
		//total amount is expressed in cents
		$this->order_info['total_to_pay'] = number_format(($this->order_info['total_to_pay'] * 100), 0, '', '');
		//

		$sys_id = $this->getOrderNumber();

		/*
		$sha1 = '';
		if( $this->params['keysign'] == 1 ) {
			// SHA1 complete
			$sha1 = $this->order_info['total_to_pay'].$sys_id.$this->params['code'].$this->params['currency'].$this->params['secretkey'];
		} else {
			// SHA1 amplified
			$sha1 = $this->order_info['total_to_pay'].$sys_id.$this->params['code'].$this->params['currency'].$this->params['transactiontype'].$this->order_info['notify_url'].$this->params['secretkey'];
		}

		$signature = strtoupper(sha1($sha1));
		*/

		$redsysOrderParams = Array(
			'Ds_Merchant_Amount' => $this->order_info['total_to_pay'],
			'Ds_Merchant_Currency' => $this->params['currency'],
			'Ds_Merchant_Order' => $sys_id,
			'Ds_Merchant_ProductDescription' => $this->order_info['transaction_name'].' ('.$this->order_info['order']['id'].')',
			'Ds_Merchant_Titular' => $this->params['fullname'],
			'Ds_Merchant_MerchantCode' => $this->params['code'],
			'Ds_Merchant_MerchantURL' => $this->order_info['notify_url'],
			'Ds_Merchant_UrlOK' => $this->order_info['return_url'],
			'Ds_Merchant_UrlKO' => $this->order_info['error_url'],
			'Ds_Merchant_MerchantName' => $this->params['merchantname'],
			'Ds_Merchant_ConsumerLanguage' => $this->params['language'],
			//'Ds_Merchant_MerchantSignature' => $signature,
			'Ds_Merchant_Terminal' => $this->params['terminal'],
			'Ds_Merchant_TransactionType' => $this->params['transactiontype'],
			'DS_Merchant_Paymethods' => $this->params['paymethod']
		);

		$signatureVersion = 'HMAC_SHA256_V1';
		$signature = $this->createSendSignature($this->params['secretkey'], $redsysOrderParams);

		$post_variables = array(
			'Ds_Merchant_MerchantCode' => $this->params['code'],
			'Ds_Merchant_Terminal' => $this->params['terminal'],
			'Ds_SignatureVersion' => $signatureVersion,
			'Ds_MerchantParameters' => base64_encode(json_encode($redsysOrderParams)),
			'Ds_Signature' => $signature,
		);

		$REDSYS_TPV_URL = $this->params['tpvurl'];

		$html = '';

		if( !$REDSYS_TPV_URL || !$this->params['code'] || !$this->params['terminal'] || !$this->params['currency'] || !$this->params['secretkey'] ) {
			$html .= '<p>'.$this->RSTEXT['REDSYS_PAYURL_ERROR'].'</p>';
			echo $html;
			return false;
		}

		$html .= '<form action="'.$REDSYS_TPV_URL.'" method="post" name="redsys_form" id="redsys_form">';
		$html .= '<input type="submit" name="submit" value="'.$this->RSTEXT['REDSYS_PAYNOW_BUTTON'].'" />';
		foreach( $post_variables as $name => $value ) {
			$html .= '<input type="hidden" name="'.$name.'" value="'.htmlspecialchars($value).'" />';
		}
		$html .= '</form>';

		echo $html;

		return true;

	}

	public function validatePayment() {

		$array_result = array();
		$array_result['log'] = "";
		$array_result['verified'] = 0;


		$sys_id = $this->getOrderNumber();

		$postData = JRequest::get('post');

		$redsysOrderParamsB64 = $postData['Ds_MerchantParameters'];
		$redsysOrderParamsJSon = base64_decode(strtr($redsysOrderParamsB64, '-_', '+/'));
		$redsys_post_data = json_decode($redsysOrderParamsJSon, true);

		if( !$redsys_post_data || empty($redsys_post_data) ) {
			$array_result['log'] = $this->RSTEXT['REDSYS_POST_ERROR'];
			return $array_result;
		}

		$array_result['tot_paid'] = (float)(intval($redsys_post_data['Ds_Amount'])/100.0);

		if( $redsys_post_data['Ds_Order'] != $sys_id ) {
			$array_result['log'] = $this->RSTEXT['REDSYS_ORDER_ERROR'];
			return $array_result;
		}
		/*
		if( (string)$redsys_post_data['Ds_Amount'] != (string)$this->order_info['total_to_pay'] && $array_result['tot_paid'] != $this->order_info['total_to_pay']) {
			$array_result['log'] = $this->RSTEXT['REDSYS_AMOUNT_ERROR'] . ' ['.(string)$redsys_post_data['Ds_Amount'].' != '.(string)$this->order_info['total_to_pay'].']';
			return $array_result;
		}
		*/
		//$sha256 = $redsys_post_data['Ds_Amount'].$redsys_post_data['Ds_Order'].$redsys_post_data['Ds_MerchantCode'].$redsys_post_data['Ds_Currency'].$redsys_post_data['Ds_Response'].$this->params['secretkey'];

		//$calc_signature = strtoupper(sha1($sha1)); old method
		//$calc_signature = strtoupper(hash('sha256', $sha256));
		$calc_signature = $this->createNotifySignature($this->params['secretkey'], $redsysOrderParamsB64);

		if( $postData['Ds_Signature'] != $calc_signature ) {
			$array_result['log'] = $this->RSTEXT['REDSYS_SIGNATURE_ERROR']."\n".print_r($postData, true)."\n".print_r($redsys_post_data, true)."\n".$calc_signature;
			return $array_result;
		}

		if( $redsys_post_data['Ds_Response'] >= 0 && $redsys_post_data['Ds_Response'] <= 99 && $redsys_post_data['Ds_AuthorisationCode'] ) {
			$array_result['verified'] = 1;
		} else {
			// PARA EVITAR LA MIERDA LA NOTIFICACION
			//$array_result['log'] = $this->RSTEXT['REDSYS_RESPONSE_ERROR'];
			$array_result['verified'] = 0;
		}

		return $array_result;
	}

	private function getOrderNumber() {
		$sys_id = empty($this->order_info['id']) ? $this->order_info['order']['id'] : $this->order_info['id'];
		//$sys_id = time();

		$len = strlen($sys_id);
		if( $len < 12 ) {
			for( $i = $len; $i < 12; $i++ ) {
				$sys_id = "0".$sys_id;
			}
		} else if( $len > 12 ) {
			$sys_id = substr($sys_id, -12);
		}

		return $sys_id;
	}

	private function createSendSignature($key, $post) {
		$redsysOrderParamsB64 = base64_encode(json_encode($post));

		$bytes = array(0, 0, 0, 0, 0, 0, 0, 0);
		$iv = implode(array_map("chr", $bytes));
		$cipherText = mcrypt_encrypt(MCRYPT_3DES, base64_decode($key), $post['Ds_Merchant_Order'], MCRYPT_MODE_CBC, $iv);
		$signature = hash_hmac('sha256', $redsysOrderParamsB64, $cipherText, true);

		return base64_encode($signature);
	}

	private function createNotifySignature($key, $post) {
		$redsysOrderParamsJSon = base64_decode(strtr($post, '-_', '+/'));
		$redsysOrderParamsArray = json_decode($redsysOrderParamsJSon, true);

		$bytes = array(0, 0, 0, 0, 0, 0, 0, 0);
		$iv = implode(array_map("chr", $bytes));
		$cipherText = mcrypt_encrypt(MCRYPT_3DES, base64_decode($key), $redsysOrderParamsArray['Ds_Order'], MCRYPT_MODE_CBC, $iv);
		$signature = hash_hmac('sha256', $post, $cipherText, true);

		return strtr(base64_encode($signature), '+/', '-_');
	}


	private $RSTEXT = array(
		'REDSYS_PAYNOW_BUTTON' => "Pagar Ahora",
		'REDSYS_PAYURL_ERROR' => "Error getting RedSys payment URL.",
		'REDSYS_POST_ERROR' => "Technical Error: No post data received.",
		'REDSYS_ORDER_ERROR' => "Technical Error: Order number doesn\'t match with that used in the POS order ID generation.",
		'REDSYS_AMOUNT_ERROR' => "Technical Error: Order Amount and received amount don't match.",
		'REDSYS_SIGNATURE_ERROR' => "Technical Error: The verification signatures don't match.",
		'REDSYS_RESPONSE_ERROR' => "Payment not authorized.",
	);

}

?>
