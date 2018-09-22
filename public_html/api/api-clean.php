<?php
require_once("inc.config.php");

$didi = new didi();
$success = $didi->cleanItems();

echo json_encode(array("success" => $success));
