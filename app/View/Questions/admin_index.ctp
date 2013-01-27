<div class="row">
    <div class="span3">
       <?php echo $this->element('Users/admin_sidebar'); ?>
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
							<th><?php echo $this->Paginator->sort('topic_id');?></th>
							<th><?php echo $this->Paginator->sort('title');?></th>			
							<th><?php echo $this->Paginator->sort('answer');?></th>
							<th class="actions"><?php echo __('Actions');?></th>
					</tr>
					<?php
					foreach ($questions as $question): ?>
					<tr>
						<td><?php echo h($question['Question']['id']); ?>&nbsp;</td>
						<td>
							<?php echo $this->Html->link($question['Topic']['name'], array('controller' => 'topics', 'action' => 'view', $question['Topic']['id'])); ?>
						</td>
						<td>
							<strong><?php echo h($question['Question']['title']); ?></strong><br />
							<dl class="dl-horizontal">
							  	<dt>1)</dt><dd><?php echo h($question['Question']['option_1']); ?></dd>
							  	<dt>2)</dt><dd><?php echo h($question['Question']['option_2']); ?></dd>
							  	<dt>3)</dt><dd><?php echo h($question['Question']['option_3']); ?></dd>
							  	<dt>4)</dt><dd><?php echo h($question['Question']['option_4']); ?></dd>
							  	<dt>5)</dt><dd><?php echo h($question['Question']['option_5']); ?></dd>
							</dl>
						</td>
						<td><?php
				            $i = 0;
							foreach (unserialize($question['Question']['answer']) as $key => $answer) {
								
								if($i == 0) {
				                     if($answer) { echo $key; $i++;}
				                
								} else {
									 if($answer) { echo ', '.$key;}
								}
							
						} ?>&nbsp;</td>
						<td class="actions span2">
							<?php echo $this->Html->link(__('View'), array('action' => 'view', $question['Question']['id']), array('class' => 'btn btn-mini btn-info')); ?>
							<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $question['Question']['id']), array('class' => 'btn btn-mini btn-success')); ?>
							<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $question['Question']['id']), array('class' => 'btn btn-mini btn-danger'), __('Are you sure you want to delete # %s?', $question['Question']['id'])); ?>
						</td>
					</tr>
				<?php endforeach; ?>
				</table>
		</div>
	</div>
</div>
<?php echo $this->Html->css('Question/admin_index', null, array('inline' => false)) ?>