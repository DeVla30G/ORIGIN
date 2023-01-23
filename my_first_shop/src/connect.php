<?php
try{
    $connect = new PDO('mysql:host=localhost;dbname=my_shop', 'VlaSamAlex','1234');
    $connect->exec('SET NAMES "UTF8"');
} catch (PDOException $e){
    echo 'Erreur : '. $e->getMessage();
    die();
}