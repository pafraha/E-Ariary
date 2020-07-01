<?php require_once 'header.php'; ?>

<section id="advertisement">
    <div class="container">
        <img src="images/shop/advertisement.jpg" alt="" />
    </div>
</section>

<section>
    <div class="container">
        <div class="row">

            <?php include_once 'menu_left.php'; ?>

            <div class="col-sm-9 padding-right">
                <div class="features_items"><!--features_items-->
                    <h2 class="title text-center">Features Items</h2>
                    <?php for ($i = 1; $i <= 12; $i++){ ?>

                    <div class="col-sm-4">
                        <div class="product-image-wrapper">
                            <div class="single-products">
                                <div class="productinfo text-center">
                                    <img src="../images/shop/product<?= $i; ?>.jpg" alt="" />
                                    <h2>$56</h2>
                                    <p>Easy Polo Black Edition</p>
                                </div>
                                <div class="product-overlay">
                                    <div class="overlay-content">
                                        <h2>$56</h2>
                                        <p>Easy Polo Black Edition</p>
                                        <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                                    </div>
                                </div>
                            </div>
                            <div class="choose">
                                <ul class="nav nav-pills nav-justified">
                                    <li><a href="#" ><i class="fa fa-shopping-cart"></i>Add to cart</a></li>
                                    <li><a href="#"><i class="fa fa-plus-square"></i>Add to wishlist</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <?php } ?>

                    <div class="text-center">
                        <ul class="pagination">
                            <li class="disabled"><a href="#">&laquo;</a></li>
                            <li class="active"><a href="#">1</a></li>
                            <li><a href="#">2</a></li>
                            <li><a href="#">3</a></li>
                            <li><a href="#">&raquo;</a></li>
                        </ul>
                    </div>
                </div><!--features_items-->
            </div>
        </div>
    </div>
</section>

<?php require_once 'footer.php'; ?>
