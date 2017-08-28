<?php if (!defined('THINK_PATH')) exit();?>  
<!DOCTYPE html>
<html lang="en">
    <head>
        <title><?php echo ($page_title); ?></title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=Edge">
        <meta name="keywords" content="<?php echo ($page_keywords); ?>">
        <meta name="description" content="<?php echo ($page_description); ?>">
        <link rel="shortcut icon" href="__TPL__/images/favicon.ico"  type="image/x-icon" />
        <link rel="stylesheet" type="text/css" href="__CSS__webuploader.css">
	<link rel="stylesheet" type="text/css" href="__CSS__style.css?version=2.1">
	<link rel="stylesheet" type="text/css" href="__CSS__loaders.css"/>
	<link rel="stylesheet" type="text/css" href="__CSS__xcConfirm.css"/>
        <link rel="stylesheet" type="text/css" href="__CSS__jquery.fileupload.css"/>
        <script src="__JS__jquery.min.js" type="text/javascript" charset="utf-8"></script>

<!--        <script type="text/javascript" src="__JS__global.js"></script>-->
    </head>
	<body id="goTop"  >
﻿<style>overdue
.overdue { }
.overdue .con {width: 531px;position: fixed;top: 50%;left: 50%; z-index: 999;margin: -233px 0 0 -265px; text-align: center;z-index: 999;height: 466px;}
.overdue .bg { background:#000;-ms-filter: "progid:DXImageTransform.Microsoft.Alpha(opacity=30)";
 filter: progid:DXImageTransform.Microsoft.Alpha(opacity=30);
opacity: 0.3;width: 100%; height: 100%; position: fixed; z-index: 997;left: 0; top: 0; }
</style>
        <script type="text/javascript">
            /**
 * 根据指定时间显示动态倒计时效果
 *
 * @param times 指定时间年月日 格式 Y-m-d H:i:s
 * @param 显示时间的id 顺序为 天->小时->分->秒
 * @author zhangjiasuo <zhangjiasuo@guanyisoft.com>
 */
function ActivitybuyTime(times, showDay, showHouse, showFen, showMiao, now_time, buy_type, buy_status, gpEndTime, listId, gid) {
    var day_elem = $("#showGroupTime").find('.' + showDay);
    var hour_elem = $("#showGroupTime").find('.' + showHouse);
    var minute_elem = $("#showGroupTime").find('.' + showFen);
    var second_elem = $("#showGroupTime").find('.' + showMiao);

    var reg = new RegExp("-", "g");
    var timeStr = times.replace(reg, "/");
    var nowtimeStr = now_time.replace(reg, "/");
    var timeStr = new Date(timeStr);
    var nowtimeStr = new Date(nowtimeStr);

    var end_time = timeStr.getTime(), //月份是实际月份-1
        sys_second = (end_time - nowtimeStr.getTime()) / 1000;

    var timer = setInterval(function() {
        if (sys_second > 0) {
            sys_second -= 1;
            var day = Math.floor((sys_second / 3600) / 24);
            var hour = Math.floor((sys_second / 3600) - (day * 24));
            var minute = Math.floor((sys_second / 60) % 60);
            var second = Math.floor(sys_second % 60);
            //day_elem && $(day_elem).text(day);//计算天
            $(day_elem).html(day);
            $(hour_elem).text(hour < 10 ? "0" + hour : hour); //计算小时
            $(minute_elem).text(minute < 10 ? "0" + minute : minute); //计算分钟
            $(second_elem).text(second < 10 ? "0" + second : second); //计算秒杀
        } else {
            if (buy_type == 'miaos') {
                if (buy_status == 2) {
                    $('#showGrouupbuy').html('<input type="button" id="addNotOrder" disabled class="notSpike" value="立即购买" />');
                    $('#showGroupTime').html('<span><abbr>此秒杀已结束</abbr></span>');
                } else if (buy_status == 1) {
                    ActivitybuyTime(gpEndTime, 'day', 'hours', 'minutes', 'seconds', times, 'miaos', 2, '');
                }
            }
            clearInterval(timer);
        }
    }, 1000);
}

     </script>
