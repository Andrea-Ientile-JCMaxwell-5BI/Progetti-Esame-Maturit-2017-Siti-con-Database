<html>
 <head>
 </head>
  <body>
   <?php
	$Username = $_POST['User'];
	$Password = $_POST['Pass'];
	
	$Username = stripcslashes($Username);
	$Password = stripcslashes($Password);
	$Username = mysql_real_escape_string($Username);
	$Password = mysql_real_escape_string($Password);
	
	mysql_connect("localhost", "root", "");
	mysql_select_db("login");
	
	$result = mysql_query("SELECT * FROM users WHERE Username = '$Username' and Passwordd = '$Password'") 
			  or die("Failed to query database ".mysql_error());
	$row = mysql_fetch_array($result);
	
	if ($row['Username'] == $Username && $row['Passwordd'] == $Password)
	{
		echo "Login success!!! Welcome " .$row['Username'];
	}
	else
	{
		echo "Failed to login!";
	}
   ?>
  </body>
</html>