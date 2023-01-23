<?php 

session_start();
require_once('./includes/my_connection.php');



if(isset($_GET['id'])) {

    $id = $_GET['id'];
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
    <title>Product details</title>

</head>
<body>
<?php include_once("./includes/header.php") ?>

<main class="container">
     <div class="row">
     <section class="col-12">

    <h2><?= $product['name'] ?> details</h2>

    
    
    <img src="<?= $product['photo']?>">
    <p>Description: <?= $product['description'] ?> </p>
    <p>Price: <?= $product['price'] ?> $</p>
    <p>Category: <?= $product['category_name'] ?></p>
    
    

    <p><a href="add_to_cart.php?id=<?= $product['id'] ?>" class="btn btn-success">ADD TO CART</a></p>
    <p><a href="./index.php">Home</a></p>
     </section>
     </div>

   </main>
   <?php include_once("./includes/footer.php") ?>
</body>
</html>
