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
    $query = "SELECT domande.* FROM domande, elencano, professori WHERE elencano.id_domanda = domande.id_domanda AND elencano.id_professore = professori.id_professore AND professori.username ='$username' AND domande.argomento LIKE '%".$valore_da_cercare."%'";
    $search_result = filterTable($query);

}
 else {
   $query = "SELECT domande.* FROM domande, elencano, professori WHERE elencano.id_domanda = domande.id_domanda AND elencano.id_professore = professori.id_professore AND professori.username ='$username' ;";
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
        <title>Gestione Domande</title>
		<link rel="stylesheet" type="text/css" href="style_domande.css">

    </head>
    <body background="sfondo_classe.jpg">

        <form action="domande.php" method="post">


            <table>
                <tr>
                    <th>Tipologia</th>
                    <th>Descrizione</th>
                    <th>Argomento</th>



                </tr>

				 <?php while($row = mysqli_fetch_array($search_result)):?>
                <tr>
                    <td><?php echo $row['tipologia'];?></td>
                    <td><?php echo $row['descrizione'];?></td>
                    <td><?php echo $row['argomento'];?></td>



                </tr>
                <?php endwhile;?>
            </table>

				     <p align="center"> <input class="txt" type="text" name="valore_da_cercare" placeholder="Argomento..."><br><br>
                       <input class="btn" type="submit" name="search" value="Cerca per argomento">
					   <input class="btn1" type="submit" name="search" value="Reset">
					   </p>

        </form>

    </body>
</html>
