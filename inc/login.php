<?php require_once 'header.php';

if (!isset($_SESSION)){
    session_start();
}

if(isset($_SESSION['user'])){
    header('Location: ../index.php');
    exit();
}

if (!empty($_POST) && !empty($_POST['username']) && !empty($_POST['password'])){
    require_once 'db.php';

    $req = $pdo->prepare('SELECT * FROM users WHERE (username = :username or email = :username)');
    $req->execute(['username' => $_POST['username']]);
    $user =  $req->fetch();

    if ($user){
        if(password_verify($_POST['password'], $user->password)){
            $_SESSION['user'] = $user;

            header('Location: ../index.php');
            exit();
        }
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
<?php }

if (isset($_SESSION['succes'])){ ?>

    <section class="container">
        <div class="row">
            <div class="alert-suc">
                <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
                <p class="text-center"><?php echo $errors['succes']; ?></p>
            </div>
        </div>
    </section>

<?php
} ?>


<section id="form"><!--form-->
    <div class="container">
        <div class="row">
            <div class="col-sm-4 col-sm-offset-1">
                <div class="login-form"><!--login form-->
                    <h2>Connecter à votre compte</h2>
                    <form action="login.php" method="post">
                        <input type="text" placeholder="Nom d'utilisateur ou Email" name="username"/>
                        <input type="password" placeholder="********" name="password"/>
                        <span>
                            <input type="checkbox" class="checkbox">
                            Restez connecté !
                        </span>
                        <input type="hidden" name="token" value="<?= str_random(60); ?>" />
                        <button type="submit" class="btn btn-default">Connexion</button>
                    </form>
                </div><!--/login form-->
            </div>
            <div class="col-sm-1">
                <h2 class="or">OU</h2>
            </div>
            <div class="col-sm-4">
                <div class="signup-form"><!--sign up form-->
                    <h2>Inscrivez-vous gratuitement </h2>
                    <form action="register.php" method="post">
                        <input type="text" placeholder="Nom" name="nom"/>
                        <input type="text" placeholder="Prénoms" name="prenoms"/>
                        <input type="text" placeholder="username" name="username"/>
                        <input type="email" placeholder="adresse@mail.com" name="email"/>

                        <input type="password" placeholder="********" name="pwd"/>
                        <input type="password" placeholder="********" name="pwd_conf"/>

                        <input type="hidden" name="token" value="<?= str_random(60); ?>" />

                        <button type="submit" class="btn btn-default">Inscription</button>
                    </form>
                </div><!--/sign up form-->
            </div>
        </div>
    </div>
</section><!--/form-->

<?php require_once 'footer.php'; ?>
