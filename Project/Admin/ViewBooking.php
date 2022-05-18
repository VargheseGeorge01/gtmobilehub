<?php
include("../Connection/Connection.php");
session_start();
require("class.phpmailer.php");


$mail = new  PHPMailer();
if($_GET["aid"])
    {
      $mailid=$_GET["mail"];
  echo $mailid;
  $name=$_GET["name"];
  $rep="Booking of your product has been approved.";
//======================================================================  
$mail->IsSMTP(); // set mailer to use SMTP
$mail->SMTPAuth = true;     // turn on SMTP authentication
$mail->SMTPSecure = "tls";
$mail->SMTPDebug = 1; 
$mail->Host = "smtp.gmail.com";  // specify main and backup server
$mail->Port = 25;
$mail->Username = "gtmobilehub542@gmail.com";  // SMTP username
$mail->Password = "gtmobilehub@"; // SMTP password

$mail->From = "gtmobilehub542@gmail.com";
$mail->FromName = "gtmobilehub@";
$mail->AddAddress($mailid, $name);


$mail->WordWrap = 50;// set word wrap to 50 characters
$mail->IsHTML(true);// set email format to HTML

$mail->Subject = "Booking Confirmation From GT-Mobile Hub Support Community";
$mail->Body    = $rep;
$mail->AltBody = "This is the body in plain text for non-HTML mail clients";

if(!$mail->Send()) {
    echo "Mailer Error: " . $mail->ErrorInfo;
 } else {
    echo "Message has been sent";
 }

//================================================================================
      $up="update tbl_booking set booking_status=1 where booking_id='".$_GET["aid"]."'";
	  mysql_query($up);	
	}
	
if($_GET["did"])
    {

      $mailid=$_GET["mail"];
  echo $mailid;
  $name=$_GET["name"];
  $rep="Booking of your product has been rejected.";
//======================================================================  
$mail->IsSMTP(); // set mailer to use SMTP
$mail->SMTPAuth = true;     // turn on SMTP authentication
$mail->SMTPSecure = "tls";
$mail->SMTPDebug = 1; 
$mail->Host = "smtp.gmail.com";  // specify main and backup server
$mail->Port = 25;
$mail->Username = "gtmobilehub542@gmail.com";  // SMTP username
$mail->Password = "gtmobilehub@"; // SMTP password

$mail->From = "gtmobilehub542@gmail.com";
$mail->FromName = "gtmobilehub@";
$mail->AddAddress($mailid, $name);


$mail->WordWrap = 50;// set word wrap to 50 characters
$mail->IsHTML(true);// set email format to HTML

$mail->Subject = "Booking Rejection From GT-Mobile Hub Support Community";
$mail->Body    = $rep;
$mail->AltBody = "This is the body in plain text for non-HTML mail clients";

if(!$mail->Send()) {
    echo "Mailer Error: " . $mail->ErrorInfo;
 } else {
    echo "Message has been sent";
 }

//================================================================================
      $up="update tbl_booking set booking_status=2 where booking_id='".$_GET["did"]."'";
	  mysql_query($up);	
	}
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>GTMobileHub::View Booking</title>
<?php
include("header.php"); 
?>
</head>
<!--<a href="Homepage.php">Home</a>-->
<body><div id="tab">
<h2 align="center">Total Booking</h2>



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
$sel="select * from tbl_booking b inner join tbl_product p on b.product_id=p.product_id inner join tbl_customer c on c.customer_id=b.customer_id where b.booking_status=0";
$row=mysql_query($sel);
while($data=mysql_fetch_array($row))
{
?>

<tr>

 <td><?php echo $data["product_name"]; ?></td>
 <td><?php echo $data["booking_date"]; ?></td>
 <td><?php echo $data["booking_qty"]; ?></td>
 <td><?php echo $data["booking_amt"]; ?></td>
 <td><?php echo $data["customer_name"]; ?></td>
 <td><?php echo $data["customer_contact"]; ?></td>
 <td><a href="ViewBooking.php?aid=<?php echo $data["booking_id"];?>&mail=<?php echo $data["customer_email"]?>&name=<?php echo $data["customer_name"]?>">Accept</a>/<a href="ViewBooking.php?did=<?php echo $data["booking_id"];?>&mail=<?php echo $data["customer_email"]?>&name=<?php echo $data["customer_name"]?>">Reject</a></td>
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