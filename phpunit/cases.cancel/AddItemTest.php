<?php
namespace cases;

use PHPUnit\Framework\TestCase;
use anytizer\relay;

class AddItemTest extends TestCase
{
	public function _testAddItem()
	{
		$_GET = array();
		$_POST = array(
			"name" => "Some name via API",
		);

		$relay = new relay();
		$relay->headers(array(
			"X-Protection-Token" => "00000000-0000-0000-0000-000000000000",
		));
		
		$data = $relay->fetch(__API_URL__."/api-add.php");
		$expected = json_encode(array("success" => true), true);

		$this->assertEquals($expected, $data);
	}
}