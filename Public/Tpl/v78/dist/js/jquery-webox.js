$.extend({webox:function(e){var i,t,o,s=!1;return e?e.html||e.iframe?(e.parent="webox",e.locked="locked",$(document).ready(function(n){$(".webox").remove(),$(".background").remove();var a=e.width?e.width:400,r=e.height?e.height:240;$("body").append('<div class="background" style="display:none;"></div><div class="webox" style="width:'+a+"px;height:"+r+'px;display:none;"><div id="inside" style="height:'+r+'px;"><h1 id="locked" onselectstart="return false;">'+(e.title?e.title:"webox")+'<a class="span" href="javascript:void(0);"></a></h1>'+(e.iframe?'<iframe class="w_iframe" src="'+e.iframe+'" frameborder="0" width="100%" scrolling="yes" style="border:none;overflow-x:hidden;height:'+parseInt(r-30)+'px;"></iframe>':e.html?e.html:"")+"</div></div>"),(navigator.userAgent.indexOf("MSIE 7")>0||navigator.userAgent.indexOf("MSIE 8")>0)&&$(".webox").css({filter:"progid:DXImageTransform.Microsoft.gradient(startColorstr=#55000000,endColorstr=#55000000)"}),e.bgvisibel&&$(".background").fadeTo("slow",.3),$(".webox").css({display:"block"}),$("#"+e.locked+" .span").click(function(){$(".webox").css({display:"none"}),$(".background").css({display:"none"})});var d=parseInt(a/2),h=parseInt(r/2),w=parseInt($(window).width()/2),c=parseInt($(window).height()/2.2),l=w-d,p=c-h;$(".webox").css({left:l,top:p}),$("#"+e.locked).mousedown(function(e){e.which&&(o=!0,i=e.pageX-parseInt($(".webox").css("left")),t=e.pageY-parseInt($(".webox").css("top")))}).dblclick(function(){if(s)$(".webox").css({height:r,width:a}),$("#inside").height(r),$(".w_iframe").height(r-30),$(".webox").css({left:l,top:p}),s=!1;else{s=!0;var e=$(window).height(),i=$(window).width();$(".webox").css({width:i-18,height:e-18,top:"0px",left:"0px"}),$("#inside").height(e-20),$(".w_iframe").height(e-50)}})}).mousemove(function(e){if(o&&!s){var n=e.pageX-i,a=e.pageY-t;$(".webox").css({left:n}),$(".webox").css({top:a})}}).mouseup(function(){o=!1}),void $(window).resize(function(){if(s){var e=$(window).height(),i=$(window).width();$(".webox").css({width:i-18,height:e-18,top:"0px",left:"0px"}),$("#inside").height(e-20),$(".w_iframe").height(e-50)}})):void alert("html attribute and iframe attribute can't be both empty"):void alert("options can't be empty")}});