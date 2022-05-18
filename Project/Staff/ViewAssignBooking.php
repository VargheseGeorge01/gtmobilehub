<?php
include("../Connection/Connection.php");
if($_GET["aid"])
    {
      $up="update tbl_booking set booking_assignstatus=2 where booking_id='".$_GET["aid"]."'";
	  mysql_query($up);
    ?>
    <script type="text/javascript">
    alert("Shipped Successfully..");
    setTimeout(function(){window.location.href='ViewAssignBooking.php'},40)//40millisecond it go to next page
    </script>
    <?php
	}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>GTMobileHub::ViewAssignedBooking</title>
<?php
include("header.php");
?>
</head>
<!--<a href="Homepage.php">Home</a>-->
<body><div id="tab">
<h2 align="center">Assigned Booking</h2>



  <table width="" border="1" cellpadding="3" cellspacing="0"  align="center">
	<tr>
    	<td>Product Name</td>
        <td>Price</td>
        <td>Booking Date</td>
        <td>Customer Name</td>
        <td>Contact</td>
        <td>Action</td>
        
    </tr>
      <?php
$sel="select * from tbl_booking b inner join tbl_product p on b.product_id=p.product_id inner join tbl_customer c on c.customer_id=b.customer_id where b.booking_assignstatus=1";
$row=mysql_query($sel);
while($data=mysql_fetch_array($row))
{
?>

<tr>

 <td><?php echo $data["product_name"]; ?></td>
 <td><?php echo $data["booking_amt"]; ?></td>
 <td><?php echo $data["booking_date"]; ?></td>
 <td><?php echo $data["customer_name"]; ?></td>
 <td><?php echo $data["customer_contact"]; ?></td>
 <td><a href="ViewAssignBooking.php?aid=<?php echo $data["booking_id"];?>">Ship Product</a></td>
</tr>
<?php
}
?>
</table></div>
<?php
include("footer.php");
?>
</body>
</html>