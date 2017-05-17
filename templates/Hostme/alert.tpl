{if $alert['success'] != ""}<div class="alert alert-success alert-dismissable"><button type="button" data-dismiss="alert" aria-hidden="true" class="close">×</button><strong>{$lang['成功']}: </strong> {$alert['success']}</div>{/if}
{if $alert['warning'] != ""}<div class="alert alert-warning alert-dismissable"><button type="button" data-dismiss="alert" aria-hidden="true" class="close">×</button><strong>{$lang['警告']}: </strong> {$alert['warning']}</div>{/if}
{if $alert['error'] != ""}<div class="alert alert-danger alert-dismissable"><button type="button" data-dismiss="alert" aria-hidden="true" class="close">×</button><strong>{$lang['错误']}: </strong> {$alert['error']}</div>{/if}
{if $alert['info'] != ""}<div class="alert alert-info"><strong>{$lang['信息']}: </strong> {$alert['info']}</div>{/if}



