<?php
// Variable errors maken
$errors=array();
    
if (isset($_POST['register_btn'])){
    $name = filter_input(INPUT_POST, "name", FILTER_SANITIZE_STRING);
    $email = filter_input(INPUT_POST, "email", FILTER_SANITIZE_EMAIL);
    $logon = filter_input(INPUT_POST, "email", FILTER_SANITIZE_EMAIL);
    $password = $_POST["password"];
    
    //Errors
    if (empty($name)) {
        array_push($errors, "Naam is verplicht");
    }
    if (empty($email)) {
        array_push($errors, "Email is verplicht");
    }
    if (empty($password) || empty($password2)) {
        array_push($errors, "Password is verplicht");
    }
    if ($password != $password2) {
        array_push($errors, "De wachtwoorden komen niet overeen");
    }
    
    //Registreer gebruiker bij 0 errors:
    if (count($errors)==0){
        $password = md5($password); //Hash <--
    }
    
    try{
        $con = new PDO ("mysql:host=localhost;dbname=wideworldimporters", "root", "");
        $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $stmt = $con->prepare("INSERT INTO people (FullName, LogonName, EmailAddress, HashedPassword) VALUES('$name','$logon','$email','$password')");
        $stmt->execute();
    } catch(PDOException $e){
    echo "error".$e->getMessage();
        print_r($errors);
    }
    $con = null;
    header("location: login.php");
}

?>

