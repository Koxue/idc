
<div class="" style="width:100%;text-align:left;">
	<div style="width:100%;text-align:left;background-color: #eeeeee;color: #555555;padding: 10px;border-radius: 6px;margin-bottom: 20px;">
	<form class="form-inline" action="/index.php/plugin/alipay_pay/index/" method="post">
		<p>{$pul['支付宝']}({$pul['货币汇率']}: {$pul['金额']} X {$huilu}):<br>
		{$qina}<input maxlength="5"  name="money" type="text" onkeyup="if(isNaN(this.value)){ this.value=''}">{$hou}
		<input class="btn btn-primary" style="height:30px" type="submit" value="{$pul['提交']}">
		</form>
		</p>
	</div>
</div>


