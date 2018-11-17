<?php
// include database
include 'regconnection.php';
?>
<html>
<head>
    <title>Registreren</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    </head>
    <body>
    <div class="header">
        <h2>Schrijf je in!</h2>
        </div>
<form method="post" action="register.php">
    <div class="input-group">
        <label for="name">Volledige naam</label>
        <input type="text" name="name" class="textInput" placeholder="Naam en achternaam">
    </div>
    
    <div class="input-group">
        <label for="email">Email</label> 
        <input type="email" name="email" class="textInput" placeholder="Email">
    </div>
    
    <div class="input-group">
    <label for="address">Adres</label>
        <input type="text" name="address" class="textInput" placeholder="Adres">
    </div>
    
    <div class="input-group">
        <label for="number">Telefoonnummer</label>
        <input type="text" name="number" class="textInput" placeholder="Nummer">
    </div>
            
    <div class="input-group">
        <label for="password">Wachtwoord</label>
        <input type="password" name="password" class="textInput" placeholder="Wachtwoord">
    </div>
    
    <div class="input-group">
        <label for="password2">Wachtwoord</label>
        <input type="password" name="password2" class="textInput" placeholder="Herhaal wachtwoord">
    </div>
    
<div class="alert alert-success" role="alert">
  This is a success alert—check it out!
</div>
            <div class="alert alert-success" role="alert">
                <button type="submit" class="btn btn-success" name="register_btn" >Registreer</button>
    </div>
        </form>
    </body>
</html>