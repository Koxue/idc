<section class="elements" style="border-radius: 6px;margin-bottom: 70px;padding: 25px;"><div class="row">
<h4 class="small-divide">邮箱与手机认证</h4><hr style="margin-top: 15px;">
 <div id="payplugin">
	<dl class="dl-horizontal">
		<dt>邮箱验证状态</dt>
		<dd>{if $L['变量']['邮箱验证状态']==1} <span class="label label-success">已认证</span>{else}<span class="label label-important" style="background-color: #b94a48;">未认证</span>{/if}</dd>
	</dl>
	<dl class="dl-horizontal">
		<dt>手机验证状态</dt>
		<dd>{if $L['变量']['手机验证状态']==1} <span class="label label-success">已认证</span>{else}<span class="label label-important" style="background-color: #b94a48;">未认证</span>{/if}</dd></dd>
	</dl>
	<dl class="dl-horizontal">
		<dt>邮箱</dt>
		<dd><input id="mail" type="text" value="{$s['登陆邮箱']}"/></dd>
		<dd><a href="javascript:void(0);" onclick="sendyx()" class="btn btn-primary" >发送验证码</a></dd>
	</dl>
	<dl class="dl-horizontal">
		<dt>邮箱验证码</dt>
		<dd><input id="mailcode" type="text" value=""/></dd>
		<dd><a href="javascript:void(0);" onclick="yzyx()" class="btn btn-primary" >验证或修改邮箱</a></dd>
	</dl><!-- disabled -->
	{if $L['变量']['语音验证码_APP_ID']!=''}
	<dl class="dl-horizontal">
		<dt>手机</dt>
		<dd><input id="sj" type="text" value="{$s['登陆电话号码']}"/></dd>
		<dd><a href="javascript:void(0);" onclick="sendsj()" class="btn btn-primary" >发送验证码</a></dd>
	</dl>
	<dl class="dl-horizontal">
		<dt>手机验证码</dt>
		<dd><input id="sjcode" type="text" value=""/></dd>
		<dd><a href="javascript:void(0);" onclick="yzsj()" class="btn btn-primary" >验证或修改手机</a></dd>
	</dl><!-- disabled -->
	{/if}
<script type="text/javascript">
function sendyx(){
	$.post('/index.php/plugin/regkz/mailjh2/?m=send', { 'mail': $('#mail').val()},
    function (data) { alert(data);});
}	
function sendsj(){
	$.post('/index.php/plugin/regkz/mailjh2/?m=sendphone', { 'phone': $('#sj').val()},
    function (data) { alert(data);});

}	
function yzyx(){
	$.post('/index.php/plugin/regkz/mailjh2/?m=yz', { 'code': $('#mailcode').val()},
    function (data) { alert(data);});
}	
function yzsj(){
	$.post('/index.php/plugin/regkz/mailjh2/?m=yzphone', { 'code': $('#sjcode').val()},
    function (data) { alert(data);});
}	
</script>	
	
	
</div></div></section>	 