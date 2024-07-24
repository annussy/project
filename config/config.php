<?php
$localhost = "localhost";
$username = "root";
$password = "";
$db = "project";

$connect = mysqli_connect ($localhost,$username,$password,$db);

$connect = new mysqli($localhost, $username, $password,$db);