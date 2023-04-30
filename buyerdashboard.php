<?php 
    if (isset($_SESSION['username'])) {
            header('Location: buyer-login.php');
            exit();
        }

?>