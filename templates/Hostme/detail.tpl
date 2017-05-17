{include file="cframe.tpl" title=$lang['控制面板'] hostname=$c['网站名称'] subtitle=$lang['控制面板']}
<!--BEGIN CONTENT-->
<link type="text/css" rel="stylesheet" href="{$templatedir}/css/client/style.css">
<script language="javascript" src="{$templatedir}/js/client/jquery.bpopup.min.js"></script>
<script language="javascript" type="text/javascript">
;(function($) {
        $(function() {
            $('#renew').bind('click', function(e) {
                e.preventDefault();
                $('#renewdiv').bPopup({
	    easing: 'easeOutBack', 
            speed: 450,
            transition: 'slideDown'
        });
            });
         });
		 $(function() {
            $('#stop').bind('click', function(e) {
                e.preventDefault();
                $('#stopdiv').bPopup({
	    easing: 'easeOutBack', 
            speed: 450,
            transition: 'slideDown'
        });
            });
         });
		 $(function() {
            $('#reset').bind('click', function(e) {
                e.preventDefault();
                $('#resetdiv').bPopup({
	    easing: 'easeOutBack', 
            speed: 450,
            transition: 'slideDown'
        });
            });
         });
     })(jQuery);
</script>
<div class="page-content">
{include file="alert2.tpl"}
<h4 class="header">{$lang['详细管理']}</h4>
<a class="btn btn-default" style="margin-right:10px;" href="{if $c['伪静态开关']=='0'}/index.php{/if}/control/index/"><i class="fa fa-backward"></i>&nbsp;
{$lang['控制面板']}</a>
{if !$goods['禁止续费']}
	<button id="renew" class="btn btn-default">{$lang['续期产品']}</button>
{/if}
{if $goods['开启升级选项']}
	<a href="{if $c['伪静态开关']=='0'}/index.php{/if}/control/package/{$server['id']}/" class="btn btn-default">{$lang['升级/降级产品']}</a>
{/if}
{if $goods['允许用户自己停止']}
<button id="stop" class="btn btn-default">{$lang['停止/取消服务']}</button>
{/if}
<button id="reset" class="btn btn-default">{$lang['重置产品密码']}</button>
	<div class="btn-group">
	  <button data-toggle="dropdown" class="btn btn-default dropdown-toggle">{$lang['前往控制面板']}  <span class="caret"></span></button>
	  <ul class="dropdown-menu">
{foreach from=$logins item=login}
	    <li>{$login}</li>
{/foreach}
	  </ul>
	</div>
{foreach from=$barray key=bname item=bfunction}
	<a href="action/{$bfunction}/" class="btn btn btn-default">{$bname}</a>
{/foreach}
      <hr />
<link type="text/css" rel="stylesheet" href="{$templatedir}/css/client/style.css">
<div id="renewdiv" style="display:none;" class="messagediv">
        <span class="button b-close"><span>X</span></span>
        <h3>{$lang['续期产品']}</h3>
		<form class="form-horizontal" action="pay/" method="post">
	        <label class="control-label" for="inputDay">{$lang['续期天数']}</label>
{if $goods['价格']!='免费'}
	          <input name="day" value="1" type="text" placeholder="{$lang['需要续期几天']}" id="inputDay" onkeyup="this.value=this.value.replace(/\D|^0/g,'')" />
{else}
			  {$lang['免费产品会自动帮你续期到目前最大的时间!!']}
{/if}
	          <span class="help-block">{$lang['请确定续期日期在预存款可以续期内,否则续期失败!']}</span>
	          <p class="text-info">{if $goods['价格']!='免费'}{$lang['您目前拥有预存款']} {$s['登陆预存款']} {$c['交易币名称']}{$lang['，最多可以激活该产品']} {$payday} /{$goods['周期']}{else}{$lang['产品为免费产品,最多可续期']}{if $goods['周期']=='日付'}{$lang['30日']}{elseif $goods['周期']=='月付'}{$lang['1月']}{elseif $goods['周期']=='年付'}{$lang['1年']}{/if}{/if}</p>
	    </form>
		<button class="btn btn-primary" onclick="$('#renewdiv').find('form').submit();$(this).button('loading');">{$lang['续期']}</button>
	  </div>
<div id="stopdiv" style="display:none;" class="messagediv">
        <span class="button b-close"><span>X</span></span>
        <h3>{$lang['停止/取消服务']}</h3>
		<form class="form-horizontal" action="stop/" method="post">
	      <p>{$lang['如果您的产品出现问题,或者不想使用服务了,可以选择停止产品并取消服务,但是这个操作不能逆转,并且将不返还任何预存款!!']}</p>
	    </form>
		<button class="btn btn-primary" onclick="$('#stopdiv').find('form').submit();$(this).button('loading');">{$lang['确定']}</button>  
		</div>	  
