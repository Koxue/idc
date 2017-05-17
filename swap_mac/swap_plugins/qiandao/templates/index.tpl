<div class="span4">
	<div class="stat active">
		<h4>{$t['lang']['签到领取']} {$t['jeecho']} {$c['交易币名称']}</h4>
		<p>
		{if $t['err']!==''}
		{$t['err']}
		{else}
		<a href="/index.php/plugin/qiandao/index" class="btn">{$t['lang']['签到']}</a>
		{/if}
		</p>
	</div>
</div>
