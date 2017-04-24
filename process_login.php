<html>
 <head>
 </head>
  <body>
   <?php

   //Apro la sessione e...
  session_start();

 $link = mysqli_connect("localhost", "root", "");
 mysqli_select_db($link, "database_sito");

	$Username = $_POST['User'];
	$Password = md5($_POST['Pass']);

	$Username = stripcslashes($Username);
	$Password = stripcslashes($Password);
	$Username = mysqli_real_escape_string($link, $Username);
	$Password = mysqli_real_escape_string($link, $Password);




	$result = mysqli_query($link, "SELECT * FROM professori WHERE username = '$Username' and password = '$Password'")
			  or die("Failed to query database ".mysql_error());
	$row = mysqli_fetch_array($result);

	if ($row['username'] == $Username && $row['password'] == $Password)
	{
             $_SESSION['username'] = $Username;
             $_SESSION['password'] = $Password;

            //redirect verso pagina
          header("location: home.html");
          exit;
	}
	else
	{
		echo "Failed to login!";
	}
   ?>
  </body>
</html>

