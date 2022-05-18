<?php
include("../Connection/Connection.php");
session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>GTMobileHub::Datewise Booking</title>
<?php
include("header.php"); 
?>
</head>
<body><div id="tab">
<form method="post">
<table cellpadding="10" style="border-collapse:collapse;" border="0" align="center">
<tr>
<td>From:</td>
<td height="36" colspan="2"><div align="center">
<input type="date" name="txtDate" id="txtDate"/>
</div></td>
<td>To:</td>
<td height="36" colspan="2"><div align="center">
<input type="date" name="txtDate1" id="txtDate1"/>
</div></td>
<td height="36" colspan="2"><div align="center">
<input type="submit" name="btnSubmit" id="btnSubmit" value="View Report" />
</div></td>
</tr>
</table>
<hr />
</form>
<br />
<br />
<table  cellpadding="10" style="border-collapse:collapse;" border="1" align="center">
<tr>
    <th>Sl.No</th>
    <th>Booking Date</th>
   <th>Product Name</th>
    <th>Quantity</th>
      <th>Rate</th>
    <th>User Name</th>
    <th>Contact</th>
</tr>
<?php
if(isset($_POST["btnSubmit"]))
	{
		$s=$_POST["txtDate"];
		$e=$_POST["txtDate1"];
		
		$sel="select * from tbl_booking a inner join tbl_product audi on a.product_id=audi.product_id inner join tbl_customer u on a.customer_id=u.customer_id where a.booking_status='1' AND booking_date BETWEEN '".$s."' AND '".$e."'";
	//echo $sel;	



$datas=mysql_query($sel);
$i=0;
while($row=mysql_fetch_array($datas))
{
	$i=$i+1;
?>
<tr>
<td><?php echo $i;?></td>
<td><?php echo $row["booking_date"]; ?></td>
<td><?php echo $row["product_name"]; ?></td>
<td><?php echo $row["booking_qty"]; ?></td>
<td><?php echo $row["booking_amt"]; ?></td>

<td><?php echo $row["customer_name"]; ?></td>
<td><?php echo $row["customer_contact"]; ?></td>
</tr>
<?php
}
	}
?>
</table></div>
<?php
include("footer.php"); 
?>
</body>
</html>

