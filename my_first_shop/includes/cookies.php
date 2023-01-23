<?php


if (!empty($_COOKIE['log_user'])){
    $nom = $_COOKIE["log_user"];

if(isset($_POST['submit'])){
    setcookie("log_user", "user", ['expires' => time() - 24*3600,   // 86400 = 1 day cookie s'autodetruit après 1 journée / valide sur tt le site
    'secure' => true, 
    'httponly' => true, 
    'domain' => "/"] ); 
    $nom = $_POST["email"];
  }
}   
                
  if(isset($_SESSION["log_user"])) {
        setcookie("log_user", "user", ['expires' => time() - 24*3600,   // 86400 = 1 day cookie s'autodetruit après 1 journée / valide sur tt le site
                                    'secure' => true, 
                                    'httponly' => true, 
                                    'domain' => "/"] );
            }else if(isset($_SESSION["log_admin"])){

        setcookie("log_admin", "admin", ['expires' => time() - 24*3600,  
                                        'secure' => true, 
                                        'httponly' => true, 
                                        'domain' => "/"] ); 
                }
            