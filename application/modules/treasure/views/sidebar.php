<div class="sidebar-nav">
    <div class="well" style="width:300px; padding: 8px 0;">
        <ul class="nav nav-list">
          <li class="nav-header">User Menu</li>
          <li <?php if ($item==1){ echo "class='active'";} ?>><a href="<?php echo base_url() ?>treasure"><i class="icon-home"></i> Dashboard</a></li>
          <li <?php if ($item==2){ echo "class='active'";} ?>><a href="<?php echo base_url() ?>treasure/leaderboard"><i class="icon-home"></i> Leader board</a></li>
          <li <?php if ($item==3){ echo "class='active'";} ?>><a href="<?php echo base_url() ?>treasure/rules"><i class="icon-home"></i> Rules</a></li>
          <li <?php if ($item==4){ echo "class='active'";} ?>><a href="<?php echo base_url() ?>treasure/halloffame"><i class="icon-envelope"></i> Hall of fame</a></li>
          <li <?php if ($item==5){ echo "class='active'";} ?>><a href="<?php echo base_url() ?>treasure/forum"><i class="icon-comment"></i> Forum<span class="badge badge-info">10</span></a></li>
          <li class="divider"></li>
          <li><a href="<?php echo base_url() ?>auth/logout"><i class="icon-share"></i> Logout</a></li>
        </ul>
    </div>
</div>