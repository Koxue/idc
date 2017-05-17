<?php
//die("testttt");
function xh_filexs_ConfigOptions() {
	
	return array(
	    "下载地址"=> array("Type" => "text", "Description" => ""), //1
	    "提取密码"=> array("Type" => "text", "Description" => ""),//2
	    "解压密码"=> array("Type" => "text", "Description" => ""), //3
	    "备注信息"=> array("Type" => "text", "Description" => "")//4
	    );
}
function xh_filexs_CreateAccount($params) {//未知
    return '成功';
}

function xh_filexs_TerminateAccount($params) {//删除
    return '成功';

}


function xh_filexs_ClientAreaLIB($goods,&$server) {
    $urll=$goods['配置选项1'];
    $tqmm=$goods['配置选项2'];
    $pass=$goods['配置选项3'];
    
    if(!empty($pass) || !empty($tqmm) ){
        $aaaahtml= <<<HTML
<script src="http://cdn.css.net/libs/clipboard.js/1.5.9/clipboard.min.js"></script>
<script>
var clipboard = new Clipboard('#copy');
clipboard.on('success', function(e) {
	var msg = e.trigger.getAttribute('aria-label');
	alert(msg);
    console.info('Action:', e.action);
    console.info('Text:', e.text);
    console.info('Trigger:', e.trigger);
    e.clearSelection();
});
</script>
HTML;
    }
    if(!empty($pass)){
        $pass=<<<HTML
	       <input id="pass" type="text" value="{$pass}"><a href="javascript:void(0);" id="copy" data-clipboard-target="#pass" aria-label="复制成功！">复制密码</a>

HTML;
    }
    if(!empty($tqmm)){
        $tqmm=<<<HTML
	        <input id="tqmm" type="text" value="{$tqmm}"><a href="javascript:void(0);" id="copy" data-clipboard-target="#tqmm" aria-label="复制成功！">复制提取码</a>
HTML;
    }
	    
   if(!empty($urll)){
        $options[]=array('名称'=>'下载地址','值'=>"[<a href=\"{$urll}\" target=\"_blank\">点击下载</a>] {$urll}");
   }
	    
   if(!empty($tqmm)){
        $options[]=array('名称'=>'提取密码','值'=>$tqmm);
    }
	    
    if(!empty($pass)){
        $options[]=array('名称'=>'解压密码','值'=>$pass);
    }
	    
    if(!empty($goods['配置选项4'])){
        $options[]=array('名称'=>'备注信息','值'=>$goods['配置选项4']);
    }
    $options[]=array('名称'=>' ','值'=>$aaaahtml);
	TEMPLATE::assign('options',$options);


}
add_swap_plug('产品控制面板详情','xh_filexs_ClientAreaLIB');

?>