<?php
include_once("functions.php");
if (isset($_GET['temp']) && isset($_GET['hum']) && isset($_GET['chip'])) {
	extract($_GET);


$e=mysqli_query($con,"insert into measure2(temperature,humidity,chip_id) values('$temp','$hum','$chip')")or die(mysqli_error($con));
echo "added";
mysqli_close($con);
}else{
	echo "error";
}
?>