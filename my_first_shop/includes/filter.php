<?php
$connect = new PDO("mysql:host=localhost;dbname=my_shop;port=3306", "vladi", "1234");

$req = $connect->prepare("SELECT * FROM products");
$req->setFetchMode(PDO::FETCH_ASSOC);
$req->execute();
$result = $req->fetchAll();
$afficher = false;

if (isset($_GET['filtre'])) {
    $afficher = true;
    $category = $_GET['category'];
    $color = $_GET['color'];
    $price = $_GET['price'];

    if (empty($price)) {
        if (!empty($category) or !empty($color)) {
            $req = $connect->prepare("SELECT * FROM products WHERE (description LIKE '%$color%') AND (category_name LIKE '%$category%' OR parent_category_name LIKE '%$category%');");
            $req->setFetchMode(PDO::FETCH_ASSOC);
            $req->execute();
            $result = $req->fetchAll();
            $afficher = true;
        }
    } else if ($price == "250") {
        $req = $connect->prepare("SELECT * FROM products WHERE (price < 250) AND (description LIKE '%$color%') AND (parent_category_name LIKE '%$category%' OR category_name LIKE '%$category%');");
        $req->setFetchMode(PDO::FETCH_ASSOC);
        $req->execute();
        $result = $req->fetchAll();
        $afficher = true;
    } else if ($price == "500") {
        $req = $connect->prepare("SELECT * FROM products WHERE (description LIKE '%$color%') AND (category_name LIKE '%$category%' OR parent_category_name LIKE '%$category%') AND (price < 500 AND price > 250) ;");
        $req->setFetchMode(PDO::FETCH_ASSOC);
        $req->execute();
        $result = $req->fetchAll();
        $afficher = true;
    } else if ($price == "1000") {
        $req = $connect->prepare("SELECT * FROM products WHERE (price < 1000 AND price > 500) AND (description LIKE '%$color%') AND (parent_category_name LIKE '%$category%' OR category_name LIKE '%$category%');");
        $req->setFetchMode(PDO::FETCH_ASSOC);
        $req->execute();
        $result = $req->fetchAll();
        $afficher = true;
    } else if ($price == "2000") {
        $req = $connect->prepare("SELECT * FROM products WHERE (price < 2000 AND price > 1000) AND (description LIKE '%$color%') AND (parent_category_name LIKE '%$category%' OR category_name LIKE '%$category%');");
        $req->setFetchMode(PDO::FETCH_ASSOC);
        $req->execute();
        $result = $req->fetchAll();
        $afficher = true;
    } else if ($price == '2001') {
        $req = $connect->prepare("SELECT * FROM products WHERE (description LIKE '%$color%') AND (price < 2001) AND (parent_category_name LIKE '%$category%' OR category_name LIKE '%$category%');");
        $req->setFetchMode(PDO::FETCH_ASSOC);
        $req->execute();
        $result = $req->fetchAll();
        $afficher = true;
    }
}
?>

<div class="gallerie">

    <?php

    if ($afficher == true) {
        for ($i = 0; $i < count($result); $i++) {
            $photo = str_replace(".crud", ".new", $result[$i]['photo']); ?>
          
                <table class="gallerie">
                    <tbody>
                        <td>
                            <div class='image'>
                                <a href="shop_product.php?id=<?= $result[$i]['id'] ?>">
                                    <img src="<?php echo $result[$i]["photo"]; ?>" alt="<?php echo $result[$i]['parent_category_name']; ?>" />
                                </a>
                            </div>
                            <div class="refs">
                                <p class="title"><?php echo $result[$i]['name']; ?></p>
                                <p class="price"> &dollar;<?php echo $result[$i]['price']; ?></p>
                                <p class="categorie"><?php echo $result[$i]['category_name']; ?></p>
                                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-cart-plus" viewBox="0 0 16 16">
                                    <path d="M9 5.5a.5.5 0 0 0-1 0V7H6.5a.5.5 0 0 0 0 1H8v1.5a.5.5 0 0 0 1 0V8h1.5a.5.5 0 0 0 0-1H9V5.5z" />
                                    <path d="M.5 1a.5.5 0 0 0 0 1h1.11l.401 1.607 1.498 7.985A.5.5 0 0 0 4 12h1a2 2 0 1 0 0 4 2 2 0 0 0 0-4h7a2 2 0 1 0 0 4 2 2 0 0 0 0-4h1a.5.5 0 0 0 .491-.408l1.5-8A.5.5 0 0 0 14.5 3H2.89l-.405-1.621A.5.5 0 0 0 2 1H.5zm3.915 10L3.102 4h10.796l-1.313 7h-8.17zM6 14a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm7 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0z" />
                                </svg>
                            </div>
                        </td>
                    </tbody>
                </table>
        
    <?php   }
    } ?>
</div>