<!DOCTYPE html>
<html>
<?php
//error_reporting(E_ALL);
//ini_set('display_errors', 1);


	//PARAMETRI DI CONESSIONE AL DB E SESSION
	include('connessione.php');


// Search 1
if(isset($_POST['search']))

		{
			$valore_da_cercare = $_POST['valore_da_cercare'];
			// search in all table columns
			// using concat mysql function
			$query = "SELECT *
			FROM domande, elencano, professori
			WHERE elencano.id_domanda = domande.id_domanda
			AND elencano.id_professore = professori.id_professore
			AND professori.username ='$username'
			AND domande.argomento LIKE '%".$valore_da_cercare."%'";

		}

		 else

		{
		   $query = "SELECT *
		   FROM domande, elencano, professori
		   WHERE elencano.id_domanda = domande.id_domanda
		   AND elencano.id_professore = professori.id_professore
		   AND professori.username ='$username' ;";

		 }


	$search_result = mysqli_query($connect,$query);

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
				<th>Seleziona</th>
			</tr>
		 <?php while($row = mysqli_fetch_array($search_result)):?>
			<tr>
				<td><?php echo $row['tipologia'];?></td>
				<td><?php echo $row['descrizione'];?></td>
				<td><?php echo $row['argomento'];?></td>
				<td> <input type="checkbox" name="messaggi[]"  value="<?php echo $row['id_domanda'] ?>"> </td>
			</tr>
			<?php endwhile;?>
		</table>



		<p align="center"> <input class="txt" type="text" name="valore_da_cercare" placeholder="Argomento..."><br><br>
		<input class="btn" type="submit" name="search" value="Cerca per argomento">
		<input class="btn1" type="submit" name="search" value="Reset">
		<input class="btn" type="submit" name="search2" value="Crea...">
		</p>



		<table>
                <tr>
                    <th>Tipologia</th>
                    <th>Descrizione</th>
                    <th>Argomento</th>
                </tr>


<?php

// Search 2
if(isset($_POST['search2'])) {


	if(($_POST['messaggi'] != ''))
	{

		foreach ($_POST['messaggi'] as $key => $m_id)
		{

		   $query = "SELECT *
		   FROM domande WHERE id_domanda = $m_id";

		   $search_result1 = mysqli_query($connect,$query);


					while($row2 = mysqli_fetch_array($search_result1)):
					?>
					<tr>
						<td><?php echo $row2['tipologia'];?></td>
						<td><?php echo $row2['descrizione'];?></td>
						<td><?php echo $row2['argomento'];?></td>
					</tr>
					<?php
					endwhile;


		} // foreach

	} //if 1

	else

	{

	echo '<tr><td>nessuna selezione</td><td></td><td></td></tr>';

	}


} //if 0

?>




            </table>


        </form>
