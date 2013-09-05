<div class="runs form">
<?php echo $this->Form->create('Run'); ?>
	<fieldset>
		<legend><?php echo __('Admin Edit Run'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('date_time');
		echo $this->Form->input('km');
		echo $this->Form->input('time_mm');
		echo $this->Form->input('time_ss');
		echo $this->Form->input('avg_heart_rate');
		echo $this->Form->input('max_heart_rate');
		echo $this->Form->input('kcal_watch');
		echo $this->Form->input('health_zone_time_mm');
		echo $this->Form->input('health_zone_time_ss');
		echo $this->Form->input('fitness_zone_time_mm');
		echo $this->Form->input('fitness_zone_time_ss');
		echo $this->Form->input('power_zone_time_mm');
		echo $this->Form->input('power_zone_time_ss');
		echo $this->Form->input('kcal_runkeeper');
		echo $this->Form->input('climb_m');
		echo $this->Form->input('final_sprint_s');
		echo $this->Form->input('shoe_id');
		echo $this->Form->input('run_type_id');
		echo $this->Form->input('route_description');
		echo $this->Form->input('route_link');
		echo $this->Form->input('splits');
		echo $this->Form->input('notes');
		echo $this->Form->input('miles');
		echo $this->Form->input('avg_speed_kph');
		echo $this->Form->input('avg_pace_min_km');
		echo $this->Form->input('avg_speed_mph');
		echo $this->Form->input('avg_pace_min_m');
		echo $this->Form->input('ten_k_time_mins');
		echo $this->Form->input('climb_ft');
		echo $this->Form->input('one_hundred_metre_sprint_s');
		echo $this->Form->input('two_hundred_metre_sprint_s');
		echo $this->Form->input('hr_over_pace');
		echo $this->Form->input('route_id');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Run.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('Run.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Runs'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Shoes'), array('controller' => 'shoes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Shoe'), array('controller' => 'shoes', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Run Types'), array('controller' => 'run_types', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Run Type'), array('controller' => 'run_types', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Routes'), array('controller' => 'routes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Route'), array('controller' => 'routes', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Splits'), array('controller' => 'splits', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Split'), array('controller' => 'splits', 'action' => 'add')); ?> </li>
	</ul>
</div>
