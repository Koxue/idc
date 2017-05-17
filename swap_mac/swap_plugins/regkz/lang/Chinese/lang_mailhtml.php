<?php
$website=$_SERVER['SERVER_NAME'];
$lang['内容'] = <<<HTML
<html><head><meta http-equiv="content-type" content="text/html; charset=utf-8"><title>Email 地址验证</title><style type="text/css"> body {border-width:0;margin:0} img {border:0;margin:0;padding:0} </style><base target="_blank" /></head><body>
Email 地址验证<br>
<br>
<p>{{用户名}}，<br>
这封信是由 {{网站名称}} 发送的。</p>

<p>您收到这封邮件，是由于在 {{网站名称}} 进行了新用户注册，或用户修改 Email 使用
了这个邮箱地址。如果您并没有访问过  {{网站名称}} ，或没有进行上述操作，请忽
略这封邮件。您不需要退订或进行其他进一步的操作。</p>
<br>
----------------------------------------------------------------------<br>
<strong>帐号激活说明</strong><br>
----------------------------------------------------------------------<br>
<br>
<p>如果您是 {{网站名称}} 的新用户，或在修改您的注册 Email 时使用了本地址，我们需
要对您的地址有效性进行验证以避免垃圾邮件或地址被滥用。</p>

<p>您只需点击下面的链接即可激活您的帐号：<br>

<a href="http://{$website}/index.php/plugin/regkz/?id={{用户id}}&sig={{code}}" target="_blank">http://{$website}/index.php/plugin/regkz/?id={{用户id}}&sig={{code}}</a>
<br>
(如果上面不是链接形式，请将该地址手工粘贴到浏览器地址栏再访问)</p>
<p>感谢您的访问，祝您使用愉快！</p>
<p>
此致<br>

{{网站名称}} 管理团队.<br>
http://{$website}/</p></body></html>

HTML;
$lang['标题']='尊敬的[{{用户名}}]您好,需要进行邮箱验证之后才可登录';
$lang['发信人']='';
