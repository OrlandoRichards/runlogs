<?php
App::uses('Split', 'Model');

/**
 * Split Test Case
 *
 */
class SplitTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.split',
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
		$this->Split = ClassRegistry::init('Split');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Split);

		parent::tearDown();
	}

}
