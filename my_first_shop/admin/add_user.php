<?php 
session_start();


if($_POST){
    if(isset($_POST['username']) && isset($_POST['password']) && isset($_POST['email']) && isset($_POST['admin']) && !empty($_POST['username']) && !empty($_POST['password']) && !empty($_POST['email']) && !empty($_POST['admin'])){
            $username = htmlspecialchars($_POST['username']);
            $password = htmlspecialchars($_POST['password']);
            $email = htmlspecialchars($_POST['email']);
            $admin = htmlspecialchars($_POST['admin']);

            include_once('../includes/my_connection.php');

            $sql = "INSERT INTO users (username, password, email, admin) VALUES (:username, :password, :email, :admin)";

            $rq = $connect->prepare($sql);

            $rq->bindValue(':username', $username, PDO::PARAM_STR);
            $rq->bindValue(':password', $password, PDO::PARAM_STR);
            $rq->bindValue(':email', $email, PDO::PARAM_STR);
            $rq->bindValue(':admin', $admin, PDO::PARAM_INT);

            $rq->execute();
           
            echo "new user added !";
            require_once("close.php");
            header('Location: users.php');
           
        }
    else {

            echo " incomplete data";

    }
}




?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>ADD USER</title>
    <link type="text/css" rel="stylesheet" href="style_admin.css" />


</head>
<body>
    <main class="container">
      <div class="row">

      <a href="users.php" class="btn btn-secondary">< Previous page</a>
      <a href="panel.php" class="btn btn-dark">Admin panel</a>
      <a href="../index.php"class="btn btn-warning">Shop</a>
        <section class="col-12">

       <h2 class="text-center">New user</h2>
        <form action="" method="post">

           <div class="form-group">
                <label for="username">username</label>
                <input type="text" name="username" id="username" class="form-control">
            </div>
            <div class="form-group">
                <label for="password">password</label>
                <input type="text" name="password" id="password" class="form-control">
            </div>
            <div class="form-group">
                <label for="email">email</label>
                <input type="text" name="email" id="email" class="form-control">
            </div>
            <div class="form-group">
               
                <label for="admin">Admin status</label>    
            <select class="admin">
            <option>1- Admin</option>
            <option>0- User</option>
            </select>
            </div>

            <button type="submit" class="btn btn-primary">Save</button>

            

        </form>
    
    </section>
    </div>
    </main>
 </body>
</html>



