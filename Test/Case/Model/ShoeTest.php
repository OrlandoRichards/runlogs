<?php
App::uses('Shoe', 'Model');

/**
 * Shoe Test Case
 *
 */
class ShoeTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.shoe',
		'app.run',
		'app.run_type'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Shoe = ClassRegistry::init('Shoe');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Shoe);

		parent::tearDown();
	}

}
