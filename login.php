<?php
include("dbcon.php");
?>
<?php
                $msg="";
                if(isset($_POST["b1"]))
                {
                    $rs=mysqli_query($con,"select * from users where email='".$_POST["t1"]."' and upass='".$_POST["t2"]."'");
                    if($row=mysqli_fetch_row($rs))
                    {
                        $utype=$row[2];
						$_SESSION["EMAIL"]=$_POST["t1"];
						$_SESSION["UTYPE"]=$utype;
                        if($utype=="doctor")
                        {
                            header("location:doctor.php");
                        }
                        else
                        {
                            header("location:member.php");
                        }
                    }
                    else
                    {
                        $msg="Invalid Login/Password!!!";
                    }
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
            echo "<tr><th colspan='3'>Login Authentication</th></tr>";
            echo "<tr><td>Email:</td><td><input type='email' name='t1'></td><td></td></tr>";
            echo "<tr><td>Password:</td><td><input type='password' name='t2'></td><td></td></tr>";
            echo "<tr><td></td><td><input type='submit' name='b1' value='Login'></td><td></td></tr>";
            echo "<tr><td></td><td><font color='red'>".$msg."</font></td><td></td></tr>";
            echo "</table>";
            echo "</form>";
            include("footer.php");
            echo "</body>";
            echo "</html>";
        ?>
