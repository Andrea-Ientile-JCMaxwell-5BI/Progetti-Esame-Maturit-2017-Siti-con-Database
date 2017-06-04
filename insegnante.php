<!DOCTYPE html>
<html>
<?php


//PARAMETRI DI CONESSIONE AL DB E SESSION
include('connessione.php');



    $query = "SELECT * FROM `professori` WHERE username = '$username'";

    $search_result = mysqli_query($connect,$query);


?>



    <head>
        <title>Gestione Classi</title>
		<link rel="stylesheet" type="text/css" href="style_insegnante.css">

    </head>
    <body background="sfondo_insegnante.jpg">


        <form>

            <img src="logo.png" style="top:9px; left:860px; position: relative;">

            <table width= "450" id=frm align="center">
                <tr>
                    <th>Nome</th>
                    <th>Cognome</th>
                    <th>Data di nascita</th>
	                  <th>Username</th>

                </tr>

				 <?php while($row = mysqli_fetch_array($search_result)):?>
                <tr>
                    <td><?php echo $row['nome'];?></td>
                    <td><?php echo $row['cognome'];?></td>
                    <td><?php echo $row['data_nascita'];?></td>
                    <td><?php echo $row['username']?></td>


                </tr>
                <?php endwhile;?>
            </table>


        </form>

    </body>
</html>
