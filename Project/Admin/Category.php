<?php 

include("../Connection/Connection.php");

if(isset($_POST["btn_save"]))
    {
	  $ins="insert into tbl_category(category_name)values('".$_POST["txt_category"]."')";
	  mysql_query($ins);
	  header("location:Category.php");
	}
	
if(isset($_POST["txt_cancel"]))
  {
	  header("location:Category.php");
  }	
  
if(isset($_GET["did"]))
{
$del="delete from tbl_category where category_id='".$_GET["did"]."'";
mysql_query($del);
header("location:Category.php");
}

?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
 <?php /*?>  <?php
     include("Links.php");?><?php */?>
<title>GTMobileHub::Category</title>
</head>
<?php 
 include("header.php");
?>
<!--<a href="Homepage.php">Home</a>-->
<body>
<?php /*?> <?php
     include("Header.php");?><?php */?>
     <div id="tab">
<form id="form1" name="form1" method="post" action="">
  <h2 align="center">Add Category</h2>
  <table width="240" border="1" align="center">
    <tr>
      <td width="107">Category</td>
      <td width="117"><input type="text" name="txt_category" id="txt_category" /></td>
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
    	<td>CATEGORY</td>

        <td>ACTION</td>
        
    </tr>
    
 <?php
$sel="select * from tbl_category";
$row=mysql_query($sel);
while($data=mysql_fetch_array($row))
{
?>

<tr>

	<td><?php echo $data["category_name"];   ?></td>

    <td><a href="Category.php?did=<?php echo $data["category_id"];?>">Delete</a></td>
    
</tr>
<?php

}

?>

</table></div>
  <?php /*?>  <?php
     include("Footer.php");?><?php */?>	
     <?php 
 include("footer.php");
?>
	
	   
</body>
</html>