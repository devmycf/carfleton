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

defined('_JEXEC') or die('Restricted Area'); 

$document = & JFactory :: getDocument();

$document->addStyleSheet(JURI::base().'modules/mod_vikcontactform/mod_vikcontactform.css');
$document->addStyleSheet(JURI::base().'templates/jsn_yoyo_pro/html/com_vikrentcar/vikrentcar_theme.css');


$get_width = $params->get('width');
$get_height = $params->get('height');

$placeholder_name = JText::_('VIKCF_NAME');
$placeholder_surname = JText::_('VIKCF_SURNAME');
$placeholder_telephone = JText::_('VIKCF_TELEPHONE');
$placeholder_email = JText::_('VIKCF_EMAIL');
$placeholder_subject = JText::_('VIKCF_SUBJECT');
$placeholder_message = JText::_('VIKCF_MESSAGE');

$return	= modvikcontentformHelper::getReturnURL($params, 'login');
?>
<div class="titlecover cover-contacto"><div class="titlecovername"><div class="titlestep"><img src="http://carflet.es/images/carflet/contacto.svg"></div><h3>Contacto</h3><h4>Contacta con nosotros</h4></div>
<form class="email" action="<?php echo $return; ?>" method="post">
	<?php if($params->get('name') == 1) {?>
	<div class="vikcf-name">
		<?php if($params->get('plabel') == 1) {?>
			<label><?php echo $placeholder_name; ?>:</label>
		<?php } ?>
		<input type="text" name="name" placeholder="<?php echo $placeholder_name; ?>" />
	</div>
	<?php } ?>
	<?php if($params->get('surname') == 1) {?>
	<div class="vikcf-surname">
		<?php if($params->get('plabel') == 1) {?>
			<label><?php echo $placeholder_surname; ?>:</label>
		<?php } ?>
		<input type="text" name="surname" placeholder="<?php echo $placeholder_surname; ?>" />
	</div>
	<?php } ?>
	<?php if($params->get('telephone') == 1) {?>
	<div class="vikcf-telephone">
		<?php if($params->get('plabel') == 1) {?>
			<label><?php echo $placeholder_telephone; ?>:</label>
		<?php } ?>
		<input type="text" name="telephone" placeholder="<?php echo $placeholder_telephone; ?>" />
	</div>
	<?php } ?>
	<?php if($params->get('email') == 1) {?>
	<div class="vikcf-email">
		<?php if($params->get('plabel') == 1) {?>
			<label><?php echo $placeholder_email; ?>:</label>
		<?php } ?>
		<input type="text" name="email" placeholder="<?php echo $placeholder_email; ?>" />
	</div>
	<?php } ?>
	<?php if($params->get('textfield') == 1) {?>
	<div class="vikcf-message">
		<?php if($params->get('subject') == 1) {?>
			<?php if($params->get('plabel') == 1) {?>
				<label><?php echo $placeholder_subject; ?>:</label>
			<?php } ?>
			<input type="text" name="subject" placeholder="<?php echo $placeholder_subject; ?>" />
		<?php } ?>
		<?php if($params->get('plabel') == 1) {?>
			<label><?php echo $placeholder_message; ?>:</label>
		<?php } ?>
		<textarea name="message" placeholder="<?php echo $placeholder_message; ?>"></textarea>
	</div>
	<?php } ?>
	<input class="send" type="submit" value="Enviar" name="mailsubmsend">
</form>
</div>