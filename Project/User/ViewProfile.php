 <?php
include("../Connection/Connection.php");
session_start();

	$sel="select * from tbl_customer where customer_id='".$_SESSION["cid"]."'";
	$row=mysql_query($sel);
	$data=mysql_fetch_array($row);
	

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>GTMobileHub::User ViewProfile</title>
<?php

include("header.php");
?>
</head>
<!--<a href="HomePage.php">Home</a>-->
<body><div id="tab" align="center"><br />
<br />
<br />
<form id="form1" name="form1" method="post" action=""><h1>My profile</h1>
  <table align="center">
    <tr>
      <td height="107" colspan="2" align="center"><img style="border-radius:50%" src="../Assets/Photo/<?php echo $data["customer_photo"];?>" height="120" width="120"/></td>
    </tr>
    <tr align="center">
      <td width="86">Name</td>
      <td width="164"> <?php echo $data["customer_name"];?>&nbsp;</td>
    </tr>
    <tr align="center">
      <td>Contact</td>
      <td> <?php echo $data["customer_contact"];?>&nbsp;</td>
    </tr>
    <tr align="center">
      <td>Address</td>
      <td> <?php echo $data["customer_address"];?>&nbsp;</td>
    </tr>
    <tr align="center">
      <td>Email</td>
      <td> <?php echo $data["customer_email"];?>&nbsp;</td>
    </tr>
     
      <td colspan="2"><a href="EditProfile.php?name=<?php echo $data["customer_name"];?>&address=<?php echo $data["customer_address"];?>&email=<?php echo $data["customer_email"];?>">Edit Profile</a></td>
    </tr>
    
  </table></div>
</form>
</br></br></br></br>
<?php

include("footer.php");
?>

</body>
</html>