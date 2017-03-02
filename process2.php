<html>
 <head>
 </head>
 <body>
 
<?php
 //passo dati dal form login.html

 $email = $_POST['email'];
 $password = $_POST['password'];
 
 //prevenzione

 $email = stripcslashes($email);
 $password = stripcslashes($password);
 $email = mysqli_real_escape_string($email);
 $password = mysqli_real_escape_string($password);

//connessione al server e selezione Database

$conn = mysqli_connect("localhost","root","");
$sel = mysqli_select_db($conn, "login");

// Query  al Database da parte dell'utente

$result = mysqli_query("SELECT * FROM users WHERE email = '$email' and password = '$password'")
            or die("Failed to query database ".mysql_error());
$row = mysqli_fetch_array($result);
if ($row['email'] == $email && $row['password'] == $password ){
 
  echo "Login avvenuto con successo! Benvenuto.".$row['username];

                                                         }
else 
     {
      echo "Failed to login!"; 
     }
?>
</body>
 </html>
