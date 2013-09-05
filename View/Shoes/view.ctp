<div class="shoes view">
<h2><?php  echo __('Shoe'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($shoe['Shoe']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($shoe['Shoe']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Description'); ?></dt>
		<dd>
			<?php echo h($shoe['Shoe']['description']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Distance(km)'); ?></dt>
		<dd>
			<?php echo h($shoe['Shoe']['distance_km']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Shoe'), array('action' => 'edit', $shoe['Shoe']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Shoe'), array('action' => 'delete', $shoe['Shoe']['id']), null, __('Are you sure you want to delete # %s?', $shoe['Shoe']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Shoes'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Shoe'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Runs'), array('controller' => 'runs', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Run'), array('controller' => 'runs', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Runs'); ?></h3>
	<?php if (!empty($shoe['Run'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Date Time'); ?></th>
		<th><?php echo __('Km'); ?></th>
		<th><?php echo __('Time Mm'); ?></th>
		<th><?php echo __('Time Ss'); ?></th>
		<th><?php echo __('Avg Heart Rate'); ?></th>
		<th><?php echo __('Max Heart Rate'); ?></th>
		<th><?php echo __('Kcal Watch'); ?></th>
		<th><?php echo __('Health Zone Time Mm'); ?></th>
		<th><?php echo __('Health Zone Time Ss'); ?></th>
		<th><?php echo __('Fitness Zone Time Mm'); ?></th>
		<th><?php echo __('Fitness Zone Time Ss'); ?></th>
		<th><?php echo __('Power Zone Time Mm'); ?></th>
		<th><?php echo __('Power Zone Time Ss'); ?></th>
		<th><?php echo __('Kcal Runkeeper'); ?></th>
		<th><?php echo __('Climb M'); ?></th>
		<th><?php echo __('Final Sprint S'); ?></th>
		<th><?php echo __('Shoe Id'); ?></th>
		<th><?php echo __('Run Type Id'); ?></th>
		<th><?php echo __('Route Description'); ?></th>
		<th><?php echo __('Route Link'); ?></th>
		<th><?php echo __('Splits'); ?></th>
		<th><?php echo __('Notes'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($shoe['Run'] as $run): ?>
		<tr>
			<td><?php echo $run['id']; ?></td>
			<td><?php echo $run['date_time']; ?></td>
			<td><?php echo $run['km']; ?></td>
			<td><?php echo $run['time_mm']; ?></td>
			<td><?php echo $run['time_ss']; ?></td>
			<td><?php echo $run['avg_heart_rate']; ?></td>
			<td><?php echo $run['max_heart_rate']; ?></td>
			<td><?php echo $run['kcal_watch']; ?></td>
			<td><?php echo $run['health_zone_time_mm']; ?></td>
			<td><?php echo $run['health_zone_time_ss']; ?></td>
			<td><?php echo $run['fitness_zone_time_mm']; ?></td>
			<td><?php echo $run['fitness_zone_time_ss']; ?></td>
			<td><?php echo $run['power_zone_time_mm']; ?></td>
			<td><?php echo $run['power_zone_time_ss']; ?></td>
			<td><?php echo $run['kcal_runkeeper']; ?></td>
			<td><?php echo $run['climb_m']; ?></td>
			<td><?php echo $run['final_sprint_s']; ?></td>
			<td><?php echo $run['shoe_id']; ?></td>
			<td><?php echo $run['run_type_id']; ?></td>
			<td><?php echo $run['route_description']; ?></td>
			<td><?php echo $run['route_link']; ?></td>
			<td><?php echo $run['splits']; ?></td>
			<td><?php echo $run['notes']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'runs', 'action' => 'view', $run['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'runs', 'action' => 'edit', $run['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'runs', 'action' => 'delete', $run['id']), null, __('Are you sure you want to delete # %s?', $run['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Run'), array('controller' => 'runs', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
