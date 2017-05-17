{include file="customer_header.tpl" title=$lang['客户中心'] hostname=$c['网站名称']}
 
<div class="primarymenu menuwrap">
					<ul id="atp_menu" class="sf-menu">
						<li><a href="{if $c['伪静态开关']=='0'}/index.php{/if}/index/index/">{$lang['客户中心']}</a></li>
						<li class="current-page-ancestor"><a href="{if $c['伪静态开关']=='0'}/index.php{/if}/buy/index/">{$lang['订购产品']}</a></li>
						<li><a href="{if $c['伪静态开关']=='0'}/index.php{/if}/index/announcements/">{$lang['公告信息']}</a></li>
						<li><a href="#contantus">{$tlang['联系我们']}</a></li>
						
					</ul>
					
				</div><!-- .primarymenu -->
   	    </div><!-- .inner-->
	</div><!-- #header -->
<div class="clear"></div>
 <div class="section_row clearfix">
				<div class="section_bg" style="background-color:#e0e0e0;"></div>
					<div class="section_inner">
						<h1 class="center">{$lang['订购产品']}</h1>
						
<div align="center">
{foreach from=$farray item=fs}
<a class="{if $fs['选中']=='1'}btn btn-warning{else}btn btn-default{/if}" href="{if $fs['选中']!='1'}{if $c['伪静态开关']=='0'}/index.php{/if}/buy/index/{$fs['id']}/{/if}#">{$fs['分类名称']}</a>
{/foreach}
</div>
						
							<div data-id="bounceIn" class="pricetable  iva_anim">
								<div class="pricing-inner">								
								{foreach from=$buys item=buy nocache}															
									<div class="column ">
										<div class='price-head'>
											<h2 class="title">{$buy['名称']}</h2>
											<h4 class="price-font">{if $buy['价格']=='免费'}{$lang['免费']}{else}{$buy['价格']}<span>/ {$lang[$buy['周期']]}{/if}</span></h4>
										</div>
										<div class="price-content">
											<ul>
											{$buy['描述']}
											</ul>
											{if {$buy['库存']} != 0}<p class="center"><a href="{if $c['伪静态开关']=='0'}/index.php{/if}/buy/cart/{$buy['id']}" class='btn center medium full orange iva_anim'><span >{$tlang['立即购买']}</span></a></p>
											{else}<p class="center"><a class='btn center medium full abestos iva_anim '><span >{$tlang['缺货中']}</span></a></p>{/if}
										</div>
									</div><!-- .column -->															
								{/foreach}																
								</div><!-- .pricing-inner -->								
								<div class="clear"></div>
							</div><!-- .pricetable -->
							
					</div><!-- .section_inner -->
			</div><!-- .section_row -->  
{include file="customer_footer.tpl"}