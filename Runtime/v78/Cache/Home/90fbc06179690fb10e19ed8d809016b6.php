<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
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

    </head>
	<body id="goTop"  ><!--      -->

	        <div class="header">
        <div class="wrap clearfix">
            <a href="<?php echo U('Home/Index/CoreBusiness');?>" class="brand"><img src="__IMAGES__brand.png"  alt="pdf在线转换器" /></a>
            <ul class="nav">
                <li <?php if($header_tag_highlighted == 3 ): ?>class="current"<?php endif; ?>><a href="/">首页</a></li>
                <li <?php if($header_tag_highlighted == 4 ): ?>class="current"<?php endif; ?>><a href="<?php echo U('Home/Index/CoreBusiness');?>">开始转换</a></li>
                <li <?php if($header_tag_highlighted == 1 ): ?>class="current"<?php endif; ?>><a href="<?php echo U('Home/Index/artificialvip');?>">人工VIP</a></li>
                <li <?php if($header_tag_highlighted == 2 ): ?>class="current"<?php endif; ?>><a href="<?php echo U('Home/Index/informationRecords');?>">信息记录</a></li>
                <li>联系我们
                    <div class="info">
                        <i class="arrow_up"></i>
                        <p><i class="icon icon_qq"></i>官方QQ群<a href="http://shang.qq.com/wpa/qunwpa?idkey=5b012a15f072526bb9334848d8f60dbcaf7c8e2f7023f3378e1655ddd364dd00" target="_blank">(点击加入)</a></p>
                        <p><i class="icon icon_qq"></i>QQ：<a href="http://wpa.qq.com/msgrd?v=3&uin=3004137938&site=qq&menu=yes" target="_blank">3004137938</a></p>
                        <p><i class="icon icon_phone"></i>0755-86952275</p>
                        <div class="work_time">周一至周五 09:00-18:00</div>                        
                    </div>
                </li>
            </ul>
               
            <div class="login">
            <?php if(empty($_SESSION['Members']['m_name'])): ?><a href="javascript:return false;" id="login_weixin" class="login_weixin">登录</a><!-- <?php echo U('Home/Index/weixin_login');?> --><?php endif; ?>
                <?php if(!empty($_SESSION['Members']['m_name'])): ?><div class="user">
                     <div class="name">你好，<?php echo ($_SESSION['Members']['m_name']); ?></div>
                     <div class="info">
                         <i class="arrow_up"></i>
                         <div class="content">
                             <h3><div class="login_name" title="<?php echo ($_SESSION['Members']['m_name']); ?>"><?php echo ($_SESSION['Members']['m_name']); ?></div></h3><a href="<?php echo U('Home/User/doLogout');?>" class="exit">退出<!-- <div><i class="icon icon_exit"></i></div>  --></a>
                             <p class="promet2"> 
                                <?php $out_time = 0; if(time() > strtotime($ary_member['end_time'])){ $time_count =0; $out_time = count_days(strtotime($ary_member['end_time']),strtotime(date('Y-m-d'))); $out_day_small = time() - strtotime($ary_member['end_time']); if($out_day_small < 86400){ $out_time = 1; } }else { $time_count = count_days(strtotime(date('Y-m-d H:i:s')),strtotime($ary_member['end_time'])); if($time_count == 0){ $time_count_show = 1; }else { $time_count_show = $time_count; } } ?>
                                <?php if(($ary_member["conversion_type"] == 0 and $out_time == 0) or ($out_time > 30 and $ary_member["conversion_type"] == 0) ): ?>您当前还未充值<?php endif; ?>
                             </p>
                                        <?php if($ary_member["conversion_type"] == 1 and $ary_member["number_remaining"] != 0): ?><p>次数套餐：<span class="times"><?php echo ($ary_member["number_remaining"]); ?> </span>次&nbsp;&nbsp;&nbsp;
                                            <?php elseif($ary_member["conversion_type"] == 2): ?>
                                                <?php if($ary_member["number_remaining"] != 0 ): ?><p>VIP套餐：<span class="times"><?php echo $time_count_show; ?> </span>天(优先)&nbsp;&nbsp;&nbsp;次数套餐：<span class="times"><?php echo ($ary_member["number_remaining"]); ?> </span>次</p>
                                                   <?php else: ?>
                                                    <p>VIP套餐：<span class="times"><?php echo $time_count_show; ?> </span>天</p><?php endif; endif; ?>
                                   
                                        <div class="warning_promet">
                                            <?php if((($ary_member["conversion_type"] == 0 and $out_time == 0) or ($out_time > 30)) or (($ary_member["conversion_type"] == 1 and $out_time == 0) or ($out_time > 30))): ?><p class="promet">包月转换次数不受限，包年最低只要0.1元/天</p><?php endif; ?>
                                            <?php if($time_count == 0 and $out_time == 0 ): ?><i class="icon icon-gift"></i>
                                                 <p class="promet">包月转换次数不受限，包年最低只要0.1元/天</p><?php endif; ?>
                                            <?php if($time_count <= 7 and $time_count > 0 and $out_time == 0): ?><i class="icon icon-gift"></i>
                                                <p class="promet"><a href="<?php echo U('Home/Products/ConversionFeeDetail');?>" style='color:red'  >亲，您的套餐马上要到期了，现在购买套餐尊享<span class="zkou">9</span>折优惠哦~</a></p><?php endif; ?>
                                            <?php if($time_count > 7 and $time_count > 0 and $out_time == 0): ?><p class="promet">包月转换次数不受限，包年最低只要0.1元/天</p><?php endif; ?>
                                            <?php if($out_time <= 30 and $out_time > 0): ?><i class="icon icon-gift"></i>
                                                <p class="promet"><a href="<?php echo U('Home/Products/ConversionFeeDetail');?>" style='color:red' >亲，您的套餐已经到期了，现在购买套餐尊享<span class="zkou">9.5</span>折优惠哦~</a></p><?php endif; ?>
                                            <?php if($out_time > 30 and $time_count != 0 ): ?><p class="promet">包月转换次数不受限，包年最低只要0.1元/天</p><?php endif; ?>
                                        </div>

                         </div>
                         <div class="work_time">
                             <a href="<?php echo U('Home/Index/informationRecords',array('record'=>Prepaidrecords));?>" class="record">充值记录</a>
                             <a href="<?php echo U('Home/Index/informationRecords',array('record'=>Conversionrecord));?>" class="record">转换记录</a>
                             <a href="<?php echo U('Home/Products/ConversionFeeDetail');?>" class="now_cz">立即充值</a>
                         </div>                        
                     </div>
                 </div><?php endif; ?>

                <div class="recharge_box">&nbsp;&nbsp;│&nbsp;&nbsp;<a href="<?php echo U('Home/Products/ConversionFeeDetail');?>" class="recharge">充值</a></div>
                <input type="hidden" value="<?php echo ($_SESSION['Members']['m_id']); ?>" name ="gy_member_open" id="gy_member_open"/>
                <input type="hidden" value="<?php echo ($redirect); ?>" name ="redirect" id="redirect"/>
                <input type="hidden" id="Authorizationtype" value="<?php echo ($ary_member["conversion_type"]); ?>" />
                <input type="hidden" id="Free_authorization" value="<?php echo ($ary_member["Free_authorization"]); ?>" />
            </div>
        </div>
    </div>
	     <style type="text/css">
