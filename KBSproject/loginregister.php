<?php
//include the login script
include("logconnection.php");
include("regconnection.php");
include ("header.php");

?>
    <head>
        <title>Login wideworldimporters</title>
        <style>
        .box1
        {
            padding-right: 2em;
            max-width: 49% !important;

        }
        .box2
        {
            padding-left: 2em;
        }

        .line{
            border: 1px solid #c3c1bc;
        }
            .error
            {
                font-family: sans-serif;
                color: #E70000;
                font-size: 16px;
                line-height: 2px;
            }
            .popup {
                margin: 75px auto;
                padding: 20px;
                background: #fff;
                border: 1px solid #666;
                width: 300px;
                box-shadow: 0 0 50px rgba(0,0,0,0.5);
                position: relative;
          .light & {
                border-color: #aaa;
                box-shadow: 0 2px 10px rgba(0,0,0,0.25);
          }
        </style>


<div class="container">
        <div class="row">
        <div class="col-md-6 box1">
            <h4>Inloggen</h4>
            <p>Bestaande klanten</p>
            <form method ="post" name="login">
            <div class="input-group mb-3">
            <div class="input-group-prepend"><span class="input-group-text" id="email">Email</span></div>
            <input type="text" class="form-control" aria-label="email" aria-describedby="email" name="email" placeholder="E-mailadres">
            </div>

            <div class="input-group mb-3">
             <div class="input-group-prepend">
                <span class="input-group-text" id="password">Wachtwoord</span></div>
                <input class="form-control" type="password" aria-label="password" aria-describedby="password" name="userPassword" placeholder="Wachtwoord">
            </div>
            <button class="btn btn-success" type="submit" name="login_btn">Inloggen</button>
            </form>
        </div>

        <div class="line"></div>

            <!--Hier ga je de registratie naast login zetten-->
        <div class="col-md-6 box2">
            <form method="post" name="register">
            <h4>Nieuw bij wwi.nl?</h4>
            <p>Maak binnen 2 minuten een account aan.</p>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                    <span class="input-group-text" for="name">Volledige naam*</span>
                    </div>
                    <input type="text" name="name" class="form-control textInput" placeholder="Naam en achternaam">
                </div>

                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text" for="email">Email*</span>
                    </div>
                    <input type="email" name="email" class="form-control textInput" placeholder="Email">
                </div>

                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text" for="address">Adres*</span>
                    </div>
                    <input type="text" name="address" class="form-control textInput" placeholder="Adres">
                </div>

                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text" for="number">Telefoonnummer</span>
                    </div>
                    <input type="text" name="number" class="form-control textInput" placeholder="Nummer">
                </div>

                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text" for="password">Wachtwoord*</span>
                    </div>
                    <input type="password" name="password" class="form-control textInput" placeholder="Wachtwoord">
                </div>

                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text" for="password2">Wachtwoord*</span>
                    </div>
                        <input type="password" name="password2" class="form-control textInput" placeholder="Herhaal wachtwoord">
                </div>
                <p>Alle velden zijn verplicht met *</p>
                <?php include('errors.php');?>
                 <div class="input-group">
                    <button type="submit" class="btn btn-success" name="register_btn" id="register_btn">Maak een account aan</button>
                </div>
            </form>
        </div>
    </div>
 </div>
<?php include ("footer.php");?>


<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
