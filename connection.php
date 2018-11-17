<?php

session_start();

$host = 'localhost';
$database = 'Admin Panel';
$user = 'Admin';
$password = '123';

$link = mysqli_connect($host,$user,$password,$database) or die("Error " . mysqli_error($link));
?>