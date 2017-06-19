<?php
session_start();
include './header.php';
?>
    <div class="container">
        <?php echo"<h3>".$_SESSION['message']."</h3>";?>
    </div>
