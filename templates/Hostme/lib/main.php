<?php
if (!function_exists('plug_eva_temp')) {
   function plug_eva_temp($name,$nr){
		$return=plug_eva('template_Hostme',$name);
		if($return==""){plug_eva('template_Hostme',$name,$nr);$return=plug_eva('template_Hostme',$name);}
		return $return;
	}
}
$tsz['是否启用顶端提示']=plug_eva_temp("是否启用顶端提示",'是');
$tsz['视频介绍HTML']=plug_eva_temp("视频介绍HTML",'
            <div class="section_row clearfix"  style="padding:60px 0px 60px 0px;">
				<div class="section_bg" ></div>
					<div class="section_inner">
						<h2 class="fancy-title textleft"  style="line-height:normal;">云主机优势？</h2>
						<div class="demo_space"></div>
							<div class="one_half">
								<div  data-id="bounceIn" class="custom-animation iva_anim">
								<ul class="list-star2  black">
									<li><strong>操作简单</strong> 功能强大的控制面板， 一学就会，非专业技术人员一样能玩转云服务器</li>
									<li><strong>按需购买</strong> 不必一次性大规模投入，处理器、内存、硬盘、带宽用多少买多少</li>
									<li><strong>方便管理</strong> 轻点鼠标即可购买、管理、使用您的云服务器</li>
									<li><strong>升级便捷</strong> 升级像购买时一样简单，在线鼠标点一点，拽一拽，处理器、内存、硬盘、带宽瞬加翻倍</li>
									<li><strong>多重防护措施</strong> 不怕DDos攻击，一大波攻击被阿里云用防火墙、云盾、安全组隔离瞬间秒杀掉</li>
									<li><strong>BGP多线机房</strong> 不论来自北边的漠河还是南边的腾冲，有云服务器BGP多线独享带宽帮你搭桥牵线，速度嗷嗷的</li>
									<li><strong>数据安全</strong> 无数副本支持，单个损坏可短时间内自动修复，磁盘快照一键穿越时光回到过去</li>
								</ul>
								</div>
							</div>
							<div class="one_half last">
								<div  data-id="bounceIn" class="custom-animation iva_anim">
									<div class="video-stage">
										<iframe src="http://v.qq.com/iframe/player.html?vid=j0144g072hc&tiny=0&auto=0" width="560" height="315" ></iframe>
									</div>
								</div>
							</div>
							<div class="clear"></div>
					</div>
			</div>');
$tsz['产品介绍HTML']=plug_eva_temp("产品介绍HTML",'
<div class="section_row clearfix"  style="padding:60px 0px 60px 0px;">
				<div class="section_bg"  style="background-color:#f6f6f6;"></div>
					<div class="section_inner">
						<div class="one_third">
							<div  data-id="bounceIn" class="atp-services iva_anim">
								<div class="services-heading">
									<i class="fa fa-hdd-o services-icon"  style=" background-color:#2c3e50; color:#ffffff;"></i>
									<h3>服务器租用</h3>
								</div>
								<div class="services-content">服务器环境总量控制<strong><span style="color:#7E51A0;">专为开发者设计！</span></strong>.并采用安全的SSH连接.</div>
							</div>
						</div><!-- one_third -->
						
						<div class="one_third">
							<div  data-id="bounceIn" class="atp-services iva_anim">
								<div class="services-heading">
									<i class="fa fa-download services-icon"  style=" background-color:#2c3e50; color:#ffffff;"></i>
									<h3>分销主机</h3>
								</div>
								<div class="services-content">经销商托管计划为您提供所有需要的虚拟主机和支持。<strong><span style="color:#7E51A0;">廉价易上手！</span></strong>.</div>
							</div>
						</div><!-- one_third -->
						
						<div class="one_third last">
							<div  data-id="bounceIn" class="atp-services iva_anim">
								<div class="services-heading">
									<i class="fa fa-tasks services-icon"  style=" background-color:#2c3e50; color:#ffffff;"></i>
									<h3>云服务器</h3>
								</div>
								<div class="services-content">云服务器，你可以在我们的云计算基础设施购买计算能力的最小单位。<strong><span style="color:#7E51A0;">云服务器是虚拟机</span></strong>运行Linux或Windows操作系统。</div>
							</div>
						</div>
						<div class="clear"></div>
					</div>
			</div>
');			
$tsz['优势介绍HTML']=plug_eva_temp("优势介绍HTML",'
<div class="section_row clearfix"  style="padding:60px 0px 60px 0px;">
				<div class="section_bg"  style="background-color:#ECECEC;"></div>
					<div class="section_inner">
						<div  data-id="fadeInUp" class="custom-animation iva_anim">
							<h1 class="center">我们的优势</h1>
							<p class="center" style="font-size:14px;margin-top:-15px;">百万主机用户的支持与信赖</p>
						</div>
						<div class="demo_space"></div>
						<div  data-id="bounceIn" class="custom-animation iva_anim">
							<div class="one_fourth">
								<div  data-id="bounceIn" class="iva_anim facnyicon_circle large center" style="background-color:#34495e; border-color:#34495e;">
									<i style="color:#ffffff;" class="fa fa-cog"></i>
								</div>
								<h4 class="center" style="font-weight:bold;">稳定性</h4>
								<p>重金打造的多个云计算安全数据中心，海内外多个顶级机房，遍布：北京、上海、广州、杭州、香港、美国等，满足不同用户需求； 机房全部采用高端品牌设备，保证服务稳定可靠；多节点应急灾备系统，网站数据异机双重备份，确保数据安全。<br /></p>
							</div><!-- one_fourth -->
							
							<div class="one_fourth">
								<div  data-id="bounceIn" class="iva_anim facnyicon_circle large center" style="background-color:#34495e; border-color:#34495e;">
									<i style="color:#ffffff;" class="fa fa-desktop"></i>
								</div>
								<h4 class="center" style="font-weight:bold;">安全性</h4>
								<p>提供最全面、种类丰富的云虚拟主机，满足用户多样化需求，主机功能强大：自主删除域名，在线解压缩、防木马、IP限制访问等。主机所用服务器均为DELL或IBM高端品牌服务器，绝非普通低配服务器，在硬件的运行稳定性上有极高保障。<br /></p>
							</div><!-- one_fourth -->
							
							<div class="one_fourth">
								<div  data-id="bounceIn" class="iva_anim facnyicon_circle large center" style="background-color:#34495e; border-color:#34495e;">
									<i style="color:#ffffff;" class="fa fa-tasks"></i>
								</div>
								<h4 class="center" style="font-weight:bold;">快速备案</h4>
								<p>免费提供自助备案管理系统，全国各地多家备案核验点，专业备案团队支持，轻松方便实现备案通过。<br />	</p>
							</div><!-- one_fourth -->
							
							<div class="one_fourth last">
								<div  data-id="bounceIn" class="iva_anim facnyicon_circle large center" style="background-color:#34495e; border-color:#34495e;">
									<i style="color:#ffffff;" class="fa fa-thumbs-up"></i>
								</div>
								<h4 class="center" style="font-weight:bold;">售后优势</h4>
								<p>提供7×24小时，全年365天不间断服务；用户购买虚拟主机产品，30天内无条件享受全额退款；
您可拨打热线电话寻求快速帮助支持，也可登录工单系统，详细描述问题， 我们保证在60分钟之内作出快速响应。<br /></p>
							</div><!-- one_fourth last -->
							<div class="clear"></div>
						</div>
					</div><!-- section_inner -->
			</div>
');			
$tsz['页脚服务HTML']=plug_eva_temp("页脚服务HTML",'
<li><a href="#">网络服务</a></li>			
<li><a href="#">SSL证书</a></li>
<li><a href="#">安全服务</a></li>
<li><a href="#">独立服务器</a></li>
<li><a href="#">VPS服务器</a></li>
<li><a href="#">电子商务</a></li>
<li><a href="#">商城服务</a></li>
<li><a href="#">网站设计</a></li>
');			
$tsz['顶端提示内容']=plug_eva_temp("顶端提示内容",'欢迎来到XXXIDC，希望您喜欢我们的产品！');				
$tsz['邮箱']=plug_eva_temp("邮箱",'admin@admin.com');				
$tsz['电话']=plug_eva_temp("电话",'+8613800353500');				
$tsz['QQ']=plug_eva_temp("QQ",'10000');		
$tsz['页脚网站域名']=plug_eva_temp("页脚网站域名",'http://www.swapidc.com');			
$tsz['联系地址1']=plug_eva_temp("联系地址1",'中国');				
$tsz['联系地址2']=plug_eva_temp("联系地址2",'山西');				
$tsz['联系地址3']=plug_eva_temp("联系地址3",'太原');				
$tsz['联系地址4']=plug_eva_temp("联系地址4",'XX路XX号');				
$tsz['网站简介']=plug_eva_temp("网站简介",'专业提供高速、稳定的主机方案，提供国内空间,BGP多线路空间、香港空间,香港主机,香港独立IP空间,美国空间,仿牌空间,抗投诉空间,虚拟主机,cPanel空间');				
$tsz['中部简介主']=plug_eva_temp("中部简介主",'产品质量，速度，服务更高端');				
$tsz['中部简介副']=plug_eva_temp("中部简介副",'还在为种种问题到处询问而烦恼么？让XXX帮您一站式轻松解决它，快来体验吧！');				
$tsz['首页幻灯片地址1']=str_replace('/templates/Hostme',TEMPLATE::assign('templatedir'),plug_eva_temp("首页幻灯片地址1",'/templates/Hostme/img/business-hosting.jpg'));				
$tsz['首页幻灯片地址2']=str_replace('/templates/Hostme',TEMPLATE::assign('templatedir'),plug_eva_temp("首页幻灯片地址2",'/templates/Hostme/img/vps-hosting.jpg'));				
$tsz['首页幻灯片地址3']=str_replace('/templates/Hostme',TEMPLATE::assign('templatedir'),plug_eva_temp("首页幻灯片地址3",'/templates/Hostme/img/shared-hosting.jpg'));	
$tsz['小logo地址']=str_replace('/templates/Hostme',TEMPLATE::assign('templatedir'),plug_eva_temp("小logo地址",'/templates/Hostme/img/small-logo.png'));
$tsz['页脚照片展示HTML']=str_replace('/templates/Hostme',TEMPLATE::assign('templatedir'),plug_eva_temp("页脚照片展示HTML",'
<div id="flickr_badge_image1" class="flickr_badge_image">
<a href="#"><img width="75" height="75" title="" alt="A photo on Flickr" src="/templates/Hostme/img/flickr-img1.jpg"></a>
</div>
<div id="flickr_badge_image2" class="flickr_badge_image">
<a href="#"><img width="75" height="75" title="" alt="A photo on Flickr" src="/templates/Hostme/img/flickr-img2.jpg"></a>
</div>
<div id="flickr_badge_image3" class="flickr_badge_image">
<a href="#"><img width="75" height="75" title="" alt="A photo on Flickr" src="/templates/Hostme/img/flickr-img3.jpg"></a>
</div>
<div id="flickr_badge_image4" class="flickr_badge_image">
<a href="#"><img width="75" height="75" title="" alt="A photo on Flickr" src="/templates/Hostme/img/flickr-img4.jpg"></a>
</div>
<div id="flickr_badge_image5" class="flickr_badge_image">
<a href="#"><img width="75" height="75" title="" alt="A photo on Flickr" src="/templates/Hostme/img/flickr-img5.jpg"></a>
</div>
<div id="flickr_badge_image6" class="flickr_badge_image">
<a href="#"><img width="75" height="75" title="" alt="A photo on Flickr" src="/templates/Hostme/img/flickr-img6.jpg"></a>
</div>'));						
TEMPLATE::assign('tempsz',$tsz);
$uid=session('uid');
SMACSQL()->select('服务单表', 'count(*)', "(状态='开放' OR 状态='客服回答') AND uid='{$uid}'");
$OpenTickets = SMACSQL()->fetch_assoc();
$OpenTicket=$OpenTickets['count(*)'];
TEMPLATE::assign('OpenTicket',$OpenTicket);
SMACSQL()->select('服务单表', 'count(*)',"uid='{$uid}'");
$SumTickets = SMACSQL()->fetch_assoc();
$SumTicket=$SumTickets['count(*)'];
$PerTicket=$OpenTicket/$SumTicket*100;
TEMPLATE::assign('PerTicket',$PerTicket);
SMACSQL()->select('服务', 'count(*)', "(状态='激活' OR 状态='暂停') AND 帐号id='{$uid}'");
$ActiveServices = SMACSQL()->fetch_assoc();
$ActiveService=$ActiveServices['count(*)'];
TEMPLATE::assign('ActiveService',$ActiveService);
SMACSQL()->select('服务', 'count(*)', "帐号id='{$uid}'");
$SumServices = SMACSQL()->fetch_assoc();
$SumService=$SumServices['count(*)'];
TEMPLATE::assign('SumService',$SumService);
$PerService=$ActiveService/$SumService*100;
TEMPLATE::assign('PerService',$PerService);
SMACSQL()->select('服务', 'count(DATEDIFF(到期时间,开通时间))', "帐号id='{$uid}' AND DATEDIFF(到期时间,开通时间)<15");
$Dates = SMACSQL()->fetch_assoc();
$Date=$Dates['count(DATEDIFF(到期时间,开通时间))'];
TEMPLATE::assign('Date',$Date);
$s=TEMPLATE::assign('s');
$email = $s['登陆邮箱'];
$grav_sm = "http://gravatar.duoshuo.com/avatar/" . md5( strtolower( trim( $email ) ) ) . "?d=" . urlencode( $default ) . "&s=" . 25;
$grav_md = "http://gravatar.duoshuo.com/avatar/" . md5( strtolower( trim( $email ) ) ) . "?d=" . urlencode( $default ) . "&s=" . 40;
$grav_50 = "http://gravatar.duoshuo.com/avatar/" . md5( strtolower( trim( $email ) ) ) . "?d=" . urlencode( $default ) . "&s=" . 50;
$grav_lg = "http://gravatar.duoshuo.com/avatar/" . md5( strtolower( trim( $email ) ) ) . "?d=" . urlencode( $default ) . "&s=" . 138;
TEMPLATE::assign('grav_sm',$grav_sm);
TEMPLATE::assign('grav_md',$grav_md);
TEMPLATE::assign('grav_lg',$grav_lg);
TEMPLATE::assign('grav_50',$grav_50);

