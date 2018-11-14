<?php include 'connect.php'; ?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <style>
            .button-style
            {
                border-radius: 0 !important;
            }

            .footer {
              /*              width: 100%;
              height: 60px;  Set the fixed height of the footer here */
              line-height: 60px; /* Vertically center the text there */
              background-color: #343a40;
              font-size: 17px;
              color:white;
            }
            .container{
                padding: 50px;}
            .cart-link{
                width: 100%;
                text-align: right;
                display: block;
                font-size: 22px;}
            .thumbnail {
                border: 1px solid rgba(0,0,0,.125);
            }
            .item{
                padding: 20px 0;
            }

        </style>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    </head>
    <body>
    <nav class="navbar navbar-expand-lg navbar-light bg-dark">
        <a class="navbar-brand" href="index.php"><img src="wwi.png" width="160" height="48" class="d-inline-block align-top" alt=""></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link text-white" href="#">HOME <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="index.php">PRODUCTEN</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="Login.php">INLOGGEN</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="viewCart.php">WINKELWAGEN</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        CATEGORIE
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
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
                </li>
            </ul>
            <form class="form-inline my-2 my-lg-0" name="search" method="get" action="searchresults.php">
                <input class="form-control mr-sm-2" name="search" value="search"/>
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit" action="searchresults.php" value="search">Search</button>
            </form>
        </div>
    </nav>
