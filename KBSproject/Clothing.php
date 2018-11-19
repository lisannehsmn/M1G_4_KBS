<?php include 'header.php' ?>
<div class="container">
    <a href="viewCart.php" class="cart-link" title="View Cart"><i class="glyphicon glyphicon-shopping-cart"></i></a>
    <div id="products" class="row">
        <?php
        $query = $connect->query("SELECT * FROM (stockitems i JOIN stockitemstockgroups ig ON i.StockItemID = ig.StockItemID)JOIN stockgroups g ON ig.StockGroupID = g.StockGroupID WHERE StockGroupName='Clothing' ");
        if($query->num_rows > 0){while($row = $query->fetch_assoc()){
            ?>
            <div class="item col-lg-4">
                <div class="thumbnail">
                    <img class="card-img-top" src="https://via.placeholder.com/277x180" alt="Card image cap">
                    <div class="card-body">
                        <ul class="list-group list-group-flush text-center">
                            <h6 class="card-title list-group-item"><?php echo $row["StockItemName"]; ?></h6>
                            <h7 class="list-group-item"> Prijs: <?php echo '€'.$row["RecommendedRetailPrice"].' euro'; ?></h7><hr>
                            <a class="btn btn-success button-style" href="cartAction.php?action=addToCart&id=<?php echo $row["StockItemID"]; ?>">In winkelmand</a>
                            <a class="btn btn-info button-style" href="detail.php?action=&id=<?php echo $row["StockItemID"]; ?>">Details</a>
                        </ul>
                    </div>
                </div>
            </div>
        <?php } }else{ ?>
            <p>Product (en) niet gevonden .....</p>
        <?php } ?>
    </div>
</div>
         <footer class="footer small text-center">
            <div class="footer">
                Copyright © Wide World Importers 2018
            </div>
        </footer>
    </body>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</html>