if(!window.jQuery)throw"jQuery must be referenced before using jqalert";window.jqalerter||(window.jqalerter={alert:function(t,e,n,o){if(n){var i=window.jqalerter.getDefaultOptions();n=window.jqalerter.overrideOptions(n,i),window.jqalerter.getDefaultOptions()}else n=window.jqalerter.getDefaultOptions();o?($(o).attr("class")&&$(o).attr("class").indexOf("jqalert-container")>-1||(o=$(o).find(".jqalert-container")[0]),n.customWindow=!0):(o=jqalerter.getBaseWindowElement(n),document.body.insertBefore(o,document.body.firstChild),n.customWindow=!1),e?$(o).find(".jqalert-title").html(e):$(o).find(".jqalert-title").css("display","none"),$(o).find(".jqalert-message").html(t),n.backgroundColor&&$(o).css("background-color",n.backgroundColor),n.color&&$(o).css("color",n.color),window.jqalerter.addWindowOptions(o,n),n.newWindow?window.jqalerter.showWindow(o,n):window.jqalerter.showVirtualWindow(o,n)},getDefaultOptions:function(t){switch(t||(t=jqalerter.getDefaultStyleName()),t){case"windowsSlate":window.jqalerter.defaultOptions={fadeInRate:!1,fadeOutRate:!1,blockOpacity:.5,blockColor:"#fff",backgroundColor:"Gray",color:"Black",windowOpacity:1,modal:!0,icon:null,minWidth:200,maxWidth:$(document).width(),minHeight:15,maxHeight:$(document).width(),dynamicCss:!0,draggable:!0,windowCss:window.jqalerter.getDefaultWindowCss(t),titleCss:window.jqalerter.getDefaultTitleCss(t),bodyCss:window.jqalerter.getDefaultBodyCss(t),buttonsCss:window.jqalerter.getDefaultButtonsCss(t),iconCss:window.jqalerter.getDefaultIconCss(t),showEffect:function(t,e){$(t).css("opacity","0"),$(t).css("top",parseInt($(t).css("top"))-5),$(t).animate({top:parseInt($(t).css("top"))+5,opacity:1},200,null,e)},hideEffect:function(t,e){$(t).css("opacity","1"),$(t).animate({top:parseInt($(t).css("top"))-5,opacity:0},200,null,e)},setOption:function(t,e){return this[t]=e,this},styleName:jqalerter.getDefaultStyleName()}}return window.jqalerter.defaultOptions},showVirtualWindow:function(t,e){if(t.parentNode&&"none"==$(t.parentNode).css("display")&&$(t.parentNode).css("display",""),$(t).attr("class")&&$(t).attr("class").indexOf("jqalert-container")>-1&&$(t).css("display",""),$(t).find(".jqalert-container").css("display",""),$(t).find(".jqalert").css("display",""),$(t).css("position","fixed"),e||(e=window.jqalerter.getDefaultOptions()),e.dynamicCss){e.windowCss||null!=e.windowCss||(e.windowCss=window.jqalerter.getDefaultWindowCss(e.styleName)),e.titleCss||null!=e.titleCss||(e.titleCss=window.jqalerter.getDefaultTitleCss(e.styleName)),e.bodyCss||null!=e.bodyCss||(e.bodyCss=window.jqalerter.getDefaultBodyCss(e.styleName)),e.buttonsCss||null!=e.buttonsCss||(e.buttonsCss=window.jqalerter.getDefaultButtonsCss(e.styleName)),e.icon&&!e.iconCss&&null==e.iconCss&&(e.iconCss=window.jqalerter.getDefaultIconCss(e.styleName)),e.windowCss&&$(t).css(e.windowCss);var n=$(t).find(".jqalert-title");e.titleCss&&(n.length>0?n.css(e.titleCss):n.css("display","none")),e.bodyCss&&$(t).find(".jqalert-message").css(e.bodyCss),e.buttonsCss&&$(t).find(".jqalert-buttons").css(e.buttonsCss)}var o=$(t).find(".jqalert-icon");e.icon?(e.dynamicCss&&e.iconCss&&o.css(e.iconCss),o.css("background-image","url('"+e.icon+"')")):o.css("display","none"),e.modal&&($(t).css("z-index")||$(t).css("z-index",(90+window.jqalerter.getWindowOptions().length).toString()),window.jqalerter.blockUI(e));var i=$(t).width(),s=$(t).height();e.minWidth||(e.minWidth=300),e.minHeight||(e.minHeight=15),e.maxWidth||(e.maxWidth=$(document).width()),e.maxHeight||(e.maxHeight=$(document).height()),i<e.minWidth&&($(t).css("width",e.minWidth),i=parseInt($(t).css("width"))),i>e.maxWidth&&($(t).css("width",e.maxWidth),i=parseInt($(t).css("width"))),s<e.minHeight&&($(t).css("height",e.minHeight),s=parseInt($(t).css("height"))),s>e.maxHeight&&($(t).css("height",e.maxHeight),s=parseInt($(t).css("height")));var a=$(window).width(),l=$(window).height();$(t).css("top",l/2-s/2).css("left",a/2-i/2),e.fadeInRate||null!=e.fadeInRate||(e.fadeInRate=200),e.draggable&&$.fn.jqDrag&&$(t).jqDrag(".jqalert-title");var r=function(){var e=$(t).find(".jqalert-buttons button");e.length>0?e=e[0]:(e=$(t).find(".jqalert-buttons input"),e.length>0&&(e=e[0])),e.focus()},d=null;e.showEffect||(d=r),e.fadeInRate?($(t).css("display","none"),$(t).fadeIn(e.fadeInRate,d)):d&&d(),e.showEffect?e.showEffect(t,r):d||r()},getEmptyOptions:function(){return{fadeInRate:!1,fadeOutRate:!1,blockOpacity:.5,blockColor:"Black",backgroundColor:null,color:null,windowOpacity:null,modal:null,icon:null,minWidth:null,maxWidth:null,minHeight:null,maxHeight:null,dynamicCss:!1,windowCss:!1,titleCss:!1,bodyCss:!1,buttonsCss:!1,iconCss:!1,showEffect:null,hideEffect:null,draggable:null,setOption:function(t,e){return this[t]=e,this},styleName:jqalerter.getDefaultStyleName()}},defaultOptions:!1,getBaseWindowElement:function(t){var e='<div class="jqalert-container" ><div class="jqalert"> <div class="jqalert-title"> </div> <div class="jqalert-icon"> </div> <div class="jqalert-message"> </div> <div class="jqalert-buttons">  <button onclick="window.jqalerter.closeVirtualWindow(this.parentNode.parentNode.parentNode);"';return t.modal&&(e+=' onblur="this.focus();"'),e+=">OK</button> </div></div></div>",$(e)[0]},addWindowOptions:function(t,e){if(!window.jqalerter.windowOptions){var n=new Array;window.jqalerter.windowOptions=n}window.jqalerter.windowOptions.push({windowElement:t,options:e})},getWindowOptions:function(t){if(!t)return window.jqalerter.windowOptions||(window.jqalerter.windowOptions=new Array),window.jqalerter.windowOptions;if(window.jqalerter.windowOptions){var e;new Array;for(e=0;e<window.jqalerter.windowOptions.length;e++)if(window.jqalerter.windowOptions[e].windowElement==t)return window.jqalerter.windowOptions[e].options}return null},removeWindowOptions:function(t,e){if(window.jqalerter.windowOptions){var n,o,i=new Array;for(n=0;n<i.length&&i[n].windowElement!=t;n++);var i=new Array;for(o=0;o<n;o++)i.push(window.jqalerter.windowOptions[o]);for(o=n+1;o<window.jqalerter.windowOptions.length;o++)i.push(window.jqalerter.windowOptions[o]);window.jqalerter.windowOptions=i}},showWindow:function(t,e){alert("todo: showWindow  (not implemented)")},getDefaultStyleName:function(){return"windowsSlate"},getDefaultWindowCss:function(t){t||(t=jqalerter.getDefaultStyleName());var e={};switch(t){case"windowsSlate":default:e={"background-color":"#e0e0e0",border:"outset 1px",padding:"1px","z-index":(91+window.jqalerter.getWindowOptions().length).toString()}}return e},getDefaultTitleCss:function(t){t||(t=jqalerter.getDefaultStyleName());var e={};switch(t){case"windowsSlate":default:e={"background-color":"Navy",border:"inset 1px",color:"White","font-weight":"bold",padding:"2px 3px 3px 3px;",cursor:"default"}}return e},getDefaultBodyCss:function(t){t||(t=jqalerter.getDefaultStyleName());var e={};switch(t){case"windowsSlate":default:e={margin:"5px 3px 2px 3px",padding:"2px","min-height":"50px"}}return e},getDefaultButtonsCss:function(t){t||(t=jqalerter.getDefaultStyleName());var e={};switch(t){case"windowsSlate":default:e={"text-align":"center",margin:"5px 0px 5px 0px"}}return e},getDefaultIconCss:function(t){t||(t=jqalerter.getDefaultStyleName());var e={};switch(t){case"windowsSlate":default:e={"float":"left",width:"50px",height:"50px",margin:"5px","vertical-align":"middle","text-align":"center","background-repeat":"no-repeat","background-position":"center"}}return e},closeVirtualWindow:function(t){var e=window.jqalerter.getWindowOptions(t),n=0;e&&e.fadeOutRate&&(n=e.fadeOutRate);var o=function(){n>0?$(t).fadeOut(n,function(){window.jqalerter.removeWindowOptions(t),e&&!e.customWindow?t.parentNode.removeChild(t):$(t).css("display","none")}):(e&&!e.customWindow?t.parentNode.removeChild(t):$(t).css("display","none"),window.jqalerter.removeWindowOptions(t))};e&&e.hideEffect?e.hideEffect(t,o):o(),e&&e.modal&&window.jqalerter.unblockUI(e,t)},blockUI:function(t){t||(t=new Object),null==t.fadeInRate&&(t.fadeInRate=200),null==t.fadeOutRate&&(t.fadeOutRate=200),null==t.blockOpacity&&(t.blockOpacity=.5),null==t.blockColor&&(t.blockColor="Black");var e=$('<div class="jqalerter-blocker"></div>')[0];$(e).css("position","fixed").css("width",$(document).width()).css("height",$(document).height()).css("top",0).css("left",0).css("z-index","90").css("overflow","hidden").css("background-color",t.blockColor).css("display","none"),document.body.insertBefore(e,document.body.firstChild),t.fadeInRate<10?$(e).css("filter","alpha(opacity="+100*t.blockOpacity+")").css("opacity",t.blockOpacity).css("display",""):$(e).css("filter","alpha(opacity=1)").css("opacity",".01").css("display","").fadeTo(t.fadeInRate,t.blockOpacity),window.jqalerter.blockUIEvents(document.body)},blockUIEvents:function(t){var e=document.createElement("textarea");$(e).css("filter","alpha(opacity=0)").css("opacity","0").css("position","fixed").css("top","0").css("left","0"),document.body.appendChild(e),e.focus(),$(e).css("display","none"),document.body.removeChild(e)},unblockUI:function(t,e){var n=$(".jqalerter-blocker");if(n&&n.length>0){var o=n[0];t||(t=e?window.jqalerter.getWindowOptions(e):new Object),null==t.fadeOutRate&&(t.fadeOutRate=200),t.fadeOutRate?n.fadeOut(t.fadeOutRate,function(){o.parentNode.removeChild(o)}):(n.css("display","none"),o.parentNode.removeChild(o))}},overrideOptions:function(t,e){for(var n in t)e[n]=t[n];return e}}),window.jqalert||(window.jqalert=window.jqalerter.alert);