<?php
include("../Connection/Connection.php");
session_start();

if(isset($_POST["btnlogin"]))
{
	$username=$_POST["txtusername"];
	$password=$_POST["txtpassword"];
	
	
	$sel="select * from tbl_customer where customer_email='".$username."' and customer_password='".$password."'";
	$rows=mysql_query($sel);
	$count=mysql_num_rows($rows);
	
	
	
	
	
	$sel1="select * from tbl_admin where admin_name='".$username."' and admin_password='".$password."'";
	$rows1=mysql_query($sel1);
	$count1=mysql_num_rows($rows1);
	
	
	$sel2="select * from tbl_staff where staff_email='".$username."' and staff_password='".$password."'";
	$rows2=mysql_query($sel2);
	$count2=mysql_num_rows($rows2);
	
	
	
	if($count1>0)
	
	{
		$data1=mysql_fetch_array($rows1);
		
		//$_SESSION["uid"]=$data['user_id'];
		header("location:../Admin/Homepage.php");	
	}
	else if($count>0)
	{
		$data=mysql_fetch_array($rows);
		$_SESSION["cid"]=$data['customer_id'];
		header("location:../User/HomePage.php");	
	}
	else if($count2>0)
	{
		$data2=mysql_fetch_array($rows2);
		$_SESSION["cid"]=$data2['staff_id'];
		header("location:../Staff/HomePage.php");	
	}
	
		
	else
	{
		echo "<script>alert('Invalid Username And Password')</script>";
			
	}
	
	
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>GTMobileHub::Login</title>
<?php

include("header.php");
?>

<br />
<br />
<br />
<form id="form1" name="form1" method="post" action="">
  <div align="center">

  	<h1 align="center">Login here</h1>
    <table  border="0" cellpadding="10">
      <tr>
        <td>Username/Email</td>
        <td><input type="text" name="txtusername" id="txtusername" autofocus="autofocus" required="required" autocomplete="off"  title="Enter user name or email id" autofocus="autofocus"/></td>
      </tr>
      <tr>
        <td>Password</td>
        <td><input type="password" name="txtpassword" id="txtpassword" required="required" autocomplete="off"/></td>
      </tr>
      <tr>
        <td colspan="2"><div align="right">
          <input type="submit" name="btnlogin" id="btnlogin" value="Login" />
        </div></td>
      </tr>
      <tr>
      
      </tr>
    </table>
  </div>
</form>
<br />
<br />
<br />
<br />
<br />
<br />

<?php

include("footer.php");
?>
</body>
</html>