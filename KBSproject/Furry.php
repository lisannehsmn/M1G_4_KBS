<?php include 'header.php';?>
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
                           <a class="btn btn-info" href="detail.php?action=&id=<?php echo $row["StockItemID"]; ?>">Details</a>
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
            <div class="footer">
                Copyright © Wide World Importers 2018
            </div>
        </footer>
    </body>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</html>