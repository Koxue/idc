{include file="header.tpl" navxz='1' title=$lang['客户中心'] hostname=$c['网站名称']}
{include file="alert.tpl"}
      <!-- Slider -->

    <div class="slidercontainer">
        <div id="mainslider" class="owl-carousel">

            <div class="item">
                <div class="slidecaption">
                   {$tempsz['首页幻灯片html1']}
                </div>
                <img src="{$tempsz['首页幻灯片图片链接1']}" alt="" />
            </div>

            <div class="item">
                <div class="slidecaption">
                    {$tempsz['首页幻灯片html2']}
                </div>
                <img src="{$tempsz['首页幻灯片图片链接2']}" alt="" />
            </div>

            <div class="item">
                <div class="slidecaption">
                    {$tempsz['首页幻灯片html3']}
                </div>
                <img src="{$tempsz['首页幻灯片图片链接3']}" alt="" />
            </div>

            <div class="item">
                <div class="slidecaption">
                    {$tempsz['首页幻灯片html4']}
                </div>
                <img src="{$tempsz['首页幻灯片图片链接4']}" alt="" />
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12">
                <div id="mainslider-nav" class="owl-carousel">
                    <div class="item"><i class="fa fa-rocket"></i>{$tempsz['首页幻灯片标题1']}</div>
                    <div class="item"><i class="fa fa-line-chart"></i>{$tempsz['首页幻灯片标题2']}</div>
                    <div class="item"><i class="fa fa-cloud"></i>{$tempsz['首页幻灯片标题3']}</div>
                    <div class="item"><i class="fa fa-tasks"></i>{$tempsz['首页幻灯片标题4']}</div>
                </div>
            </div>
        </div>
    </div>
    <!-- End of Slider -->

    <!--  Features -->
    <section class="features">
        <div class="row">
            <div class="col-sm-12">
                <h2>{$tempsz['幻灯片下方主标题']}</h2>
                <span>{$tempsz['幻灯片下方副标题']}</span>
            </div>
        </div>

        <div class="row spacing-70">
            <div class="col-sm-4">
                <div class="feature wow zoomIn" data-wow-delay="0.2s">
                    <img src="{$templatedir}/images/rocket.png" alt="" />
                    <h4>{$tempsz['幻灯片下方字块标题1']}</h4>
                    <p>{$tempsz['幻灯片下方字块内容1']}</p>
                </div>
            </div>

            <div class="col-sm-4">
                <div class="feature wow zoomIn" data-wow-delay="0.4s">
                    <img src="{$templatedir}/images/ssd.png" alt="" />
                    <h4>{$tempsz['幻灯片下方字块标题2']}</h4>
                    <p>{$tempsz['幻灯片下方字块内容2']}</p>
                </div>
            </div>

            <div class="col-sm-4">
                <div class="feature wow zoomIn" data-wow-delay="0.6s">
                    <img src="{$templatedir}/images/secure.png" alt="" />
                    <h4>{$tempsz['幻灯片下方字块标题3']}</h4>
                    <p>{$tempsz['幻灯片下方字块内容3']}</p>
                </div>
            </div>

        </div>
    </section>
    <!-- End of Features -->


    

    <!--  Pricing Tables -->
    <section class="pricingtables">
        <div class="row">
            <div class="col-sm-12">
                <h2>{$mlang['最受欢迎的产品']}</h2>
                <p>{$tempsz['主页最受欢迎的产品副标题']}</p>
            </div>
        </div>

        <div class="row spacing-70 no-gutter">
{foreach name=indexbuylist from=$buysz item=buy }
{$loadtime=$smarty.foreach.indexbuylist.iteration*0.2} 		
            <div class="col-sm-3 wow zoomIn" data-wow-delay="{$loadtime}s">
                <div class="panel panel-info">
                    <div class="panel-heading">
                        <h3 class="text-center">{$buy['名称']}</h3>
                    </div>
                                    <div class="panel-body text-center">
                                        <h4>{if is_array($buy['周期'])}
                                      {if isset($buy['周期'][0])}
									 ￥{$buy['周期'][0]['价格']}
									  {else} 无法购买 {/if}
										{else}{if $buy['价格']=='免费'} 免费 /{$buy['周期']}{else}￥{$buy['价格']}{/if}{/if}</h4>
                                       <span class="per" style="padding-top:0px;"> 
									   {if !is_array($buy['周期'])}
									   /{$buy['周期']}<br> 剩余  {$buy['库存']}  个 
									   {else} 
									   {if isset($buy['周期'][0]['时间'])}/{$buy['周期'][0]['时间']} 天  ({$buy['周期'][0]['名称']}){/if} ,  剩余 {$buy['库存']}  个 
									   <br>
									  
									   <a href="javascript:alert('{foreach $buy['周期'] as $num=>$row nocache}{$row['名称']} {$row['价格']}{$c['交易币名称']}/{$row['时间']} 天 }
									   {foreachelse}无价格套餐{/foreach}')" data-toggle="tooltip" data-placement="bottom" style="color:#ffffff;" title="{foreach $buy['周期'] as $num=>$row nocache}{$row['名称']} {$row['价格']}{$c['交易币名称']}/{$row['时间']} 天 &#10;{foreachelse}无价格套餐{/foreach}">鼠标移至这里显示更多价格套餐</a>

									   {/if} </span>
                                    </div>
                    <ul class="text-center">
						{$buy['描述']}

  
                    </ul>
                    <div class="panel-footer">
						<a class="btn btn-lg btn-pricetable" href="{$ROOT}/buy/cart/{$buy['id']}/">{$lang['订购产品']}</a>
                    </div>
                </div>
            </div>


{/foreach}
          
    </section>
    <!-- End of Pricing Tables -->


    <div class="testimonials gray">
        <div class="row">
            <div class="col-sm-12">
                <h3>{$mlang['来自我们客户的评价']}</h3>
                <p> {$tempsz['主页最受欢迎的产品副标题']}</p>

                <div id="testimonials-carousel" class="owl-carousel">

                   {$tempsz['客户评价html']}

                </div>

            </div>
        </div>
    </div>
	 <div class="tabfeatures">
                            <div class="row">
						
                                    <div class="col-sm-12">

                                        <div class="block-grid-xs-1 block-grid-sm-4 block-grid-md-4 supportchannels">

                                            <div class="block-grid-item">
                                                <a href=""><i class="fa fa-comments-o"></i></a>
                                                <h6>{$mlang['在线咨询']}</h6>
                                                <p>{$tempsz['客户评价下面在线咨询副标题']}</p>
                                            </div>

                                            <div class="block-grid-item">
                                                <a href=""><i class="fa fa-pencil-square-o"></i></a>
                                                <h6>{$mlang['提交工单']}</h6>
                                                <p>{$tempsz['客户评价下面提交工单副标题']}</p>
                                            </div>

                                            <div class="block-grid-item">
                                                <a href=""><i class="fa fa-envelope"></i></a>
                                                <h6>{$mlang['邮件沟通']}</h6>
                                                <p>{$tempsz['客户评价下面邮件沟通副标题']}</p>
                                            </div>

                                            <div class="block-grid-item">
                                                <a href=""><i class="fa fa-twitter"></i></a>
                                                <h6>{$mlang['自助服务']}</h6>
                                                <p>{$tempsz['客户评价下面自助服务副标题']}</p>
                                            </div>

                                        </div>

                                    </div>

                                </div>
                        
                                </div>
{include file="footer.tpl"}