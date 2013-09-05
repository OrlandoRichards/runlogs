<?php
/**
 * SplitFixture
 *
 */
class SplitFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'primary'),
		'run_id' => array('type' => 'integer', 'null' => true, 'default' => null),
		'lap_number' => array('type' => 'integer', 'null' => true, 'default' => null),
		'time_hh' => array('type' => 'integer', 'null' => true, 'default' => null),
		'time_mm' => array('type' => 'integer', 'null' => true, 'default' => null),
		'time_ss' => array('type' => 'float', 'null' => true, 'default' => null),
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
			'run_id' => 1,
			'lap_number' => 1,
			'time_hh' => 1,
			'time_mm' => 1,
			'time_ss' => 1
		),
	);

}
