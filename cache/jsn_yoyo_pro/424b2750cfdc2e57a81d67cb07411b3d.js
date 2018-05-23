// Include: /cache/jsn_yoyo_pro/3248ce194d72085f38d9059b315c8d32.js



/* FILE: /media/jui/js/jquery-migrate.min.js */
/*! jQuery Migrate v1.2.1 | (c) 2005, 2013 jQuery Foundation, Inc. and other contributors | jquery.org/license */
jQuery.migrateMute===void 0&&(jQuery.migrateMute=!0),function(e,t,n){function r(n){var r=t.console;i[n]||(i[n]=!0,e.migrateWarnings.push(n),r&&r.warn&&!e.migrateMute&&(r.warn("JQMIGRATE: "+n),e.migrateTrace&&r.trace&&r.trace()))}function a(t,a,i,o){if(Object.defineProperty)try{return Object.defineProperty(t,a,{configurable:!0,enumerable:!0,get:function(){return r(o),i},set:function(e){r(o),i=e}}),n}catch(s){}e._definePropertyBroken=!0,t[a]=i}var i={};e.migrateWarnings=[],!e.migrateMute&&t.console&&t.console.log&&t.console.log("JQMIGRATE: Logging is active"),e.migrateTrace===n&&(e.migrateTrace=!0),e.migrateReset=function(){i={},e.migrateWarnings.length=0},"BackCompat"===document.compatMode&&r("jQuery is not compatible with Quirks Mode");var o=e("<input/>",{size:1}).attr("size")&&e.attrFn,s=e.attr,u=e.attrHooks.value&&e.attrHooks.value.get||function(){return null},c=e.attrHooks.value&&e.attrHooks.value.set||function(){return n},l=/^(?:input|button)$/i,d=/^[238]$/,p=/^(?:autofocus|autoplay|async|checked|controls|defer|disabled|hidden|loop|multiple|open|readonly|required|scoped|selected)$/i,f=/^(?:checked|selected)$/i;a(e,"attrFn",o||{},"jQuery.attrFn is deprecated"),e.attr=function(t,a,i,u){var c=a.toLowerCase(),g=t&&t.nodeType;return u&&(4>s.length&&r("jQuery.fn.attr( props, pass ) is deprecated"),t&&!d.test(g)&&(o?a in o:e.isFunction(e.fn[a])))?e(t)[a](i):("type"===a&&i!==n&&l.test(t.nodeName)&&t.parentNode&&r("Can't change the 'type' of an input or button in IE 6/7/8"),!e.attrHooks[c]&&p.test(c)&&(e.attrHooks[c]={get:function(t,r){var a,i=e.prop(t,r);return i===!0||"boolean"!=typeof i&&(a=t.getAttributeNode(r))&&a.nodeValue!==!1?r.toLowerCase():n},set:function(t,n,r){var a;return n===!1?e.removeAttr(t,r):(a=e.propFix[r]||r,a in t&&(t[a]=!0),t.setAttribute(r,r.toLowerCase())),r}},f.test(c)&&r("jQuery.fn.attr('"+c+"') may use property instead of attribute")),s.call(e,t,a,i))},e.attrHooks.value={get:function(e,t){var n=(e.nodeName||"").toLowerCase();return"button"===n?u.apply(this,arguments):("input"!==n&&"option"!==n&&r("jQuery.fn.attr('value') no longer gets properties"),t in e?e.value:null)},set:function(e,t){var a=(e.nodeName||"").toLowerCase();return"button"===a?c.apply(this,arguments):("input"!==a&&"option"!==a&&r("jQuery.fn.attr('value', val) no longer sets properties"),e.value=t,n)}};var g,h,v=e.fn.init,m=e.parseJSON,y=/^([^<]*)(<[\w\W]+>)([^>]*)$/;e.fn.init=function(t,n,a){var i;return t&&"string"==typeof t&&!e.isPlainObject(n)&&(i=y.exec(e.trim(t)))&&i[0]&&("<"!==t.charAt(0)&&r("$(html) HTML strings must start with '<' character"),i[3]&&r("$(html) HTML text after last tag is ignored"),"#"===i[0].charAt(0)&&(r("HTML string cannot start with a '#' character"),e.error("JQMIGRATE: Invalid selector string (XSS)")),n&&n.context&&(n=n.context),e.parseHTML)?v.call(this,e.parseHTML(i[2],n,!0),n,a):v.apply(this,arguments)},e.fn.init.prototype=e.fn,e.parseJSON=function(e){return e||null===e?m.apply(this,arguments):(r("jQuery.parseJSON requires a valid JSON string"),null)},e.uaMatch=function(e){e=e.toLowerCase();var t=/(chrome)[ \/]([\w.]+)/.exec(e)||/(webkit)[ \/]([\w.]+)/.exec(e)||/(opera)(?:.*version|)[ \/]([\w.]+)/.exec(e)||/(msie) ([\w.]+)/.exec(e)||0>e.indexOf("compatible")&&/(mozilla)(?:.*? rv:([\w.]+)|)/.exec(e)||[];return{browser:t[1]||"",version:t[2]||"0"}},e.browser||(g=e.uaMatch(navigator.userAgent),h={},g.browser&&(h[g.browser]=!0,h.version=g.version),h.chrome?h.webkit=!0:h.webkit&&(h.safari=!0),e.browser=h),a(e,"browser",e.browser,"jQuery.browser is deprecated"),e.sub=function(){function t(e,n){return new t.fn.init(e,n)}e.extend(!0,t,this),t.superclass=this,t.fn=t.prototype=this(),t.fn.constructor=t,t.sub=this.sub,t.fn.init=function(r,a){return a&&a instanceof e&&!(a instanceof t)&&(a=t(a)),e.fn.init.call(this,r,a,n)},t.fn.init.prototype=t.fn;var n=t(document);return r("jQuery.sub() is deprecated"),t},e.ajaxSetup({converters:{"text json":e.parseJSON}});var b=e.fn.data;e.fn.data=function(t){var a,i,o=this[0];return!o||"events"!==t||1!==arguments.length||(a=e.data(o,t),i=e._data(o,t),a!==n&&a!==i||i===n)?b.apply(this,arguments):(r("Use of jQuery.fn.data('events') is deprecated"),i)};var j=/\/(java|ecma)script/i,w=e.fn.andSelf||e.fn.addBack;e.fn.andSelf=function(){return r("jQuery.fn.andSelf() replaced by jQuery.fn.addBack()"),w.apply(this,arguments)},e.clean||(e.clean=function(t,a,i,o){a=a||document,a=!a.nodeType&&a[0]||a,a=a.ownerDocument||a,r("jQuery.clean() is deprecated");var s,u,c,l,d=[];if(e.merge(d,e.buildFragment(t,a).childNodes),i)for(c=function(e){return!e.type||j.test(e.type)?o?o.push(e.parentNode?e.parentNode.removeChild(e):e):i.appendChild(e):n},s=0;null!=(u=d[s]);s++)e.nodeName(u,"script")&&c(u)||(i.appendChild(u),u.getElementsByTagName!==n&&(l=e.grep(e.merge([],u.getElementsByTagName("script")),c),d.splice.apply(d,[s+1,0].concat(l)),s+=l.length));return d});var Q=e.event.add,x=e.event.remove,k=e.event.trigger,N=e.fn.toggle,T=e.fn.live,M=e.fn.die,S="ajaxStart|ajaxStop|ajaxSend|ajaxComplete|ajaxError|ajaxSuccess",C=RegExp("\\b(?:"+S+")\\b"),H=/(?:^|\s)hover(\.\S+|)\b/,A=function(t){return"string"!=typeof t||e.event.special.hover?t:(H.test(t)&&r("'hover' pseudo-event is deprecated, use 'mouseenter mouseleave'"),t&&t.replace(H,"mouseenter$1 mouseleave$1"))};e.event.props&&"attrChange"!==e.event.props[0]&&e.event.props.unshift("attrChange","attrName","relatedNode","srcElement"),e.event.dispatch&&a(e.event,"handle",e.event.dispatch,"jQuery.event.handle is undocumented and deprecated"),e.event.add=function(e,t,n,a,i){e!==document&&C.test(t)&&r("AJAX events should be attached to document: "+t),Q.call(this,e,A(t||""),n,a,i)},e.event.remove=function(e,t,n,r,a){x.call(this,e,A(t)||"",n,r,a)},e.fn.error=function(){var e=Array.prototype.slice.call(arguments,0);return r("jQuery.fn.error() is deprecated"),e.splice(0,0,"error"),arguments.length?this.bind.apply(this,e):(this.triggerHandler.apply(this,e),this)},e.fn.toggle=function(t,n){if(!e.isFunction(t)||!e.isFunction(n))return N.apply(this,arguments);r("jQuery.fn.toggle(handler, handler...) is deprecated");var a=arguments,i=t.guid||e.guid++,o=0,s=function(n){var r=(e._data(this,"lastToggle"+t.guid)||0)%o;return e._data(this,"lastToggle"+t.guid,r+1),n.preventDefault(),a[r].apply(this,arguments)||!1};for(s.guid=i;a.length>o;)a[o++].guid=i;return this.click(s)},e.fn.live=function(t,n,a){return r("jQuery.fn.live() is deprecated"),T?T.apply(this,arguments):(e(this.context).on(t,this.selector,n,a),this)},e.fn.die=function(t,n){return r("jQuery.fn.die() is deprecated"),M?M.apply(this,arguments):(e(this.context).off(t,this.selector||"**",n),this)},e.event.trigger=function(e,t,n,a){return n||C.test(e)||r("Global events are undocumented and deprecated"),k.call(this,e,t,n||document,a)},e.each(S.split("|"),function(t,n){e.event.special[n]={setup:function(){var t=this;return t!==document&&(e.event.add(document,n+"."+e.guid,function(){e.event.trigger(n,null,t,!0)}),e._data(this,n,e.guid++)),!1},teardown:function(){return this!==document&&e.event.remove(document,n+"."+e._data(this,n)),!1}}})}(jQuery,window);;