<div id="resetdiv" style="display:none;" class="messagediv">
        <span class="button b-close"><span>X</span></span>
        <h3>{$lang['重置产品密码']}</h3>
		<form class="form-horizontal" action="repass/" method="post">
	      <p>{$lang['考虑到安全问题，控制中心不提供自定义修改产品密码，您可以在产品面板自定义修改密码，如果您忘记了修改的密码，请点击重置按钮，系统将为您重置为一个10位随机密码。']}</p>
	    </form>
		<button class="btn btn-primary" onclick="$('#resetdiv').find('form').submit();$(this).button('loading');">{$lang['重置']}</button>
		</div>	  
{$plug['产品控制面板详情']}
	<table class="table">
	  <tbody>
{if $goods['隐藏域名配置']!='1'}
	    <tr>
	      <td>{$lang['主域名(服务名)']}</td>
	      <td>{$server['域名']}</td>
	    </tr>
{/if}
{if $server['密码']!=''}
	    <tr>
	      <td>{$lang['产品登录信息']}<br>
	      </td>
	      <td>
	      	{$lang['用户名']}：{$server['用户名']}<br>
	      	{$lang['密码']}：{$server['密码']}
	      </td>
	    </tr>
{/if}
	    <tr>
	      <td>{$lang['产品名称']}</td>
	      <td>
	      	{$goods['名称']}
	      </td>
	    </tr>
{if $server['ip地址']!=''}
		<tr>
	      <td>{$lang['IP解析']}</td>
	      <td>{$server['ip地址']}</td>
	    </tr>
{/if}
{if $server['专用IP']!=''}
		<tr>
	      <td>{$lang['专用IP']}</td>
	      <td>{$server['专用IP']}</td>
	    </tr>
{/if}
{if $server['指定IP']!=''}
		<tr>
	      <td>{$lang['指定IP']}</td>
	      <td>{$server['指定IP']}</td>
	    </tr>
{/if}
{if $server['主机名']!=''}
	    <tr>
	      <td>{$lang['CNAME解析']}</td>
	      <td>{$server['主机名']}</td>
	    </tr>
{/if}
{if $server['DNS服务器1']!='' or $server['DNS服务器2']!='' or $server['DNS服务器3']!='' or $server['DNS服务器4']!='' or $server['DNS服务器5']!=''}
		<tr>
	      <td>{$lang['DNS解析(NS)']}</td>
	      <td>
	      	{if $server['DNS服务器1']!=''}{$server['DNS服务器1']}{/if}
			{if $server['DNS服务器2']!=''}<br>{$server['DNS服务器2']}{/if}
			{if $server['DNS服务器3']!=''}<br>{$server['DNS服务器3']}{/if}
			{if $server['DNS服务器4']!=''}<br>{$server['DNS服务器4']}{/if}
			{if $server['DNS服务器5']!=''}<br>{$server['DNS服务器5']}{/if}
	      </td>
	    </tr>
{/if}
	    <tr>
	      <td>{$lang['价格 / 周期']}</td>
	      <td>{$goods['价格']}{if $goods['价格']!='免费'} {$c['交易币名称']}{/if} / {$server['周期']}</td>
	    </tr>
{if $server['开通时间']!=''}
	    <tr>
	      <td>{$lang['开通时间']}</td>
	      <td>{$server['开通时间']}</td>
	    </tr>

{/if}
{if $server['到期时间']!=''}
	    <tr>
	      <td>{$lang['到期时间']}</td>
	      <td>{$server['到期时间']}</td>
	    </tr>
{/if}
{foreach from=$options item=option}
		<tr>
	      <td>{$option['名称']}</td>
	      <td>{$option['值']}</td>
	    </tr>
{/foreach}
{foreach from=$configs item=config}
		<tr>
	      <td>{$config['名字']}</td>
	      <td>{$config['内容']}</td>
	    </tr>
{/foreach}
	    <tr>
	      <td>{$lang['状态']}</td>
	      <td>
	  		{if $server['状态']=='激活'}<span class="label label-success">{$lang['激活']}</span>{elseif $server['状态']=='暂停'}<span class="label label-warning">{$lang['暂停']}</span>{else}<span class="label label-info">{$server['状态']}</span>{/if}
	      </td>
	    </tr>
	  </tbody>
	</table>
	  
<!--END CONTENT-->
</div>

{include file="client_footer.tpl"}