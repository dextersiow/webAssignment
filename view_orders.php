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
        $sql="SELECT * from fruit_order";
        $orderArray = mysqli_query($link, $sql);
        $numOfRow = $link->affected_rows; 
        ?>
        
        <div style="margin-left: 10px;">
        <h2>Current orders</h2>
        <div style="margin-bottom: 5px;">
            <a href="welcome_admin.php"><img src="pics/back_btn.png" style="width:1.5%;"></a>
        </div>
        
        <div style="margin-top:30px">
            <form method="post" action="view_orders.php">
            <table>
                <tr>
                    <td>
                        <label for="startDate">Start Date:</label>
                        <input type='text' class="datepicker" name="startDate" placeholder="YYYY-MM-DD" required pattern="(0-9){4}-(0-9){2}-(0-9){2)" maxlength="10"/>
                    </td>
                    <td>
                        <label for="endDate">End Date:</label>
                        <input type='text' class="datepicker" name="endDate" placeholder="YYYY-MM-DD" required pattern="(0-9){4}-(0-9){2}-(0-9){2)" maxlength="10"/>
                    </td> 
                    <td>
                        <label></label>
                        <input type='submit' name="submit">
                    </td>
                </tr>
            </table>
            </form>
            <a href="view_orders.php">Show all</a>
        </div>
       
        <table id="orderTable" class="table" style="width:80%">
            <thead>
                <tr><th>Order ID</th><th>Member ID</th><th>Order Date</th><th>Order Amount</th><th>Payment Status</th><th>Delivery Status</th><th width='15%'>Action</th></tr>
            </thead>
            <tbody id="mytable">   
          <?php
          $count=0;
            ob_start();
            while ($row = $orderArray->fetch_assoc()) {
                
                echo "<tr>"
                    ."<td>{$row['order_id']}</td>"
                    ."<td>{$row['member_id']}</td>"
                    ."<td>{$row['order_date']}</td>"
                    ."<td>","RM ",number_format((float)$row['amount'],2,'.',''),"</td>"
                    ."<td>{$row['payment_status']}</td>"    
                    ."<td>{$row['delivery_status']}</td>"                        
                    ."<td><a href='updateStatus.php?oid={$row['order_id']}'><img src=\"./pics/edit_btn.png\" width='15px' height='15px'><a><a href='view_orderDetails.php?oid={$row['order_id']}'><img src=\"./pics/view_btn.png\" width='15px' height='15px'><a></td></tr>";
                $count++;    
            } 
            
            if(isset($_POST['submit'])){
                $count = 0;
                ob_end_clean();
                
                $startDate = $_POST['startDate'];
                $endDate = $_POST['endDate'];                
                $sql="SELECT * from fruit_order WHERE order_date BETWEEN '{$startDate}' AND '{$endDate}';";
                $orderArray = mysqli_query($link, $sql);
                $numOfRow = $link->affected_rows; 
                while ($row = $orderArray->fetch_assoc()) {                
                    echo "<tr>"
                        ."<td>{$row['order_id']}</td>"
                        ."<td>{$row['member_id']}</td>"
                        ."<td>{$row['order_date']}</td>"
                        ."<td>","RM ",number_format((float)$row['amount'],2,'.',''),"</td>"
                        ."<td>{$row['payment_status']}</td>"    
                        ."<td>{$row['delivery_status']}</td>"                        
                        ."<td><a href='updateStatus.php?oid={$row['order_id']}'><img src=\"./pics/edit_btn.png\" width='15px' height='15px'><a><a href='view_orderDetails.php?oid={$row['order_id']}'><img src=\"./pics/view_btn.png\" width='10px' height='10px'><a></td></tr>";
                    $count++;    
                    }
                }
            
          
            ?>
            </tbody>
            <tfoot>
                <tr>
                    <td><strong>Total orders:</strong></td>
                    <td colspan="6"><?php echo $count;?></td>
                </tr>
            </tfoot>
            </table>
        </div>
        <?php
        mysqli_close($link); 
        ?>
    </body>
</html>
