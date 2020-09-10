<?php 
session_start();
if (empty($_SESSION['loggedin'])){
    header('Location: index.php');
}
?>

<html>
    <head>
        <?php include'links.php'; ?>
        <title>CHELL'S FRUIT</title>
       
    </head>
    <body>
        
        <?php
        require_once 'config.php';
        
        $sql="SELECT * from member";
        $memberArray = mysqli_query($link, $sql);
        $numOfRow = $link->affected_rows;   
        ?>
        <div style="margin-left: 10px;">
        <h2>All members</h2>
        <div style="margin-bottom: 5px;">
            <a href="welcome_admin.php"><img src="pics/back_btn.png" style="width:1.5%;"></a>
        </div>
        
        <table class="table" style="width:80%">
            <thead>
                <tr><th width="20%">Member ID</th><th width="20%">Full Name</th><th width="20%">Email</th><th width="10%">Action</th></tr>
            </thead>
            <tbody>
            
          <?php
          $count =0;
            while ($row = $memberArray->fetch_assoc()) {
                
                echo "<tr>"
                    ."<td>{$row['member_id']}</td>"
                    ."<td>{$row['full_name']}</td>"
                    ."<td>{$row['email']}</td>"
                    ."<td>"
                    ."<a href='delete_member.php?mid={$row['member_id']}'><img id='close-image' src=\"./pics/delete_btn.png\"></td></tr>";
                    $count++;
            }
            
            ?>

            </tbody>
            <tfoot>
                <tr>
                    <td><strong>Total members:</strong></td>
                    <td colspan="3"><?php echo $count;?></td>
                </tr>
            </tfoot>
        </table>
        </div>
        
        
    </body>
</html>

