<?php 
session_start();
if (empty($_SESSION['loggedin'])){
    header('Location: index.php');
}
?>

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
            $pname = $_POST['productName'];
            $price = $_POST['price'];
            $cat = $_POST['category'];
            $bestSell = $_POST['bestSell'];
            
            $fname=$_FILES['pImg']['name'];
            $destination = 'pics/products/'.$fname;
            $extension = pathinfo($fname, PATHINFO_EXTENSION);     
            $file = $_FILES['pImg']['tmp_name'];
            $size = $_FILES['pImg']['size'];            
            
            if(!in_array($extension,['png','jpeg','jpg'])){
                $message = "Invalid file type";
                
            }
            elseif($_FILES['pImg']['size'] > 1000000){
                echo 'File too large';
            }
            else{
                if(move_uploaded_file($file, $destination)){
                    $sql2 = "UPDATE product set cat_id='{$cat}',productName='{$pname}',price='{$price}',productImage='{$fname}', bestSell='{$bestSell}' where productID='{$productID}'";
                    if(mysqli_query($link, $sql2)){
                        $message = "Edit successful";                    }
                    else{
                        $message = "Edit failed, Please try again later";
                    }
                }
            }       
        }        
        
        $sql = "SELECT * from product where productID='{$productID}'";
        $result = mysqli_query($link, $sql);
        $row=$result->fetch_assoc();
        extract($row);
     
        mysqli_close($link);    
        ?>       
        
        <div class="container" style="margin-left: 10px;">
            <form action='editProduct.php?pID=<?php echo $productID;?>' method='post' class="needs-validation" novalidate enctype="multipart/form-data">
            <h2>Edit product</h2>
            <div>
                <a href="manageProduct.php"><img src="pics/back_btn.png" style="width:1.5%;"></a>
            </div>
            <table class="table table-borderless">  
                <tr>
                    <td><label for="productID">Product ID:</label></td>
                    <td><input type="type" name="productID" class="form-control" value="<?php echo $row['productID'];?>" disabled></td>
                </tr>
                    <tr>
                        <td><label for="productName">Product Name:</label></td>
                        <td><input type="text" name="productName" class="form-control" value="<?php echo $row['productName'];?>" required></td>
                    </tr>           
            
                <tr>
                    <td><label for="price">Price:</label></td>
                    <td><input type="number" name="price" class="form-control" min="0.00" placeholder="RM" step="0.01" value="<?php echo number_format((float)$row['price'],2,'.','');?>" required></td>    
                </tr>            
           
                <tr>
                    <td><label for="category">Category:</label></td>
                <td>
                    <select name='category' class="form-control" required="required">
                        <option value = '' hidden="hidden">-Select one-</option>
                        <option <?php if(strcmp($row['cat_id'],"SE01")==0){echo'selected';}?> value='SE01'>Seasonal fruits</option>
                        <option <?php if(strcmp($row['cat_id'],"ST01")==0){echo'selected';}?> value='ST01'>Stone fruits</option>
                        <option <?php if(strcmp($row['cat_id'],"BE01")==0){echo'selected';}?> value='BE01'>Berries</option>
                        <option <?php if(strcmp($row['cat_id'],"TE01")==0){echo'selected';}?> value='TE01'>Tropical and exotic</option>
                        <option <?php if(strcmp($row['cat_id'],"OT01")==0){echo'selected';}?> value='OT01'>Others</option>
                </select>
                </td>
                </tr>        
                <tr>
                    <td><label for="bestSell">Best Sell:</label></td>
                    <td>
                        <select name='bestSell' class="form-control" required="required">
                        <option value = '' hidden="hidden">-Select one-</option>
                        <option <?php if($row['bestSell']==1){echo'selected';}?> value='1'>Yes</option>
                        <option <?php if($row['bestSell']==0){echo'selected';}?> value='0'>No</option>                        
                        </select>
                    </td>                    
                </tr>
                    <tr>
                        <td><label for="productImg">Product Image:</label></td>                        
                        <td><input type="file" name="pImg" id="pImg" required></td>
                        
                    </tr>                
                </table>
            
            <?php if(!empty($message)){
                echo'<p>'.$message.'</p>';                             
            }
                ?>
            <input type="submit" name="submit" class="btn btn-primary">
            <input type="button" name="cancel" value="Cancel" class="btn btn-danger" onclick="window.location.href='manageProduct.php'">
            
         </form>
        </div>
        
    </body>
    
</html>


