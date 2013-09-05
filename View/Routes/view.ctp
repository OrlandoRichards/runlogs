<div class="routes view">
    <h2><?php echo __('Route'); ?></h2>
    <dl>
        <dt><?php echo __('Id'); ?></dt>
        <dd>
            <?php echo h($route['Route']['id']); ?>
            &nbsp;
        </dd>
        <dt><?php echo __('Name'); ?></dt>
        <dd>
            <?php echo h($route['Route']['name']); ?>
            &nbsp;
        </dd>
        <dt><?php echo __('Description'); ?></dt>
        <dd>
            <?php echo h($route['Route']['description']); ?>
            &nbsp;
        </dd>
        <dt><?php echo __('Route Link'); ?></dt>
        <dd>
            <?php echo h($route['Route']['route_link']); ?>
            &nbsp;
        </dd>
        <dt><?php echo __('Total Distance covered'); ?></dt>
        <dd>
            <?php
            echo h($stats['TotalDistanceRun']['km']) . " km, " .
            h($stats['TotalDistanceRun']['miles'] . " miles")
            ;
            ?>
            &nbsp;
        </dd>
        <dt><?php echo __('Pace'); ?></dt>
        <dd>
            <?php
            echo h($stats['pace']['string']) . " (min/avg/max min/km)";
            ?>
            &nbsp;
        </dd>
    </dl>
</div>
<div class="actions">
    <h3><?php echo __('Actions'); ?></h3>
    <ul>
        <li><?php echo $this->Html->link(__('Edit Route'), array('action' => 'edit', $route['Route']['id'])); ?> </li>
        <li><?php echo $this->Form->postLink(__('Delete Route'), array('action' => 'delete', $route['Route']['id']), null, __('Are you sure you want to delete # %s?', $route['Route']['id'])); ?> </li>
        <li><?php echo $this->Html->link(__('List Routes'), array('action' => 'index')); ?> </li>
        <li><?php echo $this->Html->link(__('New Route'), array('action' => 'add')); ?> </li>
        <li><?php echo $this->Html->link(__('List Runs'), array('controller' => 'runs', 'action' => 'index')); ?> </li>
        <li><?php echo $this->Html->link(__('New Run'), array('controller' => 'runs', 'action' => 'add')); ?> </li>
    </ul>
</div>
<div class="related">
    <h3><?php echo __('Related Runs'); ?></h3>
<?php if (!empty($route['Run'])): ?>
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
                <th><?php echo __('Miles'); ?></th>
                <th><?php echo __('Avg Speed Kph'); ?></th>
                <th><?php echo __('Avg Pace Min Km'); ?></th>
                <th><?php echo __('Avg Speed Mph'); ?></th>
                <th><?php echo __('Avg Pace Min M'); ?></th>
                <th><?php echo __('Ten K Time Mins'); ?></th>
                <th><?php echo __('Climb Ft'); ?></th>
                <th><?php echo __('One Hundred Metre Sprint S'); ?></th>
                <th><?php echo __('Two Hundred Metre Sprint S'); ?></th>
                <th><?php echo __('Hr Over Pace'); ?></th>
                <th><?php echo __('Route Id'); ?></th>
                <th class="actions"><?php echo __('Actions'); ?></th>
            </tr>
            <?php
            $i = 0;
            foreach (array_reverse($route['Run']) as $run):
                ?>
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
                    <td><?php echo $run['miles']; ?></td>
                    <td><?php echo $run['avg_speed_kph']; ?></td>
                    <td><?php echo $run['avg_pace_min_km']; ?></td>
                    <td><?php echo $run['avg_speed_mph']; ?></td>
                    <td><?php echo $run['avg_pace_min_m']; ?></td>
                    <td><?php echo $run['ten_k_time_mins']; ?></td>
                    <td><?php echo $run['climb_ft']; ?></td>
                    <td><?php echo $run['one_hundred_metre_sprint_s']; ?></td>
                    <td><?php echo $run['two_hundred_metre_sprint_s']; ?></td>
                    <td><?php echo $run['hr_over_pace']; ?></td>
                    <td><?php echo $run['route_id']; ?></td>
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
