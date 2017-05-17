{if $alert['warning'] != ""}<div class="note note-warning"><h4 class="box-heading">{$lang['警告']}</h4><p>{$alert['warning']}</p></div>{/if}
{if $alert['error'] != ""}<div class="note note-danger"><h4 class="box-heading">{$lang['错误']}</h4><p>{$alert['error']}</p></div>{/if}
{if $alert['success'] != ""}<div class="note note-success"><h4 class="box-heading">{$lang['成功']}</h4><p>{$alert['success']}</p></div>{/if}
{if $alert['info'] != ""}<div class="note note-info"><h4 class="box-heading">{$lang['信息']}</h4><p>{$alert['info']}</p></div>{/if}