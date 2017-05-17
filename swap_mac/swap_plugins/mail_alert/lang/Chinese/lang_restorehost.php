<?php
$website=$_SERVER['SERVER_NAME'];
$lang['内容'] = <<<HTML
<html>
<body>
 
<div><br></div><div><includetail><div><br></div>
<style type="text/css">*{margin:0;padding:0;font-family:"微软雅黑", "宋体",sans-serif;}
a{text-decoration:none;}
.box{position:relative;width:780px;min-height:450px;padding:0;margin:0 auto;border:1px solid #ccc;font-size:13px;color:#333;}
.header{width:100%;height:80px;padding-top:50px;background:url("https://dn-swapimage.qbox.me/youjian-bian.jpg") repeat-x;}
.logo{float:right;padding-right:50px;}
.clear{clear:both;}
.content{width:585px;padding:0 50px;height:300px;}
.content p{text-indent:2em;line-height:40px;word-break:break-all;}
.content ul{padding-left:40px;}
.xiugai{height:50px;line-height:30px;font-size:16px;}
.xiugai a{color:#0099ff;}
.fuzhi{word-break:break-all;color:#b0b0b0;}
.table{border:1px solid #ccc;border-left:0;border-top:0;border-collapse:collapse;}
.table td{border:1px solid #ccc;border-right:0;border-bottom:0;padding:6px;min-width:160px;}
.gray{background:#f5f5f5;}
.no_indent{text-indent:0!important;height:40px;line-height:40px;}
.btnn{padding:50px 0 0 0;}
.btnn a{display:inline-block;text-decoration:none !important;color:#fff;width:130px;height:30px;line-height:30px;border-radius:4px;text-align:center;margin-right:10px;}
.need{background:#fa9d00;}
.noneed{background:#3784e0;}
.footer{width:100%;height:10px;padding-top:20px;background:url("https://dn-swapimage.qbox.me/youjian-bian.jpg") repeat-x left bottom;}
</style>


<div class="box">
	<div class="header">
    	
    </div>
    <div class="content">
    	<p class="no_indent">亲爱的{<username>}:</p>
        <p>您的主机已经恢复成功，以下是您的主机信息，为了防止您忘记，发了个邮备份下~</p>
                <table cellspacing="0" class="table">			<tbody><tr>
				<td>产品id</td>
				<td>域名:</td>
				<td>用户名</td>
                <td>密码</td>
            </tr>			 <tr class="gray">
            	<td>{<fid>}</td>
                <td>{<domain>}</td>
				<td>{<username>}</td>
                <td>{<password>}</td>
            </tr>
		</tbody></table>
		<p></p>
		<table cellspacing="0" class="table">			<tbody><tr>
				<td>面板类型</td>
				<td>产品类型</td>
				<td>服务器IP</td>
                <td>服务器主机名</td>
            </tr>			 <tr class="gray">
            	<td>{<moduletype>}</td>
                <td>{<type>}</td>
				<td>{<serverip>}</td>
                <td>{<serverhostname>}</td>
            </tr>
		</tbody></table>
        <div class="btnn">
		    <p>更多详细信息请登录面板查看，如有问题请自行提交服务单~</p>
            <a href="http://$website/index.php/index/login/" class="need">登陆面板</a>
            <a href="http://$website/index.php/ticket/submit/" class="noneed">提交服务单</a>
        </div>
    </div>
    <div class="footer clear"></div>
</div>

<br><br> </div>
 
 
</body>
</html>
HTML;
$lang['标题']='很高兴通知您,您的主机恢复成功';
$lang['发信人']='SWAPIDC管理系统';