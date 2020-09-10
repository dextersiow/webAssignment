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
    </head>
    <body>
        <?php
        include 'header.php';
        $conn=new mysqli('localhost','root','','webassignment');
        $sql="select * from fruit_order where member_id={$_SESSION['member_id']}";
        $result=$conn->query($sql);
       
        ?>
        
        
        <?php
        include 'footer.php';
        ?>
    </body>
</html>
