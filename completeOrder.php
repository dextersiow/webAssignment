<?php 
session_start();
if(!(isset($_SESSION['loggedin'])&& $_SESSION["loggedin"] === true)){
    header("location: signin.php?alert=1");
}
if ((isset($_COOKIE['cart']))&&(isset($_COOKIE['quantity']))) {
    $cart = explode('|', $_COOKIE['cart']);
    $quantity = explode('|', $_COOKIE['quantity']);
} else {
    $cart = array();
    $quantity = array();
}
date_default_timezone_get('Asia/Kuala_Lumpur');
$date=date('Y-m-j');
$con = new mysqli('localhost', 'root', '', 'webassignment'); 
$sql="select * from member where member_id={$_SESSION["member_id"]}";
$result=$con->query($sql);
$row=$result->fetch_assoc();
$t=$_REQUEST['total']+10;
$sql2="INSERT INTO fruit_order (member_id,order_date,amount) VALUES ({$row['member_id']},'$date',$t)";
$r=$con->query($sql2);
$last_id = $con->insert_id;
?>
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
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
        <title>CHELL'S FRUIT</title>

        <style>
            .jumbotron{
                background-color: orange;
            }

            h1{
                color: white;
            }
            
            .img{
                width: 70px;
            }

            .content{
                margin: 20px;
                border: 1px solid;
                padding: 1.5em;
            }

            .btn{
                color: white;
            }
        </style>
    </head>
    <body>
        <header><a href="index.php"><img src="pics/logo.jpeg" class="mx-auto d-block"> </a></header>
        <div class="container">
            <div class="jumbotron text-center">
                <h1>Order Confirmation</h1>
            </div>
            <div class="row">
                <div class="col-6">
                    <div class="order-header">
                        <span class="order-number">Order number: <?php echo$last_id?></span>
                        <h3>Thank You <?php echo $_REQUEST['fname']?></h3>
                    </div>
                    <div class="content">
                        <h2>Your order is confirmed</h2>
                        <p>1) Please make your online transfer/cash deposit to the following account:</p>
                        <p>Bank Name: Public Bank Berhad</p>
                        <p>Account Name: Chell's Fruit SDN. BHD</p>
                        <p>Account Number: 6412356789</p>
                        <p>2) Send your payment receipt to mhsmalaysia@gmail.com. Please put your Order Number in the subject line. Order number is at the top of this page.</p>
                        <p>3) Your order will be delivered within the next day :D</p>
                    </div>

                    <div class="content">
                        
                        <div class="customer-information">
                            <h4>Customer Information</h4>
                            <p><?php echo "{$_REQUEST['fname']} {$_REQUEST['lname']}" ?></p>
                            <p><?php echo "{$row['email']}"?></p>
                        </div>

                        <div class="shipping-address">
                            <h4>Shipping Address</h4>
                            <p class="address"><?php echo$_REQUEST['address'] ?></p>
                        </div>


                        <div class="payment">
                            <h4>Payment</h4>
                            <p>Amount: RM <?php echo number_format((float)$t,2,'.','')?></p>
                        </div>                            

                    </div>
                    <button class="btn btn-warning" onclick="location='product.php'">Continue Shopping</button>
                </div>

                <div class="col-6 bg-light">
                    <table class="table table-hover" style="border-bottom:1px;">
                        <?php
                         foreach ($cart as $key => $value){
                              $sql = "select * from product where productID ={$value}";
                        $result = $con->query($sql);
                        $row = $result->fetch_assoc();
                        echo "<tr class=\"cart cart-row\">
                            <td class=\"cart-itemimg\"><img class='img' src=\"pics/products/{$row['productImage']}\"></td>
                            <td class=\"cart-itemname\">{$row['productName']}</td>                        
                            <td class=\"item-quantity\">{$quantity[$key]}</td>
                            <td class=\"item-price\" style=\"text-align:right\">RM",number_format((float)$row['price'],2,'.',''),"</td>                    
                        </tr>";
                         }
                        ?>
                        <tfoot>
                            <tr>
                                <td colspan="3">Subtotal:<br>Shipping:</td>
                                <td style="text-align:right">RM <?php echo number_format((float)$_REQUEST['total'],2,'.','')?><br>RM 10.00</td>
                            </tr>
                            <tr>
                                <td colspan="3">Total:</td>
                                <td style="text-align: right">RM <?php echo number_format((float)$t,2,'.','')?><br></td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
        <?php include 'footer.php'; ?>
    </body>
</html>
