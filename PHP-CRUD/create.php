<?php
    require 'inc/database.php';
function create()
{
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
            $sql = 'INSERT INTO stockitems (StockItemName) values(?)';
            $q = $pdo->prepare($sql);
            $q->execute(array($name));
            Database::disconnect();
            header('Location: index.php');
        }
    }

}

    require 'inc/header.php';
?>

<div class="container">
    <div class="row">
        <h3>Nieuw product aanmaken</h3>
    </div>

    <div class="row">
        <form class="form-horizontal" action="<?php create()?>" method="post">
            <div class="form-group <?php echo !empty($nameError) ? 'has-error' : ''; ?>">
                <label class="col-sm-2 control-label">Name</label>
                <div class="controls col-sm-6">
                    <input class="form-control" name="StockItemName" type="text" placeholder="StockItemName" value="<?php echo !empty($name) ? $name : ''; ?>">
                    <?php if (!empty($nameError)): ?>
                        <span class="help-block"><?php echo $nameError;?></span>
                    <?php endif; ?>
                </div>
            </div>

            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <button type="submit" class="btn btn-success">Create</button>
                    <a class="btn btn-default" href="index.php">Back</a>
                </div>
            </div>
        </form>
    </div>
</div>

<?php require 'inc/footer.php'; ?>