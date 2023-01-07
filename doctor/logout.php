<?php
session_start();
if(isset($_SESSION['id'])){
session_destroy();
header("Location:/doctor/login.php" );
}
else{
    header("Location:/doctor/login.php " );
}
?>