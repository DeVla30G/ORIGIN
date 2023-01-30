<?php 
// session securised, log out if 15 non activity !!

if (isset($_SESSION["log_user"])) {
echo $_SESSION["log_user"];

if (time() - $_SESSION["login-time"] >= 1200){
 
    session_destroy();
    header("Location: signin.php");
    die(); 
}
}
?>