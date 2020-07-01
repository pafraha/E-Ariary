<?php
if (!isset($_SESSION)){
    session_start();
    require_once '../../inc/db.php';
}

if(!isset($_SESSION['admin'])){
    header('Location: inc/login.php');
    exit();
}

if (!empty($_POST)) {
    $errors = array();

    if (!empty($_POST) && !empty($_POST['categ'])){

        if (empty($errors)){

            $reqt = $pdo->prepare("INSERT INTO category SET nom = ?, created_at = ?");
            $reqt->execute([
                $_POST['categ'],
                date('Y-m-d H:i:s')
            ]);

            $errors['success'] = 'Nouveau categorie ajouter';
        }
    } else {
        $errors['vide'] = 'Tous les champs sont obligatoire.';
    }
}

if (isset($_GET) && !empty($_GET)) {
    $errors = array();

    if (!empty($_GET) && !empty($_GET['id'])){
        if (empty($errors)){
            $reqt = $pdo->prepare("DELETE FROM produits WHERE id = ?");
            $reqt->execute([$_GET['id']]);

            $errors['success'] = 'Produit bien supprimée';
        }
    } else {
        $errors['vide'] = 'Tous les champs sont obligatoire.';
    }
}

require_once '../../inc/functions.php';

require 'header_admin.php';

if (isset($errors['success'])){ ?>
    <section class="container">
        <div class="row">
            <div class="alert-suc">
                <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
                <div class="text-center">
                    <?= $errors['success']; ?>
                </div>
            </div>
        </div>
    </section>
    <?php
}

if (isset($errors['vide'])){ ?>
    <section class="container">
        <div class="row">
            <div class="alert-dang">
                <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
                <div class="text-center">
                    <?= $errors['vide']; ?>
                </div>
            </div>
        </div>
    </section>
    <?php } ?>

    <section>
        <div class="container">
            <div class="row"><br>
                <?php include_once 'menu_admin.php'; ?>


                <div class="col-sm-2">
                </div>

                <div class="col-sm-5 padding-right">
                    <div class="row">
                        <h2 class="title text-center">Liste des categories</h2>

                        <div id="exampleModalLive" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalLiveLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-body">
                                        <div class="login-form"><!--login form-->
                                            <img class="text-center" src="<?= BASE_NAME; ?>images/home/logo.png" alt="" />
                                            <h2>Nouveau categorie</h2>
                                            <form action="categ_list.php" method="post">
                                                <input type="text" placeholder="Nom du categorie" name="categ" required/>
                                                <div class="modal-footer">
                                                    <button type="submit" class="btn btn-success pull-right">Sauvegarder</button>
                                                </div>
                                            </form>
                                        </div><!--/login form-->
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="bd-example pull-right">
                            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModalLive">
                                Ajouter category
                            </button>
                        </div>

                        <table class="table table-striped table-hover">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Nom du categorie</th>
                                <th scope="col">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            $req = $pdo->prepare('SELECT * FROM category');
                            $req->execute();
                            $catgs = $req->fetchAll();
                            $j = 0;

                            foreach ($catgs as $catg){ ?>
                                <tr>
                                    <th scope="row"><?= ++$j; ?></th>
                                    <td><?= $catg->nom; ?></td>
                                    <td>
                                        <button class="btn btn-info" href=""  data-toggle="modal" data-target="#exampleModalLive<?= $catg->id; ?>"><span class="fa fa-edit"> </span></button>
                                        <a class="btn btn-danger" href="categ_list.php?id=<?= $catg->id; ?>"><span class="fa fa-trash-o"> </span></a>
                                    </td>
                                </tr>

                                <div id="exampleModalLive<?= $catg->id; ?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalLiveLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-body">
                                                <div class="login-form"><!--login form-->
                                                    <img class="text-center" src="<?= BASE_NAME; ?>images/home/logo.png" alt="" />
                                                    <h2>Modifier categorie</h2>
                                                    <form action="edit_categ.php?id=<?= $catg->id; ?>" method="post">
                                                        <input class="form-control" type="text" placeholder="Nom du categorie" name="categ" value="<?= $catg->nom; ?>" required/>
                                                        <div class="modal-footer">
                                                            <button type="submit" class="btn btn-success pull-right">Sauvegarder</button>
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

<?php require 'footer_admin.php';
