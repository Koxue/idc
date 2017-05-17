{include file="header.tpl" navxz='2' title=$lang['客户中心'] hostname=$c['网站名称']}
{include file="alert.tpl"}  


    <!-- Breadcrumps -->
    <div class="breadcrumbs">
        <div class="row">
            <div class="col-sm-6">
                <h1>{$lang['订购产品']}</h1>
            </div>

        </div>
    </div>

    <!-- End of Breadcrumps -->


    <!--  Pricing Tables -->
    <section class="pricingtables shared">
	<div class="shared-features">
        <div class="row">
            <div class="col-sm-12">
                <h2>{$mlang['挑选一个最适合你的产品']}</h2>
				<div id="shared-hosting-tabs" class="wow fadeInRight spacing-70 r-tabs" data-wow-delay="0.2s">
                    <ul class="r-tabs-nav">
						{foreach from=$farray item=fs}

<li class="r-tabs-tab r-tabs-state-{if $fs['选中']=='1'}active{else}default{/if}" style="padding: 0 0 0 0;"><a href="{$ROOT}/buy/index/{$fs['id']}/" class="r-tabs-anchor">{$fs['分类名称']}</a></li>

{/foreach}
                     
                    </ul>
</div>
</div>

            </div>
        </div>



                        <div class="row">
{foreach from=$buys item=buy nocache}
                            <div class="col-sm-3 wow fadeInUp">
                                <div class="panel panel-info">
                                    <div class="panel-heading">
                                        <h3 class="text-center">{$buy['名称']}</h3>
                                    </div>
                                    <div class="panel-body text-center">
                                        <h4>{if is_array($buy['周期'])}
                                      {if isset($buy['周期'][0])}
									 ￥{$buy['周期'][0]['价格']}
									  {else}{$lang['无法购买']}{/if}
										{else}{if $buy['价格']=='免费'}{$lang['免费']}/{$lang[$buy['周期']]}{else}￥{$buy['价格']}{/if}{/if}</h4>
                                       <span class="per" style="padding-top:0px;"> 
									   {if !is_array($buy['周期'])}
									   /{$lang[$buy['周期']]}<br>{$lang['剩余']} {$buy['库存']} {$lang['个']}
									   {else}
									   {if isset($buy['周期'][0]['时间'])}/{$buy['周期'][0]['时间']}{$lang['天']} ({$buy['周期'][0]['名称']}){/if} , {$lang['剩余']} {$buy['库存']} {$lang['个']}
									   <br>
									  
									   <a href="javascript:alert('{foreach $buy['周期'] as $num=>$row nocache}{$row['名称']} {$row['价格']}{$c['交易币名称']}/{$row['时间']}{$lang['天']}
									   {foreachelse}无价格套餐{/foreach}')" data-toggle="tooltip" data-placement="bottom" style="color:#ffffff;" title="{foreach $buy['周期'] as $num=>$row nocache}{$row['名称']} {$row['价格']}{$c['交易币名称']}/{$row['时间']}{$lang['天']}&#10;{foreachelse}无价格套餐{/foreach}">鼠标移至这里显示更多价格套餐</a>

									   
									   <!-- 
									 {foreach $buy['周期'] as $num=>$row nocache}{$row['名称']} {$row['价格']}{$c['交易币名称']}/{$row['时间']}天<br>{foreachelse}无价格套餐{/foreach} -->
									   
									   {/if} </span>
                                    </div>
                                    <ul class="text-center">
                                        {$buy['描述']}
                                    </ul>
                                    <div class="panel-footer">
									
                                        <a class="btn btn-lg btn-pricetable" href="{if $buy['库存'] == 0}javascript:void(0);{else}{$ROOT}/buy/cart/{$buy['id']}/{/if}">{$lang['订购产品']}</a>
                                    </div>
                                </div>
                            </div>
  {/foreach}
 
	
		

                        </div>

        
    </section>
    <!-- End of Pricing Tables -->
<script>
   $(function () { $("[data-toggle='tooltip']").tooltip(); });
</script>
    <!-- Shared Hosting Tabs -->
{$tempsz['购买产品页下方html']}
    <!-- End of Shared Hosting Tabs -->


		  
{include file="footer.tpl"}