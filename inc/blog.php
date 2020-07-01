<?php require_once 'header.php'; ?>

<section>
    <div class="container">
        <div class="row">
            <?php include_once 'menu_left.php'; ?>

            <div class="col-sm-9">
                <div class="blog-post-area">
                    <h2 class="title text-center">Article</h2>
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
                            <img src="../images/blog/blog1.jpg" alt="">
                        </a>
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p> <br>
                        <p>
                            Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.</p> <br>
                        <p>
                            Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt.</p> <br>
                        <p>
                            Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem.
                        </p>
                    </div>
                </div><!--/blog-post-area-->

                <br>
                <div class="rating-area">
                    <ul class="ratings">
                        <li class="rate-this">Commentaires:</li>
                </div><!--/rating-area-->

                <div class="media commnets">
                    <a class="pull-left" href="#">
                        <img class="media-object" src="../images/blog/man-one.jpg" alt="">
                    </a>
                    <div class="media-body">
                        <h4 class="media-heading">Annie Davis</h4>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.  Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                    </div>
                </div><!--Comments-->

                <div class="response-area">
                    <h2>3 RESPONSES</h2>
                    <ul class="media-list">
                        <li class="media">
                            <a class="pull-left" href="#">
                                <img class="media-object" src="../images/blog/man-two.jpg" alt="">
                            </a>
                            <div class="media-body">
                                <ul class="sinlge-post-meta">
                                    <li><i class="fa fa-user"></i>Janis Gallagher</li>
                                    <li><i class="fa fa-clock-o"></i> 1:33 pm</li>
                                    <li><i class="fa fa-calendar"></i> DEC 5, 2013</li>
                                </ul>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.  Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                                <a class="btn btn-primary" href="#"><i class="fa fa-reply"></i>Replay</a>
                            </div>
                        </li>
                        <li class="media">
                            <a class="pull-left" href="#">
                                <img class="media-object" src="../images/blog/man-four.jpg" alt="">
                            </a>
                            <div class="media-body">
                                <ul class="sinlge-post-meta">
                                    <li><i class="fa fa-user"></i>Janis Gallagher</li>
                                    <li><i class="fa fa-clock-o"></i> 1:33 pm</li>
                                    <li><i class="fa fa-calendar"></i> DEC 5, 2013</li>
                                </ul>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.  Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                                <a class="btn btn-primary" href="#"><i class="fa fa-reply"></i>Replay</a>
                            </div>
                        </li>
                    </ul>
                </div><!--/Response-area-->

                <div class="replay-box">
                    <div class="row">
                        <div class="col-sm-4">
                            <h2>Donner une reponse</h2>
                            <form>
                                <div class="blank-arrow">
                                    <label>Nom</label>
                                </div>
                                <span>*</span>
                                <input type="text" placeholder="Nom et Prénoms...">
                                <div class="blank-arrow">
                                    <label>Adresse mail</label>
                                </div>
                                <span>*</span>
                                <input type="email" placeholder="Votre adresse mail...">
                            </form>
                        </div>
                        <div class="col-sm-8">
                            <div class="text-area">
                                <div class="blank-arrow">
                                    <label>Votre commentaire</label>
                                </div>
                                <span>*</span>
                                <textarea name="message" rows="11"></textarea>
                                <a class="btn btn-primary" href="#">Commenter</a>
                            </div>
                        </div>
                    </div>
                </div><!--/Repaly Box-->
            </div>
        </div>
    </div>
</section>


<?php require_once 'footer.php'; ?>
