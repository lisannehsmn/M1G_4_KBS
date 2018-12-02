<?php include 'connect.php';
include 'Cart.php';
$cart = new Cart;?>
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
            .container{padding: 50px;}
            input[type="number"]{width: 20%;}
            </style>
            <script>
            function updateCartItem(obj,id){
                $.get("cartAction.php", {action:"updateCartItem", id:id, qty:obj.value}, function(data){
                    if(data == 'ok'){
                        location.reload();
                    }else{
                        alert('Winkelwagenupdate mislukt, probeer het opnieuw. ');
                    }
                });
            }
            </script>
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
                    <a class="nav-link text-white" href="loginregister.php">INLOGGEN</a>
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
<div class="container">
    <h1>Bestellen</h1>
    <table class="table">
    <thead>
        <tr>
            <th>Producten</th>
            <th><left>Prijs</left></th>
            <th><center>Aantal</center></th>
            <th><center>Subtotaal</center></th>
        </tr>
    </thead>
    <tbody>
        <?php
        if($cart->total_items() > 0){
            // krijg winkelwagenitems van de sessie
            $cartItems = $cart->contents();
            foreach($cartItems as $item){
        ?>
		
        <tr>
            <td><?php echo $item["name"]; ?></td>
            <td><left><?php echo '€'.$item["price"]; ?></left></td>
			<td><center><?php echo $item["qty"]; ?></center></td>
            <td><center><?php echo '€'.$item["subtotal"]; ?></center></td>			
		</tr>
        <?php } }else{ ?>
        <tr><td colspan="5"><p>Je winkelwagen is leeg...</p></td>
        <?php } ?>
    </tbody>
		
    <tfoot>
        <tr>
            <td><a href="viewCart.php" class="btn btn-success btn-block"><i class="glyphicon glyphicon-menu-left"></i>Terug naar winkelwagen</a></td>
            <td colspan="0"></td>
            <?php if($cart->total_items() > 0){ ?>
            <td class="text-right"><strong>Totaal <?php echo '€'.$cart->total(); ?></strong></td> 
            <td><a href="https://www.iDeal.nl" class="btn btn-success btn-block">afronden <i class="glyphicon glyphicon-menu-right"></i></a></td>
            <?php } ?>
        </tr>
		
		<?php
        $query = $connect->query("SELECT * FROM users WHERE name='Jelle Mol'");
        if($query->num_rows > 0){
			while($row = $query->fetch_assoc()){
        ?>
		<h6 class="card-title list-group-item"> Naam: <?php echo $row["name"]; ?></h6>
		<h6 class="card-title list-group-item"> Contact: <?php echo $row["email"];?> <?php if ($row["number"]!=NULL){ ?>telefoon: <?php echo $row["number"]; }?></h6>
		<h6 class="card-title list-group-item"> Adres: <?php echo $row["address"]; ?></h6>
		<?php } }?>
    </tfoot>
    </table>
</div>
</body>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</html>
