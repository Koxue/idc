{include file="header.tpl" title=$lang['服务单详情'] hostname=$c['网站名称']}
    <div id="in-nav">
      <div class="container">
        <div class="row">
          <div class="span12">
            <ul class="pull-right">
			{if $s['是否已经登陆']=='是'}
              <li>{$lang['欢迎回来']}: {$s['登陆用户名']} / <a href="#">{$lang['我的资料']}</a> / <a href="{$ROOT}/index/login/">{$lang['退出帐户']}</a></li>
            {else}
              <li><a href="{$ROOT}/index/login/">{$lang['登陆']}</a>/<a href="{$ROOT}/index/register/">{$lang['注册']}</a></li>
			{/if}
            </ul><a id="logo" href="{$ROOT}/index/index/">
              <h4>{$c['头部LOGO']}</h4></a>
          </div>
        </div>
      </div>
    </div>
    <div id="in-sub-nav">
      <div class="container">
        <div class="row">
          <div class="span12">
            <ul>
              <li><a href="{$ROOT}/index/index/" class="active"><i class="batch home"></i><br />{$lang['客户中心']}</a></li>
			  <li><a href="{$ROOT}/control/index/"><i class="batch b-database"></i><br>{$lang['控制面板']}</a></li>
              <li><a href="{$ROOT}/buy/index/"><i class="batch quill"></i><br />{$lang['订购产品']}</a></li>
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
		<div class="btn-group pull-right">
	        <a href="{$ROOT}/ticket/index/" class="btn">{$lang['查看服务单']}</a>
	    </div>
            <h4 class="header">{$lang['工单详情']}</h4>{include file="alert.tpl"}
              <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
                <tr>
                  <td valign="top">
				  <table width="100%"  border="0" cellpadding="0" cellspacing="0">
                    <tr>
                      <td height="40">
					  <table width="100%" height="26" border="0" cellpadding="0" cellspacing="0">
                        <tr>
                          <td width="1197">{$lang['工单标题']}： {$t['主题']}</td>
                          <td width="615" style="padding-right:5px;"><div align="right" class="STYLE6">{$lang[$t['状态']]}</div></td>
                        </tr>
                        <tr>
                          <td width="1197">{$lang['提交时间']}： {$t['提交时间']}</td>
                          <td width="615" style="padding-right:5px;"><div align="right" class="STYLE6">{$lang['最后时间']}: {$t['最后时间']}</div></td>
                        </tr>
                      </table>
					  </td>
                    </tr>
                    <tr>
                      <td height="1" valign="top" bgcolor="#e0e0e0"></td>
                    </tr>
                  </table>
				  </td>
                </tr>
				{foreach from=$tks item=tk}
				{if $tk['回复类型']=='1'}
                <tr>
                  <td valign="top"><table width="100%" border="0" cellpadding="0" cellspacing="0">
                    <tr>
                      <td height="30">{$tk['名字']} (ID: {$tk['用户id']})<span style="float:right;margin-right:15px;">{$tk['时间']}</span></td>
                    </tr>
                    <tr>
                      <td><table width="100%" border="0" cellpadding="0" cellspacing="0">
                        <tr>
                          <td height="12"><table width="99%" height="12" border="0" cellpadding="0" cellspacing="0" background="{$templatedir}/img/e34.jpg">
                            <tr>
                              <td width="59" height="12"><img src="{$templatedir}/img/32.jpg" width="59" height="12" /></td>
                              <td width="95%" height="12"></td>
                            </tr>
                          </table></td>
                        </tr>
                        <tr>
                          <td valign="top"><table width="99%" border="0" cellpadding="0" cellspacing="0" bgcolor="#CFE5C1">
                            <tr>
                              <td valign="top" bgcolor="#FEFFFA"><table width="100%"  border="0" align="center" cellpadding="0" cellspacing="0" style=" border-bottom: #cfe5c1 solid 1px; border-left: #cfe5c1 solid 1px; border-right:#cfe5c1 solid 1px;">
                                <tr>
                                  <td height="100" valign="top" style="padding-left:3px; padding-top:3px;"><table width="99%" height="64" border="0" align="center" cellpadding="0" cellspacing="0">
                                    <tr>
                                      <td><table width="100%"  border="0" align="center" cellpadding="0" cellspacing="0" >
                                        <tr>
                                          <td height="100" colspan="4" valign="top" style="padding-left:3px; padding-top:3px;">
                                          {$tk['信息']}
                                          </td>
                                        </tr>
                                      </table></td>
                                    </tr>
                                  </table></td>
                                </tr>
                              </table></td>
                            </tr>
                          </table></td>
                        </tr>
                        
                      </table></td>
                    </tr>
                  </table></td>
                </tr>
				{/if}
				{if $tk['回复类型']=='2'}
                <tr>
                  <td valign="top">
                  <table width="100%" border="0" cellpadding="0" cellspacing="0">
                      <tr>
                        <td>&nbsp;</td>
                      </tr>
                      <tr>
                        <td height="30"><span>{$tk['名字']} (ID: {$tk['客服id']})</span><span style="float:right;margin-right:15px;">{$tk['时间']}</span></td>
                      </tr>
                      <tr>
                        <td>
						<table width="100%" border="0" cellpadding="0" cellspacing="0">
                            <tr>
                              <td height="12">
							  <table width="99%" height="12" border="0" cellpadding="0" cellspacing="0" background="{$templatedir}/img/c2.jpg">
                                  <tr>
                                    <td width="59" height="12"><img src="{$templatedir}/img/c1.jpg" width="49" height="12" /></td>
                                    <td width="95%" height="12"></td>
                                  </tr>
                              </table>
							  </td>
                            </tr>
                            <tr>
                              <td valign="top">
							  <table width="99%" border="0" cellpadding="0" cellspacing="0" bgcolor="#CFE5C1">
                                  <tr>
                                    <td valign="top" bgcolor="#fcfaff">
									<table width="100%"  border="0" cellpadding="0" cellspacing="0" style=" border-bottom: #d6c2e5 solid 1px; border-left: #d6c2e5 solid 1px; border-right:#d6c2e5 solid 1px;">
                                        <tr>
                                          <td height="100" valign="top" style="padding-left:3px; padding-top:3px;">
										  <table width="99%" height="64" border="0" align="center" cellpadding="0" cellspacing="0">
                                              <tr>
                                                <td>
												 <table width="100%" border="0" cellpadding="0" cellspacing="0">
                                                  <tr>
                                                    <td height="80" valign="top" style="padding-top:5px;">
													{$tk['信息']}
                                                    </td>
                                                  </tr>
												 </table>
												</td>
                                              </tr>
                                          </table>
										  </td>
                                        </tr>
                                    </table>
									</td>
                                  </tr>
                              </table>
							  </td>
                            </tr>
                        </table>
						</td>
                      </tr>
                  </table>
				  </td>
                </tr>
				{/if}
				{/foreach}
                <tr>
                  <td valign="top">
				  <table width="100%" border="0" cellpadding="0" cellspacing="0">
                   <tr>
                          <td height="36" class="wtzt">{$lang['工单回复']}</td>
				   </tr>
                    <tr>
                      <td valign="top">
					  <table width="99%" border="0" cellpadding="0" cellspacing="1">
                          <tr><form class="form-horizontal" method="post">
                            <td bgcolor="#FEFFFA">
							<table width="100%" border="0" cellpadding="0" cellspacing="0">
                              <tr>
                                <td height="80"> <textarea name="reply" id="reply" cols="45" rows="5" style="resize: none; border:#CCCCCC  solid 1px;width:98%; height:100px; font-size:12px;"></textarea></td>
                              </tr>
                              <tr>
                                <td><input class="btn" type="submit" value="{$lang['回复']}" /></td>
                              </tr>
                            </table>
							</td></form>
                          </tr>
                      </table>
					  </td>
                    </tr>
                  </table>
				  </td>
                </tr>
	      </table>
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