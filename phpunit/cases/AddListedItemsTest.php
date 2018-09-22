<?php
namespace cases;

use PHPUnit\Framework\TestCase;
use anytizer\relay;

class AddListedItemsTest extends TestCase
{
	public function testCleanupItems()
	{
		$_GET = array();
		$_POST = array();
	
		$relay = new relay();
		$relay->headers(array(
			"X-Protection-Token" => "00000000-0000-0000-0000-000000000000",
		));
		
		$data = $relay->fetch(__API_URL__."/api-clean.php");
		$this->assertEquals("{\"success\":true}", $data);
	}

	public function testAddListedItems()
	{
		$list = array(
			"Chicken",
			"Eggs",
			"Fruits",
			"Garlic",
			"Milk",
			"Noodles",
			"Pasta",
			"Tomato",
			"Vinegar",
		);

		$data = null;
		foreach($list as $item)
		{
			$_GET = array();
			$_POST = array(
				"name" => $item,
			);
		
			$relay = new relay();
			$relay->headers(array(
				"X-Protection-Token" => "00000000-0000-0000-0000-000000000000",
			));
			
			$data = $relay->fetch(__API_URL__."/api-add.php");
		}
		
		$this->assertEquals("{\"success\":true}", $data);
	}
}