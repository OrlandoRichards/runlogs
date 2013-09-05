<div class="splits view">
<h2><?php  echo __('Split'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($split['Split']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Run'); ?></dt>
		<dd>
			<?php echo $this->Html->link($split['Run']['date_time'], array('controller' => 'runs', 'action' => 'view', $split['Run']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Lap Number'); ?></dt>
		<dd>
			<?php echo h($split['Split']['lap_number']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Time Hh'); ?></dt>
		<dd>
			<?php echo h($split['Split']['time_hh']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Time Mm'); ?></dt>
		<dd>
			<?php echo h($split['Split']['time_mm']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Time Ss'); ?></dt>
		<dd>
			<?php echo h($split['Split']['time_ss']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Split'), array('action' => 'edit', $split['Split']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Split'), array('action' => 'delete', $split['Split']['id']), null, __('Are you sure you want to delete # %s?', $split['Split']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Splits'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Split'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Runs'), array('controller' => 'runs', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Run'), array('controller' => 'runs', 'action' => 'add')); ?> </li>
	</ul>
</div>
