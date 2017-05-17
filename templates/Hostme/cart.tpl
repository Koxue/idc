{include file="customer_header.tpl" title=$lang['客户中心'] hostname=$c['网站名称']}
 
<div class="primarymenu menuwrap">
					<ul id="atp_menu" class="sf-menu">
						<li><a href="{if $c['伪静态开关']=='0'}/index.php{/if}/index/index/">{$lang['客户中心']}</a></li>
						<li class="current-page-ancestor"><a href="{if $c['伪静态开关']=='0'}/index.php{/if}/buy/index/">{$lang['订购产品']}</a></li>
						<li><a href="{if $c['伪静态开关']=='0'}/index.php{/if}/index/announcements/">{$lang['公告信息']}</a></li>
						<li><a href="#contantus">{$tlang['联系我们']}</a></li>
						
					</ul>
					
				</div><!-- .primarymenu -->
   	    </div><!-- .inner-->
	</div><!-- #header -->
<div class="clear"></div>
   <div class="section_row clearfix">
				<div class="section_bg" style="background-color:#e0e0e0;"></div>
					<div class="section_inner">
						<h1 class="center">{$lang['购物车']}</h1>
							<div data-id="bounceIn" class="pricetable  iva_anim">
								<div class="pricing-inner">
								<form method="post" action="submit/" class="form-inline">
        <div class="row-fluid">
          <div class="span12">
          <table class="table">
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
				<label><input type="radio" name="domainoption" value="domain" id="seldomain" onclick="document.getElementById('domain').style.display='';document.getElementById('freedomain').style.display='none';" />
				{$lang['我已经有一个域名,我将把已有域名解析到此空间']}
				</label></td>
              </tr>
{if $cart['显示域名选项']=='开'}
              <tr>
                <td>
				<label>
				<input type="radio" name="domainoption" value="freedomain" id="selfreedomain" onclick="document.getElementById('domain').style.display='none';document.getElementById('freedomain').style.display='';" />
				{$lang['我没有域名,我想使用提供的2级域名']}
				</label></td>
              </tr>
{/if}
              <tr>
                <td>
				

				<div id="freedomain" align="center"><div class="input-group" style="width:400px;"><div class="input-group-addon" style="width:60px;">www. </div>
				<input class="form-control" type="text" name="freedomain" value="" style="width:200px;"/>
				<div class="input-group-addon" style="width:40px;"> . </div>
				<select name="freedomainhz" class="form-control" style="width:100px;">
{foreach from=$freedomains item=freedomain}
				      <option value="{$freedomain}">{$freedomain}</option>
{/foreach}
				</select>
				</div>
				</div>
				
				<div id="domain" align="center"><div class="input-group" style="width:400px;"><div class="input-group-addon" style="60px;">www. </div>
				<input class="form-control" type="text" name="domain" size="40" value="" style="width:200px;"/>
				<div class="input-group-addon" style="width:40px"> . </div>
				<input class="form-control" type="text" name="domainhz" size="7" value="" style="100px;"/>
				</div></div>
				</td>
              </tr>
{/if}
{foreach from=$buyoptions item=option}
{if $option['Type']=='yesno'}
			  <tr>
			    <td>
				<div  align="center"><div class="input-group"><div class="input-group-addon">{$option['Name']}:</div>
				<input class="form-control" name="buyoptions[{$option['Name']}]" type="radio" value="on" /><div class="input-group-addon">{$lang['开']}</div> <input class="form-control" name="buyoptions[{$option['Name']}]" type="radio" value="0" checked /><div class="input-group-addon">{$lang['关']}</div>
				</div></div>
				</td>
			  </tr>
{elseif $option['Type']=='text'}
			  <tr>
			    <td>
				<div  align="center"><div class="input-group"><div class="input-group-addon">{$option['Name']}:</div>
				<input class="form-control" type="text" name="buyoptions[{$option['Name']}]" size="{$option['Size']}">
				</div></div>
				</td>
			  </tr>
{elseif $option['Type']=='dropdown'}
			  <tr>
			    <td>
				<div  align="center"><div class="input-group"><div class="input-group-addon">{$option['Name']}:</div>
				<select name="buyoptions[{$option['Name']}]" class="form-control" >
{foreach from=$option['Options'] item=optsub}
					<option value="{$optsub}">{$optsub}</option>
{/foreach}
				</select>
				</div></div>
				</td>
			  </tr>
{/if}
{/foreach}
{foreach from=$options item=option}
			  <tr>
			    <td>
				<div  align="center">
				<div class="input-group" style="width:400px;"><div class="input-group-addon" style="width:25%;">{$option['名称']}:</div>
				<select name="config[{$option['id']}]" class="form-control">
{foreach from=$option['选项'] item=optsub}
					<option value="{$optsub['id']}">{$optsub['名称']}</option>
{/foreach}
				</select>
				</div></div>
				</td>
			  </tr>
{/foreach}
            </tbody>
          </table>
{if $cart['隐藏域名配置']!='1'}
<script language="javascript" type="text/javascript">
document.getElementById('seldomain').checked='true';
document.getElementById('freedomain').style.display='none';
document.getElementById('domain').style.display='';
</script>
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
                <td width="50%" class="span6"><div class="form-group"><div class="input-group"><input type="text" class="form-control" placeholder="{$lang['优惠码']}" name="promocode" size="20" id="promocode" ><span class="input-group-btn"><button class="btn btn-default" type="button" id="validatepromo">{$lang['验证 >>']}</button></span></div></div>
