<?php if (!defined('THINK_PATH')) exit();?>
<style>
.goods_sale_property_checked{background-color:#309B00}
.tck-table-spxsxg-0 td{height:30px}
.tck-table-spxsxg-0 a{border:1px solid #D9D8DA;display:block;float:left;height:20px;line-height:20px;margin:0 0 0 5px;padding:0 10px;}
.ui-widget-content a{color:#222222}
</style>
<table width="580px" cellspacing="0" cellpadding="0" class="tck-table-spxsxg-0 ui-widget-content" id="goods_sales_property_value_list_table" style="min-height: 0px; height: auto; display: table;" scrolltop="0" scrollleft="0">
    <tbody>
        <tr>
            <td width="70px" class="alignright">字段名：</td>
            <td width="480px">
                <a e_value="gc_name" ename="二级分类" class="goods_sale_property" href="javascript:void(0);">二级分类</a>
                <a e_value="gb_name" ename="品牌名称" class="goods_sale_property" href="javascript:void(0);">品牌名称</a>
		   </td>
        </tr>
        <tr>
            <td width="70px" class="alignright"></td>
            <td width="480px">
                <a e_value="o_receiver_mobile" ename="收货人手机" class="goods_sale_property" href="javascript:void(0);">收货人手机</a>
                <a e_value="o_receiver_telphone" ename="收货人电话" class="goods_sale_property" href="javascript:void(0);">收货人电话</a>
                <a e_value="o_receiver_address" ename="收货地址" class="goods_sale_property" href="javascript:void(0);">收货地址</a>
                <a e_value="o_buyer_comments" ename="买家留言" class="goods_sale_property" href="javascript:void(0);">买家留言</a>
                <a e_value="o_seller_comments" ename="卖家备注" class="goods_sale_property" href="javascript:void(0);">卖家备注</a>

            </td>
        </tr>
        <tr>
            <td width="70px" class="alignright"></td>
            <td width="480px">
                <a e_value="o_reward_point" ename="赠送积分" class="goods_sale_property" href="javascript:void(0);">赠送积分</a>
                <a e_value="is_invoice" ename="是否开发票" class="goods_sale_property" href="javascript:void(0);">是否开发票</a>
                <a e_value="invoice_people" ename="个人姓名" class="goods_sale_property" href="javascript:void(0);">个人姓名</a>
                <a e_value="invoice_type" ename="发票类型" class="goods_sale_property" href="javascript:void(0);">发票类型</a>
                <a e_value="invoice_head" ename="发票抬头" class="goods_sale_property" href="javascript:void(0);">发票抬头</a>
                <a e_value="invoice_content" ename="发票内容" class="goods_sale_property" href="javascript:void(0);">发票内容</a>

            </td>
        </tr>
        <tr>
            <td width="70px" class="alignright"></td>
            <td width="480px">
                <a e_value="invoice_account" ename="银行账号" class="goods_sale_property" href="javascript:void(0);">银行账号</a>
                <a e_value="invoice_bank" ename="开户银行" class="goods_sale_property" href="javascript:void(0);">开户银行</a>
                <a e_value="invoice_phone" ename="注册电话" class="goods_sale_property" href="javascript:void(0);">注册电话</a>
                <a e_value="invoice_address" ename="注册地址" class="goods_sale_property" href="javascript:void(0);">注册地址</a>
                <a e_value="invoice_identification_number" ename="纳税人识别号" class="goods_sale_property" href="javascript:void(0);">纳税人识别号</a>
            </td>
        </tr>
        <tr>
            <td width="70px" class="alignright"></td>
            <td width="480px">
                <a e_value="g_sn" ename="商品编码" class="goods_sale_property" href="javascript:void(0);">商品编码</a>
                <a e_value="pdt_sn" ename="商品货号" class="goods_sale_property" href="javascript:void(0);">商品货号</a>
                <a e_value="pdt_name" ename="规格名称" class="goods_sale_property" href="javascript:void(0);">规格名称</a>
			</td>
        </tr>
        <tr>
            <td width="70px" class="alignright"></td>
            <td width="480px">
                <a e_value="oi_refund_status" ename="售后状态" class="goods_sale_property" href="javascript:void(0);">售后状态</a>
            </td>
        </tr>
    </tbody>

</table>
<script>
$('.goods_sale_property').click(function(){
    if($(this).hasClass('goods_sale_property_checked')){
        $(this).removeClass('goods_sale_property_checked');
    }else{
        $(this).addClass('goods_sale_property_checked');
    }
});
</script>