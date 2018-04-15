<?php
/**
 * Created by PhpStorm.
 * User: AKRITI
 * Date: 14-04-2018
 * Time: 08:52
 */
include '../Model/connect.php'; //connect the connection page

if(empty($_SESSION)) // if the session not yet started
    session_start();

if(!isset($_SESSION['employee_id'])) { //if not yet logged in
    header("Location: index.php");// send to login page
    exit;
}
if( isset($_POST['ajax']) && isset($_POST['item_name']) ){
 $sql = "SELECT rate FROM item WHERE item_name = '".$_POST["item_name"]."'";
 $result = mysqli_query($connect,$sql);
 $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
 echo $row['rate'];
 exit;
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
    <link href="../Assests/css/main.css" rel="stylesheet" />
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,700,600,800" rel="stylesheet" />
    <link href="{{ asset('https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css') }}" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=Great+Vibes" rel="stylesheet" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script>window.jQuery || document.write('<script src="js/jquery-1.9.1.min.js"><\/script>')</script>
    <script src="../Assests/js/bootstrap.min.js"></script>

<script type="text/javascript">
function Call(){
        var quantity = document.getElementById('quantity').value;
        var item = document.getElementById('item_name').value;
       $.ajax({
                    type:"POST",
                    data:{ajax:1, item_name:item},
                    success:function(data){
                        var amount = data*quantity;
                        $('#amount').val(amount);
                    }
                });
    }
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
            <a class="navbar-brand" href="" style="font-family:'Open Sans',
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
                <div class="col-sm-2"></div>
                <div class="col-sm-8">
                    <div class="welcome-card">
                        <div class="welcome-head">
                            <h3>ADD AN ORDER</h3>
                            <hr>
                        </div>
                        <form class="form-horizontal" action="../Model/insert.php" method="POST">
                            <div class="form-group">
                              <label style="text-align: start;" class="control-label col-sm-offset-1 col-sm-2">Item:</label>
                              <div class="col-sm-9">
                                  <select class="form-control" name="item_name" id="item_name">
                                    <option>--Select--</option>
                                    <option>Tea</option>
                                    <option>Coffee</option>
                                    <option>Samosa</option>
                                    <option>Cake</option>
                                  </select>
                              </div>
                            </div>
                            <div class="form-group">
                              <label style="text-align: start;" class="control-label col-sm-offset-1 col-sm-2" for="pwd">Quantity:</label>
                              <div class="col-sm-9">          
                                <input type="number" class="form-control" id="quantity" placeholder="Enter quantity" name="quantity" onkeyup="Call()">
                              </div>
                            </div>
                            <div class="form-group">
                              <label style="text-align: start;" class="control-label col-sm-offset-1 col-sm-2" for="pwd">Amount:</label>
                              <div class="col-sm-9">          
                                <input type="float" class="form-control" id="amount" placeholder="Amount" name="amount">
                              </div>
                            </div>
                            <div class="form-group">
                              <label style="text-align: start;" class="control-label col-sm-offset-1 col-sm-2" for="pwd">Date:</label>
                              <div class="col-sm-9">          
                                <input type="date" class="form-control" id="date" placeholder="YYYY-MM-DD" name="date">
                              </div>
                            </div>
                            <div class="form-group">        
                              <div class="col-sm-offset-3 col-sm-9">
                                <button type="submit" class="btn btn-success btn-default">Submit</button>
                              </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-sm-2"></div>
            </div>
        </div>


</body>
</html>