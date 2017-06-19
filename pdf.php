<?php

include('connessione.php');
$domande  = $_REQUEST['creapdf'];


/* STAMPA DI TEST */
foreach ($domande as $key=>$value) {

		echo $value;
		echo "<br>";
}


/* GENERAZIONE DEL PDF */
	require("fpdf/fpdf.php");


	$pdf=new FPDF();
	$today = date("F j, Y, g:i a");
	$title = 'Domande di '.$professore.''.$today;
	$pdf->SetTitle('title');
	$pdf->SetAuthor($professore);
	$pdf->AddPage();
	$pdf->Image('logo.png',90,35,35);
	$pdf->SetFont("Arial","B",20);
	$pdf->Cell(0,10,"Verifica del professore $username",1,1,C);
	$pdf->Cell(75,10,"Nome:",1,0);//primo numero indica la larghezza
	$pdf->Cell(75,10,"Cognome:",1,0);//terzo numero indica il contorno
	$pdf->Cell(40,10,"Classe:",1,0);
	$pdf->Ln();// per interrompere linea
	$pdf->SetFont("Arial","B",30);
	$pdf->Cell(0,60,"Domande:",0,1,C);
	$pdf->SetFont("Arial","B",15);


	// ciclo con elenco delle domande
	 $n=1;
	foreach ($domande as $key=>$value) {

		$pdf->SetFont('Arial','',14);
		$pdf->Write(5,"$n)$value \n");
		$pdf->Ln();// per interrompere linea
		$n=$n+1;

	}

	$pdf->Ln();// per interrompere linea
	ob_end_clean();
	$pdf->Output();




?>
