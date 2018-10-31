<?php
        $db ="mysql:host=localhost;dbname=wideworldimporters;port=3306";
        $user = "root";
        $pass = "";
        $pdo = new PDO($db, $user, $pass);
        $stmt = $pdo->prepare("SELECT * FROM stockitems where StockItemName LIKE '%". $_GET['search'] ."%' ");
        $stmt->execute();
        $resultslist = array();
        while ($row = $stmt->fetch()){
            $result = $row["StockItemName"];
            array_push($resultslist, $result);  
        }
        foreach ($resultslist as $result) {
            echo '<p>'. $result . '</p>';
}
        
    
?>

