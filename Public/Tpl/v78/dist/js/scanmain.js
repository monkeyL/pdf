function timeChange(){var t=parseInt($(".input-nums").val());return $(".pay").html(2*t),$(".prime-cost").html(""),!0}function setData(){var t,a,e;t="times"==$("#timeWay li.checked").data("id")?1:2,1==t?(a=parseInt($(".input-nums").val()),e=2*a):(a=parseInt($("#monthWay .row-right li.checked").attr("data-id")),e=$(".pay").html()),$("#dataType").val(t),$("#dataCount").val(a),$("#dataFee").val(e)}function accMul(t,a){var e=0,n=t.toString(),i=a.toString();try{e+=n.split(".")[1].length}catch(s){}try{e+=i.split(".")[1].length}catch(s){}return Number(n.replace(".",""))*Number(i.replace(".",""))/Math.pow(10,e)}$(function(){$("#monthWay .row-right li").click(function(){$(this).addClass("checked").siblings().removeClass("checked"),$("#times").removeClass("checked"),$(".pay").html($(this).find("span").html());var t=$(this).data("id"),a="";a=1==t?20:3==t?40:6==t?60:12==t?99:159,$(".prime-cost").html("原价"+a+"元"),setData()}),$("#times").click(function(){$(this).addClass("checked").parents("#timeWay").siblings("#monthWay").find("li").removeClass("checked"),setData(),timeChange()}),$(".icon-add").click(function(){var t=$(".input-nums").val();""==t&&$(".input-nums").val(1);var a=parseInt($(".input-nums").val());$("#times").addClass("checked").parents("#timeWay").siblings("#monthWay").find("li").removeClass("checked"),a++,$(".input-nums").attr("value",a),$("#dataType").val(1),timeChange(),setData()}),$(".input-nums").blur(function(){var t=$(".input-nums").val();""==t&&($(".input-nums").val(1),$("#times").addClass("checked").parents("#timeWay").siblings("#monthWay").find("li").removeClass("checked"),$("#dataType").val(1),timeChange(),setData())}),$(".icon-reduce").click(function(){var t=parseInt($(".input-nums").val());$("#times").addClass("checked").parents("#timeWay").siblings("#monthWay").find("li").removeClass("checked"),t--,t>=1&&($(".input-nums").attr("value",t),timeChange()),setData()}),$(".input-nums").keyup(function(){var t=$(this).val();$(this).val(t.replace(/\D|^0/g,""))}).bind("paste",function(){var t=parseInt($(this).val());$(this).val(t.replace(/\D|^0/g,""))}).css("ime-mode","disabled"),$("#input-num").bind("contextmenu",function(){return!1}),$(".popup .icon-close").click(function(){$(".popup").hide()}),$(".payment-tips .icon-close,.payment-tips .btn-end,.payment-tips .btn-problem").click(function(){$(".payment-tips").hide()}),$(".icon-zfb").bind("click",function(){$(".payment-tips").show()}),$(".input-nums").keyup(function(){$("#times").addClass("checked").parents("#timeWay").siblings("#monthWay").find("li").removeClass("checked");var t=parseInt($(".input-nums").val());t>=1&&($(".input-nums").attr("value",t),timeChange()),setData()})});