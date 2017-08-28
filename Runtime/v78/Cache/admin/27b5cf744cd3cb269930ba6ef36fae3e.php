<?php if (!defined('THINK_PATH')) exit();?><table>
	<tbody>
		<?php if(is_array($array_sale_spec)): $i = 0; $__LIST__ = $array_sale_spec;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
			<td style="width:60px;text-align:right;" class="spec_value_list_pname" valign="top"><?php echo ($vo["gs_name"]); ?>：</td>
			<td>
				<ul class="sku-box">
					<?php if(is_array($vo[spec_detail])): $i = 0; $__LIST__ = $vo[spec_detail];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$spec): $mod = ($i % 2 );++$i;?><li>
						<input type="checkbox" name="related_goods_spec[<?php echo ($spec["gs_id"]); ?>][]" <?php if($spec["checked"] == 1): ?>checked="checked"<?php endif; ?> class="checkbox sale_spec_detail" id="spec_<?php echo ($spec["gs_id"]); ?>_<?php echo ($spec["gsd_id"]); ?>" value="<?php echo ($spec["gsd_id"]); ?>" pid="<?php echo ($spec["gs_id"]); ?>" vid="<?php echo ($spec["gsd_id"]); ?>"/>
						<label for="spec_<?php echo ($spec["gs_id"]); ?>_<?php echo ($spec["gsd_id"]); ?>" style="cursor:pointer;">
						<?php if($spec["gs_id"] == 888): ?><span style="background-color:#<?php echo ($spec["gsd_rgb_value"]); ?>;color:#<?php echo ($spec["gsd_rgb_value"]); ?>;width:14px;height:14px;border:1px solid #000000;">&nbsp;&nbsp;&nbsp;</span><?php endif; ?>
						</label>
						<input type="text" name="spec_value[<?php echo ($spec["gsd_id"]); ?>]" value="<?php echo ($spec["gsd_value"]); ?>" pid="<?php echo ($spec["gs_id"]); ?>" vid="<?php echo ($spec["gsd_id"]); ?>" val="<?php echo ($spec["gsd_value"]); ?>" class="spec_input" />
					</li><?php endforeach; endif; else: echo "" ;endif; ?>
				</ul>
			</td>
		</tr><?php endforeach; endif; else: echo "" ;endif; ?>
		<tr>
			<td style="width:60px;text-align:right;"></td>
			<td>
				<?php if($enable == 1): ?><button type="button" onclick="javascript:createProductListForm(this);" click_num="0" class="btnA">重新生成</button>
				<?php else: ?>
				<button type="button" onclick="javascript:createProductListForm(this);" click_num="0" class="btnA">生成规格</button><?php endif; ?>
				<span id="createMessageBox" style="color:#ff0000;"></span>
				<br />
				<span style="color:#ff0000;">注意：重新生成规格以后，如果商品编码发生变化，可能会导致已下单商品无法发货！<br />最少起拍数默认为0表示不限数量!</span>
			</td>
		</tr>
		<tr>
			<td class="first">批量设置价格：</td>
			<td>
				<a href="javascript:void(0);" class="btnA" id="batchSetPrice">批量设置价格</a>
			</td>
			<td></td>
		</tr>
	</tbody>
