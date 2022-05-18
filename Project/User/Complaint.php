<?php
include("../Connection/Connection.php");
session_start();
if(isset($_POST["btn_save"]))
{
  $ins="insert into tbl_complaint(complaint_date,complaint_content,customer_id)values(curdate(),'".$_POST["txt_comp"]."','".$_SESSION["cid"]."')";
   mysql_query($ins);
   header("location:Complaint.php");
	}
	
if(isset($_POST["btn_cancel"]))
  {
	  header("location:Complaint.php");
  }	

if(isset($_GET["did"]))
{
$del="delete from tbl_complaint where complaint_id='".$_GET["did"]."'";
mysql_query($del);
header("location:Complaint.php");
	
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>GTMobileHub::User Complaint</title>
<?php

include("header.php");
?>
</head>
<!--<a href="HomePage.php">Home</a>-->
<body><div id="tab">
<form id="form1" name="form1" method="post" action="">
  <table width="344" border="1" align="center">
    <tr>
      <td>Complaint</td>
      <td><textarea name="txt_comp" id="txt_comp" cols="45" rows="5"></textarea></td>
    </tr>
    <tr>
      <td colspan="2"><div align="center">
        <input type="submit" name="btn_save" id="btn_save" value="Save" />
        <input type="reset" name="btn_cancel" id="btn_cancel" value="Cancel" />
      </div></td>
    </tr>
  </table>
</form>
<br><br>
<table border="1" align="center">
<tr>
<th>
Complaint</th>
<th>
Reply</th>
<th>Action</th>
</tr>
<?php
$sel="select * from tbl_complaint where customer_id='".$_SESSION["cid"]."'";
$rows=mysql_query($sel);
while($data=mysql_fetch_array($rows))
{
?>
<tr>
<td>
<?php echo $data["complaint_content"];?>
</td>
<td>
<?php if($data["complaint_status"]==0)
{
	echo "pending";
	}
	else
	{
 echo $data["complaint_reply"];
	
    }
    ?>
</td>
<td><a href="Complaint.php?did=<?php echo $data["complaint_id"];?>">Delete</a></td>
<?php
}
?>
</tr>
</table></div>
<?php

include("footer.php");
?>
</body>
</html>