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
      
    <title>CHELL'S FRUIT</title>
  
    <style>
                 
        
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
      }
      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>
    </head>
    
    <body>
       <?php 
       include 'header.php';       
       ?>
        
        <div class="container" >
            <div class="jumbotron text-center">
            <h1>Your Cart</h1>
            <p><a href="#">Continue Shopping</a></p>
            </div>
            
            <table class="table table-hover table" style="border-bottom:1px;">
                <thead>
                    <tr>
                        <th>Product</th>
                        <th>Price (RM)</th>
                        <th>Quantity</th>
                        <th>Total (RM)</th>
                    </tr>
                </thead>                
                <tbody>
                    <tr>
                        <td width="55%"><img src="./pics/products/australia_carrot.jpg"><a class="remove" href="#">Remove</a></td>
                        <td>25.00</td>
                        <td><input type="number" name="quantity"></td>
                        <td>25.00</td>
                    </tr>                    
                </tbody>
                <tfoot>
                    <tr>                       
                        <td colspan="4" style="text-align: right">Subtotal:  RM25.00<br><button type="button" onclick="location='#'">Proceed to Checkout</button></td>
                    </tr>
                </tfoot>
            </table>
            </div>            
        <?php include 'footer.php' ?>
    </body>
</html>