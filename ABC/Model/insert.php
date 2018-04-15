<?php
/**
 * Created by PhpStorm.
 * User: AKRITI
 * Date: 13-04-2018
 * Time: 17:54
 */
include_once "connect.php";
session_start();
$sql1 = "SELECT * FROM item WHERE item_name = '".$_POST["item_name"]."'";
       $result = mysqli_query($connect,$sql1);

       $row = mysqli_fetch_array($result,MYSQLI_ASSOC);

$sql="INSERT INTO order_details (item_sold,quantity,amount,employee,date)VALUES (
      '".$_POST["item_name"]."',
      '".$_POST["quantity"]."',
      '".$_POST["amount"]."',
      '".$_SESSION["name"]."',
      '".$_POST["date"]."')";
if(mysqli_query($connect,$sql))
{
    header("location: ../View/welcome.php");
}
?>