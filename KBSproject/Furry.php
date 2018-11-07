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
              position: absolute;
              bottom: 0;
              width: 100%;
              height: 60px; /* Set the fixed height of the footer here */
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

        </style>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    </head>
    <body>
        <nav class="navbar navbar-toggleable-md bg-dark">
            <a class="navbar-brand" href="#"><img src="wwi.png" width="160" height="48" class="d-inline-block align-top" alt=""></a>
            <li class="nav-item" role="presentation"><a class="nav-link" href="index.php">Producten</a></li>
            <li class="nav-item" role="presentation"><a class="nav-link" href="moreproduct.php">Inloggen</a></li>
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
            <a href="viewCart.php" class="cart-link" title="View Cart"><i class="glyphicon glyphicon-shopping-cart"></i></a>
        </nav>
        <div class="container">
              <div id="products" class="row list-group">
        <?php
        $query = $connect->query("SELECT * FROM (stockitems i JOIN stockitemstockgroups ig ON i.StockItemID = ig.StockItemID)JOIN stockgroups g ON ig.StockGroupID = g.StockGroupID WHERE StockGroupName='Furry Footwear' ");
        if($query->num_rows > 0){ 
            while($row = $query->fetch_assoc()){
        ?>
        <div class="item col-lg-4">
            <div class="thumbnail">
                <div class="caption">
                    <h4 class="list-group-item-heading"><?php echo $row["StockItemName"]; ?></h4>
                    <div class="row">
                        <div class="col-md-6">
                            <p class="lead"><?php echo '€'.$row["RecommendedRetailPrice"].' Euro'; ?></p>
                        </div>
                        <div class="col-md-6">
                            <a class="btn btn-success" href="cartAction.php?action=addToCart&id=<?php echo $row["StockItemID"]; ?>">In winkelmand</a>
                        </div>
                        <div class="col-md-6">
                           <a class="btn btn-info" href="cartAction.php?action=addToCart&id=<?php echo $row["StockItemID"]; ?>">Details</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php } }else{ ?>
        <p>Product (en) niet gevonden .....</p>
        <?php } ?>
    </div>
            </div>
        <footer class="footer small text-center">
            <div class="container">
                Copyright © Wide World Importers 2018
            </div>
        </footer>
    </body>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</html>