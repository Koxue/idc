<div id="footer">
		<form method="post" name="languagefrm" id="languagefrom" role="form" class="form-inline">
		<div class="copyright form-group">{$c['底部版权']} {$c['网站名称']} | Theme by Hostme Powered by <a href="http://www.swapidc.com/">SWAPIDC</a> | Execution Time:{$runtime} SEC</div>
		<div class="form-group">
			<select name="language" onchange="languagefrom.submit()" style="height:16px;line-height:16px;color:black;">
			  {foreach from=$l item=langs}
			  <option value="{$langs}"{if $langs==$language} selected="selected"{/if}>{$langs}</option>
			  {/foreach}
			</select>
		</form></div>
</div>
<!--END FOOTER-->
<!--END PAGE WRAPPER-->
</div></div>
<script src="{$templatedir}/js/client/jquery-ui.js"></script>
<!--loading bootstrap js-->
<script src="//cdn.bootcss.com/bootstrap/3.3.5/js/bootstrap.js"></script>
<script src="{$templatedir}/vendors/bootstrap-hover-dropdown/bootstrap-hover-dropdown.js"></script>
<script src="{$templatedir}/js/client/html5shiv.js"></script>
<script src="{$templatedir}/js/client/respond.min.js"></script>
<script src="{$templatedir}/vendors/metisMenu/jquery.metisMenu.js"></script>
<script src="{$templatedir}/vendors/jquery-cookie/jquery.cookie.js"></script>
<script src="{$templatedir}/js/client/jquery.menu.js"></script>
<script src="{$templatedir}/vendors/jquery-pace/pace.min.js"></script>
<script src="{$templatedir}/vendors/responsive-tabs/responsive-tabs.js"></script>
<!--CORE JAVASCRIPT-->
<script src="{$templatedir}/js/client/main.js"></script>
</body>
</html>