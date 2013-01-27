<div class="row">
    <div class="span3">
       <?php echo $this->element('Users/admin_sidebar'); ?>
    </div>
    <div class="span9">
        <h1 class="page-title"><?php echo __('Add Subject'); ?></h1>
        <div class="widget">
            <div class="widget-header"><h3><?php echo __('Add New Subject'); ?></h3></div>
            <div class="widget-content">
                <?php echo $this->Form->create('Subject', array('inputDefaults' => array('error' => array('attributes' => array('class' => 'text-error')))));?>
                <?php echo $this->Form->input('name', array('label' => false, 'class' => 'span8', 'placeholder' => 'Subject name')); ?>
                <?php echo $this->Form->button('<i class="icon-save"></i>&nbsp;&nbsp;Save', array('class' => 'btn btn-success', 'escape' => false, 'type' => 'submit'));                
                ?>
                <?php echo $this->Form->end();?>               
            </div>
        </div>
        
    </div>
</div>