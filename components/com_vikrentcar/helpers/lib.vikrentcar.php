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
defined('_JEXEC') or die('Restricted access');
error_reporting(VIKRENTCAR_ERROR_REPORTING);

if (!function_exists('showSelect')) {
	function showSelect($err) {
		if (vikrentcar :: allowRent()) {
			$dbo = & JFactory :: getDBO();
			//vikrentcar 1.5
			$calendartype = vikrentcar::calendarType();
			$document = & JFactory :: getDocument();
			//load jQuery lib e jQuery UI
			if(vikrentcar::loadJquery()) {
				JHtml::_('jquery.framework', true, true);
				JHtml::_('script', JURI::root().'components/com_vikrentcar/resources/jquery-1.10.2.min.js', false, true, false, false);
			}
			if($calendartype == "jqueryui") {
				$document->addStyleSheet(JURI::root().'components/com_vikrentcar/resources/jquery-ui-1.10.3.custom.css');
				//load jQuery UI
				JHtml::_('script', JURI::root().'components/com_vikrentcar/resources/jquery-ui-1.10.3.custom.min.js', false, true, false, false);
			}
			//
			$ppickup = JRequest :: getInt('pickup', '', 'request');
			$preturn = JRequest :: getInt('return', '', 'request');
			$pitemid = JRequest :: getInt('Itemid', '', 'request');
			$pval = "";
			$rval = "";
			$vrcdateformat = vikrentcar::getDateFormat();
			if ($vrcdateformat == "%d/%m/%Y") {
				$df = 'd/m/Y';
			}elseif ($vrcdateformat == "%m/%d/%Y") {
				$df = 'm/d/Y';
			}else {
				$df = 'Y/m/d';
			}
			if (!empty ($ppickup)) {
				$dp = date($df, $ppickup);
				if (vikrentcar :: dateIsValid($dp)) {
					$pval = $dp;
				}
			}
			if (!empty ($preturn)) {
				$dr = date($df, $preturn);
				if (vikrentcar :: dateIsValid($dr)) {
					$rval = $dr;
				}
			}
			$coordsplaces = array();

			$selform = "<div class=\"vrcdivsearch\"><form action=\"".JRoute::_('index.php?option=com_vikrentcar')."\" method=\"get\">\n";
			$selform .= "<input type=\"hidden\" name=\"option\" value=\"com_vikrentcar\"/>\n";
			$selform .= "<input type=\"hidden\" name=\"task\" value=\"search\"/>\n";
			$diffopentime = false;
			$closingdays = array();
			$declclosingdays = '';
			if (vikrentcar :: showPlacesFront()) {
				$q = "SELECT * FROM `#__vikrentcar_places` ORDER BY `#__vikrentcar_places`.`name` ASC;";
				$dbo->setQuery($q);
				$dbo->Query($q);
				if ($dbo->getNumRows() > 0) {
					$places = $dbo->loadAssocList();
					//check if some place has a different opening time (1.6)
					foreach ($places as $pla) {
						if(!empty($pla['opentime'])) {
							$diffopentime = true;
						}
						//check if some place has closing days
						if(!empty($pla['closingdays'])) {
							$closingdays[$pla['id']] = $pla['closingdays'];
						}
					}
					//locations closing days (1.7)
					if (count($closingdays) > 0) {
						foreach($closingdays as $idpla => $clostr) {
							$jsclosingdstr = vikrentcar::formatLocationClosingDays($clostr);
							if (count($jsclosingdstr) > 0) {
								$declclosingdays .= 'var loc'.$idpla.'closingdays = ['.implode(", ", $jsclosingdstr).'];'."\n";
							}
						}
					}
					$onchangeplaces = $diffopentime == true ? " onchange=\"javascript: vrcSetLocOpenTime(this.value, 'pickup');\"" : "";
					$onchangeplacesdrop = $diffopentime == true ? " onchange=\"javascript: vrcSetLocOpenTime(this.value, 'dropoff');\"" : "";
					if($diffopentime == true) {
						$onchangedecl = '
jQuery.noConflict();

	jQuery("#place").sexyCombo({triggerSelected: true});

function vrcSetLocOpenTime(loc, where) {
	jQuery.ajax({
		type: "POST",
		url: "'.JRoute::_('index.php?option=com_vikrentcar&task=ajaxlocopentime&tmpl=component').'",
		data: { idloc: loc, pickdrop: where }
	}).done(function(res) {
		var vrcobj = jQuery.parseJSON(res);
		if(where == "pickup") {
			jQuery("#vrccomselph").html(vrcobj.hours);
			jQuery("#vrccomselpm").html(vrcobj.minutes);
			jQuery("[name=returnplace]").val(loc);
		}else {
			jQuery("#vrccomseldh").html(vrcobj.hours);
			jQuery("#vrccomseldm").html(vrcobj.minutes);
		}
	});
}';
						$document->addScriptDeclaration($onchangedecl);
					}
					//end check if some place has a different opningtime (1.6)
					$selform .= "<div class=\"vrcsfentrycont\"><label>" . JText :: _('VRPPLACE') . "</label><div class=\"vrcsfentryselect\"><select name=\"place\" id=\"place\"".$onchangeplaces.">";
					foreach ($places as $pla) {
						$selform .= "<option value=\"" . $pla['id'] . "\" id=\"place".$pla['id']."\">" . $pla['name'] . "</option>\n";
						if(!empty($pla['lat']) && !empty($pla['lng'])) {
							$coordsplaces[] = $pla;
						}
					}
					$selform .= "</select></div></div>\n";
				}
			}

			if($diffopentime == true && is_array($places) && strlen($places[0]['opentime']) > 0) {
				$parts = explode("-", $places[0]['opentime']);
				if (is_array($parts) && $parts[0] != $parts[1]) {
					$opent = vikrentcar :: getHoursMinutes($parts[0]);
					$closet = vikrentcar :: getHoursMinutes($parts[1]);
					$i = $opent[0];
					$imin = $opent[1];
					$j = $closet[0];
				} else {
					$i = 0;
					$imin = 0;
					$j = 23;
				}
			}else {
				$timeopst = vikrentcar :: getTimeOpenStore();
				if (is_array($timeopst) && $timeopst[0] != $timeopst[1]) {
					$opent = vikrentcar :: getHoursMinutes($timeopst[0]);
					$closet = vikrentcar :: getHoursMinutes($timeopst[1]);
					$i = $opent[0];
					$imin = $opent[1];
					$j = $closet[0];
				} else {
					$i = 0;
					$imin = 0;
					$j = 23;
				}
			}
			$hours = "";
			while ($i <= $j) {
				if ($i < 10) {
					$i = "0" . $i;
				} else {
					$i = $i;
				}
				$hours .= "<option value=\"" . $i . "\">" . $i . "</option>\n";
				$i++;
			}
			$minutes = "";
			for ($i = 0; $i < 60; $i += 15) {
				if ($i < 10) {
					$i = "0" . $i;
				} else {
					$i = $i;
				}
				$minutes .= "<option value=\"" . $i . "\"".((int)$i == $imin ? " selected=\"selected\"" : "").">" . $i . "</option>\n";
			}

			//vikrentcar 1.5
			if($calendartype == "jqueryui") {
				if ($vrcdateformat == "%d/%m/%Y") {
					$juidf = 'dd/mm/yy';
				}elseif ($vrcdateformat == "%m/%d/%Y") {
					$juidf = 'mm/dd/yy';
				}else {
					$juidf = 'yy/mm/dd';
				}
				//lang for jQuery UI Calendar
				$ldecl = '
jQuery(function($){'."\n".'
	$.datepicker.regional["vikrentcar"] = {'."\n".'
		closeText: "'.JText::_('VRCJQCALDONE').'",'."\n".'
		prevText: "'.JText::_('VRCJQCALPREV').'",'."\n".'
		nextText: "'.JText::_('VRCJQCALNEXT').'",'."\n".'
		currentText: "'.JText::_('VRCJQCALTODAY').'",'."\n".'
		monthNames: ["'.JText::_('VRMONTHONE').'","'.JText::_('VRMONTHTWO').'","'.JText::_('VRMONTHTHREE').'","'.JText::_('VRMONTHFOUR').'","'.JText::_('VRMONTHFIVE').'","'.JText::_('VRMONTHSIX').'","'.JText::_('VRMONTHSEVEN').'","'.JText::_('VRMONTHEIGHT').'","'.JText::_('VRMONTHNINE').'","'.JText::_('VRMONTHTEN').'","'.JText::_('VRMONTHELEVEN').'","'.JText::_('VRMONTHTWELVE').'"],'."\n".'
		monthNamesShort: ["'.mb_substr(JText::_('VRMONTHONE'), 0, 3, 'UTF-8').'","'.mb_substr(JText::_('VRMONTHTWO'), 0, 3, 'UTF-8').'","'.mb_substr(JText::_('VRMONTHTHREE'), 0, 3, 'UTF-8').'","'.mb_substr(JText::_('VRMONTHFOUR'), 0, 3, 'UTF-8').'","'.mb_substr(JText::_('VRMONTHFIVE'), 0, 3, 'UTF-8').'","'.mb_substr(JText::_('VRMONTHSIX'), 0, 3, 'UTF-8').'","'.mb_substr(JText::_('VRMONTHSEVEN'), 0, 3, 'UTF-8').'","'.mb_substr(JText::_('VRMONTHEIGHT'), 0, 3, 'UTF-8').'","'.mb_substr(JText::_('VRMONTHNINE'), 0, 3, 'UTF-8').'","'.mb_substr(JText::_('VRMONTHTEN'), 0, 3, 'UTF-8').'","'.mb_substr(JText::_('VRMONTHELEVEN'), 0, 3, 'UTF-8').'","'.mb_substr(JText::_('VRMONTHTWELVE'), 0, 3, 'UTF-8').'"],'."\n".'
		dayNames: ["'.JText::_('VRCJQCALSUN').'", "'.JText::_('VRCJQCALMON').'", "'.JText::_('VRCJQCALTUE').'", "'.JText::_('VRCJQCALWED').'", "'.JText::_('VRCJQCALTHU').'", "'.JText::_('VRCJQCALFRI').'", "'.JText::_('VRCJQCALSAT').'"],'."\n".'
		dayNamesShort: ["'.mb_substr(JText::_('VRCJQCALSUN'), 0, 3, 'UTF-8').'", "'.mb_substr(JText::_('VRCJQCALMON'), 0, 3, 'UTF-8').'", "'.mb_substr(JText::_('VRCJQCALTUE'), 0, 3, 'UTF-8').'", "'.mb_substr(JText::_('VRCJQCALWED'), 0, 3, 'UTF-8').'", "'.mb_substr(JText::_('VRCJQCALTHU'), 0, 3, 'UTF-8').'", "'.mb_substr(JText::_('VRCJQCALFRI'), 0, 3, 'UTF-8').'", "'.mb_substr(JText::_('VRCJQCALSAT'), 0, 3, 'UTF-8').'"],'."\n".'
		dayNamesMin: ["'.mb_substr(JText::_('VRCJQCALSUN'), 0, 2, 'UTF-8').'", "'.mb_substr(JText::_('VRCJQCALMON'), 0, 2, 'UTF-8').'", "'.mb_substr(JText::_('VRCJQCALTUE'), 0, 2, 'UTF-8').'", "'.mb_substr(JText::_('VRCJQCALWED'), 0, 2, 'UTF-8').'", "'.mb_substr(JText::_('VRCJQCALTHU'), 0, 2, 'UTF-8').'", "'.mb_substr(JText::_('VRCJQCALFRI'), 0, 2, 'UTF-8').'", "'.mb_substr(JText::_('VRCJQCALSAT'), 0, 2, 'UTF-8').'"],'."\n".'
		weekHeader: "'.JText::_('VRCJQCALWKHEADER').'",'."\n".'
		dateFormat: "'.$juidf.'",'."\n".'
		firstDay: 1,'."\n".'
		isRTL: false,'."\n".'
		showMonthAfterYear: false,'."\n".'
		yearSuffix: ""'."\n".'
	};'."\n".'
	$.datepicker.setDefaults($.datepicker.regional["vikrentcar"]);'."\n".'
});';
				$document->addScriptDeclaration($ldecl);
				//
				//locations closing days (1.7)
				if (strlen($declclosingdays) > 0) {
					$declclosingdays .= '
jQuery.noConflict();
function pickupClosingDays(date) {
	dmy = date.getFullYear() + "-" + (date.getMonth() + 1) + "-" + date.getDate();
	var arrlocclosd = jQuery("#place").val();
	var checklocarr = window["loc"+arrlocclosd+"closingdays"];
	if (jQuery.inArray(dmy, checklocarr) == -1) {
		return [true, ""];
	} else {
		return [false, "", "'.addslashes(JText::_('VRCLOCDAYCLOSED')).'"];
	}
}
function dropoffClosingDays(date) {
	dmy = date.getFullYear() + "-" + (date.getMonth() + 1) + "-" + date.getDate();
	var arrlocclosd = jQuery("#returnplace").val();
	var checklocarr = window["loc"+arrlocclosd+"closingdays"];
	if (jQuery.inArray(dmy, checklocarr) == -1) {
		return [true, ""];
	} else {
		return [false, "", "'.addslashes(JText::_('VRCLOCDAYCLOSED')).'"];
	}
}';
					$document->addScriptDeclaration($declclosingdays);
				}
				//
				//Minimum Num of Days of Rental (VRC 1.8)
				$dropdayplus = vikrentcar::setDropDatePlus();
				$forcedropday = "jQuery('#releasedate').datepicker( 'option', 'minDate', selectedDate );";
				if (strlen($dropdayplus) > 0 && intval($dropdayplus) > 0) {
					$forcedropday = "
var vrcdate = jQuery(this).datepicker('getDate');
if(vrcdate) {
	vrcdate.setDate(vrcdate.getDate() + ".$dropdayplus.");
	jQuery('#releasedate').datepicker( 'option', 'minDate', vrcdate );
	jQuery('#releasedate').val(jQuery.datepicker.formatDate('".$juidf."', vrcdate));
}";
				}
				//
				$sdecl = "
jQuery.noConflict();
jQuery(function(){
	jQuery.datepicker.setDefaults( jQuery.datepicker.regional[ '' ] );
	jQuery('#pickupdate').datepicker({
		showOn: 'both',
		buttonImage: '".JURI::root()."components/com_vikrentcar/resources/images/calendar.png',
		buttonImageOnly: true,
		onSelect: function( selectedDate ) {
			".$forcedropday."
		}".(strlen($declclosingdays) > 0 ? ", beforeShowDay: pickupClosingDays" : "")."
	});
	jQuery('#pickupdate').datepicker( 'option', 'dateFormat', '".$juidf."');
	jQuery('#pickupdate').datepicker( 'option', 'minDate', '0d');
	jQuery('#releasedate').datepicker({
		showOn: 'both',
		buttonImage: '".JURI::root()."components/com_vikrentcar/resources/images/calendar.png',
		buttonImageOnly: true,
		onSelect: function( selectedDate ) {
			jQuery('#pickupdate').datepicker( 'option', 'maxDate', selectedDate );
		}".(strlen($declclosingdays) > 0 ? ", beforeShowDay: dropoffClosingDays" : "")."
	});
	jQuery('#releasedate').datepicker( 'option', 'dateFormat', '".$juidf."');
	jQuery('#releasedate').datepicker( 'option', 'minDate', '0d');
	jQuery('#pickupdate').datepicker( 'option', jQuery.datepicker.regional[ 'vikrentcar' ] );
	jQuery('#releasedate').datepicker( 'option', jQuery.datepicker.regional[ 'vikrentcar' ] );
});";
				$document->addScriptDeclaration($sdecl);
				$selform .= "<div class=\"vrcsfentrycont\"><div class=\"vrcsfentrylabsel\"><label>" . JText :: _('VRPICKUPCAR') . "</label><div class=\"vrcsfentrydate\"><input type=\"text\" name=\"pickupdate\" id=\"pickupdate\" size=\"10\"/></div></div><div class=\"vrcsfentrytime\"><label>" . JText :: _('VRALLE') . "</label><span id=\"vrccomselph\"><select name=\"pickuph\">" . $hours . "</select></span><span class=\"vrctimesep\">:</span><span id=\"vrccomselpm\"><select name=\"pickupm\">" . $minutes . "</select></span></div></div>\n";
				$selform .= "<div class=\"vrcsfentrycont\"><div class=\"vrcsfentrylabsel\"><label>" . JText :: _('VRRETURNCAR') . "</label><div class=\"vrcsfentrydate\"><input type=\"text\" name=\"releasedate\" id=\"releasedate\" size=\"10\"/></div></div><div class=\"vrcsfentrytime\"><label>" . JText :: _('VRALLEDROP') . "</label><span id=\"vrccomseldh\"><select name=\"releaseh\">" . $hours . "</select></span><span class=\"vrctimesep\">:</span><span id=\"vrccomseldm\"><select name=\"releasem\">" . $minutes . "</select></span></div></div>";
			}else {
				//default Joomla Calendar
				JHTML :: _('behavior.calendar');
				$selform .= "<div class=\"vrcsfentrycont\"><div class=\"vrcsfentrylabsel\"><label>" . JText :: _('VRPICKUPCAR') . "</label><div class=\"vrcsfentrydate\">" . JHTML :: _('calendar', '', 'pickupdate', 'pickupdate', $vrcdateformat, array (
					'class' => '',
					'size' => '10',
					'maxlength' => '19'
				)) . "</div></div><div class=\"vrcsfentrytime\"><label>" . JText :: _('VRALLE') . "</label><span id=\"vrccomselph\"><select name=\"pickuph\">" . $hours . "</select></span><span class=\"vrctimesep\">:</span><span id=\"vrccomselpm\"><select name=\"pickupm\">" . $minutes . "</select></span></div></div>\n";
				$selform .= "<div class=\"vrcsfentrycont\"><div class=\"vrcsfentrylabsel\"><label>" . JText :: _('VRRETURNCAR') . "</label><div class=\"vrcsfentrydate\">" . JHTML :: _('calendar', '', 'releasedate', 'releasedate', $vrcdateformat, array (
					'class' => '',
					'size' => '10',
					'maxlength' => '19'
				)) . "</div></div><div class=\"vrcsfentrytime\"><label>" . JText :: _('VRALLEDROP') . "</label><span id=\"vrccomseldh\"><select name=\"releaseh\">" . $hours . "</select></span><span class=\"vrctimesep\">:</span><span id=\"vrccomseldm\"><select name=\"releasem\">" . $minutes . "</select></span></div></div>";
			}
			//
			if (@ is_array($places)) {
				$selform .= "<div class=\"vrcsfentrycont\"><label>" . JText :: _('VRRETURNCARORD') . "</label><div class=\"vrcsfentryselect\"><select name=\"returnplace\" id=\"returnplace\"".(strlen($onchangeplacesdrop) > 0 ? $onchangeplacesdrop : "").">";
				foreach ($places as $pla) {
					$selform .= "<option value=\"" . $pla['id'] . "\" id=\"returnplace".$pla['id']."\">" . $pla['name'] . "</option>\n";
				}
				$selform .= "</select></div></div>\n";
			}
			if (vikrentcar :: showCategoriesFront()) {
				$q = "SELECT * FROM `#__vikrentcar_categories` ORDER BY `#__vikrentcar_categories`.`name` ASC;";
				$dbo->setQuery($q);
				$dbo->Query($q);
				if ($dbo->getNumRows() > 0) {
					$categories = $dbo->loadAssocList();
					$selform .= "<div class=\"vrcsfentrycont\"><label>" . JText :: _('VRCARCAT') . "</label><div class=\"vrcsfentryselect\"><select name=\"categories\">";
					$selform .= "<option value=\"all\">" . JText :: _('VRALLCAT') . "</option>\n";
					foreach ($categories as $cat) {
						$selform .= "<option value=\"" . $cat['id'] . "\">" . $cat['name'] . "</option>\n";
					}
					$selform .= "</select></div></div>\n";
				}
			}
			$selform .= "<div class=\"vrcsfentrycont\"><div class=\"vrcsfentrysubmit\"><input type=\"submit\" name=\"search\" value=\"" . vikrentcar :: getSubmitName() . "\"" . (strlen(vikrentcar :: getSubmitClass()) ? " class=\"" . vikrentcar :: getSubmitClass() . "\"" : "") . "/></div></div>\n";
			$selform .= "\n";
			//locations on google map
			if(count($coordsplaces) > 0) {
				JHTML::_('behavior.modal');
				$selform .= '<div class="vrclocationsbox"><div class="vrclocationsmapdiv"><a href="'.JURI::root().'index.php?option=com_vikrentcar&view=locationsmap&tmpl=component" rel="{handler: \'iframe\', size: {x: 750, y: 600}}" class="modal" target="_blank">'.JText::_('VRCLOCATIONSMAP').'</a></div></div>';
			}
			//
			$selform .= (!empty ($pitemid) ? "<input type=\"hidden\" name=\"Itemid\" value=\"" . $pitemid . "\"/>" : "") . "</form></div>";
			echo vikrentcar :: getFullFrontTitle();
			echo vikrentcar :: getIntroMain();
			if (strlen($err)) {
				echo "<p class=\"err\">" . $err . "</p>";
			}
			echo $selform;
			echo vikrentcar :: getClosingMain();
			//echo javascript to fill the date values
			if (!empty ($pval) && !empty ($rval)) {
				if($calendartype == "jqueryui") {
					?>
					<script language="JavaScript" type="text/javascript">
					jQuery.noConflict();
					jQuery(function(){
						jQuery('#pickupdate').val('<?php echo $pval; ?>');
						jQuery('#releasedate').val('<?php echo $rval; ?>');
					});
					</script>
					<?php
				}else {
					?>
					<script language="JavaScript" type="text/javascript">
					document.getElementById('pickupdate').value='<?php echo $pval; ?>';
					document.getElementById('releasedate').value='<?php echo $rval; ?>';
					</script>
					<?php
				}
			}
			//
		} else {
			echo vikrentcar :: getDisabledRentMsg();
		}
	}
}

class vikrentcar {

	function addJoomlaUser($name, $username, $email, $password) {
		jimport('joomla.version');
		$version = new JVersion();
		$jv=$version->getShortVersion();
		if(version_compare($jv, '1.6.0') < 0) {
			//Joomla 1.5
			jimport('joomla.user.helper');
			$user = clone(JFactory::getUser(0));
			$config=& JFactory::getConfig();
			$authorize=& JFactory::getACL();
			$document =& JFactory::getDocument();
			$newUsertype = 'Registered';
			$salt = JUserHelper::genRandomPassword(32);
			$crypt = JUserHelper::getCryptedPassword($password, $salt);
			$password = $crypt.':'.$salt;
			$user->set('id', null);
			$user->set('name',$name);
			$user->set('username',$username);
			$user->set('password',$password);
			$user->set('password2',$password);
			$user->set('email',$email);
			$user->set('usertype',$newUsertype);
			$user->set('gid', $authorize->get_group_id( '', $newUsertype, 'ARO' ));
			$date =& JFactory::getDate();
			$user->set('registerDate', $date->toMySQL());
			if ( !$user->save() ){
				JError::raiseWarning('', JText::_( $user->getError()));
				return false;
			}
			$user =& JFactory::getUser($username);
			return $user->get('id') ;
		}else {
			//Joomla 1.6 or 1.7 or 2.5
			$data=array();
			$dbo = & JFactory :: getDBO();
			$q="SELECT `id` FROM `#__usergroups` WHERE `title` LIKE '%registered%';";
			$dbo->setQuery($q);
			$dbo->Query($q);
			$getgroup=$dbo->loadAssocList();
			$data['groups'][0]=$getgroup[0]['id'];
			$data['name']=$name;
			$data['username']=$username;
			$data['email']=$email;
			$data['password']=$password;
			$user = new JUser;
			if ($user->bind($data)) {
				if ( $user->save() ){
					$newuserid=$user->id;
					return $newuserid;
				}else {
					return false;
				}
			}else {
				return false;
			}
		}
	}

	function userIsLogged () {
		$user =& JFactory::getUser();
		if ($user->guest) {
			return false;
		}else {
			return true;
		}
	}

	function getTheme () {
		$dbo = & JFactory :: getDBO();
		$q="SELECT `setting` FROM `#__vikrentcar_config` WHERE `param`='theme';";
		$dbo->setQuery($q);
		$dbo->Query($q);
		$s=$dbo->loadAssocList();
		return $s[0]['setting'];
	}

