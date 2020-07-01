<?php

// fichier de configuration du bases de données
// nom de base de donnée : 19328204, login pour db : root et pas de mot de passe ici

$pdo = new PDO('mysql:dbname=19328204;host=localhost', 'root', 'AicaeL0e_');

$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);

