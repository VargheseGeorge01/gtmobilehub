<?php
include("../Connection/Connection.php");

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">

  <title>Sales Chart Report</title>

  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS"
    crossorigin="anonymous">
  <style type="text/css">
    body {
  margin: 0;
}

.container {
  height: 100vh;
}

.chart-wrapper {
  width: 600px;
  height: 600px;
  margin: 0 auto;
}
  </style>
  <?php
include("header.php");
?>
</head>

<body>

  <div class="wrapper">
    <div class="container d-flex flex-column justify-content-center align-items-center">
      <div class="title text-center mb-5">
        <h1 style="color:white;">Sales Report</h1>
      </div>
      <div class="title text-center mb-5">
       
      <form method="post">
         <table>
        <tr>
          <td>
            <select name="sel_product" id="sel_product">
              <option value="">------Select Product------</option>
               <?php
    $sel="select * from tbl_product";
    $row=mysql_query($sel);
    while($data=mysql_fetch_array($row))
    {
    ?>
        <option value="<?php echo $data["product_id"] ?>"><?php echo $data["product_name"] ?></option>
        
        <?php
    }
    ?>
            </select>
          </td>
          <td>
            <input type="submit" name="btn_search" value="Search">
          </td>
        </tr>
      </table>
      </form>
    </div>
      <div class="chart-wrapper">
        <canvas id="myChart"></canvas>
      </div>
    </div>
  </div>
<?php
if(isset($_POST["btn_search"]))
{
  $labels = array("January","February","March","April","May","June","July","August","September","October","November","December");
$dat=array();

$selQry1 = "select *  from tbl_product where product_id='".$_POST["sel_product"]."'";
  $row1 = mysql_query($selQry1);
  $data1 = mysql_fetch_array($row1);

for($j = 0 ; $j < count($labels) ; $j++)
{
  
  $selQry = "select sum(booking_qty) as qty from tbl_booking where MONTHNAME(booking_date)='".$labels[$j]."' and  product_id='".$_POST["sel_product"]."'";
  
  $row = mysql_query($selQry);
  if($data = mysql_fetch_array($row))
  {
    array_push($dat,  $data["qty"]);
  }

}
$str = implode(",",$dat);
}


?>
<input type="hidden" name="txt_val" id="txt_val" value="<?php echo $str; ?>" alt="<?php echo $data1["product_name"]; ?>">
<?php
  
?>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels"></script>
  <script src="../Ajaxpages/Jq/jquery.js"></script>

  <script >
 var monthlyData = [];
 var dataName = "";
let ctx = document.getElementById('myChart').getContext('2d');
let labels = ['January','February','March','April','May','June','July','August','September','October','November','December'];
let colorHex = ['#8b0000', '#A020F0', '#ADD8E6', '#FFA500','#00FF00','#CBC3E3','#FF0000','#90ee90','#072A6C','#FFC0CB','#FFFF00','#0000FF'];

monthlyData = document.getElementById("txt_val").value.split(",");

dataName =  document.getElementById("txt_val").alt;

let myChart = new Chart(ctx, {
  type: 'bar',
  data: {
    datasets: [{
      label: 'Most Saled '+dataName+' Product Based On Month',
      data: monthlyData,
      backgroundColor: colorHex,
      borderColor: [
      'rgb(255, 99, 132)',
      'rgb(255, 159, 64)',
      'rgb(255, 205, 86)',
      'rgb(255, 99, 132)',
      'rgb(75, 192, 192)',
      'rgb(54, 162, 235)',
      'rgb(153, 102, 255)',
      'rgb(201, 203, 207)',
      'rgb(153, 102, 255)',
      'rgb(255, 205, 86)',
      'rgb(255, 99, 132)',
      'rgb(75, 192, 192)'
    ],
    borderWidth: 1
    }],
    labels: labels
  },
  options: {
    responsive: true,
    legend: {
      position: 'bottom'
    },
    plugins: {
      datalabels: {
        color: '#fff',
        anchor: 'end',
        align: 'start',
        offset: -10,
        borderWidth: 2,
        borderColor: '#fff',
        borderRadius: 25,
        backgroundColor: (context) => {
          return context.dataset.backgroundColor;
        },
        font: {
          weight: 'bold',
          size: '10'
        },
        formatter: (value) => {
          return value + ' %';
        }
      }
    }
  }
})

  </script>
</body>
<?php
include("footer.php");
?>
</html>