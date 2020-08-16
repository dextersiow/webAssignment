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
        <link href="assets/css/preview.css" rel="stylesheet">

        
        <title>CHELL'S FRUIT</title>
    </head>
    <body>
        <?php
        include 'header.php';
        ?>
        
         <div class="jumbotron text-center">            
            <div class="container">
                <h1 class="font-italic">Preview</h1>
            </div>
        </div>
        
        <div class="container">
            <div class="row">
                <div class="col-5 image">
                    <img src="pics/products/australia_rock_melon.jpg">
                </div>

                <div class="col-7 description">
                    <h1>Autumn royal black grapes</h1>
                    <h2>Price: RM 12.00</h2>
                    <p><u>Shipping calculated at checkout</u></p>
                    <form>
                        <label><b>Quantity:</b></label><br>
                        <input id="quantity" type="number" name="quantity"><br>
                        <input id="addCart" type="submit" name="addtocart" value="ADD TO CART">
                    </form>
                </div>
            </div>
            <div class="row">
                <div class="col-3">
                    
                </div>
            </div>
        </div>
        <?php
        include 'footer.php';
        ?>
    </body>
</html>
