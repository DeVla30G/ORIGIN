<?php 
session_start();

include_once('../includes/my_connection.php');

if(isset($_POST)){
    if(isset($_POST['id']) && !empty($_POST['id']) && isset($_POST['name']) && !empty($_POST['name']) && isset($_POST['price'])  && !empty($_POST['price']) && isset($_POST['category_id']) && !empty($_POST['category_id']) && isset($_POST['description']) && !empty($_POST['description']) && isset($_POST['photo']) && !empty($_POST['photo']) && isset($_POST['category_name']) && !empty($_POST['category_name'])){
        $id = htmlspecialchars($_POST['id']);
        $name= htmlspecialchars($_POST['name']);
        $price = htmlspecialchars($_POST['price']);
        $category_id = htmlspecialchars($_POST['category_id']);
        $category_name = htmlspecialchars($_POST['category_name']);
        $description= htmlspecialchars($_POST['description']);
        $photo = htmlspecialchars($_POST['photo']);
    
        

        $sql = "UPDATE products SET name=:name, price=:price, category_id=:category_id, description=:description, photo=:photo, category_name=:category_name WHERE id=:id";

        $rq = $connect->prepare($sql);

        $rq->bindValue(':name', $name, PDO::PARAM_STR);
        $rq->bindValue(':price', $price, PDO::PARAM_STR);
        $rq->bindValue(':category_id', $category_id, PDO::PARAM_INT);
        $rq->bindValue(':id', $id, PDO::PARAM_INT);
        $rq->bindValue(':description', $id, PDO::PARAM_STR);
        $rq->bindValue(':photo', $id, PDO::PARAM_STR);
        $rq->bindValue(':category_name', $category_name, PDO::PARAM_STR);
        $rq->execute();
      
        
        header('Location: products.php');
        

    }
    
}

if(isset($_GET['id']) && !empty($_GET['id'])){
    $id = htmlspecialchars($_GET['id']);

    $sql = "SELECT * FROM products WHERE id=:id";
    
    $rq = $connect->prepare($sql);
    $rq->bindValue(':id', $id, PDO::PARAM_INT);
    $rq->execute();
    $product = $rq->fetch();


}

require_once("close.php");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>UPDATE PRODUCT</title>
    <link type="text/css" rel="stylesheet" href="style_admin.css" />

    
</head>
<body>
    <main class="container">
       <div class="row">
          <a href="products.php" class="btn btn-secondary">< Previous page</a>
          <a href="panel.php" class="btn btn-dark">Admin panel</a>
          <a href="../index.php"class="btn btn-warning">Shop</a>
          

           <section class="col-12">

    <h2 class="text-center">Update "<?=$product['name'] ?>"</h2>

    <form method="post" >

        

        <div class="form-group">
        
            <label for="name">name</label>
            <input type="text" name="name" id="name" class="form-control" value="<?= $product['name'] ?>">
        </div>

        <div class="form-group">
            <label for="photo">photo</label>
            <input type="file" id="photo" name="photo" accept="image/png, image/jpeg">
        </div>

        <div class="form-group">
            <label for="description">description</label>
            <input type="text" name="description" id="description" class="form-control" value="<?= $product['description'] ?>">
        </div>

        <div class="form-group">
            <label for="price">price</label>
            <input type="text" name="price" id="price" class="form-control" value="<?= $product['price'] ?>" $>
        </div>

        <div class="form-group">
            <label for="category_id">category id</label>
            <input type="number" name="category_id" id="category_id" class="form-control" value="<?= $product['category_id'] ?>">
        </div>

        <div class="form-group">
            <label for="category_name">category name</label>
            <input type="text" name="category_name" id="category_name" class="form-control" value="<?= $product['category_name'] ?>">
        </div>
            
        <input type="hidden" name="id" value="<?= $product['id'] ?>" >
        
            <button class="btn btn-primary">Save</button>
            
       
    </form>
    </section>
</div>
</main> 
    
</body>
</html>
