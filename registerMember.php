<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="generator" content="Jekyll v4.0.1">
        <link rel="canonical" href="https://getbootstrap.com/docs/4.5/examples/starter-template/">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>  
    
        <link href="assets/css/bootstrap.css" rel="stylesheet">   
        <link href="assets/css/homepage.css" rel="stylesheet">    
        <link href="assets/css/registerform.css" rel="stylesheet">  
        <script src="assets/javascript/bootstrap.bundle.js"></script> 
        <style>#logu{visibility:hidden;}</style>
        <title>CHELL'S FRUIT</title> 
    </head>
    <body>
        <?php include 'header.php'; ?>
        <br><br><br>
        
        <form name="frmRegistration" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <div class="form-table">
        <div class="form-head">Register</div>
         
        <?php
        require_once "config.php";
 
        $fullname = $email = $password = $confirm_password = "";
        $email_err = $password_err = $confirm_password_err = "";

        if($_SERVER["REQUEST_METHOD"] == "POST"){

            if(empty(trim($_POST["userEmail"]))){
                $email_err = "Please enter a email.";
            } else{
                $sql = "SELECT member_id FROM member WHERE email = ?";

                if($stmt = mysqli_prepare($link, $sql)){
                    mysqli_stmt_bind_param($stmt, "s", $param_username);

                    $param_username = trim($_POST["userEmail"]);

                    if(mysqli_stmt_execute($stmt)){
                        mysqli_stmt_store_result($stmt);

                        if(mysqli_stmt_num_rows($stmt) == 1){
                            $email_err = "This email is already taken.";
                        } else{
                            $email = trim($_POST["userEmail"]);
                            $fullname = trim($_POST['fullname']);
                        }
                    } else{
                        echo "Oops! Something went wrong. Please try again later.";
                    }

                    mysqli_stmt_close($stmt);
                }
            }

            if(empty(trim($_POST["password"]))){
                $password_err = "Please enter a password.";     
            } elseif(strlen(trim($_POST["password"])) < 6){
                $password_err = "Password must have atleast 6 characters.";
            } else{
                $password = trim($_POST["password"]);
            }

            if(empty(trim($_POST["cpassword"]))){
                $confirm_password_err = "Please confirm password.";     
            } else{
                $confirm_password = trim($_POST["cpassword"]);
                if(empty($password_err) && ($password != $confirm_password)){
                    $confirm_password_err = "Password did not match.";
                }
            }

            if(empty($email_err) && empty($password_err) && empty($confirm_password_err)){

                $sql = "INSERT INTO member (full_name, email, password) VALUES ('$fullname', '$email', '$password')";
                
                if(mysqli_query($link, $sql)){
                    echo ' -Member account created';                    
                }
                else{
                    echo "";
                }
                
            }

            mysqli_close($link);
        }
        ?>       
        <div class="field-column">
            <label>Full Name</label>
                <div>
                    <input type="text" class="input-box" name="fullname" value="<?php if(!empty($_POST['fullname'])){echo $_POST['fullname'];}?>">
                </div>            
            </div>
            <div class="field-column">
                <label>Email</label>
                <div>
                    <input type="text" class="input-box" name="userEmail" placeholder="abcdefg@gmail.com" value="<?php if(!empty($_POST['userEmail'])){echo $_POST['userEmail'];}?>">
                </div>
                <?php if(!empty($email_err)){
                    echo $email_err;
                }?>
            </div>
            <div class="field-column">
                <label>Password</label>
                <div><input type="password" class="input-box" name="password" maxlength="14 "value=""></div>
                <?php if(!empty($password_err_err)){
                    echo $password_err_err;
                }?>
            </div>
            <div class="field-column">
                <label>Confirm Password</label>
                <div>
                    <input type="password" class="input-box" name="cpassword" maxlength="14 "value="">
                </div>
                <?php if(!empty($confirm_password_err)){
                    echo $confirm_password_err;
                }?>
            </div>            
            
            <div class="field-column">
                <div class="terms">
                    <input type="checkbox" name="terms"> I accept terms and conditions
                </div>
                <div>
                    <input type="submit"
                        name="register-member" value="Register"
                        class="btnRegister">
                </div>
            </div>
        </div>
    </form>            
        <br><br><br>
        <?php include 'footer.php'; ?>
    </body>
</html>
