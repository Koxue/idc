<?php
function SendMail($address, $title, $message, $fromname = ''){
    $post['发送方式']=plug_eva('系统配置','发送方式');
	$post['SMTP服务器端口']=plug_eva('系统配置','SMTP服务器端口');
	$post['邮箱姓名']=plug_eva('系统配置','邮箱姓名');
	$post['加密']=plug_eva('系统配置','加密');
	$post['认证']=plug_eva('系统配置','认证');
	
	do_swap_plug('邮件日志',$post,$fromname,$address, $title, $message);
	
	$sended=false;
	do_swap_plug('邮件接口',$post,$fromname,$address, $title, $message,$sended);
	
	if($sended)
		return $sended;
	import("swap.phpmailer");
	import("swap.smtp");
	$mail = new PHPMailer();
	if($post['发送方式']){
		$mail->isSMTP();
	}else{
		$mail->isMail();
	}
	$mail->CharSet = C('MAIL_CHARSET');
	$mail->AddAddress($address);
	$mail->Body = $message;
	$mail->From = C('MAIL_ADDRESS');
	$mail->FromName = $post['邮箱姓名'];
	$mail->Subject = $title;
	$mail->SMTPAutoTLS = false;
	if($post['加密']=='ssl'){
		$mail->SMTPSecure = 'ssl';
	}else if($post['加密']=='tls'){
		$mail->SMTPSecure = 'tls';
	}
	if(!$post['SMTP服务器端口'])
		$post['SMTP服务器端口']=25;
	$mail->Port = $post['SMTP服务器端口'];
	$mail->Host = C('MAIL_SMTP');
	if($post['认证'])
		$mail->SMTPAuth = true;
	else
		$mail->SMTPAuth = false;
	$mail->Username = C('MAIL_LOGINNAME');
	$mail->Password = C('MAIL_PASSWORD');
	$mail->IsHTML(C('MAIL_HTML'));
	return $mail->Send();
}
