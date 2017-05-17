	<form class="form-horizontal" method="post">
		<div class="control-group">
			<div class="controls">
				<h4>{$plang['客户中心 - 找回密码']}</h4>
			</div>
		</div>
		<div class="control-group">
			<label for="username" class="control-label">{$plang['用户名或邮箱']}</label>
			<div class="controls">
				<input id="username" name="username" type="text" placeholder="{$plang['用户名或邮箱']}" />
			</div>
		</div>
		<div class="control-group"> 
			<div class="controls"><button class="btn">{$plang['找回密码']}</button></div>
		</div>
		<div class="control-group"> 
			<div class="controls"><a href="/index.php/plugin/forgot_password/mail/">{$plang['您已经有代码?点击这里输入重置密码']}</a></div>
		</div>
	</form>