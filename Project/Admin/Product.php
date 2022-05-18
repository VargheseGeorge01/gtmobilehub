<?php 

include("../Connection/Connection.php");

if(isset($_POST["btn_save"]))
    { 
	  $sel1="select * from tbl_product where product_name='".$_POST["txt_pname"]."'";
	  $row=mysql_query($sel1);
	  if($data=mysql_fetch_array($row))
	  {?>
		  <script type="text/javascript">
      alert("Value already exists..!");
      setTimeout(function(){window.location.href='Product.php'},40);//40millisec it goto nextpage 
      </script> 
      <?php 
	  }
	  else
	  {
      $proof=$_FILES["ff_image"]["name"];
	  $path=$_FILES["ff_image"]["tmp_name"];
	  move_uploaded_file($path,"../Assets/Product/".$proof);
			
	  $ins="insert into tbl_product(product_name,subcategory_id,product_price,product_images,product_details)values('".$_POST["txt_pname"]."','".$_POST["li_subcat"]."','".$_POST["txt_price"]."','".$proof."','".$_POST["txt_details"]."')";
	  mysql_query($ins);
	  header("location:Product.php");
	  }
	}

	
if(isset($_POST["txt_cancel"]))
  {
	  header("location:Product.php");
  }	

if(isset($_GET["did"]))
{
$del="delete from tbl_product where product_id='".$_GET["did"]."'";
mysql_query($del);
header("location:Product.php");
}

?>




<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>GTMobileHub::ProductList</title>
<?php
include("header.php");
?>
</head>
<!--<a href="Homepage.php">Home</a>-->
<body><div id="tab">
  <h2 align="center">Add Product</h2>
<form action="" method="post" enctype="multipart/form-data" name="form1" id="form1">
  <table width="392" border="1" align="center">
    <tr>
      <td width="119">Name</td>
      <td width="257"><input type="text" name="txt_pname" id="txt_pname" /></td>
    </tr>
    <tr>
      <td>Subcategory</td>
      <td><select name="li_subcat" id="li_subcat">
         <option value=" ">---Select---</option>
       
         <?php
	  $sel="select * from tbl_subcategory";
	  $row=mysql_query($sel);
	 while($data=mysql_fetch_array($row))
	 {
	  
      ?>
          
      <option value="<?php echo $data["subcategory_id"];?>"><?php echo $data["subcategory_name"];?></option>
      
      <?php
      }
      ?>
      
     
      </select></td>
    </tr>
    <tr>
      <td>Price</td>
      <td><input type="text" name="txt_price" id="txt_price" /></td>
    </tr>
    <tr>
      <td>Image</td>
      <td><input type="file" name="ff_image" id="ff_image" /></td>
    </tr>
    <tr>
      <td>Details</td>
      <td><textarea name="txt_details" id="txt_details" cols="45" rows="5"></textarea></td>
    </tr>
    <tr>
      <td colspan="2"><div align="center">
        <input type="submit" name="btn_save" id="btn_save" value="Save" />
        <input type="reset" name="txt_cancel" id="txt_cancel" value="Cancel" />
      </div></td>
    </tr>
  </table>
</form>
<br>
  
  <table width="" border="1" cellpadding="3" cellspacing="0"  align="center">
	<tr>
    	<td>Product Name</td>
        <td>Subcategory</td>
        <td>Price</td>
        <td>Image</td>
        <td>Details</td>
        <td>ACTION</td>
        
    </tr>
    
 <?php
$sel="select * from tbl_product";
$row=mysql_query($sel);
while($data=mysql_fetch_array($row))
{
?>

<tr>

	<td><?php echo $data["product_name"]; ?></td>
    <td><?php echo $data["subcategory_id"]; ?></td>
    <td><?php echo $data["product_price"]; ?></td>
    <td><?php echo $data["product_images"]; ?></td>
    <td><?php echo $data["product_details"]; ?></td>
    <td><a href="Product.php?did=<?php echo $data["product_id"];?>">Delete</a></td>
    
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