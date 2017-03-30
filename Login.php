<html>
	<head>
		<title>Login Page</title>
		 <link rel="stylesheet" type="text/css" href="style_login.css">
	</head>
	<body id="body">
		
		<div class="background-wrap">
			<video id="video-bg-elem" preload="auto" autoplay="true" loop="loop" muted="muted"> 
				<source src="videoplayback.mp4" type="video/mp4">
				Video not supported
			</video>          
		</div>
		
			<form action= "process_login.php" method="POST" >
				<table width= "450" id=frm align="center">
				
				<tr>
					<td align="center" width="50%"><input type = "text" id = "User" name = "User" placeholder="Username..."/></td>
				
				</tr>
				<tr>
				<td align="center" width="50%"><input type = "password" id = "Pass" name = "Pass" placeholder="Password..."/></td>
					 
				</tr>
				<tr align="center">

				 
	             <td colspan="2" width="30%">
				 <input type = "submit" id = "btn" value = "Login"/>
				 <input type = "reset" id = "btn2" value = "Reset"/>
				 
				 </td>
				 
				</tr>
				</table>
				
					
				
				
				
			</form>
		
	</body>
</html>
