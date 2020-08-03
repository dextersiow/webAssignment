<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
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
       
    </head>
    <body>
        <?php include'header.php' ?>

        <div class="jumbotron text-center">
            <h1>Products</h1>
        </div>

        <div class="container-fluid filter-toolbar">
            <label for="filter">Filter by: </label>
            <select name="filter">
                <option value="">All product</option>
                <option value="">Seasonal Fruit</option>
                <option value="">Stone Fruits</option>
                <option value="">Berries</option>
            </select>
        </div>

        <div class="container content-product">
            <div class="row">
            <div class="col-3">
                <div class="product-top">
                    <img src="./pics/products/aiwen_mango.jpg">
                    <div class="overlay">
                        <button type="button" class="btn btn-secondary" title="Preview"><i class="fa fa-eye"></i></button>
                        <button type="button" class="btn btn-secondary" title="Add to cart"><i class="fa fa-shopping-cart"></i></button>                        
                    </div>
                </div>
                <div class="product-bottom text-center">
                    <h3>Aiwen Mango</h3>
                    <h5>RM 10.00</h5>
                </div>
            </div>
            <div class="col-3">
                <a target="_blank" href="#">
                    <img src="./pics/products/autumn_royal_black_grapes.jpg"></img>
                </a>
                <div class="desc">Aiwen Mango<br/>RM 10.00</div>
            </div>
            <div class="col-3">
                <a target="_blank" href="#">
                    <img src="./pics/products/hokkaido_honeydew.jpg"></img>
                </a>
                <div class="desc">Aiwen Mango<br/>RM 10.00</div>
            </div>
            <div class="col-3">
                <a target="_blank" href="#">
                    <img src="./pics/products/hokkaido_honeydew.jpg"></img>
                </a>
                <div class="desc">Aiwen Mango<br/>RM 10.00</div>
            </div>
        </div>
        </div>
        <?php include'footer.php' ?>
    </body>
</html>