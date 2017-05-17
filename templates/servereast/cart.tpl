{include file="header.tpl" navxz='2' title=$lang['购物车'] hostname=$c['网站名称']}{include file="alert.tpl"}
  <!-- Breadcrumps -->
  <div class="breadcrumbs">
    <div class="row">
      <div class="col-sm-6">
        <h1>{$lang['购物车']}</h1>
      </div>
    </div>
  </div>

<style type="text/css">
ul.display-list {
padding: 0;
margin: 0;
list-style: none;
}
ul.display-list li {
font-size: 16px;
font-weight: 300;
padding: 7px 0;
border-bottom: 1px solid #F0F1F5;
margin-bottom: 2px;
}
</style>
  <!-- End of Breadcrumps -->
	

	<section class="elements">
<div class="servers-table" >
    <div class="row">
      <div class="col-sm-12">

<form method="post" action="submit/">

	  <br>
	  <br>
        <table  class="products-table responsive wow fadeInUp tablesaw tablesaw-stack">

		
			 <thead>
	   <tr><th style="width:160px;border: 1px solid #dddddd;">{$mlang['产品名称']}:</th><td>{$cart['名称']}</td></tr>
<tr><th style="border: 1px solid #dddddd;">{$mlang['产品库存']}:</th><td>{$lang['剩余']} {$cart['库存']} {$lang['个']}</td></tr>
<tr><th style="border: 1px solid #dddddd;">{$mlang['产品价格']}:</th><td>{if $cart['价格']=='免费'}{$lang[$cart['价格']]}{else}{$cart['价格']} {$c['交易币名称']}{/if}</td></tr>
<tr><th style="border: 1px solid #dddddd;">{$mlang['开通方式']}:</th><td>{$lang[$cart['开通方式']]}</td></tr>
<tr><th style="border: 1px solid #dddddd;">{$mlang['产品描述']}:</th><td><ul style="list-style-type:none;color:#000000;">{$cart['描述']}</ul></td></tr>
	  
	  </thead>
        </table>
		<br>
		<br>
 {if $cart['隐藏域名配置']!='1'} 
 
{if $cart['关闭自主域名']=='yes'}
<input type="hidden" name="domainoption" value="freedomain" id="seldomain" />
 <div class="accordion-example"><div id="example-tabs">
<div id="tab1" style="display:block;"><p><div id="freedomain" align="center">www. <input type="text" name="freedomain" size="40" value=""/> .<select name="freedomainhz" style="width:150px;">{foreach from=$freedomains item=freedomain}<option value="{$freedomain}">{$freedomain}</option>{/foreach}</select></div> </p></div>
                    </div>
                </div>

{else}<input type="hidden" name="domainoption" value="domain" id="seldomain" /> 
 
                <div class="accordion-example">
                    <div id="example-tabs">
                        <ul>
							<li><a href="#tab1"  onclick="document.getElementById('seldomain').value='domain';">{$lang['我已经有一个域名,我将把已有域名解析到此空间']} </a>
                            </li>{if $cart['显示域名选项']=='开'}
                            <li><a href="#tab2"  onclick="document.getElementById('seldomain').value='freedomain';">{$lang['您选择的产品/服务需要域名，请将域名填写在下面']}</a>
                            </li>{/if}
                           
                        
                        </ul>

                        <!-- 1st tab  -->
                        <div id="tab1">

                            <p><div id="domain" align="center">www.
				<input type="text" name="domain" size="40" value="" style="width:276px;"  onclick="document.getElementById('seldomain').value='domain';"/>
				.
				<input type="text" name="domainhz" size="7" value="" style="width:80px;"  onclick="document.getElementById('seldomain').value='domain';"/>
				</div> </p>

                        </div>
{if $cart['显示域名选项']=='开'}<div id="tab2"><p><div id="freedomain" align="center">www. <input type="text" name="freedomain" size="40" value=""   onclick="document.getElementById('seldomain').value='freedomain';"/> .<select name="freedomainhz" style="width:150px;">{foreach from=$freedomains item=freedomain}<option value="{$freedomain}">{$freedomain}</option>{/foreach}</select></div> </p></div>{/if}
                    </div>
                </div>
				{/if}
{/if}




<div class="spacing-20"></div>

