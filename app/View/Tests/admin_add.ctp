<div class="row">
    <div class="span3">
       <?php echo $this->element('Users/admin_sidebar'); ?>
    </div>
    <div class="span9">
        <h1 class="page-title"><?php echo __('Create Test'); ?></h1>
        <div class="widget">
            <div class="widget-header"><h3><?php echo __('Creae new Test'); ?></h3></div>
            <div class="widget-content">
				<?php echo $this->Form->create('Test');?>
					<?php
					    echo $this->Form->input('name', array('class' => 'span8'));
						echo $this->Form->input('number_of_questions', array('class' => 'span8'));
					?>
				<div class="row">
					<div class="span12">
						<?php echo $this->Html->link('Select All Topics', '#', array('class' => 'check-all btn btn-mini btn-primary')) ?>
						<?php echo $this->Html->link('Unselect All Topics', '#', array('class' => 'uncheck-all btn-mini btn btn-info')) ?>
					</div>	
				</div>
				<br />
				<div class="tabbable tabs-left">
					<ul class="nav nav-tabs">
						<?php $count = 1; ?>
						<?php foreach ($topics as $subject => $topic): ?>
							<li class="<?php echo ($count == 1) ? 'active' : '' ; ?>"><?php echo $this->Html->link($subject, '#'.preg_replace("/[^A-Za-z0-9]/", '', $subject), array('data-toggle' => 'tab')); ?></li>
							<?php $count++; ?>
						<?php endforeach; ?>
					</ul>
					<div class="tab-content">
						<?php $count = $topicCount = 1; ?>
						<?php foreach ($topics as $subject => $topic): ?>
							<div class="tab-pane <?php echo ($count == 1) ? 'active' : '' ; ?>" id="<?php echo preg_replace("/[^A-Za-z0-9]/", '', $subject); ?>">
								<p>
									<ul class="unstyled">
									<?php foreach ($topic as $key => $value) : ?>
										<?php $checkboxOptions = array('value' => $key, 'class' => 'topic_checkbox'); ?>
										<li><?php echo $this->Form->checkbox("Test.topic_id.{$topicCount}", $checkboxOptions); echo "&nbsp; $value" ?><br /></li>
										<?php $topicCount++; ?>
									<?php endforeach; ?>				
									</ul>
								</p>
							</div>
							<?php $count++; ?>
						<?php endforeach; ?>
					</div>
				</div>
				<?php echo $this->Form->button('<i class="icon-save"></i>&nbsp;&nbsp;Save', array('class' => 'btn btn-success', 'escape' => false, 'type' => 'submit'));                
                ?>
				<?php echo $this->Form->end();?>
				</div>
				<?php echo $this->Html->script(array('Test/admin_add'), array('inline' => false)) ?>
			</div>
		</div>
	</div>
</div>