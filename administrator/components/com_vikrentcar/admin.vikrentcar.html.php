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

class HTML_vikrentcar {
	function printHeader($highlight="") {
		echo '<table><tr><td align="left"><img src="'.JURI::root().'administrator/components/com_vikrentcar/vikrentcar.jpg" valign="top" alt="vikrentcar logo"/></td><td valign="top" align="left">' .
				'<table cellspacing="0" cellpadding="0">
                <tr>
                    <td class="vmain" align="center">'.JText::_('VRMENUONE').'</td>
                    <td class="vmain" align="center">'.JText::_('VRMENUTWO').'</td>
                    <td class="vmain" align="center">'.JText::_('VRMENUTHREE').'</td>' .
                    '<td class="vmain" align="center">'.JText::_('VRCMENUFARES').'</td>
                    <td class="vmain" align="center">'.JText::_('VRMENUFOUR').'</td>
                    <td class="vmain" align="center">'.JText::_('VRMENUPRUEBAS').'</td>
                </tr>
                
                <tr>
                    <td class="'.($highlight=="18" ? "vmenulinkactive" : "vmenulink").'" align="center"><a href="index.php?option=com_vikrentcar">'.JText::_('VRCMENUDASHBOARD').'</a></td>' .
				    '<td class="'.($highlight=="4" ? "vmenulinkactive" : "vmenulink").'" align="center"><a href="index.php?option=com_vikrentcar&task=viewcategories">'.JText::_('VRMENUSIX').'</a></td>
                    <td class="'.($highlight=="8" ? "vmenulinkactive" : "vmenulink").'" align="center"><a href="index.php?option=com_vikrentcar&task=vieworders">'.JText::_('VRMENUSEVEN').'</a></td>' .
				    '<td class="'.($highlight=="13" ? "vmenulinkactive" : "vmenulink").'" align="center"><a href="index.php?option=com_vikrentcar&task=seasons">'.JText::_('VRMENUTENSEVEN').'</a></td>
                    <td class="'.($highlight=="11" ? "vmenulinkactive" : "vmenulink").'" align="center"><a href="index.php?option=com_vikrentcar&task=config">'.JText::_('VRMENUTWELVE').'</a></td>
                    <td class="'.($highlight=="20" ? "vmenulinkactive" : "vmenulink").'" align="center"><a href="index.php?option=com_vikrentcar&task=cuponreservas">'.JText::_('VRMENUTWELVEB').'</a></td>                    
                </tr>' .
				'<tr><td class="'.($highlight=="2" ? "vmenulinkactive" : "vmenulink").'" align="center"><a href="index.php?option=com_vikrentcar&task=viewiva">'.JText::_('VRMENUNINE').'</a></td><td class="'.($highlight=="6" ? "vmenulinkactive" : "vmenulink").'" align="center"><a href="index.php?option=com_vikrentcar&task=viewoptionals">'.JText::_('VRMENUTENFIVE').'</a></td>' .
				'<td class="'.($highlight=="9" ? "vmenulinkactive" : "vmenulink").'" align="center"><a href="index.php?option=com_vikrentcar&task=viewoldorders">'.JText::_('VRMENUELEVEN').'</a></td><td class="'.($highlight=="fares" ? "vmenulinkactive" : "vmenulink").'" align="center"><a href="index.php?option=com_vikrentcar&task=viewtariffe">'.JText::_('VRCMENUPRICESTABLE').'</a></td><td class="'.($highlight=="14" ? "vmenulinkactive" : "vmenulink").'" align="center"><a href="index.php?option=com_vikrentcar&task=payments">'.JText::_('VRMENUTENEIGHT').'</a></td></tr>' .
				'<tr><td class="'.($highlight=="1" ? "vmenulinkactive" : "vmenulink").'" align="center"><a href="index.php?option=com_vikrentcar&task=viewprices">'.JText::_('VRMENUFIVE').'</a></td><td class="'.($highlight=="5" ? "vmenulinkactive" : "vmenulink").'" align="center"><a href="index.php?option=com_vikrentcar&task=viewcarat">'.JText::_('VRMENUTENFOUR').'</a></td>' .
				'<td class="'.($highlight=="19" ? "vmenulinkactive" : "vmenulink").'" align="center"><a href="index.php?option=com_vikrentcar&task=calendar">'.JText::_('VRCMENUQUICKRES').'</a></td><td class="'.($highlight=="12" ? "vmenulinkactive" : "vmenulink").'" align="center"><a href="index.php?option=com_vikrentcar&task=locfees">'.JText::_('VRMENUTENSIX').'</a></td><td class="'.($highlight=="16" ? "vmenulinkactive" : "vmenulink").'" align="center"><a href="index.php?option=com_vikrentcar&task=viewcustomf">'.JText::_('VRMENUTENTEN').'</a></td></tr>' .
				'<tr><td class="'.($highlight=="3" ? "vmenulinkactive" : "vmenulink").'" align="center"><a href="index.php?option=com_vikrentcar&task=viewplaces">'.JText::_('VRMENUTENTHREE').'</a></td><td class="'.($highlight=="7" ? "vmenulinkactive" : "vmenulink").'" align="center"><a href="index.php?option=com_vikrentcar&task=cars">'.JText::_('VRMENUTEN').'</a></td><td class="'.($highlight=="15" ? "vmenulinkactive" : "vmenulink").'" align="center"><a href="index.php?option=com_vikrentcar&task=overview">'.JText::_('VRMENUTENNINE').'</a></td><td class="'.($highlight=="17" ? "vmenulinkactive" : "vmenulink").'" align="center"><a href="index.php?option=com_vikrentcar&task=viewcoupons">'.JText::_('VRCMENUCOUPONS').'</a></td>' .
				'<td class="'.($highlight=="10" ? "vmenulinkactive" : "vmenulink").'" align="center"><a href="index.php?option=com_vikrentcar&task=viewstats">'.JText::_('VRMENUEIGHT').'</a></td></tr></table>' .
				'</td></tr></table><br/>';	
	}
	
	function printFooter() {
		echo '<br clear="all" />' . '<div id="hmfooter">' . JText :: _('VRFOOTER') . ' <a href="http://www.extensionsforjoomla.com/">e4j - Extensionsforjoomla.com</a></div>';
	}
	
	function pViewDashboard($pidplace, $arrayfirst, $allplaces, $nextrentals, $totnextrentconf, $totnextrentpend, $option) {
		$nowdf = vikrentcar::getDateFormat(true);
		if ($nowdf=="%d/%m/%Y") {
			$df='d/m/Y';
		}elseif ($nowdf=="%m/%d/%Y") {
			$df='m/d/Y';
		}else {
			$df='Y/m/d';
		}
		$selplace = "";
		if(is_array($allplaces)) {
			$selplace = JText::_('VRCDASHPICKUPLOC')." <form action=\"index.php?option=com_vikrentcar\" method=\"post\" name=\"vrcdashform\"><select name=\"idplace\" onchange=\"javascript: document.vrcdashform.submit();\">\n<option value=\"0\">".JText::_('VRCDASHALLPLACES')."</option>\n";
			foreach($allplaces as $place) {
				$selplace .= "<option value=\"".$place['id']."\"".($place['id'] == $pidplace ? " selected=\"selected\"" : "").">".$place['name']."</option>\n";
			}
			$selplace .= "</select></form>\n";
		}
		?>
		<div class="vrcdashdivleft">
		<h3 class="vrcdashdivlefthead"><?php echo JText::_('VRCDASHUPCRES'); ?></h3>
		<span class="vrcdashspanright"><?php echo $selplace; ?></span>
		<?php
		if(is_array($nextrentals)) {
			?>
			<table class="vrcdashtable">
			<tr class="vrcdashtrlastres">
				<td><?php echo JText::_('VRCDASHUPRESONE'); ?></td>
				<td><?php echo JText::_('VRCDASHUPRESTWO'); ?></td>
				<td align="center"><?php echo JText::_('VRCDASHUPRESTHREE'); ?></td>
				<td align="center"><?php echo JText::_('VRCDASHUPRESFOUR'); ?></td>
				<td><?php echo JText::_('VRCDASHUPRESFIVE'); ?></td>
			</tr>
			<?php
			foreach($nextrentals as $next) {
				$car=vikrentcar::getCarInfo($next['idcar']);
				?>
				<tr>
					<td><a href="index.php?option=com_vikrentcar&task=vieworders"><?php echo $next['id']; ?></a></td>
					<td><?php echo $car['name']; ?></td>
					<td align="center"><?php echo (!empty($next['idplace']) && empty($pidplace) ? vikrentcar::getPlaceName($next['idplace'])." " : "").date($df.' H:i', $next['ritiro']); ?></td>
					<td align="center"><?php echo (!empty($next['idreturnplace']) ? vikrentcar::getPlaceName($next['idreturnplace'])." " : "").date($df.' H:i', $next['consegna']); ?></td>
					<td><?php echo ($next['status'] == 'confirmed' ? '<span style="font-weight: bold; color: green;">CONFIRMED</span>' : '<span style="font-weight: bold; color: red;">STANDBY</span>'); ?></td>
				</tr>
				<?php
			}
			?>
			</table>
			<?php
		}
		?>
		</div>
		
		<div class="vrcdashdivright">
		<h3 class="vrcdashdivrighthead"><?php echo JText::_('VRCDASHSTATS'); ?></h3>
		<p class="vrcdashparag"></p>
		<?php
		if($arrayfirst['totprices'] < 1) {
			?>
			<p class="vrcdashparagred"><?php echo JText::_('VRCDASHNOPRICES'); ?>: 0</p>
			<?php
		}
		if($arrayfirst['totlocations'] < 1) {
			?>
			<p class="vrcdashparagred"><?php echo JText::_('VRCDASHNOLOCATIONS'); ?>: 0</p>
			<?php
		}else {
			?>
			<p class="vrcdashparag"><?php echo JText::_('VRCDASHNOLOCATIONS').': '.$arrayfirst['totlocations']; ?></p>
			<?php
		}
		if($arrayfirst['totcategories'] < 1) {
			?>
			<p class="vrcdashparagred"><?php echo JText::_('VRCDASHNOCATEGORIES'); ?>: 0</p>
			<?php
		}else {
			?>
			<p class="vrcdashparag"><?php echo JText::_('VRCDASHNOCATEGORIES').': '.$arrayfirst['totcategories']; ?></p>
			<?php
		}
		if($arrayfirst['totcars'] < 1) {
			?>
			<p class="vrcdashparagred"><?php echo JText::_('VRCDASHNOCARS'); ?>: 0</p>
			<?php
		}else {
			?>
			<p class="vrcdashparag"><?php echo JText::_('VRCDASHNOCARS').': '.$arrayfirst['totcars']; ?></p>
			<?php
		}
		if($arrayfirst['totdailyfares'] < 1) {
			?>
			<p class="vrcdashparagred"><?php echo JText::_('VRCDASHNODAILYFARES'); ?>: 0</p>
			<?php
		}
		?>
			<p class="vrcdashparag"><?php echo JText::_('VRCDASHTOTRESCONF').': '.$totnextrentconf; ?></p>
			<p class="vrcdashparag"><?php echo JText::_('VRCDASHTOTRESPEND').': '.$totnextrentpend; ?></p>
		</div>
		<?php
	}
	
	function printHeaderCar($car, $name, $prezzi, $idcar, $allc) {
		if (file_exists('./components/com_vikrentcar/resources/'.$car) && getimagesize('./components/com_vikrentcar/resources/'.$car)) {
			$img='<img align="middle" class="maxninety" alt="Car Image" src="' . JURI :: root() . 'administrator/components/com_vikrentcar/resources/'.$car.'" />';
		}else {
			$img='<img align="middle" alt="vikrentcar logo" src="' . JURI :: root() . 'administrator/components/com_vikrentcar/vikrentcar.jpg' . '" />';
		}
		//$fprice="<p class=\"vrcadminfaresctitle\">".$name." - ".JText::_('VRINSERTFEE')."</p>\n";
		//switch bewtween daily, hourly fares
		$fprice="<div class=\"dailypricesactive\">".JText::_('VRCDAILYFARES')."</div><div class=\"hourscharges\"><a href=\"index.php?option=com_vikrentcar&task=viewhourscharges&cid[]=".$idcar."\">".JText::_('VRCHOURSCHARGES')."</a></div><div class=\"hourlyprices\"><a href=\"index.php?option=com_vikrentcar&task=viewtariffehours&cid[]=".$idcar."\">".JText::_('VRCHOURLYFARES')."</a></div>\n";
		//
		if (empty($prezzi)) {
			$fprice.="<br/><span class=\"err\"><b>".JText::_('VRMSGONE')." <a href=\"index.php?option=com_vikrentcar&task=newprice\">".JText::_('VRHERE')."</a></b></span>";
		}else {
			$colsp="2";
			$fprice.="<form name=\"newd\" method=\"post\" action=\"index.php?option=com_vikrentcar\" onsubmit=\"javascript: if(!document.newd.ddaysfrom.value.match(/\S/)){alert('".JText::_('VRMSGTWO')."'); return false;}else{return true;}\">\n<br clear=\"all\"/><div style=\"margin-left: 1px; padding: 10px; background: #cfe788; border-bottom-right-radius: 8px; border-bottom-left-radius: 8px;\"><span style=\"font-weight: bold; color: #5D7120; font-size: 12px; padding: 0 0 7px;\">".JText::_('VRDAYS').": </span><br/><table><tr><td>".JText::_('VRDAYSFROM')." <input type=\"text\" name=\"ddaysfrom\" value=\"\" size=\"5\"/></td><td>&nbsp;&nbsp;&nbsp; ".JText::_('VRDAYSTO')." <input type=\"text\" name=\"ddaysto\" value=\"\" size=\"5\"/></td></tr></table>\n";
			$fprice.="<br/><span style=\"font-weight: bold; color: #5D7120; font-size: 12px; padding: 0 0 7px;\">".JText::_('VRDAILYPRICES').": </span><br/><table>\n";
			$currencysymb=vikrentcar::getCurrencySymb(true);
			foreach($prezzi as $pr){
				$fprice.="<tr><td>".$pr['name'].": </td><td>".$currencysymb." <input type=\"text\" name=\"dprice".$pr['id']."\" value=\"\" size=\"10\"/></td>";
				if (!empty($pr['attr'])) {
					$colsp="4";
					$fprice.="<td>".$pr['attr']."</td><td><input type=\"text\" name=\"dattr".$pr['id']."\" value=\"\" size=\"10\"/></td>";
				}
				$fprice.="</tr>\n";
			}
			$fprice.="<tr><td colspan=\"".$colsp."\" align=\"center\"><input type=\"submit\" class=\"vrcsubmitfares\" name=\"newdispcost\" value=\"".JText::_('VRINSERT')."\"/></td></tr></table></div><input type=\"hidden\" name=\"cid[]\" value=\"".$idcar."\"/><input type=\"hidden\" name=\"task\" value=\"viewtariffe\"/></form>";
		}
		$chcarsel = "<select name=\"cid[]\" onchange=\"javascript: document.vrcchcar.submit();\">\n";
		foreach($allc as $cc) {
			$chcarsel .= "<option value=\"".$cc['id']."\"".($cc['id'] == $idcar ? " selected=\"selected\"" : "").">".$cc['name']."</option>\n";
		}
		$chcarsel .= "</select>\n";
		$chcarf = "<form name=\"vrcchcar\" method=\"post\" action=\"index.php?option=com_vikrentcar\"><input type=\"hidden\" name=\"task\" value=\"viewtariffe\"/>".JText::_('VRCSELVEHICLE').": ".$chcarsel."</form>";
		echo "<table><tr><td colspan=\"2\" valign=\"top\" align=\"left\"><div class=\"vrcadminfaresctitle\">".$name." - ".JText::_('VRINSERTFEE')." <span style=\"float: right; text-transform: none;\">".$chcarf."</span></div></td></tr><tr><td valign=\"top\" align=\"left\">".$img."</td><td valign=\"top\" align=\"left\">".$fprice."</td></tr></table><br/>\n";	
	}
	
	function printHeaderCarHours($car, $name, $prezzi, $idcar, $allc) {
		if (file_exists('./components/com_vikrentcar/resources/'.$car) && getimagesize('./components/com_vikrentcar/resources/'.$car)) {
			$img='<img align="middle" class="maxninety" alt="Car Image" src="' . JURI :: root() . 'administrator/components/com_vikrentcar/resources/'.$car.'" />';
		}else {
			$img='<img align="middle" alt="vikrentcar logo" src="' . JURI :: root() . 'administrator/components/com_vikrentcar/vikrentcar.jpg' . '" />';
		}
		//$fprice="<p class=\"vrcadminfaresctitle\">".$name." - ".JText::_('VRINSERTFEE')."</p>\n";
		//switch bewtween daily, hourly fares
		$fprice="<div class=\"dailyprices\"><a href=\"index.php?option=com_vikrentcar&task=viewtariffe&cid[]=".$idcar."\">".JText::_('VRCDAILYFARES')."</a></div><div class=\"hourscharges\"><a href=\"index.php?option=com_vikrentcar&task=viewhourscharges&cid[]=".$idcar."\">".JText::_('VRCHOURSCHARGES')."</a></div><div class=\"hourlypricesactive\">".JText::_('VRCHOURLYFARES')."</div>\n";
		//
		if (empty($prezzi)) {
			$fprice.="<br/><span class=\"err\"><b>".JText::_('VRMSGONE')." <a href=\"index.php?option=com_vikrentcar&task=newprice\">".JText::_('VRHERE')."</a></b></span>";
		}else {
			$colsp="2";
			$fprice.="<form name=\"newd\" method=\"post\" action=\"index.php?option=com_vikrentcar\" onsubmit=\"javascript: if(!document.newd.hhoursfrom.value.match(/\S/)){alert('".JText::_('VRMSGTWO')."'); return false;}else{return true;}\">\n<br clear=\"all\"/><div style=\"margin-left: 1px; padding: 10px; background: #93d4d4; border-bottom-right-radius: 8px; border-bottom-left-radius: 8px;\"><span style=\"font-weight: bold; color: #025A8D; font-size: 12px; padding: 0 0 7px;\">".JText::_('VRCHOURS').": </span><br/><table><tr><td>".JText::_('VRDAYSFROM')." <input type=\"text\" name=\"hhoursfrom\" value=\"\" size=\"5\"/></td><td>&nbsp;&nbsp;&nbsp; ".JText::_('VRDAYSTO')." <input type=\"text\" name=\"hhoursto\" value=\"\" size=\"5\"/></td></tr></table>\n";
			$fprice.="<br/><span style=\"font-weight: bold; color: #025A8D; font-size: 12px; padding: 0 0 7px;\">".JText::_('VRCHOURLYPRICES').": </span><br/><table>\n";
			$currencysymb=vikrentcar::getCurrencySymb(true);
			foreach($prezzi as $pr){
				$fprice.="<tr><td>".$pr['name'].": </td><td>".$currencysymb." <input type=\"text\" name=\"hprice".$pr['id']."\" value=\"\" size=\"10\"/></td>";
				if (!empty($pr['attr'])) {
					$colsp="4";
					$fprice.="<td>".$pr['attr']."</td><td><input type=\"text\" name=\"hattr".$pr['id']."\" value=\"\" size=\"10\"/></td>";
				}
				$fprice.="</tr>\n";
			}
			$fprice.="<tr><td colspan=\"".$colsp."\" align=\"center\"><input type=\"submit\" class=\"vrcsubmithfares\" name=\"newdispcost\" value=\"".JText::_('VRINSERT')."\"/></td></tr></table></div><input type=\"hidden\" name=\"cid[]\" value=\"".$idcar."\"/><input type=\"hidden\" name=\"task\" value=\"viewtariffehours\"/></form>";
		}
		$chcarsel = "<select name=\"cid[]\" onchange=\"javascript: document.vrcchcar.submit();\">\n";
		foreach($allc as $cc) {
			$chcarsel .= "<option value=\"".$cc['id']."\"".($cc['id'] == $idcar ? " selected=\"selected\"" : "").">".$cc['name']."</option>\n";
		}
		$chcarsel .= "</select>\n";
		$chcarf = "<form name=\"vrcchcar\" method=\"post\" action=\"index.php?option=com_vikrentcar\"><input type=\"hidden\" name=\"task\" value=\"viewtariffehours\"/>".JText::_('VRCSELVEHICLE').": ".$chcarsel."</form>";
		echo "<table><tr><td colspan=\"2\" valign=\"top\" align=\"left\"><div class=\"vrcadminfaresctitle\">".$name." - ".JText::_('VRINSERTFEE')." <span style=\"float: right; text-transform: none;\">".$chcarf."</span></div></td></tr><tr><td valign=\"top\" align=\"left\">".$img."</td><td valign=\"top\" align=\"left\">".$fprice."</td></tr></table><br/>\n";	
	}
	
	function printHeaderCarHoursCharges($car, $name, $prezzi, $idcar, $allc) {
		JHTML::_('behavior.tooltip');
		if (file_exists('./components/com_vikrentcar/resources/'.$car) && getimagesize('./components/com_vikrentcar/resources/'.$car)) {
			$img='<img align="middle" class="maxninety" alt="Car Image" src="' . JURI :: root() . 'administrator/components/com_vikrentcar/resources/'.$car.'" />';
		}else {
			$img='<img align="middle" alt="vikrentcar logo" src="' . JURI :: root() . 'administrator/components/com_vikrentcar/vikrentcar.jpg' . '" />';
		}
		//$fprice="<p class=\"vrcadminfaresctitle\">".$name." - ".JText::_('VRINSERTFEE')."</p>\n";
		//switch bewtween daily, hourly fares or extra hours charges
		$fprice="<div class=\"dailyprices\"><a href=\"index.php?option=com_vikrentcar&task=viewtariffe&cid[]=".$idcar."\">".JText::_('VRCDAILYFARES')."</a></div><div class=\"hourschargesactive\">".JText::_('VRCHOURSCHARGES')."</div><div class=\"hourlyprices\"><a href=\"index.php?option=com_vikrentcar&task=viewtariffehours&cid[]=".$idcar."\">".JText::_('VRCHOURLYFARES')."</a></div>\n";
		//
		if (empty($prezzi)) {
			$fprice.="<br/><span class=\"err\"><b>".JText::_('VRMSGONE')." <a href=\"index.php?option=com_vikrentcar&task=newprice\">".JText::_('VRHERE')."</a></b></span>";
		}else {
			$colsp="2";
			$fprice.="<form name=\"newd\" method=\"post\" action=\"index.php?option=com_vikrentcar\" onsubmit=\"javascript: if(!document.newd.hhoursfrom.value.match(/\S/)){alert('".JText::_('VRMSGTWO')."'); return false;}else{return true;}\">\n<br clear=\"all\"/><div style=\"margin-left: 1px; padding: 10px; background: #8fdc5b; border-bottom-right-radius: 8px; border-bottom-left-radius: 8px;\"><span style=\"font-weight: bold; color: #ffffff; font-size: 12px; padding: 0 0 7px;\">".JText::_('VRCEXTRARHOURS').": </span><br/><table><tr><td>".JText::_('VRDAYSFROM')." <input type=\"text\" name=\"hhoursfrom\" value=\"\" size=\"5\"/></td><td>&nbsp;&nbsp;&nbsp; ".JText::_('VRDAYSTO')." <input type=\"text\" name=\"hhoursto\" value=\"\" size=\"5\"/></td><td>&nbsp;&nbsp;&nbsp; ".JHTML::tooltip(JText::_('VRCSHCHARGESHELP'), JText::_('VRCHOURSCHARGES'), 'tooltip.png', '')."</td></tr></table>\n";
			$fprice.="<br/><span style=\"font-weight: bold; color: #ffffff; font-size: 12px; padding: 0 0 7px;\">".JText::_('VRCHOURLYCHARGES').": </span><br/><table>\n";
			$currencysymb=vikrentcar::getCurrencySymb(true);
			foreach($prezzi as $pr){
				$fprice.="<tr><td>".$pr['name'].": </td><td>".$currencysymb." <input type=\"text\" name=\"hprice".$pr['id']."\" value=\"\" size=\"10\"/></td>";
				$fprice.="</tr>\n";
			}
			$fprice.="<tr><td colspan=\"".$colsp."\" align=\"center\"><input type=\"submit\" class=\"vrcsubmithcharges\" name=\"newdispcost\" value=\"".JText::_('VRINSERT')."\"/></td></tr></table></div><input type=\"hidden\" name=\"cid[]\" value=\"".$idcar."\"/><input type=\"hidden\" name=\"task\" value=\"viewhourscharges\"/></form>";
		}
		$chcarsel = "<select name=\"cid[]\" onchange=\"javascript: document.vrcchcar.submit();\">\n";
		foreach($allc as $cc) {
			$chcarsel .= "<option value=\"".$cc['id']."\"".($cc['id'] == $idcar ? " selected=\"selected\"" : "").">".$cc['name']."</option>\n";
		}
		$chcarsel .= "</select>\n";
		$chcarf = "<form name=\"vrcchcar\" method=\"post\" action=\"index.php?option=com_vikrentcar\"><input type=\"hidden\" name=\"task\" value=\"viewhourscharges\"/>".JText::_('VRCSELVEHICLE').": ".$chcarsel."</form>";
		echo "<table><tr><td colspan=\"2\" valign=\"top\" align=\"left\"><div class=\"vrcadminfaresctitle\">".$name." - ".JText::_('VRINSERTFEE')." <span style=\"float: right; text-transform: none;\">".$chcarf."</span></div></td></tr><tr><td valign=\"top\" align=\"left\">".$img."</td><td valign=\"top\" align=\"left\">".$fprice."</td></tr></table><br/>\n";	
	}
	
	function printHeaderBusy ($car) {
		if (file_exists('./components/com_vikrentcar/resources/'.$car['img']) && getimagesize('./components/com_vikrentcar/resources/'.$car['img'])) {
			$img='<img align="middle" class="maxninety" alt="Car Image" src="' . JURI :: root() . 'administrator/components/com_vikrentcar/resources/'.$car['img'].'" />';
		}else {
			$img='<img align="middle" alt="vikrentcar logo" src="' . JURI :: root() . 'administrator/components/com_vikrentcar/vikrentcar.jpg' . '" />';
		}
		echo "<table><tr><td><div class=\"vrcadminfaresctitle\">".$car['name']." ".JText::_('VRMODRES')."</div></td></tr><tr><td valign=\"top\" align=\"left\">".$img."</td></tr></table><br/>\n";
	}
	
	function printHeaderCalendar($car, $msg, $allc, $allpayments, $allcustomf, $pickuparr, $dropoffarr) {
		if (file_exists('./components/com_vikrentcar/resources/'.$car['img']) && getimagesize('./components/com_vikrentcar/resources/'.$car['img'])) {
			$img='<img align="middle" class="maxninety" alt="Car Image" src="' . JURI :: root() . 'administrator/components/com_vikrentcar/resources/'.$car['img'].'" />';
		}else {
			$img='<img align="middle" alt="vikrentcar logo" src="' . JURI :: root() . 'administrator/components/com_vikrentcar/vikrentcar.jpg' . '" />';
		}
		JHTML::_('behavior.calendar');
		//VikRentCar 1.7
		?>
		<script language="JavaScript" type="text/javascript">
		function vrcToggleMoreOptions(objel) {
			var moreopt = document.getElementById('vrcquickresmoreoptions');
			if(moreopt.style.display == 'none') {
				moreopt.style.display = 'block';
				objel.innerHTML = '<?php echo addslashes(JText::_('VRCQUICKRESMOREOPTIONSHIDE')); ?>';
			}else {
				moreopt.style.display = 'none';
				objel.innerHTML = '<?php echo addslashes(JText::_('VRCQUICKRESMOREOPTIONS')); ?>';
			}
		}
		function vrcNotifyCustomer(val) {
			if(val == 'confirmed') {
				document.getElementById('notifycustckbx').checked = false;
			}else {
				document.getElementById('notifycustckbx').checked = false;
			}
		}
		</script>
		<?php
		$moreoptions = '<p style="margin: 3px 0 0 0;">'.JText::_('VRCQUICKRESORDSTATUS').': <select name="ordstatus" onchange="javascript: vrcNotifyCustomer(this.value);"><option value="confirmed">'.JText::_('VRCONFIRMED').'</option><option value="standby">'.JText::_('VRSTANDBY').'</option></select><span id="notifycust" style="display: inline-block; margin-left: 5px;">'.JText::_('VRCQUICKRESNOTIFYCUST').' <input type="checkbox" name="notifycust" id="notifycustckbx" value="1"/></span></p>';
		if (@count($pickuparr) > 0) {
			$moreoptions .= '<p style="margin: 3px 0 0 0;">'.JText::_('VRCQUICKRESPICKUPLOC').': <select name="pickuploc"><option value="">'.JText::_('VRCQUICKRESNOLOCATION').'</option>';
			foreach($pickuparr as $pick) {
				$moreoptions .= '<option value="'.$pick['id'].'">'.$pick['name'].'</option>';
			}
			$moreoptions .= '</select></p>';
		}
		if (@count($dropoffarr) > 0) {
			$moreoptions .= '<p style="margin: 3px 0 0 0;">'.JText::_('VRCQUICKRESDROPOFFLOC').': <select name="dropoffloc"><option value="">'.JText::_('VRCQUICKRESNOLOCATION').'</option>';
			foreach($dropoffarr as $drop) {
				$moreoptions .= '<option value="'.$drop['id'].'">'.$drop['name'].'</option>';
			}
			$moreoptions .= '</select></p>';
		}
		if (is_array($allpayments) && @count($allpayments) > 0) {
			$moreoptions .= '<p style="margin: 3px 0 0 0;">'.JText::_('VRCQUICKRESMETHODOFPAYMENT').': <select name="paymentid"><option value="">'.JText::_('VRCQUICKRESNONE').'</option>';
			foreach($allpayments as $pay) {
				$moreoptions .= '<option value="'.$pay['id'].'='.$pay['name'].'">'.$pay['name'].'</option>';
			}
			$moreoptions .= '</select></p>';
		}
		if (is_array($allcustomf) && @count($allcustomf) > 0) {
			$jscustomfstr = '';
			foreach($allcustomf as $custf) {
				$jscustomfstr .= addslashes(JText::_($custf['name'])).': \r\n';
			}
			$jscustomfstr = rtrim($jscustomfstr, '\r\n');
			?>
			<script language="JavaScript" type="text/javascript">
			function vrcPopulateCustomFields() {
				document.getElementById('custdata').value = "<?php echo $jscustomfstr; ?>";
			}
			</script>
			<?php
			$moreoptions .= '<p style="margin: 5px 0 0 0;"><a href="javascript: void(0);" onclick="javascript: vrcPopulateCustomFields();">'.JText::_('VRCQUICKRESPOPULATECUSTOMINFO').'</a></p>';
		}
		//
		$fquick="";
		if ($msg=="1") {
			$fquick.="<br/><p class=\"successmade\" style=\"margin-top: 0;\">".JText::_('VRBOOKMADE')."</p>";
		}elseif ($msg=="0") {
			$fquick.="<br/><p class=\"err\" style=\"margin-top: 0;\">".JText::_('VRBOOKNOTMADE')."</p>";
		}
		$fquick.="<form name=\"newb\" method=\"post\" action=\"index.php?option=com_vikrentcar\" onsubmit=\"javascript: if(!document.newb.pickupdate.value.match(/\S/)){alert('".JText::_('VRMSGTHREE')."'); return false;} if(!document.newb.releasedate.value.match(/\S/)){alert('".JText::_('VRMSGFOUR')."'); return false;} return true;\">";
		$timeopst=vikrentcar::getTimeOpenStore(true);
		if (is_array($timeopst) && $timeopst[0]!=$timeopst[1]) {
			$opent=vikrentcar::getHoursMinutes($timeopst[0]);
			$closet=vikrentcar::getHoursMinutes($timeopst[1]);
			$i=$opent[0];
			$j=$closet[0];
		}else {
			$i=0;
			$j=23;
		}
		while ($i <= $j) {
			if ($i < 10) {
				$i="0".$i;
			}else {
				$i=$i;
			}
			$hours.="<option value=\"".$i."\">".$i."</option>\n";
			$i++;
		}
		for($i=0; $i < 60; $i++){
			if ($i < 10) {
				$i="0".$i;
			}else {
				$i=$i;
			}
			$minutes.="<option value=\"".$i."\">".$i."</option>\n";
		}
		$fquick.="<table><tr><td><strong>".JText::_('VRDATEPICKUP').":</strong> </td><td>".JHTML::_('calendar', '', 'pickupdate', 'pickupdate', vikrentcar::getDateFormat(true), array('class'=>'', 'size'=>'10',  'maxlength'=>'19'))." ".JText::_('VRAT')." <select name=\"pickuph\">".$hours."</select> : <select name=\"pickupm\">".$minutes."</select></td></tr>\n";
		$fquick.="<tr><td><strong>".JText::_('VRDATERELEASE').":</strong> </td><td>".JHTML::_('calendar', '', 'releasedate', 'releasedate', vikrentcar::getDateFormat(true), array('class'=>'', 'size'=>'10',  'maxlength'=>'19'))." ".JText::_('VRAT')." <select name=\"releaseh\">".$hours."</select> : <select name=\"releasem\">".$minutes."</select></td></tr>";
		$fquick.="<tr><td colspan=\"2\"><strong>".JText::_('VRQRCUSTMAIL').":</strong> <input type=\"text\" name=\"custmail\" value=\"\" size=\"20\"/></td></tr>\n";
		$fquick.="<tr><td colspan=\"2\"><strong>".JText::_('VRCUSTINFO').":</strong><br/><textarea name=\"custdata\" id=\"custdata\" rows=\"5\" cols=\"50\"></textarea></td></tr>\n";
		$fquick.="<tr><td colspan=\"2\"><a href=\"javascript: void(0);\" onclick=\"javascript: vrcToggleMoreOptions(this);\">".JText::_('VRCQUICKRESMOREOPTIONS')."</a><div id=\"vrcquickresmoreoptions\" style=\"display: none;\">".$moreoptions."</div><div style=\"text-align: right;\"><input type=\"submit\" name=\"quickb\" value=\"".JText::_('VRMAKERESERV')."\"/></div></td></tr>\n";
		$fquick.="</table><input type=\"hidden\" name=\"task\" value=\"calendar\"/><input type=\"hidden\" name=\"cid[]\" value=\"".$car['id']."\"/></form>";
		//vikrentcar 1.6
		$chcarsel = "<select name=\"cid[]\" onchange=\"javascript: document.vrcchcar.submit();\">\n";
		foreach($allc as $cc) {
			$chcarsel .= "<option value=\"".$cc['id']."\"".($cc['id'] == $car['id'] ? " selected=\"selected\"" : "").">".$cc['name']."</option>\n";
		}
		$chcarsel .= "</select>\n";
		$chcarf = "<form name=\"vrcchcar\" method=\"post\" action=\"index.php?option=com_vikrentcar\"><input type=\"hidden\" name=\"task\" value=\"calendar\"/>".JText::_('VRCSELVEHICLE').": ".$chcarsel."</form>";
		//
		echo "<table><tr><td colspan=\"2\" valign=\"top\" align=\"left\"><div class=\"vrcadminfaresctitle\">".$car['name'].", ".JText::_('VRQUICKBOOK')." <span style=\"float: right; text-transform: none;\">".$chcarf."</span></div></td></tr><tr><td valign=\"top\" align=\"left\">".$img."</td><td valign=\"top\" align=\"left\">".$fquick."</td></tr></table><br/>\n";		
	}
	
	function pShowOverview ($rows, $arrbusy, $wmonthsel, $tsstart, $option, $lim0, $navbut) {
		$nowts=getdate($tsstart);
		?>
		<form action="index.php?option=com_vikrentcar&amp;task=overview" method="post" name="vroverview">
		<?php echo $wmonthsel; ?>
		</form>
		<br/>
		<table class="vrcoverviewtable">
		<tr class="vrcoverviewtablerow">
		<td class="bluedays vrcoverviewtdone"><strong><?php echo vikrentcar::sayMonth($nowts['mon'])." ".$nowts['year']; ?></strong></td>
		<?php
		$mon=$nowts['mon'];
		while ($nowts['mon']==$mon) {
			echo '<td align="center" class="bluedays">'.$nowts['mday'].'</td>';
			$next=$nowts['mday'] + 1;
			$dayts=mktime(0, 0, 0, ($nowts['mon'] < 10 ? "0".$nowts['mon'] : $nowts['mon']), ($next < 10 ? "0".$next : $next), $nowts['year']);
			$nowts=getdate($dayts);
		}
		?>
		</tr>
		<?php
		foreach($rows as $car) {
			$nowts=getdate($tsstart);
			$mon=$nowts['mon'];
			echo '<tr class="vrcoverviewtablerow">';
			echo '<td class="carname"><strong>'.$car['name'].'</strong> ('.$car['units'].')</td>';
			while ($nowts['mon']==$mon) {
				$dclass="notbusy";
				$dalt="";
				$bid="";
				$totfound=0;
				if(@is_array($arrbusy[$car['id']])) {
					foreach($arrbusy[$car['id']] as $b){
						$tmpone=getdate($b['ritiro']);
						$rit=($tmpone['mon'] < 10 ? "0".$tmpone['mon'] : $tmpone['mon'])."/".($tmpone['mday'] < 10 ? "0".$tmpone['mday'] : $tmpone['mday'])."/".$tmpone['year'];
						$ritts=strtotime($rit);
						$tmptwo=getdate($b['consegna']);
						$con=($tmptwo['mon'] < 10 ? "0".$tmptwo['mon'] : $tmptwo['mon'])."/".($tmptwo['mday'] < 10 ? "0".$tmptwo['mday'] : $tmptwo['mday'])."/".$tmptwo['year'];
						$conts=strtotime($con);
						if ($nowts[0]>=$ritts && $nowts[0]<=$conts) {
							$dclass="busy";
							$bid=$b['id'];
							if ($nowts[0]==$ritts) {
								$dalt=JText::_('VRPICKUPAT')." ".date('H:i', $b['ritiro']);
							}elseif ($nowts[0]==$conts) {
								$dalt=JText::_('VRRELEASEAT')." ".date('H:i', $b['consegna']);
							}
							$totfound++;
						}
					}
				}
				$useday=($nowts['mday'] < 10 ? "0".$nowts['mday'] : $nowts['mday']);
				if($totfound == 1) {
					$dlnk="<a href=\"index.php?option=com_vikrentcar&task=editbusy&cid[]=".$bid."\" style=\"color: #ffffff;\">".$totfound."</a>";
					$cal="<td align=\"center\" class=\"".$dclass."\"".(!empty($dalt) ? " title=\"".$dalt."\"" : "").">".$dlnk."</td>\n";
				}elseif($totfound > 1) {
					$dlnk="<a href=\"index.php?option=com_vikrentcar&task=choosebusy&idcar=".$car['id']."&ts=".$nowts[0]."\" style=\"color: #ffffff;\">".$totfound."</a>";
					$cal="<td align=\"center\" class=\"".$dclass."\">".$dlnk."</td>\n";
				}else {
					$dlnk=$useday;
					$cal="<td align=\"center\" class=\"".$dclass."\">&nbsp;</td>\n";
				}
				echo $cal;
				$next=$nowts['mday'] + 1;
				$dayts=mktime(0, 0, 0, ($nowts['mon'] < 10 ? "0".$nowts['mon'] : $nowts['mon']), ($next < 10 ? "0".$next : $next), $nowts['year']);
				$nowts=getdate($dayts);
			}
			echo '</tr>';
		}
		?>
		</table>
		<form action="index.php?option=com_vikrentcar" method="post" name="adminForm" id="adminForm">
		<input type="hidden" name="option" value="<?php echo $option; ?>" />
		<?php
		if(defined('JVERSION') && version_compare(JVERSION, '1.6.0') < 0) {
			//Joomla 1.5
			
		}
		?>
		<input type="hidden" name="task" value="overview" />
		<input type="hidden" name="month" value="<?php echo $tsstart; ?>" />
		<?php echo '<br/>'.$navbut; ?>
		</form>
		<?php
	}
	
