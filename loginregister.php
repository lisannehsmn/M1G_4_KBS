<?php
//include the login script
include("logconnection.php");
include("regconnection.php");
?>
<!DOCTYPE HTML>
<html>
    <head>
        <title>Login wideworldimporters</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    </head> 
    <body>
        <div class="header">
            <h2>Log hier in</h2>
        <form method ="post" name="login">
    <div class="input-group">
        <div class="input-group-prepend">
        <span class="input-group-text" id="email">Email</span>
        </div>
        <input type="text" class="form-control" aria-label="email" aria-describedby="email" name="email" p>
            </div>
            <br>
            
            <div class="input-group mb-3">
                <div class="input-group-prepend">
        <span class="input-group-text" id="password">Password</span>
            </div>
        <input class="form-control" type="password" aria-label="password" aria-describedby="password "name="userPassword">
            </div>
            <button class="btn btn-success" type="submit" name="login_btn">Login</button>
            </form>
                            <!--Hier ga je de registratie naast login zetten-->
    <br><br><br><br> 
            <form method="post" name="register">
            <h2>Schrijf je in!</h2>
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
    
            <div class="input-group">
                <button type="submit" class="btn btn-success" name="register_btn">Registreer</button>
    </div>
        </form>
        </div>
    </body>
</html>