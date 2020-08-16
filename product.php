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
        <?php include'header.php' ?>        
        <?php
        $con = new mysqli('localhost', 'root', '', 'webassignment');
        if (isset($_REQUEST['filter'])) {
            if ($_REQUEST['filter'] == "others") {
                $sql = "select * from product where cat_id='OT01'";
                $title = "Others";
            } else if ($_REQUEST['filter'] == "seasonal") {
                $sql = "select * from product where cat_id='SE01'";
                $title = "Seasonal Fruits";
            } else if ($_REQUEST['filter'] == "stone") {
                $sql = "select * from product where cat_id='ST01'";
                $title = "Stone Fruits";
            } else if ($_REQUEST['filter'] == "berries") {
                $sql = "select * from product where cat_id='BE01'";
                $title = "Berries";
            } else if ($_REQUEST['filter'] == "tropical") {
                $sql = "select * from product where cat_id='TE01'";
                $title = "Tropical and Exotic";
            } else {
                $sql = "select * from product";
                $title = "All product";
            }
        }else{
            $sql = "select * from product";
            $title = "All product";
        }

        $productArray = $con->query($sql);
        $numOfRow = $con->affected_rows;
        ?>
        <div class="jumbotron text-center">            
            <div class="container">
                <h1 class="font-italic">Products</h1>
            </div>
        </div>

        <div class="container-fluid filter-toolbar">            
            <div class="filter-content dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown">Filter By</a>
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="product.php?filter=all">All product</a>
                    <a class="dropdown-item" href="product.php?filter=seasonal">Seasonal fruits</a>
                    <a class="dropdown-item" href="product.php?filter=stone">Stone fruits</a>
                    <a class="dropdown-item" href="product.php?filter=berries">Berries</a>
                    <a class="dropdown-item" href="product.php?filter=tropical">Tropical and exotic</a>          
                    <a class="dropdown-item" href="product.php?filter=others">Others</a>
                </div>
                <span><?php echo"$title";?></span>
            </div>           
        </div>

        <div class="container">
            <h2><?php echo "$title"?></h2>
           
            <?php
            echo "<div class=\"row\">";


            while ($row = $productArray->fetch_assoc()) {
                echo "<div class=\"col-3\">
                    <div class=\"product-top\">
                        <img class=\"product-img\" src=\"./pics/products/{$row["productImage"]}\">
                        <div class=\"overlay\">
                            <button type=\"button\" class=\"btn btn-secondary\" onclick=\"location='preview.php?productID={$row['productID']}&catID={$row['cat_id']}'\" title=\"Preview\"><i class=\"fa fa-eye\"></i></button>
                            <button type=\"button\" class=\"btn btn-secondary\" onclick=\"location='cart.php?productID={$row['productID']}'\" title=\"Add to cart\"><i class=\"fa fa-shopping-cart\"></i></button>                        
                        </div>
                    </div>
                    <div class=\"product-bottom text-center\">
                        <h3>{$row["productName"]}</h3>
                        <h5>RM {$row["price"]}</h5>
                    </div>
                    </div>";
            }
            echo "</div>";
            ?>

            <?php include'footer.php' ?>
    </body>
</html>
