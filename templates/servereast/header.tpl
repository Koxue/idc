<html>
<head>
    
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta name="viewport" content="user-scalable=no, width=device-width">
<meta name="viewport" content="width=device-width, initial-scale=1" />
<meta name="renderer" content="webkit">
<meta http-equiv="X-UA-Compatible" content="ie=Edge,chrome=1">
    <title>{$hostname} - {$title}</title>
    <!-- <link href='http://fonts.googleapis.com/css?family=Hind:400,300,600,500,700&amp;subset=latin,latin-ext' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'> -->

    <!-- Bootstrap & Styles -->
    <link href="{$templatedir}/css/bootstrap.css" rel="stylesheet">
    <link href="{$templatedir}/css/bootstrap-theme.css" rel="stylesheet">
    <link href="{$templatedir}/css/bootstrap-responsive.css" rel="stylesheet">
    <link href="{$templatedir}/css/block_grid_bootstrap.css" rel="stylesheet">
    <link href="{$templatedir}/css/font-awesome.min.css" rel="stylesheet">
    <link href="{$templatedir}/css/owl.carousel.css" rel="stylesheet">
    <link href="{$templatedir}/css/owl.theme.css" rel="stylesheet">
    <link href="{$templatedir}/css/animate.min.css" rel="stylesheet" />
    <link href="{$templatedir}/css/jquery.circliful.css" rel="stylesheet" />
    <link href="{$templatedir}/css/slicknav.css" rel="stylesheet" />
    <link href="{$templatedir}/style.css" rel="stylesheet">
	<script src="{$templatedir}/js/jquery.min.js"></script>
    <script src="{$templatedir}/js/bootstrap.min.js"></script>
<link href="{$templatedir}/css/style.min.css" rel="stylesheet">	  
<script src="{$templatedir}/js/jquery.bpopup.min.js"></script>
<script src="{$templatedir}/js/jquery.tipMessage.js"></script>
{$plug['HEAD区域']}
</head>

<body style="margin: 0; padding: 0; font-family: 'Arial','Microsoft YaHei','黑体','宋体',sans-serif;">

    <!-- Top Bar-->
    <div class="top">
	
	{if $tempsz['是否开启顶栏']=='yes'}
<style type="text/css">
.topbar { position: relative;padding: 0;font-size: 11px;line-height: 32px;background: #2C2C2C;border-bottom: 1px solid #3C3C3C;color: #444;overflow: hidden;background-color: #f5f5f5;border-color: #dddddd;}
.topbar a{ color:#5A5A5A;}
.topbar a:hover{ color: #DE6262;}
.sf-menu li a { border-right: none;padding: 35px 25px; }
.sf-menu li:first-child a { border-left: none;}
.logo { padding-top: 5px;}
</style>
	<div class="topbar">
		<div class="row">
				<div style="float: left;text-align: left;padding-left: 15px;">
				<a href="mailto:{$tempsz['邮箱']}"><i class="fa fa-envelope"></i>{$tempsz['邮箱']}</a> | 
				<a href="tel:{$tempsz['联系电话']}"><i class="fa fa-phone"></i> {$tempsz['联系电话']}</a> 
				| <a href="http://wpa.qq.com/msgrd?v=3&amp;uin={$tempsz['QQ']}&amp;site=qq&amp;menu=yes" target="_black"><i class="fa fa-comment"></i> {$tempsz['QQ']}</a></div>
				<div style="float: right;text-align: right;padding-right: 15px;">
					<div id="social-icons"> 
					{if $s['是否已经登陆']=='是'}
						<a href="{$ROOT}/user/index/">{$s['登陆用户名']}</a> &nbsp;&nbsp;&nbsp;
						<a href="{$ROOT}/user/pay/">{$mlang['预存款充值']}</a> |
						<a href="{$ROOT}/control/index/">{$mlang['我的订单']}</a> |
						<a href="{$ROOT}/ticket/index/">{$mlang['工单系统']}</a> |
						<a href="{$ROOT}/help/index/">{$mlang['帮助中心']}</a> |
						{foreach from=$usernavlist item=usernavlists}
							<a href="{$usernavlists['link']}">{$usernavlists['name']}</a> |
						{/foreach}
						<a href="{$ROOT}/index/login/">{$mlang['退出帐户']}</a>
					{else}
						<a href="{$ROOT}/index/login/">{$mlang['用户登录']}</a> | 
						<a href="{$ROOT}/index/register/">{$mlang['用户注册']}</a>
					{/if}
				
					
					
					</div>
				</div>
		</div>
	</div>{/if}
	
	
        <div class="row">
            <div class="col-sm-3">
                <div class="logo">
                    <a href="{$ROOT}/index/index/">{$c['头部LOGO']}
                    </a>
                </div>
            </div>
            <div class="col-sm-9">

                <nav id="desktop-menu">
                    <ul class="sf-menu" id="navigation">
                        <li{if $navxz=="1"} class="current"{/if}><a href="{$ROOT}/index/index/" class="active">{$mlang['首页']}</a>
                        </li>
                        <li{if $navxz=="2"} class="current"{/if}><a href="{$ROOT}/buy/index/">{$mlang['订购产品']}</a>
                            <ul>
                                {foreach from=$farray item=fs}
								<li><a href="{$ROOT}/buy/index/{$fs['id']}/">{$fs['分类名称']}</a></li>
								{/foreach}
                            </ul>
                        </li>
						{$tempsz['订购产品后导航html']}
                        <li{if $navxz=="3"} class="current"{/if}><a href="{$ROOT}/index/announcements/">{$mlang['网站公告']}</a>
                        </li>
                        <li{if $navxz=="4"} class="current"{/if}><a href="{$ROOT}/help/index/">{$mlang['帮助中心']}</a>
                        </li>
						{$tempsz['帮助中心后导航html']}
                        <li{if $navxz=="5"} class="current"{/if}><a href="{$ROOT}/user/index/">{$mlang['用户中心']}</a>
                            <ul>
                                {if $s['是否已经登陆']=='是'}
                                <li><a href="{$ROOT}/user/index/"><span>{$mlang['我的资料']}</span></a></li>
                                <li><a href="{$ROOT}/user/pay/"><span>{$mlang['预存款充值']}</span></a></li>
                                <li><a href="{$ROOT}/control/index/">{$mlang['我的订单']}</a></li>
                                <li><a href="{$ROOT}/ticket/index/">{$mlang['工单系统']}</a></li>
								{foreach from=$usernavlist item=usernavlists}
								<li><a href="{$usernavlists['link']}">{$usernavlists['name']}</a></li>
								{/foreach}
                                <li><a href="{$ROOT}/index/login/">{$mlang['退出帐户']}</a></li>
                                {else}
                                <li><a href="{$ROOT}/index/login/">{$mlang['用户登录']}</a></li>
                                <li><a href="{$ROOT}/index/register/">{$mlang['用户注册']}</a></li>
                                {/if}
                            </ul>
                        </li>
                        <!-- <li><a href=""></a>
                        </li> -->
                    </ul>
                </nav>
            </div>
        </div>
    </div>
    <!-- End of Top Bar-->