	function pViewCalendar ($car, $busy, $vmode, $option) {
		if(empty($busy)){
			echo "<p>".JText::_('VRNOFUTURERES')."</p>";
		}else {
			$check=true;
			?>
			<p>&bull; <u><b><?php echo JText::_('VRVIEW'); ?></b></u>: <a href="index.php?option=com_vikrentcar&amp;task=calendar&amp;cid[]=<?php echo $car['id']; ?>&amp;vmode=3"><?php echo JText::_('VRTHREEMONTHS'); ?></a> - 
			<a href="index.php?option=com_vikrentcar&amp;task=calendar&amp;cid[]=<?php echo $car['id']; ?>&amp;vmode=6"><?php echo JText::_('VRSIXMONTHS'); ?></a> - 
			<a href="index.php?option=com_vikrentcar&amp;task=calendar&amp;cid[]=<?php echo $car['id']; ?>&amp;vmode=12"><?php echo JText::_('VRTWELVEMONTHS'); ?></a></p>
			<table><tr>
			<?php
		}
		?>
		<table><tr>
		<?php
		$arr=getdate();
		$mon=$arr['mon'];
		$realmon=($mon < 10 ? "0".$mon : $mon);
		$year=$arr['year'];
		$day=$realmon."/01/".$year;
		$dayts=strtotime($day);
		$newarr=getdate($dayts);
		for($jj=1; $jj<=$vmode; $jj++){
			echo "<td valign=\"top\">";
			$cal="";
			?>
			<table class="vrcadmincaltable">
			<tr class="vrcadmincaltrmon"><td colspan="7" align="center"><?php echo vikrentcar::sayMonth($newarr['mon'])." ".$newarr['year']; ?></td></tr>
			<tr class="vrcadmincaltrmdays"><td><?php echo JText::_('VRSUN'); ?></td><td><?php echo JText::_('VRMON'); ?></td><td><?php echo JText::_('VRTUE'); ?></td><td><?php echo JText::_('VRWED'); ?></td><td><?php echo JText::_('VRTHU'); ?></td><td><?php echo JText::_('VRFRI'); ?></td><td><?php echo JText::_('VRSAT'); ?></td></tr>
			<tr>
			<?php
			for($i=0; $i < $newarr['wday']; $i++){
				$cal.="<td align=\"center\">&nbsp;</td>";
			}
			while ($newarr['mon']==$mon) {
				$dclass="free";
				$dalt="";
				$bid="";
				if ($check) {
					$totfound=0;
					foreach($busy as $b){
						$tmpone=getdate($b['ritiro']);
						$rit=($tmpone['mon'] < 10 ? "0".$tmpone['mon'] : $tmpone['mon'])."/".($tmpone['mday'] < 10 ? "0".$tmpone['mday'] : $tmpone['mday'])."/".$tmpone['year'];
						$ritts=strtotime($rit);
						$tmptwo=getdate($b['consegna']);
						$con=($tmptwo['mon'] < 10 ? "0".$tmptwo['mon'] : $tmptwo['mon'])."/".($tmptwo['mday'] < 10 ? "0".$tmptwo['mday'] : $tmptwo['mday'])."/".$tmptwo['year'];
						$conts=strtotime($con);
						if ($newarr[0]>=$ritts && $newarr[0]<=$conts) {
							$dclass="busy";
							$bid=$b['id'];
							if ($newarr[0]==$ritts) {
								$dalt=JText::_('VRPICKUPAT')." ".date('H:i', $b['ritiro']);
							}elseif ($newarr[0]==$conts) {
								$dalt=JText::_('VRRELEASEAT')." ".date('H:i', $b['consegna']);
							}
							$totfound++;
//							break;
						}
					}
				}
				$useday=($newarr['mday'] < 10 ? "0".$newarr['mday'] : $newarr['mday']);
				if($totfound == 1) {
					$dlnk="<a href=\"index.php?option=com_vikrentcar&task=editbusy&cid[]=".$bid."\">".$useday."</a>";
					$cal.="<td align=\"center\" class=\"".$dclass."\"".(!empty($dalt) ? " title=\"".$dalt."\"" : "").">".$dlnk."</td>\n";
				}elseif($totfound > 1) {
					$dlnk="<a href=\"index.php?option=com_vikrentcar&task=choosebusy&idcar=".$car['id']."&ts=".$newarr[0]."\">".$useday."</a>";
					$cal.="<td align=\"center\" class=\"".$dclass."\">".$dlnk."</td>\n";
				}else {
					$dlnk=$useday;
					$cal.="<td align=\"center\" class=\"".$dclass."\">".$dlnk."</td>\n";
				}
				$cal.=($newarr['wday']==6 ? "</tr>\n<tr>" : "");
				$next=$newarr['mday'] + 1;
				$dayts=mktime(0, 0, 0, ($newarr['mon'] < 10 ? "0".$newarr['mon'] : $newarr['mon']), ($next < 10 ? "0".$next : $next), $newarr['year']);
				$newarr=getdate($dayts);
			}
			
			if($newarr['wday'] > 0) {
				for($i=$newarr['wday']; $i <= 6; $i++){
					$cal.="<td align=\"center\">&nbsp;</td>";
				}
			}
			
			echo $cal;
			?>
			</tr>
			</table>
			<?php
			echo "</td>";
			if ($mon==12) {
				$mon=1;
				$year+=1;
				$dayts=mktime(0, 0, 0, ($mon < 10 ? "0".$mon : $mon), 01, $year);
			}else {
				$mon+=1;
				$dayts=mktime(0, 0, 0, ($mon < 10 ? "0".$mon : $mon), 01, $year);
			}
			$newarr=getdate($dayts);
			
			if (($jj % 4)==0 && $vmode > 4) {
				echo "</tr>\n<tr>";
			}
		}
		
		?>
		</tr></table>
		<form action="index.php?option=com_vikrentcar" method="post" name="adminForm" id="adminForm">
		<input type="hidden" name="task" value="" />
		<input type="hidden" name="option" value="<?php echo $option; ?>" />
		</form>
		<?php
		
	}
	
	function pViewCar ($rows, $option, $lim0="0", $navbut="") {
		if(empty($rows)){
			?>
			<p><?php echo JText::_('VRNOCARSFOUND'); ?></p>
			<form action="index.php?option=com_vikrentcar" method="post" name="adminForm" id="adminForm">
			<input type="hidden" name="task" value="" />
			<input type="hidden" name="option" value="<?php echo $option; ?>" />
			</form>
			<?php
		}else{
		
		?>
   <script language="JavaScript" type="text/javascript">
function submitbutton(pressbutton) {
			var form = document.adminForm;
			if (pressbutton == 'removecar') {
				if (confirm('<?php echo JText::_('VRJSDELCAR'); ?>?')){
					submitform( pressbutton );
					return;
				}else{
					return false;
				}
			}

			// do field validation
			try {
				document.adminForm.onsubmit();
			}
			catch(e){}
			submitform( pressbutton );
		}
</script>
   <div id="overDiv" style="position:absolute; visibility:hidden; z-index:1000;"></div>
	<script type="text/javascript" src="../includes/js/overlib_mini.js"></script>

	<form action="index.php?option=com_vikrentcar" method="post" name="adminForm" id="adminForm">
	<table cellpadding="4" cellspacing="0" border="0" width="100%" class="table table-striped">
		<thead>
		<tr>
			<th width="20">
				<input type="checkbox" onclick="Joomla.checkAll(this)" value="" name="checkall-toggle">
			</th>
			<th class="title left" width="150"><?php echo JText::_( 'VRPVIEWCARONE' ); ?></th>
			<th class="title left" width="150"><?php echo JText::_( 'VRPVIEWCARTWO' ); ?></th>
			<th class="title center" align="center" width="150"><?php echo JText::_( 'VRPVIEWCARTHREE' ); ?></th>
			<th class="title center" align="center" width="150"><?php echo JText::_( 'VRPVIEWCARFOUR' ); ?></th>
			<th class="title left" width="150"><?php echo JText::_( 'VRPVIEWCARFIVE' ); ?></th>
			<th class="title center" align="center" width="100"><?php echo JText::_( 'VRPVIEWCARSEVEN' ); ?></th>
			<th class="title center" align="center" width="100"><?php echo JText::_( 'VRPVIEWCARSIX' ); ?></th>
		</tr>
		</thead>
		<?php

		$kk = 0;
		$i = 0;
		for ($i = 0, $n = count($rows); $i < $n; $i++) {
			$row = & $rows[$i];
			$dbo = & JFactory :: getDBO();
			$q="SELECT COUNT(*) AS `totdisp` FROM `#__vikrentcar_dispcost` WHERE `idcar`='".$row['id']."' ORDER BY `#__vikrentcar_dispcost`.`days`;";
			$dbo->setQuery($q);
			$dbo->Query($q);
			$lines = $dbo->loadAssocList();
			$tot=$lines[0]['totdisp'];
			if (!empty($row['idcat'])) {
				$validcats = false;
				$categories = "";
				$cat=explode(";", $row['idcat']);
				$q="SELECT `name` FROM `#__vikrentcar_categories` WHERE ";
				foreach($cat as $k=>$cc){
					if (!empty($cc)) {
						$validcats = true;
						$q.="`id`=".$dbo->quote($cc)." ";
						if ($cc!=end($cat) && !empty($cat[($k + 1)])) {
							$q.="OR ";
						}
					}
				}
				$q.=";";
				if($validcats) {
					$dbo->setQuery($q);
					$dbo->Query($q);
					$lines = $dbo->loadAssocList();
					if (is_array($lines)) {
						$categories = array();
						foreach($lines as $ll){
							$categories[]=$ll['name'];
						}
						$categories = implode(", ", $categories);
					}else {
						$categories="";
					}
				}else {
					$categories="";
				}
			}else {
				$categories="";
			}
			
			if (!empty($row['idcarat'])) {
				$tmpcarat=explode(";", $row['idcarat']);
				$caratteristiche=totElements($tmpcarat);
			}else {
				$caratteristiche="";
			}
			
			if (!empty($row['idopt'])) {
				$tmpopt=explode(";", $row['idopt']);
				$optionals=totElements($tmpopt);
			}else {
				$optionals="";
			}
			
			if (!empty($row['idplace'])) {
				$explace=explode(";", $row['idplace']);
				$q="SELECT `id`,`name` FROM `#__vikrentcar_places` WHERE `id`=".$dbo->quote($explace[0]).";";
				$dbo->setQuery($q);
				$dbo->Query($q);
				$lines = $dbo->loadAssocList();
				$luogo=$lines[0]['name'];
				if(@count($explace)>2){
					$luogo.=" ...";
				}
			}else {
				$luogo="";
			}
			
			?>
			<tr class="row<?php echo $kk; ?>">
				<td><input type="checkbox" id="cb<?php echo $i;?>" name="cid[]" value="<?php echo $row['id']; ?>" onclick="Joomla.isChecked(this.checked);"></td>
				<td><a href="index.php?option=com_vikrentcar&amp;task=calendar&amp;cid[]=<?php echo $row['id']; ?>"><?php echo $row['name']; ?></a></td>
				<td><?php echo $categories; ?></td>
				<td class="center"><?php echo $caratteristiche; ?></td>
				<td class="center"><?php echo $optionals; ?></td>
				<td><?php echo $luogo; ?></td>
				<td class="center"><?php echo $row['units']; ?></td>
                <td class="center"><a href="index.php?option=com_vikrentcar&amp;task=modavail&amp;cid[]=<?php echo $row['id']; ?>"><?php echo (intval($row['avail'])=="1" ? "<img src=\"".JURI::root()."administrator/components/com_vikrentcar/ok.png"."\" border=\"0\" title=\"".JText::_('VRMAKENOTAVAIL')."\"/>" : "<img src=\"".JURI::root()."administrator/components/com_vikrentcar/no.png"."\" border=\"0\" title=\"".JText::_('VRMAKENOTAVAIL')."\"/>"); ?></a></td>
			</tr>
              <?php
            $kk = 1 - $kk;
            unset($categories);
		}
		?>
		
		</table>
		<input type="hidden" name="option" value="<?php echo $option; ?>" />
		<?php
		if(defined('JVERSION') && version_compare(JVERSION, '1.6.0') < 0) {
			//Joomla 1.5
			
		}
		?>
		<input type="hidden" name="task" value="cars" />
		<input type="hidden" name="boxchecked" value="0" />
		<?php echo JHTML::_( 'form.token' ); ?>
		<?php echo $navbut; ?>
	</form>
	<?php
		}
	}
	
	function pViewStats ($rows, $option, $lim0="0", $navbut="") {
		if(empty($rows)){
			?>
			<p><?php echo JText::_('VRNOSTATSFOUND'); ?></p>
			<form action="index.php?option=com_vikrentcar" method="post" name="adminForm" id="adminForm">
			<input type="hidden" name="task" value="" />
			<input type="hidden" name="option" value="<?php echo $option; ?>" />
			</form>
			<?php
		}else{
		
		?>
   <div id="overDiv" style="position:absolute; visibility:hidden; z-index:1000;"></div>
	<script type="text/javascript" src="../includes/js/overlib_mini.js"></script>

	<form action="index.php?option=com_vikrentcar" method="post" name="adminForm" id="adminForm">
	<table cellpadding="4" cellspacing="0" border="0" width="100%" class="table table-striped">
		<thead>
		<tr>
			<th width="20">
				<input type="checkbox" onclick="Joomla.checkAll(this)" value="" name="checkall-toggle">
			</th>
			<th class="title left" width="150"><?php echo JText::_( 'VRPVIEWSTATSONE' ); ?></th>
			<th class="title left" width="150"><?php echo JText::_( 'VRPVIEWSTATSTWO' ); ?></th>
			<th class="title left" width="150"><?php echo JText::_( 'VRPVIEWSTATSTHREE' ); ?></th>
			<th class="title left" width="150"><?php echo JText::_( 'VRPVIEWSTATSFOUR' ); ?></th>
			<th class="title left" width="150"><?php echo JText::_( 'VRPVIEWSTATSFIVE' ); ?></th>
			<th class="title left" width="150"><?php echo JText::_( 'VRPVIEWSTATSSIX' ); ?></th>
			<th class="title left" width="150"><?php echo JText::_( 'VRPVIEWSTATSSEVEN' ); ?></th>
		</tr>
		</thead>
		<?php
		$nowdf = vikrentcar::getDateFormat(true);
		if ($nowdf=="%d/%m/%Y") {
			$df='d/m/Y';
		}elseif ($nowdf=="%m/%d/%Y") {
			$df='m/d/Y';
		}else {
			$df='Y/m/d';
		}
		$kk = 0;
		$i = 0;
		for ($i = 0, $n = count($rows); $i < $n; $i++) {
			$row = & $rows[$i];
			if(!empty($row['place'])) {
				$exp=explode(";", $row['place']);
				$place=vikrentcar::getPlaceName($exp[0]).(!empty($exp[1]) && $exp[0]!=$exp[1] ? " - ".vikrentcar::getPlaceName($exp[1]) : "");
			}else {
				$place="";
			}
			$cat=JText::_('VRANYTHING');
			if (!empty($row['cat'])) {
				$cat=($row['cat']=="all" ? JText::_('VRANYTHING') : vikrentcar::getCategoryName($row['cat']));
			}
			?>
			<tr class="row<?php echo $kk; ?>">
				<td><input type="checkbox" id="cb<?php echo $i;?>" name="cid[]" value="<?php echo $row['id']; ?>" onclick="Joomla.isChecked(this.checked);"></td>
				<td><?php echo date($df.' H:i:s', $row['ts']); ?></td>
				<td><?php echo $row['ip']; ?></td>
				<td><?php echo date($df.' H:i:s', $row['ritiro']); ?></td>
				<td><?php echo date($df.' H:i:s', $row['consegna']); ?></td>
                <td><?php echo $place; ?></td>
                <td><?php echo $cat; ?></td>
                <td><?php echo intval($row['res']); ?></td>
			</tr>
              <?php
            $kk = 1 - $kk;	
		}
		?>
		
		</table>
		<input type="hidden" name="option" value="<?php echo $option; ?>" />
		<?php
		if(defined('JVERSION') && version_compare(JVERSION, '1.6.0') < 0) {
			//Joomla 1.5
			
		}
		?>
		<input type="hidden" name="task" value="viewstats" />
		<input type="hidden" name="boxchecked" value="0" />
		<?php echo JHTML::_( 'form.token' ); ?>
		<?php echo $navbut; ?>
	</form>
	<?php
		}
	}
	
	function pViewOrders ($rows, $option, $lim0="0", $navbut="") {
		if(empty($rows)){
			?>
			<p><?php echo JText::_('VRNOORDERSFOUND'); ?></p>
			<form action="index.php?option=com_vikrentcar" method="post" name="adminForm" id="adminForm">
			<input type="hidden" name="task" value="" />
			<input type="hidden" name="option" value="<?php echo $option; ?>" />
			</form>
			<?php
		}else{
		
		?>
   <script language="JavaScript" type="text/javascript">
		function submitbutton(pressbutton) {
			var form = document.adminForm;
			if (pressbutton == 'removeorders') {
				if (confirm('<?php echo JText::_('VRJSDELORDER'); ?>?')){
					submitform( pressbutton );
					return;
				}else{
					return false;
				}
			}

			// do field validation
			try {
				document.adminForm.onsubmit();
			}
			catch(e){}
			submitform( pressbutton );
		}
</script>
   <div id="overDiv" style="position:absolute; visibility:hidden; z-index:1000;"></div>
	<script type="text/javascript" src="../includes/js/overlib_mini.js"></script>

	<form action="index.php?option=com_vikrentcar" method="post" name="adminForm" id="adminForm">
	<table cellpadding="4" cellspacing="0" border="0" width="100%" class="table table-striped">
		<thead>
		<tr>
			<th width="20">
				<input type="checkbox" onclick="Joomla.checkAll(this)" value="" name="checkall-toggle">
			</th>
			<th class="title center" width="20" align="center">ID</th>
			<th class="title left" width="110"><?php echo JText::_( 'VRPVIEWORDERSONE' ); ?></th>
			<th class="title left" width="200"><?php echo JText::_( 'VRPVIEWORDERSTWO' ); ?></th>
			<th class="title left" width="150"><?php echo JText::_( 'VRPVIEWORDERSTHREE' ); ?></th>
			<th class="title left" width="110"><?php echo JText::_( 'VRPVIEWORDERSFOUR' ); ?></th>
			<th class="title left" width="110"><?php echo JText::_( 'VRPVIEWORDERSFIVE' ); ?></th>
			<th class="title center" width="70" align="center"><?php echo JText::_( 'VRPVIEWORDERSSIX' ); ?></th>
			<th class="title center" width="110" align="center"><?php echo JText::_( 'VRPVIEWORDERSSEVEN' ); ?></th>
			<th class="title center" width="100" align="center"><?php echo JText::_( 'VRPVIEWORDERSEIGHT' ); ?></th>
		</tr>
		</thead>
		<?php
		$nowdf = vikrentcar::getDateFormat(true);
		if ($nowdf=="%d/%m/%Y") {
			$df='d/m/Y';
		}elseif ($nowdf=="%m/%d/%Y") {
			$df='m/d/Y';
		}else {
			$df='Y/m/d';
		}
		$dbo = & JFactory :: getDBO();
		$currencysymb=vikrentcar::getCurrencySymb(true);
		$kk = 0;
		$i = 0;
		for ($i = 0, $n = count($rows); $i < $n; $i++) {
			$row = & $rows[$i];
			$car=vikrentcar::getCarInfo($row['idcar']);
			$isdue=0;
			if (!empty($row['idtar'])) {
				if($row['hourly'] == 1) {
					$q="SELECT * FROM `#__vikrentcar_dispcosthours` WHERE `id`='".$row['idtar']."';";
				}else {
					$q="SELECT * FROM `#__vikrentcar_dispcost` WHERE `id`='".$row['idtar']."';";
				}
				$dbo->setQuery($q);
				$dbo->Query($q);
				if ($dbo->getNumRows() == 1) {
					$price = $dbo->loadAssocList();
					if($row['hourly'] == 1) {
						foreach($price as $kt => $vt) {
							$price[$kt]['days'] = 1;
						}
					}
					//vikrentcar 1.6
					$checkhourscharges = 0;
					$hoursdiff = 0;
					$ppickup = $row['ritiro'];
					$prelease = $row['consegna'];
					$secdiff = $prelease - $ppickup;
					$daysdiff = $secdiff / 86400;
					if (is_int($daysdiff)) {
						if ($daysdiff < 1) {
							$daysdiff = 1;
						}
					}else {
						if ($daysdiff < 1) {
							$daysdiff = 1;
							$checkhourly = true;
							$ophours = $secdiff / 3600;
							$hoursdiff = intval(round($ophours));
							if($hoursdiff < 1) {
								$hoursdiff = 1;
							}
						}else {
							$sum = floor($daysdiff) * 86400;
							$newdiff = $secdiff - $sum;
							$maxhmore = vikrentcar :: getHoursMoreRb() * 3600;
							if ($maxhmore >= $newdiff) {
								$daysdiff = floor($daysdiff);
							}else {
								$daysdiff = ceil($daysdiff);
								//vikrentcar 1.6
								$ehours = intval(round(($newdiff - $maxhmore) / 3600));
								$checkhourscharges = $ehours;
								if($checkhourscharges > 0) {
									$aehourschbasp = vikrentcar::applyExtraHoursChargesBasp();
								}
								//
							}
						}
					}
					if($checkhourscharges > 0 && $aehourschbasp == true) {
						$ret = vikrentcar::applyExtraHoursChargesCar($price, $row['idcar'], $checkhourscharges, $daysdiff, false, true, true);
						$price = $ret['return'];
						$calcdays = $ret['days'];
					}
					if($checkhourscharges > 0 && $aehourschbasp == false) {
						$price = vikrentcar::extraHoursSetPreviousFareCar($price, $row['idcar'], $checkhourscharges, $daysdiff, true);
						$price=vikrentcar::applySeasonsCar($price, $row['ritiro'], $row['consegna'], $row['idplace']);
						$ret = vikrentcar::applyExtraHoursChargesCar($price, $row['idcar'], $checkhourscharges, $daysdiff, true, true, true);
						$price = $ret['return'];
						$calcdays = $ret['days'];
					}else {
						$price=vikrentcar::applySeasonsCar($price, $row['ritiro'], $row['consegna'], $row['idplace']);
					}
					//
					$isdue+=vikrentcar::sayCostPlusIva($price[0]['cost'], $price[0]['idprice'], $row);
				}else {
					//there are no hourly prices
					if($row['hourly'] == 1) {
						$q="SELECT * FROM `#__vikrentcar_dispcost` WHERE `id`='".$row['idtar']."';";
						$dbo->setQuery($q);
						$dbo->Query($q);
						if ($dbo->getNumRows() == 1) {
							$price = $dbo->loadAssocList();
							$price=vikrentcar::applySeasonsCar($price, $row['ritiro'], $row['consegna'], $row['idplace']);
							$isdue+=vikrentcar::sayCostPlusIva($price[0]['cost'], $price[0]['idprice'], $row);
						}
					}
					//
				}
			}
			if (!empty($row['optionals'])) {
				$stepo=explode(";", $row['optionals']);
				foreach($stepo as $oo){
					if (!empty($oo)) {
						$stept=explode(":", $oo);
						$q="SELECT * FROM `#__vikrentcar_optionals` WHERE `id`='".$stept[0]."';";
						$dbo->setQuery($q);
						$dbo->Query($q);
						if ($dbo->getNumRows() == 1) {
							$popts = $dbo->loadAssocList();
							$realcost=(intval($popts[0]['perday'])==1 ? ($popts[0]['cost'] * $row['days'] * $stept[1]) : ($popts[0]['cost'] * $stept[1]));
							if($popts[0]['maxprice'] > 0 && $realcost > $popts[0]['maxprice']) {
								$realcost=$popts[0]['maxprice'];
								if(intval($popts[0]['hmany']) == 1 && intval($stept[1]) > 1) {
									$realcost = $popts[0]['maxprice'] * $stept[1];
								}
							}
							$isdue+=vikrentcar::sayOptionalsPlusIva($realcost, $popts[0]['idiva'], $row);
						}
					}
				}
			}
			if(!empty($row['idplace']) && !empty($row['idreturnplace'])) {
				$locfee=vikrentcar::getLocFee($row['idplace'], $row['idreturnplace']);
				if($locfee) {
					//VikRentCar 1.7 - Location fees overrides
					if (strlen($locfee['losoverride']) > 0) {
						$arrvaloverrides = array();
						$valovrparts = explode('_', $locfee['losoverride']);
						foreach($valovrparts as $valovr) {
							if (!empty($valovr)) {
								$ovrinfo = explode(':', $valovr);
								$arrvaloverrides[$ovrinfo[0]] = $ovrinfo[1];
							}
						}
						if (array_key_exists($row['days'], $arrvaloverrides)) {
							$locfee['cost'] = $arrvaloverrides[$row['days']];
						}
					}
					//end VikRentCar 1.7 - Location fees overrides
					$locfeecost=intval($locfee['daily']) == 1 ? ($locfee['cost'] * $row['days']) : $locfee['cost'];
					$locfeewith=vikrentcar::sayLocFeePlusIva($locfeecost, $locfee['idiva'], $row);
					$isdue+=$locfeewith;
				}
			}
			//vikrentcar 1.6 coupon
			$usedcoupon = false;
			$origisdue = $isdue;
			if(strlen($row['coupon']) > 0) {
				$usedcoupon = true;
				$expcoupon = explode(";", $row['coupon']);
				$isdue = $isdue - $expcoupon[1];
			}
			//
			?>
			<tr class="row<?php echo $kk; ?>">
				<td><input type="checkbox" id="cb<?php echo $i;?>" name="cid[]" value="<?php echo $row['id']; ?>" onclick="Joomla.isChecked(this.checked);"></td>
				<td class="center"><?php echo $row['id']; ?></td>
				<td><a href="index.php?option=com_vikrentcar&amp;task=editorder&amp;cid[]=<?php echo $row['id']; ?>"><?php echo date($df.' H:i', $row['ts']); ?></a></td>
				<td><?php echo (!empty($row['custdata']) ? substr($row['custdata'], 0, 45)." ..." : ""); ?></td>
				<td><?php echo $car['name']; ?></td>
				<td><?php echo date($df.' H:i', $row['ritiro']); ?></td>
				<td><?php echo date($df.' H:i', $row['consegna']); ?></td>
                <td class="center"><?php echo ($row['hourly'] == 1 && !empty($price[0]['hours']) ? $price[0]['hours'].' '.JText::_('VRCHOURS') : $row['days']); ?></td>
                <td class="center"><?php echo $currencysymb." ".vikrentcar::numberFormat($isdue).(!empty($row['totpaid']) ? " &nbsp;(".$currencysymb." ".vikrentcar::numberFormat($row['totpaid']).")" : ""); ?></td>
                <td class="center"><?php echo ($row['status']=="confirmed" ? "<span style=\"color: #4ca25a;\">".JText::_('VRCONFIRMED')."</span>" : "<span style=\"color: #ff0000;\">".JText::_('VRSTANDBY')."</span>"); ?></td>
			</tr>
              <?php
            $kk = 1 - $kk;
		}
		?>
		
		</table>
		<input type="hidden" name="option" value="<?php echo $option; ?>" />
		<?php
		if(defined('JVERSION') && version_compare(JVERSION, '1.6.0') < 0) {
			//Joomla 1.5
			
		}
		?>
		<input type="hidden" name="task" value="vieworders" />
		<input type="hidden" name="boxchecked" value="0" />
		<?php echo JHTML::_( 'form.token' ); ?>
		<?php echo $navbut; ?>
	</form>
	<?php
		}
	}

	function pViewOldOrders ($rows, $option, $lim0="0", $navbut="") {
		if(empty($rows)){
			?>
			<p><?php echo JText::_('VRNOOLDORDERSFOUND'); ?></p>
			<form action="index.php?option=com_vikrentcar" method="post" name="adminForm" id="adminForm">
			<input type="hidden" name="task" value="" />
			<input type="hidden" name="option" value="<?php echo $option; ?>" />
			</form>
			<?php
		}else{
		
		?>
   <div id="overDiv" style="position:absolute; visibility:hidden; z-index:1000;"></div>
	<script type="text/javascript" src="../includes/js/overlib_mini.js"></script>

	<form action="index.php?option=com_vikrentcar" method="post" name="adminForm" id="adminForm">
	<table cellpadding="4" cellspacing="0" border="0" width="100%" class="table table-striped">
		<thead>
		<tr>
			<th width="20">
				<input type="checkbox" onclick="Joomla.checkAll(this)" value="" name="checkall-toggle">
			</th>
			<th class="title left" width="110"><?php echo JText::_( 'VRPVIEWOLDORDERSTSDEL' ); ?></th>
			<th class="title left" width="110"><?php echo JText::_( 'VRPVIEWOLDORDERSONE' ); ?></th>
			<th class="title left" width="200"><?php echo JText::_( 'VRPVIEWOLDORDERSTWO' ); ?></th>
			<th class="title left" width="150"><?php echo JText::_( 'VRPVIEWOLDORDERSTHREE' ); ?></th>
			<th class="title left" width="110"><?php echo JText::_( 'VRPVIEWOLDORDERSFOUR' ); ?></th>
			<th class="title left" width="110"><?php echo JText::_( 'VRPVIEWOLDORDERSFIVE' ); ?></th>
			<th class="title center" width="70" align="center"><?php echo JText::_( 'VRPVIEWOLDORDERSSIX' ); ?></th>
			<th class="title center" width="110" align="center"><?php echo JText::_( 'VRPVIEWOLDORDERSSEVEN' ); ?></th>
			<th class="title center" width="100" align="center"><?php echo JText::_( 'VRPVIEWOLDORDERSEIGHT' ); ?></th>
		</tr>
		</thead>
		<?php
		$currencysymb=vikrentcar::getCurrencySymb(true);
		$nowdf = vikrentcar::getDateFormat(true);
		if ($nowdf=="%d/%m/%Y") {
			$df='d/m/Y';
		}elseif ($nowdf=="%m/%d/%Y") {
			$df='m/d/Y';
		}else {
			$df='Y/m/d';
		}
		$kk = 0;
		$i = 0;
		for ($i = 0, $n = count($rows); $i < $n; $i++) {
			$row = & $rows[$i];
			$car=vikrentcar::getCarInfo($row['idcar']);
			$dbo = & JFactory :: getDBO();
			$isdue=0;
			if (!empty($row['idtar'])) {
				if ($row['hourly'] == 1) {
					$q="SELECT * FROM `#__vikrentcar_dispcosthours` WHERE `id`='".$row['idtar']."';";
				}else {
					$q="SELECT * FROM `#__vikrentcar_dispcost` WHERE `id`='".$row['idtar']."';";
				}
				$dbo->setQuery($q);
				$dbo->Query($q);
				if ($dbo->getNumRows() == 1) {
					$price = $dbo->loadAssocList();
					if ($row['hourly'] == 1) {
						foreach($price as $kp => $kv) {
							$price[$kp]['days'] = 1;
						}
					}
					//vikrentcar 1.6
					$checkhourscharges = 0;
					$hoursdiff = 0;
					$ppickup = $row['ritiro'];
					$prelease = $row['consegna'];
					$secdiff = $prelease - $ppickup;
					$daysdiff = $secdiff / 86400;
					if (is_int($daysdiff)) {
						if ($daysdiff < 1) {
							$daysdiff = 1;
						}
					}else {
						if ($daysdiff < 1) {
							$daysdiff = 1;
							$checkhourly = true;
							$ophours = $secdiff / 3600;
							$hoursdiff = intval(round($ophours));
							if($hoursdiff < 1) {
								$hoursdiff = 1;
							}
						}else {
							$sum = floor($daysdiff) * 86400;
							$newdiff = $secdiff - $sum;
							$maxhmore = vikrentcar :: getHoursMoreRb() * 3600;
							if ($maxhmore >= $newdiff) {
								$daysdiff = floor($daysdiff);
							}else {
								$daysdiff = ceil($daysdiff);
								//vikrentcar 1.6
								$ehours = intval(round(($newdiff - $maxhmore) / 3600));
								$checkhourscharges = $ehours;
								if($checkhourscharges > 0) {
									$aehourschbasp = vikrentcar::applyExtraHoursChargesBasp();
								}
								//
							}
						}
					}
					if($checkhourscharges > 0 && $aehourschbasp == true) {
						$ret = vikrentcar::applyExtraHoursChargesCar($price, $row['idcar'], $checkhourscharges, $daysdiff, false, true, true);
						$price = $ret['return'];
						$calcdays = $ret['days'];
					}
					if($checkhourscharges > 0 && $aehourschbasp == false) {
						$price = vikrentcar::extraHoursSetPreviousFareCar($price, $row['idcar'], $checkhourscharges, $daysdiff, true);
						$price=vikrentcar::applySeasonsCar($price, $row['ritiro'], $row['consegna'], $row['idplace']);
						$ret = vikrentcar::applyExtraHoursChargesCar($price, $row['idcar'], $checkhourscharges, $daysdiff, true, true, true);
						$price = $ret['return'];
						$calcdays = $ret['days'];
					}else {
						$price=vikrentcar::applySeasonsCar($price, $row['ritiro'], $row['consegna'], $row['idplace']);
					}
					//
					$isdue+=vikrentcar::sayCostPlusIva($price[0]['cost'], $price[0]['idprice']);
				}else {
					//no ourly prices
					if ($row['hourly'] == 1) {
						$q="SELECT * FROM `#__vikrentcar_dispcost` WHERE `id`='".$row['idtar']."';";
						$dbo->setQuery($q);
						$dbo->Query($q);
						if ($dbo->getNumRows() == 1) {
							$price = $dbo->loadAssocList();
							$price=vikrentcar::applySeasonsCar($price, $row['ritiro'], $row['consegna'], $row['idplace']);
							$isdue+=vikrentcar::sayCostPlusIva($price[0]['cost'], $price[0]['idprice']);
						}
					}
				}
			}
			if (!empty($row['optionals'])) {
				$stepo=explode(";", $row['optionals']);
				foreach($stepo as $oo){
					if (!empty($oo)) {
						$stept=explode(":", $oo);
						$q="SELECT * FROM `#__vikrentcar_optionals` WHERE `id`='".$stept[0]."';";
						$dbo->setQuery($q);
						$dbo->Query($q);
						if ($dbo->getNumRows() == 1) {
							$popts = $dbo->loadAssocList();
							$realcost=(intval($popts[0]['perday'])==1 ? ($popts[0]['cost'] * $row['days'] * $stept[1]) : ($popts[0]['cost'] * $stept[1]));
							if($popts[0]['maxprice'] > 0 && $realcost > $popts[0]['maxprice']) {
								$realcost=$popts[0]['maxprice'];
								if(intval($popts[0]['hmany']) == 1 && intval($stept[1]) > 1) {
									$realcost = $popts[0]['maxprice'] * $stept[1];
								}
							}
							$isdue+=vikrentcar::sayOptionalsPlusIva($realcost, $popts[0]['idiva']);
						}
					}
				}
			}
			if(!empty($row['idplace']) && !empty($row['idreturnplace'])) {
				$locfee=vikrentcar::getLocFee($row['idplace'], $row['idreturnplace']);
				if($locfee) {
					//VikRentCar 1.7 - Location fees overrides
					if (strlen($locfee['losoverride']) > 0) {
						$arrvaloverrides = array();
						$valovrparts = explode('_', $locfee['losoverride']);
						foreach($valovrparts as $valovr) {
							if (!empty($valovr)) {
								$ovrinfo = explode(':', $valovr);
								$arrvaloverrides[$ovrinfo[0]] = $ovrinfo[1];
							}
						}
						if (array_key_exists($row['days'], $arrvaloverrides)) {
							$locfee['cost'] = $arrvaloverrides[$row['days']];
						}
					}
					//end VikRentCar 1.7 - Location fees overrides
					$locfeecost=intval($locfee['daily']) == 1 ? ($locfee['cost'] * $row['days']) : $locfee['cost'];
					$locfeewith=vikrentcar::sayLocFeePlusIva($locfeecost, $locfee['idiva']);
					$isdue+=$locfeewith;
				}
			}
			//vikrentcar 1.6 coupon
			$usedcoupon = false;
			$origisdue = $isdue;
			if(strlen($row['coupon']) > 0) {
				$usedcoupon = true;
				$expcoupon = explode(";", $row['coupon']);
				$isdue = $isdue - $expcoupon[1];
			}
			//
			?>
			<tr class="row<?php echo $kk; ?>">
				<td><input type="checkbox" id="cb<?php echo $i;?>" name="cid[]" value="<?php echo $row['id']; ?>" onclick="Joomla.isChecked(this.checked);"></td>
				<td><?php echo date($df.' H:i', $row['tsdel']); ?></td>
				<td><a href="index.php?option=com_vikrentcar&amp;task=editoldorder&amp;cid[]=<?php echo $row['id']; ?>"><?php echo date($df.' H:i', $row['ts']); ?></a></td>
				<td><?php echo (!empty($row['custdata']) ? substr($row['custdata'], 0, 45)." ..." : ""); ?></td>
				<td><?php echo $car['name']; ?></td>
				<td><?php echo date($df.' H:i', $row['ritiro']); ?></td>
				<td><?php echo date($df.' H:i', $row['consegna']); ?></td>
                <td class="center"><?php echo ($row['hourly'] == 1 && !empty($price[0]['hours']) ? $price[0]['hours'].' '.JText::_('VRCHOURS') : $row['days']); ?></td>
                <td class="center"><?php echo ($row['totpaid'] > 0 ? $currencysymb." ".vikrentcar::numberFormat($row['totpaid']) : $currencysymb." ".vikrentcar::numberFormat($isdue)); ?></td>
                <td class="center"><?php echo ($row['status']=="confirmed" ? "<span style=\"color: #4ca25a;\">".JText::_('VRCONFIRMED')."</span>" : "<span style=\"color: #ff0000;\">".JText::_('VRSTANDBY')."</span>"); ?></td>
			</tr>
              <?php
            $kk = 1 - $kk;
		}
		?>
		
		</table>
		<input type="hidden" name="option" value="<?php echo $option; ?>" />
		<?php
		if(defined('JVERSION') && version_compare(JVERSION, '1.6.0') < 0) {
			//Joomla 1.5
			
		}
		?>
		<input type="hidden" name="task" value="viewoldorders" />
		<input type="hidden" name="boxchecked" value="0" />
		<?php echo JHTML::_( 'form.token' ); ?>
		<?php echo $navbut; ?>
	</form>
	<?php
		}
	}
	
