<?php
include("../Connection/Connection.php");

if(isset($_POST["btn_save"]))

	{
		
		$proof=$_FILES["ff_image"]["name"];
	    $path=$_FILES["ff_image"]["tmp_name"];
	    move_uploaded_file($path,"../Assets/Photo/".$proof);  
	  
	  
	$ins="insert into   tbl_customer(customer_name,customer_contact,customer_email,customer_address,customer_password,customer_status,customer_photo,place_id)values('".$_POST["txt_name"]."','".$_POST["txt_contact"]."','".$_POST["txt_email"]."','".$_POST["txt_address"]."','".$_POST["txt_password"]."',0,'".$proof."','".$_POST["li_place"]."')";
	mysql_query($ins);
   ?>
    <script type="text/javascript">
    alert("Registered Successfully..");
    setTimeout(function(){window.location.href='Login.php'},40)//40millisecond it go to next page
    </script>
    <?php
	// header("location:Customer.php");
   
    
	}
  
if(isset($_POST["btn_cancel"]))
 {
	  header("location:Customer.php");
  }	
if(isset($_GET["did"]))
{
$del="delete from tbl_customer where customer_id='".$_GET["did"]."'";
mysql_query($del);
header("location:Customer.php");
}
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>GTMobileHub::CustomerRegister</title>
<?php

include("header.php");
?>
<script src="Jq/jquery.js"></script>
<script>
function show_dis(did)
{
	//alert(sid);
//alert(did);

	$.ajax({
	url: "ajaxdis.php?did="+did,
	 
//alert(mid);
	  cache: false,
	  success: function(html){
		$("#li_place").html(html);
		//alert(html);
	  }
	});
}
</script>

</head>

<body><div align="center">
<form action="" method="post" enctype="multipart/form-data" name="form1" id="form1">
  <h2 align="center">Register Here</h2>
  <table width="347" border="1" align="center">
    <tr>
      <td width="76">Name</td>
      <td width="255"><input type="text" name="txt_name" id="txt_name" required="required" pattern="[A-Z]+[A-Za-z ]{3,20}"/></td>
    </tr>
    <tr>
      <td>District</td>
      <td><select name="li_district" id="li_district" onchange="show_dis(this.value,0)">
      
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
      <td>Place</td>
      <td><select name="li_place" id="li_place">
      </select></td>
    </tr>
    <tr>
      <td>Contact</td>
      <td><input type="text" name="txt_contact" id="txt_contact" required="required" pattern="[0-9]{10,10}" /></td>
    </tr>
    <tr>
      <td>Email</td>
      <td><input type="email" name="txt_email" id="txt_email" required="required" /></td>
    </tr>
    <tr>
      <td>Address</td>
      <td><textarea name="txt_address" id="txt_address" cols="45" rows="5" required="required"></textarea></td>
    </tr>
    <tr>
      <td>Password</td>
      <td><input type="password" name="txt_password" id="txt_password" required="required" title="Mininum required 8 characters" pattern="[0-9A-Za-z@#$%&*]{8,15}" /></td>
    </tr>
    <tr>
      <td>Photo</td>
      <td><input type="file" name="ff_image" id="ff_image"  /></td>
    </tr>
    <tr>
      <td colspan="2"><div align="center">
        <input type="submit" name="btn_save" id="btn_save" value="Save" />
        <input type="reset" name="btn_cancel" id="btn_cancel" value="Cancel" />
      </div></td>
    </tr>
  </table>
</form></div>
<?php

include("footer.php");
?>
</body>
</html>