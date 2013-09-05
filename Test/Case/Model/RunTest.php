<?php
App::uses('Run', 'Model');

/**
 * Run Test Case
 *
 */
class RunTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.run',
		'app.shoe',
		'app.run_type'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Run = ClassRegistry::init('Run');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Run);

		parent::tearDown();
	}

}
