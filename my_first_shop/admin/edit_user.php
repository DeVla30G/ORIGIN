<?php 
session_start();
include_once('../includes/my_connection.php');



if(isset($_POST)){
    if(!empty($_POST['id']) && !empty($_POST['username']) && !empty($_POST['password']) && !empty($_POST['email']) && !empty($_POST['admin']) && isset($_POST['id']) && isset($_POST['username']) && isset($_POST['password'])  && isset($_POST['email'])  && isset($_POST['admin']) ){
        $id = htmlspecialchars($_POST['id']);
        $password = htmlspecialchars($_POST['password']);
        $email = htmlspecialchars($_POST['email']);
        $admin = htmlspecialchars($_POST['admin']);
        $username = htmlspecialchars($_POST['username']);

        $sql = "UPDATE users SET username=:username, password=:password, email=:email, admin=:admin WHERE id=:id";

        $rq = $connect->prepare($sql);

        $rq->bindValue(':username', $username, PDO::PARAM_STR);
        $rq->bindValue(':password', $password, PDO::PARAM_STR);
        $rq->bindValue(':email', $email, PDO::PARAM_STR);
        $rq->bindValue(':admin', $admin, PDO::PARAM_INT);
        $rq->bindValue(':id', $id, PDO::PARAM_INT);

        $rq->execute();
         
    
        
        header('Location: users.php');
   
    }
}

if(isset($_GET['id']) && !empty($_GET['id'])){
    $id = htmlspecialchars($_GET['id']);
    $sql = "SELECT * FROM users WHERE id=:id";
    $rq = $connect->prepare($sql);
    $rq->bindValue(':id', $id, PDO::PARAM_INT);
    $rq->execute();
    $result = $rq->fetch();
}

require_once("close.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>UPDATE USER</title>
    <link type="text/css" rel="stylesheet" href="style_admin.css" />

    
</head>
<body>

   <main class="container">
       <div class="row">

       <a href="users.php" class="btn btn-secondary">< Previous page</a>
       <a href="panel.php" class="btn btn-dark">Admin Panel</a>
       <a href="../index.php"class="btn btn-warning">Shop</a>

    <section class="col-12">
               
               
    <h2 class="text-center">Update a user</h2>

    <form method="post">

    <div class="form-group">
        
            <label for="id">Id</label>
            <input type="number" name="id" id="id" class="form-control" value="<?= $result['id'] ?>">
        </div> 
        <div class="form-group">
        
            <label for="username">Username</label>
            <input type="text" name="username" id="username" class="form-control" value="<?= $result['username'] ?>">
        </div> 
        <div class="form-group">
        
            <label for="password">Password</label>
            <input type="password" name="password" id="password" class="form-control" value="<?= $result['password'] ?>" required>
        </div> 

        <div class="form-group">
            <label for="email">Email</label> 
            <input type="email" name="email" id="email" class="form-control" value="<?= $result['email'] ?>" required>
            </div>
        <div class="form-group">
            <label for="admin">Admin status</label>    
            <select class="admin" class="form-control">
            <option>1- Admin</option>
            <option>0- User</option>
            </select>
        </div>
        
            <input type="hidden" name="id" value="<?= $result['id'] ?>">
            <button class="btn btn-primary">Save</button>

          
        
           

    </form>
</div>
</section>
</div>
</main>  
</body>
</html>
