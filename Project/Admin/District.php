<?php
include("../Connection/Connection.php");



if(isset($_POST["btn_district"]))

	{
	$ins="insert into tbl_district(district_name)values('".$_POST["txt_district"]."')";
	mysql_query($ins);
	header("location:District.php");
	}

if(isset($_GET["did"]))
{
$del="delete from tbl_district where district_id='".$_GET["did"]."'";
mysql_query($del);
header("location:District.php");
}


?>



<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>GTMobileHub::District</title>


<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <?php /*?>  <?php
     include("Links.php");?><?php */?>
    
</head>
<!--<a href="Homepage.php">Home</a>-->
<body>
<?php 
     include("Header.php");?>
     <div id="tab">
<form id="form1" name="form1" method="post">
  <h2 align="center">Add District</h2>
  <table width="200" border="1" align="center">
    <tr>
      <td>District</td>
      <td><input type="text" name="txt_district" id="txt_district" /></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td><input type="submit" name="btn_district" id="btn_district" value="Submit" /></td>
    </tr>
  </table>

<br>
<br>



<table width="" border="1" cellpadding="3" cellspacing="0" align="center">
	<tr>
    	<td>DISTRICT</td>

        <td>ACTION</td>
        
    </tr>
    
    
<?php
$sel="select * from tbl_district";
$row=mysql_query($sel);
while($data=mysql_fetch_array($row))
{
	
?>

<tr>

	<td><?php echo $data["district_name"];   ?></td>

    <td><a href="District.php?did=<?php echo $data["district_id"];?>">Delete</a></td>
    
</tr>
<?php

}

?>

</table>
</form></div>
  <?php /*?>  <?php
     include("Footer.php");?><?php */?>
 <?php
  include("footer.php");
 ?>

</body>
</html>