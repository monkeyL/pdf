<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
    <head>
    <title><?php echo ($common_title); echo ($page_title); ?></title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="keywords" content="<?php echo ($common_keywords); ?>">
    <meta name="description" content="<?php echo ($common_desc); ?>">
    <link href="__PUBLIC__/Lib/jquery/css/base/jquery-ui.css" rel="stylesheet">
    <link rel="stylesheet" href="__PUBLIC__/Lib/thinkbox/css/style.css">
    <script src="__PUBLIC__/Lib/jquery/js/jquery-1.8.3.js"></script>
    <script src="__PUBLIC__/Lib/jquery/js/jquery-ui-1.9.2.custom.js"></script>
    <script src="__PUBLIC__/Lib/validate/jquery.validate.1.9.js"></script>
    <script src="__PUBLIC__/Lib/validate/jquery.metadata.js"></script>
    <script src="__PUBLIC__/Lib/validate/messages_cn.js"></script>
    <script src="__PUBLIC__/Admin/js/common.js"></script>
    <script src="__PUBLIC__/Common/js/global.js"></script>
    <link href="__PUBLIC__/Admin/css/global.css" rel="stylesheet">
    <!--[if IE 6]>
        <script type="text/javascript" src="__PUBLIC__/Admin/js/iepng.js"></script>
        <script type="text/javascript">
        EvPNG.fix("#pngImg,.sliderNavBox dl dd");
        </script>
    <![endif]-->
	<script>
        function U(url) {
            return ("__WEBROOT__"+url).replace('//','/'); 
        }
    </script>
</head>
	<?php if(!empty($_SESSION['OSS']['GY_OSS_PIC_URL']) || (!empty($_SESSION['OSS']['GY_OTHER_IP']) && !empty($_SESSION['OSS']['GY_OTHER_ON']) )){ ?>
    <input type="hidden" value="1" id="oss_id" />
   	<?php }else{ ?>
   	<input type="hidden" value="0" id="oss_id" />
   	<?php } ?>
	<?php if($_SESSION['OSS']['GY_QN_ON'] == '1'){ ?>
    <input type="hidden" value="1" id="qn_id" />
   	<?php }else{ ?>
   	<input type="hidden" value="0" id="qn_id" />
   	<?php } ?>
    <body class="mainBox">
        <div id="J_ajax_loading" class="ajax_loading">提交请求中，请稍候...</div>
        <div class="header">
            <!--顶部LOGO和导航-->
<div class="headerBox">
    <h1><a href="#"><img  id="pngImg" <?php if($admin_logo == '/Public/Admin/images/logo.png'): ?>src="__PUBLIC__/Admin/images/logo.png"<?php else: ?>src="<?php echo ($admin_logo); ?>"<?php endif; ?> width="195" height="70"/></a></h1>
    <ul>
        <?php if(is_array($tops)): $i = 0; $__LIST__ = $tops;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$top): $mod = ($i % 2 );++$i;?><li <?php if(($i) == $nav1): ?>class='on'<?php endif; ?> nav="<?php echo ($i); ?>"><a href="<?php echo ($top["url"]); ?>"><?php echo ($top["name"]); ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
    </ul>
</div>
        </div><!-- header end -->
        <div id="tip_dialog">
            
        </div>
        <div class="contentBox">
            <div class="sidebar">
                <div class="sildebarBox">
                    <div class="sidebarMasg">
                        <h2><?php echo (L("TOP_HELLO")); ?><span><?php echo (session('admin_name')); ?></span></h2>
                        <ul>
                            <h3>待办事务</h3>
                            <li>
							<a href="<?php echo U('Admin/Orders/pageWaitDeliverOrdersList');?>" style="color:#fff;">待发货订单(<?php echo ($wtrade_num); ?>笔)</a>&nbsp;
							<a href="<?php echo U('Admin/Seo/deleteMemcache');?>" style="float:right;color:#fff;">清空缓存</a>
							</li>
                        </ul>
                        <a href="###">&nbsp;</a>
                        <a href="<?php echo U('Home/Index/index');?>" target="_blank" class="sc" title="<?php echo (L("TOP_HOME")); ?>"><?php echo (L("TOP_HOME")); ?></a>
                        <a href="<?php echo U('Admin/User/doLogout');?>" class="out" title="<?php echo (L("TOP_LOGOUT")); ?>"><?php echo (L("TOP_LOGOUT")); ?></a>
                        <a href="<?php echo U('Admin/Index/index');?>" class="more" title="<?php echo (L("MORE")); ?>"><?php echo (L("MORE")); ?></a>
                        <a href="<?php echo U('Admin/System/pageEditAdminPasswd');?>" class="editpasswd" title="<?php echo (L("EDITPW")); ?>"><?php echo (L("EDITPW")); ?></a>
                        <a href="javascript:void(0);" data-uri='<?php echo U("Admin/Index/getMap");?>' class="map" id="GyMap" title="后台地图"></a>
                    
                    </div>   
            		
                    <!-- 侧导航开始 -->
                    <!--左侧导航-->
                    <div class="sliderNavBox" id="sliderNavBox">
                        
