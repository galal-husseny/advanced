<?php
$title = 'Shop';
include_once "views/layouts/header.php";
include_once "views/layouts/nav.php";
include_once "views/layouts/breadcrumb.php";
include_once "app/database/models/Product.php";

include_once "app/database/models/Category.php";
include_once "app/database/models/Subcategory.php";

$subcategoryData = new Subcategory;
$categoryData = new Category;

if ($_GET) {
    if (isset($_GET['cat'])) {
        if (is_numeric($_GET['cat'])) {
            $categoryData->setId($_GET['cat']);
            $findResult = $categoryData->find();
            if ($findResult) {
                $subcategoryData->setCategory_id($_GET['cat']);
                $readResult = $subcategoryData->getSubsByCats();
            } else {
                header('location:views/errors/404.php');
                die;
            }
        } else {
            header('location:views/errors/404.php');
            die;
        }
    } else {
        header('location:views/errors/404.php');
        die;
    }
} else {
    header('location:views/errors/404.php');
    die;
}

?>

<div class="shop-page-area ptb-100">
    <div class="container">
        <div class="row flex-row-reverse">
            <div class="col-lg-9">
                
                <div class="grid-list-product-wrapper">
                    <div class="product-grid product-view pb-20">
                        <div class="row">
                            <!-- loop -->
                            <?php

                            if ($readResult) {
                                $subcategories  = $readResult->fetch_all(MYSQLI_ASSOC);
                                foreach ($subcategories as $index => $subcategory) { ?>

                                    <div class="product-width pro-list-none col-xl-4 col-lg-4 col-md-4 col-sm-6 col-12 mb-30">
                                        <div class="product-wrapper">
                                            <div class="product-img">
                                                <a href="shop.php?sub=<?= $subcategory['id'] ?>">
                                                    <img alt="" src="assets/img/subcategories/<?= $subcategory['image'] ?>">
                                                </a>
                                                <div class="product-action">
                                                    <a class="action-wishlist" href="#" title="Wishlist">
                                                        <i class="ion-android-favorite-outline"></i>
                                                    </a>
                                                    <a class="action-cart" href="#" title="Add To Cart">
                                                        <i class="ion-ios-shuffle-strong"></i>
                                                    </a>
                                                    <a class="action-compare" href="#" data-target="#exampleModal" data-toggle="modal" title="Quick View">
                                                        <i class="ion-ios-search-strong"></i>
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="product-content text-left">
                                                <div class="product-hover-style">
                                                    <div class="product-title">
                                                        <h4>
                                                            <a href="shop.php?sub=<?= $subcategory['id'] ?>"><?= $subcategory['name_en'] ?></a>
                                                        </h4>
                                                    </div>
                        
                                                </div>
                                               
                                            </div>
                                        
                                        </div>
                                    </div>

                            <?php }
                            }else{ ?>
                                    <div class="product-width pro-list-none col-12 mb-30">
                                        <div class="alert alert-warning">No Subs Yet</div>
                                    </div>
                            <?php } ?>


                        </div>
                    </div>
                    
                </div>
            </div>
            <div class="col-lg-3">
               
            </div>
        </div>
    </div>
</div>
<?php
include_once "views/layouts/footer.php";
?>