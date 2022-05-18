<?php
include("../Connection/Connection.php");
if(isset($_POST["txt_save"]))
{
	$ins="insert into  tbl_stock(stock_date,product_id,stock_qty)values(curdate(),'".$_POST["sl_product"]."','".$_POST["txt_stockqty"]."')";
	
	echo $ins;
		mysql_query($ins);
	header("location:Stock.php");
}

if(isset($_POST["txt_cancel"]))
  {	
  header("location:Stock.php");

  }
  
if($_GET["deltid"])
{
	$ptid=$_GET["deltid"];
	
	$del="delete from    tbl_stock where stock_id='$ptid'";
	mysql_query($del);
	header("location:Stock.php");
	
}  

?>



<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>GTMobileHub::StockList</title>
<?php
include("header.php"); 
?>
</head>
<!--<a href="Homepage.php">Home</a>-->
<body><div id="tab">
<form id="form1" name="form1" method="post" action="">
  <h2 align="center">Add Stock</h2>
  <table width="200" border="1" align="center">
    <tr>
       <td>Product</td>
       <td><select name="sl_product" id="sl_product">
        <option value=" ">---Select---</option>
      
      <?php
	  $sel="select * from tbl_product";
	  $row=mysql_query($sel);
	 while($data=mysql_fetch_array($row))
	 {
	  
      ?>
      
      
      
      <option value="<?php echo $data["product_id"];?>"><?php echo $data["product_name"];?></option>
      
      <?php
      }
      ?>
      
      
       </select></td>
    </tr>
    <tr>
      <td>Quantity</td>
      <td><input type="text" name="txt_stockqty" id="txt_stockqty" /></td>
    </tr>
    <tr>
      <td colspan="2"><div align="center">
        <input type="submit" name="txt_save" id="txt_save" value="Save" />
        <input type="reset" name="txt_cancel" id="txt_cancel" value="Cancel" />
      </div></td>
    </tr>
  </table>
</form>
<br>
<br>
<table border="1" align="center">
<tr>
<th>Product</th>
<th>Stock</th>
<th>Action</th>
</tr>


<?php

$sel="select * from    tbl_stock d inner join  tbl_product p on d.product_id=p.product_id ";
$rows=mysql_query($sel);
while($data=mysql_fetch_array($rows))
{
	
?>

<tr>
<td><?php echo $data["product_name"]; ?></td>
<td><?php echo $data["stock_qty"]; ?></td>
<td><a href="Stock.php?deltid=<?php echo $data["stock_id"]; ?>">Delete</a></td>

</tr>



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