<?php
//include 'header.php';
include 'connect.php';

$group = getGroup();
$color = getColor();
$merk = getMerken();
$maat = getMaten();
$max = maxPrijs();

if(isset($_POST['submit'])){
    // CATEGORIE FILTEREN
    if(isset($_POST['categorie']) && filter_has_var(INPUT_POST, 'categorie') && filter_input(INPUT_POST, 'categorie', FILTER_SANITIZE_NUMBER_INT)){
        $StockGroupID = $_POST['categorie'];
        $sql = "SELECT * FROM stockitems WHERE StockItemID IN (SELECT StockItemID FROM stockitemstockgroups WHERE StockGroupID = $StockGroupID)";
        $catsarray = dbSelectAll($sql);
        $cats = $catsarray->fetchAll(PDO::FETCH_COLUMN);
        $cats2 = implode("', '", $cats);
    }else{
        $catsarray = getProduct();
        $cats = $catsarray->fetchAll(PDO::FETCH_COLUMN);
        $cats2 = implode("', '", $cats);
    }
    // KLEUR FILTEREN
    if(isset($_POST['color']) && filter_has_var(INPUT_POST, 'color')){
        $colorid = implode("', '", $_POST['color']);
        $sql = "SELECT * FROM stockitems WHERE ColorID IN ('$colorid')";
        $colorsarray = dbSelectAll($sql);
        $colors = $colorsarray->fetchAll(PDO::FETCH_COLUMN);
        $colors2 = implode("', '", $colors);
    }else{
        $colorsarray = getProduct();
        $colors = $colorsarray->fetchAll(PDO::FETCH_COLUMN);
        $colors2 = implode("', '", $colors);
    }
    // MERK FILTEREN
    if(isset($_POST['merk']) && filter_has_var(INPUT_POST, 'merk')){
        $brand = implode("', '", $_POST['merk']);
        $sql = "SELECT * FROM stockitems WHERE Brand IN ('$brand')";
        $merksarray = dbSelectAll($sql);
        $merks = $merksarray->fetchAll(PDO::FETCH_COLUMN);
        $merks2 = implode("', '", $merks);
    }else{
        $merksarray = getProduct();
        $merks = $merksarray->fetchAll(PDO::FETCH_COLUMN);
        $merks2 = implode("', '", $merks);
    }
    // MAAT FILTEREN
    if(isset($_POST['maat']) && filter_has_var(INPUT_POST, 'maat')){
        $size = implode("', '", $_POST['maat']);
        $sql = "SELECT * FROM stockitems WHERE Size IN ('$size')";
        $maatsarray = dbSelectAll($sql);
        $maats = $maatsarray->fetchAll(PDO::FETCH_COLUMN);
        $maats2 = implode("', '", $maats);
    }else{
        $maatsarray = getProduct();
        $maats = $maatsarray->fetchAll(PDO::FETCH_COLUMN);
        $maats2 = implode("', '", $maats);
    }
    // PRIJS FILTEREN
    if(isset($_POST['prijsVan']) && filter_input(INPUT_POST, 'prijsVan', FILTER_SANITIZE_NUMBER_INT) && filter_has_var(INPUT_POST, 'prijsVan')){
        $minPrijs = $_POST['prijsVan'];
        $sql = "SELECT * FROM stockitems WHERE RecommendedRetailPrice >= $minPrijs";
        $minprijsarray = dbSelectAll($sql);
        $minprijss = $minprijsarray->fetchAll(PDO::FETCH_COLUMN);
        $minprijss2 = implode("', '", $minprijss);
    }else{
        $minPrijs = 0;
        $sql = "SELECT * FROM stockitems WHERE RecommendedRetailPrice >= $minPrijs";
        $minprijsarray = dbSelectAll($sql);
        $minprijss = $minprijsarray->fetchAll(PDO::FETCH_COLUMN);
        $minprijss2 = implode("', '", $minprijss);
    }
    if(isset($_POST['prijsTot']) && filter_input(INPUT_POST, 'prijsTot', FILTER_SANITIZE_NUMBER_INT) && filter_has_var(INPUT_POST, 'prijsTot')){
        $maxPrijs = $_POST['prijsTot'];
        $sql = "SELECT * FROM stockitems WHERE RecommendedRetailPrice <= $maxPrijs";
        $maxprijsarray = dbSelectAll($sql);
        $maxprijss = $maxprijsarray->fetchAll(PDO::FETCH_COLUMN);
        $maxprijss2 = implode("', '", $maxprijss);
    }else{
        $maxPrijs = maxPrijs();
        $sql = "SELECT * FROM stockitems WHERE RecommendedRetailPrice <= $maxPrijs";
        $maxprijsarray = dbSelectAll($sql);
        $maxprijss = $maxprijsarray->fetchAll(PDO::FETCH_COLUMN);
        $maxprijss2 = implode("', '", $maxprijss);
    }
    $product = array_intersect($cats, $colors, $merks, $maats, $maxprijss, $minprijss);
    $productID = implode("', '", $product);
    $sql = "SELECT * FROM stockitems WHERE StockItemID IN ('$productID')";
    $overgebleven = dbSelectAll($sql);
}else{
    $overgebleven = getProduct();
}

