<?php
include("../Connection/Connection.php");
if(isset($_POST["btn_save"]))
{   
     
	$proof=$_FILES["ff_img"]["name"];
	$path=$_FILES["ff_img"]["tmp_name"];
	 move_uploaded_file($path,"../Assets/Gallery/".$proof);  
     

	$ins="insert into  tbl_gallery(product_id,gallery_image,gallery_description)values('".$_POST["sl_product"]."','".$proof."','".$_POST["txt_descp"]."')";
	
	echo $ins;
		mysql_query($ins);
	header("location:Gallery.php");
}

if(isset($_POST["btn_cancel"]))
  {	
  header("location:Gallery.php");

  }
  
if($_GET["deltid"])
{
	$ptid=$_GET["deltid"];
	
	$del="delete from    tbl_gallery where gallery_id='$ptid'";
	mysql_query($del);
	header("location:Gallery.php");
	
}  

?>



<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>GTMobileHub::GalleryView</title>
<?php 
include("header.php");
?>
</head>
<!--<a href="Homepage.php">Home</a>-->
<body><div id="tab">
<form action="" method="post" enctype="multipart/form-data" name="form1" id="form1">
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
      <td>Image</td>
      <td><input type="file" name="ff_img" id="ff_img" /></td>
    </tr>
    <tr>
      <td>Description</td>
      <td><textarea name="txt_descp" id="txt_descp" cols="45" rows="5"></textarea></td>
    </tr>
    <tr>
      <td colspan="2"><div align="center">
        <input type="submit" name="btn_save" id="btn_save" value="Save" />
        <input type="reset" name="btn_cancel" id="btn_cancel" value="Cancel" />
      </div></td>
    </tr>
  </table>
</form>
<br>
<br>
<table border="1" align="center">
<tr>
<th>Product</th>
<th>Image</th>
<th>Description</th>
<th>Action</th>
</tr>


<?php

$sel="select * from    tbl_gallery d inner join  tbl_product p on d.product_id=p.product_id ";
$rows=mysql_query($sel);
while($data=mysql_fetch_array($rows))
{
	
?>

<tr>
<td><?php echo $data["product_name"]; ?></td>
<td><?php echo $data["gallery_image"]; ?></td>
<td><?php echo $data["gallery_description"]; ?></td>
<td><a href="Gallery.php?deltid=<?php echo $data["gallery_id"]; ?>">Delete</a></td>

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