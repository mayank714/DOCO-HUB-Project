<?php
include("dbcon.php");
?>
            <!DOCTYPE html>
            <html>
            <head>
            <title>May I Help You?</title>
            </head>
            <body style='margin:0px'>
            <?php include("header1.php") ?>
             <?php include("header.php") ?>
            <br><br>
            <?php
            echo "<table align='center'>";
            if(isset($_POST["b1"]))
            {
                $search=$_POST["t1"];
                $field=$_POST["r1"];
                if($field=="city")
                {
                    $rs=mysqli_query($con,"Select * from doctors where city like '".$search."%'");
                    while($row=mysqli_fetch_row($rs))
                    {
                        $s1=$row[0];
                        $s2=$row[1];
                        $s3=$row[2];
                        $s4=$row[3];
                        $s5=$row[4];
                        $s6=$row[5];
                        $s7=$row[6];
                        $s8=$row[7];
                        $s9=$row[8];
                        $s10=$row[9];
                        $s11=$row[10];
                        echo "<tr>";
                        echo "<td>".$s2."</td>";
                        echo "<td>".$s3."</td>";
                        echo "<td>".$s4."</td>";
                        echo "<td>".$s5."</td>";
                        echo "<td>".$s6."</td>";
                        echo "<td>".$s7."</td>";
                        echo "<td>".$s8."</td>";
                        echo "<td>".$s9."</td>";
                        echo "<td>".$s10."</td>";
                        echo "<td>".$s11."</td>";
                        echo "</tr>";
                    }
                }
                else
                {
                    mysqli_query($con,"Select * from doctors where SPECIALIZATION like '%".search."%'");
                    while($row=mysqli_fetch_row($rs))
                    {
                        $s1=$row[0];
                        $s2=$row[1];
                        $s3=$row[2];
                        $s4=$row[3];
                        $s5=$row[4];
                        $s6=$row[5];
                        $s7=$row[6];
                        $s8=$row[7];
                        $s9=$row[8];
                        $s10=$row[9];
                        $s11=$row[10];
                        echo "<tr>";
                        echo "<td>".$s2."</td>";
                        echo "<td>".$s3."</td>";
                        echo "<td>".$s4."</td>";
                        echo "<td>".$s5."</td>";
                        echo "<td>".$s6."</td>";
                        echo "<td>".$s7."</td>";
                        echo "<td>".$s8."</td>";
                        echo "<td>".$s9."</td>";
                        echo "<td>".$s10."</td>";
                        echo "<td>".$s11."</td>";
                        echo "</tr>";
                    }
                }
            }
            else
            {
                echo "<tr><td><img src='d1.jpg' width='400px'></td><td><img src='d2.jpg' width='400px'></td><td><img src='d3.jpg' width='400px'></td></tr>";
                echo "<tr><td><img src='d4.jpg' width='400px'></td><td><img src='d5.jpg' width='400px'></td><td><img src='d6.jpg' width='400px'></td></tr>";
            }
            echo "</table>";
            include("footer.php");
            echo "</body>";
            echo "</html>";
       ?>
