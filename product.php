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
        <link href="assets/css/product.css" rel="stylesheet">
  
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

        <div class="container">
            <h2>All Product</h2>
            <div class="row">
                <div class="col-3">
                    <div class="product-top">
                        <img class="product-img" src="./pics/products/aiwen_mango.jpg">
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
                    <div class="product-top">
                        <img class="product-img" src="./pics/products/australia_carrot.jpg">
                        <div class="overlay">
                            <button type="button" class="btn btn-secondary" title="Preview"><i class="fa fa-eye"></i></button>
                            <button type="button" class="btn btn-secondary" title="Add to cart"><i class="fa fa-shopping-cart"></i></button>                        
                        </div>
                    </div>
                    <div class="product-bottom text-center">
                        <h3>Australia Carrot</h3>
                        <h5>RM 20.00</h5>
                    </div>
                </div>
                
                <div class="col-3">
                    <div class="product-top">
                        <img class="product-img" src="pics/products/golden_dragon_mango.jpg">
                        <div class="overlay">
                            <button type="button" class="btn btn-secondary" title="Preview"><i class="fa fa-eye"></i></button>
                            <button type="button" class="btn btn-secondary" title="Add to cart"><i class="fa fa-shopping-cart"></i></button>                        
                        </div>
                    </div>
                    <div class="product-bottom text-center">
                        <h3>Golden Dragon Mango</h3>
                        <h5>RM 18.00</h5>
                    </div>            
                </div>
                
                <div class="col-3">
                    <div class="product-top">
                        <img class="product-img" src="pics/products/forelle_pear.jpg">
                        <div class="overlay">
                            <button type="button" class="btn btn-secondary" title="Preview"><i class="fa fa-eye"></i></button>
                            <button type="button" class="btn btn-secondary" title="Add to cart"><i class="fa fa-shopping-cart"></i></button>                        
                        </div>
                    </div>
                    <div class="product-bottom text-center">
                        <h3>Forelle Pear</h3>
                        <h5>RM 11.00</h5>
                    </div>
                </div>
            </div>
            
            <div class="row">
                <div class="col-3">
                    <div class="product-top">
                        <img class="product-img" src="./pics/products/australia_rock_melon.jpg">
                        <div class="overlay">
                            <button type="button" class="btn btn-secondary" title="Preview"><i class="fa fa-eye"></i></button>
                            <button type="button" class="btn btn-secondary" title="Add to cart"><i class="fa fa-shopping-cart"></i></button>                        
                        </div>
                    </div>
                    <div class="product-bottom text-center">
                        <h3>Australia Rock Melon</h3>
                        <h5>RM 12.00</h5>
                    </div>
                </div>
                
                <div class="col-3">
                    <div class="product-top">
                        <img class="product-img" src="./pics/products/rambutan.jpg">
                        <div class="overlay">
                            <button type="button" class="btn btn-secondary" title="Preview"><i class="fa fa-eye"></i></button>
                            <button type="button" class="btn btn-secondary" title="Add to cart"><i class="fa fa-shopping-cart"></i></button>                        
                        </div>
                    </div>
                    <div class="product-bottom text-center">
                        <h3>rambutan</h3>
                        <h5>RM 15.00</h5>
                    </div>
                </div>
                
                <div class="col-3">
                    <div class="product-top">
                        <img class="product-img" src="pics/products/young_coconut.jpg">
                        <div class="overlay">
                            <button type="button" class="btn btn-secondary" title="Preview"><i class="fa fa-eye"></i></button>
                            <button type="button" class="btn btn-secondary" title="Add to cart"><i class="fa fa-shopping-cart"></i></button>                        
                        </div>
                    </div>
                    <div class="product-bottom text-center">
                        <h3>Young Coconut</h3>
                        <h5>RM 6.00</h5>
                    </div>            
                </div>
                
                <div class="col-3">
                    <div class="product-top">
                        <img class="product-img" src="pics/products/green_grapes.jpg">
                        <div class="overlay">
                            <button type="button" class="btn btn-secondary" title="Preview"><i class="fa fa-eye"></i></button>
                            <button type="button" class="btn btn-secondary" title="Add to cart"><i class="fa fa-shopping-cart"></i></button>                        
                        </div>
                    </div>
                    <div class="product-bottom text-center">
                        <h3>Green Grapes</h3>
                        <h5>RM 17.00</h5>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-3">
                    <div class="product-top">
                        <img class="product-img" src="./pics/products/thai_lychee.jpg">
                        <div class="overlay">
                            <button type="button" class="btn btn-secondary" title="Preview"><i class="fa fa-eye"></i></button>
                            <button type="button" class="btn btn-secondary" title="Add to cart"><i class="fa fa-shopping-cart"></i></button>                        
                        </div>
                    </div>
                    <div class="product-bottom text-center">
                        <h3>Thai Lychee</h3>
                        <h5>RM 18.00</h5>
                    </div>
                </div>
                
                <div class="col-3">
                    <div class="product-top">
                        <img class="product-img" src="./pics/products/red_seedless_watermelon.jpg">
                        <div class="overlay">
                            <button type="button" class="btn btn-secondary" title="Preview"><i class="fa fa-eye"></i></button>
                            <button type="button" class="btn btn-secondary" title="Add to cart"><i class="fa fa-shopping-cart"></i></button>                        
                        </div>
                    </div>
                    <div class="product-bottom text-center">
                        <h3>Red Seedless Watermelon</h3>
                        <h5>RM 18.00</h5>
                    </div>
                </div>
                
                <div class="col-3">
                    <div class="product-top">
                        <img class="product-img" src="pics/products/beetroot.jpg">
                        <div class="overlay">
                            <button type="button" class="btn btn-secondary" title="Preview"><i class="fa fa-eye"></i></button>
                            <button type="button" class="btn btn-secondary" title="Add to cart"><i class="fa fa-shopping-cart"></i></button>                        
                        </div>
                    </div>
                    <div class="product-bottom text-center">
                        <h3>Beetroot</h3>
                        <h5>RM 9.00</h5>
                    </div>            
                </div>
                
                <div class="col-3">
                    <div class="product-top">
                        <img class="product-img" src="pics/products/tomatoes.jpg">
                        <div class="overlay">
                            <button type="button" class="btn btn-secondary" title="Preview"><i class="fa fa-eye"></i></button>
                            <button type="button" class="btn btn-secondary" title="Add to cart"><i class="fa fa-shopping-cart"></i></button>                        
                        </div>
                    </div>
                    <div class="product-bottom text-center">
                        <h3>Tomato</h3>
                        <h5>RM 3</h5>
                    </div>
                </div>
            </div>            
        </div>
        <?php include'footer.php' ?>
    </body>
</html>
