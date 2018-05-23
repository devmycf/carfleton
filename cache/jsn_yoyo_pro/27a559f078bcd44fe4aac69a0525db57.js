// Include: /cache/jsn_yoyo_pro/3248ce194d72085f38d9059b315c8d32.js



/* FILE: /media/jui/js/jquery-migrate.min.js */
/*! jQuery Migrate v1.2.1 | (c) 2005, 2013 jQuery Foundation, Inc. and other contributors | jquery.org/license */
jQuery.migrateMute===void 0&&(jQuery.migrateMute=!0),function(e,t,n){function r(n){var r=t.console;i[n]||(i[n]=!0,e.migrateWarnings.push(n),r&&r.warn&&!e.migrateMute&&(r.warn("JQMIGRATE: "+n),e.migrateTrace&&r.trace&&r.trace()))}function a(t,a,i,o){if(Object.defineProperty)try{return Object.defineProperty(t,a,{configurable:!0,enumerable:!0,get:function(){return r(o),i},set:function(e){r(o),i=e}}),n}catch(s){}e._definePropertyBroken=!0,t[a]=i}var i={};e.migrateWarnings=[],!e.migrateMute&&t.console&&t.console.log&&t.console.log("JQMIGRATE: Logging is active"),e.migrateTrace===n&&(e.migrateTrace=!0),e.migrateReset=function(){i={},e.migrateWarnings.length=0},"BackCompat"===document.compatMode&&r("jQuery is not compatible with Quirks Mode");var o=e("<input/>",{size:1}).attr("size")&&e.attrFn,s=e.attr,u=e.attrHooks.value&&e.attrHooks.value.get||function(){return null},c=e.attrHooks.value&&e.attrHooks.value.set||function(){return n},l=/^(?:input|button)$/i,d=/^[238]$/,p=/^(?:autofocus|autoplay|async|checked|controls|defer|disabled|hidden|loop|multiple|open|readonly|required|scoped|selected)$/i,f=/^(?:checked|selected)$/i;a(e,"attrFn",o||{},"jQuery.attrFn is deprecated"),e.attr=function(t,a,i,u){var c=a.toLowerCase(),g=t&&t.nodeType;return u&&(4>s.length&&r("jQuery.fn.attr( props, pass ) is deprecated"),t&&!d.test(g)&&(o?a in o:e.isFunction(e.fn[a])))?e(t)[a](i):("type"===a&&i!==n&&l.test(t.nodeName)&&t.parentNode&&r("Can't change the 'type' of an input or button in IE 6/7/8"),!e.attrHooks[c]&&p.test(c)&&(e.attrHooks[c]={get:function(t,r){var a,i=e.prop(t,r);return i===!0||"boolean"!=typeof i&&(a=t.getAttributeNode(r))&&a.nodeValue!==!1?r.toLowerCase():n},set:function(t,n,r){var a;return n===!1?e.removeAttr(t,r):(a=e.propFix[r]||r,a in t&&(t[a]=!0),t.setAttribute(r,r.toLowerCase())),r}},f.test(c)&&r("jQuery.fn.attr('"+c+"') may use property instead of attribute")),s.call(e,t,a,i))},e.attrHooks.value={get:function(e,t){var n=(e.nodeName||"").toLowerCase();return"button"===n?u.apply(this,arguments):("input"!==n&&"option"!==n&&r("jQuery.fn.attr('value') no longer gets properties"),t in e?e.value:null)},set:function(e,t){var a=(e.nodeName||"").toLowerCase();return"button"===a?c.apply(this,arguments):("input"!==a&&"option"!==a&&r("jQuery.fn.attr('value', val) no longer sets properties"),e.value=t,n)}};var g,h,v=e.fn.init,m=e.parseJSON,y=/^([^<]*)(<[\w\W]+>)([^>]*)$/;e.fn.init=function(t,n,a){var i;return t&&"string"==typeof t&&!e.isPlainObject(n)&&(i=y.exec(e.trim(t)))&&i[0]&&("<"!==t.charAt(0)&&r("$(html) HTML strings must start with '<' character"),i[3]&&r("$(html) HTML text after last tag is ignored"),"#"===i[0].charAt(0)&&(r("HTML string cannot start with a '#' character"),e.error("JQMIGRATE: Invalid selector string (XSS)")),n&&n.context&&(n=n.context),e.parseHTML)?v.call(this,e.parseHTML(i[2],n,!0),n,a):v.apply(this,arguments)},e.fn.init.prototype=e.fn,e.parseJSON=function(e){return e||null===e?m.apply(this,arguments):(r("jQuery.parseJSON requires a valid JSON string"),null)},e.uaMatch=function(e){e=e.toLowerCase();var t=/(chrome)[ \/]([\w.]+)/.exec(e)||/(webkit)[ \/]([\w.]+)/.exec(e)||/(opera)(?:.*version|)[ \/]([\w.]+)/.exec(e)||/(msie) ([\w.]+)/.exec(e)||0>e.indexOf("compatible")&&/(mozilla)(?:.*? rv:([\w.]+)|)/.exec(e)||[];return{browser:t[1]||"",version:t[2]||"0"}},e.browser||(g=e.uaMatch(navigator.userAgent),h={},g.browser&&(h[g.browser]=!0,h.version=g.version),h.chrome?h.webkit=!0:h.webkit&&(h.safari=!0),e.browser=h),a(e,"browser",e.browser,"jQuery.browser is deprecated"),e.sub=function(){function t(e,n){return new t.fn.init(e,n)}e.extend(!0,t,this),t.superclass=this,t.fn=t.prototype=this(),t.fn.constructor=t,t.sub=this.sub,t.fn.init=function(r,a){return a&&a instanceof e&&!(a instanceof t)&&(a=t(a)),e.fn.init.call(this,r,a,n)},t.fn.init.prototype=t.fn;var n=t(document);return r("jQuery.sub() is deprecated"),t},e.ajaxSetup({converters:{"text json":e.parseJSON}});var b=e.fn.data;e.fn.data=function(t){var a,i,o=this[0];return!o||"events"!==t||1!==arguments.length||(a=e.data(o,t),i=e._data(o,t),a!==n&&a!==i||i===n)?b.apply(this,arguments):(r("Use of jQuery.fn.data('events') is deprecated"),i)};var j=/\/(java|ecma)script/i,w=e.fn.andSelf||e.fn.addBack;e.fn.andSelf=function(){return r("jQuery.fn.andSelf() replaced by jQuery.fn.addBack()"),w.apply(this,arguments)},e.clean||(e.clean=function(t,a,i,o){a=a||document,a=!a.nodeType&&a[0]||a,a=a.ownerDocument||a,r("jQuery.clean() is deprecated");var s,u,c,l,d=[];if(e.merge(d,e.buildFragment(t,a).childNodes),i)for(c=function(e){return!e.type||j.test(e.type)?o?o.push(e.parentNode?e.parentNode.removeChild(e):e):i.appendChild(e):n},s=0;null!=(u=d[s]);s++)e.nodeName(u,"script")&&c(u)||(i.appendChild(u),u.getElementsByTagName!==n&&(l=e.grep(e.merge([],u.getElementsByTagName("script")),c),d.splice.apply(d,[s+1,0].concat(l)),s+=l.length));return d});var Q=e.event.add,x=e.event.remove,k=e.event.trigger,N=e.fn.toggle,T=e.fn.live,M=e.fn.die,S="ajaxStart|ajaxStop|ajaxSend|ajaxComplete|ajaxError|ajaxSuccess",C=RegExp("\\b(?:"+S+")\\b"),H=/(?:^|\s)hover(\.\S+|)\b/,A=function(t){return"string"!=typeof t||e.event.special.hover?t:(H.test(t)&&r("'hover' pseudo-event is deprecated, use 'mouseenter mouseleave'"),t&&t.replace(H,"mouseenter$1 mouseleave$1"))};e.event.props&&"attrChange"!==e.event.props[0]&&e.event.props.unshift("attrChange","attrName","relatedNode","srcElement"),e.event.dispatch&&a(e.event,"handle",e.event.dispatch,"jQuery.event.handle is undocumented and deprecated"),e.event.add=function(e,t,n,a,i){e!==document&&C.test(t)&&r("AJAX events should be attached to document: "+t),Q.call(this,e,A(t||""),n,a,i)},e.event.remove=function(e,t,n,r,a){x.call(this,e,A(t)||"",n,r,a)},e.fn.error=function(){var e=Array.prototype.slice.call(arguments,0);return r("jQuery.fn.error() is deprecated"),e.splice(0,0,"error"),arguments.length?this.bind.apply(this,e):(this.triggerHandler.apply(this,e),this)},e.fn.toggle=function(t,n){if(!e.isFunction(t)||!e.isFunction(n))return N.apply(this,arguments);r("jQuery.fn.toggle(handler, handler...) is deprecated");var a=arguments,i=t.guid||e.guid++,o=0,s=function(n){var r=(e._data(this,"lastToggle"+t.guid)||0)%o;return e._data(this,"lastToggle"+t.guid,r+1),n.preventDefault(),a[r].apply(this,arguments)||!1};for(s.guid=i;a.length>o;)a[o++].guid=i;return this.click(s)},e.fn.live=function(t,n,a){return r("jQuery.fn.live() is deprecated"),T?T.apply(this,arguments):(e(this.context).on(t,this.selector,n,a),this)},e.fn.die=function(t,n){return r("jQuery.fn.die() is deprecated"),M?M.apply(this,arguments):(e(this.context).off(t,this.selector||"**",n),this)},e.event.trigger=function(e,t,n,a){return n||C.test(e)||r("Global events are undocumented and deprecated"),k.call(this,e,t,n||document,a)},e.each(S.split("|"),function(t,n){e.event.special[n]={setup:function(){var t=this;return t!==document&&(e.event.add(document,n+"."+e.guid,function(){e.event.trigger(n,null,t,!0)}),e._data(this,n,e.guid++)),!1},teardown:function(){return this!==document&&e.event.remove(document,n+"."+e._data(this,n)),!1}}})}(jQuery,window);;


/* FILE: /plugins/system/jsntplframework/assets/joomlashine/js/noconflict.js */
/**
* @author    JoomlaShine.com http://www.joomlashine.com
* @copyright Copyright (C) 2008 - 2011 JoomlaShine.com. All rights reserved.
* @license   GNU/GPL v2 http://www.gnu.org/licenses/gpl-2.0.html
*/
if (typeof(jQuery) !== "undefined") { jQuery.noConflict(); };