<!--<div class="overdue" id="newz">
<div class="con">
<img src="__PUBLIC__/Tpl/v78/chocolate/images/ztimg/overdue.png" />
</div>
<div class="bg"></div>
</div>-->
<div class="ECupheader">
<img src="__PUBLIC__/Tpl/v78/chocolate/images/ztimg/banner_ECup.jpg" > </div>
<div class="ECupbg">
<div class="ECupbgball">
    <div class="warp">
        <div class="ECtime" id="showGroupTime">
<!--            <p style='position: relative;top: 10px;' id="showGroupTime<?php echo ($sp_id); ?>" class="gpendtime qproPriceB">
                <label class="day">00</label>天xx<label class="hours">00</label>小时<label class="minutes">00</label>分<label class="seconds">00</label>秒
            </p>-->
          
            <?php $time = strtotime('now'); ?>
            <?php if($time >= strtotime($time_end)){ ?>
            <span class="abs01">活</span><span class="abs02">动</span><span class="abs03">结</span><span class="abs04">束</span>
            <?php }else{ ?>
                <span class="abs01">00</span>天<span class="abs02">00</span>小时<span class="abs03">00</span>分<span class="abs04">00</span>秒
                <script>ActivitybuyTime('<?php echo ($time_end); ?>','abs01','abs02','abs03','abs04',"<?php echo date('Y-m-d H:i:s'); ?>",'miaos',2,'',"<?php echo ($sp_id); ?>","<?php echo ($g_id); ?>");</script>
            <?php } ?>	

