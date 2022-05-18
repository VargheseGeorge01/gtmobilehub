<?php
include("../Connection/Connection.php");

if(isset($_POST["btn_save"]))

	{
		$proof=$_FILES["ff_image"]["name"];
	    $path=$_FILES["ff_image"]["tmp_name"];
	    move_uploaded_file($path,"../Assets/StaffImg/".$proof);
		
		$sproof=$_FILES["ff_proof"]["name"];
	    $path=$_FILES["ff_proof"]["tmp_name"];
	    move_uploaded_file($path,"../Assets/StaffImg/".$sproof); 
		
	$ins="insert into tbl_staff(staff_name,staff_contact,staff_email,staff_address,staff_photo,staff_proof,staff_password,place_id)values('".$_POST["txt_sname"]."','".$_POST["txt_contact"]."','".$_POST["txt_email"]."','".$_POST["txt_address"]."','".$proof."','".$sproof."','".$_POST["txt_password"]."','".$_POST["sl_place"]."')";
	mysql_query($ins);
  ?>
    <script type="text/javascript">
    alert("Registered Successfully..");
    setTimeout(function(){window.location.href='Staff.php'},40)//40millisecond it go to next page
    </script>
    <?php
	//header("location:Staff.php");
	}
	
	if($_GET["delptid"])
    {
	$ptid=$_GET["delptid"];
	
	$del="delete from    tbl_staff where staff_id='$ptid'";
	mysql_query($del);
	header("location:Staff.php");
	}
	
	if(isset($_POST["btncancel"])){	header("location:Staff.php");}

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>GTMobileHub::Staff</title>
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
		$("#sl_place").html(html);
		//alert(html);
	  }
	});
}
</script>

</head>
</head>
<!--<a href="Homepage.php">Home</a>-->
<body><div id="tab">
<form action="" method="post" enctype="multipart/form-data" name="form1" id="form1">
  <h2 align="center">Add Staff</h2>
  <table width="381" border="1"  align="center">
    <tr>
      <td width="97">Staff Name</td>
      <td width="268"><input type="text" name="txt_sname" required="required" id="txt_sname" patter="[A-Z]+[A-Za-z ]{3,20}"/></td>
    </tr>
    <tr>
      <td>District</td>
      <td><select name="sl_district" id="sl_district" onchange="show_dis(this.value,0)">
      
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
      <td><select name="sl_place" id="sl_place" >
      </select></td>
    </tr>
    <tr>
      <td>Contact</td>
      <td><input type="text" name="txt_contact" required="required" id="txt_contact" pattern="[0-9]{10,10}" /></td>
    </tr>
    <tr>
      <td>Email</td>
      <td><input type="email" name="txt_email" id="txt_email" required="required"/></td>
    </tr>
    <tr>
      <td>Address</td>
      <td><textarea name="txt_address" id="txt_address" cols="45" rows="5" required="required"></textarea></td>
    </tr>
    <tr>
      <td>Photo</td>
      <td><input type="file" name="ff_image" id="ff_image" required="required"/></td>
    </tr>
    <tr>
      <td>Proof</td>
      <td><input type="file" name="ff_proof" id="ff_proof" required="required" /></td>
    </tr>
    <tr>
      <td>Password</td>
      <td><input type="password" name="txt_password" id="txt_password" required="required" title="Minimum required 8 characters" pattern="[0-9A-Za-z@#$%&*]{8,15}" /></td>
    </tr>
  
      <td colspan="2"><div align="center">
        <input type="submit" name="btn_save" id="btn_save" value="Save" /> 
        <input type="reset" name="btn_cancel" id="btn_cancel" value="Cancel" />
      </div></td>
    </tr>
  </table>
</form>
<br><br />
 <table width="" border="1" cellpadding="3" cellspacing="0"  align="center">
	<tr>
    	<td>NAME</td>
        <td>CONTACT</td>
        <td>EMAIL</td>
        <td>ADDRESS</td>
        <td>IMAGES</td>
        <td>PROOF</td>
        <td>PASSWORD</td>
        <td>PLACE</td>
        <td>ACTION</td>
        
    </tr>
    
 <?php
$sel="select * from tbl_staff";
$row=mysql_query($sel);
while($data=mysql_fetch_array($row))
{
?>

<tr>

	<td><?php echo $data["staff_name"];   ?></td>
    <td><?php echo $data["staff_contact"];   ?></td>
    <td><?php echo $data["staff_email"];   ?></td>
    <td><?php echo $data["staff_address"];   ?></td>
    <td><?php echo $data["staff_photo"];   ?></td>
    <td><?php echo $data["staff_proof"];   ?></td>
    <td><?php echo $data["staff_password"];   ?></td>
    <td><?php echo $data["place_id"];   ?></td>

    <td><a href="Staff.php?delptid=<?php echo $data["staff_id"];?>">Delete</a></td>
    
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