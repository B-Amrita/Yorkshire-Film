<?php

if(isset($_POST['logout'])) {
    unset($_SESSION['User']);
    session_destroy();
    
header('Location: home.php');
}
