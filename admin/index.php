<?php
if (!isset($_SESSION)){
    session_start();
}

require_once '../inc/db.php';

if(!isset($_SESSION['admin'])){
    header('Location: inc/login.php');
    exit();
}

require 'inc/header_admin.php'; ?>

    <section>
        <div class="container">
            <div class="row"><br>
                <div class="col-sm-3">
                    <div class="left-sidebar">
                        <h2>Admin</h2>
                        <div class="panel-group category-products" id="accordian"><!--category-productsr-->
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title"><a href="../index.php">Aller sur le site</a></h4>
                                </div>
                            </div>

                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title"><a href="inc/produit_list.php">Produits</a></h4>
                                </div>
                            </div>

                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title"><a href="inc/categ_list.php">Categories</a></h4>
                                </div>
                            </div>

                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <a data-toggle="collapse" data-parent="#accordian" href="#article">
                                            <span class="badge pull-right"><i class="fa fa-angle-double-down"></i></span>
                                            Articles
                                        </a>
                                    </h4>
                                </div>
                                <div id="article" class="panel-collapse collapse">
                                    <div class="panel-body">
                                        <ul>
                                            <li><a href="#"><span class="fa fa-plus"> Ajouter nouveau article</span></a></li>
                                            <li><a href="#"><span class="fa fa-list"> Liste des articles</span></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div><!--/category-productsr-->
                    </div>
                </div>


                <div class="col-sm-9 padding-right">
                    <div class="features_items"><!--features_items-->
                        <h2 class="title text-center">Review</h2>
                        <div class="col-sm-4">
                            <div class="alert alert-success" role="alert">
                                <h3 class="alert-heading">Produits <span style="font-size: 30px" class="badge badge-light pull-right">9</span></h3>
                                <p><a href="#">See more &rightarrow;</a></p>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="alert alert-warning" role="alert">
                                <h3 class="alert-heading">Users <span style="font-size: 30px" class="badge badge-light pull-right">10</span></h3>
                                <p><a href="#">See more &rightarrow;</a></p>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="alert alert-info" role="alert">
                                <h3 class="alert-heading">Articles <span style="font-size: 30px" class="badge badge-light pull-right">2</span></h3>
                                <p><a href="#">See more &rightarrow;</a></p>
                            </div>
                        </div>
                    </div><!--features_items-->

                    <hr>
                    <div class="row">
                        <h2 class="title text-center">Liste des produits</h2>

                        <table class="table table-image">
                            <thead>
                            <tr>
                                <th scope="col">Photo</th>
                                <th scope="col">Nom</th>
                                <th scope="col">Categorie</th>
                                <th scope="col">Prix</th>
                                <th scope="col">Stock</th>
                                <th scope="col">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            $req = $pdo->prepare('SELECT * FROM produits');
                            $req->execute();
                            $prods = $req->fetchAll();

                            foreach ($prods as $prod){ ?>
                                <tr>
                                    <td class="w-25">
                                        <img style="height: 75px;" src="<?= BASE_NAME.$prod->img_link; ?>" class="img-fluid img-thumbnail" alt="Sheep">
                                    </td>
                                    <td><?= $prod->nom; ?></td>
                                    <td>
                                        <?php
                                        $req = $pdo->prepare('SELECT * FROM category WHERE id = '.$prod->category_id);
                                        $req->execute();
                                        $catg = $req->fetch();

                                        echo strtoupper($catg->nom);
                                        ?>
                                    </td>
                                    <td><?= $prod->prix; ?> MGA</td>
                                    <td><?= $prod->stock; ?></td>
                                    <td>
                                        <a class="btn btn-info" href=""  data-toggle="modal" data-target="#exampleModalLive<?= $prod->id; ?>"><span class="fa fa-edit"> </span></a>
                                        <a class="btn btn-danger" href="produit_list.php?id=<?= $prod->id; ?>"><span class="fa fa-trash-o"> </span></a>
                                    </td>
                                </tr>

                                <div id="exampleModalLive<?= $prod->id; ?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalLiveLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-body">
                                                <div class="login-form"><!--login form-->
                                                    <img class="text-center" src="<?= BASE_NAME; ?>images/home/logo.png" alt="" />
                                                    <h2>Modification produits</h2>
                                                    <form action="produit_edit.php?id=<?= $prod->id; ?>" method="post" enctype="multipart/form-data">
                                                        <input class="form-control" type="text" placeholder="Nom du produit" name="nom" value="<?= $prod->nom; ?>" required/>
                                                        <br>
                                                        <input class="form-control" type="text" placeholder="Prix du produit" name="prix" value="<?= $prod->prix; ?>" required/>
                                                        <br>
                                                        <select name="categ" required>
                                                            <option value="<?= $prod->category_id; ?>" selected>Categorie du produit...</option>

                                                            <?php
                                                            $req = $pdo->prepare('SELECT * FROM category');
                                                            $req->execute();
                                                            $catgs = $req->fetchAll();

                                                            foreach ($catgs as $catg){ ?>
                                                                <option value="<?= $catg->id; ?>"><?= strtoupper($catg->nom); ?></option>
                                                            <?php } ?>
                                                        </select><br><br>

                                                        <input class="form-control" type="text" placeholder="Nombre d'arrivage" name="nombre" value="<?= $prod->stock; ?>" required/>

                                                        <div class="modal-footer">
                                                            <button type="submit" class="btn btn-success pull-right">Modifier</button>
                                                        </div>
                                                    </form>
                                                </div><!--/login form-->
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            <?php } ?>

                            </tbody>
                        </table>

                    </div>
                </div>

            </div>
    </section>

<?php require 'inc/footer_admin.php';
