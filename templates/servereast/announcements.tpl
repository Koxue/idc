{include file="header.tpl" navxz='3' title=$lang['公告信息'] hostname=$c['网站名称']}{include file="alert.tpl"}
  <!-- Breadcrumps -->
  <div class="breadcrumbs">
    <div class="row">
      <div class="col-sm-6">
        <h1>{$lang['公告信息']}</h1>
      </div>
    </div>
  </div>

  <!-- End of Breadcrumps -->
	
<div class="servers-table">
    <div class="row">
      <div class="col-sm-12">
        <table data-wow-delay="0.3s" class="products-table responsive wow fadeInUp tablesaw tablesaw-stack" data-mode="stack">
          <thead>
            <tr>
              <th>{$lang['标题']}</th>
							<th>{$lang['时间']}</th>
            </tr>
          </thead>
          <tbody>
             {foreach from=$news item=new}
        <tr>
				 <td><a href="{$ROOT}/index/announcement/{$new['公告ID']}/">{$new['公告标题']}</a></td>
         <td>{$new['公告时间']}</td>
        </tr>
       {/foreach}
            
          </tbody>
        </table>
      </div>
			


<div class="col-sm-12 wow fadeInRight r-tabs">
<br><br><br>				
          <ul class="r-tabs-nav">

<li class="r-tabs-tab r-tabs-state-{if $t['当前页数']=='1'}default{else}active{/if}" style="padding: 0 0 0 0;"><a href="{$t['上一页连接']}" class="r-tabs-anchor">{$lang['上一页']}</a></li>
<li class="r-tabs-tab r-tabs-state-default" style="padding: 0 0 0 0;"><a  class="r-tabs-anchor">{$lang['总共']}:{$t['总页数']}{$lang['页']} {$lang['当前']}:{$t['当前页数']}{$lang['页']}</a></li>
<li class="r-tabs-tab r-tabs-state-{if $t['当前页数']==$t['总页数']}default{else}active{/if}" style="padding: 0 0 0 0;"><a href="{$t['下一页连接']}" class="r-tabs-anchor">{$lang['下一页']}</a></li>
          </ul>
    </div>
	
	
    </div>
  </div>


 
{include file="footer.tpl"}