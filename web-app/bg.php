<?php
header('content-type: application/json');
include_once("functions.php");
$e=mysqli_query($con,"select MAX(transaction_id), temperature, humidity, chip_id  from measure2")or die(mysqli_error($con));
$f=mysqli_fetch_assoc($e);
echo json_encode($f);

?>