<!-- HEADER -->
<?php
include_once __DIR__ . '/../components/header.php';
//include_once './functions/reviews-helper.php';
//include_once './functions/product-helper.php';
?>
<!-- /HEADER -->

<!-- BREADCRUMB -->
<div id="breadcrumb" class="section">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row">
            <div class="col-md-12">
                <ul class="breadcrumb-tree">
                    <li><a href="#">Home</a></li>
                    <li><a href="#">All Categories</a></li>
                    <li><a href="#">Accessories</a></li>
                    <li><a href="#">Headphones</a></li>
                    <li class="active"><?= $product->getName() ?></li>
                </ul>
            </div>
        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
</div>
<!-- /BREADCRUMB -->

<!-- SECTION -->
<div class="section">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row">
            <!-- Product main img -->
            <div class="col-md-5 col-md-push-2">
                <div id="product-main-img">
                    <?php foreach ($images as $value): ?>
                        <div class="product-preview">
                            <img src="/public/img/<?= $value->getName() ?>" alt="">
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
            <!-- /Product main img -->

            <!-- Product thumb imgs -->
            <div class="col-md-2  col-md-pull-5">
                <div id="product-imgs">
                    <?php foreach ($images as $value): ?>
                        <div class="product-preview">
                            <img src="/public/img/<?= $value->getName() ?>" alt="">
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
            <!-- /Product thumb imgs -->

            <!-- Product details -->
            <div class="col-md-5">
                <div class="product-details">
                    <h2 class="product-name"><?= $product->getName() ?></h2>
                    <div>
                        <div class="product-rating">
                            <?php for ($i = 0; $i < 5; $i++): ?>
                                <?php if ($productRating >= $i + 1): ?>
                                    <i class="fa fa-star"></i>
                                <?php else: ?>
                                    <i class="fa fa-star-o"></i>
                                <?php endif; ?>
                            <?php endfor; ?>
                        </div>
                        <a class="review-link" href="#"><?= $amountRating ?> Review(s) | Add your review</a>
                    </div>
                    <div>
                        <h3 class="product-price">
                            $<?= sprintf('%.2f', $product->getCost() - $product->getCost() * $product->getDiscount() / 100) ?>
                            <?php if ($product->getDiscount()): ?>
                                <del class="product-old-price">$<?= sprintf('%.2f', $product->getCost()) ?></del>
                            <?php endif; ?>
                        </h3>
                        <?php if ($product->getAmount()): ?>
                            <span class="product-available">In Stock</span>
                        <?php endif; ?>
                    </div>
                    <p><?= $product->getSmallDescription() ?></p>

                    <div class="product-options">
                        <label>
                            Size
                            <select class="input-select">
                                <option value="0">X</option>
                            </select>
                        </label>
                        <label>
                            Color
                            <select class="input-select">
                                <option value="0">Red</option>
                            </select>
                        </label>
                    </div>

                    <div class="add-to-cart">
                        <div class="qty-label">
                            Qty
                            <div class="input-number">
                                <input type="number">
                                <span class="qty-up">+</span>
                                <span class="qty-down">-</span>
                            </div>
                        </div>
                        <button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> add to cart</button>
                    </div>

                    <ul class="product-btns">
                        <li><a href="#"><i class="fa fa-heart-o"></i> add to wishlist</a></li>
                        <li><a href="#"><i class="fa fa-exchange"></i> add to compare</a></li>
                    </ul>

                    <ul class="product-links">
                        <li>Category:</li>
                        <li><a href="#">Headphones</a></li>
                        <li><a href="#">Accessories</a></li>
                    </ul>

                    <ul class="product-links">
                        <li>Share:</li>
                        <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                        <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                        <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                        <li><a href="#"><i class="fa fa-envelope"></i></a></li>
                    </ul>

                </div>
            </div>
            <!-- /Product details -->

            <!-- Product tab -->
            <div class="col-md-12">
                <div id="product-tab">
                    <!-- product tab nav -->
                    <ul class="tab-nav">
                        <li class="active"><a data-toggle="tab" href="#tab1">Description</a></li>
                        <li><a data-toggle="tab" href="#tab2">Details</a></li>
                        <li><a data-toggle="tab" href="#tab3">Reviews (<?= $amountRating ?>)</a></li>
                    </ul>
                    <!-- /product tab nav -->

                    <!-- product tab content -->
                    <div class="tab-content">
                        <!-- tab1  -->
                        <div id="tab1" class="tab-pane fade in active">
                            <div class="row">
                                <div class="col-md-12">
                                    <p><?= $product->getSmallDescription() ?></p>
                                </div>
                            </div>
                        </div>
                        <!-- /tab1  -->

                        <!-- tab2  -->
                        <div id="tab2" class="tab-pane fade in">
                            <div class="row">
                                <div class="col-md-12">
                                    <p><?= $product->getDescription() ?></p>
                                </div>
                            </div>
                        </div>
                        <!-- /tab2  -->

                        <!-- tab3  -->
                        <div id="tab3" class="tab-pane fade in">
                            <div class="row">
                                <!-- Rating -->
                                <div class="col-md-3">
                                    <div id="rating">
                                        <div class="rating-avg">
                                            <span><?= $productRating ?></span>
                                            <div class="rating-stars">
                                                <?php for ($i = 0; $i < 5; $i++): ?>
                                                    <?php if ($productRating >= $i + 1): ?>
                                                        <i class="fa fa-star"></i>
                                                    <?php else: ?>
                                                        <i class="fa fa-star-o"></i>
                                                    <?php endif; ?>
                                                <?php endfor; ?>
                                            </div>
                                        </div>
                                        <ul class="rating">
                                            <li>
                                                <div class="rating-stars">
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                </div>
                                                <div class="rating-progress">
                                                    <div style="width: <?= $starArray[4] / (($amountRating) ? $amountRating : 1) * 100 ?>%;"></div>
                                                </div>
                                                <span class="sum"><?= $starArray[4] ?></span>
                                            </li>
                                            <li>
                                                <div class="rating-stars">
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star-o"></i>
                                                </div>
                                                <div class="rating-progress">
                                                    <div style="width: <?= $starArray[3] / (($amountRating) ? $amountRating : 1) * 100 ?>%;"></div>
                                                </div>
                                                <span class="sum"><?= $starArray[3] ?></span>
                                            </li>
                                            <li>
                                                <div class="rating-stars">
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star-o"></i>
                                                    <i class="fa fa-star-o"></i>
                                                </div>
                                                <div class="rating-progress">
                                                    <div style="width: <?= $starArray[2] / (($amountRating) ? $amountRating : 1) * 100 ?>%;"></div>
                                                </div>
                                                <span class="sum"><?= $starArray[2] ?></span>
                                            </li>
                                            <li>
                                                <div class="rating-stars">
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star-o"></i>
                                                    <i class="fa fa-star-o"></i>
                                                    <i class="fa fa-star-o"></i>
                                                </div>
                                                <div class="rating-progress">
                                                    <div style="width: <?= $starArray[1] / (($amountRating) ? $amountRating : 1) * 100 ?>%;"></div>
                                                </div>
                                                <span class="sum"><?= $starArray[1] ?></span>
                                            </li>
                                            <li>
                                                <div class="rating-stars">
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star-o"></i>
                                                    <i class="fa fa-star-o"></i>
                                                    <i class="fa fa-star-o"></i>
                                                    <i class="fa fa-star-o"></i>
                                                </div>
                                                <div class="rating-progress">
                                                    <div style="width: <?= $starArray[0] / (($amountRating) ? $amountRating : 1) * 100 ?>%;"></div>
                                                </div>
                                                <span class="sum"><?= $starArray[0] ?></span>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <!-- /Rating -->

                                <!-- Reviews -->
                                <div class="col-md-6">
                                    <div id="reviews">
                                        <ul class="reviews">
                                            <?php if ($rating): ?>
                                                <?php foreach ($rating as $value): ?>
                                                    <li>
                                                        <div class="review-heading">
                                                            <h5 class="name"><?= $value[2] ?></h5>
                                                            <p class="date"><?= $value[3] ?></p>
                                                            <!--                                                    <p class="date">27 DEC 2018, 8:0 PM</p>-->
                                                            <div class="review-rating">
                                                                <?php for ($i = 0; $i < 5; $i++): ?>
                                                                    <?php if ($value[0] >= $i + 1): ?>
                                                                        <i class="fa fa-star"></i>
                                                                    <?php else: ?>
                                                                        <i class="fa fa-star-o"></i>
                                                                    <?php endif; ?>
                                                                <?php endfor; ?>
                                                                <!--                                                        <i class="fa fa-star"></i>-->
                                                                <!--                                                        <i class="fa fa-star"></i>-->
                                                                <!--                                                        <i class="fa fa-star"></i>-->
                                                                <!--                                                        <i class="fa fa-star"></i>-->
                                                                <!--                                                        <i class="fa fa-star-o empty"></i>-->
                                                            </div>
                                                        </div>
                                                        <div class="review-body">
                                                            <p><?= $value[1] ?></p>
                                                        </div>
                                                    </li>
                                                <?php endforeach; ?>
                                            <?php endif; ?>
                                        </ul>
                                        <ul class="reviews-pagination">
                                            <li class="active">1</li>
                                            <li><a href="#">2</a></li>
                                            <li><a href="#">3</a></li>
                                            <li><a href="#">4</a></li>
                                            <li><a href="#"><i class="fa fa-angle-right"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                                <!-- /Reviews -->

                                <!-- Review Form -->
                                <div class="col-md-3">
                                    <div id="review-form">
                                        <form class="review-form" action="<?= $_SERVER['PHP_SELF'] ?>" method="POST"
                                              enctype="application/x-www-form-urlencoded">
                                            <input class="input" type="text" name="reviewer" placeholder="Your Name">
                                            <input class="input" type="email" name="email" placeholder="Your Email">
                                            <textarea class="input" name="feedback"
                                                      placeholder="Your Review"></textarea>
                                            <div class="input-rating">
                                                <span>Your Rating: </span>
                                                <div class="stars">
                                                    <input id="star5" name="rating" value="5" type="radio"><label
                                                            for="star5"></label>
                                                    <input id="star4" name="rating" value="4" type="radio"><label
                                                            for="star4"></label>
                                                    <input id="star3" name="rating" value="3" type="radio"><label
                                                            for="star3"></label>
                                                    <input id="star2" name="rating" value="2" type="radio"><label
                                                            for="star2"></label>
                                                    <input id="star1" name="rating" value="1" type="radio"><label
                                                            for="star1"></label>
                                                </div>
                                            </div>
                                            <input type="hidden" name="product_id" value="<?= $product->getId() ?>">
                                            <button type="submit" class="primary-btn">Submit</button>
                                        </form>
                                    </div>
                                </div>
                                <!-- /Review Form -->
                            </div>
                        </div>
                        <!-- /tab3  -->
                    </div>
                    <!-- /product tab content  -->
                </div>
            </div>
            <!-- /product tab -->
        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
