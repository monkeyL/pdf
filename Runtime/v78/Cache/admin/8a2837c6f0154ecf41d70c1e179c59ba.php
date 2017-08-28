<?php if (!defined('THINK_PATH')) exit();?>
<style type="text/css">
dl.kgz { margin:0 auto; display:block; width:690px;}
dl.kgz dt,dl.kgz dd { float:left}
dl.kgz dt { margin:0px 20px 0px 20px; padding-top:27px}
dl.kgz dt p { padding-top:30px}
dl.kgz span.hh { position:relative; top:-104px;}
</style>
<div id="isAjax" class="none">用此ID标识本页面是通过ajax载入进来的</div>
<div class="rightInner load" style="width:732px;min-width:420px;height:200px;">
    <dl class="kgz">
        <dt>
            <p>商品分组 &nbsp;&nbsp;&nbsp;
            <select class="medium" id="gg_id" onchange="selectGroupGoods(this);">
                <option value="0" selected="selected"> - 请选择商品分组 - </option>
                <?php if(is_array($goodsgroups)): $i = 0; $__LIST__ = $goodsgroups;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$gg): $mod = ($i % 2 );++$i;?><option value="<?php echo ($gg["gg_id"]); ?>" ><?php echo ($gg["gg_name"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
            </select>
            </p>
            <br>
             使用新分组&nbsp;
            <input type="text" class="medium" value="" name="new_gg_name" id="new_gg_name" />
        </dt>
        <dd>
            <textarea id="g_sn" onfocus="if(value=='请输入归组的商品编号，多条商品以换行分隔。。。。')value=''" onblur="if(value=='')value='请输入归组的商品编号，多条商品以换行分隔。。。。'" style="border:1px solid #999999;height:190px;margin:3px 3px 3px 22px;padding:3px;width:350px;">请输入归组的商品编号，多条商品以换行分隔。。。。</textarea>
        
		</dd>
    </dl>
</div>
	<table class="tbForm" width="100%">
		<thead>
			<tr class="title">
				<th colspan="99">指定类目或品牌归组</th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td class="first">关联商品分类：</td>
				<td id="clist" name="clist">
						  <span id="" class="rule-param rule-param-edit">
						<span id="" class="element">
						<input id="cat_selValue" class="medium input-text" disabled type="text" name="cat_selValue" value="<?php echo ($info['cids']); ?>">
						<a class="rule-chooser-trigger" ref="'.$this->index.'" href="javascript:void(0)">
						<img title="Open Chooser" class="v-middle" alt="" src="__PUBLIC__/Admin/images/rule_chooser_trigger.gif"></a>
						请点击按钮选择分类
						</span>
						</span>
						<div id="shopMulti_cat" class="shop-cat-list rule-chooser" style="display:none;padding-left: 15px;">
							<ul id="cat_selItems"><?php echo ($catHtml); ?></ul>
						</div>
				</td>
				<td class="last"></td> 
			</tr>
			<tr>
				<td class="first">关联商品品牌：</td>
				<td id="blist" name="blist">
						  <span id="" class="rule-param rule-param-edit">
						<span id="" class="element">
						<input id="brand_selValue" disabled class="medium input-text" type="text" name="brand_selValue" value="<?php echo ($info['bids']); ?>">
						<a class="rule-chooser-trigger1" ref="'.$this->index.'" href="javascript:void(0)">
						<img title="Open Chooser" class="v-middle" alt="" src="__PUBLIC__/Admin/images/rule_chooser_trigger.gif"></a>
						请点击按钮选择品牌
						</span>
						</span>
						<div id="shopMulti_brand" class="shop-cat-list rule-chooser" style="display:none;padding-left: 15px;">
							<ul id="brand_selItems"><?php echo ($brandHtml); ?></ul>
						</div>
				</td>
				<td class="last"></td>
			</tr>
		</tbody>
	</table>
<link href="__PUBLIC__/Admin/css/condition.css" rel="stylesheet">
<script>
    $("document").ready(function(){
 		//类目选择
     	$(".rule-chooser-trigger").click(function(){
     		if($("#shopMulti_cat").css('display') == 'block'){
     			$("#shopMulti_cat").css("display","none");
     		}else{
     			$("#shopMulti_cat").css("display","block");
     		}
     	});
         
         $(".cat-checkbox").click(function(){
     		var selValue = '';
     		var now_id = $(this).attr("ref");
 			if($(this).attr('checked') == 'checked'){
 	    		$(".cat-checkbox").each(function(){
 	        		if($(this).attr("pid") == now_id){
 	        			$(this).attr("checked","checked");
 	        		}
 	    		});
 			}else{
 	    		$(".cat-checkbox").each(function(){
 	        		if($(this).attr("pid") == now_id){
 	        			$(this).attr("checked",false);
 	        		}
 	    		});
 			}
     		$(".cat-checkbox:checked").each(function(){
     			selValue += $(this).attr("ref") + ',';
     		});
     		if(selValue.length>0){
     			selValue = selValue.substr(0,selValue.length-1);
     		}
     		$("#cat_selValue").val(selValue);
     	});

     	//品牌选择
     	$(".rule-chooser-trigger1").click(function(){
         	if($("#shopMulti_brand").css('display') == 'block'){
         		$("#shopMulti_brand").css("display","none");
         	}else{
         		$("#shopMulti_brand").css("display","block");
         	}
     	});  
     	
         $(".brand-checkbox").click(function(){
     		var selValue = '';
     		$(".brand-checkbox:checked").each(function(){
     			selValue += $(this).attr("ref") + ',';
     		});
     		if(selValue.length>0){
     			selValue = selValue.substr(0,selValue.length-1);
     		}
             
     		$("#brand_selValue").val(selValue);
     	}); 
    });
    function selectGroupGoods(obj){
        var gg_id = $(obj).val();
        if(gg_id != '0'){
            $("#new_gg_name").val("");
        }
    }
</script>