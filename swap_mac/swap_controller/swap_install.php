<?php 
function safecode($length = 8) {
	$chars = array_merge(range(0, 9), range('a', 'z'), range('A', 'Z'));
	shuffle($chars);
	$result = '';
	for ($i = 0;$i < $length;$i++) {
		$result.= $chars[$i];
	}
	return $result;
}
function new_is_writeable($OSWAP_e9cc830b336d45bb9424f7469bb7a8e1) {
	if (is_dir($OSWAP_e9cc830b336d45bb9424f7469bb7a8e1)) {
		$OSWAP_8545a1556fe80a309e285e1e529e3251 = $OSWAP_e9cc830b336d45bb9424f7469bb7a8e1;
		if ($fp = @fopen("$OSWAP_8545a1556fe80a309e285e1e529e3251/test.txt", 'w')) {
			@fclose($fp);
			@unlink("$OSWAP_8545a1556fe80a309e285e1e529e3251/test.txt");
			$OSWAP_58dffff89493562f3f88af4a1a89f75e = true;
		} else {
			$OSWAP_58dffff89493562f3f88af4a1a89f75e = false;
		}
	} else {
		if ($fp = @fopen($OSWAP_e9cc830b336d45bb9424f7469bb7a8e1, 'a+')) {
			@fclose($fp);
			$OSWAP_58dffff89493562f3f88af4a1a89f75e = true;
		} else {
			$OSWAP_58dffff89493562f3f88af4a1a89f75e = false;
		}
	}
	return $OSWAP_58dffff89493562f3f88af4a1a89f75e;
}
function install_header() { ?><!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" lang="zh-CN" >
	<head>
		<meta name="viewport" content="width=device-width" />
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>SWAPIDC修改版 &rsaquo; 安装</title>
		<style>
			.wp-core-ui .button,.wp-core-ui .button-primary,.wp-core-ui .button-secondary{display:inline-block;text-decoration:none;font-size:13px;line-height:26px;height:28px;margin:0;padding:0 10px 1px;cursor:pointer;border-width:1px;border-style:solid;-webkit-appearance:none;-webkit-border-radius:3px;border-radius:3px;white-space:nowrap;-webkit-box-sizing:border-box;-moz-box-sizing:border-box;box-sizing:border-box}.wp-core-ui button::-moz-focus-inner,.wp-core-ui input[type=reset]::-moz-focus-inner,.wp-core-ui input[type=button]::-moz-focus-inner,.wp-core-ui input[type=submit]::-moz-focus-inner{border-width:0;border-style:none;padding:0}.wp-core-ui .button-group.button-large .button,.wp-core-ui .button.button-large{height:30px;line-height:28px;padding:0 12px 2px}.wp-core-ui .button-group.button-small .button,.wp-core-ui .button.button-small{height:24px;line-height:22px;padding:0 8px 1px;font-size:11px}.wp-core-ui .button-group.button-hero .button,.wp-core-ui .button.button-hero{font-size:14px;height:46px;line-height:44px;padding:0 36px}.wp-core-ui .button:active,.wp-core-ui .button:focus{outline:0}.ie8 .wp-core-ui .button-link:focus{outline:#5b9dd9 solid 1px}.wp-core-ui .button.hidden{display:none}.wp-core-ui input[type=reset],.wp-core-ui input[type=reset]:active,.wp-core-ui input[type=reset]:focus,.wp-core-ui input[type=reset]:hover{background:0;border:0;-webkit-box-shadow:none;box-shadow:none;padding:0 2px 1px;width:auto}.wp-core-ui .button,.wp-core-ui .button-secondary{color:#555;border-color:#ccc;background:#f7f7f7;-webkit-box-shadow:inset 0 1px 0 #fff,0 1px 0 rgba(0,0,0,.08);box-shadow:inset 0 1px 0 #fff,0 1px 0 rgba(0,0,0,.08);vertical-align:top}.wp-core-ui p .button{vertical-align:baseline}.wp-core-ui .button-link{border:0;background:0;outline:0;cursor:pointer}.wp-core-ui .button-secondary:focus,.wp-core-ui .button-secondary:hover,.wp-core-ui .button.focus,.wp-core-ui .button.hover,.wp-core-ui .button:focus,.wp-core-ui .button:hover{background:#fafafa;border-color:#999;color:#23282d}.wp-core-ui .button-link:focus,.wp-core-ui .button-secondary:focus,.wp-core-ui .button.focus,.wp-core-ui .button:focus{-webkit-box-shadow:0 0 0 1px #5b9dd9,0 0 2px 1px rgba(30,140,190,.8);box-shadow:0 0 0 1px #5b9dd9,0 0 2px 1px rgba(30,140,190,.8)}.wp-core-ui .button-secondary:active,.wp-core-ui .button.active,.wp-core-ui .button.active:hover,.wp-core-ui .button:active{background:#eee;border-color:#999;color:#32373c;-webkit-box-shadow:inset 0 2px 5px -3px rgba(0,0,0,.5);box-shadow:inset 0 2px 5px -3px rgba(0,0,0,.5)}.wp-core-ui .button.active:focus{-webkit-box-shadow:inset 0 2px 5px -3px rgba(0,0,0,.5),0 0 0 1px #5b9dd9,0 0 2px 1px rgba(30,140,190,.8);box-shadow:inset 0 2px 5px -3px rgba(0,0,0,.5),0 0 0 1px #5b9dd9,0 0 2px 1px rgba(30,140,190,.8)}.wp-core-ui .button-disabled,.wp-core-ui .button-secondary.disabled,.wp-core-ui .button-secondary:disabled,.wp-core-ui .button-secondary[disabled],.wp-core-ui .button.disabled,.wp-core-ui .button:disabled,.wp-core-ui .button[disabled]{color:#a0a5aa!important;border-color:#ddd!important;background:#f7f7f7!important;-webkit-box-shadow:none!important;box-shadow:none!important;text-shadow:0 1px 0 #fff!important;cursor:default}.wp-core-ui .button-primary{background:#00a0d2;border-color:#0073aa;-webkit-box-shadow:inset 0 1px 0 rgba(120,200,230,.5),0 1px 0 rgba(0,0,0,.15);box-shadow:inset 0 1px 0 rgba(120,200,230,.5),0 1px 0 rgba(0,0,0,.15);color:#fff;text-decoration:none}.wp-core-ui .button-primary.focus,.wp-core-ui .button-primary.hover,.wp-core-ui .button-primary:focus,.wp-core-ui .button-primary:hover{background:#0091cd;border-color:#0073aa;-webkit-box-shadow:inset 0 1px 0 rgba(120,200,230,.6);box-shadow:inset 0 1px 0 rgba(120,200,230,.6);color:#fff}.wp-core-ui .button-primary.focus,.wp-core-ui .button-primary:focus{border-color:#0e3950;-webkit-box-shadow:inset 0 1px 0 rgba(120,200,230,.6),0 0 0 1px #5b9dd9,0 0 2px 1px rgba(30,140,190,.8);box-shadow:inset 0 1px 0 rgba(120,200,230,.6),0 0 0 1px #5b9dd9,0 0 2px 1px rgba(30,140,190,.8)}.wp-core-ui .button-primary.active,.wp-core-ui .button-primary.active:focus,.wp-core-ui .button-primary.active:hover,.wp-core-ui .button-primary:active{background:#0073aa;border-color:#005082;color:rgba(255,255,255,.95);-webkit-box-shadow:inset 0 1px 0 rgba(0,0,0,.1);box-shadow:inset 0 1px 0 rgba(0,0,0,.1);vertical-align:top}.wp-core-ui .button-primary-disabled,.wp-core-ui .button-primary.disabled,.wp-core-ui .button-primary:disabled,.wp-core-ui .button-primary[disabled]{color:#94cde7!important;background:#298cba!important;border-color:#1b607f!important;-webkit-box-shadow:none!important;box-shadow:none!important;text-shadow:0 -1px 0 rgba(0,0,0,.1)!important;cursor:default}.wp-core-ui .button-group{position:relative;display:inline-block;white-space:nowrap;font-size:0;vertical-align:middle}.wp-core-ui .button-group>.button{display:inline-block;-webkit-border-radius:0;border-radius:0;margin-right:-1px;z-index:10}.wp-core-ui .button-group>.button-primary{z-index:100}.wp-core-ui .button-group>.button:hover{z-index:20}
			.wp-core-ui .button-group>.button:first-child{-webkit-border-radius:3px 0 0 3px;border-radius:3px 0 0 3px}.wp-core-ui .button-group>.button:last-child{-webkit-border-radius:0 3px 3px 0;border-radius:0 3px 3px 0}.wp-core-ui .button-group>.button:focus{position:relative;z-index:1}@media screen and (max-width:782px){.wp-core-ui .button,.wp-core-ui .button.button-large,.wp-core-ui .button.button-small,a.preview,input#publish,input#save-post{padding:6px 14px;line-height:normal;font-size:14px;vertical-align:middle;height:auto;margin-bottom:4px}#media-upload.wp-core-ui .button{padding:0 10px 1px;height:24px;line-height:22px;font-size:13px}.media-frame.mode-grid .bulk-select .button{margin-bottom:0}.wp-core-ui .save-post-status.button{position:relative;margin:0 14px 0 10px}.wp-core-ui.wp-customizer .button{padding:0 10px 1px;font-size:13px;line-height:26px;height:28px;margin:0;vertical-align:inherit}.interim-login .button.button-large{height:30px;line-height:28px;padding:0 12px 2px}}@font-face{font-family:'Open Sans';font-style:normal;font-weight:300;src:local('Open Sans Light'),local('OpenSans-Light'),url(https://fonts.gstatic.com/s/opensans/v13/DXI1ORHCpsQm3Vp6mXoaTa-j2U0lmluP9RWlSytm3ho.woff2) format('woff2');unicode-range:U+0460-052F,U+20B4,U+2DE0-2DFF,U+A640-A69F}@font-face{font-family:'Open Sans';font-style:normal;font-weight:300;src:local('Open Sans Light'),local('OpenSans-Light'),url(https://fonts.gstatic.com/s/opensans/v13/DXI1ORHCpsQm3Vp6mXoaTZX5f-9o1vgP2EXwfjgl7AY.woff2) format('woff2');unicode-range:U+0400-045F,U+0490-0491,U+04B0-04B1,U+2116}@font-face{font-family:'Open Sans';font-style:normal;font-weight:300;src:local('Open Sans Light'),local('OpenSans-Light'),url(https://fonts.gstatic.com/s/opensans/v13/DXI1ORHCpsQm3Vp6mXoaTRWV49_lSm1NYrwo-zkhivY.woff2) format('woff2');unicode-range:U+1F00-1FFF}@font-face{font-family:'Open Sans';font-style:normal;font-weight:300;src:local('Open Sans Light'),local('OpenSans-Light'),url(https://fonts.gstatic.com/s/opensans/v13/DXI1ORHCpsQm3Vp6mXoaTaaRobkAwv3vxw3jMhVENGA.woff2) format('woff2');unicode-range:U+0370-03FF}@font-face{font-family:'Open Sans';font-style:normal;font-weight:300;src:local('Open Sans Light'),local('OpenSans-Light'),url(https://fonts.gstatic.com/s/opensans/v13/DXI1ORHCpsQm3Vp6mXoaTf8zf_FOSsgRmwsS7Aa9k2w.woff2) format('woff2');unicode-range:U+0102-0103,U+1EA0-1EF1,U+20AB}@font-face{font-family:'Open Sans';font-style:normal;font-weight:300;src:local('Open Sans Light'),local('OpenSans-Light'),url(https://fonts.gstatic.com/s/opensans/v13/DXI1ORHCpsQm3Vp6mXoaTT0LW-43aMEzIO6XUTLjad8.woff2) format('woff2');unicode-range:U+0100-024F,U+1E00-1EFF,U+20A0-20AB,U+20AD-20CF,U+2C60-2C7F,U+A720-A7FF}@font-face{font-family:'Open Sans';font-style:normal;font-weight:300;src:local('Open Sans Light'),local('OpenSans-Light'),url(https://fonts.gstatic.com/s/opensans/v13/DXI1ORHCpsQm3Vp6mXoaTegdm0LZdjqr5-oayXSOefg.woff2) format('woff2');unicode-range:U+0000-00FF,U+0131,U+0152-0153,U+02C6,U+02DA,U+02DC,U+2000-206F,U+2074,U+20AC,U+2212,U+2215,U+E0FF,U+EFFD,U+F000}@font-face{font-family:'Open Sans';font-style:normal;font-weight:400;src:local('Open Sans'),local('OpenSans'),url(https://fonts.gstatic.com/s/opensans/v13/K88pR3goAWT7BTt32Z01mxJtnKITppOI_IvcXXDNrsc.woff2) format('woff2');unicode-range:U+0460-052F,U+20B4,U+2DE0-2DFF,U+A640-A69F}@font-face{font-family:'Open Sans';font-style:normal;font-weight:400;src:local('Open Sans'),local('OpenSans'),url(https://fonts.gstatic.com/s/opensans/v13/RjgO7rYTmqiVp7vzi-Q5URJtnKITppOI_IvcXXDNrsc.woff2) format('woff2');unicode-range:U+0400-045F,U+0490-0491,U+04B0-04B1,U+2116}@font-face{font-family:'Open Sans';font-style:normal;font-weight:400;src:local('Open Sans'),local('OpenSans'),url(https://fonts.gstatic.com/s/opensans/v13/LWCjsQkB6EMdfHrEVqA1KRJtnKITppOI_IvcXXDNrsc.woff2) format('woff2');unicode-range:U+1F00-1FFF}@font-face{font-family:'Open Sans';font-style:normal;font-weight:400;src:local('Open Sans'),local('OpenSans'),url(https://fonts.gstatic.com/s/opensans/v13/xozscpT2726on7jbcb_pAhJtnKITppOI_IvcXXDNrsc.woff2) format('woff2');unicode-range:U+0370-03FF}
			@font-face{font-family:'Open Sans';font-style:normal;font-weight:400;src:local('Open Sans'),local('OpenSans'),url(https://fonts.gstatic.com/s/opensans/v13/59ZRklaO5bWGqF5A9baEERJtnKITppOI_IvcXXDNrsc.woff2) format('woff2');unicode-range:U+0102-0103,U+1EA0-1EF1,U+20AB}@font-face{font-family:'Open Sans';font-style:normal;font-weight:400;src:local('Open Sans'),local('OpenSans'),url(https://fonts.gstatic.com/s/opensans/v13/u-WUoqrET9fUeobQW7jkRRJtnKITppOI_IvcXXDNrsc.woff2) format('woff2');unicode-range:U+0100-024F,U+1E00-1EFF,U+20A0-20AB,U+20AD-20CF,U+2C60-2C7F,U+A720-A7FF}@font-face{font-family:'Open Sans';font-style:normal;font-weight:400;src:local('Open Sans'),local('OpenSans'),url(https://fonts.gstatic.com/s/opensans/v13/cJZKeOuBrn4kERxqtaUH3VtXRa8TVwTICgirnJhmVJw.woff2) format('woff2');unicode-range:U+0000-00FF,U+0131,U+0152-0153,U+02C6,U+02DA,U+02DC,U+2000-206F,U+2074,U+20AC,U+2212,U+2215,U+E0FF,U+EFFD,U+F000}@font-face{font-family:'Open Sans';font-style:normal;font-weight:600;src:local('Open Sans Semibold'),local('OpenSans-Semibold'),url(https://fonts.gstatic.com/s/opensans/v13/MTP_ySUJH_bn48VBG8sNSq-j2U0lmluP9RWlSytm3ho.woff2) format('woff2');unicode-range:U+0460-052F,U+20B4,U+2DE0-2DFF,U+A640-A69F}@font-face{font-family:'Open Sans';font-style:normal;font-weight:600;src:local('Open Sans Semibold'),local('OpenSans-Semibold'),url(https://fonts.gstatic.com/s/opensans/v13/MTP_ySUJH_bn48VBG8sNSpX5f-9o1vgP2EXwfjgl7AY.woff2) format('woff2');unicode-range:U+0400-045F,U+0490-0491,U+04B0-04B1,U+2116}@font-face{font-family:'Open Sans';font-style:normal;font-weight:600;src:local('Open Sans Semibold'),local('OpenSans-Semibold'),url(https://fonts.gstatic.com/s/opensans/v13/MTP_ySUJH_bn48VBG8sNShWV49_lSm1NYrwo-zkhivY.woff2) format('woff2');unicode-range:U+1F00-1FFF}@font-face{font-family:'Open Sans';font-style:normal;font-weight:600;src:local('Open Sans Semibold'),local('OpenSans-Semibold'),url(https://fonts.gstatic.com/s/opensans/v13/MTP_ySUJH_bn48VBG8sNSqaRobkAwv3vxw3jMhVENGA.woff2) format('woff2');unicode-range:U+0370-03FF}@font-face{font-family:'Open Sans';font-style:normal;font-weight:600;src:local('Open Sans Semibold'),local('OpenSans-Semibold'),url(https://fonts.gstatic.com/s/opensans/v13/MTP_ySUJH_bn48VBG8sNSv8zf_FOSsgRmwsS7Aa9k2w.woff2) format('woff2');unicode-range:U+0102-0103,U+1EA0-1EF1,U+20AB}@font-face{font-family:'Open Sans';font-style:normal;font-weight:600;src:local('Open Sans Semibold'),local('OpenSans-Semibold'),url(https://fonts.gstatic.com/s/opensans/v13/MTP_ySUJH_bn48VBG8sNSj0LW-43aMEzIO6XUTLjad8.woff2) format('woff2');unicode-range:U+0100-024F,U+1E00-1EFF,U+20A0-20AB,U+20AD-20CF,U+2C60-2C7F,U+A720-A7FF}@font-face{font-family:'Open Sans';font-style:normal;font-weight:600;src:local('Open Sans Semibold'),local('OpenSans-Semibold'),url(https://fonts.gstatic.com/s/opensans/v13/MTP_ySUJH_bn48VBG8sNSugdm0LZdjqr5-oayXSOefg.woff2) format('woff2');unicode-range:U+0000-00FF,U+0131,U+0152-0153,U+02C6,U+02DA,U+02DC,U+2000-206F,U+2074,U+20AC,U+2212,U+2215,U+E0FF,U+EFFD,U+F000}@font-face{font-family:'Open Sans';font-style:italic;font-weight:300;src:local('Open Sans Light Italic'),local('OpenSansLight-Italic'),url(https://fonts.gstatic.com/s/opensans/v13/PRmiXeptR36kaC0GEAetxhgVThLs8Y7ETJzDCYFCSLE.woff2) format('woff2');unicode-range:U+0460-052F,U+20B4,U+2DE0-2DFF,U+A640-A69F}@font-face{font-family:'Open Sans';font-style:italic;font-weight:300;src:local('Open Sans Light Italic'),local('OpenSansLight-Italic'),url(https://fonts.gstatic.com/s/opensans/v13/PRmiXeptR36kaC0GEAetxpiMaisvaUVUsYyVzOmndek.woff2) format('woff2');unicode-range:U+0400-045F,U+0490-0491,U+04B0-04B1,U+2116}@font-face{font-family:'Open Sans';font-style:italic;font-weight:300;src:local('Open Sans Light Italic'),local('OpenSansLight-Italic'),url(https://fonts.gstatic.com/s/opensans/v13/PRmiXeptR36kaC0GEAetxrBAWGjcah5Ky0jbCgIwDB8.woff2) format('woff2');unicode-range:U+1F00-1FFF}
			@font-face{font-family:'Open Sans';font-style:italic;font-weight:300;src:local('Open Sans Light Italic'),local('OpenSansLight-Italic'),url(https://fonts.gstatic.com/s/opensans/v13/PRmiXeptR36kaC0GEAetxv14vlcfyPYlAcQy2UfDRm4.woff2) format('woff2');unicode-range:U+0370-03FF}@font-face{font-family:'Open Sans';font-style:italic;font-weight:300;src:local('Open Sans Light Italic'),local('OpenSansLight-Italic'),url(https://fonts.gstatic.com/s/opensans/v13/PRmiXeptR36kaC0GEAetxqfJul7RR1X4poJgi27uS4w.woff2) format('woff2');unicode-range:U+0102-0103,U+1EA0-1EF1,U+20AB}@font-face{font-family:'Open Sans';font-style:italic;font-weight:300;src:local('Open Sans Light Italic'),local('OpenSansLight-Italic'),url(https://fonts.gstatic.com/s/opensans/v13/PRmiXeptR36kaC0GEAetxqvyPXdneeGd26m9EmFSSWg.woff2) format('woff2');unicode-range:U+0100-024F,U+1E00-1EFF,U+20A0-20AB,U+20AD-20CF,U+2C60-2C7F,U+A720-A7FF}@font-face{font-family:'Open Sans';font-style:italic;font-weight:300;src:local('Open Sans Light Italic'),local('OpenSansLight-Italic'),url(https://fonts.gstatic.com/s/opensans/v13/PRmiXeptR36kaC0GEAetxko2lTMeWA_kmIyWrkNCwPc.woff2) format('woff2');unicode-range:U+0000-00FF,U+0131,U+0152-0153,U+02C6,U+02DA,U+02DC,U+2000-206F,U+2074,U+20AC,U+2212,U+2215,U+E0FF,U+EFFD,U+F000}@font-face{font-family:'Open Sans';font-style:italic;font-weight:400;src:local('Open Sans Italic'),local('OpenSans-Italic'),url(https://fonts.gstatic.com/s/opensans/v13/xjAJXh38I15wypJXxuGMBjTOQ_MqJVwkKsUn0wKzc2I.woff2) format('woff2');unicode-range:U+0460-052F,U+20B4,U+2DE0-2DFF,U+A640-A69F}@font-face{font-family:'Open Sans';font-style:italic;font-weight:400;src:local('Open Sans Italic'),local('OpenSans-Italic'),url(https://fonts.gstatic.com/s/opensans/v13/xjAJXh38I15wypJXxuGMBjUj_cnvWIuuBMVgbX098Mw.woff2) format('woff2');unicode-range:U+0400-045F,U+0490-0491,U+04B0-04B1,U+2116}@font-face{font-family:'Open Sans';font-style:italic;font-weight:400;src:local('Open Sans Italic'),local('OpenSans-Italic'),url(https://fonts.gstatic.com/s/opensans/v13/xjAJXh38I15wypJXxuGMBkbcKLIaa1LC45dFaAfauRA.woff2) format('woff2');unicode-range:U+1F00-1FFF}@font-face{font-family:'Open Sans';font-style:italic;font-weight:400;src:local('Open Sans Italic'),local('OpenSans-Italic'),url(https://fonts.gstatic.com/s/opensans/v13/xjAJXh38I15wypJXxuGMBmo_sUJ8uO4YLWRInS22T3Y.woff2) format('woff2');unicode-range:U+0370-03FF}@font-face{font-family:'Open Sans';font-style:italic;font-weight:400;src:local('Open Sans Italic'),local('OpenSans-Italic'),url(https://fonts.gstatic.com/s/opensans/v13/xjAJXh38I15wypJXxuGMBr6up8jxqWt8HVA3mDhkV_0.woff2) format('woff2');unicode-range:U+0102-0103,U+1EA0-1EF1,U+20AB}@font-face{font-family:'Open Sans';font-style:italic;font-weight:400;src:local('Open Sans Italic'),local('OpenSans-Italic'),url(https://fonts.gstatic.com/s/opensans/v13/xjAJXh38I15wypJXxuGMBiYE0-AqJ3nfInTTiDXDjU4.woff2) format('woff2');unicode-range:U+0100-024F,U+1E00-1EFF,U+20A0-20AB,U+20AD-20CF,U+2C60-2C7F,U+A720-A7FF}@font-face{font-family:'Open Sans';font-style:italic;font-weight:400;src:local('Open Sans Italic'),local('OpenSans-Italic'),url(https://fonts.gstatic.com/s/opensans/v13/xjAJXh38I15wypJXxuGMBo4P5ICox8Kq3LLUNMylGO4.woff2) format('woff2');unicode-range:U+0000-00FF,U+0131,U+0152-0153,U+02C6,U+02DA,U+02DC,U+2000-206F,U+2074,U+20AC,U+2212,U+2215,U+E0FF,U+EFFD,U+F000}@font-face{font-family:'Open Sans';font-style:italic;font-weight:600;src:local('Open Sans Semibold Italic'),local('OpenSans-SemiboldItalic'),url(https://fonts.gstatic.com/s/opensans/v13/PRmiXeptR36kaC0GEAetxmgpAmOCqD37_tyH_8Ri5MM.woff2) format('woff2');unicode-range:U+0460-052F,U+20B4,U+2DE0-2DFF,U+A640-A69F}@font-face{font-family:'Open Sans';font-style:italic;font-weight:600;src:local('Open Sans Semibold Italic'),local('OpenSans-SemiboldItalic'),url(https://fonts.gstatic.com/s/opensans/v13/PRmiXeptR36kaC0GEAetxsPNMTLbnS9uQzHQlYieHUU.woff2) format('woff2');unicode-range:U+0400-045F,U+0490-0491,U+04B0-04B1,U+2116}
			@font-face{font-family:'Open Sans';font-style:italic;font-weight:600;src:local('Open Sans Semibold Italic'),local('OpenSans-SemiboldItalic'),url(https://fonts.gstatic.com/s/opensans/v13/PRmiXeptR36kaC0GEAetxgyhumQnPMBCoGYhRaNxyyY.woff2) format('woff2');unicode-range:U+1F00-1FFF}@font-face{font-family:'Open Sans';font-style:italic;font-weight:600;src:local('Open Sans Semibold Italic'),local('OpenSans-SemiboldItalic'),url(https://fonts.gstatic.com/s/opensans/v13/PRmiXeptR36kaC0GEAetxhUVAXEdVvYDDqrz3aeR0Yc.woff2) format('woff2');unicode-range:U+0370-03FF}@font-face{font-family:'Open Sans';font-style:italic;font-weight:600;src:local('Open Sans Semibold Italic'),local('OpenSans-SemiboldItalic'),url(https://fonts.gstatic.com/s/opensans/v13/PRmiXeptR36kaC0GEAetxlf4y_3s5bcYyyLIFUSWYUU.woff2) format('woff2');unicode-range:U+0102-0103,U+1EA0-1EF1,U+20AB}@font-face{font-family:'Open Sans';font-style:italic;font-weight:600;src:local('Open Sans Semibold Italic'),local('OpenSans-SemiboldItalic'),url(https://fonts.gstatic.com/s/opensans/v13/PRmiXeptR36kaC0GEAetxnywqdtBbUHn3VPgzuFrCy8.woff2) format('woff2');unicode-range:U+0100-024F,U+1E00-1EFF,U+20A0-20AB,U+20AD-20CF,U+2C60-2C7F,U+A720-A7FF}@font-face{font-family:'Open Sans';font-style:italic;font-weight:600;src:local('Open Sans Semibold Italic'),local('OpenSans-SemiboldItalic'),url(https://fonts.gstatic.com/s/opensans/v13/PRmiXeptR36kaC0GEAetxl2umOyRU7PgRiv8DXcgJjk.woff2) format('woff2');unicode-range:U+0000-00FF,U+0131,U+0152-0153,U+02C6,U+02DA,U+02DC,U+2000-206F,U+2074,U+20AC,U+2212,U+2215,U+E0FF,U+EFFD,U+F000}a img,abbr{border:0}#logo a,a{text-decoration:none}#logo a,.form-table th p,h1{font-weight:400}html{background:#f1f1f1;margin:0 20px}body{background:#fff;color:#444;font-family:"Open Sans",sans-serif;margin:140px auto 25px;padding:20px 20px 10px;max-width:700px;-webkit-font-smoothing:subpixel-antialiased;-webkit-box-shadow:0 1px 3px rgba(0,0,0,.13);box-shadow:0 1px 3px rgba(0,0,0,.13)}a{color:#0073aa}a:hover{color:#00a0d2}h1{border-bottom:1px solid #dedede;clear:both;color:#666;font-size:24px;margin:30px 0;padding:0 0 7px}h2{font-size:16px}dd,dt,li,p{padding-bottom:2px;font-size:14px;line-height:1.5}.code,code{font-family:Consolas,Monaco,monospace}input,submit,textarea{font-family:"Open Sans",sans-serif}dl,ol,ul{padding:5px 5px 5px 22px}abbr{font-variant:normal}label{cursor:pointer}#logo{margin:6px 0 14px;border-bottom:0;text-align:center}#logo a{background-image:url(https://dn-idcswap.qbox.me/install/image/logo.png);background-image:none,url(https://dn-idcswap.qbox.me/install/image/logo.png);background-position:center top;background-repeat:no-repeat;color:#999;height:84px;font-size:20px;line-height:1.3em;margin:-130px auto 25px;padding:0;text-indent:-9999px;outline:0;overflow:hidden;display:block}#pass1-text,.pw-weak,.show-password #pass1{display:none}.step{margin:20px 0 15px}.step,th{text-align:left;padding:0}.language-chooser.wp-core-ui .step .button.button-large{height:36px;vertical-align:middle;font-size:14px}.form-table td,.form-table th{font-size:14px;padding:10px 20px 10px 0;vertical-align:top}textarea{border:1px solid #dfdfdf;width:100%;box-sizing:border-box}#pass-strength-result,textarea{-webkit-box-sizing:border-box;-moz-box-sizing:border-box}.form-table{border-collapse:collapse;margin-top:1em;width:100%}.form-table td{margin-bottom:9px}.form-table th{text-align:left;width:140px}.form-table code{line-height:18px;font-size:14px}.form-table p{margin:4px 0 0;font-size:11px}.form-table input{line-height:20px;font-size:15px;padding:3px 5px;border:1px solid #ddd;-webkit-box-shadow:inset 0 1px 2px rgba(0,0,0,.07);box-shadow:inset 0 1px 2px rgba(0,0,0,.07)}.form-table input[type=email],.form-table input[type=password],.form-table input[type=text],.form-table input[type=url]{width:206px}.form-table.install-success td{vertical-align:middle;padding:16px 20px 16px 0}.form-table.install-success td p{margin:0;font-size:14px}.form-table.install-success td code{margin:0;font-size:18px}#error-page{margin-top:50px}#error-page p{font-size:14px;line-height:18px;margin:25px 0 20px}#error-page code,.code{font-family:Consolas,Monaco,monospace}.wp-hide-pw>.dashicons{line-height:inherit}#pass-strength-result{background-color:#eee;border:1px solid #ddd;color:#23282d;margin:-2px 5px 5px 0;padding:3px 5px;text-align:center;width:218px;box-sizing:border-box;opacity:0}#pass-strength-result.short{background-color:#f1adad;border-color:#e35b5b;opacity:1}#pass-strength-result.bad{background-color:#fbc5a9;border-color:#f78b53;opacity:1}
			#pass-strength-result.good{background-color:#ffe399;border-color:#ffc733;opacity:1}#pass-strength-result.strong{background-color:#c1e1b9;border-color:#83c373;opacity:1}#pass1-text.short,#pass1.short{border-color:#e35b5b}#pass1-text.bad,#pass1.bad{border-color:#f78b53}#pass1-text.good,#pass1.good{border-color:#ffc733}#pass1-text.strong,#pass1.strong{border-color:#83c373}.message{border:1px solid #c00;padding:.5em .7em;margin:5px 0 15px;background-color:#ffebe8}#admin_email,#dbhost,#dbname,#pass1,#pass2,#prefix,#pwd,#uname,#user_login{direction:ltr}.show-password #pass1-text{display:inline-block}.form-table span.description.important{font-size:12px}.rtl input,.rtl submit,.rtl textarea,body.rtl{font-family:Tahoma,sans-serif}.language-chooser select,:lang(he-il) .rtl input,:lang(he-il) .rtl submit,:lang(he-il) .rtl textarea,:lang(he-il) body.rtl{font-family:Arial,sans-serif}@media only screen and (max-width:799px){body{margin-top:115px}#logo a{margin:-125px auto 30px}}@media screen and (max-width:782px){.form-table{margin-top:0}.form-table td,.form-table th{display:block;width:auto;vertical-align:middle}.form-table th{padding:20px 0 0}.form-table td{padding:5px 0;border:0;margin:0}input,textarea{font-size:16px}.form-table span.description,.form-table td input[type=text],.form-table td input[type=email],.form-table td input[type=url],.form-table td input[type=password],.form-table td select,.form-table td textarea{width:100%;font-size:16px;line-height:1.5;padding:7px 10px;display:block;max-width:none;-webkit-box-sizing:border-box;-moz-box-sizing:border-box;box-sizing:border-box}}body.language-chooser{max-width:300px}.language-chooser select{padding:8px;width:100%;display:block;border:1px solid #ddd;background-color:#fff;color:#32373c;font-size:16px;font-weight:400}.language-chooser p{text-align:right}.screen-reader-input,.screen-reader-text{position:absolute;margin:-1px;padding:0;height:1px;width:1px;overflow:hidden;clip:rect(0 0 0 0);border:0}.spinner{background:url(../images/spinner.gif) no-repeat;-webkit-background-size:20px 20px;background-size:20px 20px;visibility:hidden;opacity:.7;filter:alpha(opacity=70);width:20px;height:20px;margin:2px 5px 0}.step .spinner{display:inline-block;margin-top:8px;margin-right:15px;vertical-align:top}.button-secondary.hide-if-no-js,.hide-if-no-js{display:none}@media print,(-webkit-min-device-pixel-ratio:1.25),(min-resolution:120dpi){.spinner{background-image:url(../images/spinner-2x.gif)}}pre{white-space:pre-wrap;white-space:-moz-pre-wrap;white-space:-pre-wrap;white-space:-o-pre-wrap;word-wrap:break-word;display:block;padding:9.5px;margin:0 0 10px;font-size:13px;line-height:1.428571429;color:#333;word-break:break-all;word-wrap:break-word;background-color:#f5f5f5;border:1px solid #ccc;border-radius:4px;font-family:Menlo,Monaco,Consolas,"Courier New",monospace;white-space:pre-wrap}
		</style>
	</head>
	<body class="wp-core-ui"><h1 id="logo"><a href="http://www.swapidc.cn/" tabindex="-1">SWAPIDC</a></h1><?php
}
function install_footer() {
	echo '</body></html>';
}
class swap_install {
	function index() {
		$step = _GET('install');
		$is_post = _POST('form');
		if ($step == '4') {
			install_header();
			echo '<h1>成功！</h1><p>SWAPIDC安装完成。您是否还沉浸在愉悦的安装过程中？很遗憾，一切皆已完成！ :)</p><p class="step"><a href="/admin" class="button button-large">登录</a></p>';
			install_footer();
			exit;
		}
		if (file_exists(SWAP_CONFIGS . 'install.lock')) die('install is lock');
		install_header();
		if ($step == '2') {
			if ($is_post) {
				$input_configs['网站名称'] = htmlspecialchars(_POST('网站名称'));
				$input_configs['交易币名称'] = htmlspecialchars(_POST('交易币名称'));
				$input_configs['底部版权'] = htmlspecialchars(_POST('底部版权'));
				$input_configs['数据库地址'] = _POST('数据库地址');
				$input_configs['数据库端口'] = (int)_POST('数据库端口');
				$input_configs['数据库用户'] = _POST('数据库用户');
				$input_configs['数据库密码'] = _POST('数据库密码');
				$input_configs['数据库名'] = _POST('数据库名');
				$login_user = _POST('loginusername');
				$login_pass = md5(_POST('loginpassword'));
				$config_content = '<?php return array(\'MYSQL_HOST\'=>\'' . str_replace('\'', '\\\'', $input_configs['数据库地址']) . '\',\'MYSQL_NAME\'=>\'' . str_replace('\'', '\\\'', $input_configs['数据库名']) . '\',\'MYSQL_USER\'=>\'' . str_replace('\'', '\\\'', $input_configs['数据库用户']) . '\',\'MYSQL_PWD\'=>\'' . str_replace('\'', '\\\'', $input_configs['数据库密码']) . '\',\'MYSQL_PORT\'=>\'' . str_replace('\'', '\\\'', $input_configs['数据库端口']) . '\'); ?>';
				file_put_contents(SWAP_CONFIGS . 'config.php', $config_content);
				$user_content = "<?php return array('0'=>array('username'=>'{$login_user}','password'=>'{$login_pass}')); ?>";
				file_put_contents(SWAP_CONFIGS . 'admin_users.php', $user_content);
				if (file_exists(SWAP_CONFIGS . 'config.php')) {
					$config = @include (SWAP_CONFIGS . 'config.php');
					if (isset($config['MYSQL_HOST'])) {
						$sqlcontent = <<<SQL
						SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;


CREATE TABLE IF NOT EXISTS `主机自定义配置选项` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `服务id` int(11) NOT NULL DEFAULT '0',
  `名字` text,
  `内容` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `主机配置选项`
--

CREATE TABLE IF NOT EXISTS `主机配置选项` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `服务id` int(11) NOT NULL DEFAULT '0',
  `配置id` int(11) NOT NULL DEFAULT '0',
  `选项id` int(11) NOT NULL DEFAULT '0',
  `数量` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `产品`
--

CREATE TABLE IF NOT EXISTS `产品` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `类型` text,
  `分类id` int(11) NOT NULL DEFAULT '0',
  `名称` text,
  `描述` text,
  `隐藏` int(11) NOT NULL DEFAULT '0',
  `显示域名选项` text,
  `欢迎邮件` int(11) NOT NULL DEFAULT '0',
  `库存管理` text,
  `库存` int(11) NOT NULL DEFAULT '0',
  `价格` text,
  `允许数量` int(11) NOT NULL DEFAULT '0',
  `子域名` text,
  `开通方式` enum('自动开通','审核开通') NOT NULL DEFAULT '审核开通',
  `面板类型` text,
  `服务器组` int(11) NOT NULL DEFAULT '0',
  `配置选项1` text,
  `配置选项2` text,
  `配置选项3` text,
  `配置选项4` text,
  `配置选项5` text,
  `配置选项6` text,
  `配置选项7` text,
  `配置选项8` text,
  `配置选项9` text,
  `配置选项10` text,
  `配置选项11` text,
  `配置选项12` text,
  `配置选项13` text,
  `配置选项14` text,
  `配置选项15` text,
  `配置选项16` text,
  `配置选项17` text,
  `配置选项18` text,
  `配置选项19` text,
  `配置选项20` text,
  `配置选项21` text,
  `配置选项22` text,
  `配置选项23` text,
  `配置选项24` text,
  `配置选项25` text,
  `配置选项26` text,
  `配置选项27` text,
  `配置选项28` text,
  `配置选项29` text,
  `配置选项30` text,
  `免费域名` text,
  `周期` text,
  `升级包` text,
  `开启升级选项` int(11) NOT NULL DEFAULT '0',
  `启用超量` text,
  `超量空间限制` int(11) DEFAULT '0',
  `超量流量限制` int(11) NOT NULL DEFAULT '0',
  `超量空间价格` text,
  `超量流量价格` text,
  `税` int(11) NOT NULL DEFAULT '0',
  `只能买一次` int(11) NOT NULL DEFAULT '0',
  `顺序` int(11) NOT NULL DEFAULT '0',
  `下架` int(11) NOT NULL DEFAULT '0',
  `允许用户自己停止` int(11) NOT NULL DEFAULT '0',
  `隐藏域名配置` int(11) NOT NULL DEFAULT '0',
  `禁止续费` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `产品分类`
--

CREATE TABLE IF NOT EXISTS `产品分类` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `分类名称` text,
  `隐藏` int(11) NOT NULL DEFAULT '0',
  `顺序` int(11) NOT NULL DEFAULT '0',
  `类型` text,
  `备注` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `产品自定义项`
--

CREATE TABLE IF NOT EXISTS `产品自定义项` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `类型` text,
  `服务id` int(11) NOT NULL DEFAULT '0',
  `名称` text,
  `选项类型` text,
  `描述` text,
  `选项` text,
  `正则表达式` text,
  `管理员` text,
  `要求` text,
  `显示订单` text,
  `显示发票` text,
  `顺序` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `产品自定义项内容`
--

CREATE TABLE IF NOT EXISTS `产品自定义项内容` (
  `项id` int(11) NOT NULL DEFAULT '0',
  `服务id` int(11) NOT NULL DEFAULT '0',
  `内容` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `产品配置连接`
--

CREATE TABLE IF NOT EXISTS `产品配置连接` (
  `组id` int(11) NOT NULL DEFAULT '0',
  `产品id` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `产品配置选项`
--

CREATE TABLE IF NOT EXISTS `产品配置选项` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `组id` int(11) NOT NULL DEFAULT '0',
  `选项名称` text,
  `选项类型` text,
  `最小` int(11) NOT NULL DEFAULT '0',
  `最大` int(11) NOT NULL DEFAULT '0',
  `顺序` int(11) NOT NULL DEFAULT '0',
  `隐藏` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `产品配置选项名称`
--

CREATE TABLE IF NOT EXISTS `产品配置选项名称` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `配置id` int(11) NOT NULL DEFAULT '0',
  `选项名称` text,
  `顺序` int(11) NOT NULL DEFAULT '0',
  `隐藏` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `产品配置选项组表`
--

CREATE TABLE IF NOT EXISTS `产品配置选项组表` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `名称` text,
  `描述` text,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `优惠码日志表`
--

CREATE TABLE IF NOT EXISTS `优惠码日志表` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` int(11) NOT NULL DEFAULT '0',
  `优惠码` text,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `优惠码表`
--

CREATE TABLE IF NOT EXISTS `优惠码表` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `优惠码` text,
  `类型` text,
  `价值` text,
  `适用产品` text,
  `开始时间` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `到期时间` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `最多使用次数` int(11) NOT NULL DEFAULT '0',
  `已经使用次数` int(11) NOT NULL DEFAULT '0',
  `只能一次` int(11) NOT NULL DEFAULT '0',
  `备注` text,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `公告`
--

CREATE TABLE IF NOT EXISTS `公告` (
  `公告ID` int(11) NOT NULL AUTO_INCREMENT,
  `公告标题` text,
  `公告时间` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `公告内容` text,
  `公告作者` text,
  PRIMARY KEY (`公告ID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `国家表`
--

CREATE TABLE IF NOT EXISTS `国家表` (
  `id` int(128) NOT NULL AUTO_INCREMENT,
  `国家` varchar(256) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=247 ;

--
-- 转存表中的数据 `国家表`
--

INSERT INTO `国家表` (`id`, `国家`) VALUES
(1, 'Afghanistan'),
(2, 'Aland Islands'),
(3, 'Albania'),
(4, 'Algeria'),
(5, 'American Samoa'),
(6, 'Andorra'),
(7, 'Angola'),
(8, 'Anguilla'),
(9, 'Antarctica'),
(10, 'Antigua And Barbuda'),
(11, 'Argentina'),
(12, 'Armenia'),
(13, 'Aruba'),
(14, 'Australia'),
(15, 'Austria'),
(16, 'Azerbaijan'),
(17, 'Bahamas'),
(18, 'Bahrain'),
(19, 'Bangladesh'),
(20, 'Barbados'),
(21, 'Belarus'),
(22, 'Belgium'),
(23, 'Belize'),
(24, 'Benin'),
(25, 'Bermuda'),
(26, 'Bhutan'),
(27, 'Bolivia'),
(28, 'Bosnia And Herzegovina'),
(29, 'Botswana'),
(30, 'Bouvet Island'),
(31, 'Brazil'),
(32, 'British Indian Ocean Territory'),
(33, 'Brunei Darussalam'),
(34, 'Bulgaria'),
(35, 'Burkina Faso'),
(36, 'Burundi'),
(37, 'Cambodia'),
(38, 'Cameroon'),
(39, 'Canada'),
(40, 'Cape Verde'),
(41, 'Cayman Islands'),
(42, 'Central African Republic'),
(43, 'Chad'),
(44, 'Chile'),
(45, 'China'),
(46, 'Christmas Island'),
(47, 'Cocos (Keeling) Islands'),
(48, 'Colombia'),
(49, 'Comoros'),
(50, 'Congo'),
(51, 'Congo, Democratic Republic'),
(52, 'Cook Islands'),
(53, 'Costa Rica'),
(54, 'Cote D&#39;Ivoire'),
(55, 'Croatia'),
(56, 'Cuba'),
(57, 'Curacao'),
(58, 'Cyprus'),
(59, 'Czech Republic'),
(60, 'Denmark'),
(61, 'Djibouti'),
(62, 'Dominica'),
(63, 'Dominican Republic'),
(64, 'Ecuador'),
(65, 'Egypt'),
(66, 'El Salvador'),
(67, 'Equatorial Guinea'),
(68, 'Eritrea'),
(69, 'Estonia'),
(70, 'Ethiopia'),
(71, 'Falkland Islands (Malvinas)'),
(72, 'Faroe Islands'),
(73, 'Fiji'),
(74, 'Finland'),
(75, 'France'),
(76, 'French Guiana'),
(77, 'French Polynesia'),
(78, 'French Southern Territories'),
(79, 'Gabon'),
(80, 'Gambia'),
(81, 'Georgia'),
(82, 'Germany'),
(83, 'Ghana'),
(84, 'Gibraltar'),
(85, 'Greece'),
(86, 'Greenland'),
(87, 'Grenada'),
(88, 'Guadeloupe'),
(89, 'Guam'),
(90, 'Guatemala'),
(91, 'Guernsey'),
(92, 'Guinea'),
(93, 'Guinea-Bissau'),
(94, 'Guyana'),
(95, 'Haiti'),
(96, 'Heard Island & Mcdonald Islands'),
(97, 'Holy See (Vatican City State)'),
(98, 'Honduras'),
(99, 'Hong Kong'),
(100, 'Hungary'),
(101, 'Iceland'),
(102, 'India'),
(103, 'Indonesia'),
(104, 'Iran, Islamic Republic Of'),
(105, 'Iraq'),
(106, 'Ireland'),
(107, 'Isle Of Man'),
(108, 'Israel'),
(109, 'Italy'),
(110, 'Jamaica'),
(111, 'Japan'),
(112, 'Jersey'),
(113, 'Jordan'),
(114, 'Kazakhstan'),
(115, 'Kenya'),
(116, 'Kiribati'),
(117, 'Korea'),
(118, 'Kuwait'),
(119, 'Kyrgyzstan'),
(120, 'Lao People&#39;s Democratic Republic'),
(121, 'Latvia'),
(122, 'Lebanon'),
(123, 'Lesotho'),
(124, 'Liberia'),
(125, 'Libyan Arab Jamahiriya'),
(126, 'Liechtenstein'),
(127, 'Lithuania'),
(128, 'Luxembourg'),
(129, 'Macao'),
(130, 'Macedonia'),
(131, 'Madagascar'),
(132, 'Malawi'),
(133, 'Malaysia'),
(134, 'Maldives'),
(135, 'Mali'),
(136, 'Malta'),
(137, 'Marshall Islands'),
(138, 'Martinique'),
(139, 'Mauritania'),
(140, 'Mauritius'),
(141, 'Mayotte'),
(142, 'Mexico'),
(143, 'Micronesia, Federated States Of'),
(144, 'Moldova'),
(145, 'Monaco'),
(146, 'Mongolia'),
(147, 'Montenegro'),
(148, 'Montserrat'),
(149, 'Morocco'),
(150, 'Mozambique'),
(151, 'Myanmar'),
(152, 'Namibia'),
(153, 'Nauru'),
(154, 'Nepal'),
(155, 'Netherlands'),
(156, 'Netherlands Antilles'),
(157, 'New Caledonia'),
(158, 'New Zealand'),
(159, 'Nicaragua'),
(160, 'Niger'),
(161, 'Nigeria'),
(162, 'Niue'),
(163, 'Norfolk Island'),
(164, 'Northern Mariana Islands'),
(165, 'Norway'),
(166, 'Oman'),
(167, 'Pakistan'),
(168, 'Palau'),
(169, 'Palestinian Territory, Occupied'),
(170, 'Panama'),
(171, 'Papua New Guinea'),
(172, 'Paraguay'),
(173, 'Peru'),
(174, 'Philippines'),
(175, 'Pitcairn'),
(176, 'Poland'),
(177, 'Portugal'),
(178, 'Puerto Rico'),
(179, 'Qatar'),
(180, 'Reunion'),
(181, 'Romania'),
(182, 'Russian Federation'),
(183, 'Rwanda'),
(184, 'Saint Barthelemy'),
(185, 'Saint Helena'),
(186, 'Saint Kitts And Nevis'),
(187, 'Saint Lucia'),
(188, 'Saint Martin'),
(189, 'Saint Pierre And Miquelon'),
(190, 'Saint Vincent And Grenadines'),
(191, 'Samoa'),
(192, 'San Marino'),
(193, 'Sao Tome And Principe'),
(194, 'Saudi Arabia'),
(195, 'Senegal'),
(196, 'Serbia'),
(197, 'Seychelles'),
(198, 'Sierra Leone'),
(199, 'Singapore'),
(200, 'Slovakia'),
(201, 'Slovenia'),
(202, 'Solomon Islands'),
(203, 'Somalia'),
(204, 'South Africa'),
(205, 'South Georgia And Sandwich Isl.'),
(206, 'Spain'),
(207, 'Sri Lanka'),
(208, 'Sudan'),
(209, 'Suriname'),
(210, 'Svalbard And Jan Mayen'),
(211, 'Swaziland'),
(212, 'Sweden'),
(213, 'Switzerland'),
(214, 'Syrian Arab Republic'),
(215, 'Taiwan'),
(216, 'Tajikistan'),
(217, 'Tanzania'),
(218, 'Thailand'),
(219, 'Timor-Leste'),
(220, 'Togo'),
(221, 'Tokelau'),
(222, 'Tonga'),
(223, 'Trinidad And Tobago'),
(224, 'Tunisia'),
(225, 'Turkey'),
(226, 'Turkmenistan'),
(227, 'Turks And Caicos Islands'),
(228, 'Tuvalu'),
(229, 'Uganda'),
(230, 'Ukraine'),
(231, 'United Arab Emirates'),
(232, 'United Kingdom'),
(233, 'United States'),
(234, 'United States Outlying Islands'),
(235, 'Uruguay'),
(236, 'Uzbekistan'),
(237, 'Vanuatu'),
(238, 'Venezuela'),
(239, 'Viet Nam'),
(240, 'Virgin Islands, British'),
(241, 'Virgin Islands, U.S.'),
(242, 'Wallis And Futuna'),
(243, 'Western Sahara'),
(244, 'Yemen'),
(245, 'Zambia'),
(246, 'Zimbabwe');

-- --------------------------------------------------------

--
-- 表的结构 `域名`
--

CREATE TABLE IF NOT EXISTS `域名` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `审核订单`
--

CREATE TABLE IF NOT EXISTS `审核订单` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `订单id` text,
  `uid` int(11) NOT NULL DEFAULT '0',
  `时间` datetime DEFAULT '0000-00-00 00:00:00',
  `总价` text,
  `支付网关` text,
  `状态` text,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `帮助中心`
--

CREATE TABLE IF NOT EXISTS `帮助中心` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `标题` text,
  `内容` text,
  `作者` text,
  `时间` datetime DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `快速登陆表`
--

CREATE TABLE IF NOT EXISTS `快速登陆表` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` int(11) NOT NULL DEFAULT '0',
  `Baidu` text,
  `Diandian` text,
  `Douban` text,
  `Github` text,
  `Google` text,
  `Kaixin` text,
  `Msn` text,
  `Qq` text,
  `Renren` text,
  `Sina` text,
  `Sohu` text,
  `T163` text,
  `Taobao` text,
  `Tencent` text,
  `X360` text,
  `Baidu_token` text,
  `Diandian_token` text,
  `Douban_token` text,
  `Github_token` text,
  `Google_token` text,
  `Kaixin_token` text,
  `Msn_token` text,
  `Qq_token` text,
  `Renren_token` text,
  `Sina_token` text,
  `Sohu_token` text,
  `T163_token` text,
  `Taobao_token` text,
  `Tencent_token` text,
  `X360_token` text,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `插件`
--

CREATE TABLE IF NOT EXISTS `插件` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `插件名` text,
  `启用` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

INSERT INTO `插件` (`id`, `插件名`, `启用`) VALUES
(1,	'xhczk',	1),
(2,	'pdyuyan',	1),
(3,	'mail_alert',	1),
(4,	'qiandao',	1),
(5,	'seoyh',	1),
(6,	'paylog',	1),
(7,	'push',	1),
(8, 'regkz', 1),
(9, 'forgot_password', 1),
(10, 'filedown', 1),
(11, 'qqlogin', 1);
-- --------------------------------------------------------

--
-- 表的结构 `插件配置`
--

CREATE TABLE IF NOT EXISTS `插件配置` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `插件名称` text,
  `名` text,
  `值` text,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;


-- --------------------------------------------------------

--
-- 表的结构 `支付接口`
--

CREATE TABLE IF NOT EXISTS `支付接口` (
  `支付接口名称` text,
  `启动` int(11) DEFAULT '0',
  `货币id` int(11) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

INSERT INTO `支付接口` (`支付接口名称`, `启动`, `货币id`) VALUES
('alipay_pay',	1,	1),
('tenpay',	1,	1),
('paypal',	1,	1);
-- --------------------------------------------------------

--
-- 表的结构 `支付接口日志`
--

CREATE TABLE IF NOT EXISTS `支付接口日志` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `支付接口` text,
  `时间` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `uid` int(11) NOT NULL DEFAULT '0',
  `动作` text,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `服务`
--

CREATE TABLE IF NOT EXISTS `服务` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `帐号id` int(11) NOT NULL DEFAULT '0',
  `产品id` int(11) NOT NULL DEFAULT '0',
  `服务器id` int(11) NOT NULL DEFAULT '0',
  `类型` text,
  `申请时间` date NOT NULL DEFAULT '0000-00-00',
  `域名` text,
  `开通时间` date NOT NULL DEFAULT '0000-00-00',
  `用户名` text,
  `密码` text,
  `到期时间` date NOT NULL DEFAULT '0000-00-00',
  `状态` enum('等待审核','激活','暂停','停止','驳回','等待付款') NOT NULL DEFAULT '等待付款',
  `付款方法` text,
  `周期` text,
  `注释` text,
  `暂停原因` text,
  `n1` int(11) NOT NULL DEFAULT '0',
  `n2` text,
  `磁盘使用` int(11) NOT NULL DEFAULT '0',
  `磁盘限制` int(11) NOT NULL DEFAULT '0',
  `流量使用` int(11) NOT NULL DEFAULT '0',
  `流量限制` int(11) NOT NULL DEFAULT '0',
  `最后更新时间` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `专用IP` text,
  `指定IP` text,
  `多周期` int(11) NOT NULL DEFAULT '1',
  `购买数量` text,
  `优惠码` text,
  `开通付费` text,
  `cron正常` int(11) DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `服务单信息表`
--

CREATE TABLE IF NOT EXISTS `服务单信息表` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `用户id` int(11) NOT NULL DEFAULT '0',
  `服务单id` int(11) NOT NULL DEFAULT '0',
  `名字` text,
  `时间` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `信息` text,
  `客服id` int(11) NOT NULL DEFAULT '0',
  `回复类型` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `服务单表`
--

CREATE TABLE IF NOT EXISTS `服务单表` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `姓名` text,
  `电子邮件` text,
  `主题` text,
  `提交时间` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `最后时间` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `状态` text,
  `uid` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `服务器表`
--

CREATE TABLE IF NOT EXISTS `服务器表` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `名称` text,
  `主机名` text,
  `ip` text,
  `端口` text,
  `分配的IP地址` text,
  `最大账户` int(11) NOT NULL DEFAULT '0',
  `服务器状态地址` text,
  `禁用` int(11) NOT NULL DEFAULT '0',
  `DNS服务器1` text,
  `DNS服务器2` text,
  `DNS服务器3` text,
  `DNS服务器4` text,
  `DNS服务器5` text,
  `控制面板` text,
  `用户名` text,
  `密码` text,
  `哈希密码` text,
  `使用SSL` text,
  `数据中心位置` text,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `用户`
--

CREATE TABLE IF NOT EXISTS `用户` (
  `uid` int(11) NOT NULL AUTO_INCREMENT COMMENT '用户UID',
  `用户名` text COMMENT '用户名',
  `密码` text COMMENT '密码',
  `姓名` text COMMENT '姓名',
  `国家` text COMMENT '国家',
  `地址` text COMMENT '地址',
  `邮编` text COMMENT '邮编',
  `电话号码` text COMMENT '电话号码',
  `电子邮件` text COMMENT '电子邮件',
  `预存款` text COMMENT '预存款',
  `禁止` int(11) NOT NULL DEFAULT '0' COMMENT '禁止',
  `注册时间` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`uid`),
  UNIQUE KEY `uid` (`uid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `系统配置`
--

CREATE TABLE IF NOT EXISTS `系统配置` (
  `网站名称` text,
  `安全码` text,
  `通信码` text,
  `令牌码` text,
  `识别码` text,
  `伪静态开关` int(11) NOT NULL DEFAULT '0',
  `默认国家` text,
  `默认语言` text,
  `开启SSL` int(11) NOT NULL DEFAULT '0',
  `网站状态` int(11) NOT NULL DEFAULT '0',
  `维护消息` text,
  `维护重定向` text,
  `启动服务条款` int(11) NOT NULL DEFAULT '0',
  `服务条款URL` text,
  `启动暂停` int(11) NOT NULL DEFAULT '1',
  `暂停时间` text,
  `启动解除暂停` int(11) NOT NULL DEFAULT '1',
  `启动删除` int(11) NOT NULL DEFAULT '1',
  `删除时间` text,
  `交易币名称` text,
  `随机主机用户名` int(11) NOT NULL DEFAULT '0',
  `cron最后执行时间` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `停止列表清除时间` int(11) NOT NULL DEFAULT '1',
  `待付款列表清除时间` int(11) NOT NULL DEFAULT '1',
  `底部版权` text,
  `头部LOGO` text,
  `cron执行完成` int(11) DEFAULT NULL,
  `关闭GZIP` int(11) NOT NULL DEFAULT '0',
  `邮箱地址` text,
  `SMTP服务器地址` text,
  `邮箱登录帐号` text,
  `邮箱登录密码` text
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `网络故障`
--

CREATE TABLE IF NOT EXISTS `网络故障` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `标题` text,
  `时间` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `内容` text,
  `状态` text,
  `受到影响的服务` text,
  `优先级` text,
  `最近更新` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `货币设置`
--

CREATE TABLE IF NOT EXISTS `货币设置` (
  `货币名称` text,
  `货币前缀` text,
  `货币后缀` text,
  `交易币汇率` text,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- 转存表中的数据 `货币设置`
--

INSERT INTO `货币设置` (`货币名称`, `货币前缀`, `货币后缀`, `交易币汇率`, `id`) VALUES
('人民币', '￥', 'RMB', '1', 1),
('美元', '$', 'USD', '6.10', 2);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
SQL;
						if (!empty($sqlcontent)) {
							$e = explode(";\n", $sqlcontent);
							if (class_exists('mysqli')) {
								$D = @new mysqli($config['MYSQL_HOST'], $config['MYSQL_USER'], $config['MYSQL_PWD'], $config['MYSQL_NAME'], $config['MYSQL_PORT']);
								if (!mysqli_connect_error()) {
									$D->set_charset('utf8');
									if (!mysqli_num_rows($D->query("select `TABLE_NAME` from `INFORMATION_SCHEMA`.`TABLES` where `TABLE_SCHEMA`='" . $config['MYSQL_NAME'] . "' and `TABLE_NAME`='系统配置'"))) {
										foreach ($e as $g) {
											if (!empty($g)) $D->query($g);
										}
										$OSWAP_863f27117777140e6f83e632319b12fa['host'] = $_SERVER['HTTP_HOST'];
										$OSWAP_863f27117777140e6f83e632319b12fa['安全码'] = '';
										$OSWAP_863f27117777140e6f83e632319b12fa['通信码'] = '';
										$OSWAP_863f27117777140e6f83e632319b12fa['令牌码'] = '';
										$OSWAP_863f27117777140e6f83e632319b12fa['识别码'] = '';
										$GLOBALS['swap_mac']['otime'] = json_decode(file_get_contents(SWAP_CONFIGS . 'compile.txt'));
										$OSWAP_863f27117777140e6f83e632319b12fa['safetime'] = $GLOBALS['swap_mac']['otime']->oswap_time;
										$sqlcontent = "INSERT INTO 系统配置 (网站名称,安全码,通信码,令牌码,识别码,默认国家,默认语言,开启SSL,网站状态,维护消息,启动服务条款,启动暂停,暂停时间,启动解除暂停,启动删除,删除时间,交易币名称,随机主机用户名,停止列表清除时间,待付款列表清除时间,底部版权) VALUES ('" . $input_configs['网站名称'] . "','" . $OSWAP_863f27117777140e6f83e632319b12fa['安全码'] . "','" . $OSWAP_863f27117777140e6f83e632319b12fa['通信码'] . "','" . md5(md5('swapidc-' . $OSWAP_863f27117777140e6f83e632319b12fa['令牌码'] . '-key')) . "','" . $OSWAP_863f27117777140e6f83e632319b12fa['识别码'] . "','China','Chinaese',0,0,'网站正在维护....', 0, 1, '0', 1, 1, '10', '" . $input_configs['交易币名称'] . "', 0, 15, 10, '" . $input_configs['底部版权'] . "');";
										$D->query($sqlcontent);
										$D->close();
										exit(header('Location: /index.php/install/?install=3'));
									} else {
										echo '<p class="message">数据库已经安装过了SWAPIDC,请清空数据库后再试!!</p>';
									}
								} else {
									echo '<p class="message">' . mysqli_connect_error() . '</p>';
								}
							} else {
								$con = @mysql_connect($config['MYSQL_HOST'] . ":" . $config['MYSQL_PORT'], $config['MYSQL_USER'], $config['MYSQL_PWD']);
								if ($con) {
									if (mysql_select_db($config['MYSQL_NAME'], $con)) {
										mysql_set_charset('utf8', $con);
										if (!mysql_num_rows(mysql_query("select `TABLE_NAME` from `INFORMATION_SCHEMA`.`TABLES` where `TABLE_SCHEMA`='" . $config['MYSQL_NAME'] . "' and `TABLE_NAME`='系统配置'", $con))) {
											foreach ($e as $g) {
												if (!empty($g)) mysql_query($g, $con);
											}
											$OSWAP_863f27117777140e6f83e632319b12fa['host'] = $_SERVER['HTTP_HOST'];
											$OSWAP_863f27117777140e6f83e632319b12fa['安全码'] = '';
											$OSWAP_863f27117777140e6f83e632319b12fa['通信码'] = '';
											$OSWAP_863f27117777140e6f83e632319b12fa['令牌码'] = '';
											$OSWAP_863f27117777140e6f83e632319b12fa['识别码'] = '';
											$GLOBALS['swap_mac']['otime'] = json_decode(file_get_contents(SWAP_CONFIGS . 'compile.txt'));
											$OSWAP_863f27117777140e6f83e632319b12fa['safetime'] = $GLOBALS['swap_mac']['otime']->oswap_time;
											$sqlcontent = "INSERT INTO 系统配置 (网站名称,安全码,通信码,令牌码,识别码,默认国家,默认语言,开启SSL,网站状态,维护消息,启动服务条款,启动暂停,暂停时间,启动解除暂停,启动删除,删除时间,交易币名称,随机主机用户名,停止列表清除时间,待付款列表清除时间,底部版权) VALUES ('" . $input_configs['网站名称'] . "','" . $OSWAP_863f27117777140e6f83e632319b12fa['安全码'] . "','" . $OSWAP_863f27117777140e6f83e632319b12fa['通信码'] . "','" . md5(md5('swapidc-' . $OSWAP_863f27117777140e6f83e632319b12fa['令牌码'] . '-key')) . "','" . $OSWAP_863f27117777140e6f83e632319b12fa['识别码'] . "','China','Chinaese',0,0,'网站正在维护....', 0, 1, '0', 1, 1, '10', '" . $input_configs['交易币名称'] . "', 0, 15, 10, '" . $input_configs['底部版权'] . "');";
											mysql_query($sqlcontent, $con);
											mysql_close($con);
											exit(header('Location: /index.php/install/?install=3'));
										} else {
											echo '<p class="message">数据库已经安装过了SWAPIDC,请清空数据库后再试!!</p>';
										}
									} else {
										echo '<p class="message">数据库不存在</p>';
									}
								} else {
									echo '<p class="message">数据库连接失败</p>';
								}
							}
						} else {
							echo '<p class="message"></p>';
						}
					} else {
						echo '<p class="message">写入' . SWAP_CONFIGS . 'config.php失败</p>';
					}
				} else {
					echo '<p class="message">写入' . SWAP_CONFIGS . 'config.php失败</p>';
				}
			} ?>
<form id="setup" method="post" action="?install=2" novalidate="novalidate">
<?php
			if (!new_is_writeable(SWAP_ROOT)) {
				echo '<p class="message">' . SWAP_ROOT . '目录不可写</p>';
			}
			if (!new_is_writeable(SWAP_XT)) {
				echo '<p class="message">' . SWAP_XT . '目录不可写</p>';
			}
			if (!new_is_writeable(SWAP_MAC)) {
				echo '<p class="message">' . SWAP_MAC . '目录不可写</p>';
			}
			if (!new_is_writeable(SWAP_LIB)) {
				echo '<p class="message">' . SWAP_LIB . '目录不可写</p>';
			}
			if (!new_is_writeable(SWAP_CONFIGS)) {
				echo '<p class="message">' . SWAP_CONFIGS . '目录不可写</p>';
			}
			if (!new_is_writeable(SWAP_TEMPLATES)) {
				echo '<p class="message">' . SWAP_TEMPLATES . '目录不可写</p>';
			}
			if (!new_is_writeable(SWAP_LANG)) {
				echo '<p class="message">' . SWAP_LANG . '目录不可写</p>';
			}
			if (!new_is_writeable(SWAP_PLUGINS)) {
				echo '<p class="message">' . SWAP_PLUGINS . '目录不可写</p>';
			}
			if (!new_is_writeable(SWAP_ERROR)) {
				echo '<p class="message">' . SWAP_ERROR . '目录不可写</p>';
			}
			if (!new_is_writeable(SWAP_TEMPLATES_C)) {
				echo '<p class="message">' . SWAP_TEMPLATES_C . '目录不可写</p>';
			}
			if (!new_is_writeable(SWAP_CACHE)) {
				echo '<p class="message">' . SWAP_CACHE . '目录不可写</p>';
			}
			if (!new_is_writeable(SWAP_CONTROLLER)) {
				echo '<p class="message">' . SWAP_CONTROLLER . '目录不可写</p>';
			}
			if (!function_exists('gzopen')) {
				echo '<p class="message">gzopen函数不可用</p>';
			}
			if (!function_exists('curl_init')) {
				echo '<p class="message">curl_init函数不可用</p>';
			}
			if (!function_exists('gzread')) {
				echo '<p class="message">gzread函数不可用</p>';
			}
			if (!function_exists('gzread')) {
				echo '<p class="message">gzread函数不可用</p>';
			}
			if (!ini_get('allow_url_fopen')) {
				echo '<p class="message">allow_url_fopen选项未开启</p>';
			} ?>
<input type="hidden" name="form" value="1" />
<h1>需要信息</h1>
<p>您需要填写一些基本信息。无需担心填错，这些信息以后可以再次修改。</p>
	<table class="form-table">
		<tr>
			<th scope="row"><label for="weblog_title">网站名称</label></th>
			<td><input name="网站名称" type="text" size="25" value="<?php if (empty($input_configs['网站名称'])) { ?>新世纪主机<?php
			} else {
				echo $input_configs['网站名称'];
			} ?>" /><p>你的网站名称 如:新世纪主机</p></td>
		</tr>
		<tr>
			<th scope="row"><label for="weblog_title">交易币名称</label></th>
			<td><input name="交易币名称" type="text" size="25" value="<?php if (empty($input_configs['交易币名称'])) { ?>软妹币<?php
			} else {
				echo $input_configs['交易币名称'];
			} ?>" /><p>你网站的交易币名称 如:软妹币</p></td>
		</tr>
		<tr>
			<th scope="row"><label for="weblog_title">底部版权</label></th>
			<td><input name="底部版权" type="text" size="25" value="<?php if (empty($input_configs['底部版权'])) { ?>&copy;copyright 2016<?php
			} else {
				echo $input_configs['底部版权'];
			} ?>" />
			<p>要设置的底部版权 如:&copy;copyright 2016</p>
			</td>
		</tr>
		<tr>
			<th scope="row"><label for="weblog_title">管理员用户名</label></th>
			<td><input name="loginusername" type="text" size="25" value="<?php if (empty($login_user)) { ?>admin<?php
			} else {
				echo $login_user;
			} ?>" />
			<p>登录后台使用的用户名 如:admin</p>
			</td>
		</tr>
		<tr>
			<th scope="row"><label for="weblog_title">管理员密码</label></th>
			<td><input name="loginpassword" type="password" size="25" value="<?php if (empty($login_pass)) { ?>123456<?php
			} else {
				echo $login_pass;
			} ?>" />
			<p>登录后台使用的密码 如:123456</p>
			</td>
		</tr>
	</table>
<h1>数据库信息</h1>
<p>您需要填写一些数据库信息。</p>
<?php
			if (class_exists('mysqli')) {
				$D = @new mysqli('127.0.0.1', 'root', '', 'mysql', 3306);
				if (!mysqli_connect_error()) {
					echo '<p class="message">检测到您目前的ROOT用户密码为空密码,这将导致您处于危险状态.</p>';
				}
			} else {
				$con = @mysql_connect('127.0.0.1', 'root', '');
				if (!$con) {
					echo '<p class="message">检测到您目前的ROOT用户密码为空密码,这将导致您处于危险状态.</p>';
				}
			} ?>
	<table class="form-table">
		<tr>
			<th scope="row"><label for="weblog_title">数据库地址</label></th>
			<td><input name="数据库地址" type="text" size="25" value="<?php if (empty($input_configs['数据库地址'])) { ?>127.0.0.1<?php
			} else {
				echo htmlspecialchars($input_configs['数据库地址']);
			} ?>" /></td>
		</tr>
		<tr>
			<th scope="row"><label for="weblog_title">数据库端口</label></th>
			<td><input name="数据库端口" type="text" size="25" value="<?php if (empty($input_configs['数据库端口'])) { ?>3306<?php
			} else {
				echo htmlspecialchars($input_configs['数据库端口']);
			} ?>" /></td>
		</tr>
		<tr>
			<th scope="row"><label for="weblog_title">数据库用户</label></th>
			<td><input name="数据库用户" type="text" size="25" value="<?php if (!empty($input_configs['数据库用户'])) {
				echo htmlspecialchars($input_configs['数据库用户']);
			} ?>" /></td>
		</tr>
		<tr>
			<th scope="row"><label for="weblog_title">数据库密码</label></th>
			<td><input name="数据库密码" type="text" size="25" value="<?php if (!empty($input_configs['数据库密码'])) {
				echo htmlspecialchars($input_configs['数据库密码']);
			} ?>" />
			</td>
		</tr>
		<tr>
			<th scope="row"><label for="weblog_title">数据库名</label></th>
			<td><input name="数据库名" type="text" size="25" value="<?php if (empty($input_configs['数据库名'])) { ?>swap<?php
			} else {
				echo htmlspecialchars($input_configs['数据库名']);
			} ?>" />
			</td>
		</tr>
	</table>
	<p class="step"><input type="submit" name="Submit" id="submit" class="button button-large" value="安装SWAPIDC"  /></p>
</form>
			<?php
		} else if ($step == '3') {
			$bindcode = "云平台已被完整剔除，请等待自动跳转" ?>
<h1>正在等待云中心连接</h1>
<p>请登入云中心添入绑定码,进行绑定已完成安装 <a target="_blank" href="#">点击绑定>></a></p>
<pre><?php echo $bindcode ?></pre>
<table class="form-table install-success">
	<tr>
		<td><img src="data:image/gif;base64,R0lGODlheQITAMQVAP///1WItb7V6V+Qu7TK3abG4nqr1sHX6m2ZvqLE4UF7r7fM3myj03yt13us1mqh0Wui0jd1q0+Esl6c0kKLyv///wAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAACH/C05FVFNDQVBFMi4wAwEAAAAh/wtYTVAgRGF0YVhNUDw/eHBhY2tldCBiZWdpbj0i77u/IiBpZD0iVzVNME1wQ2VoaUh6cmVTek5UY3prYzlkIj8+IDx4OnhtcG1ldGEgeG1sbnM6eD0iYWRvYmU6bnM6bWV0YS8iIHg6eG1wdGs9IkFkb2JlIFhNUCBDb3JlIDUuNS1jMDIxIDc5LjE1NTc3MiwgMjAxNC8wMS8xMy0xOTo0NDowMCAgICAgICAgIj4gPHJkZjpSREYgeG1sbnM6cmRmPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5LzAyLzIyLXJkZi1zeW50YXgtbnMjIj4gPHJkZjpEZXNjcmlwdGlvbiByZGY6YWJvdXQ9IiIgeG1sbnM6eG1wPSJodHRwOi8vbnMuYWRvYmUuY29tL3hhcC8xLjAvIiB4bWxuczp4bXBNTT0iaHR0cDovL25zLmFkb2JlLmNvbS94YXAvMS4wL21tLyIgeG1sbnM6c3RSZWY9Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC9zVHlwZS9SZXNvdXJjZVJlZiMiIHhtcDpDcmVhdG9yVG9vbD0iQWRvYmUgUGhvdG9zaG9wIENDIDIwMTQgKFdpbmRvd3MpIiB4bXBNTTpJbnN0YW5jZUlEPSJ4bXAuaWlkOkIyOEMxNzgwREM3QjExRTVBRTEyQTA3N0U0RDZFM0RFIiB4bXBNTTpEb2N1bWVudElEPSJ4bXAuZGlkOkIyOEMxNzgxREM3QjExRTVBRTEyQTA3N0U0RDZFM0RFIj4gPHhtcE1NOkRlcml2ZWRGcm9tIHN0UmVmOmluc3RhbmNlSUQ9InhtcC5paWQ6QjI4QzE3N0VEQzdCMTFFNUFFMTJBMDc3RTRENkUzREUiIHN0UmVmOmRvY3VtZW50SUQ9InhtcC5kaWQ6QjI4QzE3N0ZEQzdCMTFFNUFFMTJBMDc3RTRENkUzREUiLz4gPC9yZGY6RGVzY3JpcHRpb24+IDwvcmRmOlJERj4gPC94Onht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" style="width: 100%"></td>
	</tr>
</table>
<script src="https://lib.sinaapp.com/js/jquery/2.0.3/jquery-2.0.3.min.js"></script>
<script>
$(document).ready(function (){
	setInterval(function (){
		$.get('/index.php/install/cake/',function (data){
			if(data=='ok'){
				location.href='/index.php/install/?install=4';
			}else{
				$.get('/index.php/install/load/',function (data){});
			}
		});
	},3000);
});
</script>
			<?php
		} else { ?>
			<h1>欢迎</h1>
			<p>欢迎使用SWAPIDC接下来将消耗您五分钟安装程序！请简单地填写下面的表格，来开始使用这个世界上最具扩展性的IDC平台。</p>
			<form id="setup" method="post" action="?install=2" novalidate="novalidate">
				<p class="step"><input type="submit" name="Submit" id="submit" class="button button-large" value="开始安装SWAPIDC"  /></p>
			</form>
			<span style="float: right;color:#ccc;font-size:5px;margin:-10px;">感谢WORDPRESS提供安装页面样式</span>
			<?php
		}
		install_footer();
	}
	function load() {
		file_put_contents(SWAP_CONFIGS . 'install.lock', '');
		die('ok');
	}
	function cake() {
		if (file_exists(SWAP_CONFIGS . 'install.lock')) {
			die('ok');
		} else {
			die('wait');
		}
	}
}