	function getFooterOrdMail() {
		$dbo = & JFactory :: getDBO();
		$q = "SELECT `id`,`setting` FROM `#__vikrentcar_texts` WHERE `param`='footerordmail';";
		$dbo->setQuery($q);
		$dbo->Query($q);
		$ft = $dbo->loadAssocList();
		return $ft[0]['setting'];
	}

	function requireLogin() {
		$dbo = & JFactory :: getDBO();
		$q = "SELECT `setting` FROM `#__vikrentcar_config` WHERE `param`='requirelogin';";
		$dbo->setQuery($q);
		$dbo->Query($q);
		$s = $dbo->loadAssocList();
		return intval($s[0]['setting']) == 1 ? true : false;
	}

	function couponsEnabled() {
		$dbo = & JFactory :: getDBO();
		$q = "SELECT `setting` FROM `#__vikrentcar_config` WHERE `param`='enablecoupons';";
		$dbo->setQuery($q);
		$dbo->Query($q);
		$s = $dbo->loadAssocList();
		return intval($s[0]['setting']) == 1 ? true : false;
	}

	function applyExtraHoursChargesBasp() {
		$dbo = & JFactory :: getDBO();
		$q = "SELECT `setting` FROM `#__vikrentcar_config` WHERE `param`='ehourschbasp';";
		$dbo->setQuery($q);
		$dbo->Query($q);
		$s = $dbo->loadAssocList();
		//true is before special prices, false is after
		return intval($s[0]['setting']) == 1 ? true : false;
	}

	function loadJquery($skipsession = false) {
		if($skipsession) {
			$dbo = & JFactory :: getDBO();
			$q = "SELECT `setting` FROM `#__vikrentcar_config` WHERE `param`='loadjquery';";
			$dbo->setQuery($q);
			$dbo->Query($q);
			$s = $dbo->loadAssocList();
			return intval($s[0]['setting']) == 1 ? true : false;
		}else {
			$session =& JFactory::getSession();
			$sval = $session->get('loadJquery', '');
			if(!empty($sval)) {
				return intval($sval) == 1 ? true : false;
			}else {
				$dbo = & JFactory :: getDBO();
				$q = "SELECT `setting` FROM `#__vikrentcar_config` WHERE `param`='loadjquery';";
				$dbo->setQuery($q);
				$dbo->Query($q);
				$s = $dbo->loadAssocList();
				$session->set('loadJquery', $s[0]['setting']);
				return intval($s[0]['setting']) == 1 ? true : false;
			}
		}
	}

	function calendarType($skipsession = false) {
		if($skipsession) {
			$dbo = & JFactory :: getDBO();
			$q = "SELECT `setting` FROM `#__vikrentcar_config` WHERE `param`='calendar';";
			$dbo->setQuery($q);
			$dbo->Query($q);
			$s = $dbo->loadAssocList();
			return $s[0]['setting'];
		}else {
			$session =& JFactory::getSession();
			$sval = $session->get('calendarType', '');
			if(!empty($sval)) {
				return $sval;
			}else {
				$dbo = & JFactory :: getDBO();
				$q = "SELECT `setting` FROM `#__vikrentcar_config` WHERE `param`='calendar';";
				$dbo->setQuery($q);
				$dbo->Query($q);
				$s = $dbo->loadAssocList();
				$session->set('calendarType', $s[0]['setting']);
				return $s[0]['setting'];
			}
		}
	}

