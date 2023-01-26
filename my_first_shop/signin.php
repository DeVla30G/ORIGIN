<?php 
include_once("./includes/header.php"); 
include_once("VerifyEmail.class.php");
include_once("./includes/cookies.php");

?>

    <section class="signin">
        <label for="login-form"><h3>Login</h3></label>
        <form action="VerifyEmail.class.php" method="POST" name="input-form">
        <input type="email" id="email" name="email" placeholder="Email..." maxlength="30" required>
        <br>
        <input type="password" id="password" name="password" placeholder="Password..." minlength="6" maxlength="20" required>
        <br>
        <p></p>
        <button type="submit" name="submit" >Continue</button>
        <br>
        <p><a href="account_reset.php">Forbidden username account?</a></p>
        <button type="submit" name="signup"><a href="signup.php">New User</a></button>
        <p class="error_message"><?php if(isset($message)){ echo $message;}  ?></p>
        <br>
        <p>Or continue with:</p>
        <button type="text" name="google_log" ><a href="https://accounts.google.com/signin/recovery"><img src="./images/google-icon.png"></a></button> <!-- not active button needs google library -->
        </form>
    </section>
    

<?php 
include_once("./includes/footer.php");
?>