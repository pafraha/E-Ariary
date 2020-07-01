<?php

if (!isset($_SESSION)){
    session_start();
    require_once '../../inc/db.php';
}

if (isset($_GET) && !empty($_GET)) {
    $errors = array();


    if (!empty($_GET) && !empty($_POST['categ'])){
        if (empty($errors)){
            $reqt = $pdo->prepare("UPDATE produits SET nom = ?, prix = ?, category_id = ?, stock = ? WHERE id = ".$_GET['id']);

            $reqt->execute([$_POST['nom'], $_POST['prix'], $_POST['categ'], $_POST['nombre']]);

            $errors['success'] = 'Produit bien modifié';
        }
    } else {
        $errors['vide'] = 'Tous les champs sont obligatoire.';
    }
}

header('Location: produit_list.php');
