{include file="header.tpl" title=$lang['网络故障'] hostname=$c['网站名称']}
    <div id="in-nav">
      <div class="container">
        <div class="row">
          <div class="span12">
            <ul class="pull-right">
			{if $s['是否已经登陆']=='是'}
              <li>{$lang['欢迎回来']}: {$s['登陆用户名']} / <a href="{$ROOT}/user/index/">{$lang['我的资料']}</a> / <a href="{$ROOT}/index/login/">{$lang['退出帐户']}</a></li>
            {else}
              <li><a href="{$ROOT}/index/login/">{$lang['登陆']}</a>/<a href="{$ROOT}/index/register/">{$lang['注册']}</a></li>
			{/if}
            </ul><a id="logo" href="{$ROOT}/index/index/">
              <h4>{$c['头部LOGO']}</h4></a>
          </div>
        </div>
      </div>
    </div>
    <div id="in-sub-nav">
      <div class="container">
        <div class="row">
          <div class="span12">
            <ul>
              <li><a href="{$ROOT}/index/index/" class="active"><i class="batch home"></i><br />{$lang['客户中心']}</a></li>
			  <li><a href="{$ROOT}/control/index/"><i class="batch b-database"></i><br>{$lang['控制面板']}</a></li>
              <li><a href="{$ROOT}/buy/index/"><i class="batch quill"></i><br />{$lang['订购产品']}</a></li>
              <li><a href="{$ROOT}/user/index/"><i class="batch users"></i><br />{$lang['用户中心']}</a></li>
            </ul>
          </div>
        </div>
      </div>
    </div>
    <div class="page">
      <div class="page-container">
<div class="container">
  <div class="row">
    <div class="span9">
		<h4 class="header">{$lang['网络故障']}</h4>
		  <div class="widget" align="center">
		  <a href="{$ROOT}/networkissues/index/1/"><span class="label label-important">{$e['开放的数量']}</span>{$lang['开放']}</a> | <a href="{$ROOT}/networkissues/index/2/"><span class="label label-inverse">{$e['计划中的数量']}</span>{$lang['计划中']}</a> | <a href="{$ROOT}/networkissues/index/3/"><span class="label label-success">{$e['已解决的数量']}</span>{$lang['已解决']}</a>
          </div>
        <table>
			<tbody>
		        {foreach from=$net item=n}
				<tr>
			        <td><h3>{$n['标题']}（{$n['状态']}）</h3></td>
		        </tr>
		        <tr>
			        <td><h5>{$lang['影响的服务']} - {$n['受到影响的服务']} | {$lang['优先级']} -{$n['优先级']}</h5></td>
		        </tr>
		        <tr>
			        <td>
					<blockquote>{$n['内容']}</blockquote>
					</td>
		        </tr>
		        <tr>
			        <td><h6>{$lang['日期']} - {$n['时间']}</h6></td>
		        </tr>
		        <tr>
			        <td><h6>{$lang['最近更新']} - {$n['最近更新']}</h6></td>
		        </tr>
				{/foreach}
		    </tbody>
		</table>
		<a class="btn{if $t['当前页数']=='1'} active{/if}" href="{$t['上一页连接']}">&larr; {$lang['上一页']}</a>
		{$lang['总共']}:{$t['总页数']}{$lang['页']} {$lang['当前']}:{$t['当前页数']}{$lang['页']}
        <a class="btn{if $t['当前页数']==$t['总页数']} active{/if}" href="{$t['下一页连接']}">{$lang['下一页']} &rarr;</a>
	</div>
    <div class="span3">
      <h4>{$lang['快速导航']}</h4>
        <table class="table">
           <tbody>
              <tr><td><a href="{$ROOT}/index/index/"><span class="label label-success">1</span> {$lang['客户中心']}</a></td></tr>
              <tr><td><a href="{$ROOT}/control/index/"><span class="label label-info">2</span> {$lang['控制面板']}</a></td></tr>
			  <tr><td><a href="{$ROOT}/index/announcements/"><span class="label label-warning">3</span> {$lang['公告信息']}</a></td></tr>
			  <tr><td><a href="{$ROOT}/ticket/submit/"><span class="label label-important">4</span> {$lang['提交服务单']}</a></td></tr>
			  <tr><td><a href="{$ROOT}/buy/index/"><span class="label label-info">5</span> {$lang['订购产品']}</a></td></tr>
           </tbody>
        </table>
	  <hr />
	  {if $s['是否已经登陆']=='是'}
	  <h4>{$lang['账户信息']}</h4>
        <table class="table">
           <tbody>
              <tr><td>{$s['登陆姓名']}</td></tr>
              <tr><td>{$s['登陆地址']}</td></tr>
			  <tr><td>{$s['登陆国家']}</td></tr>
			  <tr><td>{$s['登陆邮箱']}</td></tr>
           </tbody>
        </table>
	  <hr />
	  {/if}
	  <h4>{$lang['选择语言']}</h4>
		<form method="post" name="languagefrm" id="languagefrom">
			<select name="language" onchange="languagefrom.submit()">
			  {foreach from=$l item=langs}
			  <option value="{$langs}"{if $langs==$language} selected="selected"{/if}>{$langs}</option>
			  {/foreach}
			</select>
		</form>
    </div>
  </div>
</div>
      </div>
    </div>
{include file="footer.tpl"}