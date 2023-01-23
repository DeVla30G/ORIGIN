<?php

session_start();
include_once('../includes/my_connection.php');
if(isset($_GET['id'])) {

   
    $id = htmlspecialchars($_GET['id']);
    $sql="SELECT * FROM products WHERE id=:id";
    $rq=$connect->prepare($sql);
    $rq->bindValue(':id', $id, PDO::PARAM_INT);
    $rq->execute();
    $product=$rq->fetch();
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Product</title>
    <link type="text/css" rel="stylesheet" href="style_admin.css" />

</head>
<body>


<main class="container">

<a href="products.php" class="btn btn-secondary">< Previous page</a>
      <a href="panel.php" class="btn btn-dark">Admin panel</a>
      <a href="../index.php"class="btn btn-warning">Shop</a>
     
     <div class="row">
     
     <div class="col-sm-4 ">
     <h2><em>"<?= $product['name'] ?>" product</em></h2>

     <p><a href="edit_product.php?id=<?= $product['id'] ?>" class="btn btn-success">Update</a>  <a href="delete_product.php?id=<?= $product['id'] ?>" class="btn btn-danger">Delete</a></p>
     </div>

     <div class="col-sm-4">

    <img src="<?= $product['photo']?>" class="img-thumbnail" class="img-fluid"  alt="Responsive image">
    
    </div>

    <div class="col-sm-4 border" >

    <p><strong>Id</strong> : <?= $product['id'] ?></p>
    <p><strong>Name</strong> : <?= $product['name'] ?></p>
    <p><strong>Description</strong>: <?= $product['description'] ?> </p>
    <p><strong>Price</strong>: <?= $product['price'] ?> $</p>
    <p><strong>Category id</strong> : <?= $product['category_id'] ?></p>
    <p><strong>Category</strong>: <?= $product['category_name'] ?></p>

    
    </div>
    

    
  
  
     </div>

   </main>

</body>
</html>
