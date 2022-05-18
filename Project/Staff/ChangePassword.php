<?php
include("../Connection/Connection.php");

session_start();
$pwd=$_POST["txtcurrent"];
$newpwd=$_POST["txtnew"];
$confirmpwd=$_POST["txtconfirm"];
if(isset($_POST['btnsave']))
{
$sel="select * from tbl_staff where staff_id='".$_SESSION['cid']."'";
$row=mysql_query($sel);
$count=mysql_num_rows($row);
if($count>0)
{
	if($newpwd==$confirmpwd)
	{
		$upquery="update tbl_staff set staff_password='".$newpwd."' where staff_id='".$_SESSION["cid"]."'";         mysql_query($upquery);
		//header("location:myprofile.php");
	     //echo $upquery;
	     echo "<script> alert ('update');</script>";
	}
}
}
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>GTMobileHub::Staff ChangePassword</title>
<?php
include("header.php");
?>
</head>
<!--<a href="Homepage.php">Home</a>-->
<body><br />
<br />
<br />
<div id="tab">
<form id="form1" name="form1" method="post" action="">
  <div align="center">
    <table width="343" border="1" cellspacing="2" cellpadding="1">
      <tr>
        <th width="135" scope="row">Current Password</th>
        <td width="192"><input type="password" required="required" name="txtcurrent" id="txtcurrent" /></td>
      </tr>
      <tr>
        <th scope="row">New Password</th>
        <td><input type="password" required="required" name="txtnew" id="txtnew" /></td>
      </tr>
      <tr>
        <th scope="row">Confirm Password</th>
        <td><input type="password" required="required" name="txtconfirm" id="txtconfirm" /></td>
      </tr>
      <tr>
        <th colspan="2" scope="row"><input type="submit" name="btnsave" id="btnsave" value="SAVE" />
        <input type="submit" name="btncancel" id="btncancel" value="CANCEL" /></th>
      </tr>
    </table>
  </div>
</form></div>
<p>&nbsp;</p>
<p>&nbsp;</p></br></br></br></br>
<?php
include("footer.php");
?>

</body>
</html>