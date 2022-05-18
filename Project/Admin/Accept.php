<?php
include("../connection/connection.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>GTMobileHub::AcceptedBooking</title>
<?php 
 include("header.php");
?>
</head>
<!--<a href="Homepage.php">Home</a>-->

<body><div id="tab">
<form id="form1" name="form1" method="post" action="">
   <h2 align="center">Accepted Booking</h2>
   <table width="" border="1" cellpadding="3" cellspacing="0"  align="center">
    <tr>
        <td>Product Name</td>
        <td>Date</td>
        <td>Quantity</td>
        <td>Amount</td>
        <td>Customer Name</td>
        <td>Contact</td>
        <td>Action</td>
      
      </tr>
       <?php 
	$sel="select * from tbl_booking b inner join tbl_product p on b.product_id=p.product_id inner join tbl_customer c on c.customer_id=b.customer_id where b.booking_status=1 and b.booking_assignstatus=0";
	$datas=mysql_query($sel);
	while($row=mysql_fetch_array($datas))
	{
	?>
      <tr>
      <td><?php echo $row["product_name"]; ?></td>
      <td><?php echo $row["booking_date"]; ?></td>
      <td><?php echo $row["booking_qty"]; ?></td>
      <td><?php echo $row["booking_amt"]; ?></td>
      <td><?php echo $row["customer_name"]; ?></td>
      <td><?php echo $row["customer_contact"]; ?></td>
      <td><a href="AssignNow.php?aid=<?php echo $row["booking_id"];?>">Assign Staff</a></td>
      </tr>
  <?php
	}
	?>
    
  </table>
</form></div>
<?php 
 include("footer.php");
?>
</body>
</html>

