{include file="header.tpl" navxz='' title=$lang['提交服务单'] hostname=$c['网站名称']}{include file="alert.tpl"}
  <!-- Breadcrumps -->
  <div class="breadcrumbs">
    <div class="row">
      <div class="col-sm-6">
        <h1>{$lang['提交服务单']}[<a href="{$ROOT}/ticket/index/" style="color:#F7F7F7;">{$lang['查看服务单']}</a>]</h1>
      </div>
    </div>
  </div>
  
  
  
  
  
     <section class="contact">
        <div class="row">
            <div class="col-sm-12">
                <h3>{$lang['提交服务单']}</h3>
                <div id="sendstatus"></div>
<div id="contactform">



<form method="post" action="">

            <p><label for="name">{$lang['姓名']}:*</label> <input type="text" class="form-control" name="name" id="name" tabindex="1" /></p>
            <p><label for="email">{$lang['电子邮件']}:*</label> <input type="text" class="form-control" name="email" id="email" tabindex="2" /></p>
            <p><label for="comments">{$lang['主题']}:*</label> <input type="text" class="form-control" name="subject" id="email" tabindex="2" /></p>
            <p><label for="comments">{$lang['内容']}:*</label> <textarea  class="form-control" name="message" id="comments" cols="12" rows="6" tabindex="3"></textarea></p>
            <p><input name="submit" type="submit" id="submit" class="submit" value="{$lang['提交']}" tabindex="4" /></p>

</form>
</div>
            </div>

 
        </div>
    </section>
    <!-- End of Contact  -->
 
  
  
  
  
  
    {include file="footer.tpl"}