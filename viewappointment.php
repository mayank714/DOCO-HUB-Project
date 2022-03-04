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
                echo "<center><h2>Only New Appointments Will be View Here</h2></center>";
                $rs=mysqli_query($con,"Select * from appointments where status='N' and demail='".$_SESSION["EMAIL"]."'");
                echo "<br><br><table>";
                echo "<tr><th>Patient Email</th><th>Problem</th><th>Appointment Date</th><th>Appointment Time</th><th></th><th></th></tr>";
                if($row=mysqli_fetch_row($rs))
                {
                    echo "<tr>";
                    echo "<td>".$row[2]."</td>";
                    echo "<td>".$row[3]."</td>";
                    echo "<td>".$row[4]."</td>";
                    echo "<td>".$row[5]."</td>";
                    echo "<td><a href='updatestatus.php?status=A&aid=".$row[0]."'>Accept</a></td>";
                    echo "<td><a href='updatestatus.php?status=R&aid=".$row[0]."'>Reject</a></td>";
                    echo "</tr>";
                }
                echo "</table>";
                //------------------End of Code
                echo "</div>";
                echo "<img src='footer.jpg' width='100%'>";
                echo "</body></html>";
        ?>