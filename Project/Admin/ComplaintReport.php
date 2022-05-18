<?php
  include("../Connection/Connection.php");
  ?>
 
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<title>Complaint Report</title>
</head>

<body>
  <?php 
include("header.php"); 
?>
<div class="col-md-5 grid-margin stretch-card" style="margin-top: 20px;">

  <div class="card">
    <div class="card-body">
<form id="form1" name="form1" method="post" action="" class="forms-sample">
<div class="form-group row">
  <label class="col-sm-3 col-form-label">
  From Date
   </label>
     <div class="col-sm-9">

     <input type="date" name="txtfromdate" id="txtfromdate" required class="form-control">
      
</div>
</div>
<div class="form-group row">
  <label class="col-sm-3 col-form-label">
      To Date</label>
      <div class="col-sm-9">
      <input type="date" name="txttodate" id="txttodate" required class="form-control">
    </div></div>
    <div align="center">
        <input type="submit" name="btnshow" id="btnshow" value="Show" />
      </div> 
</form>
</div>
</div>
</div>
</div>
 <?php
  if(isset($_POST["btnshow"])){
  ?>
<div class="row" style="align-content: center;  justify-content: center;">
<div class="col-md-12 grid-margin stretch-card" style="margin-top: 40px; ">
  <div class="card" >
<div class="table-responsive" id="table-print">
 
 <table>

  <tr>
    <th width="330">Description</th>
    <th width="167">Customer</th>
    <th width="129">Place</th>
    <th width="115">Status</th>
  </tr>
  <?php
 
  
  $qry="select * from tbl_complaint c inner join tbl_customer u on c.customer_id=u.customer_id inner join tbl_place l on l.place_id=u.place_id where c.complaint_date between '".$_POST["txtfromdate"]."' and '".$_POST["txttodate"]."' ";
  $sel=mysql_query($qry);
  //inner join tbl complainttype ct on c.complainttype_id=ct.complainttype_id inner join tbl_location l on l.location_id=u.location_id where complaint_date between '".$_POST["txtfromdate"]."' and '".$_POST["txttodate"]."';
  //$data=mysql_fetch_array($sel);
  //$num=mysql_num_rows($sel);



  while($data=mysql_fetch_array($sel))
  {
  ?>  
  

    <tr>
    <td><?php echo $data["complaint_content"]; ?></td>
    <td><?php echo $data["customer_name"];; ?></td>
    <td><?php echo $data["place_name"]; ?>&nbsp;</td>
    <?php if ($data["complaint_status"]==1)  {?>
    
    <td>Solved</td>
    <?php
	}
    else{ 
	 ?>
    
    <td>Not Solved </td>
    <?php
	 }
	 ?>
    
    
    <?php
	
  }
  
  ?>
  </tr>
</table>
<?php
  }
  ?>



<input type="button" name="btn_print" class="btn btn-primary" onclick="printDiv('table-print')" value="Print">

<p>&nbsp;</p>
<?php
include("footer.php");
?>
</body>
</html>
<script>
function printDiv(divName) {
     var printContents = document.getElementById(divName).innerHTML;
     var originalContents = document.body.innerHTML;

     document.body.innerHTML = printContents;

     window.print();

     document.body.innerHTML = originalContents;
}
</script>