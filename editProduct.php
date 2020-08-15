<html>
    <head>
        <?php include 'links.php'?>
        <title>CHELL'S FRUIT</title>
        
       
    </head>
    <body>
        <?php
        require_once 'config.php';
        
        $productID = $_REQUEST['productID'];
        $sql = "SELECT * from product where productID='{$productID}'";
        $result = mysqli_query($link, $sql);
        $row=$result->fetch_assoc();
        extract($row);
        
        if(isset($_POST['submit'])){
            $pname = $_POST['productName'];
            $price = $_POST['price'];
            $cat = $_POST['category'];
            
            $fname=$_FILES['pImg']['name'];
            $destination = 'pics/products/'.$fname;
            $extension = pathinfo($fname, PATHINFO_EXTENSION);     
            $file = $_FILES['pImg']['tmp_name'];
            $size = $_FILES['pImg']['size'];
            
            $sql = "UPDATE product set cat_id='{$cat}',productName='{$pname}',price='{$price}',productImage='{$fname}' where productID='{$productID}'";
                      
        }
     
        mysqli_close($link);    
        ?>
        
        <div class="container" style="margin-left: 10px;">
            <form action='editProduct.php' method='post' class="needs-validation" novalidate enctype="multipart/form-data">
            <h2>Edit product</h2>
            <div>
                <a href="welcome_admin.php"><img src="pics/back_btn.png" style="width:1.5%;"></a>
            </div>
            <table class="table table-borderless">  
                <br>
                <p>Enter product ID and edit the product details.</p>
                <tr>
                    <td><label for="productID">Product ID:</label></td>
                    <td><input type="text" name="productID" class="form-control"></td>
                </tr>          
                
            <?php 
            if(!empty($message)){
                echo'<p>'.$message.'</p>';                             
            }else{

            }
            ?>
            </table>
            <input type="submit" name="submit" class="btn btn-primary">
            <input type="reset" name="reset" class="btn btn-danger" onclick="location.reload();">
            
         </form>
        </div>
        
    </body>
    
</html>
