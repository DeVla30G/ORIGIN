<?php 
const ERROR_LOG_FILE = "errors.log";//error log file

/*require('./dotEnv.php');
use MyShop\DotEnv;
(new DotEnv('../.env'))->load();

$host = getenv('DB_HOST');
echo $host . PHP_EOL;
$dbname = getenv('DB_NAME');
$dbpwd = getenv('DB_PASSWORD');
$port = getenv('DB_PORT');
$dsn = getenv('DB_DSN');
*/
$host = 'localhost';
$dbname = 'vladi';
$dbpwd = '1234';
$port = 3306;
$dsn = 'mysql:host=localhost;dbname=my_shop;port=3306';

ini_set("log_errors", TRUE); 
ini_set('error_log', ERROR_LOG_FILE); //setting  error file

if(empty($host) AND empty($dbname) AND empty($dbpwd) AND empty($port) AND empty($dbname)){
    $error2 = "Bad params! \n";
    error_log($error2);
    throw new Exception($error2); 
   }else {
       
   }
        try{

            $connect = new PDO($dsn, $dbname, $dbpwd); 
            $connect->exec('SET NAMES "UTF8"');

        } catch (PDOException $e){
            echo 'Erreur : '. $e->getMessage();
            die();
        }
    