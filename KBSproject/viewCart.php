<?php
include 'Cart.php';
include 'header.php';
$cart = new Cart;?>
            <script>
            function updateCartItem(obj,id){
                $.get("cartAction.php", {action:"updateCartItem", id:id, qty:obj.value}, function(data){
                    if(data == 'ok'){
                        location.reload();
                    }else{
                        alert('Winkelwagenupdate mislukt, probeer het opnieuw. ');
                    }
                });
            }
            </script>
<div class="container">
    <h1>Winkelwagen</h1>
    <table class="table">
    <thead>
        <tr>
            <th>Producten</th>
            <th>Prijs</th>
            <th>Aantal</th>
            <th>Subtotaal</th>
            <th>&nbsp;</th>
        </tr>
    </thead>
    <tbody>
        <?php
        if($cart->total_items() > 0){
            // krijg winkelwagenitems van de sessie
            $cartItems = $cart->contents();
            foreach($cartItems as $item){
        ?>
        <tr>
            <td><?php echo $item["name"]; ?></td>
            <td><?php echo '€'.$item["price"].' EURO'; ?></td>
            <td><input type="number" class="form-control text-center" value="<?php echo $item["qty"]; ?>" onchange="updateCartItem(this, '<?php echo $item["rowid"]; ?>')"></td>
            <td><?php echo '€'.$item["subtotal"].' EURO'; ?></td>
            <td>
                <a href="cartAction.php?action=removeCartItem&id=<?php echo $item["rowid"]; ?>" class="btn btn-danger" onclick="return confirm('Weet je het zeker?')"><i class="glyphicon glyphicon-trash"></i></a>
            </td>
        </tr>
        <?php } }else{ ?>
        <tr><td colspan="5"><p>Je winkelwagen is leeg .....</p></td>
        <?php } ?>
    </tbody>
    <tfoot>
        <tr>
            <td><a href="index.php" class="btn btn-success btn-block"><i class="glyphicon glyphicon-menu-left"></i>Terug naar winkel</a></td>
            <td colspan="2"></td>
            <?php if($cart->total_items() > 0){ ?>
            <td class="text-center"><strong>Total <?php echo '€'.$cart->total().' EURO'; ?></strong></td>
            <td><a href="https://www.ideal.nl/" class="btn btn-success btn-block">Bestellen <i class="glyphicon glyphicon-menu-right"></i></a></td>
            <?php } ?>
        </tr>
    </tfoot>
    </table>
</div>
<?php include 'footer.php';?>