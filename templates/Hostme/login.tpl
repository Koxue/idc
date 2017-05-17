{include file="client_header.tpl" title=$lang['登陆'] hostname=$c['网站名称']}
<body id="signin-page">
<div class="page-form">
<form class="form" method="post">
<div class="header-content"><h1>{$lang['用户登陆']}</h1></div>{include file="alert.tpl"}
<div class="body-content">
<div class="form-group">
<div class="input-icon right">
<i class="fa fa-user"></i>
<input id="inputUsername" type="text" placeholder="Username" name="swapname" class="form-control">
</div>
</div>
<div class="form-group">
<div class="input-icon right">
<i class="fa fa-key"></i>
<input id="inputPassword" type="password" placeholder="Password" name="swappass" class="form-control">
</div>
</div>
<div class="form-group pull-right">
<button type="submit" class="btn btn-success">{$lang['登陆']}&nbsp;<i class="fa fa-chevron-circle-right"></i></button>
</div>
<div class="clearfix"></div>
<div class="forget-password">{$plug['登入页底部']}</div>
<hr><p>没有账号？<a id="btn-register" href="{if $c['伪静态开关']=='0'}/index.php{/if}/index/register/">{$lang['注册']}</a></p></div></form>
<div style="text-align:center;">Powered by <a href="http://www.swapidc.com/">SWAPIDC</a> | {$c['底部版权']} {$c['网站名称']}</p></div>
</div>
<script src="{$templatedir}/js/client/jquery-1.10.2.min.js"></script>
<script src="{$templatedir}/js/client/jquery-migrate-1.2.1.min.js"></script>
<script src="{$templatedir}/js/client/jquery-ui.js"></script>
<!--loading bootstrap js-->
<script src="{$templatedir}/vendors/bootstrap/js/bootstrap.min.js">
</script><script src="{$templatedir}/vendors/bootstrap-hover-dropdown/bootstrap-hover-dropdown.js">
</script><script src="{$templatedir}/js/client/html5shiv.js"></script><script src="js/respond.min.js">
</script><script src="{$templatedir}/vendors/iCheck/icheck.min.js"></script>
<script src="{$templatedir}/vendors/iCheck/custom.min.js"></script><script>
//BEGIN CHECKBOX & RADIO
$('input[type="checkbox"]').iCheck({
    checkboxClass: 'icheckbox_minimal-grey',
    increaseArea: '20%' // optional
});
$('input[type="radio"]').iCheck({
    radioClass: 'iradio_minimal-grey',
    increaseArea: '20%' // optional
});
//END CHECKBOX & RADIO
</body>
</html>