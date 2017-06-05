<html>
	<head>
		<title>Pagina Registrazione</title>
		 <link rel="stylesheet" type="text/css" href="style.css">
	</head>
	<body id="body">
		
		<div class="background-wrap">
			<video id="video-bg-elem" preload="auto" autoplay="true" loop="loop" muted="muted"> 
				<source src="video_registrazione.mp4" type="video/mp4">
				Video not supported
			</video>          
		</div>
		
			<form action= "process_registrazione.php" method="POST" >
				<table width= "450" id=frm align="center">
					
		               <tr align="center">
			           <td colspan="2" width="50%">
			     <img src="logo.png" alt="first.php">
			     </td>
			    </tr>
				
				<tr>
					<td align="center" width="50%"><input type = "text" id = "nome" name = "nome" placeholder="Nome..."/></td>
				
				</tr>
				<tr>
				<td align="center" width="50%"><input type = "text" id = "cognome" name = "cognome" placeholder="Cognome..."/></td>
					 
				</tr>
				
				<tr>
					<td align="center" width="50%"><input type = "text" id = "data_nascita" name = "data_nascita" placeholder="Data di nascita..."/></td>
				
				</tr>
				<tr>
				<td align="center" width="50%"><input type = "text" id = "username" name = "username" placeholder="Username..."/></td>
					 
				</tr>
				
				<tr>
				<td align="center" width="50%"><input type = "password" id = "password" name = "password" placeholder="Password..."/></td>
					 
				</tr>
				
				<tr align="center">

				 
	             <td colspan="2" width="30%">
				 <input type = "submit" id = "btn1" value = "Registrati"/>
				 <input type = "reset" id = "btn2" value = "Reset"/>
				 
				 </td>
				 
				</tr>
				</table>
				
					
				
				
				
			</form>
		
	</body>
</html>
