<ul id="sidebar" class="nav nav-tabs nav-stacked">
    <li class="<?php echo ('tests' == $this->params['controller'] && 'admin_dashboard' == $this->params['action']) ? 'active' : '' ?>">
        <?php echo $this->Html->link('<i class="icon-bar-chart"></i><i class="icon-dashboard"></i>&nbsp;&nbsp;'.__d('users', 'Dashboard'), array('plugin' => false, 'admin' => true,'controller' => 'tests', 'action' => 'dashboard'), array('escape' => false)); ?>
    </li>
    <!-- Users -->
    <li class="<?php echo ('users' == $this->params['controller'] && 'admin_index' == $this->params['action']) ? 'active' : '' ?>">
        <?php echo $this->Html->link('<i class="icon-list"></i><i class="icon-group"></i>&nbsp;&nbsp;'.__d('users', 'List Users'), array('plugin' => false, 'admin' => true,'controller' => 'users', 'action' => 'index'), array('escape' => false)); ?>
    </li>
    <!-- <li class="<?php echo ('users' == $this->params['controller'] && 'admin_add' == $this->params['action']) ? 'active' : '' ?>">
        <?php echo $this->Html->link('<i class="icon-pencil"></i>'.__d('users', 'Add User'), array('plugin' => false, 'admin' => true,'controller' => 'users', 'action' => 'add'), array('escape' => false)); ?>
    </li> -->
    <!-- Subjects -->
    <li class="<?php echo ('subjects' == $this->params['controller'] && 'admin_index' == $this->params['action']) ? 'active' : '' ?>">
        <?php echo $this->Html->link('<i class="icon-list"></i><i class="icon-book"></i>&nbsp;&nbsp;'.__d('users', 'List Subject'), array('plugin' => false, 'admin' => true,'controller' => 'subjects', 'action' => 'index'), array('escape' => false)); ?>
    </li>
    <li class="<?php echo ('subjects' == $this->params['controller'] && 'admin_add' == $this->params['action']) ? 'active' : '' ?>">
        <?php echo $this->Html->link('<i class="icon-save"></i><i class="icon-book"></i>&nbsp;&nbsp;'.__d('users', 'Add Subject'), array('plugin' => false, 'admin' => true,'controller' => 'subjects', 'action' => 'add'), array('escape' => false)); ?>
    </li>
    <!-- Topics -->
    <li class="<?php echo ('topics' == $this->params['controller'] && 'admin_index' == $this->params['action']) ? 'active' : '' ?>">
        <?php echo $this->Html->link('<i class="icon-list"></i><i class="icon-tag"></i>&nbsp;&nbsp;'.__d('users', 'List Topics'), array('plugin' => false, 'admin' => true,'controller' => 'topics', 'action' => 'index'), array('escape' => false)); ?>
    </li>
    <li class="<?php echo ('topics' == $this->params['controller'] && 'admin_add' == $this->params['action']) ? 'active' : '' ?>">
        <?php echo $this->Html->link('<i class="icon-save"></i><i class="icon-tag"></i>&nbsp;&nbsp;'.__d('users', 'Add Topics'), array('plugin' => false, 'admin' => true,'controller' => 'topics', 'action' => 'add'), array('escape' => false)); ?>
    </li>

    <!-- Questions -->
    <li class="<?php echo ('questions' == $this->params['controller'] && 'admin_index' == $this->params['action']) ? 'active' : '' ?>">
        <?php echo $this->Html->link('<i class="icon-list"></i><i class="icon-question-sign"></i>&nbsp;&nbsp;'.__d('users', 'List Questions'), array('plugin' => false, 'admin' => true,'controller' => 'questions', 'action' => 'index'), array('escape' => false)); ?>
    </li>
    <li class="<?php echo ('questions' == $this->params['controller'] && 'admin_add' == $this->params['action']) ? 'active' : '' ?>">
        <?php echo $this->Html->link('<i class="icon-save"></i><i class="icon-question-sign"></i>&nbsp;&nbsp;'.__d('users', 'Add Question'), array('plugin' => false, 'admin' => true,'controller' => 'questions', 'action' => 'add'), array('escape' => false)); ?>
    </li>

    <!-- Tests -->
    <li class="<?php echo ('tests' == $this->params['controller'] && 'admin_index' == $this->params['action']) ? 'active' : '' ?>">
        <?php echo $this->Html->link('<i class="icon-list"></i><i class="icon-tasks"></i>&nbsp;&nbsp;'.__d('users', 'List Tests'), array('plugin' => false, 'admin' => true,'controller' => 'tests', 'action' => 'index'), array('escape' => false)); ?>
    </li>
    <li class="<?php echo ('tests' == $this->params['controller'] && 'admin_add' == $this->params['action']) ? 'active' : '' ?>">
        <?php echo $this->Html->link('<i class="icon-save"></i><i class="icon-tasks"></i>&nbsp;&nbsp;'.__d('users', 'Add Test'), array('plugin' => false, 'admin' => true,'controller' => 'tests', 'action' => 'add'), array('escape' => false)); ?>
    </li>
</ul>