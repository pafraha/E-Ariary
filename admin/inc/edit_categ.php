<?php

if (!isset($_SESSION)){
    session_start();
    require_once '../../inc/db.php';
}

if (isset($_GET) && !empty($_GET)) {
    $errors = array();


    if (!empty($_GET) && !empty($_POST['categ'])){
        if (empty($errors)){
            $reqt = $pdo->prepare("UPDATE category SET nom = ? WHERE id = ".$_GET['id']);

            $reqt->execute([$_POST['categ']]);

            $errors['success'] = 'Categorie bien supprimée';
        }
    } else {
        $errors['vide'] = 'Tous les champs sont obligatoire.';
    }
}

header('Location: categ_list.php');
