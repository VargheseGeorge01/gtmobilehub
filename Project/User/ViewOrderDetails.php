<?php
include("../Connection/Connection.php");
session_start();
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>GTMobileHub::User ViewOrder</title>
<?php

include("header.php");
?>
</head>
<!--<a href="HomePage.php">Home</a>-->
<body><div id="tab">
<h2 align="center">Your Orders</h2>



  <table width="" border="1" cellpadding="3" cellspacing="0"  align="center">
	<tr>
    	<td>Product Name</td>
        <td>Quantity</td>
        <td>Amount</td>
        <td>Date</td>
        <td>Status</td>
    </tr>
    <?php
$sel="select * from tbl_booking b inner join tbl_product p on b.product_id=p.product_id inner join tbl_customer c on c.customer_id=b.customer_id where b.customer_id='".$_SESSION["cid"]."'" ;
$row=mysql_query($sel);
while($data=mysql_fetch_array($row))
{
	 $_SESSION["booking_id"]=$data["booking_id"];
   ?>
   <tr>
    <td><?php echo $data["product_name"];?></td>
    <td><?php echo $data["booking_qty"];?></td>
    <td><?php echo $data["booking_amt"];?></td>
    <td><?php echo $data["booking_date"];?></td>
  <?php
    
	 if($data["booking_status"]==0)
	 {
  ?>
    <td>Booking Pending</td>
    <?php
	}
	elseif($data["booking_status"]==1)
	{
   ?>
     <td>Booking Approved</td>
     <?php
	}
	else{
	?>
     <td>Booking Rejected</td>
     <?php	
		} 
    }?>
	</tr>
	</table></div>
    <br><br><br>
    <?php

include("footer.php");
?>

</body>
</html>