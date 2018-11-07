<?php include 'header.php';?>
        <div class="container">
            <div id="products" class="row list-group">
                <?php

                $query = $connect->query("SELECT * FROM stockitems where StockItemName LIKE '%". $_GET['search'] ."%' ");
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
<?php include'footer.php'?>



