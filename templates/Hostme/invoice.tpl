{include file="client_header.tpl" title=$mlang['控制面板'] hostname=$c['网站名称']}
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
<i class="fa fa-user"></i>{$tlang['我的资料']}</a></li>
<li class="divider"></li>
<li>
<a href="{if $c['伪静态开关']=='0'}/index.php{/if}/index/login/">
<i class="fa fa-key"></i>{$tlang['退出帐户']}</a></li></ul></li>
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
<li class="active">
<a href="index.html">
<i class="fa fa-tachometer fa-fw">
<div class="icon-bg bg-orange"></div></i>
<span class="menu-title">{$mlang['控制面板']}</span></a></li>
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
<!--BEGIN TITLE & BREADCRUMB PAGE-->
<div id="title-breadcrumb-option-demo" class="page-title-breadcrumb">
<div class="page-header pull-left">
<div class="page-title">{$mlang['控制面板']}</div></div>
<ol class="breadcrumb page-breadcrumb pull-left">
<li>
<i class="fa fa-home"></i>&nbsp;
<a href="{if $c['伪静态开关']=='0'}/index.php{/if}/index/index/">{$c['网站名称']}</a>&nbsp;&nbsp;
<i class="fa fa-angle-right"></i>&nbsp;&nbsp;</li>
<li class="hidden">
<a href="#">{$mlang['控制面板']}</a>&nbsp;&nbsp;
<i class="fa fa-angle-right"></i>&nbsp;&nbsp;</li>
<li class="active">{$mlang['控制面板']}</li></ol>
<div class="clearfix"></div></div>
<!--END TITLE & BREADCRUMB PAGE-->

<!--BEGIN CONTENT-->
<div class="page-content">
<div id="invoice-page" class="row">
<div class="col-md-7">
<div class="panel">
<div class="panel-body">
<div class="invoice-title">
<h2>{$tlang['账单']}</h2>
<p class="mbn text-left">{$tlang['账单编号']}{$server['id']}</p>
<p class="text-left">{$server['申请时间']}</p></div>
<div class="pull-left">
<h2 class="text-green logo">{$c['网站名称']}</h2>
<address class="mbn">{$tempsz['联系地址1']},{$tempsz['联系地址2']}
<br>{$tempsz['联系地址3']},{$tempsz['联系地址4']}
<br>
<abbr title="Phone">P:</abbr>{$tempsz['电话']}
<br>
<br>{$tempsz['邮箱']}</address></div>
<div class="clearfix"></div>
<hr>
<div class="row">
<div class="col-md-3">
<address>
<strong>{$tlang['账单地址']}</strong>
<br>{$s['登陆姓名']}
<br>{$s['登陆地址']} {$s['登陆国家']}
<br>{$s['登陆邮箱']}</address></div>
<div class="col-md-3">
<address>
<strong>{$tlang['产品信息']}</strong>
<br>{$server['域名']}
<br>{$goods['名称']}
<br>{$goods['周期']}</address></div>
<div class="col-md-3">
<address>
<strong>{$tlang['到期时间']}</strong>
<br>{$server['到期时间']}</address></div>
<div class="col-md-3">
<address>
<strong>{$tlang['到期金额']}</strong>
<br>
<h2 class="text-green mtn">
<strong>{$goods['价格']}{if $goods['价格']!='免费'} {$c['交易币名称']}{/if}</strong></h2></address></div></div>
<hr>
<h4 class="block-heading">{$tlang['账单小记']}</h4>
<div class="table-responsive">
<table class="table table-condensed">
<thead>
<tr>
<td>
<strong>{$lang['产品类型']}</strong></td>
<td class="text-center">
<strong>{$lang['产品价格']}</strong></td>
<td class="text-center">
<strong>{$tlang['产品数量']}</strong></td>
<td class="text-right">
<strong>{$tlang['总计']}</strong></td></tr></thead>
<tbody>
<tr>
<td>{$goods['名称']}</td>
<td class="text-center">{$goods['价格']} {$c['交易币名称']}</td>
<td class="text-center">{$server['购买数量']}</td>
<td class="text-right">{$goods['价格']*$server['购买数量']} {$c['交易币名称']}</td></tr>
<tr>
<td class="no-line"></td>
<td class="no-line"></td>
<td class="no-line text-center">
<strong>{$tlang['总计']}</strong></td>
<td class="no-line text-right">{$goods['价格']*$server['购买数量']} {$c['交易币名称']}</td></tr></tbody></table></div>
<hr class="mbm">
<p>{$tlang['感谢']}</p></div></div></div>
<div class="col-lg-5">
<form name="pay" method="post" action="{if $c['伪静态开关']=='0'}/index.php{/if}/control/pay/{$server['id']}/">
<input type="hidden" name="days" id="days" value="{$server['购买数量']}"> 
<div onclick="javascript:pay.submit();" class="btn btn-success mrm"><i class="fa fa-paypal"></i>&nbsp;{$lang['支付']}</div></form>
<button type="button" class="btn btn-white"><a href="{if $c['伪静态开关']=='0'}/index.php{/if}/control/index/"><i class="fa fa-backward"></i>&nbsp;
{$tlang['返回']}</a></button>
</div></div></div>

<!--END CONTENT-->
{include file="client_footer.tpl"}