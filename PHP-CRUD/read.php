<?php
    require 'inc/database.php';

    $id = null;
    if (!empty($_GET['StockItemID'])) {
        $id = $_REQUEST['StockItemID'];
    }

    if (null === $id) {
        header('Location: index.php');
    } else {
        $pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $q = $pdo->prepare('SELECT * FROM stockitems where StockItemID = ?');
        $q->execute(array($id));
        $data = $q->fetch(PDO::FETCH_ASSOC);
        Database::disconnect();
    }

    require 'inc/header.php';
?>

<div class="container">
    <div class="row">
        <h3>Product gegevens</h3>
    </div>

    <div class="row">
        <div class="form-horizontal">
            <div class="form-group">
                <label class="col-sm-2 control-label">StockItemID</label>
                <p class="checkbox col-sm-6">
                    <?php echo $data['StockItemID'];?>
                </p>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label">StockItemName</label>
                <p class="checkbox col-sm-6">
                    <?php echo $data['StockItemName'];?>
                </p>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label">SupplierID</label>
                <p class="checkbox col-sm-6">
                    <?php echo $data['SupplierID'];?>
                </p>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label">ColorID</label>
                <p class="checkbox col-sm-6">
                    <?php echo $data['ColorID'];?>
                </p>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label">UnitPackageID</label>
                <p class="checkbox col-sm-6">
                    <?php echo $data['UnitPackageID'];?>
                </p>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label">OuterPackageID</label>
                <p class="checkbox col-sm-6">
                    <?php echo $data['OuterPackageID'];?>
                </p>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label">Brand</label>
                <p class="checkbox col-sm-6">
                    <?php echo $data['Brand'];?>
                </p>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label">Size</label>
                <p class="checkbox col-sm-6">
                    <?php echo $data['Size'];?>
                </p>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label">LeadTime</label>
                <p class="checkbox col-sm-6">
                    <?php echo $data['Size'];?>
                </p>
            </div>
            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <a class="btn btn-default" href="index.php">Terug</a>
                </div>
            </div>
        </div>
    </div>
</div>

<?php require 'inc/footer.php'; ?>