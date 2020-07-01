<?php

global $errors;

if (!empty($_POST)){


    $errors= array();

    require_once 'db.php';
    require_once 'functions.php';

    // Pour nom
    if (empty($_POST['nom']) || !preg_match('/^[a-zA-Z_]+$/', $_POST['nom'])){
        $errors['nom'] = 'Votre nom n\'est pas valide (lettre seulement)';
    }

    // Pour prenom ne contient que du lettre
    if (empty($_POST['prenoms']) || !preg_match('/^[a-zA-Z_]+$/', $_POST['prenoms'])){
        $errors['prenoms'] = 'Votre prénom n\'est pas valide (lettre seulement)';
    }

    // Pour empecher un user de ne pas taper n'import quoi
    if (empty($_POST['username']) || !preg_match('/^[a-zA-Z0-9_]+$/', $_POST['username'])){
        $errors['username'] = 'Votre pseudo n\'est pas valide (alphanumerique seulement)';
    } else {
        $req = $pdo->prepare('SELECT id FROM users WHERE username = ?');
        $req->execute([$_POST['username']]);
        $user = $req->fetch();

        if($user){
            $errors['username'] = 'Ce pseudo existe déjà';
        }
    }

    // Valider email et verifie si email est déjà dans la base de données
    if (empty($_POST['email']) || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
        $errors['email'] = 'Votre email saisi n\'est pas une forme valide';
    } else {
        $req = $pdo->prepare('SELECT id FROM users WHERE email = ?');
        $req->execute([$_POST['email']]);
        $user = $req->fetch();

        if($user){
            $errors['email'] = 'Cet email existe déjà';
        }
    }

    // Verifier si les mot de passe saisie sont identique
    if (empty($_POST['pwd']) || empty($_POST['pwd_conf']) || $_POST['pwd'] != $_POST['pwd_conf']){
        $errors['pwd'] = 'Les mots de passe n\'est pas identique ou invalide';
    }

    // traitement des information s'il y apas d'erreus
    if (empty($errors)){
        $reqt = $pdo->prepare("INSERT INTO users SET nom = ?, prenom = ?, username = ?, email = ?, password = ?, confirmation_token = ?, created_date = ?");
        $pwd = password_hash($_POST['pwd'], PASSWORD_BCRYPT);
        $reqt->execute([
            $_POST['nom'],
            $_POST['prenoms'],
            $_POST['username'],
            $_POST['email'],
            $pwd,
            str_random(250),
            date('Y-m-d H:i:s')
            ]);

        $_SESSION['user'] = array([$_POST['nom'], $_POST['nom']]);

        $errors['success'] = 'Veuillez activer votre en allant sur votre email et suivre les instructions enfin de confirmer votre inscription.';
    }

    //var_dump($errors); die();

    header('Location: ../index.php');
}
