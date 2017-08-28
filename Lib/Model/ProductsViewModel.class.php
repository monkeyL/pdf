<?php
/**
 * 商品资料视图模型
 */
class ProductsViewModel extends ViewModel {
	
	/**
	 * 定义视图模型包含的字段
	 */
	public $viewFields = array(
		'goods'=>array('g_id','gb_id','gt_id','g_on_sale','g_status','g_sn','g_off_sale_time','g_on_sale_time','g_new','g_hot','g_create_time','g_update_time'),
		'goods_info'=>array('g_desc','g_stock','g_name','g_keywords','g_description','g_price','g_market_price','g_stock','g_weight','g_unit','g_remark','g_picture','g_no_stock','ma_price','mi_price','g_red_num','g_source','g_salenum','is_exchange','point','_on'=>'goods.g_id=goods_info.g_id'),
		'goods_type'=>array('gt_id','gt_name','gt_status','_on'=>'goods.gt_id=goods_type.gt_id'),
		'goods_brand'=>array('gb_id','gb_name','gb_status','_on'=>'goods.gb_id=goods_brand.gb_id')
	);	
}