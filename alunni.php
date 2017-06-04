<!DOCTYPE html>
<html>
<?php

include('connessione.php');

if(isset($_POST['search']))
{
    $valore_da_cercare = $_POST['valore_da_cercare'];

    $query = "SELECT alunni.*, classi.aula FROM gestiscono, professori, alunni, classi 
    WHERE gestiscono.id_professore = professori.id_professore 
    AND gestiscono.id_alunno = alunni.id_alunno AND professori.username ='$username' 
    AND alunni.id_classe = classi.id_classe AND classi.aula LIKE '%".$valore_da_cercare."%'";


}
 else {
   $query = "SELECT alunni.*, classi.aula FROM gestiscono, professori, alunni, classi 
   WHERE gestiscono.id_professore = professori.id_professore 
   AND gestiscono.id_alunno = alunni.id_alunno  AND professori.username ='$username' 
   AND alunni.id_classe = classi.id_classe;";

}

$search_result = mysqli_query($connect,$query);


?>



    <head>
        <title>Gestione Alunni</title>
		<link rel="stylesheet" type="text/css" href="style_alunni.css">

    </head>
    <body background="sfondo_alunni.jpg">

        <form action="alunni.php" method="post">

            <img src="logo.png" style="top:9px; left:860px; position: relative;">

            <table>
                <tr>
                    <th>Nome</th>
                    <th>Cognome</th>
                    <th>Data di nascita</th>
                    <th>Codice fiscale</th>
					<th>Classe</th>


                </tr>

				 <?php while($row = mysqli_fetch_array($search_result)):?>
                <tr>
                    <td><?php echo $row['nome'];?></td>
                    <td><?php echo $row['cognome'];?></td>
                    <td><?php echo $row['data_nascita'];?></td>
                    <td><?php echo $row['codice_fiscale'];?></td>
					<td><?php echo $row['aula'];?></td>


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
