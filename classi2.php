<html>

<?php

//  SELECT classi.*
//FROM classi, appartengono, professori
//WHERE appartengono.id_classe = classi.id_classe AND appartengono.id_professore = professori.id_professore;php select option value from database

// connect to mysql database

$connect = mysqli_connect("localhost","root","");
mysqli_select_db($connect, "database_sito");

// mysql select query
$query1 = "SELECT * FROM `classi`";

// for method 1

$result1 = mysqli_query($connect, $query1);


$classe = $_POST["ciao"];
if(isset($_POST['search']))
{
    
   $query = "SELECT alunni.* FROM `alunni,classi` WHERE CONCAT(`aula`) LIKE '%".$classe."%' AND alunni.id_alunni = classi.id_classe";
    $search_result2 = filterTable($query);
    
}
 else {
    $query = "SELECT * FROM `classi`";
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

<!DOCTYPE html>



    <head>

        <title> PHP SELECT OPTIONS FROM DATABASE </title>

        

    </head>

    <body>

        <!--Method One-->
  <form action="classi2.php" method="POST">
  
  
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
			
			 <table>
                <tr>
                    <th>Id Alunno</th>
                    <th>Nome</th>
                    <th>Cognome</th>
					<th>Data nascita</th>
					<th>Codice Fiscale</th>
	          
                   
                </tr>
				
				 <?php while($row = mysqli_fetch_array($search_result2)):?>
                <tr>
                    <td><?php echo $row['id_alunno'];?></td>
                    <td><?php echo $row['nome'];?></td>
                    <td><?php echo $row['cognome'];?></td>
					<td><?php echo $row['data_nascita'];?></td>
					<td><?php echo $row['codice_fiscale'];?></td>
	           
            
                </tr>
                <?php endwhile;?>
            </table>
			
			
			
			
			
			
        <select name="ciao">

            <?php while($row1 = mysqli_fetch_array($result1)):;?>

            <option value="<?php echo $row1[0];?>"> <?php echo $row1[1];?> </option>

            <?php endwhile;?>

        </select>
        
		<input type="submit" name="search" value="Cerca per classe">
		
       </form>

    </body>

</html>