<div class="row">
<div class="col-sm-7 center-block">
<ul class="display-list">
{foreach from=$buyoptions item=option}
	{if $option['Type']=='yesno'}
		<li>{$option['Name']} : <input name="buyoptions[{$option['Name']}]" type="radio" value="on" />{$mlang['开']} <input name="buyoptions[{$option['Name']}]" type="radio" value="0" checked />{$mlang['关']}</li>
	{elseif $option['Type']=='text'}
		<li>{$option['Name']} : <input type="text" name="buyoptions[{$option['Name']}]" size="{$option['Size']}"></li>
	{elseif $option['Type']=='dropdown'}
		<li>{$option['Name']} :<select name="buyoptions[{$option['Name']}]">{foreach from=$option['Options'] item=optsub}<option value="{$optsub}">{$optsub}</option>{/foreach}
				</select> </li>
	{/if}
{/foreach}
{foreach from=$options item=option}
	<li>{$option['名称']} :<select name="config[{$option['id']}]">{foreach from=$option['选项'] item=optsub}<option value="{$optsub['id']}">{$optsub['名称']}</option>{/foreach}</select></li>
{/foreach}
</ul>
</div>
</div>

<div class="spacing-20"></div>

<div class="row">
<div class="col-sm-7 center-block">
<ul class="display-list">
<li>{$lang['优惠码']}: <input class="choosecat" type="text" name="promocode"  id="promocode" /><a class="btn btn-primary" id="validatepromo">{$lang['验证 >>']}</a></li>

<li>{$lang['购买时间']}: {if is_array($cart['周期'])}
					<select name="cycleid" class="choosecat">
						{foreach $cart['周期'] as $num=>$row nocache}
							<option value="{$num}">{$row['名称']} {$row['价格']}{$c['交易币名称']}/{$row['时间']}天 {if $row['自动']}{$lang['自动开通']}{else}{$lang['审核开通']}{/if}</option>
						{foreachelse}
							无法购买
						{/foreach}
					</select>
{else}
					{if $cart['周期']!='一次性'}<input type="text" name="days" id="days" value="1" /> /{/if}{if $cart['价格']=='免费'}{$lang['免费']}{else}{$cart['价格']} {$c['交易币名称']}{/if}{$lang[$cart['周期']]} {$lang[$cart['开通方式']]}
{/if}</li>


<li>{$lang['预存款']}: <b>{$s['登陆预存款']} {$c['交易币名称']}</b></li>
<li>{$lang['总计']}: <b><a id="payall">{if $cart['价格']=='免费'}0{else}{$cart['价格']}{/if}</a> {$c['交易币名称']}</b></li>
<li>{$lang['备注/额外信息']}: <textarea name="notes" rows="2" style="width:100%;height:100px" onFocus="if(this.value=='{$lang['您可以输入任何您想包含在订单中的额外注释或信息……']}'){ this.value=''; }" onBlur="if (this.value==''){ this.value='{$lang['您可以输入任何您想包含在订单中的额外注释或信息……']}'; }">{$lang['您可以输入任何您想包含在订单中的额外注释或信息……']}</textarea></a></li>
</ul>
</div>
</div>
<script language="javascript" type="text/javascript">

$("#validatepromo").click(function () {
$("#validatepromo").attr('class','btn  btn-default');
$("#validatepromo").html('{$lang['请稍后……']}');
$.ajax({
type:　"post",
url:　"/index.php/buy/promo/",
data:　"swap="+$("#promocode").val(),
success:　function (msg){
if(msg==='ok'){
$("#validatepromo").html('{$lang['优惠码有效']}');
$("#validatepromo").attr('class','btn  btn-default');
}else{
$("#validatepromo").html(msg);
$("#validatepromo").attr('class','btn  btn-primary');
}
},
error:　function (mag){
$("#validatepromo").html('{$lang['网络错误,重试']}');
$("#validatepromo").attr('class','btn  btn-primary');
},
});
});
</script>
<div class="spacing-20"></div>
<p align="center"><input type="submit" class="btn btn-success" value="{$lang['确认订单并且完成订购']}" onclick="this.value='{$lang['请稍后……']}'"></p>

</div>
		</div>	
</form>    
  </div>
</section>

 <script src="{$templatedir}/js/jquery.responsiveTabs.js"></script>
<script>
    // ______________ TABS
    $('#example-tabs').responsiveTabs({
        startCollapsed: 'accordion'
    });


    </script>
{include file="footer.tpl"}