	function setDropDatePlus($skipsession = false) {
		if($skipsession) {
			$dbo = & JFactory :: getDBO();
			$q = "SELECT `setting` FROM `#__vikrentcar_config` WHERE `param`='setdropdplus';";
			$dbo->setQuery($q);
			$dbo->Query($q);
			$s = $dbo->loadAssocList();
			return $s[0]['setting'];
		}else {
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
				$session->set('setDropDatePlus', $s[0]['setting']);
				return $s[0]['setting'];
			}
		}
	}

	function getSiteLogo() {
		$dbo = & JFactory :: getDBO();
		$q = "SELECT `setting` FROM `#__vikrentcar_config` WHERE `param`='sitelogo';";
		$dbo->setQuery($q);
		$dbo->Query($q);
		$s = $dbo->loadAssocList();
		return $s[0]['setting'];
	}

	function numCalendars() {
		$dbo = & JFactory :: getDBO();
		$q = "SELECT `setting` FROM `#__vikrentcar_config` WHERE `param`='numcalendars';";
		$dbo->setQuery($q);
		$dbo->Query($q);
		$s = $dbo->loadAssocList();
		return $s[0]['setting'];
	}

	function showPartlyReserved() {
		$dbo = & JFactory :: getDBO();
		$q = "SELECT `setting` FROM `#__vikrentcar_config` WHERE `param`='showpartlyreserved';";
		$dbo->setQuery($q);
		$dbo->Query($q);
		$s = $dbo->loadAssocList();
		return intval($s[0]['setting']) == 1 ? true : false;
	}

	function getDisclaimer() {
		$dbo = & JFactory :: getDBO();
		$q = "SELECT `id`,`setting` FROM `#__vikrentcar_texts` WHERE `param`='disclaimer';";
		$dbo->setQuery($q);
		$dbo->Query($q);
		$ft = $dbo->loadAssocList();
		return $ft[0]['setting'];
	}

	function showFooter() {
		$dbo = & JFactory :: getDBO();
		$q = "SELECT `setting` FROM `#__vikrentcar_config` WHERE `param`='showfooter';";
		$dbo->setQuery($q);
		$dbo->Query($q);
		if ($dbo->getNumRows() == 1) {
			$s = $dbo->loadAssocList();
			return (intval($s[0]['setting']) == 1 ? true : false);
		} else {
			return false;
		}
	}

	function loadPreviousUserData($uid) {
		$ret = array();
		$ret['customfields'] = array();
		$dbo = & JFactory :: getDBO();
		if (!empty($uid) && intval($uid) > 0) {
			$q = "SELECT * FROM `#__vikrentcar_usersdata` WHERE `ujid`='".intval($uid)."';";
			$dbo->setQuery($q);
			$dbo->Query($q);
			if ($dbo->getNumRows() > 0) {
				$olddata = $dbo->loadAssocList();
				return json_decode($olddata[0]['data'], true);
			}
		}
		return $ret;
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

	function getPriceName($idp) {
		$dbo = & JFactory :: getDBO();
		$q = "SELECT `id`,`name` FROM `#__vikrentcar_prices` WHERE `id`='" . $idp . "';";
		$dbo->setQuery($q);
		$dbo->Query($q);
		if ($dbo->getNumRows() == 1) {
			$n = $dbo->loadAssocList();
			return $n[0]['name'];
		}
		return "";
	}

	function getPriceAttr($idp) {
		$dbo = & JFactory :: getDBO();
		$q = "SELECT `id`,`attr` FROM `#__vikrentcar_prices` WHERE `id`='" . $idp . "';";
		$dbo->setQuery($q);
		$dbo->Query($q);
		if ($dbo->getNumRows() == 1) {
			$n = $dbo->loadAssocList();
			return $n[0]['attr'];
		}
		return "";
	}

	function getAliq($idal) {
		$dbo = & JFactory :: getDBO();
		$q = "SELECT `aliq` FROM `#__vikrentcar_iva` WHERE `id`='" . $idal . "';";
		$dbo->setQuery($q);
		$dbo->Query($q);
		$n = $dbo->loadAssocList();
		return $n[0]['aliq'];
	}

	function getTimeOpenStore($skipsession = false) {
		if($skipsession) {
			$dbo = & JFactory :: getDBO();
			$q = "SELECT `setting` FROM `#__vikrentcar_config` WHERE `param`='timeopenstore';";
			$dbo->setQuery($q);
			$dbo->Query($q);
			$n = $dbo->loadAssocList();
			if (empty ($n[0]['setting']) && $n[0]['setting'] != "0") {
				return false;
			} else {
				$x = explode("-", $n[0]['setting']);
				if (!empty ($x[1]) && $x[1] != "0") {
					return $x;
				}
			}
		}else {
			$session =& JFactory::getSession();
			$sval = $session->get('getTimeOpenStore', '');
			if(!empty($sval)) {
				return $sval;
			}else {
				$dbo = & JFactory :: getDBO();
				$q = "SELECT `setting` FROM `#__vikrentcar_config` WHERE `param`='timeopenstore';";
				$dbo->setQuery($q);
				$dbo->Query($q);
				$n = $dbo->loadAssocList();
				if (empty ($n[0]['setting']) && $n[0]['setting'] != "0") {
					return false;
				} else {
					$x = explode("-", $n[0]['setting']);
					if (!empty ($x[1]) && $x[1] != "0") {
						$session->set('getTimeOpenStore', $x);
						return $x;
					}
				}
			}
		}
		return false;
	}

	function getHoursMinutes($secs) {
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

	function showPlacesFront($skipsession = false) {
		if($skipsession) {
			$dbo = & JFactory :: getDBO();
			$q = "SELECT `setting` FROM `#__vikrentcar_config` WHERE `param`='placesfront';";
			$dbo->setQuery($q);
			$dbo->Query($q);
			if ($dbo->getNumRows() == 1) {
				$s = $dbo->loadAssocList();
				return (intval($s[0]['setting']) == 1 ? true : false);
			} else {
				return false;
			}
		}else {
			$session =& JFactory::getSession();
			$sval = $session->get('showPlacesFront', '');
			if(strlen($sval) > 0) {
				return (intval($sval) == 1 ? true : false);
			}else {
				$dbo = & JFactory :: getDBO();
				$q = "SELECT `setting` FROM `#__vikrentcar_config` WHERE `param`='placesfront';";
				$dbo->setQuery($q);
				$dbo->Query($q);
				if ($dbo->getNumRows() == 1) {
					$s = $dbo->loadAssocList();
					$session->set('showPlacesFront', $s[0]['setting']);
					return (intval($s[0]['setting']) == 1 ? true : false);
				} else {
					return false;
				}
			}
		}
	}

	function showCategoriesFront($skipsession = false) {
		if($skipsession) {
			$dbo = & JFactory :: getDBO();
			$q = "SELECT `setting` FROM `#__vikrentcar_config` WHERE `param`='showcategories';";
			$dbo->setQuery($q);
			$dbo->Query($q);
			if ($dbo->getNumRows() == 1) {
				$s = $dbo->loadAssocList();
				return (intval($s[0]['setting']) == 1 ? true : false);
			} else {
				return false;
			}
		}else {
			$session =& JFactory::getSession();
			$sval = $session->get('showCategoriesFront', '');
			if(strlen($sval) > 0) {
				return (intval($sval) == 1 ? true : false);
			}else {
				$dbo = & JFactory :: getDBO();
				$q = "SELECT `setting` FROM `#__vikrentcar_config` WHERE `param`='showcategories';";
				$dbo->setQuery($q);
				$dbo->Query($q);
				if ($dbo->getNumRows() == 1) {
					$s = $dbo->loadAssocList();
					$session->set('showCategoriesFront', $s[0]['setting']);
					return (intval($s[0]['setting']) == 1 ? true : false);
				} else {
					return false;
				}
			}
		}
	}

	function allowRent() {
		$dbo = & JFactory :: getDBO();
		$q = "SELECT `setting` FROM `#__vikrentcar_config` WHERE `param`='allowrent';";
		$dbo->setQuery($q);
		$dbo->Query($q);
		if ($dbo->getNumRows() == 1) {
			$s = $dbo->loadAssocList();
			return (intval($s[0]['setting']) == 1 ? true : false);
		} else {
			return false;
		}
	}

	function getDisabledRentMsg() {
		$dbo = & JFactory :: getDBO();
		$q = "SELECT `id`,`setting` FROM `#__vikrentcar_texts` WHERE `param`='disabledrentmsg';";
		$dbo->setQuery($q);
		$dbo->Query($q);
		$s = $dbo->loadAssocList();
		return $s[0]['setting'];
	}

	function getDateFormat($skipsession = false) {
		if($skipsession) {
			$dbo = & JFactory :: getDBO();
			$q = "SELECT `setting` FROM `#__vikrentcar_config` WHERE `param`='dateformat';";
			$dbo->setQuery($q);
			$dbo->Query($q);
			$s = $dbo->loadAssocList();
			return $s[0]['setting'];
		}else {
			$session =& JFactory::getSession();
			$sval = $session->get('getDateFormat', '');
			if(!empty($sval)) {
				return $sval;
			}else {
				$dbo = & JFactory :: getDBO();
				$q = "SELECT `setting` FROM `#__vikrentcar_config` WHERE `param`='dateformat';";
				$dbo->setQuery($q);
				$dbo->Query($q);
				$s = $dbo->loadAssocList();
				$session->set('getDateFormat', $s[0]['setting']);
				return $s[0]['setting'];
			}
		}
	}

	function getHoursMoreRb() {
		$dbo = & JFactory :: getDBO();
		$q = "SELECT `setting` FROM `#__vikrentcar_config` WHERE `param`='hoursmorerentback';";
		$dbo->setQuery($q);
		$dbo->Query($q);
		$s = $dbo->loadAssocList();
		return $s[0]['setting'];
	}

	function getHoursCarAvail() {
		$dbo = & JFactory :: getDBO();
		$q = "SELECT `setting` FROM `#__vikrentcar_config` WHERE `param`='hoursmorecaravail';";
		$dbo->setQuery($q);
		$dbo->Query($q);
		$s = $dbo->loadAssocList();
		return $s[0]['setting'];
	}

	function getFrontTitle() {
		$dbo = & JFactory :: getDBO();
		$q = "SELECT `id`,`setting` FROM `#__vikrentcar_texts` WHERE `param`='fronttitle';";
		$dbo->setQuery($q);
		$dbo->Query($q);
		$ft = $dbo->loadAssocList();
		return $ft[0]['setting'];
	}

	function getFrontTitleTag() {
		$dbo = & JFactory :: getDBO();
		$q = "SELECT `setting` FROM `#__vikrentcar_config` WHERE `param`='fronttitletag';";
		$dbo->setQuery($q);
		$dbo->Query($q);
		$ft = $dbo->loadAssocList();
		return $ft[0]['setting'];
	}

	function getFrontTitleTagClass() {
		$dbo = & JFactory :: getDBO();
		$q = "SELECT `setting` FROM `#__vikrentcar_config` WHERE `param`='fronttitletagclass';";
		$dbo->setQuery($q);
		$dbo->Query($q);
		$ft = $dbo->loadAssocList();
		return $ft[0]['setting'];
	}

	function getCurrencyName() {
		$dbo = & JFactory :: getDBO();
		$q = "SELECT `setting` FROM `#__vikrentcar_config` WHERE `param`='currencyname';";
		$dbo->setQuery($q);
		$dbo->Query($q);
		$ft = $dbo->loadAssocList();
		return $ft[0]['setting'];
	}

	function getCurrencySymb($skipsession = false) {
		if($skipsession) {
			$dbo = & JFactory :: getDBO();
			$q = "SELECT `setting` FROM `#__vikrentcar_config` WHERE `param`='currencysymb';";
			$dbo->setQuery($q);
			$dbo->Query($q);
			$ft = $dbo->loadAssocList();
			return $ft[0]['setting'];
		}else {
			$session =& JFactory::getSession();
			$sval = $session->get('getCurrencySymb', '');
			if(!empty($sval)) {
				return $sval;
			}else {
				$dbo = & JFactory :: getDBO();
				$q = "SELECT `setting` FROM `#__vikrentcar_config` WHERE `param`='currencysymb';";
				$dbo->setQuery($q);
				$dbo->Query($q);
				$ft = $dbo->loadAssocList();
				$session->set('getCurrencySymb', $ft[0]['setting']);
				return $ft[0]['setting'];
			}
		}
	}

	function getNumberFormatData($skipsession = false) {
		if($skipsession) {
			$dbo = & JFactory :: getDBO();
			$q = "SELECT `setting` FROM `#__vikrentcar_config` WHERE `param`='numberformat';";
			$dbo->setQuery($q);
			$dbo->Query($q);
			$ft = $dbo->loadAssocList();
			return $ft[0]['setting'];
		}else {
			$session =& JFactory::getSession();
			$sval = $session->get('getNumberFormatData', '');
			if(!empty($sval)) {
				return $sval;
			}else {
				$dbo = & JFactory :: getDBO();
				$q = "SELECT `setting` FROM `#__vikrentcar_config` WHERE `param`='numberformat';";
				$dbo->setQuery($q);
				$dbo->Query($q);
				$ft = $dbo->loadAssocList();
				$session->set('getNumberFormatData', $ft[0]['setting']);
				return $ft[0]['setting'];
			}
		}
	}

	function numberFormat($num, $skipsession = false) {
		$formatvals = self::getNumberFormatData($skipsession);
		$formatparts = explode(':', $formatvals);
		return number_format($num, (int)$formatparts[0], $formatparts[1], $formatparts[2]);
	}

	function getCurrencyCodePp() {
		$dbo = & JFactory :: getDBO();
		$q = "SELECT `setting` FROM `#__vikrentcar_config` WHERE `param`='currencycodepp';";
		$dbo->setQuery($q);
		$dbo->Query($q);
		$ft = $dbo->loadAssocList();
		return $ft[0]['setting'];
	}

	function getSubmitName($skipsession = false) {
		if($skipsession) {
			$dbo = & JFactory :: getDBO();
			$q = "SELECT `id`,`setting` FROM `#__vikrentcar_texts` WHERE `param`='searchbtnval';";
			$dbo->setQuery($q);
			$dbo->Query($q);
			$ft = $dbo->loadAssocList();
			if (!empty ($ft[0]['setting'])) {
				return $ft[0]['setting'];
			} else {
				return "";
			}
		}else {
			$session =& JFactory::getSession();
			$sval = $session->get('getSubmitName', '');
			if(!empty($sval)) {
				return $sval;
			}else {
				$dbo = & JFactory :: getDBO();
				$q = "SELECT `id`,`setting` FROM `#__vikrentcar_texts` WHERE `param`='searchbtnval';";
				$dbo->setQuery($q);
				$dbo->Query($q);
				$ft = $dbo->loadAssocList();
				if (!empty ($ft[0]['setting'])) {
					return $ft[0]['setting'];
				} else {
					return "";
				}
			}
		}
	}

	function getSubmitClass($skipsession = false) {
		if($skipsession) {
			$dbo = & JFactory :: getDBO();
			$q = "SELECT `setting` FROM `#__vikrentcar_config` WHERE `param`='searchbtnclass';";
			$dbo->setQuery($q);
			$dbo->Query($q);
			$ft = $dbo->loadAssocList();
			return $ft[0]['setting'];
		}else {
			$session =& JFactory::getSession();
			$sval = $session->get('getSubmitClass', '');
			if(!empty($sval)) {
				return $sval;
			}else {
				$dbo = & JFactory :: getDBO();
				$q = "SELECT `setting` FROM `#__vikrentcar_config` WHERE `param`='searchbtnclass';";
				$dbo->setQuery($q);
				$dbo->Query($q);
				$ft = $dbo->loadAssocList();
				$session->set('getSubmitClass', $ft[0]['setting']);
				return $ft[0]['setting'];
			}
		}
	}

	function getIntroMain() {
		$dbo = & JFactory :: getDBO();
		$q = "SELECT `id`,`setting` FROM `#__vikrentcar_texts` WHERE `param`='intromain';";
		$dbo->setQuery($q);
		$dbo->Query($q);
		$ft = $dbo->loadAssocList();
		return $ft[0]['setting'];
	}

	function getClosingMain() {
		$dbo = & JFactory :: getDBO();
		$q = "SELECT `id`,`setting` FROM `#__vikrentcar_texts` WHERE `param`='closingmain';";
		$dbo->setQuery($q);
		$dbo->Query($q);
		$ft = $dbo->loadAssocList();
		return $ft[0]['setting'];
	}

	function getFullFrontTitle() {
		$dbo = & JFactory :: getDBO();
		$q = "SELECT `id`,`setting` FROM `#__vikrentcar_texts` WHERE `param`='fronttitle';";
		$dbo->setQuery($q);
		$dbo->Query($q);
		$ft = $dbo->loadAssocList();
		$q = "SELECT `setting` FROM `#__vikrentcar_config` WHERE `param`='fronttitletag';";
		$dbo->setQuery($q);
		$dbo->Query($q);
		$fttag = $dbo->loadAssocList();
		$q = "SELECT `setting` FROM `#__vikrentcar_config` WHERE `param`='fronttitletagclass';";
		$dbo->setQuery($q);
		$dbo->Query($q);
		$fttagclass = $dbo->loadAssocList();
		if (empty ($ft[0]['setting'])) {
			return "";
		} else {
			if (empty ($fttag[0]['setting'])) {
				return $ft[0]['setting'] . "<br/>\n";
			} else {
				$tag = str_replace("<", "", $fttag[0]['setting']);
				$tag = str_replace(">", "", $tag);
				$tag = str_replace("/", "", $tag);
				$tag = trim($tag);
				return "<" . $tag . "" . (!empty ($fttagclass) ? " class=\"" . $fttagclass[0]['setting'] . "\"" : "") . ">" . $ft[0]['setting'] . "</" . $tag . ">";
			}
		}
	}

	function dateIsValid($date) {
		$df = self::getDateFormat();
		if (strlen($date) != "10") {
			return false;
		}
		$x = explode("/", $date);
		if ($df == "%d/%m/%Y") {
			if (strlen($x[0]) != "2" || $x[0] > 31 || strlen($x[1]) != "2" || $x[1] > 12 || strlen($x[2]) != "4") {
				return false;
			}
		}elseif ($df == "%m/%d/%Y") {
			if (strlen($x[1]) != "2" || $x[1] > 31 || strlen($x[0]) != "2" || $x[0] > 12 || strlen($x[2]) != "4") {
				return false;
			}
		} else {
			if (strlen($x[2]) != "2" || $x[2] > 31 || strlen($x[1]) != "2" || $x[1] > 12 || strlen($x[0]) != "4") {
				return false;
			}
		}
		return true;
	}

	function sayDateFormat() {
		$dbo = & JFactory :: getDBO();
		$q = "SELECT `setting` FROM `#__vikrentcar_config` WHERE `param`='dateformat';";
		$dbo->setQuery($q);
		$dbo->Query($q);
		$s = $dbo->loadAssocList();
		if ($s[0]['setting'] == "%d/%m/%Y") {
			return JText :: _('VRCONFIGONETWELVE');
		}elseif ($s[0]['setting'] == "%m/%d/%Y") {
			return JText :: _('VRCONFIGUSDATEFORMAT');
		} else {
			return JText :: _('VRCONFIGONETENTHREE');
		}
	}

	function getDateTimestamp($date, $h, $m) {
		$df = self::getDateFormat();
		$x = explode("/", $date);
		if ($df == "%d/%m/%Y") {
			$dts = strtotime($x[1] . "/" . $x[0] . "/" . $x[2]);
		}elseif ($df == "%m/%d/%Y") {
			$dts = strtotime($x[0] . "/" . $x[1] . "/" . $x[2]);
		}else {
			$dts = strtotime($x[1] . "/" . $x[2] . "/" . $x[0]);
		}
		$hts = 3600 * $h;
		$mts = 60 * $m;
		return ($dts + $hts + $mts);
	}

	function ivaInclusa($skipsession = false) {
		if($skipsession) {
			$dbo = & JFactory :: getDBO();
			$q = "SELECT `setting` FROM `#__vikrentcar_config` WHERE `param`='ivainclusa';";
			$dbo->setQuery($q);
			$dbo->Query($q);
			$s = $dbo->loadAssocList();
			return (intval($s[0]['setting']) == 1 ? true : false);
		}else {
			$session =& JFactory::getSession();
			$sval = $session->get('ivaInclusa', '');
			if(strlen($sval) > 0) {
				return (intval($sval) == 1 ? true : false);
			}else {
				$dbo = & JFactory :: getDBO();
				$q = "SELECT `setting` FROM `#__vikrentcar_config` WHERE `param`='ivainclusa';";
				$dbo->setQuery($q);
				$dbo->Query($q);
				$s = $dbo->loadAssocList();
				$session->set('ivaInclusa', $s[0]['setting']);
				return (intval($s[0]['setting']) == 1 ? true : false);
			}
		}
	}

	function tokenForm() {
		$dbo = & JFactory :: getDBO();
		$q = "SELECT `setting` FROM `#__vikrentcar_config` WHERE `param`='tokenform';";
		$dbo->setQuery($q);
		$dbo->Query($q);
		$s = $dbo->loadAssocList();
		return (intval($s[0]['setting']) == 1 ? true : false);
	}

	function getPaypalAcc() {
		$dbo = & JFactory :: getDBO();
		$q = "SELECT `setting` FROM `#__vikrentcar_config` WHERE `param`='ccpaypal';";
		$dbo->setQuery($q);
		$dbo->Query($q);
		$s = $dbo->loadAssocList();
		return $s[0]['setting'];
	}

	function getAccPerCent() {
		$dbo = & JFactory :: getDBO();
		$q = "SELECT `setting` FROM `#__vikrentcar_config` WHERE `param`='payaccpercent';";
		$dbo->setQuery($q);
		$dbo->Query($q);
		$s = $dbo->loadAssocList();
		return $s[0]['setting'];
	}

	function getAdminMail() {
		$dbo = & JFactory :: getDBO();
		$q = "SELECT `setting` FROM `#__vikrentcar_config` WHERE `param`='adminemail';";
		$dbo->setQuery($q);
		$dbo->Query($q);
		$s = $dbo->loadAssocList();
		return $s[0]['setting'];
	}

	function getPaymentName() {
		$dbo = & JFactory :: getDBO();
		$q = "SELECT `id`,`setting` FROM `#__vikrentcar_texts` WHERE `param`='paymentname';";
		$dbo->setQuery($q);
		$dbo->Query($q);
		$s = $dbo->loadAssocList();
		return $s[0]['setting'];
	}

	function getMinutesLock($conv = false) {
		$dbo = & JFactory :: getDBO();
		$q = "SELECT `setting` FROM `#__vikrentcar_config` WHERE `param`='minuteslock';";
		$dbo->setQuery($q);
		$dbo->Query($q);
		$s = $dbo->loadAssocList();
		if ($conv) {
			$op = $s[0]['setting'] * 60;
			return (time() + $op);
		} else {
			return $s[0]['setting'];
		}
	}

	function carNotLocked($idcar, $units, $first, $second) {
		$dbo = & JFactory :: getDBO();
		$actnow = time();
		$booked = array ();
		$q = "DELETE FROM `#__vikrentcar_tmplock` WHERE `until`<" . $actnow . ";";
		$dbo->setQuery($q);
		$dbo->Query($q);
		//vikrentcar 1.5
		$secdiff = $second - $first;
		$daysdiff = $secdiff / 86400;
		if (is_int($daysdiff)) {
			if ($daysdiff < 1) {
				$daysdiff = 1;
			}
		}else {
			if ($daysdiff < 1) {
				$daysdiff = 1;
			}else {
				$sum = floor($daysdiff) * 86400;
				$newdiff = $secdiff - $sum;
				$maxhmore = self :: getHoursMoreRb() * 3600;
				if ($maxhmore >= $newdiff) {
					$daysdiff = floor($daysdiff);
				}else {
					$daysdiff = ceil($daysdiff);
				}
			}
		}
		$groupdays = self::getGroupDays($first, $second, $daysdiff);
		$check = "SELECT `id`,`ritiro`,`realback` FROM `#__vikrentcar_tmplock` WHERE `idcar`=" . $dbo->quote($idcar) . " AND `until`>=" . $actnow . ";";
		$dbo->setQuery($check);
		$dbo->Query($check);
		if ($dbo->getNumRows() > 0) {
			$busy = $dbo->loadAssocList();
			foreach ($groupdays as $gday) {
				$bfound = 0;
				foreach ($busy as $bu) {
					if ($gday >= $bu['ritiro'] && $gday <= $bu['realback']) {
						$bfound++;
					}
				}
				if ($bfound >= $units) {
					return false;
				}
			}
		}
		//
		return true;
	}

	function getGroupDays($first, $second, $daysdiff) {
		$ret = array();
		$ret[] = $first;
		if($daysdiff > 1) {
			$start = getdate($first);
			$end = getdate($second);
			$endcheck = mktime(0, 0, 0, $end['mon'], $end['mday'], $end['year']);
			for($i = 1; $i < $daysdiff; $i++) {
				$checkday = $start['mday'] + $i;
				$dayts = mktime(0, 0, 0, $start['mon'], $checkday, $start['year']);
				if($dayts != $endcheck) {
					$ret[] = $dayts;
				}
			}
		}
		$ret[] = $second;
		return $ret;
	}

	function checkValidClosingDays($groupdays, $pickup, $dropoff) {
		$errorstr = '';
		$compare = array();
		$compare[] = date('Y-m-d', $groupdays[0]);
		$compare[] = date('Y-m-d', end($groupdays));
		$compare = array_unique($compare);
		$dbo = & JFactory :: getDBO();
		if ($pickup == $dropoff) {
			$q = "SELECT `id`,`name`,`closingdays` FROM `#__vikrentcar_places` WHERE `id`='".intval($pickup)."';";
		}else {
			$q = "SELECT `id`,`name`,`closingdays` FROM `#__vikrentcar_places` WHERE `id`='".intval($pickup)."' OR `id`='".intval($dropoff)."';";
		}
		$dbo->setQuery($q);
		$dbo->Query($q);
		$getclosing = $dbo->loadAssocList();
		if (count($getclosing) > 0) {
			foreach($getclosing as $closed) {
				if (!empty($closed['closingdays'])) {
					$closingdates = explode(",", $closed['closingdays']);
					foreach($closingdates as $clod) {
						if (!empty($clod)) {
							if ((int)$closed['id'] == (int)$pickup && $clod == $compare[0]) {
								$dateparts = explode("-", $clod);
								$df = self::getDateFormat();
								$df = str_replace('%', '', $df);
								$errorstr = JText::sprintf('VRCERRLOCATIONCLOSEDON', $closed['name'], date($df, mktime(0, 0, 0, $dateparts[1], $dateparts[2], $dateparts[0])));
								break 2;
							}elseif ((int)$closed['id'] == (int)$dropoff && $clod == $compare[1]) {
								$dateparts = explode("-", $clod);
								$df = self::getDateFormat();
								$df = str_replace('%', '', $df);
								$errorstr = JText::sprintf('VRCERRLOCATIONCLOSEDON', $closed['name'], date($df, mktime(0, 0, 0, $dateparts[1], $dateparts[2], $dateparts[0])));
								break 2;
							}
						}
					}
				}
			}
		}
		return $errorstr;
	}

	function carBookable($idcar, $units, $first, $second) {
		$dbo = & JFactory :: getDBO();
		//vikrentcar 1.5
		$secdiff = $second - $first;
		$daysdiff = $secdiff / 86400;
		if (is_int($daysdiff)) {
			if ($daysdiff < 1) {
				$daysdiff = 1;
			}
		}else {
			if ($daysdiff < 1) {
				$daysdiff = 1;
			}else {
				$sum = floor($daysdiff) * 86400;
				$newdiff = $secdiff - $sum;
				$maxhmore = self :: getHoursMoreRb() * 3600;
				if ($maxhmore >= $newdiff) {
					$daysdiff = floor($daysdiff);
				}else {
					$daysdiff = ceil($daysdiff);
				}
			}
		}
		$groupdays = self::getGroupDays($first, $second, $daysdiff);
		$check = "SELECT `id`,`ritiro`,`realback` FROM `#__vikrentcar_busy` WHERE `idcar`=" . $dbo->quote($idcar) . ";";
		$dbo->setQuery($check);
		$dbo->Query($check);
		if ($dbo->getNumRows() > 0) {
			$busy = $dbo->loadAssocList();
			foreach ($groupdays as $gday) {
				$bfound = 0;
				foreach ($busy as $bu) {
					if ($gday >= $bu['ritiro'] && $gday <= $bu['realback']) {
						$bfound++;
					}elseif(count($groupdays) == 2 && $gday == $groupdays[0]) {
						//VRC 1.7
						if($groupdays[0] < $bu['ritiro'] && $groupdays[0] < $bu['realback'] && $groupdays[1] > $bu['ritiro'] && $groupdays[1] > $bu['realback']) {
							$bfound++;
						}
					}
				}
				if ($bfound >= $units) {
					return false;
				}
			}
		}
		//
		return true;
	}

	function payTotal() {
		$dbo = & JFactory :: getDBO();
		$q = "SELECT `setting` FROM `#__vikrentcar_config` WHERE `param`='paytotal';";
		$dbo->setQuery($q);
		$dbo->Query($q);
		$s = $dbo->loadAssocList();
		return (intval($s[0]['setting']) == 1 ? true : false);
	}

	function getCouponInfo($code) {
		$dbo = & JFactory :: getDBO();
		$q = "SELECT * FROM `#__vikrentcar_coupons` WHERE `code`=".$dbo->quote($code).";";
		$dbo->setQuery($q);
		$dbo->Query($q);
		if($dbo->getNumRows() == 1) {
			$c = $dbo->loadAssocList();
			return $c[0];
		}else {
			return "";
		}
	}

	function getCarInfo($idcar) {
		$dbo = & JFactory :: getDBO();
		$q = "SELECT `id`,`name`,`img`,`moreimgs`,`idcat`,`idcarat`,`info` FROM `#__vikrentcar_cars` WHERE `id`='" . $idcar . "';";
		$dbo->setQuery($q);
		$dbo->Query($q);
		$s = $dbo->loadAssocList();
		return $s[0];
	}

	function sayCategory($ids) {
		$dbo = & JFactory :: getDBO();
		$split = explode(";", $ids);
		$say = "";
		foreach ($split as $k => $s) {
			if (strlen($s)) {
				$q = "SELECT `id`,`name` FROM `#__vikrentcar_categories` WHERE `id`='" . $s . "';";
				$dbo->setQuery($q);
				$dbo->Query($q);
				$nam = $dbo->loadAssocList();
				$say .= $nam[0]['name'];
				$say .= (strlen($split[($k +1)]) && end($split) != $s ? ", " : "");
			}
		}
		return $say;
	}

	function getCarCarat($idc) {
		$dbo = & JFactory :: getDBO();
		$split = explode(";", $idc);
		$carat = "";
		$dbo = & JFactory :: getDBO();
		$arr = array ();
		$where = array();
		foreach ($split as $s) {
			if (!empty ($s)) {
				$where[]=$s;
			}
		}
		if (count($where) > 0) {
			$q = "SELECT `id`,`name`,`icon`,`align`,`textimg` FROM `#__vikrentcar_caratteristiche` WHERE `id` IN (".implode(",", $where).");";
			$dbo->setQuery($q);
			$dbo->Query($q);
			if ($dbo->getNumRows() > 0) {
				$arr = $dbo->loadAssocList();
			}
		}
		if (@ count($arr) > 0) {
			$carat .= "<table class=\"vrcsearchcaratt\">";
			foreach ($arr as $a) {
				if (!empty ($a['textimg'])) {
					if ($a['align'] == "left") {
						$carat .= "<tr><td align=\"center\">" . $a['textimg'] . "</td>" . (!empty ($a['icon']) ? "<td align=\"center\"><img src=\"".JURI::root()."administrator/components/com_vikrentcar/resources/" . $a['icon'] . "\"/></td></tr>" : "</tr>");
					}
					elseif ($a['align'] == "center") {
						$carat .= "<tr><td align=\"center\">" . (!empty ($a['icon']) ? "<img src=\"".JURI::root()."administrator/components/com_vikrentcar/resources/" . $a['icon'] . "\"/><br/>" : "") . $a['textimg'] . "</td></tr>";
					} else {
						$carat .= "<tr>" . (!empty ($a['icon']) ? "<td align=\"center\"><img src=\"".JURI::root()."administrator/components/com_vikrentcar/resources/" . $a['icon'] . "\"/></td>" : "") . "<td align=\"center\">" . $a['textimg'] . "</td></tr>";
					}
				} else {
					$carat .= (!empty ($a['icon']) ? "<tr><td align=\"center\"><img src=\"".JURI::root()."administrator/components/com_vikrentcar/resources/" . $a['icon'] . "\" alt=\"" . $a['name'] . "\" title=\"" . $a['name'] . "\"/></td></tr>" : "");
				}
			}
			$carat .= "</table>\n";
		}
		return $carat;
	}

	function getCarCaratFly($idc) {
		$dbo = & JFactory :: getDBO();
		$split = explode(";", $idc);
		$carat = "";
		$dbo = & JFactory :: getDBO();
		$arr = array ();
		$where = array();
		foreach ($split as $s) {
			if (!empty ($s)) {
				$where[]=$s;
			}
		}
		if (count($where) > 0) {
			$q = "SELECT * FROM `#__vikrentcar_caratteristiche` WHERE `id` IN (".implode(",", $where).") ORDER BY `#__vikrentcar_caratteristiche`.`ordering` ASC;";
			$dbo->setQuery($q);
			$dbo->Query($q);
			if ($dbo->getNumRows() > 0) {
				$arr = $dbo->loadAssocList();
			}
		}
		if (@ count($arr) > 0) {
			$carat .= "<table><tr>";
			foreach ($arr as $a) {
				if (!empty ($a['textimg'])) {
					if ($a['align'] == "left") {
						$carat .= "<td valign=\"top\">" . $a['textimg'] . (!empty ($a['icon']) ? " <img src=\"" . JURI :: root() . "administrator/components/com_vikrentcar/resources/" . $a['icon'] . "\"/></td>" : "</td>");
					}
					elseif ($a['align'] == "center") {
						$carat .= "<td align=\"center\" valign=\"top\">" . (!empty ($a['icon']) ? "<img src=\"" . JURI :: root() . "administrator/components/com_vikrentcar/resources/" . $a['icon'] . "\"/><br/>" : "") . $a['textimg'] . "</td>";
					} else {
						$carat .= "<td valign=\"top\">" . (!empty ($a['icon']) ? "<img src=\"" . JURI :: root() . "administrator/components/com_vikrentcar/resources/" . $a['icon'] . "\"/> " : "") . $a['textimg'] . "</td>";
					}
				} else {
					$carat .= (!empty ($a['icon']) ? "<td valign=\"top\"><img src=\"" . JURI :: root() . "administrator/components/com_vikrentcar/resources/" . $a['icon'] . "\" alt=\"" . $a['name'] . "\" title=\"" . $a['name'] . "\"/></td>" : "");
				}
			}
			$carat .= "</tr></table>\n";
		}
		return $carat;
	}

	function getCarCaratOriz($idc) {
		$dbo = & JFactory :: getDBO();
		$split = explode(";", $idc);
		$carat = "";
		$dbo = & JFactory :: getDBO();
		$arr = array ();
		$where = array();
		foreach ($split as $s) {
			if (!empty($s)) {
				$where[]=$s;
			}
		}
		if (count($where) > 0) {
			$q = "SELECT * FROM `#__vikrentcar_caratteristiche` WHERE `id` IN (".implode(",", $where).") ORDER BY `#__vikrentcar_caratteristiche`.`ordering` ASC;";
			$dbo->setQuery($q);
			$dbo->Query($q);
			if ($dbo->getNumRows() > 0) {
				$arr = $dbo->loadAssocList();
			}
		}
		if (count($arr) > 0) {
			$carat .= "<div class=\"vrccaratsdiv\">";
			foreach ($arr as $a) {
				$carat .= "<div class=\"vrccarcarat\">";
				if (!empty ($a['textimg'])) {
					$carat .= (!empty ($a['icon']) ? "<img src=\"".JURI::root()."administrator/components/com_vikrentcar/resources/" . $a['icon'] . "\" /><span>" . $a['textimg'] . "</span>" : "<span>".$a['textimg']."</span>");
				} else {
					$carat .= (!empty ($a['icon']) ? "<img src=\"".JURI::root()."administrator/components/com_vikrentcar/resources/" . $a['icon'] . "\" />" : "<span>".$a['name']."</span>");
				}
				$carat .= "</div>";
			}
			$carat .= "</div>\n";
		}
		return $carat;
	}

	function getCarOptionals($idopts) {
		$split = explode(";", $idopts);
		$dbo = & JFactory :: getDBO();
		$arr = array ();
		$where = array ();
		foreach ($split as $s) {
			if (!empty ($s)) {
				$where[] = $s;
			}
		}
		if (@ count($where) > 0) {
			$q = "SELECT * FROM `#__vikrentcar_optionals` WHERE `id` IN (".implode(", ", $where).") ORDER BY `#__vikrentcar_optionals`.`ordering` ASC;";
			$dbo->setQuery($q);
			$dbo->Query($q);
			if ($dbo->getNumRows() > 0) {
				$arr = $dbo->loadAssocList();
			}
		}
		if (@ count($arr) > 0) {
			return $arr;
		}
		return "";
	}

	function dayValidTs($days, $first, $second) {
		$secdiff = $second - $first;
		$daysdiff = $secdiff / 86400;
		if (is_int($daysdiff)) {
			if ($daysdiff < 1) {
				$daysdiff = 1;
			}
		} else {
			if ($daysdiff < 1) {
				$daysdiff = 1;
			} else {
				$dbo = & JFactory :: getDBO();
				$q = "SELECT `setting` FROM `#__vikrentcar_config` WHERE `param`='hoursmorerentback';";
				$dbo->setQuery($q);
				$dbo->Query($q);
				$s = $dbo->loadAssocList();
				$sum = floor($daysdiff) * 86400;
				$newdiff = $secdiff - $sum;
				$maxhmore = $s[0]['setting'] * 3600;
				if ($maxhmore >= $newdiff) {
					$daysdiff = floor($daysdiff);
				} else {
					$daysdiff = ceil($daysdiff);
				}
			}
		}
		return ($daysdiff == $days ? true : false);
	}

	function registerLocationTaxRate($idpickuplocation) {
		$dbo = & JFactory :: getDBO();
		$session =& JFactory::getSession();
		$register = '';
		$q="SELECT `p`.`name`,`i`.`aliq` FROM `#__vikrentcar_places` AS `p` LEFT JOIN `#__vikrentcar_iva` `i` ON `p`.`idiva`=`i`.`id` WHERE `p`.`id`='".intval($idpickuplocation)."';";
		$dbo->setQuery($q);
		$dbo->Query($q);
		if ($dbo->getNumRows() > 0) {
			$getdata = $dbo->loadAssocList();
			if (!empty($getdata[0]['aliq'])) {
				$register = $getdata[0]['aliq'];
			}
		}
		$session->set('vrcLocationTaxRate', $register);
		return true;
	}

	function sayCostPlusIva($cost, $idprice, $order=array()) {
		$dbo = & JFactory :: getDBO();
		$session =& JFactory::getSession();
		$sval = $session->get('ivaInclusa', '');
		if(strlen($sval) > 0) {
			$ivainclusa = $sval;
		}else {
			$q = "SELECT `setting` FROM `#__vikrentcar_config` WHERE `param`='ivainclusa';";
			$dbo->setQuery($q);
			$dbo->Query($q);
			$iva = $dbo->loadAssocList();
			$session->set('ivaInclusa', $iva[0]['setting']);
			$ivainclusa = $iva[0]['setting'];
		}
		if (intval($ivainclusa) == 0) {
			//VRC 1.7 Rev.2
			$locationvat = strlen($order['locationvat']) > 0 ? $order['locationvat'] : (count($order) == 0 ? $session->get('vrcLocationTaxRate', '') : '');
			if (strlen($locationvat) > 0) {
				$subt = 100 + $locationvat;
				$op = ($cost * $subt / 100);
				return $op;
			}
			//
			$q = "SELECT `idiva` FROM `#__vikrentcar_prices` WHERE `id`='" . $idprice . "';";
			$dbo->setQuery($q);
			$dbo->Query($q);
			if ($dbo->getNumRows() == 1) {
				$pidiva = $dbo->loadAssocList();
				$q = "SELECT `aliq` FROM `#__vikrentcar_iva` WHERE `id`='" . $pidiva[0]['idiva'] . "';";
				$dbo->setQuery($q);
				$dbo->Query($q);
				if ($dbo->getNumRows() == 1) {
					$paliq = $dbo->loadAssocList();
					$subt = 100 + $paliq[0]['aliq'];
					$op = ($cost * $subt / 100);
					return $op;
				}
			}
		}
		return $cost;
	}

	function sayCostMinusIva($cost, $idprice, $order=array()) {
		$dbo = & JFactory :: getDBO();
		$session =& JFactory::getSession();
		$sval = $session->get('ivaInclusa', '');
		if(strlen($sval) > 0) {
			$ivainclusa = $sval;
		}else {
			$q = "SELECT `setting` FROM `#__vikrentcar_config` WHERE `param`='ivainclusa';";
			$dbo->setQuery($q);
			$dbo->Query($q);
			$iva = $dbo->loadAssocList();
			$session->set('ivaInclusa', $iva[0]['setting']);
			$ivainclusa = $iva[0]['setting'];
		}
		if (intval($ivainclusa) == 1) {
			//VRC 1.7 Rev.2
			$locationvat = strlen($order['locationvat']) > 0 ? $order['locationvat'] : (count($order) == 0 ? $session->get('vrcLocationTaxRate', '') : '');
			if (strlen($locationvat) > 0) {
				$subt = 100 + $locationvat;
				$op = ($cost * 100 / $subt);
				return $op;
			}
			//
			$q = "SELECT `idiva` FROM `#__vikrentcar_prices` WHERE `id`='" . $idprice . "';";
			$dbo->setQuery($q);
			$dbo->Query($q);
			if ($dbo->getNumRows() == 1) {
				$pidiva = $dbo->loadAssocList();
				$q = "SELECT `aliq` FROM `#__vikrentcar_iva` WHERE `id`='" . $pidiva[0]['idiva'] . "';";
				$dbo->setQuery($q);
				$dbo->Query($q);
				if ($dbo->getNumRows() == 1) {
					$paliq = $dbo->loadAssocList();
					$subt = 100 + $paliq[0]['aliq'];
					$op = ($cost * 100 / $subt);
					return $op;
				}
			}
		}
		return $cost;
	}

	function sayOptionalsPlusIva($cost, $idiva, $order=array()) {
		$dbo = & JFactory :: getDBO();
		$session =& JFactory::getSession();
		$sval = $session->get('ivaInclusa', '');
		if(strlen($sval) > 0) {
			$ivainclusa = $sval;
		}else {
			$q = "SELECT `setting` FROM `#__vikrentcar_config` WHERE `param`='ivainclusa';";
			$dbo->setQuery($q);
			$dbo->Query($q);
			$iva = $dbo->loadAssocList();
			$session->set('ivaInclusa', $iva[0]['setting']);
			$ivainclusa = $iva[0]['setting'];
		}
		if (intval($ivainclusa) == 0) {
			//VRC 1.7 Rev.2
			$locationvat = strlen($order['locationvat']) > 0 ? $order['locationvat'] : (count($order) == 0 ? $session->get('vrcLocationTaxRate', '') : '');
			if (strlen($locationvat) > 0) {
				$subt = 100 + $locationvat;
				$op = ($cost * $subt / 100);
				return $op;
			}
			//
			$q = "SELECT `aliq` FROM `#__vikrentcar_iva` WHERE `id`='" . $idiva . "';";
			$dbo->setQuery($q);
			$dbo->Query($q);
			if ($dbo->getNumRows() == 1) {
				$piva = $dbo->loadAssocList();
				$subt = 100 + $piva[0]['aliq'];
				$op = ($cost * $subt / 100);
				return $op;
			}
		}
		return $cost;
	}

	function sayOptionalsMinusIva($cost, $idiva, $order=array()) {
		$dbo = & JFactory :: getDBO();
		$session =& JFactory::getSession();
		$sval = $session->get('ivaInclusa', '');
		if(strlen($sval) > 0) {
			$ivainclusa = $sval;
		}else {
			$q = "SELECT `setting` FROM `#__vikrentcar_config` WHERE `param`='ivainclusa';";
			$dbo->setQuery($q);
			$dbo->Query($q);
			$iva = $dbo->loadAssocList();
			$session->set('ivaInclusa', $iva[0]['setting']);
			$ivainclusa = $iva[0]['setting'];
		}
		if (intval($ivainclusa) == 1) {
			//VRC 1.7 Rev.2
			$locationvat = strlen($order['locationvat']) > 0 ? $order['locationvat'] : (count($order) == 0 ? $session->get('vrcLocationTaxRate', '') : '');
			if (strlen($locationvat) > 0) {
				$subt = 100 + $locationvat;
				$op = ($cost * 100 / $subt);
				return $op;
			}
			//
			$q = "SELECT `aliq` FROM `#__vikrentcar_iva` WHERE `id`='" . $idiva . "';";
			$dbo->setQuery($q);
			$dbo->Query($q);
			if ($dbo->getNumRows() == 1) {
				$piva = $dbo->loadAssocList();
				$subt = 100 + $piva[0]['aliq'];
				$op = ($cost * 100 / $subt);
				return $op;
			}
		}
		return $cost;
	}

	function getSecretLink() {
		$sid = mt_rand();
		$dbo = & JFactory :: getDBO();
		$q = "SELECT `sid` FROM `#__vikrentcar_orders`;";
		$dbo->setQuery($q);
		$dbo->Query($q);
		if (@ $dbo->getNumRows() > 0) {
			$all = $dbo->loadAssocList();
			foreach ($all as $s) {
				$arr[] = $s['sid'];
			}
			if (in_array($sid, $arr)) {
				while (in_array($sid, $arr)) {
					$sid++;
				}
			}
		}
		return $sid;
	}

	function buildCustData($arr, $sep) {
		$cdata = "";
		foreach ($arr as $k => $e) {
			if (strlen($e)) {
				$cdata .= (strlen($k) > 0 ? $k . ": " : "") . $e . $sep;
			}
		}
		return $cdata;
	}

	function sendAdminMail($to, $subject, $ftitle, $ts, $custdata, $carname, $first, $second, $pricestr, $optstr, $tot, $status, $place = "", $returnplace = "", $maillocfee = "", $payname = "", $couponstr = "") {
		$parts = explode(';;', $to);
		$to = $parts[0];
		$useremail = $parts[1];
		$dbo = & JFactory :: getDBO();
		$q = "SELECT `setting` FROM `#__vikrentcar_config` WHERE `param`='currencyname';";
		$dbo->setQuery($q);
		$dbo->Query($q);
		$currencyname = $dbo->loadResult();
		$q = "SELECT `setting` FROM `#__vikrentcar_config` WHERE `param`='dateformat';";
		$dbo->setQuery($q);
		$dbo->Query($q);
		$formdate = $dbo->loadResult();
		if ($formdate == "%d/%m/%Y") {
			$df = 'd/m/Y';
		}elseif ($formdate == "%m/%d/%Y") {
			$df = 'm/d/Y';
		} else {
			$df = 'Y/m/d';
		}
		$msg = $ftitle . "\n\n";
		$msg .= JText :: _('VRLIBONE') . " " . date($df . ' H:i', $ts) . "\n";
		$msg .= JText :: _('VRLIBTWO') . ":\n" . $custdata . "\n";
		$msg .= JText :: _('VRLIBTHREE') . ": " . $carname . "\n";
		$msg .= JText :: _('VRLIBFOUR') . " " . date($df . ' H:i', $first) . "\n";
		$msg .= JText :: _('VRLIBFIVE') . " " . date($df . ' H:i', $second) . "\n";
		$msg .= (!empty ($place) ? JText :: _('VRRITIROCAR') . ": " . $place . "\n" : "");
		$msg .= (!empty ($returnplace) ? JText :: _('VRRETURNCARORD') . ": " . $returnplace . "\n" : "");
		$msg .= $pricestr . "\n";
		$msg .= $optstr . "\n";
		if (!empty ($maillocfee) && $maillocfee > 0) {
			$msg .= JText :: _('VRLOCFEETOPAY') . ": " . self::numberFormat($maillocfee) . " " . $currencyname . "\n\n";
		}
		//vikrentcar 1.6 coupon
		if(strlen($couponstr) > 0) {
			$expcoupon = explode(";", $couponstr);
			$msg .= JText :: _('VRCCOUPON')." ".$expcoupon[2].": -" . $expcoupon[1] . " " . $currencyname . "\n\n";
		}
		//
		$msg .= JText :: _('VRLIBSIX') . ": " . $tot . " " . $currencyname . "\n\n";
		if (!empty ($payname)) {
			$msg .= JText :: _('VRLIBPAYNAME') . ": " . $payname . "\n\n";
		}
		$msg .= JText :: _('VRLIBSEVEN') . ": " . $status;

		$subject = '=?UTF-8?B?' . base64_encode($subject) . '?=';

		$mailer =& JFactory::getMailer();
		$sender = array($useremail, $useremail);
		$mailer->setSender($sender);
		$mailer->addRecipient($to);
		$mailer->addReplyTo($useremail);
		$mailer->setSubject($subject);
		$mailer->setBody($msg);
		$mailer->isHTML(false);
		$mailer->Encoding = 'base64';
		$mailer->Send();

		return true;
	}

	function loadEmailTemplate () {
		define('_VIKRENTCAREXEC', '1');
		ob_start();
		include JPATH_SITE . DS ."components". DS ."com_vikrentcar". DS . "helpers" . DS ."email_tmpl.php";
		$content = ob_get_contents();
		ob_end_clean();
		return $content;
	}

	function loadPdfTemplate () {
		defined('_VIKRENTCAREXEC') OR define('_VIKRENTCAREXEC', '1');
		ob_start();
		include JPATH_SITE . DS ."components". DS ."com_vikrentcar". DS . "helpers" . DS ."pdf_tmpl.php";
		$content = ob_get_contents();
		ob_end_clean();
		return $content;
	}

	function parseEmailTemplate ($tmpl, $orderid, $currencyname, $status, $tlogo, $tcname, $todate, $tcustdata, $tiname, $tpickupdate, $tdropdate, $tpickupplace, $tdropplace, $tprices, $topts, $tlocfee, $ttot, $tlink, $tfootm, $couponstr) {
		$parsed = $tmpl;
		//get sid and ts
		$lparts = explode("&sid=", $tlink);
		$lpartstwo = explode("&ts=", $lparts[1]);
		$sid = $lpartstwo[0];
		$lpartsthree = explode("&", $lpartstwo[1]);
		$ts = $lpartsthree[0];
		//
		//Confirmation Number
		if ($status == JText :: _('VRCOMPLETED')) {
			$parsed = str_replace("{confirmnumb}", $sid.'_'.$ts, $parsed);
		}else {
			$parsed = preg_replace('#('.preg_quote('{confirmnumb_delimiter}').')(.*)('.preg_quote('{/confirmnumb_delimiter}').')#si', '$1'.' '.'$3', $parsed);
		}
		$parsed = str_replace("{confirmnumb_delimiter}", "", $parsed);
		$parsed = str_replace("{/confirmnumb_delimiter}", "", $parsed);
		//
		$parsed = str_replace("{logo}", $tlogo, $parsed);
		$parsed = str_replace("{company_name}", $tcname, $parsed);
		$parsed = str_replace("{order_id}", $orderid, $parsed);
		$statusclass = $status == JText :: _('VRCOMPLETED') ? "confirmed" : "standby";
		$parsed = str_replace("{order_status_class}", $statusclass, $parsed);
		$parsed = str_replace("{order_status}", $status, $parsed);
		$parsed = str_replace("{order_date}", $todate, $parsed);
		$parsed = str_replace("{customer_info}", $tcustdata, $parsed);
		$parsed = str_replace("{item_name}", $tiname, $parsed);
		$parsed = str_replace("{pickup_date}", $tpickupdate, $parsed);
		$parsed = str_replace("{pickup_location}", $tpickupplace, $parsed);
		$parsed = str_replace("{dropoff_date}", $tdropdate, $parsed);
		$parsed = str_replace("{dropoff_location}", $tdropplace, $parsed);
		//order details
		$orderdetails = "";
		$expdet = explode("\n", $tprices);
		$faredets = explode(":", $expdet[0]);
		$orderdetails .= '<div class="hireordata"><span class="Stile9">'.$faredets[0];
		if(!empty($expdet[1])) {
			$attrfaredets = explode(":", $expdet[1]);
			if(strlen($attrfaredets[1]) > 0) {
				$orderdetails .= ' - '.$attrfaredets[0].':'.$attrfaredets[1];
			}
		}
		$fareprice = trim(str_replace($currencyname, "", $faredets[1]));
		$orderdetails .= '</span><div align="right"><span class="Stile9">'.$currencyname.' '.self::numberFormat($fareprice).'</span></div></div>';
		//options
		if(strlen($topts) > 0) {
			$expopts = explode("\n", $topts);
			foreach($expopts as $optinfo) {
				if(!empty($optinfo)) {
					$splitopt = explode(":", $optinfo);
					$optprice = trim(str_replace($currencyname, "", $splitopt[1]));
					$orderdetails .= '<div class="hireordata"><span class="Stile9">'.$splitopt[0].'</span><div align="right"><span class="Stile9">'.$currencyname.' '.self::numberFormat($optprice).'</span></div></div>';
				}
			}
		}
		//
		//locations fee
		if(!empty($tlocfee) && $tlocfee > 0) {
			$orderdetails .= '<div class="hireordata"><span class="Stile9">'.JText :: _('VRLOCFEETOPAY').'</span><div align="right"><span class="Stile9">'.$currencyname.' '.self::numberFormat($tlocfee).'</span></div></div>';
		}
		//
		//coupon
		if(strlen($couponstr) > 0) {
			$expcoupon = explode(";", $couponstr);
			$orderdetails .= '<br/><div class="hireordata"><span class="Stile9">'.JText :: _('VRCCOUPON').' '.$expcoupon[2].'</span><div align="right"><span class="Stile9">- '.$currencyname.' '.self::numberFormat($expcoupon[1]).'</span></div></div>';
		}
		//
		$parsed = str_replace("{order_details}", $orderdetails, $parsed);
		//
		$parsed = str_replace("{order_total}", $currencyname.' '.self::numberFormat($ttot), $parsed);

		//IF-ELSE PARA METER TEXTO AL FINAL
		if ($status == JText :: _('VRCOMPLETED')) {
			$parsed = str_replace("{texto-confirmacion}", "Su reserva está siendo tramitada. En breves momentos nos pondremos en contacto con usted para informarle sobre cómo debe recoger su vehículo.", $parsed);
		}
		else{
			$parsed = str_replace("{texto-confirmacion}", "", $parsed);
		}

		$parsed = str_replace("{order_link}", '<a href="'.$tlink.'">'.$tlink.'</a>', $parsed);
		$parsed = str_replace("{footer_emailtext}", $tfootm, $parsed);

		return $parsed;
	}

	function parsePdfTemplate ($tmpl, $orderid, $currencyname, $status, $tlogo, $tcname, $todate, $custdata, $tiname, $tpickupdate, $tdropdate, $tpickupplace, $tdropplace, $tprices, $topts, $tlocfee, $ttot, $tlink, $tfootm, $couponstr, $arrayinfopdf = "") {
		$parsed = $tmpl;
		//to avoid cURL problems, images paths should be relative
		$tlogo = !empty($tlogo) ? str_replace(JURI::root().'administrator', JPATH_ADMINISTRATOR, $tlogo) : "";
		$parsed = str_replace("{logo}", $tlogo, $parsed);
		//
		//get sid and ts
		$lparts = explode("&sid=", $tlink);
		$lpartstwo = explode("&ts=", $lparts[1]);
		$sid = $lpartstwo[0];
		$lpartsthree = explode("&", $lpartstwo[1]);
		$ts = $lpartsthree[0];
		//
		//Confirmation Number
		if ($status == JText :: _('VRCOMPLETED')) {
			$parsed = str_replace("{confirmnumb}", $sid.'_'.$ts, $parsed);
		}else {
			$parsed = str_replace("{confirmnumb}", '--------', $parsed);
		}
		//
		$parsed = str_replace("{company_name}", $tcname, $parsed);
		$parsed = str_replace("{order_id}", $orderid, $parsed);
		$statusclass = $status == JText :: _('VRCOMPLETED') ? "green" : "red";
		$parsed = str_replace("{order_status_class}", $statusclass, $parsed);
		$parsed = str_replace("{order_status}", $status, $parsed);
		$parsed = str_replace("{order_date}", $todate, $parsed);
		$parsed = str_replace("{customer_info}", nl2br($custdata), $parsed);
		$parsed = str_replace("{item_name}", $tiname, $parsed);
		$parsed = str_replace("{pickup_date}", $tpickupdate, $parsed);
		$parsed = str_replace("{pickup_location}", $tpickupplace, $parsed);
		$parsed = str_replace("{dropoff_date}", $tdropdate, $parsed);
		$parsed = str_replace("{dropoff_location}", $tdropplace, $parsed);
		//order details
		$totalnet = 0;
		$totaltax = 0;
		$totalnet += $arrayinfopdf['tarminusiva'];
		$totaltax += $arrayinfopdf['tartax'];
		$orderdetails = "";
		$expdet = explode("\n", $tprices);
		$faredets = explode(":", $expdet[0]);
		$orderdetails .= '<tr><td align="left" style="border: 1px solid #DDDDDD;">'.$tiname.'<br/>'.$faredets[0];
		if(!empty($expdet[1])) {
			$attrfaredets = explode(":", $expdet[1]);
			if(strlen($attrfaredets[1]) > 0) {
				$orderdetails .= ' - '.$attrfaredets[0].':'.$attrfaredets[1];
			}
		}
		$fareprice = trim(str_replace($currencyname, "", $faredets[1]));
		$orderdetails .= '</td><td align="center" style="border: 1px solid #DDDDDD;">'.$arrayinfopdf['days'].'</td><td align="left" style="border: 1px solid #DDDDDD;">'.$currencyname.' '.self::numberFormat($arrayinfopdf['tarminusiva']).'</td><td align="left" style="border: 1px solid #DDDDDD;">'.$currencyname.' '.self::numberFormat($arrayinfopdf['tartax']).'</td><td align="left" style="border: 1px solid #DDDDDD;">'.$currencyname.' '.self::numberFormat($fareprice).'</td></tr>';
		//options
		if(strlen($topts) > 0) {
			$expopts = explode("\n", $topts);
			foreach($expopts as $kexpopt=>$optinfo) {
				if(!empty($optinfo)) {
					$splitopt = explode(":", $optinfo);
					$optprice = trim(str_replace($currencyname, "", $splitopt[1]));
					$orderdetails .= '<tr><td align="left" style="border: 1px solid #DDDDDD;">'.$splitopt[0].'</td><td align="center" style="border: 1px solid #DDDDDD;">'.$arrayinfopdf['days'].'</td><td align="left" style="border: 1px solid #DDDDDD;">'.$currencyname.' '.self::numberFormat($arrayinfopdf['opttaxnet'][$kexpopt]).'</td><td align="left" style="border: 1px solid #DDDDDD;">'.$currencyname.' '.self::numberFormat(($optprice - $arrayinfopdf['opttaxnet'][$kexpopt])).'</td><td align="left" style="border: 1px solid #DDDDDD;">'.$currencyname.' '.self::numberFormat($optprice).'</td></tr>';
					$totalnet += $arrayinfopdf['opttaxnet'][$kexpopt];
					$totaltax += ($optprice - $arrayinfopdf['opttaxnet'][$kexpopt]);
				}
			}
		}
		//
		//locations fee
		if(!empty($tlocfee) && $tlocfee > 0) {
			$orderdetails .= '<tr><td align="left" style="border: 1px solid #DDDDDD;">'.JText :: _('VRLOCFEETOPAY').'</td><td align="center" style="border: 1px solid #DDDDDD;">'.$arrayinfopdf['days'].'</td><td align="left" style="border: 1px solid #DDDDDD;">'.$currencyname.' '.self::numberFormat($arrayinfopdf['locfeenet']).'</td><td align="left" style="border: 1px solid #DDDDDD;">'.$currencyname.' '.self::numberFormat(($tlocfee - $arrayinfopdf['locfeenet'])).'</td><td align="left" style="border: 1px solid #DDDDDD;">'.$currencyname.' '.self::numberFormat($tlocfee).'</td></tr>';
			$totalnet += $arrayinfopdf['locfeenet'];
			$totaltax += ($tlocfee - $arrayinfopdf['locfeenet']);
		}
		//
		//coupon
		if(strlen($couponstr) > 0) {
			$expcoupon = explode(";", $couponstr);
			$orderdetails .= '<tr><td><br/></td><td></td><td></td><td></td><td></td></tr>';
			$orderdetails .= '<tr><td align="left" style="border: 1px solid #DDDDDD;">'.JText :: _('VRCCOUPON').' '.$expcoupon[2].'</td><td style="border: 1px solid #DDDDDD;"></td><td style="border: 1px solid #DDDDDD;"></td><td style="border: 1px solid #DDDDDD;"></td><td align="left" style="border: 1px solid #DDDDDD;">- '.$currencyname.' '.self::numberFormat($expcoupon[1]).'</td></tr>';
		}
		//
		$parsed = str_replace("{order_details}", $orderdetails, $parsed);
		//
		//order total
		$strordtotal = '<tr><td><br/></td><td></td><td></td><td></td><td></td></tr>';
		$strordtotal .= '<tr><td align="left" bgcolor="#EFEFEF" style="border: 1px solid #DDDDDD;"><strong>'.JText::_('VRLIBSIX').'</strong></td><td bgcolor="#EFEFEF" style="border: 1px solid #DDDDDD;"></td><td bgcolor="#EFEFEF" style="border: 1px solid #DDDDDD;">'.$currencyname.' '.self::numberFormat($totalnet).'</td><td bgcolor="#EFEFEF" style="border: 1px solid #DDDDDD;">'.$currencyname.' '.self::numberFormat($totaltax).'</td><td align="left" bgcolor="#EFEFEF" style="border: 1px solid #DDDDDD;"><strong>'.$currencyname.' '.self::numberFormat($ttot).'</strong></td></tr>';
		if (array_key_exists('tot_paid', $arrayinfopdf) && floatval($arrayinfopdf['tot_paid']) > 0.00 && number_format($ttot, 2) != number_format($arrayinfopdf['tot_paid'], 2)) {
			$strordtotal .= '<tr><td align="left" bgcolor="#EFEFEF" style="border: 1px solid #DDDDDD;"><strong>'.JText::_('VRCAMOUNTPAID').'</strong></td><td bgcolor="#EFEFEF" style="border: 1px solid #DDDDDD;"></td><td bgcolor="#EFEFEF" style="border: 1px solid #DDDDDD;"> </td><td bgcolor="#EFEFEF" style="border: 1px solid #DDDDDD;"> </td><td align="left" bgcolor="#EFEFEF" style="border: 1px solid #DDDDDD;"><strong>'.$currencyname.' '.self::numberFormat($arrayinfopdf['tot_paid']).'</strong></td></tr>';
		}
		$parsed = str_replace("{order_total}", $strordtotal, $parsed);
		//

		$parsed = str_replace("{order_link}", '<a href="'.$tlink.'">'.$tlink.'</a>', $parsed);
		$parsed = str_replace("{footer_emailtext}", $tfootm, $parsed);

		//custom fields replace
		preg_match_all('/\{customfield ([0-9]+)\}/U', $parsed, $matches);
		if (is_array($matches[1]) && @count($matches[1]) > 0) {
			$dbo = & JFactory :: getDBO();
			$cfids = array();
			foreach($matches[1] as $cfid ){
				$cfids[] = $cfid;
			}
			$q = "SELECT * FROM `#__vikrentcar_custfields` WHERE `id` IN (".implode(", ", $cfids).");";
			$dbo->setQuery($q);
			$dbo->Query($q);
			$cfields = $dbo->getNumRows() > 0 ? $dbo->loadAssocList() : "";
			$cfmap = array();
			if (is_array($cfields)) {
				foreach($cfields as $cf) {
					$cfmap[trim(JText::_($cf['name']))] = $cf['id'];
				}
			}
			$cfmapreplace = array();
			$partsreceived = explode("\n", $custdata);
			if (count($partsreceived) > 0) {
				foreach($partsreceived as $pst) {
					if (!empty($pst)) {
						$tmpdata = explode(":", $pst);
						if (array_key_exists(trim($tmpdata[0]), $cfmap)) {
							$cfmapreplace[$cfmap[trim($tmpdata[0])]] = trim($tmpdata[1]);
						}
					}
				}
			}
			foreach($matches[1] as $cfid ){
				if (array_key_exists($cfid, $cfmapreplace)) {
					$parsed = str_replace("{customfield ".$cfid."}", $cfmapreplace[$cfid], $parsed);
				}else {
					$parsed = str_replace("{customfield ".$cfid."}", "", $parsed);
				}
			}
		}
		//end custom fields replace

		return $parsed;
	}

	function sendCustMail($to, $subject, $ftitle, $ts, $custdata, $carname, $first, $second, $pricestr, $optstr, $tot, $link, $status, $place = "", $returnplace = "", $maillocfee = "", $orderid = "", $strcouponeff = "", $arrayinfopdf = "") {
		$origsubject = $subject;
		$subject = '=?UTF-8?B?' . base64_encode($subject) . '?=';
		$dbo = & JFactory :: getDBO();
		$q = "SELECT `setting` FROM `#__vikrentcar_config` WHERE `param`='currencyname';";
		$dbo->setQuery($q);
		$dbo->Query($q);
		$currencyname = $dbo->loadResult();
		$q = "SELECT `setting` FROM `#__vikrentcar_config` WHERE `param`='adminemail';";
		$dbo->setQuery($q);
		$dbo->Query($q);
		$adminemail = $dbo->loadResult();
		$q = "SELECT `id`,`setting` FROM `#__vikrentcar_texts` WHERE `param`='footerordmail';";
		$dbo->setQuery($q);
		$dbo->Query($q);
		$ft = $dbo->loadAssocList();
		$q = "SELECT `id`,`setting` FROM `#__vikrentcar_config` WHERE `param`='sendjutility';";
		$dbo->setQuery($q);
		$dbo->Query($q);
		$sendmethod = $dbo->loadAssocList();
		$useju = intval($sendmethod[0]['setting']) == 1 ? true : false;
		$q = "SELECT `setting` FROM `#__vikrentcar_config` WHERE `param`='sitelogo';";
		$dbo->setQuery($q);
		$dbo->Query($q);
		$sitelogo = $dbo->loadResult();
		$q = "SELECT `setting` FROM `#__vikrentcar_config` WHERE `param`='dateformat';";
		$dbo->setQuery($q);
		$dbo->Query($q);
		$formdate = $dbo->loadResult();
		if ($formdate == "%d/%m/%Y") {
			$df = 'd/m/Y';
		}elseif ($formdate == "%m/%d/%Y") {
			$df = 'm/d/Y';
		} else {
			$df = 'Y/m/d';
		}
		$footerordmail = $ft[0]['setting'];
		$textfooterordmail = strip_tags($footerordmail);
		//text part
		$msg = $ftitle . "\n\n";
		$msg .= JText :: _('VRLIBEIGHT') . " " . date($df . ' H:i', $ts) . "\n";
		$msg .= JText :: _('VRLIBNINE') . ":\n" . $custdata . "\n";
		$msg .= JText :: _('VRLIBTEN') . ": " . $carname . "\n";
		$msg .= JText :: _('VRLIBELEVEN') . " " . date($df . ' H:i', $first) . "\n";
		$msg .= JText :: _('VRLIBTWELVE') . " " . date($df . ' H:i', $second) . "\n";
		$msg .= (!empty ($place) ? JText :: _('VRRITIROCAR') . ": " . $place . "\n" : "");
		$msg .= (!empty ($returnplace) ? JText :: _('VRRETURNCARORD') . ": " . $returnplace . "\n" : "");
		$msg .= $pricestr . "\n";
		$msg .= $optstr . "\n";
		if (!empty ($maillocfee) && $maillocfee > 0) {
			$msg .= JText :: _('VRLOCFEETOPAY') . ": " . self::numberFormat($maillocfee) . " " . $currencyname . "\n\n";
		}
		$msg .= JText :: _('VRLIBSIX') . " " . $tot . " " . $currencyname . "\n";
		$msg .= JText :: _('VRLIBSEVEN') . ": " . $status . "\n\n";
		$msg .= JText :: _('VRLIBTENTHREE') . ": \n" . $link;
		$msg .= (strlen(trim($textfooterordmail)) > 0 ? "\n" . $textfooterordmail : "");
		//
		//html part
		$from_name = $adminemail;
		$from_address = $adminemail;
		$reply_name = $from_name;
		$reply_address = $from_address;
		$reply_address = $from_address;
		$error_delivery_name = $from_name;
		$error_delivery_address = $from_address;
		$to_name = $to;
		$to_address = $to;
		//vikrentcar 1.5
		$tmpl = self::loadEmailTemplate();
		//
		if (!$useju) {
			require_once ("./components/com_vikrentcar/class/email_message.php");
			$email_message = new email_message_class;
			$email_message->SetEncodedEmailHeader("To", $to_address, $to_name);
			$email_message->SetEncodedEmailHeader("From", $from_address, $from_name);
			$email_message->SetEncodedEmailHeader("Reply-To", $reply_address, $reply_name);
			$email_message->SetHeader("Sender", $from_address);
			//			if(defined("PHP_OS")
			//			&& strcmp(substr(PHP_OS,0,3),"WIN"))
			//				$email_message->SetHeader("Return-Path",$error_delivery_address);

			$email_message->SetEncodedHeader("Subject", $subject);
			$attachlogo = false;
			if (!empty ($sitelogo) && @ file_exists('./administrator/components/com_vikrentcar/resources/' . $sitelogo)) {
				$image = array (
				"FileName" => JURI :: root() . "administrator/components/com_vikrentcar/resources/" . $sitelogo, "Content-Type" => "automatic/name", "Disposition" => "inline");
				$email_message->CreateFilePart($image, $image_part);
				$image_content_id = $email_message->GetPartContentID($image_part);
				$attachlogo = true;
			}
			$tlogo = ($attachlogo ? "<img src=\"cid:" . $image_content_id . "\" alt=\"imglogo\"/>\n" : "");
		} else {
			$attachlogo = false;
			if (!empty ($sitelogo) && @ file_exists('./administrator/components/com_vikrentcar/resources/' . $sitelogo)) {
				$attachlogo = true;
			}
			$tlogo = ($attachlogo ? "<img src=\"" . JURI :: root() . "administrator/components/com_vikrentcar/resources/" . $sitelogo . "\" alt=\"imglogo\"/>\n" : "");
		}
		//vikrentcar 1.5
		$tcname = $ftitle."\n";
		$todate = date($df . ' H:i', $ts)."\n";
		$tcustdata = nl2br($custdata)."\n";
		$tiname = $carname."\n";
		$tpickupdate = date($df . ' H:i', $first)."\n";
		$tdropdate = date($df . ' H:i', $second)."\n";
		$tpickupplace = (!empty ($place) ? $place."\n" : "");
		$tdropplace = (!empty ($returnplace) ? $returnplace."\n" : "");
		$tprices = $pricestr;
		$topts = $optstr;
		$tlocfee = $maillocfee;
		$ttot = $tot."\n";
		$tlink = $link;
		$tfootm = $footerordmail;
		$hmess = self::parseEmailTemplate($tmpl, $orderid, $currencyname, $status, $tlogo, $tcname, $todate, $tcustdata, $tiname, $tpickupdate, $tdropdate, $tpickupplace, $tdropplace, $tprices, $topts, $tlocfee, $ttot, $tlink, $tfootm, $strcouponeff);
		//

		if (!$useju) {
			$email_message->CreateQuotedPrintableHTMLPart($hmess, "", $html_part);
			$email_message->CreateQuotedPrintableTextPart($email_message->WrapText($msg), "", $text_part);
			$alternative_parts = array (
				$text_part,
				$html_part
			);
			$email_message->CreateAlternativeMultipart($alternative_parts, $alternative_part);
			$related_parts = array (
				$alternative_part,
				$image_part
			);
			$email_message->AddRelatedMultipart($related_parts);
			$error = $email_message->Send();
			if (strcmp($error, "")) {
				//$msg = utf8_decode($msg);
				@ mail($to, $subject, $msg, "MIME-Version: 1.0" . "\r\n" . "Content-type: text/plain; charset=UTF-8");
			}
		} else {
			//VikRentCar 1.7 PDF
			$attachment = null;
			if ($status == JText::_('VRCOMPLETED') && vikrentcar::sendPDF() && file_exists(JPATH_SITE . DS ."components". DS ."com_vikrentcar". DS . "helpers" . DS . "tcpdf" . DS . 'tcpdf.php')) {
				$pdfcont = self::loadPdfTemplate();
				$pdfhtml = self::parsePdfTemplate($pdfcont, $orderid, $currencyname, $status, $tlogo, $tcname, $todate, $custdata, $tiname, $tpickupdate, $tdropdate, $tpickupplace, $tdropplace, $tprices, $topts, $tlocfee, $ttot, $tlink, $tfootm, $strcouponeff, $arrayinfopdf);
				require_once(JPATH_SITE . DS ."components". DS ."com_vikrentcar". DS . "helpers" . DS . "tcpdf" . DS . 'tcpdf.php');
				$savepdfname = JPATH_SITE . DS ."components". DS ."com_vikrentcar". DS . "resources" . DS . "pdfs" . DS . $orderid.'_'.$ts.'.pdf';
				if (file_exists($savepdfname)) {
					unlink($savepdfname);
				}
				if (file_exists(JPATH_SITE . DS ."components". DS ."com_vikrentcar". DS . "helpers" . DS . "tcpdf" . DS . "fonts" . DS . "dejavusans.php")) {
					$usepdffont = 'dejavusans';
				}else {
					$usepdffont = 'helvetica';
				}
				$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
				//$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, false, 'ISO-8859-1', false);
				$pdf->SetTitle($origsubject);
				//Header for each page of the pdf. Img, Img width (default 30mm), Title, Subtitle
				$pdf->SetHeaderData('', 0, $origsubject, '');
				//
				//header and footer fonts
				$pdf->setHeaderFont(array($usepdffont, '', '10'));
				$pdf->setFooterFont(array($usepdffont, '', '8'));
				//margins
				$pdf->SetMargins(PDF_MARGIN_LEFT, '10', PDF_MARGIN_RIGHT);
				//$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
				$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
				$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
				//
				$pdf->SetAutoPageBreak(true, PDF_MARGIN_BOTTOM);
				$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);
				$pdf->SetFont($usepdffont, '', 10);
				//no header
				$pdf->SetPrintHeader(false);
				//
				$pdfhtmlpages = explode('{vrc_add_pdf_page}', $pdfhtml);
				foreach($pdfhtmlpages as $htmlpage) {
					if (strlen(str_replace(' ', '', trim($htmlpage))) > 0) {
						$pdf->AddPage();
						$pdf->writeHTML($htmlpage, true, false, true, false, '');
						$pdf->lastPage();
					}
				}
				$pdf->Output($savepdfname, 'F');
				$attachment = $savepdfname;
			}
			//end VikRentCar 1.7 PDF
			$hmess = '<html>'."\n".'<head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8"></head>'."\n".'<body>'.$hmess.'</body>'."\n".'</html>';
			$mailer =& JFactory::getMailer();
			$sender = array($from_address, $from_name);
			$mailer->setSender($sender);
			$mailer->addRecipient($to);
			$mailer->addReplyTo($reply_address);
			if ($attachment) {
				$mailer->addAttachment($attachment);
			}
			$mailer->setSubject($subject);
			$mailer->setBody($hmess);
			$mailer->isHTML(true);
			$mailer->Encoding = 'base64';
			$mailer->Send();
		}
		//

		return true;
	}

	function sendCustMailFromBack($to, $subject, $ftitle, $ts, $custdata, $carname, $first, $second, $pricestr, $optstr, $tot, $link, $status, $place = "", $returnplace = "", $maillocfee = "", $orderid = "", $strcouponeff = "", $arrayinfopdf = "", $sendpdf = true) {
		//this function is called in the administrator site
		$origsubject = $subject;
		$subject = '=?UTF-8?B?' . base64_encode($subject) . '?=';
		$dbo = & JFactory :: getDBO();
		$q = "SELECT `setting` FROM `#__vikrentcar_config` WHERE `param`='currencyname';";
		$dbo->setQuery($q);
		$dbo->Query($q);
		$currencyname = $dbo->loadResult();
		$q = "SELECT `setting` FROM `#__vikrentcar_config` WHERE `param`='adminemail';";
		$dbo->setQuery($q);
		$dbo->Query($q);
		$adminemail = $dbo->loadResult();
		$q = "SELECT `id`,`setting` FROM `#__vikrentcar_texts` WHERE `param`='footerordmail';";
		$dbo->setQuery($q);
		$dbo->Query($q);
		$ft = $dbo->loadAssocList();
		$q = "SELECT `id`,`setting` FROM `#__vikrentcar_config` WHERE `param`='sendjutility';";
		$dbo->setQuery($q);
		$dbo->Query($q);
		$sendmethod = $dbo->loadAssocList();
		$useju = intval($sendmethod[0]['setting']) == 1 ? true : false;
		$q = "SELECT `setting` FROM `#__vikrentcar_config` WHERE `param`='sitelogo';";
		$dbo->setQuery($q);
		$dbo->Query($q);
		$sitelogo = $dbo->loadResult();
		$q = "SELECT `setting` FROM `#__vikrentcar_config` WHERE `param`='dateformat';";
		$dbo->setQuery($q);
		$dbo->Query($q);
		$formdate = $dbo->loadResult();
		if ($formdate == "%d/%m/%Y") {
			$df = 'd/m/Y';
		}elseif ($formdate == "%m/%d/%Y") {
			$df = 'm/d/Y';
		} else {
			$df = 'Y/m/d';
		}
		$footerordmail = $ft[0]['setting'];
		$textfooterordmail = strip_tags($footerordmail);
		//text part
		$msg = $ftitle . "\n\n";
		$msg .= JText :: _('VRLIBEIGHT') . " " . date($df . ' H:i', $ts) . "\n";
		$msg .= JText :: _('VRLIBNINE') . ":\n" . $custdata . "\n";
		$msg .= JText :: _('VRLIBTEN') . ": " . $carname . "\n";
		$msg .= JText :: _('VRLIBELEVEN') . " " . date($df . ' H:i', $first) . "\n";
		$msg .= JText :: _('VRLIBTWELVE') . " " . date($df . ' H:i', $second) . "\n";
		$msg .= (!empty ($place) ? JText :: _('VRRITIROCAR') . ": " . $place . "\n" : "");
		$msg .= (!empty ($returnplace) ? JText :: _('VRRETURNCARORD') . ": " . $returnplace . "\n" : "");
		$msg .= $pricestr . "\n";
		$msg .= $optstr . "\n";
		if (!empty ($maillocfee) && $maillocfee > 0) {
			$msg .= JText :: _('VRLOCFEETOPAY') . ": " . self::numberFormat($maillocfee) . " " . $currencyname . "\n\n";
		}
		$msg .= JText :: _('VRLIBSIX') . " " . $tot . " " . $currencyname . "\n";
		$msg .= JText :: _('VRLIBSEVEN') . ": " . $status . "\n\n";
		$msg .= JText :: _('VRLIBTENTHREE') . ": \n" . $link;
		$msg .= (strlen(trim($textfooterordmail)) > 0 ? "\n" . $textfooterordmail : "");
		//
		//html part
		$from_name = $adminemail;
		$from_address = $adminemail;
		$reply_name = $from_name;
		$reply_address = $from_address;
		$reply_address = $from_address;
		$error_delivery_name = $from_name;
		$error_delivery_address = $from_address;
		$to_name = $to;
		$to_address = $to;
		//vikrentcar 1.5
		$tmpl = self::loadEmailTemplate();
		//
		if (!$useju) {
			require_once ("../components/com_vikrentcar/class/email_message.php");
			$email_message = new email_message_class;
			$email_message->SetEncodedEmailHeader("To", $to_address, $to_name);
			$email_message->SetEncodedEmailHeader("From", $from_address, $from_name);
			$email_message->SetEncodedEmailHeader("Reply-To", $reply_address, $reply_name);
			$email_message->SetHeader("Sender", $from_address);
			//			if(defined("PHP_OS")
			//			&& strcmp(substr(PHP_OS,0,3),"WIN"))
			//				$email_message->SetHeader("Return-Path",$error_delivery_address);

			$email_message->SetEncodedHeader("Subject", $subject);
			$attachlogo = false;
			if (!empty ($sitelogo) && @ file_exists('./components/com_vikrentcar/resources/' . $sitelogo)) {
				$image = array (
				"FileName" => JURI :: root() . "administrator/components/com_vikrentcar/resources/" . $sitelogo, "Content-Type" => "automatic/name", "Disposition" => "inline");
				$email_message->CreateFilePart($image, $image_part);
				$image_content_id = $email_message->GetPartContentID($image_part);
				$attachlogo = true;
			}
			$tlogo = ($attachlogo ? "<img src=\"cid:" . $image_content_id . "\" alt=\"imglogo\"/>\n" : "");
		} else {
			$attachlogo = false;
			if (!empty ($sitelogo) && @ file_exists('./components/com_vikrentcar/resources/' . $sitelogo)) {
				$attachlogo = true;
			}
			$tlogo = ($attachlogo ? "<img src=\"" . JURI :: root() . "administrator/components/com_vikrentcar/resources/" . $sitelogo . "\" alt=\"imglogo\"/>\n" : "");
		}
		//vikrentcar 1.5
		$tcname = $ftitle."\n";
		$todate = date($df . ' H:i', $ts)."\n";
		$tcustdata = nl2br($custdata)."\n";
		$tiname = $carname."\n";
		$tpickupdate = date($df . ' H:i', $first)."\n";
		$tdropdate = date($df . ' H:i', $second)."\n";
		$tpickupplace = (!empty ($place) ? $place."\n" : "");
		$tdropplace = (!empty ($returnplace) ? $returnplace."\n" : "");
		$tprices = $pricestr;
		$topts = $optstr;
		$tlocfee = $maillocfee;
		$ttot = $tot."\n";
		$tlink = $link;
		$tfootm = $footerordmail;
		$hmess = self::parseEmailTemplate($tmpl, $orderid, $currencyname, $status, $tlogo, $tcname, $todate, $tcustdata, $tiname, $tpickupdate, $tdropdate, $tpickupplace, $tdropplace, $tprices, $topts, $tlocfee, $ttot, $tlink, $tfootm, $strcouponeff);
		//

		if (!$useju) {
			$email_message->CreateQuotedPrintableHTMLPart($hmess, "", $html_part);
			$email_message->CreateQuotedPrintableTextPart($email_message->WrapText($msg), "", $text_part);
			$alternative_parts = array (
				$text_part,
				$html_part
			);
			$email_message->CreateAlternativeMultipart($alternative_parts, $alternative_part);
			$related_parts = array (
				$alternative_part,
				$image_part
			);
			$email_message->AddRelatedMultipart($related_parts);
			$error = $email_message->Send();
			if (strcmp($error, "")) {
				//$msg = utf8_decode($msg);
				@ mail($to, $subject, $msg, "MIME-Version: 1.0" . "\r\n" . "Content-type: text/plain; charset=UTF-8");
			}
		} else {
			//VikRentCar 1.7 PDF
			$attachment = null;
			if ($status == JText::_('VRCOMPLETED') && $sendpdf && vikrentcar::sendPDF() && file_exists(JPATH_SITE . DS ."components". DS ."com_vikrentcar". DS . "helpers" . DS . "tcpdf" . DS . 'tcpdf.php')) {
				$pdfcont = self::loadPdfTemplate();
				$pdfhtml = self::parsePdfTemplate($pdfcont, $orderid, $currencyname, $status, $tlogo, $tcname, $todate, $custdata, $tiname, $tpickupdate, $tdropdate, $tpickupplace, $tdropplace, $tprices, $topts, $tlocfee, $ttot, $tlink, $tfootm, $strcouponeff, $arrayinfopdf);
				//images with src images/ must be converted into ../images/ for teh PDF
				$pdfhtml = str_replace('<img src="images/', '<img src="../images/', $pdfhtml);
				//
				require_once(JPATH_SITE . DS ."components". DS ."com_vikrentcar". DS . "helpers" . DS . "tcpdf" . DS . 'tcpdf.php');
				$savepdfname = JPATH_SITE . DS ."components". DS ."com_vikrentcar". DS . "resources" . DS . "pdfs" . DS . $orderid.'_'.$ts.'.pdf';
				if (file_exists($savepdfname)) {
					unlink($savepdfname);
				}
				if (file_exists(JPATH_SITE . DS ."components". DS ."com_vikrentcar". DS . "helpers" . DS . "tcpdf" . DS . "fonts" . DS . "dejavusans.php")) {
					$usepdffont = 'dejavusans';
				}else {
					$usepdffont = 'helvetica';
				}
				$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
				//$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, false, 'ISO-8859-1', false);
				$pdf->SetTitle($origsubject);
				//Header for each page of the pdf. Img, Img width (default 30mm), Title, Subtitle
				$pdf->SetHeaderData('', 0, $origsubject, '');
				//
				//header and footer fonts
				$pdf->setHeaderFont(array($usepdffont, '', '10'));
				$pdf->setFooterFont(array($usepdffont, '', '8'));
				//margins
				$pdf->SetMargins(PDF_MARGIN_LEFT, '10', PDF_MARGIN_RIGHT);
				//$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
				$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
				$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
				//
				$pdf->SetAutoPageBreak(true, PDF_MARGIN_BOTTOM);
				$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);
				$pdf->SetFont($usepdffont, '', 10);
				//no header
				$pdf->SetPrintHeader(false);
				//
				$pdfhtmlpages = explode('{vrc_add_pdf_page}', $pdfhtml);
				foreach($pdfhtmlpages as $htmlpage) {
					if (strlen(str_replace(' ', '', trim($htmlpage))) > 0) {
						$pdf->AddPage();
						$pdf->writeHTML($htmlpage, true, false, true, false, '');
						$pdf->lastPage();
					}
				}
				$pdf->Output($savepdfname, 'F');
				$attachment = $savepdfname;
			}
			//end VikRentCar 1.7 PDF
			$hmess = '<html>'."\n".'<head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8"></head>'."\n".'<body>'.$hmess.'</body>'."\n".'</html>';
			$mailer =& JFactory::getMailer();
			$sender = array($from_address, $from_name);
			$mailer->setSender($sender);
			$mailer->addRecipient($to);
			$mailer->addReplyTo($reply_address);
			if ($attachment) {
				$mailer->addAttachment($attachment);
			}
			$mailer->setSubject($subject);
			$mailer->setBody($hmess);
			$mailer->isHTML(true);
			$mailer->Encoding = 'base64';
			$mailer->Send();
		}
		//

		return true;
	}

	function paypalForm($imp, $tax, $sid, $ts, $carname, $currencysymb = "") {
		$dbo = & JFactory :: getDBO();
		$depositmess = "";
		$q = "SELECT `setting` FROM `#__vikrentcar_config` WHERE `param`='paytotal';";
		$dbo->setQuery($q);
		$dbo->Query($q);
		$s = $dbo->loadAssocList();
		if (intval($s[0]['setting']) == 0) {
			$q = "SELECT `setting` FROM `#__vikrentcar_config` WHERE `param`='payaccpercent';";
			$dbo->setQuery($q);
			$dbo->Query($q);
			$per = $dbo->loadAssocList();
			if ($per[0]['setting'] > 0) {
				$imp = $imp * $per[0]['setting'] / 100;
				$tax = $tax * $per[0]['setting'] / 100;
				$depositmess = "<p><strong>" . JText :: _('VRLEAVEDEPOSIT') . " " . (number_format($imp + $tax, 2)) . " " . $currencysymb . "</strong></p><br/>";
			}
		}
		$q = "SELECT `setting` FROM `#__vikrentcar_config` WHERE `param`='ccpaypal';";
		$dbo->setQuery($q);
		$dbo->Query($q);
		$acc = $dbo->loadAssocList();
		$q = "SELECT `id`,`setting` FROM `#__vikrentcar_texts` WHERE `param`='paymentname';";
		$dbo->setQuery($q);
		$dbo->Query($q);
		$payname = $dbo->loadAssocList();
		$q = "SELECT `setting` FROM `#__vikrentcar_config` WHERE `param`='currencycodepp';";
		$dbo->setQuery($q);
		$dbo->Query($q);
		$paypalcurcode = trim($dbo->loadResult());
		$itname = (empty ($payname[0]['setting']) ? $carname : $payname[0]['setting']);
		$returl = JURI :: root() . "index.php?option=com_vikrentcar&task=vieworder&sid=" . $sid . "&ts=" . $ts;
		$notifyurl = JURI :: root() . "index.php?option=com_vikrentcar&task=notifypayment&sid=" . $sid . "&ts=" . $ts;
		$form = "<form action=\"https://www.paypal.com/cgi-bin/webscr\" method=\"post\">\n";
		$form .= "<input type=\"hidden\" name=\"business\" value=\"" . $acc[0]['setting'] . "\"/>\n";
		$form .= "<input type=\"hidden\" name=\"cmd\" value=\"_xclick\"/>\n";
		$form .= "<input type=\"hidden\" name=\"amount\" value=\"" . number_format($imp, 2) . "\"/>\n";
		$form .= "<input type=\"hidden\" name=\"item_name\" value=\"" . $itname . "\"/>\n";
		$form .= "<input type=\"hidden\" name=\"item_number\" value=\"" . $carname . "\"/>\n";
		$form .= "<input type=\"hidden\" name=\"quantity\" value=\"1\"/>\n";
		$form .= "<input type=\"hidden\" name=\"tax\" value=\"" . number_format($tax, 2) . "\"/>\n";
		$form .= "<input type=\"hidden\" name=\"shipping\" value=\"0.00\"/>\n";
		$form .= "<input type=\"hidden\" name=\"currency_code\" value=\"" . $paypalcurcode . "\"/>\n";
		$form .= "<input type=\"hidden\" name=\"no_shipping\" value=\"1\"/>\n";
		$form .= "<input type=\"hidden\" name=\"rm\" value=\"2\"/>\n";
		$form .= "<input type=\"hidden\" name=\"notify_url\" value=\"" . $notifyurl . "\"/>\n";
		$form .= "<input type=\"hidden\" name=\"return\" value=\"" . $returl . "\"/>\n";
		$form .= "<input type=\"image\" src=\"https://www.paypal.com/en_US/i/btn/btn_paynow_SM.gif\" name=\"submit\" alt=\"PayPal - The safer, easier way to pay online!\">\n";
		$form .= "</form>\n";
		return $depositmess . $form;
	}

	function sendPDF() {
		$dbo = & JFactory :: getDBO();
		$q = "SELECT `setting` FROM `#__vikrentcar_config` WHERE `param`='sendpdf';";
		$dbo->setQuery($q);
		$dbo->Query($q);
		$s = $dbo->loadAssocList();
		return (intval($s[0]['setting']) == 1 ? true : false);
	}

	function sendJutility() {
		$dbo = & JFactory :: getDBO();
		$q = "SELECT `setting` FROM `#__vikrentcar_config` WHERE `param`='sendjutility';";
		$dbo->setQuery($q);
		$dbo->Query($q);
		$s = $dbo->loadAssocList();
		return (intval($s[0]['setting']) == 1 ? true : false);
	}

	function saveOldOrders() {
		$dbo = & JFactory :: getDBO();
		$q = "SELECT `setting` FROM `#__vikrentcar_config` WHERE `param`='oldorders';";
		$dbo->setQuery($q);
		$dbo->Query($q);
		$s = $dbo->loadAssocList();
		return (intval($s[0]['setting']) == 1 ? true : false);
	}

	function allowStats() {
		$dbo = & JFactory :: getDBO();
		$q = "SELECT `setting` FROM `#__vikrentcar_config` WHERE `param`='allowstats';";
		$dbo->setQuery($q);
		$dbo->Query($q);
		$s = $dbo->loadAssocList();
		return (intval($s[0]['setting']) == 1 ? true : false);
	}

	function sendMailStats() {
		$dbo = & JFactory :: getDBO();
		$q = "SELECT `setting` FROM `#__vikrentcar_config` WHERE `param`='sendmailstats';";
		$dbo->setQuery($q);
		$dbo->Query($q);
		$s = $dbo->loadAssocList();
		return (intval($s[0]['setting']) == 1 ? true : false);
	}

	function getPlaceName($idplace) {
		$dbo = & JFactory :: getDBO();
		$q = "SELECT `id`,`name` FROM `#__vikrentcar_places` WHERE `id`=" . $dbo->quote($idplace) . ";";
		$dbo->setQuery($q);
		$dbo->Query($q);
		$p = @ $dbo->loadAssocList();
		return $p[0]['name'];
	}

	function getCategoryName($idcat) {
		$dbo = & JFactory :: getDBO();
		$q = "SELECT `id`,`name` FROM `#__vikrentcar_categories` WHERE `id`=" . $dbo->quote($idcat) . ";";
		$dbo->setQuery($q);
		$dbo->Query($q);
		$p = @ $dbo->loadAssocList();
		return $p[0]['name'];
	}

	function getLocFee($from, $to) {
		$dbo = & JFactory :: getDBO();
		$q = "SELECT * FROM `#__vikrentcar_locfees` WHERE (`from`=" . $dbo->quote($from) . " AND `to`=" . $dbo->quote($to) . ") OR (`to`=" . $dbo->quote($from) . " AND `from`=" . $dbo->quote($to) . " AND `invert`='1');";
		$dbo->setQuery($q);
		$dbo->Query($q);
		if ($dbo->getNumRows() > 0) {
			$res = $dbo->loadAssocList();
			return $res[0];
		}
		return false;
	}

	function sayLocFeePlusIva($cost, $idiva, $order=array()) {
		$dbo = & JFactory :: getDBO();
		$session =& JFactory::getSession();
		$sval = $session->get('ivaInclusa', '');
		if(strlen($sval) > 0) {
			$ivainclusa = $sval;
		}else {
			$q = "SELECT `setting` FROM `#__vikrentcar_config` WHERE `param`='ivainclusa';";
			$dbo->setQuery($q);
			$dbo->Query($q);
			$iva = $dbo->loadAssocList();
			$session->set('ivaInclusa', $iva[0]['setting']);
			$ivainclusa = $iva[0]['setting'];
		}
		if (intval($ivainclusa) == 0) {
			//VRC 1.7 Rev.2
			$locationvat = strlen($order['locationvat']) > 0 ? $order['locationvat'] : (count($order) == 0 ? $session->get('vrcLocationTaxRate', '') : '');
			if (strlen($locationvat) > 0) {
				$subt = 100 + $locationvat;
				$op = ($cost * $subt / 100);
				return $op;
			}
			//
			$q = "SELECT `aliq` FROM `#__vikrentcar_iva` WHERE `id`='" . $idiva . "';";
			$dbo->setQuery($q);
			$dbo->Query($q);
			if ($dbo->getNumRows() == 1) {
				$piva = $dbo->loadAssocList();
				$subt = 100 + $piva[0]['aliq'];
				$op = ($cost * $subt / 100);
				return $op;
			}
		}
		return $cost;
	}

	function sayLocFeeMinusIva($cost, $idiva, $order=array()) {
		$dbo = & JFactory :: getDBO();
		$session =& JFactory::getSession();
		$sval = $session->get('ivaInclusa', '');
		if(strlen($sval) > 0) {
			$ivainclusa = $sval;
		}else {
			$q = "SELECT `setting` FROM `#__vikrentcar_config` WHERE `param`='ivainclusa';";
			$dbo->setQuery($q);
			$dbo->Query($q);
			$iva = $dbo->loadAssocList();
			$session->set('ivaInclusa', $iva[0]['setting']);
			$ivainclusa = $iva[0]['setting'];
		}
		if (intval($ivainclusa) == 1) {
			//VRC 1.7 Rev.2
			$locationvat = strlen($order['locationvat']) > 0 ? $order['locationvat'] : (count($order) == 0 ? $session->get('vrcLocationTaxRate', '') : '');
			if (strlen($locationvat) > 0) {
				$subt = 100 + $locationvat;
				$op = ($cost * 100 / $subt);
				return $op;
			}
			//
			$q = "SELECT `aliq` FROM `#__vikrentcar_iva` WHERE `id`='" . $idiva . "';";
			$dbo->setQuery($q);
			$dbo->Query($q);
			if ($dbo->getNumRows() == 1) {
				$piva = $dbo->loadAssocList();
				$subt = 100 + $piva[0]['aliq'];
				$op = ($cost * 100 / $subt);
				return $op;
			}
		}
		return $cost;
	}

	function sortCarPrices($arr) {
		$newarr = array ();
		foreach ($arr as $k => $v) {
			$newarr[$k] = $v['cost'];
		}
		asort($newarr);
		$sorted = array ();
		foreach ($newarr as $k => $v) {
			$sorted[$k] = $arr[$k];
		}
		return $sorted;
	}

	function sortResults($arr) {
		$newarr = array ();
		foreach ($arr as $k => $v) {
			$newarr[$k] = $v[0]['cost'];
		}
		asort($newarr);
		$sorted = array ();
		foreach ($newarr as $k => $v) {
			$sorted[$k] = $arr[$k];
		}
		return $sorted;
	}

	function applySeasonalPrices($arr, $from, $to, $pickup) {
		$dbo = & JFactory :: getDBO();
		$carschange = array();
		$one = getdate($from);
		//leap years
		if(($one['year'] % 4) == 0 && ($one['year'] % 100 != 0 || $one['year'] % 400 == 0)) {
			$isleap = true;
		}else {
			$isleap = false;
		}
		//
		$baseone = mktime(0, 0, 0, 1, 1, $one['year']);
		$tomidnightone = intval($one['hours']) * 3600;
		$tomidnightone += intval($one['minutes']) * 60;
		$sfrom = $from - $baseone - $tomidnightone;
		$fromdayts = mktime(0, 0, 0, $one['mon'], $one['mday'], $one['year']);
		$two = getdate($to);
		$basetwo = mktime(0, 0, 0, 1, 1, $two['year']);
		$tomidnighttwo = intval($two['hours']) * 3600;
		$tomidnighttwo += intval($two['minutes']) * 60;
		$sto = $to - $basetwo - $tomidnighttwo;
		//Hourly Prices
		if($sfrom === $sto) {
			$sto += 86399;
		}
		//End Hourly Prices
		//leap years, last day of the month of the season
		if($isleap) {
			$leapts = mktime(0, 0, 0, 2, 29, $two['year']);
			if($two[0] >= $leapts) {
				$sfrom -= 86400;
				$sto -= 86400;
			}
		}
		//
		$q = "SELECT * FROM `#__vikrentcar_seasons` WHERE (`locations`='0' OR `locations`='" . $pickup . "') AND (" .
		 ($sto > $sfrom ? "(`from`<=" . $sfrom . " AND `to`>=" . $sto . ") " : "") .
		 ($sto > $sfrom ? "OR (`from`<=" . $sfrom . " AND `to`>=" . $sfrom . ") " : "(`from`<=" . $sfrom . " AND `to`<=" . $sfrom . " AND `from`>`to`) ") .
		 ($sto > $sfrom ? "OR (`from`<=" . $sto . " AND `to`>=" . $sto . ") " : "OR (`from`>=" . $sto . " AND `to`>=" . $sto . " AND `from`>`to`) ") .
		 ($sto > $sfrom ? "OR (`from`>=" . $sfrom . " AND `from`<=" . $sto . " AND `to`>=" . $sfrom . " AND `to`<=" . $sto . ")" : "OR (`from`>=" . $sfrom . " AND `from`>" . $sto . " AND `to`<" . $sfrom . " AND `to`<=" . $sto . " AND `from`>`to`)") .
		 ($sto > $sfrom ? " OR (`from`<=" . $sfrom . " AND `from`<=" . $sto . " AND `to`<" . $sfrom . " AND `to`<" . $sto . " AND `from`>`to`) OR (`from`>" . $sfrom . " AND `from`>" . $sto . " AND `to`>=" . $sfrom . " AND `to`>=" . $sto . " AND `from`>`to`)" : " OR (`from` <=" . $sfrom . " AND `to` >=" . $sfrom . " AND `from` >" . $sto . " AND `to` >" . $sto . " AND `from` < `to`)") .
		 ($sto > $sfrom ? " OR (`from` >=" . $sfrom . " AND `from` <" . $sto . " AND `to` <" . $sfrom . " AND `to` <" . $sto . " AND `from` > `to`)" : "").
		 ($sto > $sfrom ? " OR (`from` >" . $sfrom . " AND `from` >" . $sto . " AND `to` >=" . $sfrom . " AND `to` <" . $sto . " AND `from` > `to`)" : "").
		");";
		$dbo->setQuery($q);
		$dbo->Query($q);
		$totseasons = $dbo->getNumRows();
		if ($totseasons > 0) {
			$seasons = $dbo->loadAssocList();
			$applyseasons = false;
			$mem = array();
			foreach ($arr as $k => $a) {
				$mem[$k]['daysused'] = 0;
				$mem[$k]['sum'] = array();
			}
			foreach ($seasons as $s) {
				$allcars = explode(",", $s['idcars']);
				$inits = $baseone + $s['from'];
				if ($s['from'] < $s['to']) {
					$ends = $basetwo + $s['to'];
				} else {
					//between 2 years
					if ($baseone < $basetwo) {
						//ex. 29/12/2012 - 14/01/2013
						$ends = $basetwo + $s['to'];
					} else {
						if (($sfrom >= $s['from'] && $sto >= $s['from']) OR ($sfrom < $s['from'] && $sto >= $s['from'] && $sfrom > $s['to'] && $sto > $s['to'])) {
							//ex. 25/12 - 30/12 with init season on 20/12 OR 27/12 for counting 28,29,30/12
							$tmpbase = mktime(0, 0, 0, 1, 1, ($one['year'] + 1));
							$ends = $tmpbase + $s['to'];
						} else {
							//ex. 03/01 - 09/01
							$ends = $basetwo + $s['to'];
							$tmpbase = mktime(0, 0, 0, 1, 1, ($one['year'] - 1));
							$inits = $tmpbase + $s['from'];
						}
					}
				}
				//leap years
				if($isleap == true) {
					$infoseason = getdate($inits);
					$leapts = mktime(0, 0, 0, 2, 29, $infoseason['year']);
					if($infoseason[0] >= $leapts) {
						$inits += 86400;
						$ends += 86400;
					}
				}
				//
				//week days
				$filterwdays = !empty($s['wdays']) ? true : false;
				$wdays = $filterwdays == true ? explode(';', $s['wdays']) : '';
				if (is_array($wdays) && count($wdays) > 0) {
					foreach($wdays as $kw=>$wd) {
						if (strlen($wd) == 0) {
							unset($wdays[$kw]);
						}
					}
				}
				//
				//pickup must be after the begin of the season
				if($s['pickupincl'] == 1) {
					$pickupinclok = false;
					if($s['from'] < $s['to']) {
						if($sfrom >= $s['from'] && $sfrom <= $s['to']) {
							$pickupinclok = true;
						}
					}else {
						if(($sfrom >= $s['from'] && $sfrom > $s['to']) || ($sfrom < $s['from'] && $sfrom <= $s['to'])) {
							$pickupinclok = true;
						}
					}
				}else {
					$pickupinclok = true;
				}
				//
				if($pickupinclok == true) {
					foreach ($arr as $k => $a) {
						if (in_array("-" . $a[0]['idcar'] . "-", $allcars)) {
							$affdays = 0;
							for ($i = 0; $i < $a[0]['days']; $i++) {
								//VRC 1.7 rev2
								if($s['keepfirstdayrate'] == 1) {
									if ($fromdayts >= $inits && $fromdayts <= $ends) {
										$affdays = $a[0]['days'];
									}else {
										$affdays = 0;
									}
									break;
								}
								//end VRC 1.7 rev2
								$todayts = $fromdayts + ($i * 86400);
								if ($todayts >= $inits && $todayts <= $ends) {
									//week days
									if($filterwdays == true) {
										$checkwday = getdate($todayts);
										if(in_array($checkwday['wday'], $wdays)) {
											$affdays++;
										}
									}else {
										$affdays++;
									}
									//
								}
							}
							if ($affdays > 0) {
								$applyseasons = true;
								$dailyprice = $a[0]['cost'] / $a[0]['days'];
								//VikRentCar 1.7 for abs or pcent and values overrides
								if (intval($s['val_pcent']) == 2) {
									//percentage value
									$pctval = $s['diffcost'];
									if (strlen($s['losoverride']) > 0) {
										//values overrides
										$arrvaloverrides = array();
										$valovrparts = explode('_', $s['losoverride']);
										foreach($valovrparts as $valovr) {
											if (!empty($valovr)) {
												$ovrinfo = explode(':', $valovr);
												if(strstr($ovrinfo[0], '-i') != false) {
													$ovrinfo[0] = str_replace('-i', '', $ovrinfo[0]);
													if((int)$ovrinfo[0] < $a[0]['days']) {
														$arrvaloverrides[$a[0]['days']] = $ovrinfo[1];
													}
												}
												$arrvaloverrides[$ovrinfo[0]] = $ovrinfo[1];
											}
										}
										if (array_key_exists($a[0]['days'], $arrvaloverrides)) {
											$pctval = $arrvaloverrides[$a[0]['days']];
										}
									}
									if (intval($s['type']) == 1) {
										//charge
										$cpercent = 100 + $pctval;
									} else {
										//discount
										$cpercent = 100 - $pctval;
									}
									$newprice = ($dailyprice * $cpercent / 100) * $affdays;
								}else {
									//absolute value
									$absval = $s['diffcost'];
									if (strlen($s['losoverride']) > 0) {
										//values overrides
										$arrvaloverrides = array();
										$valovrparts = explode('_', $s['losoverride']);
										foreach($valovrparts as $valovr) {
											if (!empty($valovr)) {
												$ovrinfo = explode(':', $valovr);
												if(strstr($ovrinfo[0], '-i') != false) {
													$ovrinfo[0] = str_replace('-i', '', $ovrinfo[0]);
													if((int)$ovrinfo[0] < $a[0]['days']) {
														$arrvaloverrides[$a[0]['days']] = $ovrinfo[1];
													}
												}
												$arrvaloverrides[$ovrinfo[0]] = $ovrinfo[1];
											}
										}
										if (array_key_exists($a[0]['days'], $arrvaloverrides)) {
											$absval = $arrvaloverrides[$a[0]['days']];
										}
									}
									if (intval($s['type']) == 1) {
										//charge
										$newprice = ($dailyprice + $absval) * $affdays;
									} else {
										//discount
										$newprice = ($dailyprice - $absval) * $affdays;
									}
								}
								//end VikRentCar 1.7 for abs or pcent and values overrides
								//VikRentCar 1.8
								if (!empty($s['roundmode'])) {
									$newprice = round($newprice, 0, constant($s['roundmode']));
								}
								//
								$mem[$k]['sum'][] = $newprice;
								$mem[$k]['daysused'] += $affdays;
								$carschange[] = $a[0]['idcar'];
							}
						}
					}
				}
			}
			if ($applyseasons) {
				foreach ($mem as $k => $v) {
					if ($v['daysused'] > 0 && @ count($v['sum']) > 0) {
						$newprice = 0;
						$dailyprice = $arr[$k][0]['cost'] / $arr[$k][0]['days'];
						$restdays = $arr[$k][0]['days'] - $v['daysused'];
						$addrest = $restdays * $dailyprice;
						$newprice += $addrest;
						foreach ($v['sum'] as $add) {
							$newprice += $add;
						}
						$arr[$k][0]['cost'] = $newprice;
						$arr[$k][0]['affdays'] = $v['daysused'];
					}
				}
			}
		}
		//week days with no season
		$carschange = array_unique($carschange);
		$q="SELECT * FROM `#__vikrentcar_seasons` WHERE (`locations`='0' OR `locations`=" . $dbo->quote($pickup) . ") AND ((`from` = 0 AND `to` = 0) OR (`from` IS NULL AND `to` IS NULL));";
		$dbo->setQuery($q);
		$dbo->Query($q);
		if($dbo->getNumRows() > 0) {
			$specials = $dbo->loadAssocList();
			$applyseasons = false;
			unset($mem);
			$mem = array();
			foreach ($arr as $k => $a) {
				$mem[$k]['daysused'] = 0;
				$mem[$k]['sum'] = array ();
			}
			foreach($specials as $s) {
				$allcars = explode(",", $s['idcars']);
				//week days
				$filterwdays = !empty($s['wdays']) ? true : false;
				$wdays = $filterwdays == true ? explode(';', $s['wdays']) : '';
				if (is_array($wdays) && count($wdays) > 0) {
					foreach($wdays as $kw=>$wd) {
						if (strlen($wd) == 0) {
							unset($wdays[$kw]);
						}
					}
				}
				//
				foreach ($arr as $k => $a) {
					//only cars with no price modifications from seasons
					if (in_array("-" . $a[0]['idcar'] . "-", $allcars) && !in_array($a[0]['idcar'], $carschange)) {
						$affdays = 0;
						for ($i = 0; $i < $a[0]['days']; $i++) {
							$todayts = $fromdayts + ($i * 86400);
							//week days
							if($filterwdays == true) {
								$checkwday = getdate($todayts);
								if(in_array($checkwday['wday'], $wdays)) {
									$affdays++;
								}
							}
							//
						}
						if ($affdays > 0) {
							$applyseasons = true;
							$dailyprice = $a[0]['cost'] / $a[0]['days'];
							//VikRentCat 1.7 for abs or pcent and values overrides
							if (intval($s['val_pcent']) == 2) {
								//percentage value
								$pctval = $s['diffcost'];
								if (strlen($s['losoverride']) > 0) {
									//values overrides
									$arrvaloverrides = array();
									$valovrparts = explode('_', $s['losoverride']);
									foreach($valovrparts as $valovr) {
										if (!empty($valovr)) {
											$ovrinfo = explode(':', $valovr);
											if(strstr($ovrinfo[0], '-i') != false) {
												$ovrinfo[0] = str_replace('-i', '', $ovrinfo[0]);
												if((int)$ovrinfo[0] < $a[0]['days']) {
													$arrvaloverrides[$a[0]['days']] = $ovrinfo[1];
												}
											}
											$arrvaloverrides[$ovrinfo[0]] = $ovrinfo[1];
										}
									}
									if (array_key_exists($a[0]['days'], $arrvaloverrides)) {
										$pctval = $arrvaloverrides[$a[0]['days']];
									}
								}
								if (intval($s['type']) == 1) {
									//charge
									$cpercent = 100 + $pctval;
								} else {
									//discount
									$cpercent = 100 - $pctval;
								}
								$newprice = ($dailyprice * $cpercent / 100) * $affdays;
							}else {
								//absolute value
								$absval = $s['diffcost'];
								if (strlen($s['losoverride']) > 0) {
									//values overrides
									$arrvaloverrides = array();
									$valovrparts = explode('_', $s['losoverride']);
									foreach($valovrparts as $valovr) {
										if (!empty($valovr)) {
											$ovrinfo = explode(':', $valovr);
											if(strstr($ovrinfo[0], '-i') != false) {
												$ovrinfo[0] = str_replace('-i', '', $ovrinfo[0]);
												if((int)$ovrinfo[0] < $a[0]['days']) {
													$arrvaloverrides[$a[0]['days']] = $ovrinfo[1];
												}
											}
											$arrvaloverrides[$ovrinfo[0]] = $ovrinfo[1];
										}
									}
									if (array_key_exists($a[0]['days'], $arrvaloverrides)) {
										$absval = $arrvaloverrides[$a[0]['days']];
									}
								}
								if (intval($s['type']) == 1) {
									//charge
									$newprice = ($dailyprice + $absval) * $affdays;
								} else {
									//discount
									$newprice = ($dailyprice - $absval) * $affdays;
								}
							}
							//end VikRentCar 1.7 for abs or pcent and values overrides
							//VikRentCar 1.8
							if (!empty($s['roundmode'])) {
								$newprice = round($newprice, 0, constant($s['roundmode']));
							}
							//
							$mem[$k]['sum'][] = $newprice;
							$mem[$k]['daysused'] += $affdays;
						}
					}
				}
			}
			if ($applyseasons) {
				foreach ($mem as $k => $v) {
					if ($v['daysused'] > 0 && @ count($v['sum']) > 0) {
						$newprice = 0;
						$dailyprice = $arr[$k][0]['cost'] / $arr[$k][0]['days'];
						$restdays = $arr[$k][0]['days'] - $v['daysused'];
						$addrest = $restdays * $dailyprice;
						$newprice += $addrest;
						foreach ($v['sum'] as $add) {
							$newprice += $add;
						}
						$arr[$k][0]['cost'] = $newprice;
						$arr[$k][0]['affdays'] = $v['daysused'];
					}
				}
			}
		}
		//end week days with no season
		return $arr;
	}

	function applySeasonsCar($arr, $from, $to, $pickup) {
		$dbo = & JFactory :: getDBO();
		$carschange = array();
		$one = getdate($from);
		//leap years
		if($one['year'] % 4 == 0 && ($one['year'] % 100 != 0 || $one['year'] % 400 == 0)) {
			$isleap = true;
		}else {
			$isleap = false;
		}
		//
		$baseone = mktime(0, 0, 0, 1, 1, $one['year']);
		$tomidnightone = intval($one['hours']) * 3600;
		$tomidnightone += intval($one['minutes']) * 60;
		$sfrom = $from - $baseone - $tomidnightone;
		$fromdayts = mktime(0, 0, 0, $one['mon'], $one['mday'], $one['year']);
		$two = getdate($to);
		$basetwo = mktime(0, 0, 0, 1, 1, $two['year']);
		$tomidnighttwo = intval($two['hours']) * 3600;
		$tomidnighttwo += intval($two['minutes']) * 60;
		$sto = $to - $basetwo - $tomidnighttwo;
		//Hourly Prices
		if($sfrom === $sto) {
			$sto += 86399;
		}
		//End Hourly Prices
		//leap years, last day of the month of the season
		if($isleap) {
			$leapts = mktime(0, 0, 0, 2, 29, $two['year']);
			if($two[0] >= $leapts) {
				$sfrom -= 86400;
				$sto -= 86400;
			}
		}
		//
		$q = "SELECT * FROM `#__vikrentcar_seasons` WHERE (`locations`='0' OR `locations`='" . $pickup . "') AND (" .
		 ($sto > $sfrom ? "(`from`<=" . $sfrom . " AND `to`>=" . $sto . ") " : "") .
		 ($sto > $sfrom ? "OR (`from`<=" . $sfrom . " AND `to`>=" . $sfrom . ") " : "(`from`<=" . $sfrom . " AND `to`<=" . $sfrom . " AND `from`>`to`) ") .
		 ($sto > $sfrom ? "OR (`from`<=" . $sto . " AND `to`>=" . $sto . ") " : "OR (`from`>=" . $sto . " AND `to`>=" . $sto . " AND `from`>`to`) ") .
		 ($sto > $sfrom ? "OR (`from`>=" . $sfrom . " AND `from`<=" . $sto . " AND `to`>=" . $sfrom . " AND `to`<=" . $sto . ")" : "OR (`from`>=" . $sfrom . " AND `from`>" . $sto . " AND `to`<" . $sfrom . " AND `to`<=" . $sto . " AND `from`>`to`)") .
		 ($sto > $sfrom ? " OR (`from`<=" . $sfrom . " AND `from`<=" . $sto . " AND `to`<" . $sfrom . " AND `to`<" . $sto . " AND `from`>`to`) OR (`from`>" . $sfrom . " AND `from`>" . $sto . " AND `to`>=" . $sfrom . " AND `to`>=" . $sto . " AND `from`>`to`)" : " OR (`from` <=" . $sfrom . " AND `to` >=" . $sfrom . " AND `from` >" . $sto . " AND `to` >" . $sto . " AND `from` < `to`)") .
		 ($sto > $sfrom ? " OR (`from` >=" . $sfrom . " AND `from` <" . $sto . " AND `to` <" . $sfrom . " AND `to` <" . $sto . " AND `from` > `to`)" : "").
		 ($sto > $sfrom ? " OR (`from` >" . $sfrom . " AND `from` >" . $sto . " AND `to` >=" . $sfrom . " AND `to` <" . $sto . " AND `from` > `to`)" : "").
		");";
		$dbo->setQuery($q);
		$dbo->Query($q);
		$totseasons = $dbo->getNumRows();
		if ($totseasons > 0) {
			$seasons = $dbo->loadAssocList();
			$applyseasons = false;
			$mem = array ();
			foreach ($arr as $k => $a) {
				$mem[$k]['daysused'] = 0;
				$mem[$k]['sum'] = array ();
			}
			foreach ($seasons as $s) {
				$allcars = explode(",", $s['idcars']);
				$inits = $baseone + $s['from'];
				if ($s['from'] < $s['to']) {
					$ends = $basetwo + $s['to'];
				} else {
					//between 2 years
					if ($baseone < $basetwo) {
						//ex. 29/12/2012 - 14/01/2013
						$ends = $basetwo + $s['to'];
					} else {
						if (($sfrom >= $s['from'] && $sto >= $s['from']) OR ($sfrom < $s['from'] && $sto >= $s['from'] && $sfrom > $s['to'] && $sto > $s['to'])) {
							//ex. 25/12 - 30/12 with init season on 20/12 OR 27/12 for counting 28,29,30/12
							$tmpbase = mktime(0, 0, 0, 1, 1, ($one['year'] + 1));
							$ends = $tmpbase + $s['to'];
						} else {
							//ex. 03/01 - 09/01
							$ends = $basetwo + $s['to'];
							$tmpbase = mktime(0, 0, 0, 1, 1, ($one['year'] - 1));
							$inits = $tmpbase + $s['from'];
						}
					}
				}
				//leap years
				if($isleap == true) {
					$infoseason = getdate($inits);
					$leapts = mktime(0, 0, 0, 2, 29, $infoseason['year']);
					if($infoseason[0] >= $leapts) {
						$inits += 86400;
						$ends += 86400;
					}
				}
				//
				//week days
				$filterwdays = !empty($s['wdays']) ? true : false;
				$wdays = $filterwdays == true ? explode(';', $s['wdays']) : '';
				if (is_array($wdays) && count($wdays) > 0) {
					foreach($wdays as $kw=>$wd) {
						if (strlen($wd) == 0) {
							unset($wdays[$kw]);
						}
					}
				}
				//
				//pickup must be after the begin of the season
				if($s['pickupincl'] == 1) {
					$pickupinclok = false;
					if($s['from'] < $s['to']) {
						if($sfrom >= $s['from'] && $sfrom <= $s['to']) {
							$pickupinclok = true;
						}
					}else {
						if(($sfrom >= $s['from'] && $sfrom > $s['to']) || ($sfrom < $s['from'] && $sfrom <= $s['to'])) {
							$pickupinclok = true;
						}
					}
				}else {
					$pickupinclok = true;
				}
				//
				if($pickupinclok == true) {
					foreach ($arr as $k => $a) {
						if (in_array("-" . $a['idcar'] . "-", $allcars)) {
							$affdays = 0;
							for ($i = 0; $i < $a['days']; $i++) {
								//VRC 1.7 rev2
								if($s['keepfirstdayrate'] == 1) {
									if ($fromdayts >= $inits && $fromdayts <= $ends) {
										$affdays = $a['days'];
									}else {
										$affdays = 0;
									}
									break;
								}
								//end VRC 1.7 rev2
								$todayts = $fromdayts + ($i * 86400);
								if ($todayts >= $inits && $todayts <= $ends) {
									//week days
									if($filterwdays == true) {
										$checkwday = getdate($todayts);
										if(in_array($checkwday['wday'], $wdays)) {
											$affdays++;
										}
									}else {
										$affdays++;
									}
									//
								}
							}
							if ($affdays > 0) {
								$applyseasons = true;
								$dailyprice = $a['cost'] / $a['days'];
								//VikRentCar 1.7 for abs or pcent and values overrides
								if (intval($s['val_pcent']) == 2) {
									//percentage value
									$pctval = $s['diffcost'];
									if (strlen($s['losoverride']) > 0) {
										//values overrides
										$arrvaloverrides = array();
										$valovrparts = explode('_', $s['losoverride']);
										foreach($valovrparts as $valovr) {
											if (!empty($valovr)) {
												$ovrinfo = explode(':', $valovr);
												if(strstr($ovrinfo[0], '-i') != false) {
													$ovrinfo[0] = str_replace('-i', '', $ovrinfo[0]);
													if((int)$ovrinfo[0] < $a['days']) {
														$arrvaloverrides[$a['days']] = $ovrinfo[1];
													}
												}
												$arrvaloverrides[$ovrinfo[0]] = $ovrinfo[1];
											}
										}
										if (array_key_exists($a['days'], $arrvaloverrides)) {
											$pctval = $arrvaloverrides[$a['days']];
										}
									}
									if (intval($s['type']) == 1) {
										//charge
										$cpercent = 100 + $pctval;
									} else {
										//discount
										$cpercent = 100 - $pctval;
									}
									$dailysum = ($dailyprice * $cpercent / 100);
									$newprice = $dailysum * $affdays;
								}else {
									//absolute value
									$absval = $s['diffcost'];
									if (strlen($s['losoverride']) > 0) {
										//values overrides
										$arrvaloverrides = array();
										$valovrparts = explode('_', $s['losoverride']);
										foreach($valovrparts as $valovr) {
											if (!empty($valovr)) {
												$ovrinfo = explode(':', $valovr);
												if(strstr($ovrinfo[0], '-i') != false) {
													$ovrinfo[0] = str_replace('-i', '', $ovrinfo[0]);
													if((int)$ovrinfo[0] < $a['days']) {
														$arrvaloverrides[$a['days']] = $ovrinfo[1];
													}
												}
												$arrvaloverrides[$ovrinfo[0]] = $ovrinfo[1];
											}
										}
										if (array_key_exists($a['days'], $arrvaloverrides)) {
											$absval = $arrvaloverrides[$a['days']];
										}
									}
									if (intval($s['type']) == 1) {
										//charge
										$dailysum = ($dailyprice + $absval);
										$newprice = $dailysum * $affdays;
									} else {
										//discount
										$dailysum = ($dailyprice - $absval);
										$newprice = $dailysum * $affdays;
									}
								}
								//end VikRentCar 1.7 for abs or pcent and values overrides
								//VikRentCar 1.8
								if (!empty($s['roundmode'])) {
									$newprice = round($newprice, 0, constant($s['roundmode']));
								}
								//
								$mem[$k]['sum'][] = $newprice;
								$mem[$k]['daysused'] += $affdays;
								$carschange[] = $a['idcar'];
							}
						}
					}
				}
			}
			if ($applyseasons) {
				foreach ($mem as $k => $v) {
					if ($v['daysused'] > 0 && @ count($v['sum']) > 0) {
						$newprice = 0;
						$dailyprice = $arr[$k]['cost'] / $arr[$k]['days'];
						$restdays = $arr[$k]['days'] - $v['daysused'];
						$addrest = $restdays * $dailyprice;
						$newprice += $addrest;
						foreach ($v['sum'] as $add) {
							$newprice += $add;
						}
						$arr[$k]['cost'] = $newprice;
						$arr[$k]['affdays'] = $v['daysused'];
					}
				}
			}
		}
		//week days with no season
		$carschange = array_unique($carschange);
		$q="SELECT * FROM `#__vikrentcar_seasons` WHERE (`locations`='0' OR `locations`=" . $dbo->quote($pickup) . ") AND ((`from` = 0 AND `to` = 0) OR (`from` IS NULL AND `to` IS NULL));";
		$dbo->setQuery($q);
		$dbo->Query($q);
		if($dbo->getNumRows() > 0) {
			$specials = $dbo->loadAssocList();
			$applyseasons = false;
			unset($mem);
			$mem = array();
			foreach ($arr as $k => $a) {
				$mem[$k]['daysused'] = 0;
				$mem[$k]['sum'] = array ();
			}
			foreach($specials as $s) {
				$allcars = explode(",", $s['idcars']);
				//week days
				$filterwdays = !empty($s['wdays']) ? true : false;
				$wdays = $filterwdays == true ? explode(';', $s['wdays']) : '';
				if (is_array($wdays) && count($wdays) > 0) {
					foreach($wdays as $kw=>$wd) {
						if (strlen($wd) == 0) {
							unset($wdays[$kw]);
						}
					}
				}
				//
				foreach ($arr as $k => $a) {
					//only cars with no price modifications from seasons
					if (in_array("-" . $a['idcar'] . "-", $allcars) && !in_array($a['idcar'], $carschange)) {
						$affdays = 0;
						for ($i = 0; $i < $a['days']; $i++) {
							$todayts = $fromdayts + ($i * 86400);
							//week days
							if($filterwdays == true) {
								$checkwday = getdate($todayts);
								if(in_array($checkwday['wday'], $wdays)) {
									$affdays++;
								}
							}
							//
						}
						if ($affdays > 0) {
							$applyseasons = true;
							$dailyprice = $a['cost'] / $a['days'];
							//VikRentCar 1.7 for abs or pcent and values overrides
							if (intval($s['val_pcent']) == 2) {
								//percentage value
								$pctval = $s['diffcost'];
								if (strlen($s['losoverride']) > 0) {
									//values overrides
									$arrvaloverrides = array();
									$valovrparts = explode('_', $s['losoverride']);
									foreach($valovrparts as $valovr) {
										if (!empty($valovr)) {
											$ovrinfo = explode(':', $valovr);
											if(strstr($ovrinfo[0], '-i') != false) {
												$ovrinfo[0] = str_replace('-i', '', $ovrinfo[0]);
												if((int)$ovrinfo[0] < $a['days']) {
													$arrvaloverrides[$a['days']] = $ovrinfo[1];
												}
											}
											$arrvaloverrides[$ovrinfo[0]] = $ovrinfo[1];
										}
									}
									if (array_key_exists($a['days'], $arrvaloverrides)) {
										$pctval = $arrvaloverrides[$a['days']];
									}
								}
								if (intval($s['type']) == 1) {
									//charge
									$cpercent = 100 + $pctval;
								} else {
									//discount
									$cpercent = 100 - $pctval;
								}
								$dailysum = ($dailyprice * $cpercent / 100);
								$newprice = $dailysum * $affdays;
							}else {
								//absolute value
								$absval = $s['diffcost'];
								if (strlen($s['losoverride']) > 0) {
									//values overrides
									$arrvaloverrides = array();
									$valovrparts = explode('_', $s['losoverride']);
									foreach($valovrparts as $valovr) {
										if (!empty($valovr)) {
											$ovrinfo = explode(':', $valovr);
											if(strstr($ovrinfo[0], '-i') != false) {
												$ovrinfo[0] = str_replace('-i', '', $ovrinfo[0]);
												if((int)$ovrinfo[0] < $a['days']) {
													$arrvaloverrides[$a['days']] = $ovrinfo[1];
												}
											}
											$arrvaloverrides[$ovrinfo[0]] = $ovrinfo[1];
										}
									}
									if (array_key_exists($a['days'], $arrvaloverrides)) {
										$absval = $arrvaloverrides[$a['days']];
									}
								}
								if (intval($s['type']) == 1) {
									//charge
									$dailysum = ($dailyprice + $absval);
									$newprice = $dailysum * $affdays;
								} else {
									//discount
									$dailysum = ($dailyprice - $absval);
									$newprice = $dailysum * $affdays;
								}
							}
							//end VikRentCar 1.7 for abs or pcent and values overrides
							//VikRentCar 1.8
							if (!empty($s['roundmode'])) {
								$newprice = round($newprice, 0, constant($s['roundmode']));
							}
							//
							$mem[$k]['sum'][] = $newprice;
							$mem[$k]['daysused'] += $affdays;
						}
					}
				}
			}
			if ($applyseasons) {
				foreach ($mem as $k => $v) {
					if ($v['daysused'] > 0 && @ count($v['sum']) > 0) {
						$newprice = 0;
						$dailyprice = $arr[$k]['cost'] / $arr[$k]['days'];
						$restdays = $arr[$k]['days'] - $v['daysused'];
						$addrest = $restdays * $dailyprice;
						$newprice += $addrest;
						foreach ($v['sum'] as $add) {
							$newprice += $add;
						}
						$arr[$k]['cost'] = $newprice;
						$arr[$k]['affdays'] = $v['daysused'];
					}
				}
			}
		}
		//end week days with no season
		return $arr;
	}

	function areTherePayments() {
		$dbo = & JFactory :: getDBO();
		$q = "SELECT `id` FROM `#__vikrentcar_gpayments` WHERE `published`='1';";
		$dbo->setQuery($q);
		$dbo->Query($q);
		return $dbo->getNumRows() > 0 ? true : false;
	}

	function getPayment($idp) {
		if (!empty ($idp)) {
			$dbo = & JFactory :: getDBO();
			$q = "SELECT * FROM `#__vikrentcar_gpayments` WHERE `id`=" . $dbo->quote($idp) . " AND `published`='1';";
			$dbo->setQuery($q);
			$dbo->Query($q);
			if ($dbo->getNumRows() == 1) {
				$payment = $dbo->loadAssocList();
				return $payment[0];
			} else {
				return false;
			}
		}
		return false;
	}

	function applyHourlyPrices($arrtar, $hoursdiff) {
		$dbo = & JFactory :: getDBO();
		$q = "SELECT * FROM `#__vikrentcar_dispcosthours` WHERE `hours`='" . $hoursdiff . "' ORDER BY `#__vikrentcar_dispcosthours`.`cost` ASC, `#__vikrentcar_dispcosthours`.`idcar` ASC;";
		$dbo->setQuery($q);
		$dbo->Query($q);
		if ($dbo->getNumRows() > 0) {
			$hourtars = $dbo->loadAssocList();
			$hourarrtar = array();
			foreach ($hourtars as $tar) {
				$hourarrtar[$tar['idcar']][] = $tar;
			}
			foreach($arrtar as $idcar => $tar) {
				if(array_key_exists($idcar, $hourarrtar)) {
					foreach($tar as $ind => $fare) {
						//check if idprice exists in $hourarrtar
						foreach($hourarrtar[$idcar] as $hind => $hfare) {
							if($fare['idprice'] == $hfare['idprice']) {
								$arrtar[$idcar][$ind]['id'] = $hourarrtar[$idcar][$hind]['id'];
								$arrtar[$idcar][$ind]['cost'] = $hourarrtar[$idcar][$hind]['cost'];
								$arrtar[$idcar][$ind]['attrdata'] = $hourarrtar[$idcar][$hind]['attrdata'];
								$arrtar[$idcar][$ind]['hours'] = $hourarrtar[$idcar][$hind]['hours'];
							}
						}
					}
				}
			}
		}
		return $arrtar;
	}

	function applyHourlyPricesCar($arrtar, $hoursdiff, $idcar, $filterprice = false) {
		$dbo = & JFactory :: getDBO();
		$q = "SELECT * FROM `#__vikrentcar_dispcosthours` WHERE `hours`='" . $hoursdiff . "' AND `idcar`=" . $dbo->quote($idcar) . "".($filterprice == true ? "  AND `idprice`='".$arrtar[0]['idprice']."'" : "")." ORDER BY `#__vikrentcar_dispcosthours`.`cost` ASC;";
		$dbo->setQuery($q);
		$dbo->Query($q);
		if ($dbo->getNumRows() > 0) {
			$arrtar = $dbo->loadAssocList();
			foreach($arrtar as $k => $v) {
				$arrtar[$k]['days'] = 1;
			}
		}
		return $arrtar;
	}

	function extraHoursSetPreviousFare($arrtar, $ehours, $daysdiff) {
		//set the fare to the days of rental - 1 where hours charges exist
		//to be used when the hours charges need to be applied after the special prices
		$dbo = & JFactory :: getDBO();
		$idcars = array_keys($arrtar);
		if(count($idcars) > 0 && $daysdiff > 1) {
			$q="SELECT * FROM `#__vikrentcar_hourscharges` WHERE `ehours`='".$ehours."' AND `idcar` IN (".implode(",", $idcars).");";
			$dbo->setQuery($q);
			$dbo->Query($q);
			if ($dbo->getNumRows() > 0) {
				$ehcharges = $dbo->loadAssocList();
				$arrehcharges = array();
				foreach($ehcharges as $ehc) {
					$arrehcharges[$ehc['idcar']][]=$ehc;
				}
				$idcars = array_keys($arrehcharges);
				$newdaysdiff = $daysdiff - 1;
				$q="SELECT * FROM `#__vikrentcar_dispcost` WHERE `days`='".$newdaysdiff."' AND `idcar` IN (".implode(",", $idcars).");";
				$dbo->setQuery($q);
				$dbo->Query($q);
				if ($dbo->getNumRows() > 0) {
					//only if there are fares for ($daysdiff - 1) otherwise dont apply extra hours charges
					$prevdaytars = $dbo->loadAssocList();
					$prevdayarrtar = array();
					foreach($prevdaytars as $pdtar) {
						$prevdayarrtar[$pdtar['idcar']][]=$pdtar;
					}
					//set fares for 1 day before of rental
					$newdispcostvals = array();
					$newdispcostattr = array();
					foreach($arrehcharges as $idc => $ehc) {
						if(array_key_exists($idc, $prevdayarrtar)) {
							foreach($prevdayarrtar[$idc] as $vp) {
								foreach($ehc as $hc) {
									if($vp['idprice'] == $hc['idprice']) {
										$newdispcostvals[$idc][$hc['idprice']] = $vp['cost'];
										$newdispcostattr[$idc][$hc['idprice']] = $vp['attrdata'];
									}
								}
							}
						}
					}
					if(count($newdispcostvals) > 0) {
						foreach($arrtar as $idc => $tar) {
							if(array_key_exists($idc, $newdispcostvals)) {
								foreach($tar as $krecp => $recp) {
									if(array_key_exists($recp['idprice'], $newdispcostvals[$idc])) {
										$arrtar[$idc][$krecp]['cost'] = $newdispcostvals[$idc][$recp['idprice']];
										$arrtar[$idc][$krecp]['attrdata'] = $newdispcostattr[$idc][$recp['idprice']];
										$arrtar[$idc][$krecp]['days'] = $newdaysdiff;
										$arrtar[$idc][$krecp]['ehours'] = $ehours;
									}
								}
							}
						}
					}
					//
				}
			}
		}
		return $arrtar;
	}

	function extraHoursSetPreviousFareCar($tar, $idcar, $ehours, $daysdiff, $filterprice = false) {
		//set the fare to the days of rental - 1 where hours charges exist
		//to be used when the hours charges need to be applied after the special prices
		$dbo = & JFactory :: getDBO();
		if($daysdiff > 1) {
			$q="SELECT * FROM `#__vikrentcar_hourscharges` WHERE `ehours`='".$ehours."' AND `idcar`='".$idcar."'".($filterprice == true ? " AND `idprice`='".$tar[0]['idprice']."'" : "").";";
			$dbo->setQuery($q);
			$dbo->Query($q);
			if ($dbo->getNumRows() > 0) {
				$ehcharges = $dbo->loadAssocList();
				$newdaysdiff = $daysdiff - 1;
				$q="SELECT * FROM `#__vikrentcar_dispcost` WHERE `days`='".$newdaysdiff."' AND `idcar`='".$idcar."'".($filterprice == true ? " AND `idprice`='".$tar[0]['idprice']."'" : "").";";
				$dbo->setQuery($q);
				$dbo->Query($q);
				if ($dbo->getNumRows() > 0) {
					//only if there are fares for ($daysdiff - 1) otherwise dont apply extra hours charges
					$prevdaytars = $dbo->loadAssocList();
					//set fares for 1 day before of rental
					$newdispcostvals = array();
					$newdispcostattr = array();
					foreach($ehcharges as $ehc) {
						foreach($prevdaytars as $vp) {
							if($vp['idprice'] == $ehc['idprice']) {
								$newdispcostvals[$ehc['idprice']] = $vp['cost'];
								$newdispcostattr[$ehc['idprice']] = $vp['attrdata'];
							}
						}
					}
					if(count($newdispcostvals) > 0) {
						foreach($tar as $kp => $f) {
							if(array_key_exists($f['idprice'], $newdispcostvals)) {
								$tar[$kp]['cost'] = $newdispcostvals[$f['idprice']];
								$tar[$kp]['attrdata'] = $newdispcostattr[$f['idprice']];
								$tar[$kp]['days'] = $newdaysdiff;
								$tar[$kp]['ehours'] = $ehours;
							}
						}
					}
					//
				}
			}
		}
		return $tar;
	}

	function applyExtraHoursChargesPrices($arrtar, $ehours, $daysdiff, $aftersp = false) {
		$dbo = & JFactory :: getDBO();
		$idcars = array_keys($arrtar);
		if(count($idcars) > 0 && $daysdiff > 1) {
			$q="SELECT * FROM `#__vikrentcar_hourscharges` WHERE `ehours`='".$ehours."' AND `idcar` IN (".implode(",", $idcars).");";
			$dbo->setQuery($q);
			$dbo->Query($q);
			if ($dbo->getNumRows() > 0) {
				$ehcharges = $dbo->loadAssocList();
				$arrehcharges = array();
				foreach($ehcharges as $ehc) {
					$arrehcharges[$ehc['idcar']][]=$ehc;
				}
				$idcars = array_keys($arrehcharges);
				$newdaysdiff = $daysdiff - 1;
				if($aftersp == true) {
					//after having applied special prices, dont consider the fares for ($daysdiff - 1)
					//apply extra hours charges
					$newdispcostvals = array();
					$newdispcostattr = array();
					foreach($arrehcharges as $idc => $ehc) {
						if(array_key_exists($idc, $arrtar)) {
							foreach($arrtar[$idc] as $vp) {
								foreach($ehc as $hc) {
									if($vp['idprice'] == $hc['idprice']) {
										$newdispcostvals[$idc][$hc['idprice']] = $vp['cost'] + $hc['cost'];
										$newdispcostattr[$idc][$hc['idprice']] = $vp['attrdata'];
									}
								}
							}
						}
					}
					if(count($newdispcostvals) > 0) {
						foreach($arrtar as $idc => $tar) {
							if(array_key_exists($idc, $newdispcostvals)) {
								foreach($tar as $krecp => $recp) {
									if(array_key_exists($recp['idprice'], $newdispcostvals[$idc])) {
										$arrtar[$idc][$krecp]['cost'] = $newdispcostvals[$idc][$recp['idprice']];
										$arrtar[$idc][$krecp]['attrdata'] = $newdispcostattr[$idc][$recp['idprice']];
										$arrtar[$idc][$krecp]['days'] = $newdaysdiff;
										$arrtar[$idc][$krecp]['ehours'] = $ehours;
									}
								}
							}
						}
					}
					//
				}else {
					//before applying special prices
					$q="SELECT * FROM `#__vikrentcar_dispcost` WHERE `days`='".$newdaysdiff."' AND `idcar` IN (".implode(",", $idcars).");";
					$dbo->setQuery($q);
					$dbo->Query($q);
					if ($dbo->getNumRows() > 0) {
						//only if there are fares for ($daysdiff - 1) otherwise dont apply extra hours charges
						$prevdaytars = $dbo->loadAssocList();
						$prevdayarrtar = array();
						foreach($prevdaytars as $pdtar) {
							$prevdayarrtar[$pdtar['idcar']][]=$pdtar;
						}
						//apply extra hours charges
						$newdispcostvals = array();
						$newdispcostattr = array();
						foreach($arrehcharges as $idc => $ehc) {
							if(array_key_exists($idc, $prevdayarrtar)) {
								foreach($prevdayarrtar[$idc] as $vp) {
									foreach($ehc as $hc) {
										if($vp['idprice'] == $hc['idprice']) {
											$newdispcostvals[$idc][$hc['idprice']] = $vp['cost'] + $hc['cost'];
											$newdispcostattr[$idc][$hc['idprice']] = $vp['attrdata'];
										}
									}
								}
							}
						}
						if(count($newdispcostvals) > 0) {
							foreach($arrtar as $idc => $tar) {
								if(array_key_exists($idc, $newdispcostvals)) {
									foreach($tar as $krecp => $recp) {
										if(array_key_exists($recp['idprice'], $newdispcostvals[$idc])) {
											$arrtar[$idc][$krecp]['cost'] = $newdispcostvals[$idc][$recp['idprice']];
											$arrtar[$idc][$krecp]['attrdata'] = $newdispcostattr[$idc][$recp['idprice']];
											$arrtar[$idc][$krecp]['days'] = $newdaysdiff;
											$arrtar[$idc][$krecp]['ehours'] = $ehours;
										}
									}
								}
							}
						}
						//
					}
				}
			}
		}
		return $arrtar;
	}

	function applyExtraHoursChargesCar($tar, $idcar, $ehours, $daysdiff, $aftersp = false, $filterprice = false, $retarray = false) {
		$dbo = & JFactory :: getDBO();
		$newdaysdiff = $daysdiff;
		if($daysdiff > 1) {
			$q="SELECT * FROM `#__vikrentcar_hourscharges` WHERE `ehours`='".$ehours."' AND `idcar`='".$idcar."'".($filterprice == true ? " AND `idprice`='".$tar[0]['idprice']."'" : "").";";
			$dbo->setQuery($q);
			$dbo->Query($q);
			if ($dbo->getNumRows() > 0) {
				$ehcharges = $dbo->loadAssocList();
				$newdaysdiff = $daysdiff - 1;
				if($aftersp == true) {
					//after having applied special prices, dont consider the fares for ($daysdiff - 1) because done already
					//apply extra hours charges
					$newdispcostvals = array();
					$newdispcostattr = array();
					foreach($ehcharges as $ehc) {
						foreach($tar as $vp) {
							if($vp['idprice'] == $ehc['idprice']) {
								$newdispcostvals[$ehc['idprice']] = $vp['cost'] + $ehc['cost'];
								$newdispcostattr[$ehc['idprice']] = $vp['attrdata'];
							}
						}
					}
					if(count($newdispcostvals) > 0) {
						foreach($tar as $kt => $f) {
							if(array_key_exists($f['idprice'], $newdispcostvals)) {
								$tar[$kt]['cost'] = $newdispcostvals[$f['idprice']];
								$tar[$kt]['attrdata'] = $newdispcostattr[$f['idprice']];
								$tar[$kt]['days'] = $newdaysdiff;
								$tar[$kt]['ehours'] = $ehours;
							}
						}
					}
					//
				}else {
					//before applying special prices
					$q="SELECT * FROM `#__vikrentcar_dispcost` WHERE `days`='".$newdaysdiff."' AND `idcar`='".$idcar."'".($filterprice == true ? " AND `idprice`='".$tar[0]['idprice']."'" : "").";";
					$dbo->setQuery($q);
					$dbo->Query($q);
					if ($dbo->getNumRows() > 0) {
						//only if there are fares for ($daysdiff - 1) otherwise dont apply extra hours charges
						$prevdaytars = $dbo->loadAssocList();
						//apply extra hours charges
						$newdispcostvals = array();
						$newdispcostattr = array();
						foreach($ehcharges as $ehc) {
							foreach($prevdaytars as $vp) {
								if($vp['idprice'] == $ehc['idprice']) {
									$newdispcostvals[$ehc['idprice']] = $vp['cost'] + $ehc['cost'];
									$newdispcostattr[$ehc['idprice']] = $vp['attrdata'];
								}
							}
						}
						if(count($newdispcostvals) > 0) {
							foreach($tar as $kt => $f) {
								if(array_key_exists($f['idprice'], $newdispcostvals)) {
									$tar[$kt]['cost'] = $newdispcostvals[$f['idprice']];
									$tar[$kt]['attrdata'] = $newdispcostattr[$f['idprice']];
									$tar[$kt]['days'] = $newdaysdiff;
									$tar[$kt]['ehours'] = $ehours;
								}
							}
						}
						//
					}
				}
			}
		}
		if($retarray == true) {
			$ret = array();
			$ret['return'] = $tar;
			$ret['days'] = $newdaysdiff;
			return $ret;
		}else {
			return $tar;
		}
	}

	function sayMonth($idm) {
		switch ($idm) {
			case '12' :
				$ret = JText :: _('VRMONTHTWELVE');
				break;
			case '11' :
				$ret = JText :: _('VRMONTHELEVEN');
				break;
			case '10' :
				$ret = JText :: _('VRMONTHTEN');
				break;
			case '9' :
				$ret = JText :: _('VRMONTHNINE');
				break;
			case '8' :
				$ret = JText :: _('VRMONTHEIGHT');
				break;
			case '7' :
				$ret = JText :: _('VRMONTHSEVEN');
				break;
			case '6' :
				$ret = JText :: _('VRMONTHSIX');
				break;
			case '5' :
				$ret = JText :: _('VRMONTHFIVE');
				break;
			case '4' :
				$ret = JText :: _('VRMONTHFOUR');
				break;
			case '3' :
				$ret = JText :: _('VRMONTHTHREE');
				break;
			case '2' :
				$ret = JText :: _('VRMONTHTWO');
				break;
			default :
				$ret = JText :: _('VRMONTHONE');
				break;
		}
		return $ret;
	}

	function valuecsv ($value) {
		if (preg_match("/\"/", $value)) {
			$value = '"'.str_replace('"', '""', $value).'"';
		}
		$value = str_replace(',', ' ', $value);
		$value = str_replace(';', ' ', $value);
		return $value;
	}

	function displayPaymentParameters ($pfile, $pparams = '') {
		$html = '---------';
		$arrparams = !empty($pparams) ? json_decode($pparams, true) : array();
		if (file_exists(JPATH_ADMINISTRATOR.DS.'components'.DS.'com_vikrentcar'.DS.'payments'.DS.$pfile) && !empty($pfile)) {
			require_once(JPATH_ADMINISTRATOR.DS.'components'.DS.'com_vikrentcar'.DS.'payments'.DS.$pfile);
			if (method_exists('vikRentCarPayment', 'getAdminParameters')) {
				$pconfig = vikRentCarPayment::getAdminParameters();
				if (count($pconfig) > 0) {
					$html = '';
					foreach($pconfig as $value => $cont) {
						if (empty($value)) {
							continue;
						}
						$labelparts = explode('//', $cont['label']);
						$label = $labelparts[0];
						$labelhelp = $labelparts[1];
						$html .= '<div class="vikpaymentparam">';
						if (strlen($label) > 0) {
							$html .= '<span class="vikpaymentparamlabel">'.$label.'</span>';
						}
						switch ($cont['type']) {
							case 'custom':
								$html .= $cont['html'];
								break;
							case 'select':
								$html .= '<span class="vikpaymentparaminput">' .
									'<select name="vikpaymentparams['.$value.']">';
								foreach($cont['options'] as $poption) {
									$html .= '<option value="'.$poption.'"'.(array_key_exists($value, $arrparams) && $poption == $arrparams[$value] ? ' selected="selected"' : '').'>'.$poption.'</option>';
								}
								$html .= '</select></span>';
								break;
							default:
								$html .= '<span class="vikpaymentparaminput">' .
									'<input type="text" name="vikpaymentparams['.$value.']" value="'.(array_key_exists($value, $arrparams) ? $arrparams[$value] : '').'" size="20"/>' .
									'</span>';
								break;
						}
						if (strlen($labelhelp) > 0) {
							$html .= '<span class="vikpaymentparamlabelhelp">'.$labelhelp.'</span>';
						}
						$html .= '</div>';
					}
				}
			}
		}
		return $html;
	}

}

