// Include: /cache/jsn_yoyo_pro/57b77cc6fbf04fcd7ead2c507bcd7f98.js
// Include: /cache/jsn_yoyo_pro/3d660430b936f2d59e07264a14491671.js



/* FILE: /media/system/js/punycode.js */
/*! http://mths.be/punycode v1.2.4 (C) by @mathias | MIT License*/
!function(a){function b(a){throw RangeError(E[a])}function c(a,b){for(var c=a.length;c--;)a[c]=b(a[c]);return a}function d(a,b){return c(a.split(D),b).join(".")}function e(a){for(var b,c,d=[],e=0,f=a.length;f>e;)b=a.charCodeAt(e++),b>=55296&&56319>=b&&f>e?(c=a.charCodeAt(e++),56320==(64512&c)?d.push(((1023&b)<<10)+(1023&c)+65536):(d.push(b),e--)):d.push(b);return d}function f(a){return c(a,function(a){var b="";return a>65535&&(a-=65536,b+=H(a>>>10&1023|55296),a=56320|1023&a),b+=H(a)}).join("")}function g(a){return 10>a-48?a-22:26>a-65?a-65:26>a-97?a-97:t}function h(a,b){return a+22+75*(26>a)-((0!=b)<<5)}function i(a,b,c){var d=0;for(a=c?G(a/x):a>>1,a+=G(a/b);a>F*v>>1;d+=t)a=G(a/F);return G(d+(F+1)*a/(a+w))}function j(a){var c,d,e,h,j,k,l,m,n,o,p=[],q=a.length,r=0,w=z,x=y;for(d=a.lastIndexOf(A),0>d&&(d=0),e=0;d>e;++e)a.charCodeAt(e)>=128&&b("not-basic"),p.push(a.charCodeAt(e));for(h=d>0?d+1:0;q>h;){for(j=r,k=1,l=t;h>=q&&b("invalid-input"),m=g(a.charCodeAt(h++)),(m>=t||m>G((s-r)/k))&&b("overflow"),r+=m*k,n=x>=l?u:l>=x+v?v:l-x,!(n>m);l+=t)o=t-n,k>G(s/o)&&b("overflow"),k*=o;c=p.length+1,x=i(r-j,c,0==j),G(r/c)>s-w&&b("overflow"),w+=G(r/c),r%=c,p.splice(r++,0,w)}return f(p)}function k(a){var c,d,f,g,j,k,l,m,n,o,p,q,r,w,x,B=[];for(a=e(a),q=a.length,c=z,d=0,j=y,k=0;q>k;++k)p=a[k],128>p&&B.push(H(p));for(f=g=B.length,g&&B.push(A);q>f;){for(l=s,k=0;q>k;++k)p=a[k],p>=c&&l>p&&(l=p);for(r=f+1,l-c>G((s-d)/r)&&b("overflow"),d+=(l-c)*r,c=l,k=0;q>k;++k)if(p=a[k],c>p&&++d>s&&b("overflow"),p==c){for(m=d,n=t;o=j>=n?u:n>=j+v?v:n-j,!(o>m);n+=t)x=m-o,w=t-o,B.push(H(h(o+x%w,0))),m=G(x/w);B.push(H(h(m,0))),j=i(d,r,f==g),d=0,++f}++d,++c}return B.join("")}function l(a){return d(a,function(a){return B.test(a)?j(a.slice(4).toLowerCase()):a})}function m(a){return d(a,function(a){return C.test(a)?"xn--"+k(a):a})}var n="object"==typeof exports&&exports,o="object"==typeof module&&module&&module.exports==n&&module,p="object"==typeof global&&global;(p.global===p||p.window===p)&&(a=p);var q,r,s=2147483647,t=36,u=1,v=26,w=38,x=700,y=72,z=128,A="-",B=/^xn--/,C=/[^ -~]/,D=/\x2E|\u3002|\uFF0E|\uFF61/g,E={overflow:"Overflow: input needs wider integers to process","not-basic":"Illegal input >= 0x80 (not a basic code point)","invalid-input":"Invalid input"},F=t-u,G=Math.floor,H=String.fromCharCode;if(q={version:"1.2.4",ucs2:{decode:e,encode:f},decode:j,encode:k,toASCII:m,toUnicode:l},"function"==typeof define&&"object"==typeof define.amd&&define.amd)define("punycode",function(){return q});else if(n&&!n.nodeType)if(o)o.exports=q;else for(r in q)q.hasOwnProperty(r)&&(n[r]=q[r]);else a.punycode=q}(this);;


