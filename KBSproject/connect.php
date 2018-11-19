<?php

$connect = mysqli_connect("localhost", "root", "", "wideworldimporters")or die("Couldn't connect to server or database");

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
function getGroup(){
    $sql = "SELECT * FROM stockgroups";
    return dbSelectAll($sql);
}
function getSearch(){
    $sql = "SELECT * FROM stockitems where StockItemName LIKE '%". $_GET['search'] ."%' ";
    return dbSelectAll($sql);
}
function getProduct(){
    $sql = "SELECT * FROM stockitems ORDER BY StockItemID DESC LIMIT 23";
    return dbSelectAll($sql);
}
?> 