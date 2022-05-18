<?php
include("../Connection/Connection.php");
session_start();

if(isset($_POST["btn_save"]))
{
	$ins="insert into tbl_feedback(feedback_content,feedback_date,customer_id) values('".$_POST["txt_feedback"]."',curdate(),'".$_SESSION["cid"]."')";
	mysql_query($ins);
}
if($_GET["delptid"])
{
	
	$ptid=$_GET["delptid"];
	$del="delete from tbl_feedback where feedback_id='$ptid'";
	mysql_query($del);
	header("location:Feedback.php");
	}
?>



<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>GTMobileHub::User Feedback</title>
<?php

include("header.php");
?>
</head>
<!--<a href="HomePage.php">Home</a>-->
<body><div id="tab">
<form id="form1" name="form1" method="post" action="">
  <table width="353" border="1" align="center">
    <tr>
      <td width="160" height="49">Feedback</td>
      <td width="177"><textarea name="txt_feedback" id="txt_feedback" cols="45" rows="5"></textarea></td>
    </tr>
    <tr>
      <td height="49" colspan="2"><div align="center">
        <input type="submit" name="btn_save" id="btn_save" value="Save" />
        <input type="reset" name="btn_cancel" id="btn_cancel" value="Cancel" />
      </div></td>
    </tr>
  </table>
</form>
<br><br><br>
<table border="1" align="center">
<tr><th>Feedback
</th>
<th>Action</th>
</tr>
<?php
$sel="select * from tbl_feedback where customer_id='".$_SESSION["cid"]."'";
$rows=mysql_query($sel);
while($data=mysql_fetch_array($rows))
{

?>
<tr>
<td>

<?php echo $data["feedback_content"];?></td>


<td><a href="Feedback.php?delptid=<?php echo $data["feedback_id"];?>">Delete</a></td>


</tr>
<?php
}?>

</table></div>
<br>
<br>
<?php

include("footer.php");
?>
</body>
</html>