<!DOCTYPE html>
<!--[if IE 7]>
<html class="ie ie7">
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8">
<![endif]-->
<!--[if !(IE 7) | !(IE 8) ]><!-->
<html>
<!--<![endif]-->
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>{$hostname} - {$title}</title>

<style type='text/css'>*{ font-family:'Arial','FontAwesome','Microsoft YaHei','黑体','宋体',sans-serif !important}</style>
<!--[if lt IE 9]>
<script src="{$templatedir}/js/customer/html5.js" type="text/javascript"></script>
<![endif]-->
<link rel='stylesheet' href='{$templatedir}/css/customer/style.css' type='text/css' media='all' />
<link rel='stylesheet' href='{$templatedir}/css/customer/shortcodes.css' type='text/css' media='all' />
<link rel='stylesheet' href='{$templatedir}/css/customer/animate.css' type='text/css' media='all' />
<link rel='stylesheet' href='{$templatedir}/css/customer/prettyPhoto.css' type='text/css' media='all' />
<link rel='stylesheet' href='{$templatedir}/css/customer/responsive.css' type='text/css' media='all' />
<link rel='stylesheet' href='{$templatedir}/css/customer/jplayer.blue.monday.css' type='text/css' media='all' />
<link rel='stylesheet' href='{$templatedir}/css/customer/flexslider.css' type='text/css' media='all' />
<link rel="stylesheet" type="text/css" href="//cdn.bootcss.com/bootstrap/3.3.5/css/bootstrap.css" />
<link href="//cdn.bootcss.com/bootstrap/3.3.5/css/bootstrap-theme.css" rel="stylesheet" type="text/css">
<!-- Light Skin -->
<link rel='stylesheet' href='{$templatedir}/css/customer/light.css' type='text/css' media='all' />
<!-- FontAwesome CSS -->
<link rel="stylesheet" type="text/css" media="all" href="//cdn.bootcss.com/font-awesome/4.3.0/css/font-awesome.min.css" />
<script language="javascript" src="//cdn.bootcss.com/jquery/2.1.4/jquery.min.js"></script>
<script type='text/javascript' src='{$templatedir}/js/customer/jquery-migrate.min.js'></script>
<script type='text/javascript' src='{$templatedir}/js/customer/jquery.easing.1.3.js'></script>
<script type='text/javascript' src='{$templatedir}/js/customer/hoverIntent.js'></script>
<script type='text/javascript' src='{$templatedir}/js/customer/superfish.js'></script>
<script type='text/javascript' src='{$templatedir}/js/customer/jquery.jplayer.min.js'></script>
<script type='text/javascript' src='{$templatedir}/js/customer/jquery.preloadify.min.js'></script>
<script type='text/javascript' src='{$templatedir}/js/customer/jquery.prettyPhoto.js'></script>
<script type='text/javascript' src='{$templatedir}/js/customer/jquery.fitvids.js'></script>
<script type='text/javascript' src='{$templatedir}/js/customer/jquery.flexslider.js'></script>
<script type='text/javascript' src='{$templatedir}/js/customer/waypoints.js'></script>
<script src="//cdn.bootcss.com/bootstrap/3.3.5/js/bootstrap.js"></script>
<!-- Google Fonts -->
<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet" type="text/css" />

</head>
<body>
<!-- LayoutWrap -->
<div id="stretched" class="fullwidth">
	<!-- bodyoverlay -->
	<div class="bodyoverlay"></div>
	<!-- Stickybar -->{if $tempsz['是否启用顶端提示']=='是'}
	<div id="trigger" class="tarrow"></div>
	<div id="sticky">{$tempsz['顶端提示内容']}</div>{/if}
	<!-- #wrapper -->
	<div id="wrapper">
		<div class="topbar">
		
			<div class="inner">
				<div class="one_half"><a href="mailto:{$tempsz['邮箱']}"><i class="fa fa-envelope"></i> {$tempsz['邮箱']}</a> | Call : {$tempsz['电话']} | <a href="http://wpa.qq.com/msgrd?v=3&uin={$tempsz['QQ']}&site=qq&menu=yes"target="_black">QQ : {$tempsz['QQ']}</a></div>
				<div class="one_half last">
					<div id="social-icons">{if $s['是否已经登陆']=='是'}
              <p>{$lang['欢迎回来']}: {$s['登陆用户名']} / <a href="{if $c['伪静态开关']=='0'}/index.php{/if}/control/index/">{$tlang['进入管理控制台']}</a> | <a href="{if $c['伪静态开关']=='0'}/index.php{/if}/user/index/">{$lang['用户中心']}</a> | <a href="{if $c['伪静态开关']=='0'}/index.php{/if}/index/login/">{$lang['退出帐户']}</a></p>
            {else}
              <p><a href="{if $c['伪静态开关']=='0'}/index.php{/if}/index/login/">{$lang['登陆']}</a> | <a href="{if $c['伪静态开关']=='0'}/index.php{/if}/index/register/">{$lang['注册']}</a></p>
			{/if}</div>
				</div>
			</div><!-- .inner -->
		</div><!-- .topbar -->		
		{include file="alert1.tpl"}		
		<div class="clear"></div>
		
		<div id="fixedheader" class="fixedheader">
			<div class="inner">
			<style>.sf-menu a{ font-size:16px;line-height:35px;}</style>
				<div class="logo">
					<a href="{if $c['伪静态开关']=='0'}/index.php{/if}/index/index/">{$c['头部LOGO']}</a>
				</div><!-- .logo -->