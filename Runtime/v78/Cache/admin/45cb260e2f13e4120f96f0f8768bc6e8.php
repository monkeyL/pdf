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
							<a href="<?php echo U('Admin/Seo/deleteRedis');?>" style="float:right;color:#fff;">清空缓存</a>
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
                <div class="rightInner">
    <form id="members_form" name="members_form" method="post" action="<?php echo U('Admin/Members/doAdd');?>" enctype="multipart/form-data">
        <table class="tbForm" width="100%">
            <thead>
                <tr class="title">
                    <th colspan="99">新建会员</th>
                </tr>
            </thead>
            <tbody>
                <?php if(is_array($ary_extend_data)): $i = 0; $__LIST__ = $ary_extend_data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$data): $mod = ($i % 2 );++$i;?><tr>
                        <td class="first"><?php if($data["fields_content"] == 'm_email' || $data["fields_content"] == 'm_name' || $data["fields_content"] == 'm_password' || $data["fields_content"] == 'm_password_1' || $data["fields_content"] == 'e_mail'): ?><span class="red">*</span><?php endif; echo ($data["field_name"]); ?>：</td>
                        <td>
                            <?php if($data["fields_type"] == 'radio'): if(is_array($data["fields_content"])): $i = 0; $__LIST__ = $data["fields_content"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$field_content): $mod = ($i % 2 );++$i;?><input name="extend_field_<?php echo ($data["id"]); ?>" type="<?php echo ($data["fields_type"]); ?>"  value="<?php echo ($field_content); ?>" <?php if(($field_content) == $data[content][$field_content]): ?>checked="checked"<?php endif; ?> <?php if(($data["is_need"] == 1)): ?>validate="{ required:true}"<?php endif; ?>/><?php echo ($field_content); ?>&nbsp;&nbsp;<?php endforeach; endif; else: echo "" ;endif; endif; ?>
                            <?php if($data["fields_type"] == 'checkbox'): if(is_array($data["fields_content"])): $i = 0; $__LIST__ = $data["fields_content"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$field_content): $mod = ($i % 2 );++$i;?><input name="extend_field_<?php echo ($data["id"]); ?>[]" type="<?php echo ($data["fields_type"]); ?>"  value="<?php echo ($field_content); ?>" <?php if(($field_content) == $data[content][$field_content]): ?>checked="checked"<?php endif; ?> <?php if(($data["is_need"] == 1)): ?>validate="{ required:true}"<?php endif; ?>/><?php echo ($field_content); ?>&nbsp;&nbsp;<?php endforeach; endif; else: echo "" ;endif; endif; ?>
                            <?php if($data["fields_type"] == 'select'): if($data["id"] == 14 ): ?><style type="text/css">
