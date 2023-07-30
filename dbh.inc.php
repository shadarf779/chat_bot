<?php 

$servername = "localhost";
$dBUsername = "root";
$dBPwd = "";
$dBName = "register";

$conn = mysqli_connect($servername , $dBUsername  , $dBPwd , $dBName);

if (!$conn){
    die("Connection Timed Out: ".mysqli_connect_error());
}


