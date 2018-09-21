<?php
namespace cases;

use PHPUnit\Framework\TestCase;
use anytizer\relay;

class AddMultipleItemsTest extends TestCase
{
	public function _testAddMultipleItems()
	{
		for($i=0; $i<10; ++$i)
		{
			$when = date("H:i:s");
			
			$_GET = array();
			$_POST = array(
				"name" => "Multiple #{$i} {$when}",
			);
		
			$relay = new relay();
			$relay->headers(array(
				"X-Protection-Token" => "00000000-0000-0000-0000-000000000000",
			));
			
			$relay->fetch(__API_URL__."/api-add.php");
		}
		
		$this->markTestIncomplete();
	}
}