<div class="row">
	<div class="span4">
		<h2>The best way to improve your online exam score</h2>
		<p style="font-size:1.5em; line-height:1.8em;">My exam preparation gives you real time experience of online exam, tracks your performance, tracks your online exam habits and gives you information that helps you increase your exam score. </p>

		<?php echo $this->Html->link(__d('users', '<i class="icon-group"></i>&nbsp;&nbsp;Sign Up'), array('controller' => 'users', 'action' => 'add'), array('class' => 'btn btn-large btn-info', 'escape' => false)) ?>&nbsp;
		<?php echo $this->Html->link(__d('users', '<i class="icon-magic"></i>&nbsp;&nbsp;Login'), array('controller' => 'users', 'action' => 'login'), array('class' => 'btn btn-large btn-success', 'escape' => false)) ?>
	</div>
	<div class="span8">
		<?php //echo $this->Html->image('screenshot.jpg'); ?>
	</div>
</div>