<div id="sliderNavBoxInner" style="display: block; overflow:visible;">
    <?php if(is_array($menus[$nav1])): $k = 0; $__LIST__ = $menus[$nav1];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$menu1): $mod = ($k % 2 );++$k; $mk = $key; ?>
        <h2><img class="title" <?php if(($nav2) == $key): ?>src="__PUBLIC__/Admin/images/silderNavIcoF.png"<?php else: ?>src="__PUBLIC__/Admin/images/silderNavIcoJ.png"<?php endif; ?> /><?php echo ($menu1[0]['name']); ?></h2>
        <dl <?php if(($nav2) != $key): ?>style="display: none;"<?php endif; ?> >
            <?php if(is_array($menu1)): $i = 0; $__LIST__ = $menu1;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$menu2): $mod = ($i % 2 );++$i; if(($i) != "1"): ?><dd <?php if(($key == $nav3) and ($mk == $nav2)): ?>class="on"<?php endif; ?> ><a href="<?php echo ($menu2['url']); ?>"><?php echo ($menu2['name']); ?></a></dd><?php endif; endforeach; endif; else: echo "" ;endif; ?>
        </dl><?php endforeach; endif; else: echo "" ;endif; ?>
    <div class="clear"></div>
</div>
                    </div>
                    
                    <!-- 侧导航结束 -->
                </div>
            </div><!-- 左侧结束 -->
            <!-- 中间内容开始 -->
            <div class="breadcrumb">
                <!--面包屑导航-->
<a href="<?php echo ($bread0["url"]); ?>"><?php echo ($bread0["name"]); ?></a>
 &nbsp;>&nbsp;
 <?php if(($bread1["name"]) != ""): ?><a href="<?php echo ($bread1["url"]); ?>"><?php echo ($bread1["name"]); ?></a><?php endif; ?>
 <?php if(($bread2["name"]) != ""): ?>&nbsp;>&nbsp;<a href="<?php echo ($bread2["url"]); ?>"><?php echo ($bread2["name"]); ?></a><?php endif; ?>
 <?php if(($bread3["name"]) != ""): ?>&nbsp;>&nbsp;<?php echo ($bread3["name"]); endif; ?>
            </div>
            <div class="content">
                <?php if($is_user_access == '1'){ ?>
                <div class="rightInner tableColor">
    <form method="get" action="<?php echo U('Admin/Memberlevel/doDel');?>" id="members_del">
    <table width="100%" class="tbList">
        <thead>
            <tr class="title">
                <th colspan="99">
                    <?php if($erp["SWITCH"] == '1'): ?><div class="TtopLeft">
                            <a class="btnB synMemberlevelAll add" href="javascript:;" data-type="ajax" data-uri='<?php echo U("Admin/Memberlevel/showMemberLevelCount");?>'>同步会员等级</a>
                        </div>
                    <?php else: ?>    
                        会员等级列表<?php endif; ?>
                    
                </th>
            </tr>
            <tr>
                <th><input type="checkbox" class="checkbox checkAll" /></th>
                <th>操作</th>
                <th>等级名称</th>
                <th>等级晋升</th>
                <th>等级折扣</th>
				<!--
                <th>等级返点</th>
				-->
                <th>是否包邮</th> 
                <th>是否默认</th>     
                <?php if($erp["SWITCH"] == '1'): ?><th>状态</th>
                    <th>ERP数据状态</th><?php endif; ?>
                
            </tr>
        </thead>
        <tbody>
            <?php if(is_array($members_level)): $i = 0; $__LIST__ = $members_level;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$level): $mod = ($i % 2 );++$i;?><tr>
                <td><input type="checkbox" class="checkSon" name="ml_id[]" value="<?php echo ($level["ml_id"]); ?>" /></td>
                <td>
                    <a href='<?php echo U("Admin/Memberlevel/pageEdit?mlid=$level[ml_id]");?>'>编辑</a> 
                    <a href='<?php echo U("Admin/Memberlevel/doDel?ml_id=$level[ml_id]");?>' class="confirm">删除</a>
                  
                </td>
                
                <td><?php echo ($level["ml_name"]); ?></td>
                <td><?php echo ($level["ml_up_fee"]); ?></td>
                <td ><?php echo ($level["ml_discount"]); ?>%</td>
				<!--
                <td ><?php echo ($level["ml_rebate"]); ?>%</td>
				-->
                <td>
                    <?php if($level["ml_free_shipping"] == '1'): ?>是
                    <?php else: ?>
                        否<?php endif; ?>
                </td>
                <td><input type="radio" class="ml_default" id="ml_default_<?php echo ($level["ml_id"]); ?>" name="ml_default" data-uri='<?php echo U("Admin/Memberlevel/doEditLevelDefault");?>' data-id="<?php echo ($level[ml_id]); ?>" data-field="ml_default" data-value="<?php echo ($level["ml_default"]); ?>" <?php if(($level["ml_default"]) == "0"): ?>value="0"<?php else: ?>value="1"  checked="checked"<?php endif; ?> /></td>
            </tr><?php endforeach; endif; else: echo "" ;endif; ?>
            <?php if(empty($members_level)): ?><tr><td colspan="99" class="left">暂时没有数据!</td></tr><?php endif; ?>
        </tbody>
        <tfoot>
            <tr>
                <td colspan="99">
