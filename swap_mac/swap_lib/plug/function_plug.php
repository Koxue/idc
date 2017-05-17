<?php 
defined('SWAP_ROOT') or die('非法操作');
function add_swap_plug($hookname, $hookval) {
	if (!isset($GLOBALS['swap_mac']['Hooks'][$hookname])) {
		$GLOBALS['swap_mac']['Hooks'][$hookname] = array();
	}
	if (!@in_array($hookval, $GLOBALS['swap_mac']['Hooks'][$hookname])) {
		$GLOBALS['swap_mac']['Hooks'][$hookname][] = $hookval;
	}
	return true;
}
function do_swap_plug($hookname, &$OSWAP_92b1ddd72136d8a66a54a8b5986a0e7e = NULL, &$OSWAP_53b72a45c4cd0bb0987e428bb6d0dd1e = NULL, &$OSWAP_06e7fe96fa8fa532cb8eee0dad03982c = NULL, &$OSWAP_ac9b9a4cbb2ae98bb8bcfb496ef8544f = NULL, &$OSWAP_b4f594e414d3f2262627877a840aa6c8 = NULL, &$OSWAP_0a090727e82a2660d67038a245f40a50 = NULL, &$OSWAP_822efbf0f6aec5bf8a2a9634dd5c338b = NULL, &$OSWAP_e65962e3273c7d915eeab947f4d18489 = NULL, &$OSWAP_a8f9e658a9287acc05f3f606294f1204 = NULL, &$OSWAP_a30ec17eaddf697c6de2770815d9454e = NULL, &$OSWAP_0af01ed16e70514766acff50308ef2bc = NULL, &$OSWAP_d9a2f34c1c90fe800f3a6a43cb4d1e41 = NULL, &$OSWAP_cdf310f6c2f95bb98e347b7d7e31edbe = NULL, &$OSWAP_34895c81ed428db73f42d64c62b3ecc8 = NULL, &$OSWAP_cb58b20919271e9eabc8f83ccc2946bc = NULL, &$OSWAP_2de05a034cec524b83d5bbe0100eafca = NULL, &$OSWAP_ad8d6d772430a517c8b4a9db53de6f5c = NULL, &$OSWAP_0545c94764d96094dc19abfaf4938ca7 = NULL, &$OSWAP_c82f3165c2afcc391b5ee05d0ad8155a = NULL, &$OSWAP_3e3b170f3c4cfdcc43888bb8fb472273 = NULL) {
	$OSWAP_9c3bdf5d84fb5ed35295df157475002b = false;
	if (isset($GLOBALS['swap_mac']['Hooks'][$hookname])) {
		foreach ($GLOBALS['swap_mac']['Hooks'][$hookname] as $OSWAP_d21943bcf4786ba73e3d075b67725560) {
			$OSWAP_0846f1c64acf193e111c4079cab1af08 = call_user_func_array($OSWAP_d21943bcf4786ba73e3d075b67725560, array(&$OSWAP_92b1ddd72136d8a66a54a8b5986a0e7e, &$OSWAP_53b72a45c4cd0bb0987e428bb6d0dd1e, &$OSWAP_06e7fe96fa8fa532cb8eee0dad03982c, &$OSWAP_ac9b9a4cbb2ae98bb8bcfb496ef8544f, &$OSWAP_b4f594e414d3f2262627877a840aa6c8, &$OSWAP_0a090727e82a2660d67038a245f40a50, &$OSWAP_822efbf0f6aec5bf8a2a9634dd5c338b, &$OSWAP_e65962e3273c7d915eeab947f4d18489, &$OSWAP_a8f9e658a9287acc05f3f606294f1204, &$OSWAP_a30ec17eaddf697c6de2770815d9454e, &$OSWAP_0af01ed16e70514766acff50308ef2bc, &$OSWAP_d9a2f34c1c90fe800f3a6a43cb4d1e41, &$OSWAP_cdf310f6c2f95bb98e347b7d7e31edbe, &$OSWAP_34895c81ed428db73f42d64c62b3ecc8, &$OSWAP_cb58b20919271e9eabc8f83ccc2946bc, &$OSWAP_2de05a034cec524b83d5bbe0100eafca, &$OSWAP_ad8d6d772430a517c8b4a9db53de6f5c, &$OSWAP_0545c94764d96094dc19abfaf4938ca7, &$OSWAP_c82f3165c2afcc391b5ee05d0ad8155a, &$OSWAP_3e3b170f3c4cfdcc43888bb8fb472273));
			if ($OSWAP_0846f1c64acf193e111c4079cab1af08) $OSWAP_9c3bdf5d84fb5ed35295df157475002b = true;
		}
	}
	return $OSWAP_9c3bdf5d84fb5ed35295df157475002b;
}
function load_plugins_file($plugname) {
	if (is_string($plugname) && preg_match("/^[\w\-\/]+$/", $plugname) && file_exists(SWAP_PLUGINS . $plugname . SWAP_DIR_END . $plugname . '.php')) {
		requirer(SWAP_PLUGINS . $plugname . SWAP_DIR_END . $plugname . '.php');
	}
}
function plug_eva($pluginname, $name = '', $method = '') {
	if ($name === '') {
		return $GLOBALS['swap_mac']['plug_config'][$pluginname];
	}
	if ($method === '') {
		return isset($GLOBALS['swap_mac']['plug_config'][$pluginname][$name]) ? $GLOBALS['swap_mac']['plug_config'][$pluginname][$name] : '';
	} else if (is_null($method)) {
		$GLOBALS['swap_mac']['plug_config'][$pluginname][$name] = NULL;
		D()->delete('插件配置', "插件名称='" . $pluginname . "' and 名='" . $name . "'");
		return true;
	} else {
		D()->select('插件配置', '*', "插件名称='" . $pluginname . "' and 名='" . $name . "'");
		$temp = D()->db_num_rows();
		if ($temp == 0) {
			D()->insert('插件配置', "插件名称,名,值", "'" . $pluginname . "','" . $name . "','" . $method . "'");
		} else {
			D()->update('插件配置', "值='" . $method . "'", "插件名称='" . $pluginname . "' and 名='" . $name . "'");
		}
		$GLOBALS['swap_mac']['plug_config'][$pluginname][$name] = $method;
		return true;
	}
}
function do_temp_plug($pluginname, &$OSWAP_92b1ddd72136d8a66a54a8b5986a0e7e = NULL, &$OSWAP_53b72a45c4cd0bb0987e428bb6d0dd1e = NULL, &$OSWAP_06e7fe96fa8fa532cb8eee0dad03982c = NULL, &$OSWAP_ac9b9a4cbb2ae98bb8bcfb496ef8544f = NULL, &$OSWAP_b4f594e414d3f2262627877a840aa6c8 = NULL, &$OSWAP_0a090727e82a2660d67038a245f40a50 = NULL, &$OSWAP_822efbf0f6aec5bf8a2a9634dd5c338b = NULL, &$OSWAP_e65962e3273c7d915eeab947f4d18489 = NULL, &$OSWAP_a8f9e658a9287acc05f3f606294f1204 = NULL, &$OSWAP_a30ec17eaddf697c6de2770815d9454e = NULL, &$OSWAP_0af01ed16e70514766acff50308ef2bc = NULL, &$OSWAP_d9a2f34c1c90fe800f3a6a43cb4d1e41 = NULL, &$OSWAP_cdf310f6c2f95bb98e347b7d7e31edbe = NULL, &$OSWAP_34895c81ed428db73f42d64c62b3ecc8 = NULL, &$OSWAP_cb58b20919271e9eabc8f83ccc2946bc = NULL, &$OSWAP_2de05a034cec524b83d5bbe0100eafca = NULL, &$OSWAP_ad8d6d772430a517c8b4a9db53de6f5c = NULL, &$OSWAP_0545c94764d96094dc19abfaf4938ca7 = NULL, &$OSWAP_c82f3165c2afcc391b5ee05d0ad8155a = NULL, &$OSWAP_3e3b170f3c4cfdcc43888bb8fb472273 = NULL) {
	ob_start();
	call_user_func_array('do_swap_plug', array($pluginname, &$OSWAP_92b1ddd72136d8a66a54a8b5986a0e7e, &$OSWAP_53b72a45c4cd0bb0987e428bb6d0dd1e, &$OSWAP_06e7fe96fa8fa532cb8eee0dad03982c, &$OSWAP_ac9b9a4cbb2ae98bb8bcfb496ef8544f, &$OSWAP_b4f594e414d3f2262627877a840aa6c8, &$OSWAP_0a090727e82a2660d67038a245f40a50, &$OSWAP_822efbf0f6aec5bf8a2a9634dd5c338b, &$OSWAP_e65962e3273c7d915eeab947f4d18489, &$OSWAP_a8f9e658a9287acc05f3f606294f1204, &$OSWAP_a30ec17eaddf697c6de2770815d9454e, &$OSWAP_0af01ed16e70514766acff50308ef2bc, &$OSWAP_d9a2f34c1c90fe800f3a6a43cb4d1e41, &$OSWAP_cdf310f6c2f95bb98e347b7d7e31edbe, &$OSWAP_34895c81ed428db73f42d64c62b3ecc8, &$OSWAP_cb58b20919271e9eabc8f83ccc2946bc, &$OSWAP_2de05a034cec524b83d5bbe0100eafca, &$OSWAP_ad8d6d772430a517c8b4a9db53de6f5c, &$OSWAP_0545c94764d96094dc19abfaf4938ca7, &$OSWAP_c82f3165c2afcc391b5ee05d0ad8155a, &$OSWAP_3e3b170f3c4cfdcc43888bb8fb472273));
	$content = ob_get_contents();
	ob_end_clean();
	$OSWAP_5fa8531def346069294b732ac1fc9901[$pluginname].= $content;
	$temp = isset($GLOBALS['swap_mac']['plug_temp']) ? $GLOBALS['swap_mac']['plug_temp'] : array();
	$GLOBALS['swap_mac']['plug_temp'] = array_merge($temp, $OSWAP_5fa8531def346069294b732ac1fc9901);
	$GLOBALS['swap_mac']['template']->assign("plug", $GLOBALS['swap_mac']['plug_temp'], true);
	return true;
}
function plug_lang_get($pluginname, $langname = '', $mode = '1') {
	if ($mode == '1') {
		if (file_exists(SWAP_PLUGINS . $pluginname . '/lang/' . $GLOBALS['swap_mac']['config']['language'] . '/lang_' . $langname . '.php')) {
			require (SWAP_PLUGINS . $pluginname . '/lang/' . $GLOBALS['swap_mac']['config']['language'] . '/lang_' . $langname . '.php');
		} else {
			if (file_exists(SWAP_PLUGINS . $pluginname . '/lang/Chinese/lang_' . $langname . '.php')) require (SWAP_PLUGINS . $pluginname . '/lang/Chinese/lang_' . $langname . '.php');
			else swap_main_error_module($pluginname, "语言包不存在,找不到默认中文");
		}
	} else if ($mode == '2') {
		if (file_exists(SWAP_LIB . "servers/" . $pluginname . "/lang/" . $GLOBALS['swap_mac']['config']['language'] . '.php')) {
			require (SWAP_LIB . "servers/" . $pluginname . "/lang/" . $GLOBALS['swap_mac']['config']['language'] . '.php');
		} else {
			if (file_exists(SWAP_LIB . "servers/" . $pluginname . "/lang/Chinese.php")) require (SWAP_LIB . "servers/" . $pluginname . "/lang/Chinese.php");
			else swap_main_error_module($pluginname, "语言包不存在,找不到默认中文");
		}
	}
	return $lang;
}
function requirer($para1, $name = NULL) {
	static $array1 = array();
	if (!file_exists($para1)) {
		if (file_exists(SWAP_LIB . "servers/" . $name . "/" . $para1)) {
			$para1 = SWAP_LIB . "servers/" . $name . "/" . $para1;
		} else {
			if (file_exists(SWAP_PLUGINS . $name . SWAP_DIR_END . $para1)) {
				$para1 = SWAP_PLUGINS . $name . SWAP_DIR_END . $para1;
			} else {
				swap_main_error_module("加载文件失败", $para1);
			}
		}
	}
	if (!isset($array1[$para1])) {
		$array1[$para1] = false;
		require($para1);
		$array1[$para1] = true;
		return $array1[$para1];
	}
}