class vikResizer {

	function proportionalImage($fileimg, $dest, $towidth, $toheight) {
		if (!file_exists($fileimg)) {
			return false;
		}
		if (empty ($towidth) && empty ($toheight)) {
			copy($fileimg, $dest);
			return true;
		}

		list ($owid, $ohei, $type) = getimagesize($fileimg);

		if ($owid > $towidth || $ohei > $toheight) {
			$xscale = $owid / $towidth;
			$yscale = $ohei / $toheight;
			if ($yscale > $xscale) {
				$new_width = round($owid * (1 / $yscale));
				$new_height = round($ohei * (1 / $yscale));
			} else {
				$new_width = round($owid * (1 / $xscale));
				$new_height = round($ohei * (1 / $xscale));
			}

			$imageresized = imagecreatetruecolor($new_width, $new_height);

			switch ($type) {
				case '1' :
					$imagetmp = imagecreatefromgif($fileimg);
					break;
				case '2' :
					$imagetmp = imagecreatefromjpeg($fileimg);
					break;
				default :
					$imagetmp = imagecreatefrompng($fileimg);
					break;
			}

			imagecopyresampled($imageresized, $imagetmp, 0, 0, 0, 0, $new_width, $new_height, $owid, $ohei);

			switch ($type) {
				case '1' :
					imagegif($imageresized, $dest);
					break;
				case '2' :
					imagejpeg($imageresized, $dest);
					break;
				default :
					imagepng($imageresized, $dest);
					break;
			}

			imagedestroy($imageresized);
			return true;
		} else {
			copy($fileimg, $dest);
		}
		return true;
	}

