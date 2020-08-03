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
  
        <title>CHELL'S FRUIT</title> 
    </head>
    <body>
        <?php include 'header.php'; ?>
        <br><br><br>
        
        <form name="frmRegistration" method="post" action="">
        <div class="form-table">
        <div class="form-head">Register</div>
            
                
        <div class="field-column">
            <label>Full Name</label>
                <div>
                    <input type="text" class="input-box" name="fullname" 
                        value="<?php if(isset($_POST['fullname'])) echo $_POST['fullname']; ?>">
                </div>
            </div>
            <div class="field-column">
                <label>Email</label>
                <div>
                    <input type="text" class="input-box" name="userEmail" placeholder="abcdefg@gmail.com"
                        value="<?php if(isset($_POST['userEmail'])) echo $_POST['userEmail']; ?>">
                </div>
            </div>
            <div class="field-column">
                <label>Password</label>
                <div><input type="password" class="input-box" name="password" maxlength="14 "value=""></div>
            </div>
            <div class="field-column">
                <label>Confirm Password</label>
                <div>
                    <input type="password" class="input-box" name="confirm_password" maxlength="14 "value="">
                </div>
            </div>            
            
            <div class="field-column">
                <div class="terms">
                    <input type="checkbox" name="terms"> I accept terms and conditions
                </div>
                <div>
                    <input type="submit"
                        name="register-user" value="Register"
                        class="btnRegister">
                </div>
            </div>
        </div>
    </form>            
        <br><br><br>
        <?php include 'footer.php'; ?>
    </body>
</html>
