<?php
// initialiseer winkelwagenklasse
include 'Cart.php';
$cart = new Cart;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title></title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <style>
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
</head>
</head>
<body>
    <nav class="navbar navbar-toggleable-md bg-dark">
            <a class="navbar-brand" href="#"><img src="wwi.png" width="160" height="48" class="d-inline-block align-top" alt=""></a>
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
<div class="container">
    <h1>Winkelwagen</h1>
    <table class="table">
    <thead>
        <tr>
            <th>Producten</th>
            <th>Prijs</th>
            <th>Aantal</th>
            <th>Subtotaal</th>
            <th>&nbsp;</th>
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
            <td><?php echo '€'.$item["price"].' EURO'; ?></td>
            <td><input type="number" class="form-control text-center" value="<?php echo $item["qty"]; ?>" onchange="updateCartItem(this, '<?php echo $item["rowid"]; ?>')"></td>
            <td><?php echo '€'.$item["subtotal"].' EURO'; ?></td>
            <td>
                <a href="cartAction.php?action=removeCartItem&id=<?php echo $item["rowid"]; ?>" class="btn btn-danger" onclick="return confirm('Weet je het zeker?')"><i class="glyphicon glyphicon-trash"></i></a>
            </td>
        </tr>
        <?php } }else{ ?>
        <tr><td colspan="5"><p>Je winkelwagen is leeg .....</p></td>
        <?php } ?>
    </tbody>
    <tfoot>
        <tr>
            <td><a href="index.php" class="btn btn-success btn-block"><i class="glyphicon glyphicon-menu-left"></i>Terug naar winkel</a></td>
            <td colspan="2"></td>
            <?php if($cart->total_items() > 0){ ?>
            <td class="text-center"><strong>Total <?php echo '€'.$cart->total().' EURO'; ?></strong></td>
            <td><a href="https://www.ideal.nl/" class="btn btn-success btn-block">Bestellen <i class="glyphicon glyphicon-menu-right"></i></a></td>
            <?php } ?>
        </tr>
    </tfoot>
    </table>
</div>
</body>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</html>