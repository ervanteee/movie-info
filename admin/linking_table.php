<?php 
ini_set('display_errors', 0);

session_start();
if($_SESSION['admin'] == false){
    header('Location: ../index/main.php');
    exit();
}
?>   
           
           <div class="m-3">
                <a href="admin_table.php">
                    <button class="btn btn-danger me-2" href="admin_table">USERS</button>
                </a> 
                <a href="admin_comment.php">
                    <button class="btn btn-danger me-2" href="admin_table">COMMENTS</button>
                </a> 
                <a href="../index/main.php">
                    <button class="btn btn-danger me-   2" href="admin_table">HOME</button>
                </a> 
            </div>