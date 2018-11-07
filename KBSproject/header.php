<?php include 'connect.php'; ?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <style>
            .button-style
            {
                font-size: 19px;
                font-family: monospace;
            }

            .footer {
              /*              width: 100%;
              height: 60px;  Set the fixed height of the footer here */
              line-height: 60px; /* Vertically center the text there */
              background-color: #343a40;
              font-size: 17px;
              color:black;      
            }
            .container{
                padding: 50px;}
            .cart-link{
                width: 100%;
                text-align: right;
                display: block;
                font-size: 22px;}

        </style>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    </head>
    <body>
        <nav class="navbar navbar-toggleable-md bg-dark">
            <a class="navbar-brand" href="index.php"><img src="wwi.png" width="160" height="48" class="d-inline-block align-top" alt=""></a>
            <li class="nav-item" role="presentation"><a class="nav-link" href="index.php">Producten</a></li>
            <li class="nav-item" role="presentation"><a class="nav-link" href="Login.php">Inloggen</a></li>
            <li class="nav-item" role="presentation"><a class="nav-link" href="viewCart.php">winkelwagen</a></li>
            <div class="dropdown">
                <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Categorie</button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <a class="dropdown-item" href="Items.php">Novelty Items</a>
                    <a class="dropdown-item" href="Clothing.php">Clothing</a>
                    <a class="dropdown-item" href="Mugs.php">Mugs</a>
                    <a class="dropdown-item" href="T.php">T-shirts</a>
                    <a class="dropdown-item" href="Airline.php">Airline Novelties</a>
                    <a class="dropdown-item" href="Computing.php">Computing Novelties</a>
                    <a class="dropdown-item" href="USB.php">USB Novelties</a>
                    <a class="dropdown-item" href="Furry.php">Furry Footwear</a>
                    <a class="dropdown-item" href="Toys.php">Toys</a>
                    <a class="dropdown-item" href="Pack.php">Packaging Materials</a>
                </div>
          </div>
                        <form name="search" method="get" action="searchresults.php">
                <input name="search" value="search"/>
                <input type="submit" action="searchresults.php" value="search"/>
            </form>
        </nav>