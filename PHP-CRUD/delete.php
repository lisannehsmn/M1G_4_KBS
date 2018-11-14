<?php
    require 'inc/database.php';

    $id = null;
    if (!empty($_GET['StockItemID'])) {
        $id = $_REQUEST['StockItemID'];
    }

    if (null === $id) {
        header('Location: index.php');
    }

    if (!empty($_POST)) {
        $id = $_POST['StockItemID'];

        $pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $q = $pdo->prepare('DELETE StockItemName FROM stockitems WHERE StockItemID = ?');
        $q->execute(array($id));
        Database::disconnect();
        header('Location: index.php');
    }

    include 'inc/header.php';
?>


<div class="container">
    <div class="row">
        <h3>Product verwijderen</h3>
    </div>

    <div class="row">
        <form class="form-horizontal" action="delete.php" method="post">
            <input type="hidden" name="StockItemID" value="<?php echo $id; ?>">
            <p class="bg-danger alert">Weet je het zeker dat je de product wilt verwijderen?</p>
            <div class="form-group">
                <div class="col-sm-12 text-center">
                    <button type="submit" class="btn btn-danger">Ja</button>
                    <a class="btn btn-default" href="index.php">Nee</a>
                </div>
            </div>
        </form>
    </div>
</div>

<?php include 'inc/footer.php'; ?>