<div class="row">
    <div class="span3">
       <?php echo $this->element('Users/admin_sidebar'); ?>
    </div>
    <div class="span9">
        <h1 class="page-title"><?php echo __('Add Topic'); ?></h1>
        <div class="widget">
            <div class="widget-header"><h3><?php echo __('Add New Subject'); ?></h3></div>
            <div class="widget-content">
                <?php echo $this->Form->create('Topic', array('inputDefaults' => array('error' => array('attributes' => array('class' => 'text-error')))));?>
                <?php echo $this->Form->input('subject_id', array('empty' => '-- Select Subject --', 'class' => 'span8', 'label' => false)); ?>
                <?php echo $this->Form->input('name', array('class' => 'span8', 'placeholder' => 'Topic name', 'label' => false)); ?>
                <?php echo $this->Form->button('<i class="icon-save"></i>&nbsp;&nbsp;Save', array('class' => 'btn btn-success', 'escape' => false, 'type' => 'submit'));                
                ?>
                <?php echo $this->Form->end();?>               
            </div>
        </div>        
    </div>
</div>