<!--                    <input type="submit" value="删除选中" class="btnA confirm" id="delAll" />-->
                    <span class="right page"><?php echo ($page); ?></span></td>
            </tr>
        </tfoot>
    </table>
    </form>
    <div class="clear"></div>
    <div id="tip_div"></div>
</div>
<script>
var page_size = 1;
var page_no = 0;
var page_num = 0
var total_memberLevel = 0;

var succRows	= 0;
var errRows		= 0;
$(document).ready(function(){
    $("input[name='ml_default']").click(function(){
        var url = $(this).attr("data-uri");
        var field = $(this).attr('data-field');
        var id   = $(this).attr('data-id');
        var val  = ($(this).attr('data-value'))== 0 ? 1 : 0;
        $.ajax({
            url:url,
            cache:false,
            dataType:"json",
            data: {id:id, field:field, val:val},
            type:"POST",
            beforeSend:function(){
                $("#J_ajax_loading").stop().removeClass('ajax_error').addClass('ajax_loading').html("提交请求中，请稍候...").show();
            },
            error:function(){
                $("#J_ajax_loading").addClass('ajax_error').html("AJAX请求发生错误！").show().fadeOut(5000);
            },
            success:function(msgObj){
                $("#J_ajax_loading").hide();
                if(msgObj.status == '1'){
                    $("#J_ajax_loading").addClass('ajax_success').html(msgObj.info).show().fadeOut(5000);
                }else{
                    $("#J_ajax_loading").addClass('ajax_error').html(msgObj.info).show().fadeOut(5000);
                }
            }
        });
    });
    //同步单个会员等级
    $(".synMemberlevelOne").live('click',function(){
            var url = '<?php echo U("Admin/Memberlevel/synMemberLevelOne");?>';
            var guid   = $(this).attr('data-guid');
            var val = $(this).attr('data-id');
            
            $.ajax({
                url:url,
                cache:false,
                dataType:"json",
                data: {guid:guid,page_size:1, page_no:1},
                type:"POST",
                beforeSend:function(){
                    $("#J_ajax_loading").stop().removeClass('ajax_error').addClass('ajax_loading').html("提交请求中，请稍候...").show();
                },
                error:function(){
                    $("#J_ajax_loading").addClass('ajax_error').html("AJAX请求发生错误！").show().fadeOut(5000);
                },
                success:function(msgObj){
                    $("#J_ajax_loading").hide();
                    if(msgObj.success == '1'){
                        $("#J_ajax_loading").addClass('ajax_success').html(msgObj.info).show().fadeOut(5000);
                        var strHtml = '';
                        strHtml += '<span style="color:green;">已同步</span>';
                        $("#syn_"+val).html(strHtml);
                    }else{
                        $("#J_ajax_loading").removeClass("ajax_success").addClass('ajax_error').html(msgObj.info).show().fadeOut(5000);
                    }
                }
            });
        });
    
    $(".synMemberlevelAll").live('click',function(){
        $('#tip_div').html('');
        var url = $(this).attr("data-uri");
        $.ajax({
            url:url,
            cache:false,
            dataType:'TEXT',
            data:{},
            success:function(msgObj){
                var total = parseInt(msgObj);
		total_memberLevel = total;
		page_num = Math.ceil(total/page_size);
                $("#tip_div").dialog({
                    width:450,
                    height:240,
                    modal:true,
                    title:'会员等级同步 [ 共有 <span style="font-weight:bold; color:#F00;">' + total + '</span> 条会员等级记录]',
                    buttons:{
                        '确定':function(){
                            $(this).dialog("close");
                        }
                    }
                });
                page_no = 0;
                saveAll();
            }
        });
        
    });
    
    
    
});

