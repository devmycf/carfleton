<?php 
/**------------------------------------------------------------------------
 * mod_vikcontactform
 * ------------------------------------------------------------------------
 * author    Valentina Arras - Extensionsforjoomla.com
 * copyright Copyright (C) 2014 extensionsforjoomla.com. All Rights Reserved.
 * @license - http://www.gnu.org/licenses/gpl-2.0.html GNU/GPL
 * Websites: http://www.extensionsforjoomla.com
 * Technical Support:  templates@extensionsforjoomla.com
 * ------------------------------------------------------------------------
*/

// no direct access
defined('_JEXEC') or die;

// Include the syndicate functions only once
require_once dirname(__FILE__).'/helper.php';

$document = & JFactory :: getDocument();
$document->addStyleSheet(JURI::root().'modules/mod_vikcontactform/mod_vikcontactform.css');

$sendmail = JRequest::getString('mailsubmsend');

if(!empty($sendmail)) {
	//send email fields
	$pname = JRequest::getString('name');
	$psurname = JRequest::getString('surname');
	$ptelephone = JRequest::getString('telephone');
	$pemail = JRequest::getString('email');
	$psubject = JRequest::getString('subject');
	$pmessage = JRequest::getString('message');
	$pemailto = $params->get('emailto');

	$message = JText::_('VIKCF_INTRODUCTION');
	$message .= "<br />";

	if($params->get('name') == 1) {
		$message .= JText::_('VIKCF_NAME').": ".$pname;
		$message .= "<br />";
	}
	if($params->get('surname') == 1) {
		$message .= JText::_('VIKCF_SURNAME').": ".$psurname;
		$message .= "<br />";
	}
	if($params->get('telephone') == 1) {
		$message .= JText::_('VIKCF_PHONE').": ".$ptelephone;
		$message .= "<br />";
	}
	if($params->get('email') == 1) {
		$message .= JText::_('VIKCF_EMAIL').": ".$pemail;
		$message .= "<br />";
	}
	if($params->get('subject') == 1) {
		$message .= JText::_('VIKCF_SUBJECT').": ".$psubject;
		$message .= "<br />";
	}
	if($params->get('textfield') == 1) {
		$message .= JText::_('VIKCF_MESSAGE');
		$message .= "<br />";
		$message .= $pmessage;
		$message .= "<br />";
	}

	//send mail
	$mailer =& JFactory::getMailer();
	$sender = array($pemail, $pname); //prima var = from_indirizzo_email, seconda var = from_nome
	$mailer->setSender($sender); //lasciare così
	$mailer->addRecipient($pemailto); // var $to = indirizzo email destinatario
	$mailer->addReplyTo($pemailto); //variabile con indirizzo email alla quale rispondere, può essere = $from_address
	$mailer->setSubject(JText::_('VIKCF_SUBJECTEMAIL')); //var con oggetto email
	$mailer->setBody($message); //var con contenuto messaggio (testo o html)
	$mailer->isHTML(true); //mettere a false se è plain text e non html
	$mailer->Encoding = 'base64'; //lasciare così
	$mailer->Send(); //lasciare così
}

require JModuleHelper::getLayoutPath('mod_vikcontactform', $params->get('layout', 'default'));