/* FILE: /media/system/js/validate.js */
var JFormValidator=function(){"use strict";var t,e,a,r=function(e,a,r){r=""===r?!0:r,t[e]={enabled:r,exec:a}},n=function(t,e){var a,r=jQuery(e);return t?(a=r.find("#"+t+"-lbl"),a.length?a:(a=r.find('label[for="'+t+'"]'),a.length?a:!1)):!1},i=function(t,e){var a=e.data("label");void 0===a&&(a=n(e.attr("id"),e.get(0).form),e.data("label",a)),t===!1?(e.addClass("invalid").attr("aria-invalid","true"),a&&a.addClass("invalid").attr("aria-invalid","true")):(e.removeClass("invalid").attr("aria-invalid","false"),a&&a.removeClass("invalid").attr("aria-invalid","false"))},l=function(e){var a,r,n=jQuery(e);if(n.attr("disabled"))return i(!0,n),!0;if(n.attr("required")||n.hasClass("required"))if(a=n.prop("tagName").toLowerCase(),"fieldset"===a&&(n.hasClass("radio")||n.hasClass("checkboxes"))){if(!n.find("input:checked").length)return i(!1,n),!1}else if(!n.val()||n.hasClass("placeholder")||"checkbox"===n.attr("type")&&!n.is(":checked"))return i(!1,n),!1;return r=n.attr("class")&&n.attr("class").match(/validate-([a-zA-Z0-9\_\-]+)/)?n.attr("class").match(/validate-([a-zA-Z0-9\_\-]+)/)[1]:"",""===r?(i(!0,n),!0):r&&"none"!==r&&t[r]&&n.val()&&t[r].exec(n.val(),n)!==!0?(i(!1,n),!1):(i(!0,n),!0)},u=function(t){var e,r,n,i,u,s,o=!0,d=[];for(e=jQuery(t).find("input, textarea, select, fieldset"),u=0,s=e.length;s>u;u++)l(e[u])===!1&&(o=!1,d.push(e[u]));if(jQuery.each(a,function(t,e){e.exec()!==!0&&(o=!1)}),!o&&d.length>0){for(r=Joomla.JText._("JLIB_FORM_FIELD_INVALID"),n={error:[]},u=d.length-1;u>=0;u--)i=jQuery(d[u]).data("label"),i&&n.error.push(r+i.text().replace("*",""));Joomla.renderMessages(n)}return o},s=function(t){var a,r=[],n=jQuery(t);a=n.find("input, textarea, select, fieldset, button");for(var i=0,s=a.length;s>i;i++){var o=jQuery(a[i]),d=o.prop("tagName").toLowerCase();"input"!==d&&"button"!==d||"submit"!==o.attr("type")&&"image"!==o.attr("type")?"button"===d||"input"===d&&"button"===o.attr("type")||(o.hasClass("required")&&o.attr("aria-required","true").attr("required","required"),"fieldset"!==d&&(o.on("blur",function(){return l(this)}),o.hasClass("validate-email")&&e&&(o.get(0).type="email")),r.push(o)):o.hasClass("validate")&&o.on("click",function(){return u(t)})}n.data("inputfields",r)},o=function(){t={},a=a||{},e=function(){var t=document.createElement("input");return t.setAttribute("type","email"),"text"!==t.type}(),r("username",function(t){var e=new RegExp("[<|>|\"|'|%|;|(|)|&]","i");return!e.test(t)}),r("password",function(t){var e=/^\S[\S ]{2,98}\S$/;return e.test(t)}),r("numeric",function(t){var e=/^(\d|-)?(\d|,)*\.?\d*$/;return e.test(t)}),r("email",function(t){t=punycode.toASCII(t);var e=/^[a-zA-Z0-9.!#$%&’*+\/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;return e.test(t)});for(var n=jQuery("form.form-validate"),i=0,l=n.length;l>i;i++)s(n[i])};return o(),{isValid:u,validate:l,setHandler:r,attachToForm:s,custom:a}};document.formvalidator=null,jQuery(function(){document.formvalidator=new JFormValidator});
;


/* FILE: /media/system/js/html5fallback.js */
!function(a,b,c){"function"!=typeof Object.create&&(Object.create=function(a){function b(){}return b.prototype=a,new b});var d={init:function(c,d){var e=this;e.elem=d,e.$elem=a(d),d.H5Form=e,e.options=a.extend({},a.fn.h5f.options,c),e.field=b.createElement("input"),e.checkSupport(e),"form"===d.nodeName.toLowerCase()&&e.bindWithForm(e.elem,e.$elem)},bindWithForm:function(a,b){var d=this,e=!!b.attr("novalidate"),f=a.elements,g=f.length;for("onSubmit"===d.options.formValidationEvent&&b.on("submit",function(a){var f=this.H5Form.donotValidate!=c?this.H5Form.donotValidate:!1;f||e||d.validateForm(d)?b.find(":input").each(function(){d.placeholder(d,this,"submit")}):(a.preventDefault(),this.donotValidate=!1)}),b.on("focusout focusin",function(a){d.placeholder(d,a.target,a.type)}),b.on("focusout change",d.validateField),b.find("fieldset").on("change",function(){d.validateField(this)}),d.browser.isFormnovalidateNative||b.find(":submit[formnovalidate]").on("click",function(){d.donotValidate=!0});g--;){var h=f[g];d.polyfill(h),d.autofocus(d,h)}},polyfill:function(a){if("form"===a.nodeName.toLowerCase())return!0;var b=a.form.H5Form;b.placeholder(b,a),b.numberType(b,a)},checkSupport:function(a){a.browser={},a.browser.isRequiredNative=!!("required"in a.field),a.browser.isPatternNative=!!("pattern"in a.field),a.browser.isPlaceholderNative=!!("placeholder"in a.field),a.browser.isAutofocusNative=!!("autofocus"in a.field),a.browser.isFormnovalidateNative=!!("formnovalidate"in a.field),a.field.setAttribute("type","email"),a.browser.isEmailNative="email"==a.field.type,a.field.setAttribute("type","url"),a.browser.isUrlNative="url"==a.field.type,a.field.setAttribute("type","number"),a.browser.isNumberNative="number"==a.field.type,a.field.setAttribute("type","range"),a.browser.isRangeNative="range"==a.field.type},validateForm:function(){var a=this,b=a.elem,c=b.elements,d=c.length,e=!0;b.isValid=!0;for(var f=0;d>f;f++){var g=c[f];g.isRequired=!!g.required,g.isDisabled=!!g.disabled,g.isDisabled||(e=a.validateField(g),b.isValid&&!e&&a.setFocusOn(g),b.isValid=e&&b.isValid)}return a.options.doRenderMessage&&a.renderErrorMessages(a,b),b.isValid},validateField:function(b){var d=b.target||b;if(d.form===c)return null;{var e=d.form.H5Form,f=a(d),g=!1,h=!!a(d).attr("required");!!f.attr("disabled")}if(d.isDisabled||(g=!e.browser.isRequiredNative&&h&&e.isValueMissing(e,d),isPatternMismatched=!e.browser.isPatternNative&&e.matchPattern(e,d)),d.validityState={valueMissing:g,patterMismatch:isPatternMismatched,valid:d.isDisabled||!(g||isPatternMismatched)},e.browser.isRequiredNative||(d.validityState.valueMissing?f.addClass(e.options.requiredClass):f.removeClass(e.options.requiredClass)),e.browser.isPatternNative||(d.validityState.patterMismatch?f.addClass(e.options.patternClass):f.removeClass(e.options.patternClass)),d.validityState.valid){f.removeClass(e.options.invalidClass);var i=e.findLabel(f);i.removeClass(e.options.invalidClass)}else{f.addClass(e.options.invalidClass);var i=e.findLabel(f);i.addClass(e.options.invalidClass)}return d.validityState.valid},isValueMissing:function(d,e){var f=a(e),g=/^submit$/i,h=f.val(),i=e.type!==c?e.type:e.tagName.toLowerCase(),j=/^(checkbox|radio|fieldset)$/i;if(j.test(i)||g.test(i)){if(j.test(i)){if("checkbox"===i)return!f.is(":checked");var k;k="fieldset"===i?f.find("input"):b.getElementsByName(e.name);for(var l=0;l<k.length;l++)if(a(k[l]).is(":checked"))return!1;return!0}}else{if(""===h)return!0;if(!d.browser.isPlaceholderNative&&f.hasClass(d.options.placeholderClass))return!0}return!1},matchPattern:function(b,d){var e=a(d),f=!b.browser.isPlaceholderNative&&e.attr("placeholder")&&e.hasClass(b.options.placeholderClass)?"":e.attr("value"),g=e.attr("pattern"),h=e.attr("type");if(""!==f)if("email"===h){var i=!0;if(e.attr("multiple")===c)return!b.options.emailPatt.test(f);f=f.split(b.options.mutipleDelimiter);for(var j=0;j<f.length;j++)if(i=b.options.emailPatt.test(f[j].replace(/[ ]*/g,"")),!i)return!0}else{if("url"===h)return!b.options.urlPatt.test(f);if("text"===h&&g!==c)return usrPatt=new RegExp("^(?:"+g+")$"),!usrPatt.test(f)}return!1},placeholder:function(b,d,e){var f=a(d),g={placeholder:f.attr("placeholder")},h=/^(focusin|submit)$/i,i=/^(input|textarea)$/i,j=/^password$/i,k=b.browser.isPlaceholderNative;k||!i.test(d.nodeName)||j.test(d.type)||g.placeholder===c||(""!==d.value||h.test(e)?d.value===g.placeholder&&h.test(e)&&(d.value="",f.removeClass(b.options.placeholderClass)):(d.value=g.placeholder,f.addClass(b.options.placeholderClass)))},numberType:function(b,c){var d=a(c);if(node=/^input$/i,type=d.attr("type"),node.test(c.nodeName)&&("number"==type&&!b.browser.isNumberNative||"range"==type&&!b.browser.isRangeNative)){var e,f=parseInt(d.attr("min")),g=parseInt(d.attr("max")),h=parseInt(d.attr("step")),i=parseInt(d.attr("value")),j=d.prop("attributes"),k=a("<select>");f=isNaN(f)?-100:f;for(var l=f;g>=l;l+=h)e=a("<option>").attr("value",l).text(l),(i==l||i>l&&l+h>i)&&e.attr("selected",""),k.append(e);a.each(j,function(){k.attr(this.name,this.value)}),d.replaceWith(k)}},autofocus:function(c,d){var e=a(d),f=!!e.attr("autofocus"),g=/^(input|textarea|select|fieldset)$/i,h=/^submit$/i,i=c.browser.isAutofocusNative;!i&&g.test(d.nodeName)&&!h.test(d.type)&&f&&a(b).ready(function(){c.setFocusOn(d)})},findLabel:function(b){var c=a('label[for="'+b.attr("id")+'"]');if(c.length<=0){var d=b.parent(),e=d.get(0).tagName.toLowerCase();"label"==e&&(c=d)}return c},setFocusOn:function(b){"fieldset"===b.tagName.toLowerCase()?a(b).find(":first").focus():a(b).focus()},renderErrorMessages:function(b,c){var d=c.elements,e=d.length,f={};for(f.errors=new Array;e--;){var g=a(d[e]),h=b.findLabel(g);g.hasClass(b.options.requiredClass)&&(f.errors[e]=h.text().replace("*","")+b.options.requiredMessage),g.hasClass(b.options.patternClass)&&(f.errors[e]=h.text().replace("*","")+b.options.patternMessage)}f.errors.length>0&&Joomla.renderMessages(f)}};a.fn.h5f=function(a){return this.each(function(){var b=Object.create(d);b.init(a,this)})},a.fn.h5f.options={invalidClass:"invalid",requiredClass:"required",requiredMessage:" is required.",placeholderClass:"placeholder",patternClass:"pattern",patternMessage:" doesn't match pattern.",doRenderMessage:!1,formValidationEvent:"onSubmit",emailPatt:/^[a-zA-Z0-9.!#$%&‚Äô*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/,urlPatt:/[a-z][\-\.+a-z]*:\/\//i},a(function(){a("form").h5f({doRenderMessage:!0,requiredClass:"musthavevalue"})})}(jQuery,document);;