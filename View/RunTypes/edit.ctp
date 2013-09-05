<div class="runTypes form">
<?php echo $this->Form->create('RunType'); ?>
	<fieldset>
		<legend><?php echo __('Edit Run Type'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('name');
		echo $this->Form->input('description');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('RunType.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('RunType.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Run Types'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Runs'), array('controller' => 'runs', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Run'), array('controller' => 'runs', 'action' => 'add')); ?> </li>
	</ul>
</div>