?>
<html>
    <head>
        <style>
            * {
                box-sizing: border-box;
            }
            
            .column1 {
                float: left;
                width: 400px;
                background-color: lightcyan;
                height: 300%;
            }
            
            .column2 {
                width: 100%;
                background-color: lightgrey;
            }
            header{
                width: 100%;
                height: 40px;
                background-color: lightyellow;
                float: right;
            }
        </style>
    </head>
    <body>
        <header>
        <form method="post" action="index2.php">
        </header>
        <div class="column1">
            
                    <button type="submit" name="submit">Zoek!</button>
                    
                <br><br>
                <select name="order by">
                    <option value="0">eerste</option>
                </select>
                <br><br>
                <h3>Categorie</h3>
                <select name="categorie">
                    <option value="0">Selecteer categorie</option>
                
                    <?php
                    while($row = $group->fetchAll(PDO::FETCH_ASSOC)){
                        for($i = 0; $i < count($row); $i++){
                            print("<option value='".$row[$i]['StockGroupID']."'>".$row[$i]['StockGroupName']."</option>");
//                            print($row[$i]['StockGroupID']." ".$row[$i]['StockGroupName']."<br>");
                        }
                    }
                    ?>
                    
                </select>
                <br>
                <br>
                <!--<input type="color" name="color" value="#f44242">-->
                <h3>Kleur</h3>
                <table>
                    <tr>
                        
                        <?php
                        $i = 0;
                        $postColor = 0;
                        while($row = $color->fetch()){
                            if($row['ColorID'] === $postColor){
                                $print = 'checked=""';
                            }else{
                                $print = '';
                            }
                            print('<td><input type="checkbox" name="color[]" value="'.$row["ColorID"].'" '.$print.'> '.$row["ColorName"].'</td>');
                            if($i){
                                print("</tr><tr>");
                                $i=0;
                            }else{
                                $i++;
                            }
                        }

                        ?>
                    </tr>
                </table>
                <br><br>
                <h3>Merk</h3>
                <?php
                while($row = $merk->fetch()){
                    print('<input type="checkbox" name="merk[]" value="'.$row["Brand"].'"> '.$row["Brand"]);
                }
                ?>
                 
                <h3>Maat</h3>
                <?php
                while($row = $maat->fetch()){
                    print('<input type="checkbox" name="maat[]" value="'.$row["Size"].'"> '.$row["Size"]);
                }
                ?>
            
                <h3>Prijs</h3>
                <p>Van <input type="number" name="prijsVan" <?php print('value="'.$minPrijs.'"'); ?> min="0" autocomplete="off" placeholder="0">  </p>
                <p>Tot <input type="number" name="prijsTot" <?php print('value="'.$maxPrijs.'"'); ?> max="<?php print($max); ?>" autocomplete="off" placeholder="<?php print($max); ?>"> </p>
                
            
            <?php 
            
            
            
            ?>
        </form>
        </div>
        <div class="column2">
            <?php
//            print("<h3>Categorie</h3>");
//            print($cats2);
//            
//            print("<h3>Kleur</h3>");
//            print($colors2);
//            
//            print("<h3>Merk</h3>");
//            print($merks2);
//            
//            print("<h3>Maat</h3>");
//            print($maats2);
//            
//            print("<h3>minPrijs</h3>");
//            print($minprijss2);
//            
//            print("<h3>maxPrijs</h3>");
//            print($maxprijss2);
//            print("<br><br>");
//            print_r($product);
//            print("<br><br>");
//            
//            
            ?>
            <table style="width: 70%">
                <?php
                while($row = $overgebleven->fetch()){
                    print("<tr><td>");
                    print($row['StockItemID']);
                    print("</td><td>");
                    print($row['StockItemName']);
                    print("</td><td>");
                    print($row['Brand']);
                    print("</td><td>");
                    print($row['Size']);
                    print("</td><td>");
                    print("&euro;".$row['RecommendedRetailPrice']);
                    print("</td></tr>");
                }
                ?>
            </table>
        </div>
    </body>
</html>
<?php
//include 'footer.php';
?>