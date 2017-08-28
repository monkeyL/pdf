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
	    
        <base target="_blank" />
		<link href="../css/index.css" rel="stylesheet" />
        <link rel="icon" href="favicon.ico" />
        <style type="text/css">
*{
	margin:0;
	padding:0;
	color:#666;
}
.overdue { }
.overdue .con {width: 531px;position: fixed;top: 50%;left: 50%; z-index: 999;margin: -233px 0 0 -265px; text-align: center;z-index: 999;height: 466px;}
.overdue .bg { background:#000;-ms-filter: "progid:DXImageTransform.Microsoft.Alpha(opacity=30)";
 filter: progid:DXImageTransform.Microsoft.Alpha(opacity=30);
opacity: 0.3;width: 100%; height: 100%; position: fixed; z-index: 997;left: 0; top: 0; }
.header{font-size:12px!important;}
body{
	font-size:14px;
	font-family:Microsoft Yahei;
	height:100%;
	width:100%;}
.container_box{
	width:100%;
	height:7808px;
	background:url("__PUBLIC__/Tpl/v78/chocolate/images/ztimg/Olympic/bg.jpg") no-repeat top center;
	background-size:auto 7808px;
	min-width:1200px;
}
html{
	height:100%;
}
h1,h2,h3,h4{
	font-weight:normal;
}
li{
	list-style:none;
}
a{
	text-decoration:none;
}
i{
	font-style: normal;
}
.banner{
	height:675px;min-width:1200px;
	background:url(__PUBLIC__/Tpl/v78/chocolate/images/ztimg/Olympic/banner.jpg) center top;
}
.banner img{
	width:100%;
	height:675px;
}
.container_box{
}
.container{
	max-width:1200px;
	margin:0 auto;
}
.content_box_top{
	padding-top:120px;
}
.content_box{
	margin-bottom:84px;
}
.title_pic{
	width:100%;
	margin-bottom:64px;
}
.title_pic img{
	width:245px;
	margin:0 auto;
	display:block;
}
.yz_ul{
	
}
.clearfix:after{
	visibility: hidden;
	display:block;
	content:"";
	height:0;
	clear: both;
	font-size:0;
}
.yz_ul li{
	width:320px;
	height:380px;
	margin-right:59px;
	padding:20px;
	float:left;
	border-radius:10px;
	background:url("__PUBLIC__/Tpl/v78/chocolate/images/ztimg/Olympic/yz_bg.jpg") no-repeat;
	background-size:100% 100%;
}
.yz_ul li:nth-child(3){
	margin-right:0;
}
.yz_ul li .li_con{
	background:#fff;
	width:240px;
	height:100%;
	padding:0 40px;
}
.li_con .li_img{
	display:block;
	text-align:center;
	padding-top:48px;
}
.li_con .li_img img{
	
}
.li_con .line span{
	display:block;
	width:56px;
	height:18px;
	border:1px solid #FBB01F;
	line-height:18px;
	text-align:center;
	color:#FBB01F;
	border-radius:2px;
	
}
.li_con .line{
	border-bottom:1px solid #ccc;
	padding-bottom:10px;
	padding-top:3px;
}
.li_con .li_title{
	margin-top:6px;
}
.li_con .li_title a{
	font-size:18px;

}
.li_con .price{
	margin-top:10px;
}
.li_con .price strong{
	color:#FF651D;
	font-size:18px;
	float:left;
}
.li_con .price strong span{
	font-size:34px;
	color:#FF651D;
}
.buy_btn{
	float:right;
	display:block;
	width:91px;
	height:40px;
	background:url('__PUBLIC__/Tpl/v78/chocolate/images/ztimg/Olympic/buy_btn.png') no-repeat;
	background-size:contain;
}
.pz_ul{
	width:900px;
	height:480px;
	margin:auto;
	background:url('__PUBLIC__/Tpl/v78/chocolate/images/ztimg/Olympic/pz_bg.png') no-repeat;
	background-size:contain;
}
.pz_ul li:nth-child(1){
	width:240px;
	height:400px;
	margin:40px;
	background:#fff;
	padding:0 50px;
	float:left;
	border-radius:10px;
}
.pz_ul li.last_li{
	margin-right:0;
	float:right;
	width:240px;
	height:400px;
	margin:40px;
	background:#fff;
	padding:0 50px;
	border-radius:10px;
}
.li_pz_con .li_img{
	padding-top:30px;
}
.li_pz_con .li_img img{
	
}
.li_pz_con .price {
    margin-top: 6px;
}
.pz_ul_second{
	width:1200px;
	height:438px;
	margin:16px auto 0;
	background:url('__PUBLIC__/Tpl/v78/chocolate/images/ztimg/Olympic/pz_bg_2.png') no-repeat;
	background-size:contain;
}
.pz_ul_second li{
	width:240px;
	height:398px !important;
	background:#fff;
	padding:0 50px;
	float:left;
	margin:20px 50px 0 20px !important;
	border-radius:0 !important;
}
.pz_ul_second li.last_li{
	margin:20px 20px 0 20px !important;
}
.cj_ul{
	width:1200px;
	height:480px;
	margin:auto;
	background:url('__PUBLIC__/Tpl/v78/chocolate/images/ztimg/Olympic/pz_bg.png') no-repeat;
	background-size:contain;
}
.cj_ul li{
	width:240px;
	height:400px;
	margin-right:28px !important;
	margin-bottom:40px !important;
	background:#fff;
	padding:0 50px;
	float:left;
	border-radius:10px !important;
}
.cj_ul .buy_btn{
	float:right;
	display:block;
	width:91px;
	height:40px;
	background:url('__PUBLIC__/Tpl/v78/chocolate/images/ztimg/Olympic/buy_btn.png') no-repeat;
	background-size:contain;
}
.cj_ul{
	width:1160px;
	height:900px;
	padding:20px;
	margin:auto;
	background:url('__PUBLIC__/Tpl/v78/chocolate/images/ztimg/Olympic/cj_bg.png') no-repeat;
	background-size:contain;
}
.cj_ul li:nth-child(3n){
	margin-right:0 !important;
}

