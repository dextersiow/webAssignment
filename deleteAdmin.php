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
        if(isset($_POST['submit'])){
            $adminID=$_POST['adminID'];            
            $sql = "DELETE FROM admin WHERE admin_id={$adminID}";
           
            
            if(mysqli_query($link,$sql)){ 
                echo "<script>alert('Admin deleted successful');</script>";                
            }
            else{
                $message = "Unable to delete, Please try again";                
            } 
        }
        mysqli_close($link);  

        ?>       
        
        <div class="container" style="margin-left: 10px;">
            <form action='deleteAdmin.php' method='post' class="needs-validation" novalidate enctype="multipart/form-data">
            <h2>Delete admin</h2>
            <div>
                <a href="welcome_admin.php"><img src="pics/back_btn.png" style="width:1.5%;"></a>
            </div>
            <table class="table table-borderless">  
                <tr>
                    <td><label for="adminID">Admin ID:</label></td>
                    <td><input type="text" name="adminID" class="form-control"></td>
                </tr>                
            </table>
            
            <?php 
            if(!empty($message)){
                echo'<p>'.$message.'</p>';                             
            }
            ?>
            
            <p>Are you sure you want to delete this admin?</p>'
            <input type="submit" name="submit" value="Confirm" class="btn btn-primary">';                      
            <input type="button" name="no" value="Cancel" class="btn btn-danger" onclick="window.location.href='welcome_admin.php'">
         </form>
        </div>
        
    </body>
    
</html>
