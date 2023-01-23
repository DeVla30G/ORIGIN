<?php
include_once('./includes/header.php');
include_once('./includes/my_connection.php');


if(isset($_POST['search']) AND !empty($_POST['search'])){     
    $_POST['search']= htmlspecialchars($_POST['search']);
    $search = $_POST['search'];
    $search = strip_tags($search);
    
    $req=$connect->prepare("SELECT id, name, price, photo, description, category_name, parent_category_name FROM products WHERE description like '%$search%' OR name like '%$search%' OR category_name like '%$search%' OR parent_category_name like '%$search%'");
    $req->setFetchMode(PDO::FETCH_ASSOC);
    $req->execute();
    $result=$req->fetchAll();
    $afficher="oui";

    
}

elseif (isset($_GET['valid_AZ'])) {
    $search=$_GET['valid_AZ'];
    $req=$connect->prepare("SELECT id, name, price, photo, description, category_name, parent_category_name FROM products WHERE description like '%$search%' OR name like '%$search%' OR category_name like '%$search%' OR parent_category_name like '%$search%' ORDER BY name ASC");
    $req->setFetchMode(PDO::FETCH_ASSOC);
    $req->execute();
    $result=$req->fetchAll();
    $afficher="oui";
}

elseif (isset($_GET['valid_ZA'])) {
    $search=$_GET['valid_ZA'];
    $req=$connect->prepare("SELECT id, name, price, photo, description, category_name, parent_category_name FROM products WHERE description like '%$search%' OR name like '%$search%' OR category_name like '%$search%' OR parent_category_name like '%$search%' ORDER BY name DESC");
    $req->setFetchMode(PDO::FETCH_ASSOC);
    $req->execute();
    $result=$req->fetchAll();
    $afficher="oui";
}

elseif (isset($_GET['price_up'])) {
    $search=$_GET['price_up'];
    $req=$connect->prepare("SELECT id, name, price, photo, description, category_name, parent_category_name FROM products WHERE description like '%$search%' OR name like '%$search%' OR category_name like '%$search%' OR parent_category_name like '%$search%' ORDER BY price ASC");
    $req->setFetchMode(PDO::FETCH_ASSOC);
    $req->execute();
    $result=$req->fetchAll();
    $afficher="oui";
}
elseif (isset($_GET['price_down'])) {
    $search=$_GET['price_down'];
    $req=$connect->prepare("SELECT id, name, price, photo, description, category_name, parent_category_name FROM products WHERE description like '%$search%' OR name like '%$search%' OR category_name like '%$search%' OR parent_category_name like '%$search%' ORDER BY price DESC");
    $req->setFetchMode(PDO::FETCH_ASSOC);
    $req->execute();
    $result=$req->fetchAll();
    $afficher="oui";
}

else{
    header("location: ./index.php");
      }


?>

<body>
<form action="" method="post">
    <div class="search_bar">
        <button type="valid"><img class="loupe" src="./images/Search.png" alt="search" name="valid"></button>
        <input type="search" id="site-search" name="search" value="<?php if(isset($_POST['search'])){echo $_POST['search'];} ?>" >
       
    </div> 
    </form>