.cj_ul .li_con .line span,.fx_ul .li_con .line span{
	display:block;
	width:56px;
	height:18px;
	border:1px solid #95CA6C;
	line-height:18px;
	text-align:center;
	color:#95CA6C;
	border-radius:2px;
	
}
.li_con .line{
	border-bottom:1px solid #ccc;
	padding-bottom:10px;
	padding-top:3px;
}
.cj_ul .buy_btn,.fx_ul .buy_btn{
	float:right;
	display:block;
	width:91px;
	height:40px;
	background:url('__PUBLIC__/Tpl/v78/chocolate/images/ztimg/Olympic/buy_btn_green.png') no-repeat;
	background-size:contain;
}
.cj_ul .li_pz_con .price {
    margin-top: 1px;
}
.ljfk_title_pic{
	margin-top:150px;
}
.ljfk_title_pic img{
	width:830px;
	display:block;
	margin:0 auto;
}
.fk_ul{
	width:1190px;
	height:1160px;
	padding:20px 5px;
	margin:138px auto 0;
	background:#9FC1F0 !important;
	background-size:contain;
	position:relative;
}
.fk_ul li{
	width:242px !important;
	height:380px!important;
	margin:0 10px 10px 0!important;
	padding:0 24px !important;
	float:left;
	border-radius:10px;
	background:#fff;
}
.fk_ul li:nth-child(4n+1){
	margin-right:0 !important;
}
.fk_ul .li_pz_con .li_img{
	padding-top:40px;
}
.fk_ul .li_con .line span{
	display:block;
	width:56px;
	height:18px;
	border:1px solid #83B6FE;
	line-height:18px;
	text-align:center;
	color:#83B6FE;
	border-radius:2px;
	
}

