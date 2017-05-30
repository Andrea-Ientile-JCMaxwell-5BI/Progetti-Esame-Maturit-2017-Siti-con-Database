<?php
// connect to mysql database

$connect = mysqli_connect("localhost","root","");
mysqli_select_db($connect, "database_sito");



    //Apro la sessione e...
session_start();

//Recupero i dati...
$username = $_SESSION['username'];
$password = $_SESSION['password'];

?>
