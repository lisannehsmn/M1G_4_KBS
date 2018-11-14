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
        $nameError = null;


        $name = $_POST['StockItemName'];


        $valid = true;

        if (empty($name)) {
            $nameError = 'Please enter Name';
            $valid = false;
        }

        if ($valid) {
            $pdo = Database::connect();
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $q = $pdo->prepare('UPDATE stockitems set StockItemName = ? WHERE StockItemID = ?');
            $q->execute(array($name, $id));
            Database::disconnect();
            header('Location: index.php');
        }
    } else {
        $pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $q = $pdo->prepare('SELECT * FROM stockitems where StockItemID = ?');
        $q->execute(array($id));
        $data = $q->fetch(PDO::FETCH_ASSOC);
        $name = $data['StockItemName'];

        Database::disconnect();
    }

    require 'inc/header.php';
?>

<div class="container">
    <div class="row">
        <h3>Update a Product</h3>
    </div>

    <div class="row">
        <form class="form-horizontal" action="update.php?StockItemID=<?php echo $id; ?>" method="post">
            <div class="form-group <?php echo !empty($nameError) ? 'has-error' : ''; ?>">
                <label class="col-sm-2 control-label">Name</label>
                <div class="controls col-sm-6">
                    <input class="form-control" name="StockItemName" type="text" placeholder="Name" value="<?php echo !empty($name) ? $name : ''; ?>">
                    <?php if (!empty($nameError)): ?>
                        <span class="help-inline"><?php echo $nameError;?></span>
                    <?php endif; ?>
                </div>
            </div>

            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <button type="submit" class="btn btn-success">Update</button>
                    <a class="btn btn-default" href="index.php">Back</a>
                </div>
            </div>
        </form>
    </div>
</div>

<?php require 'inc/footer.php'; ?>