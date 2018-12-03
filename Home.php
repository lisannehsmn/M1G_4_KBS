<?php include 'header.php'; ?>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="css/layout.css">

<div id="demo" class="carousel slide" data-ride="carousel">
    <ul class="carousel-indicators">
        <li data-target="#demo" data-slide-to="0" class="active"></li>
        <li data-target="#demo" data-slide-to="1"></li>
        <li data-target="#demo" data-slide-to="2"></li>
        <li data-target="#demo" data-slide-to="3"></li>
        <li data-target="#demo" data-slide-to="4"></li>
        <li data-target="#demo" data-slide-to="5"></li>
    </ul>
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img  src="wwihome.jpg" alt="WWI.png" width="100%" height="500">
            <div class="carousel-caption">
                <h3>Wij zijn WideWorldImporters</h3>
                <p></p>
            </div>
        </div>
        <?php
        $query = $connect->query("SELECT s.*, o.StockItemID, count(*) as populair
                            from orderlines o JOIN stockitems s ON o.StockItemID = s.StockItemID
                            group by o.StockItemID
                            order by populair desc
                            LIMIT 5;");
        if($query->num_rows > 0){while($row = $query->fetch_assoc()){
            ?>
        <div class="carousel-item">
            <img class="card-img-top" src="https://via.placeholder.com/277x180" alt="Card image cap" width="100%" height="500">
            <div class="carousel-caption">
                <h3><?php echo $row["StockItemName"]; ?></h3>
                <p>Prijs: <?php echo '€'.$row["RecommendedRetailPrice"].' euro'; ?></p>
            </div>
        </div>
        <?php }}?>
    </div>
    <a class="carousel-control-prev" href="#demo" data-slide="prev">
        <span class="carousel-control-prev-icon"></span>
    </a>
    <a class="carousel-control-next" href="#demo" data-slide="next">
        <span class="carousel-control-next-icon"></span>
    </a>
</div>

<div class="container marketing">

    <div class="row">
        <?php
        $query = $connect->query("SELECT s.*, o.StockItemID, count(*) as populair
                            from orderlines o JOIN stockitems s ON o.StockItemID = s.StockItemID
                            group by o.StockItemID
                            order by populair desc
                            LIMIT 5;");
        if($query->num_rows > 0){while($row = $query->fetch_assoc()){
            ?>
        <div class="col-lg-4 center">
            <img class="rounded-circle" src="https://via.placeholder.com/277x180" alt="Card image cap">
            <h2><?php echo $row["StockItemName"]; ?></h2>
            <p><?php echo $row["MarketingComments"];?></p>
            <p> <a class="btn btn-success button-style" href="cartAction.php?action=addToCart&StockItemID=<?php echo $row["StockItemID"]; ?>">In winkelmand</a></p>
            <p><a class="btn btn-info button-style" href="detail.php?action=&StockItemID=<?php echo $row["StockItemID"]; ?>">Details</a></p>
        </div>
        <?php }}?>
    </div>
</div>
    <br>
<?php include 'footer.php' ?>