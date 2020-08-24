<?php 
session_start();
if(!(isset($_SESSION['loggedin'])&& $_SESSION["loggedin"] === true)){
    header("location: signin.php?alert=1");
}
?>
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
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
            .jumbotron{
                background-color: orange;
            }
            
            h1{
                color: white;
            }
            .cart-itemname{                
                width: 30%;
            }
            
           
        </style>

        <title>CHELL'S FRUIT</title>

    </head>

    <body>
        <header><a href="index.php"><img src="pics/logo.jpeg" class="mx-auto d-block"> </a></header>
        <div class="container">
            <div class="jumbotron text-center">
                <h1>Checkout</h1>
            </div>
            <div class="row">
                <div class="col-6">               
                    <form action="completeOrder.php" method="POST">
                        <table class="table table-borderless">
                            <tr>
                                <td><label for="contact">Contact Information: </label><br>
                                <input type="text" name="contact"/><br></td>
                            </tr>
                            <tr>
                                <td><label for="delivery">Delivery Method: </label></td> 
                            </tr>
                            <tr>
                                <td><input type="radio" name="delivery" value="ship">Ship</td>
                                <td><input type="radio" name="delivery" value="pickup">Pick up</td>
                            </tr>
                        
                            <tr><td><label for="shipping">Shipping Address: </label></td></tr>
                       
                            <tr><td>First Name: <input type="text" name="fname"></td><td>Last Name: <input type="text" name="lname"></td></tr>
                            <tr><td colspan="2">Address: <input type="text" name="address" size="60px"></td></tr>
                            <tr><td colspan="2">Phone Number: <input type="tel" name="phone" size="53px"></td></tr>  
                            <tr><td colspan="2"><input type="submit" value="Complete Order"></td></tr>
                        </table>
                    </form>
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