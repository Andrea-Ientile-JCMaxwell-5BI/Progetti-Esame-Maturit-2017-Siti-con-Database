<?php
//la stringa mysql_connect deve essere compilata con i dati relativi al proprio database


$link = mysqli_connect("localhost","root","");//database connection
//nome DB
mysqli_select_db($link,"database_sito");

// recupero i valori si NOME e INDIRIZZO e li assegno alle variabili $name e $address
$Username = $_POST['username'];
$Password = md5($_POST['password']);
$Nome = $_POST['nome'];
$Cognome = $_POST['cognome'];
$Data_nascita = $_POST['data_nascita'];



//inserting data order
$toinsert = "INSERT INTO professori
			(nome,cognome,data_nascita,username,password)
			VALUES
			('$Nome',
			'$Cognome',
			'$Data_nascita',
			'$Username',
			 '$Password')";

//declare in the order variable
$result = mysqli_query($link,$toinsert) or die("Problema nella query \"$toinsert\": " .mysqli_error($link));  	//order executes
if($result){
	echo("<br>Inserimento avvenuto correttamente, attendere reindirizzamento alla pagina di Login...");
	 header( "refresh:4;url=login.php" );
	 exit;
} else{
	echo("<br>Inserimento non eseguito, riprovare");
	header( "refresh:5;url=registrazione.html" );
}
?>
