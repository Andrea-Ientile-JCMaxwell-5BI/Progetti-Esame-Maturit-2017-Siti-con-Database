<!DOCTYPE html>
<html>
<?php

if(isset($_POST['search']))
{
    $valore_da_cercare = $_POST['valore_da_cercare'];
    // search in all table columns
    // using concat mysql function
    $query = "SELECT * FROM `classi` WHERE CONCAT(`aula`) LIKE '%".$valore_da_cercare."%'";
    $search_result = filterTable($query);
    
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
                    <th>Numero Alunni</th>
                   
                </tr>
				
				 <?php while($row = mysqli_fetch_array($search_result)):?>
                <tr>
                    <td><?php echo $row['id_classe'];?></td>
                    <td><?php echo $row['aula'];?></td>
                    <td><?php echo $row['n_alunni'];?></td>
            
                </tr>
                <?php endwhile;?>
            </table>
			
			<input type="text" name="valore_da_cercare" placeholder="Classe..."><br><br>
                        <input class="btn" type="submit" name="search" value="Cerca per classe"><br><br>
			
        </form>
        
    </body>
</html>
