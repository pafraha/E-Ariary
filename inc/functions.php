<?php

// varible globals pour eviter les erreurs sur les fihiers externes
define('BASE_NAME', 'http://' . $_SERVER['SERVER_NAME'] . '/19328204/');

function debug($str)
{
    var_dump($str);
}

// fonction qui génère une clé de nombre définie an parametre
function str_random($long){
    $alphat = '0123456789azertyuiopqsdfghjklmwxcvbnAZERTYUIOPQSDFGHJKLMWXCVBN';

    return substr(str_shuffle(str_repeat($alphat, $long)), 0, $long);
}

function session_check_for_starting(){
    if (!isset($_SESSION)){
        session_start();
    }
}
