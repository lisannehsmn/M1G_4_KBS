<?php
// include database
include 'connect.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>World Wide Importers</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <style>
    .container{padding: 50px;}
    .cart-link{width: 100%;text-align: right;display: block;font-size: 22px;}
    </style>
</head>
<body>
        <?php
        //query statment 
$id = $_GET['id']; //Hiermee haal je $id uit get
$query = $connect->query("SELECT * FROM stockitems WHERE id = $id"); //Hiermee pak je product
        if($query->num_rows > 0){ 
            while($row = $query->fetch_assoc()){
        ?>
<div class="container">
    <h1>Productdetail</h1>&nbsp;
    <h4><?php echo $row["name"]?></h4>
<div class="prijs">
    <p class="lead"><?php echo '€'.$row["price"].' Euro'; ?></p>
    </div>
<div class="beschrijving">
    <p class="desc"><?php echo $row["MarketingComments"]?></p>
    <a class="btn btn-success" href="cartAction.php?action=addToCart&id=<?php echo $row["id"]; ?>">In winkelmand</a></div>
    </div> 

            <?php } }else{ ?>
        <p>Product (en) niet gevonden .....</p>
        <?php } ?>
</body>
</html>