<?php
/**
 * @package     Aikon smooth scroll
 *
 * @copyright   Copyright (C) 2014 Aikon CMS. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */
 
// Check to ensure this file is included in Joomla!
defined('_JEXEC') or die('Restricted access');

jimport('joomla.form.formfield');

class JFormFieldStyler extends JFormField {

    protected $type = 'styler';

    public function getLabel(){
		
	}

    public function getInput() {
		// Add styles
		$document = JFactory::getDocument();
		$document->addStyleSheet( JURI::root() . 'plugins/system/aikon_smooth_scroll/assets/css/backend.css');

    }
}