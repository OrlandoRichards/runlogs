<?php

App::uses('AppModel', 'Model');

/**
 * Route Model
 *
 * @property Run $Run
 */
class Route extends AppModel {

    /**
     * Display field
     *
     * @var string
     */
    public $displayField = 'name';

    /**
     * Method to calculate some statistics 
     * 
     * Returns an array of goodies
     *
     */
    public function calculateStats($id = NULL) {

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

        $km_to_miles = 0.621371192;
        $query = $this->query("SELECT SUM(km) as 'total_km' FROM runs where route_id=$id");
        $stats['TotalDistanceRun']['km'] = $query[0][0]['total_km'];
        $stats['TotalDistanceRun']['miles'] = ($stats['TotalDistanceRun']['km'] * $km_to_miles);

        $stats['pace'] = $this -> getMinAvgMax('avg_pace_min_km',$id);
        
        $stats['distance'] = $this -> getMinAvgMax('km',$id);


//        debug($stats);



        /*
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
         */
        return ($stats);
    }

    /**
     * Get min/max/avg from sql 
     * 
     *
     */
    public function getMinAvgMax($column = NULL, $id = NULL) {

        $query = $this->query("SELECT MIN($column),MAX($column),AVG($column) FROM runs WHERE $column != 0 and route_id=$id");

        $data['min'] = $query['0']['0']["MIN($column)"];
        $data['avg'] = $query['0']['0']["AVG($column)"];
        $data['max'] = $query['0']['0']["MAX($column)"];
        $data['string'] = sprintf('%.2f / %.2f / %.2f', $data['min'], $data['avg'], $data['max']);

        return($data);
    }

    /**
     * Validation rules
     *
     * @var array
     */
    public $validate = array(
        'id' => array(
            'numeric' => array(
                'rule' => array('numeric'),
            //'message' => 'Your custom message here',
            //'allowEmpty' => false,
            //'required' => false,
            //'last' => false, // Stop validation after this rule
            //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
        ),
        'name' => array(
            'notempty' => array(
                'rule' => array('notempty'),
            //'message' => 'Your custom message here',
            //'allowEmpty' => false,
            //'required' => false,
            //'last' => false, // Stop validation after this rule
            //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
        ),
        'route_link' => array(
            'url' => array(
                'rule' => array('url'),
            //'message' => 'Your custom message here',
            //'allowEmpty' => false,
            //'required' => false,
            //'last' => false, // Stop validation after this rule
            //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
        ),
    );

    //The Associations below have been created with all possible keys, those that are not needed can be removed

    /**
     * hasMany associations
     *
     * @var array
     */
    public $hasMany = array(
        'Run' => array(
            'className' => 'Run',
            'foreignKey' => 'route_id',
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
