<?php  
/**
* Mod_VikSlider
* http://www.extensionsforjoomla.com
*/

defined('_JEXEC') or die('Restricted Area'); 
//jimport( 'joomla.methods' );
//JHTML::_('behavior.mootools');

$document = & JFactory :: getDocument();
$document->addStyleSheet(JURI::base().'modules/mod_viksliderfullscreen/mod_viksliderfullscreen.css');
if(intval($params->get('loadjq')) == 1 ) {
	$document->addScript(JURI::base().'modules/mod_viksliderfullscreen/src/jquery.js');
}
$document->addScript(JURI::base().'modules/mod_viksliderfullscreen/src/effects.js');

$viksliderid = rand(1, 17);
$width = $params->get('width');
$height = $params->get('height');
$wwidth = (!empty($width) ? "width=\"".$width."\"" : "");
$wheight = (!empty($height) ? "height=\"".$height."\"" : "");
$stwidth = (!empty($width) ? "width: ".$width.(substr($width, -1) != "%" ? "px" : "%")."; " : "");
$stheight = (!empty($height) ? "height: ".$height.(substr($height, -1) != "%" ? "px" : "%")."; " : "");

$effect = $params->get('effect');
$timeout = $params->get('timeout');
$speed = $params->get('speedeffect');
$pause = $params->get('pausehover');
$navigation = $params->get('navigation');
$wnext = "";
$wprev = "";

if (intval($navigation) == 1) {
	$navenable=true;
	$wnext="next: '#viksliderfullscreen_next',";
	$wprev="prev: '#viksliderfullscreen_prev'";
}elseif ((int)$timeout == 0) {
	$wnext="next: '#viksliderfullscreen_".$viksliderid."'";
	$wprev="";
}

//virgola check
$speed.=(!empty($wnext) || !empty($wprev) ? "," : "");

$decl="var jq = jQuery.noConflict();\n";
$decl.="jq(document).ready(function(){		
		jq('#vikslider_$viksliderid').cycle({
			fx:     '$effect', 
			timeout: $timeout, 
			pause: $pause,
			speed: $speed
			$wnext 
			$wprev 
		});
		});";
$document->addScriptDeclaration($decl);

for($v = 1; $v <= 10; $v++) {
	$getslide = $params->get('vikslide_'.$v);
	$getlink = $params->get('link_'.$v);
	if (!empty($getslide) && file_exists('./images/viksliderfull/'.$getslide)) {
		if (@getimagesize('./images/viksliderfull/'.$getslide)) {
			if (!empty($getlink)) {
				$arrslide[]="<a href=\"".$getlink."\"><div style=\"background: url(".JURI::root().'images/viksliderfull/'.$getslide."); height:$height;\"border=\"0\"></div></a>";
			}else {
				$textimg = $params->get('text_'.$v);
				if (!empty($textimg)) {
					$arrslide[]="<div class=\"viksliderimgcontainer\"><div style=\"background: url(".JURI::root().'images/viksliderfull/'.$getslide."); height:$height;\"border=\"0\"><span class=\"vikslidertxtimg\">". $textimg ."</span></div></div>";
				} else {
					$arrslide[]="<div style=\"background: url(".JURI::root().'images/viksliderfull/'.$getslide."); height:$height;\" border=\"0\"></div>";
				}
			}
		}else {
			if (!empty($getlink)) {
				$contslide = "<a href=\"".$getlink."\">".file_get_contents('./images/viksliderfull/'.$getslide)."</a>";
			}else {
				$contslide = file_get_contents('./images/viksliderfull/'.$getslide);
			}
			$arrslide[]="<div style=\"position: absolute; top: 0px; display: block; z-index: 4; opacity: 1; ".$stwidth.$stheight."\">".$contslide."</div>";
		}
	}
}

echo "<!-- Init VikSlider http://www.extensionsforjoomla.com/ -->	";	?>

<div cellspacing="0" cellpadding="0">

<div class="vikslImage">
<div id="vikslider_<?php echo $viksliderid; ?>" class="vikslider<?php echo $params->get('moduleclass_sfx'); ?>" style="overflow: hidden; margin: auto; position: relative;" <?php echo $wwidth; ?> <?php echo $wheight; ?>>

    <?php
    if (is_array($arrslide)) {
		foreach($arrslide as $vsl) {
			echo $vsl;
		}
	}
    ?>
</div>
<?php
if ($navenable) {
	?>
<img src="<?php echo JURI::root(); ?>modules/mod_viksliderfullscreen/src/left.png" id="viksliderfullscreen_prev" style="cursor: pointer;"/>
<img src="<?php echo JURI::root(); ?>modules/mod_viksliderfullscreen/src/right.png" id="viksliderfullscreen_next" style="cursor: pointer;"/>
</div>

<?php
}
echo "<!-- End VikSliderFullScreen http://www.extensionsforjoomla.com/ -->	";

?>
</div>	
	