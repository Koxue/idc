{include file="header.tpl" navxz='5' title=$mlang['我的订单'] hostname=$c['网站名称']}{include file="alert.tpl"}
  <!-- Breadcrumps -->
  <div class="breadcrumbs">
    <div class="row">
      <div class="col-sm-6">
        <h1>{$mlang['我的订单']}</h1>
      </div>
    </div>
  </div>
<style>
@media only screen and (max-width: 767px){
	.wdddsj {  width: 0px; display: none; }
	.wdddsjzt {  color: black;background: white;margin: 0;padding: 0; }
}
</style>
  <!-- End of Breadcrumps -->
	
<div class="servers-table">
    <div class="row">
      <div class="col-sm-12">
        <table data-wow-delay="0.1s" class="products-table responsive wow fadeInUp tablesaw tablesaw-stack" data-mode="stack">
          			<thead>
			    <tr>
			        <th>{$lang['主域名']}</th>
			        <th class="wdddsj">{$lang['类型']}</th>
			        <th>{$lang['状态']}</th>
			        <th class="wdddsj">{$lang['开通时间']}</th>
			        <th>{$lang['到期时间']}</th>
			        <th>{$mlang['操作']}</th>
			    </tr>
			</thead>
			<tbody>
		        {foreach from=$servers item=server}
				<tr>
			        <td><a href="{$ROOT}/control/invoice/{$server['id']}/">{if $server['域名']=='无需主域名'}{$server['用户名']}{else}{$server['域名']}{/if}</a></td>
			        <td class="wdddsj">{$server['产品类型']}</td>
			        <td>
					<!-- {if $server['状态']=='激活'} -->
					<a class="btn btn-success wdddsjzt">{$lang['激活']}</a>
					<!-- {elseif $server['状态']=='等待审核'} -->
					<a class="btn btn-info wdddsjzt">{$lang['等待审核']}</a>
					<!-- {elseif $server['状态']=='暂停'} -->
					<a class="btn btn-warning wdddsjzt">{$lang['暂停']}</a>
					<!-- {elseif $server['状态']=='停止'} -->
					<a class="btn btn-info wdddsjzt" style="background-color: #b94a48;color: #FFF;">{$lang['停止']}</a>
					<!-- {elseif $server['状态']=='驳回'} -->
					<a class="btn btn-info wdddsjzt" style="background-color: #333333;color: #FFF;">{$lang['驳回']}</a>
					<!-- {elseif $server['状态']=='等待付款'} -->
					<a class="btn btn-default wdddsjzt">{$lang['等待付款']}</a>
					<!-- {else} -->
					<a class="btn btn-info wdddsjzt">{$server['状态']}</a>
					<!-- {/if} -->
					</td>
			        <td class="wdddsj">{$server['开通时间']}</td>
			        <td>{$server['到期时间']}<xh class="wdddsj">({if is_array($server['周期'])}{$server['周期']['名称']}{else}{$server['周期']}{/if})</xh></td>
			        <td>
		        		<div class="btn-group"> 
						{if $server['状态']=='等待付款'}
						  <a href="{$ROOT}/control/invoice/{$server['id']}/" class="btn btn-primary">{$lang['订单']}</a>
						{else} 
			              <a href="{$ROOT}/control/detail/{$server['id']}/" class="btn btn-{if $server['状态']!='激活' and $server['状态']!='暂停'}default{else}primary{/if}">{$lang['管理']}</a>
						{/if}
			            </div>
			        </td>
		        </tr>
				{/foreach}
		    </tbody>
        </table>
      </div>
			


	
	
    </div>
  </div>


 
{include file="footer.tpl"}