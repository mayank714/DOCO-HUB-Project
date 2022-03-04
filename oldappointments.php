<?php
include("dbcon.php");
?>
<?php
                echo "<html><body>";
                echo "<img src='banner.jpg' width='100%'>";
                echo "<div style='width:100%;height:10px;background-color:#FF1452'></div>";
                echo "<div style='width:150px;height:300px;float:left'>";
                echo "<br><br><a href='viewappointment.php'>View Appointments</a><hr>";
                echo "<br><a href='patientmeeting.php'>Patient Meeting</a><hr>";
                echo "<br><a href='oldappointments.php'>Old Appointments</a><hr>";
                echo "<br><a href='logout.php'>Logout</a><hr>";
                echo "</div>";
                echo "<div style='width:1000px;background-color:#EEEEEE;float:left;margin-left:100px;margin-top:50px'>";
                //----------------Write Code Here
                $rs=mysqli_query($con,"Select * from appointments where status='V' and demail='".$_SESSION["EMAIL"]."' order by adate desc");
                echo "<br><br><table>";
                echo "<tr><th>Patient Email</th><th>Problem</th><th>Appointment Date</th><th>Appointment Time</th><th></th><th></th></tr>";
                while($row=mysqli_fetch_row($rs))
                {
                    echo "<tr>";
                    echo "<td>".$row[2]."</td>";
                    echo "<td>".$row[3]."</td>";
                    echo "<td>".$row[4]."</td>";
                    echo "<td>".$row[5]."</td>";
                    echo "<td><a href='oldappointments.php?aid=".$row[0]."'>Show Details</a></td>";
                    echo "<td></a></td>";
                    echo "</tr>";
                }
                echo "</table><hr><hr>";
                if(isset($_GET["aid"]))
                {
                    echo "<table align='center'>";
                    $aid=$_GET["aid"];
                    $rs=mysqli_query($con,"Select * from appointments where status='V' and aid=".$aid);
                    if($row=mysqli_fetch_row($rs))
                    {
                        echo "<tr><td>Problem:</td><td>".$row[3]."</td></tr>";
                        echo "<tr><td>Appointment Date:</td><td>".$row[4]."</td></tr>";
                        echo "<tr><td>Appointment Time:</td><td>".$row[5]."</td></tr>";
                        echo "<tr><td>Details:</td><td>".$row[7]."</td></tr>";
                        $filename="uploads/A".$aid.".".$row[8];
                        echo "<tr><td>Prescription:</td><td><a href='".$filename."'>Download/Show</a></td></tr>";
                    }
                    echo "</table>";
                }
                //------------------End of Code
                echo "</div>";
                echo "<img src='footer.jpg' width='100%'>";
                echo "</body></html>";
        ?>