.fk_ul .buy_btn{
	float:right;
	display:block;
	width:99px;
	height:32px;
	background:url('__PUBLIC__/Tpl/v78/chocolate/images/ztimg/Olympic/buy_btn_blue.jpg') no-repeat;
	background-size:contain;
	margin-top:10px;
}
.fk_ul .li_con .li_title a{
	font-size:14px;
}
.yzbb_title_pic{
	margin-top:180px !important;
}
.ay_box{
	width:1200px;
	height:690px;
	background:url('__PUBLIC__/Tpl/v78/chocolate/images/ztimg/Olympic/ay_bg.png') no-repeat;
	background-size:contain;
	margin-top:90px;
}
.ay_box .left{
	width:264px;
}
.ay_content{
	padding:260px 165px 0 165px;
}
.ay_box .left .line span{
	display:block;
	width:56px;
	height:18px;
	border:1px solid #FBB01F;
	line-height:18px;
	text-align:center;
	color:#FBB01F;
	border-radius:2px;
	
}
.ay_box .left .price{
	margin-top:10px;
}
.ay_box .left .price strong{
	color:#FF651D;
	font-size:18px;
	width:100%;
	display: block;
    text-align: center;
}
.left_title{
	margin-top:30px;
}
.left_title a{
	font-size:18px;
}
.ay_box .left .price strong span{
	font-size:34px;
	color:#FF651D;
}
.ay_box .left .buy_btn{
	display:block;
	float:none;
	width:97px;
	height:53px;
	margin:auto;
	background:url('__PUBLIC__/Tpl/v78/chocolate/images/ztimg/Olympic/ay_btn.png') no-repeat;
	background-size:contain;
}
.fl{
	float:left;
}
.fr{
	float:right;
}
.middle{
	width:140px !important;
	margin-left:96px;
	text-align:center;
	margin-top:-12px;
}
.ay_box .middle .line span{
	display:block;
	width:56px;
	height:18px;
	border:1px solid #FBB01F;
	line-height:18px;
	text-align:center;
	color:#FBB01F;
	border-radius:2px;
	margin:auto;
	
}
.ay_box .ay_img img{
	display:block;
	margin:auto;
}
.yz_box .yz_top{
	width:750px;
	margin:80px auto 0;
}
.yz_box .yz_title{
	text-align: center;
	margin-top:70px;
}
.yz_box .yz_top li{
	width:330px;
	float:left;
	margin-right:90px;
	
}
.yz_box .yz_top li.last_li{
	
	margin-right:0px;
	
}
.yz_img_top{
	width:330px;
	height:330px;
	background:#fff;
	border-radius:15px;
}
.yz_img_top .yz_img{
	display:block;
	padding-top:44px;
}
.yz_img_top .yz_img img{
	display:block;
	margin:auto;
}
.yz_img_top span{
	display:block;
	width:56px;
	height:18px;
	border:1px solid #95CA6C;
	line-height:18px;
	text-align:center;
	color:#95CA6C;
	border-radius:2px;
	margin-left:20px;
	margin-top:6px;
}
.yz_box .yz_top .price{
	margin-top:10px;
	padding:0 70px;
}
.yz_box .yz_top .price strong{
	color:#FF651D;
	font-size:18px;
	float:left;
	margin-top:10px;
}
.yz_box .yz_top .price strong span{
	font-size:34px;
	color:#FF651D;
}
.yz_box .yz_top .yz_btn{
	display:block;
	float:right;
	width:97px;
	height:53px;
	background:url('__PUBLIC__/Tpl/v78/chocolate/images/ztimg/Olympic/ay_btn.png') no-repeat;
	background-size:contain;
}
.yz_box .yz_top .yz_title{
	font-size:18px;
	margin-top:10px;
	text-align:center;
}
.yz_bottom{
	width:1094px !important;
	margin:60px auto 0 !important;
}
.yz_box .yz_bottom li{
	width:340px !important;
	float:left;
	margin-right:36px;
	
}
.yz_box .yz_bottom .yz_img_top{
	width:340px !important;
}
.pz_ul_second .li_pz_con .li_img{
	height:230px;
}
.fk_ul .li_pz_con .li_img{
	height:196px;
}
.fx_ul{
	width: 900px;
    height:502px;
    margin: auto;
    background: url('__PUBLIC__/Tpl/v78/chocolate/images/ztimg/Olympic/fx_bg.png') no-repeat;
    background-size: contain;
}
.fk_ul .li_con .li_title{
	height:34px;
}
.position_bg{
	width:754px;
	height:783px;
	background: url('__PUBLIC__/Tpl/v78/chocolate/images/ztimg/Olympic/position.png') no-repeat;
	background-size:contain;
	position:absolute;
    top: -600px;
    left: -394px;
}
.qualitybox02{ background:#e3e1e1; height:78px; min-width:1200px;}
.qualitybox02 ul{}
.qualitybox02 li{ font-family:Microsoft YaHei; font-size:14px; color:#333; float:left; margin-left:180px;background:url(__PUBLIC__/Tpl/v78/chocolate/images/ztimg/icon_quality.png) no-repeat 5px 17px; padding:28px 0 13px 55px;}
.qualitybox02 li.icon02{background:url(__PUBLIC__/Tpl/v78/chocolate/images/ztimg/icon_quality.png) no-repeat 0 -48px;}
.qualitybox02 li.icon03{background:url(__PUBLIC__/Tpl/v78/chocolate/images/ztimg/icon_quality.png) no-repeat 0 -112px;}
.qualitybox02 li.icon04{background:url(__PUBLIC__/Tpl/v78/chocolate/images/ztimg/icon_quality.png) no-repeat 0 -183px;}
.qualitybox02 li:first-child{ margin-left:60px;}
        </style>
        <div class="overdue" id="newz">
<div class="con">
<img src="__PUBLIC__/Tpl/v78/chocolate/images/ztimg/overdue.png" />
</div>
<div class="bg"></div>
</div>
<div class="banner">
			
			</div>
		<div class="container_box">
			
			<div class="container">
				<div class="content_box content_box_top clearfix">
					<div class="title_pic"><img src="__PUBLIC__/Tpl/v78/chocolate/images/ztimg/Olympic/title_01.png"></div>
					<ul class="yz_ul clearfix">
						<li>
							<div class="li_con">
								<a class="li_img" href="http://www.xyb2b.com/Home/Products/detail/gid/601"><img src="__PUBLIC__/Tpl/v78/chocolate/images/ztimg/Olympic/yz01.png"></a>
								<div class="line">
									<span>6件起发</span>
								</div>
								<p class="li_title"><a href="http://www.xyb2b.com/Home/Products/detail/gid/601">德国爱他美Aptamil白金版奶粉Pre段（0-3个月）800G</a></p>
								<div class="price clearfix">
									<strong>￥<span>175</span></strong>
									<a class="buy_btn" href="http://www.xyb2b.com/Home/Products/detail/gid/601"></a>
								</div>
							</div>
						</li>
						<li>
							<div class="li_con">
								<a class="li_img" href="http://www.xyb2b.com/Home/Products/detail/gid/602"><img src="__PUBLIC__/Tpl/v78/chocolate/images/ztimg/Olympic/yz02.png"></a>
								<div class="line">
									<span>6件起发</span>
								</div>
								<p class="li_title"><a href="http://www.xyb2b.com/Home/Products/detail/gid/602">德国爱他美Aptamil白金版奶粉 1段（3-6个月）800G</a></p>
								<div class="price clearfix">
									<strong>￥<span>175</span></strong>
									<a class="buy_btn" href="http://www.xyb2b.com/Home/Products/detail/gid/602"></a>
								</div>
							</div>
						</li>
						<li>
							<div class="li_con">
								<a class="li_img" href="http://www.xyb2b.com/Home/Products/detail/gid/603"><img src="__PUBLIC__/Tpl/v78/chocolate/images/ztimg/Olympic/yz03.png"></a>
								<div class="line">
									<span>6件起发</span>
								</div>
								<p class="li_title"><a href="http://www.xyb2b.com/Home/Products/detail/gid/603">德国爱他美Aptamil白金版奶粉 2段（6-10个月）800G</a></p>
								<div class="price clearfix">
									<strong>￥<span>175</span></strong>
									<a class="buy_btn" href="http://www.xyb2b.com/Home/Products/detail/gid/603"></a>
								</div>
							</div>
						</li>
					</ul>
				</div>
				<div class="content_box clearfix">
					<div class="title_pic"><img src="__PUBLIC__/Tpl/v78/chocolate/images/ztimg/Olympic/title_02.png"></div>
					<ul class="pz_ul clearfix">
						<li>
							<div class="li_con li_pz_con">
								<a class="li_img" href="http://www.xyb2b.com/Home/Products/detail/gid/86"><img src="__PUBLIC__/Tpl/v78/chocolate/images/ztimg/Olympic/pz02.jpg"></a>
								<div class="line">
									<span>2件起发</span>
								</div>
								<p class="li_title"><a href="http://www.xyb2b.com/Home/Products/detail/gid/86">荷兰美素HeroBaby奶粉 1段（0-6个月）800G</a></p>
								<div class="price clearfix">
									<strong>￥<span>65</span></strong>
									<a class="buy_btn" href="http://www.xyb2b.com/Home/Products/detail/gid/86"></a>
								</div>
							</div>
						</li>
						<li class="last_li">
							<div class="li_con li_pz_con">
								<a class="li_img" href="http://www.xyb2b.com/Home/Products/detail/gid/87"><img src="__PUBLIC__/Tpl/v78/chocolate/images/ztimg/Olympic/pz01.jpg"></a>
								<div class="line">
									<span>2件起发</span>
								</div>
								<p class="li_title"><a href="http://www.xyb2b.com/Home/Products/detail/gid/87">荷兰美素HeroBaby奶粉 2段（6-10个月）800G</a></p>
								<div class="price clearfix">
									<strong>￥<span>65</span></strong>
									<a class="buy_btn" href="http://www.xyb2b.com/Home/Products/detail/gid/87"></a>
								</div>
							</div>
						</li>
					</ul>
					<ul class="pz_ul pz_ul_second clearfix">
						<li>
							<div class="li_con li_pz_con li_pz_2_con">
								<a class="li_img" href="http://www.xyb2b.com/Home/Products/detail/gid/88"><img src="__PUBLIC__/Tpl/v78/chocolate/images/ztimg/Olympic/pz03.jpg"></a>
								<div class="line">
									<span>2件起发</span>
								</div>
								<p class="li_title"><a href="http://www.xyb2b.com/Home/Products/detail/gid/88">荷兰美素HeroBaby奶粉 3段（10-12个月）800G</a></p>
								<div class="price clearfix">
									<strong>￥<span>65</span></strong>
									<a class="buy_btn" href="http://www.xyb2b.com/Home/Products/detail/gid/88"></a>
								</div>
							</div>
						</li>
						<li>
							<div class="li_con li_pz_con li_pz_2_con">
								<a class="li_img" href="http://www.xyb2b.com/Home/Products/detail/gid/89"><img src="__PUBLIC__/Tpl/v78/chocolate/images/ztimg/Olympic/pz04.jpg"></a>
								<div class="line">
									<span>2件起发</span>
								</div>
								<p class="li_title"><a href="http://www.xyb2b.com/Home/Products/detail/gid/89">荷兰美素HeroBaby奶粉 4段（1岁以上）700G</a></p>
								<div class="price clearfix">
									<strong>￥<span>65</span></strong>
									<a class="buy_btn" href="http://www.xyb2b.com/Home/Products/detail/gid/89"></a>
								</div>
							</div>
						</li>
						<li class="last_li">
							<div class="li_con li_pz_con li_pz_2_con">
								<a class="li_img" href="http://www.xyb2b.com/Home/Products/detail/gid/90"><img src="__PUBLIC__/Tpl/v78/chocolate/images/ztimg/Olympic/pz05.jpg"></a>
								<div class="line">
									<span>2件起发</span>
								</div>
								<p class="li_title"><a href="http://www.xyb2b.com/Home/Products/detail/gid/90">荷兰美素HeroBaby奶粉 5段（2岁以上）700G</a></p>
								<div class="price clearfix">
									<strong>￥<span>65</span></strong>
									<a class="buy_btn" href="http://www.xyb2b.com/Home/Products/detail/gid/90"></a>
								</div>
							</div>
						</li>
					</ul>
				</div>
				<div class="content_box clearfix">
					<div class="title_pic"><img src="__PUBLIC__/Tpl/v78/chocolate/images/ztimg/Olympic/title_03.png"></div>
					<ul class="pz_ul_second clearfix cj_ul">
						<li>
							<div class="li_con li_pz_con">
								<a class="li_img" href="http://www.xyb2b.com/Home/Products/detail/gid/542"><img src="__PUBLIC__/Tpl/v78/chocolate/images/ztimg/Olympic/cj01.jpg"></a>
								<div class="line">
									<span>2件起发</span>
								</div>
								<p class="li_title"><a href="http://www.xyb2b.com/Home/Products/detail/gid/542">荷兰牛栏Nutrilon奶粉 1段（0-6个月）850G</a></p>
								<div class="price clearfix">
									<strong>￥<span>116</span></strong>
									<a class="buy_btn" href="http://www.xyb2b.com/Home/Products/detail/gid/542"></a>
								</div>
							</div>
						</li>
						<li>
							<div class="li_con li_pz_con">
								<a class="li_img" href="http://www.xyb2b.com/Home/Products/detail/gid/555"><img src="__PUBLIC__/Tpl/v78/chocolate/images/ztimg/Olympic/cj02.jpg"></a>
								<div class="line">
									<span>2件起发</span>
								</div>
								<p class="li_title"><a href="http://www.xyb2b.com/Home/Products/detail/gid/555">荷兰牛栏Nutrilon奶粉 2段（6-10个月）850G</a></p>
								<div class="price clearfix">
									<strong>￥<span>116</span></strong>
									<a class="buy_btn" href="http://www.xyb2b.com/Home/Products/detail/gid/555"></a>
								</div>
							</div>
						</li>
						<li class="last_li">
							<div class="li_con li_pz_con">
								<a class="li_img" href="http://www.xyb2b.com/Home/Products/detail/gid/544"><img src="__PUBLIC__/Tpl/v78/chocolate/images/ztimg/Olympic/cj03.jpg"></a>
								<div class="line">
									<span>2件起发</span>
								</div>
								<p class="li_title"><a href="http://www.xyb2b.com/Home/Products/detail/gid/544">荷兰牛栏Nutrilon奶粉 3段
（10-12个月）800G</a></p>
								<div class="price clearfix">
									<strong>￥<span>104</span></strong>
									<a class="buy_btn" href="http://www.xyb2b.com/Home/Products/detail/gid/544"></a>
								</div>
							</div>
						</li>
						<li>
							<div class="li_con li_pz_con">
								<a class="li_img" href="http://www.xyb2b.com/Home/Products/detail/gid/543"><img src="__PUBLIC__/Tpl/v78/chocolate/images/ztimg/Olympic/cj04.jpg"></a>
								<div class="line">
									<span>2件起发</span>
								</div>
								<p class="li_title"><a href="http://www.xyb2b.com/Home/Products/detail/gid/543">荷兰牛栏Nutrilon奶粉 4段（1岁以上）800G</a></p>
								<div class="price clearfix">
									<strong>￥<span>104</span></strong>
									<a class="buy_btn" href="http://www.xyb2b.com/Home/Products/detail/gid/543"></a>
								</div>
							</div>
						</li>
						<li>
							<div class="li_con li_pz_con">
								<a class="li_img" href="http://www.xyb2b.com/Home/Products/detail/gid/545"><img src="__PUBLIC__/Tpl/v78/chocolate/images/ztimg/Olympic/cj05.jpg"></a>
								<div class="line">
									<span>2件起发</span>
								</div>
								<p class="li_title"><a href="http://www.xyb2b.com/Home/Products/detail/gid/545">荷兰牛栏Nutrilon奶粉 5段（2岁以上）800G</a></p>
								<div class="price clearfix">
									<strong>￥<span>104</span></strong>
									<a class="buy_btn" href="http://www.xyb2b.com/Home/Products/detail/gid/545"></a>
								</div>
							</div>
						</li>
						<li class="last_li">
							<div class="li_con li_pz_con">
								<a class="li_img" href="http://www.xyb2b.com/Home/Products/detail/gid/538"><img src="__PUBLIC__/Tpl/v78/chocolate/images/ztimg/Olympic/cj06.jpg"></a>
								<div class="line">
									<span>2件起发</span>
								</div>
								<p class="li_title"><a href="http://www.xyb2b.com/Home/Products/detail/gid/538">荷兰牛栏Nutrilon奶粉 6段（3周岁以上）400G</a></p>
								<div class="price clearfix">
									<strong>￥<span>68</span></strong>
									<a class="buy_btn" href="http://www.xyb2b.com/Home/Products/detail/gid/538"></a>
								</div>
							</div>
						</li>
					</ul>
				</div>
				<div class="content_box clearfix">
					<div class="title_pic"><img src="__PUBLIC__/Tpl/v78/chocolate/images/ztimg/Olympic/title_04.png"></div>
					<ul class="pz_ul fx_ul clearfix">
						<li>
							<div class="li_con li_pz_con">
								<a class="li_img" href="http://www.xyb2b.com/Home/Products/detail/gid/152"><img src="__PUBLIC__/Tpl/v78/chocolate/images/ztimg/Olympic/fx01.jpg"></a>
								<div class="line">
									<span>2件起发</span>
								</div>
								<p class="li_title"><a href="http://www.xyb2b.com/Home/Products/detail/gid/152">澳大利亚 德运 Devondale脱脂高钙成人牛奶粉 1KG</a></p>
								<div class="price clearfix">
									<strong>￥<span>59</span></strong>
									<a class="buy_btn" href="http://www.xyb2b.com/Home/Products/detail/gid/152"></a>
								</div>
							</div>
						</li>
						<li class="last_li">
							<div class="li_con li_pz_con">
								<a class="li_img" href="http://www.xyb2b.com/Home/Products/detail/gid/151"><img src="__PUBLIC__/Tpl/v78/chocolate/images/ztimg/Olympic/fx02.jpg"></a>
								<div class="line">
									<span>2件起发</span>
								</div>
								<p class="li_title"><a href="http://www.xyb2b.com/Home/Products/detail/gid/151">澳大利亚 德运 Devondale脱脂高钙成人牛奶粉  1KG</a></p>
								<div class="price clearfix">
									<strong>￥<span>59</span></strong>
									<a class="buy_btn" href="http://www.xyb2b.com/Home/Products/detail/gid/151"></a>
								</div>
							</div>
						</li>
					</ul>
				</div>
				<div class="content_box clearfix position_con">
					<div class="ljfk_title_pic"><img src="__PUBLIC__/Tpl/v78/chocolate/images/ztimg/Olympic/ljfk_title.png"></div>
					
					<ul class="pz_ul fk_ul clearfix">
						<div class="position_bg"></div>
						<li>
							<div class="li_con li_pz_con" style="position:relative; z-index: 999;">
								<a class="li_img" href="http://www.xyb2b.com/Home/Products/detail/gid/2218"><img src="__PUBLIC__/Tpl/v78/chocolate/images/ztimg/Olympic/fk01.jpg"></a>
								<div class="line">
									<span>1件起发</span>
								</div>
								<p class="li_title"><a href="http://www.xyb2b.com/Home/Products/detail/gid/2218">美国健安喜GNC维生素B族胶囊50mg 
缓解熬夜加班疲劳 250粒</a></p>
								<div class="price clearfix">
									<strong>￥<span>115</span></strong>
									<a class="buy_btn" href="http://www.xyb2b.com/Home/Products/detail/gid/2218"></a>
								</div>
							</div>
						</li>
						<li class="">
							<div class="li_con li_pz_con">
								<a class="li_img" href="http://www.xyb2b.com/Home/Products/detail/gid/2214"><img src="__PUBLIC__/Tpl/v78/chocolate/images/ztimg/Olympic/fk02.jpg"></a>
								<div class="line">
									<span>1件起发</span>
								</div>
								<p class="li_title"><a href="http://www.xyb2b.com/Home/Products/detail/gid/2214">美国健安喜GNC葡萄糖酸锌片100mg
补锌提高精子活力 100片</a></p>
								<div class="price clearfix">
									<strong>￥<span>64</span></strong>
									<a class="buy_btn" href="http://www.xyb2b.com/Home/Products/detail/gid/2214"></a>
								</div>
							</div>
						</li>
						<li>
							<div class="li_con li_pz_con">
								<a class="li_img" href="http://www.xyb2b.com/Home/Products/detail/gid/175"><img src="__PUBLIC__/Tpl/v78/chocolate/images/ztimg/Olympic/fk03.jpg"></a>
								<div class="line">
									<span>1件起发</span>
								</div>
								<p class="li_title"><a href="http://www.xyb2b.com/Home/Products/detail/gid/175">美国健安喜GNCtriflex优骨力片
（关节快速舒适） 240粒</a></p>
								<div class="price clearfix">
									<strong>￥<span>290</span></strong>
									<a class="buy_btn" href="http://www.xyb2b.com/Home/Products/detail/gid/175"></a>
								</div>
							</div>
						</li>
						<li>
							<div class="li_con li_pz_con">
								<a class="li_img" href="http://www.xyb2b.com/Home/Products/detail/gid/566"><img src="__PUBLIC__/Tpl/v78/chocolate/images/ztimg/Olympic/fk04.jpg"></a>
								<div class="line">
									<span>2件起发</span>
								</div>
								<p class="li_title"><a href="http://www.xyb2b.com/Home/Products/detail/gid/566">美国健安喜GNC褪黑素3mg 120粒</a></p>
								<div class="price clearfix">
									<strong>￥<span>46</span></strong>
									<a class="buy_btn" href="http://www.xyb2b.com/Home/Products/detail/gid/566"></a>
								</div>
							</div>
						</li>
						<li>
							<div class="li_con li_pz_con">
								<a class="li_img" href="http://www.xyb2b.com/Home/Products/detail/gid/180"><img src="__PUBLIC__/Tpl/v78/chocolate/images/ztimg/Olympic/fk05.jpg"></a>
								<div class="line">
									<span>1件起发</span>
								</div>
								<p class="li_title"><a href="http://www.xyb2b.com/Home/Products/detail/gid/180">美国健安喜GNC女士水解胶原蛋白片
含玻尿酸 180粒</a></p>
								<div class="price clearfix">
									<strong>￥<span>116</span></strong>
									<a class="buy_btn" href="http://www.xyb2b.com/Home/Products/detail/gid/180"></a>
								</div>
							</div>
						</li>
						<li>
							<div class="li_con li_pz_con">
								<a class="li_img" href="http://www.xyb2b.com/Home/Products/detail/gid/2198"><img src="__PUBLIC__/Tpl/v78/chocolate/images/ztimg/Olympic/fk06.jpg"></a>
								<div class="line">
									<span>1件起发</span>
								</div>
								<p class="li_title"><a href="http://www.xyb2b.com/Home/Products/detail/gid/2198">美国健安喜GNC健安喜男士前列腺配
方综合维生素片 90粒</a></p>
								<div class="price clearfix">
									<strong>￥<span>110</span></strong>
									<a class="buy_btn" href="http://www.xyb2b.com/Home/Products/detail/gid/2198"></a>
								</div>
							</div>
						</li>
						<li>
							<div class="li_con li_pz_con">
								<a class="li_img" href="http://www.xyb2b.com/Home/Products/detail/gid/2200"><img src="__PUBLIC__/Tpl/v78/chocolate/images/ztimg/Olympic/fk07.jpg"></a>
								<div class="line">
									<span>1件起发</span>
								</div>
								<p class="li_title"><a href="http://www.xyb2b.com/Home/Products/detail/gid/2200">美国健安喜GNC葫芦巴配方精氨酸胶
囊提升男士持久力 60粒</a></p>
								<div class="price clearfix">
									<strong>￥<span>101</span></strong>
									<a class="buy_btn" href="http://www.xyb2b.com/Home/Products/detail/gid/2200"></a>
								</div>
							</div>
						</li>
						<li>
							<div class="li_con li_pz_con">
								<a class="li_img" href="http://www.xyb2b.com/Home/Products/detail/gid/2203"><img src="__PUBLIC__/Tpl/v78/chocolate/images/ztimg/Olympic/fk08.jpg"></a>
								<div class="line">
									<span>1件起发</span>
								</div>
								<p class="li_title"><a href="http://www.xyb2b.com/Home/Products/detail/gid/2203">美国健安喜GNC 玛卡片 秘鲁MACA
含精氨酸 60粒</a></p>
								<div class="price clearfix">
									<strong>￥<span>96</span></strong>
									<a class="buy_btn" href="http://www.xyb2b.com/Home/Products/detail/gid/2203"></a>
								</div>
							</div>
						</li>
						<li>
							<div class="li_con li_pz_con">
								<a class="li_img" href="http://www.xyb2b.com/Home/Products/detail/gid/563"><img src="__PUBLIC__/Tpl/v78/chocolate/images/ztimg/Olympic/fk09.jpg"></a>
								<div class="line">
									<span>1件起发</span>
								</div>
								<p class="li_title"><a href="http://www.xyb2b.com/Home/Products/detail/gid/563">美国健安喜GNC运动型左旋肉碱 60片</a></p>
								<div class="price clearfix">
									<strong>￥<span>95</span></strong>
									<a class="buy_btn" href="http://www.xyb2b.com/Home/Products/detail/gid/563"></a>
								</div>
							</div>
						</li>
						<li>
							<div class="li_con li_pz_con">
								<a class="li_img" href="http://www.xyb2b.com/Home/Products/detail/gid/215"><img src="__PUBLIC__/Tpl/v78/chocolate/images/ztimg/Olympic/fk10.jpg"></a>
								<div class="line">
									<span>1件起发</span>
								</div>
								<p class="li_title"><a href="http://www.xyb2b.com/Home/Products/detail/gid/215">美国Nature Star视力宝 60粒</a></p>
								<div class="price clearfix">
									<strong>￥<span>110</span></strong>
									<a class="buy_btn" href="http://www.xyb2b.com/Home/Products/detail/gid/215"></a>
								</div>
							</div>
						</li>
						<li>
							<div class="li_con li_pz_con">
								<a class="li_img" href="http://www.xyb2b.com/Home/Products/detail/gid/1406"><img src="__PUBLIC__/Tpl/v78/chocolate/images/ztimg/Olympic/fk11.jpg"></a>
								<div class="line">
									<span>2件起发</span>
								</div>
								<p class="li_title"><a href="http://www.xyb2b.com/Home/Products/detail/gid/1406">德国双心Doppelherz 日夜护眼胶囊 
增强视力缓解眼疲劳 30粒</a></p>
								<div class="price clearfix">
									<strong>￥<span>47</span></strong>
									<a class="buy_btn" href="http://www.xyb2b.com/Home/Products/detail/gid/1406"></a>
								</div>
							</div>
						</li>
						<li>
							<div class="li_con li_pz_con">
								<a class="li_img" href="http://www.xyb2b.com/Home/Products/detail/gid/1787"><img src="__PUBLIC__/Tpl/v78/chocolate/images/ztimg/Olympic/fk12.jpg"></a>
								<div class="line">
									<span>1件起发</span>
								</div>
								<p class="li_title"><a href="http://www.xyb2b.com/Home/Products/detail/gid/1787">美国过敏研究组AllergyResearch
Group 护眼胶囊 200粒</a></p>
								<div class="price clearfix">
									<strong>￥<span>296</span></strong>
									<a class="buy_btn" href="http://www.xyb2b.com/Home/Products/detail/gid/1787"></a>
								</div>
							</div>
						</li>
						
					</ul>
				</div>
				<div class="content_box clearfix" style="margin-bottom:160px">
					<div class="ljfk_title_pic yzbb_title_pic"><img src="__PUBLIC__/Tpl/v78/chocolate/images/ztimg/Olympic/yzbb_title.png"></div>
					<div class="ay_box">
						<div class="ay_content clearfix">
							<div class="left fl">
								<a class="ay_img" href="http://www.xyb2b.com/Home/Products/detail/gid/1848"><img src="__PUBLIC__/Tpl/v78/chocolate/images/ztimg/Olympic/ay01.jpg"></a>
								<div class="line">
									<span>1件起发</span>
								</div>
								<p class="left_title"><a href="http://www.xyb2b.com/Home/Products/detail/gid/1848">韩国SNP燕窝补水面膜 25ml*10</a></p>
								<div class="price clearfix">
									<strong>￥<span>67</span></strong>
									<a class="buy_btn" href="http://www.xyb2b.com/Home/Products/detail/gid/1848"></a>
								</div>
							</div>
							<div class="middle left fl">
								<a class="ay_img" href="http://www.xyb2b.com/Home/Products/detail/gid/533"><img src="__PUBLIC__/Tpl/v78/chocolate/images/ztimg/Olympic/ay02.jpg"></a>
								<div class="line">
									<span>1件起发</span>
								</div>
								<p class="left_title" style="margin-top:6px"><a href="http://www.xyb2b.com/Home/Products/detail/gid/533">日本绢肌物语豆乳乳液100ml</a></p>
								<div class="price clearfix">
									<strong>￥<span>40</span></strong>
									<a class="buy_btn" href="http://www.xyb2b.com/Home/Products/detail/gid/533"></a>
								</div>
							</div>
							<div class="right left fr">
								<a class="ay_img" href="http://www.xyb2b.com/Home/Products/detail/gid/1849"><img src="__PUBLIC__/Tpl/v78/chocolate/images/ztimg/Olympic/ay03.jpg"></a>
								<div class="line">
									<span>2件起发</span>
								</div>
								<p class="left_title"><a href="http://www.xyb2b.com/Home/Products/detail/gid/1849">韩国JAYJUN水光面膜 25ml*10</a></p>
								<div class="price clearfix">
									<strong>￥<span>98</span></strong>
									<a class="buy_btn" href="http://www.xyb2b.com/Home/Products/detail/gid/1849"></a>
								</div>
							</div>
						</div>
						
					</div>
					<div class="yz_box">
						<div class="yz_title"><img src="__PUBLIC__/Tpl/v78/chocolate/images/ztimg/Olympic/yz_title.png"></div>
						<ul class="yz_top clearfix">
							<li>
								<div class="yz_img_top">
									<a class="yz_img" href="http://www.xyb2b.com/Home/Products/detail/gid/2432"><img src="__PUBLIC__/Tpl/v78/chocolate/images/ztimg/Olympic/yz01.jpg"></a>
									<span>2件起发</span>
								</div>
								<p class="yz_title"><a href="http://www.xyb2b.com/Home/Products/detail/gid/2432">日本花王KAO 蒸汽洋甘菊味眼罩 14枚</a></p>
								<div class="price clearfix">
									<strong>
										￥<span>60</span></strong>
									<a class="yz_btn" href="http://www.xyb2b.com/Home/Products/detail/gid/2432"></a>
								</div>
							</li>
							<li class="last_li">
								<div class="yz_img_top">
									<a class="yz_img" href="http://www.xyb2b.com/Home/Products/detail/gid/2431"><img src="__PUBLIC__/Tpl/v78/chocolate/images/ztimg/Olympic/yz02.jpg"></a>
									<span>2件起发</span>
								</div>
								<p class="yz_title"><a href="http://www.xyb2b.com/Home/Products/detail/gid/2431">日本花王KAO 蒸汽玫瑰味眼罩 14枚</a></p>
								<div class="price clearfix">
									<strong>
										￥<span>60</span></strong>
									<a class="yz_btn" href="http://www.xyb2b.com/Home/Products/detail/gid/2431"></a>
								</div>
							</li>
							
						</ul>
						<ul class="yz_top yz_bottom clearfix">
							<li>
								<div class="yz_img_top">
									<a class="yz_img" href="http://www.xyb2b.com/Home/Products/detail/gid/1742"><img src="__PUBLIC__/Tpl/v78/chocolate/images/ztimg/Olympic/yz03.jpg"></a>
									<span>2件起发</span>
								</div>
								<p class="yz_title"><a href="http://www.xyb2b.com/Home/Products/detail/gid/1742">日本花王KAO 蒸汽无香味眼罩 14枚</a></p>
								<div class="price clearfix">
									<strong>
										￥<span>60</span></strong>
									<a class="yz_btn" href="http://www.xyb2b.com/Home/Products/detail/gid/1742"></a>
								</div>
							</li>
							<li>
								<div class="yz_img_top">
									<a class="yz_img" href="http://www.xyb2b.com/Home/Products/detail/gid/1741"><img src="__PUBLIC__/Tpl/v78/chocolate/images/ztimg/Olympic/yz04.jpg"></a>
									<span>2件起发</span>
								</div>
								<p class="yz_title"><a href="http://www.xyb2b.com/Home/Products/detail/gid/1741">日本花王KAO 蒸汽薰衣草味眼罩 14枚</a></p>
								<div class="price clearfix">
									<strong>
										￥<span>60</span></strong>
									<a class="yz_btn" href="http://www.xyb2b.com/Home/Products/detail/gid/1741"></a>
								</div>
							</li>
							<li class="last_li">
								<div class="yz_img_top">
									<a class="yz_img" href="http://www.xyb2b.com/Home/Products/detail/gid/2433"><img src="__PUBLIC__/Tpl/v78/chocolate/images/ztimg/Olympic/yz05.jpg"></a>
									<span>2件起发</span>
								</div>
								<p class="yz_title"><a href="http://www.xyb2b.com/Home/Products/detail/gid/2433">日本花王KAO 蒸汽柚子香味眼罩 14枚</a></p>
								<div class="price clearfix">
									<strong>
										￥<span>60</span></strong>
									<a class="yz_btn" href="http://www.xyb2b.com/Home/Products/detail/gid/2433"></a>
								</div>
							</li>
						</ul>
					</div>
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