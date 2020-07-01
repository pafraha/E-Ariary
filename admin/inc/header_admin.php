<?php
require_once '../inc/functions.php'; ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Petit memoire du projet web NFA021">
    <meta name="author" content="RAKOTOARISON Eddy Faniry">

    <title>E-Ariary</title>


    <!-- Ici tous les styles utilisées -->
    <link href="<?= BASE_NAME; ?>css/bootstrap.min.css" rel="stylesheet">
    <link href="<?= BASE_NAME; ?>css/font-awesome.min.css" rel="stylesheet">
    <link href="<?= BASE_NAME; ?>css/prettyPhoto.css" rel="stylesheet">
    <link href="<?= BASE_NAME; ?>css/price-range.css" rel="stylesheet">
    <link href="<?= BASE_NAME; ?>css/animate.css" rel="stylesheet">
    <link href="<?= BASE_NAME; ?>css/main.css" rel="stylesheet">
    <link href="<?= BASE_NAME; ?>css/responsive.css" rel="stylesheet">


    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->

    <link rel="shortcut icon" href="<?= BASE_NAME; ?>images/ico/favicon.ico">


</head><!--/head-->

<body>
<header id="header"><!--header-->
    <div class="header_top"><!--header_top-->
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <div class="contactinfo">
                        <ul class="nav nav-pills">
                            <li><a href="#"><i class="fa fa-phone"></i> 00 261 32 66 120 04</a></li>
                            <li><a href="#"><i class="fa fa-envelope"></i> admin@locav.dev</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="social-icons pull-right">
                        <ul class="nav navbar-nav">
                            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                            <li><a href="#"><i class="fa fa-dribbble"></i></a></li>
                            <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div><!--/header_top-->

    <div class="header-middle"><!--header-middle-->
        <div class="container">
            <div class="row">
                <div class="col-md-4 clearfix">
                    <div class="logo pull-left">
                        <a href="<?= BASE_NAME; ?>index.php"><img src="<?= BASE_NAME; ?>images/home/logo.png" alt="" /></a>
                    </div>
                </div>
                <div class="col-md-8 clearfix">
                    <div class="shop-menu clearfix pull-right">
                        <ul class="nav navbar-nav">
                            <?php if (isset($_SESSION['admin'])){ ?>
                                <li><a href="<?= BASE_NAME; ?>admin/"><i class="fa fa-dashboard"></i> Dashbord</a></li>
                                <li><a href="<?= BASE_NAME; ?>admin/inc/produit_list.php"><i class="fa fa-list"></i> Produits</a></li>
                                <li><a href="<?= BASE_NAME; ?>admin/inc/user_list.php"><i class="fa fa-users"></i> Utilisateurs</a></li>
                                <li><a href="<?= BASE_NAME; ?>admin/inc/logout.php"><i class="fa fa-sign-out"></i> Deconnecter</a></li>
                            <?php } else { ?>
                                <li><a href="<?= BASE_NAME; ?>admin/inc/login.php"><i class="fa fa-sign-out"></i> Connecter</a></li>
                            <?php } ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div><!--/header-middle-->
</header><!--/header-->