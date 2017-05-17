{include file="customer_header.tpl" title=$lang['客户中心'] hostname=$c['网站名称']}
<div class="primarymenu menuwrap">
					<ul id="atp_menu" class="sf-menu">
						<li class="current-page-ancestor"><a href="{if $c['伪静态开关']=='0'}/index.php{/if}/index/index/">{$lang['客户中心']}</a></li>
						<li><a href="{if $c['伪静态开关']=='0'}/index.php{/if}/buy/index/">{$lang['订购产品']}</a></li>
						<li><a href="{if $c['伪静态开关']=='0'}/index.php{/if}/index/announcements/">{$lang['公告信息']}</a></li>
						<li><a href="#contantus">{$tlang['联系我们']}</a></li>
						
					</ul>
					
				</div><!-- .primarymenu -->
   	    </div><!-- .inner-->
	</div><!-- #header -->
<div class="clear"></div>
		<div id="featured_slider">
		
			<div class="slider_stretched">
			<script type="text/javascript">
			jQuery(document).ready(function($) {
				jQuery(".flexslider").flexslider({
					animation: "fade",
					controlsContainer: ".flex-container",
					slideshow: true,
					slideshowSpeed: 3000,
					animationDuration: 400,
					directionNav: true,
					controlNav: false,
					mousewheel: false,
					smoothHeight :true,
					start: function(slider) {
						jQuery(".total-slides").text(slider.count);
					},
					after: function(slider) {
						jQuery(".current-slide").text(slider.currentSlide);
					}
				});
			});	
			</script>
				<div class="flexslider">
					<ul class="slides">
						<li>
							<img src="{$tempsz['首页幻灯片地址1']}	" alt="" />			
							<div class="flex-caption">
								<div class="flex-title">
									<h5><span>Slider 1</span></h5>
								</div>
							</div>
						</li>
						<li>
							<img src="{$tempsz['首页幻灯片地址2']}	" alt="" />			
							<div class="flex-caption">
								<div class="flex-title">
									<h5><span>Slider 3</span></h5>
								</div>
								</div>
						</li>
						<li><img src="{$tempsz['首页幻灯片地址3']}	" alt="" />			
							<div class="flex-caption">
								<div class="flex-title">
									<h5><span>Slider 2</span></h5>
								</div>
							</div>
						</li> 
					</ul>
					<ul class="flex-direction-nav">
						<li><a href="#" class="flex-prev">Previous</a></li>
						<li><a href="#" class="flex-next">Next</a></li>
					</ul>
				</div><!-- .flex_slider -->
			</div><!-- .slider_stretched -->
		</div><!-- #featured_slider -->
		
		<div class="pagemid_section">
			<div class="section_row clearfix"  style="padding:20px 0px 20px 0px;color:#ffffff;">
				<div class="section_bg"  style="background-color:#1abc9c;"></div>
					<div class="section_inner">
						<div  data-id="fadeInUp" class="custom-animation iva_anim">
							<div  class="callOutBox iva_anim" >
								<div class="teaser_Content">
									<div class="callOut_Text">
										<h3>{$tempsz['中部简介主']}</h3>
										<p>{$tempsz['中部简介副']}<br /></p>
									</div>
									<div class="callOut_Button"><a href="{if $c['伪静态开关']=='0'}/index.php{/if}/buy/index/" class="btn medium flat midnightblue" ><span>{$tlang['购买按钮']}</span></a></div>
								</div>
							</div>
						</div>
					</div><!-- section_inner -->
			</div><!-- section_row -->			
			{$tempsz['产品介绍HTML']}			
			{$tempsz['视频介绍HTML']}
			{$tempsz['优势介绍HTML']}
			<!-- section_row -->
		</div><!-- .pagemid -->
{include file="customer_footer.tpl"}