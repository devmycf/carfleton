<?php
/**
 * @author    JoomlaShine.com http://www.joomlashine.com
 * @copyright Copyright (C) 2008 - 2011 JoomlaShine.com. All rights reserved.
 * @license   GNU/GPL v2 http://www.gnu.org/licenses/gpl-2.0.html
 */

// No direct access
defined('_JEXEC') or die('Restricted index access');

// Load template framework
if (!defined('JSN_PATH_TPLFRAMEWORK')) {
	require_once JPATH_ROOT . '/plugins/system/jsntplframework/jsntplframework.defines.php';
	require_once JPATH_ROOT . '/plugins/system/jsntplframework/libraries/joomlashine/loader.php';
}

// Preparing template parameters
JSNTplTemplateHelper::prepare();

// Get template utilities
$jsnutils = JSNTplUtils::getInstance();
?>
<!DOCTYPE html>
<!-- <?php echo $this->template . ' ' . JSNTplHelper::getTemplateVersion($this->template); ?> -->
<!-- Marcado de microdatos añadido por el Asistente para el marcado de datos estructurados de Google. -->
<html lang="<?php echo $this->language ?>" dir="<?php echo $this->direction; ?>" itemscope itemtype="http://schema.org/Article">
<head>

  <link rel="apple-touch-icon" href="http://carflet.es/images/apple-touch-icon.png">
  	<!-- Schema.org markup for Google+ -->
<meta itemprop="name" content="Carflet Rent a Car">
<meta itemprop="description" content="Alquiler de Coches, motocicletas y furgonetas en España y el mundo. Transfer a/de hotel y aeropuerto">
<meta itemprop="image" content="http://carflet.es/images/carflet/carfletlogo.png">


<!-- Twitter Card data -->
<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:site" content="@carfletrentacar">
<meta name="twitter:title" content="Carflet. Alquiler de Coches, Furgonetas, Motocicletas">
<meta name="twitter:description" content="Alquiler de coches, furgonetas, motocicletas. Transfer a hoteles y aeropuertos">
<meta name="twitter:creator" content="@carfletrentacar">
<!-- Twitter summary card with large image must be at least 280x150px -->
<meta name="twitter:image:src" content="https://pbs.twimg.com/profile_banners/4361554623/1449149057/1500x500">

<!-- Open Graph data -->
<meta property="og:title" content="Carflet Rent a Car" />
<meta property="og:type" content="article" />
<meta property="og:url" content="http://carflet.es/" />
<meta property="og:image" content="http://carflet.es/images/carflet/portada.jpg" />
<meta property="og:description" content="Alquiler de Coches, Motocicletas y furgonetas. Transfer a/desde Hoteles y Aeropuertos" />
<meta property="og:site_name" content="Carflet Rent a Car" />
<meta property="article:published_time" content="2014-09-17T05:59:00+01:00" />
<meta property="article:modified_time" content="2014-09-16T19:08:47+01:00" />
<meta property="article:section" content="Empresa" />
<meta property="article:tag" content="alquiler de coches" />
<meta property="fb:admins" content="Facebook numberic ID" />
<link href="/templates/jsn_yoyo_pro/css/custom.css" rel="stylesheet" type="text/css">
	<jdoc:include type="head" />
	<!-- html5.js and respond.min.js for IE less than 9 -->
	<!--[if lt IE 9]>
		<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
		<script src="<?php echo JURI::root(true) ?>/plugins/system/jsntplframework/assets/3rd-party/respond/respond.min.js"></script>
	<![endif]-->
	<?php
	/*====== Show analytics code configured in template parameter ======*/
	if ($this->codePosition == 0) echo $this->codeAnalytic;
	?>
	
	<link href="/templates/jsn_yoyo_pro/css/custom.css" rel="stylesheet" type="text/css">
