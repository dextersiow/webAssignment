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
        
    </head>
    <body>
        <?php
        require_once 'config.php';
        $sql="SELECT * from fruit_order";
        $orderArray = mysqli_query($link, $sql);
        $numOfRow = $link->affected_rows; 
        ?>
        
        <div style="margin-left: 10px;">
        <h2>Current orders</h2>
        <div style="margin-bottom: 5px;">
            <a href="welcome_admin.php"><img src="pics/back_btn.png" style="width:1.5%;"></a>
        </div>        
        <table class="table" style="width:80%">
            <thead>
                <tr><th>Order ID</th><th>Member ID</th><th>Order Date</th><th>Order Amount</th><th>Payment Status</th><th>Delivery Status</th><th width='15%'>Action</th></tr>
            </thead>
            <tbody>   
          <?php
          
            while ($row = $orderArray->fetch_assoc()) {
                
                echo "<tr>"
                    ."<td>{$row['order_id']}</td>"
                    ."<td>{$row['member_id']}</td>"
                    ."<td>{$row['order_date']}</td>"
                    ."<td>","RM ",number_format((float)$row['amount'],2,'.',''),"</td>"
                    ."<td>{$row['payment_status']}</td>"    
                    ."<td>{$row['delivery_status']}</td>"                        
                    ."<td><a href='updateStatus.php?oid={$row['order_id']}'><img src=\"./pics/edit_btn.png\" width='15px' height='15px'><a></td></tr>";
            }            
            ?>
            </tbody></table>
        </div>
        <?php
        mysqli_close($link); 
        ?>
    </body>
</html>
