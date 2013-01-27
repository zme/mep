<div id="boxForm">
    <?php echo $this->Session->flash('flash', array('element' => 'info')); ?>
    <div id="main-header">
        <h3><?php echo __d('users', 'Sign Up'); ?></h3>        
    </div>    
    <?php echo $this->Session->flash('auth', array('element' => 'error')); ?>
    <div id="boxForm-content" class="clearfix">
        <?php echo $this->Form->create('User', array('inputDefaults' => array('error' => array('attributes' => array('class' => 'text-error')))));?>   
        <fieldset>
        <?php
            echo $this->Form->input('username', array(
                'label' => __d('users', '<i class="icon-user"></i>&nbsp;&nbsp;Username')));
            echo $this->Form->input('email', array(
                'label' => __d('users', '<i class="icon-envelope"></i>&nbsp;&nbsp;E-mail (used as login)'),
                'error' => array('attributes' => array('class' => 'text-error'),
                    'isValid' => __d('users', 'Must be a valid email address'),
                    'isUnique' => __d('users', 'An account with that email already exists'))));
            echo $this->Form->input('password', array(
                'label' => __d('users', '<i class="icon-key"></i>&nbsp;&nbsp;Password'),
                'type' => 'password'));
            echo $this->Form->input('temppassword', array(
                'label' => __d('users', '<i class="icon-key"></i>&nbsp;&nbsp;Password (confirm)'),
                'type' => 'password'));
            $tosLink = $this->Html->link(__d('users', 'Terms of Service'), array('controller' => 'pages', 'action' => 'tos'));
            echo $this->Form->input('tos', array(
                'label' => __d('users', 'I have read and agreed to ') . $tosLink));
        ?>
        </fieldset>
        <hr>
        <div class="pull-right">
            <?php echo $this->Form->button('<i class="icon-group"></i>&nbsp;&nbsp;Sign Up', array('class' => 'btn btn-success btn-large', 'escape' => false, 'type' => 'submit'));                
            ?>
        </div>
        <?php echo $this->Form->end();?>
    </div>
</div>