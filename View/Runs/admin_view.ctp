<div class="runs view">
<h2><?php  echo __('Run'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($run['Run']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Date Time'); ?></dt>
		<dd>
			<?php echo h($run['Run']['date_time']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Km'); ?></dt>
		<dd>
			<?php echo h($run['Run']['km']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Time Mm'); ?></dt>
		<dd>
			<?php echo h($run['Run']['time_mm']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Time Ss'); ?></dt>
		<dd>
			<?php echo h($run['Run']['time_ss']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Avg Heart Rate'); ?></dt>
		<dd>
			<?php echo h($run['Run']['avg_heart_rate']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Max Heart Rate'); ?></dt>
		<dd>
			<?php echo h($run['Run']['max_heart_rate']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Kcal Watch'); ?></dt>
		<dd>
			<?php echo h($run['Run']['kcal_watch']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Health Zone Time Mm'); ?></dt>
		<dd>
			<?php echo h($run['Run']['health_zone_time_mm']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Health Zone Time Ss'); ?></dt>
		<dd>
			<?php echo h($run['Run']['health_zone_time_ss']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Fitness Zone Time Mm'); ?></dt>
		<dd>
			<?php echo h($run['Run']['fitness_zone_time_mm']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Fitness Zone Time Ss'); ?></dt>
		<dd>
			<?php echo h($run['Run']['fitness_zone_time_ss']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Power Zone Time Mm'); ?></dt>
		<dd>
			<?php echo h($run['Run']['power_zone_time_mm']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Power Zone Time Ss'); ?></dt>
		<dd>
			<?php echo h($run['Run']['power_zone_time_ss']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Kcal Runkeeper'); ?></dt>
		<dd>
			<?php echo h($run['Run']['kcal_runkeeper']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Climb M'); ?></dt>
		<dd>
			<?php echo h($run['Run']['climb_m']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Final Sprint S'); ?></dt>
		<dd>
			<?php echo h($run['Run']['final_sprint_s']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Shoe'); ?></dt>
		<dd>
			<?php echo $this->Html->link($run['Shoe']['name'], array('controller' => 'shoes', 'action' => 'view', $run['Shoe']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Run Type'); ?></dt>
		<dd>
			<?php echo $this->Html->link($run['RunType']['name'], array('controller' => 'run_types', 'action' => 'view', $run['RunType']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Route Description'); ?></dt>
		<dd>
			<?php echo h($run['Run']['route_description']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Route Link'); ?></dt>
		<dd>
			<?php echo h($run['Run']['route_link']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Splits'); ?></dt>
		<dd>
			<?php echo h($run['Run']['splits']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Notes'); ?></dt>
		<dd>
			<?php echo h($run['Run']['notes']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Miles'); ?></dt>
		<dd>
			<?php echo h($run['Run']['miles']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Avg Speed Kph'); ?></dt>
		<dd>
			<?php echo h($run['Run']['avg_speed_kph']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Avg Pace Min Km'); ?></dt>
		<dd>
			<?php echo h($run['Run']['avg_pace_min_km']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Avg Speed Mph'); ?></dt>
		<dd>
			<?php echo h($run['Run']['avg_speed_mph']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Avg Pace Min M'); ?></dt>
		<dd>
			<?php echo h($run['Run']['avg_pace_min_m']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Ten K Time Mins'); ?></dt>
		<dd>
			<?php echo h($run['Run']['ten_k_time_mins']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Climb Ft'); ?></dt>
		<dd>
			<?php echo h($run['Run']['climb_ft']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('One Hundred Metre Sprint S'); ?></dt>
		<dd>
			<?php echo h($run['Run']['one_hundred_metre_sprint_s']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Two Hundred Metre Sprint S'); ?></dt>
		<dd>
			<?php echo h($run['Run']['two_hundred_metre_sprint_s']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Hr Over Pace'); ?></dt>
		<dd>
			<?php echo h($run['Run']['hr_over_pace']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Route'); ?></dt>
		<dd>
			<?php echo $this->Html->link($run['Route']['name'], array('controller' => 'routes', 'action' => 'view', $run['Route']['id'])); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Run'), array('action' => 'edit', $run['Run']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Run'), array('action' => 'delete', $run['Run']['id']), null, __('Are you sure you want to delete # %s?', $run['Run']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Runs'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Run'), array('action' => 'add')); ?> </li>
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
<div class="related">
	<h3><?php echo __('Related Splits'); ?></h3>
	<?php if (!empty($run['Split'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Run Id'); ?></th>
		<th><?php echo __('Lap Number'); ?></th>
		<th><?php echo __('Time Hh'); ?></th>
		<th><?php echo __('Time Mm'); ?></th>
		<th><?php echo __('Time Ss'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($run['Split'] as $split): ?>
		<tr>
			<td><?php echo $split['id']; ?></td>
			<td><?php echo $split['run_id']; ?></td>
			<td><?php echo $split['lap_number']; ?></td>
			<td><?php echo $split['time_hh']; ?></td>
			<td><?php echo $split['time_mm']; ?></td>
			<td><?php echo $split['time_ss']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'splits', 'action' => 'view', $split['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'splits', 'action' => 'edit', $split['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'splits', 'action' => 'delete', $split['id']), null, __('Are you sure you want to delete # %s?', $split['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Split'), array('controller' => 'splits', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
