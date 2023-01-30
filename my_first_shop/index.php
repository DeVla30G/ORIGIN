<?php
include_once("./includes/header.php");
include_once("./includes/my_connection.php");


$page = $_GET['page'];
// defines on which page is the website
if (isset($_GET['page']) && !empty($_GET['page'])) {
    $currentPage = (int) strip_tags($_GET['page']);
} else {
    $currentPage = 1;
}

$sql = "SELECT COUNT(*) AS 'nbr_art' FROM products;";

$query = $connect->prepare($sql);
$query->execute();
$res = $query->fetch();
$nbr_art = (int)$res['nbr_art'];
$parPage = 10;
$pages = ceil($nbr_art / $parPage);

$premier = ($currentPage - 1) * $parPage;

$sql = 'SELECT * FROM products ORDER BY name ASC LIMIT :premier, :parpage';
$qry = $connect->prepare($sql);
$qry->bindValue(':premier', $premier, PDO::PARAM_INT);
$qry->bindValue(':parpage', $parPage, PDO::PARAM_INT);
$qry->execute();
$articles = $qry->fetchAll();

?>

<body>

    <?php
    include_once('./includes/search.php');
    include_once('./includes/categories.php');
    ?>
    <div class="filter">

        <p class="filter_by">Filter by</p>
        <form action="" method="get">
            <div>
                <label for="filter_collection">Color</label>
                <select name="color" class="form-select" aria-label="Default select example">
                    <option value=""></option>
                    <option value="white" <?php if ($color == 'white') echo "selected='selected'"; ?>> white</option>
                    <option value="black" <?php if ($color == 'black') echo "selected='selected'"; ?>>black</option>
                    <option value="brown" <?php if ($color == 'brown') echo "selected='selected'"; ?>>brown</option>
                </select>
            </div>
            <div>
                <label for="filter_collection">Category</label>
                <select name="category" class="form-select" aria-label="Default select example">
                    <option value=""></option>
                    <option value="chairs" <?php if ($category == 'chairs') echo "selected='selected'"; ?>>chairs</option>
                    <option value="sofas" <?php if ($category == 'sofas') echo "selected='selected'"; ?>>sofas</option>
                    <option value="beds" <?php if ($category == 'beds') echo "selected='selected'"; ?>>beds</option>
                    <option value="tables" <?php if ($category == 'tables') echo "selected='selected'"; ?>>tables</option>
                    <option value="storage" <?php if ($category == 'storage') echo "selected='selected'"; ?>>storage</option>
                </select>
            </div>
            <div>
                <label for="filter_collection">Price</label>
                <select name="price" class="form-select" aria-label="Default select example">
                    <option value=""></option>
                    <option value="250" <?php if ($price == '250') echo "selected='selected'"; ?>>&dollar;0 - &dollar;250</option>
                    <option value="500" <?php if ($price == '500') echo "selected='selected'"; ?>>&dollar;250 - &dollar;500</option>
                    <option value="1000" <?php if ($price == '1000') echo "selected='selected'"; ?>>&dollar;500 - &dollar;1000</option>
                    <option value="2000" <?php if ($price == '2000') echo "selected='selected'"; ?>>&dollar;1000 - &dollar;2000</option>
                    <option value="2001" <?php if ($price == '2001') echo "selected='selected'"; ?>>&dollar;2000 +</option>
                </select>
            </div>
            <button type="valid" name="filtre">Valider</button>
        </form>
    </div>
    <div class="gallerie">

        <?php
        include_once("./includes/filter.php");

        if ($afficher == false) {
            //for ($i = 0; $i < $parPage; $i++) 
            foreach ($articles as $article) {
                $photo = str_replace(".crud", ".new", $article['photo']);
        ?>
                <table class="gallerie">
                    <tbody>
                        <td>
                            <div class='image'>
                                <a href="shop_product.php?id=<?= $article['id'] ?>">
                                    <img class="product" src="<?= $article["photo"]; ?>" alt="<?= $article['parent_category_name']; ?>" />
                                </a>
                            </div>
                            <div class="refs">
                                <p class="title"><?= $article['name']; ?></p>
                                <p class="price"> &dollar;<?= $article['price']; ?></p>
                                <p class="categorie"><?= $article['category_name']; ?></p>
                                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-cart-plus" viewBox="0 0 16 16">
                                    <path d="M9 5.5a.5.5 0 0 0-1 0V7H6.5a.5.5 0 0 0 0 1H8v1.5a.5.5 0 0 0 1 0V8h1.5a.5.5 0 0 0 0-1H9V5.5z" />
                                    <path d="M.5 1a.5.5 0 0 0 0 1h1.11l.401 1.607 1.498 7.985A.5.5 0 0 0 4 12h1a2 2 0 1 0 0 4 2 2 0 0 0 0-4h7a2 2 0 1 0 0 4 2 2 0 0 0 0-4h1a.5.5 0 0 0 .491-.408l1.5-8A.5.5 0 0 0 14.5 3H2.89l-.405-1.621A.5.5 0 0 0 2 1H.5zm3.915 10L3.102 4h10.796l-1.313 7h-8.17zM6 14a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm7 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0z" />
                                </svg>
                            </div>
                        </td>
                    </tbody>
                </table>

        <?php   }
        }
        ?>
    </div>

    <ul class="pagination">
        <?php
        for ($i = 1; $i == $pages; $i++) {
            echo "<a href='?page=$i'> $i </a>&nbsp";
        }
        ?>
        <li class="page-item <?= ($currentPage == 1) ? "disabled" : "" ?>">
            <a href="./?page=<?= $currentPage - 1 ?>" class="page-link">
                << Previous</a>
        </li>
        <?php for ($page = 1; $page <= $pages; $page++) : ?>

            <li class="page-item <?= ($currentPage == $page) ? "active" : "" ?>">
                <a href="./?page=<?= $page ?>" class="page-link"><?= $page ?></a>
            </li>
        <?php endfor ?>

        <li class="page-item <?= ($currentPage == $pages) ? "disabled" : "" ?>">
            <a href="./?page=<?= $currentPage + 1 ?>" class="page-link">Next >></a>
        </li>
    </ul>



    <?php include_once("./includes/footer.php"); ?>


</body>

</html>