<?php 
session_start();


if($_POST){
    if(isset($_POST['name']) && isset($_POST['price']) && isset($_POST['category_id']) && isset($_POST['category_name']) && isset($_POST['parent_category_name']) && !empty($_POST['parent_category_name']) && !empty($_POST['category_name']) && !empty($_POST['name']) && !empty($_POST['price']) && !empty($_POST['category_id'])){
            $name = htmlspecialchars($_POST['name']);
            $price = htmlspecialchars($_POST['price']);
            $category_id = htmlspecialchars($_POST['category_id']);
            $category_name = htmlspecialchars($_POST['category_name']);
            $parent_category_name = htmlspecialchars($_POST['parent_category_name']);

            include_once('../includes/my_connection.php');

            $sql = "INSERT INTO products ( name, price, category_id, category_name, parent_category_name) VALUES ( :name, :price, :category_id, :category_name, :parent_category_name)";

            $rq = $connect->prepare($sql);

            $rq->bindValue(':name', $name, PDO::PARAM_STR);
            $rq->bindValue(':price', $price, PDO::PARAM_INT);
            $rq->bindValue(':category_id', $category_id, PDO::PARAM_INT);
            $rq->bindValue(':category_name', $category_name, PDO::PARAM_STR);
            $rq->bindValue(':parent_category_name', $parent_category_name, PDO::PARAM_STR);

           

            $rq->execute();

            echo "new product added !";
            require_once("close.php");
            header('Location: products.php');
           
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
    <title>ADD PRODUCT</title>
    <link type="text/css" rel="stylesheet" href="style_admin.css" />


</head>
<body>
<main class="container">
    <div class="row">
    <a href="products.php"class="btn btn-secondary">< Previous page</a> 
    <a href="panel.php" class="btn btn-dark">Admin panel</a>
     <a href="../index.php" class="btn btn-warning">Shop</a>
     

        <section class="col-12">

      
            <h2 class="text-center">New product</h2>
                <form action="" method="post">

                <div class="form-group">
                    <label for="name">name</label>
                    <input type="text" name="name" id="name" class="form-control" >
                </div>
                <div class="form-group">
                <label for="description">description</label>
                 <textarea name="description" id="description" class="form-control" placeholder="product description" ></textarea>
              </div>
                <div class="form-group">
                    <label for="price">price</label>
                    <input type="number" name="price" id="price" class="form-control">
                </div>

                <div class="form-group">
                    <label for="category_id">category id</label>
                    <input type="number" name="category_id" id="category_id" class="form-control" >
                </div>
                    

                <div class="form-group">
                    <label for="category_name">category name</label>
                    <select class="form-control" id="category_name" name="category_name" >
                            <option></option>
                            <option>armchairs</option>
                            <option>table chairs</option>
                            <option>king size bed</option>
                            <option>modern sofas</option>
                            <option>leather sofas</option>
                            <option>side tables</option>
                            <option>dining tables</option>
                            <option>shelves</option>

                        </select>
                </div>
                
                <div class="form-group">
                    <label for="parent_category_name">parent category name</label>
                    <select class="form-control" id="parent_category_name" name="parent_category_name" >
                            <option></option>
                            <option>chairs</option>
                            <option>beds</option>
                            <option>sofas</option>
                            <option>tables</option>
                            <option>storage</option>
                    </select>
                </div>

                  <button type="submit" class="btn btn-primary">Save</button>
                </form>
        
</div>
</main>
</body>
</html>