/* FILE: /plugins/system/jsntplframework/assets/joomlashine/js/utils.js */
/**
* @author    JoomlaShine.com http://www.joomlashine.com
* @copyright Copyright (C) 2008 - 2011 JoomlaShine.com. All rights reserved.
* @license   GNU/GPL v2 http://www.gnu.org/licenses/gpl-2.0.html
*/
var JSNUtils = {
	/* ============================== BROWSER ============================== */
	/**
	 * Encode double quote character to comply with Opera browser
	 * Add more rules here if needed
	 */
	encodeCookie: function(value) {
		return value.replace(/\"/g, '%22');
	},

	/**
	 * Decode double quote character back to normal
	 */
	decodeCookie: function(value) {
		return value.replace(/\%22/g, '"');
	},

	writeCookie: function (name,value,days){
		value = JSNUtils.encodeCookie(value);

		if (days) {
			var date = new Date();
			date.setTime(date.getTime()+(days*24*60*60*1000));
			var expires = "; expires="+date.toGMTString();
		} else expires = "";

		document.cookie = name+"="+value+expires+"; path=/";
	},

	readCookie: function (name){
		var nameEQ = name + "=";
		var ca = document.cookie.split(';');
		for(var i=0;i < ca.length;i++) {
			var c = ca[i];
			while (c.charAt(0)==' ') c = c.substring(1,c.length);
			if (c.indexOf(nameEQ) == 0) return JSNUtils.decodeCookie(c.substring(nameEQ.length,c.length));
		}
		return null;
	},

	isIE: function(version) {
		if (version == 'mobile') {
			return (navigator.userAgent.match(/IEMobile\/([0-9]+\.[0-9]+);/) != null);
		}

		return (navigator.appVersion.indexOf('MSIE ' + version + '.') > -1);
	},

	isIE7: function() {
		return JSNUtils.isIE(7);
	},

	setDesktopOnMobile: function() {
		if (JSNUtils.checkMobile()) {
			document.body.addClass('jsn-desktop-on-mobile');
		}
	},

	isDesktopViewOnMobile: function (params) {
		if (params) {
			if (JSNUtils.checkMobile()) {
				if (!params.responsiveLayout.length || !params.responsiveLayout.contains('mobile')) {
					document.body.addClass('jsn-desktop-on-mobile');
				}

				if (!params.enableMobile) {
					JSNUtils.initMenuForDesktopView(true);
				}
			}
		}

		return document.body.hasClass('jsn-mobile');
	},

	initMenuForDesktopView: function (checked) {
		if (checked) {
			var sitetools = document.id('jsn-sitetools-menu');

			if (sitetools) {
				sitetools.addClass('sitetool-desktop-on-mobile');
			}

			document.getElements('ul.menu-mainmenu').addClass('jsn-desktop-on-mobile');
		}
	},

	// Initialize scrolling effect for in-page anchor links
	initScrollToContent: function(stickyMenus) {
		if (window.jQuery) {
			jQuery(window).load(function() {
				jQuery('.jsn-menu-toggle + ul li.jsn-scroll > a').each(function(i, link) {
					jQuery(link).click(function(event) {
						event.preventDefault();

						var target = jQuery(jQuery(this).attr('href')), menu = jQuery('#jsn-menu');

						if (target.length) {
							var pos = target.offset();

							if (stickyMenus && menu) {
								if (stickyMenus.mobile == '1' && JSNUtils.checkMobile() && menu.hasClass('jsn-menu-sticky')) {
									pos.top -= menu.outerHeight() + menu.getElement('ul.menu-mainmenu').outerHeight();
								} else if (stickyMenus.desktop == '1' && (!JSNUtils.checkMobile() || document.body.hasClass('jsn-desktop-on-mobile'))) {
									pos.top -= menu.outerHeight();
								}
							}

							jQuery('html,body').animate({scrollTop: pos.top, scrollLeft: pos.left}, 500);
						}
					});
				});
			});
		} else if (typeof Fx != 'undefined' && typeof Fx.Scroll != 'undefined') {
			window.addEvent('load', function() {
				document.getElements('.jsn-menu-toggle + ul li.jsn-scroll > a').each(function(link) {
					link.addEvent('click', function(event) {
						event.preventDefault();

						var target = document.getElement(this.getAttribute('href')), menu = document.id('jsn-menu');

						if (target) {
							var pos = target.getPosition();

							if (stickyMenus && menu) {
								if (stickyMenus.mobile == '1' && JSNUtils.checkMobile() && menu.hasClass('jsn-menu-sticky')) {
									pos.y -= menu.getSize().y + menu.getElement('ul.menu-mainmenu').getSize().y;
								} else if (stickyMenus.desktop == '1' && (!JSNUtils.checkMobile() || document.body.hasClass('jsn-desktop-on-mobile'))) {
									pos.y -= menu.getSize().y;
								}
							}

							(this.__scrollFxObj = this.__scrollFxObj || new Fx.Scroll(window)).start(pos.x, pos.y);
						}
					});
				});
			});
		}

		// Handle switch in-page link state
		window.addEvent('load', function() {
			var anchors = document.getElements('ul.menu-mainmenu li a[href^="#"]'), targets = [], lastScrollTop,

			// Define function to activate a menu item
			activate = function(i) {
				anchors.each(function(anchor) {
					if (anchor.getParent().hasClass('active') && anchor.getAttribute('href') != '#' + targets[i].id) {
						// Clear current active state
						anchor.getParent().removeClass('active');
					} else if (!anchor.getParent().hasClass('active') && anchor.getAttribute('href') == '#' + targets[i].id) {
						// Set new active state
						anchor.getParent().addClass('active');
					}
				});
			};

			// Query for target element
			anchors.each(function(anchor) {
				targets.push(document.getElement(anchor.getAttribute('href')));
			});

			// Handle window scroll event
			window.addEvent('scroll', function() {
				var windowHeight = window.getSize().y, scrollHeight = window.getScrollSize().y, scrollTop = window.getScroll().y, diff;

				if (scrollTop == 0) {
					// To top, look for top-most element
					var top_most = 0, diff = targets[0].getPosition().y;

					for (var i = 1; i < targets.length; i++) {
						if (targets[i].getPosition().y < diff) {
							top_most = i;
							diff = targets[i].getPosition().y;
						}
					}

					activate(top_most);
				} else if (scrollHeight - scrollTop == windowHeight) {
					// To bottom, look for bottom-most element
					var bottom_most = targets.length - 1, diff = targets[targets.length - 1].getPosition().y;

					for (var i = 0; i < targets.length - 1; i++) {
						if (targets[i].getPosition().y > diff) {
							bottom_most = i;
							diff = targets[i].getPosition().y;
						}
					}

					activate(bottom_most);
				} else {
					// Scrolling either up or down
					for (var i = 0; i < targets.length; i++) {
						diff = targets[i].getPosition().y - scrollTop;

						if (diff < 0) {
							diff = 0 - diff;
						}

						if (diff < (windowHeight / 5)) {
							activate(i);
						}
					}
				}

				return true;
			}).fireEvent('scroll');
		});
	},

	getBrowserInfo: function(){
		var name = '';
		var version = '';
		var ua = navigator.userAgent.toLowerCase();
		var match = ua.match(/(opera|ie|firefox|chrome|version)[\s\/:]([\w\d\.]+)?.*?(safari|version[\s\/:]([\w\d\.]+)|$)/) || [null, 'unknown', 0];
		if (match[1] == 'version')
		{
			name = match[3];
		}
		else
		{
			name = match[1];
		}
		version = parseFloat((match[1] == 'opera' && match[4]) ? match[4] : match[2]);

		return {'name': name, 'version': version};
	},

	/* ============================== DEVICE ============================== */

	checkMobile: function(){
		var uagent = navigator.userAgent.toLowerCase(), isMobile = false, mobiles = [
			"midp","240x320","blackberry","netfront","nokia","panasonic",
			"portalmmm","sharp","sie-","sonyericsson","symbian",
			"windows ce","benq","mda","mot-","opera mini",
			"philips","pocket pc","sagem","samsung","sda",
			"sgh-","vodafone","xda","palm","iphone",
			"ipod","android", "ipad"
		];

		for (var i = 0; i < mobiles.length; i++) {
			if (uagent.indexOf(mobiles[i]) > -1) {
				isMobile = true;
			}
		}

		if (isMobile) {
			JSNUtils.isAppleDevice = /ipod|ipad|iphone/.test(uagent);
			JSNUtils.isWindowPhone = /windows phone/.test(uagent);
			JSNUtils.isAndroidDevice = /android/.test(uagent);
		}

		return isMobile;
	},

	getScreenWidth: function(){
		var screenWidth;

		if( typeof( window.innerWidth ) == 'number' )
		{
			// IE 9+ and other browsers
			screenWidth = window.innerWidth;
		}
		else if (document.documentElement && document.documentElement.clientWidth)
		{
			//IE 6 - 8
			screenWidth = document.documentElement.clientWidth;
		}

		return screenWidth;
	},

	checkSmartphone: function(){
		var screenWidth = JSNUtils.getScreenWidth(), isSmartphone = false;

		if (screenWidth >= 320 && screenWidth < 480)
		{
			isSmartphone = true;
		}

		return isSmartphone;
	},

	checkTablet: function(){
		var screenWidth = JSNUtils.getScreenWidth(), isTablet = false;

		if (screenWidth >= 481 && screenWidth < 1024)
		{
			isTablet = true;
		}

		return isTablet;
	},

	getScreenType: function(){
		var screenType;

		if (JSNUtils.checkSmartphone()) {
			screenType = 'smartphone';
		} else if (JSNUtils.checkTablet()) {
			screenType = 'tablet';
		} else {
			screenType = 'desktop';
		}

		return screenType;
	},


	/* ============================== DOM - GENERAL ============================== */

	addEvent: function(target, event, func){
		if (target.addEventListener){
			target.addEventListener(event, func, false);
			return true;
		} else if (target.attachEvent){
			var result = target.attachEvent("on"+event, func);
			return result;
		} else {
			return false;
		}
	},

	getElementsByClass: function(targetParent, targetTag, targetClass, targetLevel){
		var elements, tags, tag, tagClass;

		if(targetLevel == undefined){
			tags = targetParent.getElementsByTagName(targetTag);
		}else{
			tags = JSNUtils.getChildrenAtLevel(targetParent, targetTag, targetLevel);
		}

		elements = [];

		for(var i=0;i<tags.length;i++){
			tagClass = tags[i].className;
			if(tagClass != "" && JSNUtils.checkSubstring(tagClass, targetClass, " ", false)){
				elements[elements.length] = tags[i];
			}
		}

		return elements;
	},

	getFirstChild: function(targetEl, targetTagName){
		var nodes, node;
		nodes = targetEl.childNodes;
		for(var i=0;i<nodes.length;i++){
			node = nodes[i];
			if (node.tagName == targetTagName)
				return node;
		}
		return null;
	},

	getFirstChildAtLevel: function(targetEl, targetTagName, targetLevel){
		var child, nodes, node;
		nodes = targetEl.childNodes;
		for(var i=0;i<nodes.length;i++){
			node = nodes[i];
			if (targetLevel == 1) {
				if(node.tagName == targetTagName) return node;
			} else {
				child = JSNUtils.getFirstChildAtLevel(node, targetTagName, targetLevel-1);
				if(child != null) return child;
			}
		}
		return null;
	},

	getChildren: function(targetEl, targetTagName){
		var nodes, node;
		var children = [];
		nodes = targetEl.childNodes;
		for(var i=0;i<nodes.length;i++){
			node = nodes[i];
			if(node.tagName == targetTagName)
				children.push(node);
		}
		return children;
	},

	getChildrenAtLevel: function(targetEl, targetTagName, targetLevel){
		var children = [];
		var nodes, node;
		nodes = targetEl.childNodes;
		for(var i=0;i<nodes.length;i++){
			node = nodes[i];
			if (targetLevel == 1) {
				if(node.tagName == targetTagName) children.push(node);
			} else {
				children = children.concat(JSNUtils.getChildrenAtLevel(node, targetTagName, targetLevel-1));
			}
		}
		return children;
	},

	addClass: function(targetTag, targetClass){
		if(targetTag.className == ""){
			targetTag.className = targetClass;
		} else {
			if(!JSNUtils.checkSubstring(targetTag.className, targetClass, " ")){
				targetTag.className += " " + targetClass;
			}
		}
	},

	getViewportSize: function(){
		var myWidth = 0, myHeight = 0;

		if( typeof( window.innerWidth ) == 'number' ) {
			//Non-IE
			myWidth = window.innerWidth;
			myHeight = window.innerHeight;
		} else if( document.documentElement && ( document.documentElement.clientWidth || document.documentElement.clientHeight ) ) {
			//IE 6+ in 'standards compliant mode'
			myWidth = document.documentElement.clientWidth;
			myHeight = document.documentElement.clientHeight;
		} else if( document.body && ( document.body.clientWidth || document.body.clientHeight ) ) {
			//IE 4 compatible
			myWidth = document.body.clientWidth;
			myHeight = document.body.clientHeight;
		}

		return {width:myWidth, height:myHeight };
	},

	addURLPrefix: function(targetId)
	{
		var navUrl = window.location.href;
		var targetEl = document.getElementById(targetId);
		if(targetEl != undefined && targetEl.tagName.toUpperCase() == 'A')
		{
			orgHref = targetEl.href;
			targetEl.href = navUrl + ((navUrl.indexOf(orgHref) != -1)?'':orgHref);
		}
	},

	/* ============================== DOM - GUI ============================== */
	/* ============================== DOM - GUI - MENU ============================== */

	/**
	 * Reposition submenu if it goes off screen area.
	 */
	setSubmenuPosition: function(enableRTL)
	{
		// Skip repositioning submenu if mobile menu is active
		var toggle = document.getElement('span.jsn-menu-toggle');

		if (toggle && toggle.getStyle('display') != 'none') {
			return;
		}

		// Initialize parameters
		var maxSize, parents, enableRTL = enableRTL || false;

		// Get all parents
		parents = document.getElements('ul.menu-mainmenu > li.parent');

		if (!parents.length) return;

		// Add level to all submenus
		parents.each(function(parent) {
			var submenu = parent.getChildren('ul'), level = 0;

			while (submenu.length) {
				var tmp = [];

				// Increase submenu level
				level++;

				// Add class to indicate submenu level
				submenu.each(function(ul) {
					ul.addClass('jsn-submenu-level-' + level);

					// Get nested submenus
					ul.getElements('> li.parent > ul').each(function(nested) {
						tmp.push(nested);
					});
				});

				// Set nested submenus
				submenu = tmp;
			}

			// Store max level of submenu
			parent.jsnMaxSubmenuLevel = level;
		});

		// Declare some utilities
		var placeSubmenu = function(parent, flipBack) {
			var	width = 0, submenu = parent.getElement('ul.jsn-submenu-level-' + parent.jsnMaxSubmenuLevel),
				flipBack = flipBack || false, farLeft;

			// Calculate submenu's far-left offset
			if ((enableRTL && !flipBack) || (!enableRTL && flipBack)) {
				farLeft = parent.getPosition().x + parent.getSize().x;

				// Calculate far-left position when all nested submenus are expanded
				while (!submenu.hasClass('menu-mainmenu')) {
					farLeft -= submenu.getSize().x;

					// Travel back the DOM tree
					submenu = submenu.getParent().getParent();
				}
			} else if ((!enableRTL && !flipBack) || (enableRTL && flipBack)) {
				farLeft = parent.getPosition().x;

				// Calculate total width when all nested submenus are expanded
				while (!submenu.hasClass('menu-mainmenu')) {
					width += submenu.getSize().x;

					// Travel back the DOM tree
					submenu = submenu.getParent().getParent();
				}
			}

			// Check if there is any submenu goes off screen when all nested submenus are expanded
			if (
				(((enableRTL && !flipBack) || (!enableRTL && flipBack)) && farLeft < 0)
				||
				(((!enableRTL && !flipBack) || (enableRTL && flipBack)) && farLeft + width > maxSize.x)
			) {
				if (!flipBack) {
					parent.addClass('jsn-submenu-flipback');

					// Check if there is any submenu goes off screen in the opposite side after flipping back
					placeSubmenu(parent, true);
				} else {
					parent.removeClass('jsn-submenu-flipback');
				}
			}
		},

		resizeHandler = function() {
			// Disable left-right scrolling
			document.body.setStyle('overflow-x', 'hidden');

			// Update max screen area
			maxSize = window.getSize();

			// Place all submenus
			parents.each(function(parent) {
				var submenus = parent.getElements('ul');

				// Restore original position for all submenu
				parent.removeClass('jsn-submenu-flipback');

				// Make sure all submenus is visible
				submenus.setStyle('display', 'block');

				// Place nested submenus
				placeSubmenu(parent);

				// Restore default visibility state for submenu
				submenus.setStyle('display', '');
			});

			// Restore original left-right scrolling
			document.body.setStyle('overflow-x', '');
		};

		// Handle window resize event
		window.addEvent('resize', function() {
			placeSubmenu.timer && clearTimeout(placeSubmenu.timer);
			placeSubmenu.timer = setTimeout(resizeHandler, 500);
		});

		// Place all submenus
		resizeHandler();
	},

	setMobileMenu: function(menuClass)
	{
		if (JSNUtils.mobileMenuInitialized) {
			return;
		}

		var toggle = function() {
			this.toggleClass("active");
			this.getNext("ul").toggleClass("jsn-menu-mobile");

			document.getElements("." + menuClass + " .jsn-menu-toggle").each(function (item) {
				var a = item.getPrevious(),
					size = a.getSize();

				item.setStyle('height', size.y);
			});

			window.fireEvent('toggle-mobile-menu');
		};

		// Setup toggle for main trigger
		document.getElements("ul." + menuClass).getPrevious(".jsn-menu-toggle").each(function(e) {
			e && e.addEvent('click', toggle);
		});

		// Setup toggle for children triggers
		document.getElements("ul." + menuClass + " .jsn-menu-toggle").addEvent('click', toggle);

		window.addEvent('resize', function () {
			if (window.getSize().x > 960) {
				document.getElements('ul.jsn-menu-mobile').removeClass('jsn-menu-mobile');
			}
		});

		JSNUtils.mobileMenuInitialized = true;
	},

	setDesktopSticky: function(menuId) {
		// Check if sticky menu is enabled on mobile?
		if ((JSNUtils.checkMobile() || JSNUtils.getScreenType() != 'desktop') && !document.body.hasClass('jsn-desktop-on-mobile')) {
			return;
		}

		// Initialize sticky menu on desktop
		var header = document.id(menuId ? menuId : 'jsn-menu');

		window.addEvent('load', function() {
			var	headerPosition = header.getPosition(),
				menuHeight = header.getHeight(),
				placeHolder = new Element('div', {'class': 'jsn-menu-placeholder'});

			window.addEvent('scroll', function(event) {
				var windowScroll = window.getScroll();

				if (windowScroll.y > headerPosition.y) {
					header.addClass('jsn-menu-sticky');	
					placeHolder.inject(header, 'after');
					placeHolder.setStyle('height', menuHeight);
				} else {
					header.removeClass('jsn-menu-sticky');
					placeHolder.destroy();
				}
			});
		});
	},

	setMobileSticky: function(menuId) {
		// State that sticky menu is enabled on mobile
		JSNUtils.mobileStickyEnabled = true;

		// Get necessary elements
		var page = document.id('jsn-page'),
			menu = document.id(menuId ? menuId : 'jsn-menu'),
			menuToggler = menu.getElement('.jsn-menu-toggle'),
			mainMenu = menu.getElement('ul.menu-mainmenu'),
			menuSize = menu.getCoordinates(),
			menuPlacehoder = new Element('div', { 'id': 'jsn-menu-placeholder' }),
			menuParent = menu.getParent(),
			menuParentOffset = menuParent.getCoordinates(),
			menuLeft = menuSize.left,
			menuPaddingHorz = parseInt(menu.getStyle('padding-left')) + parseInt(menu.getStyle('padding-right')),
			menuBorderHorz = parseInt(menu.getStyle('border-left')) + parseInt(menu.getStyle('border-right')),
			isSticked = false,
			touchStartOffset = {},
			isFixedSupport = JSNUtils.isFixedSupport(),
			lastScrollTop = 0;

		menuPlacehoder.setStyles({
			height: menuSize.height,
			margin: menu.getStyle('margin')
		});

		var getMaxMenuHeight = function () { return window.innerHeight - menuSize.height; };
		var getTouchDirection = function (touchEvent) { return touchEvent.touches[0].pageY > touchStartOffset.y ? 'up' : 'down'; };

		var resetMenuPosition = function () {
			var restorePoint = menuPlacehoder.getPosition().y;

			if (restorePoint == 0) {
				var parent = menuPlacehoder.getParent();

				while (parent.nodeName != 'BODY' && parent.getStyle('position') != 'relative') {
					parent = parent.getParent();
				}

				restorePoint = parent.getPosition().y;
			}

			if (window.getScroll().y < restorePoint) {
				menu
					.removeClass('jsn-menu-sticky jsn-mobile-menu-sticky')
					.removeAttribute('style');

				menuPlacehoder.dispose();
				mainMenu.setStyles({
					'max-height': 'auto',
					'overflow-y': 'hidden'
				});

				isSticked = false;
			}
		};

		var getMenuWidth = function (forceMenuWidth) {
			var menuWidth = forceMenuWidth || menuSize.width;

			if (!isNaN(menuPaddingHorz))
				menuWidth = menuWidth - menuPaddingHorz;

			if (!isNaN(menuBorderHorz))
				menuWidth = menuWidth - menuBorderHorz;

			return menuWidth;
		};

		var fx = new Fx.Morph(menu, { transition: Fx.Transitions.Expo.easeOut });
			fx.addEvent('complete', resetMenuPosition);

		var makeMenuStick = function () {
			var scrollTop = window.getScroll().y,
				menuOffsetTop = menu.getPosition().y;

			if (mainMenu.getStyle('display') == 'block' && !menu.hasClass('jsn-mobile-menu-sticky')) {
				return menu.setStyles({
					'left' : '',
					'width' : '',
					'position' : 'relative',
					'top' : '',
					'z-index' : ''
				});
			}

			if (scrollTop > menuOffsetTop && menuParent.getElement('#jsn-menu-placeholder') == null && isSticked == false) {
				if (fx.isRunning())
					fx.cancel();

				menuSize = menu.getCoordinates();
				menuLeft = menuSize.left;

				menu.addClass('jsn-menu-sticky jsn-mobile-menu-sticky').setStyles({
					'left' : menuLeft,
					'width' : getMenuWidth(),
					'position' : isFixedSupport ? 'fixed' : 'absolute',
					'top' : isFixedSupport ? 0 : scrollTop,
					'z-index' : 9999999
				});

				menuPlacehoder.inject(menu, 'before');

				isSticked = true;
			}
		};

		var updatePosition = function () {
			// Stick menu to top
			updatePosition.longMenuFixed || makeMenuStick();

			if (mainMenu.getStyle('display') == 'block' && !menu.hasClass('jsn-mobile-menu-sticky')) {
				return menu.setStyles({
					'left' : '',
					'width' : '',
					'position' : 'relative',
					'top' : '',
					'z-index' : ''
				});
			}

			var	scrollTop = window.getScroll().y,
				placeHoderOffset = menuPlacehoder.getPosition().y;

			// Check scrolling direction
			if (scrollTop >= lastScrollTop) {
				// User is scrolling to bottom of page
				if (getMaxMenuHeight() < mainMenu.getCoordinates().height) {
					// Menu is longer than the screen height
					if (!updatePosition.longMenuFixed) {
						// Switch menu to absolute position so user can scroll down to set the rest of the menu
						menu.setStyles({
							position : 'absolute',
							top : lastScrollTop
						});
					}

					// Store last scroll top
					lastScrollTop = scrollTop;

					return (updatePosition.longMenuFixed = true);
				}
			} else if (scrollTop < lastScrollTop) {
				// User is scrolling to top of page
				if (getMaxMenuHeight() < mainMenu.getCoordinates().height) {
					// Menu is longer than the screen height
					if (scrollTop <= menu.getPosition().y && updatePosition.longMenuFixed) {
						// Re-stick the menu to top of page
						menu.setStyles({
							position : isFixedSupport ? 'fixed' : 'absolute',
							top : isFixedSupport ? 0 : scrollTop
						});
		
						updatePosition.longMenuFixed = false;
					}
				}

				// Reset menu position if necessary
				resetMenuPosition();

				if (updatePosition.longMenuFixed)
				{
					// Store last scroll top
					return (lastScrollTop = scrollTop);
				}
			}

			// Pause re-position effect
			if (fx.isRunning()) fx.pause();

			// Reset menu position
			if (isSticked == true && placeHoderOffset > scrollTop && menu.getStyle('position') == 'fixed') {
				menu.setStyles({
					position : 'absolute',
					top : scrollTop,
					left : menuPlacehoder.getCoordinates().left,
					width : getMenuWidth()
				});

				fx.start({ top: placeHoderOffset });
			}

			// Update menu position
			else if (isSticked == true && menu.getStyle('position') == 'absolute') {
				var menuTop = menu.getPosition().y;

				fx.start({
					top: (placeHoderOffset > scrollTop) ? placeHoderOffset : scrollTop,
					left: menuPlacehoder.getCoordinates().left
				});
			}

			else {
				menu.setStyle('left', menuPlacehoder.getCoordinates().left);
			}

			// Store last scroll top
			lastScrollTop = scrollTop;
		};

		var updatePositionTimeout = null,
			updateMenuSizeTimeout = null,
			isMovedToTop = false,
			backupWindowScroll = null,
			pageHeight = page.getSize().y;

		window.addEvent('load', function () {
			clearTimeout(updatePositionTimeout);
			updatePositionTimeout = setTimeout(updatePosition, 100);
	
			window.addEvent('touchmove', makeMenuStick);
			window.addEvent('scroll', updatePosition);

			window.addEvent('resize', function () {
				clearTimeout(updateMenuSizeTimeout);
				updateMenuSizeTimeout = setTimeout(function () {
					if (isSticked == true) {
						menuSize = menuPlacehoder.getCoordinates();
						menu.setStyle('width', getMenuWidth());
					}
					else {
						menuSize = menu.getCoordinates();
					}
				}, 100);
			});
	
			window.addEvent('orientationchange', updatePosition);
			window.addEvent('toggle-mobile-menu', updatePosition);
		});
	},

	setDropdownModuleEvents: function ()
	{
		document.getElements('div.display-dropdown.jsn-modulecontainer h3.jsn-moduletitle')
			.addEvent('click', function (e) {
				var
				elm = e.target;
				while (!elm.hasClass('jsn-modulecontainer'))
					elm = elm.getParent();

				elm.toggleClass('jsn-dropdown-active');
			});
	},

	setMobileSitetool: function()
	{
		var siteToolPanel = document.id("jsn-sitetoolspanel");

		if (siteToolPanel)
		{
			siteToolPanel.getElements("li.jsn-sitetool-control").addEvent("click", function() {
				this.toggleClass("active");
			});
		}
	},

	getSelectMenuitemIndex: function(elementID)
	{
		var childs = document.id(elementID).childNodes;
		var count = childs.length;
		var index = 0;

		for (var i = 0; i < count; i++)
		{
			if(childs[i].className != undefined && childs[i].className.indexOf('parent') != -1)
			{
				if(childs[i].className.indexOf('active') != -1)
				{
					return index;
				}
				index++;
			}
		}
		return -1;
	},

	createImageMenu: function(menuId, imageClass){
		if (!document.getElementById) return;

		var list = document.getElementById(menuId);
		var listItems;

		var listItem;

		if(list != undefined) {
			listItems = list.getElementsByTagName("LI");
			for(i=0, j=0;i<listItems.length;i++){
				listItem = listItems[i];
				if (listItem.parentNode == list) {
					listItem.className += " " + imageClass + (j+1);
					j++;
				}
			}
		}
	},

	/* Set position of side menu sub panels */
	setSidemenuLayout: function(menuClass, rtlLayout)
	{
		var sidemenus, sidemenu, smChildren, smChild, smSubmenu;
		sidemenus = JSNUtils.getElementsByClass(document, "UL", menuClass);
		if (sidemenus != undefined) {
			for(var i=0;i<sidemenus.length;i++){
				sidemenu = sidemenus[i];
				smChildren = JSNUtils.getChildren(sidemenu, "LI");
				if (smChildren != undefined) {
					for(var j=0;j<smChildren.length;j++){
						smChild = smChildren[j];
						smSubmenu = JSNUtils.getFirstChild(smChild, "UL");
						if (smSubmenu != null) {
							if(rtlLayout == true) { smSubmenu.style.marginRight = smChild.offsetWidth+"px"; }
							else { smSubmenu.style.marginLeft = smChild.offsetWidth+"px"; }
						}
					}
				}
			}
		}
	},

	/* Set position of sitetools sub panel */
	setSitetoolsLayout: function(sitetoolsId, rtlLayout)
	{
		var sitetoolsContainer, parentItem, sitetoolsPanel, neighbour;
		sitetoolsContainer = document.getElementById(sitetoolsId);
		if (sitetoolsContainer != undefined) {
			parentItem = JSNUtils.getFirstChild(sitetoolsContainer, "LI");
			sitetoolsPanel = JSNUtils.getFirstChild(parentItem, "UL");
			if (rtlLayout == true) {
				sitetoolsPanel.style.marginRight = -1*(sitetoolsPanel.offsetWidth - parentItem.offsetWidth) + "px";
			} else {
				sitetoolsPanel.style.marginLeft = -1*(sitetoolsPanel.offsetWidth - parentItem.offsetWidth) + "px";
			}
		}
	},

	/* Change template setting stored in cookie */
	setTemplateAttribute: function(templatePrefix, attribute, value)
	{
		var templateParams = JSON.parse(JSNUtils.readCookie(templatePrefix + 'params')) || {};

		templateParams[attribute] = value;

		JSNUtils.writeCookie(templatePrefix + 'params', JSON.stringify(templateParams));

		window.location.reload(true);
	},

	createExtList: function(listClass, extTag, className, includeNumber){
		if (!document.getElementById) return;

		var lists = JSNUtils.getElementsByClass(document, "UL", listClass);
		var list;
		var listItems;
		var listItem;

		if(lists != undefined) {
			for(var j=0;j<lists.length;j++){
				list = lists[j];
				listItems = JSNUtils.getChildren(list, "LI");
				for(var i=0,k=0;i<listItems.length;i++){
					listItem = listItems[i];
					if(className !=''){
						listItem.innerHTML = '<'+ extTag + ' class='+className+'>' + (includeNumber?(k+1):'') + '</'+  extTag +'>' + listItem.innerHTML;
					}else{
						listItem.innerHTML = '<'+ extTag + '>' + (includeNumber?(k+1):'') + '</'+  extTag +'>' + listItem.innerHTML;
					}
					k++;
				}
			}
		}
	},

	createGridLayout: function(containerTag, containerClass, columnClass, lastcolumnClass) {
		var gridLayouts, gridLayout, gridColumns, gridColumn, columnsNumber;
		gridLayouts = JSNUtils.getElementsByClass(document, containerTag, containerClass);
		for(var i=0;i<gridLayouts.length;i++){
			gridLayout = gridLayouts[i];
			gridColumns = JSNUtils.getChildren(gridLayout, containerTag);
			columnsNumber = gridColumns.length;
			JSNUtils.addClass(gridLayout, containerClass + columnsNumber);
			JSNUtils.addClass(gridLayout, 'clearafter');
			for(var j=0;j<columnsNumber;j++){
				gridColumn = gridColumns[j];
				JSNUtils.addClass(gridColumn, columnClass);
				if(j == gridColumns.length-1) {
					JSNUtils.addClass(gridColumn, lastcolumnClass);
				}

				// Create inner container
				var inner = document.createElement('DIV');
				inner.setAttribute('class', columnClass + '_inner');

				// Move all container's children into inner container
				while (gridColumn.childNodes.length) {
					inner.appendChild(gridColumn.childNodes[0]);
				}

				// Append inner container into container
				gridColumn.appendChild(inner);
			}
		}
	},

	sfHover: function(menuId, menuDelay) {
		if(menuId == undefined) return;

		var delay = (menuDelay == undefined)?0:menuDelay;
		var pEl = document.getElementById(menuId);
		if (pEl != undefined) {
			var sfEls = pEl.getElementsByTagName("li");
			for (var i=0; i<sfEls.length; ++i) {
				sfEls[i].onmouseover=function() {
					clearTimeout(this.timer);
					if(this.className.indexOf("sfhover") == -1) {
						this.className += " sfhover";
					}
				};
				sfEls[i].onmouseout=function() {
					this.timer = setTimeout(JSNUtils.sfHoverOut.bind(this), delay);
				};
			}
		}
	},

	sfHoverOut: function() {
		clearTimeout(this.timer);
		this.className=this.className.replace(new RegExp(" sfhover\\b"), "");
	},

	setFontSize: function (targetId, fontSize){
		var targetObj = (document.getElementById) ? document.getElementById(targetId) : document.all(targetId);
		targetObj.style.fontSize = fontSize + '%';
	},

	setVerticalPosition: function(pName, pAlignment) {
		var targetElement = document.getElementById(pName);

		if (targetElement != undefined) {
			var topDelta, vpHeight, pHeight;
			vpHeight = (JSNUtils.getViewportSize()).height;
			pHeight = targetElement.offsetHeight;
			switch(pAlignment){
				case "top":
					topDelta = 0;
				break;

				case "middle":
					topDelta = Math.floor((100 - Math.round((pHeight/vpHeight)*100))/2);
				break;

				case "bottom":
					topDelta = 100 - Math.round((pHeight/vpHeight)*100);
				break;
			}

			topDelta = (topDelta < 0)?0:topDelta;

			targetElement.style.top = topDelta + "%";

			targetElement.style.visibility = "visible";
		}
	},

	// Keep this function for backward compatible with old template released before template framework v2
	setInnerLayout:function(elements)
	{
		var root = document.getElementById(elements[0]);
		var rootWidth = root ? root.offsetWidth : 0;
		var pleftWidth = 0;
		var pinnerleftWidth = 0;
		var prightWidth = 0;
		var pinnerrightWidth = 0;

		if (document.getElementById(elements[1]) != null) {
			pleftWidth = document.getElementById(elements[1]).offsetWidth;
		}

		if (document.getElementById(elements[3]) != null) {
			pinnerleftWidth = document.getElementById(elements[3]).offsetWidth;

			if (root) {
				var resultLeft = (pleftWidth + pinnerleftWidth)*100/rootWidth;
				root.firstChild.style.right = (100 - resultLeft) + "%";
				root.firstChild.firstChild.style.left = (100 - resultLeft) + "%";
			}
		}

		if(document.getElementById(elements[2]) != null) {
			prightWidth = document.getElementById(elements[2]).offsetWidth;
		}

		if(document.getElementById(elements[4]) != null) {
			pinnerrightWidth = document.getElementById(elements[4]).offsetWidth;

			if (root) {
				var resultRight = (prightWidth + pinnerrightWidth)*100/rootWidth;
				root.firstChild.firstChild.firstChild.style.left = (100 - resultRight) + "%";
				root.firstChild.firstChild.firstChild.firstChild.style.right = (100 - resultRight) + "%";
			}
		}
	},

	setupLayout: function(mapping)
	{
		// Define relationship between columns and their visual background elements
		mapping = mapping || {
			'jsn-leftsidecontent': ['jsn-content_inner'],
			'jsn-rightsidecontent': ['jsn-content_inner2'],
			'jsn-pos-innerleft': ['jsn-maincontent_inner1', 'jsn-mainbody-content-inner1'],
			'jsn-pos-innerright': ['jsn-maincontent_inner3', 'jsn-mainbody-content-inner3']
		};

		// Position visual background elements
		var container = document.id('jsn-content'), maxWidth, innerContainer, innerMaxWidth, width, flip, isLeft, isInner, column, background;

		if (!container) {
			return;
		}

		// Get container width
		maxWidth = container.getSize().x;

		for (var i in mapping) {
			// Check if this is a column at left side
			isLeft = i.match(/-(inner)?left/);

			// Check if this is an inner column
			isInner = i.match(/-(inner)/);

			// Get column element
			column = document.id(i);

			if (column) {
				// Get container of inner column
				if (isInner && !innerContainer) {
					innerContainer = column.getParent();

					while (!innerContainer.className.match(/span\d+ order\d+/) && innerContainer != container) {
						innerContainer = innerContainer.getParent();
					}

					innerMaxWidth = innerContainer.getSize().x;
				}

				// Simply continue if there is only one column
				if (column.getParent().getChildren().length == 1) {
					continue;
				}

				// Get column by visual order
				column = column.getParent().getElement('> .order' + (isLeft ? '1' : column.getParent().getChildren().length));

				if (!column) {
					continue;
				}

				if (!column.id.match(/-(inner)?(left|right)/)) {
					column = column.getParent().getElement('> .order' + (isLeft ? '2' : column.getParent().getChildren().length - 1));
				}

				// Get associated visual background element
				for (var j = 0; j < mapping[i].length; j++) {
					background = document.id(mapping[i][j]);

					if (background) {
						break;
					}
				}

				if (background) {
					var repositionElement;

					if (result = background.id.match(/^([^\d]+)(\d+)$/)) {
						repositionElement = document.id(result[1] + (parseInt(result[2]) + 1));
					} else {
						repositionElement = document.id(background.id + '1');
					}

					if (repositionElement) {
						flip = (isInner || column.hasClass('order' + (isLeft ? '1' : column.getParent().getChildren().length))) ? false : true;
						width = isLeft
							? ((flip ? column.getPosition(isInner ? innerContainer : container).x : column.getSize().x) / (isInner ? innerMaxWidth : maxWidth)) * 100
							: ((flip ? (isInner ? innerMaxWidth : maxWidth) - column.getPosition(isInner ? innerContainer : container).x - column.getSize().x : column.getSize().x) / (isInner ? innerMaxWidth : maxWidth)) * 100;

						// Position visual background element
						if (isLeft) {
							background.setStyle(flip ? 'left' : 'right', (flip ? width : 100 - width) + '%');
							repositionElement.setStyle(flip ? 'right' : 'left', (flip ? width : 100 - width) + '%');
						} else {
							background.setStyle(flip ? 'right' : 'left', (flip ? width : 100 - width) + '%');
							repositionElement.setStyle(flip ? 'left' : 'right', (flip ? width : 100 - width) + '%');
						}

						// Add class to indicate flipping state
						flip && background.addClass('jsn-flip');
					}
				}
			}
		}
	},

	setEqualHeight: function()
	{
		var containerClass = "jsn-horizontallayout";
		var columnClass = "jsn-modulecontainer_inner";
		var horizontallayoutObjs = document.getElements('.' + containerClass);
		var maxHeight = 0;
		Array.each(horizontallayoutObjs, function(item) {
			var columns = item.getElements('.'+columnClass);
			maxHeight = 0;
			Array.each(columns, function(col) {
				var coordinates = col.getCoordinates();
				if (coordinates.height > maxHeight) maxHeight = coordinates.height;
			});
			Array.each(columns, function(col) {
				col.setStyle('height',maxHeight);
			});
		});
	},


	/* ============================== MOOTOOLS ANIMATION ============================== */

	setToTopLinkCenter: function(rtl, jquery)
	{
		/* Min distance to be away from top for the link to be displayed */
		var min = 200;

		/* Determine RTL layout or not to set margin correctly */
		var marginFrom = "margin-left";
		if (rtl === true) {
			marginFrom = "margin-right";
		}

		if (jquery || window.jQuery) {
			var element = jQuery('#jsn-gotoplink');
			if (!element.length) return;
			element.hide();
			(jQuery(window).scrollTop() >= min) ? element.fadeIn() : element.fadeOut();
		} else if (typeof(MooTools) != 'undefined') {
			var element = document.id('jsn-gotoplink');
			if (!element) return;
			var elementHeight = element.getSize().y;

			element
				.setStyle('margin-left', -(element.getSize().x/2))
				.set('opacity','0')
				.fade((window.getScroll().y >= min) ? 'in' : 'out')
				.fade((window.getScroll().y >= min) ? 1 : 0);

			if (!JSNUtils.isFixedSupport()) {
			 	element.setStyle('position', 'absolute');
			 	window.addEvent('scroll', function () {
			 		var height = window.innerHeight;
			 		element.setStyle('bottom', 'auto');
			 		element.setStyle('top', window.getScroll().y + (height - elementHeight));
			 	});
			}
		}
	},

	isFixedSupport: function () {
		var userAgent = window.navigator.userAgent + '',
			isNexusS = /Nexus S/.test(userAgent),
			isSupported = !isNexusS;

		if (isSupported && (JSNUtils.isAppleDevice || JSNUtils.isAndroidDevice || JSNUtils.isWindowPhone)) {
			var pattern = JSNUtils.isWindowPhone ? /IEMobile\/([0-9]+\.[0-9]+);/ : /AppleWebKit\/([0-9]+\.[0-9]+)\s+/;

			if (pattern.test(userAgent)) {
				var result = pattern.exec(userAgent);
				var version = result[1];

				isSupported = ((JSNUtils.isAppleDevice || JSNUtils.isAndroidDevice) && JSNUtils.versionCompare(version, '534.1', '>='));
			}
		}

		return isSupported;
	},

	versionCompare: function (v1, v2, operator) {
	    this.php_js = this.php_js || {};
	    this.php_js.ENV = this.php_js.ENV || {};

	    var i = 0,
	        x = 0,
	        compare = 0,
	        vm = {
	            'dev': -6,
	            'alpha': -5,
	            'a': -5,
	            'beta': -4,
	            'b': -4,
	            'RC': -3,
	            'rc': -3,
	            '#': -2,
	            'p': -1,
	            'pl': -1
	        },

	        prepVersion = function (v) {
	            v = ('' + v).replace(/[_\-+]/g, '.');
	            v = v.replace(/([^.\d]+)/g, '.$1.').replace(/\.{2,}/g, '.');
	            return (!v.length ? [-8] : v.split('.'));
	        },

	        numVersion = function (v) {
	            return !v ? 0 : (isNaN(v) ? vm[v] || -7 : parseInt(v, 10));
	        };
	    v1 = prepVersion(v1);
	    v2 = prepVersion(v2);
	    x = Math.max(v1.length, v2.length);
	    for (i = 0; i < x; i++) {
	        if (v1[i] == v2[i]) {
	            continue;
	        }
	        v1[i] = numVersion(v1[i]);
	        v2[i] = numVersion(v2[i]);
	        if (v1[i] < v2[i]) {
	            compare = -1;
	            break;
	        } else if (v1[i] > v2[i]) {
	            compare = 1;
	            break;
	        }
	    }
	    if (!operator) {
	        return compare;
	    }

	    switch (operator) {
	    case '>':
	    case 'gt':
	        return (compare > 0);
	    case '>=':
	    case 'ge':
	        return (compare >= 0);
	    case '<=':
	    case 'le':
	        return (compare <= 0);
	    case '==':
	    case '=':
	    case 'eq':
	        return (compare === 0);
	    case '<>':
	    case '!=':
	    case 'ne':
	        return (compare !== 0);
	    case '':
	    case '<':
	    case 'lt':
	        return (compare < 0);
	    default:
	        return null;
	    }
	},

	setSmoothScroll: function(jquery)
	{
		// Detect mobile device
		JSNUtils.checkMobile();

		// Setup smooth scroll to top when go to top link is clicked
		if (!JSNUtils.isWindowPhone || !JSNUtils.isIE('mobile')) {
			if (jquery || window.jQuery) {
				jQuery('#jsn-gotoplink').click(function(e) {
					e.preventDefault();
					var gotoplinkOffset = jQuery('#top').offset().top;
					jQuery('html,body').animate({scrollTop: gotoplinkOffset}, 500);
					return false;
				});
			} else if (typeof Fx != 'undefined' && typeof Fx.SmoothScroll != 'undefined') {
				new Fx.SmoothScroll({
					duration: 300,
					links: '#jsn-gotoplink',
				}, window);
			}
		}
	},

	setFadeScroll: function(jquery)
	{
		var min = 200;
		if (jquery || window.jQuery) {
			var element = jQuery('#jsn-gotoplink');
			if(element == null) return false;

			jQuery(window).scroll(function () {
				(jQuery(window).scrollTop() >= min) ? element.fadeIn() : element.fadeOut();
			});
		} else if (typeof(MooTools) != 'undefined') {
			var element = document.id('jsn-gotoplink');
			if (element == null) return false;
			if (parseFloat(MooTools.version) < 1.2)
			{
				var fx = new Fx.Style(element, "opacity", {duration: 500});
				var inside = false;
				window.addEvent('scroll',function(e) {
					var position = window.getSize().scroll;
					var y = position.y;
					if (y >= min)
					{
						if (!inside)
						{
							inside = true;
							fx.start(0, 1);
						}
					}
					else
					{
						if (inside)
						{
							inside = false;
							fx.start(1, 0);
						}
					}
				}.bind(this));
			}
			else
			{
				window.addEvent('scroll',function(e) {
					element.fade((window.getScroll().y >= min) ? 'in' : 'out');
					element.fade((window.getScroll().y >= min) ? 1 : 0);
				}.bind(this));
			}
		}
	},

	/* ============================== TEXT ============================== */

	checkSubstring: function(targetString, targetSubstring, delimeter, wholeWord){
		if(wholeWord == undefined) wholeWord = false;
		var parts = targetString.split(delimeter);
		for (var i = 0; i < parts.length; i++){
			if (wholeWord && parts[i] == targetSubstring) return true;
			if (!wholeWord && parts[i].indexOf(targetSubstring) > -1) return true;
		}
		return false;
	},

	/* ============================== REMOVE DUPLICATE CSS3 TAG IN IE7 - CSS3 PIE ============================== */

	removeCss3Duplicate: function(className)
	{
		var element = document.getElements('.' + className);
		if (element != undefined)
		{
			element.each(function(e){
				var elementParent = e.getParent();
				var duplicateTag = elementParent.getChildren('css3-container');
				if (duplicateTag.length && duplicateTag.length > 1)
				{
					elementParent.removeChild(duplicateTag[0]);
				}
			});
		}
	}
};
;


/* FILE: /templates/jsn_yoyo_pro/js/jsn_template.js */
/**
* @author    JoomlaShine.com http://www.joomlashine.com
* @copyright Copyright (C) 2008 - 2011 JoomlaShine.com. All rights reserved.
* @license   GNU/GPL v2 http://www.gnu.org/licenses/gpl-2.0.html
*/

	var JSNTemplate = {
		_templateParams:		{},

		initOnDomReady: function()
		{
			// Setup HTML code for typography
			JSNUtils.createGridLayout("DIV", "grid-layout", "grid-col", "grid-lastcol");
			JSNUtils.createExtList("list-number-", "span", "jsn-listbullet", true);
			JSNUtils.createExtList("list-icon", "span", "jsn-listbullet", false);

			// Setup Go to top link settings
			if (_templateParams.enableGotopLink) {
				JSNUtils.setToTopLinkCenter(_templateParams.enableRTL, false);
				JSNUtils.setSmoothScroll(false);
				JSNUtils.setFadeScroll(false);
			}

			// General layout setup
			JSNUtils.setupLayout();

			// Setup mobile menu
			JSNUtils.setMobileMenu("menu-mainmenu");

			if (JSNUtils.isDesktopViewOnMobile(_templateParams)) {
				// Setup mobile sticky
				if (_templateParams.enableMobileMenuSticky && JSNUtils.checkMobile()) {
					JSNUtils.setMobileSticky('jsn-header-bottom');
				}
			}
			else {
				JSNUtils.initMenuForDesktopView();
			}

			// Setup module dropdown on mobile
			JSNUtils.setDropdownModuleEvents();

			// Setup mobile sitetool
			JSNUtils.setMobileSitetool();

			// Stick main menu to top
			if (_templateParams.enableDesktopMenuSticky) {
				JSNUtils.setDesktopSticky('jsn-header-bottom');
			}
		},

		initOnLoad: function()
		{
			// Setup event to update submenu position
			JSNUtils.setSubmenuPosition(_templateParams.enableRTL);

			// Stick positions layout setup
			JSNUtils.setVerticalPosition("jsn-pos-stick-leftmiddle", 'middle');
			JSNUtils.setVerticalPosition("jsn-pos-stick-rightmiddle", 'middle');

			// Retrieve window height and set for the pre-header section
			if (document.body.hasClass('jsn-onepage')) {
				document.id('jsn-header-top').setStyle('height', window.getSize().y - document.id('jsn-header-bottom').getSize().y);
			}
		},

		initTemplate: function(templateParams)
		{
			// Store template parameters
			_templateParams = templateParams;

			// Init template on "domready" event
			window.addEvent('domready', JSNTemplate.initOnDomReady);
			window.addEvent('load', JSNTemplate.initOnLoad);
		}
	}; // must have ; to prevent syntax error when compress
;


/* FILE: /modules/mod_jux_megamenu/assets/js/HoverIntent.js */
/*
---

name: PictureSlider

description: Animated picture slider. This is a port of jQuery HoverIntent

license: MIT-style

authors:
- Jakob Holmelund

requires:
- core/1.4.3: [Class, Event]

provides: HoverIntent, Element.hoverIntent

...
*/
var HoverIntent = new Class({
	Implements:[Options, Events],
	options:{
			sensitivity: 7,
			interval: 100,
			timeout: 0,
			over:function(){},
			out:function(){}
	},
	initialize:function(element, options){
		this.setOptions(options);
		this.ob = element;
		var self = this;
		this.ob.addEvents({
			mouseenter:function(e){self.handleHover(e);},
			mouseleave:function(e){self.handleHover(e);}
		});
	},
	track:function(ev){
		this.cX = ev.page.x;
		this.cY = ev.page.y;
	},
	_compare:function(ev,ob){
		var self = this;
		ob.hoverIntent_t = clearTimeout(ob.hoverIntent_t);
		// compare mouse positions to see if they've crossed the threshold
		if ( ( Math.abs(this.pX-this.cX) + Math.abs(this.pY-this.cY) ) < this.options.sensitivity ) {
			ob.removeEvent("mousemove",self.track);
			// set hoverIntent state to true (so mouseOut can be called)
			ob.hoverIntent_s = 1;
			return this.options.over.apply(ob,[ev]);
		} else {
			// set previous coordinates for next time
			this.pX = this.cX; this.pY = this.cY;
			// use self-calling timeout, guarantees intervals are spaced out properly (avoids JavaScript timer bugs)
			ob.hoverIntent_t = (function(){self._compare(ev, ob);}).delay(this.options.interval);
		}
	},
	_delay:function(ev, ob){
		ob.hoverIntent_t = clearTimeout(ob.hoverIntent_t);
		ob.hoverIntent_s = 0;
//		console.log("delayed call");
		return this.options.out.apply(ob,[ev]);
	},
	handleHover:function(e){
		var ev = e;
		var self = this;
		// cancel hoverIntent timer if it exists
		if (this.ob.hoverIntent_t !== undefined) {
			this.ob.hoverIntent_t = clearTimeout(self.ob.hoverIntent_t);
		}
		// if e.type == "mouseenter"
		if (e.type == "mouseenter" || e.type == "mouseover") {
			// set "previous" X and Y position based on initial entry point
			this.pX = ev.page.x;
			this.pY = ev.page.y;
			// update "current" X and Y position based on mousemove
			this.ob.addEvent("mousemove",function(e){
				self.track(e);
			});
			// start polling interval (self-calling timeout) to compare mouse coordinates over time
			if (this.ob.hoverIntent_s != 1) {
				this.ob.hoverIntent_t = (function(){
					self._compare(ev,self.ob);
				}).delay(self.options.interval);
			}

		// else e.type == "mouseleave"
		} else if (e.type == "mouseleave" || e.type == "mouseout") {
			// unbind expensive mousemove event
			this.ob.removeEvent("mousemove",function(e){
				self.track(e);
			});
			// if hoverIntent state is true, then call the mouseOut function after the specified delay
			if (this.ob.hoverIntent_s == 1) {
				this.ob.hoverIntent_t = (function(){
					self._delay(ev, self.ob);
				}).delay(self.options.interval);
			}
		}
	}
});

Element.implement({
  hoverIntent : function(options) {
    new HoverIntent(this, options);
    return this;
  }
});;


/* FILE: /modules/mod_jux_megamenu/assets/js/script.js */
/**
 * @version		$Id$
 * @author		JoomlaUX!
 * @package		Joomla.Site
 * @subpackage	mod_jux_megamenu
 * @copyright	Copyright (C) 2008 - 2013 by JoomlaUX. All rights reserved.
 * @license		http://www.gnu.org/licenses/gpl.html GNU/GPL version 3
 */

function getChildren(elm) {
    var n = elm.firstChild;
    var r = [];
    for (; n; n = n.nextSibling) {
        if (n.nodeType === 1 && n !== elm) {
            r.push(n);
        }
    }
    return r;
}
function bindEvent(elm, type, handler) {
    if (elm.addEventListener) {
        elm.addEventListener(type, handler, false);
    } else {
        elm.attachEvent('on' + type, handler);
    }
}

var isMobile = {
    Android: function() {
        return navigator.userAgent.match(/Android/i);
    },
    BlackBerry: function() {
        return navigator.userAgent.match(/BlackBerry/i);
    },
    iOS: function() {
        return navigator.userAgent.match(/iPhone|iPad|iPod/i);
    },
    Opera: function() {
        return navigator.userAgent.match(/Opera Mini/i);
    },
    Windows: function() {
        return navigator.userAgent.match(/IEMobile/i);
    },
    any: function() {
        return (isMobile.Android() || isMobile.BlackBerry() || isMobile.iOS() || isMobile.Opera() || isMobile.Windows());
    }
};

var JRMenu = window.JRMenu || {};
var jsMegaMenuMoo = new Class({
    initialize: function(menu, options) {
        this.options = Object.append({
            animation: 'slide',
            slide: true, //enable slide
            duration: 300, //slide speed. lower for slower, bigger for faster
            fading: false, //Enable fading
            bgopacity: 0.9, //set the transparent background. 0 to disable, 0<bgopacity<1: the opacity of the background
            delayHide: 500,
            menutype: 'horizontal',
            direction: 'down',
            action: 'mouseenter', //mouseenter or click
            hidestyle: 'normal', // the hiding style, normal, fast or fastwhenshow.
            hover_delay: 50, // the delay time that the mouse must hover over before the transition started.
            sticky: 1, // Enable menu stick with the window event after scroll pass the menu.
            menu_alignment: 'left',
            sticky_alignment: 'center'
        }, options || {});

        //ignore delayHide if no animation
        if (this.options.animation == 'none')
            this.options.delayHide = 10;

        this.menu = $(menu);

        JRMenu.inst = this;
        this.menu.addClass('mm-enable');
        this.childopen = new Array();
        this.imgloaded = false;
        this.loaded = false;

        this.addnavbtn();

        if (this.options.sticky && this.options.menutype == 'horizontal') {
            this.stickyMenu();
        }

        //check is touch mobile  
        this.isTouch = 'ontouchstart' in window;
        if (this.isTouch) {
            this.options.action = 'click'
            this.touchMenu(menu);
        }

        window.addEvent('load', this.start.bind(this));
        this.start();


    },
    touchMenu: function(id) {
        var all = getChildren(document.body),
                self = this;  //document.getElements(':not(#'+ menu +')');
        for (var i = 0; i < all.length; i++) {
            bindEvent(all[i], 'click', function() {
                self.itemHideOthers(null)
            });
        }
        this.menu.addEvent('click', function(e) {
            //stop default event
            e.preventDefault();
            e.stopPropagation();
        });
    },
    addnavbtn: function() {
        if (!(Browser.ie && Browser.version < 9)) {
            var mainNav = this.menu.getElement('ul.megamenu.level0');

            if (mainNav) {
                var megaMenu = this.menu;

                var toggleBtn = document.id('js-megaMenuToggle');
                // new Element ('div', {id:'js-megaMenuToggle', 'class': 'megaMenuToggle', html: 'Menu', styles: { display: 'none'}}).inject (megaMenu, 'before');
                // new Element('span', {'class': 'megaMenuToggle-icon'}).inject(toggleBtn);

                if (toggleBtn) {
                    toggleBtn.addEvent('click', function(e) {
                        e.stop();

                        if (megaMenu.getStyle('display') == 'block') {
                            megaMenu.removeClass('active').setStyle('display', 'none');
                            toggleBtn.removeClass('active');
                        } else {
                            megaMenu.addClass('active').setStyle('display', 'block');
                            toggleBtn.addClass('active');
                        }
                    });

                    $(document).addEvent('click', function() {
                        if (!megaMenu.hasClass('mm-enable')) {
                            megaMenu.removeClass('active').setStyle('display', 'none');
                        }

                        toggleBtn.removeClass('active');
                    });
                } else {
                    $(document).addEvent('click', function() {
                        if (!megaMenu.hasClass('mm-enable')) {
                            megaMenu.removeClass('active').setStyle('display', 'none');
                        }
                    });
                }
            }

            JRMenu.mmenuid = null;
            window.addEvent('resize', function() {
                clearTimeout(JRMenu.mmenuid);
                JRMenu.mmenuid = setTimeout(function() {
                    JRMenu.inst.start();
                }, 100);
            });
        }
    },
    stickyMenu: function() {
        if (this.options.menutype == 'horizontal' && this.menu.getHeight() > 0) {
            var megaMenuParent = this.menu.getParent('div.#js-mainnav');
            var menuPosition = megaMenuParent.getPosition().y;
            var menuAlignment = this.options.menu_alignment;
            var stickyAlignment = this.options.sticky_alignment;
            window.addEvent('scroll', function(e) {
                var scrollPosition = window.getScrollTop();
                if (!megaMenuParent.hasClass('megamenu-sticky') && menuPosition < scrollPosition) {
                    megaMenuParent.addClass('megamenu-sticky');
                    megaMenuParent.removeClass(menuAlignment);
                    megaMenuParent.addClass(stickyAlignment);
                } else if (megaMenuParent.hasClass('megamenu-sticky') && menuPosition >= scrollPosition) {
                    megaMenuParent.removeClass('megamenu-sticky');
                    megaMenuParent.removeClass(stickyAlignment);
                    megaMenuParent.addClass(menuAlignment);
                }
            });
        }
    },
    detect: function() {
        var toggleBtn = $('js-megaMenuToggle'),
                rs = true;
        if (toggleBtn) {
            rs = toggleBtn.getComputedStyle('display') == 'none';

            if (rs != this.menu.hasClass('mm-enable')) {

                this.menu[rs ? 'addClass' : 'removeClass']('mm-enable');

                this.menu.setStyle('display', rs ? 'block' : 'none');
            }
        }

        return rs;
    },
    start: function() {
        //do nothing if loaded

        if (!this.detect() || !this.imgloaded || this.loaded)
            ;

        if (this.loaded)
            return;

        this.menu = $(this.menu);
        //preload images
        var images = this.menu.getElements('img');
        if (images && images.length && !this.imageloaded) {
            var imgs = [];
            images.each(function(image) {
                imgs.push(image.src)
            });
        }

        //mark as called
        this.loaded = true;

        //get wrapper
        p = this.menu;
        while (p = p.getParent()) {
            if (p.hasClass('main') || p.hasClass('wrap')) {
                this.wrapper = p;
                break;
            }
        }
        this.items = this.menu.getElements('li.mega');
        //this.items.setStyle ('position', 'relative');
        this.items.each(function(li) {
            //link item
            if ((a = li.getElement('a.mega')) && this.isChild(a, li))
                li.a = a;
            else
                li.a = null;
            //parent
            li._parent = this.getParent(li);
            //child content
            if ((childcontent = li.getElement('.childcontent')) && this.isChild(childcontent, li)) {
                li.childcontent = childcontent;
                li.childcontent_inner = li.childcontent.getElement('.childcontent-inner-wrap');
                var coor = li.childcontent_inner.getCoordinates();
                li._w = li.getElement('.childcontent-inner').offsetWidth;
                li._h = li.getElement('.childcontent-inner').offsetHeight;

                li.level0 = li.getParent().hasClass('level0');
                //luanND change the childcontent to equal width with childcontent_inner
                //li.childcontent.setStyles ({'width':li._w+10, 'height':li._h});
                li.childcontent.setStyles({'width': li._w, 'height': li._h});
                li.childcontent_inner.setStyles({'width': li._w});
                //fix for overflow
                li.childcontent_inner1 = li.childcontent.getElement('.childcontent-inner');
                li.childcontent_inner1.ol = false;
                if (li.childcontent_inner1.getStyle('overflow') == 'auto' || li.childcontent_inner1.getStyle('overflow') == 'scroll') {
                    li.childcontent_inner1.ol = true;
                    //fix for ie6/7
                    if (window.ie6 || window.ie7) {
                        li.childcontent_inner1.setStyle('position', 'relative');
                    }

                    if (window.ie6) {
                        li.childcontent_inner1.setStyle('height', li.childcontent_inner1.getStyle('max-height') || 400);
                    }
                }

                //show direction
                if (this.options.direction == 'up') {
                    if (li.level0) {
                        li.childcontent.setStyle('top', -li.childcontent.offsetHeight); //ajust top position
                    } else {
                        li.childcontent.setStyle('bottom', 0);
                    }
                }
            }
            else
                li.childcontent = null;

            if (li.childcontent && this.options.bgopacity) {
                //Make transparent background
                var bg = new Element('div', {'class': 'childcontent-bg'});
                bg.injectTop(li.childcontent_inner);
                bg.setStyles({'width': '100%', 'height': li._h, 'opacity': this.options.bgopacity,
                    'position': 'absolute', 'top': 0, 'left': 0, 'z-index': 1
                });
                if (li.childcontent.getStyle('background'))
                    bg.setStyle('background', li.childcontent.getStyle('background'));
                if (li.childcontent.getStyle('background-image'))
                    bg.setStyle('background-image', li.childcontent.getStyle('background-image'));
                if (li.childcontent.getStyle('background-repeat'))
                    bg.setStyle('background-repeat', li.childcontent.getStyle('background-repeat'));
                if (li.childcontent.getStyle('background-color'))
                    bg.setStyle('background-color', li.childcontent.getStyle('background-color'));
                li.childcontent.setStyle('background', 'none');
                li.childcontent_inner.setStyles({'position': 'relative', 'z-index': 2});
            }

            if (li.childcontent && (this.options.animation != 'none')) {
                //li.childcontent.setStyles ({'width': li._w});

                li.childcontent.setStyles({'left': 'auto'});
                if (li.childcontent.hasClass('right'))
                    li.childcontent.setStyle('right', 0);
                if (this.options.animation == 'slide') {
                    li.childcontent.setStyles({'left': 'auto', 'overflow': 'hidden'});
                    if (li.level0) {
                        if (this.options.menutype == 'horizontal') {
                            if (this.options.direction == 'up') {
                                li.childcontent_inner.setStyle('bottom', -li._h - 20);
                            } else {
                                li.childcontent_inner.setStyle('margin-top', -li._h - 20);
                            }
                        }
                        else {

                            if (this.options.direction == 'righttoleft') {

                                li.childcontent_inner.setStyle('margin-left', li._w - 20);
                            } else {
                                li.childcontent_inner.setStyle('margin-left', -li._w - 20);
                            }
                        }

                    } else {
                        if (this.options.menutype == 'vertical' && this.options.direction == 'righttoleft') {
                            li.childcontent_inner.setStyle('margin-left', li._w - 20);
                        }
                        else {
                            li.childcontent_inner.setStyle('margin-left', -li._w - 20);
                        }
                    }
                }
                if (this.options.animation == 'fade') {
                    li.childcontent_inner.setStyle('opacity', 0);
                }
                //Init Fx.Styles for childcontent
                //li.fx = new Fx.Styles(li.childcontent_inner, {duration: this.options.duration, transition: Fx.Transitions.linear, onComplete: this.itemAnimDone.bind(this, li)});
                //li.fx = new Fx.Tween (li.childcontent_inner, {duration: this.options.duration, transition: Fx.Transitions.linear, onComplete: this.itemAnimDone.bind(this, li)});
                // Dohq: Fix for use both fade & slide
                li.fx = new Fx.Morph(li.childcontent_inner, {duration: this.options.duration, transition: Fx.Transitions.linear, onComplete: this.itemAnimDone.bind(this, li)});
                //effect
                //li.eff_on = {p:[],to:[]};
                //li.eff_off = {p:[],to:[]};
                li.eff_on = {};
                li.eff_off = {};
                if (this.options.animation == 'slide') {
                    if (li.level0) {
                        if (this.options.menutype == 'horizontal') {
                            if (this.options.direction == 'up') {
                                li.eff_on ['bottom'] = 0;
                                li.eff_off ['bottom'] = -li._h;
                            } else {
                                li.eff_on ['margin-top'] = 0;
                                li.eff_off ['margin-top'] = -li._h;
                            }
                        }
                        else {
                            if (this.options.direction == 'righttoleft') {
                                li.eff_on['margin-left'] = 0;
                                li.eff_off['margin-left'] = li._w;
                            }
                            else {
                                li.eff_on['margin-left'] = 0;
                                li.eff_off['margin-left'] = -li._w;
                            }
                        }
                    } else {
                        if (this.options.menutype == 'vertical' && this.options.direction == 'righttoleft') {
                            li.eff_on['margin-left'] = 0;
                            li.eff_off['margin-left'] = li._w;
                        }
                        else {
                            li.eff_on['margin-left'] = 0;
                            li.eff_off['margin-left'] = -li._w;
                        }
                    }
                }
                if (this.options.animation == 'fade') {
                    li.eff_on ['opacity'] = 1;
                    li.eff_off['opacity'] = 0;
                }
            }

            if (this.options.action == 'click' /*  && li.childcontent*/ ) {
                li.addEvent('click', function(e) {

                    var event = new DOMEvent(e);
                    //stop default event
                    event.preventDefault();
                    event.stopPropagation();
                    
//                    if (li.hasClass('group'))
//                        return;
                    
                    if (li.childcontent) {
                        if (li.status == 'open') {
                            if (this.cursorIn(li, event)) {
                                this.itemHide(li);
                            } else {
                                this.itemHideOthers(li);
                            }
                            //custom by mrdang
                            if (li.a && li.a.href){
                                location.href = li.a.href;
                           }
                        } else {
                            this.itemShow(li);
                        }
                    } else {
                        
                        var g = li.getElement('div.group-title');
                        if(g){
                            li.a = g.getElement('a.mega');
                        }
                        if (li.a && li.a.href){
                            location.href = li.a.href;
                       }
                       if (li.hasClass('group')){
                            return;
                        }
                    }
                    

                }.bind(this));
            }
            if (li.timer == undefined)
                li.timer = null;
			
			if (isMobile.any()) {
                 if (li.childcontent) {
                    mobile_button = new Element('span', {'class': 'arrow-icon', html: '', styles: {display: 'none'}}).inject(li.childcontent, 'before');
                    mobile_button.addEvent('click', function(e) {
                     var event = new DOMEvent (e);
                     //if (li.hasClass ('group')) return;
                     
                     if (li.childcontent) {
                         
                         if (li.status == 'open') {
                             if (this.cursorIn (li, event)) {
                                 this.itemHide (li);
                             } else {
                                 this.itemHideOthers(li);
                             }
                         } else {
                             this.itemShow (li);
                         }
                     } else {
                         
                         if (li.a) location.href = li.a.href;
                     }
                     event.stopPropagation();
                 }.bind (this));
                }
            }
			
            if (this.options.action == 'mouseover' || this.options.action == 'mouseenter') {
                var config = {
                    over: function(e) {
                        if (li.hasClass('group'))
                            return;

                        //fn.delay(li.timer);
                        //this.itemShow.delay(this.options.hover_delay, this, li);
                        this.itemShow(li);

                        if (!e.stopped) {
                            // Comment this line because of error in IE 8. Version 3.0.9
//							e.stopPropagation();
                            e.stopped = true; //make sure the stop function is call only once
                        }
                    }.bind(this),
                    interval: this.options.hover_delay,
                    out: function(e) {
                        if (li.hasClass('group'))
                            return;
                        //fn.delay(li.timer);
                        if (li.childcontent)
                            li.timer = this.itemHide.delay(this.options.delayHide, this, [li, e]);
                        else
                            this.itemHide(li, e);
                        if (!e.stopped) {
                            // Comment this line because of error in IE 8. Version 3.0.9
//							e.stopPropagation();
                            e.stopped = true; //make sure the stop function is call only once
                        }
                    }.bind(this)
                };

                li.hoverIntent(config);

                //if has childcontent, don't goto link before open childcontent - fix for touch screen
                if (li.a && li.childcontent) {
                    this.disableclick(li);
                    li.a.addEvent('click', function(e) {
                        if (!li.clickable) {
                            new DOMEvent(e).stop();
                        }
                    }.bind(this));
                }

                if (li.childcontent) {
                    mobile_button = new Element('span', {'class': 'arrow-icon', html: '', styles: {display: 'none'}}).inject(li.childcontent, 'before');
//					mobile_button.addEvent('click', function(e) {
//						var event = new DOMEvent (e);
//						//if (li.hasClass ('group')) return;
//						
//						if (li.childcontent) {
//							
//							if (li.status == 'open') {
//								if (this.cursorIn (li, event)) {
//									this.itemHide (li);
//								} else {
//									this.itemHideOthers(li);
//								}
//							} else {
//								this.itemShow (li);
//							}
//						} else {
//							
//							if (li.a) location.href = li.a.href;
//						}
//						event.stopPropagation();
//					}.bind (this));
                }

                //stop if click on menu item - prevent raise event to container => hide all open submenu
                li.addEvent('click', function(e) {
                    new DOMEvent(e).stopPropagation()
                });
            }

            //when click on a link - close all open childcontent
            if (li.a && !li.childcontent) {
                li.a.addEvent('click', function(e) {
                    this.itemHideOthers(null);
                    //Remove current class
                    this.menu.getElements('.active').removeClass('active');
                    //Add current class
                    var p = li;
                    while (p) {
                        p.addClass('active');
                        if (p.a) {
                            p.a.addClass('active');
                        }
                        p = p._parent;
                    }
                    new DOMEvent(e).stopPropagation();//prevent to raise event up
                }.bind(this));
            }

            if (li.childcontent)
                this.positionSubmenu(li);
        }, this);

        //click on windows will close all submenus
//        var container = $('wrapper');
//        if (!container) container = document.body;
//        if (container.addEvent) {
//            container.addEvent('click',function (e) {
//                this.itemHideOthers(null);
//            }.bind (this));
//        } else {
//            container.attachEvent('click',function (e) {
//                this.itemHideOthers(null);
//            }.bind (this));
//        }

        if (this.options.animation != 'none') {
            //hide all content child
            this.menu.getElements('.childcontent').setStyle('display', 'none');
        }

    },
    getParent: function(li) {
        var p = li;
        while ((p = p.getParent())) {
            if (this.items.contains(p) && !p.hasClass('group'))
                return p;
            if (!p || p == this.menu)
                return null;
        }
    },
    cursorIn: function(el, event) {
        if (!el || !event)
            return false;
        var pos = Object.merge(el.getPosition(), {'w': el.offsetWidth, 'h': el.offsetHeight});
        ;
        var cursor = {'x': event.page.x, 'y': event.page.y};

        if (cursor.x > pos.x && cursor.x < pos.x + el.offsetWidth
                && cursor.y > pos.y && cursor.y < pos.y + el.offsetHeight)
            return true;
        return false;
    },
    isChild: function(child, parent) {
        return !!parent.getChildren().contains(child);
    },
    itemOver: function(li) {
        if (li.hasClass('haschild'))
            li.removeClass('haschild').addClass('haschild-over');
        li.addClass('over');
        if (li.a) {
            li.a.addClass('over');
        }
    },
    itemOut: function(li) {
        if (li.hasClass('haschild-over'))
            li.removeClass('haschild-over').addClass('haschild');
        li.removeClass('over');
        if (li.a) {
            li.a.removeClass('over');
        }
    },
    itemShow: function(li) {
        clearTimeout(li.timer);
        if (li.status == 'open')
            return; //don't need do anything
        //Setup the class
        this.itemOver(li);
        //push to show queue
        li.status = 'open';
        this.childopen.push(li);
        //hide other
        this.itemHideOthers(li);
        if (li.childcontent) {
            //reposition the submenu
            this.positionSubmenu(li);
        }


        if (li.fx == null || li.childcontent == null)
            return;

        li.childcontent.setStyle('display', 'block');

        li.childcontent.setStyles({'overflow': 'hidden'});
        if (li.childcontent_inner1.ol) {
            li.childcontent_inner1.setStyles({'overflow': 'hidden'});
        }
        li.fx.cancel();

        li.fx.start(li.eff_on);
        //li.fx.start (li.eff_on.p, li.eff_on.to);
        //if (li._parent) this.itemShow (li._parent);
        this.enableclick.delay(this.options.duration + 500, this, li);
    },
    itemHide: function(li, e) {
        if (e && e.page) { //if event
            if (this.cursorIn(li, e) || this.cursorIn(li.childcontent, e)) {
                return;
            } //cursor in li
            var p = li._parent;
            if (p && !this.cursorIn(p, e) && !this.cursorIn(p.childcontent, e)) {
                p.fireEvent('mouseleave', e); //fire mouseleave event
            }
        }
        clearTimeout(li.timer);
        this.itemOut(li);
        li.status = 'close';
        this.childopen.erase(li);

        if (li.fx == null || li.childcontent == null)
            return;

        if (li.childcontent.getStyle('opacity') == 0)
            return;
        li.childcontent.setStyles({'overflow': 'hidden'});
        if (li.childcontent_inner1.ol)
            li.childcontent_inner1.setStyles({'overflow': 'hidden'});
        li.fx.cancel();
        switch (this.options.hidestyle) {
            case 'fast':
                li.fx.options.duration = 100;
                li.fx.start(Object.merge(li.eff_off, {'opacity': 0}));
                //li.fx.start ($merge(li.eff_off,{'opacity':0}));
                //li.fx.start(li.eff_off.p, li.eff_off.to);
                break;
            case 'fastwhenshow': //when other show
                if (!e) { //force hide, not because of event => hide fast
                    li.fx.start(Object.merge(li.eff_off, {'opacity': 0}));
                    //li.fx.options.duration = 300;
                    //li.fx.start ($merge(li.eff_off,{'opacity':0}));
                    //li.fx.start(li.eff_off.p, li.eff_off.to);
                } else {    //hide as normal
                    li.fx.start(li.eff_off);
                    //li.fx.start (li.eff_off);
                    //li.fx.start(li.eff_off.p, li.eff_off.to);
                }
                break;
            case 'normal':
            default:
                li.fx.start(li.eff_off);
                //li.fx.start(li.eff_off.p, li.eff_off.to);
                break;
        }
        //li.fx.start (li.eff_off);
    },
    itemAnimDone: function(li) {
        //hide done
        if (li.status == 'close') {
            //reset duration and enable opacity if not fading
            if (this.options.hidestyle.test(/fast/)) {
                li.fx.options.duration = this.options.duration;
                if (!this.options.animation != 'fade')
                    li.childcontent_inner.setStyle('opacity', 1);
            }
            //hide
            li.childcontent.setStyles({'display': 'none'});
            this.disableclick.delay(this.options.duration + 100, this, li);
        }

        //show done
        if (li.status == 'open') {
            li.childcontent.setStyles({'overflow': ''});
            if (li.childcontent_inner1.ol)
                li.childcontent_inner1.setStyles({'overflow-y': 'auto'});
            li.childcontent_inner.setStyle('opacity', 1);
            li.childcontent.setStyles({'display': 'block'});
        }
    },
    itemHideOthers: function(el) {
        var fakeevent = null
        if (el && !el.childcontent)
            fakeevent = {};
        var curopen = this.childopen;
        curopen.each(function(li) {
            if (li && typeof (li.status) != 'undefined' && (!el || (li != el && !(el !== li && li.contains(el))))) {
                this.itemHide(li, fakeevent);
            }
        }, this);
    },
    enableclick: function(li) {
        if (li.a && li.childcontent)
            li.clickable = true;
    },
    disableclick: function(li) {
        if (li.a && li.childcontent)
            li.clickable = false;
    },
    positionSubmenu: function(li) {
        if (li.level0) {
            if (!window.isRTL) {
                //check position
                var lcor = li.getCoordinates();
                var ccor = li.childcontent.getCoordinates();
                if (!ccor.width)
                {
                    li.childcontent.setStyle('display', 'block');
                    ccor = li.childcontent.getCoordinates();
                    li.childcontent.setStyle('display', 'none');
                }

                var ml = 0;
                var l = lcor.left;
                var r = l + ccor.width;
                if (this.wrapper) {
                    var wcor = this.wrapper.getCoordinates();
                    l = l - wcor.left;
                    r = wcor.right - r + 10;
                } else {
                    r = window.getWidth() - r + 10;
                }
                if (l < 0 || l + r < 0) {
                    ml = -l;
                } else if (r < 0) {
                    ml = r;
                }
                if (ml != 0)
                    li.childcontent.setStyle('margin-left', ml);
            } else {
                //check position
                var lcor = li.getCoordinates();
                var ccor = li.childcontent.getCoordinates();
                if (!ccor.width)
                {
                    li.childcontent.setStyle('display', 'block');
                    ccor = li.childcontent.getCoordinates();
                    li.childcontent.setStyle('display', 'none');
                }
                var mr = 0;
                var r = lcor.right;
                var l = r - ccor.width;
                if (this.wrapper) {
                    var wcor = this.wrapper.getCoordinates();
                    l = l - wcor.left;
                    r = wcor.right - r + 10;
                } else {
                    r = window.getWidth() - r + 10;
                }
                if (r < 0 || l + r < 0) {
                    mr = -r;
                } else if (l < 0) {
                    mr = l;
                }
                if (mr != 0)
                    li.childcontent.setStyle('margin-right', mr);
            }
        } else {
            // Process submenu with level > 1
            if (window.isRTL) {
                // Window is RTL
                // If direction = left  & childcontent is out of viewport, change direction to right & view content to right
                // If direction = right & childcontent is out of viewport, change direction to left
                var direction = 'left';
                if (li.view_direction != undefined) {
                    direction = li.view_direction;
                }
                var lcor = li.getCoordinates();
                var ccor = li.childcontent.getCoordinates();
                if (!ccor.width)
                {
                    li.childcontent.setStyle('display', 'block');
                    ccor = li.childcontent.getCoordinates();
                    li.childcontent.setStyle('display', 'none');
                }
                if (direction == 'right') {
                    // Check out of viewport
                    var r = lcor.right + ccor.width;
                    if (this.wrapper) {
                        var wcor = this.wrapper.getCoordinates();
                        r = wcor.right - r + 10;
                    } else {
                        r = window.getWidth() - r + 10;
                    }
                    if (r < 0) {
                        // Change position for submenu
                        li.childcontent.setStyle('margin-right', lcor.width);
                        // Change direction of submenu
                        var els = li.childcontent.getElements('li');
                        for (i = 0; i < els.length; i++) {
                            els[i].view_direction = 'left';
                        }
                    } else {
                        // Not out of viewport, however it is being right, so it need to be viewed in right
                        li.childcontent.setStyle('margin-right', -ccor.width + 20);
                    }
                } else {
                    // Check out of viewport in left direction
                    var l = lcor.left - ccor.width;
                    if (this.wrapper) {
                        var wcor = this.wrapper.getCoordinates();
                        l = l - wcor.left + 10;
                    } else {
                        l = l + 10;
                    }
                    if (l < 0) {
                        // Out of viewport, change position
                        li.childcontent.setStyle('margin-right', -ccor.width + 20);
                        // Change direction
                        var els = li.childcontent.getElements('li');
                        for (i = 0; i < els.length; i++) {
                            els[i].view_direction = 'right';
                        }
                    } else {
                        // Not viewport, however the position is not correct after initialize, so it need to change postion
                        li.childcontent.setStyle('margin-right', lcor.width);
                        // Level 3 is still have direction = right, so need to change submenu direction to left
                        var els = li.childcontent.getElements('li');
                        for (i = 0; i < els.length; i++) {
                            els[i].view_direction = 'left';
                        }
                    }
                }
            } else {
                // window isn't RTL
                // If direction == right and childcontent is out of view-port, change direction to left and view childcontent in left
                // If direction == left  and childcontent is out of view-port, change direction to right
                var direction = 'right';
                if (li.view_direction != undefined) {
                    direction = li.view_direction;
                }
                var lcor = li.getCoordinates();
                var ccor = li.childcontent.getCoordinates();
                if (!ccor.width)
                {
                    li.childcontent.setStyle('display', 'block');
                    ccor = li.childcontent.getCoordinates();
                    li.childcontent.setStyle('display', 'none');
                }
                if (direction == 'right') {
                    // Check out of viewport
                    var r = lcor.right + ccor.width;
                    if (this.wrapper) {
                        var wcor = this.wrapper.getCoordinates();
                        r = wcor.right - r + 10;
                    } else {
                        r = window.getWidth() - r + 10;
                    }
                    if (r < 0) {
                        // Change position for submenu
                        li.childcontent.setStyle('margin-left', -ccor.width + 20);
                        // Change direction of submenu
                        var els = li.childcontent.getElements('li');
                        for (i = 0; i < els.length; i++) {
                            els[i].view_direction = 'left';
                        }
                    }
                } else {
                    // Check out of viewport in left direction
                    var l = lcor.left - ccor.width;
                    if (this.wrapper) {
                        var wcor = this.wrapper.getCoordinates();
                        l = l - wcor.left + 10;
                    } else {
                        l = l + 10;
                    }
                    if (l < 0) {
                        // Out of viewport, so change direction
                        var els = li.childcontent.getElements('li');
                        for (i = 0; i < els.length; i++) {
                            els[i].view_direction = 'right';
                        }
                    } else {
                        // Not out of viewport, however it is being left, so it need to be viewed in left
                        li.childcontent.setStyle('margin-left', -lcor.width - 20);
                    }
                }
            }
        }
    }
});

;
