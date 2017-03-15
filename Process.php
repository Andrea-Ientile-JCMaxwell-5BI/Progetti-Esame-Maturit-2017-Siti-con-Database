<html>
 <head>
 </head>
  <body>
   <?php

 $link = mysqli_connect("localhost", "root", "");
 mysqli_select_db($link, "login");

	$Username = $_POST['User'];
	$Password = $_POST['Pass'];

	$Username = stripcslashes($Username);
	$Password = stripcslashes($Password);
	$Username = mysqli_real_escape_string($link, $Username);
	$Password = mysqli_real_escape_string($link, $Password);




	$result = mysqli_query($link, "SELECT * FROM users WHERE Username = '$Username' and Passwordd = '$Password'")
			  or die("Failed to query database ".mysql_error());
	$row = mysqli_fetch_array($result);

	if ($row['Username'] == $Username && $row['Passwordd'] == $Password)
	{
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
