<div class="row">
    <div class="span3">
       <?php echo $this->element('Users/admin_sidebar'); ?>
    </div>
    <div class="span9">
		<h1 class="page-title"><?php echo __('Tests');?></h1>
		<?php echo $this->element('paging'); ?>
		<div class="widget widget-table">
            <div class="widget-header"><h3><?php echo '<i class="icon-table"></i>&nbsp;&nbsp;'.__('All Tests'); ?></h3></div>
            <div class="widget-content">
				<table class="table table-striped table-condensed table-bordered">
					<tr>
						<th><?php echo $this->Paginator->sort('id');?></th>
						<th><?php echo $this->Paginator->sort('Name');?></th>
						<th><?php echo $this->Paginator->sort('code');?></th>
						<th class="actions"><?php echo __('Actions');?></th>
					</tr>
					<?php foreach ($tests as $test): ?>
					<tr>		
						<td><?php echo h($test['Test']['id']); ?>&nbsp;</td>
						<td><?php echo h($test['Test']['name']); ?>&nbsp;</td>
						<td><?php echo h($test['Test']['code']); ?>&nbsp;</td>
						<td class="actions">						
							<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $test['Test']['id']),  array('class' => 'btn btn-danger btn-mini'), __('Are you sure you want to delete # %s?', $test['Test']['id'])); ?>
						</td>
					</tr>
					<?php endforeach; ?>
				</table>
			</div>
		</div>
	</div>
</div>
