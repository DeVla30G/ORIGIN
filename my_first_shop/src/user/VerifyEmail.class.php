<?php 
session_start();
$connect = new PDO("mysql:host=localhost;dbname=my_shop;port=3306","VlaSamAlex", "1234"); 
//  
if(isset($_POST['submit'])){

    $email = htmlspecialchars($_POST['email']);
    $password = ($_POST['password']);//$enter_password = entée html / $password = password hash in db

        $stmt = $connect->prepare("SELECT * FROM users WHERE email = :email ");
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->execute(); 
        $good_mail = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($good_mail != 0) {  

            $test = password_verify($password, $good_mail["password"]);

        if($test === true){
                    $message = "You're logged";
                            if($good_mail['admin'] == 0){
                                    $_SESSION["log_user"] = $good_mail["username"];
                                    header("location: index.php");
                                  
                            }else if ($good_mail['admin'] == 1){

                                    $_SESSION["log_admin"] = $good_mail["username"];

                                    echo $good_mail['username'];
                                    header("location: ./admin/panel.php");
                            }
                            
            } else { 
                $message = "Try again!" . PHP_EOL; }

    } else {
         
        $message = "We don't know you! Please sign up" . PHP_EOL;
    }
}


    
