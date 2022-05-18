 <?php
include("../Connection/Connection.php");
session_start();
$name=$_POST["txtname"];
$address=$_POST["txtaddress"];
$email=$_POST["txtemail"];

if(isset($_POST['btnsave']))
{

           $upquery="update tbl_staff set staff_name='".$name."',staff_address='".$address."',staff_email='".$email."' where staff_id='".$_SESSION["cid"]."'";          
		   mysql_query($upquery); 
		  header("location:ViewProfile.php");
	       //echo $upquery;
	       echo "<script> alert ('update');</script>";
		   
}
//$sel="select * from tbl_student where student_id='".$_SESSION["studentid"]."'";
//	//echo $sel;
//	$row=mysql_query($sel);
//	$data=mysql_fetch_array($row);

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link href="form.css" rel="stylesheet" type="text/css" />
<title>GTMobileHub::Staff EditProfile</title>
<?php
include("header.php");
?>
</head>
<!--<a href="Homepage.php">Home</a>-->
<body>
</br></br></br></br><body><div id="tab" align="center">
<form id="form1" name="form1" method="post" action=""><h1>Edit Profile</h1>
  <table align="center">
    
    <tr>
      <th width="155" scope="row">Name</th>
      <td width="246"><input type="text" required="required" name="txtname" id="txtname" value="<?php echo $_GET["name"];?>"/></td>
    </tr>
    <tr>
      <th scope="row">Address</th>
      <td><input type="text" required="required" name="txtaddress" value="<?php echo $_GET["address"];?>"
      /></td>
    </tr>
    <tr>
      <th scope="row">Email</th>
      <td><input type="email" required="required" name="txtemail" value="<?php echo $_GET["email"];?>" /></td>
    </tr>
   
    <tr>
   <td> </td><td> <input type="submit" name="btnsave" id="btnsave" value="SAVE"  align="center"/></td>
       </tr>
  </table></div>
</form>
<br>
<br>
<?php
include("footer.php");
?>

</body>
</html>