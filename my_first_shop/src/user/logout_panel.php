<?php 
// session securised, log out if 15 non activity !!

if (isset($_SESSION["log_user"]) && (time() - $_SESSION["log_user"] > 120)){
    session_unset($_SESSION["log_user"]);
    session_destroy($_SESSION["log_user"]);
}