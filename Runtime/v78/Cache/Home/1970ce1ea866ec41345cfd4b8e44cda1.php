<?php if (!defined('THINK_PATH')) exit();?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<script src="__JS__jquery.min.js" type="text/javascript" charset="utf-8"></script>
<style type="text/css">
    *{padding:0;margin:0;list-style-type:none;}
    body{font:14px/1.4 '5FAE8F6F96C59ED1',Tahoma,Arial,'5B8B4F53',sans-serif;overflow:hidden;}
    .login_box{text-align:center;color:#666;}
    .login_box h3{font-size:20px;font-weight:600;padding:20px 0;margin-bottom:30px;border-bottom:1px dashed #ddd;}
    .login{display:inline-block;*display:inline;*zoom:1;}
    .login_box h4{color:#09bb07;font-size:18px;font-weight:600;}
    .login_box img{width:150px;height:150px;margin:10px 0;}
</style>
</head>
<body>
<div class="login_box">
    <h3>登录后您将享有充值信息同步和多设备共享</h3>
    <div class="login">        
        <h4>微信登录</h4>
        <img src="https://open.weixin.qq.com<?php echo ($wx_img); ?>" alt="" />
        <p>请使用微信扫描二维码登录<br>“悦书PDF阅读器”</p>
    </div>
</div>
     <input type="hidden" value="<?php echo ($wx_code); ?>" name="wx_code" id="wx_code" />
        <script type="text/javascript">
            $(document).ready(function () {
                setInterval(function () {
                    if ($("#wx_code").val()) {
                        $.ajax({
                            url: "/Home/Index/Weixinopen?uuid=" + $("#wx_code").val() + '&last=404&_=' + Math.round(Math.random() * 1000000),
                            type: "GET",
                            dataType: "text",
                            success: function (data) {
                                var lvContent="";  
                                if (typeof data !="string"){  
                                    lvContent=data.result[0].body.innerText;  
                                }  
                                else{  
                                    lvContent=data;  
                                }  
                                data  = eval('('+lvContent+')');
                                if (data.action == 1) {
                                    window.location.href = "/Home/User/ApigetpaymentGoodsToken?code="+ data.code;
                                }
                            }
                        });
                    }
                }, 6000);
            });
        </script>
</body>
</html>