<!--              <script>ActivitybuyTime('<?php echo ($time_end); ?>','abs01','abs02','abs03','abs04',"<?php echo date('Y-m-d H:i:s'); ?>",'miaos',2");</script>-->
            <img src="__PUBLIC__/Tpl/v78/chocolate/images/ztimg/ECup_time.png" > </div>
        <div class="ECtit"><img src="__PUBLIC__/Tpl/v78/chocolate/images/ztimg/ECup_tit01.png"></div>
    </div>
    <div class="ECpicbox">
        <ul class="clearfix">
            <li>
                <div class="left">
                    <span>
                        <img src="__PUBLIC__/Tpl/v78/chocolate/images/ztimg/test_logo.jpg" ></span>
                    <a href="http://www.xyb2b.com/Home/Products/detail/gid/604" target="_blank"><img src="__PUBLIC__/Tpl/v78/chocolate/images/ztimg/ec_mpic01.jpg" ></a></div>
                <div class="right">
                    <h2><a href="http://www.xyb2b.com/Home/Products/detail/gid/604" target="_blank">德国爱他美Aptamil奶粉
Pre段（0-3个月）800g</a></h2>
                    <P>疯抢价<br>
                        <strong>￥139.00</strong></P>
                    <em><a href="http://www.xyb2b.com/Home/Products/detail/gid/604" target="_blank"><img src="__PUBLIC__/Tpl/v78/chocolate/images/ztimg/button_shop.jpg"></a></em>
                </div>
            </li>
            <li>
                <div class="left">
                    <span>
                   <img src="__PUBLIC__/Tpl/v78/chocolate/images/ztimg/test_logo.jpg"></span>
                    <a href="http://www.xyb2b.com/Home/Products/detail/gid/605" target="_blank"><img src="__PUBLIC__/Tpl/v78/chocolate/images/ztimg/ec_mpic02.jpg" ></a></div>
                <div class="right">
                    <h2><a href="http://www.xyb2b.com/Home/Products/detail/gid/605" target="_blank">德国爱他美Aptamil奶粉
1段（3-6个月）800g</a></h2>
                    <P>疯抢价<br>
                        <strong>￥139.00</strong></P>
                    <em><a href="http://www.xyb2b.com/Home/Products/detail/gid/605" target="_blank"><img src="__PUBLIC__/Tpl/v78/chocolate/images/ztimg/button_shop.jpg"></a></em>
                </div>
            </li>
        </ul>
        <ul class="clearfix">
            <li>
                <div class="left">
                    <span>
                    <img src="__PUBLIC__/Tpl/v78/chocolate/images/ztimg/test_logo.jpg"></span>
                    <a href="http://www.xyb2b.com/Home/Products/detail/gid/1597" target="_blank"><img src="__PUBLIC__/Tpl/v78/chocolate/images/ztimg/ec_mpic03.jpg" ></a></div>
                <div class="right">
                    <h2><a href="http://www.xyb2b.com/Home/Products/detail/gid/1597" target="_blank">德国爱他美Aptamil奶粉
2段（6-10个月）800g</a></h2>
                    <P>疯抢价<br>
                        <strong>￥139.00</strong></P>
                    <em><a href="http://www.xyb2b.com/Home/Products/detail/gid/1597" target="_blank"><img src="__PUBLIC__/Tpl/v78/chocolate/images/ztimg/button_shop.jpg"></a></em>
                </div>
            </li>
            <li>
                <div class="left">
                    <span>
                        <img src="__PUBLIC__/Tpl/v78/chocolate/images/ztimg/test_logo.jpg" ></span>
                    <a href="http://www.xyb2b.com/Home/Products/detail/gid/607" target="_blank"><img src="__PUBLIC__/Tpl/v78/chocolate/images/ztimg/ec_mpic04.jpg" ></a></div>
                <div class="right">
                    <h2><a href="http://www.xyb2b.com/Home/Products/detail/gid/607">德国爱他美Aptamil奶粉 3段（10-12个月）800g</a></h2>
                    <P>疯抢价<br>
                        <strong>￥139.00</strong></P>
                    <em><a href="http://www.xyb2b.com/Home/Products/detail/gid/607" target="_blank"><img src="__PUBLIC__/Tpl/v78/chocolate/images/ztimg/button_shop.jpg"></a></em>
                </div>
            </li>
        </ul>
    </div>
     <!--05-08 -->   
    <div class="ECpicbox" style="margin-top:35px;">
        <ul class="clearfix">
            <li>
                <div class="left">
                    <span>
                    <img src="__PUBLIC__/Tpl/v78/chocolate/images/ztimg/ec_mlogo01.jpg"></span>
                    <a href="http://www.xyb2b.com/Home/Products/detail/gid/542" target="_blank"><img src="__PUBLIC__/Tpl/v78/chocolate/images/ztimg/ec_mpic05.jpg" ></a></div>
                <div class="right">
                    <h2><a href="http://www.xyb2b.com/Home/Products/detail/gid/542" target="_blank">荷兰牛栏Nutrilon奶粉
1段（0-6个月）850g</a></h2>
                    <P>疯抢价<br>
                        <strong>￥122.00</strong></P>
                    <em><a href="http://www.xyb2b.com/Home/Products/detail/gid/542" target="_blank"><img src="__PUBLIC__/Tpl/v78/chocolate/images/ztimg/button_shop.jpg"></a></em>
                </div>
            </li>
            <li>
                <div class="left">
                    <span>
                    <img src="__PUBLIC__/Tpl/v78/chocolate/images/ztimg/ec_mlogo01.jpg" ></span>
                    <a href="http://www.xyb2b.com/Home/Products/detail/gid/555"><img src="__PUBLIC__/Tpl/v78/chocolate/images/ztimg/ec_mpic06.jpg" ></a></div>
                <div class="right">
                    <h2><a href="http://www.xyb2b.com/Home/Products/detail/gid/555" target="_blank">荷兰牛栏Nutrilon奶粉
2段（6-10个月）850g</a></h2>
                    <P>疯抢价<br>
                        <strong>￥122.00</strong></P>
                    <em><a href="http://www.xyb2b.com/Home/Products/detail/gid/555" target="_blank"><img src="__PUBLIC__/Tpl/v78/chocolate/images/ztimg/button_shop.jpg"></a></em>
                </div>
            </li>
        </ul>
        <ul class="clearfix">
            <li>
                <div class="left">
                    <span>
                    <img src="__PUBLIC__/Tpl/v78/chocolate/images/ztimg/ec_mlogo01.jpg" ></span>
                    <a href="http://www.xyb2b.com/Home/Products/detail/gid/544" target="_blank"><img src="__PUBLIC__/Tpl/v78/chocolate/images/ztimg/ec_mpic07.jpg" ></a></div>
                <div class="right">
                    <h2><a href="http://www.xyb2b.com/Home/Products/detail/gid/544" target="_blank">荷兰牛栏Nutrilon奶粉
3段（10-12个月）800g</a></h2>
                    <P>疯抢价<br>
                        <strong>￥106.00</strong></P>
                    <em><a href="http://www.xyb2b.com/Home/Products/detail/gid/544" target="_blank"><img src="__PUBLIC__/Tpl/v78/chocolate/images/ztimg/button_shop.jpg"></a></em>
                </div>
            </li>
            <li>
                <div class="left">
                    <span>
                     <img src="__PUBLIC__/Tpl/v78/chocolate/images/ztimg/ec_mlogo01.jpg" ></span>
                    <a href="http://www.xyb2b.com/Home/Products/detail/gid/543" target="_blank"><img src="__PUBLIC__/Tpl/v78/chocolate/images/ztimg/ec_mpic08.jpg" ></a></div>
                <div class="right">
                    <h2><a href="http://www.xyb2b.com/Home/Products/detail/gid/543">荷兰牛栏Nutrilon奶粉 
4段（1岁以上）800g</a></h2>
                    <P>疯抢价<br>
                        <strong>￥104.00</strong></P>
                    <em><a href="http://www.xyb2b.com/Home/Products/detail/gid/543" target="_blank"><img src="__PUBLIC__/Tpl/v78/chocolate/images/ztimg/button_shop.jpg"></a></em>
                </div>
            </li>
        </ul>
    </div>
         <!--09-12 -->   
    <div class="ECpicbox"  style="margin-top:35px;">
        <ul class="clearfix">
            <li>
                <div class="left">
                    <span>
                        <img src="__PUBLIC__/Tpl/v78/chocolate/images/ztimg/ec_mlogo02.jpg"></span>
                    <a href="http://www.xyb2b.com/Home/Products/detail/gid/621" target="_blank"><img src="__PUBLIC__/Tpl/v78/chocolate/images/ztimg/ec_mpic09.jpg" ></a></div>
                <div class="right">
                    <h2><a href="http://www.xyb2b.com/Home/Products/detail/gid/621" target="_blank">日本花王Merries纸尿裤
新生儿NB号90片（5kg
以下）</a></h2>
                    <P>疯抢价<br>
                        <strong>￥100.00</strong></P>
                    <em><a href="http://www.xyb2b.com/Home/Products/detail/gid/621" target="_blank"><img src="__PUBLIC__/Tpl/v78/chocolate/images/ztimg/button_shop.jpg"></a></em>
                </div>
            </li>
            <li>
                <div class="left">
                    <span>
                        <img src="__PUBLIC__/Tpl/v78/chocolate/images/ztimg/ec_mlogo02.jpg" ></span>
                    <a href="http://www.xyb2b.com/Home/Products/detail/gid/1738"><img src="__PUBLIC__/Tpl/v78/chocolate/images/ztimg/ec_mpic10.jpg" ></a></div>
                <div class="right">
                    <h2><a href="http://www.xyb2b.com/Home/Products/detail/gid/1738" target="_blank">日本花王Merries拉拉裤
大号L 44片（9-14kg）</a></h2>
                    <P>疯抢价<br>
                        <strong>￥110.00</strong></P>
                    <em><a href="http://www.xyb2b.com/Home/Products/detail/gid/1738" target="_blank"><img src="__PUBLIC__/Tpl/v78/chocolate/images/ztimg/button_shop.jpg"></a></em>
                </div>
            </li>
        </ul>
        <ul class="clearfix">
            <li>
                <div class="left">
                    <span>
               <img src="__PUBLIC__/Tpl/v78/chocolate/images/ztimg/ec_mlogo02.jpg"></span>
                    <a href="http://www.xyb2b.com/Home/Products/detail/gid/618" target="_blank"><img src="__PUBLIC__/Tpl/v78/chocolate/images/ztimg/ec_mpic11.jpg" ></a></div>
                <div class="right">
                    <h2><a href="http://www.xyb2b.com/Home/Products/detail/gid/618" target="_blank">日本花王Merries拉拉裤 大号L 44片（9-14kg）</a></h2>
                    <P>疯抢价<br>
                        <strong>￥125.00</strong></P>
                    <em><a href="http://www.xyb2b.com/Home/Products/detail/gid/618" target="_blank"><img src="__PUBLIC__/Tpl/v78/chocolate/images/ztimg/button_shop.jpg"></a></em>
                </div>
            </li>
            <li>
                <div class="left">
                    <span>
                    <img src="__PUBLIC__/Tpl/v78/chocolate/images/ztimg/ec_mlogo02.jpg"></span>
                    <a href="http://www.xyb2b.com/Home/Products/detail/gid/1737" target="_blank"><img src="__PUBLIC__/Tpl/v78/chocolate/images/ztimg/ec_mpic12.jpg" ></a></div>
                <div class="right">
                    <h2><a href="http://www.xyb2b.com/Home/Products/detail/gid/1737">日本花王Merries纸尿裤 大号L 58片（9-14kg）</a></h2>
                    <P>疯抢价<br>
                        <strong>￥106.00</strong></P>
                    <em><a href="http://www.xyb2b.com/Home/Products/detail/gid/1737" target="_blank"><img src="__PUBLIC__/Tpl/v78/chocolate/images/ztimg/button_shop.jpg"></a></em>
                </div>
            </li>
        </ul>
    </div>
  <!--13-14 -->   
    <div class="ECpicbox02"  style="margin-top:35px;">
<ul class="clearfix">
<li>
<div class="eclogo"><img src="__PUBLIC__/Tpl/v78/chocolate/images/ztimg/test_logo.jpg"></div>
<h2><a href="http://www.xyb2b.com/Home/Products/detail/gid/1599">德国爱他美Aptamil奶粉 1+段（1岁以上）600g</a></h2>
<div class="ecpic"><a href="http://www.xyb2b.com/Home/Products/detail/gid/1599" target="_blank"><img src="__PUBLIC__/Tpl/v78/chocolate/images/ztimg/ec_mpic13.jpg" ></a></div>
<div class="botbut"><P>疯抢价<strong>￥90.00</strong></P>
<em><a href="http://www.xyb2b.com/Home/Products/detail/gid/1599" target="_blank"><img src="__PUBLIC__/Tpl/v78/chocolate/images/ztimg/button_shop.jpg"></a></em>
</div>
</li>
<li>
<div class="eclogo"><img src="__PUBLIC__/Tpl/v78/chocolate/images/ztimg/test_logo.jpg"></div>
<h2><a href="http://www.xyb2b.com/Home/Products/detail/gid/609" target="_blank">德国爱他美Aptamil奶粉 2+段（2岁以上）600g</a></h2>
<div class="ecpic"><a href="http://www.xyb2b.com/Home/Products/detail/gid/609" target="_blank"><img src="__PUBLIC__/Tpl/v78/chocolate/images/ztimg/ec_mpic14.jpg" ></a></div>
<div class="botbut"><P>疯抢价<strong>￥90.00</strong></P>
<em><a href="http://www.xyb2b.com/Home/Products/detail/gid/609" target="_blank"><img src="__PUBLIC__/Tpl/v78/chocolate/images/ztimg/button_shop.jpg"></a></em>
</div>
</li>
</ul>

</div>

<!--02 -->
<div class="ECtit"><img src="__PUBLIC__/Tpl/v78/chocolate/images/ztimg/ECup_tit02.png" ></div>
    <div class="ECpicbox">
        <ul class="clearfix">
            <li>
                <div class="left">
                    <span>
                    <img src="__PUBLIC__/Tpl/v78/chocolate/images/ztimg/ec_glogo01.jpg" ></span>
                    <a href="http://www.xyb2b.com/Home/Products/detail/gid/2019" target="_blank"><img src="__PUBLIC__/Tpl/v78/chocolate/images/ztimg/ec_gpic01.jpg" ></a></div>
                <div class="right">
                    <h2><a href="http://www.xyb2b.com/Home/Products/detail/gid/2019" target="_blank">日本嘉娜宝kracie肌美
精深层美白面膜20mlx
5片 蓝色装</a></h2>
                    <P>疯抢价<br>
                        <strong>￥45.00</strong></P>
                    <em><a href="http://www.xyb2b.com/Home/Products/detail/gid/2019" target="_blank"><img src="__PUBLIC__/Tpl/v78/chocolate/images/ztimg/button_shop.jpg"></a></em>
                </div>
            </li>
           <li>
                <div class="left">
                    <span>
                    <img src="__PUBLIC__/Tpl/v78/chocolate/images/ztimg/ec_glogo02.jpg"></span>
                    <a href="http://www.xyb2b.com/Home/Products/detail/gid/530" target="_blank"><img src="__PUBLIC__/Tpl/v78/chocolate/images/ztimg/ec_gpic02.jpg" ></a></div>
                <div class="right">
                    <h2><a href="http://www.xyb2b.com/Home/Products/detail/gid/530" target="_blank">日本熊野pharmaact 
马油洗发水600ml</a></h2>
                    <P>疯抢价<br>
                        <strong>￥40.00</strong></P>
                    <em><a href="http://www.xyb2b.com/Home/Products/detail/gid/530" target="_blank"><img src="__PUBLIC__/Tpl/v78/chocolate/images/ztimg/button_shop.jpg"></a></em>
                </div>
            </li>
        </ul>
       <ul class="clearfix">
            <li>
                <div class="left">
                    <span>
                      <img src="__PUBLIC__/Tpl/v78/chocolate/images/ztimg/ec_glogo03.jpg" /> </span>
                    <a href="http://www.xyb2b.com/Home/Products/detail/gid/2025" target="_blank"><img src="__PUBLIC__/Tpl/v78/chocolate/images/ztimg/ec_gpic03.jpg" ></a></div>
                <div class="right">
                    <h2><a href="http://www.xyb2b.com/Home/Products/detail/gid/2025" target="_blank">日本嘉娜宝kracie肌美
精深层美白面膜20mlx
5片 蓝色装</a></h2>
                    <P>疯抢价<br>
                        <strong>￥77.00</strong></P>
                    <em><a href="http://www.xyb2b.com/Home/Products/detail/gid/2025" target="_blank"><img src="__PUBLIC__/Tpl/v78/chocolate/images/ztimg/button_shop.jpg"></a></em>
                </div>
            </li>
           <li>
                <div class="left">
                    <span>
                    <img src="__PUBLIC__/Tpl/v78/chocolate/images/ztimg/ec_glogo04.jpg"></span>
                    <a href="http://www.xyb2b.com/Home/Products/detail/gid/369" target="_blank"><img src="__PUBLIC__/Tpl/v78/chocolate/images/ztimg/ec_gpic04.jpg" ></a></div>
                <div class="right">
                    <h2><a href="http://www.xyb2b.com/Home/Products/detail/gid/369" target="_blank">日本熊野pharmaact 
马油洗发水600ml</a></h2>
                    <P>疯抢价<br>
                        <strong>￥62.00</strong></P>
                    <em><a href="http://www.xyb2b.com/Home/Products/detail/gid/369" target="_blank"><img src="__PUBLIC__/Tpl/v78/chocolate/images/ztimg/button_shop.jpg"></a></em>
                </div>
            </li>
        </ul>
    </div>
    <div class="ECtit"><img src="__PUBLIC__/Tpl/v78/chocolate/images/ztimg/ECup_tit03.png" ></div>
    
    <!--03 -->
    <div class="ECpicbox02">
<ul class="clearfix">
<li>
<div class="eclogo"><img src="__PUBLIC__/Tpl/v78/chocolate/images/ztimg/ec_blogo01.jpg"></div>
<h2><a href="http://www.xyb2b.com/Home/Products/detail/gid/217">秘鲁桑娜SANA男性保健玛卡咀嚼片 100粒</a></h2>
<div class="ecpic"><a href="http://www.xyb2b.com/Home/Products/detail/gid/217" target="_blank"><img src="__PUBLIC__/Tpl/v78/chocolate/images/ztimg/ec_bpic01.jpg" ></a></div>
<div class="botbut"><P>疯抢价<strong>￥110.00</strong></P>
<em><a href="http://www.xyb2b.com/Home/Products/detail/gid/217" target="_blank"><img src="__PUBLIC__/Tpl/v78/chocolate/images/ztimg/button_shop.jpg"></a></em>
</div>
</li>
<li>
<div class="eclogo"><img src="__PUBLIC__/Tpl/v78/chocolate/images/ztimg/ec_blogo02.jpg"></div>
<h2 style="padding-left:15px;"><a href="http://www.xyb2b.com/Home/Products/detail/gid/517" target="_blank">澳大利亚Blackmores澳佳宝男士综合维生素100片</a></h2>
<div class="ecpic"><a href="http://www.xyb2b.com/Home/Products/detail/gid/517" target="_blank"><img src="__PUBLIC__/Tpl/v78/chocolate/images/ztimg/ec_bpic02.jpg" ></a></div>
<div class="botbut"><P>疯抢价<strong>￥163.00</strong></P>
<em><a href="http://www.xyb2b.com/Home/Products/detail/gid/517" target="_blank"><img src="__PUBLIC__/Tpl/v78/chocolate/images/ztimg/button_shop.jpg"></a></em>
</div>
</li>
</ul>

</div>
</div>
</div>

<div class="qualitybox02">
    <ul class="warp clearfix">
        <li>100%正品保证</li>
        <li class="icon02">贴心极速物流</li>
        <li class="icon03">订单闪电发货</li>
        <li class="icon04">品牌防伪码</li>
    </ul>
</div>

<!--底部 -->
<div class="footer clearfix">
    <div class="warp clearfix">
        <div class="left">
            <?php $artcat = array ( ); if(is_array($artcat)): $keys = 0; $__LIST__ = $artcat;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$arts): $mod = ($keys % 2 );++$keys;?><div class="ctl">
                        <ul class="top">
                            <li><?php echo ($arts["cat_name"]); ?></li>
                        </ul>
                        <ul>
                            <li>
                                <?php if(is_array($arts["list"])): $k = 0; $__LIST__ = $arts["list"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$artinfo): $mod = ($k % 2 );++$k; if($artinfo['a_link']): ?><a href="<?php echo ($artinfo['a_link']); ?>"><?php echo ($artinfo["a_title"]); ?></a><?php else: ?>
                                    <a href="<?php echo U('/Home/Index/article_show?aid='.$artinfo['a_id']);?>"><?php echo ($artinfo["a_title"]); ?></a><br><?php endif; endforeach; endif; else: echo "" ;endif; ?>
                            </li>
                        </ul>
                    </div><?php endforeach; endif; else: echo "" ;endif; ?>
        </div>

        <div class="right">
<p><img src="__PUBLIC__/Tpl/v78/chocolate/images/down_appnew.png"> </p>
        </div>

    </div>

    <!-- <div class="iconbox"> <img src="__PUBLIC__/Tpl/v78/chocolate/images/cx1.png" width="100" height="30"> <img src="__PUBLIC__/Tpl/v78/chocolate/images/cx2.png"
            width="100" height="30"> <img src="__PUBLIC__/Tpl/v78/chocolate/images/cx3.jpg" width="100" height="30"> <img src="__PUBLIC__/Tpl/v78/chocolate/images/cx4.png"
            width="100" height="30"></div> -->
    <div class="copyright">
        版权所有 深圳市天行云供应链有限公司 粤ICP备15060915号-1 行云全球汇<br> Copyright © 2015 - 2020. xyb2b.com. All Rights Reserved.
    </div>
</div>
        </body>
        
</html>