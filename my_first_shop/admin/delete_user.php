<?php

include_once('../includes/my_connection.php');


if(isset($_GET['id'])){

    $id =$_GET['id'];
    $sql = "DELETE FROM users WHERE id=:id";

    $rq = $connect->prepare($sql);

    $rq->bindValue(':id', $id, PDO::PARAM_INT);
    $rq->execute();
    
    header('Location: users.php');
    echo "user deleted !";
}

require_once("close.php");