<?php
include '../Model/connect.php'; //connect the connection page

if(empty($_SESSION)) // if the session not yet started
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>ABC</title>
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- stylesheets css -->
    <link rel="stylesheet" href="../Assests/css/bootstrap.min.css">
    <link rel="stylesheet" href="../Assests/css/main.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
</head>
<body class="index">
        <div class="container">
            <div class="row">
                <div class="col-sm-4"></div>
                <div class="col-sm-4">
                    <div class="login-container-wrapper">
                        <div class="logo">
                            <span class="glyphicon glyphicon-user"></span>
                        </div>
                        <div class="welcome">
                            <h3><strong>LOGIN</strong></h3><br>
                        </div>

                        <form class="form-horizontal login-form" action="../Controller/login.php" method="post">
                            <div class="form-group relative">
                                <input id="loginId" name="loginId" class="form-control input-lg" type="text" placeholder="Login Id" required>

                            </div>
                            <div class="form-group relative password">
                                <input id="password" name="password" class="form-control input-lg" type="password" placeholder="Password" required>

                            </div>
                            <div class="form-group">
                                <input name="submit" type="submit" value="Login" class="submit btn btn-success btn-lg">
                            </div>
                            <p style="text-align: center; font-size: 12px; color:red;"><?php echo $_SESSION['msg'];$_SESSION['msg'] = null; ?></p>
                            <div class="checkbox text-center">
                                <label> <a href="#" title="forget">Forgot your password?</a> </label>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-sm-4"></div>
            </div>
        </div>


<script src="../Assests/js/jquery.js"></script>
<script src="../Assests/js/bootstrap.min.js"></script>
<script src="../Assests/js/jquery.min.js"></script>
</body>
</html>