	function bandedImage($fileimg, $dest, $towidth, $toheight, $rgb) {
		if (!file_exists($fileimg)) {
			return false;
		}
		if (empty ($towidth) && empty ($toheight)) {
			copy($fileimg, $dest);
			return true;
		}

		$exp = explode(",", $rgb);
		if (count($exp) == 3) {
			$r = trim($exp[0]);
			$g = trim($exp[1]);
			$b = trim($exp[2]);
		} else {
			$r = 0;
			$g = 0;
			$b = 0;
		}

		list ($owid, $ohei, $type) = getimagesize($fileimg);

		if ($owid > $towidth || $ohei > $toheight) {
			$xscale = $owid / $towidth;
			$yscale = $ohei / $toheight;
			if ($yscale > $xscale) {
				$new_width = round($owid * (1 / $yscale));
				$new_height = round($ohei * (1 / $yscale));
				$ydest = 0;
				$diff = $towidth - $new_width;
				$xdest = ($diff > 0 ? round($diff / 2) : 0);
			} else {
				$new_width = round($owid * (1 / $xscale));
				$new_height = round($ohei * (1 / $xscale));
				$xdest = 0;
				$diff = $toheight - $new_height;
				$ydest = ($diff > 0 ? round($diff / 2) : 0);
			}

			$imageresized = imagecreatetruecolor($towidth, $toheight);

			$bgColor = imagecolorallocate($imageresized, (int) $r, (int) $g, (int) $b);
			imagefill($imageresized, 0, 0, $bgColor);

			switch ($type) {
				case '1' :
					$imagetmp = imagecreatefromgif($fileimg);
					break;
				case '2' :
					$imagetmp = imagecreatefromjpeg($fileimg);
					break;
				default :
					$imagetmp = imagecreatefrompng($fileimg);
					break;
			}

			imagecopyresampled($imageresized, $imagetmp, $xdest, $ydest, 0, 0, $new_width, $new_height, $owid, $ohei);

			switch ($type) {
				case '1' :
					imagegif($imageresized, $dest);
					break;
				case '2' :
					imagejpeg($imageresized, $dest);
					break;
				default :
					imagepng($imageresized, $dest);
					break;
			}

			imagedestroy($imageresized);

			return true;
		} else {
			copy($fileimg, $dest);
		}
		return true;
	}

