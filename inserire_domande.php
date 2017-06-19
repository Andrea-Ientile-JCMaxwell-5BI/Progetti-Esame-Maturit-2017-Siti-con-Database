<html>
<?php
include('connessione.php');

if(isset($_POST['submit']))
{

$tipo = $_POST['tipo'];
$desc = $_POST['desc'];
$arg = $_POST['arg'];




$toinsert = "INSERT INTO domande
            (tipologia, descrizione, argomento)
            VALUES
            ('$tipo','$desc','$arg')";

$result = mysqli_query($connect,$toinsert);

if ($result)
   echo ("Inserimento riuscito!");
else
   echo ("Errore nell'inserimento :-(");
}


 ?>

<head>
<link rel="stylesheet" type="text/css" href="style.css">
<title>Inserimento Domande</title>
</head>


<body background="sfondo_domande.jpg">

<table id=frm border="0">
	<tr align="center">


				 <td colspan="2" width="50%">

	 <a href="home.html"><img src="logo.png" alt="first.php"></a>

	 </td>
  <tr>
    <td align="center"><font color="white" size="5">Inserisci i dati richiesti</font></td>
  </tr>
  <tr>
    <td>
      <table>
        <form method="post" action="inserire_domande.php">

        <tr>
          <td><font color="white">Tipologia</font></td>
          <td><input type="text" name="tipo" size="10">
          </td>
        </tr>

        <tr>
          <td><font color="white">Argomento</font></td>
          <td><input type="text" name="arg" size="25">
          </td>
        </tr>
				<tr>
					<td><font color="white">Descrizione</font></td>
					<td><input type="text" name="desc" size="50"style="height: 80px;">
					</td>
				</tr>
        <tr align="right">
          <td></td>
          <td><input type="submit" name="submit" id = "btn1" value="Inserisci"></td>
        </tr>
        </form>
        </table>
      </td>
    </tr>
</table>
</body>
</html>
