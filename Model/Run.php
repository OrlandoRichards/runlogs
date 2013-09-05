<?php
App::uses('AppModel', 'Model');
/**
 * Run Model
 *
 * @property Shoe $Shoe
 * @property RunType $RunType
 */
class Run extends AppModel {

/**
 * Method to calculate derived run values
 *
 * Returns the object passed, with all the secondary fields updated
 */
	public function calculateSecondaryValues ($id = NULL) {
		$this_run=$this->read(NULL,$id);

		$km_to_miles=0.621371192;

		// Calculate various numbers of interest:
		if ( $this_run['Run']['km'] ) { 
			$this_run['Run']['miles'] = $this_run['Run']['km'] * $km_to_miles; 
			if ( $this_run['Run']['time_mm'] || $this_run['Run']['time_ss'] ) {
	
				$this_run['Run']['avg_speed_kph'] = $this_run['Run']['km']/($this_run['Run']['time_ss']/3600+$this_run['Run']['time_mm']/60);
				$this_run['Run']['avg_pace_min_km'] = 60/$this_run['Run']['avg_speed_kph'];
				$this_run['Run']['avg_speed_mph'] = $this_run['Run']['avg_speed_kph']*$km_to_miles;
				$this_run['Run']['avg_pace_min_m'] = $this_run['Run']['avg_pace_min_km']/$km_to_miles;
				if ( $this_run['Run']['km'] > 2 ) {
					$this_run['Run']['ten_k_time_mins'] = $this_run['Run']['avg_pace_min_km']*10;
				}
				if ( $this_run['Run']['avg_heart_rate'] ) {
	                                $this_run['Run']['hr_over_pace'] = $this_run['Run']['avg_heart_rate'] / $this_run['Run']['avg_speed_kph'];
				}
			}
		}
		if ( $this_run['Run']['climb_m'] ) {
			$this_run['Run']['climb_ft'] = $this_run['Run']['climb_m']*3.2808399;
		}
		if ( $this_run['Run']['final_sprint_s'] ) {
			$this_run['Run']['one_hundred_metre_sprint_s'] = $this_run['Run']['final_sprint_s']/1.4;
			$this_run['Run']['two_hundred_metre_sprint_s'] = $this_run['Run']['final_sprint_s']/0.7;
		}

		return ($this_run);
//              echo "<pre>"; var_dump($this_run); echo "</pre>";

	}

/**
 * Method to calculate some statistics 
 * 
 * Returns an array of goodies
 *
 */

	public function calculateStats ( $id = NULL ) {

		// Stats I want:
		//  Total distance run (miles, km)
		//  Total time (dd:hh:mm)
		//  Pace (min/km, min/mile) (max, avg, min) 
		//  Speed (km/h, mile/h) (max, avg, min)
		//  Heart rate (max, avg, min)
		//  Max run heart rate (max, avg, min)
		//  10k time (mm:ss)
		//  kCal watch (total, max, avg, min)
		//  kCal RunKeeper (total, max, avg, min)
		//  Climb (m) (total, max, avg, min)
		//  Final sprint (max, avg, min)
		//  100m sprint (max, avg, min)
		//  HR/Pace (max, avg, min)

		$km_to_miles=0.621371192;
		$query = $this -> query ("SELECT SUM(km) as 'total_km' FROM runs");
		$stats['TotalDistanceRun']['km'] = (int)$query[0][0]['total_km'];
		$stats['TotalDistanceRun']['miles'] = (int)($stats['TotalDistanceRun']['km'] * $km_to_miles);

//		$stats['TotalTime']['mm'] = $this -> query ("SELECT SUM(time_mm).SUM(time_ss) as 'total_time_mm','total_time_ss' from runs");
		$query =  $this -> query ("SELECT SUM(time_mm),SUM(time_ss) from runs");
		$stats['TotalTime'] = $this -> convertTimes(
			array(
				's' => $query[0][0]['SUM(time_ss)'],
				'm' => $query[0][0]['SUM(time_mm)'],
				'h' => 0,
				'd' => 0
			));

		$stats['pace'] = $this -> getMinAvgMax('avg_pace_min_km');

		$stats['speed']['kph'] = $this -> getMinAvgMax('avg_speed_kph');
                $stats['speed']['mph'] = $this -> getMinAvgMax('avg_speed_mph');

		$stats['avg_heart_rate'] = $this -> getMinAvgMax('avg_heart_rate');
                $stats['max_heart_rate'] = $this -> getMinAvgMax('max_heart_rate');

		$ten_k_time_mins = $this -> getMinAvgMax('ten_k_time_mins');

		$stats['ten_k_time_mins']['min'] = $this -> convertTimes( array (
						's' => 0,
						'm' => $ten_k_time_mins['min'],
						'h' => 0,
		                                'd' => 0
               			         ));
                $stats['ten_k_time_mins']['avg'] = $this -> convertTimes( array (
                                                's' => 0,
                                                'm' => $ten_k_time_mins['avg'],
                                                'h' => 0,
                                                'd' => 0
                                         ));
                $stats['ten_k_time_mins']['max'] = $this -> convertTimes( array (
                                                's' => 0,
                                                'm' => $ten_k_time_mins['max'],
                                                'h' => 0,
                                                'd' => 0
                                         ));
		$stats['ten_k_time_mins']['string'] = $stats['ten_k_time_mins']['min']['string']. " / " . 
						$stats['ten_k_time_mins']['avg']['string'] . " / " . 
						$stats['ten_k_time_mins']['max']['string'];




		$stats['kcal_watch'] = $this -> getMinAvgMax('kcal_watch');

                $stats['kcal_runkeeper'] = $this -> getMinAvgMax('kcal_runkeeper');

		$stats['climb_m'] = $this -> getMinAvgMax('climb_m');

		$stats['final_sprint_s'] = $this -> getMinAvgMax('final_sprint_s');

		$stats['one_hundred_metre_sprint_s'] = $this -> getMinAvgMax('one_hundred_metre_sprint_s');

                $stats['hr_over_pace'] = $this -> getMinAvgMax('hr_over_pace');

		return ($stats);

	}

/**
 * Get min/max/avg from sql 
 * 
 *
*/