</div>
<!-- /SECTION -->

<!-- Section -->
<div class="section">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row">

            <div class="col-md-12">
                <div class="section-title text-center">
                    <h3 class="title">Related Products</h3>
                </div>
            </div>

            <!-- product -->
            <div class="col-md-3 col-xs-6">
                <div class="product">
                    <div class="product-img">
                        <img src="/public/img/product01.png" alt="">
                        <div class="product-label">
                            <span class="sale">-30%</span>
                        </div>
                    </div>
                    <div class="product-body">
                        <p class="product-category">Category</p>
                        <h3 class="product-name"><a href="#">product name goes here</a></h3>
                        <h4 class="product-price">$980.00
                            <del class="product-old-price">$990.00</del>
                        </h4>
                        <div class="product-rating">
                        </div>
                        <div class="product-btns">
                            <button class="add-to-wishlist"><i class="fa fa-heart-o"></i><span class="tooltipp">add to wishlist</span>
                            </button>
                            <button class="add-to-compare"><i class="fa fa-exchange"></i><span class="tooltipp">add to compare</span>
                            </button>
                            <button class="quick-view"><i class="fa fa-eye"></i><span class="tooltipp">quick view</span>
                            </button>
                        </div>
                    </div>
                    <div class="add-to-cart">
                        <button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> add to cart</button>
                    </div>
                </div>
            </div>
            <!-- /product -->

            <!-- product -->
            <div class="col-md-3 col-xs-6">
                <div class="product">
                    <div class="product-img">
                        <img src="/public/img/product02.png" alt="">
                        <div class="product-label">
                            <span class="new">NEW</span>
                        </div>
                    </div>
                    <div class="product-body">
                        <p class="product-category">Category</p>
                        <h3 class="product-name"><a href="#">product name goes here</a></h3>
                        <h4 class="product-price">$980.00
                            <del class="product-old-price">$990.00</del>
                        </h4>
                        <div class="product-rating">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                        </div>
                        <div class="product-btns">
                            <button class="add-to-wishlist"><i class="fa fa-heart-o"></i><span class="tooltipp">add to wishlist</span>
                            </button>
                            <button class="add-to-compare"><i class="fa fa-exchange"></i><span class="tooltipp">add to compare</span>
                            </button>
                            <button class="quick-view"><i class="fa fa-eye"></i><span class="tooltipp">quick view</span>
                            </button>
                        </div>
                    </div>
                    <div class="add-to-cart">
                        <button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> add to cart</button>
                    </div>
                </div>
            </div>
            <!-- /product -->

            <div class="clearfix visible-sm visible-xs"></div>

            <!-- product -->
            <div class="col-md-3 col-xs-6">
                <div class="product">
                    <div class="product-img">
                        <img src="/public/img/product03.png" alt="">
                    </div>
                    <div class="product-body">
                        <p class="product-category">Category</p>
                        <h3 class="product-name"><a href="#">product name goes here</a></h3>
                        <h4 class="product-price">$980.00
                            <del class="product-old-price">$990.00</del>
                        </h4>
                        <div class="product-rating">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star-o"></i>
                        </div>
                        <div class="product-btns">
                            <button class="add-to-wishlist"><i class="fa fa-heart-o"></i><span class="tooltipp">add to wishlist</span>
                            </button>
                            <button class="add-to-compare"><i class="fa fa-exchange"></i><span class="tooltipp">add to compare</span>
                            </button>
                            <button class="quick-view"><i class="fa fa-eye"></i><span class="tooltipp">quick view</span>
                            </button>
                        </div>
                    </div>
                    <div class="add-to-cart">
                        <button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> add to cart</button>
                    </div>
                </div>
            </div>
            <!-- /product -->

            <!-- product -->
            <div class="col-md-3 col-xs-6">
                <div class="product">
                    <div class="product-img">
                        <img src="/public/img/product04.png" alt="">
                    </div>
                    <div class="product-body">
                        <p class="product-category">Category</p>
                        <h3 class="product-name"><a href="#">product name goes here</a></h3>
                        <h4 class="product-price">$980.00
                            <del class="product-old-price">$990.00</del>
                        </h4>
                        <div class="product-rating">
                        </div>
                        <div class="product-btns">
                            <button class="add-to-wishlist"><i class="fa fa-heart-o"></i><span class="tooltipp">add to wishlist</span>
                            </button>
                            <button class="add-to-compare"><i class="fa fa-exchange"></i><span class="tooltipp">add to compare</span>
                            </button>
                            <button class="quick-view"><i class="fa fa-eye"></i><span class="tooltipp">quick view</span>
                            </button>
                        </div>
                    </div>
                    <div class="add-to-cart">
                        <button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> add to cart</button>
                    </div>
                </div>
            </div>
            <!-- /product -->

        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
</div>
<!-- /Section -->

<!-- FOOTER -->
<?php include_once __DIR__ . '/../components/footer.php'; ?>
<!-- /FOOTER -->