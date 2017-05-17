{include file="header.tpl" navxz='3' title=$lang['公告信息'] hostname=$c['网站名称']}{include file="alert.tpl"}

    <!-- Breadcrumps -->
    <div class="breadcrumbs">
        <div class="row">
            <div class="col-sm-6">
                <h1>{$lang['公告信息']}</h1>
            </div>

        </div>
    </div>
    <!-- End of Breadcrumps -->

    <!-- Login -->
    <section class="elements">

        <div class="row">
            <div class="col-sm-12 post-content">

                <!-- Columns -->
                <h2 class="elements">{$e['公告标题']}</h2>
<div class="thedate">{$lang['时间']}: {$e['公告时间']} {$lang['作者']}: {$e['公告作者']}</div>
<hr>
                <div class="row">
                        <p>{$e['公告内容']}</p>

                </div>
                <!-- End of Columns -->

                

                </div>
            </div>
          
    </section>
    <!-- End of Elements -->

{include file="footer.tpl"}