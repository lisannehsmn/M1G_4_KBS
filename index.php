<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <style type="text/css">
            .sorteer-op{
                float: right;
                border-radius: 25px;
            }
        </style>
    </head>
    <body>
        <form name='Sorteer' method='post' action='sorteer.php'>
            
        </form>
        <form name='Searchbar' method='get' action='searchresults.php'>
            <input name='search' type='text'/>
            <input type='submit' name='submit' value='Search'/>
        </form>
        <form name='prijs' ></form>
<?php
        $db ="mysql:host=localhost;dbname=wideworldimporters;port=3306";
        $user = "root";
        $pass = "";
        $pdo = new PDO($db, $user, $pass);
        $stmt = $pdo->prepare("SELECT * FROM stockgroups");
        $stmt->execute();
        $list = array();
        while ($row = $stmt->fetch()){
            $category = $row["StockGroupName"];
            array_push($list, $category);  
        }
        echo" <div class='product-display'> <select name='category'>";
        foreach ($list as $item) {
            echo '<option>'.$item.'</option>';
        }
        echo"</select> </div>";   
?>

         
    </body>
</html>
