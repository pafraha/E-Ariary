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


    if (!empty($_POST) && !empty($_POST['nom']) && !empty($_POST['categ'])  && !empty($_POST['nombre']) && !empty($_POST['prix'])){

            // traitement d'image
            if (isset($_FILES['image'])) {
                $errors = array();
                $file_name = $_FILES['image']['name'];
                $file_size = $_FILES['image']['size'];
                $file_tmp = $_FILES['image']['tmp_name'];
                $file_type = $_FILES['image']['type'];

                $tmp = explode('.', $_FILES['image']['name']);
                $file_ext = strtolower(end($tmp));

                $extensions = array("jpeg", "jpg", "png");

                if (in_array($file_ext, $extensions) === false) {
                    $errors[] = "extension non autorisé, s'il vous plait prend JPEG or PNG file.";
                }

                if ($file_size > 2097152) {
                    $errors[] = 'File size must be excately 2 MB';
                }

                if (empty($errors) == true) {

                    move_uploaded_file($file_tmp, "../../images/" . $file_name);
                    //echo "Success";
                }
            }

            $reqt = $pdo->prepare("INSERT INTO produits SET nom = ?, img_link = ?, prix = ?, category_id = ?, stock = ?, created_at = ?");
            $reqt->execute([
                $_POST['nom'],
                "images/" . $file_name,
                $_POST['prix'],
                $_POST['categ'],
                $_POST['nombre'],
                date('Y-m-d H:i:s')
            ]);

            $errors['success'] = 'Nouveau produit ajouter';
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


                <div class="col-sm-9">
                    <div class="row">
                        <h2 class="title text-center">Liste des produits</h2>

                        <div id="exampleModalLive" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalLiveLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-body">
                                        <div class="login-form"><!--login form-->
                                            <img class="text-center" src="<?= BASE_NAME; ?>images/home/logo.png" alt="" />
                                            <h2>Nouveau produits</h2>
                                            <form action="produit_list.php" method="post" enctype="multipart/form-data">
                                                <input class="form-control" type="text" placeholder="Nom du produit" name="nom" required/>
                                                <input type="file" placeholder="Image" name="image" required/>
                                                <input class="form-control" type="text" placeholder="Prix du produit" name="prix" required/>

                                                <select name="categ" required>
                                                    <option selected>Categorie du produit...</option>

                                                    <?php
                                                    $req = $pdo->prepare('SELECT * FROM category');
                                                    $req->execute();
                                                    $catgs = $req->fetchAll();

                                                    foreach ($catgs as $catg){ ?>
                                                        <option value="<?= $catg->id; ?>"><?= strtoupper($catg->nom); ?></option>
                                                    <?php } ?>
                                                </select><br><br>

                                                <input class="form-control" type="text" placeholder="Nombre d'arrivage" name="nombre" required/>

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
                                Ajouter produits
                            </button>
                        </div>

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

<?php require 'footer_admin.php';
