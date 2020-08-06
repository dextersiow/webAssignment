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

            .cart-itemname{
                width: 30%;
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
                        <span class="order-number">Order number: 1234</span>
                        <h3>Thank You Mr. ???</h3>
                    </div>
                    <div class="content">
                        <h2>Your order is confirmed</h2>
                        <p>1) Please make your online transfer/cash deposit to the following account:</p>
                        <p>Bank Name: Public Bank Berhad</p>
                        <p>Account Name: Chell's Fruit SDN. BHD</p>
                        <p>Account Number: 6412356789</p>
                        <p>2) Send your payment receipt to mhsmalaysia@gmail.com. Please put your Order Number in the subject line. Order number is at the top of this page.</p>
                    </div>

                    <div class="content">
                        
                        <div class="customer-information">
                            <h4>Customer Information</h4>
                            <p>Siow Yee How</p>
                            <p>???@gmail.com</p>
                        </div>

                        <div class="shipping-address">
                            <h4>Shipping Address</h4>
                            <p class="address">66, Jalan8,<br>Taman Putra, Ampang,<br>68000 Selangor</p>
                        </div>


                        <div class="payment">
                            <h4>Payment</h4>
                            <p>Amount: RM 35.00</p>
                        </div>                            

                    </div>
                    <button class="btn btn-warning" onclick="location='product.php'">Continue Shopping</button>
                </div>

                <div class="col-6 bg-light">
                    <table class="table table-hover" style="border-bottom:1px;">  
                        <tr class="cart cart-row">
                            <td class="cart-itemimg"><img src="pics/products/australia_carrot.jpg"></td>
                            <td class="cart-itemname">Australia Carrot</td>
                            <td class="item-price">25.00</td>                        
                            <td class="item-quantity">1</td>
                            <td class="item-total">25.00</td>                       
                        </tr>   
                        <tfoot>
                            <tr>
                                <td>Subtotal:<br>Shipping:</td>
                                <td colspan="4" style="text-align:right">RM 25.00<br>RM 10.00</td>
                            </tr>
                            <tr>
                                <td>Total:</td>
                                <td colspan="4" style="text-align: right">RM 35.00<br></td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
        <?php include 'footer.php'; ?>
    </body>
</html>