.qualitybox02{ background:#e3e1e1; height:78px; min-width:1200px;}
.qualitybox02 ul{}
.qualitybox02 li{ font-family:Microsoft YaHei; font-size:14px; color:#333; float:left; margin-left:180px;background:url(__PUBLIC__/Tpl/v78/chocolate/images/ztimg/icon_quality.png) no-repeat 5px 17px; padding:28px 0 13px 55px;}
.qualitybox02 li.icon02{background:url(__PUBLIC__/Tpl/v78/chocolate/images/ztimg/icon_quality.png) no-repeat 0 -48px;}
.qualitybox02 li.icon03{background:url(__PUBLIC__/Tpl/v78/chocolate/images/ztimg/icon_quality.png) no-repeat 0 -112px;}
.qualitybox02 li.icon04{background:url(__PUBLIC__/Tpl/v78/chocolate/images/ztimg/icon_quality.png) no-repeat 0 -183px;}
.qualitybox02 li:first-child{ margin-left:60px;}
        </style>
<table width="1920" height="2660" border="0">
  <tr>
    <td width="409" height="2660"><img src="__PUBLIC__/Tpl/v78/chocolate/images/ztimg/Beauty/mei-zhuang-huo-dong-ye_01.jpg" width="409" height="2660" alt=""></td>
    <td width="1102" height="2660"><table width="1102" border="0">
      <tr>
        <td width="1102" height="207"><img src="__PUBLIC__/Tpl/v78/chocolate/images/ztimg/Beauty/mei-zhuang-huo-dong-ye_02.jpg" width="1102" height="207" alt=""></td>
      </tr>
      <tr>
        <td width="1102" height="364"><a href="http://www.xyb2b.com/Home/Products/detail/gid/2288" target="_blank"><img src="__PUBLIC__/Tpl/v78/chocolate/images/ztimg/Beauty/mei-zhuang-huo-dong-ye_04.jpg" width="1102" height="364" alt=""></a></td>
      </tr>
      <tr>
        <td width="1102" height="379"><a href="http://www.xyb2b.com/Home/Products/detail/gid/2271" target="_blank"><img src="__PUBLIC__/Tpl/v78/chocolate/images/ztimg/Beauty/mei-zhuang-huo-dong-ye_05.jpg" width="1102" height="379" alt=""></a></td>
      </tr>
      <tr>
        <td width="1102" height="376"><a href="http://www.xyb2b.com/Home/Products/detail/gid/2272" target="_blank"><img src="__PUBLIC__/Tpl/v78/chocolate/images/ztimg/Beauty/mei-zhuang-huo-dong-ye_06.jpg" width="1102" height="376" alt=""></a></td>
      </tr>
      <tr>
        <td width="1102" height="386"><a href="http://www.xyb2b.com/Home/Products/detail/gid/530" target="_blank"><img src="__PUBLIC__/Tpl/v78/chocolate/images/ztimg/Beauty/mei-zhuang-huo-dong-ye_07.jpg" width="1102" height="386" alt=""></a></td>
      </tr>
      <tr>
        <td width="1102" height="359"><a href="http://www.xyb2b.com/Home/Products/detail/gid/531" target="_blank"><img src="__PUBLIC__/Tpl/v78/chocolate/images/ztimg/Beauty/mei-zhuang-huo-dong-ye_08.jpg" width="1102" height="359" alt=""></a></td>
      </tr>
      <tr>
        <td width="1102" height="130"><a href="http://www.xyb2b.com/" target="_blank"><img src="__PUBLIC__/Tpl/v78/chocolate/images/ztimg/Beauty/mei-zhuang-huo-dong-ye_09.jpg" width="1102" height="130" alt=""></a></td>
      </tr>
      <tr>
        <td width="1102" height="459"><table width="1102" height="459" border="0">
          <tr>
            <td width="276" height="459"><a href="http://www.xyb2b.com/Home/Products/detail/gid/604" target="_blank"><img src="__PUBLIC__/Tpl/v78/chocolate/images/ztimg/Beauty/mei-zhuang-huo-dong-ye_10.jpg" width="276" height="459" alt=""></a></td>
            <td width="275" height="459"><a href="http://www.xyb2b.com/Home/Products/detail/gid/542" target="_blank"><img src="__PUBLIC__/Tpl/v78/chocolate/images/ztimg/Beauty/mei-zhuang-huo-dong-ye_11.jpg" width="275" height="459" alt=""></a></td>
            <td width="288" height="459"><a href="http://www.xyb2b.com/Home/Products/detail/gid/86" target="_blank"><img src="__PUBLIC__/Tpl/v78/chocolate/images/ztimg/Beauty/mei-zhuang-huo-dong-ye_12.jpg" width="288" height="459" alt=""></a></td>
            <td width="263" height="459"><a href="http://www.xyb2b.com/Home/Products/detail/gid/1738" target="_blank"><img src="__PUBLIC__/Tpl/v78/chocolate/images/ztimg/Beauty/mei-zhuang-huo-dong-ye_13.jpg" width="263" height="459" alt=""></a></td>
          </tr>
        </table></td>
      </tr>
    </table></td>
    <td width="409" height="2660"><img src="__PUBLIC__/Tpl/v78/chocolate/images/ztimg/Beauty/mei-zhuang-huo-dong-ye_03.jpg" width="409" height="2660" alt=""></td>
  </tr>
</table>
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
    <div class="copyright">
        版权所有 深圳市天行云供应链有限公司 粤ICP备15060915号-1 行云全球汇<br> Copyright © 2015 - 2020. xyb2b.com. All Rights Reserved.
    </div>
</div>


        <?php if(TPL!='sky'){ ?>
	    <noempty name="ary_online">
<style>
/*在线咨询   开始*/
.cusService { display:inline-block; position:fixed; left:0px; top:200px;}
.cusServiceCon { float:left; width:180px; border:1px solid #d7d7d7; background:white; display:none}
.cusServiceCon table { width:100%}
.cusServiceCon table thead td { border-bottom:1px solid #d7d7d7; color:#333; font-size:14px; text-shadow:1px 1px 3px #999;}
.cusServiceCon table td { padding:5px 0px; line-height:23px; padding-left:10px;}
.cusServiceCon table td.addBorder { border-top:1px dashed #d7d7d7;}
.cusServiceCon table td a { display:inline-block; white-space:nowrap}
.cusServiceCon table td span { position:relative; margin-left: 4px;}
.cusServiceCon table td a:hover { text-decoration:none; color:red;}
.cusServiceCon table tfoot td { border-top:1px sold #d7d7d7;}
a.cusSerClick { float:left; background:url(__PUBLIC__/Ucenter/images/customerService.jpg) no-repeat 0px -124px; width:42px; height:124px;}
a.cusSerClickAgain { background-position:0px 0px;}
/*在线咨询   结束*/
</style>
<?php if(isset($ary_online)): ?><div class="cusService" style="z-index:100"><!--cusService  客服 start-->
	<div class="cusServiceCon" id="cusCon">
    	<table>
        	<thead>
            	<tr>
                	<td><strong>在线咨询</strong></td>
                </tr>
            </thead>
            <tbody>
                <?php if(is_array($ary_online)): $i = 0; $__LIST__ = $ary_online;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$online): $mod = ($i % 2 );++$i;?><tr><td align="center"><strong><?php echo ($online["oc_name"]); ?></strong></td></tr>
                <?php if(is_array($online["server"])): $i = 0; $__LIST__ = $online["server"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$server): $mod = ($i % 2 );++$i;?><tr>
                	<td>
                    	<?php echo ($server["o_code"]); ?><span><?php echo ($server["o_name"]); ?></span>
                    </td>
                </tr><?php endforeach; endif; else: echo "" ;endif; endforeach; endif; else: echo "" ;endif; ?>
            </tbody>
            <tfoot>
            	<tr>
                	<td style="border-top:1px solid #d7d7d7;">在线时间：<?php echo (($online_start_time)?($online_start_time):'9:00'); ?>-<?php echo (($online_end_time)?($online_end_time):'18:00'); ?></td>
                </tr>
            </tfoot>
        </table>
    </div>
    <a href="javascript:void(0)" class="cusSerClick" id="azx" style="display:block"></a>
</div><!--cusService  end-->
<script type="text/javascript">
/*$(function(){
	$("a.cusSerClick").hover(function(){
		$(".cusServiceCon").show();
		$(this).css("babkgroundPosition":"0px 0px")
	},function(){
		$(".cusServiceCon").hide();
		$(this).css("babkgroundPosition":"0px -124px")
	})
});*/

//window.onload=function(){
	var azx=document.getElementById('azx');
	var cus=document.getElementById('cusCon');
	
	azx.onclick=function(){
		if(cus.style.display=='block'){
			cus.style.display='none'
			this.style.backgroundPosition='0px -124px';
		}else {
			cus.style.display='block';
			this.style.backgroundPosition='0px 0px'
		}
	}
	
//}
</script><?php endif; ?>
</noempty>

        <?php } ?>
	        <div class="footer">
        <p>&nbsp;&nbsp;E-mail：<a href="mailto:service@cqttech.com" >service@cqttech.com</a>&nbsp;&nbsp;网址：<a href="http://www.cqttech.com" target="_blank">http://www.cqttech.com</a></p>
        <p>Copyright (C) 2017 IVY Tec. All Rights Reserved.  <a href="http://www.miibeian.gov.cn/" target="_blank">粤ICP备16105002号-2</a></p>
        <p>商务QQ：<a href="http://wpa.qq.com/msgrd?v=3&uin=3004139668&site=qq&menu=yes" target="_blank">3004139668</a> | 产品QQ：<a href="http://wpa.qq.com/msgrd?v=3&uin=3004198912&site=qq&menu=yes" target="_blank">3004198912</a> | 客服QQ：<a href="http://wpa.qq.com/msgrd?v=3&uin=3004137938&site=qq&menu=yes" target="_blank">3004137938</a></p>
    </div>

		<?php if($_SESSION['OSS']['GY_OSS_ON'] == '1'){ ?>
			<input type="hidden" value="1" id="oss_id" />
		<?php }else{ ?>
			<input type="hidden" value="0" id="oss_id" />
		<?php } ?>
		<?php if($ary_request[index]== true){ ?>
		<input type="hidden" id="is_index" value="1" />
		<?php }else{ ?>	
		<input type="hidden" id="is_index" value="0" />
		<?php } ?>
	    <!-- 是否有统计代码,有则显示  Start-->
		<?php if(isset($shop_code)): ?><noempty name="shop_code">
	    	<div class="statistics"><?php echo ($shop_code); ?></div>
	    </noempty><?php endif; ?>
	    <!-- 是否有统计代码，有则显示 End-->
	</body>
</html>