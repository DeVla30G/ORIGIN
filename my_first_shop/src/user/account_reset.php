<?php 
include_once("./includes/header.php");
include_once("./includes/my_connection.php");

if(isset($_POST['submit'])){

    $email = htmlspecialchars($_POST['email']); 

    $newpasswd = password_hash($_POST["newpasspwd"], PASSWORD_BCRYPT);
    $newpasswdRepeat = password_verify($_POST["newpasswdRepeat"], $newpasswd);


        $stmt = $connect->prepare("SELECT * FROM users WHERE email = :email ");
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->execute(); 
        $email_exist = $stmt->fetch(PDO::FETCH_ASSOC);

        if($email_exist == 0){
            echo "Invalid email address! Please type a valid email address!";
        }else{
            echo "Please enter your new password";

            if($newpasswd == $newpasswdRepeat) {

                $insertnew =$connect->prepare("UPDATE users SET password = :password WHERE email = :email");
    
                $stmt->bindValue(':password', $newpasswd, PDO::PARAM_STR);
                $stmt->execute();
                $insertNew->execute(array($newpasswd));

                $message = "You've successefuly update your password";
                

            }
            else {
                $message = "The passwords are differents !";
            }



        }
    
    
    }

?>

<section class="account_reset">
<label for="reset-form"><h3>Reset yout password</h3></label>
<form action="account_reset.php" method="POST" name="input-form">
<input type="email" id="email" name="email" placeholder="Email..." maxlength="30" required>
<br>
<input type="password" id="newpasswd" name="newpasswd" placeholder="New password..." minlength="6" maxlength="20" >
<br>
<input type="newpasswdRepeat" id="newpasswdR" name="new" placeholder="New password repeat..." minlenght="6" maxlength="20" >
<p class=error_message><?php if(isset($message)) {echo $message;}?></p>
<button type="submit" name="submit" >Continue</button>
</form>
</section>


<?php include_once("./includes/footer.php") ?>