<?php
session_start();
require('connect.php');
?>

<html>
    <head>
        <title>Product weergave</title>
        <style>
            * {
                box-sizing: border-box;
            }
            .column {
                float: left;
                width: 33%;
                text-align: center;
                
            }
            .greyback {
                background-color: lightgray;
            }
            
        </style>
    </head>
    <body>
        <?php
        $query = "SELECT * FROM stockitems ORDER BY StockItemID";
        $result = mysqli_query($connect, $query);
        $rownum = 0;
        while($row = mysqli_fetch_array($result)){
        ?>
        <div class="column">
            <?php
            if($rownum %3 == 0){
                print("<img src='".$row['Photo']."' /><br>");
                print("Artikel: ".$row['StockItemID']."<br>".
                        $row['StockItemName']."<br>Prijs: €".
                        $row['RecommendedRetailPrice']."<br><br>");
            }
            ?>
        </div>
        <div class="column">
            <div class="greyback">
                <?php
                if($rownum %3 == 1){
                    print("<img src='".$row['Photo']."' /><br>");
                    print("Artikel: ".$row['StockItemID']."<br>".
                            $row['StockItemName']."<br>Prijs: €".
                            $row['RecommendedRetailPrice']."<br><br>");
                }
                ?>
            </div>
        </div>
        <div class="column">
            <?php
            if($rownum %3 == 2){
                print("<img src='".$row['Photo']."' /><br>");
                print("Artikel: ".$row['StockItemID']."<br>".
                        $row['StockItemName']."<br>Prijs: €".
                        $row['RecommendedRetailPrice']."<br><br>");
            }
            ?>
        </div>
        <?php
        $rownum++;
        }
        ?>
    </body>
</html>
