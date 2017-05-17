{include file="header.tpl" navxz='5' title=$lang['登陆'] hostname=$c['网站名称']}
{include file="alert.tpl"}


    <!-- Login -->
    <section class="login">

        <div class="row spacing-40">
            <div class="col-sm-12">
                <div class="login-form-panel">
                    <h3 class="badge">{$lang['客户中心']} - {$lang['用户登陆']}</h3>


                    <div class="row">
                        <div class="col-sm-5 center-block">
                            <div class="login-form">
                                <form method="post" action="">
                                    <input type="text" name="swapname" size="50" placeholder="{$lang['用户名']}" />
                                    <input type="password" name="swappass" size="20" placeholder="{$lang['密码']}" />
                                    <input type="submit" value="{$lang['登陆']}" />
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                       
                            <p class="text-center"><a href="{$ROOT}/index/register/" class="btn">{$lang['注册']}</a><br>{$plug['登入页底部']}</p>

                       
                    </div>

                </div>

            </div>

        </div>
    </section>
    <!-- End of Login -->

{include file="footer.tpl"}