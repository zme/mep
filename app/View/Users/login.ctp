<div id="login">
    <?php echo $this->Session->flash('flash', array('element' => 'info')); ?>
    <div id="main-header">
        <h3><?php echo __d('users', 'Login to your user account'); ?></h3>        
    </div>    
    <?php echo $this->Session->flash('auth', array('element' => 'error')); ?>
    <div id="login-content" class="clearfix">
    	<?php echo $this->Form->create('User');?>   
        <fieldset>
    	<?php
            echo $this->Form->input('email', array(
                'label' => __d('users', '<i class="icon-user"></i>&nbsp;&nbsp;Email')));
            echo $this->Form->input('password',  array(
                'label' => __d('users', '<i class="icon-lock"></i>&nbsp;&nbsp;Password')));
    	?>
        <p class="pull-left"><?php echo $this->Html->link('<i class="icon-key"></i>&nbsp;Password forgotten?', array('controller' => 'users', 'action' => 'forgot_password'), array('escape' => false)); ?></p>
        <p class="pull-right">Don't have an account yet?&nbsp;&nbsp;<?php echo $this->Html->link('Sign Up', array('controller' => 'users', 'action' => 'register')); ?></p>        
        </fieldset>
        <hr>
        <div class="pull-left">
            <?php echo $this->Html->link(__d('users', '<i class="icon-group"></i>&nbsp;&nbsp;Sign Up'), array('controller' => 'users', 'action' => 'add'), array('class' => 'btn btn-large btn-info', 'escape' => false)) ?>
        </div>
        <div class="pull-right">
            <?php echo $this->Form->button('<i class="icon-magic"></i>&nbsp;&nbsp;Login', array('class' => 'btn btn-success btn-large', 'escape' => false, 'type' => 'submit'));                
            ?>
        </div>
    	<?php echo $this->Form->end();?>
    </div>
</div>