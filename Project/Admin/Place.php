<?php
include("../Connection/Connection.php");
if(isset($_POST["btnsubmit"]))
{
   $sel1="select * from tbl_place where place_name='".$_POST["txtstate"]."'";
    $row=mysql_query($sel1);
    if($data=mysql_fetch_array($row))
    {?>
      <script type="text/javascript">
      alert("Value already exists..!");
      setTimeout(function(){window.location.href='Place.php'},40);//40millisec it goto nextpage 
      </script> 
      <?php 
    }
    else
    {
	$ins="insert into   tbl_place (district_id,place_name)values('".$_POST["ddldistrict"]."','".$_POST["txtstate"]."')";
	mysql_query($ins,$con);
	header("location:Place.php");
    }
}





if($_GET["delptid"])
{
	$ptid=$_GET["delptid"];
	
	$del="delete from    tbl_place where place_id='$ptid'";
	mysql_query($del);
	header("location:Place.php");
	
}

if(isset($_POST["btncancel"])){	header("location:Place.php");}


?>




<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>GTMobileHub::Place</title>
<?php
include("header.php");
?>
</head>
<!--<a href="Homepage.php">Home</a>-->
<body><div id="tab">
<form id="form1" name="form1" method="post" action="">
  <h2 align="center">Add Place</h2>
<div align="center">
  <table width="300" height="69" border="1">
    <tr>
      <td>District</td>
      <td><select name="ddldistrict" id="ddldistrict">
      
       <option value=" ">---Select---</option>
      
      <?php
	  $sel="select * from tbl_district";
	  $row=mysql_query($sel);
	 while($data=mysql_fetch_array($row))
	 {
	  
      ?>
      
      
      
      <option value="<?php echo $data["district_id"];?>"><?php echo $data["district_name"];?></option>
      
      <?php
      }
      ?>
      
      
      
      
      
      </select></td>
    </tr>
    <tr>
      <td width="144">Place</td>
      <td width="144"><label for="txtstate"></label>
      <input type="text" name="txtstate" id="txtstate" required="required" autocomplete="off"/></td>
    </tr>
    <tr>
      <td colspan="2"><div align="center">
        <input type="submit" name="btnsubmit" id="btnsubmit" value="Submit" />
        <input type="submit" name="btncancel" id="btncancel" value="Cancel" formnovalidate="formnovalidate"/>
      </div></td>
    </tr>
  </table></div>
</form>
<br />
<br />
<br />
<table border="1" align="center">
<tr>
<th>District</th>
<th>Place</th>
<th>Action</th>
</tr>


<?php

$sel="select * from    tbl_district d inner join  tbl_place p on d.district_id=p.district_id ";
$rows=mysql_query($sel);
while($data=mysql_fetch_array($rows))
{
	
?>

<tr>
<td><?php echo $data["district_name"]; ?></td>
<td><?php echo $data["place_name"]; ?></td>
<td><a href="Place.php?delptid=<?php echo $data["place_id"]; ?>">Delete</a></td>

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