function saveAll(){
    page_no++;
    if(page_no <= page_num){
        var w = Math.ceil((page_no / page_num) * 400);
        var p = Math.ceil((page_no / page_num) * 100);
        var innerHtmls = '<p align="center"><img src="__PUBLIC__/Admin/images/ajaxloading.gif"/>';
        innerHtmls += '<span>正在同步第' + page_no + '条数据，共' + page_num + '条，请稍后......'+p+'%</span></p>';
        innerHtmls += '<p><div style="min-width:400px; width:auto; min-height:8px; height:auto; border:1px solid silver; padding:2px; border-radius: 3px; -moz-border-radius: 3px; -webkit-border-radius: 3px;"><div id="loading" style="height:8px; background-color:green; border-radius: 2px; -moz-border-radius: 2px; -webkit-border-radius: 2px;"></div></div></p>';
        $('#tip_div').html(innerHtmls);
        $("#loading").css("width",w+'px');
        $.ajax({
            url:'<?php echo U("Admin/Memberlevel/synMemberLevelOne");?>',
            cache:false,
            dataType:'json',
            type:'POST',
            data:{'page_size':page_size, 'page_no':page_no},
            success:function(msgObj){
                succRows = succRows+msgObj.succRows;
                errRows	= errRows+msgObj.errRows;
                if(page_no == page_num){
                    var after_message = '<b>全部会员等级同步完成，共同步成功<span style="color:#f00;">' + succRows + '</span>条数据！</b>'+
                    '<b>同步失败<span style="color:red;">' + errRows + '</span>条数据！</b>';
                    $('#tip_div').html(after_message);
                }
                saveAll();
            }
        });
    }else{
        page_no = 0;
        succRows	= 0;
    	errRows		= 0;
    }

}
</script>
                <?php } ?>

                <?php if($is_user_access != 1): ?>您无权限访问此页。<?php endif; ?>
            </div>
            <!--<div class="fav-nav" style="background: url('__PUBLIC__/Admin/images/fav-nav-bg.png') repeat-x scroll left top transparent;height: 28px;line-height: 28px;">-->
			<div class="fav-nav" style="height: 28px;line-height: 28px;">               
			   <div style="text-align: center; width: 100%;" id="index_footer_text">版权所有 上海管易云</div>
                <div id="panellist"></div>
                <div id="paneladd"></div>
                <input type="hidden" id="menuid" value="">
                <input type="hidden" id="bigid" value="" />
                <div id="help" class="fav-help"></div>
            </div>
        </div>
        <!--后台页脚-->
<script src="__PUBLIC__/Lib/jquery/js/jquery-ui-sliderAccess.js"></script>
<script src="__PUBLIC__/Lib/jquery/js/jquery-ui-timepicker-addon.js"></script>
<script src="__PUBLIC__/Lib/jquery/js/jquery-ui-timepicker-zh-CN.js"></script>

        <!--弹出框-->
<div id="alert" style="display: none;" title="系统提示">
    <table width="100%">
        <tr>
            <td style="padding:5px; vertical-align: top;"><div id="alert_face" class=""></div></td>
            <td style="padding:5px; vertical-align: top;">
                <div id="alert_title">提示标题</div>
                <div id="alert_msg">提示内容</div>
            </td>
        </tr>
    </table>
</div>
<!--End of 弹出框-->
        <div style="width: 0px; height: 0px; overflow: hidden; visibility: hidden; clear: both;">
    <audio id="reader" src="" autoplay="autoplay" onended="javascript:void(0);" onemptied="javascript:void(0);" onerror="javascript:void(0);" />
</div>
		<script type="text/javascript">
			//load();
			function load(){
				$.ajax({
				    url:'<?php echo U("Script/Batch/ajaxAsynchronous");?>',//请求的url地址 
					type:"post", //请求的方式 
					dataType:"json", //数据的格式
					data:{}, //请求的数据 
					success:function(data){ //请求成功时，处理返回来的数据 
						
					} 
				})
			}
			/**
            var footer_text = '';
            var footer_text_index = 0;
            function footerTextWaveEffect(){
                var str = footer_text;
                var array_text = str.split('');
                for(var i =0;i<array_text.length;i++){
                    if(i == footer_text_index){
                        array_text[i] = '<span style="color:#ff0000;font-size:18px;">' + array_text[i] + '</span>';
                    }
                }
                $("#index_footer_text").html(array_text.join(''));
                footer_text_index ++ ;
                if(array_text[footer_text_index] == ' '){
                    footer_text_index ++;
                }
                if(footer_text_index >= array_text.length){
                    footer_text_index = 0;
                }
            }
            //默认页面加载
            $(document).ready(function(){
                footer_text = $("#index_footer_text").html();
                setInterval("footerTextWaveEffect()",350);
            });
			**/
		</script>
        <script type="text/javascript" src="alires://MsgHistory/unknownurl.pnghttp://g.tbcdn.cn/sj/securesdk/0.0.3/securesdk_v2.js" id="J_secure_sdk_v2" data-appkey="12541234"></script>
    </body>
</html>