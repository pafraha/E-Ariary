<?php
if (!session_status()){
    session_start();
}


if(isset($_SESSION['admin'])){
    header('Location: ../index.php');
    exit();
}

// varible globals pour eviter les erreurs sur les fihiers externes
define('BASE_NAME', 'http://' . $_SERVER['SERVER_NAME'] . '/eshopper/');
require_once 'header_admin.php';

$json = file_get_contents(BASE_NAME.'documents/password.json');

$auth = json_decode($json, true);

if (!empty($_POST)) {
    $errors = array();

    if (!empty($_POST) && !empty($_POST['login']) && !empty($_POST['password'])){
        if ($_POST['login'] == $auth['admin']['login']){
            if (password_verify($_POST['password'], $auth['admin']['password'])){

                session_start();
                $_SESSION['admin'] = $auth['admin']['login'];

                header('Location: ../index.php');
            } else {
                $errors['fail'] = 'Login failed due to the wrong indetification';
            }
        }
    } else {
        $errors['vide'] = 'Tous les champs sont obligatoire.';
    }
}


if (isset($errors)){ ?>
    <section class="container">
        <div class="row">
            <div class="alert-dang">
                <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
                <div class="text-center">
                    <strong>Erreurs : </strong>
                    <ul>
                        <?php foreach ($errors as $error){ ?><li><?= $error; ?></li><?php } ?>
                    </ul>
                </div>
            </div>
        </div>
    </section>
<?php } ?>

<section><!--form-->
    <div class="container">
        <div class="row">
            <div class="text-center col-sm-4 col-sm-offset-4">
                <div class="login-form"><!--login form-->
                    <br>
                    <a href="<?= BASE_NAME; ?>index.php"><img src="<?= BASE_NAME; ?>images/home/logo.png" alt="" /></a>
                    <img src="" alt="">
                    <h2>Connecter à l'Administration</h2>
                    <form action="login.php" method="post">
                        <input type="text" placeholder="Nom d'utilisateur" name="login"/>
                        <input type="password" placeholder="********" name="password"/>
                        <button type="submit" class="btn btn-default">Connexion</button>
                    </form>
                </div><!--/login form-->
            </div>
        </div>
    </div>
</section><!--/form-->
<hr>
<br>

<?php require_once 'footer_admin.php'; ?>
