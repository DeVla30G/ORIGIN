<?php 
session_start();
include_once('../includes/my_connection.php');

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link type="text/css" rel="stylesheet" href="./style_admin.css" />
    <title>Delete product</title>

</head>
<body>

<h1>Are you sure you want to delete ?</h1>

<div class="form-check">
  <label class="form-check-label">
    <input type="radio" class="form-check-input" name="optradio">YES
  </label>
  <a href="delete_product.php?id=
</div>
<div class="form-check">
  <label class="form-check-label">
    <input type="radio" class="form-check-input" name="optradio">NO
  </label>
</div>
</body>
</html>