<link href="/templates/jsn_yoyo_pro/css/customv2.css" rel="stylesheet" type="text/css">
  	<link href="/media/system/css/modal.css" rel="stylesheet" type="text/css"  />
	<link href="/media/jui/css/bootstrap.min.css" rel="stylesheet" type="text/css"  />
	<link href="/media/jui/css/bootstrap-responsive.min.css" rel="stylesheet" type="text/css"  />
	<link href="/media/jui/css/bootstrap-extended.css" rel="stylesheet" type="text/css"  />
	<link href="/plugins/system/jsntplframework/assets/3rd-party/bootstrap/css/bootstrap-frontend.min.css" rel="stylesheet" type="text/css"  />
	<link href="/plugins/system/jsntplframework/assets/3rd-party/bootstrap/css/bootstrap-responsive-frontend.min.css" rel="stylesheet" type="text/css" />
	<link href="/templates/jsn_yoyo_pro/css/print.css" rel="stylesheet" type="text/css" />
	<link href="/templates/system/css/system.css" rel="stylesheet" type="text/css"  />
	<link href="/templates/system/css/general.css" rel="stylesheet" type="text/css"  />
	<link href="/templates/jsn_yoyo_pro/css/template.css" rel="stylesheet" type="text/css" />
	<link href="/templates/jsn_yoyo_pro/css/template_pro.css" rel="stylesheet" type="text/css"  />
	<link href="/templates/jsn_yoyo_pro/css/colors/cyan.css" rel="stylesheet" type="text/css"  />
	<link href="/templates/jsn_yoyo_pro/css/styles/business.css" rel="stylesheet" type="text/css"  />
	<link href="/templates/jsn_yoyo_pro/css/jsn_iconlinks.css" rel="stylesheet" type="text/css"  />
	<link href="/templates/jsn_yoyo_pro/css/layouts/jsn_wide.css" rel="stylesheet" type="text/css"  />
	<link href="/templates/jsn_yoyo_pro/css/layouts/jsn_mobile.css" rel="stylesheet" type="text/css" />
	<link href="/templates/jsn_yoyo_pro/css/custom.css" rel="stylesheet" type="text/css"  />
	<link href="/plugins/system/pagebuilder/assets/3rd-party/bootstrap3/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
	<link href="/plugins/system/pagebuilder/assets/css/pagebuilder.css" rel="stylesheet" type="text/css"/>
	<link href="/plugins/system/pagebuilder/assets/css/jsn-gui-frontend.css" rel="stylesheet" type="text/css"  />
	<link href="/plugins/system/pagebuilder/assets/css/front_end.css" rel="stylesheet" type="text/css" />
	<link href="/plugins/system/pagebuilder/assets/css/front_end_responsive.css" rel="stylesheet" type="text/css"  />
	<link href="/plugins/jsnpagebuilder/defaultelements/module/assets/css/module.css" rel="stylesheet" type="text/css"  />
	<link href="/modules/mod_jux_megamenu/assets/css/style.css" rel="stylesheet" type="text/css"  />
	<link href="/modules/mod_jux_megamenu/assets/css/style/white.css" rel="stylesheet" type="text/css"/>
	<link href="/modules/mod_jux_megamenu/assets/css/style_responsive.css" rel="stylesheet" type="text/css" />
	<link href="/cache/jsn_yoyo_pro/dbc957153f06394a767ebb01d0c67862.css" rel="stylesheet" type="text/css"  />
        <link href="/components/com_vikrentcar/resources/jquery-ui-1.10.3.custom.css" rel="stylesheet" type="text/css"  />
  
<script src="/components/com_vikrentcar/resources/jquery-ui-1.10.3.custom.min.js" type="text/javascript"></script>

<script>
	jQuery(document).ready(function( $ ) {
        // global vars
      var winWidth = $(window).width();
      var winHeight = $(window).height();

        // set initial div height / width
        $('#row-first').css({
            'width': winWidth,
            'height': winHeight,
        });

        // make sure div stays full width/height on resize
        $(window).resize(function(){
            $('#row-first').css({
            'width': winWidth,
            'height': winHeight,
        });
        });

      });

</script>

<script>
	jQuery(document).ready(function( $ ){
		$('#checkbox-devo').change(function() {
				if($(this).is(":checked")) {

					$('#retorno-row').removeClass('oculto');
				}
				else {
					$('#retorno-row').addClass('oculto');
				}
		});
	});
</script>

<script>
	jQuery(document).ready(function( $ ){
		$('#pid6').change(function() {
              console.log('funciona');
				if($(this).is(":checked")) {
					$('.solo-ampli').addClass('esconde-opcion');
				}
		});
	});

  	jQuery(document).ready(function( $ ){
		$('#pid7').change(function() {
              console.log('funciona');
				if($(this).is(":checked")) {
					$('.solo-ampli').removeClass('esconde-opcion');
				}
		});
	});
</script>

<script>
jQuery(document).ready(function( $ ){
  $(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip();
});
});
</script>


