<?php
require_once '../inc/functions.php';

function logged_only(){
    if(!isset($_SESSION['admin'])){
        header('Location: inc/login.php');
        exit();
    }
}
