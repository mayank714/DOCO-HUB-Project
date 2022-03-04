<?php
include("dbcon.php");
$aid=$_GET["aid"];
$rs=mysqli_query($con,"Select * from appointments where status='V' and aid=".$aid);
if($rec=mysqli_fetch_row($rs))
{
	echo "uploads/A".$aid.".".$rec[8];
}
?>