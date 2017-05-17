<?php
//echo '['.TEMPLATE::assign("templatedir").']';exit;
if (!function_exists('plug_eva_temp')) {
   function plug_eva_temp($name,$nr){
		$return=plug_eva('template_servereast',$name);
		if($return==""){$nr=str_replace('{templatedir}',TEMPLATE::assign('templatedir'),$nr);plug_eva('template_servereast',$name,$nr);$return=plug_eva('template_servereast',$name);}
		$return=str_replace('/templates/servereast',TEMPLATE::assign('templatedir'),$return);
		return $return;
	} 
}

SMACSQL()->select('产品分类', '*', "隐藏<>1 ORDER BY 顺序 DESC");
$userarray=array();
$i=0;
while ($hehe = SMACSQL()->fetch_assoc()) {$hehe['选中']="";if(mac_url_get(1)==$hehe['id'] || ($i==0 && mac_url_get(1)=="")){$i++;$hehe['选中']="1";}$userarray[]=$hehe;}
$i=0;

if(file_exists(SWAP_TEMPLATES_ROOT.'/lib/setting_config.php')==false){die('缺少模板配置文件');}
require(SWAP_TEMPLATES_ROOT.'/lib/setting_config.php');
foreach( $template_config as $hehe){$tsz[$hehe['name']]=plug_eva_temp($hehe['name'],$hehe['default']);}
TEMPLATE::assign('tempsz',$tsz);
TEMPLATE::assign('farray',$userarray);
TEMPLATE::assign('navxz', "");
do_temp_plug('导航用户中心下拉列表',$navuserxlarray);
TEMPLATE::assign('usernavlist', $navuserxlarray);
