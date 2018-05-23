<?php
/**
* Mod_VikRentCar_Search
* http://www.extensionsforjoomla.com
*/

defined('_JEXEC') or die('Restricted Area');
error_reporting(0);

class modVikrentcarSearchHelper {

    function getFormattingText(&$params){
        $tx = $params->get('heading_text');
        $tag = $params->get('tag_heading');
        $cssc = $params->get('css_tag_heading');
        if(strlen($tx)){
        	if(strlen($tag)){
        		$tag=str_replace("<", "", $tag);
        		$tag=str_replace(">", "", $tag);
        		$tag=str_replace("/", "", $tag);
        		return "<".$tag.(!empty($cssc) ? " class=\"".$cssc."\"" : "").">".$tx."</".$tag.">";
        	}else{
        		return $tx."<br/>";
        	}
        }
        return "";
    }
	
	function mgetHoursMinutes($secs) {
		if ($secs >= 3600) {
			$op = $secs / 3600;
			$hours = floor($op);
			$less = $hours * 3600;
			$newsec = $secs - $less;
			$optwo = $newsec / 60;
			$minutes = floor($optwo);
		} else {
			$hours = "0";
			$optwo = $secs / 60;
			$minutes = floor($optwo);
		}
		$x[] = $hours;
		$x[] = $minutes;
		return $x;
	}
	
	function formatLocationClosingDays($clostr) {
		$ret = array();
		$x = explode(",", $clostr);
		foreach($x as $y) {
			if (strlen(trim($y)) > 0) {
				$parts = explode("-", trim($y));
				$date = date('Y-n-j', mktime(0, 0, 0, $parts[1], $parts[2], $parts[0]));
				if (strlen($date) > 0) {
					$ret[] = '"'.$date.'"';
				}
			}
		}
		return $ret;
	}
	
	function setDropDatePlus() {
		$session =& JFactory::getSession();
		$sval = $session->get('setDropDatePlus', '');
		if(!empty($sval)) {
			return $sval;
		}else {
			$dbo = & JFactory :: getDBO();
			$q = "SELECT `setting` FROM `#__vikrentcar_config` WHERE `param`='setdropdplus';";
			$dbo->setQuery($q);
			$dbo->Query($q);
			$s = $dbo->loadAssocList();
			return $s[0]['setting'];
		}
	}
	
}

?>
