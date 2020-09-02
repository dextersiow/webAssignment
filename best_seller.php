<?php 
session_start();
$con = new mysqli('localhost', 'root', '', 'webassignment');
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
        <link href="assets/css/product.css" rel="stylesheet">


        <title>CHELL'S FRUIT</title>
        
    </head>
    <body>
        <?php include "header.php"?>
        <div class="jumbotron text-center">            
            <div class="container">
                <h1 class="font-italic">Best Seller</h1>
            </div>
        </div>
        <div class="container">
            <h2>Best Selling Products</h2>
            <?php
            echo "<div class=\"row\">";
            
            $sql="select * from product where bestSell='1'";
            $result=$con->query($sql);
       
            while ($row = $result->fetch_assoc()) {
                echo "<div class=\"col-3\">
                    <div class=\"product-top\">
                        <img class=\"product-img\" src=\"./pics/products/{$row["productImage"]}\">
                        <div class=\"overlay\">
                            <button type=\"button\" class=\"btn btn-secondary\" onclick=\"location='preview.php?productID={$row['productID']}&catID={$row['cat_id']}'\" title=\"Preview\"><i class=\"fa fa-eye\"></i></button>
                            <button type=\"button\" class=\"btn btn-secondary\" onclick=\"location='product.php?productID={$row['productID']}&quantity=1'\" title=\"Add to cart\"><i class=\"fa fa-shopping-cart\"></i></button>                        
                        </div>
                    </div>
                    <div class=\"product-bottom text-center\">
                        <h3>{$row["productName"]}</h3>
                        <h5>RM",number_format((float)$row['price'],2,'.',''),"</h5>
                    </div>
                    </div>";
            }
            echo "</div>";
            ?>
        </div>
        <?php include "footer.php"?>
    </body>
</html>
