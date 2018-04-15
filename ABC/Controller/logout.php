<?php
/**
 * Created by PhpStorm.
 * User: AKRITI
 * Date: 14-04-2018
 * Time: 09:59
 */

session_start();
unset($_SESSION['login_id']);
session_destroy();

header("Location: index.php");
exit;
?>