<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    </head>
    <body>
        <form name='Searchbar' method='get' action='searchresults.php'>
            <input name='search' type='text'/>
            <input type='submit' name='submit' value='Search'/>
        </form>
            <select>
               
               <?php 
                require('connect.php');
                $category = getGroup();
                while ($group = $category->fetch()){
                    echo'<option>'.$group['StockGroupName'].'</option>';
                }
                ?>
            </select>
        
<?php
       
        $result = getStock();
        echo "<div class='productshow'><table>";
        echo '<th>Product</th> <th>prijs</th>';
        while($row = $result->fetch()){
            echo '<tr> <td>'. $row['StockItemName']. '</td><td>'. $row['UnitPrice']. '</td> <td><input type="button" name="Bestel" action="detail.php" value="Bestel"></td></tr>';
        }
        echo'</table></div>';
        
?>

         
    </body>
</html>
