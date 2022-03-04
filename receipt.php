<?php
include("dbcon.php");
?>
<?php
                $aid=$_GET["aid"];
                $rs=mysqli_query($con,"Select appointments.aid,doctors.name,doctors.address,members.name,appointments.adate,appointments.atime,doctors.fees from appointments,members,doctors where appointments.aid=".$aid." and appointments.demail=doctors.email and appointments.memail=members.email");
                $row=mysqli_fetch_row($rs);
      ?>

      <html>
     <body>
         <table align="center">
             <tr>
                 <td>Appointment Id:</td><td><b><?php echo $row[0]; ?></b></td><td></td><td></td>
             </tr>
             <tr>
                 <td>Doctor Name:</td><td><b><?php echo $row[1]; ?></b></td><td></td><td></td>
             </tr>
             <tr>
                 <td>Doctor's Address:</td><td><b><?php echo $row[2]; ?></b></td><td></td><td></td>
             </tr>
             <tr>
                 <td>Patient Name:</td><td><b><?php echo $row[3]; ?></b></td><td></td><td></td>
             </tr>
             <tr>
                 <td>Appointment Date:</td><td><b><?php echo $row[4]; ?></b></td><td></td><td></td>
             </tr>
             <tr>
                 <td>Appointment Time:</td><td><b><?php echo $row[5]; ?></b></td><td></td><td></td>
             </tr>
             <tr>
                 <td>Amount (Rs) :</td><td><b><?php echo $row[6]; ?></b></td><td></td><td></td>
             </tr>

         </table>
     <center><a href="#" onClick="window.print()">Print</a></center>
      </body>
      </html>