<?php if (!defined('THINK_PATH')) exit();?><table class="tbList" width="100%">
	<thead>
		<tr>
			<th style="text-align:center;">商品编码</th>
			<?php if(is_array($array_spec)): $i = 0; $__LIST__ = $array_spec;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$spec): $mod = ($i % 2 );++$i;?><th style="text-align:center;"><?php echo ($spec["gs_name"]); ?></th><?php endforeach; endif; else: echo "" ;endif; ?>
			<th style="text-align:center;">库存</th>
			<th style="text-align:center;">销售价</th>
			<th style="text-align:center;">成本价</th>
			<th style="text-align:center;">市场价</th>
			<th style="text-align:center;">重量</th>
			<th style="text-align:center;">最少起拍数</th>
			<th style="text-align:center;">商品备注</th>
			<th style="text-align:center;">操作</th>
		</tr>
	</thead>
	<tbody>
		<?php if(is_array($array_combine)): $i = 0; $__LIST__ = $array_combine;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$sku): $mod = ($i % 2 );++$i;?><tr class="sku-list-info-rows">
			<td>
				<input type="text" name="goods_products[pdt_sn][<?php echo ($sku["pdt_sn"]); ?>]" value="" class="small sku_info pdt_sn" />
				<input type="hidden" name="goods_products[spec_vids][<?php echo ($sku["pdt_sn"]); ?>]" value="<?php echo ($sku["spec_pidvid"]); ?>" />
			</td>
			<?php if(is_array($sku['spec'])): $i = 0; $__LIST__ = $sku['spec'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><td <?php if($v["gs_id"] == 888): ?>style="text-align:left;"<?php endif; ?>>
				<?php if($v["gs_id"] == 888): ?><span style="background-color:#<?php echo ($v["gsd_rgb_value"]); ?>;color:#<?php echo ($v["gsd_rgb_value"]); ?>;width:14px;height:14px;border:1px solid #000000;">&nbsp;&nbsp;&nbsp;</span><?php endif; ?>
				<span class="sku_list_spec_<?php echo ($v["gsd_id"]); ?>"><?php echo ($v["gsd_value"]); ?></span>
				<!--
				<?php if($v["gs_id"] == 888): ?><input type="text" name="related_goods_spec[rgs_picture][<?php echo ($v["gsd_id"]); ?>]" value="" class="input40" />
				<a href="javascript:void(0);" style="font-size:12px;">上传图片</a><?php endif; ?>
				-->
			</td><?php endforeach; endif; else: echo "" ;endif; ?>
			<td>
				<?php if($is_edit_goods == 1): ?><span>0</span>
				<?php else: ?>
					<input type="text" name="goods_products[pdt_stock][<?php echo ($sku["pdt_sn"]); ?>]" value="<?php echo ($sku["pdt_total_stock"]); ?>" class="input40 sku_info pdt_stock" /><?php endif; ?>
			</td>
			<td>
				<input type="text" name="goods_products[pdt_sale_price][<?php echo ($sku["pdt_sn"]); ?>]" value="<?php echo ($sku["pdt_sale_price"]); ?>" class="input40 sku_info pdt_sale_price" />
				<input type="hidden" name="goods_products[member_level_price][<?php echo ($sku["pdt_sn"]); ?>]" value="" />
				<input type="hidden" name="goods_products[up_price][<?php echo ($sku["pdt_sn"]); ?>]" value="" class="up_price"/>
				<input type="hidden" name="goods_products[down_price][<?php echo ($sku["pdt_sn"]); ?>]" value="" class="down_price"/>
				<a href="javascript:void(0);" class="btnA sku-list-member-level-price-button">会员价格</a>
				<a href="javascript:void(0);" class="btnA sku-list-up-down-price-button">价格区间</a>
			</td>
			<td><input type="text" name="goods_products[pdt_cost_price][<?php echo ($sku["pdt_sn"]); ?>]" value="<?php echo ($sku["pdt_cost_price"]); ?>" class="input40 sku_info pdt_cost_price" /></td>
			<td><input type="text" name="goods_products[pdt_market_price][<?php echo ($sku["pdt_sn"]); ?>]" value="<?php echo ($sku["pdt_market_price"]); ?>" class="input40 sku_info pdt_market_price" /></td>
			<td><input type="text" name="goods_products[pdt_weight][<?php echo ($sku["pdt_sn"]); ?>]" value="<?php echo ($sku["pdt_weight"]); ?>" class="input40 sku_info pdt_weight" /></td>
			<td><input type="text" name="goods_products[pdt_min_num][<?php echo ($sku["pdt_sn"]); ?>]" value="<?php echo ($sku["pdt_min_num"]); ?>" class="input40 sku_info pdt_min_num" /></td>
			<td><input type="text" name="goods_products[pdt_g_remark][<?php echo ($sku["pdt_sn"]); ?>]" value="<?php echo ($sku["pdt_g_remark"]); ?>" class="input40 sku_info pdt_g_remark" /></td>
			<td><a href="javascript:void(0);" class="sku-list-delete-button">删除</a></td>
		</tr><?php endforeach; endif; else: echo "" ;endif; ?>
		<?php if(!empty($array_system_color_spec)): ?><tr>
			<td style="color:#ff0000;text-align:left;" colspan="99" >
				*友情提示：颜色选项卡是用于客户在前台选择商品是会出现，如果不上传图片则默认显示文字（仅对支持此规则的模板生效）。
			</td>
		</tr>
		<?php if(is_array($array_system_color_spec)): $i = 0; $__LIST__ = $array_system_color_spec;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$img): $mod = ($i % 2 );++$i;?><tr>
			<td style="text-align:left;">
				<span style="background-color:#<?php echo ($img["gsd_rgb_value"]); ?>;color:#<?php echo ($img["gsd_rgb_value"]); ?>;width:14px;height:14px;border:1px solid #000000;">&nbsp;&nbsp;&nbsp;</span>
				<span class="sku_list_spec_<?php echo ($img["gsd_id"]); ?>"><?php echo ($img["gsd_value"]); ?></span>
			</td>
			<td colspan="99" style="text-align:left;">
				<!--<input type="text" class="large" name="spec_image[<?php echo ($img["gsd_id"]); ?>]" value="" />-->
				<!--<span style="color:#ff0000;">请在左侧文本框中输入远程图片URL地址。</span>-->
				<a href="javascript:upgsdImage('<?php echo ($img["gsd_id"]); ?>');" class="btnG ico_upload">上传图片</a>
				<img width="50px" height="50px" src="<?php echo ($img["gsd_picture"]); ?>" id="spec_image_<?php echo ($img["gsd_id"]); ?>">
				&nbsp;
				<input type="hidden" id="spec_image_input_<?php echo ($img["gsd_id"]); ?>" name="spec_image[<?php echo ($img["gsd_id"]); ?>]" value="<?php echo ($img["gsd_picture"]); ?>"/>

			</td>
		</tr><?php endforeach; endif; else: echo "" ;endif; endif; ?>
	</tbody>
