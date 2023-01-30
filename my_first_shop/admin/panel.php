<?php 
session_start();
include_once('../includes/my_connection.php');
//include_once('./logout_panel.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>ADMIN PANEL</title>
    <link type="text/css" rel="stylesheet" href="style_admin.css" />
    

    
</head>
<body>
<?php if(isset($_SESSION["log_admin"])) {
        echo "Hello " . $_SESSION["log_admin"];
    }
    ?>
        
<main class="container ">
     

   
     <div class="container-sm">
       <h2 class="text-center">Welcome to the administration panel</h2> 
    </div>

     <div class="container-sm ">
     <p><a href="users.php" class="btn btn-dark btn-lg mb-4 btn-block">Manage Users</a></p>
    </div>

    <div class="container-sm ">
     <p><a href="products.php" class="btn btn-primary btn-lg mb-50 btn-block">Manage Products</a></p>
    </div>

    <div class="container-sm">
    <a href="../index.php" class="btn btn-warning">Go back to shop</a>
    </div>            

</main>
 

            

    
</body>
</html>





