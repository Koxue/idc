      <div class="panel">
        <div class="top primary"><i class="batch-big b-database"></i>
          <h6>{$lang['空间限制']}</h6>
        </div>
        <div class="bottom">
          <h2>{if $pserver['磁盘限制']=='-1'}unlimit{else}{$pserver['磁盘限制']}{/if}</h2>
          <h6>MB</h6>
        </div>
      </div>
      <div class="panel">
        <div class="top warning"><i class="batch-big b-flag"></i>
          <h6>{$lang['已用空间']}</h6>
        </div>
        <div class="bottom">
          <h2>{$pserver['磁盘使用']}</h2>
          <h6>MB</h6>
        </div>
      </div>
      <div class="panel">
        <div class="top purple"><i class="batch-big b-wifi"></i>
          <h6>{$lang['流量限制']}</h6>
        </div>
        <div class="bottom">
          <h2>{if $pserver['流量限制']=='-1'}unlimit{else}{$pserver['流量限制']}{/if}</h2>
          <h6>MB</h6>
        </div>
      </div>
      <div class="panel">
        <div class="top info"><i class="batch-big"></i>
          <h6>{$lang['已用流量']}</h6>
        </div>
        <div class="bottom">
          <h2>{$pserver['流量使用']}</h2>
          <h6>MB</h6>
        </div>
      </div>
      <div class="panel">
        <div class="top success"><i class="batch-big b-code"></i>
          <h6>{$lang['控制面板']}</h6>
        </div>
        <div class="bottom">
          <h2>CPANEL</h2>
          <h6>Control panel</h6>
        </div>
      </div>