<?php

session_start();
$from_time1 = date('Y-m-d H:i:s');
//$to_time1 = $_SESSION["end_time"];
$to_time1 = 15*60;

$timefirst = strtotime($from_time1);
$timesecond = strtotime($to_time1);
$differenceinseconds = $timesecond - $timefirst;

echo gmdate("H:i:s", $differenceinseconds);



?>
