require(["jquery"],function(n){window.rsd=window.rsd||{},window.rsd.rsdConfirm=function(o,e){function i(){t(o),c(),u(),s.click(r)}function t(o){n(".popup_other").show().siblings(".popup").hide(),n('.popup_other .content[name="'+o+'"]').css("display","inline-block"),n('.popup_other .content[name="'+o+'"]').css("margin-top",(n(window).height()-n('.popup_other .content[name="'+o+'"]').height())/2)}function p(){d.onOk(),r()}function c(){h.unbind("click").click(function(){p()}),n(window).bind("keydown",function(n){13==n.keyCode&&p()})}function r(){var e=n(this);n(".popup").hide(),e.parent().hide(),n('.popup_other .content[name="'+o+'"]').hide()}function u(){a.attr("href",d.url)}var d=n.extend(!0,{url:"/Home/Products/ConversionFeeDetail",title:0,onOk:n.noop,onCancel:n.noop},o,e),h=n(".btn_only_change"),s=n(".popup_other .close"),a=n(".btn_recharge");i()}});