<div id="boxForm">
	<?php echo $this->element('info', array('message' => __d('users', 'Please enter your old password because of security reasons and then your new password twice.'))); ?>
    <?php echo $this->Session->flash('flash', array('element' => 'info')); ?>
    <div id="main-header">
        <h3><?php echo __d('users', 'Change your password'); ?></h3>
    </div>    
    <?php echo $this->Session->flash('auth', array('element' => 'error')); ?>
    <div id="boxForm-content" class="clearfix">
        <?php echo $this->Form->create('User', array(array('action' => 'change_password'), 'inputDefaults' => array('error' => array('attributes' => array('class' => 'text-error')))));?>   
        <fieldset>
        <?php
            echo $this->Form->input('old_password', array(
				'label' => __d('users', '<i class="icon-key"></i>&nbsp;&nbsp;Old Password'),
				'type' => 'password'));
			echo $this->Form->input('new_password', array(
				'label' => __d('users', '<i class="icon-key"></i>&nbsp;&nbsp;New Password'),
				'type' => 'password'));
			echo $this->Form->input('confirm_password', array(
				'label' => __d('users', '<i class="icon-key"></i>&nbsp;&nbsp;Confirm'),
				'type' => 'password'));
        ?>
        </fieldset>
        <hr>
        <div class="pull-right">
            <?php echo $this->Form->button('<i class="icon-group"></i>&nbsp;&nbsp;Submit', array('class' => 'btn btn-success btn-large', 'escape' => false, 'type' => 'submit'));                
            ?>
        </div>
        <?php echo $this->Form->end();?>
    </div>
</div>