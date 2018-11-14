<?php require 'inc/header.php'; ?>

<div class="container">
    <div class="row">
        <h3>Control panel</h3>
    </div>

    <div class="row">
        <p><a href="create.php" class="btn btn-success">Create</a></p>
        <table class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Price</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    require 'inc/database.php';

                    $pdo = Database::connect();
                    $getCustomers = $pdo->prepare('SELECT * FROM stockitems ORDER BY StockItemID ASC');
                    $getCustomers->execute();

                    if($getCustomers->rowCount() > 0) {
                        while ($row = $getCustomers->fetch()) {
                            echo '<tr>';
                            echo '<td>'. $row['StockItemID'] . '</td>' . PHP_EOL;
                            echo '<td>'. $row['StockItemName'] . '</td>' . PHP_EOL;
                            echo '<td>'. $row['RecommendedRetailPrice'] . '</td>' . PHP_EOL;
                            echo '<td>' . PHP_EOL;
                            echo '<a class="btn btn-default" href="read.php?StockItemID='.$row['StockItemID'].'">Read</a>' . PHP_EOL;
                            echo '<a class="btn btn-success" href="update.php?StockItemID='.$row['StockItemID'].'">Update</a>' . PHP_EOL;
                            echo '<a class="btn btn-danger" href="delete.php?StockItemID='.$row['StockItemID'].'">Delete</a>' . PHP_EOL;
                            echo '</td>' . PHP_EOL;
                            echo '</tr>' . PHP_EOL;
                        }
                    } else {
                        echo '<tr>';
                        echo '<td>Nothing here...</td>' . PHP_EOL;
                        echo '<td>Nothing here...</td>' . PHP_EOL;
//                        echo '<td>Nothing here...</td>' . PHP_EOL;
//                        echo '<td>Nothing here...</td>' . PHP_EOL;
                        echo '</tr>';
                    }

                    Database::disconnect();
                ?>
            </tbody>
        </table>
    </div>
</div>

<?php require 'inc/footer.php'; ?>