<?php 
include_once("./includes/header.php"); 
include_once("./includes/my_connection.php");

$connect = new PDO("mysql:host=localhost;dbname=my_shop;port=3306","VlaSamAlex", "1234"); 

$req=$connect->prepare("SELECT * FROM products LIMIT 25");
$req->setFetchMode(PDO::FETCH_ASSOC);
$req->execute();
$result=$req->fetchAll();
$afficher="oui";

if (isset($_GET['filtre'])) {
    $category = $_GET['category'];
    $color=$_GET['color'];
    $price=$_GET['price'];

    if(empty($price)){
        if(!empty($category) OR !empty($color)){
            $req=$connect->prepare("SELECT * FROM products WHERE description LIKE '%$color%' AND parent_category_name LIKE '%$category%' OR category_name LIKE '%$category%'");
            $req->setFetchMode(PDO::FETCH_ASSOC);
            $req->execute();
            $result=$req->fetchAll();
            $afficher="oui";
            }
    }
    elseif($price=="250"){
        $req=$connect->prepare("SELECT * FROM products WHERE price < 250 AND description LIKE '%$color%' AND parent_category_name LIKE '%$category%' OR category_name LIKE '%$category%'");
            $req->setFetchMode(PDO::FETCH_ASSOC);
            $req->execute();
            $result=$req->fetchAll();
            $afficher="oui";            
    }
    elseif($price=="500"){
        $req=$connect->prepare("SELECT * FROM products WHERE price < 500 AND price > 250 AND description LIKE '%$color%' AND parent_category_name LIKE '%$category%' OR category_name LIKE '%$category%'");
            $req->setFetchMode(PDO::FETCH_ASSOC);
            $req->execute();
            $result=$req->fetchAll();
            $afficher="oui";            
    }
    elseif($price=="1000"){
        $req=$connect->prepare("SELECT * FROM products WHERE price < 1000 AND price > 500 AND description LIKE '%$color%' AND parent_category_name LIKE '%$category%' OR category_name LIKE '%$category%'");
            $req->setFetchMode(PDO::FETCH_ASSOC);
            $req->execute();
            $result=$req->fetchAll();
            $afficher="oui";            
    }
    elseif($price=="2000"){
        $req=$connect->prepare("SELECT * FROM products WHERE price < 2000 AND price > 1000 AND description LIKE '%$color%' AND parent_category_name LIKE '%$category%' OR category_name LIKE '%$category%'");
            $req->setFetchMode(PDO::FETCH_ASSOC);
            $req->execute();
            $result=$req->fetchAll();
            $afficher="oui";            
    }
    elseif($price=="2001"){
        $req=$connect->prepare("SELECT * FROM products WHERE price > 2000 AND description LIKE '%$color%' AND parent_category_name LIKE '%$category%' OR category_name LIKE '%$category%'");
            $req->setFetchMode(PDO::FETCH_ASSOC);
            $req->execute();
            $result=$req->fetchAll();
            $afficher="oui";            
    }
    
}

?>
<body>
    <form action="result.php" method="post">
    <div class="search_bar">
        <button type="valid"><img class="loupe" src="./images/Search.png" alt="search" name="valid"></button>
        <input type="search" id="site-search" name="search" >
       
    </div> 
    </form>
    <aside class="categories">
        <ul>
            <li><a href="tables.php"> Tables</a></li>
            <li><a href="chairs.php"> Chairs </a></li>
            <li><a href="sofas.php"> Sofas </a></li>
            <li><a href="shelves.php"> Shelves </a></li>
            <li><a href="beds.php"> Beds </a></li>
        </ul>
    </aside>
    

   

        <div class="filter">
            
                <p class="filter_by">Filter by</p>
                <form action ="" method ="get">
                    <div>
                        <label for="filter_collection">Color</label>
                        <select name ="color" class="form-select" aria-label="Default select example">
                                <option value=""></option>
                                <option value="white">white</option>
                                <option value="black">black</option>
                                <option value="brown">brown</option>
                            </select>
                    </div>
                    <div>
                        <label for="filter_collection">Category</label>
                        <select name="category"class="form-select" aria-label="Default select example">
                                <option value=""></option>
                                <option value="chairs">chairs</option>
                                <option value="sofas">sofas</option>
                                <option value="bed">beds</option>
                                <option value="tables">tables</option>
                                <option value="tor">storage</option>
                            </select>
                    </div>
                    <div>
                        <label for="filter_collection">Price</label>
                        <select name = "price" class="form-select" aria-label="Default select example">
                                <option value=""></option>
                                <option value="250">&dollar;0 - &dollar;250</option>
                                <option value="500">&dollar;250 - &dollar;500</option>
                                <option value="1000">&dollar;500 - &dollar;1000</option>
                                <option value="2000">&dollar;1000 - &dollar;2000</option>
                                <option value="2001">&dollar;2000 +</option>
                            </select>
                    </div>
                    <button type="valid" name="filtre">Valider</button>
                    </form>
        </div>
    <div class="gallerie">

    <?php 
    
        if ($afficher=="oui") {  
            for($i=0;$i<count($result);$i++){
                $photo=str_replace(".crud", ".new", $result[$i]['photo']); ?>
        <div class="product">
            <a href="shop_product.php?id=<?= $result[$i]['id'] ?>"><img src="<?php echo $result[$i]["photo"]; ?>" alt="<?php echo $result[$i]['parent_category_name']; ?>"/></a>
            <div class="description">
                <p class="title"><?php echo $result[$i]['name']; ?></p>
                <p class="price"> &dollar;<?php echo $result[$i]['price']; ?></p>
                <p class="categorie"><?php echo $result[$i]['category_name']; ?></p>
                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-cart-plus" viewBox="0 0 16 16">
                    <path d="M9 5.5a.5.5 0 0 0-1 0V7H6.5a.5.5 0 0 0 0 1H8v1.5a.5.5 0 0 0 1 0V8h1.5a.5.5 0 0 0 0-1H9V5.5z"/>
                    <path d="M.5 1a.5.5 0 0 0 0 1h1.11l.401 1.607 1.498 7.985A.5.5 0 0 0 4 12h1a2 2 0 1 0 0 4 2 2 0 0 0 0-4h7a2 2 0 1 0 0 4 2 2 0 0 0 0-4h1a.5.5 0 0 0 .491-.408l1.5-8A.5.5 0 0 0 14.5 3H2.89l-.405-1.621A.5.5 0 0 0 2 1H.5zm3.915 10L3.102 4h10.796l-1.313 7h-8.17zM6 14a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm7 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0z"/>
                </svg> 
            </div>
        </div>
        <?php   }
        } ?>
    </div>



            <footer >
            <div id="pages">
                <div>1</div>
                <div>2</div>
                <div>3</div>
                <div>4</div>
                <div>5</div>
                <div>6</div>
                <div>7</div>
                <div>8</div>
                <div>9</div>
                <div>10</div>
                <div class="nextP">&GT;</div>
            </div>
            </footer>


<?php include_once("./includes/footer.php");?>


</body>
</html>