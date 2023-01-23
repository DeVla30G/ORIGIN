<?php 


if (isset($_SESSION["log_admin"]) && (time() - $_SESSION["log_admin"] > 120)){

    session_unset($_SESSION["log_admin"]);

    session_destroy($_SESSION["log_admin"]);

}


?>