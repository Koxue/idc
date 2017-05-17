{include file="header.tpl" navxz='2' title=$lang['订单']+' - '+$lang['编号']+':'+$server['id'] hostname=$c['网站名称']}{include file="alert.tpl"}
  <!-- Breadcrumps -->
  <div class="breadcrumbs">
    <div class="row">
      <div class="col-sm-6">
        <h1>{$c['网站名称']}{$lang['已创建您的账单 编号']}:{$server['id']}</h1>
      </div>
    </div>
  </div>
<script language="javascript" type="text/javascript">
function daydd() {
$("#daysst").attr('class','btn btn-default');
$("#daysst").html('{$lang['请稍后……']}');
$.ajax({
type:　"post",
url:　"/index.php/buy/rate/",
data:　"cartid={$goods['id']}&days="+$("#days").val(),
success:　function (msg){
$("#payall").html(msg);
$("#daysst").html('{$lang['计算价格 >>']}');
$("#daysst").attr('class','btn btn-primary');
},
error:　function (mag){
$("#daysst").html('{$lang['网络错误,重试']}');
$("#daysst").attr('class','btn btn-primary');
},
});
};
</script>
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
	

	
<div class="servers-table" >
    <div class="row">
      <div class="col-sm-10"  style="margin:0 auto;float: none;">

	<a href="{$ROOT}/control/" class="btn btn-primary">{$lang['<< 回到客户中心']}</a>

	  <br>
	  <br>
        <table  class="products-table responsive wow fadeInUp tablesaw tablesaw-stack">

		
			 <thead>
	    <tr>
	      <th>
			{$lang['账单日期']}
		  </th>
	      <td>
			{$server['申请时间']}
		  </td>
	    </tr><tr>
	      <th>
{$lang['产品类型']}		  </th>
	      <td>
{$goods['名称']}
		  </td>
	    </tr>	    <tr>
	      <th>
{$lang['产品价格']}
		  </th>
	      <td>
{$goods['价格']}{if $goods['价格']!='免费'} {$c['交易币名称']}{/if}
		  </td>
	    </tr>	    <tr>
	      <th>
{$lang['付款周期']}
		  </th>
	      <td>
{$goods['周期']}
		  </td>
	    </tr>	
	  
	  </thead>
        </table>
      	

<!-- 
<p align="center"><strong>优惠码:</strong> <input type="text" name="promocode" class="choosecat"> <input type="submit" value="验证优惠码 >>" class="btn btn-lg"></p> -->

<form name="pay" method="post" action="{$ROOT}/control/pay/{$server['id']}/">
<div class="spacing-20"></div>
<div class="row">
<div class="col-sm-7 center-block">
<ul class="display-list">
<li>{$lang['您要支付开通的时间']}: 
 {if is_array($goods['周期'])}
					<select name="cycleid" class="choosecat">
						{foreach $goods['周期'] as $num=>$row nocache}
							<option value="{$num}">{$row['名称']} {$row['价格']}{$c['交易币名称']}/{$row['时间']}天 {if $row['自动']}{$lang['自动开通']}{else}{$lang['审核开通']}{/if}</option>
						{foreachelse}
							无法购买
						{/foreach}
					</select>
{else} 
					{if $goods['周期']!='一次性'}<input type="text" name="days" id="days" value="1" /> /{/if}{if $goods['价格']=='免费'}{$lang['免费']}{else}{$goods['价格']} {$c['交易币名称']}{/if}{$lang[$goods['周期']]} {$lang[$goods['开通方式']]}
{/if}

</li>
<li>{$lang['当前预存款']}: <b>{$s['登陆预存款']} {$c['交易币名称']}</b></li>
<li>{$lang['金额总计']}: <b><a id="payall">{if $goods['价格']=='免费'}0{else}{$goods['价格']}{/if}</a> {$c['交易币名称']}<div onclick="daydd()" id="daysst" align="center" valign="middle"  class="btn btn-primary" >{$lang['计算价格']}</div></b></li>
</ul>
</div>
</div>

<div class="spacing-20"></div>
<p align="center"><input type="submit" class="btn btn-success" value="{$lang['支付']}" onclick="this.value='{$lang['请稍后……']}'"></p>
</form>	
</div>
		</div>	
    
  </div>

 
{include file="footer.tpl" asd="1"}