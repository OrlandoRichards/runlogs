<div class="runs index">
	<h2><?php echo __('Runs'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('date_time'); ?></th>
			<th><?php echo $this->Paginator->sort('km'); ?></th>
			<th><?php echo $this->Paginator->sort('time_mm','Run Time'); ?></th>
			<th><?php echo $this->Paginator->sort('avg_heart_rate'); ?></th>
			<th><?php echo $this->Paginator->sort('max_heart_rate'); ?></th>
			<th><?php echo $this->Paginator->sort('kcal_watch'); ?></th>
			<th><?php echo $this->Paginator->sort('health_zone_time_mm','Health Zone Time'); ?></th>
			
			<th><?php echo $this->Paginator->sort('fitness_zone_time_mm','Fitness Zone Time'); ?></th>
			
			<th><?php echo $this->Paginator->sort('power_zone_time_mm','Power Zone Time'); ?></th>
			
			<th><?php echo $this->Paginator->sort('kcal_runkeeper'); ?></th>
			<th><?php echo $this->Paginator->sort('climb_m'); ?></th>
			<th><?php echo $this->Paginator->sort('final_sprint_s'); ?></th>
			<th><?php echo $this->Paginator->sort('shoe_id'); ?></th>
			<th><?php echo $this->Paginator->sort('run_type_id'); ?></th>
			<th><?php echo $this->Paginator->sort('route_description'); ?></th>
			<th><?php echo $this->Paginator->sort('route_link'); ?></th>
			<th><?php echo $this->Paginator->sort('splits'); ?></th>
			<th><?php echo $this->Paginator->sort('notes'); ?></th>
			<th><?php echo $this->Paginator->sort('miles'); ?></th>
			<th><?php echo $this->Paginator->sort('avg_speed_kph'); ?></th>
			<th><?php echo $this->Paginator->sort('avg_pace_min_km'); ?></th>
			<th><?php echo $this->Paginator->sort('avg_speed_mph'); ?></th>
			<th><?php echo $this->Paginator->sort('avg_pace_min_m'); ?></th>
			<th><?php echo $this->Paginator->sort('ten_k_time_mins'); ?></th>
			<th><?php echo $this->Paginator->sort('climb_ft'); ?></th>
			<th><?php echo $this->Paginator->sort('one_hundred_metre_sprint_s'); ?></th>
			<th><?php echo $this->Paginator->sort('two_hundred_metre_sprint_s'); ?></th>
			<th><?php echo $this->Paginator->sort('hr_over_pace'); ?></th>
			<th><?php echo $this->Paginator->sort('route_id'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
	foreach ($runs as $run): ?>
	<tr>
		<td><?php echo h($run['Run']['id']); ?>&nbsp;</td>
		<td><?php echo h($run['Run']['date_time']); ?>&nbsp;</td>
		<td><?php echo h($run['Run']['km']); ?>&nbsp;</td>
		<td><?php echo h($run['Run']['time_mm']) . ":";
		echo h($run['Run']['time_ss']); ?>&nbsp;</td>
		<td><?php echo h($run['Run']['avg_heart_rate']); ?>&nbsp;</td>
		<td><?php echo h($run['Run']['max_heart_rate']); ?>&nbsp;</td>
		<td><?php echo h($run['Run']['kcal_watch']); ?>&nbsp;</td>
		<td><?php echo h($run['Run']['health_zone_time_mm']) . ":" . h($run['Run']['health_zone_time_ss']); ?>&nbsp;</td>
		<td><?php echo h($run['Run']['fitness_zone_time_mm']) . ":" . h($run['Run']['fitness_zone_time_ss']); ?>&nbsp;</td>
		<td><?php echo h($run['Run']['power_zone_time_mm']) . ":" . h($run['Run']['power_zone_time_ss']); ?>&nbsp;</td>
		<td><?php echo h($run['Run']['kcal_runkeeper']); ?>&nbsp;</td>
		<td><?php echo h($run['Run']['climb_m']); ?>&nbsp;</td>
		<td><?php echo h($run['Run']['final_sprint_s']) . "s"; ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($run['Shoe']['name'], array('controller' => 'shoes', 'action' => 'view', $run['Shoe']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($run['RunType']['name'], array('controller' => 'run_types', 'action' => 'view', $run['RunType']['id'])); ?>
		</td>
		<td><?php echo h($run['Run']['route_description']); ?>&nbsp;</td>
		<td><a href="<?php echo h($run['Run']['route_link']); ?>">Runkeeper</a> &nbsp;</td>
		<td><?php echo h($run['Run']['splits']); ?>&nbsp;</td>
		<td><?php echo h($run['Run']['notes']); ?>&nbsp;</td>
		<td><?php echo h($run['Run']['miles']); ?>&nbsp;</td>
		<td><?php echo h($run['Run']['avg_speed_kph']); ?>&nbsp;</td>
		<td><?php echo h($run['Run']['avg_pace_min_km']); ?>&nbsp;</td>
		<td><?php echo h($run['Run']['avg_speed_mph']); ?>&nbsp;</td>
		<td><?php echo h($run['Run']['avg_pace_min_m']); ?>&nbsp;</td>
		<td><?php echo h($run['Run']['ten_k_time_mins']); ?>&nbsp;</td>
		<td><?php echo h($run['Run']['climb_ft']); ?>&nbsp;</td>
		<td><?php echo h($run['Run']['one_hundred_metre_sprint_s']); ?>&nbsp;</td>
		<td><?php echo h($run['Run']['two_hundred_metre_sprint_s']); ?>&nbsp;</td>
		<td><?php echo h($run['Run']['hr_over_pace']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($run['Route']['name'], array('controller' => 'routes', 'action' => 'view', $run['Route']['id'])); ?>
		</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $run['Run']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $run['Run']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $run['Run']['id']), null, __('Are you sure you want to delete # %s?', $run['Run']['id'])); ?>
                        <?php echo $this->Form->postLink(__('Update'), array('action' => 'update_calculations', $run['Run']['id']), null, __('Are you sure you want to update # %s?', $run['Run']['id'])); ?>

		</td>
	</tr>
<?php endforeach; ?>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
	));
	?>	</p>

	<div class="paging">
	<?php
		echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	</div>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Run'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Shoes'), array('controller' => 'shoes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Shoe'), array('controller' => 'shoes', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Run Types'), array('controller' => 'run_types', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Run Type'), array('controller' => 'run_types', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Routes'), array('controller' => 'routes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Route'), array('controller' => 'routes', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Splits'), array('controller' => 'splits', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Split'), array('controller' => 'splits', 'action' => 'add')); ?> </li>
                                     <li><?php echo $this->Html->link(__('Run Stats'), array('controller' => 'runs', 'action' => 'stats')); ?> </li>
	</ul>
</div>
