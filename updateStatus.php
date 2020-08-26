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
        
        $orderID = $_REQUEST['oid'];
        if(isset($_POST['submit'])){
            $pStatus = $_POST['payment'];
            $dStatus = $_POST['delivery'];
           
            $sql2 = "UPDATE fruit_order SET payment_status='{$pStatus}',delivery_status='{$dStatus}' where order_id='{$orderID}'";
            if(mysqli_query($link, $sql2)){
                header("Location: view_orders.php");                   
            }
            else{
                $message = "Update failed, Please try again later";
                }
        }
        
        $sql = "SELECT * from fruit_order where order_id='{$orderID}'";
        $result = mysqli_query($link, $sql);
        $row=$result->fetch_assoc();
        extract($row);
     
        mysqli_close($link);    
        ?>       
        
        <div class="container" style="margin-left: 10px;">
            <form action='updateStatus.php?oid=<?php echo $orderID;?>' method='post' class="needs-validation" novalidate enctype="multipart/form-data">
            <h2>Edit product</h2>
            <div>
                <a href="view_orders.php"><img src="pics/back_btn.png" style="width:1.5%;"></a>
            </div>
            <table class="table table-borderless" width='50%'>  
                <tr>
                    <td><label for="orderID">Order ID:</label></td>
                    <td><input type="text" name="orderID" class="form-control" value="<?php echo $row['order_id'];?>" disabled></td>
                </tr>
                <tr>
                    <td><label for="Member ID">Member ID:</label></td>
                    <td><input type="text" name="memberID" class="form-control" value="<?php echo $row['member_id'];?>" disabled></td>
                </tr>  
                <tr>
                    <td><label for="date">Order Date:</label></td>
                    <td><input type="text" name="date" class="form-control" value="<?php echo $row['order_date'];?>" disabled></td>
                </tr> 
                <tr>
                    <td><label for="amount">Price:</label></td>
                    <td><input type="text" name="amount" class="form-control" value="<?php echo 'RM '.(number_format((float)$row['amount'],2,'.',''));?>" disabled></td>    
                </tr>            
           
                <tr>
                    <td><label for="payment">Payment Status:</label></td>
                <td>
                    <select name='payment' class="form-control" required="required">
                        <option <?php if(strcmp($row['payment_status'],"Pending")==0){echo'selected';}?> value='Pending'>Pending</option>
                        <option <?php if(strcmp($row['payment_status'],"Received")==0){echo'selected';}?> value='Received'>Received</option>
                        <option <?php if(strcmp($row['payment_status'],"Refunded")==0){echo'selected';}?> value='Refunded'>Refunded</option>
                </select>
                </td>
                <tr>
                    <td width='20%'><label for="delivery">Delivery Status:</label></td>
                <td width='30%'>
                    <select name='delivery' class="form-control" required="required">
                        <option <?php if(strcmp($row['delivery_status'],"Preparing")==0){echo'selected';}?> value='Preparing'>Preparing</option>
                        <option <?php if(strcmp($row['delivery_status'],"Delivering")==0){echo'selected';}?> value='Delivering'>Delivering</option>
                        <option <?php if(strcmp($row['delivery_status'],"Delivered")==0){echo'selected';}?> value='Delivered'>Delivered</option>
                        <option <?php if(strcmp($row['delivery_status'],"Cancelled")==0){echo'selected';}?> value='Cancelled'>Cancelled</option>
                </select>
                </td>
                <td width='50%'></td>
                </tr>            
                                  
                </table>
            
            <?php if(!empty($message)){
                echo'<p>'.$message.'</p>';                             
            }
                ?>
            <input type="submit" name="submit" class="btn btn-primary">
            <input type="button" name="cancel" value="Cancel" class="btn btn-danger" onclick="window.location.href='view_orders.php'">
            
         </form>
        </div>
        
    </body>
    
</html>
