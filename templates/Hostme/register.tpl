{include file="client_header.tpl" title=$lang['注册用户'] hostname=$c['网站名称']}
<body id="signup-page">
   <div class="page-form">
       <form id="signup-form" method="post" class="form">
             <div class="header-content">
                <h1>{$lang['注册用户']}</h1>
             </div>{include file="alert.tpl"}
             <div class="body-content">
                 <div class="form-group">
                     <div class="input-icon right">
                         <i class="fa fa-user"></i>
                         <input id="username" name="username" type="text" placeholder="{$lang['用户名']}" class="form-control">
                     </div>
                 </div>
                 <div class="form-group">
                     <div class="input-icon right">
                         <i class="fa fa-envelope"></i>
                         <input name="email" type="text" id="email" placeholder="{$lang['电子邮件']}" class="form-control">
                     </div>
                 </div>
<div class="form-group">
<div class="input-icon right">
<i class="fa fa-key">
</i>
<input id="password" name="password" type="password" placeholder="{$lang['密码']}" class="form-control">
</div>
</div>
<div class="form-group">
<div class="input-icon right">
<i class="fa fa-key">
</i>
<input id="repassword" name="repassword" type="password" placeholder="{$lang['重复密码']}" class="form-control">
</div>
</div>
<hr>
<div style="margin-bottom: 15px" class="row">
<div class="col-lg-6">
<label>
<input name="name" type="text" id="name" placeholder="{$lang['姓名']}" class="form-control">
</label>
</div>
<div class="col-lg-6">
<label>
<input name="zip" type="text" id="zip" placeholder="{$lang['邮编']}" class="form-control">
</label>
</div>
</div>
<div class="form-group">
<label style="display: block" class="select">
<select name="country" id="country" class="form-control">
{foreach from=$countrys item=country}
<option value="{$country}"{if $c['默认国家']==$country} selected="selected"{/if}>{$country}</option>
{/foreach}
</select>
</label>
</div>
<div class="form-group">
<div class="input-icon right">
<i class="fa fa-home"></i>
<input name="address" type="text" id="address" placeholder="{$lang['地址']}" class="form-control">
</div>
</div>
<div class="form-group">
<div class="input-icon right">
<i class="fa fa-phone"></i>
<input name="phone" type="text" id="phone" placeholder="{$lang['联系电话']}" class="form-control">
</div>
</div>

<hr>
<div class="form-group mbn">
<a href="{if $c['伪静态开关']=='0'}/index.php{/if}/index/login/" class="btn btn-warning"><i class="fa fa-chevron-circle-left"></i>&nbsp;{$lang['登陆']}</a>
<button type="submit" class="btn btn-info pull-right">{$lang['注册']}&nbsp;<i class="fa fa-chevron-circle-right"></i></button>
</div>
</div>
</form>
<div style="text-align:center;">Powered by <a href="http://www.swapidc.com/">SWAPIDC</a> | {$c['底部版权']} {$c['网站名称']}</p></div>
</div>
<script src="js/jquery-1.10.2.min.js">
</script>
<script src="js/jquery-migrate-1.2.1.min.js">
</script>
<script src="js/jquery-ui.js">
</script>
<!--loading bootstrap js-->
<script src="vendors/bootstrap/js/bootstrap.min.js">
</script>
<script src="vendors/bootstrap-hover-dropdown/bootstrap-hover-dropdown.js">
</script>
<script src="vendors/jquery-validate/jquery.validate.min.js">
</script>
<script src="js/html5shiv.js">
</script>
<script src="js/respond.min.js">
</script>
<script src="js/extra-signup.js">
</script>
<script src="vendors/iCheck/icheck.min.js">
</script>
<script src="vendors/iCheck/custom.min.js">
</script>
<script>//BEGIN CHECKBOX & RADIO
$('input[type="checkbox"]').iCheck({
    checkboxClass: 'icheckbox_minimal-grey',
    increaseArea: '20%' // optional
});
$('input[type="radio"]').iCheck({
    radioClass: 'iradio_minimal-grey',
    increaseArea: '20%' // optional
});
//END CHECKBOX & RADIO
</script>
</body>
</html>