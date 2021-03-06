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
                <td class="first">客户余额</td>
                <td>
                    <font color="blue" id="balance">0.00</font>
                </td>
            </tr>
            <tr class="inputClass">
                <td align="right" width="145px"><font color="red">*</font>提现金额：</td>
                <td class="inputClass"><input type="hidden" name="bi_type" id="bi_type" value="1"><input type="text" class="input01" name="bi_money" value="" id="bi_balance_money" validate='{ required:true,min:0,messages:{min:"提现金额不能为负数"}}'></td>
                <td width="236px"></td>
            </tr>
            <tr class="inputClass">
                <td align="right"><font color="red">*</font>收款人：</td>
                <td><input type="text" class="input01" name="bi_payeec" value="" id="bi_payeec" validate="{ required:true}"></td>
                <td width="236px"></td>
            </tr>
            <tr class="inputClass">
                <td align="right"><font color="red">*</font>收款银行：</td>
                <td><input type="text" class="input01" name="bi_accounts_bank" value="" id="bi_accounts_bank" validate="{ required:true,username:true}"></td>
                <td width="236px"></td>
            </tr>
            <tr class="inputClass">
                <td align="right"><font color="red">*</font>收款账号：</td>
                <td><input type="text" class="input01" name="bi_accounts_receivable" value="" id="bi_accounts_receivable" validate="{ required:true,isCheck:true,path:true}"></td>
                <td width="236px"></td>
            </tr>
            <tr class="inputClass">
                <td align="right"><font color="red">*</font>付款日期：</td>
                <td><input type="text" class="input01 datetime" name="bi_payment_time" value="" id="bi_payment_time" validate="{ required:true,isDate:true}"></td>
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
    $(".datetime").datepicker({
        showMonthAfterYear: true,
        changeMonth: true,
        changeYear: true,
        buttonImageOnly: true
    });

    $("#bi_balance_money").blur(function(){
        var mid = $("#m_id").val(),
            money = $(this).val();
        $.ajax({
            url:'<?php echo U("Admin/BalanceInfo/checkBalanceMoney");?>',
            cache:false,
            dataType:'JSON',
            data:{id:mid,bi_money:money},
            type:'GET',
            success:function(msgObj){
                if(msgObj.status == 0){
                    $("#bi_balance_money").after('<label for="bi_balance_money" generated="true" class="error">'+msgObj.info+'</label>');
                    $("#submit_btnA").attr({disabled:true});
                }else{
                    $("#bi_balance_money").after('');
                    $("#submit_btnA").attr({disabled:false});
                }
            }
        });
    })

});  

</script>