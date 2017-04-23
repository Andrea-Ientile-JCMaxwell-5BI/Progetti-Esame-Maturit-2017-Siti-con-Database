<!DOCTYPE html>
<html>
<?php

// connect to mysql database

$connect = mysqli_connect("localhost","root","");
mysqli_select_db($connect, "database_sito");



    //Apro la sessione e...
session_start();

//Recupero i dati...
$username = $_SESSION['username'];
$password = $_SESSION['password'];

if(isset($_POST['search']))
{
    $valore_da_cercare = $_POST['valore_da_cercare'];
    // search in all table columns
    // using concat mysql function
    $query = "SELECT * FROM classi,appartengono,professori WHERE appartengono.id_classe = classi.id_classe AND appartengono.id_professore = professori.id_professore AND professori.username ='$username' AND CONCAT(`aula`) LIKE '%".$valore_da_cercare."%'";
    $search_result = filterTable($query);

}
 else {
   $query = "SELECT classi.* FROM classi, appartengono, professori WHERE appartengono.id_classe = classi.id_classe AND appartengono.id_professore = professori.id_professore AND professori.username ='$username' ;";
   $search_result = filterTable($query);
}

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
		<link rel="stylesheet" type="text/css" href="style_classi.css">

    </head>
    <body>

        <form action="Classi.php" method="post">


            <table>
                <tr>
                    <th>Id Classe</th>
                    <th>Aula</th>
                    <th>Indirizzo</th>


                </tr>

				 <?php while($row = mysqli_fetch_array($search_result)):?>
                <tr>
                    <td><?php echo $row['id_classe'];?></td>
                    <td><?php echo $row['aula'];?></td>
                    <td><?php echo $row['indirizzo'];?></td>


                </tr>
                <?php endwhile;?>
            </table>

				<p align="center"> <input class="txt" type="text" name="valore_da_cercare" placeholder="Classe..."><br><br>
                       <input class="btn" type="submit" name="search" value="Cerca per classe">
					   <input class="btn1" type="submit" name="search" value="Reset">
					   </p>

        </form>

    </body>
</html>
