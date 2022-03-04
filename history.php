<?php
include("dbcon.php");
?>
<?php
                echo "<html><body>";
                echo "<img src='banner.jpg' width='100%'>";
                echo "<div style='width:100%;height:10px;background-color:#FF1452'></div>";
                echo "<div style='width:150px;height:300px;float:left'>";
                echo "<br><br><a href='bookappointment.php'>Book Appointment</a><hr>";
                echo "<br><a href='appointmentstatus.php'>Appointment Status</a><hr>";
                echo "<br><a href='history.php'>History</a><hr>";
                echo "<br><a href='logout.php'>Logout</a><hr>";
                echo "</div>";
                echo "<div style='width:1000px;background-color:#EEEEEE;float:left;margin-left:50px;margin-top:50px'>";
                //----------------Write Code Here
                echo "<center><h2>Only Visited Appointments</h2></center>";
                $rs=mysqli_query($con,"Select * from appointments where status='V' and MEMAIL='".$_SESSION["EMAIL"]."' order by adate desc");
                echo "<table align='center'>";
                echo "<tr><th>Appointment ID</th><th>Doctor Email</th><th>Problem</th><th>Date</th><th>Time</th><th>Status</th></tr>";
                while($row=mysqli_fetch_row($rs))
                {
                    echo "<tr>";
                    echo "<td>".$row[0]."</td>";
                    echo "<td>".$row[1]."</td>";
                    echo "<td>".$row[3]."</td>";
                    echo "<td>".$row[4]."</td>";
                    echo "<td>".$row[6]."</td>";
                    echo "<td>".$row[7]."</td>";
                    $filename="uploads/A".$row[0].".".$row[8];
                    echo "<td>Prescription: <a href='".$filename."'>Download/Show</a></td>";
                    echo "</tr>";
                }
                echo "</table>";
                //------------------End of Code
                echo "</div>";
                echo "<img src='footer.jpg' width='100%'>";
                echo "</body></html>";
        ?>