	function croppedImage($fileimg, $dest, $towidth, $toheight) {
		if (!file_exists($fileimg)) {
			return false;
		}
		if (empty ($towidth) && empty ($toheight)) {
			copy($fileimg, $dest);
			return true;
		}

		list ($owid, $ohei, $type) = getimagesize($fileimg);

		if ($owid <= $ohei) {
			$new_width = $towidth;
			$new_height = ($towidth / $owid) * $ohei;
		} else {
			$new_height = $toheight;
			$new_width = ($new_height / $ohei) * $owid;
		}

		switch ($type) {
			case '1' :
				$img_src = imagecreatefromgif($fileimg);
				$img_dest = imagecreate($new_width, $new_height);
				break;
			case '2' :
				$img_src = imagecreatefromjpeg($fileimg);
				$img_dest = imagecreatetruecolor($new_width, $new_height);
				break;
			default :
				$img_src = imagecreatefrompng($fileimg);
				$img_dest = imagecreatetruecolor($new_width, $new_height);
				break;
		}

		imagecopyresampled($img_dest, $img_src, 0, 0, 0, 0, $new_width, $new_height, $owid, $ohei);

		switch ($type) {
			case '1' :
				$cropped = imagecreate($towidth, $toheight);
				break;
			case '2' :
				$cropped = imagecreatetruecolor($towidth, $toheight);
				break;
			default :
				$cropped = imagecreatetruecolor($towidth, $toheight);
				break;
		}

		imagecopy($cropped, $img_dest, 0, 0, 0, 0, $owid, $ohei);

		switch ($type) {
			case '1' :
				imagegif($cropped, $dest);
				break;
			case '2' :
				imagejpeg($cropped, $dest);
				break;
			default :
				imagepng($cropped, $dest);
				break;
		}

		imagedestroy($img_dest);
		imagedestroy($cropped);

		return true;
	}

}

