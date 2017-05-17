<?php


$cart=TEMPLATE::assign('cart');
$cart['关闭自主域名']='no';
// var_dump(strpos($cart['描述'],".取消自主域名."));
if(strpos($cart['描述'],".取消自主域名.")!==false){
	$cart['关闭自主域名']='yes';
	$cart['描述']=str_replace('.取消自主域名.','' ,$cart['描述']);
} 
TEMPLATE::assign('cart',$cart);

