<?php
include("../Connection/Connection.php");

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">

  <title></title>

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
        <h1>Sales Report</h1>
      </div>
      <div class="chart-wrapper">
        <canvas id="myChart"></canvas>
      </div>
    </div>
  </div>
<?php
$labels = array("January","February","March","April","May","June","July","August","September","October","November","December");
$dat=array();

for($j = 0 ; $j < count($labels) ; $j++)
{
  
  $selQry = "select sum(booking_qty) as qty from tbl_booking where MONTHNAME(booking_date)='".$labels[$j]."'";
  $row = mysql_query($selQry);
  if($data = mysql_fetch_array($row))
  {
    array_push($dat,  $data["qty"]);
  }

}

$str = implode(",",$dat);
?>
<input type="hidden" name="txt_val" id="txt_val" value="<?php echo $str; ?>">
<?php
  
?>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels"></script>
  <script src="../Ajaxpages/Jq/jquery.js"></script>

  <script >
 var monthlyData = [];
let ctx = document.getElementById('myChart').getContext('2d');
let labels = ['January','February','March','April','May','June','July','August','September','October','November','December'];
let colorHex = ['#8b0000', '#A020F0', '#ADD8E6', '#FFA500','#00FF00','#CBC3E3','#FF0000','#90ee90','#072A6C','#FFC0CB','#FFFF00','#0000FF'];

monthlyData = document.getElementById("txt_val").value.split(",");


let myChart = new Chart(ctx, {
  type: 'pie',
  data: {
    datasets: [{
      data: monthlyData,
      backgroundColor: colorHex
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
  <?php 
    include("footer.php");
  ?>
</body>

</html>