<div class="row">
    <div class="span3">
       <?php echo $this->element('Users/admin_sidebar'); ?>
    </div>
    <div class="span9">
		<h1 class="page-title"><?php echo __('Subjects');?></h1>
		<?php echo $this->element('paging'); ?>
		<div class="widget widget-table">
            <div class="widget-header"><h3><?php echo '<i class="icon-table"></i>&nbsp;&nbsp;'.__('All Subjects'); ?></h3></div>
            <div class="widget-content">
            	<table class="table table-condensed table-striped table-bordered">
				<tr>			
					<th><?php echo $this->Paginator->sort('name');?></th>
					<th class="actions"><?php echo __('Actions');?></th>
				</tr>
				<?php
				foreach ($subjects as $subject): ?>
				<tr>					
					<td><?php echo h($subject['Subject']['name']); ?>&nbsp;</td>		
					<td class="actions span2">
						<?php echo $this->Html->link('<i class="icon-ok"></i>&nbsp;', array('action' => 'view', $subject['Subject']['id'], 'admin' => true), array('class' => 'btn btn-info btn-mini', 'escape' => false)); ?>
						<?php echo $this->Html->link('<i class="icon-pencil"></i>&nbsp;', array('action' => 'edit', $subject['Subject']['id']), array('class' => 'btn btn-success btn-mini', 'escape' => false)); ?>
						<?php echo $this->Form->postLink('<i class="icon-remove"></i>&nbsp;', array('action' => 'delete', $subject['Subject']['id']), array('class' => 'btn btn-danger btn-mini', 'escape' => false), __('Are you sure you want to delete # %s?', $subject['Subject']['id'])); ?>
					</td>
				</tr>
			<?php endforeach; ?>
				</table>				
            </div>
        </div>		
	</div>
</div>