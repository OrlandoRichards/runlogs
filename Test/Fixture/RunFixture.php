<?php
/**
 * RunFixture
 *
 */
class RunFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'primary'),
		'date_time' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'km' => array('type' => 'float', 'null' => true, 'default' => null),
		'time_mm' => array('type' => 'integer', 'null' => true, 'default' => null),
		'time_ss' => array('type' => 'integer', 'null' => true, 'default' => null),
		'avg_heart_rate' => array('type' => 'integer', 'null' => true, 'default' => null),
		'max_heart_rate' => array('type' => 'integer', 'null' => true, 'default' => null),
		'kcal_watch' => array('type' => 'integer', 'null' => true, 'default' => null),
		'health_zone_time_mm' => array('type' => 'integer', 'null' => true, 'default' => null),
		'health_zone_time_ss' => array('type' => 'integer', 'null' => true, 'default' => null),
		'fitness_zone_time_mm' => array('type' => 'integer', 'null' => true, 'default' => null),
		'fitness_zone_time_ss' => array('type' => 'integer', 'null' => true, 'default' => null),
		'power_zone_time_mm' => array('type' => 'integer', 'null' => true, 'default' => null),
		'power_zone_time_ss' => array('type' => 'integer', 'null' => true, 'default' => null),
		'kcal_runkeeper' => array('type' => 'integer', 'null' => true, 'default' => null),
		'climb_m' => array('type' => 'integer', 'null' => true, 'default' => null),
		'final_sprint_s' => array('type' => 'integer', 'null' => true, 'default' => null),
		'shoe_id' => array('type' => 'integer', 'null' => true, 'default' => null),
		'run_type_id' => array('type' => 'integer', 'null' => true, 'default' => null),
		'route_description' => array('type' => 'text', 'null' => true, 'default' => null, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'route_link' => array('type' => 'text', 'null' => true, 'default' => null, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'splits' => array('type' => 'text', 'null' => true, 'default' => null, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'notes' => array('type' => 'text', 'null' => true, 'default' => null, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1)
		),
		'tableParameters' => array('charset' => 'latin1', 'collate' => 'latin1_swedish_ci', 'engine' => 'InnoDB')
	);

/**
 * Records
 *
 * @var array
 */
	public $records = array(
		array(
			'id' => 1,
			'date_time' => '2012-11-09 22:43:20',
			'km' => 1,
			'time_mm' => 1,
			'time_ss' => 1,
			'avg_heart_rate' => 1,
			'max_heart_rate' => 1,
			'kcal_watch' => 1,
			'health_zone_time_mm' => 1,
			'health_zone_time_ss' => 1,
			'fitness_zone_time_mm' => 1,
			'fitness_zone_time_ss' => 1,
			'power_zone_time_mm' => 1,
			'power_zone_time_ss' => 1,
			'kcal_runkeeper' => 1,
			'climb_m' => 1,
			'final_sprint_s' => 1,
			'shoe_id' => 1,
			'run_type_id' => 1,
			'route_description' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
			'route_link' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
			'splits' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
			'notes' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.'
		),
	);

}
