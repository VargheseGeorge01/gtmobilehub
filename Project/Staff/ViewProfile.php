 <?php
include("../Connection/Connection.php");
session_start();

	$sel="select * from tbl_staff where staff_id='".$_SESSION["cid"]."'";
	$row=mysql_query($sel);
	$data=mysql_fetch_array($row);
	

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>GTMobileHub::View StaffProfile</title>
<?php
include("header.php");
?>
</head>
<!--<a href="Homepage.php">Home</a>-->
<body><div id="tab" align="center"><br />
<br />
<br />
<form id="form1" name="form1" method="post" action=""><h1>My profile</h1>
  <table align="center">
    </br></br>
     <tr>
      <td height="107" colspan="2" align="center"><img style="border-radius:50%" src="../Assets/StaffImg/<?php echo $data["staff_photo"];?>" height="120" width="120"/></td>
    </tr>
    <tr>
      <th width="112" scope="row">Name</th>
      <td width="105"><?php echo $data["staff_name"];?></td>
    </tr>
    <tr>
      <th scope="row">Address</th>
      <td><?php echo $data["staff_address"];?></td>
    </tr>
    <tr>
      <th scope="row">Email</th>
      <td><?php echo $data["staff_email"];?></td>
    </tr>
  <tr>
     
      <td colspan="2"><a href="EditProfile.php?name=<?php echo $data["staff_name"];?>&address=<?php echo $data["staff_address"];?>&email=<?php echo $data["staff_email"];?>">Edit Profile</a></td>
    </tr>
    
  </table></div>
</form>
</br></br></br></br>
<?php
include("footer.php");
?>
</body>
</html>