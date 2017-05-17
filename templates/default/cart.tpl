{include file="header.tpl" title=$lang['客户中心'] hostname=$c['网站名称']}
    <div id="in-nav">
		<div class="container">
			<div class="row">
				<div class="span12">
					<ul class="pull-right">
						{if $s['是否已经登陆']=='是'}
							<li>{$lang['欢迎回来']}: {$s['登陆用户名']} / <a href="{$ROOT}/user/index/">{$lang['我的资料']}</a> / <a href="{$ROOT}/index/login/">{$lang['退出帐户']}</a></li>
						{else}
							<li><a href="{$ROOT}/index/login/">{$lang['登陆']}</a>/<a href="{$ROOT}/index/register/">{$lang['注册']}</a></li>
						{/if}
					</ul>
					<a id="logo" href="{$ROOT}/index/index/"><h4>{$c['头部LOGO']}</h4></a>
				</div>
			</div>
		</div>
	</div>
    <div id="in-sub-nav">
		<div class="container">
			<div class="row">
				<div class="span12">
					<ul>
						<li><a href="{$ROOT}/index/index/"><i class="batch home"></i><br />{$lang['客户中心']}</a></li>
						<li><a href="{$ROOT}/control/index/"><i class="batch b-database"></i><br>{$lang['控制面板']}</a></li>
						<li><a href="{$ROOT}/buy/index/" class="active"><i class="batch quill"></i><br />{$lang['订购产品']}</a></li>
						<li><a href="{$ROOT}/user/index/"><i class="batch users"></i><br />{$lang['用户中心']}</a></li>
					</ul>
				</div>
			</div>
		</div>
    </div>
    <div class="page">
		<div class="page-container">
			<div class="container">
				<div class="row">
					<div class="span9">
						<h4 class="header">{$lang['购物车']}</h4>{include file="alert.tpl"}
						<div class="stats">
							<div class="row-fluid">
								<div class="span12">
									<div class="widget">
										<table style="width:100%">
											<tr>
												<td>
													<div class="span8 stat inverse">{$cart['名称']}</div>
													<div class="span4 stat info">{$lang['剩余']} {$cart['库存']} {$lang['个']}</div>
												</td>
											</tr>
											<tr>
												<td colspan="4">
													{$cart['描述']}
												</td>
											</tr>
										</table>
									</div>
								</div>
							</div>
							<form method="post" action="submit/">
							<div class="row-fluid">
								<div class="span12">
									<table class="table table-striped table-bordered">
										<thead>
											<tr>
												<th><h3>{$lang['产品配置']}</h3></th>
											</tr>
										</thead>
										<tbody>
										{if $cart['隐藏域名配置']!='1'}
											<tr>
												<td>{$lang['您选择的产品/服务需要域名，请将域名填写在下面']}</td>
											</tr>
											<tr>
												<td>
													<label>
														<input type="radio" name="domainoption" value="domain" id="seldomain" onclick="document.getElementById('domain').style.display='';document.getElementById('freedomain').style.display='none';" />
														{$lang['我已经有一个域名,我将把已有域名解析到此空间']}
													</label>
												</td>
											</tr>
											{if $cart['显示域名选项']=='开'}
											<tr>
												<td>
													<label>
														<input type="radio" name="domainoption" value="freedomain" id="selfreedomain" onclick="document.getElementById('domain').style.display='none';document.getElementById('freedomain').style.display='';" />
														{$lang['我没有域名,我想使用提供的2级域名']}
													</label>
												</td>
											</tr>
											{/if}
											<tr>
												<td>
													<div id="freedomain" align="center">www. <input type="text" name="freedomain" size="40" value="" /> .
														<select name="freedomainhz" style="width:150px;">
															{foreach from=$freedomains item=freedomain}
																<option value="{$freedomain}">{$freedomain}</option>
															{/foreach}
														</select>
													</div>
													<div id="domain" align="center">
														www.
														<input type="text" name="domain" size="40" value="" style="width:276px;"/>
														.
														<input type="text" name="domainhz" size="7" value="" style="width:80px;"/>
													</div>
												</td>
											</tr>
										{/if}
										{foreach from=$buyoptions item=option}
										{if $option['Type']=='yesno'}
											<tr>
												<td>
													<div  align="center">
														{$option['Name']} : <input name="buyoptions[{$option['Name']}]" type="radio" value="on" />{$lang['开']} <input name="buyoptions[{$option['Name']}]" type="radio" value="0" checked />{$lang['关']}
													</div>
												</td>
											</tr>
										{elseif $option['Type']=='text'}
											<tr>
												<td>
													<div  align="center">
														{$option['Name']} : <input type="text" name="buyoptions[{$option['Name']}]" size="{$option['Size']}">
													</div>
												</td>
											</tr>
										{elseif $option['Type']=='dropdown'}
											<tr>
												<td>
													<div  align="center">
														{$option['Name']} : 
														<select name="buyoptions[{$option['Name']}]">
															{foreach from=$option['Options'] item=optsub}
																<option value="{$optsub}">{$optsub}</option>
															{/foreach}
														</select>
													</div>
												</td>
											</tr>
										{/if}
										{/foreach}
										{foreach from=$options item=option}
											<tr>
												<td>
													<div  align="center">
														{$option['名称']} : 
														<select name="config[{$option['id']}]">
															{foreach from=$option['选项'] item=optsub}
																<option value="{$optsub['id']}">{$optsub['名称']}</option>
															{/foreach}
														</select>
													</div>
												</td>
											</tr>
										{/foreach}
										</tbody>
									</table>
									{if $cart['隐藏域名配置']!='1'}
									<script>document.getElementById('freedomain').style.display='none';</script>
									<script>document.getElementById('domain').style.display='';</script>
									<script>document.getElementById('seldomain').checked='true';</script>
									{/if}
								</div>
							</div>
							<div class="row-fluid">
								<div class="span12">
									<table class="table">
										<thead>
											<tr>
												<th><h3>{$lang['付款详情']}</h3></th>
											</tr>
										</thead>
										<tbody>
											<tr>
												<td class="span6">{$lang['优惠码']}</td>
												<td class="span6">{$lang['购买时间']}</td>
											</tr>
											<tr>
												<td class="span6">
													<div class="input-append"><input type="text" name="promocode" size="20" id="promocode" /><a class="btn" id="validatepromo">{$lang['验证 >>']}</a></div>
													<script language="javascript" type="text/javascript">
														$("#validatepromo").click(function () {
															$("#validatepromo").attr('class','btn active');
															$("#validatepromo").html('{$lang['请稍后……']}');
															$.ajax({
																type:　"post",
																url:　"/index.php/buy/promo/",
																data:　"swap="+$("#promocode").val(),
																success:　function (msg){
																	if(msg==='ok'){
																		$("#validatepromo").html('{$lang['优惠码有效']}');
																		$("#validatepromo").attr('class','btn active');
																	}else{
																		$("#validatepromo").html(msg);
																		$("#validatepromo").attr('class','btn');
																	}
																},
																error:　function (mag){
																	$("#validatepromo").html('{$lang['网络错误,重试']}');
																	$("#validatepromo").attr('class','btn');
																},
															});
														});
													</script>
												</td>
												<td class="span6">
													{if is_array($cart['周期'])}
														<select name="cycleid" class="span12">
															{foreach $cart['周期'] as $num=>$row nocache}
																<option value="{$num}">{$row['名称']} {$row['价格']}{$c['交易币名称']}/{$row['时间']}{$lang['天']} {if $row['自动']}{$lang['自动开通']}{else}{$lang['审核开通']}{/if}</option>
															{foreachelse}
																{$lang['无法购买']}
															{/foreach}
														</select>
													{else}
														{if $cart['周期']!='一次性'}<input type="text" name="days" id="days" value="1" /> /{/if}{if $cart['价格']=='免费'}{$lang['免费']}{else}{$cart['价格']} {$c['交易币名称']}{/if} {$lang[$cart['周期']]} {$lang[$cart['开通方式']]}
													{/if}
												</td>
											</tr>
											<tr>
												<td class="span6">{$lang['备注/额外信息']}</td>
												<td class="span6">{$lang['确认订单/合计']}</td>
											</tr>
											<tr>
												<td class="span6"><textarea name="notes" rows="2" style="width:100%;height:100px" onFocus="if(this.value=='{$lang['您可以输入任何您想包含在订单中的额外注释或信息……']}'){ this.value=''; }" onBlur="if (this.value==''){ this.value='{$lang['您可以输入任何您想包含在订单中的额外注释或信息……']}'; }">{$lang['您可以输入任何您想包含在订单中的额外注释或信息……']}</textarea></td>
												<td class="span6">
													{$lang['预存款']}: {$s['登陆预存款']} {$c['交易币名称']}<br/><br/>
													<input type="submit" value="{$lang['确认订单并且完成订购']}" onclick="this.value='{$lang['请稍后……']}'" class="btn" />
												</td>
											</tr>
										</tbody>
									</table>
									</form>
								</div>
							</div>
						</div>
					</div>
					<div class="span3">
						<h4>{$lang['快速导航']}</h4>
						<table class="table">
							<tbody>
								<tr><td><a href="{$ROOT}/index/index/"><span class="label label-success">1</span> {$lang['客户中心']}</a></td></tr>
								<tr><td><a href="{$ROOT}/control/index/"><span class="label label-info">2</span> {$lang['控制面板']}</a></td></tr>
								<tr><td><a href="{$ROOT}/index/announcements/"><span class="label label-warning">3</span> {$lang['公告信息']}</a></td></tr>
								<tr><td><a href="{$ROOT}/ticket/submit/"><span class="label label-important">4</span> {$lang['提交服务单']}</a></td></tr>
								<tr><td><a href="{$ROOT}/buy/index/"><span class="label label-info">5</span> {$lang['订购产品']}</a></td></tr>
							</tbody>
						</table>
						<hr />
						{if $s['是否已经登陆']=='是'}
							<h4>{$lang['账户信息']}</h4>
							<table class="table">
								<tbody>
									<tr><td>{$s['登陆姓名']}</td></tr>
									<tr><td>{$s['登陆地址']}</td></tr>
									<tr><td>{$s['登陆国家']}</td></tr>
									<tr><td>{$s['登陆邮箱']}</td></tr>
								</tbody>
							</table>
							<hr />
						{/if}
						<h4>{$lang['选择语言']}</h4>
						<form method="post" name="languagefrm" id="languagefrom">
							<select name="language" onchange="languagefrom.submit()">
								{foreach from=$l item=langs}
									<option value="{$langs}"{if $langs==$language} selected="selected"{/if}>{$langs}</option>
								{/foreach}
							</select>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
{include file="footer.tpl"}