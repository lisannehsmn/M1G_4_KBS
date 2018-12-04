<?php
include 'header.php';
?>

        <?php
$id = $_GET['StockItemID']; 
$query = $connect->query("SELECT * FROM stockitems WHERE StockItemID = $id");
        if($query->num_rows > 0){ 
            while($row = $query->fetch_assoc()){
        ?>
<div class="container">
    <h1>Productdetail</h1>&nbsp;
    <h4><?php echo $row["StockItemName"]?></h4>
<div class="prijs">
    <p class="lead"><?php echo '€'.$row["RecommendedRetailPrice"].' Euro'; ?></p>
    </div>
<div class="beschrijving">
    <p class="desc"><?php echo $row["MarketingComments"]?></p>
    <a class="btn btn-success" href="cartAction.php?action=addToCart&StockItemID=<?php echo $row["StockItemID"]; ?>">In winkelmand</a></div>
    </div> 

            <?php } }else{ ?>
        <p>Product (en) niet gevonden .....</p>
        <?php } include 'footer.php'; ?>