{include file="header.tpl" navxz='5' title=$lang['用户中心'] hostname=$c['网站名称']}{include file="alert.tpl"}
    <div class="blog">
        <div class="row">
{include file="user_left.tpl" title=$lang['用户中心']}

<div class="col-sm-8">

                <!-- Blog Post-->
                <article>
                    <div class="post-content">
                        <h2><a href="">{$lang['用户中心']}</a></h2>
                        <hr/> <form  method="post">
                       <table class="products-table responsive wow fadeInUp tablesaw tablesaw-stack" data-mode="stack">
         <thead>
		<tr>
			<th>{$lang['姓名']}</th>
			<td><input class="form-control" name="name" type="text" value="{$s['登陆姓名']}"/></td>
		</tr>
		<tr>
			<th>{$lang['国家']}</th>
			<td><select class="form-control" name="country" id="country">
			  {foreach from=$countrys item=country}
			  <option value="{$country}"{if $s['登陆国家']==$country} selected="selected"{/if}>{$country}</option>
{/foreach}</select></td>
		</tr>
		<tr>
			<th>{$lang['地址']}</th>
			<td> <input class="form-control" name="address" type="text" value="{$s['登陆地址']}"/></td>
		</tr>
		<tr>
			<th>{$lang['邮编']}</th>
			<td><input class="form-control" name="zip" type="text" value="{$s['登陆邮编']}"/></td>
		</tr>

		<tr>
			<th>{$mlang['操作']}</th>
			<td><button class="btn btn-primary">{$lang['修改个人信息']}</button></td>
		</tr>
		</thead>
        </table></form>
					   
                    </div>
                </article>
                <!-- End of Blog Post-->


            </div>







      </div>
    </div>
{include file="footer.tpl"}