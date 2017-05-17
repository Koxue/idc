<html>
<head>
    <title>{$c['网站名称']}{$lang['订单']} - {$lang['编号']}:{$server['id']}</title>
    <meta name="ROBOTS" content="NOINDEX, NOFOLLOW">
    <style>
        body { margin:0;padding:0; background-color:#eee;}
            table td { border-collapse:collapse;margin:0;padding:0;}
            img { border: none;}
    </style>
    <script>
        window["_GOOG_TRANS_EXT_VER"] = "1";
    </script>
    <link type="text/css" rel="stylesheet" href="{$templatedir}/css/invoice.style.css"/>
	<script src="{$templatedir}/js/jquery-1.11.0.js"></script>
</head>

<body>
    <table width="100%" cellpadding="0" cellspacing="0" border="0">
        <tbody>
            <tr>
                <td valign="top" align="right" width="50%" style="background-color: #eee;">
                    <img src="{$templatedir}/img/bg_left.jpg" height="770" width="99">
                </td>
                <td valign="top" style="background-color:#eee;">
                    <!-- PREHEADER -->
                    <table width="676" cellpadding="0" cellspacing="0" border="0">
                        <tbody>
                            <tr>
                                <td width="676" align="right" style="background-color:#ebebeb; color:#3f4042; font-family:'Segoe UI',Arial,sans-serif; font-size:10px; font-weight:600; padding:24px 0 3px;">
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <!-- /PREHEADER -->
                    <!-- BODY -->
                    <table width="676" cellpadding="0" cellspacing="0" border="0">
                        <tbody>
                            <tr>
                                <td width="15" bgcolor="#323f48">&nbsp;</td>
                                <td width="646" height="20" valign="middle" style="padding:13px 0;background-color:#323f48;">
                                    <img align="left" src="{$templatedir}/img/bg_logo.png" alt="Windows Azure" width="236" height="20" border="0">
                                </td>
                                <td width="15" bgcolor="#323f48">&nbsp;</td>
                            </tr>
                        </tbody>
                    </table>
                    <table width="676" cellpadding="0" cellspacing="0" border="0">
                        <tbody>
                            <tr>
                                <td width="50" bgcolor="#323f48">&nbsp;</td>
                                <td width="611" align="left" valign="middle" style="padding:0 0 13px 0; background-color:#323f48; color:#fff;font-family:'Segoe UI',Arial,sans-serif; font-size:17px; line-height:21px; font-weight:600;">{$c['网站名称']}{$lang['已创建您的账单 编号']}:{$server['id']}</td>
                                <td width="15" bgcolor="#323f48">&nbsp;</td>
                            </tr>
                        </tbody>
                    </table>
                    <table width="676" cellpadding="0" cellspacing="0" border="0">
                        <tbody>
                            <tr>
                                <td width="50" style="background:#ffffff; line-height:1px;">&nbsp;</td>
                                <td width="386" align="left" valign="top" style="background:#fff; padding:20px 0;">
                                    <table cellpadding="0" cellspacing="0" border="0" width="100%">
                                        <tbody>
                                            <tr>
                                                <td align="left" style="color:#4d4d4d; font-family:'Segoe UI',Arial,sans-serif; font-size:14px; line-height:20px; padding-bottom:12px;">
                                                    <span style="font-size:17px; font-weight:100; line-height:21px;">{$lang['立即支付订单并开始使用！']}</span>
                                                    <br>
                                                    <br>
                                                    <strong>{$lang['账单日期']}：{$server['申请时间']}</strong>
                                                    <br>
                                                    <br>
                                                    <!-- START AMPSCRIPT                  -->
                                                    <table cellpadding="0" cellspacing="0" border="0" width="100%">
                                                        <!--                     -->
                                                        <!--                         -->
                                                        <tbody>
                                                            <tr>
                                                                <td style="color:#4d4d4d; font-family:'Segoe UI',Arial,sans-serif; font-size:14px; line-height:20px; padding-bottom:12px;">
                                                                    <strong>{$lang['主域名']}：</strong>{$server['域名']}
                                                                    <br>
                                                                    <br><strong>{$lang['产品类型']}：</strong>
                                                                    <br>{$goods['名称']}
																	{if !is_array($goods['周期'])}<br><strong>{$lang['产品价格']}：</strong>{$goods['价格']}{if $goods['价格']!='免费'} {$c['交易币名称']}{/if}{/if}
																	<br>
																	<br><strong>{$lang['付款周期']}：</strong>
																	{if is_array($goods['周期'])}
																		{foreach $goods['周期'] as $num=>$row nocache}
																			<br>{$row['名称']} {$row['价格']}{$c['交易币名称']}/{$row['时间']}{$lang['天']}
																		{foreachelse}
																			<br>{$lang['无法购买']}
																		{/foreach}
																	{else}
																		{$lang[$goods['周期']]}
																	{/if}
                                                                </td>
                                                            </tr>
                                                            <!---->
                                                        </tbody>
                                                    </table>
                                                    <!-- END AMPSCRIPT -->
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </td>
                                <td width="240" align="left" valign="top" style="background:#eee; padding:0;">
                                    <table width="240" cellpadding="0" cellspacing="0" border="0">
                                        <tbody>
                                            <tr>
                                                <td width="240" align="left" valign="top" style="background-color:#eee;padding:35px 0 20px;">
                                                    <table width="200px" border="0" cellpadding="0" cellspacing="0" align="center">
                                                        <tbody>
                                                            <tr>
                                                                <td><form name="pay" method="post" action="{$ROOT}/control/pay/{$server['id']}/">
																    <div onclick="javascript:pay.submit();" align="center" valign="middle" style="background:#00ADEF; padding:10px 11px; font-family:Segoe UI, Tahoma, sans-serif; font-size:11pt;color:#fff;cursor: hand;">
                                                                        <b>{$lang['支付']}</b>
																    </div>
                                                                </td>
                                                            </tr>
															<tr>
																<td align="center"></br>
																Powered by <a href="http://www.swapidc.com/">SWAPIDC</a>
																</td>
															</tr>
                                                        </tbody>
                                                    </table>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td width="240" align="left" valign="top" style="background-color:#eee;padding:20px 0 20px;">
                                                    <table cellpadding="0" cellspacing="0" border="0" width="240px">
                                                        <tbody>
                                                            <tr>
                                                                <td width="20" bgcolor="#686868" style="border-top:2px solid #fff;">&nbsp;</td>
                                                                <td width="200" align="left" bgcolor="#686868" style="color:#fff; font-family:'Segoe UI',Arial,sans-serif; font-size:17px; line-height:19px; padding:10px 0; border-top:2px solid #fff;">{$lang['支付选项']}</td>
                                                                <td width="20" bgcolor="#686868" style="border-top:2px solid #fff;">&nbsp;</td>
                                                            </tr>
                                                            <tr>
                                                                <td width="20">&nbsp;</td>
                                                                <td width="200" align="left" style="color:#3d3d3d; font-family:'Segoe UI',Arial,sans-serif; font-size:13px; line-height:16px; padding:20px 0;">
 																	<strong>{$lang['您要支付开通的时间']}:</strong><br>
                                                                    {if is_array($goods['周期'])}
																		<select name="cycleid" class="span12">
																			{foreach $goods['周期'] as $num=>$row nocache}
																				<option value="{$num}">{$row['名称']} {$row['价格']}{$c['交易币名称']}/{$row['时间']}天 {if $row['自动']}{$lang['自动开通']}{else}{$lang['审核开通']}{/if}</option>
																			{foreachelse}
																				无法购买
																			{/foreach}
																		</select>
																	{else}
																		<strong>{if $goods['周期']!='一次性'}<input type="txt" name="days" id="days" value="1" /> /{/if}{$lang[$goods['周期']]}</strong><br>
																	{/if}
																	<strong>{$lang['当前预存款']}: {$s['登陆预存款']} {$c['交易币名称']}</strong>
                                                                </td>
                                                                <td width="20">&nbsp;</td>
                                                            </tr></form>
                                                        </tbody>
                                                    </table>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <!-- /BODY -->
                    <!-- FOOTER -->
                    <table width="676" cellpadding="0" cellspacing="0" border="0">
                        <tbody>
                            <tr>
                                <td width="50" style="background:#fff; border-top:solid 2px #898989;">&nbsp;</td>
                                <td width="606" align="left" valign="top" style="background:#fff; color:#4c4c4c; font-family:'Segoe UI',Arial,sans-serif; font-size:11px; padding:20px 0; border-top:solid 2px #898989;">
                                    <table width="100%" cellpadding="0" cellspacing="0" border="0" style="">
                                        <tbody>
                                            <tr>
                                                <td align="left" style="font-family:'Segoe UI',Arial,sans-serif; color:#4d4d4d; font-size:12px;">
                                                    <center>
                                                        <a href="{$ROOT}/control/">{$lang['<< 回到客户中心']}</a>
                                                    </center>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </td>
                                <td width="20" style="background:#fff; border-top:solid 2px #898989;">&nbsp;</td>
                            </tr>
                            <tr>
                                <td width="50" style="background:#fff; color:#4c4c4c;">&nbsp;</td>
                                <td width="606" valign="top" align="right" style="background:#fff; color:#4c4c4c; font-family:'Segoe UI',Arial,sans-serif; font-size:11px; padding:0 0 24px 0;">
                                    <img src="{$templatedir}/img/footer_logo.png" alt="Microsoft">
                                </td>
                                <td width="20" style="background:#fff; color:#4c4c4c;">&nbsp;</td>
                            </tr>
                        </tbody>
                    </table>
                    <!-- /FOOTER -->
                </td>
                <td valign="top" align="left" width="50%" style="background-color:#eee;">
                    <img src="{$templatedir}/img/bg_right.jpg" height="770" width="99">
                </td>
            </tr>
        </tbody>
    </table>
</body>

</html>