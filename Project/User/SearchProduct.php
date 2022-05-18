<?php
include("../Connection/Connection.php");
session_start();
$uid=$_SESSION["uid"];
echo $uid;

	
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<!--<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>-->
<title>GTMobileHub::User SearchProduct</title>
<?php

include("header.php");
?>
</head>
<!--<a href="HomePage.php">Home</a>-->
<body>
</br></br></br></br>
<form id="form1" name="form1" method="post" action="">
<h1 align="center">Search Product</h1></br></br></br>
  <table   align="center" cellpadding="10">
    
    <tr>
      <th  scope="row" align="center">Select Product</th>
      <td ><select name="sl_category" id="sl_category">
     <option>---Select---</option>
      <?php
	  $sel="select * from tbl_category";
	  $row=mysql_query($sel);
	  while($data=mysql_fetch_array($row))
	  {
      ?>
          <option value="<?php echo $data["category_id"]; ?>"><?php echo $data["category_name"]; ?></option>
          <?php
	  }
	  ?>
        </select>
        </td>
       <td><input type="submit" name="btnSearch" value="Search"  /></td>
       </tr>
  </table>
  <br />

<table cellpadding="10"  align="center">

		<tr>
<?php
$count=0;
if(isset($_POST["btnSearch"]))
{
	
	$sel="select * from tbl_product p inner join tbl_subcategory s on p.subcategory_id=s.subcategory_id inner join tbl_category c on c.category_id=s.category_id where s.category_id='".$_POST["sl_category"]."' ";
	//echo $sel;
	$rows=mysql_query($sel);
	while($data=mysql_fetch_array($rows))
	{ 
	    $selPstock="select * from tbl_stock where product_id='".$data["product_id"]."'";
		$rowStock=mysql_query($selPstock);
		$dataStock=mysql_fetch_array($rowStock);
		$pStock=$dataStock["stock_qty"];
		$count+=1;
?>
        <td>
        	<img src="../Assets/Product/<?php echo $data["product_images"];?>"width="212" height="169"/>
            <br />
     		Name    :<?php  echo $data["product_name"];?>
            <br />
            <?php
			  if($pStock==0){
			?>
             <span style="color:#F00">Out of Stock</span>
             <?php
            }else
			{
				?>
       		<a href="Viewmore.php?id=<?php echo $data["product_id"]; ?>&img=<?php echo $data["product_images"]; ?>&amt=<?php echo $data["product_price"]; ?>&de=<?php echo $data["product_details"]; ?>&name=<?php echo $data["product_name"]; ?>&stock=<?php echo $dataStock["stock_qty"]; ?>">View Details </a><br />
            <a href="ViewGallery.php?gid=<?php echo $data["product_id"]?>">View Gallery</a>
            <br />
            <?php
			}
			?>
       
       
       
        </td>
   
     
   


<?php
		if($count%4==0)
			{
				echo "</tr>";
				echo "<tr>";
			}	
	}
}
?>
<?php

?>
</table>
</form>

<?php

include("footer.php");
?>


</body>
</html>