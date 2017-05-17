{include file="header.tpl"}
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
<div class="span3">
	<div class="profile-sidebar">
		<h4>{if $s['是否已经登陆']=='是'}{$lang['UID']}:{$s['登陆UID']}{else}您还未登入{/if}</h4>
		<p class="pull-right">3.5/5</p>
		<div class="rating-star"></div>
		<div class="rating-star"></div>
		<div class="rating-star"></div>
		<div class="half-star"></div>
		<div class="no-star"></div>
		<ul>
			<li><a href="{$ROOT}/user/index/"><i class="icon-user"> </i>{$lang['个人信息']}</a></li>
			<li><a href="{$ROOT}/user/pay/"><i class="icon-signal"> </i>{$lang['账户充值']}</a></li>
			<li><a href="{$ROOT}/user/password/"><i class="icon-cog"> </i>{$lang['修改密码']}</a></li>
			{$plug['用户页面列表']}
		</ul>
	</div>
</div>
<div class="span6">{include file="alert.tpl"}