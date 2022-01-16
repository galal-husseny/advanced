<?php

include_once "app/database/models/Product.php";
$productObject = new Product;
if ($_GET) {
    if (isset($_GET['pro'])) {
        if (is_numeric($_GET['pro'])) {
            $productObject->setId($_GET['pro']);
            $findResult = $productObject->find();
            if ($findResult) {
                $product = $findResult->fetch_object();
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

$title = $product->name_en;
include_once "views/layouts/header.php";
include_once "views/layouts/nav.php";
include_once "views/layouts/breadcrumb.php";
// display product data in html
?>
<!-- Breadcrumb Area End -->
<!-- Product Deatils Area Start -->
<div class="product-details pt-100 pb-95">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-12">
                <div class="product-details-img">
                    <img class="zoompro" src="assets/img/product/<?= $product->image ?>" data-zoom-image="assets/img/product/<?= $product->image ?>" alt="<?= $product->name_en ?>" />
                </div>
            </div>
            <div class="col-lg-6 col-md-12">
                <div class="product-details-content">
                    <h4><?= $product->name_en ?></h4>
                    <div class="rating-review">
                        <div class="pro-dec-rating">
                            <?php
                            for ($i = 1; $i <= $product->reviews_avg; $i++) { ?>
                                <i class="ion-android-star-outline theme-star"></i>
                            <?php }
                            for ($i = 1; $i <= 5 - $product->reviews_avg; $i++) { ?>
                                <i class="ion-android-star-outline"></i>
                            <?php } ?>



                        </div>
                        <div class="pro-dec-review">
                            <ul>
                                <li><?= $product->reviews_count ?> Reviews </li>
                                <li> Add Your Reviews</li>
                            </ul>
                        </div>
                    </div>
                    <span><?= $product->price ?> EGP</span>
                    <div class="in-stock">
                        <?php
                        if ($product->quantity > 0 and $product->quantity <= 5) {
                            $message = "in stock ($product->quantity)";
                            $color = "warning";
                        } elseif ($product->quantity == 0) {
                            $message = "out of stock";
                            $color = "danger";
                        } else {
                            $message = "in stock";
                            $color = "success";
                        }
                        ?>
                        <p>Available: <span class="text-<?= $color ?>"><?= $message ?></span></p>
                    </div>
                    <p> <?= $product->desc_en ?> </p>
                    <div class="pro-dec-feature">
                        <ul>
                            <?php
                            $getSpecsByProductResult = $productObject->getSpecsByProduct();
                            if ($getSpecsByProductResult) {
                                $specs = $getSpecsByProductResult->fetch_all(MYSQLI_ASSOC);
                                foreach ($specs as $index => $spec) { ?>
                                    <li><?= $spec['name_en'] ?>: <span> <?= $spec['spec_value'] ?></span></li>
                            <?php }
                            }
                            ?>


                        </ul>
                    </div>
                    <div class="quality-add-to-cart">
                        <div class="quality">
                            <label>Qty:</label>
                            <input class="cart-plus-minus-box" type="text" name="qtybutton" value="02">
                        </div>
                        <div class="shop-list-cart-wishlist">
                            <a title="Add To Cart" href="#">
                                <i class="icon-handbag"></i>
                            </a>
                            <a title="Wishlist" href="#">
                                <i class="icon-heart"></i>
                            </a>
                        </div>
                    </div>
                    <div class="pro-dec-categories">
                        <ul>
                            <li><a href="shop-by-category.php?cat=<?= $product->category_id ?>"><?= $product->category_name_en ?></a></li>
                            <li><a href="shop.php?sub=<?= $product->subcategory_id ?>"><?= $product->subcategory_name_en ?>, </a></li>
                            <li><a href="shop.php?brand=<?= $product->brand_id ?>"><?= $product->brand_name_en ?>,</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Product Deatils Area End -->
<div class="description-review-area pb-70">
    <div class="container">
        <div class="description-review-wrapper">
            <div class="description-review-topbar nav text-center">
                <a class="active" data-toggle="tab" href="#des-details1">Description</a>
                <a data-toggle="tab" href="#des-details3">Review</a>
            </div>
            <div class="tab-content description-review-bottom">
                <div id="des-details1" class="tab-pane active">
                    <div class="product-description-wrapper">
                        <p><?= $product->desc_en ?></p>
                    </div>
                </div>
                <div id="des-details3" class="tab-pane">
                    <div class="rattings-wrapper">
                        <?php
                        $getreviewsByProductResult = $productObject->getReveiwsByPro();
                        if ($getreviewsByProductResult) {
                            $reviews = $getreviewsByProductResult->fetch_all(MYSQLI_ASSOC);
                            foreach ($getreviewsByProductResult as $index => $review) { ?>
                                <div class="sin-rattings">
                                    <div class="star-author-all">
                                        <div class="ratting-star f-left">
                                            <?php
                                            for ($i = 1; $i <= $review['value']; $i++) { ?>
                                                <i class="ion-star theme-color"></i>
                                            <?php }
                                            for ($i = 1; $i <= 5 - $review['value']; $i++) { ?>
                                                <i class="ion-android-star-outline"></i>
                                            <?php } ?>
                                            <span>(<?= $review['value'] ?>)</span>
                                        </div>
                                        <div class="ratting-author f-right">
                                            <h3><?= $review['full_name'] ?></h3>
                                            <span><?= $review['created_at'] ?></span>
                                        </div>
                                    </div>
                                    <p>
                                        <?= $review['comment'] ?>
                                    </p>
                                </div>
                        <?php }
                        }
                        ?>


                    </div>
                    <?php
                    if (isset($_SESSION['user'])) { ?>

                        <div class="ratting-form-wrapper">
                            <h3>Add your Comments :</h3>
                            <div class="ratting-form">
                                <form action="#">
                                    <div class="star-box">
                                        <h2>Rating:</h2>
                                        <div class="ratting-star">
                                            <i class="ion-star theme-color"></i>
                                            <i class="ion-star theme-color"></i>
                                            <i class="ion-star theme-color"></i>
                                            <i class="ion-star theme-color"></i>
                                            <i class="ion-star"></i>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="rating-form-style mb-20">
                                                <input placeholder="Name" type="text">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="rating-form-style mb-20">
                                                <input placeholder="Email" type="text">
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="rating-form-style form-submit">
                                                <textarea name="message" placeholder="Message"></textarea>
                                                <input type="submit" value="add review">
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>

                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="product-area pb-100">
    <div class="container">
        <div class="product-top-bar section-border mb-35">
            <div class="section-title-wrap">
                <h3 class="section-title section-bg-white">Related Products</h3>
            </div>
        </div>
        <div class="row">

            <div class="col-3">
                <div class="product-img">
                    <a href="product-details.html">
                        <img alt="" src="assets/img/product/product-1.jpg">
                    </a>
                    <span>-30%</span>
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
                                <a href="product-details.html">Le Bongai Tea</a>
                            </h4>
                        </div>
                        <div class="cart-hover">
                            <h4><a href="product-details.html">+ Add to cart</a></h4>
                        </div>
                    </div>
                    <div class="product-price-wrapper">
                        <span>$100.00 -</span>
                        <span class="product-price-old">$120.00 </span>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
<?php
include_once "views/layouts/footer.php";
?>