        public function getMinAvgMax ( $column = NULL ) {

		$query = $this -> query ("SELECT MIN($column),MAX($column),AVG($column) FROM runs WHERE $column != 0");

		$data['min'] = $query['0']['0']["MIN($column)"];
                $data['avg'] = $query['0']['0']["AVG($column)"];
                $data['max'] = $query['0']['0']["MAX($column)"];
		$data['string'] = sprintf ('%.2f / %.2f / %.2f',$data['min'],$data['avg'],$data['max']);

		return($data);

	}

	public function convertTimes ($time=NULL) {


		$time['s'] += 0;
		$time['m'] += $time['s'] / 60;
                $time['h'] += $time['h'] + $time['m'] / 60;
                $time['d'] += $time['d'] + $time['h'] / 24;

                $time['s'] = (int)($time['s'] % 60);
		$time['m'] = (int)($time['m'] % 60);
		$time['h'] = (int)($time['h'] % 24);
                $time['d'] = (int)($time['d'] % 1);

		$time['string'] = '';
		if ( $time['d'] > 0 ) {
			$time['string'] = $time['string'] . $time['d'] . "d ";
		}
                if ( $time['h'] > 0 ) {
                        $time['string'] = $time['string'] . $time['h'] . "h ";
                }
                if ( $time['m'] > 0 ) {
                        $time['string'] = $time['string'] . $time['m'] . "m ";
                }
                if ( $time['s'] >= 0 ) {
                        $time['string'] = $time['string'] . $time['s'] . "s";
                }

#		$time['string'] = $time['d'] . "d " . 
#                        $time['h'] . "h " .
#                        $time['m'] . "m " .
#                        $time['s'] . "s";
		

		return $time;

	}

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'date_time';

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'id' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				//'message' => 'Your custom message here',
				'allowEmpty' => true,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				'allowEmpty' => true,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'date_time' => array(
                        'notempty' => array(
                                'rule' => array('notempty'),
                                //'message' => 'Your custom message here',
                                'allowEmpty' => false,
                                'required' => true,
                                //'last' => false, // Stop validation after this rule
                                //'on' => 'create', // Limit validation to 'create' or 'update' operations
                        ),

			'datetime' => array(
				'rule' => array('datetime'),
				//'message' => 'Your custom message here',
				'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'km' => array(
                        'notempty' => array(
                                'rule' => array('notempty'),
                                //'message' => 'Your custom message here',
                                'allowEmpty' => false,
                                'required' => true,
                                //'last' => false, // Stop validation after this rule
                                //'on' => 'create', // Limit validation to 'create' or 'update' operations
                        ),
                        'numeric' => array(
                                'rule' => array('numeric'),
                                //'message' => 'Your custom message here',
                                'allowEmpty' => false,
                                'required' => true,
                                //'last' => false, // Stop validation after this rule
                                //'on' => 'create', // Limit validation to 'create' or 'update' operations
                        ),

		),
		'time_mm' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				'allowEmpty' => true,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'time_ss' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				'allowEmpty' => true,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'avg_heart_rate' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				'allowEmpty' => true,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'max_heart_rate' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				'allowEmpty' => true,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'kcal_watch' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				'allowEmpty' => true,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'health_zone_time_mm' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				'allowEmpty' => true,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'health_zone_time_ss' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				'allowEmpty' => true,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'fitness_zone_time_mm' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				'allowEmpty' => true,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'fitness_zone_time_ss' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				'allowEmpty' => true,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'power_zone_time_mm' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				'allowEmpty' => true,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'power_zone_time_ss' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				'allowEmpty' => true,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'kcal_runkeeper' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				'allowEmpty' => true,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'climb_m' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				'allowEmpty' => true,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'final_sprint_s' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				'allowEmpty' => true,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'shoe_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				'allowEmpty' => true,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'run_type_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				'allowEmpty' => true,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'route_link' => array(
			'url' => array(
				'rule' => array('url'),
				//'message' => 'Your custom message here',
				'allowEmpty' => true,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
	);

	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Shoe' => array(
			'className' => 'Shoe',
			'foreignKey' => 'shoe_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'RunType' => array(
			'className' => 'RunType',
			'foreignKey' => 'run_type_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
                'Route' => array(
                        'className' => 'Route',
                        'foreignKey' => 'route_id',
                        'conditions' => '',
                        'fields' => '',
                        'order' => ''
                ),
	);

/**
 * hasMany associations
 *
 * @var array
 */
        public $hasMany = array(
                'Split' => array(
                        'className' => 'Split',
                        'foreignKey' => 'run_id',
                        'dependent' => false,
                        'conditions' => '',
                        'fields' => '',
                        'order' => '',
                        'limit' => '',
                        'offset' => '',
                        'exclusive' => '',
                        'finderQuery' => '',
                        'counterQuery' => ''
                )
        );


}
