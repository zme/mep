<div class="row">
    <div class="span3">
       <?php echo $this->element('Users/sidebar'); ?>
    </div>
    <div class="span9">
		<h1 class="page-title"><?php echo __('Questions');?></h1>
		<?php echo $this->element('paging'); ?>
		<div class="widget widget-table">
            <div class="widget-header"><h3><?php echo '<i class="icon-table"></i>&nbsp;&nbsp;'.__('All Questions'); ?></h3></div>
            <div class="widget-content">
				<table class="table table-striped table-condensed table-bordered">
					<tr>
							<th><?php echo $this->Paginator->sort('id');?></th>
							<th><?php echo $this->Paginator->sort('code');?></th>
							<th><?php echo $this->Paginator->sort('created');?></th>
							<th><?php echo $this->Paginator->sort('Status');?></th>
				            <th><?php echo $this->Paginator->sort('Score');?></th>
							<th class="actions"><?php echo __('Actions');?></th>
					</tr>
					<?php
					foreach ($tests as $test): ?>
					<tr>
						<td><?php echo h($test['Test']['id']); ?>&nbsp;</td>
						<td><?php echo h($test['Test']['code']); ?>&nbsp;</td>
						<td><?php echo h($test['Test']['created']); ?>&nbsp;</td>
				        <?php if (empty($test['Test']['started'])): ?>
						<td><?php echo __('Submitted'); ?>&nbsp;</td>
				        <td><?php echo __($test['Test']['score']['totalScore'].'/'. $test['Test']['score']['totalQuestions']); ?>&nbsp;</td>
				        <?php else: ?>
				        <td><?php echo __('Not submitted'); ?>&nbsp;</td>
				        <td><?php echo __('--'); ?>&nbsp;</td>
				        <?php endif; ?>
						<td class="actions">
				            <?php echo $this->Html->link(__('Review'), array('action' => 'review', $test['Test']['id'])); ?>
				            <?php echo $this->Html->link(__('Auto Review'), array('action' => 'auto_review', $test['Test']['id'])); ?>
							<?php echo $this->Html->link(__('View'), array('action' => 'view', $test['Test']['id'])); ?>
							<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $test['Test']['id'])); ?>
							<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $test['Test']['id']), null, __('Are you sure you want to delete # %s?', $test['Test']['id'])); ?>
						</td>
					</tr>
				<?php endforeach; ?>
				</table>
		</div>
	</div>
</div>