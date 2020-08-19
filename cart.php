<?php
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
                $("#btn").click(function(){
                   $("table").hide(); 
                });
            })
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
                        <th>Total (RM)</th>
                    </tr>
                </thead>                
                <tbody>
                    <?php
                    $totalPrice=0;
                    foreach ($cart as $key => $value) {
                        $row = $result->fetch_assoc();
                        $totalPrice+=$row['price'];
                        echo "<tr class=\"cart cart-row\">
                        <td class=\"cart-itemimg\"><img src=\"pics/products/{$row['productImage']}\"></td>
                        <td class=\"cart-itemname\">{$row['productName']}</td>
                        <td class=\"item-price\">{$row['price']}</td>                        
                        <td class=\"item-quantity\"><input type=\"number\" name=\"quantity\" value=\"1\"></td>
                        <td class=\"item-total\">25.00</td>
                        <td><button type=\"button\" class=\"btn btn-danger remove-btn\" onclick=\"location='cart.php?remove={$key}'\">Remove</button></td>
                    </tr>";
                    }
                    ?>
                </tbody>
                <tfoot>
                    <tr>                       
                        <td colspan="5" style="text-align: right">Subtotal:  RM<br><button id="btn" type="button" onclick="location = 'checkout.php'">Proceed to Checkout</button></td>
                    </tr>
                </tfoot>
            </table>
        </div>            
        <?php include 'footer.php' ?>
    </body>
</html>
