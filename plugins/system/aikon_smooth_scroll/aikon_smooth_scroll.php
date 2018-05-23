<?php
/**
 * @package     Aikon smooth scroll
 *
 * @copyright   Copyright (C) 2014 Aikon CMS. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */
// no direct access
defined('_JEXEC') or die;

class plgSystemAikon_smooth_scroll extends JPlugin
{
    
   /**
	* Path to assets
	*
	* @var    string  $assetPath
	*
	* @since  1.0
	*/	
	public $assetPath = '';  
	
	
	public function __construct( &$subject, $config )
	{
		parent::__construct( $subject, $config );
		$this->assetPath = 'plugins/system/aikon_smooth_scroll/assets/';
	} 

	public function onBeforeRender()
    {
		
		$app = JFactory::getApplication();
		
		// if admin - exit
		if ( $app->isAdmin() ) {
			return true;
		}
		
		// get doc
		$doc = JFactory::getDocument();	
		
		// if needed load jquery
		if ( $this->params->get('loadJquery') ){
			$doc->addScript('//ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js');
		}

		// load webkit smoothScroll
		$doc->addScript($this->assetPath . 'js/SmoothScroll.js');

		return true;
    }
}

?>