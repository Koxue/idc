{if $alert['warning'] != ""}
<div class="alert alert-warning">
  <button type="button" data-dismiss="alert" class="close">&times;</button><strong>{$lang['警告']}: </strong>{$alert['warning']}
</div>
{/if}
{if $alert['error'] != ""}
<div class="alert alert-error">
  <button type="button" data-dismiss="alert" class="close">&times;</button><strong>{$lang['错误']}: </strong>{$alert['error']}
</div>
{/if}
{if $alert['success'] != ""}
<div class="alert alert-success">
  <button type="button" data-dismiss="alert" class="close">&times;</button><strong>{$lang['成功']}: </strong>{$alert['success']}
</div>
{/if}
{if $alert['info'] != ""}
<div class="alert alert-info">
  <button type="button" data-dismiss="alert" class="close">&times;</button><strong>{$lang['信息']}: </strong>{$alert['info']}
</div>
{/if}