function totElements($arr) {
	$n = 0;
	if (is_array($arr)) {
		foreach ($arr as $a) {
			if (!empty ($a)) {
				$n++;
			}
		}
		return $n;
	}
	return false;
}

function encryptCookie($str) {
	for ($i = 0; $i < 5; $i++) {
		$str = strrev(base64_encode($str));
	}
	return $str;
}

function decryptCookie($str) {
	for ($i = 0; $i < 5; $i++) {
		$str = base64_decode(strrev($str));
	}
	return $str;
}

function read($str) {
	for ($i = 0; $i < strlen($str); $i += 2)
		$var .= chr(hexdec(substr($str, $i, 2)));
	return $var;
}

function checkComp($lf, $h, $n) {
	$a = $lf[0];
	$b = $lf[1];
	for ($i = 0; $i < 5; $i++) {
		$a = base64_decode(strrev($a));
		$b = base64_decode(strrev($b));
	}
	if ($a == $h || $b == $h || $a == $n || $b == $n) {
		return true;
	} else {
		$a = str_replace('www.', "", $a);
		$b = str_replace('www.', "", $b);
		if ((!empty ($a) && (preg_match("/" . $a . "/i", $h) || preg_match("/" . $a . "/i", $n))) || (!empty ($b) && (preg_match("/" . $b . "/i", $h) || preg_match("/" . $b . "/i", $n)))) {
			return true;
		}
	}
	return false;
}

