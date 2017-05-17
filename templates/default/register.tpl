{include file="header.tpl" title=$lang['注册用户'] hostname=$c['网站名称']}
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
              <li><a href="{$ROOT}/index/index/"><i class="batch home"></i><br />{$lang['客户中心']}</a></li>
			  <li><a href="{$ROOT}/control/index/"><i class="batch b-database"></i><br>{$lang['控制面板']}</a></li>
              <li><a href="{$ROOT}/buy/index/"><i class="batch quill"></i><br />{$lang['订购产品']}</a></li>
              <li><a href="{$ROOT}/user/index/" class="active"><i class="batch users"></i><br />{$lang['用户中心']}</a></li>
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
		<div class="btn-group pull-right">
	        <a href="{$ROOT}/index/login/" class="btn">{$lang['登陆']}</a>
	    </div>
		<h4 class="header">{$lang['注册用户']}</h4>{include file="alert.tpl"}
      <div class="stats">
        <div class="row-fluid">
          <div class="span9">
		  <form class="form-horizontal" method="post">
          <div class="control-group">
            <div class="controls">
              <h4>{$lang['客户中心']} - {$lang['注册用户']}</h4>
            </div>
          </div>
          <div class="control-group">
            <label for="username" class="control-label">{$lang['用户名']}</label>
            <div class="controls">
              <input id="username" name="username" type="text" placeholder="{$lang['用户名']}" />
            </div>
          </div>
          <div class="control-group">
            <label for="password" class="control-label">{$lang['密码']} </label>
            <div class="controls">
              <input id="password" name="password" type="password" placeholder="{$lang['密码']}" />
            </div>
           </div>
          <div class="control-group">
            <label for="repassword" class="control-label">{$lang['重复密码']} </label>
            <div class="controls">
              <input id="repassword" name="repassword" type="password" placeholder="{$lang['重复密码']}" />
            </div>
          </div>
          <div class="control-group">
            <label for="email" class="control-label">{$lang['电子邮件']}</label>
            <div class="controls">
              <input name="email" type="text" id="email" placeholder="{$lang['电子邮件']}" />
            </div>
          </div>
          <div class="control-group">
            <label for="name" class="control-label">{$lang['姓名']}</label>
            <div class="controls">
              <input name="name" type="text" id="name" placeholder="{$lang['姓名']}" />
            </div>
          </div>
          <div class="control-group">
            <label for="country" class="control-label">{$lang['国家']}</label>
            <div class="controls">
              <select name="country" id="country">
{foreach from=$countrys item=country}
			  <option value="{$country}"{if $c['默认国家']==$country} selected="selected"{/if}>{$country}</option>
{/foreach}
			  </select>
            </div>
          </div>
          <div class="control-group">
            <label for="address" class="control-label">{$lang['地址']}</label>
            <div class="controls">
              <input name="address" type="text" id="address" placeholder="{$lang['地址']}" />
            </div>
          </div>
          <div class="control-group">
            <label for="zip" class="control-label">{$lang['邮编']}</label>
            <div class="controls">
              <input name="zip" type="text" id="zip" placeholder="{$lang['邮编']}" />
            </div>
          </div>
          <div class="control-group">
            <label for="phone" class="control-label">{$lang['联系电话']}</label>
            <div class="controls">
              <input name="phone" type="text" id="phone" placeholder="{$lang['联系电话']}" />
            </div>
          </div>
          <div class="control-group"> 
            <div class="controls"><button class="btn">{$lang['注册']}</button></div>
          </div>
        </form>
		  </div>
		</div>
		</div>
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