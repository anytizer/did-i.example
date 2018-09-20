<?php
require_once("inc.config.php");

$success = false;
if($_POST["name"])
{
	$didi = new didi();
	$success = $didi->addItem($_POST["name"]);
}

echo json_encode(array("success" => $success));
