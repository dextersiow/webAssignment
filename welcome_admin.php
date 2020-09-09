<?php
session_start();
 
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: admin_login.php");
    exit;
}
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Welcome</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <style type="text/css">
        body{ 
            font: 14px sans-serif; 
            text-align: center;           
        }
    </style>
</head>
<body>
    <div class="page-header">
        <h1>Hi, <b><?php echo strtoupper($_SESSION['username']); ?></b>. Welcome back.</h1>
    </div>
    <div class="text-left" style="margin-left: 20px;"> 
    <h5>Admin ID: <?php echo htmlspecialchars($_SESSION["admin_id"]);?></h5>
    <h5>Date Time: <?php echo date("d-m-Y H:i");?> </h5>
    </div>
    
      
    <div class="list-group" style="width: 30%; margin: 50px auto 10px auto;">
        <h4 class="list-group-item" style="background-color:#DFE0E2;">Menu action</h4>  
        <a href="manageProduct.php" class="list-group-item list-group-item-action">Manage product</a>     
        <a href="addProduct.php" class="list-group-item list-group-item-action">Add product</a>
        <a href="view_orders.php" class="list-group-item list-group-item-action">View orders</a>
        <a href="manage_members.php" class="list-group-item list-group-item-action">Manage members</a> 
        
        <?php if(strcmp($_SESSION['admin_id'], "1000") == 0){
                    echo '<a href="addAdmin.php" class="list-group-item list-group-item-action">Add admin</a>'
            . '           <a href="deleteAdmin.php" class="list-group-item list-group-item-action">Delete admin</a>';
        }
?>
    </div>
    <p><a href="admin_logout.php" class="btn btn-danger">Log out</a></p>
</body>
</html>
