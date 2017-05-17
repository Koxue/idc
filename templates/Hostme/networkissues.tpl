{include file="client_header.tpl" title=$lang['网络故障'] hostname=$c['网站名称']}
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
<span class="hidden-xs">{$s['登陆姓名']}</span>&nbsp;
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
<p>{$s['登陆姓名']}</p>
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
<li class="active">
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
<!--BEGIN TITLE & BREADCRUMB PAGE-->
<div id="title-breadcrumb-option-demo" class="page-title-breadcrumb">
<div class="page-header pull-left">
<div class="page-title">{$lang['网络故障']}</div></div>
<ol class="breadcrumb page-breadcrumb pull-left">
<li>
<i class="fa fa-home"></i>&nbsp;
<a href="{if $c['伪静态开关']=='0'}/index.php{/if}/index/index/">{$c['网站名称']}</a>&nbsp;&nbsp;
<i class="fa fa-angle-right"></i>&nbsp;&nbsp;</li>
<li class="hidden">
<a href="#">{$lang['网络故障']}</a>&nbsp;&nbsp;
<i class="fa fa-angle-right"></i>&nbsp;&nbsp;</li>
<li class="active">{$lang['网络故障']}</li></ol>
<div class="clearfix"></div></div>
<!--END TITLE & BREADCRUMB PAGE-->
<div class="page-content">
<div class="row">
<div class="col-lg-12">
<div class="panel">
		  <div class="widget" align="center">
		  <a href="{if $c['伪静态开关']=='0'}/index.php{/if}/networkissues/index/1/"><span class="label label-warning">{$e['开放的数量']}</span>{$lang['开放']}</a> | <a href="{if $c['伪静态开关']=='0'}/index.php{/if}/networkissues/index/2/"><span class="label label-info">{$e['计划中的数量']}</span>{$lang['计划中']}</a> | <a href="{if $c['伪静态开关']=='0'}/index.php{/if}/networkissues/index/3/"><span class="label label-success">{$e['已解决的数量']}</span>{$lang['已解决']}</a>
          <hr>
		  </div>
        <table class="table table-hover">
			<tbody>
		        {foreach from=$net item=n}
				<tr>
				<th width="20%">{$n['标题']}（{$n['状态']}）</th>
		        <th width="40%">{$lang['影响的服务']} - {$n['受到影响的服务']} | {$lang['优先级']} -{$n['优先级']}</th>
		        <th width="20%">{$lang['日期']} - {$n['时间']}</th>
		        <th width="20%">{$lang['最近更新']} - {$n['最近更新']}</th>
				<tr><td colspan="4" ><blockquote>{$n['内容']}</blockquote></td><tr>
				{/foreach}
		    </tbody>
		</table>
		<hr>
		<div style="text-align:center;">
		<a class="btn btn-default{if $t['当前页数']=='1'} active{/if}" href="{$t['上一页连接']}">&larr; {$lang['上一页']}</a>
		{$lang['总共']}:{$t['总页数']}{$lang['页']} {$lang['当前']}:{$t['当前页数']}{$lang['页']}
        <a class="btn btn-default{if $t['当前页数']==$t['总页数']} active{/if}" href="{$t['下一页连接']}">{$lang['下一页']} &rarr;</a>
		</div>
	</div>
</div></div>
</div>
</div>
{include file="client_footer.tpl"}