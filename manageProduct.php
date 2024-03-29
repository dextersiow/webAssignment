<?php 
session_start();
if (empty($_SESSION['loggedin'])){
    header('Location: index.php');
}
?>

<html>
    <head>
        <?php include'links.php'; ?>
        <title>CHELL'S FRUIT</title>
       
    </head>
    <body>
        
        <?php
        require_once 'config.php';
        
        $sql="SELECT * from product";
        $productArray = mysqli_query($link, $sql);
        $numOfRow = $link->affected_rows;   
        ?>
        <div style="margin-left: 10px;">
        <h2>All Products</h2>
        <div style="margin-bottom: 5px;">
            <a href="welcome_admin.php"><img src="pics/back_btn.png" style="width:1.5%;"></a>
        </div>
        
        <table class="table" style="width:80%">
            <thead>
                <tr><th style="width:10%">Product ID</th><th style="width:15%">Product Name</th><th style="width:15%">Category</th><th style="width:10%">Price(RM)</th><th style="width:30%">Image</th><th style="width: 10%">Best Seller</th><th style="width:10%">Action</th></tr>
            </thead>
            <tbody>   
          <?php
          $count =0;
            while ($row = $productArray->fetch_assoc()) {
                switch ($row['cat_id']) {
                    case "BE01":
                        $category = "Berries";
                        break;
                    case "SE01":
                        $category = "Seasonal fruit";
                        break;
                    case "ST01":
                        $category = "Stone fruit";
                        break;
                    case "TE01":
                        $category = "Tropical and exotic";
                        break;
                    default:
                        $category = "Others";
                        break;
                }
                
                echo "<tr>"
                    ."<td>{$row['productID']}</td>"
                    ."<td>{$row['productName']}</td>"
                    ."<td>{$category}</td>"
                    ."<td>",number_format((float)$row['price'],2,'.',''),"</td>"
                    ."<td><img src=\"./pics/products/{$row["productImage"]}\"></td>";
                    if($row['bestSell']){
                        echo "<td><img src=\"./pics/tick_ico.png\"></td>";
                    }else{
                        echo "<td></td>";
                    }
                        
                    
                    echo "<td><a href='editProduct.php?pID={$row['productID']}'><img src=\"./pics/edit_btn.png\"></a><a href='deleteProduct.php?pID={$row['productID']}'><img src=\"./pics/delete_btn.png\"></a><td></tr>";
                    $count++;
            }
            
            ?>
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="2"><strong>Total products:</strong></td>
                    <td colspan="5"><?php echo $count;?></td>
                </tr>
            </tfoot>
        </table>
        </div>
        
    </body>
</html>

