<?php  defined('SWAP_ROOT') or die('非法操作'); error_reporting(E_ALL ^ E_NOTICE); register_shutdown_function('fatalError'); function inrpc($a=''){ static $b; if($a!='') $b=$a; if($b!=true) $b=false; return $b; } function swap_main_error_module($OSWAP_0ccc3e14ef41636d4776a93725351e09,$OSWAP_cf104113aea177d5d1ff1177185f8b8b,$OSWAP_56208f54899eb294a58ef3e78e79b7b2=0){ ob_end_clean(); ob_start('swap_sever_ob'); if(inrpc()){ die($OSWAP_0ccc3e14ef41636d4776a93725351e09.': '.$OSWAP_cf104113aea177d5d1ff1177185f8b8b); }else{ if($OSWAP_56208f54899eb294a58ef3e78e79b7b2 && !_GET('no404')){ header('HTTP/1.0 404 Not Found', true, 404); echo '<!DOCTYPE html><html lang="en"><head><title>404 Page Not Found</title><style type="text/css">::selection{ background-color: #E13300; color: white; }::moz-selection{ background-color: #E13300; color: white; }::webkit-selection{ background-color: #E13300; color: white; }body {	background-color: #fff;	margin: 40px;	font: 13px/20px normal Helvetica, Arial, sans-serif;	color: #4F5155;}a {	color: #003399;	background-color: transparent;	font-weight: normal;}h1 {	color: #444;	background-color: transparent;	border-bottom: 1px solid #D0D0D0;	font-size: 19px;	font-weight: normal;	margin: 0 0 14px 0;	padding: 14px 15px 10px 15px;}code {	font-family: Consolas, Monaco, Courier New, Courier, monospace;	font-size: 12px;	background-color: #f9f9f9;	border: 1px solid #D0D0D0;	color: #002166;	display: block;	margin: 14px 0 14px 0;	padding: 12px 10px 12px 10px;}#container {	margin: 10px;	border: 1px solid #D0D0D0;	-webkit-box-shadow: 0 0 8px #D0D0D0;}p {	margin: 12px 15px 12px 15px;}</style></head><body>	<div id="container">		<h1>404 Page Not Found</h1>		<p>The page you requested was not found.</p>	</div></body></html>'; }else{ header('HTTP/1.1 500 Internal Server Error'); header('Status:500 Internal Server Error'); swap_error_temp('系统发生错误','错误信息',$OSWAP_0ccc3e14ef41636d4776a93725351e09,$OSWAP_cf104113aea177d5d1ff1177185f8b8b); } } exit(); } function swap_main_error_module_temp($OSWAP_0ccc3e14ef41636d4776a93725351e09,$OSWAP_cf104113aea177d5d1ff1177185f8b8b){ ob_end_clean(); header('HTTP/1.1 500 Internal Server Error'); header('Status:500 Internal Server Error'); swap_error_temp('系统发生错误','错误信息',$OSWAP_0ccc3e14ef41636d4776a93725351e09,$OSWAP_cf104113aea177d5d1ff1177185f8b8b); exit(); } function fatalError() { if(C('LOG_RECORD')) Log::save(); if ($e = error_get_last()) { switch($e['type']){ case E_ERROR: case E_PARSE: case E_CORE_ERROR: case E_COMPILE_ERROR: case E_USER_ERROR: ob_end_clean(); ob_start('swap_sever_ob'); if(C('LOG_RECORD')) Log::write($e['message'].'  '.$e['file'].' ['.$e['line'].']'); function_exists('halt')?halt($e):exit('MAC ERROR:'.strstr($e['message'],base64_decode('Oi8vdGV4dC8='))?substr($e['message'],0,strrpos($e['message'],base64_decode('Oi8vdGV4dC8='))):$e['message']. ' in <b>'.strstr($e['file'],base64_decode('Oi8vdGV4dC8='))?'':$e['file'].'</b> on line <b>'.$e['line'].'</b>'); break; } } } function halt($OSWAP_0ccc3e14ef41636d4776a93725351e09) { $e = array(); if (!is_array($OSWAP_0ccc3e14ef41636d4776a93725351e09)) { $OSWAP_a9e6fe27206363851fd04978c46e6107 = debug_backtrace(); $e['message'] = $OSWAP_0ccc3e14ef41636d4776a93725351e09; $e['file'] = $OSWAP_a9e6fe27206363851fd04978c46e6107[0]['file']; $e['line'] = $OSWAP_a9e6fe27206363851fd04978c46e6107[0]['line']; ob_start(); debug_print_backtrace(); $e['trace'] = ob_get_clean(); } else { $e = $OSWAP_0ccc3e14ef41636d4776a93725351e09; } $e['message'] = strstr($e['message'],base64_decode('Oi8vdGV4dC8='))?substr($e['message'],0,strrpos($e['message'],base64_decode('Oi8vdGV4dC8='))):$e['message']; $e['file'] = strstr($e['file'],base64_decode('Oi8vdGV4dC8='))?'':$e['file']; ?>
<!DOCTYPE html><html lang="zh-CN"><head><title>系统发生错误</title><style type="text/css">::selection{ background-color: #E13300; color: white; }::moz-selection{ background-color: #E13300; color: white; }::webkit-selection{ background-color: #E13300; color: white; }body {	background-color: #fff;	margin: 40px;	font: 13px/20px normal Helvetica, Arial, sans-serif;	color: #4F5155;}a {	color: #003399;	background-color: transparent;	font-weight: normal;}h1 {	color: #444;	background-color: transparent;	border-bottom: 1px solid #D0D0D0;	font-size: 19px;	font-weight: normal;	margin: 0 0 14px 0;	padding: 14px 15px 10px 15px;}code {	font-family: Consolas, Monaco, Courier New, Courier, monospace;	font-size: 12px;	background-color: #f9f9f9;	border: 1px solid #D0D0D0;	color: #002166;	display: block;	margin: 14px 0 14px 0;	padding: 12px 10px 12px 10px;}#container {	margin: 10px;	border: 1px solid #D0D0D0;	-webkit-box-shadow: 0 0 8px #D0D0D0;}p {	margin: 12px 15px 12px 15px;}</style></head><body><div id="container"><h1><?php echo $e['message']; ?></h1><p><?php echo $e['file']; ?> [<?php echo $e['line']; ?>]</p></div></body></html>
<?php
 exit; } function swap_error_temp($OSWAP_c8af752ff2384e9e0f6dbe4bce4dea33,$OSWAP_0ccc3e14ef41636d4776a93725351e09,$OSWAP_4bc309caf8c2e5f271253a12e5db051c='',$OSWAP_cfdb7f082fc93860ba0f92fea02733f9='') { ?>
<!DOCTYPE html><html lang="zh-CN"><head><title><?php $OSWAP_c8af752ff2384e9e0f6dbe4bce4dea33 ?></title><style type="text/css">::selection{ background-color: #E13300; color: white; }::moz-selection{ background-color: #E13300; color: white; }::webkit-selection{ background-color: #E13300; color: white; }body {	background-color: #fff;	margin: 40px;	font: 13px/20px normal Helvetica, Arial, sans-serif;	color: #4F5155;}a {	color: #003399;	background-color: transparent;	font-weight: normal;}h1 {	color: #444;	background-color: transparent;	border-bottom: 1px solid #D0D0D0;	font-size: 19px;	font-weight: normal;	margin: 0 0 14px 0;	padding: 14px 15px 10px 15px;}code {	font-family: Consolas, Monaco, Courier New, Courier, monospace;	font-size: 12px;	background-color: #f9f9f9;	border: 1px solid #D0D0D0;	color: #002166;	display: block;	margin: 14px 0 14px 0;	padding: 12px 10px 12px 10px;}#container {	margin: 10px;	border: 1px solid #D0D0D0;	-webkit-box-shadow: 0 0 8px #D0D0D0;}p {	margin: 12px 15px 12px 15px;}</style></head><body><div id="container"><h1><?php echo $OSWAP_0ccc3e14ef41636d4776a93725351e09; ?></h1><p><?php echo $OSWAP_4bc309caf8c2e5f271253a12e5db051c; ?> [<?php echo $OSWAP_cfdb7f082fc93860ba0f92fea02733f9; ?>]</p></div></body></html>
<?php
} 