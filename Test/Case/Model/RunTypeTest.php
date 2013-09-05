<?php
App::uses('RunType', 'Model');

/**
 * RunType Test Case
 *
 */
class RunTypeTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.run_type',
		'app.run',
		'app.shoe'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->RunType = ClassRegistry::init('RunType');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->RunType);

		parent::tearDown();
	}

}
