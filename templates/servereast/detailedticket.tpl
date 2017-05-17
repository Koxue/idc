{include file="header.tpl" navxz='' title=$lang['服务单详情'] hostname=$c['网站名称']}{include file="alert.tpl"}
 
  <div class="breadcrumbs">
    <div class="row">
      <div class="col-sm-6">
        <h1>{$lang['服务单详情']}[<a href="{$ROOT}/ticket/index/"style="color:#F7F7F7;">{$lang['查看服务单']}</a>]</h1>
      </div>
    </div>
  </div>

<div class="blog single">
    <div class="row">
            <div class="col-sm-12">

            <!-- Blog Post-->
            <article>
            
            <div class="post-content">
            <h2><a href="">{$lang['工单标题']}： {$t['主题']}  </a></h2>
            <div class="thedate tagcloud">
<a href="">{$lang[$t['状态']]}</a>			
<a href="">{$lang['提交时间']}： {$t['提交时间']}</a>
<a href="">{$lang['最后时间']}： {$t['最后时间']}</a>

</div>
         
            </div>
            </article>
            <!-- End of Blog Post-->
<style type="text/css">
@media (max-width: 768px){
.acol-sm-2 {
width: 0%;
}
}
</style>
<!-- AUTHOR BOX -->
{foreach from=$tks item=tk}
<div class="author-wrap">
<div class="row">

{if $tk['回复类型']=='1'}<div class="col-sm-2 acol-sm-2">
<div class="author-gravatar"><img src="{$templatedir}/images/testimonial1.jpg" alt=""></div>
</div>{/if}
<div class="col-sm-10">
<div class="author-info">
<div class="author author-title" {if $tk['回复类型']=='2'}style="text-align:right;"{/if}>
<h6>
{if $tk['回复类型']=='1'}用户:{$tk['名字']} (ID: {$tk['用户id']}){/if}
{if $tk['回复类型']=='2'}客服:{$tk['名字']} (ID: {$tk['客服id']}){/if}
</h6>
<div class="comment-time"><a href="">{$tk['时间']}</a></div>

</div>
<div class="author-description"><p>{$tk['信息']}</p></div>
</div>
</div>

{if $tk['回复类型']=='2'}<div class="col-sm-2 acol-sm-2">
<div class="author-gravatar"><img src="{$templatedir}/images/testimonial2.jpg" alt=""></div>
</div>{/if}
</div>
</div>




{/foreach}

<!-- END OF AUTHOR BOX -->


    <div id="addcomments">
    <div id="respond" class="comment-respond">
    <form action="" method="post" id="commentform" class="comment-form">
    <p class="comment-form-comment"><label for="comment">{$lang['工单回复']}</label>  <textarea id="comment" class="form-control" name="reply" cols="45" rows="8"></textarea></p>
    <p class="form-submit"><input name="submit" type="submit" id="submit" class="submit" value="{$lang['回复']}"></p>
    </form>
    </div><!-- #respond -->
    </div>

        </div>

        

        </div>
</div>

				
           
{include file="footer.tpl"}