<?php
/**
 * Created by PhpStorm.
 * User: AKRITI
 * Date: 14-04-2018
 * Time: 08:31
 */

   include("../Model/connect.php");
   session_start();

   if($_SERVER["REQUEST_METHOD"] == "POST") {
       // username and password sent from form

       $loginId = mysqli_real_escape_string($connect,$_POST['loginId']);
       $password = mysqli_real_escape_string($connect,$_POST['password']);

       $sql = "SELECT * FROM employee WHERE login_id = '$loginId' and password = '$password'";
       $result = mysqli_query($connect,$sql);

       $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
       $employee_id = $row['employee_id'];
       $name = $row['name'];

       $count = mysqli_num_rows($result);

       if($count == 1) {

           $_SESSION['employee_id'] = $employee_id;
           $_SESSION['name'] = $name;
           header("location: ../View/welcome.php");
       }else {
           $_SESSION['msg']="Login Id or Password is not correct";
           header("location:../View/index.php");
       }
   }
?>