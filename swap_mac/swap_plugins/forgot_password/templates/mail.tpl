	<form class="form-horizontal" method="post">
		<div class="control-group">
			<div class="controls">
				<h4>{$plang['客户中心 - 重置密码']}</h4>
			</div>
		</div>
		<div class="control-group">
			<label for="code" class="control-label">{$plang['验证码']}</label>
			<div class="controls">
				<input id="code" name="code" type="text" placeholder="{$plang['验证码']}" />
			</div>
		</div>
		<div class="control-group">
			<label for="pass" class="control-label">{$plang['新密码']}</label>
			<div class="controls">
				<input id="pass" name="pass" type="password" placeholder="{$plang['新密码']}" />
			</div>
		</div>
		<div class="control-group">
			<label for="repass" class="control-label">{$plang['确认密码']}</label>
			<div class="controls">
				<input id="repass" name="repass" type="password" placeholder="{$plang['确认密码']}" />
			</div>
		</div>
		<div class="control-group"> 
			<div class="controls"><button class="btn">{$plang['重置密码']}</button></div>
		</div>
	</form>