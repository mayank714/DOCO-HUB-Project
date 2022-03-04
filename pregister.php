<?php
include("dbcon.php");
?>
<?php
                if(isset($_POST["b1"]))
                {
                    mysqli_query($con,"Insert into members values('".$_POST["t1"]."','".$_POST["t4"]."','".$_POST["t5"]."','".$_POST["t6"]."','".$_POST["t7"]."','".$_POST["t8"]."','".$_POST["t9"]."')");
                    mysqli_query($con,"Insert into users values('".$_POST["t1"]."','".$_POST["t2"]."','member')");
                    header("location:login.php");
                }
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
            echo "<form method='post'>";
            echo "<table align='center'>";
            echo "<tr><td>Email:</td><td><input type='email' name='t1'></td><td></td></tr>";
            echo "<tr><td>Password:</td><td><input type='password' name='t2'></td><td></td></tr>";
            echo "<tr><td>Re-Type Password:</td><td><input type='password' name='t3'></td><td></td></tr>";
            echo "<tr><td>Name:</td><td><input type='text' name='t4'></td><td></td></tr>";
            echo "<tr><td>Age:</td><td><input type='text' name='t5'></td><td></td></tr>";
            echo "<tr><td>Address:</td><td><textarea name='t6'></textarea></td><td></td></tr>";
            echo "<tr><td>City:</td><td><select name='t7'>";
            $rs=mysqli_query($con,"Select * from indianstates where city is not null order by city");
            while($row=mysqli_fetch_row($rs))
            {
                $s=$row[1];
                echo "<option>".$s."</option>";
            }
            echo "</select></td><td></td></tr>";
            echo "<tr><td>State:</td><td><select name='t8'>";
            $rs=mysqli_query($con,"Select distinct states from indianstates order by states");
            while($row=mysqli_fetch_row($rs))
            {
                $s=$row[0];
                echo "<option>".$s."</option>";
            }
            echo "</select></td><td></td></tr>";
            echo "<tr><td>Mobile:</td><td><input type='text' name='t9'></td><td></td></tr>";
            echo "<tr><td></td><td><input type='submit' name='b1' value='Register'></td><td></td></tr>";
            echo "</table>";
            echo "</form>";
            include("footer.php");
            echo "</body>";
            echo "</html>";
     ?>