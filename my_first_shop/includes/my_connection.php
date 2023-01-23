<?php 

const ERROR_LOG_FILE = "errors.log";//error log file

$host = "localhost";
$dbname = "my_shop";
$port = 3306;
$username = null;
$passwd = null;


ini_set("log_errors", TRUE); 
ini_set('error_log', ERROR_LOG_FILE); //setting  error file

if(empty($host) AND empty($username) AND empty($passwd) AND empty($port) AND empty($dbname)){
    $error2 = "Bad params! \n";
    error_log($error2);
    throw new Exception($error2); 
   }else {
       
   }
        try{

            $connect = new PDO("mysql:host=localhost;dbname=my_shop;port=3306","VlaSamAlex", "1234"); 
            $connect->exec('SET NAMES "UTF8"');

        } catch (PDOException $e){
            echo 'Erreur : '. $e->getMessage();
            die();
        }
    