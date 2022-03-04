<?php
include("dbcon.php");
?>
<?php
                mysqli_query($con,"Update appointments set status='".$_GET["status"]."' where aid=".$_GET["aid"]);
                header("location:viewappointment.php");
        ?>