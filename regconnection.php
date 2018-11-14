<?php
// Variable errors maken
$errors=array();
    
if (isset($_POST['register_btn'])){
    $username = filter_input(INPUT_POST, "username", FILTER_SANITIZE_STRING);
    $email = filter_input(INPUT_POST, "email", FILTER_SANITIZE_EMAIL);
    $password = $_POST["password"];
    $password2 = $_POST["password2"];
    
    //Errors
    if (empty($username)) {
        array_push($errors, "Username is verplicht");
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
        $password2 = md5($password2);
    }
    
    try{
        $con = new PDO ("mysql:host=localhost;dbname=wideworldimporters", "root", "");
        $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $stmt = $con->prepare("INSERT INTO users (username, email, password, password2) VALUES('$username','$email','$password','$password2')");
        $stmt->execute();
    } catch(PDOException $e){
    echo "error".$e->getMessage();
    }
    $con = null;
    header("location: login.php");
}

?>

