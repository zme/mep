<div class="row">
    <div class="span3">
       <?php echo $this->element('Users/admin_sidebar'); ?>
    </div>
    <div class="span9">
		<h1 class="page-title"><?php echo __d('users', 'Users'); ?></h1>
		<div class="widget">
			<div class="widget-header"><h3><?php echo '<i class="icon-search"></i>&nbsp;&nbsp;'.__d('users', 'Filter users'); ?></h3></div>
			<div class="widget-content">
				<?php echo $this->Form->create($model, array('action' => 'index', 'class' => 'form-inline')); ?>
				<?php echo $this->Form->text('username', array('placeholder' => __d('users', 'Username'), 'class' => 'span3')); ?>
				<?php echo $this->Form->text('email', array('placeholder' => __d('users', 'Email'), 'class' => 'span3')); ?>
				<?php echo $this->Form->button('<i class="icon-search"></i>&nbsp;&nbsp;Search', array('class' => 'btn btn-success', 'escape' => false, 'type' => 'submit')); ?>
				<?php echo $this->Form->end(); ?>		
			</div>
		</div>
		

		<?php echo $this->element('paging'); ?>
		<div class="widget widget-table">
			<div class="widget-header"><h3><?php echo '<i class="icon-table"></i>&nbsp;&nbsp;'.__d('users', 'All users'); ?></h3></div>
			<div class="widget-content">
				<table class="table table-striped table-bordered">
					<tr>
						<th><?php echo $this->Paginator->sort('username'); ?></th>
						<th><?php echo $this->Paginator->sort('email'); ?></th>
						<th><?php echo $this->Paginator->sort('email_verified'); ?></th>
						<th><?php echo $this->Paginator->sort('active'); ?></th>
						<th><?php echo $this->Paginator->sort('created'); ?></th>
						<th class="actions"><?php echo __d('users', 'Actions'); ?></th>
					</tr>
						<?php
						$i = 0;
						foreach ($users as $user):
							$class = null;
							if ($i++ % 2 == 0) {
								$class = ' class="altrow"';
							}
						?>
						<tr<?php echo $class;?>>
							<td>
								<?php echo $user[$model]['username']; ?>
							</td>
							<td>
								<?php echo $user[$model]['email']; ?>
							</td>
							<td>
								<?php echo $user[$model]['email_verified'] == 1 ? __d('users', 'Yes') : __d('users', 'No'); ?>
							</td>
							<td>
								<?php echo $user[$model]['active'] == 1 ? __d('users', 'Yes') : __d('users', 'No'); ?>
							</td>
							<td>
								<?php echo date("M j, Y g:i a", strtotime($user[$model]['created'])); ?>
							</td>
							<td class="actions span2">
								<?php echo $this->Html->link('<i class="icon-ok"></i>&nbsp;', array('action'=>'view', $user[$model]['id']), array('class' => 'btn btn-small btn-success', 'escape' => false)); ?>
								<?php echo $this->Html->link('<i class="icon-pencil"></i>&nbsp;', array('action'=>'edit', $user[$model]['id']), array('class' => 'btn btn-small btn-info', 'escape' => false)); ?>
								<?php echo $this->Html->link('<i class="icon-remove"></i>&nbsp;', array('action'=>'delete', $user[$model]['id']), array('class' => 'btn btn-small btn-danger', 'escape' => false), sprintf(__d('users', 'Are you sure you want to delete # %s?'), $user[$model]['id'])); ?>
							</td>
						</tr>
					<?php endforeach; ?>
				</table>
			</div>
		</div>
	</div>
</div>
<?php //echo $this->element('Users/admin_sidebar'); ?>