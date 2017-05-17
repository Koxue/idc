{include file="client_header.tpl" title=$lang['用户中心'] hostname=$c['网站名称']}
<body class=" undefined pace-done">
<div class="pace  pace-inactive">
<div class="pace-progress" data-progress-text="100%" data-progress="99" style="width: 100%;">  
<div class="pace-progress-inner"></div>
</div>
<div class="pace-activity"></div></div>
<div>
<!--BEGIN BACK TO TOP-->
<a id="totop" href="#">
<i class="fa fa-angle-up"></i></a>
<!--END BACK TO TOP-->
<!--BEGIN TOPBAR-->
<div id="header-topbar-option-demo" class="page-header-topbar">
<nav id="topbar" role="navigation" style="margin-bottom: 0; z-index: 2;" class="navbar navbar-default navbar-static-top">
<div class="navbar-header">
<button type="button" data-toggle="collapse" data-target=".sidebar-collapse" class="navbar-toggle">
<span class="sr-only">Toggle navigation</span>
<span class="icon-bar"></span>
<span class="icon-bar"></span>
<span class="icon-bar"></span></button>
<a id="logo" href="{if $c['伪静态开关']=='0'}/index.php{/if}/index/index/" class="navbar-brand">
<span class="fa fa-rocket"></span>
<span class="logo-text">{$c['网站名称']}</span>
<span style="display: none" class="logo-text-icon">S</span></a></div>
<div class="topbar-main">
<a id="menu-toggle" href="#" class="hidden-xs">
<i class="fa fa-bars"></i></a>
<ul class="nav navbar navbar-top-links navbar-right mbn">
<li class="dropdown topbar-user">
<a data-hover="dropdown" href="#" class="dropdown-toggle">
<img src="{$grav_sm}" alt="" class="img-responsive img-circle">&nbsp;
{if $s['是否已经登陆']=='是'}
<span class="hidden-xs"></span>{$s['登陆姓名']}</span>&nbsp;
{else}
<span class="hidden-xs"><a href="{if $c['伪静态开关']=='0'}/index.php{/if}/index/login/">{$lang['登陆']}</a></span>&nbsp;
{/if}
<span class="caret"></span></a>
<ul class="dropdown-menu dropdown-user pull-right">
<li>
<a href="{if $c['伪静态开关']=='0'}/index.php{/if}/user/index/">
<i class="fa fa-user"></i>{$lang['我的资料']}</a></li>
<li class="divider"></li>
<li>
<a href="{if $c['伪静态开关']=='0'}/index.php{/if}/index/login/">
<i class="fa fa-key"></i>{$lang['退出帐户']}</a></li></ul></li>
</div>
<!--END TOPBAR-->

<div id="wrapper">
<!--BEGIN SIDEBAR MENU-->
<nav id="sidebar" role="navigation" class="navbar-default navbar-static-side" style="min-height: 100%;">
<div class="sidebar-collapse menu-scroll" style="height: auto;">
<ul id="side-menu" class="nav">
<li class="user-panel">
<div class="thumb">
<img src="{$grav_md}" alt="" class="img-circle"></div>
<div class="info">
{if $s['是否已经登陆']=='是'}
<p>{$s['登陆姓名']}</p>
{else}
<p><a href="{if $c['伪静态开关']=='0'}/index.php{/if}/index/login/">{$lang['登陆']}</a></p>
{/if}
<ul class="list-inline list-unstyled">
<li>
<a href="{if $c['伪静态开关']=='0'}/index.php{/if}/user/index/" data-hover="tooltip" title="" data-original-title="Profile">
<i class="fa fa-user"></i></a></li>
<li>
<a href="{if $c['伪静态开关']=='0'}/index.php{/if}/ticket/index/" data-hover="tooltip" title="" data-original-title="Mail">
<i class="fa fa-envelope"></i></a></li>
<li>
<a href="{if $c['伪静态开关']=='0'}/index.php{/if}/index/login/" data-hover="tooltip" title="" data-original-title="Logout">
<i class="fa fa-sign-out"></i></a></li></ul></div>
<div class="clearfix"></div></li>
<li>
<a href="{if $c['伪静态开关']=='0'}/index.php{/if}/control/index/">
<i class="fa fa-tachometer fa-fw">
<div class="icon-bg bg-orange"></div></i>
<span class="menu-title">{$lang['控制面板']}</span></a></li>
<li>
<a href="{if $c['伪静态开关']=='0'}/index.php{/if}/ticket/index/">
<i class="fa fa-envelope fa-fw">
<div class="icon-bg bg-orange"></div></i>
<span class="menu-title">{$mlang['工单系统']}</span></a></li>
<li>
<a href="{if $c['伪静态开关']=='0'}/index.php{/if}/networkissues/serverstatus">
<i class="fa fa-signal fa-fw">
<div class="icon-bg bg-orange"></div></i>
<span class="menu-title">{$mlang['服务器状态']}</span></a></li>
<li>
<a href="{if $c['伪静态开关']=='0'}/index.php{/if}/networkissues/index/">
<i class="fa fa-exclamation-triangle fa-fw">
<div class="icon-bg bg-orange"></div></i>
<span class="menu-title">{$mlang['网络故障']}</span></a></li>
<li>
<a href="{if $c['伪静态开关']=='0'}/index.php{/if}/help/index/">
<i class="fa fa-align-center fa-fw">
<div class="icon-bg bg-orange"></div></i>
<span class="menu-title">{$mlang['帮助中心']}</span></a></li>
<!--li.charts-sum
<div id="ajax-loaded-data-sidebar"></div>--></ul></div></nav>
<!--END SIDEBAR MENU-->
<!--BEGIN PAGE WRAPPER-->
<div id="page-wrapper">
<div class="page-content">
{include file="alert2.tpl"}
<hr>
<h4 class="box-heading">{$lang['个人信息']}</h4>	
<hr>
<div class="row">
<div class="col-md-4">
		<div class="form-group">
		<div class="text-center mbl">
		<img src="{$grav_lg}" style="border: 5px solid #fff; box-shadow: 0 2px 3px rgba(0,0,0,0.25);" class="img-circle">
	             </div>
				 <h4 style="text-align:center;">UID:1</h4>
				 <style>#divli li{ display: inline-block;padding: 6px 12px;margin-bottom: 0;font-size: 14px;font-weight: normal;line-height: 1.42857143;text-align: center;white-space: nowrap;vertical-align: middle;-ms-touch-action: manipulation;touch-action: manipulation;cursor: pointer;-webkit-user-select: none;-moz-user-select: none;-ms-user-select: none;user-select: none;background-image: none;border: 1px solid transparent;border-radius: 4px;}</style>
		<div class="form-group" id=divli>		 
		    <li class="btn"><a href="{if $c['伪静态开关']=='0'}/index.php{/if}/user/info/"><i class="fa fa-pencil-square-o"></i> {$tlang['修改资料']}</a></li>
			<li class="btn"><a href="{if $c['伪静态开关']=='0'}/index.php{/if}/user/pay/"><i class="fa fa-sellsy"></i> {$lang['账户充值']}</a></li>
			<li class="btn"><a href="{if $c['伪静态开关']=='0'}/index.php{/if}/user/password/"><i class="fa fa-cog"></i> {$lang['修改密码']}</a></li>
            {$plug['用户页面列表']}
</div></div>
</div>
<div class="col-md-8">