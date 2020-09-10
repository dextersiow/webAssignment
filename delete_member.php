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
        $mID = $_REQUEST['mid'];
        $sql = "SELECT * from member where member_id='{$mID}'";
        $result = mysqli_query($link, $sql);
        $row=$result->fetch_assoc();
        extract($row);
        
        if(isset($_POST['submit'])){
            $sql= "SET foreign_key_checks = 0";
            mysqli_query($link, $sql);
            
            $sql = "DELETE FROM member where member_id='{$mID}'";
            if(mysqli_query($link, $sql)){
                $message = "Delete successful";                
            }
            else{
                $message = "Delete failed, Please try again later";                
            }  
            $sql= "SET foreign_key_checks = 1";
            mysqli_query($link, $sql);
        } 
        mysqli_close($link);  
        ?>       
        
        <div class="container" style="margin-left: 10px;">
            <form action='delete_member.php?mid=<?php echo $mID;?>' method='post' class="needs-validation" novalidate enctype="multipart/form-data">
            <h2>Delete member</h2>
            <div>
                <a href="manageMembers.php"><img src="pics/back_btn.png" style="width:1.5%;"></a>
            </div>
            <table class="table table-borderless">  
                <tr>
                    <td width="30%"><label for="mID">Member ID:</label></td>
                    <td width="70%"><input type="type" name="mID" class="form-control" value="<?php echo $row['member_id'];?>" disabled></td>
                </tr>
                    <tr>
                        <td><label for="fullName">Full Name:</label></td>
                        <td><input type="text" name="fullName" class="form-control" value="<?php echo $row['full_name'];?>" disabled></td>
                    </tr> 
                <tr>
                    <td><label for="email">Email:</label></td>
                    <td><input type="text" name="email" class="form-control" value="<?php echo $row['email'];?>" disabled></td>
                </tr>            
                                    
                </table>
            
            <?php if(!empty($message)){
                echo'<p>'.$message.'</p>';                             
            }
                ?>
            <p>Are you sure you want to delete this member?</p>
            <input type="submit" name="submit" value="Confirm" class="btn btn-primary">
            <input type="button" name="no" value="Cancel" class="btn btn-danger" onclick="window.location.href='manageMembers.php'">
            
         </form>
        </div>
        
    </body>
    
</html>
