<?php if (!defined('THINK_PATH')) exit();?>
<style>
    .tab .inputClass input{border: 1px solid #cecece;height: 25px;line-height: 25px;width: 220px;}  
</style>
<div style="width: 930px;">
    <table class="tbForm" width="100%">
        <tbody class="tab">
            <tr>
                <td class="first"><font color="red">*</font>客户名</td>
                <td>
                    <font color="blue"><input type="hidden" value="" id="m_id" name="m_id" validate="{ required:true}"/><span id="members" style="font-weight: bold;margin-right: 6px;color: #666;"></span><label class="showSelectedMember">选择会员</label></font>
                </td>
                <td class="last"></td>
            </tr>
            <tr id="memberBalan" style="display: none;">
<!--                <td class="first">客户余额</td>
                <td>
                    <font color="blue" id="balance">0.00</font>
                </td>-->
                <td class="first">所属授权</td>
                <td>
                    <font color="blue" id="conversion_type"></font>
                </td>

            </tr>
            <tr id="memberBalan_end_time" style="display: none;">
                <td class="first">剩余时间</td>
                <td>
                    <font color="blue" id="end_time"></font>
                </td>
            </tr>
            <tr id="memberBalan_remaining" style="display: none;">
                <td class="first">剩余次数</td>
                <td>
                    <font color="blue" id="number_remaining"></font>
                </td>
            </tr>
            <tr class="inputClass">
                <td align="right" width="145px"><font color="red">*</font>订单号：</td>
                <td class="inputClass"><input type="hidden" name="bi_type" id="bi_type" value="5"><input type="text" class="input01" name="o_id" value="" id="o_id" validate="{ required:true,maxlength:30,remote:'<?php echo U('Admin/BalanceInfo/checkName');?>'
}"></td>
                <td width="236px"></td>
            </tr>
            <tr class="inputClass">
                <td align="right"><font color="red">*</font>设置授权：</td>
                <td class="inputClass">
					<input type="text" class="input01" name="conversion_type" value="" id="bi_conversion_type" validate="{ required:true}">
					<font color="red">0，免费用户，1，次数用户，2，包月用户</font>
				</td>
                <td width="236px"></td>
            </tr>
            <tr class="inputClass">
                <td align="right"><font color="red">*</font>设置次数：</td>
                <td class="inputClass">
					<input type="text" class="input01" name="number_remaining" value="" id="bi_number_remaining" validate="{ required:true}">
<!--					<font color="red">本次最多可充值100,000.00元</font>-->
				</td>
                <td width="236px"></td>
            </tr>
            <tr class="inputClass">
                <td align="right"><font color="red">*</font>设置月份：</td>
                <td class="inputClass">
					<input type="text" class="input01 datetime" name="end_time" value="" id="bi_end_time" validate="{ required:true}">
<!--					<font color="red">本次最多可充值100,000.00元</font>-->
				</td>
                <td width="236px"></td>
            </tr>
            <tr class="inputClass">
                <td align="right">备注：</td>
                <td>
                    <textarea name="bi_desc" id="bi_desc" validate="{ isCheck:true}" style="width: 400px;height: 100px;border: 1px solid #cecece;"></textarea>
                    <!--<input type="text" class="input01" name="bi_desc" value="" id="bi_desc" validate="{ isCheck:true}">-->
                </td>
                <td width="236px"></td>
            </tr>
        </tbody>
    </table>
</div>
<script>
    /**
 * 时间日期控件
 * @author zuo <zuojianghua@guanyisoft.com>
 * @date 2013-01-07
 */
$(document).ready(function(){
    $("#bi_end_time").datetimepicker({
            showMonthAfterYear: true,
            changeMonth: true,
            changeYear: true,
            buttonImageOnly: true
        });
});  

</script>