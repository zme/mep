<ul id="sidebar" class="nav nav-tabs nav-stacked">
    <li class="<?php echo ('tests' == $this->params['controller'] && 'dashboard' == $this->params['action']) ? 'active' : '' ?>">
        <?php echo $this->Html->link('<i class="icon-bar-chart"></i><i class="icon-dashboard"></i>&nbsp;&nbsp;'.__d('users', 'Dashboard'), array('plugin' => false, 'admin' => false,'controller' => 'tests', 'action' => 'dashboard'), array('escape' => false)); ?>
    </li>
    <li class="<?php echo ('tests' == $this->params['controller'] && 'index' == $this->params['action']) ? 'active' : '' ?>">
        <?php echo $this->Html->link('<i class="icon-list"></i><i class="icon-tasks"></i>&nbsp;&nbsp;'.__d('users', 'List Tests'), array('plugin' => false, 'admin' => false,'controller' => 'tests', 'action' => 'index'), array('escape' => false)); ?>
    </li>
</ul>