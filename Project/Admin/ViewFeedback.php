<?php

include("../Connection/Connection.php");

?>



<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>GTMobileHub::View Feedback</title>
<?php
include("header.php"); 
?>
</head>
<!--<a href="Homepage.php">Home</a>-->
<body><div id="tab">
  <h2 align="center">Feedbacks</h2>
<form id="form1" name="form1" method="post" action="">
  <table width="200" border="1" align="center">
    <tr>
      <td>Customer Name</td>
      <td>Content </td>
      <td>Date</td>
      <td>Contact</td>
    </tr>
    <?php 
	
	$sel="select * from tbl_feedback c inner join tbl_customer u on c.customer_id=u.customer_id";
	$row=mysql_query($sel);
	while($data=mysql_fetch_array($row))
	{
	?>
    
    <tr>
      <td><?php echo $data['customer_name'];?></td>
      <td><?php echo $data['feedback_content'];?></td>
      <td><?php echo $data['feedback_date'];?></td>
      <td><?php echo $data['customer_contact'];?></td>
    </tr>
    <?php
	}
	?>
  </table>
  <p>&nbsp;</p>
</form></div>
<br><br>
<?php
include("footer.php"); 
?>
</body>
</html>