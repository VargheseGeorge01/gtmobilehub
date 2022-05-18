<?php
include("../connection/connection.php");
if($_GET["stid"])
    {
      $up="update tbl_booking set booking_assignstatus=1,staff_id='".$_GET["stid"]."' where booking_id='".$_GET["aid"]."'";
	  mysql_query($up);	
     ?>
    <script type="text/javascript">
    alert("Assigned Successfully..");
    setTimeout(function(){window.location.href='AssignNow.php'},40)//40millisecond it go to next page
    </script>
    <?php
	}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>GTMobileHub::AssignBooking</title>
<?php 
 include("header.php");
?>
</head>
<!--<a href="Homepage.php">Home</a>-->
<body><div id="tab">
<form id="form1" name="form1" method="post" action="">
  <h2 align="center">Assign Staff</h2>
   <table width="" border="1" cellpadding="3" cellspacing="0"  align="center">
    <tr>
        <td>Staff Name</td>
        <td>Contact</td>
        <td>Email</td>
        <td>Action</td>
    </tr>
      <?php 
	$sel="select * from tbl_staff";
	$datas=mysql_query($sel);
	while($row=mysql_fetch_array($datas))
	{
	?>
    <tr>
      <td><?php echo $row["staff_name"]; ?></td>
      <td><?php echo $row["staff_contact"]; ?></td>
      <td><?php echo $row["staff_email"]; ?></td>
      <td><a href="AssignNow.php?stid=<?php echo $row["staff_id"];?>&aid=<?php echo $_GET["aid"];?>">Assign now</a></td>
    </tr>
  <?php
	}
	?>
    
	</table>
</form>	</div>
<?php 
 include("footer.php");
?>
</body>
</html>