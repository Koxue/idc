{include file="header.tpl" navxz='5' title=$lang['修改密码'] hostname=$c['网站名称']}{include file="alert.tpl"}
    <div class="blog">
        <div class="row">
{include file="user_left.tpl" title=$lang['修改密码']}

<div class="col-sm-8">

                <!-- Blog Post-->
                <article>
                    <div class="post-content">
                        <h2><a href="">{$lang['修改密码']}</a></h2>
                        <hr/> <form class="form-horizontal" method="post">
                       <table class="products-table responsive wow fadeInUp tablesaw tablesaw-stack" data-mode="stack">
         <thead>
		<tr>
			<th>{$lang['密码']}</th>
			<td><input class="form-control" name="password" type="password" data-required="true" placeholder="{$lang['输入您的密码']}" id="inputPassword"/></td>
		</tr>

		<tr>
			<th>{$lang['新密码']}</th>
			<td><input class="form-control" name="newpassword" type="password" data-required="true" placeholder="{$lang['输入您的新密码']}" id="inputNewpass" /></td>
		</tr>
		<tr>
			<th>{$lang['重复新密码']} </th>
			<td><input class="form-control" name="renewpassword" type="password" data-required="true" placeholder="{$lang['再次输入您的新密码']}" id="inputRenewpass"/></td>
		</tr>

		<tr>
			<th>{$mlang['操作']}</th>
			<td><button type="submit" data-loading-text="{$lang['修改中...']}" class="btn btn-primary">{$lang['修改']}</button></td>
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