<?php

$lang=TEMPLATE::lang();

if($tsz['首页显示产品']!="")
SMACSQL()->select('产品', '*', "id in({$tsz['首页显示产品']}) ");
$buysz=array();
while ($hehe = SMACSQL()->fetch_assoc()) {
	if (strstr($hehe['周期'], '[')) {
            $hehe['周期'] = json_decode($hehe['周期'], true);
            $sss = array();
            foreach ($hehe['周期'] as $nam => $val) {
                if ($val['启用'])  $sss[$nam] = $val;
            }
            $hehe['周期'] = $sss;
            $e = false;
    }
	$buysz[]=$hehe;
}
TEMPLATE::functions('setbuycp',$lang['首页显示主机产品分类id']);
TEMPLATE::assign('buysz', $buysz);