<script type="text/javascript">
jQuery(document).ready(function(){
    jQuery("#myTab li:eq(0) a").tab('show');
});
</script>

<script type="text/javascript">
jQuery(document).ready(function( $ ){
	jQuery( "#tab-furgos" ).click(function() {
			console.log("furgo");
			$('[name=categories]').val( 15 );
	});
	jQuery( "#tab-coches" ).click(function() {
			$('[name=categories]').val( 'all' );
	});
});
</script>

 <!-- Begin TradeTracker SuperTag Code -->
<script type="text/javascript">

    var _TradeTrackerTagOptions = {
        t: 'a',
        s: '233834',
        chk: '88ec52c1917b40d959e352594b1b534a',
        overrideOptions: {}
    };

    (function() {var tt = document.createElement('script'), s = document.getElementsByTagName('script')[0]; tt.setAttribute('type', 'text/javascript'); tt.setAttribute('src', (document.location.protocol == 'https:' ? 'https' : 'http') + '://tm.tradetracker.net/tag?t=' + _TradeTrackerTagOptions.t + '&amp;s=' + _TradeTrackerTagOptions.s + '&amp;chk=' + _TradeTrackerTagOptions.chk); s.parentNode.insertBefore(tt, s);})();
</script>
<!-- End TradeTracker SuperTag Code -->
 <script type="text/javascript">
    window.smartlook||(function(d) {
    var o=smartlook=function(){ o.api.push(arguments)},s=d.getElementsByTagName('script')[0];
    var c=d.createElement('script');o.api=new Array();c.async=true;c.type='text/javascript';
    c.charset='utf-8';c.src='//rec.getsmartlook.com/bundle.js';s.parentNode.insertBefore(c,s);
    })(document);
    smartlook('init', 'e927051930b545f555705f46ad8119c408fbea24');
