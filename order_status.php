<?php
session_start();
if (!(isset($_SESSION['loggedin']) && $_SESSION["loggedin"] === true)) {
    header("location: signin.php?alert=2");
}
?>
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="generator" content="Jekyll v4.0.1">
        <link rel="canonical" href="https://getbootstrap.com/docs/4.5/examples/starter-template/">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>  

        <link href="assets/css/bootstrap.css" rel="stylesheet">   
        <link href="assets/css/homepage.css" rel="stylesheet">    
        <script src="assets/javascript/bootstrap.bundle.js"></script>
        <title>CHELL'S FRUIT</title>
        
        <style>
            .jumbotron{
                background-image: url("pics/product_banner2.jpg");
                background-repeat: no-repeat;
                background-size: cover;
                margin-bottom: 40px;
            }
            .table{
                font-size: 20px;
                border: solid orange;
            }
            thead{
                background: yellow;
            }
            th{
                color: orangered;
            }
            h1{
                font-size: 90px;
            }
        </style>
    </head>
    <body>
        <?php
        include 'header.php';
        $conn=new mysqli('localhost','root','','webassignment');
        $sql="select * from fruit_order where member_id={$_SESSION['member_id']}";
        $result=$conn->query($sql);        
        ?>
        <div class="jumbotron text-center">            
            <div class="container">
                <h1 class="font-italic">Order Status</h1>
            </div>
        </div>
        <div class="container">
            
            <table class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th>Order ID</th>
                        <th>Order Date</th>
                        <th>Order Amount</th>
                        <th>Payment Status</th>
                        <th>Delivery Status</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    while($row=$result->fetch_assoc()){
                        echo "<tr>"
                        ."<td>{$row['order_id']}</td>"
                        ."<td>{$row['order_date']}</td>"
                        ."<td>","RM ",number_format((float)$row['amount'],2,'.',''),"</td>"
                        ."<td>{$row['payment_status']}</td>"    
                        ."<td>{$row['delivery_status']}</td>"                        
                        ."</tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
        
        <?php
        include 'footer.php';
        ?>
    </body>
</html>
