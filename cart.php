<?php
session_start();
include 'header.php';

if (isset($_COOKIE['cart'])) {
    $cart = explode('|', $_COOKIE['cart']);
   
} else {
    $cart = array();
}
if (isset($_REQUEST['remove'])) {
    $k = $_REQUEST['remove'];
    unset($cart[$k]);
}
$cartString = implode('|', $cart);
setcookie('cart', $cartString);
$select = implode(",", $cart);
?>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="generator" content="Jekyll v4.0.1">
        <link rel="canonical" href="https://getbootstrap.com/docs/4.5/examples/starter-template/">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>  

        <link href="assets/css/bootstrap.css" rel="stylesheet">   
        <link href="assets/css/homepage.css" rel="stylesheet">    
        <script src="assets/javascript/bootstrap.bundle.js"></script>
        
        <style>
            .cart-itemname{                
                width: 30%;
            }
            .bg-cover{
                background-image: url("pics/cart_banner3.jfif");
                background-repeat: no-repeat;
                background-size: 1200px 400px; 
            }
            .jumbotron{
                padding-bottom: 240px;                
            }
        </style>
        <script>
        $(document).ready(function(){
            updateCartTotal();
            var quantityInputs = document.getElementsByClassName('item-quantity');
            for (var i = 0; i < quantityInputs.length; i++) {
                 var input = quantityInputs[i];
                 input.addEventListener('change', quantityChanged);
            }
        });
        
        function quantityChanged(event) {
            var input = event.target;
            if (isNaN(input.value) || input.value <= 0) {
                input.value = 1;
            }
            updateCartTotal();
        }
        
        function updateCartTotal() {
            var cartItemContainer = document.getElementsByClassName('cart-item')[0];
            var cartRows = cartItemContainer.getElementsByClassName('cart-row');
            var total = 0;
            for (var i = 0; i < cartRows.length; i++) {
                var cartRow = cartRows[i];
                var priceElement = cartRow.getElementsByClassName('item-price')[0];
                var quantityElement = cartRow.getElementsByClassName('item-quantity')[0];
                var price = parseFloat(priceElement.innerText);
                var quantity = quantityElement.value;
                total = total + (price * quantity);
            }
            total = Math.round(total * 100) / 100;
            document.getElementsByClassName('total-price')[0].innerText = "Subtotal: RM "+total;
        }
        </script>
        
        <title>CHELL'S FRUIT</title>

    </head>      

    <body>
        <?php        
        $con = new mysqli('localhost', 'root', '', 'webassignment');        
        $sql="select * from product where productID IN ($select)";
        $result=$con->query($sql);        
        ?>
       
        <div class="container" >
            <div class="jumbotron text-center bg-cover">
                <div class="container">
                <h1>Your Cart</h1>
                <p><a href="product.php">Continue Shopping</a></p>
                </div>
            </div>

            <table class="table table-hover table" style="border-bottom:1px;">
                <thead>
                    <tr>
                        <th colspan="2">Product</th>
                        <th>Price (RM)</th>
                        <th>Quantity</th>
                    </tr>
                </thead>                
                <tbody class="cart-item">
                    <?php
                    $totalPrice=0;
                    foreach ($cart as $key => $value) {
                        $row = $result->fetch_assoc();
                        $totalPrice+=$row['price'];
                        echo "<tr class=\"cart-row\">
                        <td class=\"cart-itemimg\"><img src=\"pics/products/{$row['productImage']}\"></td>
                        <td class=\"cart-itemname\">{$row['productName']}</td>
                        <td class=\"item-price\">{$row['price']}</td>                        
                        <td><input class=\"item-quantity\" type=\"number\" name=\"quantity\" value=\"1\"></td>
                        <td><button type=\"button\" class=\"btn btn-danger remove-btn\" onclick=\"location='cart.php?remove={$key}'\">Remove</button></td>
                    </tr>";
                    }
                    ?>
                </tbody>
                <tfoot>
                    <tr>                       
                        <td colspan="4" style="text-align: right"><span class="total-price"></span><br><button type="button" onclick="location = 'checkout.php'">Proceed to Checkout</button></td>
                    </tr>
                </tfoot>
            </table>
        </div>            
        <?php include 'footer.php' ?>
    </body>
</html>