define('CREATIVIKAPP', 'com_vikrentcar');

class CreativikDotIt {
	function CreativikDotIt() {
		$this->headers = array (
			"Referer" => "",
			"User-Agent" => "CreativikDotIt/1.0",
			"Connection" => "close"
		);
		$this->version = "1.1";
		$this->ctout = 15;
		$this->f_redha = false;
	}

	function exeqer($url) {
		$rcodes = array (
			301,
			302,
			303,
			307
		);
		$rmeth = array (
			'GET',
			'HEAD'
		);
		$rres = false;
		$this->fd_redhad = false;
		$ppred = array ();
		do {
			$rres = $this->sendout($url);
			$url = false;
			if ($this->f_redha && in_array($this->edocser, $rcodes)) {
				if (($this->edocser == 303) || in_array($this->method, $rmeth)) {
					$url = $this->resphh['Location'];
				}
			}
			if ($url && strlen($url)) {
				if (isset ($ppred[$url])) {
					$this->rore = "tceriderpool";
					$rres = false;
					break;
				}
				if (is_numeric($this->f_redha) && (count($ppred) > $this->f_redha)) {
					$this->rore = "tceriderynamoot";
					$rres = false;
					break;
				}
				$ppred[$url] = true;
			}
		} while ($url && strlen($url));
		$rep_qer_daeh = array (
			'Host',
			'Content-Length'
		);
		foreach ($rep_qer_daeh as $k => $v)
			unset ($this->headers[$v]);
		if (count($ppred) > 1)
			$this->fd_redhad = array_keys($ppred);
		return $rres;
	}

	function dliubh() {
		$daeh = "";
		foreach ($this->headers as $name => $value) {
			$value = trim($value);
			if (empty ($value))
				continue;
			$daeh .= "{$name}: $value\r\n";
		}
		$daeh .= "\r\n";
		return $daeh;
	}

	function sendout($url) {
		$time_request_start = time();
		$urldata = parse_url($url);
		if (!$urldata["port"])
			$urldata["port"] = ($urldata["scheme"] == "https") ? 443 : 80;
		if (!$urldata["path"])
			$urldata["path"] = '/';
		if ($this->version > "1.0")
			$this->headers["Host"] = $urldata["host"];
		unset ($this->headers['Authorization']);
		if (!empty ($urldata["query"]))
			$urldata["path"] .= "?" . $urldata["query"];
		$request = $this->method . " " . $urldata["path"] . " HTTP/" . $this->version . "\r\n";
		$request .= $this->dliubh();
		$this->tise = "";
		$hostname = $urldata['host'];
		$time_connect_start = time();
		$fp = @ fsockopen($hostname, $urldata["port"], $errno, $errstr, $this->ctout);
		$connect_time = time() - $time_connect_start;
		if ($fp) {
			stream_set_timeout($fp, 3);
			fputs($fp, $request);
			$meta = stream_get_meta_data($fp);
			if ($meta['timed_out']) {
				$this->rore = "sdnoceseerhtfotuoemitetirwtekcosdedeecxe";
				return false;
			}
			$cerdaeh = false;
			$data_length = false;
			$chunked = false;
			while (!feof($fp)) {
				if ($data_length > 0) {
					$line = fread($fp, $data_length);
					$data_length -= strlen($line);
				} else {
					$line = fgets($fp, 10240);
					if ($chunked) {
						$line = trim($line);
						if (!strlen($line))
							continue;
						list ($data_length,) = explode(';', $line);
						$data_length = (int) hexdec(trim($data_length));
						if ($data_length == 0) {
							break;
						}
						continue;
					}
				}
				$this->tise .= $line;
				if ((!$cerdaeh) && (trim($line) == "")) {
					$cerdaeh = true;
					if (preg_match('/\nContent-Length: ([0-9]+)/i', $this->tise, $matches)) {
						$data_length = (int) $matches[1];
					}
					if (preg_match("/\nTransfer-Encoding: chunked/i", $this->tise, $matches)) {
						$chunked = true;
					}
				}
				$meta = stream_get_meta_data($fp);
				if ($meta['timed_out']) {
					$this->rore = "sceseerhttuoemitdaertekcos";
					return false;
				}
				if (time() - $time_request_start > 5) {
					$this->rore = "maxtransfertimefivesecs";
					return false;
					break;
				}
			}
			fclose($fp);
		} else {
			$this->rore = $urldata['scheme'] . " otdeliafnoitcennoc " . $hostname . " trop " . $urldata['port'];
			return false;
		}
		do {
			$neldaeh = strpos($this->tise, "\r\n\r\n");
			$serp_daeh = explode("\r\n", substr($this->tise, 0, $neldaeh));
			$pthats = trim(array_shift($serp_daeh));
			foreach ($serp_daeh as $line) {
				list ($k, $v) = explode(":", $line, 2);
				$this->resphh[trim($k)] = trim($v);
			}
			$this->tise = substr($this->tise, $neldaeh +4);
			if (!preg_match("/^HTTP\/([0-9\.]+) ([0-9]+) (.*?)$/", $pthats, $matches)) {
				$matches = array (
					"",
					$this->version,
					0,
					"HTTP request error"
				);
			}
			list (, $pserver, $this->edocser, $this->txet) = $matches;
		} while (($this->edocser == 100) && ($neldaeh));
		$ok = ($this->edocser == 200);
		return $ok;
	}

	function ksa($url) {
		$this->method = "GET";
		return $this->exeqer($url);
	}

}

function validEmail($email) {
	$isValid = true;
	$atIndex = strrpos($email, "@");
	if (is_bool($atIndex) && !$atIndex) {
		$isValid = false;
	} else {
		$domain = substr($email, $atIndex +1);
		$local = substr($email, 0, $atIndex);
		$localLen = strlen($local);
		$domainLen = strlen($domain);
		if ($localLen < 1 || $localLen > 64) {
			// local part length exceeded
			$isValid = false;
		} else
			if ($domainLen < 1 || $domainLen > 255) {
				// domain part length exceeded
				$isValid = false;
			} else
				if ($local[0] == '.' || $local[$localLen -1] == '.') {
					// local part starts or ends with '.'
					$isValid = false;
				} else
					if (preg_match('/\\.\\./', $local)) {
						// local part has two consecutive dots
						$isValid = false;
					} else
						if (!preg_match('/^[A-Za-z0-9\\-\\.]+$/', $domain)) {
							// character not valid in domain part
							$isValid = false;
						} else
							if (preg_match('/\\.\\./', $domain)) {
								// domain part has two consecutive dots
								$isValid = false;
							} else
								if (!preg_match('/^(\\\\.|[A-Za-z0-9!#%&`_=\\/$\'*+?^{}|~.-])+$/', str_replace("\\\\", "", $local))) {
									// character not valid in local part unless
									// local part is quoted
									if (!preg_match('/^"(\\\\"|[^"])+"$/', str_replace("\\\\", "", $local))) {
										$isValid = false;
									}
								}
		if ($isValid && !(checkdnsrr($domain, "MX") || checkdnsrr($domain, "A"))) {
			// domain not found in DNS
			$isValid = false;
		}
	}
	return $isValid;
}

function checkCodiceFiscale($cf) {
	if ($cf == '')
		return false;
	if (strlen($cf) != 16)
		return false;
	$cf = strtoupper(str_replace(" ", "", $cf));
	if (!ereg("^[A-Z0-9]+$", $cf)) {
		return false;
	}
	$s = 0;
	for ($i = 1; $i <= 13; $i += 2) {
		$c = $cf[$i];
		if ('0' <= $c && $c <= '9')
			$s += ord($c) - ord('0');
		else
			$s += ord($c) - ord('A');
	}
	for ($i = 0; $i <= 14; $i += 2) {
		$c = $cf[$i];
		switch ($c) {
			case '0' :
				$s += 1;
				break;
			case '1' :
				$s += 0;
				break;
			case '2' :
				$s += 5;
				break;
			case '3' :
				$s += 7;
				break;
			case '4' :
				$s += 9;
				break;
			case '5' :
				$s += 13;
				break;
			case '6' :
				$s += 15;
				break;
			case '7' :
				$s += 17;
				break;
			case '8' :
				$s += 19;
				break;
			case '9' :
				$s += 21;
				break;
			case 'A' :
				$s += 1;
				break;
			case 'B' :
				$s += 0;
				break;
			case 'C' :
				$s += 5;
				break;
			case 'D' :
				$s += 7;
				break;
			case 'E' :
				$s += 9;
				break;
			case 'F' :
				$s += 13;
				break;
			case 'G' :
				$s += 15;
				break;
			case 'H' :
				$s += 17;
				break;
			case 'I' :
				$s += 19;
				break;
			case 'J' :
				$s += 21;
				break;
			case 'K' :
				$s += 2;
				break;
			case 'L' :
				$s += 4;
				break;
			case 'M' :
				$s += 18;
				break;
			case 'N' :
				$s += 20;
				break;
			case 'O' :
				$s += 11;
				break;
			case 'P' :
				$s += 3;
				break;
			case 'Q' :
				$s += 6;
				break;
			case 'R' :
				$s += 8;
				break;
			case 'S' :
				$s += 12;
				break;
			case 'T' :
				$s += 14;
				break;
			case 'U' :
				$s += 16;
				break;
			case 'V' :
				$s += 10;
				break;
			case 'W' :
				$s += 22;
				break;
			case 'X' :
				$s += 25;
				break;
			case 'Y' :
				$s += 24;
				break;
			case 'Z' :
				$s += 23;
				break;
		}
	}
	if (chr($s % 26 + ord('A')) != $cf[15])
		return false;
	return true;
}

function secureString($string) {
	$search = array (
		'/<\?((?!\?>).)*\?>/s'
	);
	return preg_replace($search, '', $string);
}

function cleanString4Db($str) {
	$var = $str;
	if (get_magic_quotes_gpc()) {
		$var = stripslashes($str);
	}
	$var = str_replace("'", "`", $var);
	return secureString($var);
}

function caniWrite($path) {
	if ($path {
		strlen($path) - 1 }
	== '/') // ricorsivo return a temporary file path
	return caniWrite($path . uniqid(mt_rand()) . '.tmp');
else
	if (is_dir($path))
		return caniWrite($path . '/' . uniqid(mt_rand()) . '.tmp');
// check tmp file for read/write capabilities
$rm = file_exists($path);
$f = @ fopen($path, 'a');
if ($f === false)
	return false;
fclose($f);
if (!$rm)
	unlink($path);
return true;
}

function realInt($num) {
	for ($i = 0; $i < strlen($num); $i++) {
		if (!ctype_digit($num {
			$i })) {
			return false;
		}
	}
	return true;
}

function realDecimal($num) {
	for ($i = 0; $i < strlen($num); $i++) {
		if (!ctype_digit($num {
			$i }) && $num {
			$i }
		!= "." && $num {
			$i }
		!= ",") {
			return false;
		}
	}
	return true;
}
?>