</script>
</head>
<body id="jsn-master" class="<?php echo $this->bodyClass ?>">
	<a id="top"></a>
  	<!-- CONTAINER -->
  	<!--<div class="pure-container" data-effect="pure-effect-slide">-->
      <!--ULTIMO MENU
      <input type="checkbox" id="pure-toggle-left" class="pure-toggle" data-toggle="left"/>-->


      <!--<input type="checkbox" id="pure-toggle-right" class="pure-toggle" data-toggle="right"/>-->
      <!--<input type="checkbox" id="pure-toggle-top" class="pure-toggle" data-toggle="top"/>-->

      <!--ULTIMO MENU
      <label class="pure-toggle-label stay" for="pure-toggle-left" data-toggle-label="left"><span class="pure-toggle-icon"></span><h1>
     	Menú
        </h1></label>-->

      		<div id="jsn-pos-menu-principal">
                        <div id="jsn-pos-logo">
							<jdoc:include type="modules" name="logo" style="jsnmodule" />
              			</div>
            	  <jdoc:include type="modules" name="menuprincipal" style="jsnmodule" />
      		</div>
            <!--<div class="pure-drawer" id="stuffToAnimate" data-position="left">
                        <div id="jsn-pos-leftdrawer">
							<jdoc:include type="modules" name="leftdrawer" style="jsnmodule" />
              			</div>

            </div>-->
      		<div class="row reserv-row">
              <div class="col-md-4">
                   <div class="ads" id="adsbox" data-position="left">
                          <div id="jsn-pos-ads">
                              <p>
                                ¿Quieres colaborar con nosotros? ¡Anunciate Aqui! Por 99€/mes tu empresa será visible a todos los usuarios
                            </p>
                            <p>
                              Contacta con nosotros en: info@carflet.es
                            </p>
                          </div>
              </div>
              </div>
              <div class="col-md-4">
                      <div class="reservation tab-content" id="reservationbox" data-position="right">
																<ul class="nav nav-tabs ocultalo" id="myTab">
																		<li id="tab-coches" class="active"><a data-toggle="tab" href="#sectionA">Coches</a></li>
																		<li id="tab-furgos"><a data-toggle="tab" href="#sectionA">Furgonetas</a></li>
																</ul>
																<div class="tab-content">
																		<div id="sectionA" class="tab-pane fade in active">
																				<div id="jsn-pos-reservation">
																						<jdoc:include type="modules" name="reservation" style="jsnmodule" />
																				</div>
																		</div>
																		<div id="sectionB" class="tab-pane fade">
																				<h3>Alquiler de Furgonetas</h3>
																				<p>Estamos trabajando en esto. Vuelve pronto!</p>
																		</div>
																</div>

                      </div>

              </div>
							<div class="col-md-4 ocultalo">

						    <!-- <div class="tab-content">
						        <div id="sectionA" class="tab-pane fade in active">
						            <h3>Section A</h3>
						            <p>Aliquip placeat salvia cillum iphone. Seitan aliquip quis cardigan american apparel, butcher voluptate nisi qui. Raw denim you probably haven't heard of them jean shorts Austin. Nesciunt tofu stumptown aliqua, retro synth master cleanse. Mustache cliche tempor, williamsburg carles vegan helvetica. Reprehenderit butcher retro keffiyeh dreamcatcher synth.</p>
						        </div>
						        <div id="sectionB" class="tab-pane fade">
						            <h3>Section B</h3>
						            <p>Vestibulum nec erat eu nulla rhoncus fringilla ut non neque. Vivamus nibh urna, ornare id gravida ut, mollis a magna. Aliquam porttitor condimentum nisi, eu viverra ipsum porta ut. Nam hendrerit bibendum turpis, sed molestie mi fermentum id. Aenean volutpat velit sem. Sed consequat ante in rutrum convallis. Nunc facilisis leo at faucibus adipiscing.</p>
						        </div>
						    </div> -->
							</div>
      </div>

	<?php
	/*====== Show modules in position "topbar" ======*/
	if ($jsnutils->countModules('topbar') > 0) {
	?>

	<div id="jsn-topbar">
		<div id="jsn-pos-topbar" class="clearafter">
			<jdoc:include type="modules" name="topbar" style="jsnmodule" />
		</div>
		<div class="clearbreak"></div>
	</div>
	<?php } ?>
	<div id="jsn-page" >
	<?php
		/*====== Show modules in position "stick-lefttop" ======*/
		if ($jsnutils->countModules('stick-lefttop') > 0) {
	?>
		<div id="jsn-pos-stick-lefttop">
			<jdoc:include type="modules" name="stick-lefttop" style="jsnmodule" />
		</div>
	<?php
		}

		/*====== Show modules in position "stick-leftmiddle" ======*/
		if ($jsnutils->countModules('stick-leftmiddle') > 0) {
	?>
		<div id="jsn-pos-stick-leftmiddle">
			<jdoc:include type="modules" name="stick-leftmiddle" style="jsnmodule" />
		</div>
	<?php
		}

		/*====== Show modules in position "stick-leftbottom" ======*/
		if ($jsnutils->countModules('stick-leftbottom') > 0) {
	?>
		<div id="jsn-pos-stick-leftbottom">
			<jdoc:include type="modules" name="stick-leftbottom" style="jsnmodule" />
		</div>
	<?php
		}

		/*====== Show modules in position "stick-righttop" ======*/
		if ($jsnutils->countModules('stick-righttop') > 0) {
	?>
		<div id="jsn-pos-stick-righttop">
			<jdoc:include type="modules" name="stick-righttop" style="jsnmodule" />
		</div>
	<?php
		}

		/*====== Show modules in position "stick-rightmiddle" ======*/
		if ($jsnutils->countModules('stick-rightmiddle') > 0) {
	?>
		<div id="jsn-pos-stick-rightmiddle">
			<jdoc:include type="modules" name="stick-rightmiddle" style="jsnmodule" />
		</div>
	<?php
		}

		/*====== Show modules in position "stick-rightbottom" ======*/
		if ($jsnutils->countModules('stick-rightbottom') > 0) {
	?>
		<div id="jsn-pos-stick-rightbottom">
			<jdoc:include type="modules" name="stick-rightbottom" style="jsnmodule" />
		</div>
	<?php
		}
	?>





		<div itemscope itemtype="http://schema.org/LocalBusiness" itemref="_telephone2 _email3 _address4" id="jsn-body" >
			<div id="jsn-body-inner">
			<?php
				/*====== Show modules in content top area ======*/
				if ($this->helper->countPositions('promo-left', 'promo', 'promo-right', 'content-top')) {
			?>
				<?php
					/*====== Show modules in promo area ======*/
					if ($this->helper->countPositions('promo-left', 'promo', 'promo-right')) {
				?>
				<div id="jsn-promo" class="<?php echo (($this->hasPromoLeft)?'jsn-haspromoleft ':'') ?><?php echo (($this->hasPromoRight)?'jsn-haspromoright ':'') ?>row-fluid"><div id="jsn-promo-inner">
					<?php
					foreach ($this->promoColumns AS $id => $class) {
						/*====== Show modules in position "promo" ======*/
						if ($id == 'promo') {
					?>
	                    <div id="jsn-pos-promo" class="<?php echo $class['span']; ?> <?php echo $class['order']; ?> <?php echo $class['offset']; ?>">
		                        <jdoc:include type="modules" name="promo" style="jsnmodule" class="jsn-roundedbox" />
		                    </div>
					<?php
						}

						/*====== Show modules in position "promo-left" ======*/
						elseif ($id == 'promo-left') {
					?>
	                    <div id="jsn-pos-promo-left" class="<?php echo $class['span']; ?> <?php echo $class['order']; ?> <?php echo $class['offset']; ?>">
								<jdoc:include type="modules" name="promo-left" style="jsnmodule" class="jsn-roundedbox" />
		                    </div>
					<?php
						}

						/*====== Show modules in position "promo-right" ======*/
						elseif ($id == 'promo-right') {
					?>
	                    <div id="jsn-pos-promo-right" class="<?php echo $class['span']; ?> <?php echo $class['order']; ?> <?php echo $class['offset']; ?>">
								<jdoc:include type="modules" name="promo-right" style="jsnmodule" class="jsn-roundedbox" />
		                    </div>
					<?php
						}
					}
					?>
							<div class="clearbreak"></div>
				</div></div>
				<?php
					}
					/*====== Show modules in position "breadcrumbs" ======*/
					if ($jsnutils->countModules('breadcrumbs') > 0) {
				?>
					<div id="jsn-breadcrumbs">
						<div id="jsn-breadcrumbs-inner">
							<jdoc:include type="modules" name="breadcrumbs" />
						</div>
					</div>
				<?php
					}
					/*====== Show modules in position "content-top" ======*/
					if ($jsnutils->countModules('content-top') > 0) {
				?>
					<div id="jsn-content-top" class="jsn-modulescontainer jsn-horizontallayout jsn-modulescontainer<?php echo $jsnutils->countModules('content-top'); ?> row-fluid">
						<div id="jsn-pos-content-top" class="row-fluid">
							<jdoc:include type="modules" name="content-top" style="jsnmodule" columnClass="span<?php echo ceil(12 / $jsnutils->countModules('content-top')); ?>" />
							<div class="clearbreak"></div>
						</div>
					</div>
				<?php
					}
				?>

			<?php
				}
			?>
					<div id="jsn-content" class="<?php echo (($this->hasLeft)?'jsn-hasleft ':'') ?><?php echo (($this->hasRight)?'jsn-hasright ':'') ?><?php echo (($this->hasInnerLeft)?'jsn-hasinnerleft ':'') ?><?php echo (($this->hasInnerRight)?'jsn-hasinnerright ':'') ?>">
						<div id="jsn-content_inner" class="row-fluid">
				<?php
					foreach ($this->mainColumns AS $id => $class) {
						if ($id == 'content') {
				?>
							<div id="jsn-maincontent" class="<?php echo $class['span']; ?> <?php echo $class['order']; ?> <?php echo $class['offset']; ?> row-fluid">
								<div id="jsn-centercol">
									<div id="jsn-centercol_inner">
				<?php
					/*====== Show modules in position "user-top" ======*/
					if ($jsnutils->countModules('user-top') > 0) {
				?>
										<div id="jsn-pos-user-top" class="jsn-modulescontainer jsn-horizontallayout jsn-modulescontainer<?php echo $jsnutils->countModules('user-top'); ?> row-fluid">
					<jdoc:include type="modules" name="user-top" style="jsnmodule" columnClass="span<?php echo ceil(12 / $jsnutils->countModules('user-top')); ?>" />
					<div class="clearbreak"></div>
				</div>
				<?php
					}

				/*====== Show modules in position "user1" and "user2" ======*/
				$positionCount = $this->helper->countPositions('user1', 'user2');
				if ($positionCount)
				{
					$grid_suffix = $positionCount;
				?>
				<div id="jsn-usermodules1" class="jsn-modulescontainer clearafter">
				<?php
					/*====== Show modules in position "user1" ======*/
					if ($jsnutils->countModules('user1') > 0) {
				?>
						<div id="jsn-pos-user1" class="span<?php echo ceil(12 / $grid_suffix); ?>">
						<jdoc:include type="modules" name="user1" style="jsnmodule" />
					</div>
				<?php
					}

				/*====== Show modules in position "user2" ======*/
				if ($jsnutils->countModules('user2') > 0) {
				?>
						<div id="jsn-pos-user2" class="span<?php echo ceil(12 / $grid_suffix); ?>">
							<jdoc:include type="modules" name="user2" style="jsnmodule" />
						</div>
				<?php
					}
				?>
					</div>
				<?php
					}
				?>

						<div id="jsn-mainbody-content" class="<?php echo (($this->hasInnerLeft)?'jsn-hasinnerleft ':'') ?><?php echo (($this->hasInnerRight)?'jsn-hasinnerright ':'') ?><?php echo ($jsnutils->countModules('mainbody-top') > 0)?' jsn-hasmainbodytop':'' ?><?php echo ($jsnutils->countModules('mainbody-bottom') > 0)?' jsn-hasmainbodybottom':'' ?><?php echo ($this->showFrontpage)?' jsn-hasmainbody':'' ?> row-fluid">
								<?php
							foreach($this->contentColumns AS $id2 => $class2) {
								if ($id2 == 'component') {
							?>
							<div id="mainbody-content-inner" class="<?php echo $class2['span']; ?> <?php echo $class2['order']; ?> <?php echo $class2['offset']; ?>">
								<?php
									/*====== Show modules in position "mainbody-top" ======*/
									if ($jsnutils->countModules('mainbody-top') > 0) {
								?>
								<div id="jsn-pos-mainbody-top" class="jsn-modulescontainer jsn-horizontallayout jsn-modulescontainer<?php echo $jsnutils->countModules('mainbody-top'); ?>">
									<jdoc:include type="modules" name="mainbody-top" style="jsnmodule" columnClass="span<?php echo ceil(12 / $jsnutils->countModules('mainbody-top')); ?>" />
									<div class="clearbreak"></div>
								</div>
								<?php
									}

									/*====== Show mainbody ======*/
									if ($this->showFrontpage) {
								?>
								<div id="jsn-mainbody">
									<jdoc:include type="message" />
									<jdoc:include type="component" />
								</div>
								<?php
									}
									/*====== Show modules in position "mainbody-bottom" ======*/
									if ($jsnutils->countModules('mainbody-bottom') > 0) {
								?>
								<div id="jsn-pos-mainbody-bottom" class="jsn-modulescontainer jsn-horizontallayout jsn-modulescontainer<?php echo $jsnutils->countModules('mainbody-bottom'); ?>">
									<jdoc:include type="modules" name="mainbody-bottom" style="jsnmodule" columnClass="span<?php echo ceil(12 / $jsnutils->countModules('mainbody-bottom')); ?>" />
									<div class="clearbreak"></div>
								</div>
								<?php
									}
								?>
							</div>
							<?php
							} elseif ($id2 == 'innerleft') {
								/*====== Show modules in position "innerleft" ======*/
							?>
											<div id="jsn-pos-innerleft" class="<?php echo $class2['span']; ?> <?php echo $class2['order']; ?> <?php echo $class2['offset']; ?>">
								<div id="jsn-pos-innerleft_inner">
									<jdoc:include type="modules" name="innerleft" style="jsnmodule" />
								</div>
							</div>
							<?php
											} elseif ($id2 == 'innerright') {
								/*====== Show modules in position "innerright" ======*/
							?>
											<div id="jsn-pos-innerright" class="<?php echo $class2['span']; ?> <?php echo $class2['order']; ?> <?php echo $class2['offset']; ?>">
									<div id="jsn-pos-innerright_inner">
										<jdoc:include type="modules" name="innerright" style="jsnmodule" />
									</div>
								</div>
							<?php
								}
										}
							?>
						<div class="clearbreak"></div>
					</div>


				<?php
					/*====== Show modules in position "user3" and "user4" ======*/
					$positionCount = $this->helper->countPositions('user3', 'user4');
					if ($positionCount) {
						$grid_suffix = $positionCount;
				?>
										<div id="jsn-usermodules2" class="jsn-modulescontainer jsn-modulescontainer<?php echo $grid_suffix; ?>">
											<div id="jsn-usermodules2_inner_grid<?php echo $grid_suffix; ?>" class="row-fluid">
					<?php
						/*====== Show modules in position "user3" ======*/
						if ($jsnutils->countModules('user3') > 0) {
					?>
												<div id="jsn-pos-user3" class="span<?php echo ceil(12 / $grid_suffix); ?>">
													<jdoc:include type="modules" name="user3" style="jsnmodule" />
												</div>
					<?php
						}

						/*====== Show modules in position "user4" ======*/
						if ($jsnutils->countModules('user4') > 0) { ?>
												<div id="jsn-pos-user4" class="span<?php echo ceil(12 / $grid_suffix); ?>">
													<jdoc:include type="modules" name="user4" style="jsnmodule" />
												</div>
					<?php
						}
					?>
												<div class="clearbreak"></div>
											</div>
										</div>
				<?php
					}

					/*====== Show modules in position "user-bottom" ======*/
					if ($jsnutils->countModules('user-bottom') > 0) { ?>
										<div id="jsn-pos-user-bottom" class="jsn-modulescontainer jsn-horizontallayout jsn-modulescontainer<?php echo $jsnutils->countModules('user-bottom'); ?>">
												<jdoc:include type="modules" name="user-bottom" style="jsnmodule" columnClass="span<?php echo ceil(12 / $jsnutils->countModules('user-bottom')); ?>" />
												<div class="clearbreak"></div>
											</div>
				<?php
					}

					/*====== Show modules in position "banner" ======*/
					if ($jsnutils->countModules('banner') > 0) {
				?>
										<div id="jsn-pos-banner">
											<jdoc:include type="modules" name="banner" style="jsnmodule" />
										</div>
				<?php
					}
				?>
									</div>
								</div>
								<div class="clearbreak"></div>
							</div>

				<?php
				} elseif ($id == 'left') {
					/*====== Show modules in position "left" ======*/
				?>
					<div id="jsn-leftsidecontent" class="<?php echo $class['span']; ?> <?php echo $class['order']; ?> <?php echo $class['offset']; ?>">
								<div id="jsn-leftsidecontent_inner">
									<div id="jsn-pos-left">
										<jdoc:include type="modules" name="left" style="jsnmodule" />
									</div>
								</div>
							</div>
				<?php
				} elseif ($id == 'right') {
					/*====== Show modules in position "right" ======*/
				?>
					<div id="jsn-rightsidecontent" class="<?php echo $class['span']; ?> <?php echo $class['order']; ?> <?php echo $class['offset']; ?>">
								<div id="jsn-rightsidecontent_inner">
									<div id="jsn-pos-right">
										<jdoc:include type="modules" name="right" style="jsnmodule" />
									</div>
								</div>
							</div>
				<?php
					}
			}

				?>
						</div>
					</div>

			<?php
				/*====== Show modules in position "content-bottom-over" ======*/
				if ($jsnutils->countModules('content-bottom-over') > 0) {
			?>
					<div id="jsn-content-bottom-over" class="jsn-modulescontainer jsn-modulescontainer<?php echo $jsnutils->countModules('content-bottom-over'); ?>">
						<div id="jsn-pos-content-bottom-over">
							<jdoc:include type="modules" name="content-bottom-over" style="jsnmodule"/>
							<div class="clearbreak"></div>
						</div>
					</div>
					<div class="clearbreak"></div>
			<?php
				}
			?>

			<?php
				/*====== Show elements in content bottom area ======*/
				if ($this->helper->countPositions('content-bottom', 'user5', 'user6', 'user7')) {
			?>
					<div id="jsn-content-bottom" class="clearafter">
						<div id="jsn-content-bottom-inner">
			<?php
				/*====== Show modules in position "content-bottom" ======*/
				if ($jsnutils->countModules('content-bottom') > 0) {
			?>
						<div id="jsn-pos-content-bottom" class="jsn-modulescontainer jsn-horizontallayout jsn-modulescontainer<?php echo $jsnutils->countModules('content-bottom'); ?>  row-fluid clearafter">
							<jdoc:include type="modules" name="content-bottom" style="jsnmodule" class="jsn-roundedbox" columnClass="span<?php echo ceil(12 / $jsnutils->countModules('content-bottom')); ?>" />
						</div>
			<?php
				}
			?>
			<?php
				/*====== Show modules in position "user5", "user6", "user7" ======*/
						if ($this->helper->countPositions('user5', 'user6', 'user7')) {
			?>
						<div id="jsn-usermodules3" class="jsn-modulescontainer jsn-modulescontainer<?php echo $this->helper->countPositions('user5', 'user6', 'user7'); ?> row-fluid">
						<?php

							/*====== Show modules in position "user5", "user6", "user7" ======*/
							foreach ($this->userColumns AS $id => $class) {

							/*====== Show modules in position "user5" ======*/
								if ($id == 'user5') {
						?>
								<div id="jsn-pos-user5" class="<?php echo $class['span']; ?> <?php echo $class['order']; ?> <?php echo $class['offset']; ?>">
									<jdoc:include type="modules" name="user5" style="jsnmodule" class="jsn-roundedbox" />
							</div>
						<?php
							}

							/*====== Show modules in position "user6" ======*/
								elseif ($id =='user6') {
						?>
								<div id="jsn-pos-user6" class="<?php echo $class['span']; ?> <?php echo $class['order']; ?> <?php echo $class['offset']; ?>">
									<jdoc:include type="modules" name="user6" style="jsnmodule" class="jsn-roundedbox" />
							</div>
						<?php
							}

							/*====== Show modules in position "user7" ======*/
								elseif ($id =='user7') {
						?>
								<div id="jsn-pos-user7" class="<?php echo $class['span']; ?> <?php echo $class['order']; ?> <?php echo $class['offset']; ?>">
									<jdoc:include type="modules" name="user7" style="jsnmodule" class="jsn-roundedbox" />
							</div>
						<?php
							}
						?>
				<?php
					}
				?>
						</div>
			<?php
				}
			?>
						</div>
					</div>
			<?php
				}
			?>
		</div>
		</div>

			<div id="jsn-footer">
			<div id="jsn-footer-inner">
				<div id="jsn-footermodules" class="jsn-modulescontainer row">
							<div id="jsn-pos-footer" class="col-md-4">
								<jdoc:include type="modules" name="footer" style="jsnmodule" />
							</div>
							<div id="jsn-pos-bottom" class="col-md-4">
								<jdoc:include type="modules" name="bottom" style="jsnmodule" />
							</div>
							<div id="jsn-pos-foot3" class="col-md-4">
								<jdoc:include type="modules" name="foot3" style="jsnmodule" />
							</div>
							<div id="jsn-pos-foot4" class="col-md-4">
								<jdoc:include type="modules" name="foot4" style="jsnmodule" />
							</div>
                  			<div id="jsn-pos-footplus" class="col-md-6">
								<jdoc:include type="modules" name="footplus" style="jsnmodule" />
							</div>
					<div class="clearbreak"></div>
					<?php

						/*====== Show social icons ======*/
						if (isset($this->socialIcons) AND count($this->socialIcons)) {
					?>
						<div id="jsn-social-icons">
							<ul>
						<?php
							foreach ($this->socialIcons AS $name => $data) {
						?>
								<li class="<?php echo $name; ?>">
									<a href="<?php echo $data['link']; ?>" title="<?php echo JText::_($data['title']); ?>" target="_blank">
										<?php echo JText::_($data['title']); ?></a>
								</li>
						<?php
							}
						?>
							</ul>
						</div>
					<?php
						}
					?>
					<div class="clearbreak"></div>
				</div>
			</div>
		</div>
	</div>
	<?php
		/*====== Show "Go to top" link ======*/
		if ($this->gotoTop) {
			// Get rid of hitcount=0 that may prevent the button's action
			$hitcount = JRequest::getVar('hitcount', null, 'GET');
			if ($hitcount === null) {
				$this->uri->delVar('hitcount');
			}

			$return = $this->uri->toString();
	?>
		<a id="jsn-gotoplink" href="<?php echo isset($_SERVER['REQUEST_URI']) ? $_SERVER['REQUEST_URI'] : ''; ?>#top">
			<span><?php echo JText::_('JSN_TPLFW_GOTO_TOP'); ?></span>
		</a>
	<?php
		}

		/*====== Show modules in position "background" ======*/
		if ($jsnutils->countModules('background') > 0) {
	?>
			<div id="jsn-pos-background">
				<jdoc:include type="modules" name="background" style="jsnmodule" />
			</div>
	<?php
		}
?>
               <!--</div>CERRANDO PUSHER-->
      <!--</div>
  </div>--> <!-- CERRANDO CONTAINER -->

<jdoc:include type="modules" name="debug" />
<?php
	/*====== Show analytics code configured in template parameter ======*/
	if ($this->codePosition == 1) {
		echo $this->codeAnalytic;
	}
?>




</body>


</html>
