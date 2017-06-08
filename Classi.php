<!DOCTYPE html>
<html>
<?php

//PARAMETRI DI CONESSIONE AL DB E SESSION
include('connessione.php');


if(isset($_POST['search']))
{
    $valore_da_cercare = $_POST['valore_da_cercare'];
    // search in all table columns
    // using concat mysql function
    $query = "SELECT * FROM classi,appartengono,professori 
    WHERE appartengono.id_classe = classi.id_classe 
    AND appartengono.id_professore = professori.id_professore 
    AND professori.username ='$username' AND CONCAT(`indirizzo`) LIKE '%".$valore_da_cercare."%'";


}
 else {
   $query = "SELECT classi.* FROM classi, appartengono, professori 
   WHERE appartengono.id_classe = classi.id_classe 
   AND appartengono.id_professore = professori.id_professore 
   AND professori.username ='$username' ;";

}

// function to connect and execute the query
$search_result = mysqli_query($connect,$query);

?>



    <head>
        <title>Gestione Classi</title>
		<link rel="stylesheet" type="text/css" href="style_classi.css">

    </head>
    <body background="sfondo_classe.jpg">

        <form action="Classi.php" method="post">

            <img src="logo.png" style="top:9px; left:860px; position: relative;">

            <table>
                <tr>

                    <th>Aula</th>
                    <th>Indirizzo</th>


                </tr>

				 <?php while($row = mysqli_fetch_array($search_result)):?>
                <tr>

                    <td><?php echo $row['aula'];?></td>
                    <td><?php echo $row['indirizzo'];?></td>


                </tr>
                <?php endwhile;?>
            </table>

				<p align="center"> <input class="txt" type="text" name="valore_da_cercare" placeholder="Indirizzo..."><br><br>
                       <input class="btn" type="submit" name="search" value="Cerca per indirizzo">
					   <input class="btn1" type="submit" name="search" value="Reset">
					   </p>

        </form>

    </body>
</html>