	function pViewPlaces ($rows, $option, $lim0="0", $navbut="") {
		if(empty($rows)){
			?>
			<p><?php echo JText::_('VRNOPLACESFOUND'); ?></p>
			<form action="index.php?option=com_vikrentcar" method="post" name="adminForm" id="adminForm">
			<input type="hidden" name="task" value="" />
			<input type="hidden" name="option" value="<?php echo $option; ?>" />
			</form>
			<?php
		}else{
		
		?>
   <script language="JavaScript" type="text/javascript">
function submitbutton(pressbutton) {
			var form = document.adminForm;
			if (pressbutton == 'removeplace') {
				if (confirm('<?php echo JText::_('VRJSDELPLACES'); ?> ?')){
					submitform( pressbutton );
					return;
				}else{
					return false;
				}
			}

			// do field validation
			try {
				document.adminForm.onsubmit();
			}
			catch(e){}
			submitform( pressbutton );
		}
</script>
   <div id="overDiv" style="position:absolute; visibility:hidden; z-index:1000;"></div>
	<script type="text/javascript" src="../includes/js/overlib_mini.js"></script>

	<form action="index.php?option=com_vikrentcar" method="post" name="adminForm" id="adminForm">
	<table cellpadding="4" cellspacing="0" border="0" width="100%" class="table table-striped">
		<thead>
		<tr>
			<th width="20">
				<input type="checkbox" onclick="Joomla.checkAll(this)" value="" name="checkall-toggle">
			</th>
			<th class="title left" width="150"><?php echo JText::_( 'VRPVIEWPLACESONE' ); ?></th>
			<th class="title center" width="150" align="center"><?php echo JText::_( 'VRCPLACELAT' ); ?></th>
			<th class="title center" width="150" align="center"><?php echo JText::_( 'VRCPLACELNG' ); ?></th>
			<th class="title left" width="150"><?php echo JText::_( 'VRCPLACEDESCR' ); ?></th>
			<th class="title center" width="150" align="center"><?php echo JText::_( 'VRCPLACEOPENTIME' ); ?></th>
		</tr>
		</thead>
		<?php

		$k = 0;
		$i = 0;
		for ($i = 0, $n = count($rows); $i < $n; $i++) {
			$row = & $rows[$i];
			$opentime = "";
			if(!empty($row['opentime'])) {
				$parts = explode("-", $row['opentime']);
				$openat=vikrentcar::getHoursMinutes($parts[0]);
				$closeat=vikrentcar::getHoursMinutes($parts[1]);
				$opentime = ((int)$openat[0] < 10 ? "0".$openat[0] : $openat[0]).":".((int)$openat[1] < 10 ? "0".$openat[1] : $openat[1])." - ".((int)$closeat[0] < 10 ? "0".$closeat[0] : $closeat[0]).":".((int)$closeat[1] < 10 ? "0".$closeat[1] : $closeat[1]);
			}
			?>
			<tr class="row<?php echo $k; ?>">
				<td><input type="checkbox" id="cb<?php echo $i;?>" name="cid[]" value="<?php echo $row['id']; ?>" onclick="Joomla.isChecked(this.checked);"></td>
				<td><a href="index.php?option=com_vikrentcar&amp;task=editplace&amp;cid[]=<?php echo $row['id']; ?>"><?php echo $row['name']; ?></a></td>
				<td class="center"><?php echo $row['lat']; ?></td>
				<td class="center"><?php echo $row['lng']; ?></td>
				<td><?php echo strip_tags($row['descr']); ?></td>
				<td class="center"><?php echo $opentime; ?></td>
			</tr>
              <?php
            $k = 1 - $k;
		}
		?>
		
		</table>
		<input type="hidden" name="option" value="<?php echo $option; ?>" />
		<?php
		if(defined('JVERSION') && version_compare(JVERSION, '1.6.0') < 0) {
			//Joomla 1.5
			
		}
		?>
		<input type="hidden" name="task" value="viewplaces" />
		<input type="hidden" name="boxchecked" value="0" />
		<?php echo JHTML::_( 'form.token' ); ?>
		<?php echo $navbut; ?>
	</form>
	<?php
		}
	}	
	
	function pViewIva ($rows, $option, $lim0="0", $navbut="") {
		if(empty($rows)){
			?>
			<p><?php echo JText::_('VRNOIVAFOUND'); ?></p>
			<form action="index.php?option=com_vikrentcar" method="post" name="adminForm" id="adminForm">
			<input type="hidden" name="task" value="" />
			<input type="hidden" name="option" value="<?php echo $option; ?>" />
			</form>
			<?php
		}else{
		
		?>
   <script language="JavaScript" type="text/javascript">
function submitbutton(pressbutton) {
			var form = document.adminForm;
			if (pressbutton == 'removeiva') {
				if (confirm('<?php echo JText::_('VRJSDELIVA'); ?> ?')){
					submitform( pressbutton );
					return;
				}else{
					return false;
				}
			}

			// do field validation
			try {
				document.adminForm.onsubmit();
			}
			catch(e){}
			submitform( pressbutton );
		}
</script>
   <div id="overDiv" style="position:absolute; visibility:hidden; z-index:1000;"></div>
	<script type="text/javascript" src="../includes/js/overlib_mini.js"></script>

	<form action="index.php?option=com_vikrentcar" method="post" name="adminForm" id="adminForm">
	<table cellpadding="4" cellspacing="0" border="0" width="100%" class="table table-striped">
		<thead>
		<tr>
			<th width="20">
				<input type="checkbox" onclick="Joomla.checkAll(this)" value="" name="checkall-toggle">
			</th>
			<th class="title left" width="150"><?php echo JText::_( 'VRPVIEWIVAONE' ); ?></th>
			<th class="title left" width="150"><?php echo JText::_( 'VRPVIEWIVATWO' ); ?></th>
		</tr>
		</thead>
		<?php

		$k = 0;
		$i = 0;
		for ($i = 0, $n = count($rows); $i < $n; $i++) {
			$row = & $rows[$i];
			?>
			<tr class="row<?php echo $k; ?>">
				<td><input type="checkbox" id="cb<?php echo $i;?>" name="cid[]" value="<?php echo $row['id']; ?>" onclick="Joomla.isChecked(this.checked);"></td>
				<td><?php echo $row['name']; ?></td>
				<td><?php echo $row['aliq']; ?></td>
			</tr>
              <?php
            $k = 1 - $k;
		}
		?>
		
		</table>
		<input type="hidden" name="option" value="<?php echo $option; ?>" />
		<?php
		if(defined('JVERSION') && version_compare(JVERSION, '1.6.0') < 0) {
			//Joomla 1.5
			
		}
		?>
		<input type="hidden" name="task" value="viewiva" />
		<input type="hidden" name="boxchecked" value="0" />
		<?php echo JHTML::_( 'form.token' ); ?>
		<?php echo $navbut; ?>
	</form>
	<?php
		}
	}
	
	function pViewCoupons ($rows, $option, $lim0="0", $navbut="") {
		if(empty($rows)){
			?>
			<p><?php echo JText::_('VRCNOCOUPONSFOUND'); ?></p>
			<form action="index.php?option=com_vikrentcar" method="post" name="adminForm" id="adminForm">
			<input type="hidden" name="task" value="" />
			<input type="hidden" name="option" value="<?php echo $option; ?>" />
			</form>
			<?php
		}else{
			
		?>
   <div id="overDiv" style="position:absolute; visibility:hidden; z-index:1000;"></div>
	<script type="text/javascript" src="../includes/js/overlib_mini.js"></script>

	<form action="index.php?option=com_vikrentcar" method="post" name="adminForm" id="adminForm">
	<table cellpadding="4" cellspacing="0" border="0" width="100%" class="table table-striped">
		<thead>
		<tr>
			<th width="20">
				<input type="checkbox" onclick="Joomla.checkAll(this)" value="" name="checkall-toggle">
			</th>
			<th class="title left" width="200"><?php echo JText::_( 'VRCPVIEWCOUPONSONE' ); ?></th>
			<th class="title center" width="200" align="center"><?php echo JText::_( 'VRCPVIEWCOUPONSTWO' ); ?></th>
			<th class="title center" width="100" align="center"><?php echo JText::_( 'VRCPVIEWCOUPONSTHREE' ); ?></th>
			<th class="title center" width="100" align="center"><?php echo JText::_( 'VRCPVIEWCOUPONSFOUR' ); ?></th>
			<th class="title center" width="100" align="center"><?php echo JText::_( 'VRCPVIEWCOUPONSFIVE' ); ?></th>
		</tr>
		</thead>
		<?php
		$currencysymb=vikrentcar::getCurrencySymb(true);
		$nowdf = vikrentcar::getDateFormat(true);
		if ($nowdf=="%d/%m/%Y") {
			$df='d/m/Y';
		}elseif ($nowdf=="%m/%d/%Y") {
			$df='m/d/Y';
		}else {
			$df='Y/m/d';
		}
		$k = 0;
		$i = 0;
		for ($i = 0, $n = count($rows); $i < $n; $i++) {
			$row = & $rows[$i];
			$strtype = $row['type'] == 1 ? JText::_('VRCCOUPONTYPEPERMANENT') : JText::_('VRCCOUPONTYPEGIFT');
			$strtype .= ", ".$row['value']." ".($row['percentot'] == 1 ? "%" : $currencysymb);
			$strdate = JText::_('VRCCOUPONALWAYSVALID');
			if(strlen($row['datevalid']) > 0) {
				$dparts = explode("-", $row['datevalid']);
				$strdate = date($df, $dparts[0])." - ".date($df, $dparts[1]);
			}
			$totvehicles = 0;
			if(intval($row['allvehicles']) == 0) {
				$allve = explode(";", $row['idcars']);
				foreach($allve as $fv) {
					if(!empty($fv)) {
						$totvehicles++;
					} 
				}
			}
			?>
			<tr class="row<?php echo $k; ?>">
				<td><input type="checkbox" id="cb<?php echo $i;?>" name="cid[]" value="<?php echo $row['id']; ?>" onclick="Joomla.isChecked(this.checked);"></td>
				<td><a href="index.php?option=com_vikrentcar&amp;task=editcoupon&amp;cid[]=<?php echo $row['id']; ?>"><?php echo $row['code']; ?></a></td>
				<td class="center"><?php echo $strtype; ?></td>
				<td class="center"><?php echo $strdate; ?></td>
				<td class="center"><?php echo intval($row['allvehicles']) == 1 ? JText::_('VRCCOUPONALLVEHICLES') : $totvehicles; ?></td>
				<td class="center"><?php echo $row['mintotord']; ?></td>
			</tr>	
              <?php
            $k = 1 - $k;
		}
		?>
		
		</table>
		<input type="hidden" name="option" value="<?php echo $option; ?>" />
		<?php
		if(defined('JVERSION') && version_compare(JVERSION, '1.6.0') < 0) {
			//Joomla 1.5
			
		}
		?>
		<input type="hidden" name="task" value="viewcoupons" />
		<input type="hidden" name="boxchecked" value="0" />
		<?php echo JHTML::_( 'form.token' ); ?>
		<?php echo $navbut; ?>
	</form>
	<?php
		}
	}
	

    
	function pViewCustomf ($rows, $option, $lim0="0", $navbut="") {
		if(empty($rows)){
			?>
			<p><?php echo JText::_('VRNOFIELDSFOUND'); ?></p>
			<form action="index.php?option=com_vikrentcar" method="post" name="adminForm" id="adminForm">
			<input type="hidden" name="task" value="" />
			<input type="hidden" name="option" value="<?php echo $option; ?>" />
			</form>
			<?php
		}else{
		
		?>
   <div id="overDiv" style="position:absolute; visibility:hidden; z-index:1000;"></div>
	<script type="text/javascript" src="../includes/js/overlib_mini.js"></script>

	<form action="index.php?option=com_vikrentcar" method="post" name="adminForm" id="adminForm">
	<table cellpadding="4" cellspacing="0" border="0" width="100%" class="table table-striped">
		<thead>
		<tr>
			<th width="20">
				<input type="checkbox" onclick="Joomla.checkAll(this)" value="" name="checkall-toggle">
			</th>
			<th class="title center" width="50" align="center">ID</th>
			<th class="title left" width="200"><?php echo JText::_( 'VRPVIEWCUSTOMFONE' ); ?></th>
			<th class="title left" width="200"><?php echo JText::_( 'VRPVIEWCUSTOMFTWO' ); ?></th>
			<th class="title center" width="100" align="center"><?php echo JText::_( 'VRPVIEWCUSTOMFTHREE' ); ?></th>
			<th class="title center" width="100" align="center"><?php echo JText::_( 'VRPVIEWCUSTOMFFOUR' ); ?></th>
			<th class="title center" width="100" align="center"><?php echo JText::_( 'VRPVIEWCUSTOMFFIVE' ); ?></th>
		</tr>
		</thead>
		<?php

		$k = 0;
		$i = 0;
		for ($i = 0, $n = count($rows); $i < $n; $i++) {
			$row = & $rows[$i];
			?>
			<tr class="row<?php echo $k; ?>">
				<td><input type="checkbox" id="cb<?php echo $i;?>" name="cid[]" value="<?php echo $row['id']; ?>" onclick="Joomla.isChecked(this.checked);"></td>
				<td class="center"><?php echo $row['id']; ?></td>
				<td><a href="index.php?option=com_vikrentcar&amp;task=editcustomf&amp;cid[]=<?php echo $row['id']; ?>"><?php echo JText::_($row['name']); ?></a></td>
				<td><?php echo ucwords($row['type']); ?></td>
				<td class="center"><?php echo intval($row['required']) == 1 ? "<img src=\"".JURI::root()."administrator/components/com_vikrentcar/ok.png\"/>" : "<img src=\"".JURI::root()."administrator/components/com_vikrentcar/no.png\"/>"; ?></td>
				<td class="center"><a href="index.php?option=com_vikrentcar&amp;task=sortfield&amp;cid[]=<?php echo $row['id']; ?>&amp;mode=up"><img src="<?php echo JURI::root(); ?>administrator/components/com_vikrentcar/up.png" border="0"/></a> <a href="index.php?option=com_vikrentcar&amp;task=sortfield&amp;cid[]=<?php echo $row['id']; ?>&amp;mode=down"><img src="<?php echo JURI::root(); ?>administrator/components/com_vikrentcar/down.png" border="0"/></a></td>
				<td class="center"><?php echo intval($row['isemail']) == 1 ? "<img src=\"".JURI::root()."administrator/components/com_vikrentcar/ok.png\"/>" : "<img src=\"".JURI::root()."administrator/components/com_vikrentcar/no.png\"/>"; ?></td>
			</tr>	
              <?php
            $k = 1 - $k;
		}
		?>
		
		</table>
		<input type="hidden" name="option" value="<?php echo $option; ?>" />
		<?php
		if(defined('JVERSION') && version_compare(JVERSION, '1.6.0') < 0) {
			//Joomla 1.5
			
		}
		?>
		<input type="hidden" name="task" value="viewcustomf" />
		<input type="hidden" name="boxchecked" value="0" />
		<?php echo JHTML::_( 'form.token' ); ?>
		<?php echo $navbut; ?>
	</form>
	<?php
		}
	}
	
	function pViewCategories ($rows, $option, $lim0="0", $navbut="") {
		if(empty($rows)){
			?>
			<p><?php echo JText::_('VRNOCATEGORIESFOUND'); ?></p>
			<form action="index.php?option=com_vikrentcar" method="post" name="adminForm" id="adminForm">
			<input type="hidden" name="task" value="" />
			<input type="hidden" name="option" value="<?php echo $option; ?>" />
			</form>
			<?php
		}else{
		
		?>
   <script language="JavaScript" type="text/javascript">
function submitbutton(pressbutton) {
			var form = document.adminForm;
			if (pressbutton == 'removecat') {
				if (confirm('<?php echo JText::_('VRJSDELCATEGORIES'); ?> ?')){
					submitform( pressbutton );
					return;
				}else{
					return false;
				}
			}

			// do field validation
			try {
				document.adminForm.onsubmit();
			}
			catch(e){}
			submitform( pressbutton );
		}
</script>
   <div id="overDiv" style="position:absolute; visibility:hidden; z-index:1000;"></div>
	<script type="text/javascript" src="../includes/js/overlib_mini.js"></script>

	<form action="index.php?option=com_vikrentcar" method="post" name="adminForm" id="adminForm">
	<table cellpadding="4" cellspacing="0" border="0" width="100%" class="table table-striped">
		<thead>
		<tr>
			<th width="20">
				<input type="checkbox" onclick="Joomla.checkAll(this)" value="" name="checkall-toggle">
			</th>
			<th class="title left" width="150"><?php echo JText::_( 'VRPVIEWCATEGORIESONE' ); ?></th>
			<th class="title left" width="150"><?php echo JText::_( 'VRPVIEWCATEGORIESDESCR' ); ?></th>
		</tr>
		</thead>
		<?php

		$k = 0;
		$i = 0;
		for ($i = 0, $n = count($rows); $i < $n; $i++) {
			$row = & $rows[$i];
			?>
			<tr class="row<?php echo $k; ?>">
				<td><input type="checkbox" id="cb<?php echo $i;?>" name="cid[]" value="<?php echo $row['id']; ?>" onclick="Joomla.isChecked(this.checked);"></td>
				<td><a href="index.php?option=com_vikrentcar&amp;task=editcat&amp;cid[]=<?php echo $row['id']; ?>"><?php echo $row['name']; ?></a></td>
				<td><?php echo strip_tags($row['descr']); ?></td>
			</tr>
              <?php
            $k = 1 - $k;
		}
		?>
		
		</table>
		<input type="hidden" name="option" value="<?php echo $option; ?>" />
		<?php
		if(defined('JVERSION') && version_compare(JVERSION, '1.6.0') < 0) {
			//Joomla 1.5
			
		}
		?>
		<input type="hidden" name="task" value="viewcategories" />
		<input type="hidden" name="boxchecked" value="0" />
		<?php echo JHTML::_( 'form.token' ); ?>
		<?php echo $navbut; ?>
	</form>
	<?php
		}
	}
	
	function pViewCarat ($rows, $option, $lim0="0", $navbut="") {
		if(empty($rows)){
			?>
			<p><?php echo JText::_('VRNOCARATFOUND'); ?></p>
			<form action="index.php?option=com_vikrentcar" method="post" name="adminForm" id="adminForm">
			<input type="hidden" name="task" value="" />
			<input type="hidden" name="option" value="<?php echo $option; ?>" />
			</form>
			<?php
		}else{
		
		?>
   <script language="JavaScript" type="text/javascript">
function submitbutton(pressbutton) {
			var form = document.adminForm;
			if (pressbutton == 'removecarat') {
				if (confirm('<?php echo JText::_('VRJSDELCARAT'); ?> ?')){
					submitform( pressbutton );
					return;
				}else{
					return false;
				}
			}

			// do field validation
			try {
				document.adminForm.onsubmit();
			}
			catch(e){}
			submitform( pressbutton );
		}
</script>
   <div id="overDiv" style="position:absolute; visibility:hidden; z-index:1000;"></div>
	<script type="text/javascript" src="../includes/js/overlib_mini.js"></script>

	<form action="index.php?option=com_vikrentcar" method="post" name="adminForm" id="adminForm">
	<table cellpadding="4" cellspacing="0" border="0" width="100%" class="table table-striped">
		<thead>
		<tr>
			<th width="20">
				<input type="checkbox" onclick="Joomla.checkAll(this)" value="" name="checkall-toggle">
			</th>
			<th class="title left" width="150"><?php echo JText::_( 'VRPVIEWCARATONE' ); ?></th>
			<th class="title left" width="150"><?php echo JText::_( 'VRPVIEWCARATTWO' ); ?></th>
			<th class="title left" width="150"><?php echo JText::_( 'VRPVIEWCARATTHREE' ); ?></th>
			<th class="title center" width="100" align="center"><?php echo JText::_( 'VRCORDERING' ); ?></th>
		</tr>
		</thead>
		<?php

		$k = 0;
		$i = 0;
		for ($i = 0, $n = count($rows); $i < $n; $i++) {
			$row = & $rows[$i];
			?>
			<tr class="row<?php echo $k; ?>">
				<td><input type="checkbox" id="cb<?php echo $i;?>" name="cid[]" value="<?php echo $row['id']; ?>" onclick="Joomla.isChecked(this.checked);"></td>
				<td><a href="index.php?option=com_vikrentcar&amp;task=editcarat&amp;cid[]=<?php echo $row['id']; ?>"><?php echo $row['name']; ?></a></td>
				<td>
				<?php 
					echo (file_exists('./components/com_vikrentcar/resources/'.$row['icon']) ? "<span>".$row['icon']." &nbsp;&nbsp;<img align=\"middle\" src=\"./components/com_vikrentcar/resources/".$row['icon']."\"/></span>" : $row['icon']); 
				?>
				</td>
				<td><?php echo $row['textimg']; ?></td>
				<td class="center"><a href="index.php?option=com_vikrentcar&amp;task=sortcarat&amp;cid[]=<?php echo $row['id']; ?>&amp;mode=up"><img src="<?php echo JURI::root(); ?>administrator/components/com_vikrentcar/up.png" border="0"/></a> <a href="index.php?option=com_vikrentcar&amp;task=sortcarat&amp;cid[]=<?php echo $row['id']; ?>&amp;mode=down"><img src="<?php echo JURI::root(); ?>administrator/components/com_vikrentcar/down.png" border="0"/></a></td>
			</tr>
              <?php
            $k = 1 - $k;
		}
		?>
		
		</table>
		<input type="hidden" name="option" value="<?php echo $option; ?>" />
		<?php
		if(defined('JVERSION') && version_compare(JVERSION, '1.6.0') < 0) {
			//Joomla 1.5
			
		}
		?>
		<input type="hidden" name="task" value="viewcarat" />
		<input type="hidden" name="boxchecked" value="0" />
		<?php echo JHTML::_( 'form.token' ); ?>
		<?php echo $navbut; ?>
	</form>
	<?php
		}
	}
	
	function pViewOptionals ($rows, $option, $lim0="0", $navbut="") {
		if(empty($rows)){
			?>
			<p><?php echo JText::_('VRNOOPTIONALSFOUND'); ?></p>
			<form action="index.php?option=com_vikrentcar" method="post" name="adminForm" id="adminForm">
			<input type="hidden" name="task" value="" />
			<input type="hidden" name="option" value="<?php echo $option; ?>" />
			</form>
			<?php
		}else{
		
		?>
   <script language="JavaScript" type="text/javascript">
function submitbutton(pressbutton) {
			var form = document.adminForm;
			if (pressbutton == 'removeoptionals') {
				if (confirm('<?php echo JText::_('VRJSDELOPTIONALS'); ?> ?')){
					submitform( pressbutton );
					return;
				}else{
					return false;
				}
			}

			// do field validation
			try {
				document.adminForm.onsubmit();
			}
			catch(e){}
			submitform( pressbutton );
		}
</script>
   <div id="overDiv" style="position:absolute; visibility:hidden; z-index:1000;"></div>
	<script type="text/javascript" src="../includes/js/overlib_mini.js"></script>

	<form action="index.php?option=com_vikrentcar" method="post" name="adminForm" id="adminForm">
	<table cellpadding="4" cellspacing="0" border="0" width="100%" class="table table-striped">
		<thead>
		<tr>
			<th width="20">
				<input type="checkbox" onclick="Joomla.checkAll(this)" value="" name="checkall-toggle">
			</th>
			<th class="title left" width="150"><?php echo JText::_( 'VRPVIEWOPTIONALSONE' ); ?></th>
			<th class="title left" width="150"><?php echo JText::_( 'VRPVIEWOPTIONALSTWO' ); ?></th>
			<th class="title center" align="center" width="75"><?php echo JText::_( 'VRPVIEWOPTIONALSTHREE' ); ?></th>
			<th class="title center" align="center" width="75"><?php echo JText::_( 'VRPVIEWOPTIONALSFOUR' ); ?></th>
			<th class="title center" align="center" width="75"><?php echo JText::_( 'VRPVIEWOPTIONALSEIGHT' ); ?></th>
			<th class="title center" align="center" width="150"><?php echo JText::_( 'VRPVIEWOPTIONALSFIVE' ); ?></th>
			<th class="title center" align="center" width="150"><?php echo JText::_( 'VRPVIEWOPTIONALSSIX' ); ?></th>
			<th class="title left" width="150"><?php echo JText::_( 'VRPVIEWOPTIONALSSEVEN' ); ?></th>
			<th class="title center" width="60" align="center"><?php echo JText::_( 'VRCORDERING' ); ?></th>
		</tr>
		</thead>
		<?php

		$k = 0;
		$i = 0;
		for ($i = 0, $n = count($rows); $i < $n; $i++) {
			$row = & $rows[$i];
			?>
			<tr class="row<?php echo $k; ?>">
				<td><input type="checkbox" id="cb<?php echo $i;?>" name="cid[]" value="<?php echo $row['id']; ?>" onclick="Joomla.isChecked(this.checked);"></td>
				<td><a href="index.php?option=com_vikrentcar&amp;task=editoptional&amp;cid[]=<?php echo $row['id']; ?>"><?php echo $row['name']; ?></a></td>
				<td><?php echo (strlen($row['descr'])>150 ? substr($row['descr'], 0, 150) : $row['descr']); ?></td>
				<td class="center"><?php echo $row['cost']; ?></td>
				<td class="center"><?php echo vikrentcar::getAliq($row['idiva']); ?>%</td>
				<td class="center"><?php echo $row['maxprice']; ?></td>
				<td class="center"><?php echo (intval($row['perday'])==1 ? "Y" : "N"); ?></td>
				<td class="center"><?php echo (intval($row['hmany'])==1 ? "&gt; 1" : "1"); ?></td>
				<td><?php echo (file_exists('./components/com_vikrentcar/resources/'.$row['img']) ? "<span>".$row['img']." &nbsp;&nbsp;<img align=\"middle\" class=\"maxfifty\" src=\"./components/com_vikrentcar/resources/".$row['img']."\"/></span>" : ""); ?></td>
				<td class="center"><a href="index.php?option=com_vikrentcar&amp;task=sortoptional&amp;cid[]=<?php echo $row['id']; ?>&amp;mode=up"><img src="<?php echo JURI::root(); ?>administrator/components/com_vikrentcar/up.png" border="0"/></a> <a href="index.php?option=com_vikrentcar&amp;task=sortoptional&amp;cid[]=<?php echo $row['id']; ?>&amp;mode=down"><img src="<?php echo JURI::root(); ?>administrator/components/com_vikrentcar/down.png" border="0"/></a></td>
			</tr>
              <?php
			$k = 1 - $k;
		}
		?>
		
		</table>
		<input type="hidden" name="option" value="<?php echo $option; ?>" />
		<?php
		if(defined('JVERSION') && version_compare(JVERSION, '1.6.0') < 0) {
			//Joomla 1.5
			
		}
		?>
		<input type="hidden" name="task" value="viewoptionals" />
		<input type="hidden" name="boxchecked" value="0" />
		<?php echo JHTML::_( 'form.token' ); ?>
		<?php echo $navbut; ?>
	</form>
	<?php
		}
	}
	
	function pViewPrices ($rows, $option, $lim0="0", $navbut="") {
		if(empty($rows)){
			?>
			<p><?php echo JText::_('VRNOPRICESFOUND'); ?></p>
			<form action="index.php?option=com_vikrentcar" method="post" name="adminForm" id="adminForm">
			<input type="hidden" name="task" value="" />
			<input type="hidden" name="option" value="<?php echo $option; ?>" />
			</form>
			<?php
		}else{
		
		?>
   <script language="JavaScript" type="text/javascript">
function submitbutton(pressbutton) {
			var form = document.adminForm;
			if (pressbutton == 'removeprice') {
				if (confirm('<?php echo JText::_('VRJSDELPRICES'); ?>')){
					submitform( pressbutton );
					return;
				}else{
					return false;
				}
			}

			// do field validation
			try {
				document.adminForm.onsubmit();
			}
			catch(e){}
			submitform( pressbutton );
		}
</script>
   <div id="overDiv" style="position:absolute; visibility:hidden; z-index:1000;"></div>
	<script type="text/javascript" src="../includes/js/overlib_mini.js"></script>

	<form action="index.php?option=com_vikrentcar" method="post" name="adminForm" id="adminForm">
	<table cellpadding="4" cellspacing="0" border="0" width="100%" class="table table-striped">
		<thead>
		<tr>
			<th width="20">
				<input type="checkbox" onclick="Joomla.checkAll(this)" value="" name="checkall-toggle">
			</th>
			<th class="title left" width="150"><?php echo JText::_( 'VRPVIEWPRICESONE' ); ?></th>
			<th class="title left" width="150"><?php echo JText::_( 'VRPVIEWPRICESTWO' ); ?></th>
			<th class="title left" width="75"><?php echo JText::_( 'VRPVIEWPRICESTHREE' ); ?></th>
		</tr>
		</thead>
		<?php

		$k = 0;
		$i = 0;
		for ($i = 0, $n = count($rows); $i < $n; $i++) {
			$row = & $rows[$i];
			?>
			<tr class="row<?php echo $k; ?>">
				<td><input type="checkbox" id="cb<?php echo $i;?>" name="cid[]" value="<?php echo $row['id']; ?>" onclick="Joomla.isChecked(this.checked);"></td>
				<td><?php echo $row['name']; ?></td>
				<td><?php echo $row['attr']; ?></td>
				<td><?php echo vikrentcar::getAliq($row['idiva']); ?>%</td>
			</tr>
              <?php
            $k = 1 - $k;
		}
		?>
		
		</table>
		<input type="hidden" name="option" value="<?php echo $option; ?>" />
		<?php
		if(defined('JVERSION') && version_compare(JVERSION, '1.6.0') < 0) {
			//Joomla 1.5
			
		}
		?>
		<input type="hidden" name="task" value="viewprices" />
		<input type="hidden" name="boxchecked" value="0" />
		<?php echo JHTML::_( 'form.token' ); ?>
		<?php echo $navbut; ?>
	</form>
	<?php
		}
	}
		
