<?php
include("../Connection/Connection.php");

if($_GET["gid"])
{
	$sel="select * from tbl_gallery where product_id='".$_GET["gid"]."'";
	$row=mysql_query($sel);
	$data=mysql_fetch_array($row);	
}
?>




<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>GTMobileHub::ViewGallery</title>
 <?php

include("header.php");
?>

</head>

<body>
<form id="form1" name="form1" method="post" action="">
<?php
	$sel="select * from tbl_gallery where product_id='".$_GET["gid"]."'";
    $row=mysql_query($sel);
	$i=0;
	while($data=mysql_fetch_array($row))
	{
		$i++;
	?>
<img src="../Assets/Gallery/<?php echo $data["gallery_image"];?>" width="286" height="268">
<?php 
	}
	?>
</form>
   <?php

include("footer.php");
?>

</body>
</html>