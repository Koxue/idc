{include file="header.tpl" navxz=''}
{include file="alert.tpl"}

    <div class="blog">
        <div class="row">
{include file="user_left.tpl" title=$lang['用户中心']}
{if $s['是否已经登陆']=='是'}
<div class="col-sm-8">
{else}
<div class="col-sm-12">
{/if}