</table>
<!--批量设置销售价格-->
<div id="goodsSetPriceBatch" style="display: none;text-align:center;" title="批量设置销售价">
    <table style="border:1px solid gray;margin-left:auto;margin-right:auto;">
    	<thead style="border:1px solid gray;text-align:center;">
    		<tr style="border:1px solid gray;text-align:center;">
    			<td style="border:1px solid gray;" width="150px;">销售价</td>
				<td style="border:1px solid gray;" width="150px;">成本价</td>
				<td style="border:1px solid gray;" width="150px;">市场价</td>
				<td style="border:1px solid gray;" width="150px;">重量</td>
				<td style="border:1px solid gray;" width="150px;">最少起拍数</td>
    		</tr>
    	</thead>
    	<tbody>
    		<tr style="border:1px solid gray;">
    			<td style="border:1px solid gray;">
    				<input type="text" name="pdt_set_sale_price" value="" id="pdt_set_sale_price" class="small" />
				</td>
				<td style="border:1px solid gray;">
    				<input type="text" name="pdt_set_cost_price" value="" id="pdt_set_cost_price" class="small" />
				</td>
				<td style="border:1px solid gray;">
    				<input type="text" name="pdt_set_market_price" value="" id="pdt_set_market_price" class="small" />
				</td>
				<td style="border:1px solid gray;">
    				<input type="text" name="pdt_set_weight" value="" id="pdt_set_weight" class="small" />
				</td>
				<td style="border:1px solid gray;">
    				<input type="text" name="pdt_set_least" value="" id="pdt_set_least" class="small" />
				</td>
    		</tr>
    	</tbody>
    </table>
</div>
<script type="text/javascript">
function checkPrice(price){
	if(price.val() != '' && isNaN(price.val())){
		showAlert(false,'请正确填写');return false;
	}
}
$(document).ready(function(){
	// 批量设置销售价格
	$('#batchSetPrice').bind({'click':function(){
		// 初始化价格
		$('#pdt_set_sale_price').val('');
		$('#pdt_set_cost_price').val('');
		$('#pdt_set_market_price').val('');
		$('#pdt_set_weight').val('');
		$('#pdt_set_least').val('');

		$('#goodsSetPriceBatch').dialog({
			resizable:false,
			autoOpen: false,
			modal: true,
			width: 'auto',
			// position: [220,85],
			buttons: {
				'确认': function() {
					var pdt_set_sale_price   = $('#pdt_set_sale_price');
					var pdt_set_cost_price   = $('#pdt_set_cost_price');
					var pdt_set_market_price = $('#pdt_set_market_price');
					var pdt_set_weight       = $('#pdt_set_weight');
					var pdt_set_least        = $('#pdt_set_least');
					if(false === checkPrice(pdt_set_sale_price)){
						return false;
					}
					if(false === checkPrice(pdt_set_cost_price)){
						return false;
					}
					if(false === checkPrice(pdt_set_market_price)){
						return false;
					}
					if(false === checkPrice(pdt_set_weight)){
						return false;
					}
					if(false === checkPrice(pdt_set_least)){
						return false;
					}
					if(pdt_set_weight.val() != '' && pdt_set_weight.val() != undefined){
						$('.pdt_weight').each(function(){
							$(this).val(pdt_set_weight.val());
						});
					}
					if(pdt_set_sale_price.val() != '' && pdt_set_sale_price.val() != undefined){
						$('.pdt_sale_price').each(function(){
							$(this).val(pdt_set_sale_price.val());
						});
					}
					if(pdt_set_cost_price.val() != '' && pdt_set_cost_price.val() != undefined){
						$('.pdt_cost_price').each(function(){
							$(this).val(pdt_set_cost_price.val());
						});
					}
					if(pdt_set_market_price.val() != '' && pdt_set_market_price.val() != undefined){
						$('.pdt_market_price').each(function(){
							$(this).val(pdt_set_market_price.val());
						});
					}
					if(pdt_set_least.val() != '' && pdt_set_least.val() != undefined){
						$('.pdt_min_num').each(function(){
							$(this).val(pdt_set_least.val());
						});
					}
					$(this).dialog( "close" );
					return false;
				},
				'关闭': function() {
					if(confirm('确定不设置!')){
						// $('#pdt_set_sale_price').val('');
						// $('#pdt_price_down').val('');
						$(this).dialog( "close" );
						return false;
					}
				}
			}
		});
		$('#goodsSetPriceBatch').dialog('open');
	}});
	$(".spec_input").focus(function(){
		$(this).addClass("spec_input_border").parent("li").children("input").attr({checked:true});
	});
	$(".spec_input").change(function(){
		if("" == $(this).val()){
			$(this).val($(this).attr("val"));
		}
		$(".sku_list_spec_" + $(this).attr("vid")).html($(this).val());
	});
});
</script>