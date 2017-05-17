    
	$(function(){
		$(":submit").attr('id','login_submit');
		$("form").prepend('<div id="login_submit_div"></div>'); 
	});
	var handlerPopup = function (captchaObj) {
        $("#login_submit").click(function () {
            var validate = captchaObj.getValidate();
            if (!validate) {
                alert('请先完成验证！');
                return;
            }
        });
        captchaObj.bindOn("#login_submit");
        captchaObj.appendTo("#login_submit_div");
    };
    $.ajax({
        url: "/index.php/plugin/regkz/startyzm/a/?t=" + (new Date()).getTime(), 
        type: "get",
        dataType: "json",
        success: function (data) {
            initGeetest({
                gt: data.gt,
                challenge: data.challenge,
                product: "popup", // 产品形式，包括：float，embed，popup。注意只对PC版验证码有效
                offline: !data.success // 表示用户后台检测极验服务器是否宕机，一般不需要关注
            }, handlerPopup);
        }
    });