<!DOCTYPE html>
<html>
<?php

if(isset($_POST['search']))
{
    $valueToSearch = $_POST['valueToSearch'];
    // search in all table columns
    // using concat mysql function
    $query = "SELECT * FROM `classi` WHERE CONCAT(`aula`) LIKE '%".$valueToSearch."%'";
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
        <title>PHP HTML TABLE DATA SEARCH</title>
        <style>
            table,tr,th,td
            {
                border: 1px solid black;
            }
        </style>
    </head>
    <body>
        
        <form action="Classi.php" method="post">
            <input type="text" name="valueToSearch" placeholder="Value To Search"><br><br>
            <input type="submit" name="search" value="Filter"><br><br>
            
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
        </form>
        
    </body>
</html>