.loading-box{background-color:#FFF8ED;width:auto;min-width:100px;font-size:16px;padding:3px;border:1px solid #FF9900;display:none;}
</style>

<select id="province" name="province" class="medium city_region_select" child_id="city" val="<?php echo ($region['province']); ?>">
   <option value="0" selected="selected">请选择省份</option>
</select>
<select id="city" name="city" child_id="region1" class="medium city_region_select" val="<?php echo ($region['city']); ?>" >
   <option value="0" selected="selected">请选择城市</option>
</select>
<select id="region1" name="region1" child_id="" class="medium city_region_select" val="<?php echo ($region['region']); ?>" >
   <option value="0" selected="selected">请选择地区</option>
</select>
<span class="loading-box">请稍等，载入中......</span>
<script type="text/javascript">
$(document).ready(function(){
	//文档载入完成以后自动加载一级省市区
    loadChildCityRegion(1,'province',$('#province'));
	$(".city_region_select").change(function(){
		$(".city_region_select").attr({'val':''});
		var parent_id = $(this).val();
		var selectDomId = $(this).attr("child_id");
		loadChildCityRegion(parent_id,selectDomId,this);
	});
});
function openLoadingBox(){
	$(".loading-box").show();
}
function closeLoadingBox(){
	$(".loading-box").hide();
}
function loadChildCityRegion(parent_id,selectDomId,clickObj){
	//如果当前选中的行政区ID小于等于0，则表示选择的是“请选择”，将后面的行政区select清楚
	$(clickObj).nextAll("select").hide().empty();
	
	//如果选中了“请选择”，则不理会。
	if(parent_id <= 0 || "region" == $(clickObj).attr("id")){
		return false;
	}
	
	//定义异步加载行政区的url
	var load_options_url = "<?php echo U('Admin/Members/cityRegionOptions');?>";
	//ajax异步加载下一级行政区域数据
	$.ajax({
		url:load_options_url,
		data:{parent_id:parent_id},
		beforeSend:openLoadingBox(),
		type:'POST',
		success:function(jsonObj){
			if(true === jsonObj.status && null !== jsonObj.data){
				$(clickObj).next("select").show();
				//select options 元素数据拼接
				var html_options = '<option value="0" selected="selected">请选择</option>';
				var next_child_parent = 0;
				for(var index in jsonObj.data){
					html_options += '<option value="' + index + '" ';
					if(index == $(clickObj).attr('val')){
						html_options += 'selected="selected" ';
						next_child_parent = index;
					}
					html_options += '>' + jsonObj.data[index] + '</option>';
				}

				//将拼接的结果追加到DOM中
				$("#" + selectDomId).html(html_options);
				
				//递归加载数据，用于初始化的时候
				if(next_child_parent > 0){
					var selectChildDomId = $("#" + selectDomId).attr("child_id");
					loadChildCityRegion(next_child_parent,selectChildDomId,$("#" + selectChildDomId));
				}
				
				//对空seletet元素进行隐藏操作
				if($("#province").val() <= 0){
					$("#province").nextAll("select").hide().empty();
				}else if($("#city").val() <= 0){
					$("#city").nextAll("select").hide().empty();
				}
                
			}else{
				if("region" == $(clickObj).attr("id")){
					$(clickObj).empty().hide();
				}else{
					$(clickObj).next("select").empty().hide();
				}
				
			}
			closeLoadingBox();
		},
		dataType:'json'
	});
}
</script>
                                <?php else: ?>
                                <select class="medium" name="extend_field_<?php echo ($data["id"]); ?>" >
                                    <?php if(is_array($data["fields_content"])): $i = 0; $__LIST__ = $data["fields_content"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$field_content): $mod = ($i % 2 );++$i;?><option value="<?php echo ($field_content); ?>" <?php if(($field_content) == $data[content][$field_content]): ?>selected="selected"<?php endif; ?> <?php if(($data["is_need"] == 1)): ?>validate="{ required:true}"<?php endif; ?>> <?php echo ($field_content); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
                                </select><?php endif; endif; ?>
                            <?php if($data["fields_type"] == 'text'): ?><input <?php if(($data["type"] == 1 )): ?>name="<?php echo ($data["fields_content"]); ?>"<?php else: ?> name="extend_field_<?php echo ($data["id"]); ?>"<?php endif; ?> <?php if($data["fields_content"] == 'm_password'): ?>type="password" <?php elseif($data["fields_content"] == m_password_1): ?>type="password" <?php else: ?> type="text"<?php endif; ?> <?php if(($data["fields_content"] != 'm_password')): ?>value="<?php echo ($data["content"]); ?>"<?php endif; ?> class="medium" <?php if(($data["is_need"] == 1)): ?>validate="{ required:true}"<?php endif; ?>/><?php endif; ?>
                            <?php if($data["fields_type"] == 'file'): ?><input name="extend_field_<?php echo ($data["id"]); ?>" type="file"  value="<?php echo ($data["content"]); ?>" class="medium" <?php if(($data["is_need"] == 1)): ?>validate="{ required:true}"<?php endif; ?> /><?php endif; ?>
                        </td>
                        <?php if(($data["type"] == 1 )): ?><td class="last">系统默认属性项</td>
                        <?php else: ?>
                            <td class="last">自定义会员属性项</td><?php endif; ?>
                    </tr><?php endforeach; endif; else: echo "" ;endif; ?>
                
                
                <tr>
                    <td class="first">会员等级：</td>
                    <td>
                        <select name="ml_id" class="medium" validate="{ required:true}">
                            <option  value="0"> 请选择</option>
                            <?php if(is_array($members_level)): $i = 0; $__LIST__ = $members_level;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$level): $mod = ($i % 2 );++$i;?><option validate="{ required:true}" value="<?php echo ($level["ml_id"]); ?>"> <?php echo ($level["ml_name"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
                        </select> <br>
                    </td>
                </tr>
                <tr>
                    <td class="first">会员类型：</td>
                    <td>
                        <select name="m_type" class="medium">
                            <option  value="0" >分销商类型</option>
                            <option  value="1" >普通类型</option>
                        </select> <br>
                    </td>
                    <td class="last">说明文字</td>
                </tr>
                 <tr>
                     <td class="first">会员所属平台：</td>
                    <td>
                       <?php if(is_array($ary_platform)): $i = 0; $__LIST__ = $ary_platform;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$platform): $mod = ($i % 2 );++$i;?><span style="min-width:60px;width:auto;margin-left:15px;">
						   <input type="checkbox" name="platform[]" value="<?php echo ($platform["sp_id"]); ?>" id="sp_id_<?php echo ($platform["sp_id"]); ?>" />
						   <label for="sp_id_<?php echo ($platform["sp_id"]); ?>"><?php echo ($platform["sp_name"]); ?></label>
						   </span><?php endforeach; endif; else: echo "" ;endif; ?>
                    </td>
                </tr>
                
                <tr>
                    <td class="first"><span class="red">*</span> 性别：</td>
                    <td>
                        <input type="radio" validate="{ required:true}" name="m_sex" value="1" id="m_sex_1" />
						<label for="m_sex_1">男</label>
                        <input type="radio" validate="{ required:true}" name="m_sex" value="0" id="m_sex_0" />
						<label for="m_sex_0">女</label>
                        <input type="radio" validate="{ required:true}" name="m_sex" value="2" id="m_sex_2" />
						<label for="m_sex_2">保密</label>
                    </td>
                    <td class="last">说明文字</td>
                </tr>
                
            
            
            
            <tr>
                <td class="first">是否已经审核：</td>
                <td>
                    <input type="radio" value="0" checked=""  name="m_verify" /> 未审核 
                    <input type="radio" value="2"  name="m_verify" /> 审核通过 
                </td>
                <td class="last">说明文字</td>
            </tr> 
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="99">
						<input type="hidden" name="jump_type" id="jump_type" value="0" />
                        <input type="submit" value="保 存" jump="0" class="btnA submit_button" />
                        <input type="submit" value="保存并继续" jump="1" class="btnA submit_button" />
                        <input type="button" value="取 消" onClick="onUrl('<?php echo U('Admin/Members/pageList');?>');" class="btnA" >
                    </td>
                </tr>
            </tfoot>
        </table>
    </form>
    <div class="clear"></div>
</div>
<script>
$("document").ready(function(){
	$('#members_form').validate();
	$(".submit_button").click(function(){
		$("#jump_type").val($(this).attr("jump"));
	});
});
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
<!--         <script type="text/javascript" src="alires://MsgHistory/unknownurl.pnghttp://g.tbcdn.cn/sj/securesdk/0.0.3/securesdk_v2.js" id="J_secure_sdk_v2" data-appkey="12541234"></script> -->
    </body>
</html>