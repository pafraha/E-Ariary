<?php require_once 'header.php'; ?>

<section>
    <div class="container">
        <div class="row">

            <?php include_once 'menu_left.php'; ?>

            <div class="col-sm-9">
                <div class="blog-post-area">
                    <h2 class="title text-center">Dernier actualité</h2>

                    <?php for ($i=1; $i<=3; $i++){ ?>
                        <div class="single-blog-post">
                            <h3>Girls Pink T Shirt arrived in store</h3>
                            <div class="post-meta">
                                <ul>
                                    <li><i class="fa fa-user"></i> Admin</li>
                                    <li><i class="fa fa-clock-o"></i> 1:33 pm</li>
                                    <li><i class="fa fa-calendar"></i> DEC 5, 2013</li>
                                </ul>
                            </div>
                            <a href="#">
                                <img src="../images/blog/blog<?= $i; ?>.jpg" alt="">
                            </a>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>
                            <a  class="btn btn-primary" href="#">Read More</a>
                        </div>
                    <?php } ?>

                    <div class="pagination-area text-center">
                        <ul class="pagination">
                            <li><a href="#"><i class="fa fa-angle-double-left"></i></a></li>
                            <li><a href="#" class="active">1</a></li>
                            <li><a href="#">2</a></li>
                            <li><a href="#">3</a></li>
                            <li><a href="#"><i class="fa fa-angle-double-right"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php require_once 'footer.php'; ?>