/* FILE: /media/jui/js/bootstrap.min.js */
/*!
 * Bootstrap.js by @fat & @mdo
 * Copyright 2012 Twitter, Inc.
 * http://www.apache.org/licenses/LICENSE-2.0.txt
 *
 * Custom version for Joomla!
 */
!function(e){"use strict";e(function(){e.support.transition=function(){var e=function(){var e=document.createElement("bootstrap"),t={WebkitTransition:"webkitTransitionEnd",MozTransition:"transitionend",OTransition:"oTransitionEnd otransitionend",transition:"transitionend"},n;for(n in t)if(e.style[n]!==undefined)return t[n]}();return e&&{end:e}}()})}(window.jQuery),!function(e){"use strict";var t='[data-dismiss="alert"]',n=function(n){e(n).on("click",t,this.close)};n.prototype.close=function(t){function s(){i.trigger("closed").remove()}var n=e(this),r=n.attr("data-target"),i;r||(r=n.attr("href"),r=r&&r.replace(/.*(?=#[^\s]*$)/,"")),i=e(r),t&&t.preventDefault(),i.length||(i=n.hasClass("alert")?n:n.parent()),i.trigger(t=e.Event("close"));if(t.isDefaultPrevented())return;i.removeClass("in"),e.support.transition&&i.hasClass("fade")?i.on(e.support.transition.end,s):s()};var r=e.fn.alert;e.fn.alert=function(t){return this.each(function(){var r=e(this),i=r.data("alert");i||r.data("alert",i=new n(this)),typeof t=="string"&&i[t].call(r)})},e.fn.alert.Constructor=n,e.fn.alert.noConflict=function(){return e.fn.alert=r,this},e(document).on("click.alert.data-api",t,n.prototype.close)}(window.jQuery),!function(e){"use strict";var t=function(t,n){this.$element=e(t),this.options=e.extend({},e.fn.button.defaults,n)};t.prototype.setState=function(e){var t="disabled",n=this.$element,r=n.data(),i=n.is("input")?"val":"html";e+="Text",r.resetText||n.data("resetText",n[i]()),n[i](r[e]||this.options[e]),setTimeout(function(){e=="loadingText"?n.addClass(t).attr(t,t):n.removeClass(t).removeAttr(t)},0)},t.prototype.toggle=function(){var e=this.$element.closest('[data-toggle="buttons-radio"]');e&&e.find(".active").removeClass("active"),this.$element.toggleClass("active")};var n=e.fn.button;e.fn.button=function(n){return this.each(function(){var r=e(this),i=r.data("button"),s=typeof n=="object"&&n;i||r.data("button",i=new t(this,s)),n=="toggle"?i.toggle():n&&i.setState(n)})},e.fn.button.defaults={loadingText:"loading..."},e.fn.button.Constructor=t,e.fn.button.noConflict=function(){return e.fn.button=n,this},e(document).on("click.button.data-api","[data-toggle^=button]",function(t){var n=e(t.target);n.hasClass("btn")||(n=n.closest(".btn")),n.button("toggle")})}(window.jQuery),!function(e){"use strict";var t=function(t,n){this.$element=e(t),this.$indicators=this.$element.find(".carousel-indicators"),this.options=n,this.options.pause=="hover"&&this.$element.on("mouseenter",e.proxy(this.pause,this)).on("mouseleave",e.proxy(this.cycle,this))};t.prototype={cycle:function(t){return t||(this.paused=!1),this.interval&&clearInterval(this.interval),this.options.interval&&!this.paused&&(this.interval=setInterval(e.proxy(this.next,this),this.options.interval)),this},getActiveIndex:function(){return this.$active=this.$element.find(".item.active"),this.$items=this.$active.parent().children(),this.$items.index(this.$active)},to:function(t){var n=this.getActiveIndex(),r=this;if(t>this.$items.length-1||t<0)return;return this.sliding?this.$element.one("slid",function(){r.to(t)}):n==t?this.pause().cycle():this.slide(t>n?"next":"prev",e(this.$items[t]))},pause:function(t){return t||(this.paused=!0),this.$element.find(".next, .prev").length&&e.support.transition.end&&(this.$element.trigger(e.support.transition.end),this.cycle(!0)),clearInterval(this.interval),this.interval=null,this},next:function(){if(this.sliding)return;return this.slide("next")},prev:function(){if(this.sliding)return;return this.slide("prev")},slide:function(t,n){var r=this.$element.find(".item.active"),i=n||r[t](),s=this.interval,o=t=="next"?"left":"right",u=t=="next"?"first":"last",a=this,f;this.sliding=!0,s&&this.pause(),i=i.length?i:this.$element.find(".item")[u](),f=e.Event("slide",{relatedTarget:i[0],direction:o});if(i.hasClass("active"))return;this.$indicators.length&&(this.$indicators.find(".active").removeClass("active"),this.$element.one("slid",function(){var t=e(a.$indicators.children()[a.getActiveIndex()]);t&&t.addClass("active")}));if(e.support.transition&&this.$element.hasClass("slide")){this.$element.trigger(f);if(f.isDefaultPrevented())return;i.addClass(t),i[0].offsetWidth,r.addClass(o),i.addClass(o),this.$element.one(e.support.transition.end,function(){i.removeClass([t,o].join(" ")).addClass("active"),r.removeClass(["active",o].join(" ")),a.sliding=!1,setTimeout(function(){a.$element.trigger("slid")},0)})}else{this.$element.trigger(f);if(f.isDefaultPrevented())return;r.removeClass("active"),i.addClass("active"),this.sliding=!1,this.$element.trigger("slid")}return s&&this.cycle(),this}};var n=e.fn.carousel;e.fn.carousel=function(n){return this.each(function(){var r=e(this),i=r.data("carousel"),s=e.extend({},e.fn.carousel.defaults,typeof n=="object"&&n),o=typeof n=="string"?n:s.slide;i||r.data("carousel",i=new t(this,s)),typeof n=="number"?i.to(n):o?i[o]():s.interval&&i.pause().cycle()})},e.fn.carousel.defaults={interval:5e3,pause:"hover"},e.fn.carousel.Constructor=t,e.fn.carousel.noConflict=function(){return e.fn.carousel=n,this},e(document).on("click.carousel.data-api","[data-slide], [data-slide-to]",function(t){var n=e(this),r,i=e(n.attr("data-target")||(r=n.attr("href"))&&r.replace(/.*(?=#[^\s]+$)/,"")),s=e.extend({},i.data(),n.data()),o;i.carousel(s),(o=n.attr("data-slide-to"))&&i.data("carousel").pause().to(o).cycle(),t.preventDefault()})}(window.jQuery),!function(e){"use strict";var t=function(t,n){this.$element=e(t),this.options=e.extend({},e.fn.collapse.defaults,n),this.options.parent&&(this.$parent=e(this.options.parent)),this.options.toggle&&this.toggle()};t.prototype={constructor:t,dimension:function(){var e=this.$element.hasClass("width");return e?"width":"height"},show:function(){var t,n,r,i;if(this.transitioning||this.$element.hasClass("in"))return;t=this.dimension(),n=e.camelCase(["scroll",t].join("-")),r=this.$parent&&this.$parent.find("> .accordion-group > .in");if(r&&r.length){i=r.data("collapse");if(i&&i.transitioning)return;r.collapse("hide"),i||r.data("collapse",null)}this.$element[t](0),this.transition("addClass",e.Event("show"),"shown"),e.support.transition&&this.$element[t](this.$element[0][n])},hide:function(){var t;if(this.transitioning||!this.$element.hasClass("in"))return;t=this.dimension(),this.reset(this.$element[t]()),this.transition("removeClass",e.Event("hideme"),"hidden"),this.$element[t](0)},reset:function(e){var t=this.dimension();return this.$element.removeClass("collapse")[t](e||"auto")[0].offsetWidth,this.$element[e!==null?"addClass":"removeClass"]("collapse"),this},transition:function(t,n,r){var i=this,s=function(){n.type=="show"&&i.reset(),i.transitioning=0,i.$element.trigger(r)};this.$element.trigger(n);if(n.isDefaultPrevented())return;this.transitioning=1,this.$element[t]("in"),e.support.transition&&this.$element.hasClass("collapse")?this.$element.one(e.support.transition.end,s):s()},toggle:function(){this[this.$element.hasClass("in")?"hide":"show"]()}};var n=e.fn.collapse;e.fn.collapse=function(n){return this.each(function(){var r=e(this),i=r.data("collapse"),s=e.extend({},e.fn.collapse.defaults,r.data(),typeof n=="object"&&n);i||r.data("collapse",i=new t(this,s)),typeof n=="string"&&i[n]()})},e.fn.collapse.defaults={toggle:!0},e.fn.collapse.Constructor=t,e.fn.collapse.noConflict=function(){return e.fn.collapse=n,this},e(document).on("click.collapse.data-api","[data-toggle=collapse]",function(t){var n=e(this),r,i=n.attr("data-target")||t.preventDefault()||(r=n.attr("href"))&&r.replace(/.*(?=#[^\s]+$)/,""),s=e(i).data("collapse")?"toggle":n.data();n[e(i).hasClass("in")?"addClass":"removeClass"]("collapsed"),e(i).collapse(s)})}(window.jQuery),!function(e){"use strict";function r(){e(t).parent().parent().removeClass("nav-hover"),e(".dropdown-backdrop").remove(),e(t).each(function(){i(e(this)).removeClass("open")})}function i(t){var n=t.attr("data-target"),r;n||(n=t.attr("href"),n=n&&/#/.test(n)&&n.replace(/.*(?=#[^\s]*$)/,"")),r=n&&e(n);if(!r||!r.length)r=t.parent();return r}var t="[data-toggle=dropdown]",n=function(t){var n=e(t).on("click.dropdown.data-api",this.toggle).on("mouseover.dropdown.data-api",this.toggle);e("html").on("click.dropdown.data-api",function(){n.parent().parent().removeClass("nav-hover"),n.parent().removeClass("open")})};n.prototype={constructor:n,toggle:function(t){var n=e(this),s,o,u,a;if(n.is(".disabled, :disabled"))return;s=i(n),o=s.hasClass("open"),a=s.parent().hasClass("nav-hover");if(!a&&t.type=="mouseover")return;u=n.attr("href");if(t.type=="click"&&u&&u!=="#"){window.location=u;return}r();if(!o&&t.type!="mouseover"||a&&t.type=="mouseover")"ontouchstart"in document.documentElement&&(e('<div class="dropdown-backdrop"/>').insertBefore(e(this)).on("click",r),n.on("hover",function(){e(".dropdown-backdrop").remove()})),s.parent().toggleClass("nav-hover"),s.toggleClass("open");return n.focus(),!1},keydown:function(n){var r,s,o,u,a,f;if(!/(38|40|27)/.test(n.keyCode))return;r=e(this),n.preventDefault(),n.stopPropagation();if(r.is(".disabled, :disabled"))return;u=i(r),a=u.hasClass("open");if(!a||a&&n.keyCode==27)return n.which==27&&u.find(t).focus(),r.click();s=e("[role=menu] li:not(.divider):visible a",u);if(!s.length)return;f=s.index(s.filter(":focus")),n.keyCode==38&&f>0&&f--,n.keyCode==40&&f<s.length-1&&f++,~f||(f=0),s.eq(f).focus()}};var s=e.fn.dropdown;e.fn.dropdown=function(t){return this.each(function(){var r=e(this),i=r.data("dropdown");i||r.data("dropdown",i=new n(this)),typeof t=="string"&&i[t].call(r)})},e.fn.dropdown.Constructor=n,e.fn.dropdown.noConflict=function(){return e.fn.dropdown=s,this},e(document).on("click.dropdown.data-api",r).on("click.dropdown.data-api",".dropdown form",function(e){e.stopPropagation()}).on("click.dropdown.data-api",t,n.prototype.toggle).on("keydown.dropdown.data-api",t+", [role=menu]",n.prototype.keydown).on("mouseover.dropdown.data-api",t,n.prototype.toggle)}(window.jQuery),!function(e){"use strict";var t=function(t,n){this.options=n,this.$element=e(t).delegate('[data-dismiss="modal"]',"click.dismiss.modal",e.proxy(this.hide,this)),this.options.remote&&this.$element.find(".modal-body").load(this.options.remote)};t.prototype={constructor:t,toggle:function(){return this[this.isShown?"hide":"show"]()},show:function(){var t=this,n=e.Event("show");this.$element.trigger(n);if(this.isShown||n.isDefaultPrevented())return;this.isShown=!0,this.escape(),this.backdrop(function(){var n=e.support.transition&&t.$element.hasClass("fade");t.$element.parent().length||t.$element.appendTo(document.body),t.$element.show(),n&&t.$element[0].offsetWidth,t.$element.addClass("in").attr("aria-hidden",!1),t.enforceFocus(),n?t.$element.one(e.support.transition.end,function(){t.$element.focus().trigger("shown")}):t.$element.focus().trigger("shown")})},hide:function(t){t&&t.preventDefault();var n=this;t=e.Event("hide"),this.$element.trigger(t);if(!this.isShown||t.isDefaultPrevented())return;this.isShown=!1,this.escape(),e(document).off("focusin.modal"),this.$element.removeClass("in").attr("aria-hidden",!0),e.support.transition&&this.$element.hasClass("fade")?this.hideWithTransition():this.hideModal()},enforceFocus:function(){var t=this;e(document).on("focusin.modal",function(e){t.$element[0]!==e.target&&!t.$element.has(e.target).length&&t.$element.focus()})},escape:function(){var e=this;this.isShown&&this.options.keyboard?this.$element.on("keyup.dismiss.modal",function(t){t.which==27&&e.hide()}):this.isShown||this.$element.off("keyup.dismiss.modal")},hideWithTransition:function(){var t=this,n=setTimeout(function(){t.$element.off(e.support.transition.end),t.hideModal()},500);this.$element.one(e.support.transition.end,function(){clearTimeout(n),t.hideModal()})},hideModal:function(){var e=this;this.$element.hide(),this.backdrop(function(){e.removeBackdrop(),e.$element.trigger("hidden")})},removeBackdrop:function(){this.$backdrop&&this.$backdrop.remove(),this.$backdrop=null},backdrop:function(t){var n=this,r=this.$element.hasClass("fade")?"fade":"";if(this.isShown&&this.options.backdrop){var i=e.support.transition&&r;this.$backdrop=e('<div class="modal-backdrop '+r+'" />').appendTo(document.body),this.$backdrop.click(this.options.backdrop=="static"?e.proxy(this.$element[0].focus,this.$element[0]):e.proxy(this.hide,this)),i&&this.$backdrop[0].offsetWidth,this.$backdrop.addClass("in");if(!t)return;i?this.$backdrop.one(e.support.transition.end,t):t()}else!this.isShown&&this.$backdrop?(this.$backdrop.removeClass("in"),e.support.transition&&this.$element.hasClass("fade")?this.$backdrop.one(e.support.transition.end,t):t()):t&&t()}};var n=e.fn.modal;e.fn.modal=function(n){return this.each(function(){var r=e(this),i=r.data("modal"),s=e.extend({},e.fn.modal.defaults,r.data(),typeof n=="object"&&n);i||r.data("modal",i=new t(this,s)),typeof n=="string"?i[n]():s.show&&i.show()})},e.fn.modal.defaults={backdrop:!0,keyboard:!0,show:!0},e.fn.modal.Constructor=t,e.fn.modal.noConflict=function(){return e.fn.modal=n,this},e(document).on("click.modal.data-api",'[data-toggle="modal"]',function(t){var n=e(this),r=n.attr("href"),i=e(n.attr("data-target")||r&&r.replace(/.*(?=#[^\s]+$)/,"")),s=i.data("modal")?"toggle":e.extend({remote:!/#/.test(r)&&r},i.data(),n.data());t.preventDefault(),i.modal(s).one("hide",function(){n.focus()})})}(window.jQuery),!function(e){"use strict";var t=function(e,t){this.init("tooltip",e,t)};t.prototype={constructor:t,init:function(t,n,r){var i,s,o,u,a;this.type=t,this.$element=e(n),this.options=this.getOptions(r),this.enabled=!0,o=this.options.trigger.split(" ");for(a=o.length;a--;)u=o[a],u=="click"?this.$element.on("click."+this.type,this.options.selector,e.proxy(this.toggle,this)):u!="manual"&&(i=u=="hover"?"mouseenter":"focus",s=u=="hover"?"mouseleave":"blur",this.$element.on(i+"."+this.type,this.options.selector,e.proxy(this.enter,this)),this.$element.on(s+"."+this.type,this.options.selector,e.proxy(this.leave,this)));this.options.selector?this._options=e.extend({},this.options,{trigger:"manual",selector:""}):this.fixTitle()},getOptions:function(t){return t=e.extend({},e.fn[this.type].defaults,this.$element.data(),t),t.delay&&typeof t.delay=="number"&&(t.delay={show:t.delay,hide:t.delay}),t},enter:function(t){var n=e.fn[this.type].defaults,r={},i;this._options&&e.each(this._options,function(e,t){n[e]!=t&&(r[e]=t)},this),i=e(t.currentTarget)[this.type](r).data(this.type);if(!i.options.delay||!i.options.delay.show)return i.show();clearTimeout(this.timeout),i.hoverState="in",this.timeout=setTimeout(function(){i.hoverState=="in"&&i.show()},i.options.delay.show)},leave:function(t){var n=e(t.currentTarget)[this.type](this._options).data(this.type);this.timeout&&clearTimeout(this.timeout);if(!n.options.delay||!n.options.delay.hide)return n.hide();n.hoverState="out",this.timeout=setTimeout(function(){n.hoverState=="out"&&n.hide()},n.options.delay.hide)},show:function(){var t,n,r,i,s,o,u=e.Event("show");if(this.hasContent()&&this.enabled){this.$element.trigger(u);if(u.isDefaultPrevented())return;t=this.tip(),this.setContent(),this.options.animation&&t.addClass("fade"),s=typeof this.options.placement=="function"?this.options.placement.call(this,t[0],this.$element[0]):this.options.placement,t.detach().css({top:0,left:0,display:"block"}),this.options.container?t.appendTo(this.options.container):t.insertAfter(this.$element),n=this.getPosition(),r=t[0].offsetWidth,i=t[0].offsetHeight;switch(s){case"bottom":o={top:n.top+n.height,left:n.left+n.width/2-r/2};break;case"top":o={top:n.top-i,left:n.left+n.width/2-r/2};break;case"left":o={top:n.top+n.height/2-i/2,left:n.left-r};break;case"right":o={top:n.top+n.height/2-i/2,left:n.left+n.width}}this.applyPlacement(o,s),this.$element.trigger("shown")}},applyPlacement:function(e,t){var n=this.tip(),r=n[0].offsetWidth,i=n[0].offsetHeight,s,o,u,a;n.offset(e).addClass(t).addClass("in"),s=n[0].offsetWidth,o=n[0].offsetHeight,t=="top"&&o!=i&&(e.top=e.top+i-o,a=!0),t=="bottom"||t=="top"?(u=0,e.left<0&&(u=e.left*-2,e.left=0,n.offset(e),s=n[0].offsetWidth,o=n[0].offsetHeight),this.replaceArrow(u-r+s,s,"left")):this.replaceArrow(o-i,o,"top"),a&&n.offset(e)},replaceArrow:function(e,t,n){this.arrow().css(n,e?50*(1-e/t)+"%":"")},setContent:function(){var e=this.tip(),t=this.getTitle();e.find(".tooltip-inner")[this.options.html?"html":"text"](t),e.removeClass("fade in top bottom left right")},hide:function(){function i(){var t=setTimeout(function(){n.off(e.support.transition.end).detach()},500);n.one(e.support.transition.end,function(){clearTimeout(t),n.detach()})}var t=this,n=this.tip(),r=e.Event("hideme");this.$element.trigger(r);if(r.isDefaultPrevented())return;return n.removeClass("in"),e.support.transition&&this.$tip.hasClass("fade")?i():n.detach(),this.$element.trigger("hidden"),this},fixTitle:function(){var e=this.$element;(e.attr("title")||typeof e.attr("data-original-title")!="string")&&e.attr("data-original-title",e.attr("title")||"").attr("title","")},hasContent:function(){return this.getTitle()},getPosition:function(){var t=this.$element[0];return e.extend({},typeof t.getBoundingClientRect=="function"?t.getBoundingClientRect():{width:t.offsetWidth,height:t.offsetHeight},this.$element.offset())},getTitle:function(){var e,t=this.$element,n=this.options;return e=t.attr("data-original-title")||(typeof n.title=="function"?n.title.call(t[0]):n.title),e},tip:function(){return this.$tip=this.$tip||e(this.options.template)},arrow:function(){return this.$arrow=this.$arrow||this.tip().find(".tooltip-arrow")},validate:function(){this.$element[0].parentNode||(this.hide(),this.$element=null,this.options=null)},enable:function(){this.enabled=!0},disable:function(){this.enabled=!1},toggleEnabled:function(){this.enabled=!this.enabled},toggle:function(t){var n=t?e(t.currentTarget)[this.type](this._options).data(this.type):this;n.tip().hasClass("in")?n.hide():n.show()},destroy:function(){this.hide().$element.off("."+this.type).removeData(this.type)}};var n=e.fn.tooltip;e.fn.tooltip=function(n){return this.each(function(){var r=e(this),i=r.data("tooltip"),s=typeof n=="object"&&n;i||r.data("tooltip",i=new t(this,s)),typeof n=="string"&&i[n]()})},e.fn.tooltip.Constructor=t,e.fn.tooltip.defaults={animation:!0,placement:"top",selector:!1,template:'<div class="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner"></div></div>',trigger:"hover focus",title:"",delay:0,html:!0,container:!1},e.fn.tooltip.noConflict=function(){return e.fn.tooltip=n,this}}(window.jQuery),!function(e){"use strict";var t=function(e,t){this.init("popover",e,t)};t.prototype=e.extend({},e.fn.tooltip.Constructor.prototype,{constructor:t,setContent:function(){var e=this.tip(),t=this.getTitle(),n=this.getContent();e.find(".popover-title")[this.options.html?"html":"text"](t),e.find(".popover-content")[this.options.html?"html":"text"](n),e.removeClass("fade top bottom left right in")},hasContent:function(){return this.getTitle()||this.getContent()},getContent:function(){var e,t=this.$element,n=this.options;return e=(typeof n.content=="function"?n.content.call(t[0]):n.content)||t.attr("data-content"),e},tip:function(){return this.$tip||(this.$tip=e(this.options.template)),this.$tip},destroy:function(){this.hide().$element.off("."+this.type).removeData(this.type)}});var n=e.fn.popover;e.fn.popover=function(n){return this.each(function(){var r=e(this),i=r.data("popover"),s=typeof n=="object"&&n;i||r.data("popover",i=new t(this,s)),typeof n=="string"&&i[n]()})},e.fn.popover.Constructor=t,e.fn.popover.defaults=e.extend({},e.fn.tooltip.defaults,{placement:"right",trigger:"click",content:"",template:'<div class="popover"><div class="arrow"></div><h3 class="popover-title"></h3><div class="popover-content"></div></div>'}),e.fn.popover.noConflict=function(){return e.fn.popover=n,this}}(window.jQuery),!function(e){"use strict";function t(t,n){var r=e.proxy(this.process,this),i=e(t).is("body")?e(window):e(t),s;this.options=e.extend({},e.fn.scrollspy.defaults,n),this.$scrollElement=i.on("scroll.scroll-spy.data-api",r),this.selector=(this.options.target||(s=e(t).attr("href"))&&s.replace(/.*(?=#[^\s]+$)/,"")||"")+" .nav li > a",this.$body=e("body"),this.refresh(),this.process()}t.prototype={constructor:t,refresh:function(){var t=this,n;this.offsets=e([]),this.targets=e([]),n=this.$body.find(this.selector).map(function(){var n=e(this),r=n.data("target")||n.attr("href"),i=/^#\w/.test(r)&&e(r);return i&&i.length&&[[i.position().top+(!e.isWindow(t.$scrollElement.get(0))&&t.$scrollElement.scrollTop()),r]]||null}).sort(function(e,t){return e[0]-t[0]}).each(function(){t.offsets.push(this[0]),t.targets.push(this[1])})},process:function(){var e=this.$scrollElement.scrollTop()+this.options.offset,t=this.$scrollElement[0].scrollHeight||this.$body[0].scrollHeight,n=t-this.$scrollElement.height(),r=this.offsets,i=this.targets,s=this.activeTarget,o;if(e>=n)return s!=(o=i.last()[0])&&this.activate(o);for(o=r.length;o--;)s!=i[o]&&e>=r[o]&&(!r[o+1]||e<=r[o+1])&&this.activate(i[o])},activate:function(t){var n,r;this.activeTarget=t,e(this.selector).parent(".active").removeClass("active"),r=this.selector+'[data-target="'+t+'"],'+this.selector+'[href="'+t+'"]',n=e(r).parent("li").addClass("active"),n.parent(".dropdown-menu").length&&(n=n.closest("li.dropdown").addClass("active")),n.trigger("activate")}};var n=e.fn.scrollspy;e.fn.scrollspy=function(n){return this.each(function(){var r=e(this),i=r.data("scrollspy"),s=typeof n=="object"&&n;i||r.data("scrollspy",i=new t(this,s)),typeof n=="string"&&i[n]()})},e.fn.scrollspy.Constructor=t,e.fn.scrollspy.defaults={offset:10},e.fn.scrollspy.noConflict=function(){return e.fn.scrollspy=n,this},e(window).on("load",function(){e('[data-spy="scroll"]').each(function(){var t=e(this);t.scrollspy(t.data())})})}(window.jQuery),!function(e){"use strict";var t=function(t){this.element=e(t)};t.prototype={constructor:t,show:function(){var t=this.element,n=t.closest("ul:not(.dropdown-menu)"),r=t.attr("data-target"),i,s,o;r||(r=t.attr("href"),r=r&&r.replace(/.*(?=#[^\s]*$)/,""));if(t.parent("li").hasClass("active"))return;i=n.find(".active:last a")[0],o=e.Event("show",{relatedTarget:i}),t.trigger(o);if(o.isDefaultPrevented())return;s=e(r),this.activate(t.parent("li"),n),this.activate(s,s.parent(),function(){t.trigger({type:"shown",relatedTarget:i})})},activate:function(t,n,r){function o(){i.removeClass("active").find("> .dropdown-menu > .active").removeClass("active"),t.addClass("active"),s?(t[0].offsetWidth,t.addClass("in")):t.removeClass("fade"),t.parent(".dropdown-menu")&&t.closest("li.dropdown").addClass("active"),r&&r()}var i=n.find("> .active"),s=r&&e.support.transition&&i.hasClass("fade");s?i.one(e.support.transition.end,o):o(),i.removeClass("in")}};var n=e.fn.tab;e.fn.tab=function(n){return this.each(function(){var r=e(this),i=r.data("tab");i||r.data("tab",i=new t(this)),typeof n=="string"&&i[n]()})},e.fn.tab.Constructor=t,e.fn.tab.noConflict=function(){return e.fn.tab=n,this},e(document).on("click.tab.data-api",'[data-toggle="tab"], [data-toggle="pill"]',function(t){t.preventDefault(),e(this).tab("show")})}(window.jQuery),!function(e){"use strict";var t=function(t,n){this.$element=e(t),this.options=e.extend({},e.fn.typeahead.defaults,n),this.matcher=this.options.matcher||this.matcher,this.sorter=this.options.sorter||this.sorter,this.highlighter=this.options.highlighter||this.highlighter,this.updater=this.options.updater||this.updater,this.source=this.options.source,this.$menu=e(this.options.menu),this.shown=!1,this.listen()};t.prototype={constructor:t,select:function(){var e=this.$menu.find(".active").attr("data-value");return this.$element.val(this.updater(e)).change(),this.hide()},updater:function(e){return e},show:function(){var t=e.extend({},this.$element.position(),{height:this.$element[0].offsetHeight});return this.$menu.insertAfter(this.$element).css({top:t.top+t.height,left:t.left}).show(),this.shown=!0,this},hide:function(){return this.$menu.hide(),this.shown=!1,this},lookup:function(t){var n;return this.query=this.$element.val(),!this.query||this.query.length<this.options.minLength?this.shown?this.hide():this:(n=e.isFunction(this.source)?this.source(this.query,e.proxy(this.process,this)):this.source,n?this.process(n):this)},process:function(t){var n=this;return t=e.grep(t,function(e){return n.matcher(e)}),t=this.sorter(t),t.length?this.render(t.slice(0,this.options.items)).show():this.shown?this.hide():this},matcher:function(e){return~e.toLowerCase().indexOf(this.query.toLowerCase())},sorter:function(e){var t=[],n=[],r=[],i;while(i=e.shift())i.toLowerCase().indexOf(this.query.toLowerCase())?~i.indexOf(this.query)?n.push(i):r.push(i):t.push(i);return t.concat(n,r)},highlighter:function(e){var t=this.query.replace(/[\-\[\]{}()*+?.,\\\^$|#\s]/g,"\\$&");return e.replace(new RegExp("("+t+")","ig"),function(e,t){return"<strong>"+t+"</strong>"})},render:function(t){var n=this;return t=e(t).map(function(t,r){return t=e(n.options.item).attr("data-value",r),t.find("a").html(n.highlighter(r)),t[0]}),t.first().addClass("active"),this.$menu.html(t),this},next:function(t){var n=this.$menu.find(".active").removeClass("active"),r=n.next();r.length||(r=e(this.$menu.find("li")[0])),r.addClass("active")},prev:function(e){var t=this.$menu.find(".active").removeClass("active"),n=t.prev();n.length||(n=this.$menu.find("li").last()),n.addClass("active")},listen:function(){this.$element.on("focus",e.proxy(this.focus,this)).on("blur",e.proxy(this.blur,this)).on("keypress",e.proxy(this.keypress,this)).on("keyup",e.proxy(this.keyup,this)),this.eventSupported("keydown")&&this.$element.on("keydown",e.proxy(this.keydown,this)),this.$menu.on("click",e.proxy(this.click,this)).on("mouseenter","li",e.proxy(this.mouseenter,this)).on("mouseleave","li",e.proxy(this.mouseleave,this))},eventSupported:function(e){var t=e in this.$element;return t||(this.$element.setAttribute(e,"return;"),t=typeof this.$element[e]=="function"),t},move:function(e){if(!this.shown)return;switch(e.keyCode){case 9:case 13:case 27:e.preventDefault();break;case 38:e.preventDefault(),this.prev();break;case 40:e.preventDefault(),this.next()}e.stopPropagation()},keydown:function(t){this.suppressKeyPressRepeat=~e.inArray(t.keyCode,[40,38,9,13,27]),this.move(t)},keypress:function(e){if(this.suppressKeyPressRepeat)return;this.move(e)},keyup:function(e){switch(e.keyCode){case 40:case 38:case 16:case 17:case 18:break;case 9:case 13:if(!this.shown)return;this.select();break;case 27:if(!this.shown)return;this.hide();break;default:this.lookup()}e.stopPropagation(),e.preventDefault()},focus:function(e){this.focused=!0},blur:function(e){this.focused=!1,!this.mousedover&&this.shown&&this.hide()},click:function(e){e.stopPropagation(),e.preventDefault(),this.select(),this.$element.focus()},mouseenter:function(t){this.mousedover=!0,this.$menu.find(".active").removeClass("active"),e(t.currentTarget).addClass("active")},mouseleave:function(e){this.mousedover=!1,!this.focused&&this.shown&&this.hide()}};var n=e.fn.typeahead;e.fn.typeahead=function(n){return this.each(function(){var r=e(this),i=r.data("typeahead"),s=typeof n=="object"&&n;i||r.data("typeahead",i=new t(this,s)),typeof n=="string"&&i[n]()})},e.fn.typeahead.defaults={source:[],items:8,menu:'<ul class="typeahead dropdown-menu"></ul>',item:'<li><a href="#"></a></li>',minLength:1},e.fn.typeahead.Constructor=t,e.fn.typeahead.noConflict=function(){return e.fn.typeahead=n,this},e(document).on("focus.typeahead.data-api",'[data-provide="typeahead"]',function(t){var n=e(this);if(n.data("typeahead"))return;n.typeahead(n.data())})}(window.jQuery),!function(e){"use strict";var t=function(t,n){this.options=e.extend({},e.fn.affix.defaults,n),this.$window=e(window).on("scroll.affix.data-api",e.proxy(this.checkPosition,this)).on("click.affix.data-api",e.proxy(function(){setTimeout(e.proxy(this.checkPosition,this),1)},this)),this.$element=e(t),this.checkPosition()};t.prototype.checkPosition=function(){if(!this.$element.is(":visible"))return;var t=e(document).height(),n=this.$window.scrollTop(),r=this.$element.offset(),i=this.options.offset,s=i.bottom,o=i.top,u="affix affix-top affix-bottom",a;typeof i!="object"&&(s=o=i),typeof o=="function"&&(o=i.top()),typeof s=="function"&&(s=i.bottom()),a=this.unpin!=null&&n+this.unpin<=r.top?!1:s!=null&&r.top+this.$element.height()>=t-s?"bottom":o!=null&&n<=o?"top":!1;if(this.affixed===a)return;this.affixed=a,this.unpin=a=="bottom"?r.top-n:null,this.$element.removeClass(u).addClass("affix"+(a?"-"+a:""))};var n=e.fn.affix;e.fn.affix=function(n){return this.each(function(){var r=e(this),i=r.data("affix"),s=typeof n=="object"&&n;i||r.data("affix",i=new t(this,s)),typeof n=="string"&&i[n]()})},e.fn.affix.Constructor=t,e.fn.affix.defaults={offset:0},e.fn.affix.noConflict=function(){return e.fn.affix=n,this},e(window).on("load",function(){e('[data-spy="affix"]').each(function(){var t=e(this),n=t.data();n.offset=n.offset||{},n.offsetBottom&&(n.offset.bottom=n.offsetBottom),n.offsetTop&&(n.offset.top=n.offsetTop),t.affix(n)})})}(window.jQuery);;


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
