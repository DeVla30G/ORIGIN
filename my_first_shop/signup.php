<?php

include_once('./includes/header.php');
include_once('./includes/my_connection.php');


if(isset($_POST["submit"])) {

    $name = htmlspecialchars($_POST["name"]);
    $email = htmlspecialchars($_POST["email"]);
    $emailRepeat = htmlspecialchars($_POST["emailrepeat"]);
    $pwd = password_hash($_POST["pwd"], PASSWORD_BCRYPT);
    $pwdRepeat = password_verify($_POST["pwdrepeat"], $pwd);

    if(!empty($_POST["name"]) AND !empty($_POST["email"]) AND !empty($_POST["emailrepeat"]) AND !empty($_POST["pwd"]) AND !empty($_POST["pwdrepeat"])) {
        
        $namelenght = strlen($name);
        if($namelenght <= 25) {

            $reqname = $connect->prepare("SELECT * FROM users WHERE username = ?");
            $reqname->execute(array($name));
            $nameexist = $reqname->rowCount();
            if($nameexist == 0) {

                $emaillenght = strlen($email);
                if($emaillenght <= 30) {

                    if($email == $emailRepeat) {

                        if(filter_var($email, FILTER_VALIDATE_EMAIL)){

                            $reqmail = $connect->prepare("SELECT * FROM users WHERE email = ?");
                            $reqmail->execute(array($email));
                            $emailexist = $reqmail->rowCount();
                            if($emailexist == 0) {

                                if($pwd == $pwdRepeat) {

                                    $insertmbr =$connect->prepare("INSERT INTO users(username, password, email, admin) VALUES(?, ?, ?, ?)");
                                    $insertmbr->execute(array($name, $pwd, $email, 0));
                                    $error = "Your account has been created ! <a href='./signin.php'>Login</a>";
                                    

                                }
                                else {
                                    $error = "The passwords are differents !";
                                }
                            
                            }
                            else{
                                $error = "Email already exist !";
                            }

                        }
                        else {
                            $error = "Invalid email !";
                        }
                    }
                    else {
                        $error = "The emails are differents !";
                    }
        

                }
                else {
                    $error = "Your email must not exceed 30 characters !";
                }
            }   
            else{
                $error = "Name already exist !";
            }

        }
        else {
            $error = "Your name must not exceed 25 characters.";
        }   
        
        
                
       
    }
    else{
        $error = "All fields must be completed !";

    }
    
 

}


?>




    <body>
        <section class="signup_form">
            <div class="signup_form_form">
                <h2 class = signup_title>Sign Up</h2>
                <form class = signup_table method="post" action="">
                    <table >
                        <tr>
                            <td class=table_right>
                                <label for="nom">Name : </label>
                            </td>
                            <td class=table_left>
                                <input type="text" placeholder="4 to 25 chars" id="name" name="name" minlength="4" maxlength="25" value="<?php if(isset($name)){echo $name;} ?>" />
                            </td>
                        </tr>
                        <tr>               
                            <td class=table_right>
                                <label for="mail">Email : </label>
                            </td>
                            <td>
                                <input type="email" placeholder="30 chars max" id="email" name="email" maxlength="30" value="<?php if(isset($email)){echo $email;} ?>"/>
                            </td>
                        </tr>
                        <tr>                
                            <td class=table_right>
                                <label for="mail2">Email Confirmation :</label>
                            </td>
                            <td>
                                <input type="email" placeholder="Repeat Email..." id="emailrepeat" name="emailrepeat" maxlength="30" value="<?php if(isset($emailRepeat)){echo $emailRepeat;} ?>"/>
                            </td>
                        </tr>
                        <tr>
                            <td class=table_right>
                                <label for="pwd">Password :</label>
                            </td>
                            <td>
                                <input type="password" placeholder="6 to 20 chars" id="pwd" name="pwd" minlength="6" maxlength="20" />
                            </td>
                        </tr>
                        <tr>                
                            <td class=table_right>
                                <label for="pwd2">Cofirmation Password :</label>
                            </td>
                            <td>
                                <input type="password" placeholder="Repeat Password..." id="pwdrepeat" name="pwdrepeat" />
                            </td>
                        </tr>
                    </table>
                    <p class=error_msg><?php if(isset($error)) {echo $error;}?></p>
                    <button class = button_signup type="submit" name="submit">Sign Up</button>
                </form>
                
            </div>
        </section>
    
    </body>
</html>

<?php include_once("./includes/footer.php") ?>
