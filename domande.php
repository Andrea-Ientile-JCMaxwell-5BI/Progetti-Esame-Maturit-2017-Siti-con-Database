<!DOCTYPE html>
<html>
<?php


	//PARAMETRI DI CONESSIONE AL DB E SESSION
	include('connessione.php');
	require("fpdf/fpdf.php");



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

            <img src="logo.png" style="top:9px; left:860px; position: relative;">

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
					<td> <input type="checkbox" name="domande_id[]"  value="<?php echo $row['id_domanda'] ?>"> </td>
				</tr>
				<?php endwhile;?>
			</table>



			<p align="center"> <input class="txt" type="text" name="valore_da_cercare" placeholder="Argomento..."><br><br>
			<input class="btn" type="submit" name="search" value="Cerca per argomento">
			<input class="btn1" type="submit" name="search" value="Reset">
			<input class="btn" type="submit" name="create" value="Crea...">
			</p>



			<table>



	<?php

	// Search 2
	if(isset($_POST['create'])) {






		 if(isset($_POST['domande_id']))
		{

			foreach ($_POST['domande_id'] as $key => $m_id)
			{

			   $query = "SELECT *
			   FROM domande WHERE id_domanda = $m_id";

			   $search_result1 = mysqli_query($connect,$query);



						while($row2 = mysqli_fetch_array($search_result1)):
					   $pdf=new FPDF();
						 $pdf=new FPDF();
						 $pdf->AddPage();
						 $pdf->Image('logo.png',90,35,35);
						 $pdf->SetFont("Arial","B",20);
						 $pdf->Cell(0,10,"Verifica del professore $username",1,1,C);
						 $pdf->Cell(75,10,"Nome:",1,0);//primo numero indica la larghezza
						 $pdf->Cell(75,10,"Cognome:",1,0);//terzo numero indica il contorno
						 $pdf->Cell(40,10,"Classe:",1,0);
						 $pdf->Ln();// per interrompere linea
						 $pdf->SetFont("Arial","B",30);
						 $pdf->Cell(0,70,"Domande:",0,1,C);
						 $pdf->Ln();// per interrompere linea
						 $pdf->SetFont("Arial","B",15);
						 $pdf->Cell(0,-170,"$row2[descrizione]",0,1);
						 $pdf->Ln();// per interrompere linea
						 ob_end_clean();
						 $pdf->output();
						?>


						<?php
						endwhile;



			} // foreach

		} //if 1

		else

		{

		echo '<tr><th>nessuna selezione</th></tr>';

		}


	} //if 0

	?>




	            </table>


	        </form>

	    </body>
	</html>
