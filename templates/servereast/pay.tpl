{include file="header.tpl" navxz='5' title=$lang['账户充值'] hostname=$c['网站名称']}{include file="alert.tpl"}
    <div class="blog">
        <div class="row">
{include file="user_left.tpl" title=$lang['账户充值']}

<div class="col-sm-8">

                <!-- Blog Post-->
                <article style="margin-bottom: 15px;">
                    <div class="post-content">
                        <h3>{$lang['账户充值']}</h3>
                        <hr style="margin-top: 15px;"/>
						
						
						<div class="row-fluid">
				<div class="span4">
					<div class="stat active">
						<h2>{$s['登陆预存款']}{$c['交易币名称']}</h2>
						<h5>{$mlang['您的剩余预存款']}</h5>
					</div>
				</div>
				{$plug['预存款列表']}
			</div>
						

		</div></article>	
	<section class="elements" style="border-radius: 6px;margin-bottom: 70px;padding: 25px;">		
		<div class="row">
	<h4 class="small-divide">{$lang['存款 / 支付网关']}</h4>

		

          <div id="payplugin">{$plug['存款支付网关前端']} </div>

				</div>	
			   
  </section>	                   
                
                <!-- End of Blog Post-->
      </div>
    </div>
    </div>
{include file="footer.tpl"}