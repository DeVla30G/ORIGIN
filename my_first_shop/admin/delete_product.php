<?php

include_once('../includes/my_connection.php');


if(isset($_GET['id']) && !empty($_GET['id'])){

    $id = htmlspecialchars($_GET['id']);
    $sql = "DELETE FROM products WHERE id=:id";

    $rq = $connect->prepare($sql);

    $rq->bindValue(':id', $id, PDO::PARAM_INT);
    $rq->execute();

    /*echo "product deleted !";*/
    header('Location: products.php');
    

}

require_once('close.php');
