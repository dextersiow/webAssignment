<?php 
session_start();
if(empty($_SESSION['loggedin'])){
    header('Location: index.php');
}

?>
<html>
    <head>
        <?php include'links.php'; ?>
        <title>CHELL'S FRUIT</title>   
        <script>
                     
        </script>
            
    </head>
    <body>
        <?php        
        require_once 'config.php';
        $orderId = $_REQUEST['oid'];
        $sql="SELECT * from order_details where order_id ={$orderId}";
        $listArray = mysqli_query($link, $sql);
        $numOfRow = $link->affected_rows; 
     
        
        ?>
        
        <div style="margin-left: 10px;">
        <h2>Order details</h2>
        <div style="margin-bottom: 5px;">
            <a href="view_orders.php"><img src="pics/back_btn.png" style="width:1.5%;"></a>
        </div>
        
        <table id="orderTable" class="table" style="width:80%">
            <thead>
                <tr><th>Order ID</th><th>Product ID</th><th>Quantity</th></tr>
                
            </thead>
            <tbody>   
                <?php
                $count =0;
                while ($row = $listArray->fetch_assoc()) {
                    echo "<tr>";
                    if($count==0){
                        echo "<td>{$row['order_id']}</td>";
                    }
                    else{
                        echo "<td></td>";
                    }
                echo "<td>{$row['productID']}</td>"
                    ."<td>{$row['quantity']}</td></tr>";
                    $count += $row['quantity'];
                }
                  ?>   
                
            </tbody>
            <tfoot>
                <tr>
                    <td><strong>Total items:</strong></td>
                    <td></td>
                    <td><?php echo $count;?></td>
                </tr>
            </tfoot>
        </table>
        </div>
        <?php mysqli_close($link); ?>
    </body>
</html>
