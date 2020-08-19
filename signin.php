<?php
session_start();
 
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
    header("location: index.php");
    exit;
}
 
require_once "config.php";
 
$email = $password = "";
$email_err = $password_err = "";
 
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    if(empty(trim($_POST["email"]))){
        $email_err = "Please enter email.";
    } else{
        $email = trim($_POST["email"]);
    }
    
    if(empty(trim($_POST["password"]))){
        $email_err = "Please enter your password.";
    } else{
        $password = trim($_POST["password"]);
    }
    
    if(empty($email_err) && empty($password_err)){
        $sql = "SELECT member_id, full_name, password FROM member WHERE email = ?";
        
        if($stmt = mysqli_prepare($link, $sql)){
            mysqli_stmt_bind_param($stmt, "s", $param_email);
            
            $param_email = $email;
            
            if(mysqli_stmt_execute($stmt)){
                mysqli_stmt_store_result($stmt);
                
                if(mysqli_stmt_num_rows($stmt) == 1){                    
                    mysqli_stmt_bind_result($stmt, $id, $name, $hashed_password);
                    if(mysqli_stmt_fetch($stmt)){
                        if(strcmp($password, $hashed_password) == 0){
                            session_start();
                            
                            $_SESSION["loggedin"] = true;
                            $_SESSION["member_id"] = $id;                           
                            $_SESSION["name"] = $name;
                            $ismember = true;
                            
                            header("location: index.php?member={$_SESSION['member_id']}&ismember={$ismember}");                          
                            exit;
                        }else{
                            $password_err = "The password you entered was not valid.";
                        }
                    }
                }else{
                    $email_err = "No account found with that email.";
                }
            }else{
                echo "Oops! Something went wrong. Please try again later.";
            }

            mysqli_stmt_close($stmt);
        }
    }
    
    mysqli_close($link);
}
?>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="generator" content="Jekyll v4.0.1">   
    <link rel="canonical" href="https://getbootstrap.com/docs/4.5/examples/sign-in/">    
    <link href="assets/css/bootstrap.css" rel="stylesheet">
    <link href="assets/css/signin.css" rel="stylesheet">

    <title>CHELL'S FRUIT</title>  
   
    
  </head>
  <body class="text-center">
    <form class="form-signin" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <a href="index.php"><img class="mb-4" src="pics/logo.jpeg" alt="" width="350" height="180"></a>
  <h1 class="h3 mb-3 font-weight-normal">Member sign in</h1>
  <label for="inputEmail" class="sr-only">Email address</label>
  <input type="email" name="email" id="inputEmail" class="form-control" placeholder="Email address" required autofocus>
  <label for="inputPassword" class="sr-only">Password</label>
  <input type="password" name="password" id="inputPassword" class="form-control" placeholder="Password" required>
  <div class="checkbox mb-3">
    <label>
      <input type="checkbox" value="remember-me"> Remember me
    </label>
  </div>
  <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
  
  <div class="mt-1">
      <div>Don't have an account? <a id="register" href="registerMember.php">Click Here</a></div>      
  </div>
  <p class="mt-4 mb-3 text-muted">&copy; 2018-2020</p>
</form>
</body>
</html>

