<?php
header("content-type: application/json");
include_once("functions.php");

$q=mysqli_query($con,"select * from measure2")or die(mysqli_error($con));

$rows=mysqli_num_rows($q);
if ($rows >0) {
	$res1=array();
	while ($res=mysqli_fetch_assoc($q)) {
		array_push($res1, $res);
	}
print(json_encode($res1));
}else{
	echo json_encode(array('msg'=>'no result'));
}
mysqli_close($con);
?>