!function(e){function o(o,i){var r=o==window,b=i&&void 0!==i.message?i.message:void 0;i=e.extend({},e.blockUI.defaults,i||{}),i.overlayCSS=e.extend({},e.blockUI.defaults.overlayCSS,i.overlayCSS||{});var h=e.extend({},e.blockUI.defaults.css,i.css||{}),m=e.extend({},e.blockUI.defaults.themedCSS,i.themedCSS||{});if(b=void 0===b?i.message:b,r&&f&&t(window,{fadeOut:0}),b&&"string"!=typeof b&&(b.parentNode||b.jquery)){var y=b.jquery?b[0]:b,v={};e(o).data("blockUI.history",v),v.el=y,v.parent=y.parentNode,v.display=y.style.display,v.position=y.style.position,v.parent&&v.parent.removeChild(y)}var g,k,w=i.baseZ,I=e(e.browser.msie||i.forceIframe?'<iframe class="blockUI" style="z-index:'+w++ +';display:none;border:none;margin:0;padding:0;position:absolute;width:100%;height:100%;top:0;left:0" src="'+i.iframeSrc+'"></iframe>':'<div class="blockUI" style="display:none"></div>'),x=e(i.theme?'<div class="blockUI blockOverlay ui-widget-overlay" style="z-index:'+w++ +';display:none"></div>':'<div class="blockUI blockOverlay" style="z-index:'+w++ +';display:none;border:none;margin:0;padding:0;width:100%;height:100%;top:0;left:0"></div>');k=i.theme&&r?'<div class="blockUI '+i.blockMsgClass+' blockPage ui-dialog ui-widget ui-corner-all" style="z-index:'+w+';display:none;position:fixed"><div class="ui-widget-header ui-dialog-titlebar ui-corner-all blockTitle">'+(i.title||"&nbsp;")+'</div><div class="ui-widget-content ui-dialog-content"></div></div>':i.theme?'<div class="blockUI '+i.blockMsgClass+' blockElement ui-dialog ui-widget ui-corner-all" style="z-index:'+w+';display:none;position:absolute"><div class="ui-widget-header ui-dialog-titlebar ui-corner-all blockTitle">'+(i.title||"&nbsp;")+'</div><div class="ui-widget-content ui-dialog-content"></div></div>':r?'<div class="blockUI '+i.blockMsgClass+' blockPage" style="z-index:'+w+';display:none;position:fixed"></div>':'<div class="blockUI '+i.blockMsgClass+' blockElement" style="z-index:'+w+';display:none;position:absolute"></div>',g=e(k),b&&(i.theme?(g.css(m),g.addClass("ui-widget-content")):g.css(h)),i.theme||i.applyPlatformOpacityRules&&e.browser.mozilla&&/Linux/.test(navigator.platform)||x.css(i.overlayCSS),x.css("position",r?"fixed":"absolute"),(e.browser.msie||i.forceIframe)&&I.css("opacity",0);var U=[I,x,g],S=e(r?"body":o);e.each(U,function(){this.appendTo(S)}),i.theme&&i.draggable&&e.fn.draggable&&g.draggable({handle:".ui-dialog-titlebar",cancel:"li"});var C=c&&(!e.boxModel||e("object,embed",r?null:o).length>0);if(u||C){if(r&&i.allowBodyStretch&&e.boxModel&&e("html,body").css("height","100%"),(u||!e.boxModel)&&!r)var O=a(o,"borderTopWidth"),E=a(o,"borderLeftWidth"),T=O?"(0 - "+O+")":0,M=E?"(0 - "+E+")":0;e.each([I,x,g],function(e,o){var t=o[0].style;if(t.position="absolute",e<2)r?t.setExpression("height","Math.max(document.body.scrollHeight, document.body.offsetHeight) - (jQuery.boxModel?0:"+i.quirksmodeOffsetHack+') + "px"'):t.setExpression("height",'this.parentNode.offsetHeight + "px"'),r?t.setExpression("width",'jQuery.boxModel && document.documentElement.clientWidth || document.body.clientWidth + "px"'):t.setExpression("width",'this.parentNode.offsetWidth + "px"'),M&&t.setExpression("left",M),T&&t.setExpression("top",T);else if(i.centerY)r&&t.setExpression("top",'(document.documentElement.clientHeight || document.body.clientHeight) / 2 - (this.offsetHeight / 2) + (blah = document.documentElement.scrollTop ? document.documentElement.scrollTop : document.body.scrollTop) + "px"'),t.marginTop=0;else if(!i.centerY&&r){var n=i.css&&i.css.top?parseInt(i.css.top):0,l="((document.documentElement.scrollTop ? document.documentElement.scrollTop : document.body.scrollTop) + "+n+') + "px"';t.setExpression("top",l)}})}if(b&&(i.theme?g.find(".ui-widget-content").append(b):g.append(b),(b.jquery||b.nodeType)&&e(b).show()),(e.browser.msie||i.forceIframe)&&i.showOverlay&&I.show(),i.fadeIn){var j=i.onBlock?i.onBlock:d,z=i.showOverlay&&!b?j:d,H=b?j:d;i.showOverlay&&x._fadeIn(i.fadeIn,z),b&&g._fadeIn(i.fadeIn,H)}else i.showOverlay&&x.show(),b&&g.show(),i.onBlock&&i.onBlock();if(n(1,o,i),r?(f=g[0],p=e(":input:enabled:visible",f),i.focusInput&&setTimeout(l,20)):s(g[0],i.centerX,i.centerY),i.timeout){var q=setTimeout(function(){r?e.unblockUI(i):e(o).unblock(i)},i.timeout);e(o).data("blockUI.timeout",q)}}function t(o,t){var l=o==window,s=e(o),a=s.data("blockUI.history"),d=s.data("blockUI.timeout");d&&(clearTimeout(d),s.removeData("blockUI.timeout")),t=e.extend({},e.blockUI.defaults,t||{}),n(0,o,t);var r;r=l?e("body").children().filter(".blockUI").add("body > .blockUI"):e(".blockUI",o),l&&(f=p=null),t.fadeOut?(r.fadeOut(t.fadeOut),setTimeout(function(){i(r,a,t,o)},t.fadeOut)):i(r,a,t,o)}function i(o,t,i,n){o.each(function(e,o){this.parentNode&&this.parentNode.removeChild(this)}),t&&t.el&&(t.el.style.display=t.display,t.el.style.position=t.position,t.parent&&t.parent.appendChild(t.el),e(n).removeData("blockUI.history")),"function"==typeof i.onUnblock&&i.onUnblock(n,i)}function n(o,t,i){var n=t==window,l=e(t);(o||(!n||f)&&(n||l.data("blockUI.isBlocked")))&&(n||l.data("blockUI.isBlocked",o),!i.bindEvents||o&&!i.showOverlay)}function l(e){if(p){var o=p[e===!0?p.length-1:0];o&&o.focus()}}function s(e,o,t){var i=e.parentNode,n=e.style,l=(i.offsetWidth-e.offsetWidth)/2-a(i,"borderLeftWidth"),s=(i.offsetHeight-e.offsetHeight)/2-a(i,"borderTopWidth");o&&(n.left=l>0?l+"px":"0"),t&&(n.top=s>0?s+"px":"0")}function a(o,t){return parseInt(e.css(o,t))||0}if(/1\.(0|1|2)\.(0|1|2)/.test(e.fn.jquery)||/^1.1/.test(e.fn.jquery))return void alert("blockUI requires jQuery v1.2.3 or later!  You are using v"+e.fn.jquery);e.fn._fadeIn=e.fn.fadeIn;var d=function(){},r=document.documentMode||0,c=e.browser.msie&&(e.browser.version<8&&!r||r<8),u=e.browser.msie&&/MSIE 6.0/.test(navigator.userAgent)&&!r;e.blockUI=function(e){o(window,e)},e.unblockUI=function(e){t(window,e)},e.growlUI=function(o,t,i,n){var l=e('<div class="growlUI"></div>');o&&l.append("<h1>"+o+"</h1>"),t&&l.append("<h2>"+t+"</h2>"),void 0==i&&(i=3e3),e.blockUI({message:l,fadeIn:700,fadeOut:1e3,centerY:!1,timeout:i,showOverlay:!1,onUnblock:n,css:e.blockUI.defaults.growlCSS})},e.fn.block=function(t){return this.unblock({fadeOut:0}).each(function(){"static"==e.css(this,"position")&&(this.style.position="relative"),e.browser.msie&&(this.style.zoom=1),o(this,t)})},e.fn.unblock=function(e){return this.each(function(){t(this,e)})},e.blockUI.version=2.38,e.blockUI.defaults={title:null,draggable:!0,theme:!1,css:{padding:0,margin:0,width:"30%",top:"40%",left:"35%",textAlign:"center",color:"#000",border:"3px solid #aaa",backgroundColor:"#fff",cursor:"wait"},themedCSS:{width:"30%",top:"40%",left:"35%"},overlayCSS:{backgroundColor:"#000",opacity:.6,cursor:"wait"},growlCSS:{width:"350px",top:"10px",left:"",right:"10px",border:"none",padding:"5px",opacity:.6,cursor:"default",color:"#fff",backgroundColor:"#000","-webkit-border-radius":"10px","-moz-border-radius":"10px","border-radius":"10px"},iframeSrc:/^https/i.test(window.location.href||"")?"javascript:false":"about:blank",forceIframe:!1,baseZ:100,centerX:!0,centerY:!0,allowBodyStretch:!0,bindEvents:!0,constrainTabKey:!0,fadeIn:200,fadeOut:400,timeout:0,showOverlay:!0,focusInput:!0,applyPlatformOpacityRules:!0,onBlock:null,onUnblock:null,quirksmodeOffsetHack:4,blockMsgClass:"blockMsg"};var f=null,p=[]}(jQuery);