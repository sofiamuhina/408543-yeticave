<?php
require ('mysql_helper.php');
require ('init.php');
session_start();
unset($_SESSION['user']);
header("Location: /index.php");
?>