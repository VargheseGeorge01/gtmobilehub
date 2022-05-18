


<?php
include("../Connection/Connection.php");
ob_start();

session_start();
$_SESSION['cst']=$_GET["stock"];
$_SESSION['id']=$_GET['id'];
 if(isset($_POST["btnsave"]))
 {
	 
	$ins="insert into tbl_booking(booking_date,booking_qty,booking_amt,product_id,customer_id,payment_status)values(curdate(),'".$_POST["qty"]."','".$_POST["txtpay"]."','".$_GET["id"]."','".$_SESSION["cid"]."',1)"; 
	mysql_query($ins);
	$_SESSION["qty"]=$_POST["qty"];
	header("location:Payment.php");
	
	
 }

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>GTMobileHub::User Viewmore</title>
<?php

include("header.php");
?>
</head>
<script src="Jq/jquery.js"></script>
     <script>
  function TotalAmount()
            {
				var currentStock=parseInt(document.getElementById("txthStock").value);
                var Amount=parseInt(document.getElementById("txtRate").value);
                var Count=parseInt(document.getElementById("qty").value);
				if(Count>currentStock){
					document.getElementById("qty").value=currentStock;
					return false;
					}
				else{
					 var totamnt=Amount*Count;
					}	
                
                document.getElementById("txtpay").value=totamnt;
            }
   </script> <body><div id="tab">
   <form id="form1" name="form1" method="post" action=""></br></br></br>
   <table width="280"  border="1" align="center">
 
 <tr>
      <th colspan="2" align="center"><img src="../Assets/Product/<?php echo $_GET["img"];?>" width="286" height="268"></th></tr>
    
    <tr>
      <th align="left">Name</th>
      <td><?php echo $_GET['name'];?><input type="hidden"  name="txtname" id="txtname" value="<?php echo $_GET['name'];?>"/></td>
    </tr>
      <tr>
      <th align="left">Description</th>
      <td><?php echo $_GET['de'];?><input type="hidden"  name="txt" id="txt" value="<?php echo $_GET['de'];?>"/></td>
    </tr>
    <tr>
   <td>Current Stock</td>
   <td><?php echo $_GET["stock"];?><input type="hidden" value="<?php echo $_GET["stock"];?> " name="txthStock" id="txthStock" /></td>
   </tr>
   
   
   
   
   
   
   
                    
                   
         <td>Quantity</td>
                    <td><input type="number" name="qty" id="qty" min="1" value="1" onclick="TotalAmount()"></td>
                </tr>
                
                <tr>
                  <td>Total Amount</td>
                  <td><input type="text" id="txtpay" name="txtpay" required="required" value="<?php echo $_GET['amt'];?>" /></td>
                <tr>
                    <td><input type="hidden" name="txtRate" id="txtRate" value="<?php echo $_GET['amt'] ;?>" /></td>
                    <td><input type="submit" name="btnsave" id="btnsave" value="Book Now" /></td>
     
                 
  
  
  
  
  
  
  
   
  
  
  
</table>
   </form></div>
<?php

include("footer.php");
?>

   </body>
                        
                    
</html>