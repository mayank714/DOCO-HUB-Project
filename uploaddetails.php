<?php
include("dbcon.php");
$aid=$_POST["t1"];
$details=$_POST["t2"];
$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["t3"]["name"]);
$fext = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
move_uploaded_file($_FILES["t3"]["tmp_name"],"uploads/A".$aid.".".$fext);
mysqli_query($con,"Update appointments set status='V',details='".$details."',FileType='".$fext."' where aid='".$aid."'");
header("location:patientmeeting.php");
?>