	function pEditBusy ($busy, $ord, $car, $option) {
		//VikRentCar 1.7
		$pstandbyquick = JRequest :: getString('standbyquick', '', 'request');
		$pstandbyquick = $pstandbyquick == "1" ? 1 : 0;
		$pnotifycust = JRequest :: getString('notifycust', '', 'request');
		$pnotifycust = $pnotifycust == "1" ? 1 : 0;
		//
		$currencysymb=vikrentcar::getCurrencySymb(true);
		JHTML::_('behavior.calendar');
		$nowdf = vikrentcar::getDateFormat(true);
		if ($nowdf=="%d/%m/%Y") {
			$rit=date('d/m/Y', $busy['ritiro']);
			$con=date('d/m/Y', $busy['consegna']);
			$df='d/m/Y';
		}elseif ($nowdf=="%m/%d/%Y") {
			$rit=date('m/d/Y', $busy['ritiro']);
			$con=date('m/d/Y', $busy['consegna']);
			$df='m/d/Y';
		}else {
			$rit=date('Y/m/d', $busy['ritiro']);
			$con=date('Y/m/d', $busy['consegna']);
			$df='Y/m/d';
		}
		$arit=getdate($busy['ritiro']);
		$acon=getdate($busy['consegna']);
		for($i=0; $i < 24; $i++){
			$ritho.="<option value=\"".$i."\"".($arit['hours']==$i ? " selected=\"selected\"" : "").">".($i < 10 ? "0".$i : $i)."</option>\n";
			$conho.="<option value=\"".$i."\"".($acon['hours']==$i ? " selected=\"selected\"" : "").">".($i < 10 ? "0".$i : $i)."</option>\n";
		}
		for($i=0; $i < 60; $i++){
			$ritmi.="<option value=\"".$i."\"".($arit['minutes']==$i ? " selected=\"selected\"" : "").">".($i < 10 ? "0".$i : $i)."</option>\n";
			$conmi.="<option value=\"".$i."\"".($acon['minutes']==$i ? " selected=\"selected\"" : "").">".($i < 10 ? "0".$i : $i)."</option>\n";
		}
		//vikrentcar 1.5
		if($ord[0]['hourly'] == 1) {
			$secdiff = $busy['consegna'] - $busy['ritiro'];
			$daysdiff = $secdiff / 86400;
			if (is_int($daysdiff)) {
				if ($daysdiff < 1) {
					$daysdiff = 1;
				}
			} else {
				if ($daysdiff < 1) {
					$daysdiff = 1;
					$checkhourly = true;
					$ophours = $secdiff / 3600;
					$hoursdiff = intval(round($ophours));
					if($hoursdiff < 1) {
						$hoursdiff = 1;
					}
				}
			}
		}
		//
		//vikrentcar 1.6
		if(is_array($ord)) {
			$checkhourscharges = 0;
			$ppickup = $ord[0]['ritiro'];
			$prelease = $ord[0]['consegna'];
			$secdiff = $prelease - $ppickup;
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
					$maxhmore = vikrentcar :: getHoursMoreRb() * 3600;
					if ($maxhmore >= $newdiff) {
						$daysdiff = floor($daysdiff);
					}else {
						$daysdiff = ceil($daysdiff);
						//vikrentcar 1.6
						$ehours = intval(round(($newdiff - $maxhmore) / 3600));
						$checkhourscharges = $ehours;
						if($checkhourscharges > 0) {
							$aehourschbasp = vikrentcar::applyExtraHoursChargesBasp();
						}
						//
					}
				}
			}
		}
		//
		?>
		<script language="JavaScript" type="text/javascript">
		function submitbutton(pressbutton) {
			var form = document.adminForm;
			if (pressbutton == 'removebusy') {
				if (confirm('<?php echo JText::_('VRJSDELBUSY'); ?> ?')){
					submitform( pressbutton );
					return;
				}else{
					return false;
				}
			}

			// do field validation
			try {
				document.adminForm.onsubmit();
			}
			catch(e){}
			submitform( pressbutton );
		}
		</script>
		<form name="adminForm" action="index.php" method="post" id="adminForm">
		<?php if(!is_array($ord)){ ?>
		<p><?php echo JText::_('VRPEDITBUSYONE'); ?></p>	
		<?php }else{ ?>
		<p><strong><?php echo JText::_('VRPEDITBUSYORDERNUMBER'); ?></strong>: <?php echo $ord[0]['id']; ?> - <strong><?php echo JText::_('VRPEDITBUSYTWO'); ?></strong>: <?php echo date($df.' H:i', $ord[0]['ts']); ?> - <strong><?php echo JText::_('VRPEDITBUSYTHREE'); ?> <?php echo ($ord[0]['days']==1 ? "1 ".JText::_('VRDAY') : $ord[0]['days']." ".JText::_('VRDAYS')); ?></strong></p>
		<?php
			echo '<strong>'.JText::_('VRCUSTINFO').'</strong>:<br/>'.(!empty($ord[0]['custdata']) ? "<textarea name=\"custdata\" rows=\"5\" cols=\"50\">".$ord[0]['custdata']."</textarea>" : "<textarea name=\"custdata\" rows=\"5\" cols=\"50\"></textarea>");
			echo '<br/><br/><strong>'.JText::_('VRQRCUSTMAIL').'</strong>: <input type="text" name="custmail" value="'.$ord[0]['custmail'].'" size="30"/>'; 
			} ?>	
		<table class="adminform">
		<tr><td width="150">&bull; <b><?php echo JText::_('VRPEDITBUSYFOUR'); ?>:</b> </td><td><?php echo JHTML::_('calendar', '', 'pickupdate', 'pickupdate', vikrentcar::getDateFormat(true), array('class'=>'', 'size'=>'10',  'maxlength'=>'19')); ?> <?php echo JText::_('VRPEDITBUSYFIVE'); ?> <select name="pickuph"><?php echo $ritho; ?></select> <select name="pickupm"><?php echo $ritmi; ?></select></td></tr>
		<tr><td>&bull; <b><?php echo JText::_('VRPEDITBUSYSIX'); ?>:</b> </td><td><?php echo JHTML::_('calendar', '', 'releasedate', 'releasedate', vikrentcar::getDateFormat(true), array('class'=>'', 'size'=>'10',  'maxlength'=>'19')); ?> <?php echo JText::_('VRPEDITBUSYFIVE'); ?> <select name="releaseh"><?php echo $conho; ?></select> <select name="releasem"><?php echo $conmi; ?></select></td></tr>
		<?php
		if (is_array($ord) && !empty($ord[0]['idtar'])) {
			$dbo = & JFactory :: getDBO();
			//vikrentcar 1.5
			if($ord[0]['hourly'] == 1) {
				$q="SELECT * FROM `#__vikrentcar_dispcosthours` WHERE `hours`='".$hoursdiff."' AND `idcar`='".$ord[0]['idcar']."' ORDER BY `#__vikrentcar_dispcosthours`.`cost` ASC;";
			}else {
				$q="SELECT * FROM `#__vikrentcar_dispcost` WHERE `days`='".$ord[0]['days']."' AND `idcar`='".$ord[0]['idcar']."' ORDER BY `#__vikrentcar_dispcost`.`cost` ASC;";
			}
			//
			$dbo->setQuery($q);
			$dbo->Query($q);
			$tottars = $dbo->getNumRows();
			$proceedtars = false;
			if ($tottars == 0) {
				if($ord[0]['hourly'] == 1) {
					//there are no hourly prices
					$q="SELECT * FROM `#__vikrentcar_dispcost` WHERE `days`='".$ord[0]['days']."' AND `idcar`='".$ord[0]['idcar']."' ORDER BY `#__vikrentcar_dispcost`.`cost` ASC;";
					$dbo->setQuery($q);
					$dbo->Query($q);
					if($dbo->getNumRows() > 0) {
						$proceedtars = true;
					}
				}
			}else {
				$proceedtars = true;
			}
			if ($proceedtars) {
				$tars = $dbo->loadAssocList();
				//vikrentcar 1.5
				if($ord[0]['hourly'] == 1) {
					foreach($tars as $kt => $vt) {
						$tars[$kt]['days'] = 1;
					}
				}
				//
				//vikrentcar 1.6
				if($checkhourscharges > 0 && $aehourschbasp == true) {
					$ret = vikrentcar::applyExtraHoursChargesCar($tars, $ord[0]['idcar'], $checkhourscharges, $daysdiff, false, true, true);
					$tars = $ret['return'];
					$calcdays = $ret['days'];
				}
				if($checkhourscharges > 0 && $aehourschbasp == false) {
					$tars = vikrentcar::extraHoursSetPreviousFareCar($tars, $ord[0]['idcar'], $checkhourscharges, $daysdiff, true);
					$tars = vikrentcar :: applySeasonsCar($tars, $ord[0]['ritiro'], $ord[0]['consegna'], $ord[0]['idplace']);
					$ret = vikrentcar::applyExtraHoursChargesCar($tars, $ord[0]['idcar'], $checkhourscharges, $daysdiff, true, true, true);
					$tars = $ret['return'];
					$calcdays = $ret['days'];
				}else {
					$tars = vikrentcar :: applySeasonsCar($tars, $ord[0]['ritiro'], $ord[0]['consegna'], $ord[0]['idplace']);
				}
				//
				//$tars=vikrentcar::applySeasonsCar($tars, $busy['ritiro'], $busy['consegna'], $ord[0]['idplace']);
				?>
				<tr><td colspan="2">&bull; <b><u><?php echo JText::_('VRPEDITBUSYSEVEN'); ?></u>:</b></td></tr>
				<input type="hidden" name="areprices" value="yes"/>
				<?php
				foreach($tars as $k=>$t){
					if ($t['id']==$ord[0]['idtar']) {
						$acttar=$k;
					}
				?>
				<tr><td><label for="pid<?php echo $t['idprice']; ?>"><?php echo vikrentcar::getPriceName($t['idprice']).": ".$currencysymb." ".vikrentcar::sayCostPlusIva($t['cost'], $t['idprice'], $ord[0]).(strlen($t['attrdata']) ? "<br/>".vikrentcar::getPriceAttr($t['idprice']).": ".$t['attrdata'] : ""); ?></label></td><td><input type="radio" name="priceid" id="pid<?php echo $t['idprice']; ?>" value="<?php echo $t['idprice']; ?>"<?php echo ($t['id']==$ord[0]['idtar'] ? " checked=\"checked\"" : ""); ?>/></td></tr>
				<?php }
				if(!empty($car['idopt'])){
					$optionals=vikrentcar::getCarOptionals($car['idopt']);
					if (is_array($optionals)) {
						if (!empty($ord[0]['optionals'])) {
							$haveopt=explode(";", $ord[0]['optionals']);
							foreach($haveopt as $ho){
								if (!empty($ho)) {
									$havetwo=explode(":", $ho);
									$arropt[$havetwo[0]]=$havetwo[1];
								}
							}
						}else {
							$arropt[]="";
						}
						
						?>
						<tr><td colspan="2">&bull; <b><u><?php echo JText::_('VRPEDITBUSYEIGHT'); ?></u>:</b></td></tr>
						<tr><td colspan="2"><table>
						<?php
						foreach($optionals as $k=>$o) { 
							if (intval($o['hmany'])==1) {
								if (array_key_exists($o['id'], $arropt)) {
									$oval=$arropt[$o['id']];
								}else {
									$oval="";
								}
							}else {
								if (array_key_exists($o['id'], $arropt)) {
									$oval=" checked=\"checked\"";
								}else {
									$oval="";
								}
							}
							if(intval($o['perday'])==1) {
								$thisoptcost=$o['cost'] * $tars[$acttar]['days'];
							}else {
								$thisoptcost=$o['cost'];
							}
							if($o['maxprice'] > 0 && $thisoptcost > $o['maxprice']) {
								$thisoptcost=$o['maxprice'];
							}
						?>	
							<tr><td><?php echo $o['name']; ?></td><td><?php echo $currencysymb; ?> <?php echo vikrentcar::sayOptionalsPlusIva($thisoptcost, $o['idiva'], $ord[0]); ?></td><td align="center"><?php echo (intval($o['hmany'])==1 ? "<input type=\"text\" name=\"optid".$o['id']."\" value=\"".$oval."\" size=\"2\"/>" : "<input type=\"checkbox\" name=\"optid".$o['id']."\" value=\"1\"".$oval."/>"); ?></td></tr>
							<tr><td colspan="3"><div style="width: 200px"><?php echo (!empty($o['img']) ? "<img src=\"./components/com_vikrentcar/resources/".$o['img']."\" align=\"left\" class=\"maxfifty\"/>" : "").$o['descr']; ?></div></td></tr>
					<?php }
						?>
						</table></td></tr>
						<?php
					}
				}
				?>
				<tr><td>&bull; <b><?php echo JText::_('VRCAMOUNTPAID'); ?>:</b></td><td><input type="text" name="totpaid" value="<?php echo $ord[0]['totpaid']; ?>" size="5"/> <?php echo $currencysymb; ?></td></tr>
				<?php
			}
		}elseif (is_array($ord) && empty($ord[0]['idtar'])) {
			//order is a quick reservation from administrator
			$dbo = & JFactory :: getDBO();
			//vikrentcar 1.5
			if($ord[0]['hourly'] == 1) {
				$q="SELECT * FROM `#__vikrentcar_dispcosthours` WHERE `hours`='".$hoursdiff."' AND `idcar`='".$ord[0]['idcar']."' ORDER BY `#__vikrentcar_dispcosthours`.`cost` ASC;";
			}else {
				$q="SELECT * FROM `#__vikrentcar_dispcost` WHERE `days`='".$ord[0]['days']."' AND `idcar`='".$ord[0]['idcar']."' ORDER BY `#__vikrentcar_dispcost`.`cost` ASC;";
			}
			//
			$dbo->setQuery($q);
			$dbo->Query($q);
			$tottars = $dbo->getNumRows();
			$proceedtars = false;
			if ($tottars == 0) {
				if($ord[0]['hourly'] == 1) {
					$q="SELECT * FROM `#__vikrentcar_dispcost` WHERE `days`='".$ord[0]['days']."' AND `idcar`='".$ord[0]['idcar']."' ORDER BY `#__vikrentcar_dispcost`.`cost` ASC;";
					$dbo->setQuery($q);
					$dbo->Query($q);
					if($dbo->getNumRows() > 0) {
						$proceedtars = true;
					}
				}
			}else {
				$proceedtars = true;
			}
			if ($proceedtars) {
				$tars = $dbo->loadAssocList();
				?>
				<tr><td colspan="2">&bull; <b><u><?php echo JText::_('VRPEDITBUSYSEVEN'); ?></u>:</b></td></tr>
				<input type="hidden" name="areprices" value="quick"/>
				<?php
				foreach($tars as $k=>$t) {
				?>
				<tr><td><label for="pid<?php echo $t['idprice']; ?>"><?php echo vikrentcar::getPriceName($t['idprice']).": ".$currencysymb." ".vikrentcar::sayCostPlusIva($t['cost'], $t['idprice'], $ord[0]).(strlen($t['attrdata']) ? "<br/>".vikrentcar::getPriceAttr($t['idprice']).": ".$t['attrdata'] : ""); ?></label></td><td><input type="radio" name="priceid" id="pid<?php echo $t['idprice']; ?>" value="<?php echo $t['idprice']; ?>"/></td></tr>
				<?php
				}
				if(!empty($car['idopt'])) {
					$optionals=vikrentcar::getCarOptionals($car['idopt']);
					if (is_array($optionals)) {
						?>
						<tr><td colspan="2">&bull; <b><u><?php echo JText::_('VRPEDITBUSYEIGHT'); ?></u>:</b></td></tr>
						<tr><td colspan="2"><table>
						<?php
						foreach($optionals as $k=>$o) { 
						?>	
							<tr><td><?php echo $o['name']; ?></td><td align="center"><?php echo (intval($o['hmany'])==1 ? "<input type=\"text\" name=\"optid".$o['id']."\" value=\"\" size=\"2\"/>" : "<input type=\"checkbox\" name=\"optid".$o['id']."\" value=\"1\"/>"); ?></td></tr>
							<tr><td colspan="2"><div style="width: 200px"><?php echo (!empty($o['img']) ? "<img src=\"./components/com_vikrentcar/resources/".$o['img']."\" align=\"left\" class=\"maxfifty\"/>" : "").$o['descr']; ?></div></td></tr>
						<?php
						}
						?>
						</table></td></tr>
						<?php
					}
				}
			}
			//
		}
		?>
		</table>
		<input type="hidden" name="task" value="">
		<input type="hidden" name="idcar" value="<?php echo $busy['idcar']; ?>">
		<input type="hidden" name="idbusy" value="<?php echo $busy['id']; ?>">
		<input type="hidden" name="standbyquick" value="<?php echo $pstandbyquick; ?>">
		<input type="hidden" name="notifycust" value="<?php echo $pnotifycust; ?>">
		<input type="hidden" name="option" value="<?php echo $option; ?>">
		</form>
		<script language="JavaScript" type="text/javascript">
		document.getElementById('pickupdate').value='<?php echo $rit; ?>';
		document.getElementById('releasedate').value='<?php echo $con; ?>';
		</script>
  
		<?php
	}
	
	function pNewCoupon ($wselcars, $option) {
		JHTML::_('behavior.tooltip');
		JHTML::_('behavior.calendar');
		$currencysymb=vikrentcar::getCurrencySymb(true);
		$df=vikrentcar::getDateFormat(true);
		?>
		<script language="JavaScript" type="text/javascript">
		function setVehiclesList() {
			if(document.adminForm.allvehicles.checked == true) {
				document.getElementById('vrcvlist').style.display='none';
			}else {
				document.getElementById('vrcvlist').style.display='block';
			}
			return true;
		}
		</script>
		<form name="adminForm" action="index.php" method="post" id="adminForm">
		<table class="adminform">
		<tr><td width="200">&bull; <b><?php echo JText::_('VRCNEWCOUPONONE'); ?>:</b> </td><td><input type="text" name="code" value="" size="30"/></td></tr>
		<tr><td width="200">&bull; <b><?php echo JText::_('VRCNEWCOUPONTWO'); ?>:</b> </td><td><select name="type"><option value="1"><?php echo JText::_('VRCCOUPONTYPEPERMANENT'); ?></option><option value="2"><?php echo JText::_('VRCCOUPONTYPEGIFT'); ?></option></select></td></tr>
		<tr><td width="200">&bull; <b><?php echo JText::_('VRCNEWCOUPONTHREE'); ?>:</b> </td><td><select name="percentot"><option value="1">%</option><option value="2"><?php echo $currencysymb; ?></option></select></td></tr>
		<tr><td width="200">&bull; <b><?php echo JText::_('VRCNEWCOUPONFOUR'); ?>:</b> </td><td><input type="text" name="value" value="" size="4"/></td></tr>
		<tr><td width="200" valign="top">&bull; <b><?php echo JText::_('VRCNEWCOUPONFIVE'); ?>:</b> </td><td><input type="checkbox" name="allvehicles" value="1" checked="checked" onclick="javascript: setVehiclesList();"/> <?php echo JText::_('VRCNEWCOUPONEIGHT'); ?><span id="vrcvlist" style="display: none;"><br/><?php echo $wselcars; ?></span></td></tr>
		<tr><td width="200">&bull; <b><?php echo JText::_('VRCNEWCOUPONSIX'); ?>:</b> <?php echo JHTML::tooltip(JText::_('VRCNEWCOUPONNINE'), JText::_('VRCNEWCOUPONSIX'), 'tooltip.png', ''); ?></td><td><?php echo JHTML::_('calendar', '', 'from', 'from', $df, array('class'=>'', 'size'=>'10',  'maxlength'=>'19')); ?> - <?php echo JHTML::_('calendar', '', 'to', 'to', $df, array('class'=>'', 'size'=>'10',  'maxlength'=>'19')); ?></td></tr>
		<tr><td width="200">&bull; <b><?php echo JText::_('VRCNEWCOUPONSEVEN'); ?>:</b> </td><td><input type="text" name="mintotord" value="0.00" size="4"/></td></tr>
		</table>
		<input type="hidden" name="task" value="">
		<input type="hidden" name="option" value="<?php echo $option; ?>">
		</form>
		<?php
	}
	
	function pEditCoupon ($coupon, $wselcars, $option) {
		JHTML::_('behavior.tooltip');
		JHTML::_('behavior.calendar');
		$currencysymb=vikrentcar::getCurrencySymb(true);
		$df=vikrentcar::getDateFormat(true);
		$fromdate = "";
		$todate = "";
		if(strlen($coupon['datevalid']) > 0) {
			$dateparts = explode("-", $coupon['datevalid']);
			if ($df=="%d/%m/%Y") {
				$udf='d/m/Y';
			}elseif ($df=="%m/%d/%Y") {
				$udf='m/d/Y';
			}else {
				$udf='Y/m/d';
			}
			$fromdate = date($udf, $dateparts[0]);
			$todate = date($udf, $dateparts[1]);
		}
		?>
		<script language="JavaScript" type="text/javascript">
		function setVehiclesList() {
			if(document.adminForm.allvehicles.checked == true) {
				document.getElementById('vrcvlist').style.display='none';
			}else {
				document.getElementById('vrcvlist').style.display='block';
			}
			return true;
		}
		</script>
		<form name="adminForm" action="index.php" method="post" id="adminForm">
		<table class="adminform">
		<tr><td width="200">&bull; <b><?php echo JText::_('VRCNEWCOUPONONE'); ?>:</b> </td><td><input type="text" name="code" value="<?php echo $coupon['code']; ?>" size="30"/></td></tr>
		<tr><td width="200">&bull; <b><?php echo JText::_('VRCNEWCOUPONTWO'); ?>:</b> </td><td><select name="type"><option value="1"<?php echo ($coupon['type'] == 1 ? " selected=\"selected\"" : ""); ?>><?php echo JText::_('VRCCOUPONTYPEPERMANENT'); ?></option><option value="2"<?php echo ($coupon['type'] == 2 ? " selected=\"selected\"" : ""); ?>><?php echo JText::_('VRCCOUPONTYPEGIFT'); ?></option></select></td></tr>
		<tr><td width="200">&bull; <b><?php echo JText::_('VRCNEWCOUPONTHREE'); ?>:</b> </td><td><select name="percentot"><option value="1"<?php echo ($coupon['percentot'] == 1 ? " selected=\"selected\"" : ""); ?>>%</option><option value="2"<?php echo ($coupon['percentot'] == 2 ? " selected=\"selected\"" : ""); ?>><?php echo $currencysymb; ?></option></select></td></tr>
		<tr><td width="200">&bull; <b><?php echo JText::_('VRCNEWCOUPONFOUR'); ?>:</b> </td><td><input type="text" name="value" value="<?php echo $coupon['value']; ?>" size="4"/></td></tr>
		<tr><td width="200" valign="top">&bull; <b><?php echo JText::_('VRCNEWCOUPONFIVE'); ?>:</b> </td><td><input type="checkbox" name="allvehicles" value="1"<?php echo ($coupon['allvehicles'] == 1 ? " checked=\"checked\"" : ""); ?> onclick="javascript: setVehiclesList();"/> <?php echo JText::_('VRCNEWCOUPONEIGHT'); ?><span id="vrcvlist" style="display: <?php echo ($coupon['allvehicles'] == 1 ? "none" : "block"); ?>;"><br/><?php echo $wselcars; ?></span></td></tr>
		<tr><td width="200">&bull; <b><?php echo JText::_('VRCNEWCOUPONSIX'); ?>:</b> <?php echo JHTML::tooltip(JText::_('VRCNEWCOUPONNINE'), JText::_('VRCNEWCOUPONSIX'), 'tooltip.png', ''); ?></td><td><?php echo JHTML::_('calendar', '', 'from', 'from', $df, array('class'=>'', 'size'=>'10',  'maxlength'=>'19')); ?> - <?php echo JHTML::_('calendar', '', 'to', 'to', $df, array('class'=>'', 'size'=>'10',  'maxlength'=>'19')); ?></td></tr>
		<tr><td width="200">&bull; <b><?php echo JText::_('VRCNEWCOUPONSEVEN'); ?>:</b> </td><td><input type="text" name="mintotord" value="<?php echo $coupon['mintotord']; ?>" size="4"/></td></tr>
		</table>
		<input type="hidden" name="task" value="">
		<input type="hidden" name="option" value="<?php echo $option; ?>">
		<input type="hidden" name="where" value="<?php echo $coupon['id']; ?>">
		</form>
		<?php
		if(strlen($fromdate) > 0 && strlen($todate) > 0) {
		?>
		<script language="JavaScript" type="text/javascript">
		document.getElementById('from').value='<?php echo $fromdate; ?>';
		document.getElementById('to').value='<?php echo $todate; ?>';
		</script>
		<?php
		}
		?>
		<?php
	}
	
	function pEditCustomf ($field, $option) {
		$choose="";
		if($field['type']=="select") {
			$x=explode(";;__;;", $field['choose']);
			if(@count($x) > 0) {
				foreach($x as $y) {
					if(!empty($y)) {
						$choose.='<input type="text" name="choose[]" value="'.$y.'" size="40"/><br/>'."\n";
					}
				}
			}
		}
		?>
		<script language="JavaScript" type="text/javascript">
		function setCustomfChoose (val) {
			if(val == "text") {
				document.getElementById('customfchoose').style.display = 'none';
			}
			if(val == "textarea") {
				document.getElementById('customfchoose').style.display = 'none';
			}
			if(val == "date") {
				document.getElementById('customfchoose').style.display = 'none';
			}
			if(val == "checkbox") {
				document.getElementById('customfchoose').style.display = 'none';
			}
			if(val == "select") {
				document.getElementById('customfchoose').style.display = 'block';
			}
			if(val == "separator") {
				document.getElementById('customfchoose').style.display = 'none';
			}
			return true;
		}
		function addElement() {
			var ni = document.getElementById('customfchooseadd');
			var numi = document.getElementById('theValue');
			var num = (document.getElementById('theValue').value -1)+ 2;
			numi.value = num;
			var newdiv = document.createElement('div');
			var divIdName = 'my'+num+'Div';
			newdiv.setAttribute('id',divIdName);
			newdiv.innerHTML = '<input type=\'text\' name=\'choose[]\' value=\'\' size=\'40\'/><br/>';
			ni.appendChild(newdiv);
		}
		</script>
		<input type="hidden" value="0" id="theValue" />
		
		<form name="adminForm" id="adminForm" action="index.php" method="post">
		<table class="adminform">
		<tr><td width="200">&bull; <b><?php echo JText::_('VRNEWCUSTOMFONE'); ?>:</b> </td><td><input type="text" name="name" value="<?php echo $field['name']; ?>" size="40"/></td></tr>
		<tr><td width="200" valign="top">&bull; <b><?php echo JText::_('VRNEWCUSTOMFTWO'); ?>:</b> </td><td valign="top">
		<select id="stype" name="type" onchange="setCustomfChoose(this.value);"><option value="text"<?php echo ($field['type']=="text" ? " selected=\"selected\"" : ""); ?>><?php echo JText::_('VRNEWCUSTOMFTHREE'); ?></option><option value="textarea"<?php echo ($field['type']=="textarea" ? " selected=\"selected\"" : ""); ?>><?php echo JText::_('VRNEWCUSTOMFTEN'); ?></option><option value="date"<?php echo ($field['type']=="date" ? " selected=\"selected\"" : ""); ?>><?php echo JText::_('VRNEWCUSTOMFDATETYPE'); ?></option><option value="select"<?php echo ($field['type']=="select" ? " selected=\"selected\"" : ""); ?>><?php echo JText::_('VRNEWCUSTOMFFOUR'); ?></option><option value="checkbox"<?php echo ($field['type']=="checkbox" ? " selected=\"selected\"" : ""); ?>><?php echo JText::_('VRNEWCUSTOMFFIVE'); ?></option><option value="separator"<?php echo ($field['type']=="separator" ? " selected=\"selected\"" : ""); ?>><?php echo JText::_('VRNEWCUSTOMFSEPARATOR'); ?></option></select>
		<div id="customfchoose" style="display: <?php echo ($field['type']=="select" ? "block" : "none"); ?>;">
			<?php
			if($field['type']!="select") {
			?>
			<br/><input type="text" name="choose[]" value="" size="40"/>
			<?php
			}else {
				echo '<br/>'.$choose;
			}
			?>
			<div id="customfchooseadd" style="display: block;"></div>
			<span><b><a href="javascript: void(0);" onclick="javascript: addElement();"><?php echo JText::_('VRNEWCUSTOMFNINE'); ?></a></b></span>
		</div>
		</td></tr>
		<tr><td width="200">&bull; <b><?php echo JText::_('VRNEWCUSTOMFSIX'); ?>:</b> </td><td><input type="checkbox" name="required" value="1"<?php echo (intval($field['required']) == 1 ? " checked=\"checked\"" : ""); ?>/></td></tr>
		<tr><td width="200">&bull; <b><?php echo JText::_('VRNEWCUSTOMFSEVEN'); ?>:</b> </td><td><input type="checkbox" name="isemail" value="1"<?php echo (intval($field['isemail']) == 1 ? " checked=\"checked\"" : ""); ?>/></td></tr>
		<tr><td width="200">&bull; <b><?php echo JText::_('VRNEWCUSTOMFEIGHT'); ?>:</b> </td><td><input type="text" name="poplink" value="<?php echo $field['poplink']; ?>" size="40"/> <small>Ex. <i>index.php?option=com_content&view=article&id=#JoomlaArticleID#</i></small></td></tr>
		</table>
		<input type="hidden" name="task" value="">
		<input type="hidden" name="option" value="<?php echo $option; ?>">
		<input type="hidden" name="where" value="<?php echo $field['id']; ?>">
		</form>
		<?php
	}
	
	function pNewCustomf ($option) {
		?>
		<script language="JavaScript" type="text/javascript">
		function setCustomfChoose (val) {
			if(val == "text") {
				document.getElementById('customfchoose').style.display = 'none';
			}
			if(val == "textarea") {
				document.getElementById('customfchoose').style.display = 'none';
			}
			if(val == "date") {
				document.getElementById('customfchoose').style.display = 'none';
			}
			if(val == "checkbox") {
				document.getElementById('customfchoose').style.display = 'none';
			}
			if(val == "select") {
				document.getElementById('customfchoose').style.display = 'block';
			}
			if(val == "separator") {
				document.getElementById('customfchoose').style.display = 'none';
			}
			return true;
		}
		function addElement() {
			var ni = document.getElementById('customfchooseadd');
			var numi = document.getElementById('theValue');
			var num = (document.getElementById('theValue').value -1)+ 2;
			numi.value = num;
			var newdiv = document.createElement('div');
			var divIdName = 'my'+num+'Div';
			newdiv.setAttribute('id',divIdName);
			newdiv.innerHTML = '<input type=\'text\' name=\'choose[]\' value=\'\' size=\'40\'/><br/>';
			ni.appendChild(newdiv);
		}
		</script>
		<input type="hidden" value="0" id="theValue" />
		
		<form name="adminForm" id="adminForm" action="index.php" method="post">
		<table class="adminform">
		<tr><td width="200">&bull; <b><?php echo JText::_('VRNEWCUSTOMFONE'); ?>:</b> </td><td><input type="text" name="name" value="" size="40"/></td></tr>
		<tr><td width="200" valign="top">&bull; <b><?php echo JText::_('VRNEWCUSTOMFTWO'); ?>:</b> </td><td valign="top">
		<select id="stype" name="type" onchange="setCustomfChoose(this.value);"><option value="text"><?php echo JText::_('VRNEWCUSTOMFTHREE'); ?></option><option value="textarea"><?php echo JText::_('VRNEWCUSTOMFTEN'); ?></option><option value="date"><?php echo JText::_('VRNEWCUSTOMFDATETYPE'); ?></option><option value="select"><?php echo JText::_('VRNEWCUSTOMFFOUR'); ?></option><option value="checkbox"><?php echo JText::_('VRNEWCUSTOMFFIVE'); ?></option><option value="separator"><?php echo JText::_('VRNEWCUSTOMFSEPARATOR'); ?></option></select>
		<div id="customfchoose" style="display: none;"><br/><input type="text" name="choose[]" value="" size="40"/>
			<div id="customfchooseadd" style="display: block;"></div>
			<span><b><a href="javascript: void(0);" onclick="javascript: addElement();"><?php echo JText::_('VRNEWCUSTOMFNINE'); ?></a></b></span>
		</div>
		</td></tr>
		<tr><td width="200">&bull; <b><?php echo JText::_('VRNEWCUSTOMFSIX'); ?>:</b> </td><td><input type="checkbox" name="required" value="1"/></td></tr>
		<tr><td width="200">&bull; <b><?php echo JText::_('VRNEWCUSTOMFSEVEN'); ?>:</b> </td><td><input type="checkbox" name="isemail" value="1"/></td></tr>
		<tr><td width="200">&bull; <b><?php echo JText::_('VRNEWCUSTOMFEIGHT'); ?>:</b> </td><td><input type="text" name="poplink" value="" size="40"/> <small>Ex. <i>index.php?option=com_content&view=article&id=#JoomlaArticleID#</i></small></td></tr>
		</table>
		<input type="hidden" name="task" value="">
		<input type="hidden" name="option" value="<?php echo $option; ?>">
		</form>
		<?php
	}
	
	function pNewPlace ($option) {
		$editor =& JFactory::getEditor();
		JHTML::_('behavior.tooltip');
		JHTML::_('behavior.calendar');
		$hours = "<option value=\"\"> </option>\n";
		for($i=0; $i <= 23; $i++){
			$in = $i < 10 ? "0".$i : $i;
			$hours.="<option value=\"".$i."\">".$in."</option>\n";
		}
		$minutes = "<option value=\"\"> </option>\n";
		for($i=0; $i <= 59; $i++){
			$in = $i < 10 ? "0".$i : $i;
			$minutes.="<option value=\"".$i."\">".$in."</option>\n";
		}
		$dbo = & JFactory :: getDBO();
		$wiva="<select name=\"praliq\">\n";
		$wiva.="<option value=\"\"> ------ </option>\n";
		$q="SELECT * FROM `#__vikrentcar_iva`;";
		$dbo->setQuery($q);
		$dbo->Query($q);
		if ($dbo->getNumRows() > 0) {
			$ivas=$dbo->loadAssocList();
			foreach($ivas as $iv){
				$wiva.="<option value=\"".$iv['id']."\">".(empty($iv['name']) ? $iv['aliq']."%" : $iv['name']."-".$iv['aliq']."%")."</option>\n";
			}
		}
		$wiva.="</select>\n";
		?>
		<script language="JavaScript" type="text/javascript">
		function vrcAddClosingDate() {
			var closingdadd = document.getElementById('insertclosingdate').value;
			if(closingdadd.length > 0) {
				document.getElementById('closingdays').value += closingdadd + ',';
				document.getElementById('insertclosingdate').value = '';
			}
		}
		</script>
		
		<form name="adminForm" id="adminForm" action="index.php" method="post">
		<table class="adminform">
		<tr><td width="150">&bull; <b><?php echo JText::_('VRNEWPLACEONE'); ?>:</b> </td><td><input type="text" name="placename" value="" size="40"/></td></tr>
		<tr><td width="150">&bull; <b><?php echo JText::_('VRCPLACELAT'); ?>:</b> </td><td><input type="text" name="lat" value="" size="30"/></td></tr>
		<tr><td width="150">&bull; <b><?php echo JText::_('VRCPLACELNG'); ?>:</b> </td><td><input type="text" name="lng" value="" size="30"/></td></tr>
		<tr><td width="150">&bull; <b><?php echo JText::_('VRCPLACEOVERRIDETAX'); ?>:</b> <?php echo JHTML::tooltip(JText::_('VRCPLACEOVERRIDETAXTXT'), JText::_('VRCPLACEOVERRIDETAX'), 'tooltip.png', ''); ?></td><td><?php echo $wiva; ?></td></tr>
		<tr><td width="150" valign="top">&bull; <b><?php echo JText::_('VRCPLACEOPENTIME'); ?>:</b> <?php echo JHTML::tooltip(JText::_('VRCPLACEOPENTIMETXT'), JText::_('VRCPLACEOPENTIME'), 'tooltip.png', ''); ?></td><td><p><?php echo JText::_('VRCPLACEOPENTIMEFROM'); ?>: <select name="opentimefh"><?php echo $hours; ?></select> : <select name="opentimefm"><?php echo $minutes; ?></select></p><p><?php echo JText::_('VRCPLACEOPENTIMETO'); ?>: <select name="opentimeth"><?php echo $hours; ?></select> : <select name="opentimetm"><?php echo $minutes; ?></select></p></td></tr>
		<tr><td width="150">&bull; <b><?php echo JText::_('VRCPLACEDESCR'); ?>:</b> </td><td><?php echo $editor->display("descr", "", 400, 200, 70, 20); ?></td></tr>
		<tr><td width="150" valign="top">&bull; <b><?php echo JText::_('VRNEWPLACECLOSINGDAYS'); ?>:</b> <?php echo JHTML::tooltip(JText::_('VRNEWPLACECLOSINGDAYSHELP'), JText::_('VRNEWPLACECLOSINGDAYS'), 'tooltip.png', ''); ?></td><td><?php echo JHTML::_('calendar', '', 'insertclosingdate', 'insertclosingdate', '%Y-%m-%d', array('class'=>'', 'size'=>'10',  'maxlength'=>'19')); ?> <span class="vrcspandateadd" onclick="javascript: vrcAddClosingDate();"><?php echo JText::_('VRNEWPLACECLOSINGDAYSADD'); ?></span><br/><textarea name="closingdays" id="closingdays" rows="5" cols="44"></textarea></td></tr>
		</table>
		<input type="hidden" name="task" value="">
		<input type="hidden" name="option" value="<?php echo $option; ?>">
		</form>
		<?php
	}
	
	function pEditPlace ($row, $option) {
		$editor =& JFactory::getEditor();
		JHTML::_('behavior.tooltip');
		JHTML::_('behavior.calendar');
		$difftime = false;
		if(!empty($row['opentime'])) {
			$difftime = true;
			$parts = explode("-", $row['opentime']);
			$openat=vikrentcar::getHoursMinutes($parts[0]);
			$closeat=vikrentcar::getHoursMinutes($parts[1]);
		}
		$hours = "<option value=\"\"> </option>\n";
		for($i=0; $i <= 23; $i++){
			$in = $i < 10 ? "0".$i : $i;
			$stat = ($difftime == true && (int)$openat[0] == $i ? " selected=\"selected\"" : "");
			$hours.="<option value=\"".$i."\"".$stat.">".$in."</option>\n";
		}
		$minutes = "<option value=\"\"> </option>\n";
		for($i=0; $i <= 59; $i++){
			$in = $i < 10 ? "0".$i : $i;
			$stat = ($difftime == true && (int)$openat[1] == $i ? " selected=\"selected\"" : "");
			$minutes.="<option value=\"".$i."\"".$stat.">".$in."</option>\n";
		}
		$hoursto = "<option value=\"\"> </option>\n";
		for($i=0; $i <= 23; $i++){
			$in = $i < 10 ? "0".$i : $i;
			$stat = ($difftime == true && (int)$closeat[0] == $i ? " selected=\"selected\"" : "");
			$hoursto.="<option value=\"".$i."\"".$stat.">".$in."</option>\n";
		}
		$minutesto = "<option value=\"\"> </option>\n";
		for($i=0; $i <= 59; $i++){
			$in = $i < 10 ? "0".$i : $i;
			$stat = ($difftime == true && (int)$closeat[1] == $i ? " selected=\"selected\"" : "");
			$minutesto.="<option value=\"".$i."\"".$stat.">".$in."</option>\n";
		}
		$dbo = & JFactory :: getDBO();
		$wiva="<select name=\"praliq\">\n";
		$wiva.="<option value=\"\"> ------ </option>\n";
		$q="SELECT * FROM `#__vikrentcar_iva`;";
		$dbo->setQuery($q);
		$dbo->Query($q);
		if ($dbo->getNumRows() > 0) {
			$ivas=$dbo->loadAssocList();
			foreach($ivas as $iv){
				$wiva.="<option value=\"".$iv['id']."\"".($row['idiva'] == $iv['id'] ? " selected=\"selected\"" : "").">".(empty($iv['name']) ? $iv['aliq']."%" : $iv['name']."-".$iv['aliq']."%")."</option>\n";
			}
		}
		$wiva.="</select>\n";
		?>
		<script language="JavaScript" type="text/javascript">
		function vrcAddClosingDate() {
			var closingdadd = document.getElementById('insertclosingdate').value;
			if(closingdadd.length > 0) {
				document.getElementById('closingdays').value += closingdadd + ',';
				document.getElementById('insertclosingdate').value = '';
			}
		}
		</script>
		
		<form name="adminForm" id="adminForm" action="index.php" method="post">
		<table class="adminform">
		<tr><td width="200">&bull; <b><?php echo JText::_('VREDITPLACEONE'); ?>:</b> </td><td><input type="text" name="placename" value="<?php echo $row['name']; ?>" size="40"/></td></tr>
		<tr><td width="150">&bull; <b><?php echo JText::_('VRCPLACELAT'); ?>:</b> </td><td><input type="text" name="lat" value="<?php echo $row['lat']; ?>" size="30"/></td></tr>
		<tr><td width="150">&bull; <b><?php echo JText::_('VRCPLACELNG'); ?>:</b> </td><td><input type="text" name="lng" value="<?php echo $row['lng']; ?>" size="30"/></td></tr>
		<tr><td width="150">&bull; <b><?php echo JText::_('VRCPLACEOVERRIDETAX'); ?>:</b> <?php echo JHTML::tooltip(JText::_('VRCPLACEOVERRIDETAXTXT'), JText::_('VRCPLACEOVERRIDETAX'), 'tooltip.png', ''); ?></td><td><?php echo $wiva; ?></td></tr>
		<tr><td width="150" valign="top">&bull; <b><?php echo JText::_('VRCPLACEOPENTIME'); ?>:</b> <?php echo JHTML::tooltip(JText::_('VRCPLACEOPENTIMETXT'), JText::_('VRCPLACEOPENTIME'), 'tooltip.png', ''); ?></td><td><p><?php echo JText::_('VRCPLACEOPENTIMEFROM'); ?>: <select name="opentimefh"><?php echo $hours; ?></select> : <select name="opentimefm"><?php echo $minutes; ?></select></p><p><?php echo JText::_('VRCPLACEOPENTIMETO'); ?>: <select name="opentimeth"><?php echo $hoursto; ?></select> : <select name="opentimetm"><?php echo $minutesto; ?></select></p></td></tr>
		<tr><td width="150">&bull; <b><?php echo JText::_('VRCPLACEDESCR'); ?>:</b> </td><td><?php echo $editor->display("descr", $row['descr'], 400, 200, 70, 20); ?></td></tr>
		<tr><td width="150" valign="top">&bull; <b><?php echo JText::_('VRNEWPLACECLOSINGDAYS'); ?>:</b> <?php echo JHTML::tooltip(JText::_('VRNEWPLACECLOSINGDAYSHELP'), JText::_('VRNEWPLACECLOSINGDAYS'), 'tooltip.png', ''); ?></td><td><?php echo JHTML::_('calendar', '', 'insertclosingdate', 'insertclosingdate', '%Y-%m-%d', array('class'=>'', 'size'=>'10',  'maxlength'=>'19')); ?> <span class="vrcspandateadd" onclick="javascript: vrcAddClosingDate();"><?php echo JText::_('VRNEWPLACECLOSINGDAYSADD'); ?></span><br/><textarea name="closingdays" id="closingdays" rows="5" cols="44"><?php echo $row['closingdays']; ?></textarea></td></tr>
		</table>
		<input type="hidden" name="task" value="">
		<input type="hidden" name="whereup" value="<?php echo $row['id']; ?>">
		<input type="hidden" name="option" value="<?php echo $option; ?>">
		</form>
		<?php
	}
		
	function pEditOrder ($row, $option) {
		$currencyname=vikrentcar::getCurrencyName();
		$car=vikrentcar::getCarInfo($row['idcar']);
		$dbo = & JFactory :: getDBO();
		$nowdf = vikrentcar::getDateFormat(true);
		if ($nowdf=="%d/%m/%Y") {
			$df='d/m/Y';
		}elseif ($nowdf=="%m/%d/%Y") {
			$df='m/d/Y';
		}else {
			$df='Y/m/d';
		}
		$payment=vikrentcar::getPayment($row['idpayment']);
		if(!empty($row['idtar'])) {
			if($row['hourly'] == 1) {
				$q="SELECT * FROM `#__vikrentcar_dispcosthours` WHERE `id`='".$row['idtar']."';";
			}else {
				$q="SELECT * FROM `#__vikrentcar_dispcost` WHERE `id`='".$row['idtar']."';";
			}
			$dbo->setQuery($q);
			$dbo->Query($q);
			$tar=$dbo->loadAssocList();
			if($row['hourly'] == 1) {
				foreach($tar as $kt => $vt) {
					$tar[$kt]['days'] = 1;
				}
			}
			//vikrentcar 1.6
			$checkhourscharges = 0;
			$hoursdiff = 0;
			$ppickup = $row['ritiro'];
			$prelease = $row['consegna'];
			$secdiff = $prelease - $ppickup;
			$daysdiff = $secdiff / 86400;
			if (is_int($daysdiff)) {
				if ($daysdiff < 1) {
					$daysdiff = 1;
				}
			}else {
				if ($daysdiff < 1) {
					$daysdiff = 1;
					$checkhourly = true;
					$ophours = $secdiff / 3600;
					$hoursdiff = intval(round($ophours));
					if($hoursdiff < 1) {
						$hoursdiff = 1;
					}
				}else {
					$sum = floor($daysdiff) * 86400;
					$newdiff = $secdiff - $sum;
					$maxhmore = vikrentcar :: getHoursMoreRb() * 3600;
					if ($maxhmore >= $newdiff) {
						$daysdiff = floor($daysdiff);
					}else {
						$daysdiff = ceil($daysdiff);
						//vikrentcar 1.6
						$ehours = intval(round(($newdiff - $maxhmore) / 3600));
						$checkhourscharges = $ehours;
						if($checkhourscharges > 0) {
							$aehourschbasp = vikrentcar::applyExtraHoursChargesBasp();
						}
						//
					}
				}
			}
			//
		}
		?>
		<form name="adminForm" action="index.php" method="post" id="adminForm">
		<table class="adminform">
		<tr><td width="100%">
		<p class="vrcorderof"><?php echo JText::_('VRCORDERNUMBER'); ?>: <?php echo $row['id']; ?><?php echo ($row['status']=="confirmed" ? ' - '.JText::_('VRCCONFIRMATIONNUMBER').': '.$row['sid'].'_'.$row['ts'] : ''); ?> - <?php echo JText::_('VREDITORDERONE'); ?>: <?php echo date($df.' H:i', $row['ts']).(!empty($row['idbusy']) ? " - <a href=\"index.php?option=com_vikrentcar&task=editbusy&cid[]=".$row['idbusy']."\">".JText::_('VRMODRES')."</a>" : "").($row['status'] == 'standby' ? " &nbsp;&nbsp;&nbsp;<a href=\"".JURI::root()."index.php?option=com_vikrentcar&task=vieworder&sid=".$row['sid']."&ts=".$row['ts']."\" target=\"_blank\">".JText::_('VRCFRONTVIEWSTANDBYORDER')."</a>" : ""); ?></p>
		<p class="vrcorderpar"><?php echo JText::_('VRSTATUS'); ?>:</p> <?php echo ($row['status']=="confirmed" ? "<p class=\"successmade\">".JText::_('VRCONFIRMED')."</p>" : "<p class=\"warn\">".JText::_('VRSTANDBY')."</p><span class=\"vrcorderseatasconf\"><a href=\"index.php?option=com_vikrentcar&task=setordconfirmed&cid[]=".$row['id']."\">".JText::_('VRSETORDCONFIRMED')."</a></span>"); ?>
		<?php
		if($row['status']=="confirmed" && count($tar[0]) > 0) {
			echo "<span class=\"vrcorderseatasconf\"><a href=\"index.php?option=com_vikrentcar&task=resendordemail&cid[]=".$row['id']."\">".JText::_('VRCRESENDORDEMAIL')."</a></span>";
			echo "<span class=\"vrcorderseatasconf\"><a href=\"index.php?option=com_vikrentcar&task=resendordemail&sendpdf=1&cid[]=".$row['id']."\">".JText::_('VRCRESENDORDEMAILANDPDF')."</a></span>";
		}
		if (file_exists(JPATH_SITE . DS ."components". DS ."com_vikrentcar". DS . "resources" . DS . "pdfs" . DS . $row['id'].'_'.$row['ts'].'.pdf')) {
			?>
			<p class="vrcdownloadpdf"><a href="<?php echo JURI::root(); ?>components/com_vikrentcar/resources/pdfs/<?php echo $row['id'].'_'.$row['ts']; ?>.pdf" target="_blank"><?php echo JText::_('VRCDOWNLOADPDF'); ?></a></p>
			<?php
		}
		?>
		</td></tr>
		<tr><td width="100%">
		<table><tr><td valign="top">
		<?php
		if(!empty($row['custdata'])) {
			?>
			<p class="vrcorderpar"><?php echo JText::_('VREDITORDERTWO'); ?>:</p>
			<?php
			if(!empty($row['ujid'])) {
				echo '<i>User ID</i>: '.$row['ujid'].'<br/>';
			}
			if (!empty($row['custmail'])) {
				echo '<i>'.JText::_('VRCCUSTEMAILADDR').'</i>: '.$row['custmail'].'<br/>';
			}
			echo str_replace("\n", "<br/>", $row['custdata']); 
		}
		?>
		<br/><br/>
		<span class="vrcorderspan"><?php echo JText::_('VREDITORDERTHREE'); ?>:</span> <?php echo $car['name']; ?><br/>
		<span class="vrcorderspan"><?php echo JText::_('VREDITORDERFOUR'); ?>:</span> <?php echo ($row['hourly'] == 1 ? $tar[0]['hours'].' '.JText::_('VRCHOURS') : $row['days']); ?><br/>
		<span class="vrcorderspan"><?php echo JText::_('VREDITORDERFIVE'); ?>:</span> <?php echo date($df.' H:i', $row['ritiro']); ?><br/>
		<span class="vrcorderspan"><?php echo JText::_('VREDITORDERSIX'); ?>:</span> <?php echo date($df.' H:i', $row['consegna']); ?><br/>
		<?php if(!empty($row['idplace'])){ ?>
		<span class="vrcorderspan"><?php echo JText::_('VRRITIROCAR'); ?>:</span> <?php echo vikrentcar::getPlaceName($row['idplace']); ?><br/>
		<?php } ?>
		<?php if(!empty($row['idreturnplace'])){ ?>
		<span class="vrcorderspan"><?php echo JText::_('VRRETURNCARORD'); ?>:</span> <?php echo vikrentcar::getPlaceName($row['idreturnplace']); ?><br/>
		<?php } ?>
		<br/>
		</td>
		<?php 
		if(!empty($row['idtar'])){
			?>
			<td valign="top" style="padding-left: 30px;">
			<?php
			//vikrentcar 1.6
			if($checkhourscharges > 0 && $aehourschbasp == true) {
				$ret = vikrentcar::applyExtraHoursChargesCar($tar, $row['idcar'], $checkhourscharges, $daysdiff, false, true, true);
				$tar = $ret['return'];
				$calcdays = $ret['days'];
			}
			if($checkhourscharges > 0 && $aehourschbasp == false) {
				$tar = vikrentcar::extraHoursSetPreviousFareCar($tar, $row['idcar'], $checkhourscharges, $daysdiff, true);
				$tar = vikrentcar :: applySeasonsCar($tar, $row['ritiro'], $row['consegna'], $row['idplace']);
				$ret = vikrentcar::applyExtraHoursChargesCar($tar, $row['idcar'], $checkhourscharges, $daysdiff, true, true, true);
				$tar = $ret['return'];
				$calcdays = $ret['days'];
			}else {
				$tar = vikrentcar :: applySeasonsCar($tar, $row['ritiro'], $row['consegna'], $row['idplace']);
			}
			//
			$isdue=vikrentcar::sayCostPlusIva($tar[0]['cost'], $tar[0]['idprice'], $row);
			?>
			<p class="vrcorderpar"><?php echo JText::_('VREDITORDERSEVEN'); ?>:</p>
			&nbsp; <?php echo vikrentcar::getPriceName($tar[0]['idprice']); ?>: <?php echo $currencyname; ?> <?php echo vikrentcar::numberFormat(vikrentcar::sayCostPlusIva($tar[0]['cost'], $tar[0]['idprice'], $row)); ?><br/>
			<?php 
			echo (!empty($tar[0]['attrdata']) ? "&nbsp; ".vikrentcar::getPriceAttr($tar[0]['idprice']).": ".$tar[0]['attrdata']."<br/>" : ""); 
			if (!empty($row['optionals'])) {
				?>
				<p class="vrcorderpar"><?php echo JText::_('VREDITORDEREIGHT'); ?>:</p>
				<?php 
				$stepo=explode(";", $row['optionals']);
				foreach($stepo as $oo){
					if (!empty($oo)) {
						$stept=explode(":", $oo);
						$q="SELECT * FROM `#__vikrentcar_optionals` WHERE `id`='".$stept[0]."';";
						$dbo->setQuery($q);
						$dbo->Query($q);
						if ($dbo->getNumRows() == 1) {
							$actopt = $dbo->loadAssocList();
							$realcost=(intval($actopt[0]['perday'])==1 ? ($actopt[0]['cost'] * $row['days'] * $stept[1]) : ($actopt[0]['cost'] * $stept[1]));
							if($actopt[0]['maxprice'] > 0 && $realcost > $actopt[0]['maxprice']) {
								$realcost=$actopt[0]['maxprice'];
								if(intval($actopt[0]['hmany']) == 1 && intval($stept[1]) > 1) {
									$realcost = $actopt[0]['maxprice'] * $stept[1];
								}
							}
							$tmpopr=vikrentcar::sayOptionalsPlusIva($realcost, $actopt[0]['idiva'], $row);
							$isdue+=$tmpopr;
							echo "&nbsp; ".($stept[1] > 1 ? $stept[1]." " : "").$actopt[0]['name'].": ".$currencyname." ".vikrentcar::numberFormat($tmpopr)."<br/>\n";
						}
					}
				}
			}
			if(!empty($row['idplace']) && !empty($row['idreturnplace'])) {
				$locfee=vikrentcar::getLocFee($row['idplace'], $row['idreturnplace']);
				if($locfee) {
					//VikRentCar 1.7 - Location fees overrides
					if (strlen($locfee['losoverride']) > 0) {
						$arrvaloverrides = array();
						$valovrparts = explode('_', $locfee['losoverride']);
						foreach($valovrparts as $valovr) {
							if (!empty($valovr)) {
								$ovrinfo = explode(':', $valovr);
								$arrvaloverrides[$ovrinfo[0]] = $ovrinfo[1];
							}
						}
						if (array_key_exists($row['days'], $arrvaloverrides)) {
							$locfee['cost'] = $arrvaloverrides[$row['days']];
						}
					}
					//end VikRentCar 1.7 - Location fees overrides
					$locfeecost=intval($locfee['daily']) == 1 ? ($locfee['cost'] * $row['days']) : $locfee['cost'];
					$locfeewith=vikrentcar::sayLocFeePlusIva($locfeecost, $locfee['idiva'], $row);
					$isdue+=$locfeewith;
					?>
					<br/><span class="vrcorderspan"><?php echo JText::_('VREDITORDERTEN'); ?>:</span> <?php echo $currencyname; ?> <?php echo vikrentcar::numberFormat($locfeewith); ?><br/>
					<?php
				}
			}
			//vikrentcar 1.6 coupon
			$usedcoupon = false;
			$origisdue = $isdue;
			if(strlen($row['coupon']) > 0) {
				$usedcoupon = true;
				$expcoupon = explode(";", $row['coupon']);
				$isdue = $isdue - $expcoupon[1];
				?>
				<br/><span class="vrcorderspan"><?php echo JText::_('VRCCOUPON').' '.$expcoupon[2]; ?>:</span> - <?php echo $currencyname; ?> <?php echo vikrentcar::numberFormat($expcoupon[1]); ?><br/>
				<?php
			}
			//
			?>
			<p class="vrcorderpartot"><?php echo JText::_('VREDITORDERNINE'); ?>: <?php echo $currencyname; ?> <?php echo vikrentcar::numberFormat($isdue); ?></p>
			
			<?php if(@is_array($payment)){ ?>
			<span class="vrcorderspan"><?php echo JText::_('VRPAYMENTMETHOD'); ?>:</span> <?php echo $payment['name']; ?>
			<?php } ?>
			
			</td>
		<?php
		} 
		?>
		</tr></table>
		</td></tr>
		</table>
		<input type="hidden" name="task" value="">
		<input type="hidden" name="whereup" value="<?php echo $row['id']; ?>">
		<input type="hidden" name="option" value="<?php echo $option; ?>">
		</form>
		<?php
	}

	function pEditOldOrder ($row, $option) {
		$currencyname=vikrentcar::getCurrencyName();
		$car=vikrentcar::getCarInfo($row['idcar']);
		$dbo = & JFactory :: getDBO();
		$nowdf = vikrentcar::getDateFormat(true);
		if ($nowdf=="%d/%m/%Y") {
			$df='d/m/Y';
		}elseif ($nowdf=="%m/%d/%Y") {
			$df='m/d/Y';
		}else {
			$df='Y/m/d';
		}
		?>
		<form name="adminForm" id="adminForm" action="index.php" method="post">
		<table class="adminform">
		<tr><td width="100%">
		&bull; <b><?php echo JText::_('VREDITORDERONE'); ?></b>: <?php echo date($df.' H:i', $row['ts']); ?><br/>
		&bull; <b><?php echo JText::_('VRSTATUS'); ?></b>: <?php echo ($row['status']=="confirmed" ? "<p class=\"successmade\">".JText::_('VRCONFIRMED')."</p>" : "<p class=\"warn\">".JText::_('VRSTANDBY')."</p>"); ?>
		</td></tr>
		<tr><td width="100%">
		<table><tr><td valign="top">
		<?php if(!empty($row['custdata'])){ ?>
		&bull; <b><?php echo JText::_('VREDITORDERTWO'); ?></b>:<br/>
		<?php echo str_replace("\n", "<br/>", $row['custdata']); } ?><br/>
		&bull; <b><?php echo JText::_('VREDITORDERTHREE'); ?></b>: <?php echo $car['name']; ?><br/>
		&bull; <b><?php echo JText::_('VREDITORDERFOUR'); ?></b>: <?php echo $row['days']; ?><br/>
		&bull; <b><?php echo JText::_('VREDITORDERFIVE'); ?></b>: <?php echo date($df.' H:i', $row['ritiro']); ?><br/>
		&bull; <b><?php echo JText::_('VREDITORDERSIX'); ?></b>: <?php echo date($df.' H:i', $row['consegna']); ?><br/>
		</td>
		<?php 
		if(!empty($row['idtar'])){
			?>
			<td valign="top">
			<?php
			if($row['hourly'] == 1) {
				$q="SELECT * FROM `#__vikrentcar_dispcosthours` WHERE `id`='".$row['idtar']."';";
			}else {
				$q="SELECT * FROM `#__vikrentcar_dispcost` WHERE `id`='".$row['idtar']."';";
			}
			$dbo->setQuery($q);
			$dbo->Query($q);
			if($dbo->getNumRows() == 1) {
				$tar=$dbo->loadAssocList();
				if($row['hourly'] == 1) {
					foreach($tar as $kt => $kv) {
						$tar[$kt]['days'] = 1;
					}
				}
				//vikrentcar 1.6
				$checkhourscharges = 0;
				$hoursdiff = 0;
				$ppickup = $row['ritiro'];
				$prelease = $row['consegna'];
				$secdiff = $prelease - $ppickup;
				$daysdiff = $secdiff / 86400;
				if (is_int($daysdiff)) {
					if ($daysdiff < 1) {
						$daysdiff = 1;
					}
				}else {
					if ($daysdiff < 1) {
						$daysdiff = 1;
						$checkhourly = true;
						$ophours = $secdiff / 3600;
						$hoursdiff = intval(round($ophours));
						if($hoursdiff < 1) {
							$hoursdiff = 1;
						}
					}else {
						$sum = floor($daysdiff) * 86400;
						$newdiff = $secdiff - $sum;
						$maxhmore = vikrentcar :: getHoursMoreRb() * 3600;
						if ($maxhmore >= $newdiff) {
							$daysdiff = floor($daysdiff);
						}else {
							$daysdiff = ceil($daysdiff);
							//vikrentcar 1.6
							$ehours = intval(round(($newdiff - $maxhmore) / 3600));
							$checkhourscharges = $ehours;
							if($checkhourscharges > 0) {
								$aehourschbasp = vikrentcar::applyExtraHoursChargesBasp();
							}
							//
						}
					}
				}
				//
			}else {
				if($row['hourly'] == 1) {
					$q="SELECT * FROM `#__vikrentcar_dispcost` WHERE `id`='".$row['idtar']."';";
					$dbo->setQuery($q);
					$dbo->Query($q);
					$tar=$dbo->loadAssocList();
				}
			}
			//vikrentcar 1.6
			if($checkhourscharges > 0 && $aehourschbasp == true) {
				$ret = vikrentcar::applyExtraHoursChargesCar($tar, $row['idcar'], $checkhourscharges, $daysdiff, false, true, true);
				$tar = $ret['return'];
				$calcdays = $ret['days'];
			}
			if($checkhourscharges > 0 && $aehourschbasp == false) {
				$tar = vikrentcar::extraHoursSetPreviousFareCar($tar, $row['idcar'], $checkhourscharges, $daysdiff, true);
				$tar = vikrentcar :: applySeasonsCar($tar, $row['ritiro'], $row['consegna'], $row['idplace']);
				$ret = vikrentcar::applyExtraHoursChargesCar($tar, $row['idcar'], $checkhourscharges, $daysdiff, true, true, true);
				$tar = $ret['return'];
				$calcdays = $ret['days'];
			}else {
				$tar = vikrentcar :: applySeasonsCar($tar, $row['ritiro'], $row['consegna'], $row['idplace']);
			}
			//
			$isdue=vikrentcar::sayCostPlusIva($tar[0]['cost'], $tar[0]['idprice']);
			?>
			&bull; <b><u><?php echo JText::_('VREDITORDERSEVEN'); ?></u>:</b><br/>
			&bull; <b><?php echo vikrentcar::getPriceName($tar[0]['idprice']); ?>: <?php echo $currencyname; ?> <?php echo vikrentcar::sayCostPlusIva($tar[0]['cost'], $tar[0]['idprice']); ?></b><br/>
			<?php 
			echo (!empty($tar[0]['attrdata']) ? "&bull; <b>".vikrentcar::getPriceAttr($tar[0]['idprice']).": ".$tar[0]['attrdata']."</b><br/>" : ""); 
			if (!empty($row['optionals'])) {
				?>
				<br/>&bull; <b><u><?php echo JText::_('VREDITORDEREIGHT'); ?></u>:</b><br/>
				<?php 
				$stepo=explode(";", $row['optionals']);
				foreach($stepo as $oo){
					if (!empty($oo)) {
						$stept=explode(":", $oo);
						$q="SELECT * FROM `#__vikrentcar_optionals` WHERE `id`='".$stept[0]."';";
						$dbo->setQuery($q);
						$dbo->Query($q);
						if ($dbo->getNumRows() == 1) {
							$actopt = $dbo->loadAssocList();
							$realcost=(intval($actopt[0]['perday'])==1 ? ($actopt[0]['cost'] * $row['days'] * $stept[1]) : ($actopt[0]['cost'] * $stept[1]));
							if($actopt[0]['maxprice'] > 0 && $realcost > $actopt[0]['maxprice']) {
								$realcost=$actopt[0]['maxprice'];
								if(intval($actopt[0]['hmany']) == 1 && intval($stept[1]) > 1) {
									$realcost = $actopt[0]['maxprice'] * $stept[1];
								}
							}
							$tmpopr=vikrentcar::sayOptionalsPlusIva($realcost, $actopt[0]['idiva']);
							$isdue+=$tmpopr;
							echo "&bull; <b>".($stept[1] > 1 ? $stept[1]." " : "").$actopt[0]['name'].": ".$currencyname." ".$tmpopr."</b><br/>\n";
						}
					}
				}
			}
			if(!empty($row['idplace']) && !empty($row['idreturnplace'])) {
				$locfee=vikrentcar::getLocFee($row['idplace'], $row['idreturnplace']);
				if($locfee) {
					//VikRentCar 1.7 - Location fees overrides
					if (strlen($locfee['losoverride']) > 0) {
						$arrvaloverrides = array();
						$valovrparts = explode('_', $locfee['losoverride']);
						foreach($valovrparts as $valovr) {
							if (!empty($valovr)) {
								$ovrinfo = explode(':', $valovr);
								$arrvaloverrides[$ovrinfo[0]] = $ovrinfo[1];
							}
						}
						if (array_key_exists($row['days'], $arrvaloverrides)) {
							$locfee['cost'] = $arrvaloverrides[$row['days']];
						}
					}
					//end VikRentCar 1.7 - Location fees overrides
					$locfeecost=intval($locfee['daily']) == 1 ? ($locfee['cost'] * $row['days']) : $locfee['cost'];
					$locfeewith=vikrentcar::sayLocFeePlusIva($locfeecost, $locfee['idiva']);
					$isdue+=$locfeewith;
					?>
					<br/>&bull; <b><u><?php echo JText::_('VREDITORDERTEN'); ?></u>: <?php echo $currencyname; ?> <?php echo vikrentcar::numberFormat($locfeewith); ?></b><br/>
					<?php
				}
			}
			//vikrentcar 1.6 coupon
			$usedcoupon = false;
			$origisdue = $isdue;
			if(strlen($row['coupon']) > 0) {
				$usedcoupon = true;
				$expcoupon = explode(";", $row['coupon']);
				$isdue = $isdue - $expcoupon[1];
				?>
				<br/>&bull; <b><?php echo JText::_('VRCCOUPON').' '.$expcoupon[2]; ?>: - <?php echo $currencyname; ?> <?php echo vikrentcar::numberFormat($expcoupon[1]); ?></b><br/>
				<?php
			}
			//
			?>
			<br/>&bull; <b><u><?php echo JText::_('VREDITORDERNINE'); ?></u>: <?php echo $currencyname; ?> <?php echo vikrentcar::numberFormat($isdue); ?></b><br/>
			</td>
		<?php
		}
		?>	
		</tr></table>
		</td></tr>
		</table>
		<input type="hidden" name="task" value="">
		<input type="hidden" name="option" value="<?php echo $option; ?>">
		</form>
		<?php
	}
	
	function pNewIva ($option) {
		?>
		<form name="adminForm" id="adminForm" action="index.php" method="post">
		<table class="adminform">
		<tr><td width="200">&bull; <b><?php echo JText::_('VRNEWIVAONE'); ?>:</b> </td><td><input type="text" name="aliqname" value="" size="30"/></td></tr>
		<tr><td width="200">&bull; <b><?php echo JText::_('VRNEWIVATWO'); ?>:</b> </td><td><input type="text" name="aliqperc" value="" size="10"/> %</td></tr>
		</table>
		<input type="hidden" name="task" value="">
		<input type="hidden" name="option" value="<?php echo $option; ?>">
		</form>
		<?php
	}
	
	function pEditIva ($row, $option) {
		?>
		<form name="adminForm" id="adminForm" action="index.php" method="post">
		<table class="adminform">
		<tr><td width="200">&bull; <b><?php echo JText::_('VRNEWIVAONE'); ?>:</b> </td><td><input type="text" name="aliqname" value="<?php echo $row['name']; ?>" size="30"/></td></tr>
		<tr><td width="200">&bull; <b><?php echo JText::_('VRNEWIVATWO'); ?>:</b> </td><td><input type="text" name="aliqperc" value="<?php echo $row['aliq']; ?>" size="10"/> %</td></tr>
		</table>
		<input type="hidden" name="task" value="">
		<input type="hidden" name="whereup" value="<?php echo $row['id']; ?>">
		<input type="hidden" name="option" value="<?php echo $option; ?>">
		</form>
		<?php
	}
	
	function pNewPrice ($option) {
		$dbo = & JFactory :: getDBO();
		$q="SELECT * FROM `#__vikrentcar_iva`;";
		$dbo->setQuery($q);
		$dbo->Query($q);
		if ($dbo->getNumRows() > 0) {
			$ivas=$dbo->loadAssocList();
			$wiva="<select name=\"praliq\">\n";
			foreach($ivas as $iv){
				$wiva.="<option value=\"".$iv['id']."\">".(empty($iv['name']) ? $iv['aliq']."%" : $iv['name']."-".$iv['aliq']."%")."</option>\n";
			}
			$wiva.="</select>\n";
		}else {
			$wiva="<a href=\"index.php?option=com_vikrentcar&task=viewiva\">".JText::_('NESSUNAIVA')."</a>";
		}
		?>
		<form name="adminForm" id="adminForm" action="index.php" method="post">
		<table class="adminform">
		<tr><td width="200">&bull; <b><?php echo JText::_('VRNEWPRICEONE'); ?>:</b> </td><td><input type="text" name="price" value="" size="40"/></td></tr>
		<tr><td width="200">&bull; <b><?php echo JText::_('VRNEWPRICETWO'); ?>:</b> </td><td><input type="text" name="attr" value="" size="40"/></td></tr>
		<tr><td width="200">&bull; <b><?php echo JText::_('VRNEWPRICETHREE'); ?>:</b> </td><td><?php echo $wiva; ?></td></tr>
		</table>
		<input type="hidden" name="task" value="">
		<input type="hidden" name="option" value="<?php echo $option; ?>">
		</form>
		<?php
	}
	
	function pEditPrice ($row, $option) {
		$dbo = & JFactory :: getDBO();
		$q="SELECT * FROM `#__vikrentcar_iva`;";
		$dbo->setQuery($q);
		$dbo->Query($q);
		if ($dbo->getNumRows() > 0) {
			$ivas=$dbo->loadAssocList();
			$wiva="<select name=\"praliq\">\n";
			foreach($ivas as $iv){
				$wiva.="<option value=\"".$iv['id']."\"".($iv['id']==$row['idiva'] ? " selected=\"selected\"" : "").">".(empty($iv['name']) ? $iv['aliq']."%" : $iv['name']."-".$iv['aliq']."%")."</option>\n";
			}
			$wiva.="</select>\n";
		}else {
			$wiva="<a href=\"index.php?option=com_vikrentcar&task=viewiva\">".JText::_('NESSUNAIVA')."</a>";
		}
		?>
		<form name="adminForm" id="adminForm" action="index.php" method="post">
		<table class="adminform">
		<tr><td width="200">&bull; <b><?php echo JText::_('VRNEWPRICEONE'); ?>:</b> </td><td><input type="text" name="price" value="<?php echo $row['name']; ?>" size="40"/></td></tr>
		<tr><td width="200">&bull; <b><?php echo JText::_('VRNEWPRICETWO'); ?>:</b> </td><td><input type="text" name="attr" value="<?php echo $row['attr']; ?>" size="40"/></td></tr>
		<tr><td width="200">&bull; <b><?php echo JText::_('VRNEWPRICETHREE'); ?>:</b> </td><td><?php echo $wiva; ?></td></tr>
		</table>
		<input type="hidden" name="task" value="">
		<input type="hidden" name="whereup" value="<?php echo $row['id']; ?>">
		<input type="hidden" name="option" value="<?php echo $option; ?>">
		</form>
		<?php
	}
	
	function pNewCat ($option) {
		$editor =& JFactory::getEditor();
		?>
		<form name="adminForm" id="adminForm" action="index.php" method="post">
		<table class="adminform">
		<tr><td width="200">&bull; <b><?php echo JText::_('VRNEWCATONE'); ?>:</b> </td><td><input type="text" name="catname" value="" size="40"/></td></tr>
		<tr><td width="200">&bull; <b><?php echo JText::_('VRNEWCATDESCR'); ?>:</b> </td><td><?php echo $editor->display( "descr", "", 400, 200, 70, 20 ); ?></td></tr>
		</table>
		<input type="hidden" name="task" value="">
		<input type="hidden" name="option" value="<?php echo $option; ?>">
		</form>
		<?php
	}
	
	function pEditCat ($row, $option) {
		$editor =& JFactory::getEditor();
		?>
		<form name="adminForm" id="adminForm" action="index.php" method="post">
		<table class="adminform">
		<tr><td width="200">&bull; <b><?php echo JText::_('VRNEWCATONE'); ?>:</b> </td><td><input type="text" name="catname" value="<?php echo $row['name']; ?>" size="40"/></td></tr>
		<tr><td width="200">&bull; <b><?php echo JText::_('VRNEWCATDESCR'); ?>:</b> </td><td><?php echo $editor->display( "descr", $row['descr'], 400, 200, 70, 20 ); ?></td></tr>
		</table>
		<input type="hidden" name="task" value="">
		<input type="hidden" name="whereup" value="<?php echo $row['id']; ?>">
		<input type="hidden" name="option" value="<?php echo $option; ?>">
		</form>
		<?php
	}
	
	function pNewCarat ($option) {
		?>
		<script language="JavaScript" type="text/javascript">
		function showResizeSel() {
			if(document.adminForm.autoresize.checked == true) {
				document.getElementById('resizesel').style.display='block';
			}else {
				document.getElementById('resizesel').style.display='none';
			}
			return true;
		}
		</script>
		<form name="adminForm" id="adminForm" action="index.php" method="post" enctype="multipart/form-data">
		<table class="adminform">
		<tr><td width="200">&bull; <b><?php echo JText::_('VRNEWCARATONE'); ?>:</b> </td><td><input type="text" name="caratname" value="" size="40"/></td></tr>
		<tr><td width="200">&bull; <b><?php echo JText::_('VRNEWCARATTWO'); ?>:</b> </td><td><input type="file" name="caraticon" size="35"/><br/><label for="autoresize"><?php echo JText::_('VRNEWOPTNINE'); ?></label> <input type="checkbox" id="autoresize" name="autoresize" value="1" onclick="showResizeSel();"/> <span id="resizesel" style="display: none;">&nbsp;<?php echo JText::_('VRNEWOPTTEN'); ?>: <input type="text" name="resizeto" value="50" size="3"/> px</span></td></tr>
		<tr><td width="200">&bull; <b><?php echo JText::_('VRNEWCARATTHREE'); ?>:</b> </td><td><input type="text" name="carattextimg" value="" size="40"/></td></tr>
		</table>
		<input type="hidden" name="task" value="">
		<input type="hidden" name="option" value="<?php echo $option; ?>">
		</form>
		<?php
	}
	
	function pEditCarat ($row, $option) {
		?>
		<script language="JavaScript" type="text/javascript">
		function showResizeSel() {
			if(document.adminForm.autoresize.checked == true) {
				document.getElementById('resizesel').style.display='block';
			}else {
				document.getElementById('resizesel').style.display='none';
			}
			return true;
		}
		</script>
		<form name="adminForm" id="adminForm" action="index.php" method="post" enctype="multipart/form-data">
		<table class="adminform">
		<tr><td width="200">&bull; <b><?php echo JText::_('VRNEWCARATONE'); ?>:</b> </td><td><input type="text" name="caratname" value="<?php echo $row['name']; ?>" size="40"/></td></tr>
		<tr><td width="200">&bull; <b><?php echo JText::_('VRNEWCARATTWO'); ?>:</b> </td><td><?php echo (!empty($row['icon']) && file_exists('./components/com_vikrentcar/resources/'.$row['icon']) ? "<img src=\"./components/com_vikrentcar/resources/".$row['icon']."\"/>&nbsp; " : ""); ?><input type="file" name="caraticon" size="35"/><br/><label for="autoresize"><?php echo JText::_('VRNEWOPTNINE'); ?></label> <input type="checkbox" id="autoresize" name="autoresize" value="1" onclick="showResizeSel();"/> <span id="resizesel" style="display: none;">&nbsp;<?php echo JText::_('VRNEWOPTTEN'); ?>: <input type="text" name="resizeto" value="50" size="3"/> px</span></td></tr>
		<tr><td width="200">&bull; <b><?php echo JText::_('VRNEWCARATTHREE'); ?>:</b> </td><td><input type="text" name="carattextimg" value="<?php echo $row['textimg']; ?>" size="40"/></td></tr>
		</table>
		<input type="hidden" name="task" value="">
		<input type="hidden" name="whereup" value="<?php echo $row['id']; ?>">
		<input type="hidden" name="option" value="<?php echo $option; ?>">
		</form>
		<?php
	}
	
	function pNewOptionals ($option) {
		$editor =& JFactory::getEditor();
		$dbo = & JFactory :: getDBO();
		$q="SELECT * FROM `#__vikrentcar_iva`;";
		$dbo->setQuery($q);
		$dbo->Query($q);
		if ($dbo->getNumRows() > 0) {
			$ivas=$dbo->loadAssocList();
			$wiva="<select name=\"optaliq\">\n";
			foreach($ivas as $iv){
				$wiva.="<option value=\"".$iv['id']."\">".(empty($iv['name']) ? $iv['aliq']."%" : $iv['name']."-".$iv['aliq']."%")."</option>\n";
			}
			$wiva.="</select>\n";
		}else {
			$wiva="<a href=\"index.php?option=com_vikrentcar&task=viewiva\">".JText::_('VRNOIVAFOUND')."</a>";
		}
		$currencysymb=vikrentcar::getCurrencySymb(true);
		?>
		<script language="JavaScript" type="text/javascript">
		function showResizeSel() {
			if(document.adminForm.autoresize.checked == true) {
				document.getElementById('resizesel').style.display='block';
			}else {
				document.getElementById('resizesel').style.display='none';
			}
			return true;
		}
		function showForceSel() {
			if(document.adminForm.forcesel.checked == true) {
				document.getElementById('forcevalspan').style.display='block';
			}else {
				document.getElementById('forcevalspan').style.display='none';
			}
			return true;
		}
		</script>
  
		<form name="adminForm" id="adminForm" action="index.php" method="post" enctype="multipart/form-data">
		<table class="adminform">
		<tr><td width="200">&bull; <b><?php echo JText::_('VRNEWOPTONE'); ?>:</b> </td><td><input type="text" name="optname" value="" size="40"/></td></tr>
		<tr><td width="200">&bull; <b><?php echo JText::_('VRNEWOPTTWO'); ?>:</b> </td><td><?php echo $editor->display( "optdescr", "", 400, 200, 70, 20 ); ?></td></tr>
		<tr><td width="200">&bull; <b><?php echo JText::_('VRNEWOPTTHREE'); ?>:</b> </td><td><?php echo $currencysymb; ?> <input type="text" name="optcost" value="" size="10"/></td></tr>
		<tr><td width="200">&bull; <b><?php echo JText::_('VRNEWOPTFOUR'); ?>:</b> </td><td><?php echo $wiva; ?></td></tr>
		<tr><td width="200">&bull; <b><?php echo JText::_('VRNEWOPTFIVE'); ?>:</b> </td><td><input type="checkbox" name="optperday" value="each"/></td></tr>
		<tr><td width="200">&bull; <b><?php echo JText::_('VRNEWOPTEIGHT'); ?>:</b> </td><td><?php echo $currencysymb; ?> <input type="text" name="maxprice" value="" size="4"/></td></tr>
		<tr><td width="200">&bull; <b><?php echo JText::_('VRNEWOPTSIX'); ?>:</b> </td><td><input type="checkbox" name="opthmany" value="yes"/></td></tr>
		<tr><td width="200">&bull; <b><?php echo JText::_('VRCNEWOPTFORCEVALIFDAYS'); ?>:</b> </td><td><input type="text" name="forceifdays" value="0" size="2"/></td></tr>
		<tr><td width="200">&bull; <b><?php echo JText::_('VRNEWOPTSEVEN'); ?>:</b> </td><td><input type="file" name="optimg" size="35"/><br/><label for="autoresize"><?php echo JText::_('VRNEWOPTNINE'); ?></label> <input type="checkbox" id="autoresize" name="autoresize" value="1" onclick="showResizeSel();"/> <span id="resizesel" style="display: none;">&nbsp;<?php echo JText::_('VRNEWOPTTEN'); ?>: <input type="text" name="resizeto" value="50" size="3"/> px</span></td></tr>
		<tr><td width="200" valign="top">&bull; <b><?php echo JText::_('VRCNEWOPTFORCESEL'); ?>:</b> </td><td><input type="checkbox" name="forcesel" value="1" onclick="showForceSel();"/> <span id="forcevalspan" style="display: none;"><?php echo JText::_('VRCNEWOPTFORCEVALT'); ?> <input type="text" name="forceval" value="1" size="2"/><br/><?php echo JText::_('VRCNEWOPTFORCEVALTPDAY'); ?> <input type="checkbox" name="forcevalperday" value="1"/></span></td></tr>
		</table>
		<input type="hidden" name="task" value="">
		<input type="hidden" name="option" value="<?php echo $option; ?>">
		</form>
		<?php
	}
	
	function pEditOptional ($row, $option) {
		$editor =& JFactory::getEditor();
		$dbo = & JFactory :: getDBO();
		$q="SELECT * FROM `#__vikrentcar_iva`;";
		$dbo->setQuery($q);
		$dbo->Query($q);
		if ($dbo->getNumRows() > 0) {
			$ivas=$dbo->loadAssocList();
			$wiva="<select name=\"optaliq\">\n";
			foreach($ivas as $iv){
				$wiva.="<option value=\"".$iv['id']."\"".($row['idiva']==$iv['id'] ? " selected=\"selected\"" : "").">".(empty($iv['name']) ? $iv['aliq']."%" : $iv['name']."-".$iv['aliq']."%")."</option>\n";
			}
			$wiva.="</select>\n";
		}else {
			$wiva="<a href=\"index.php?option=com_vikrentcar&task=viewiva\">".JText::_('VRNOIVAFOUND')."</a>";
		}
		$currencysymb=vikrentcar::getCurrencySymb(true);
		//vikrentcar 1.6
		if(strlen($row['forceval']) > 0) {
			$forceparts = explode("-", $row['forceval']);
			$forcedq = $forceparts[0];
			$forcedqperday = intval($forceparts[1]) == 1 ? true : false;
		}else {
			$forcedq = "1";
			$forcedqperday = false;
		}
		//
		?>
		<script language="JavaScript" type="text/javascript">
		function showResizeSel() {
			if(document.adminForm.autoresize.checked == true) {
				document.getElementById('resizesel').style.display='block';
			}else {
				document.getElementById('resizesel').style.display='none';
			}
			return true;
		}
		function showForceSel() {
			if(document.adminForm.forcesel.checked == true) {
				document.getElementById('forcevalspan').style.display='block';
			}else {
				document.getElementById('forcevalspan').style.display='none';
			}
			return true;
		}
		</script>
		
		<form name="adminForm" id="adminForm" action="index.php" method="post" enctype="multipart/form-data">
		<table class="adminform">
		<tr><td width="200">&bull; <b><?php echo JText::_('VRNEWOPTONE'); ?>:</b> </td><td><input type="text" name="optname" value="<?php echo $row['name']; ?>" size="40"/></td></tr>
		<tr><td width="200">&bull; <b><?php echo JText::_('VRNEWOPTTWO'); ?>:</b> </td><td><?php echo $editor->display( "optdescr", $row['descr'], 400, 200, 70, 20 ); ?></td></tr>
		<tr><td width="200">&bull; <b><?php echo JText::_('VRNEWOPTTHREE'); ?>:</b> </td><td><?php echo $currencysymb; ?> <input type="text" name="optcost" value="<?php echo $row['cost']; ?>" size="10"/></td></tr>
		<tr><td width="200">&bull; <b><?php echo JText::_('VRNEWOPTFOUR'); ?>:</b> </td><td><?php echo $wiva; ?></td></tr>
		<tr><td width="200">&bull; <b><?php echo JText::_('VRNEWOPTFIVE'); ?>:</b> </td><td><input type="checkbox" name="optperday" value="each"<?php echo (intval($row['perday'])==1 ? " checked=\"checked\"" : ""); ?>/></td></tr>
		<tr><td width="200">&bull; <b><?php echo JText::_('VRNEWOPTEIGHT'); ?>:</b> </td><td><?php echo $currencysymb; ?> <input type="text" name="maxprice" value="<?php echo $row['maxprice']; ?>" size="4"/></td></tr>
		<tr><td width="200">&bull; <b><?php echo JText::_('VRNEWOPTSIX'); ?>:</b> </td><td><input type="checkbox" name="opthmany" value="yes"<?php echo (intval($row['hmany'])==1 ? " checked=\"checked\"" : ""); ?>/></td></tr>
		<tr><td width="200">&bull; <b><?php echo JText::_('VRCNEWOPTFORCEVALIFDAYS'); ?>:</b> </td><td><input type="text" name="forceifdays" value="<?php echo $row['forceifdays']; ?>" size="2"/></td></tr>
		<tr><td width="200">&bull; <b><?php echo JText::_('VRNEWOPTSEVEN'); ?>:</b> </td><td><?php echo (!empty($row['img']) && file_exists('./components/com_vikrentcar/resources/'.$row['img']) ? "<img src=\"./components/com_vikrentcar/resources/".$row['img']."\" class=\"maxfifty\"/> &nbsp;" : ""); ?><input type="file" name="optimg" size="35"/><br/><label for="autoresize"><?php echo JText::_('VRNEWOPTNINE'); ?></label> <input type="checkbox" id="autoresize" name="autoresize" value="1" onclick="showResizeSel();"/> <span id="resizesel" style="display: none;">&nbsp;<?php echo JText::_('VRNEWOPTTEN'); ?>: <input type="text" name="resizeto" value="50" size="3"/> px</span></td></tr>
		<tr><td width="200" valign="top">&bull; <b><?php echo JText::_('VRCNEWOPTFORCESEL'); ?>:</b> </td><td><input type="checkbox" name="forcesel" value="1" onclick="showForceSel();"<?php echo (intval($row['forcesel'])==1 ? " checked=\"checked\"" : ""); ?>/> <span id="forcevalspan" style="display: <?php echo (intval($row['forcesel'])==1 ? "block" : "none"); ?>;"><?php echo JText::_('VRCNEWOPTFORCEVALT'); ?> <input type="text" name="forceval" value="<?php echo $forcedq; ?>" size="2"/><br/><?php echo JText::_('VRCNEWOPTFORCEVALTPDAY'); ?> <input type="checkbox" name="forcevalperday" value="1"<?php echo ($forcedqperday == true ? " checked=\"checked\"" : ""); ?>/></span></td></tr>
		</table>
		<input type="hidden" name="task" value="">
		<input type="hidden" name="whereup" value="<?php echo $row['id']; ?>">
		<input type="hidden" name="option" value="<?php echo $option; ?>">
		</form>
		<?php
	}
	
	function pNewCar ($cats, $carats, $optionals, $places, $option) {
		JHTML::_('behavior.tooltip');
		$currencysymb=vikrentcar::getCurrencySymb(true);
		if (is_array($cats)) {
			$wcats="<tr><td width=\"200\">&bull; <b>".JText::_('VRNEWCARONE').":</b> </td><td>";
			$wcats.="<select name=\"ccat[]\" multiple=\"multiple\" size=\"".(count($cats) + 1)."\">";
			foreach($cats as $cat){
				$wcats.="<option value=\"".$cat['id']."\">".$cat['name']."</option>\n";
			}
			$wcats.="</select></td></tr>\n";
		}else {
			$wcats="";
		}
		if (is_array($places)) {
			$wplaces="<tr><td width=\"200\">&bull; <b>".JText::_('VRNEWCARTWO').":</b> </td><td>";
			$wretplaces="<tr><td width=\"200\">&bull; <b>".JText::_('VRNEWCARDROPLOC').":</b> </td><td>";
			$wplaces.="<select name=\"cplace[]\" id=\"cplace\" multiple=\"multiple\" size=\"".(count($places) + 1)."\" onchange=\"vrcSelDropLocation();\">";
			$wretplaces.="<select name=\"cretplace[]\" id=\"cretplace\" multiple=\"multiple\" size=\"".(count($places) + 1)."\">";
			foreach($places as $place){
				$wplaces.="<option value=\"".$place['id']."\">".$place['name']."</option>\n";
				$wretplaces.="<option value=\"".$place['id']."\">".$place['name']."</option>\n";
			}
			$wplaces.="</select></td></tr>\n";
			$wretplaces.="</select></td></tr>\n";
		}else {
			$wplaces="";
			$wretplaces="";
		}
		if (is_array($carats)) {
			$wcarats="<tr><td width=\"200\">&bull; <b>".JText::_('VRNEWCARTHREE').":</b> </td><td>";
			$wcarats.="<table><tr><td valign=\"top\">";
			$nn=0;
			$jj=0;
			foreach($carats as $carat){
				$wcarats.="<input type=\"checkbox\" name=\"ccarat[]\" value=\"".$carat['id']."\"/> ".$carat['name']."<br/>\n";
				$nn++;
				if (($nn % 3) == 0) {
					$jj++;
					if (($jj % 3) == 0) {
						$wcarats.="</td></tr><td valign=\"top\">";
					}else {
						$wcarats.="</td><td valign=\"top\">\n";
					}
				}
			}
			$wcarats.="</td></tr></table>\n";
			$wcarats.="</td></tr>\n";
		}else {
			$wcarats="";
		}
		if (is_array($optionals)) {
			$woptionals="<tr><td width=\"200\">&bull; <b>".JText::_('VRNEWCARFOUR').":</b> </td><td>";
			$woptionals.="<table><tr><td valign=\"top\">";
			$nn=0;
			$jj=0;
			foreach($optionals as $optional){
				$woptionals.="<input type=\"checkbox\" name=\"coptional[]\" value=\"".$optional['id']."\"/> ".$optional['name']." ".$currencysymb."".$optional['cost']."<br/>\n";
				$nn++;
				if (($nn % 3) == 0) {
					$jj++;
					if (($jj % 3) == 0) {
						$woptionals.="</td></tr><td valign=\"top\">";
					}else {
						$woptionals.="</td><td valign=\"top\">\n";
					}
				}
			}
			$woptionals.="</td></tr></table>\n";
			$woptionals.="</td></tr>\n";
		}else {
			$woptionals="";
		}
		$editor =& JFactory::getEditor();
		?>
		<script language="JavaScript" type="text/javascript">
		function showResizeSel() {
			if(document.adminForm.autoresize.checked == true) {
				document.getElementById('resizesel').style.display='block';
			}else {
				document.getElementById('resizesel').style.display='none';
			}
			return true;
		}
		function vrcSelDropLocation() {
			var picksel = document.getElementById('cplace');
			var dropsel = document.getElementById('cretplace');
			for(i = 0; i < picksel.length; i++) {
				if(picksel.options[i].selected == false) {
					if(dropsel.options[i].selected == true) {
						dropsel.options[i].selected = false;
					}
				}else {
					if(dropsel.options[i].selected == false) {
						dropsel.options[i].selected = true;
					}
				}
			}
		}
		function showResizeSelMore() {
			if(document.adminForm.autoresizemore.checked == true) {
				document.getElementById('resizeselmore').style.display='block';
			}else {
				document.getElementById('resizeselmore').style.display='none';
			}
			return true;
		}
		function addMoreImages() {
			var ni = document.getElementById('myDiv');
			var numi = document.getElementById('moreimagescounter');
			var num = (document.getElementById('moreimagescounter').value -1)+ 2;
			numi.value = num;
			var newdiv = document.createElement('div');
			var divIdName = 'my'+num+'Div';
			newdiv.setAttribute('id',divIdName);
			newdiv.innerHTML = '<input type=\'file\' name=\'cimgmore[]\' size=\'35\'/><br/>';
			ni.appendChild(newdiv);
		}
		</script>
		<input type="hidden" value="0" id="moreimagescounter" />
		
		<form name="adminForm" id="adminForm" action="index.php" method="post" enctype="multipart/form-data">
		<table class="adminform">
		<tr><td width="200">&bull; <b><?php echo JText::_('VRNEWCARFIVE'); ?>:</b> </td><td><input type="text" name="cname" value="" size="40"/></td></tr>
		<tr><td width="200" valign="top">&bull; <b><?php echo JText::_('VRNEWCARSIX'); ?>:</b> </td><td><input type="file" name="cimg" size="35"/><br/><label for="autoresize"><?php echo JText::_('VRNEWOPTNINE'); ?></label> <input type="checkbox" id="autoresize" name="autoresize" value="1" onclick="showResizeSel();"/> <span id="resizesel" style="display: none;">&nbsp;<?php echo JText::_('VRNEWOPTTEN'); ?>: <input type="text" name="resizeto" value="250" size="3"/> px</span></td></tr>
		<tr><td width="200" valign="top">&bull; <b><?php echo JText::_('VRMOREIMAGES'); ?>:</b><br/>&nbsp;&nbsp;<a href="javascript: void(0);" onclick="addMoreImages();"><?php echo JText::_('VRADDIMAGES'); ?></a></td><td><input type="file" name="cimgmore[]" size="35"/><div id="myDiv" style="display: block;"></div><label for="autoresizemore"><?php echo JText::_('VRRESIZEIMAGES'); ?></label> <input type="checkbox" id="autoresizemore" name="autoresizemore" value="1" onclick="showResizeSelMore();"/> <span id="resizeselmore" style="display: none;">&nbsp;<?php echo JText::_('VRNEWOPTTEN'); ?>: <input type="text" name="resizetomore" value="600" size="3"/> px</span></td></tr>
		<?php echo $wcats; ?>
		<tr><td width="200">&bull; <b><?php echo JText::_('VRNEWCARSEVEN'); ?>:</b> </td><td><?php echo $editor->display( "cdescr", "", 400, 200, 70, 20 ); ?></td></tr>
		<?php echo $wplaces; ?>
		<?php echo $wretplaces; ?>
		<?php echo $wcarats; ?>
		<?php echo $woptionals; ?>
		<tr><td width="200">&bull; <b><?php echo JText::_('VRNEWCARNINE'); ?>:</b> </td><td><input type="text" name="units" value="1" size="3" onfocus="this.select();"/></td></tr>
		<tr><td width="200">&bull; <b><?php echo JText::_('VRCUSTSTARTINGFROM'); ?>:</b> </td><td><input type="text" name="startfrom" value="" size="4"/> <?php echo $currencysymb; ?> &nbsp;&nbsp; <?php echo JHTML::tooltip(JText::_('VRCUSTSTARTINGFROMHELP'), JText::_('VRCUSTSTARTINGFROM'), 'tooltip.png', ''); ?></td></tr>
		<tr><td width="200">&bull; <b><?php echo JText::_('VRNEWCAREIGHT'); ?>:</b> </td><td><input type="checkbox" name="cavail" value="yes" checked="checked"/></td></tr>
		</table>
		<input type="hidden" name="task" value="">
		<input type="hidden" name="option" value="<?php echo $option; ?>">
		</form>
		<?php
	}
	
	function pEditCar ($row, $cats, $carats, $optionals, $places, $option) {
		JHTML::_('behavior.tooltip');
		$currencysymb=vikrentcar::getCurrencySymb(true);
		$arrcats=array();
		$arrcarats=array();
		$arropts=array();
		$oldcats=explode(";", $row['idcat']);
		foreach($oldcats as $oc){
			if (!empty($oc)) {
				$arrcats[$oc]=$oc;
			}
		}
		$oldcarats=explode(";", $row['idcarat']);
		foreach($oldcarats as $ocr){
			if (!empty($ocr)) {
				$arrcarats[$ocr]=$ocr;
			}
		}
		$oldopts=explode(";", $row['idopt']);
		foreach($oldopts as $oopt){
			if (!empty($oopt)) {
				$arropts[$oopt]=$oopt;
			}
		}
		if (is_array($cats)) {
			$wcats="<tr><td width=\"200\">&bull; <b>".JText::_('VRNEWCARONE').":</b> </td><td>";
			$wcats.="<select name=\"ccat[]\" multiple=\"multiple\" size=\"".(count($cats) + 1)."\">";
			foreach($cats as $cat){
				$wcats.="<option value=\"".$cat['id']."\"".(array_key_exists($cat['id'], $arrcats) ? " selected=\"selected\"" : "").">".$cat['name']."</option>\n";
			}
			$wcats.="</select></td></tr>\n";
		}else {
			$wcats="";
		}
		if (is_array($places)) {
			$wplaces="<tr><td width=\"200\">&bull; <b>".JText::_('VRNEWCARTWO').":</b> </td><td>";
			$wretplaces="<tr><td width=\"200\">&bull; <b>".JText::_('VRNEWCARDROPLOC').":</b> </td><td>";
			$wplaces.="<select name=\"cplace[]\" id=\"cplace\" multiple=\"multiple\" size=\"".(count($places) + 1)."\" onchange=\"vrcSelDropLocation();\">";
			$wretplaces.="<select name=\"cretplace[]\" id=\"cretplace\" multiple=\"multiple\" size=\"".(count($places) + 1)."\">";
			$actplac=explode(";", $row['idplace']);
			$actretplac=explode(";", $row['idretplace']);
			foreach($places as $place){
				$wplaces.="<option value=\"".$place['id']."\"".(in_array($place['id'], $actplac) ? " selected=\"selected\"" : "").">".$place['name']."</option>\n";
				$wretplaces.="<option value=\"".$place['id']."\"".(in_array($place['id'], $actretplac) ? " selected=\"selected\"" : "").">".$place['name']."</option>\n";
			}
			$wplaces.="</select></td></tr>\n";
			$wretplaces.="</select></td></tr>\n";
		}else {
			$wplaces="";
			$wretplaces="";
		}
		if (is_array($carats)) {
			$wcarats="<tr><td width=\"200\">&bull; <b>".JText::_('VRNEWCARTHREE').":</b> </td><td>";
			$wcarats.="<table><tr><td valign=\"top\">";
			$nn=0;
			$jj=0;
			foreach($carats as $carat){
				$wcarats.="<input type=\"checkbox\" name=\"ccarat[]\" value=\"".$carat['id']."\"".(array_key_exists($carat['id'], $arrcarats) ? " checked=\"checked\"" : "")."/> ".$carat['name']."<br/>\n";
				$nn++;
				if (($nn % 3) == 0) {
					$jj++;
					if (($jj % 3) == 0) {
						$wcarats.="</td></tr><td valign=\"top\">";
					}else {
						$wcarats.="</td><td valign=\"top\">\n";
					}
				}
			}
			$wcarats.="</td></tr></table>\n";
			$wcarats.="</td></tr>\n";
		}else {
			$wcarats="";
		}
		if (is_array($optionals)) {
			$woptionals="<tr><td width=\"200\">&bull; <b>".JText::_('VRNEWCARFOUR').":</b> </td><td>";
			$woptionals.="<table><tr><td valign=\"top\">";
			$nn=0;
			$jj=0;
			foreach($optionals as $optional){
				$woptionals.="<input type=\"checkbox\" name=\"coptional[]\" value=\"".$optional['id']."\"".(array_key_exists($optional['id'], $arropts) ? " checked=\"checked\"" : "")."/> ".$optional['name']." ".$currencysymb."".$optional['cost']."<br/>\n";
				$nn++;
				if (($nn % 3) == 0) {
					$jj++;
					if (($jj % 3) == 0) {
						$woptionals.="</td></tr><td valign=\"top\">";
					}else {
						$woptionals.="</td><td valign=\"top\">\n";
					}
				}
			}
			$woptionals.="</td></tr></table>\n";
			$woptionals.="</td></tr>\n";
		}else {
			$woptionals="";
		}
		//more images
		$morei=explode(';;', $row['moreimgs']);
		$actmoreimgs="";
		if(@count($morei) > 0) {
			$notemptymoreim=false;
			foreach($morei as $ki => $mi) {
				if(!empty($mi)) {
					$notemptymoreim=true;
					$actmoreimgs.='<div style="float: left; margin-right: 5px;">';
					$actmoreimgs.='<img src="./components/com_vikrentcar/resources/thumb_'.$mi.'" class="maxfifty"/>';
					$actmoreimgs.='<a style="margin-left: -20px;width: 30px;z-index: 100;" href="index.php?option=com_vikrentcar&task=removemoreimgs&carid='.$row['id'].'&imgind='.$ki.'"><img src="./components/com_vikrentcar/remove.png" style="border: 0;"/></a>';
					$actmoreimgs.='</div>';
				}
			}
			if($notemptymoreim) {
				$actmoreimgs.='<br clear="all"/>';
			}
		}
		//end more images
		$editor =& JFactory::getEditor();
		?>
		<script language="JavaScript" type="text/javascript">
		function showResizeSel() {
			if(document.adminForm.autoresize.checked == true) {
				document.getElementById('resizesel').style.display='block';
			}else {
				document.getElementById('resizesel').style.display='none';
			}
			return true;
		}
		function vrcSelDropLocation() {
			var picksel = document.getElementById('cplace');
			var dropsel = document.getElementById('cretplace');
			for(i = 0; i < picksel.length; i++) {
				if(picksel.options[i].selected == false) {
					if(dropsel.options[i].selected == true) {
						dropsel.options[i].selected = false;
					}
				}else {
					if(dropsel.options[i].selected == false) {
						dropsel.options[i].selected = true;
					}
				}
			}
		}
		function showResizeSelMore() {
			if(document.adminForm.autoresizemore.checked == true) {
				document.getElementById('resizeselmore').style.display='block';
			}else {
				document.getElementById('resizeselmore').style.display='none';
			}
			return true;
		}
		function addMoreImages() {
			var ni = document.getElementById('myDiv');
			var numi = document.getElementById('moreimagescounter');
			var num = (document.getElementById('moreimagescounter').value -1)+ 2;
			numi.value = num;
			var newdiv = document.createElement('div');
			var divIdName = 'my'+num+'Div';
			newdiv.setAttribute('id',divIdName);
			newdiv.innerHTML = '<input type=\'file\' name=\'cimgmore[]\' size=\'35\'/><br/>';
			ni.appendChild(newdiv);
		}
		</script>
		<input type="hidden" value="0" id="moreimagescounter" />
		
		<form name="adminForm" id="adminForm" action="index.php" method="post" enctype="multipart/form-data">
		<table class="adminform">
		<tr><td width="200">&bull; <b><?php echo JText::_('VRNEWCARFIVE'); ?>:</b> </td><td><input type="text" name="cname" value="<?php echo $row['name']; ?>" size="40"/></td></tr>
		<tr><td width="200" valign="top">&bull; <b><?php echo JText::_('VRNEWCARSIX'); ?>:</b> </td><td><?php echo (!empty($row['img']) && file_exists('./components/com_vikrentcar/resources/'.$row['img']) ? "<img src=\"./components/com_vikrentcar/resources/".$row['img']."\" class=\"maxfifty\"/> &nbsp;" : ""); ?><input type="file" name="cimg" size="35"/><br/><label for="autoresize"><?php echo JText::_('VRNEWOPTNINE'); ?></label> <input type="checkbox" id="autoresize" name="autoresize" value="1" onclick="showResizeSel();"/> <span id="resizesel" style="display: none;">&nbsp;<?php echo JText::_('VRNEWOPTTEN'); ?>: <input type="text" name="resizeto" value="250" size="3"/> px</span></td></tr>
		<tr><td width="200" valign="top">&bull; <b><?php echo JText::_('VRMOREIMAGES'); ?>:</b><br/>&nbsp;&nbsp;<a href="javascript: void(0);" onclick="addMoreImages();"><?php echo JText::_('VRADDIMAGES'); ?></a></td><td><?php echo $actmoreimgs; ?><input type="file" name="cimgmore[]" size="35"/><div id="myDiv" style="display: block;"></div><label for="autoresizemore"><?php echo JText::_('VRRESIZEIMAGES'); ?></label> <input type="checkbox" id="autoresizemore" name="autoresizemore" value="1" onclick="showResizeSelMore();"/> <span id="resizeselmore" style="display: none;">&nbsp;<?php echo JText::_('VRNEWOPTTEN'); ?>: <input type="text" name="resizetomore" value="600" size="3"/> px</span></td></tr>
		<?php echo $wcats; ?>
		<tr><td width="200">&bull; <b><?php echo JText::_('VRNEWCARSEVEN'); ?>:</b> </td><td><?php echo $editor->display( "cdescr", $row['info'], 400, 200, 70, 20 ); ?></td></tr>
		<?php echo $wplaces; ?>
		<?php echo $wretplaces; ?>
		<?php echo $wcarats; ?>
		<?php echo $woptionals; ?>
		<tr><td width="200">&bull; <b><?php echo JText::_('VRNEWCARNINE'); ?>:</b> </td><td><input type="text" name="units" value="<?php echo $row['units']; ?>" size="3" onfocus="this.select();"/></td></tr>
		<tr><td width="200">&bull; <b><?php echo JText::_('VRCUSTSTARTINGFROM'); ?>:</b> </td><td><input type="text" name="startfrom" value="<?php echo $row['startfrom']; ?>" size="4"/> <?php echo $currencysymb; ?> &nbsp;&nbsp; <?php echo JHTML::tooltip(JText::_('VRCUSTSTARTINGFROMHELP'), JText::_('VRCUSTSTARTINGFROM'), 'tooltip.png', ''); ?></td></tr>
		<tr><td width="200">&bull; <b><?php echo JText::_('VRNEWCAREIGHT'); ?>:</b> </td><td><input type="checkbox" name="cavail" value="yes"<?php echo (intval($row['avail'])==1 ? " checked=\"checked\"" : ""); ?>/></td></tr>
		</table>
		<input type="hidden" name="task" value="">
		<input type="hidden" name="whereup" value="<?php echo $row['id']; ?>">
		<input type="hidden" name="actmoreimgs" value="<?php echo $row['moreimgs']; ?>">
		<input type="hidden" name="option" value="<?php echo $option; ?>">
		</form>
		<?php
	}
	
	function pViewTariffe ($carrows, $rows, $option) {
		
		if(empty($rows)){
			?>
			<p><?php echo JText::_('VRNOTARFOUND'); ?></p>
			<form name="adminForm" id="adminForm" action="index.php" method="post">
			<input type="hidden" name="task" value="">
			<input type="hidden" name="option" value="<?php echo $option; ?>">
			</form>
			<?php
		}else{
			$mainframe =& JFactory::getApplication();
			$lim = $mainframe->getUserStateFromRequest("$option.limit", 'limit', $mainframe->getCfg('list_limit'), 'int');
			$lim0 = JRequest::getVar('limitstart', 0, '', 'int');
			$allpr = array();
			$tottar = array();
			foreach($rows as $r){
				$allpr[$r['idprice']]=vikrentcar::getPriceAttr($r['idprice']);
				$tottar[$r['days']][]=$r;
			}
			$prord = array();
			$prvar = '';
			foreach($allpr as $kap=>$ap){
				$prord[]=$kap;
				$prvar.="<th class=\"title center\" width=\"150\">".vikrentcar::getPriceName($kap).(!empty($ap) ? " - ".$ap : "")."</th>\n";
			}
			$totrows = count($tottar);
			$tottar = array_slice($tottar, $lim0, $lim, true);
			?>
   <script language="JavaScript" type="text/javascript">
function submitbutton(pressbutton) {
			var form = document.adminForm;
			if (pressbutton == 'removetariffe') {
				if (confirm('<?php echo JText::_('VRJSDELTAR'); ?> ?')){
					submitform( pressbutton );
					return;
				}else{
					return false;
				}
			}

			// do field validation
			try {
				document.adminForm.onsubmit();
			}
			catch(e){}
			submitform( pressbutton );
		}
</script>
   <div id="overDiv" style="position:absolute; visibility:hidden; z-index:1000;"></div>
	<script type="text/javascript" src="../includes/js/overlib_mini.js"></script>

	<form action="index.php?option=com_vikrentcar" method="post" name="adminForm" id="adminForm">
	<table cellpadding="4" cellspacing="0" border="0" width="100%" class="table table-striped">
		<tr>
			<th class="title left" style="text-align: left;" width="100"><?php echo JText::_( 'VRPVIEWTARONE' ); ?></th>
			<?php echo $prvar; ?>
			<th width="20" class="title right" style="text-align: right;">
				<input type="submit" name="modtar" value="<?php echo JText::_( 'VRPVIEWTARTWO' ); ?>" onclick="javascript: document.adminForm.task.value = 'cars';"/> &nbsp; <input type="checkbox" onclick="Joomla.checkAll(this)" value="" name="checkall-toggle">
			</th>
		</tr>
		<?php
		$k = 0;
		$i = 0;
		foreach($tottar as $kt=>$vt){
			
			?>
			<tr class="row<?php echo $k; ?>">
				<td class="left"><?php echo $kt; ?></td>
			<?php
			foreach($prord as $ord){
				$thereis=false;
				foreach($vt as $kkkt=>$vvv){
					if ($vvv['idprice']==$ord) {
						$multiid.=$vvv['id'].";";
//						echo "<td>".$vvv['cost'].(!empty($vvv['attrdata'])? " - ".$vvv['attrdata'] : "")."</td>\n";
						echo "<td class=\"center\"><input type=\"text\" name=\"cost".$vvv['id']."\" value=\"".$vvv['cost']."\" size=\"5\"/>".(!empty($vvv['attrdata'])? " - <input type=\"text\" name=\"attr".$vvv['id']."\" value=\"".$vvv['attrdata']."\" size=\"10\"/>" : "")."</td>\n";
						$thereis=true;
						break;
					}
				}
				
				if (!$thereis) {
					echo "<td></td>\n";
				}
				unset($thereis);
				
			}
			
			?>
			<td class="right" style="text-align: right;"><input type="checkbox" id="cb<?php echo $i;?>" name="cid[]" value="<?php echo $multiid; ?>" onclick="Joomla.isChecked(this.checked);"></td>
            </tr>
            <?php
			unset($multiid);
			$k = 1 - $k;
			$i++;
		}
		
		?>
		
		</table>
		<input type="hidden" name="carid" value="<?php echo $carrows['id']; ?>" />
		<input type="hidden" name="cid[]" value="<?php echo $carrows['id']; ?>" />
		<input type="hidden" name="option" value="<?php echo $option; ?>" />
		<input type="hidden" name="task" value="viewtariffe" />
		<input type="hidden" name="boxchecked" value="0" />
		<?php echo JHTML::_( 'form.token' ); ?>
		<?php
		jimport('joomla.html.pagination');
		$pageNav = new JPagination( $totrows, $lim0, $lim );
		$navbut="<table align=\"center\"><tr><td>".$pageNav->getListFooter()."</td></tr></table>";
		echo $navbut;
		?>
	</form>
	<?php
		}
		
	}
	
	function pViewTariffeHours ($carrows, $rows, $option) {
		
		if(empty($rows)){
			?>
			<p><?php echo JText::_('VRNOTARFOUND'); ?></p>
			<form name="adminForm" id="adminForm" action="index.php" method="post">
			<input type="hidden" name="task" value="">
			<input type="hidden" name="option" value="<?php echo $option; ?>">
			</form>
			<?php
		}else{
			$mainframe =& JFactory::getApplication();
			$lim = $mainframe->getUserStateFromRequest("$option.limit", 'limit', $mainframe->getCfg('list_limit'), 'int');
			$lim0 = JRequest::getVar('limitstart', 0, '', 'int');
			$allpr = array();
			$tottar = array();
			foreach($rows as $r){
				$allpr[$r['idprice']]=vikrentcar::getPriceAttr($r['idprice']);
				$tottar[$r['hours']][]=$r;
			}
			$prord = array();
			$prvar = '';
			foreach($allpr as $kap=>$ap){
				$prord[]=$kap;
				$prvar.="<th class=\"title center\" width=\"150\">".vikrentcar::getPriceName($kap).(!empty($ap) ? " - ".$ap : "")."</th>\n";
			}
			$totrows = count($tottar);
			$tottar = array_slice($tottar, $lim0, $lim, true);
			?>
   <script language="JavaScript" type="text/javascript">
function submitbutton(pressbutton) {
			var form = document.adminForm;
			if (pressbutton == 'removetariffehours') {
				if (confirm('<?php echo JText::_('VRJSDELTAR'); ?> ?')){
					submitform( pressbutton );
					return;
				}else{
					return false;
				}
			}

			// do field validation
			try {
				document.adminForm.onsubmit();
			}
			catch(e){}
			submitform( pressbutton );
		}
</script>
   <div id="overDiv" style="position:absolute; visibility:hidden; z-index:1000;"></div>
	<script type="text/javascript" src="../includes/js/overlib_mini.js"></script>

	<form action="index.php?option=com_vikrentcar" method="post" name="adminForm" id="adminForm">
	<table cellpadding="4" cellspacing="0" border="0" width="100%" class="table table-striped">
		<tr>
			<th class="title left" style="text-align: left;" width="100"><?php echo JText::_( 'VRCPVIEWTARHOURS' ); ?></th>
			<?php echo $prvar; ?>
			<th width="20" class="title right" style="text-align: right;">
				<input type="submit" name="modtarhours" value="<?php echo JText::_( 'VRPVIEWTARTWO' ); ?>" onclick="javascript: document.adminForm.task.value = 'cars';"/> &nbsp; <input type="checkbox" onclick="Joomla.checkAll(this)" value="" name="checkall-toggle">
			</th>
		</tr>
		<?php
		$k = 0;
		$i = 0;
		foreach($tottar as $kt=>$vt){
			
			?>
			<tr class="row<?php echo $k; ?>">
				<td><?php echo $kt; ?> H</td>
			<?php
			foreach($prord as $ord){
				$thereis=false;
				foreach($vt as $kkkt=>$vvv){
					if ($vvv['idprice']==$ord) {
						$multiid.=$vvv['id'].";";
						echo "<td class=\"center\"><input type=\"text\" name=\"cost".$vvv['id']."\" value=\"".$vvv['cost']."\" size=\"5\"/>".(!empty($vvv['attrdata'])? " - <input type=\"text\" name=\"attr".$vvv['id']."\" value=\"".$vvv['attrdata']."\" size=\"10\"/>" : "")."</td>\n";
						$thereis=true;
						break;
					}
				}
				
				if (!$thereis) {
					echo "<td></td>\n";
				}
				unset($thereis);
				
			}
			
			?>
			<td class="right" style="text-align: right;"><input type="checkbox" id="cb<?php echo $i;?>" name="cid[]" value="<?php echo $multiid; ?>" onclick="Joomla.isChecked(this.checked);"></td>
            </tr>
            <?php
			unset($multiid);
			$k = 1 - $k;
			$i++;
		}
		
		?>
		
		</table>
		<input type="hidden" name="carid" value="<?php echo $carrows['id']; ?>" />
		<input type="hidden" name="cid[]" value="<?php echo $carrows['id']; ?>" />
		<input type="hidden" name="option" value="<?php echo $option; ?>" />
		<input type="hidden" name="task" value="viewtariffehours" />
		<input type="hidden" name="boxchecked" value="0" />
		<?php echo JHTML::_( 'form.token' ); ?>
		<?php
		jimport('joomla.html.pagination');
		$pageNav = new JPagination( $totrows, $lim0, $lim );
		$navbut="<table align=\"center\"><tr><td>".$pageNav->getListFooter()."</td></tr></table>";
		echo $navbut;
		?>
	</form>
	<?php
		}
		
	}
	
	function pViewHoursCharges ($carrows, $rows, $option) {
		
		if(empty($rows)){
			?>
			<p><?php echo JText::_('VRNOTARFOUND'); ?></p>
			<form name="adminForm" id="adminForm" action="index.php" method="post">
			<input type="hidden" name="task" value="">
			<input type="hidden" name="option" value="<?php echo $option; ?>">
			</form>
			<?php
		}else{
			$mainframe =& JFactory::getApplication();
			$lim = $mainframe->getUserStateFromRequest("$option.limit", 'limit', $mainframe->getCfg('list_limit'), 'int');
			$lim0 = JRequest::getVar('limitstart', 0, '', 'int');
			$allpr = array();
			$tottar = array();
			foreach($rows as $r){
				$allpr[$r['idprice']]=vikrentcar::getPriceAttr($r['idprice']);
				$tottar[$r['ehours']][]=$r;
			}
			$prord = array();
			$prvar = '';
			foreach($allpr as $kap=>$ap){
				$prord[]=$kap;
				$prvar.="<th class=\"title center\" width=\"150\">".vikrentcar::getPriceName($kap)."</th>\n";
			}
			$totrows = count($tottar);
			$tottar = array_slice($tottar, $lim0, $lim, true);
			?>
   <script language="JavaScript" type="text/javascript">
function submitbutton(pressbutton) {
			var form = document.adminForm;
			if (pressbutton == 'removetariffehours') {
				if (confirm('<?php echo JText::_('VRJSDELTAR'); ?> ?')){
					submitform( pressbutton );
					return;
				}else{
					return false;
				}
			}

			// do field validation
			try {
				document.adminForm.onsubmit();
			}
			catch(e){}
			submitform( pressbutton );
		}
</script>
   <div id="overDiv" style="position:absolute; visibility:hidden; z-index:1000;"></div>
	<script type="text/javascript" src="../includes/js/overlib_mini.js"></script>

	<form action="index.php?option=com_vikrentcar" method="post" name="adminForm" id="adminForm">
	<table cellpadding="4" cellspacing="0" border="0" width="100%" class="table table-striped">
		<tr>
			<th class="title left" style="text-align: left;" width="100"><?php echo JText::_( 'VRCPVIEWTARHOURS' ); ?></th>
			<?php echo $prvar; ?>
			<th width="20" class="title right" style="text-align: right;">
				<input type="submit" name="modtarhourscharges" value="<?php echo JText::_( 'VRPVIEWTARTWO' ); ?>" onclick="javascript: document.adminForm.task.value = 'cars';"/> &nbsp; <input type="checkbox" onclick="Joomla.checkAll(this)" value="" name="checkall-toggle">
			</th>
		</tr>
		<?php
		$k = 0;
		$i = 0;
		foreach($tottar as $kt=>$vt){
			
			?>
			<tr class="row<?php echo $k; ?>">
				<td><?php echo $kt; ?> H</td>
			<?php
			foreach($prord as $ord){
				$thereis=false;
				foreach($vt as $kkkt=>$vvv){
					if ($vvv['idprice']==$ord) {
						$multiid.=$vvv['id'].";";
						echo "<td class=\"center\"><input type=\"text\" name=\"cost".$vvv['id']."\" value=\"".$vvv['cost']."\" size=\"5\"/></td>\n";
						$thereis=true;
						break;
					}
				}
				
				if (!$thereis) {
					echo "<td></td>\n";
				}
				unset($thereis);
				
			}
			
			?>
			<td class="right" style="text-align: right;"><input type="checkbox" id="cb<?php echo $i;?>" name="cid[]" value="<?php echo $multiid; ?>" onclick="Joomla.isChecked(this.checked);"></td>
            </tr>
            <?php
			unset($multiid);
			$k = 1 - $k;
			$i++;
		}
		
		?>
		
		</table>
		<input type="hidden" name="carid" value="<?php echo $carrows['id']; ?>" />
		<input type="hidden" name="cid[]" value="<?php echo $carrows['id']; ?>" />
		<input type="hidden" name="option" value="<?php echo $option; ?>" />
		<input type="hidden" name="task" value="viewhourscharges" />
		<input type="hidden" name="boxchecked" value="0" />
		<?php echo JHTML::_( 'form.token' ); ?>
		<?php
		jimport('joomla.html.pagination');
		$pageNav = new JPagination( $totrows, $lim0, $lim );
		$navbut="<table align=\"center\"><tr><td>".$pageNav->getListFooter()."</td></tr></table>";
		echo $navbut;
		?>
	</form>
	<?php
		}
		
	}
	
	function pViewConfigOne () {
		$timeopst=vikrentcar::getTimeOpenStore(true);
		if (is_array($timeopst) && $timeopst[0]!=$timeopst[1]) {
			$wtos="<input type=\"checkbox\" name=\"timeopenstorealw\" value=\"yes\"/> ".JText::_('VRCONFIGONEONE')."<br/><br/><b>".JText::_('VRCONFIGONETWO')."</b>:<br/><table><tr><td valign=\"top\">".JText::_('VRCONFIGONETHREE')."</td><td><select name=\"timeopenstorefh\">";
			$openat=vikrentcar::getHoursMinutes($timeopst[0]);
			for($i=0; $i <= 23; $i++){
				if ($i < 10) {
					$in="0".$i;
				}else {
					$in=$i;
				}
				$stat=($openat[0]==$i ? " selected=\"selected\"" : "");
				$wtos.="<option value=\"".$i."\"".$stat.">".$in."</option>\n";
			}
			$wtos.="</select> <select name=\"timeopenstorefm\">";
			for($i=0; $i <= 59; $i++){
				if ($i < 10) {
					$in="0".$i;
				}else {
					$in=$i;
				}
				$stat=($openat[1]==$i ? " selected=\"selected\"" : "");
				$wtos.="<option value=\"".$i."\"".$stat.">".$in."</option>\n";
			}
			$wtos.="</select></td></tr><tr><td>".JText::_('VRCONFIGONEFOUR')."</td><td><select name=\"timeopenstoreth\">";
			$closeat=vikrentcar::getHoursMinutes($timeopst[1]);
			for($i=0; $i <= 23; $i++){
				if ($i < 10) {
					$in="0".$i;
				}else {
					$in=$i;
				}
				$stat=($closeat[0]==$i ? " selected=\"selected\"" : "");
				$wtos.="<option value=\"".$i."\"".$stat.">".$in."</option>\n";
			}
			$wtos.="</select> <select name=\"timeopenstoretm\">";
			for($i=0; $i <= 59; $i++){
				if ($i < 10) {
					$in="0".$i;
				}else {
					$in=$i;
				}
				$stat=($closeat[1]==$i ? " selected=\"selected\"" : "");
				$wtos.="<option value=\"".$i."\"".$stat.">".$in."</option>\n";
			}
			$wtos.="</select></td></tr></table>";
		}else {
			$wtos="<input type=\"checkbox\" name=\"timeopenstorealw\" value=\"yes\" checked=\"checked\"/> ".JText::_('VRCONFIGONEONE')."<br/><br/><b>".JText::_('VRCONFIGONETWO')."</b>:<br/><table><tr><td valign=\"top\">".JText::_('VRCONFIGONETHREE')."</td><td><select name=\"timeopenstorefh\">";
			for($i=0; $i <= 23; $i++){
				if ($i < 10) {
					$in="0".$i;
				}else {
					$in=$i;
				}
				$wtos.="<option value=\"".$i."\">".$in."</option>\n";
			}
			$wtos.="</select> <select name=\"timeopenstorefm\">";
			for($i=0; $i <= 59; $i++){
				if ($i < 10) {
					$in="0".$i;
				}else {
					$in=$i;
				}
				$wtos.="<option value=\"".$i."\">".$in."</option>\n";
			}
			$wtos.="</select></td></tr><tr><td>".JText::_('VRCONFIGONEFOUR')."</td><td><select name=\"timeopenstoreth\">";
			for($i=0; $i <= 23; $i++){
				if ($i < 10) {
					$in="0".$i;
				}else {
					$in=$i;
				}
				$wtos.="<option value=\"".$i."\">".$in."</option>\n";
			}
			$wtos.="</select> <select name=\"timeopenstoretm\">";
			for($i=0; $i <= 59; $i++){
				if ($i < 10) {
					$in="0".$i;
				}else {
					$in=$i;
				}
				$wtos.="<option value=\"".$i."\">".$in."</option>\n";
			}
			$wtos.="</select></td></tr></table>";
		}
		$calendartype = vikrentcar::calendarType(true);
		$aehourschbasp = vikrentcar::applyExtraHoursChargesBasp();
		$nowdf = vikrentcar::getDateFormat(true);
		?>
		
		<table><tr><td>
		<table>
		<tr><td><b>&bull; <?php echo JText::_('VRCONFIGONEFIVE'); ?></b>: </td><td><input type="checkbox" name="allowrent" value="1"<?php echo (vikrentcar::allowRent() ? " checked=\"checked\"" : ""); ?>/></td></tr>
		<tr><td><b>&bull; <?php echo JText::_('VRCONFIGONESIX'); ?></b>: </td><td><textarea name="disabledrentmsg" rows="5" cols="25"><?php echo vikrentcar::getDisabledRentMsg(); ?></textarea></td></tr>
		<tr><td valign="top"><b>&bull; <?php echo JText::_('VRCONFIGONESEVEN'); ?></b>: </td><td><?php echo $wtos; ?></td></tr>
		<tr><td><b>&bull; <?php echo JText::_('VRCONFIGONEEIGHT'); ?></b>: </td><td><input type="text" name="hoursmorerentback" value="<?php echo vikrentcar::getHoursMoreRb(); ?>" size="3"/></td></tr>
		<tr><td><b>&bull; <?php echo JText::_('VRCONFIGEHOURSBASP'); ?></b>: </td><td><select name="ehourschbasp"><option value="1"<?php echo ($aehourschbasp == true ? " selected=\"selected\"" : ""); ?>><?php echo JText::_('VRCONFIGEHOURSBEFORESP'); ?></option><option value="0"<?php echo ($aehourschbasp == false ? " selected=\"selected\"" : ""); ?>><?php echo JText::_('VRCONFIGEHOURSAFTERSP'); ?></option></select></td></tr>
		<tr><td><b>&bull; <?php echo JText::_('VRCONFIGONENINE'); ?></b> </td><td><input type="text" name="hoursmorecaravail" value="<?php echo vikrentcar::getHoursCarAvail(); ?>" size="3"/> <?php echo JText::_('VRCONFIGONETENEIGHT'); ?></td></tr>
		<tr><td><b>&bull; <?php echo JText::_('VRCONFIGONEDROPDPLUS'); ?></b> </td><td><input type="text" name="setdropdplus" value="<?php echo vikrentcar::setDropDatePlus(true); ?>" size="3"/></td></tr>
		<tr><td><b>&bull; <?php echo JText::_('VRCONFIGREQUIRELOGIN'); ?></b>: </td><td><input type="checkbox" name="requirelogin" value="1"<?php echo (vikrentcar::requireLogin() ? " checked=\"checked\"" : ""); ?>/></td></tr>
		</table>
		</td><td valign="top">
		<table>
		<tr><td><b>&bull; <?php echo JText::_('VRCONFIGONETEN'); ?></b>: </td><td><input type="checkbox" name="placesfront" value="yes"<?php echo (vikrentcar::showPlacesFront(true) ? " checked=\"checked\"" : ""); ?>/></td></tr>
		<tr><td><b>&bull; <?php echo JText::_('VRCONFIGONEELEVEN'); ?></b>: </td><td><input type="radio" name="dateformat" id="ita" value="%d/%m/%Y"<?php echo ($nowdf=="%d/%m/%Y" ? " checked=\"checked\"" : ""); ?>/> <label for="ita"><?php echo JText::_('VRCONFIGONETWELVE'); ?></label><br/><input type="radio" name="dateformat" id="eng" value="%Y/%m/%d"<?php echo ($nowdf=="%Y/%m/%d" ? " checked=\"checked\"" : ""); ?>/> <label for="eng"><?php echo JText::_('VRCONFIGONETENTHREE'); ?></label><br/><input type="radio" name="dateformat" id="usa" value="%m/%d/%Y"<?php echo ($nowdf=="%m/%d/%Y" ? " checked=\"checked\"" : ""); ?>/> <label for="usa"><?php echo JText::_('VRCONFIGUSDATEFORMAT'); ?></label></td></tr>
		<tr><td><b>&bull; <?php echo JText::_('VRCONFIGONETENFOUR'); ?></b>: </td><td><input type="checkbox" name="showcategories" value="yes"<?php echo (vikrentcar::showCategoriesFront(true) ? " checked=\"checked\"" : ""); ?>/></td></tr>
		<tr><td><b>&bull; <?php echo JText::_('VRCONFIGONETENFIVE'); ?></b>: </td><td><input type="checkbox" name="tokenform" value="yes"<?php echo (vikrentcar::tokenForm() ? " checked=\"checked\"" : ""); ?>/></td></tr>
		<tr><td><b>&bull; <?php echo JText::_('VRCONFIGONECOUPONS'); ?></b>: </td><td><input type="checkbox" name="enablecoupons" value="1"<?php echo (vikrentcar::couponsEnabled() ? " checked=\"checked\"" : ""); ?>/></td></tr>
		<tr><td><b>&bull; <?php echo JText::_('VRCONFIGONETENSIX'); ?></b>: </td><td><input type="text" name="adminemail" value="<?php echo vikrentcar::getAdminMail(); ?>" size="20"/></td></tr>
		<tr><td><b>&bull; <?php echo JText::_('VRCONFIGONETENSEVEN'); ?></b>: </td><td><input type="text" name="minuteslock" value="<?php echo vikrentcar::getMinutesLock(); ?>" size="3"/></td></tr>
		<tr><td><b>&bull; <?php echo JText::_('VRCONFIGONEJQUERY'); ?></b>: </td><td><input type="checkbox" name="loadjquery" value="yes"<?php echo (vikrentcar::loadJquery(true) ? " checked=\"checked\"" : ""); ?>/></td></tr>
		<tr><td><b>&bull; <?php echo JText::_('VRCONFIGONECALENDAR'); ?></b>: </td><td><select name="calendar"><option value="jqueryui"<?php echo ($calendartype == "jqueryui" ? " selected=\"selected\"" : ""); ?>>jQuery UI</option><option value="joomla"<?php echo ($calendartype == "joomla" ? " selected=\"selected\"" : ""); ?>>Joomla</option></select></td></tr>
		</table>
		</td></tr></table>
		<?php
	}
	
	function pViewConfigTwo () {
		$formatvals = vikrentcar::getNumberFormatData(true);
		$formatparts = explode(':', $formatvals);
		?>
		<table><tr><td valign="top">
		<table>
		<tr><td><b>&bull; <?php echo JText::_('VRCONFIGTHREECURCODEPP'); ?></b>: </td><td><input type="text" name="currencycodepp" value="<?php echo vikrentcar::getCurrencyCodePp(); ?>" size="10"/></td></tr>
		<tr><td><b>&bull; <?php echo JText::_('VRCONFIGTWOTWO'); ?></b>: </td><td><input type="text" name="ccpaypal" value="<?php echo vikrentcar::getPaypalAcc(); ?>" size="25"/></td></tr>
		<tr><td><b>&bull; <?php echo JText::_('VRCONFIGTWOTHREE'); ?></b>: </td><td><input type="checkbox" name="paytotal" value="yes"<?php echo (vikrentcar::payTotal() ? " checked=\"checked\"" : ""); ?>/></td></tr>
		<tr><td><b>&bull; <?php echo JText::_('VRCONFIGTWOFOUR'); ?></b> </td><td><input type="text" name="payaccpercent" value="<?php echo vikrentcar::getAccPerCent(); ?>" size="5"/> <b>%</b></td></tr>
		</table>
		</td><td valign="top">
		<table>
		<tr><td><b>&bull; <?php echo JText::_('VRCONFIGTWOFIVE'); ?></b>: </td><td><input type="checkbox" name="ivainclusa" value="yes"<?php echo (vikrentcar::ivaInclusa(true) ? " checked=\"checked\"" : ""); ?>/></td></tr>
		<tr><td><b>&bull; <?php echo JText::_('VRCONFIGTWOSIX'); ?></b>: </td><td><input type="text" name="paymentname" value="<?php echo vikrentcar::getPaymentName(); ?>" size="25"/></td></tr>
		<tr><td><b>&bull; <?php echo JText::_('VRCONFIGNUMDECIMALS'); ?></b>: </td><td><input type="text" name="numdecimals" value="<?php echo $formatparts[0]; ?>" size="2"/></td></tr>
		<tr><td><b>&bull; <?php echo JText::_('VRCONFIGNUMDECSEPARATOR'); ?></b>: </td><td><input type="text" name="decseparator" value="<?php echo $formatparts[1]; ?>" size="2"/></td></tr>
		<tr><td><b>&bull; <?php echo JText::_('VRCONFIGNUMTHOSEPARATOR'); ?></b>: </td><td><input type="text" name="thoseparator" value="<?php echo $formatparts[2]; ?>" size="2"/></td></tr>
		</table>
		</td></tr></table>
		<?php
		
	}
	
	function pViewConfigThree () {
		$editor =& JFactory::getEditor();
		$themesel = '<select name="theme">';
		$themesel .= '<option value="default">default</option>';
		$themes = glob(JPATH_SITE.DS.'components'.DS.'com_vikrentcar'.DS.'themes'.DS.'*');
		$acttheme = vikrentcar::getTheme();
		if(count($themes) > 0) {
			$strip = JPATH_SITE.DS.'components'.DS.'com_vikrentcar'.DS.'themes'.DS;
			foreach($themes as $th) {
				if(is_dir($th)) {
					$tname = str_replace($strip, '', $th);
					if($tname != 'default') {
						$themesel .= '<option value="'.$tname.'"'.($tname == $acttheme ? ' selected="selected"' : '').'>'.$tname.'</option>';
					}
				}
			}
		}
		$themesel .= '</select>';
		?>
		<table><tr><td valign="top">
		<table>
		<tr><td><b>&bull; <?php echo JText::_('VRCONFIGTHREEONE'); ?></b>: </td><td><input type="text" name="fronttitle" value="<?php echo vikrentcar::getFrontTitle(); ?>" size="10"/></td></tr>
		<tr><td><b>&bull; <?php echo JText::_('VRCONFIGTHREETWO'); ?></b>: </td><td><input type="text" name="fronttitletag" value="<?php echo vikrentcar::getFrontTitleTag(); ?>" size="10"/></td></tr>		
		<tr><td><b>&bull; <?php echo JText::_('VRCONFIGTHREETHREE'); ?></b>: </td><td><input type="text" name="fronttitletagclass" value="<?php echo vikrentcar::getFrontTitleTagClass(); ?>" size="10"/></td></tr>
		<tr><td><b>&bull; <?php echo JText::_('VRCONFIGTHREECURNAME'); ?></b>: </td><td><input type="text" name="currencyname" value="<?php echo vikrentcar::getCurrencyName(); ?>" size="10"/></td></tr>
		<tr><td><b>&bull; <?php echo JText::_('VRCONFIGTHREENINE'); ?></b>: </td><td><input type="checkbox" name="showpartlyreserved" value="yes"<?php echo (vikrentcar::showPartlyReserved() ? " checked=\"checked\"" : ""); ?>/></td></tr>
		</table>
		</td><td valign="top">
		<table>
		<tr><td><b>&bull; <?php echo JText::_('VRCONFIGTHREEFOUR'); ?></b>: </td><td><input type="text" name="searchbtnval" value="<?php echo vikrentcar::getSubmitName(true); ?>" size="10"/></td></tr>
		<tr><td><b>&bull; <?php echo JText::_('VRCONFIGTHREEFIVE'); ?></b>: </td><td><input type="text" name="searchbtnclass" value="<?php echo vikrentcar::getSubmitClass(true); ?>" size="10"/></td></tr>		
		<tr><td><b>&bull; <?php echo JText::_('VRCONFIGTHREESIX'); ?></b>: </td><td><input type="checkbox" name="showfooter" value="yes"<?php echo (vikrentcar::showFooter() ? " checked=\"checked\"" : ""); ?>/></td></tr>
		<tr><td><b>&bull; <?php echo JText::_('VRCONFIGTHREECURSYMB'); ?></b>: </td><td><input type="text" name="currencysymb" value="<?php echo vikrentcar::getCurrencySymb(true); ?>" size="10"/></td></tr>
		<tr><td><b>&bull; <?php echo JText::_('VRCONFIGTHREETEN'); ?></b>: </td><td><input type="text" name="numcalendars" value="<?php echo vikrentcar::numCalendars(); ?>" size="10"/></td></tr>
		<tr><td><b>&bull; <?php echo JText::_('VRCONFIGTHEME'); ?></b>: </td><td><?php echo $themesel; ?></td></tr>
		</table>
		</td></tr></table>
		<table>
		<tr><td><b>&bull; <?php echo JText::_('VRCONFIGTHREESEVEN'); ?></b>: </td><td><?php echo $editor->display( "intromain", vikrentcar::getIntroMain(), 500, 350, 70, 20 ); ?></td></tr>
		<tr><td><b>&bull; <?php echo JText::_('VRCONFIGTHREEEIGHT'); ?></b>: </td><td><textarea name="closingmain" rows="5" cols="50"><?php echo vikrentcar::getClosingMain(); ?></textarea></td></tr>
		</table>
		<?php
		
	}
	
	function pViewConfigFour () {
		$editor =& JFactory::getEditor();
		JHTML::_('behavior.modal');
		$sitelogo = vikrentcar::getSiteLogo();
		?>
		<table><tr><td valign="top">
		<table>
		<tr><td><b>&bull; <?php echo JText::_('VRCONFIGFOURONE'); ?></b>: </td><td><input type="checkbox" name="oldorders" value="yes"<?php echo (vikrentcar::saveOldOrders() ? " checked=\"checked\"" : ""); ?>/></td></tr>
		<tr><td><b>&bull; <?php echo JText::_('VRUSEJUTILITY'); ?></b>: </td><td><input type="checkbox" name="sendjutility" value="yes"<?php echo (vikrentcar::sendJutility() ? " checked=\"checked\"" : ""); ?>/></td></tr>
		<tr><td><b>&bull; <?php echo JText::_('VRCSENDPDF'); ?></b>: </td><td><input type="checkbox" name="sendpdf" value="yes"<?php echo (vikrentcar::sendPDF() ? " checked=\"checked\"" : ""); ?>/></td></tr>
		</table>
		</td><td valign="top">
		<table>
		<tr><td><b>&bull; <?php echo JText::_('VRCONFIGFOURTWO'); ?></b>: </td><td><input type="checkbox" name="allowstats" value="yes"<?php echo (vikrentcar::allowStats() ? " checked=\"checked\"" : ""); ?>/></td></tr>
		<tr><td><b>&bull; <?php echo JText::_('VRCONFIGFOURTHREE'); ?></b>: </td><td><input type="checkbox" name="sendmailstats" value="yes"<?php echo (vikrentcar::sendMailStats() ? " checked=\"checked\"" : ""); ?>/></td></tr>
		</table>
		</td></tr>
		<tr><td colspan="2">
		<table>
		<tr><td><b>&bull; <?php echo JText::_('VRCONFIGFOURLOGO'); ?></b>: </td><td><input type="file" name="sitelogo" size="35"/> <?php echo (strlen($sitelogo) > 0 ? '<a href="'.JURI::root().'administrator/components/com_vikrentcar/resources/'.$sitelogo.'" class="modal" target="_blank">'.$sitelogo.'</a>' : ''); ?></td></tr>
		</table>
		</td></tr>
		<tr><td colspan="2">
		<table>
		<tr><td><b>&bull; <?php echo JText::_('VRCONFIGFOURORDMAILFOOTER'); ?></b>: </td><td><?php echo $editor->display( "footerordmail", vikrentcar::getFooterOrdMail(), 500, 350, 70, 20 ); ?></td></tr>
		</table>
		</td></tr>
		<tr><td colspan="2">
		<table>
		<tr><td><b>&bull; <?php echo JText::_('VRCONFIGFOURFOUR'); ?></b>: </td><td><textarea name="disclaimer" rows="7" cols="50"><?php echo vikrentcar::getDisclaimer(); ?></textarea></td></tr>
		</table>
		</td></tr>
		
		</table>
		<?php

	}
	
	function pChooseBusy ($reservs, $totres, $pts, $option, $lim0="0", $navbut="") {
		if (file_exists('./components/com_vikrentcar/resources/'.$reservs[0]['img']) && getimagesize('./components/com_vikrentcar/resources/'.$reservs[0]['img'])) {
			$img='<img align="middle" class="maxninety" alt="Car Image" src="' . JURI :: root() . 'administrator/components/com_vikrentcar/resources/'.$reservs[0]['img'].'" />';
		}else {
			$img='<img align="middle" alt="vikrentcar logo" src="' . JURI :: root() . 'administrator/components/com_vikrentcar/vikrentcar.jpg' . '" />';
		}
		$unitsdisp=$reservs[0]['units'] - $totres;
		$unitsdisp=($unitsdisp < 0 ? "0" : $unitsdisp);
		?>
		<table>
			<tr>
				<td><div class="vrcadminfaresctitle"><?php echo JText::_('VRMAINCHOOSEBUSY'); ?> <?php echo $reservs[0]['name']; ?></div></td>
			</tr>
			<tr>
				<td><?php echo $img; ?></td>
			</tr>
		</table>
		
		<p style="font-weight: bold;"><?php echo JText::_('VRPCHOOSEBUSYCAVAIL'); ?>: <?php echo $unitsdisp; ?>/<?php echo $reservs[0]['units']; ?></p>
		
		<div id="overDiv" style="position:absolute; visibility:hidden; z-index:1000;"></div>
	<script type="text/javascript" src="../includes/js/overlib_mini.js"></script>

	<form action="index.php?option=com_vikrentcar" method="post" name="adminForm" id="adminForm">
	<table cellpadding="4" cellspacing="0" border="0" width="100%" class="table table-striped">
		<thead>
		<tr>
			<th class="title left" width="150"><?php echo JText::_( 'VRPVIEWORDERSFOUR' ); ?></th>
			<th class="title left" width="250"><?php echo JText::_( 'VRPVIEWORDERSTWO' ); ?></th>
			<th class="title left" width="150"><?php echo JText::_( 'VRPVIEWORDERSFIVE' ); ?></th>
			<th class="title left" width="150"><?php echo JText::_( 'VRPCHOOSEBUSYORDATE' ); ?></th>
		</tr>
		</thead>
		<?php
		$nowdf = vikrentcar::getDateFormat(true);
		if ($nowdf=="%d/%m/%Y") {
			$df='d/m/Y';
		}elseif ($nowdf=="%m/%d/%Y") {
			$df='m/d/Y';
		}else {
			$df='Y/m/d';
		}
		$k = 0;
		$i = 0;
		for ($i = 0, $n = count($reservs); $i < $n; $i++) {
			$row = & $reservs[$i];
			?>
			<tr class="row<?php echo $k; ?>">
				<td><a href="index.php?option=com_vikrentcar&amp;task=editbusy&amp;cid[]=<?php echo $row['id']; ?>"><?php echo date($df.' H:i', $row['ritiro']); ?></a></td>
				<td><?php echo (!empty($row['custdata']) ? substr($row['custdata'], 0, 45)." ..." : ""); ?></td>
				<td><?php echo date($df.' H:i', $row['consegna']); ?></td>
				<td><?php echo date($df.' H:i', $row['ts']); ?></td>
			</tr>
              <?php
            $k = 1 - $k;
		}
		?>
		
		</table>
		<input type="hidden" name="idcar" value="<?php echo $reservs[0]['idcar']; ?>" />
		<input type="hidden" name="ts" value="<?php echo $pts; ?>" />
		<input type="hidden" name="option" value="<?php echo $option; ?>" />
		<?php
		if(defined('JVERSION') && version_compare(JVERSION, '1.6.0') < 0) {
			//Joomla 1.5
			
		}
		?>
		<input type="hidden" name="task" value="choosebusy" />
		<input type="hidden" name="boxchecked" value="0" />
		<?php echo JHTML::_( 'form.token' ); ?>
		<?php echo $navbut; ?>
	</form>
		<?php
	}
	
	function pLocFees ($rows, $option, $lim0="0", $navbut="") {
		if(empty($rows)){
			?>
			<p><?php echo JText::_('VRNOLOCFEES'); ?></p>
			<form action="index.php?option=com_vikrentcar" method="post" name="adminForm" id="adminForm">
			<input type="hidden" name="task" value="" />
			<input type="hidden" name="option" value="<?php echo $option; ?>" />
			</form>
			<?php
		}else{
		
		?>
   <script language="JavaScript" type="text/javascript">
function submitbutton(pressbutton) {
			var form = document.adminForm;
			if (pressbutton == 'removeplace') {
				if (confirm('<?php echo JText::_('VRJSDELLOCFEE'); ?> ?')){
					submitform( pressbutton );
					return;
				}else{
					return false;
				}
			}

			// do field validation
			try {
				document.adminForm.onsubmit();
			}
			catch(e){}
			submitform( pressbutton );
		}
</script>
   <div id="overDiv" style="position:absolute; visibility:hidden; z-index:1000;"></div>
	<script type="text/javascript" src="../includes/js/overlib_mini.js"></script>

	<form action="index.php?option=com_vikrentcar" method="post" name="adminForm" id="adminForm">
	<table cellpadding="4" cellspacing="0" border="0" width="100%" class="table table-striped">
		<thead>
		<tr>
			<th width="20">
				<input type="checkbox" onclick="Joomla.checkAll(this)" value="" name="checkall-toggle">
			</th>
			<th class="title left" width="150"><?php echo JText::_( 'VRPVIEWPLOCFEEONE' ); ?></th>
			<th class="title left" width="150"><?php echo JText::_( 'VRPVIEWPLOCFEETWO' ); ?></th>
			<th class="title left" width="100"><?php echo JText::_( 'VRPVIEWPLOCFEETHREE' ); ?></th>
			<th class="title left" width="100"><?php echo JText::_( 'VRPVIEWPLOCFEEFOUR' ); ?></th>
		</tr>
		</thead>
		<?php
		$currencysymb=vikrentcar::getCurrencySymb(true);
		$k = 0;
		$i = 0;
		for ($i = 0, $n = count($rows); $i < $n; $i++) {
			$row = & $rows[$i];
			?>
			<tr class="row<?php echo $k; ?>">
				<td><input type="checkbox" id="cb<?php echo $i;?>" name="cid[]" value="<?php echo $row['id']; ?>" onclick="Joomla.isChecked(this.checked);"></td>
				<td><a href="index.php?option=com_vikrentcar&amp;task=editlocfee&amp;cid[]=<?php echo $row['id']; ?>"><?php echo vikrentcar::getPlaceName($row['from']); ?></a></td>
				<td><?php echo vikrentcar::getPlaceName($row['to']); ?></td>
				<td><?php echo $currencysymb.' '.$row['cost']; ?></td>
				<td><?php echo (intval($row['daily']) == 1 ? JText::_('VRYES') : JText::_('VRNO')); ?></td>
			</tr>
              <?php
            $k = 1 - $k;
		}
		?>
		
		</table>
		<input type="hidden" name="option" value="<?php echo $option; ?>" />
		<?php
		if(defined('JVERSION') && version_compare(JVERSION, '1.6.0') < 0) {
			//Joomla 1.5
			
		}
		?>
		<input type="hidden" name="task" value="locfees" />
		<input type="hidden" name="boxchecked" value="0" />
		<?php echo JHTML::_( 'form.token' ); ?>
		<?php echo $navbut; ?>
	</form>
	<?php
		}
	}
	
	function pNewLocFee ($wsel, $wseltwo, $option) {
		JHTML::_('behavior.tooltip');
		$currencysymb=vikrentcar::getCurrencySymb(true);
		if(strlen($wsel) > 0) {
			$dbo = & JFactory :: getDBO();
			$q="SELECT * FROM `#__vikrentcar_iva`;";
			$dbo->setQuery($q);
			$dbo->Query($q);
			if ($dbo->getNumRows() > 0) {
				$ivas=$dbo->loadAssocList();
				$wiva="<select name=\"aliq\">\n";
				foreach($ivas as $iv){
					$wiva.="<option value=\"".$iv['id']."\">".(empty($iv['name']) ? $iv['aliq']."%" : $iv['name']."-".$iv['aliq']."%")."</option>\n";
				}
				$wiva.="</select>\n";
			}else {
				$wiva="<a href=\"index.php?option=com_vikrentcar&task=viewiva\">".JText::_('VRNOIVAFOUND')."</a>";
			}
			?>
			<script language="JavaScript" type="text/javascript">
			function addMoreOverrides() {
				var ni = document.getElementById('myDiv');
				var numi = document.getElementById('morevalueoverrides');
				var num = (document.getElementById('morevalueoverrides').value -1)+ 2;
				numi.value = num;
				var newdiv = document.createElement('div');
				var divIdName = 'my'+num+'Div';
				newdiv.setAttribute('id',divIdName);
				newdiv.innerHTML = '<p><?php echo addslashes(JText::_('VRLOCFEECOSTOVERRIDEDAYS')); ?> <input type=\'text\' name=\'nightsoverrides[]\' value=\'\' size=\'4\'/> - <?php echo addslashes(JText::_('VRLOCFEECOSTOVERRIDECOST')); ?> <input type=\'text\' name=\'valuesoverrides[]\' value=\'\' size=\'5\'/> <?php echo addslashes($currencysymb); ?></p>';
				ni.appendChild(newdiv);
			}
			</script>
			<input type="hidden" value="0" id="morevalueoverrides" />
			
			<form name="adminForm" id="adminForm" action="index.php" method="post">
			<table class="adminform">
			<tr><td width="200">&bull; <b><?php echo JText::_('VRNEWLOCFEEONE'); ?>:</b> </td><td><?php echo $wsel; ?></td></tr>
			<tr><td width="200">&bull; <b><?php echo JText::_('VRNEWLOCFEETWO'); ?>:</b> </td><td><?php echo $wseltwo; ?></td></tr>
			<tr><td width="200">&bull; <b><?php echo JText::_('VRLOCFEEINVERT'); ?>:</b> </td><td><input type="checkbox" name="invert" value="1"/></td></tr>
			<tr><td width="200">&bull; <b><?php echo JText::_('VRNEWLOCFEETHREE'); ?>:</b> </td><td><?php echo $currencysymb; ?> <input type="text" name="cost" value="" size="3"/></td></tr>
			<tr><td width="200">&bull; <b><?php echo JText::_('VRNEWLOCFEEFOUR'); ?>:</b> </td><td><input type="checkbox" name="daily" value="1"/></td></tr>
			<tr><td width="150" valign="top">&bull; <b><?php echo JText::_('VRLOCFEECOSTOVERRIDE'); ?>:</b> <?php echo JHTML::tooltip(JText::_('VRLOCFEECOSTOVERRIDEHELP'), JText::_('VRLOCFEECOSTOVERRIDE'), 'tooltip.png', ''); ?></td><td><div id="myDiv" style="display: block;"></div><a href="javascript: void(0);" onclick="addMoreOverrides();"><?php echo JText::_('VRLOCFEECOSTOVERRIDEADD'); ?></a></td></tr>
			<tr><td width="200">&bull; <b><?php echo JText::_('VRNEWLOCFEEFIVE'); ?>:</b> </td><td><?php echo $wiva; ?></td></tr>
			</table>
			<input type="hidden" name="task" value="">
			<input type="hidden" name="option" value="<?php echo $option; ?>">
			</form>
			<?php
		}else {
			?>
			<p><a href="index.php?option=com_vikrentcar&amp;task=newplace"><?php echo JText::_('VRNOPLACESFOUND'); ?></a></p>
			<form action="index.php?option=com_vikrentcar" method="post" name="adminForm" id="adminForm">
			<input type="hidden" name="task" value="" />
			<input type="hidden" name="option" value="<?php echo $option; ?>" />
			</form>
			<?php
		}
	}
	
	function pEditLocFee ($fdata, $wsel, $wseltwo, $option) {
		JHTML::_('behavior.tooltip');
		$currencysymb=vikrentcar::getCurrencySymb(true);
		if(strlen($wsel) > 0) {
			$dbo = & JFactory :: getDBO();
			$q="SELECT * FROM `#__vikrentcar_iva`;";
			$dbo->setQuery($q);
			$dbo->Query($q);
			if ($dbo->getNumRows() > 0) {
				$ivas=$dbo->loadAssocList();
				$wiva="<select name=\"aliq\">\n";
				foreach($ivas as $iv){
					$wiva.="<option value=\"".$iv['id']."\"".($fdata['idiva']==$iv['id'] ? " selected=\"selected\"" : "").">".(empty($iv['name']) ? $iv['aliq']."%" : $iv['name']."-".$iv['aliq']."%")."</option>\n";
				}
				$wiva.="</select>\n";
			}else {
				$wiva="<a href=\"index.php?option=com_vikrentcar&task=viewiva\">".JText::_('VRNOIVAFOUND')."</a>";
			}
			
			$actvalueoverrides = '';
			if (strlen($fdata['losoverride']) > 0) {
				$losoverrides = explode('_', $fdata['losoverride']);
				foreach($losoverrides as $loso) {
					if (!empty($loso)) {
						$losoparts = explode(':', $loso);
						$actvalueoverrides .= '<p>'.JText::_('VRLOCFEECOSTOVERRIDEDAYS').' <input type="text" name="nightsoverrides[]" value="'.$losoparts[0].'" size="4"/> - '.JText::_('VRLOCFEECOSTOVERRIDECOST').' <input type="text" name="valuesoverrides[]" value="'.$losoparts[1].'" size="5"/> '.$currencysymb.'</p>';
					}
				}
			}
			?>
			<script language="JavaScript" type="text/javascript">
			function addMoreOverrides() {
				var ni = document.getElementById('myDiv');
				var numi = document.getElementById('morevalueoverrides');
				var num = (document.getElementById('morevalueoverrides').value -1)+ 2;
				numi.value = num;
				var newdiv = document.createElement('div');
				var divIdName = 'my'+num+'Div';
				newdiv.setAttribute('id',divIdName);
				newdiv.innerHTML = '<p><?php echo addslashes(JText::_('VRLOCFEECOSTOVERRIDEDAYS')); ?> <input type=\'text\' name=\'nightsoverrides[]\' value=\'\' size=\'4\'/> - <?php echo addslashes(JText::_('VRLOCFEECOSTOVERRIDECOST')); ?> <input type=\'text\' name=\'valuesoverrides[]\' value=\'\' size=\'5\'/> <?php echo addslashes($currencysymb); ?></p>';
				ni.appendChild(newdiv);
			}
			</script>
			<input type="hidden" value="0" id="morevalueoverrides" />
			
			<form name="adminForm" id="adminForm" action="index.php" method="post">
			<table class="adminform">
			<tr><td width="200">&bull; <b><?php echo JText::_('VRNEWLOCFEEONE'); ?>:</b> </td><td><?php echo $wsel; ?></td></tr>
			<tr><td width="200">&bull; <b><?php echo JText::_('VRNEWLOCFEETWO'); ?>:</b> </td><td><?php echo $wseltwo; ?></td></tr>
			<tr><td width="200">&bull; <b><?php echo JText::_('VRLOCFEEINVERT'); ?>:</b> </td><td><input type="checkbox" name="invert" value="1"<?php echo (intval($fdata['invert']) == 1 ? " checked=\"checked\"" : ""); ?>/></td></tr>
			<tr><td width="200">&bull; <b><?php echo JText::_('VRNEWLOCFEETHREE'); ?>:</b> </td><td><?php echo $currencysymb; ?> <input type="text" name="cost" value="<?php echo $fdata['cost']; ?>" size="3"/></td></tr>
			<tr><td width="200">&bull; <b><?php echo JText::_('VRNEWLOCFEEFOUR'); ?>:</b> </td><td><input type="checkbox" name="daily" value="1"<?php echo (intval($fdata['daily']) == 1 ? " checked=\"checked\"" : ""); ?>/></td></tr>
			<tr><td width="150" valign="top">&bull; <b><?php echo JText::_('VRLOCFEECOSTOVERRIDE'); ?>:</b> <?php echo JHTML::tooltip(JText::_('VRLOCFEECOSTOVERRIDEHELP'), JText::_('VRLOCFEECOSTOVERRIDE'), 'tooltip.png', ''); ?></td><td><div id="myDiv" style="display: block;"><?php echo $actvalueoverrides; ?></div><a href="javascript: void(0);" onclick="addMoreOverrides();"><?php echo JText::_('VRLOCFEECOSTOVERRIDEADD'); ?></a></td></tr>
			<tr><td width="200">&bull; <b><?php echo JText::_('VRNEWLOCFEEFIVE'); ?>:</b> </td><td><?php echo $wiva; ?></td></tr>
			</table>
			<input type="hidden" name="task" value="">
			<input type="hidden" name="option" value="<?php echo $option; ?>">
			<input type="hidden" name="where" value="<?php echo $fdata['id']; ?>">
			</form>
			<?php
		}else {
			?>
			<p><a href="index.php?option=com_vikrentcar&amp;task=newplace"><?php echo JText::_('VRNOPLACESFOUND'); ?></a></p>
			<form action="index.php?option=com_vikrentcar" method="post" name="adminForm" id="adminForm">
			<input type="hidden" name="task" value="" />
			<input type="hidden" name="option" value="<?php echo $option; ?>" />
			</form>
			<?php
		}
	}
	
	function pShowSeasons ($rows, $option, $lim0="0", $navbut="") {
		if(empty($rows)){
			?>
			<p><?php echo JText::_('VRNOSEASONS'); ?></p>
			<form action="index.php?option=com_vikrentcar" method="post" name="adminForm" id="adminForm">
			<input type="hidden" name="task" value="" />
			<input type="hidden" name="option" value="<?php echo $option; ?>" />
			</form>
			<?php
		}else{
		
		?>
   <script language="JavaScript" type="text/javascript">
function submitbutton(pressbutton) {
			var form = document.adminForm;
			if (pressbutton == 'removeseasons') {
				if (confirm('<?php echo JText::_('VRJSDELSEASONS'); ?> ?')){
					submitform( pressbutton );
					return;
				}else{
					return false;
				}
			}

			// do field validation
			try {
				document.adminForm.onsubmit();
			}
			catch(e){}
			submitform( pressbutton );
		}
</script>
   <div id="overDiv" style="position:absolute; visibility:hidden; z-index:1000;"></div>
	<script type="text/javascript" src="../includes/js/overlib_mini.js"></script>

	<form action="index.php?option=com_vikrentcar" method="post" name="adminForm" id="adminForm">
	<table cellpadding="4" cellspacing="0" border="0" width="100%" class="table table-striped">
		<thead>
		<tr>
			<th width="20">
				<input type="checkbox" onclick="Joomla.checkAll(this)" value="" name="checkall-toggle">
			</th>
			<th class="title center" width="100" align="center"><?php echo JText::_( 'VRPSHOWSEASONSPNAME' ); ?></th>
			<th class="title center" width="100" align="center"><?php echo JText::_( 'VRPSHOWSEASONSONE' ); ?></th>
			<th class="title center" width="100" align="center"><?php echo JText::_( 'VRPSHOWSEASONSTWO' ); ?></th>
			<th class="title center" width="150" align="center"><?php echo JText::_( 'VRPSHOWSEASONSWDAYS' ); ?></th>
			<th class="title center" width="150" align="center"><?php echo JText::_( 'VRPSHOWSEASONSSEVEN' ); ?></th>
			<th class="title center" width="100" align="center"><?php echo JText::_( 'VRPSHOWSEASONSTHREE' ); ?></th>
			<th class="title center" width="100" align="center"><?php echo JText::_( 'VRPSHOWSEASONSFOUR' ); ?></th>
		</tr>
		</thead>
		<?php
		$currencysymb=vikrentcar::getCurrencySymb(true);
		if (vikrentcar::getDateFormat(true)=="%d/%m/%Y") {
			$df='d/m';
		}else {
			$df='m/d';
		}
		$tsbase=mktime(0, 0, 0, 1, 1, date('Y'));
		$k = 0;
		$i = 0;
		//leap years
		$curyear = date('Y');
		if($curyear % 4 == 0 && ($curyear % 100 != 0 || $curyear % 400 == 0)) {
			$isleap = true;
		}else {
			$isleap = false;
		}
		//
		for ($i = 0, $n = count($rows); $i < $n; $i++) {
			$row = & $rows[$i];
			if($row['from'] > 0 || $row['to'] > 0) {
				$sfrom=date($df, ($tsbase + $row['from']));
				$sto=date($df, ($tsbase + $row['to']));
				//leap years
				if($isleap == true) {
					$infoseason = getdate($tsbase + $row['from']);
					$leapts = mktime(0, 0, 0, 2, 29, $infoseason['year']);
					if($infoseason[0] >= $leapts) {
						$sfrom=date($df, ($tsbase + $row['from'] + 86400));
						$sto=date($df, ($tsbase + $row['to'] + 86400));
					}
				}
				//
			}else {
				$sfrom = "";
				$sto = "";
			}
			$actwdays = explode(';', $row['wdays']);
			$wdaysmatch = array('0' => JText::_('VRCSUNDAY'), '1' => JText::_('VRCMONDAY'), '2' => JText::_('VRCTUESDAY'), '3' => JText::_('VRCWEDNESDAY'), '4' => JText::_('VRCTHURSDAY'), '5' => JText::_('VRCFRIDAY'), '6' => JText::_('VRCSATURDAY'));
			$wdaystr = "";
			if(@count($actwdays) > 0) {
				foreach($actwdays as $awd) {
					if(strlen($awd) > 0) {
						$wdaystr .= substr($wdaysmatch[$awd], 0, 3).' ';
					}
				}
			}
			?>
			<tr class="row<?php echo $k; ?>">
				<td><input type="checkbox" id="cb<?php echo $i;?>" name="cid[]" value="<?php echo $row['id']; ?>" onclick="Joomla.isChecked(this.checked);"></td>
				<td class="center"><a href="index.php?option=com_vikrentcar&amp;task=editseason&amp;cid[]=<?php echo $row['id']; ?>"><?php echo $row['spname']; ?></a></td>
				<td class="center"><?php echo $sfrom; ?></td>
				<td class="center"><?php echo $sto; ?></td>
				<td class="center"><?php echo $wdaystr; ?></td>
				<td class="center"><?php echo (!empty($row['locations']) ? vikrentcar::getPlaceName($row['locations']) : JText::_('VRSEASONANY')); ?></td>
				<td class="center"><?php echo (intval($row['type']) == 1 ? JText::_('VRPSHOWSEASONSFIVE') : JText::_('VRPSHOWSEASONSSIX')); ?></td>
				<td class="center"><?php echo $row['diffcost']; ?> <?php echo (intval($row['val_pcent']) == 1 ? $currencysymb : '%'); ?></td>
			</tr>	
              <?php
            $k = 1 - $k;
		}
		?>
		
		</table>
		<input type="hidden" name="option" value="<?php echo $option; ?>" />
		<?php
		if(defined('JVERSION') && version_compare(JVERSION, '1.6.0') < 0) {
			//Joomla 1.5
			
		}
		?>
		<input type="hidden" name="task" value="seasons" />
		<input type="hidden" name="boxchecked" value="0" />
		<?php echo JHTML::_( 'form.token' ); ?>
		<?php echo $navbut; ?>
	</form>
	<?php
		}
	}
	
	function pNewSeason ($wsel, $wlocsel, $option) {
		JHTML::_('behavior.tooltip');
		if(strlen($wsel) > 0) {
			JHTML::_('behavior.calendar');
			$df=vikrentcar::getDateFormat(true);
			$currencysymb=vikrentcar::getCurrencySymb(true);
			?>
			<script language="JavaScript" type="text/javascript">
			function addMoreOverrides() {
				var sel = document.getElementById('val_pcent');
				var curpcent = sel.options[sel.selectedIndex].text;
				var ni = document.getElementById('myDiv');
				var numi = document.getElementById('morevalueoverrides');
				var num = (document.getElementById('morevalueoverrides').value -1)+ 2;
				numi.value = num;
				var newdiv = document.createElement('div');
				var divIdName = 'my'+num+'Div';
				newdiv.setAttribute('id',divIdName);
				newdiv.innerHTML = '<p><?php echo addslashes(JText::_('VRNEWSEASONNIGHTSOVR')); ?> <input type=\'text\' name=\'nightsoverrides[]\' value=\'\' size=\'4\'/> <select name=\'andmoreoverride[]\'><option value=\'0\'>-------</option><option value=\'1\'><?php echo addslashes(JText::_('VRNEWSEASONVALUESOVREMORE')); ?></option></select> - <?php echo addslashes(JText::_('VRNEWSEASONVALUESOVR')); ?> <input type=\'text\' name=\'valuesoverrides[]\' value=\'\' size=\'5\'/> '+curpcent+'</p>';
				ni.appendChild(newdiv);
			}
			</script>
			<input type="hidden" value="0" id="morevalueoverrides" />
			
			<form name="adminForm" id="adminForm" action="index.php" method="post">
			<table class="adminform">
				<tr><td><?php echo JHTML::tooltip(JText::_('VRCSPRICESHELP'), JText::_('VRCSPRICESHELPTITLE'), 'tooltip.png', ''); ?></td></tr>
				<tr><td colspan="2">&nbsp;<span style="font-weight: bold; color: #146295;"><u><?php echo JText::_('VRCSEASON'); ?></u></span></td></tr>
				<tr><td width="150">&bull; <b><?php echo JText::_('VRNEWSEASONONE'); ?>:</b> </td><td><?php echo JHTML::_('calendar', '', 'from', 'from', $df, array('class'=>'', 'size'=>'10',  'maxlength'=>'19')); ?></td></tr>
				<tr><td width="150">&bull; <b><?php echo JText::_('VRNEWSEASONTWO'); ?>:</b> </td><td><?php echo JHTML::_('calendar', '', 'to', 'to', $df, array('class'=>'', 'size'=>'10',  'maxlength'=>'19')); ?></td></tr>
				<tr><td width="150">&bull; <b><?php echo JText::_('VRCSPONLYPICKINCL'); ?>:</b> </td><td><input type="checkbox" name="pickupincl" value="1"/></td></tr>
				<tr><td width="150">&bull; <b><?php echo JText::_('VRCSPKEEPFIRSTDAYRATE'); ?>:</b> </td><td><input type="checkbox" name="keepfirstdayrate" value="1"/> &nbsp;&nbsp;<?php echo JHTML::tooltip(JText::_('VRCSPKEEPFIRSTDAYRATEHELP'), JText::_('VRCSPKEEPFIRSTDAYRATE'), 'tooltip.png', ''); ?></td></tr>
				
				<tr><td colspan="2">&nbsp;<span style="font-weight: bold; color: #146295;"><u><?php echo JText::_('VRCWEEKDAYS'); ?></u></span></td></tr>
				
				<tr><td width="150" valign="top">&bull; <b><?php echo JText::_('VRCSEASONDAYS'); ?>:</b> </td><td><select multiple="multiple" size="7" name="wdays[]"><option value="0"><?php echo JText::_('VRCSUNDAY'); ?></option><option value="1"><?php echo JText::_('VRCMONDAY'); ?></option><option value="2"><?php echo JText::_('VRCTUESDAY'); ?></option><option value="3"><?php echo JText::_('VRCWEDNESDAY'); ?></option><option value="4"><?php echo JText::_('VRCTHURSDAY'); ?></option><option value="5"><?php echo JText::_('VRCFRIDAY'); ?></option><option value="6"><?php echo JText::_('VRCSATURDAY'); ?></option></select></td></tr>
				
				<tr><td>&nbsp;</td></tr>
				
				<tr><td width="150">&bull; <b><?php echo JText::_('VRCSPNAME'); ?>:</b> </td><td><input type="text" name="spname" value="" size="30"/></td></tr>
				<tr><td width="150">&bull; <b><?php echo JText::_('VRNEWSEASONTHREE'); ?>:</b> </td><td><select name="type"><option value="1"><?php echo JText::_('VRNEWSEASONSIX'); ?></option><option value="2"><?php echo JText::_('VRNEWSEASONSEVEN'); ?></option></select></td></tr>
				<tr><td width="150">&bull; <b><?php echo JText::_('VRNEWSEASONFOUR'); ?>:</b> </td><td><input type="text" name="diffcost" value="" size="5"/> <select name="val_pcent" id="val_pcent"><option value="2">%</option><option value="1"><?php echo $currencysymb; ?></option></select> &nbsp;<?php echo JHTML::tooltip(JText::_('VRSPECIALPRICEVALHELP'), JText::_('VRNEWSEASONFOUR'), 'tooltip.png', ''); ?></td></tr>
				<tr><td width="150" valign="top">&bull; <b><?php echo JText::_('VRNEWSEASONVALUEOVERRIDE'); ?>:</b> <?php echo JHTML::tooltip(JText::_('VRNEWSEASONVALUEOVERRIDEHELP'), JText::_('VRNEWSEASONVALUEOVERRIDE'), 'tooltip.png', ''); ?></td><td><div id="myDiv" style="display: block;"></div><a href="javascript: void(0);" onclick="addMoreOverrides();"><?php echo JText::_('VRNEWSEASONADDOVERRIDE'); ?></a></td></tr>
				<tr><td width="150">&bull; <b><?php echo JText::_('VRNEWSEASONROUNDCOST'); ?>:</b> </td><td><select name="roundmode"><option value=""><?php echo JText::_('VRNEWSEASONROUNDCOSTNO'); ?></option><option value="PHP_ROUND_HALF_UP"><?php echo JText::_('VRNEWSEASONROUNDCOSTUP'); ?></option><option value="PHP_ROUND_HALF_DOWN"><?php echo JText::_('VRNEWSEASONROUNDCOSTDOWN'); ?></option></select></td></tr>
				<tr><td width="150" valign="top">&bull; <b><?php echo JText::_('VRNEWSEASONFIVE'); ?>:</b> </td><td><?php echo $wsel; ?></td></tr>
				<tr><td width="150">&bull; <b><?php echo JText::_('VRNEWSEASONEIGHT'); ?>:</b> </td><td><?php echo $wlocsel; ?></td></tr>
			</table>
			<input type="hidden" name="task" value="">
			<input type="hidden" name="option" value="<?php echo $option; ?>">
			</form>
			<?php
		}else {
			?>
			<p><a href="index.php?option=com_vikrentcar&amp;task=newcar"><?php echo JText::_('VRNOCARSFOUNDSEASONS'); ?></a></p>
			<form action="index.php?option=com_vikrentcar" method="post" name="adminForm" id="adminForm">
			<input type="hidden" name="task" value="" />
			<input type="hidden" name="option" value="<?php echo $option; ?>" />
			</form>
			<?php
		}
	}
	
	function pEditSeason ($sdata, $wsel, $wlocsel, $option) {
		if(strlen($wsel) > 0) {
			JHTML::_('behavior.calendar');
			$caldf=vikrentcar::getDateFormat(true);
			$currencysymb=vikrentcar::getCurrencySymb(true);
			if ($caldf=="%d/%m/%Y") {
				$df='d/m/Y';
			}elseif ($caldf=="%m/%d/%Y") {
				$df='m/d/Y';
			}else {
				$df='Y/m/d';
			}
			if($sdata['from'] > 0 || $sdata['to'] > 0) {
				$nowyear=date('Y');
				$frombase=mktime(0, 0, 0, 1, 1, $nowyear);
				$fromdate=date($df, ($frombase + $sdata['from']));
				if($sdata['to'] < $sdata['from']) {
					$nowyear=$nowyear + 1;
					$frombase=mktime(0, 0, 0, 1, 1, $nowyear);
				}
				$todate=date($df, ($frombase + $sdata['to']));
				//leap years
				$checkly=date('Y');
				if($checkly % 4 == 0 && ($checkly % 100 != 0 || $checkly % 400 == 0)) {
					$frombase=mktime(0, 0, 0, 1, 1, $checkly);
					$infoseason = getdate($frombase + $sdata['from']);
					$leapts = mktime(0, 0, 0, 2, 29, $infoseason['year']);
					if($infoseason[0] >= $leapts) {
						$fromdate=date($df, ($frombase + $sdata['from'] + 86400));
						$frombase=mktime(0, 0, 0, 1, 1, $nowyear);
						$todate=date($df, ($frombase + $sdata['to'] + 86400));
					}
				}
				//
			}else {
				$fromdate = '';
				$todate = '';
			}
			$actweekdays = explode(";", $sdata['wdays']);
			
			$actvalueoverrides = '';
			if (strlen($sdata['losoverride']) > 0) {
				$losoverrides = explode('_', $sdata['losoverride']);
				foreach($losoverrides as $loso) {
					if (!empty($loso)) {
						$losoparts = explode(':', $loso);
						$losoparts[2] = strstr($losoparts[0], '-i') != false ? 1 : 0;
						$losoparts[0] = str_replace('-i', '', $losoparts[0]);
						$actvalueoverrides .= '<p>'.JText::_('VRNEWSEASONNIGHTSOVR').' <input type="text" name="nightsoverrides[]" value="'.$losoparts[0].'" size="4"/> <select name="andmoreoverride[]"><option value="0">-------</option><option value="1"'.($losoparts[2] == 1 ? ' selected="selected"' : '').'>'.JText::_('VRNEWSEASONVALUESOVREMORE').'</option></select> - '.JText::_('VRNEWSEASONVALUESOVR').' <input type="text" name="valuesoverrides[]" value="'.$losoparts[1].'" size="5"/> '.(intval($sdata['val_pcent']) == 2 ? '%' : $currencysymb).'</p>';
					}
				}
			}
			
			?>
			<script language="JavaScript" type="text/javascript">
			function addMoreOverrides() {
				var sel = document.getElementById('val_pcent');
				var curpcent = sel.options[sel.selectedIndex].text;
				var ni = document.getElementById('myDiv');
				var numi = document.getElementById('morevalueoverrides');
				var num = (document.getElementById('morevalueoverrides').value -1)+ 2;
				numi.value = num;
				var newdiv = document.createElement('div');
				var divIdName = 'my'+num+'Div';
				newdiv.setAttribute('id',divIdName);
				newdiv.innerHTML = '<p><?php echo addslashes(JText::_('VRNEWSEASONNIGHTSOVR')); ?> <input type=\'text\' name=\'nightsoverrides[]\' value=\'\' size=\'4\'/> <select name=\'andmoreoverride[]\'><option value=\'0\'>-------</option><option value=\'1\'><?php echo addslashes(JText::_('VRNEWSEASONVALUESOVREMORE')); ?></option></select> - <?php echo addslashes(JText::_('VRNEWSEASONVALUESOVR')); ?> <input type=\'text\' name=\'valuesoverrides[]\' value=\'\' size=\'5\'/> '+curpcent+'</p>';
				ni.appendChild(newdiv);
			}
			</script>
			<input type="hidden" value="0" id="morevalueoverrides" />
			
			<form name="adminForm" id="adminForm" action="index.php" method="post">
			<table class="adminform">
			<tr><td><?php echo JHTML::tooltip(JText::_('VRCSPRICESHELP'), JText::_('VRCSPRICESHELPTITLE'), 'tooltip.png', ''); ?></td></tr>
			<tr><td colspan="2">&nbsp;<span style="font-weight: bold; color: #146295;"><u><?php echo JText::_('VRCSEASON'); ?></u></span></td></tr>
			<tr><td width="150">&bull; <b><?php echo JText::_('VRNEWSEASONONE'); ?>:</b> </td><td><?php echo JHTML::_('calendar', '', 'from', 'from', $caldf, array('class'=>'', 'size'=>'10',  'maxlength'=>'19')); ?></td></tr>
			<tr><td width="150">&bull; <b><?php echo JText::_('VRNEWSEASONTWO'); ?>:</b> </td><td><?php echo JHTML::_('calendar', '', 'to', 'to', $caldf, array('class'=>'', 'size'=>'10',  'maxlength'=>'19')); ?></td></tr>
			<tr><td width="150">&bull; <b><?php echo JText::_('VRCSPONLYPICKINCL'); ?>:</b> </td><td><input type="checkbox" name="pickupincl" value="1"<?php echo ($sdata['pickupincl'] == 1 ? " checked=\"checked\"" : ""); ?>/></td></tr>
			<tr><td width="150">&bull; <b><?php echo JText::_('VRCSPKEEPFIRSTDAYRATE'); ?>:</b> </td><td><input type="checkbox" name="keepfirstdayrate" value="1"<?php echo ($sdata['keepfirstdayrate'] == 1 ? " checked=\"checked\"" : ""); ?>/> &nbsp;&nbsp;<?php echo JHTML::tooltip(JText::_('VRCSPKEEPFIRSTDAYRATEHELP'), JText::_('VRCSPKEEPFIRSTDAYRATE'), 'tooltip.png', ''); ?></td></tr>
			
			<tr><td colspan="2">&nbsp;<span style="font-weight: bold; color: #146295;"><u><?php echo JText::_('VRCWEEKDAYS'); ?></u></span></td></tr>
			
			<tr><td width="150" valign="top">&bull; <b><?php echo JText::_('VRCSEASONDAYS'); ?>:</b> </td><td><select multiple="multiple" size="7" name="wdays[]"><option value="0"<?php echo (in_array("0", $actweekdays) ? " selected=\"selected\"" : ""); ?>><?php echo JText::_('VRCSUNDAY'); ?></option><option value="1"<?php echo (in_array("1", $actweekdays) ? " selected=\"selected\"" : ""); ?>><?php echo JText::_('VRCMONDAY'); ?></option><option value="2"<?php echo (in_array("2", $actweekdays) ? " selected=\"selected\"" : ""); ?>><?php echo JText::_('VRCTUESDAY'); ?></option><option value="3"<?php echo (in_array("3", $actweekdays) ? " selected=\"selected\"" : ""); ?>><?php echo JText::_('VRCWEDNESDAY'); ?></option><option value="4"<?php echo (in_array("4", $actweekdays) ? " selected=\"selected\"" : ""); ?>><?php echo JText::_('VRCTHURSDAY'); ?></option><option value="5"<?php echo (in_array("5", $actweekdays) ? " selected=\"selected\"" : ""); ?>><?php echo JText::_('VRCFRIDAY'); ?></option><option value="6"<?php echo (in_array("6", $actweekdays) ? " selected=\"selected\"" : ""); ?>><?php echo JText::_('VRCSATURDAY'); ?></option></select></td></tr>
			
			<tr><td>&nbsp;</td></tr>
			
			<tr><td width="150">&bull; <b><?php echo JText::_('VRCSPNAME'); ?>:</b> </td><td><input type="text" name="spname" value="<?php echo $sdata['spname']; ?>" size="30"/></td></tr>
			
			<tr><td width="150">&bull; <b><?php echo JText::_('VRNEWSEASONTHREE'); ?>:</b> </td><td><select name="type"><option value="1"<?php echo (intval($sdata['type']) == 1 ? " selected=\"selected\"" : ""); ?>><?php echo JText::_('VRNEWSEASONSIX'); ?></option><option value="2"<?php echo (intval($sdata['type']) == 2 ? " selected=\"selected\"" : ""); ?>><?php echo JText::_('VRNEWSEASONSEVEN'); ?></option></select></td></tr>
			<tr><td width="150">&bull; <b><?php echo JText::_('VRNEWSEASONFOUR'); ?>:</b> </td><td><input type="text" name="diffcost" value="<?php echo $sdata['diffcost']; ?>" size="5"/> <select name="val_pcent" id="val_pcent"><option value="2"<?php echo (intval($sdata['val_pcent']) == 2 ? " selected=\"selected\"" : ""); ?>>%</option><option value="1"<?php echo (intval($sdata['val_pcent']) == 1 ? " selected=\"selected\"" : ""); ?>><?php echo $currencysymb; ?></option></select> &nbsp;<?php echo JHTML::tooltip(JText::_('VRSPECIALPRICEVALHELP'), JText::_('VRNEWSEASONFOUR'), 'tooltip.png', ''); ?></td></tr>
			<tr><td width="150" valign="top">&bull; <b><?php echo JText::_('VRNEWSEASONVALUEOVERRIDE'); ?>:</b> <?php echo JHTML::tooltip(JText::_('VRNEWSEASONVALUEOVERRIDEHELP'), JText::_('VRNEWSEASONVALUEOVERRIDE'), 'tooltip.png', ''); ?></td><td><div id="myDiv" style="display: block;"><?php echo $actvalueoverrides; ?></div><a href="javascript: void(0);" onclick="addMoreOverrides();"><?php echo JText::_('VRNEWSEASONADDOVERRIDE'); ?></a></td></tr>
			<tr><td width="150">&bull; <b><?php echo JText::_('VRNEWSEASONROUNDCOST'); ?>:</b> </td><td><select name="roundmode"><option value=""><?php echo JText::_('VRNEWSEASONROUNDCOSTNO'); ?></option><option value="PHP_ROUND_HALF_UP"<?php echo ($sdata['roundmode'] == 'PHP_ROUND_HALF_UP' ? ' selected="selected"' : ''); ?>><?php echo JText::_('VRNEWSEASONROUNDCOSTUP'); ?></option><option value="PHP_ROUND_HALF_DOWN"<?php echo ($sdata['roundmode'] == 'PHP_ROUND_HALF_DOWN' ? ' selected="selected"' : ''); ?>><?php echo JText::_('VRNEWSEASONROUNDCOSTDOWN'); ?></option></select></td></tr>
			<tr><td width="150" valign="top">&bull; <b><?php echo JText::_('VRNEWSEASONFIVE'); ?>:</b> </td><td><?php echo $wsel; ?></td></tr>
			<tr><td width="150">&bull; <b><?php echo JText::_('VRNEWSEASONEIGHT'); ?>:</b> </td><td><?php echo $wlocsel; ?></td></tr>
			</table>
			<input type="hidden" name="task" value="">
			<input type="hidden" name="option" value="<?php echo $option; ?>">
			<input type="hidden" name="where" value="<?php echo $sdata['id']; ?>">
			</form>
			<script language="JavaScript" type="text/javascript">
			document.getElementById('from').value='<?php echo $fromdate; ?>';
			document.getElementById('to').value='<?php echo $todate; ?>';
			</script>
			<?php
		}else {
			?>
			<p><a href="index.php?option=com_vikrentcar&amp;task=newcar"><?php echo JText::_('VRNOCARSFOUNDSEASONS'); ?></a></p>
			<form action="index.php?option=com_vikrentcar" method="post" name="adminForm" id="adminForm">
			<input type="hidden" name="task" value="" />
			<input type="hidden" name="option" value="<?php echo $option; ?>" />
			</form>
			<?php
		}
	}
	
	function pShowPayments ($rows, $option, $lim0="0", $navbut="") {
		$currencysymb=vikrentcar::getCurrencySymb(true);
		if(empty($rows)){
			?>
			<p><?php echo JText::_('VRNOPAYMENTS'); ?></p>
			<form action="index.php?option=com_vikrentcar" method="post" name="adminForm" id="adminForm">
			<input type="hidden" name="task" value="" />
			<input type="hidden" name="option" value="<?php echo $option; ?>" />
			</form>
			<?php
		}else{
		
		?>
   <script language="JavaScript" type="text/javascript">
function submitbutton(pressbutton) {
			var form = document.adminForm;
			if (pressbutton == 'removepayments') {
				if (confirm('<?php echo JText::_('VRJSDELPAYMENTS'); ?> ?')){
					submitform( pressbutton );
					return;
				}else{
					return false;
				}
			}

			// do field validation
			try {
				document.adminForm.onsubmit();
			}
			catch(e){}
			submitform( pressbutton );
		}
</script>
   <div id="overDiv" style="position:absolute; visibility:hidden; z-index:1000;"></div>
	<script type="text/javascript" src="../includes/js/overlib_mini.js"></script>

	<form action="index.php?option=com_vikrentcar" method="post" name="adminForm" id="adminForm">
	<table cellpadding="4" cellspacing="0" border="0" width="100%" class="table table-striped">
		<thead>
		<tr>
			<th width="20">
				<input type="checkbox" onclick="Joomla.checkAll(this)" value="" name="checkall-toggle">
			</th>
			<th class="title left" width="150"><?php echo JText::_( 'VRPSHOWPAYMENTSONE' ); ?></th>
			<th class="title left" width="150"><?php echo JText::_( 'VRPSHOWPAYMENTSTWO' ); ?></th>
			<th class="title center" width="150" align="center"><?php echo JText::_( 'VRPSHOWPAYMENTSTHREE' ); ?></th>
			<th class="title center" width="100" align="center"><?php echo JText::_( 'VRPSHOWPAYMENTSCHARGEORDISC' ); ?></th>
			<th class="title center" width="50" align="center"><?php echo JText::_( 'VRPSHOWPAYMENTSFIVE' ); ?></th>
		</tr>
		</thead>
		<?php
		
		$k = 0;
		$i = 0;
		for ($i = 0, $n = count($rows); $i < $n; $i++) {
			$row = & $rows[$i];
			$saycharge = "";
			if(strlen($row['charge']) > 0 && $row['charge'] > 0.00) {
				$saycharge .= $row['ch_disc'] == 1 ? "+ " : "- ";
				$saycharge .= $row['charge']." ";
				$saycharge .= $row['val_pcent'] == 1 ? $currencysymb : "%";
			}
			?>
			<tr class="row<?php echo $k; ?>">
				<td><input type="checkbox" id="cb<?php echo $i;?>" name="cid[]" value="<?php echo $row['id']; ?>" onclick="Joomla.isChecked(this.checked);"></td>
				<td><a href="index.php?option=com_vikrentcar&amp;task=editpayment&amp;cid[]=<?php echo $row['id']; ?>"><?php echo $row['name']; ?></a></td>
				<td><?php echo $row['file']; ?></td>
				<td><?php echo strip_tags($row['note']); ?></td>
				<td class="center"><?php echo $saycharge; ?></td>
				<td class="center"><?php echo intval($row['published']) == 1 ? "<img src=\"".JURI::root()."administrator/components/com_vikrentcar/ok.png\"/>" : "<img src=\"".JURI::root()."administrator/components/com_vikrentcar/no.png\"/>"; ?></td>
            </tr>  
              <?php
            $k = 1 - $k;
		}
		?>
		
		</table>
		<input type="hidden" name="option" value="<?php echo $option; ?>" />
		<?php
		if(defined('JVERSION') && version_compare(JVERSION, '1.6.0') < 0) {
			//Joomla 1.5
			
		}
		?>
		<input type="hidden" name="task" value="payments" />
		<input type="hidden" name="boxchecked" value="0" />
		<?php echo JHTML::_( 'form.token' ); ?>
		<?php echo $navbut; ?>
	</form>
	<?php
		}
	}
	
	function pNewPayment ($option) {
		JHTML::_('behavior.tooltip');
		JHtml::_('jquery.framework', true, true);
		JHtml::_('script', JURI::root().'components/com_vikrentcar/resources/jquery-1.10.2.min.js', false, true, false, false);
		$editor =& JFactory::getEditor();
		$allf=glob('./components/com_vikrentcar/payments/*.php');
		$psel="";
		if(@count($allf) > 0) {
			$classfiles=array();
			foreach($allf as $af) {
				$classfiles[]=str_replace('./components/com_vikrentcar/payments/', '', $af);
			}
			sort($classfiles);
			$psel="<select name=\"payment\" onchange=\"vikLoadPaymentParameters(this.value);\">\n<option value=\"\"></option>\n";
			foreach($classfiles as $cf) {
				$psel.="<option value=\"".$cf."\">".$cf."</option>\n";
			}
			$psel.="</select>";
		}
		$currencysymb=vikrentcar::getCurrencySymb(true);
		?>
		<script language="JavaScript" type="text/javascript">
		function vikLoadPaymentParameters(pfile) {
			jQuery.noConflict();
			if(pfile.length > 0) {
				jQuery("#vikparameters").html('<?php echo addslashes(JTEXT::_('VIKLOADING')); ?>');
				jQuery.ajax({
					type: "POST",
					url: "index.php?option=com_vikrentcar&task=loadpaymentparams&tmpl=component",
					data: { phpfile: pfile }
				}).done(function(res) {
					jQuery("#vikparameters").html(res);
				});
			}else {
				jQuery("#vikparameters").html('--------');
			}
		}
		</script>
		
		<form name="adminForm" id="adminForm" action="index.php" method="post">
		<table class="adminform">
		<tr><td width="170">&bull; <b><?php echo JText::_('VRNEWPAYMENTONE'); ?>:</b> </td><td><input type="text" name="name" value="" size="30"/></td></tr>
		<tr><td width="170">&bull; <b><?php echo JText::_('VRNEWPAYMENTTWO'); ?>:</b> </td><td><?php echo $psel; ?></td></tr>
		<tr><td width="170" style="vertical-align: top;">&bull; <b><?php echo JText::_('VRPAYMENTPARAMETERS'); ?>:</b> </td><td id="vikparameters"></td></tr>
		<tr><td width="170">&bull; <b><?php echo JText::_('VRNEWPAYMENTTHREE'); ?>:</b> </td><td><select name="published"><option value="1"><?php echo JText::_('VRNEWPAYMENTSIX'); ?></option><option value="0"><?php echo JText::_('VRNEWPAYMENTSEVEN'); ?></option></select></td></tr>
		<tr><td width="170">&bull; <b><?php echo JText::_('VRNEWPAYMENTCHARGEORDISC'); ?>:</b> </td><td><select name="ch_disc"><option value="1"><?php echo JText::_('VRNEWPAYMENTCHARGEPLUS'); ?></option><option value="2"><?php echo JText::_('VRNEWPAYMENTDISCMINUS'); ?></option></select> <input type="text" name="charge" value="" size="5"/> <select name="val_pcent"><option value="1"><?php echo $currencysymb; ?></option><option value="2">%</option></select></td></tr>
		<tr><td width="170">&bull; <b><?php echo JText::_('VRNEWPAYMENTEIGHT'); ?>:</b> </td><td><select name="setconfirmed"><option value="1"><?php echo JText::_('VRNEWPAYMENTSIX'); ?></option><option value="0" selected="selected"><?php echo JText::_('VRNEWPAYMENTSEVEN'); ?></option></select></td> &nbsp; <?php echo JHTML::tooltip(JText::_('VRCPAYMENTSHELPCONFIRM'), JText::_('VRCPAYMENTSHELPCONFIRMTXT'), 'tooltip.png', ''); ?></tr>
		<tr><td width="170">&bull; <b><?php echo JText::_('VRNEWPAYMENTNINE'); ?>:</b> </td><td><select name="shownotealw"><option value="1"><?php echo JText::_('VRNEWPAYMENTSIX'); ?></option><option value="0" selected="selected"><?php echo JText::_('VRNEWPAYMENTSEVEN'); ?></option></select></td></tr>
		<tr><td width="170" valign="top">&bull; <b><?php echo JText::_('VRNEWPAYMENTFIVE'); ?>:</b> </td><td><?php echo $editor->display( "note", "", 400, 200, 70, 20 ); ?></td></tr>
		</table>
		<input type="hidden" name="task" value="">
		<input type="hidden" name="option" value="<?php echo $option; ?>">
		</form>
		<?php
	}
	
	function pEditPayment ($payment, $option) {
		JHTML::_('behavior.tooltip');
		JHtml::_('jquery.framework', true, true);
		JHtml::_('script', JURI::root().'components/com_vikrentcar/resources/jquery-1.10.2.min.js', false, true, false, false);
		$editor =& JFactory::getEditor();
		$allf=glob('./components/com_vikrentcar/payments/*.php');
		$psel="";
		if(@count($allf) > 0) {
			$classfiles=array();
			foreach($allf as $af) {
				$classfiles[]=str_replace('./components/com_vikrentcar/payments/', '', $af);
			}
			sort($classfiles);
			$psel="<select name=\"payment\" onchange=\"vikLoadPaymentParameters(this.value);\">\n<option value=\"\"></option>\n";
			foreach($classfiles as $cf) {
				$psel.="<option value=\"".$cf."\"".($cf==$payment['file'] ? " selected=\"selected\"" : "").">".$cf."</option>\n";
			}
			$psel.="</select>";
		}
		$currencysymb=vikrentcar::getCurrencySymb(true);
		$payparams = vikrentcar::displayPaymentParameters($payment['file'], $payment['params']);
		?>
		<script language="JavaScript" type="text/javascript">
		function vikLoadPaymentParameters(pfile) {
			jQuery.noConflict();
			if(pfile.length > 0) {
				jQuery("#vikparameters").html('<?php echo addslashes(JTEXT::_('VIKLOADING')); ?>');
				jQuery.ajax({
					type: "POST",
					url: "index.php?option=com_vikrentcar&task=loadpaymentparams&tmpl=component",
					data: { phpfile: pfile }
				}).done(function(res) {
					jQuery("#vikparameters").html(res);
				});
			}else {
				jQuery("#vikparameters").html('--------');
			}
		}
		</script>
		
		<form name="adminForm" id="adminForm" action="index.php" method="post">
		<table class="adminform">
		<tr><td width="170">&bull; <b><?php echo JText::_('VRNEWPAYMENTONE'); ?>:</b> </td><td><input type="text" name="name" value="<?php echo $payment['name']; ?>" size="30"/></td></tr>
		<tr><td width="170">&bull; <b><?php echo JText::_('VRNEWPAYMENTTWO'); ?>:</b> </td><td><?php echo $psel; ?></td></tr>
		<tr><td width="170" style="vertical-align: top;">&bull; <b><?php echo JText::_('VRPAYMENTPARAMETERS'); ?>:</b> </td><td id="vikparameters"><?php echo $payparams; ?></td></tr>
		<tr><td width="170">&bull; <b><?php echo JText::_('VRNEWPAYMENTTHREE'); ?>:</b> </td><td><select name="published"><option value="1"<?php echo intval($payment['published']) == 1 ? " selected=\"selected\"" : ""; ?>><?php echo JText::_('VRNEWPAYMENTSIX'); ?></option><option value="0"<?php echo intval($payment['published']) != 1 ? " selected=\"selected\"" : ""; ?>><?php echo JText::_('VRNEWPAYMENTSEVEN'); ?></option></select></td></tr>
		<tr><td width="170">&bull; <b><?php echo JText::_('VRNEWPAYMENTCHARGEORDISC'); ?>:</b> </td><td><select name="ch_disc"><option value="1"<?php echo ($payment['ch_disc'] == 1 ? " selected=\"selected\"" : ""); ?>><?php echo JText::_('VRNEWPAYMENTCHARGEPLUS'); ?></option><option value="2"<?php echo ($payment['ch_disc'] == 2 ? " selected=\"selected\"" : ""); ?>><?php echo JText::_('VRNEWPAYMENTDISCMINUS'); ?></option></select> <input type="text" name="charge" value="<?php echo $payment['charge']; ?>" size="5"/> <select name="val_pcent"><option value="1"<?php echo ($payment['val_pcent'] == 1 ? " selected=\"selected\"" : ""); ?>><?php echo $currencysymb; ?></option><option value="2"<?php echo ($payment['val_pcent'] == 2 ? " selected=\"selected\"" : ""); ?>>%</option></select></td></tr>
		<tr><td width="170">&bull; <b><?php echo JText::_('VRNEWPAYMENTEIGHT'); ?>:</b> </td><td><select name="setconfirmed"><option value="1"<?php echo intval($payment['setconfirmed']) == 1 ? " selected=\"selected\"" : ""; ?>><?php echo JText::_('VRNEWPAYMENTSIX'); ?></option><option value="0"<?php echo intval($payment['setconfirmed']) != 1 ? " selected=\"selected\"" : ""; ?>><?php echo JText::_('VRNEWPAYMENTSEVEN'); ?></option></select> &nbsp; <?php echo JHTML::tooltip(JText::_('VRCPAYMENTSHELPCONFIRM'), JText::_('VRCPAYMENTSHELPCONFIRMTXT'), 'tooltip.png', ''); ?></td></tr>
		<tr><td width="170">&bull; <b><?php echo JText::_('VRNEWPAYMENTNINE'); ?>:</b> </td><td><select name="shownotealw"><option value="1"<?php echo intval($payment['shownotealw']) == 1 ? " selected=\"selected\"" : ""; ?>><?php echo JText::_('VRNEWPAYMENTSIX'); ?></option><option value="0"<?php echo intval($payment['shownotealw']) != 1 ? " selected=\"selected\"" : ""; ?>><?php echo JText::_('VRNEWPAYMENTSEVEN'); ?></option></select></td></tr>
		<tr><td width="170" valign="top">&bull; <b><?php echo JText::_('VRNEWPAYMENTFIVE'); ?>:</b> </td><td><?php echo $editor->display( "note", $payment['note'], 400, 200, 70, 20 ); ?></td></tr>
		</table>
		<input type="hidden" name="task" value="">
		<input type="hidden" name="option" value="<?php echo $option; ?>">
		<input type="hidden" name="where" value="<?php echo $payment['id']; ?>">
		</form>
		<?php
	}
	
	function pViewExport ($locations, $option) {
		JHTML::_('behavior.calendar');
		$nowdf = vikrentcar::getDateFormat(true);
		if ($nowdf=="%d/%m/%Y") {
			$df='d/m/Y';
		}elseif ($nowdf=="%m/%d/%Y") {
			$df='m/d/Y';
		}else {
			$df='Y/m/d';
		}
		$optlocations = '';
		if (is_array($locations) && count($locations) > 0) {
			foreach($locations as $loc) {
				$optlocations .= '<option value="'.$loc['id'].'">'.$loc['name'].'</option>';
			}
		}
		?>
		<script language="JavaScript" type="text/javascript">
		function vrcExportSetType(val) {
			if(val == 'csv') {
				document.getElementById('vrcexpdateftr').style.display = '';
			}else {
				document.getElementById('vrcexpdateftr').style.display = 'none';
			}
		}
		</script>
		<form name="adminForm" id="adminForm" action="index.php" method="post">
		<table class="adminform">
		<tr><td width="170">&bull; <b><?php echo JText::_('VREXPORTONE'); ?>:</b> </td><td><?php echo JHTML::_('calendar', '', 'from', 'from', $nowdf, array('class'=>'', 'size'=>'10',  'maxlength'=>'19')); ?></td></tr>
		<tr><td width="170">&bull; <b><?php echo JText::_('VREXPORTTWO'); ?>:</b> </td><td><?php echo JHTML::_('calendar', '', 'to', 'to', $nowdf, array('class'=>'', 'size'=>'10',  'maxlength'=>'19')); ?></td></tr>
		<tr><td width="170">&bull; <b><?php echo JText::_('VREXPORTELEVEN'); ?>:</b> </td><td><select name="location"><option value="">--------</option><?php echo $optlocations; ?></select></td></tr>
		<tr><td width="170">&bull; <b><?php echo JText::_('VREXPORTTHREE'); ?>:</b> </td><td><select name="type" id="vrctype" onchange="vrcExportSetType(this.value);"><option value="csv"><?php echo JText::_('VREXPORTFOUR'); ?></option><option value="ics"><?php echo JText::_('VREXPORTFIVE'); ?></option></select></td></tr>
		<tr id="vrcexpdateftr" style=""><td width="170">&bull; <b><?php echo JText::_('VREXPORTTEN'); ?>:</b> </td><td><select name="dateformat"><option value="Y/m/d"<?php echo $df == 'Y/m/d' ? " selected=\"selected\"" : ""; ?>>Y/m/d</option><option value="m/d/Y"<?php echo $df == 'm/d/Y' ? " selected=\"selected\"" : ""; ?>>m/d/Y</option><option value="d/m/Y"<?php echo $df == 'd/m/Y' ? " selected=\"selected\"" : ""; ?>>d/m/Y</option><option value="Y-m-d">Y-m-d</option><option value="m-d-Y">m-d-Y</option><option value="d-m-Y">d-m-Y</option><option value="ts">Unix Timestamp</option></select></td></tr>
		<tr><td width="170">&bull; <b><?php echo JText::_('VREXPORTSIX'); ?>:</b> </td><td><select name="status"><option value="C"><?php echo JText::_('VREXPORTSEVEN'); ?></option><option value="CP"><?php echo JText::_('VREXPORTEIGHT'); ?></option></select></td></tr>
		<tr><td width="170">&nbsp;</td><td><input type="submit" name="vrcsubexp" value="<?php echo JText::_('VREXPORTNINE'); ?>"/></td></tr>
		</table>
		<input type="hidden" name="task" value="doexport">
		<input type="hidden" name="option" value="<?php echo $option; ?>">
		</form>
		<?php
	}
	
}
?>
