<?php
include("dbcon.php");
?>
<?php
                $msg="";
                if(isset($_POST["b1"]))
                {
                    $aid="";
                    $rs=mysqli_query($con,"select count(*)+1 from appointments");
                    if($row=mysqli_fetch_row($rs))
                    	$aid=$row[0];
                    mysqli_query($con,"Insert into appointments(aid,demail,memail,problem,adate,atime,status) values('".$aid."','".$_POST["t1"]."','".$_SESSION["EMAIL"]."','".$_POST["t2"]."','".$_POST["t3"]."','".$_POST["t4"]."','N')");
                    $msg="Request Accepted<br><a href='#' onClick=\"window.open('receipt.php?aid=".$aid."','','left=200,top=50,width=400,height=300')\">Print Receipt</a>";
                }

                echo "<html><body>";
                echo "<img src='banner.jpg' width='100%'>";
                echo "<div style='width:100%;height:10px;background-color:#FF1452'></div>";
                echo "<div style='width:150px;height:300px;float:left'>";
                echo "<br><br><a href='bookappointment.php'>Book Appointment</a><hr>";
                echo "<br><a href='appointmentstatus.php'>Appointment Status</a><hr>";
                echo "<br><a href='history.php'>History</a><hr>";
                echo "<br><a href='logout.php'>Logout</a><hr>";
                echo "</div>";
                echo "<div style='width:1000px;background-color:#EEEEEE;float:left;margin-left:50px'>";
                //----------------Write Code Here
                echo "<br><table align='center'>";
                echo "<tr><th>Name</th><th>Specialization</th><th>Time From</th><th>Time To</th><th>Address</th><th>City</th><th>State</th><th>Fees (Rs)</th><th></th></tr>";
                $rs=mysqli_query($con,"Select * from doctors order by city,specialization");
                while($row=mysqli_fetch_row($rs))
                {
                    echo "<tr>";
                    echo "<td>".$row[1]."</td>";
                    echo "<td>".$row[2]."</td>";
                    echo "<td>".$row[4]."</td>";
                    echo "<td>".$row[5]."</td>";
                    echo "<td>".$row[6]."</td>";
                    echo "<td>".$row[7]."</td>";
                    echo "<td>".$row[8]."</td>";
                    echo "<td>".$row[10]."</td>";
                    echo "<td><a href='bookappointment.php?email=".$row[0]."'>Request for Appointment</a></td>";
                    echo "</tr>";

                }
                echo "</table><hr>";
                echo "<br><h2>".$msg."</h2><br>";
                if(isset($_GET["email"]))
                {
                    $email=$_GET["email"];
                    echo "<form method=post action='bookappointment.php'><table align='center'>";
                    echo "<tr><td>Doctor:</td><td><input type='text' name='t1' value='".$email."' readonly></td><td></td></tr>";
                    echo "<tr><td>Problem:</td><td><textarea name='t2'></textarea></td><td></td></tr>";
                    echo "<tr><td>Date:</td><td><input type='date' name='t3'></td><td></td></tr>";
                    echo "<tr><td>Time:</td><td><input type='time' name='t4'></td><td></td></tr>";
                    echo "<tr><td></td><td><input type='submit' name='b1' value='Request for Appontment'></td><td></td></tr>";
                    echo "</table></form>";
                }
                //------------------End of Code
                echo "</div>";
                echo "<img src='footer.jpg' width='100%'>";
                echo "</body></html>";
      ?>