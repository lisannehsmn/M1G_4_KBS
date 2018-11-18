<?php
session_start();
// errors storen
$errors = array();
// Bepaal email & password
$email = "";
$password = "";

if (isset($_POST['login_btn'])){
    $email = filter_input(INPUT_POST, "email", FILTER_SANITIZE_EMAIL);
    $password = $_POST["userPassword"];
    if (empty($email)){
        array_push($errors, "Email is verplicht");
    }
    if (empty($password)){
        array_push($errors, "Wachtwoord is verplicht");
    }
    if (COUNT($errors)==0){
        $userPassword = md5($password);
        try{
        $con = new PDO ("mysql:host=localhost;dbname=wideworldimporters", "root", "");
        $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $query = $con->prepare("SELECT name, email, address, number, password, password2 FROM users WHERE password=:userPassword AND email=:email");
        $query-> bindParam("email", $email, PDO::PARAM_STR);
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
