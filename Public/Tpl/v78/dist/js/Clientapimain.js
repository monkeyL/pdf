function checkNotEmpty(t){return t+="",null!==t&&void 0!==t&&"null"!=t&&"undefined"!=t&&""!=t}function sendOrderGethref(t,e,i,n){1==checkNotEmpty(e)&&1==checkNotEmpty(i)&&1==checkNotEmpty(n)&&($("#pdt_id").val(e),$("#details").val(i),$("#pdt_sn").val(n));var e=$("#pdt_id").val(),i=parseInt($("#details").val()),a=parseInt($("#pdt_stock").val()),n=$("#pdt_sn").val(),o=$("#pdt_sale_price").val(),s=$("#token").val(),r=$("#union").val(),c=$("#client").val();if(isNaN(i))return void $.ThinkBox.error("异常错误");if(""==n)return void $.ThinkBox.error("SKU编码不能为空");if(isNaN(o))return void $.ThinkBox.error("价格不能为空");if(""==e)return void $.ThinkBox.error("异常错误:pdt为空");if(a<1)return void $.ThinkBox.error("数量不能小于一");var l="?pdt_id="+e+"&details="+i+"&pdt_stock="+a+"&pdt_sn="+n+"&pdt_sale_price="+o+"&pc_abbreviation="+t+"&token="+s+"&union="+r+"&client="+c;"WEIXIN"==t?window.location.href="/Ucenter/Financial/doAddDepositOnline"+l+"&clien=clien":window.location.href="/Ucenter/Financial/ClientapiALIPAYPayOnline"+l}function OrderPayClient(t){var e=$("#PaymentSerialCount").val();if(1==$("#details").val())if(e>3)SendConversionConfirm(),$("#ContinueNumber").attr("onclick",'sendOrderGethref("'+t+'")'),$("#TryMonthly").attr("onclick",'sendOrderGethref("'+t+'","2","2","pdf_002")'),MonthlyRecommendation();else{if(1==e)return!1;sendOrderGethref(t)}else sendOrderGethref(t),MonthlyRecommendation2()}function ajaxLoadLoginpingMember(){$.post("/Home/Index/showMemberInfo",{},function(t){$(".main_main").children("div").remove(),$(".main_main").html(t)},"html")}function accMul(t,e){var i=0,n=t.toString(),a=e.toString();try{i+=n.split(".")[1].length}catch(o){}try{i+=a.split(".")[1].length}catch(o){}return Number(n.replace(".",""))*Number(a.replace(".",""))/Math.pow(10,i)}function RunOnBeforeUnload(){onloadQuery(),window.onbeforeunload=function(){closeStr="当前操作将丢失上传和转换的文档，确认执行该操作？";var t=$(".list > li").length;if(t>0)return closeStr}}function onloadQueryOrderPAy(){$.ajax({url:"/Ucenter/Orders/getOrderPyOid/?order_no="+$("#order_no").val()+"&t="+Math.round(1e6*Math.random()),type:"GET",dataType:"json",success:function(t){if(1==t.status){$("#weixin_ifram").remove(),$(".popup_weixin").hide(),clearTimeout(onloadQueryOrderPAy);var e={title:"确定",btn:parseInt("0011",2),onOk:function(){window.location.href=t.url[0]}};window.wxc.xcConfirm(t.info,window.wxc.xcConfirm.typeEnum.success,e)}else $(".popup_weixin").is(":hidden")?clearTimeout(onloadQueryOrderPAy):setTimeout(function(){onloadQueryOrderPAy()},3e3)}})}function onloadQueryApplayOrderPAy(){$.ajax({url:"/Ucenter/Orders/getApplayOid/?order_no="+$("#o_id").val()+"&t="+Math.round(1e6*Math.random()),type:"GET",dataType:"json",success:function(t){1==t.action?($("#pay_Waiting").hide(),$("#play_success").show(),$("#play_success").css("display","inline-block").siblings().hide(),$("#pay_sccess_price").html(t.order.o_all_price),$("#total_number").html(t.order.number_remaining),$("#total_time").html(t.order.end_time),clearTimeout(onloadQueryApplayOrderPAy)):$("#pay_Waiting").is(":hidden")?clearTimeout(onloadQueryApplayOrderPAy):setTimeout(function(){onloadQueryApplayOrderPAy()},3e3)}})}function fileAjax(t,e){$.ajax({type:"post",url:"/Home/Index/"+e,data:{fileInfo:JSON.stringify(t)},dataType:"json",success:function(t){}})}function fileAjaxAsynchronous(t,e){$.ajax({type:"post",url:"/Home/Index/"+e,data:{fileInfo:JSON.stringify(t)},dataType:"html",success:function(t){}})}function getTypeUpload(t){if(t){switch(t=t.toLowerCase()){case".doc":$type="Word";break;case".docx":$type="Word";break;case".xls":$type="Excel";break;case".xlsx":$type="Excel";break;case".ppt":$type="PPT";break;case".pptx":$type="PPT";break;case".pdf":$type="PDF";break;default:$type=0}return $type}}function getType(t){if(t){switch(t=t.toLowerCase()){case"doc":case"docx":$type="Word";break;case"xls":case"xlsx":$type="Excel";break;case"ppt":case"pptx":$type="PPT";break;case"pdf":$type="PDF";break;default:$type=0}return $type}}function getCookie(t){return document.cookie.length>0&&(c_start=document.cookie.indexOf(t+"="),c_start!=-1)?(c_start=c_start+t.length+1,c_end=document.cookie.indexOf(";",c_start),c_end==-1&&(c_end=document.cookie.length),unescape(document.cookie.substring(c_start,c_end))):""}function setCookie(t,e,i){var n=new Date;n.setDate(n.getDate()+i),document.cookie=t+"="+escape(e)}function accMul(t,e){var i=0,n=t.toString(),a=e.toString();try{i+=n.split(".")[1].length}catch(o){}try{i+=a.split(".")[1].length}catch(o){}return Number(n.replace(".",""))*Number(a.replace(".",""))/Math.pow(10,i)}function accSub(t,e){return accAdd(t,-e)}function SendConversionConfirm(){$(".popup_exceed").show().siblings(".popup").hide(),$(".popup_exceed .content").css("display","inline-block"),$(".popup_exceed .content").css("margin-top",($(window).height()-$(".popup_exceed .content").height()-40)/2)}function accAdd(t,e){var i,n,a;try{i=t.toString().split(".")[1].length}catch(o){i=0}try{n=e.toString().split(".")[1].length}catch(o){n=0}return a=Math.pow(10,Math.max(i,n)),(t*a+e*a)/a}function MonthlyRecommendation(){var t=parseInt($("#pdt_id_number").val());if(1==t){$(".original").show();var e=$('.item[name="tc_default"]').data("now"),i=$('.item[name="tc_default"]').data("first");$("#pay .save_money").html("省"+(i-e)+"元"),$("#pay .pay_money").html(e+"元"),$(".last_pay .pay_money").html(e),$("#pay .first_price").html("原价"+i+"元")}}function MonthlyRecommendation2(){var t=parseInt($("#pdt_id_number").val());if(1==t){$(".original").hide();var e=$("#time").data("now");$("#pay .save_money").html(""),$("#pay .pay_money").html(""),$("#pay .first_price").html(""),$(".last_pay .pay_money").html(e)}}$(function(){function t(t){""==$("#ACTIVITY_OPEN").val()?($(".actTxt").show(),"2"==$("#pdt_id").val()?$(".discount").html('<div class="left">限时优惠:</div><div class="right">老用户<strong>'+t+"</strong>折！另送5次转换</div>"):"5"==$("#pdt_id").val()?$(".discount").html('<div class="left">限时优惠:</div><div class="right">老用户<strong>'+t+"</strong>折！另送3个月</div>"):"6"==$("#pdt_id").val()?$(".discount").html('<div class="left">限时优惠:</div><div class="right">老用户<strong>'+t+"</strong>折！另送6个月</div>"):"3"!=$("#pdt_id").val()&&"4"!=$("#pdt_id").val()||$(".discount").html('<div class="left">限时优惠:</div><div class="right">老用户<strong>'+t+"</strong>折！</div>")):($(".discount").html('<div class="left">限时优惠:</div><div class="right">老用户<strong>'+t+"</strong>折！</div>"),$(".actTxt").hide())}function e(){""==$("#ACTIVITY_OPEN").val()?($(".actTxt").show(),"2"==$("#pdt_id").val()?$(".discount").html('<div class="left">限时优惠:</div><div class="right">另送5次转换</div>'):"5"==$("#pdt_id").val()?$(".discount").html('<div class="left">限时优惠:</div><div class="right">另送3个月</div>'):"6"==$("#pdt_id").val()?$(".discount").html('<div class="left">限时优惠:</div><div class="right">另送6个月</div>'):"3"!=$("#pdt_id").val()&&"4"!=$("#pdt_id").val()||$(".discount").html("")):($(".discount").html(""),$(".actTxt").hide())}function i(i,n){$(".original").show();var a=$("#end_time").val(),o=$("#end_time_count_out").val();$("#pay .save_money").html("省"+(n-i)+"元"),$("#pay .pay_money").html(i+"元"),$("#pay .first_price").html("原价"+n+"元"),a<=7&&0!=a?(t(9),$(".last_pay .pay_money").html(accMul(i,.9))):o<=30&&0!=o?(t(9.5),$(".last_pay .pay_money").html(accMul(i,.95))):(0==a&&0==o||o>30||a>7)&&(e(),$(".last_pay .pay_money").html(i))}function n(t){$(".discount").html(""),$("#pay .save_money").html(""),$("#pay .first_price").html(""),$(".original").hide();var e=parseInt($("#times").data("now"));if(parseInt(t)>0)if($(".last_pay .pay_money").html(e*t),t%5==0){var i=parseInt(t)+parseInt(t/5);$(".give_promet span").html(i)}else{var i=parseInt(t)+Math.floor(t/5);$(".give_promet span").html(i)}}window.hostUrl=window.location.origin,$(".package .item").not(".num_input").click(function(){$("#pdt_id").val($(this).data("pdt_id")),$("#pdt_sn").val($(this).data("pdt_sn")),$("#pdt_sale_price").val($(this).data("now")),$("#details").val($(this).data("details")),$(this).addClass("current").siblings(".item").removeClass("current"),$(this).parents(".section").siblings(".section").find(".item").removeClass("current");var t=$(this).data("now"),e=$(this).data("first");i(t,e)});var a=$('.item[name="tc_default"]').data("now"),o=$('.item[name="tc_default"]').data("first");i(a,o);var s=$(".section_one .amount").val();$(".add_numberof").click(function(){s++,s>1e3&&(s=1e3),$("#pdt_id").val(1),$(".section_one .amount").val(s),n(s)}),$(".reduce_numberof").click(function(){s>1&&(s--,n(s),$(".section_one .amount").val(s),$("#pdt_stock").val(s),$("#pdt_id").val(1))}),$(".upor_down").click(function(){$(this).parent().siblings(".item").addClass("current").parents(".section").siblings().find(".item").removeClass("current"),$("#pdt_stock").val(s),$("#details").val($(this).parent().siblings(".item").data("details")),n(s)}),$("#times").click(function(){s=$(".section_one .amount").val(),$("#pdt_stock").val(s),$("#details").val($(this).data("details")),$("#pdt_id").val($(this).data("pdt_id")),$(this).addClass("current").parents(".section").siblings().find(".item").removeClass("current"),n(s)}),$(".section_one .amount").keyup(function(){var t=$(this).val();$(this).val(t.replace(/\D|^0/g,"")),""==$(this).val()&&$(this).val()}).bind("paste",function(){var t=parseInt($(this).val());$(this).val(t.replace(/\D|^0/g,"")),""==$(this).val()&&$(this).val()}).css("ime-mode","disabled"),$(".section_one .amount").keyup(function(){s=$(".section_one .amount").val(),s>1e3&&(s=parseInt(1e3)),$(".section_one .amount").val(s),$("#pdt_stock").val(s),$("#pdt_id").val(1),$(this).parent().siblings(".item").addClass("current").parents(".section").siblings().find(".item").removeClass("current"),$("#details").val($(this).parent().siblings(".item").data("details")),n(s),""!=s&&0!=s||($(".section_one .amount").val(1),n(1))}),$(".pay_zfb").click(function(){var t="/Ucenter/Financial/doALIPAY?code=ALIPAY&o_id="+$("#o_id").val()+"&details="+parseInt($("#details").val());window.open(t),$("#be_paid").hide(),$("#pay_Waiting").css("display","inline-block").siblings().hide(),onloadQueryApplayOrderPAy()}),$("#ALIPAY_PAY").click(function(){$("#pdt_id").val(),parseInt($("#details").val()),parseInt($("#pdt_stock").val()),$("#pdt_sn").val(),$("#pdt_sale_price").val();$("#pc_abbreviation").val("ALIPAY"),$("#submitSkipFrom").submit()}),$("#login_weixin").click(function(){var t="/Home/Index/weixinlogin";return $.ajax({url:t,dataType:"html",data:{redirect:$("#redirect").val()},type:"post",async:!1,success:function(t){$(".popup_weixin").html(t),$(".popup_weixin").show(),$(".popup_weixin .content").css({"margin-top":($(window).height()-460)/2}),$(".popup_weixin .close").click(function(){$("#weixin_ifram").remove(),$(".popup_weixin").hide()})}}),!1}),$("#login_data").click(function(){var t="/Home/Index/weixinlogin";$.ajax({url:t,data:{redirect:$("#redirect").val()},dataType:"html",type:"post",async:!1,success:function(t){$(".popup_weixin").html(t),$(".popup_weixin").show(),$(".popup_weixin .content").css({"margin-top":($(window).height()-460)/2}),$(".popup_weixin .close").click(function(){$("#weixin_ifram").remove(),$(".popup_weixin").hide()})}})}),$(".popup_zfb .close").click(function(){$(".popup_zfb").hide()}),$(".success_box,.login_promet").css("min-height",$(window).height()-376),$(".btn_contain,.btn_return").click(function(){$("#play_success,.popup_zfb").hide()}),$(".zfb_info .btn_end").click(function(){$(".popup").hide()}),$(".popup_exceed .close").click(function(){$(".original").hide();var t=$("#times").data("now"),e=$("#pdt_id_number").val();$(".last_pay .pay_money").html(e*t)});var r=document.getElementById("ACTIVITPPROJECT_TIME").value,c=document.getElementById("halfMonther").value,l=new RegExp("-","g"),d=c.replace(l,"/"),p=r.replace(l,"/"),d=new Date(d),p=new Date(p);$(".actDate").html(p.getMonth()+1+"月"+p.getDate()+"日-"+(d.getMonth()+1)+"月"+d.getDate()+"日")});