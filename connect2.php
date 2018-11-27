<?php

//$connect = mysqli_connect("localhost", "root", "", "wideworldimporters")or die("Couldn't connect to server or database");

function dbGetConfig(){
   return array(
    'db' => "mysql:host=localhost;dbname=wideworldimporters;port=3306",
    'user' => "root",
    'pass' => ""
    );
}
function dbSelectAll($sql){
    $dbconfig= dbGetConfig();
    $pdo = new PDO($dbconfig['db'], $dbconfig['user'], $dbconfig['pass']);
    $stmt = $pdo->prepare($sql);
    $stmt -> execute();
    $pdo = null;
    return $stmt;
}
function dbSelect($sql, $waardes){
    $dbconfig= dbGetConfig();
    $pdo=new PDO($dbconfig['db'], $dbconfig['user'], $dbconfig['pass']);
    $stmt = $pdo->prepare($sql);
    $stmt->execute($waardes);
    $pdo = null;
    return $stmt;
}
function getStock(){
    $sql = "SELECT * FROM (stockitems i JOIN stockitemstockgroups ig ON i.StockItemID = ig.StockItemID)JOIN stockgroups g ON ig.StockGroupID = g.StockGroupID WHERE StockGroupName='".$_GET['categorie']."' ";
    return dbSelectAll($sql);
}
// soorten categorieen
function getGroup(){
    $sql = "SELECT * FROM stockgroups";
    return dbSelectAll($sql);
}
function getSearch(){
    $sql = "SELECT * FROM stockitems where StockItemName LIKE '%". $_GET['search'] ."%' ";
    return dbSelectAll($sql);
}
function getProduct(){
    $sql = "SELECT * FROM stockitems ORDER BY StockItemID ASC ";
    return dbSelectAll($sql);
}
// soorten kleuren
function getColor(){
    $sql = "SELECT * FROM colors WHERE ColorID IN (SELECT ColorID FROM stockitems)";
    return dbSelectAll($sql);
}

function maxPrijs(){
    $sql = "SELECT MAX(RecommendedRetailPrice) FROM stockitems";
    $data = dbSelectAll($sql);
    $data = $data->fetchAll(PDO::FETCH_COLUMN);
    $data = implode('', $data);
    $data = ceil($data);
    return $data;
}
function getMerken(){
    $sql = "SELECT DISTINCT Brand FROM stockitems WHERE Brand  LIKE '%_'";
    return dbSelectAll($sql);
}

function getMaten(){
    $sql = "SELECT DISTINCT Size FROM stockitems WHERE Size LIKE '%_'";
    return dbSelectAll($sql);
}



//function getProCat($id){
//    $sql = "SELECT * FROM stockitems WHERE StockGroupID = $id";
//    return dbSelectAll($sql);
//}
//
//function getProCol(){
//    
//}
//function getMax(){
//    $sql = "SELECT * FROM stockitems";
//    $waardes = "SELECT * FROM stockitems ORDER BY StockItemID DESC LIMIT 1";
//    return dbSelect($sql, $waardes);
//}
?>