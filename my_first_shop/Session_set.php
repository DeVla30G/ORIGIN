<?php  

    if(isset($_POST)){
    $email = $_POST["email"];

    $rq = "SELECT username = :username admin = :admin FROM users WHERE email = :email ";
    $stmt = $connect->prepare($rq);

    $stmt->bindParam(':username', 'name', PDO::PARAM_STR);
    $stmt->bindParam(':admin', 'admin', PDO::PARAM_BOOL);
    $stmt->execute(); 
    $checkAdmin = $stmt->fetch(PDO::FETCH_ASSOC);
}
            if(!$checkAdmin){
                echo "error";
            }else{
            if($checkAdmin['admin'] === 0){
                    echo $_SESSION["log_user"];
                    echo "I'm an user !";
            }else if ($checkAdmin['admin'] === 1){
                    echo $_SESSION["log_admin"];
                    echo "I'm a boss !";
                    echo $checkAdmin['username'];
            }
   }


          /*  if($good_mail["admin"] === 0){
                        
            $_SESSION['log_user'] = $good_mail["username"];
            echo $_SESSION["username"];
            

        }else if($good_mail["admin"] === 1){

            $_SESSION["log_admin"] = $good_mail["username"];
            echo $_SESSION["username"];
            echo "<li><a href='.admin/panel.php'>Admin panel</a></li>";
            echo "<li><a href='logout.php'>Log out</a></li>";

        }
}



/*if(isset($_SESSION["log_user"])){
    echo "<li><a href='./includes/logout.php'>Log out</a></li>";
    echo "<li><a href='useraccount.php'>Your account</a></li>";
}else if(isset($_SESSION["admin"])){
    echo "<li><a href='.admin/panel.php'>Admin panel</a></li>";
    echo "<li><a href='logout.php'>Log out</a></li>";
}else{
    echo "<li><a href='signin.php'>Login</a></li>";
}*/