<?php
// initialiseer winkelwagenklasse
include 'Cart.php';
$cart = new Cart;
// include database
include 'connect.php';
if(isset($_REQUEST['action']) && !empty($_REQUEST['action'])){
    if($_REQUEST['action'] == 'addToCart' && !empty($_REQUEST['id'])){
        $productID = $_REQUEST['id'];
        // ontvang productdetails
        $query = $connect->query("SELECT * FROM stockitems WHERE StockItemID = ".$productID);
        $row = $query->fetch_assoc();
        $itemData = array(
            'id' => $row['StockItemID'],
            'name' => $row['StockItemName'],
            'price' => $row['RecommendedRetailPrice'],
            'qty' => 1
        );
        
        $insertItem = $cart->insert($itemData);
        $redirectLoc = $insertItem?'index.php':'index.php';
        header("Location: ".$redirectLoc);
    }elseif($_REQUEST['action'] == 'updateCartItem' && !empty($_REQUEST['id'])){
        $itemData = array(
            'rowid' => $_REQUEST['id'],
            'qty' => $_REQUEST['qty']
        );
        $updateItem = $cart->update($itemData);
        echo $updateItem?'ok':'err';die;
    }elseif($_REQUEST['action'] == 'removeCartItem' && !empty($_REQUEST['id'])){
        $deleteItem = $cart->remove($_REQUEST['id']);
        header("Location: viewCart.php");
    }elseif($_REQUEST['action'] == 'placeOrder' && $cart->total_items() > 0 && !empty($_SESSION['sessCustomerID'])){
        if($insertOrder){
            $orderID = $db->insert_id;
            $sql = '';
            // krijg winkelwagenitems
            $cartItems = $cart->contents();
            foreach($cartItems as $item){
                $sql .= "INSERT INTO order_items (order_id, product_id, quantity) VALUES ('".$orderID."', '".$item['id']."', '".$item['qty']."');";
            }
            
            if($insertOrderItems){
                $cart->destroy();
            }else{
            }
        }else{
        }
    }else{
    }
}else{
}
