<?php



$lang['加密方式']='加密方式';//注释本行不显示此项
$lang['连接端口']='连接端口';//注释本行不显示此项
$lang['连接密码']='连接密码';//注释本行不显示此项
$lang['二维码']='二维码';//注释本行不显示此项




$lang['节点信息']="[a]  加密方式:[b][<a  href=\"javascript:showewm[c]();\">显示二维码</a>]";  
$lang['链接密码后面的']="<input  id=\"passval\"  type=\"text\"  value=\"[password]\"><a  href=\"javascript:changepasss();\"  id=\"xgmmlj\">修改密码</a>";  
$lang['导入生成二维码js']='<script  src="https://cdn.css.net/libs/jquery.qrcode/1.0/jquery.qrcode.min.js"  type="text/JavaScript"></script>';  
$lang['修改密码js']="<script>  function  changepasss(){  $('#xgmmlj').html('正在修改密码...');$.post('/index.php/control/detail/[服务id]/',{changepass:$('#passval').val(),changepassok:'yes'},function(data){alert(data);$('#xgmmlj').html(data);},'text');  }</script>";  
?>