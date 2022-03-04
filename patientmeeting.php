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
                echo "<center><h2>Patients Waiting for Visit</h2></center>";
                $rs=mysqli_query($con,"Select * from appointments where status='A' and demail='".$_SESSION["EMAIL"]."'");
                echo "<br><br><table>";
                echo "<tr><th>Patient Email</th><th>Problem</th><th>Appointment Date</th><th>Appointment Time</th><th></th><th></th></tr>";
                while($row=mysqli_fetch_row($rs))
                {
                    echo "<tr>";
                    echo "<td>".$row[2]."</td>";
                    echo "<td>".$row[3]."</td>";
                    echo "<td>".$row[4]."</td>";
                    echo "<td>".$row[5]."</td>";
                    echo "<td><a href='patientmeeting.php?aid=".$row[0]."'>Submit Prescription Details</a></td>";
                    echo "<td></td>";
                    echo "</tr>";
                }
                echo "</table><hr><hr>";
                if(isset($_GET["aid"]))
                {
                    $aid=$_GET["aid"];
                    $rs=mysqli_query($con,"Select * from appointments where aid=".$aid);
                    if($row=mysqli_fetch_row($rs))
                    {
                        $memail=$row[2];
                        $rs=mysqli_query($con,"Select * from members where email='".$memail."'");
                        if($row=mysqli_fetch_row($rs))
                        {
                            echo "<form method='post' action='uploaddetails.php' enctype='multipart/form-data'><table align='center'>";
                            echo "<tr><td>Appointment ID:</td><td>".$aid."</td><tr>";
                            echo "<tr><td></td><td><input type='hidden' value='".$aid."' name='t1'></td><tr>";
                            echo "<tr><td>Patient Name:</td><td>".$row[1]."</td><tr>";
                            echo "<tr><td>Patient Age:</td><td>".$row[2]."</td><tr>";
                            echo "<tr><td>Address:</td><td>".$row[3]."</td><tr>";
                            echo "<tr><td>Problem Details:</td><td><textarea name='t2' style='width:300px;height:100px'></textarea></td><tr>";
                            echo "<tr><td>Upload Prescription:</td><td><input type='file' name='t3'></td><tr>";
                            echo "<tr><td></td><td></td><tr>";
                            echo "<tr><td></td><td><input type='submit' name='b1' value='Done'></td><tr>";
                            echo "</table></form>";
                        }
                    }
                }
                //------------------End of Code
                echo "</div>";
                echo "<img src='footer.jpg' width='100%'>";
                echo "</body></html>";
       ?>
