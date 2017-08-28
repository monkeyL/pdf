<?php if (!defined('THINK_PATH')) exit();?>
<style type="text/css">
    .alert{background-color:#f1f1f1; width:495px;margin:50px auto; font-size:12px; line-height:24px;}
    .alert .alert_body{ border:1px solid #cbcbcb;background-color:#fff; width:475px; height:143px; position:relative; top:-5px; left:-5px; padding:10px;}
    .alert .alert_body h3{font-size:14px; font-weight:bold; margin:0;}
    .alert .alert_body .alertcont{margin:15px 0 0 85px; padding:5px 50px; line-height:30px; color:#666; min-height:30px; _height:30px;}
    .alert .alert_body .alertcont a{color:#000; text-decoration:none;}
    .alert .alert_body .alertcont span{font-size:12px; font-weight:bold; color:#000;}
    .alert .alert_body .btn{text-align:center; padding-top:0px;}
    .alert .alert_body .btn img{border:0;}
    .alert .alert_body .success{ background:url('__PUBLIC__/images/success.png') left center no-repeat; }
    .alert .alert_body .error{ background:url('__PUBLIC__/images/error.png') left center no-repeat; }
    
    .message{display:block;position:absolute;top:0;left:30%;
             left:50%;/*FF IE7*/
             top: 50%;/*FF IE7*/
             margin-left:-240px!important;/*FF IE7 该值为本身宽的一半 */
             margin-top:-70px!important;/*FF IE7 该值为本身高的一半*/
             margin-top:0;
             position:fixed!important;/*FF IE7*/
             position:absolute;/*IE6*/
             }
    .message .alert_body{ padding:0; height:163px; width:495px; border:1px solid #cae3eb;}
    .message .alert_body h3{background-color:#e9f4f7; padding:3px 15px;}
    .btn a{text-decoration: none;color: blue;}
    .btn a:hover{text-decoration: underline;color: blue;}
</style>

<div class="alert message">
    <div class="alert_body">
        <h3>系统提示</h3>
        <?php if(isset($message)): ?><p class="alertcont success" id="successMsg">
            <span><?php echo($message); ?></span>
            </p>
            <?php else: ?>
            <p class="alertcont error" id="errorMsg">
            <span><?php echo($error); ?></span>
            </p><?php endif; ?>
        <p class="btn">系统会在<b id="wait"><?php echo($waitSecond); ?></b>秒内自动跳转，如果没有自动跳转，<a id="href" href="<?php echo($jumpUrl); ?>">请点击这里</a></p>
    </div>
</div>

<script type="text/javascript">
    (function(){
        var wait = document.getElementById('wait'),href = document.getElementById('href').href;
        var interval = setInterval(function(){
            var time = --wait.innerHTML;
            if(time == 0) {
                location.href = href;
                clearInterval(interval);
            };
        }, 1000);
    })();


    function jumpIt(){
        var wait = document.getElementById('wait'),href = document.getElementById('href').href;
        var interval = setInterval(function(){
            var time = --wait.innerHTML;
            if(time == 0) {
                location.href = href;
                clearInterval(interval);
            };
        }, 1000);
    }
</script>