</table>
<script type="text/javascript">
$(document).ready(function(){
	$(".sku-list-delete-button").click(function(){
		if(confirm("确定要删除此规格吗？如果商品已下单，可能造成无法发货！")){
			$(this).parent("td").parent("tr").remove();
		}
	});
	$(".spec_input").each(function(){
		if("" == $(this).val()){
			$(this).val($(this).attr("val"));
		}
		$(".sku_list_spec_" + $(this).attr("vid")).html($(this).val());
	});
	// 价格区间
	$(".sku-list-up-down-price-button").click(function(){
		//首先验证是否输入销售价格，如果没有输入输入销售价格，则提示需要先输入促销价格才行
		var pdt_sale_price = $(this).parent("td").children(".pdt_sale_price").val();
		var up_price = $(this).parent("td").children(".up_price").val();
		var down_price = $(this).parent("td").children(".down_price").val();
		var btn_object = $(this);
		if("" == pdt_sale_price || isNaN(pdt_sale_price)){
			alert("请先输入规格销售价。");
			return false;
		}
		//将规格销售价存入隐藏表单域中，方便计算折扣
		$("#member-level-price-input-spec-price").val(pdt_sale_price);
		// 销售价格
		$('#tck_sale_price').html(pdt_sale_price);
		// 初始化价格
		$('#tck_sale_price_area_up').val(up_price);
		$('#tck_sale_price_area_down').val(down_price);
		$('#tck_sale_price_admin_up').val(1);
		$('#tck_sale_price_admin_down').val(1);

		$('#goodsSetPriceUpDown').dialog({
			resizable:false,
			autoOpen: false,
			modal: true,
			width: 'auto',
			buttons: {
				'确认': function() {
					var tck_sale_price_area_up = $('#tck_sale_price_area_up');
					var tck_sale_price_area_down = $('#tck_sale_price_area_down');
					if(false === checkPriceUpDown(tck_sale_price_area_up,tck_sale_price_area_down)){
						return false;
					}
					btn_object.parent("td").children("input[type='hidden'][name^='goods_products[up_price]']").val(tck_sale_price_area_up.val());
					btn_object.parent("td").children("input[type='hidden'][name^='goods_products[down_price]']").val(tck_sale_price_area_down.val());
					$(this).dialog( "close" );
					return false;
				},
				'关闭': function() {
					if(confirm('确定不设置价格区间!')){
						btn_object.parent("td").children("input[type='hidden'][name^='goods_products[up_price]']").val('');
						btn_object.parent("td").children("input[type='hidden'][name^='goods_products[down_price]']").val('');
						$(this).dialog( "close" );
						return false;
					}
				}
			}
		});
		$('#goodsSetPriceUpDown').dialog('open');
	});
	// 会员价格
	$(".sku-list-member-level-price-button").click(function(){
		//首先验证是否输入销售价格，如果没有输入输入销售价格，则提示需要先输入促销价格才行
		var pdt_sale_price = $(this).parent("td").children(".pdt_sale_price").val();
		if("" == pdt_sale_price || isNaN(pdt_sale_price)){
			alert("请先输入规格销售价。");
			return false;
		}
		//将规格销售价存入隐藏表单域中，方便计算折扣
		$("#member-level-price-input-spec-price").val(pdt_sale_price);
		/**
		 * 处理表单数据自动回填
		 * 这里的解决办法是获取此规格的会员等级折扣价格字符串
		 * 格式为：ml_id:fixed_ml_price;ml_id:fixed_ml_price;ml_id:fixed_ml_price
		 * 将获取到的数据按照分号首先分隔（通过调用split方法实现）
		 * 然后遍历调用split方法根据冒号进行分割，判断如果得到的数组长度等于2，则表示是合法的数据
		 * 就将获取到的会员等级价格填充到表单中，并且计算会员等级折扣（折扣精确到三位小数）
		 * by Mithern 13.6.25
		 */
		var ml_fixed_price = $(this).parent("td").children("input[type='hidden']").val();
		if(ml_fixed_price != ""){
			var ml_prices = ml_fixed_price.split(';');
			for(var x in ml_prices){
				if("" != ml_prices[x]){
					var ml_p = ml_prices[x].split(':');
					var discount = '无优惠折扣';
					var input_obj = $(".member-level-price-input[ml_id='" + ml_p[0] + "']");
					input_obj.val(ml_p[1]);
					//自动计算会员等级折扣
					var discount_percent = parseInt(ml_p[1]/pdt_sale_price*10000)/1000;
					discount = discount_percent + '折';
				}
				input_obj.parent("td").next("td").html(discount);
			}
		}
		
		/** ****** dialog 对话框展示开始 ******** */
		var button_obj = $(this);
		$("#member-level-price-input").dialog({
			title:'设置会员等级固定价',
			width:'auto',
			height:'auto',
			modal: true,
			buttons:{
				'确定':function(){
					var ml_prices = "";
					$(".member-level-price-input").each(function(){
						if("" != $(this).val()){
							if(isNaN($(this).val())){
								alert("必须输入数字！");
								$(this).focus();
								return false;
							}
							ml_prices += $(this).attr("ml_id") + ":" + $(this).val() + ";";
						}
					});
					button_obj.parent("td").children("input[type='hidden'][name^='goods_products[member_level_price]']").val(ml_prices);
					//无论生成会员等级固定价格或者是取消会员等级固定价格，都要将这个值设置为空
					$("#member-level-price-input-spec-price").val('');
					$(".member-level-price-input").val("");
					$(".member-level-price-input-discount").html("无优惠折扣");
					$(this).dialog("close");
				},
				'取消本次修改':function(){
					if(confirm("确定要取消吗？")){
						//无论生成会员等级固定价格或者是取消会员等级固定价格，都要将这个值设置为空
						$("#member-level-price-input-spec-price").val('');
						$(".member-level-price-input").val("");
						$(".member-level-price-input-discount").html("无优惠折扣");
						$(this).dialog("close");
					}
				}
			}
		});
		/** ****** dialog 对话框展示结束 ******** */
	});
	
	/** 规格商家编码变更验证：此项必填，且必须唯一（唯一性在比单提交时验证） **/
	$(".sku-list-info-rows .pdt_sn").change(function(){
		if($(this).val() != ""){
			$(this).css({"border":'1px solid gray'});
		}
	});
	
	/** 规格库存变更验证：此项非必填，如果填写则必须是数字 **/
	$(".sku-list-info-rows .pdt_stock").change(function(){
		if(($(this).val() != "" && !isNaN($(this).val())) || "" == $(this).val()){
			$(this).css({"border":'1px solid gray'});
		}
	});
	
	/** 规格销售价变更验证：此项必填，且必须是数字 **/
	$(".sku-list-info-rows .pdt_sale_price").change(function(){
		if($(this).val() != "" && isNaN($(this).val())){
			$(this).css({"border":'1px solid gray'});
		}
	});
	
	/** 规格成本价变更验证：此项非必填，如果填入则必须是数字 **/
	$(".sku-list-info-rows .pdt_cost_price").change(function(){
		if(($(this).val() != "" && !isNaN($(this).val())) || "" == $(this).val()){
			$(this).css({"border":'1px solid gray'});
		}
	});
	
	/** 规格市场价变更验证，此项必填且必须是数字 **/
	$(".sku-list-info-rows .pdt_market_price").change(function(){
		if($(this).val() != "" && isNaN($(this).val())){
			$(this).css({"border":'1px solid gray'});
		}
	});
	
	/** 规格重量，此项必填且必须是数字 **/
	$(".sku-list-info-rows .pdt_weight").change(function(){
		if($(this).val() != "" && isNaN($(this).val())){
			$(this).css({"border":'1px solid gray'});
		}
	});
});
</script>