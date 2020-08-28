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
        
        <script>
            $(document).ready(function(){
                $("#quantity").change(function(){
                    if($("#quantity").val()<1){
                        $("#quantity").val(1);
                    }
                })
            })
        </script>
    </head>
    <body>
        <?php
        include 'header.php';
        $con = new mysqli('localhost', 'root', '', 'webassignment');
        $sql = "select * from product where productID={$_REQUEST['productID']}";
        $result = $con->query($sql);
        $row = $result->fetch_assoc();
        ?>

        <div class="jumbotron text-center">            
            <div class="container">
                <h1 class="font-italic">Preview</h1>
            </div>
        </div>

        <div class="container">
            <div class="row content">
                <div class="col-5 image">
                    <img src="pics/products/<?php echo $row["productImage"]; ?>">
                </div>

                <div class="col-7 description">
                    <h1><?php echo $row["productName"]; ?></h1>
                    <h2>Price: RM <?php echo $row["price"]; ?></h2>
                    <p><u>Shipping calculated at checkout</u></p>
                    <form action="product.php" method="post">
                        <label><b>Quantity:</b></label><br>
                        <input id="quantity" type="number" name="quantity" value="1"><br>
                        <input id="addCart" type="submit" name="addtocart" value="ADD TO CART">
                        <input type="hidden" name="productID" value="<?php echo$row['productID']?>">
                    </form>
                </div>
            </div>


            <div class="footer">
                <div class="text-center">
                    <h3>You may also like</h3>
                </div>
                <div class="row content">
                    <?php
                    $sql = "select* from product where cat_id='{$_REQUEST['catID']}'";
                    $result = $con->query($sql);
                    $i = 0;
                    while ($i < 4 && $row = $result->fetch_assoc()) {
                        if ($row['productID'] != $_REQUEST['productID']) {
                            echo'<div class="col-3">';
                            echo"<a href=\"preview.php?productID={$row['productID']}&catID={$row['cat_id']}\"><img src=\"pics/products/{$row["productImage"]}\"><h5>{$row['productName']}</h5><h7>RM {$row['price']}</h7></a>";
                            echo"</div>";
                            $i++;
                        }
                    }
                    $con->close();
                    ?>
                </div>
            </div>
        </div>

        <?php
        include 'footer.php';
        ?>
    </body>
</html>
