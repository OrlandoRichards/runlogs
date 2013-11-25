<div class="runs view">
<h2><?php  echo __('Stats'); ?></h2>


<pre><?php // var_dump($stats);?> </pre>

	<table cellpadding="0" cellspacing="0">
	<tr>
		<td> Total Time: </td><td> <?php echo h($stats['TotalTime']['string']); ?> </td>
	</tr><tr>
        <td> Distance: </td><td> <?php echo h($stats['distance']['string']) . " km"; ?> </td>
            </tr><tr>

		<td> Pace: </td><td> <?php echo h($stats['pace']['string']) . " min/km"; ?>  </td>
        </tr><tr>
                <td> Speed: </td><td> <?php echo h($stats['speed']['kph']['string']) . " km/h"; ?>  </td>
<!--
        </tr><tr>
                <td> Avg Heart Rate: </td><td> <?php echo h($stats['avg_heart_rate']['string']) . " bpm"; ?>  </td>
        </tr><tr>
                <td> Max Heart Rate: </td><td> <?php echo h($stats['max_heart_rate']['string']) . " bpm"; ?>  </td>
-->
        </tr><tr>
                <td> 10k Time: </td><td> <?php echo h($stats['ten_k_time_mins']['string']) ; ?>  </td>
<!--
        </tr><tr>
                <td> kCal (watch): </td><td> <?php echo h($stats['kcal_watch']['string']) . " kCal"; ?>  </td>
-->
        </tr><tr>
                <td> kCal (Runkeeper): </td><td> <?php echo h($stats['kcal_runkeeper']['string']) . " kCal"; ?>  </td>
        </tr><tr>
                <td> Climb: </td><td> <?php echo h($stats['climb_m']['string']) . " m"; ?>  </td>
        </tr><tr>
                <td> Final Sprint: </td><td> <?php echo h($stats['final_sprint_s']['string']) . " s"; ?>  </td>
        </tr><tr>
                <td> 100m Sprint: </td><td> <?php echo h($stats['one_hundred_metre_sprint_s']['string']) . " s"; ?>  </td>
        </tr> <!-- <tr>
                <td> HR over Pace: </td><td> <?php echo h($stats['hr_over_pace']['string']) . ""; ?>  </td>
	-->

	</table>


        <table cellpadding="0" cellspacing="0">
        <tr>
                <th> Distance </th>
		<th> 	<?php 
				echo "Total: " ; //. h($stats['total_km']); 
//				echo sprintf('%.2f',$stats['total_km']);
			?>
		</th>

		<?php
			foreach($shoes as $shoe) {
				echo "<th>";
				echo $shoe['Shoe']['name'] . ": ";
//				echo sprintf('%.2f',$shoe['Shoe']['distance_km']);
//				echo "<pre>"; var_dump($shoe); echo "</pre>";
				echo "</th>";
			}
		?>

	</tr>
	<tr><td>km</td>
	<td> <?php echo h($stats['TotalDistanceRun']['km']); ?></td>
                <?php
                        foreach($shoes as $shoe) {
                                echo "<td>";
//                                echo $shoe['Shoe']['name'] . ": ";
                              echo sprintf('%.2f',$shoe['Shoe']['distance_km']);
//                              echo "<pre>"; var_dump($shoe); echo "</pre>";
                                echo "</td>";
                        }
                ?>
	</tr>
        <tr><td>miles</td>
        <td> <?php echo sprintf('%.2f',$stats['TotalDistanceRun']['km']*0.621371192); ?></td>
                <?php
                        foreach($shoes as $shoe) {
                                echo "<td>";
//                                echo $shoe['Shoe']['name'] . ": ";
                              echo sprintf('%.2f',$shoe['Shoe']['distance_km']*0.621371192);
//                              echo "<pre>"; var_dump($shoe); echo "</pre>";
                                echo "</td>";
                        }
                ?>
        </tr>   



	</table>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
                <li><hr/></li>
                <li><?php echo $this->Html->link(__('New Run'), array('action' => 'add')); ?></li>
                <li><hr/></li>
		<li><?php echo $this->Html->link(__('List Runs'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('List Shoes'), array('controller' => 'shoes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('List Run Types'), array('controller' => 'run_types', 'action' => 'index')); ?> </li>
                <li><hr/></li>
	</ul>
</div>
