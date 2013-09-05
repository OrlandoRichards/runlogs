<div class="splits form">
<?php echo $this->Form->create('Split'); ?>
	<fieldset>
		<legend><?php echo __('Admin Add Split'); ?></legend>
	<?php
		echo $this->Form->input('run_id');
		echo $this->Form->input('lap_number');
		echo $this->Form->input('time_hh');
		echo $this->Form->input('time_mm');
		echo $this->Form->input('time_ss');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Splits'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Runs'), array('controller' => 'runs', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Run'), array('controller' => 'runs', 'action' => 'add')); ?> </li>
	</ul>
</div>
