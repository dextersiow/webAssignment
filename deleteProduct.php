<html>
    <head>
        <?php include 'links.php'?>
        <title>CHELL'S FRUIT</title>        
       
    </head>
    <body>
        <?php
        require_once 'config.php';        
        
        $productID = $_REQUEST['pID'];
        if(isset($_POST['submit'])){
            
            $sql = "DELETE FROM product where productID='{$productID}'";
            if(mysqli_query($link, $sql)){
                $message = "Delete successful";                
            }
            else{
                $message = "Delete failed, Please try again later";                
            }   
        } 
        $sql = "SELECT * from product where productID='{$productID}'";
        $result = mysqli_query($link, $sql);
        $row=$result->fetch_assoc();
        extract($row);
        mysqli_close($link);    
        ?>       
        
        <div class="container" style="margin-left: 10px;">
            <form action='deleteProduct.php?pID=<?php echo $productID;?>' method='post' class="needs-validation" novalidate enctype="multipart/form-data">
            <h2>Delete product</h2>
            <div>
                <a href="manageProduct.php"><img src="pics/back_btn.png" style="width:1.5%;"></a>
            </div>
            <table class="table table-borderless">  
                <tr>
                    <td width="30%"><label for="productID">Product ID:</label></td>
                    <td width="70%"><input type="type" name="productID" class="form-control" value="<?php echo $row['productID'];?>" disabled></td>
                </tr>
                    <tr>
                        <td><label for="productName">Product Name:</label></td>
                        <td><input type="text" name="productName" class="form-control" value="<?php echo $row['productName'];?>" disabled></td>
                    </tr>           
            
                <tr>
                    <td><label for="price">Price:</label></td>
                    <td><input type="number" name="price" class="form-control" min="0.00" placeholder="RM" step="0.01" value="<?php echo number_format((float)$row['price'],2,'.','');?>" disabled></td>    
                </tr>            
           
                <tr>
                    <td><label for="category">Category:</label></td>
                    <td><input type="text" name="cat" class="form-control" value="<?php echo $row['cat_id'];?>" disabled></td>
                </tr>            
                    <tr>
                        <td><label for="productImg">Product Image:</label></td>
                        <td><img src="./pics/products/<?php echo $row['productImage'];?>" style="" width="100px" height="200px"></td>
                        
                        
                    </tr>                
                </table>
            
            <?php if(!empty($message)){
                echo'<p>'.$message.'</p>';                             
            }
                ?>
            <p>Are you sure you want to delete this product?</p>
            <input type="submit" name="yes" value="Confirm" class="btn btn-primary">
            <input type="button" name="no" value="Cancel" class="btn btn-danger" onclick="window.location.href='manageProduct.php'">
            
         </form>
        </div>
        
    </body>
    
</html>
