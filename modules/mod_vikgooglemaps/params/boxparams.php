<?php
/**------------------------------------------------------------------------
 * Mod_VikGoogleMaps - Vik Google Maps
 * ------------------------------------------------------------------------
 * author    Alessio Gaggii - Extensionsforjoomla.com
 * copyright Copyright (C) 2013 extensionsforjoomla.com. All Rights Reserved.
 * @license - http://www.gnu.org/licenses/gpl-2.0.html GNU/GPL
 * Websites: http://www.extensionsforjoomla.com
 * Technical Support:  tech@extensionsforjoomla.com
 * ------------------------------------------------------------------------
*/


defined('_JEXEC') or die ('Restricted access');

jimport('joomla.html.html');
jimport('joomla.form.formfield');

class JFormFieldHeader extends JFormField
{
	protected $type = 'boxparams';

	function getInput()
	{
		return $this->fetchElement($this->element['name'], $this->value, $this->element, $this->name);
	}
	
	function fetchElement($name, $value, &$node, $control_name)
	{
		$options = array(JText::_($value));
		foreach ($node->children() as $option)
		{
			$options[] = $option->data();
		}
		
		return sprintf('<div style="padding:10px; color:#666; font-weight:bold; text-align:left; font-size:14px;">%s</div>', call_user_func_array('sprintf', $options));
	}
}
?>
