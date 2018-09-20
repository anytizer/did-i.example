<?php
require_once "inc.config.php";

$didi = new didi();
$data = $didi->getItemsList();

echo json_encode($data);
