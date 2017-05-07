<!DOCTYPE html>
<html>
<?php


//Apro la sessione e...
session_start();

//Recupero i dati...
$username = $_SESSION['username'];
$password = $_SESSION['password'];

//facciamo una stampata a video!
   //echo "Ciao " . $username . " la tua password è " . $password;



    $query = "SELECT * FROM `professori` WHERE username = '$username'";
    $search_result = filterTable($query);

// function to connect and execute the query
function filterTable($query)
{
    $connect = mysqli_connect("localhost", "root", "", "database_sito");
    $filter_Result = mysqli_query($connect, $query);
    return $filter_Result;
}



?>



    <head>
        <title>Gestione Classi</title>
		<link rel="stylesheet" type="text/css" href="style_insegnante.css">

    </head>
    <body background="sfondo_insegnante.jpg">


        <form action="Classi.php" method="post">


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
