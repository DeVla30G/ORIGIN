<?php

include_once('../includes/my_connection.php');


$sql= "SELECT * FROM users";
$rq=$connect->prepare($sql);
$rq->execute();
$result=$rq->fetchAll(PDO::FETCH_ASSOC);

require_once('close.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    
    <title>manage users</title>
    <link type="text/css" rel="stylesheet" href="./style_admin.css"/>
    
</head>
<body>
   <main class="container-sm">
     <div class="row">

     <a href="panel.php"class="btn btn-secondary">< Previous page</a> 
     <a href="../index.php" class="btn btn-warning">Shop</a>
     <a href="add_user.php" class="btn btn-primary">+ Add new user</a>

     
     <div class="container p-3 my-3" >
     <h2 class="text-center" >Users</h2>
     
     </div>

     <section class="col-12">
         <table class="table" >
             <thead>
                 
                 <th>ID</th>
                 <th>USERNAME</th>
                 
                 <th>ACTIONS</th>


             </thead>


             <tbody>
                <?php
                  foreach($result as $user){
                ?>
                <tr>
                    <td><?= $user['id'] ?></td>
                    <td><?= $user['username'] ?></td>
                   
                    
                    <td><a href="read_user.php?id=<?= $user['id'] ?>" class="btn btn-primary">See</a> <a href="edit_user.php?id=<?= $user['id'] ?>" class="btn btn-success">Edit</a> <a href="delete_user.php?id=<?= $user['id'] ?>" class="btn btn-danger">Delete</a></td>
                    
                </tr>
                
                <?php    
                  }
                ?>
                



             </tbody>
         </table>

        
       
     </section>
     </div>

    </main>
  </body>

  </html>