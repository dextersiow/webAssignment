<?php 
session_start();
if(empty($_SESSION['loggedin'])){
    header('Location: index.php');
}

if(isset($_POST['submit'])){
    
    $pstatus = $_POST['paymentDropdown'];
    $dstatus = $_POST['deliveryDropdown'];
    
    require_once 'config.php';

    $sql="UPDATE fruit_order SET paymentStatus='{$pstatus}', deliveryStatus='{$dstatus} WHERE order_id={$row['order_id']}";
    if(mysqli_query($link, $sql)){
        header("Refresh:0");
    }
    else{
        $message = "Error";
        echo "<script type='text/javascript'>alert('$message');</script>";
    }

}
?>
<html>
    <head>
        <?php include'links.php'; ?>
        <title>CHELL'S FRUIT</title>   
        <script>
            $(document).ready(function(){
                // everything here will be executed once index.html has finished loading, so at the start when the user is yet to do anything.
                $("#payment").change(load_new_content()); //this translates to: "when the element with id='select1' changes its value execute load_new_content() function"
            });
            function load_new_content(){
                var selected_option_value=$("#payment option:selected").val(); //get the value of the current selected option.

                $.post("updateStatus.php", {option_value: selected_option_value},
                function(data){ //this will be executed once the `script_that_receives_value.php` ends its execution, `data` contains everything said script echoed.
                    $("#place_where_you_want_the_new_html").html(data);
                    alert(data); //just to see what it returns
                    }
                );
            } 
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
        <table class="table" style="width:80%">
            <thead>
                <tr><th>Order ID</th><th>Member ID</th><th>Order Date</th><th>Order Amount</th><th>Payment Status</th><th>Delivery Status</th><th>Action</th></tr>
            </thead>
            <tbody>   
          <?php
          
            while ($row = $orderArray->fetch_assoc()) {
                
                echo "<tr>"
                    ."<td>{$row['order_id']}</td>"
                    ."<td>{$row['member_id']}</td>"
                    ."<td>{$row['order_date']}</td>"
                    ."<td>","RM ",number_format((float)$row['amount'],2,'.',''),"</td>"
                    ."<td>"
                        ."<select name='payment' id='payment' class='form-control' onchange='load_new_content()'>"
                            .'<option value="Pending" '.(($row['payment_status']=='Pending')?'selected':"").'>Pending</option>'
                            .'<option value="Received" '.(($row['payment_status']=='Received')?'selected':"").'>Received</option>'
                            .'<option value="Refunded" '.(($row['payment_status']=='Refunded')?'selected':"").'>Refunded</option>'
                        ."</select></td>"    
                    ."<td>"
                        ."<select name='delivery' id='delivery' class='form-control' onchange='load_new_content()'>"
                            .'<option value="Preparing" '.(($row['delivery_status']=='Preparing')?'selected':"").'>Preparing</option>'
                            .'<option value="Delivering" '.(($row['delivery_status']=='Delivering')?'selected':"").'>Delivering</option>'
                            .'<option value="Delivered" '.(($row['delivery_status']=='Delivered')?'selected':"").'>Delivered</option>'
                            .'<option value="Cancelled" '.(($row['delivery_status']=='Cancelled')?'selected':"").'>Cancelled</option>'
                        ."</select></td>"
                    ."<td><a href=updateStatus?ps={$row['payment_status']}&&ds={$row['delivery_status']}.php><img src='./pics/save_btn.ico' width='10px' height='10px'><a></td></tr>";
                    
            }
            
            ?>
            </tbody></table>
        </div>
        <?php
        mysqli_close($link); 
        ?>
    </body>
</html>
