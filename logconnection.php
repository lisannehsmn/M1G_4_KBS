<?php
session_start();
// errors storen
$errors = array();
// Bepaal email & password
$username = "";
$password = "";

if (isset($_POST['login_btn'])){
    $username = filter_input(INPUT_POST, "username", FILTER_SANITIZE_STRING);
    $password = $_POST["userPassword"];
    if (empty($username)){
        array_push($errors, "Username is verplicht");
    }
    if (empty($password)){
        array_push($errors, "Wachtwoord is verplicht");
    }
    if (COUNT($errors)==0){
        $userPassword = md5($password);
        try{
        $con = new PDO ("mysql:host=localhost;dbname=wideworldimporters", "root", "");
        $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $query = $con->prepare("SELECT id FROM users WHERE password=:userPassword AND username=:username");
        $query-> bindParam("username", $username, PDO::PARAM_STR);
        $query-> bindParam("userPassword", $userPassword, PDO::PARAM_STR);
        $query->execute();
        $result = $query->rowCount();
        $data = $query->fetch(PDO::FETCH_OBJ);
        $con = null;
        if ($result){
            $_SESSION['login_btn'] = $data;
            header("location: viewCart.php"); 
        }else{
            print("Incorrecte login details");
        }
        } catch(PDOException $e){
    echo "error".$e->getMessage();
        }
    }
}
