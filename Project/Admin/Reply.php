<?php
include("../Connection/Connection.php");

if(isset($_POST["btnSave"]))
{
	
	
	$rep=$_POST['txtreply'];
	$id=$_GET['rep'];
	$up="update  tbl_complaint set complaint_reply='".$rep."' ,complaint_status=1 where complaint_id='".$id."'";
	mysql_query($up);
	
}

?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>GTMobileHub::ComplaintReply</title>
<?php
include("header.php");
?>
</head>
<!--<a href="Homepage.php">Home</a>-->
<body><div id="tab">
<form id="form1" name="form1" method="post" action="">
  <h2 align="center">Give Complaint Reply</h2>
  <table width="200" border="1" align="center">
    <tr>
      <td>Reply</td>
      <td><label for="txtreply"></label>
      <textarea name="txtreply" id="txtreply" cols="45" rows="5"></textarea></td>
    </tr>
    <tr>
      <td colspan="2"><input type="submit" name="btnSave" id="btnSave" value="Submit" />       
       <input type="reset" name="btnCancel" id="btnCancel" value="Cancel" /></td>
    </tr>
  </table>
</form></div>
<?php
include("footer.php"); 
?>
</body>
</html>