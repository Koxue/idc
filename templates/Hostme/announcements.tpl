{include file="customer_header.tpl" title=$lang['公告信息'] hostname=$c['网站名称']}
 
<div class="primarymenu menuwrap">
					<ul id="atp_menu" class="sf-menu">
						<li><a href="{if $c['伪静态开关']=='0'}/index.php{/if}/index/index/">{$lang['客户中心']}</a></li>
						<li><a href="{if $c['伪静态开关']=='0'}/index.php{/if}/buy/index/">{$lang['订购产品']}</a></li>
						<li class="current-page-ancestor"><a href="{if $c['伪静态开关']=='0'}/index.php{/if}/index/announcements/">{$lang['公告信息']}</a></li>
						<li><a href="#contantus">{$tlang['联系我们']}</a></li>
						
					</ul>
					
				</div><!-- .primarymenu -->
   	    </div><!-- .inner-->
	</div><!-- #header -->
<div class="clear"></div>
			<div class="clear"></div>
		<div id="subheader">
			<div class="inner">
				<div class="subdesc">
					<h1 class="page-title">{$lang['公告信息']}</h1>
					<div class="customtext"><h2></h2></div>
				</div>
				<div class="breadcrumbs"><!-- Breadcrumb NavXT 5.0.1 -->
					<a title="Go to Hostme v2." href="video-post-format.html" class="home">{$c['网站名称']}</a> &gt; {$lang['公告信息']}
				</div>
			</div>
		</div><!-- #subheader -->
		
		<div class="pagemid">
			<div class="inner">
				<div id="main">
					<div class="entry-content">
					<script type='text/javascript' src='{$templatedir}/js/customer/readmore/readmore.js'></script>
					{foreach from=$news item=new}
						<div class="post">
							<div class="post_content">
								<h2 class="entry-title"><a rel="bookmark">{$new['公告标题']}</a></h2>
									<div class="post-info">
										<div class="post-metadata">
											<span>{$new['公告时间']}</span>
											<span><a rel="author">{$new['公告作者']}</a></span>
										</div>														
									</div><!-- post-info -->									
									<div class="post-entry">
										<p>{$new['公告内容']}</p>										
									</div>
									<script>$('.post-entry').readmore();</script>	
							</div><!-- .post_content -->								
						</div><!-- .post -->					
					 {/foreach}
					</div><!-- .entry-content -->
						  <div style="text-align:center;">
					<a class="btn btn-default{if $t['当前页数']=='1'} active{/if}" href="{$t['上一页连接']}">&larr; {$lang['上一页']}</a>
		{$lang['总共']}:{$t['总页数']}{$lang['页']} {$lang['当前']}:{$t['当前页数']}{$lang['页']}
        <a class="btn btn-default{if $t['当前页数']==$t['总页数']} active{/if}" href="{$t['下一页连接']}">{$lang['下一页']} &rarr;</a>
					</div>
					
				</div><!-- #main -->
				
				<div class="clear"></div>
				
			</div><!-- .inner -->
			
		</div><!-- .pagemid -->


{include file="customer_footer.tpl"}