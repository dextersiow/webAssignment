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
        
        <style>
            #addForm{
                display:block;
                margin: auto;
            }            
        </style>
    </head>
    <body>
        <?php
        require_once 'config.php';
                
        if(isset($_POST['submit'])){
            $username = $_POST['userName'];
            $password = $_POST['password'];
            $cpassword = $_POST['cPassword'];
            
            if(strcmp($password,$cpassword) !=0){
                $err_message = "Password not match";                
            }
            else{
                $sql = "SELECT username FROM admin WHERE username = ?";

                if($stmt = mysqli_prepare($link, $sql)){
                    mysqli_stmt_bind_param($stmt, "s", $param_username);

                    $param_username = trim($_POST["userName"]);

                    if(mysqli_stmt_execute($stmt)){
                        mysqli_stmt_store_result($stmt);

                        if(mysqli_stmt_num_rows($stmt) == 1){
                            $err_message = "This username is already taken";
                        } else{
                            $username = trim($_POST["userName"]);
                        }
                    }
                }
                      
            }
            if(empty($err_message)){
                $sql = "INSERT INTO admin (username, password) VALUES ('$username','$password')";
                if(mysqli_query($link, $sql)){
                    $message="Admin added sucessful";
                }
                else{
                    $message="Admin could not be added, Please try again later";
                }
            }
        }
     
        mysqli_close($link);    
        ?>
        
        <div class="container" style="margin-left: 10px;">
            <form action='addAdmin.php' method='post' class="needs-validation" novalidate id="addForm" enctype="multipart/form-data">
            <h2>Add admin</h2>
            <div>
                <a href="welcome_admin.php"><img src="pics/back_btn.png" style="width:1.5%;"></a>
            </div>
            <table class="table table-borderless">                
                    <tr>
                        <td><label for="userName">Username:</label></td>
                        <td><input type="text" name="userName" class="form-control" required></td>
                    </tr>    
                    <tr>
                        <td><label for="password">Password:</label></td>
                        <td><input type="password" name="password" class="form-control" required></td>
                    </tr> 
                    <tr>
                        <td><label for="cPassword">Confirm password:</label></td>
                        <td><input type="password" name="cPassword" class="form-control" required></td>
                    </tr> 
                </table>
            <?php if(!empty($message)){
                echo'<p>'.$message.'</p>';                             
            }
            if(!empty($err_message)){
                echo'<p>'.$err_message.'</p>';                             
            }
                ?>
            <input type="submit" name="submit" class="btn btn-primary">
            <input type="reset" name="reset" class="btn btn-danger" onclick="location.reload();">
            
         </form>
        </div>
        
    </body>
    
</html>
