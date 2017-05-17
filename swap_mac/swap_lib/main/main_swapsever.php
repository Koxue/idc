<?php 
ob_start('swap_sever_ob');
function swap_sever_ob($content) {
	if (function_exists('do_swap_plug')) do_swap_plug('全局页面内容', $content);
	$content = compress_html($content);
	if (!isset($GLOBALS['swap_mac']['close_gzip'])) $GLOBALS['swap_mac']['close_gzip'] = false;
	if (!headers_sent() && !$GLOBALS['swap_mac']['close_gzip'] && extension_loaded("zlib") && strstr($_SERVER["HTTP_ACCEPT_ENCODING"], "gzip")) {
		$content = gzencode($content, 9);
		header("Content-Encoding: gzip");
		header("Vary: Accept-Encoding");
		header("Content-Length: " . strlen($content));
	}
	return $content;
}
