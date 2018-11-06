<?php
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
    $sql = "SELECT * FROM stockitems";
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
?>