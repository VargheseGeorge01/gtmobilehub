<?php
include("../Connection/Connection.php");
if(isset($_POST["btn_save"]))
{
	$ins="insert into  tbl_subcategory(category_id,subcategory_name)values('".$_POST["sl_category"]."','".$_POST["txt_subcat"]."')";
	
	echo $ins;
		mysql_query($ins);
	header("location:Subcategory.php");
}

if(isset($_POST["btn_cancel"]))
  {	
  header("location:Subcategory.php");

  }
  
if($_GET["deltid"])
{
	$ptid=$_GET["delptid"];
	
	$del="delete from    tbl_subcategory where subcategory_id='$ptid'";
	mysql_query($del);
	header("location:Subcategory.php");
	
}  

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>GTMobileHub::Sub Category</title>
<?php 
include("header.php");
?>
</head>
<!--<a href="Homepage.php">Home</a>-->
<body><div id="tab">
<form id="form1" name="form1" method="post" action="">
  <table width="254" border="1" align="center">
      
      <tr>
      <td>Category</td>
      <td><select name="sl_category" id="sl_category">
      
       <option value=" ">---Select---</option>
       
         <?php
	  $sel="select * from tbl_category";
	  $row=mysql_query($sel);
	 while($data=mysql_fetch_array($row))
	 {
	  
      ?>
      
         
      <option value="<?php echo $data["category_id"];?>"><?php echo $data["category_name"];?></option>
      
      <?php
      }
      ?>
      
       
       
      </select></td>
    </tr>
     
    <tr>
      <td width="109">Subcategory</td>
      <td width="129"><input type="text" name="txt_subcat" id="txt_subcat" /></td>
    </tr>
  
    <tr>
      <td colspan="2"><div align="center">
        <input type="submit" name="btn_save" id="btn_save" value="Save" />
        <input type="reset" name="btn_cancel" id="btn_cancel" value="Cancel" />
      </div></td>
    </tr>
  </table>
</form>

<br />
<br />
<br />
<table border="1" align="center">
<tr>
<th>Category</th>
<th>Subcategory</th>
<th>Action</th>
</tr>

<?php

$sel="select * from    tbl_category d inner join  tbl_subcategory p on d.category_id=p.category_id ";
$rows=mysql_query($sel);
while($data=mysql_fetch_array($rows))
{
	
?>

<tr>
<td><?php echo $data["category_name"]; ?></td>
<td><?php echo $data["subcategory_name"]; ?></td>
<td><a href="Subcategory.php?delptid=<?php echo $data["subcategory_id"]; ?>">Delete</a></td>

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