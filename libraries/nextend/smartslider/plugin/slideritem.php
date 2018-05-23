<?php
/*
# author Roland Soos
# copyright Copyright (C) Nextendweb.com. All Rights Reserved.
# @license - http://www.gnu.org/licenses/gpl-3.0.txt GNU/GPL
*/
defined('_JEXEC') or die('Restricted access'); ?><?php

nextendimport('nextend.parse.parse');

class plgNextendSliderItemAbstract extends NextendPluginBase {
    
    var $_identifier = 'identifier';
    
    var $_title = 'Title';
    
    function onNextendSliderItemList(&$list){
        $list[$this->_identifier] = array(NextendText::_($this->_title), $this->getTemplate(), $this->getPrefilledTemplate(), json_encode($this->getValues()), $this->getPath());
    }
    
    function onNextendSliderItemShortcode(&$list){
        $list[$this->_identifier] = $this;
    }
    
    /*
     * Here comes the HTML source of the item. {param_name} are identifier for the parameters in the configuration.xml params(linked with the parameter name).
     * Parser.js may define custom variables for this.
     */
    function getTemplate(){
        return "{nothing}";
    }
    
    function render($data, $id, $sliderid, $items){
        return $this->_render($data, $id, $sliderid, $items);
    }
    
    function renderAdmin($data, $id, $sliderid, $items){
        global $slidegenerator;
        
        $json = $data->toJson();
        if($slidegenerator){
            /*
            This happens when we have to fill out data from the generator in the editor view with variables.
            */
            $slidegenerator->_slidePointer = 0;
            $data->loadArray($slidegenerator->createSlide(0, $data->toArray(), true));
        }
        return '<div class="smart-slider-items" data-item="'.$this->_identifier.'" data-itemvalues="'.htmlspecialchars($json, ENT_QUOTES).'">'.$this->_renderAdmin($data, $id, $sliderid, $items).'</div>';
    }
    
    function _render($data, $id, $sliderid, $items){
        return $this->getTemplate();
    }
    
    function _renderAdmin($data, $id, $sliderid, $items){
        return $this->getTemplate();
    }
    
    /*
     * Set default values into the template
     */
    function getPrefilledTemplate(){
        $html = $this->getTemplate();
        foreach($this->getValues() AS $k => $v){
            $html = str_replace('{'.$k.'}',$v,$html);
        }
        return $html;
    }
    
    /*
     * Default values, which will be parsed by JS on the admin for default values. It should contain only the fields from the configuration.xml.
     */
    function getValues(){
        return array(
            'nothing' => 'Abstract'
        );
    }
    
    function getPath(){
        return dirname(__FILE__).DIRECTORY_SEPARATOR.self::$_identifier.DIRECTORY_SEPARATOR;
    }  
}