<?php
if($_SERVER["REQUEST_METHOD"] == "POST" && empty($_POST))
{
	$_POST = json_decode(file_get_contents("php://input"), true);
}

require_once("../../libraries/class.didi.inc.php");

#print_r($_SERVER);
if(!array_key_exists("HTTP_X_PROTECTION_TOKEN", $_SERVER))
{
	die("Missing protection token.");
}
