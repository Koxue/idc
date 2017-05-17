<div id="footer">
			<div class="inner">
			
				<div class="footer-sidebar">
					<div class="one_half">
						<div class="one_half" id="contantus">
							<aside class="contactinfo-wg">
								<h3 class="widget-title">{$tlang['联系我们']}</h3>
								<div class="contactinfo-wrap">
									<p><strong><span class="details">{$c['网站名称']}</span></strong></p>
									<p>
										<span class="icon"><i class="fa fa-map-marker"></i></span>
										<span class="details">
											{$tempsz['联系地址1']}<br>
											{$tempsz['联系地址2']}<br>
											{$tempsz['联系地址3']}<br>
											{$tempsz['联系地址4']}
										</span>
									</p>
									<p class="phone">
										<span class="icon"><i class="fa fa-phone"></i></span>
										<span class="details">{$tempsz['电话']}</span>
									</p>
									<p>
										<span class="icon"><i class="fa fa-envelope"></i></span>
										<span class="details"><a href="mailto:{$tempsz['邮箱']}">{$tempsz['邮箱']}</a></span>
									</p>
									<p>
										<span class="icon"><i class="fa fa-link"></i></span>
										<span class="details"><a href="#">{$tempsz['页脚网站域名']}</a></span>
									</p>
								</div>
							</aside>
						</div><!-- .one_half -->

						<div class="one_half last">
							<aside class="widget_text">
								<h3 class="widget-title">{$tlang['服务']}</h3>
								<div class="textwidget">
									<ul>
										{$tempsz['页脚服务HTML']}
									</ul>
								</div>
							</aside>
						</div><!-- .one_half last -->
					</div><!-- .one_half -->
					
					<div class="one_half last">
						<aside class="widget_text">
							<div class="textwidget">
								<figure><img src="{$tempsz['小logo地址']}" alt="" /></figure>
								<div class="demo_space"></div>
									{$tempsz['网站简介']}
							</div>
						</aside>
						<aside class="flickr-wg">
							<h3 class="widget-title"></h3>
							{$tempsz['页脚照片展示HTML']}
					</aside>					
					</div><!-- .one_half last -->
					
				</div><!-- .footer-sidebar -->
				<div class="clear"></div>
				<div class="copyright clearfix">
		<div class="copyright_left">{$c['底部版权']} {$c['网站名称']}</div>
		<div class="copyright_right">Powered by <a href="http://www.swapidc.com/">SWAPIDC</a> | Execution Time:{$runtime} SEC&nbsp;&nbsp;
		
		<form method="post" name="languagefrm" id="languagefrom" role="form" class="form-inline" style="float:right;">
		<div>
		{$lang['选择语言']}
		<select name="language" onchange="languagefrom.submit()" style="height:20px;color:black;padding:0px;">
		{foreach from=$l item=langs}
		<option value="{$langs}"{if $langs==$language} selected="selected"{/if}>{$langs}</option>
		{/foreach}
		</select>
		</form>
		</div><!-- .copyright -->	</div>
			</div><!-- .inner -->
		</div><!-- #footer -->
	</div><!-- #wrapper -->
</div>
<!-- #layout -->
<div id="back-top"><a href="#header"><span></span></a></div>
<script type='text/javascript' src='{$templatedir}/js/customer/sys_custom.js'></script>	
</body>
</html>