<?php
 //passo dati dal form login.html

 $email = $_POST['email'];
 $psw = $_POST['psw'];
 
 //prevenzione

 $email = stripcslashes($email);
 $psw = stripcslashes($psw);
 $email = mysql_real_escape_string($email);
 $psw = mysql_real_escape_string($psw);

//connessione al server e selezione Database

mysql_connect("localhost", "root","");
mysql_select_db("login");

// Query  al Database da parte dell'utente

$result = mysql_query("select * from users where email = '$email' and password = '$psw'")
            or die("Failed to query database ".mysql_error());
$row = mysql_fetch_array($result);
if ($row['email'] == $email && $row['password'] == $psw ){
 
  echo "Login avvenuto con successo! Benvenuto.".$row['username];

                                                         }
else 
     {
      echo "Failed to login!"; 
     }
?>

 
