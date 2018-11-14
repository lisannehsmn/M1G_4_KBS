<?php
//include the login script
include("logconnection.php");
?>
<!DOCTYPE HTML>
<html>
    <head>
        <title>Login wideworldimporters</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    </head> 
    <body>
        <div class="header">
            <h2>Test!</h2>
        <form method ="post" name="login">
    <div class="input-group">
        <div class="input-group-prepend">
        <span class="input-group-text" id="username">Username</span>
        </div>
        <input type="text" class="form-control" aria-label="username" aria-describedby="username" name="username" p>
            </div>
            <br>
            
            <div class="input-group mb-3">
                <div class="input-group-prepend">
        <span class="input-group-text" id="password">Password</span>
            </div>
        <input class="form-control" type="password" aria-label="password" aria-describedby="password "name="userPassword">
            </div>
            <br>
            <button class="btn btn-success" type="submit" name="login_btn">Login</button>
            <br>
        </form>
        </div>
    </body>
</html>