<?php
require_once("inc.config.php");

$success = false;
if($_POST["id"])
{
	$didi = new didi();
	$success = $didi->deleteItem($_POST["id"]);
}

echo json_encode(array("success" => $success));
