<?php

session_start();
include_once('../includes/my_connection.php');
if(isset($_GET['id'])) {

    
    $id = htmlspecialchars($_GET['id']);
    $sql="SELECT * FROM users WHERE id=:id";
    $rq=$connect->prepare($sql);
    $rq->bindValue(':id', $id, PDO::PARAM_INT);
    $rq->execute();
    $user=$rq->fetch();
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>User</title>
    <link type="text/css" rel="stylesheet" href="style_admin.css" />

</head>
<body>
<main class="container">
     <a href="users.php" class="btn btn-secondary">< Previous page</a>
      <a href="panel.php" class="btn btn-dark">Admin panel</a>
      <a href="../index.php"class="btn btn-warning">Shop</a>
     <div class="row">
     
     <div class="col-sm-6">

    <h2 class="text-center"><em>"<?= $user['username']?>" file</em></h2>
    <img src="../images/avatar.jpg"class="img-fluid" alt="Responsive image">
     </div>

    <div class="col-sm-6 border">

    <p><strong>ID:</strong> <?= $user['id'] ?></p>

    <p><strong>Username :</strong> <?= $user['username'] ?></p>
    
    <p><strong>Email :</strong> <?= $user['email'] ?></p>

    <p><strong>Password :</strong> *****************</p>

    <p><strong>Admin :</strong> <?= $user['admin'] ?></p>

    <p><a href="edit_user.php?id=<?= $user['id'] ?>" class="btn btn-success">Update</a>  <a href="delete_user.php?id=<?= $user['id'] ?>" class="btn btn-danger">Delete</a></p>


</div>
     </div>

   </main>

</body>
</html>