<div>
<?php  
    
        if ($afficher=="oui") {  ?>
            <div id="results">
            <div class="nbr_results"><?php echo count($result)." ".(count($result)>1?"résultats trouvés !" : "résultat trouvé !"); ?></div>
            <table class ="table_result">
                    <tr>
                        <td>
                            
                        </td>
                        <td>
                            <form action="" method="get">
                                <button type="valid" name="valid_AZ" value ="<?php echo $search; ?>"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-sort-alpha-down" viewBox="0 0 16 16">
  <path fill-rule="evenodd" d="M10.082 5.629 9.664 7H8.598l1.789-5.332h1.234L13.402 7h-1.12l-.419-1.371h-1.781zm1.57-.785L11 2.687h-.047l-.652 2.157h1.351z"/>
  <path d="M12.96 14H9.028v-.691l2.579-3.72v-.054H9.098v-.867h3.785v.691l-2.567 3.72v.054h2.645V14zM4.5 2.5a.5.5 0 0 0-1 0v9.793l-1.146-1.147a.5.5 0 0 0-.708.708l2 1.999.007.007a.497.497 0 0 0 .7-.006l2-2a.5.5 0 0 0-.707-.708L4.5 12.293V2.5z"/>
</svg></button>
                            </form>
                        </td>
                        <td>
                            <form action="" method="get">
                                <button type="valid" name="price_up" value = "<?php echo $search; ?>"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-sort-down-alt" viewBox="0 0 16 16">
  <path d="M3.5 3.5a.5.5 0 0 0-1 0v8.793l-1.146-1.147a.5.5 0 0 0-.708.708l2 1.999.007.007a.497.497 0 0 0 .7-.006l2-2a.5.5 0 0 0-.707-.708L3.5 12.293V3.5zm4 .5a.5.5 0 0 1 0-1h1a.5.5 0 0 1 0 1h-1zm0 3a.5.5 0 0 1 0-1h3a.5.5 0 0 1 0 1h-3zm0 3a.5.5 0 0 1 0-1h5a.5.5 0 0 1 0 1h-5zM7 12.5a.5.5 0 0 0 .5.5h7a.5.5 0 0 0 0-1h-7a.5.5 0 0 0-.5.5z"/>
</svg></button>
                            </form>
                        </td>
                        
                    </tr>
                <?php for($i=0;$i<count($result);$i++){ ?>
                    <tr>
                        <td>
                        <a href="shop_product.php?id=<?= $result[$i]['id'] ?>"><img src="<?php echo $result[$i]['photo']; ?>" alt="test"/></a>
                        </td>
                        <td>
                            <?php echo $result[$i]['name']; ?>
                        </td>
                        <td>
                            <?php echo $result[$i]['price'] . "&dollar;"; ?>
                        </td>
                        
                    </tr>
                <?php } ?>
                    <tr>
                        <td>
                            
                        </td>
                        <td>
                            <form action="" method="get">
                                <button type="valid" name="valid_ZA" value = "<?php echo $search; ?>"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-sort-alpha-up" viewBox="0 0 16 16">
  <path fill-rule="evenodd" d="M10.082 5.629 9.664 7H8.598l1.789-5.332h1.234L13.402 7h-1.12l-.419-1.371h-1.781zm1.57-.785L11 2.687h-.047l-.652 2.157h1.351z"/>
  <path d="M12.96 14H9.028v-.691l2.579-3.72v-.054H9.098v-.867h3.785v.691l-2.567 3.72v.054h2.645V14zm-8.46-.5a.5.5 0 0 1-1 0V3.707L2.354 4.854a.5.5 0 1 1-.708-.708l2-1.999.007-.007a.498.498 0 0 1 .7.006l2 2a.5.5 0 1 1-.707.708L4.5 3.707V13.5z"/>
</svg></button>
                            </form>
                        </td>
                        <td>
                            <form action="" method="get">
                                <button type="valid" name="price_down" value = "<?php echo $search; ?>"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-sort-down" viewBox="0 0 16 16">
  <path d="M3.5 2.5a.5.5 0 0 0-1 0v8.793l-1.146-1.147a.5.5 0 0 0-.708.708l2 1.999.007.007a.497.497 0 0 0 .7-.006l2-2a.5.5 0 0 0-.707-.708L3.5 11.293V2.5zm3.5 1a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5zM7.5 6a.5.5 0 0 0 0 1h5a.5.5 0 0 0 0-1h-5zm0 3a.5.5 0 0 0 0 1h3a.5.5 0 0 0 0-1h-3zm0 3a.5.5 0 0 0 0 1h1a.5.5 0 0 0 0-1h-1z"/>
</svg></button>
                            </form>
                        </td>
                       
                    </tr>
            </table>   
        </div>
    
    
     <?php  } 
     include_once("./includes/footer.php");
     ?>  
  
</div>
</body>
</html>