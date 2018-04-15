<?php
/**
 * Created by PhpStorm.
 * User: AKRITI
 * Date: 14-04-2018
 * Time: 08:52
 */
include '../Model/connect.php'; //connect the connection page
include 'fusioncharts.php';

if(empty($_SESSION)) // if the session not yet started
    session_start();

if(!isset($_SESSION['employee_id'])) { //if not yet logged in
    header("Location: index.php");// send to login page
    exit;
}

$pie = "SELECT item_sold, SUM(quantity) AS total FROM order_details WHERE employee = '".$_SESSION["name"]."' GROUP BY item_sold";

      $pieresult = mysqli_query($connect,$pie);
       $pierow = mysqli_fetch_all($pieresult,MYSQLI_ASSOC);

       $piePoints = array();
       for($i=0; $i<count($pierow);$i++){
        array_push($piePoints, array("label"=>$pierow[$i]['item_sold'], "y"=>(int)$pierow[$i]['total']));
       }

$line = "SELECT date, SUM(amount) AS total FROM order_details WHERE employee = '".$_SESSION["name"]."' GROUP BY date";
       $lineresult = mysqli_query($connect,$line);
       $linerow = mysqli_fetch_all($lineresult,MYSQLI_ASSOC);
        $linePoints = array();
       for($i=0; $i<count($linerow);$i++){
        array_push($linePoints, array("y"=>(int)$linerow[$i]['total'], "label"=>$linerow[$i]['date']));
       }
        
$bar = "SELECT item_sold, SUM(amount) AS total FROM order_details WHERE employee = '".$_SESSION["name"]."' GROUP BY item_sold";
 
       $barresult = mysqli_query($connect,$bar);
       $barrow = mysqli_fetch_all($barresult,MYSQLI_ASSOC);
        $barPoints = array();
       for($i=0; $i<count($barrow);$i++){
        array_push($barPoints, array("y"=>(int)$barrow[$i]['total'], "label"=>$barrow[$i]['item_sold']));
       } 
    
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>ABC</title>

    <link href="../Assests/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="../Assests/css/main.css">
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,700,600,800" rel="stylesheet" />
    <link href="{{ asset('https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css') }}" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=Great+Vibes" rel="stylesheet" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script>window.jQuery || document.write('<script src="js/jquery-1.9.1.min.js"><\/script>')</script>
    <script src="../Assests/js/bootstrap.min.js"></script>
    <script src="../Assests/js/canvasjs.min.js"></script>

<script>
window.onload = function() {
 
 
var pie = new CanvasJS.Chart("piechart", {
    theme: "theme2",
    animationEnabled: true,
    data: [{
        type: "pie",
        indexLabel: "{y}",
        yValueFormatString: "#",
        indexLabelPlacement: "inside",
        indexLabelFontColor: "#36454F",
        indexLabelFontSize: 18,
        indexLabelFontWeight: "bolder",
        showInLegend: true,
        legendText: "{label}",
        dataPoints: <?php echo json_encode($piePoints, JSON_NUMERIC_CHECK); ?>
    }]
});
pie.render();

var line = new CanvasJS.Chart("linechart", {
    theme: "theme2",
    animationEnabled: true,
    axisY: {
        title: "Total Sales"
    },
    axisX: {
        title: "Date"
    },
    data: [{
        type: "line",
        indexLabel: "{y}",
        yValueFormatString: "#",
        indexLabelPlacement: "inside",
        indexLabelFontColor: "#36454F",
        indexLabelFontSize: 18,
        indexLabelFontWeight: "bolder",
        legendText: "{label}",
        dataPoints: <?php echo json_encode($linePoints, JSON_NUMERIC_CHECK); ?>
    }]
});
line.render();

var bar = new CanvasJS.Chart("barchart", {
    theme: "theme2",
    animationEnabled: true,
    axisX: {
        title: "Items"
    },
    axisY: {
        title: "Total Sales"
    },
    data: [{
        type: "bar",
        indexLabel: "{y}",
        yValueFormatString: "#",
        indexLabelPlacement: "inside",
        indexLabelFontColor: "#36454F",
        indexLabelFontSize: 18,
        indexLabelFontWeight: "bolder",
        legendText: "{label}",
        dataPoints: <?php echo json_encode($barPoints, JSON_NUMERIC_CHECK); ?>
    }]
});
bar.render();
 
}
</script>

<script type="text/javascript">
    
    
</script>


</head>

<body>
<!--[if lt IE 7]>
<p class="chromeframe">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">activate Google Chrome Frame</a> to improve your experience.</p>
<![endif]-->


<header class="navbar navbar-fixed-top" role="banner" style="background-color:#1c262f; ">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar" style="background-color: #fafbfc"></span>
                <span class="icon-bar" style="background-color: #fafbfc"></span>
                <span class="icon-bar" style="background-color: #fafbfc"></span>
            </button>
            <a class="navbar-brand" href="#" style="font-family:'Open Sans',
                          sans-serif; color:#fafbfc;font-size:28px;letter-spacing: 3px;">ABC RESTAURANT</a>
        </div>
        <div class="collapse navbar-collapse">
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="welcome.php"><span class="glyphicon glyphicon-home"></span>&nbsp;Home</a></li>
                    <li><a href="welcome.php"><span class="glyphicon glyphicon-user"></span>&nbsp;<?php echo $_SESSION['name']; ?></a></li>
                    <li><a href="index.php"><span class="glyphicon glyphicon-log-out"></span>&nbsp;Log Out</a></li>
                </ul>
        </div>
    </div>
</header><!--/header-->

        <div class="container">
            <div class="row">
                <h3 style="margin-top: 12%; text-align: center; color: #02b3e4">REPORTS</h3><hr>
                <div class="col-sm-6">
                    <div class="welcome-card" style="top:9vh;">
                        <div class="welcome-head">
                            <h3>Day-wise Sales</h3>
                        </div>
                        <div class="chart">
                            <div id="linechart" style="height: 250px; width: 100%;"></div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="welcome-card" style="top:9vh;">
                        <div class="welcome-head">
                            <h3>Quantity-wise item sold</h3>
                        </div>
                        <div class="chart">
                            <div id="piechart" style="height: 250px; width: 100%;"></div>
                        </div>
                    </div>
                </div>

               <div class="col-sm-offset-3 col-sm-6 col-sm-offset-3">
                <div class="welcome-card" style="top:9vh;">
                    <div class="welcome-head">
                        <h3>Item-wise Sales</h3>
                    </div>
                        <div class="chart">
                            <div id="barchart" style="height: 250px; width: 100%;"></div>
                        </div>
                    </div>
               </div> 
            </div>
        </div>


</body>
</html>