</td>
				<td width="50%" class="span6"><div class="form-group">
    <div class="input-group">
	<div class="input-group-addon">{$lang['购买时间']}</div>
      <input type="text" class="form-control" name="days" id="days" value="1" placeholder="{$lang['购买时间']}" style="width:50px;">
      <div class="input-group-addon">/{$lang[$cart['周期']]}</div>
	  <span class="input-group-btn"><button class="btn btn-default" type="button" id="daysst">{$lang['计算价格 >>']}</button></span>
    </div>
  </div></td>
              </tr>
<script language="javascript" type="text/javascript">
$("#validatepromo").click(function () {
$("#validatepromo").attr('class','btn btn-info');
$("#validatepromo").html('{$lang['请稍后……']}');
$.ajax({
type:　"post",
url:　"/index.php/buy/promo/",
data:　"swap="+$("#promocode").val(),
success:　function (msg){
if(msg==='ok'){
$("#validatepromo").html('{$lang['优惠码有效']}');
$("#validatepromo").attr('class','btn btn-success');
}else{
$("#validatepromo").html(msg);
$("#validatepromo").attr('class','btn btn-warning');
}
},
error:　function (mag){
$("#validatepromo").html('{$lang['网络错误,重试']}');
$("#validatepromo").attr('class','btn btn-warning');
},
});
});
$("#daysst").click(function () {
$("#daysst").attr('class','btn btn-info active');
$("#daysst").html('{$lang['请稍后……']}');
$.ajax({
type:　"post",
url:　"/index.php/buy/rate/",
data:　"cartid={$cart['id']}&days="+$("#days").val(),
success:　function (msg){
$("#payall").html(msg);
$("#daysst").html('{$lang['计算价格 >>']}');
$("#daysst").attr('class','btn btn-default');
},
error:　function (mag){
$("#daysst").html('{$lang['网络错误,重试']}');
$("#daysst").attr('class','btn btn-warning');
},
});
});
</script>
	</td>
              </tr>
              <tr>
                <td width="50%" class="span6">{$lang['备注/额外信息']}</td>
				<td width="50%" class="span6">{$lang['确认订单/合计']}</td>
              </tr>
              <tr>
                <td class="span6"><textarea class="form-control" name="notes" rows="2" style="width:100%;height:100px" onFocus="if(this.value=='{$lang['您可以输入任何您想包含在订单中的额外注释或信息……']}'){ this.value=''; }" onBlur="if (this.value==''){ this.value='{$lang['您可以输入任何您想包含在订单中的额外注释或信息……']}'; }">{$lang['您可以输入任何您想包含在订单中的额外注释或信息……']}</textarea></td>
				<td class="span6">
				{$lang['总计']}: <span id="payall">{$cart['价格']}</span> {$c['交易币名称']}<br/>{$lang['预存款']}: {$s['登陆预存款']} {$c['交易币名称']}<br/><br/>
				<input type="submit" value="{$lang['确认订单并且完成订购']}" onclick="this.value='{$lang['请稍后……']}'" class="btn btn-default" />
				</td>
              </tr>
            </tbody>
          </table>	  
		  </form>								
								</div><!-- .pricing-inner -->								
								<div class="clear"></div>
							</div><!-- .pricetable -->
					</div><!-- .section_inner -->
			</div><!-- .section_row -->   
	</div>
	</div>
{include file="customer_footer.tpl"}