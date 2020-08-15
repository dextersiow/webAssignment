<html>
    <head>
        <meta charset="UTF-8">
        <title>CHELL'S FRUIT</title>
        
        <style>
            #addForm{
                display:block;
                margin: auto;
            }            
        </style>
    </head>
    <body>
        <?php
        require_once 'config.php';
                
        if(isset($_POST['submit'])){
            $pname = $_POST['productName'];
            $price = $_POST['price'];
            $cat = $_POST['category'];
            
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
                    $sql = "INSERT INTO product (cat_id, productName, price, productImage) VALUES ('$cat','$pname',$price,'$fname')";
                    if(mysqli_query($link, $sql)){
                        echo "Sucessful";
                    }
                    else{
                        echo "Failed";
                    }
                }
            }
                      
        }
     
        mysqli_close($link);    
        ?>
        
        <div class="container">
            <form action='addProduct.php' method='post' class="needs-validation" novalidate id="addForm" enctype="multipart/form-data">
            <h2>Add product</h2>
            <div>
                <a href="welcome_admin.php"><img src="pics/back_btn.png" style="width:1.5%;"></a>
            </div>
            <table class="table table-borderless">                
                    <tr>
                        <td><label for="productName">Product Name:</label></td>
                        <td><input type="text" name="productName" class="form-control"></td>
                    </tr>
                
            
                <tr>
                    <td><label for="price">Price:</label></td>
                    <td><input type="number" name="price" class="form-control" min="0.00" placeholder="RM" step="0.01"></td>    
                </tr>
            
           
                <tr>
                    <td><label for="category">Category:</label></td>
                <td>
                    <select name='category' class="form-control" required="required">
                        <option value = '' hidden="hidden">-Select one-</option>
                         <option value='SE01'>Seasonal fruits</option>
                         <option value='ST01'>Stone fruits</option>
                         <option value='BE01'>Berries</option>
                         <option value='TE01'>Tropical and exotic</option>
                         <option value='OT01'>Others</option>
                </select>
                </td>
                </tr>
            
                    <tr>
                        <td><label for="productImg">Product Image:</label></td>
                        <td><input type="file" name="pImg" id="pImg"></td>
                    </tr>
                
                </table>
            <?php if(!empty($message)){
                echo'<p>'.$message.'</p>';                             
            }
                ?>
            <input style="margin-top: 10px;" type="submit" name="submit" class="btn btn-primary">
            <input type="reset" name="reset" class="btn btn-primary" onclick="location.reload();">
            
         </form>
        </div>
        
    </body>
    
</html>
