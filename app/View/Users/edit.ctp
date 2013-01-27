<div id="boxForm">
    <?php echo $this->Session->flash('flash', array('element' => 'info')); ?>
    <div id="main-header">
        <h3><?php echo __d('users', 'Edit Profile'); ?></h3>
    </div>    
    <?php echo $this->Session->flash('auth', array('element' => 'error')); ?>
    <div id="boxForm-content" class="clearfix">
        <?php echo $this->Form->create('User', array('inputDefaults' => array('error' => array('attributes' => array('class' => 'text-error')))));?>   
        <fieldset>
        <?php
            echo $this->Form->input('first_name', array(
                'label' => __d('users', '<i class="icon-user"></i>&nbsp;&nbsp;First Name')));
            echo $this->Form->input('last_name', array(
                'label' => __d('users', '<i class="icon-user"></i>&nbsp;&nbsp;Last Name')));
        ?>
        </fieldset>
        <hr>
        <div class="pull-right">
            <?php echo $this->Form->button('<i class="icon-group"></i>&nbsp;&nbsp;Update', array('class' => 'btn btn-success btn-large', 'escape' => false, 'type' => 'submit'));                
            ?>
        </div>
        <?php echo $this->Form->end();?>
    </div>
</div>