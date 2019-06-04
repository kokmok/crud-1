<?php
/**
 * Created by PhpStorm.
 * User: deval
 * Date: 20-05-19
 * Time: 22:17
 */
include_once 'form/connect.php';

// Si les logins sont mauvais
function displayWrongCredentials(){
    echo '<p><img src="img/non.jpg"></p>';
}
// Verifie que quelque chose est posté
function isFormPosted(){
    if(count($_POST)>0){
        return true;
    }
    return false;
}
// Vérifie si les logins sont bons
function are_CredentialsOk(){
    $login='test';
    $pass='test';
    if($_POST['login'] == $login && $_POST['password']== $pass){
        return true;
    }
    return false;

}
// détruit la session
if (isset($_GET['logout'])){
    session_destroy();
    header('Location: /crud/admin.php');
}
// si le user est log, montre le contenu caché sinon redemande une connection
if (isUserLogged()){
    displayProtectedContent($db);
}
else{
    if (isFormSubmitted()){
        displayWrongCredentials();
    }
    displayForm();
}
// Fonction pour voir regarder si il y a un post
function isFormSubmitted(){
    return count($_POST);
}
// Fonction si le user est log
function isUserLogged(){
    if (sessionExists()){
        return true;
    }
    $login = 'admin';
    $pass = "admin";

    if (isset($_POST['login']) && isset($_POST['password'])){
        if ($_POST['login'] === $login && $_POST['password'] === $pass){
            addSessionToken();
            return true;
        }
    }

    return false;
}
// Fonction pour créer une session
function sessionExists(){
    return isset($_SESSION['token']);
}
// Fonction pour créer un token
function addSessionToken(){
    $_SESSION['token'] =   uniqid();
}

// Fonction pour préparer les requêtes


function isFormValid(){
    if (isset($_POST['mail'])) {
        $_POST['email'] = htmlspecialchars($_POST['email']);
        if (!preg_match("#^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$#", $_POST['mail'])){
            echo 'L\'adresse ' . $_POST['mail'] . ' n\'est pas valide, recommencez !';
            return false;
        }
    }
    elseif (!isset($_POST['email']) || !isset($_POST['message'])) {
        echo 'Tous les champs doivent être remplis !';
        return false;
    }

    return true;

}


function displayForm(){

    echo '<!doctype html>
    <html lang="en">
     <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- CoreUI CSS -->
        <link rel="stylesheet" href="https://unpkg.com/@coreui/coreui/dist/css/coreui.min.css">

        <title>ADMIN VERIF</title>
    </head>
    <body class="#" style="margin: 0; padding: 0; font-family: Poppins, sans-serif; background: #34495e;">';

    echo '<form method="post" action="" 
    style="width:400px; padding: 40px; position: absolute; top: 50%; left: 50%; transform: translate(-50%,-50%); background: #191919; text-align: center;">';
    echo '<h1 style=" color: #fff; text-transform: uppercase; font-weight: 500; ">LOGIN</h1>';
    //echo '<label for="login">Utilisateur</label>';
    echo '<input type="text" name="login" id="login" placeholder="Username" style=" background: none; display: block; margin: 20px auto; text-align: center; border: 2px solid #3498db; padding: 14px 10px; width: 200px; outline: none; color: #fff; border-radius: 24px; transition: 0.25s;">';
    //echo '<label for="password">Password</label>';
    echo '<input type="password" name="password" id="password" placeholder="Password" style=" background: none; display: block; margin: 20px auto; text-align: center; border: 2px solid #3498db; padding: 14px 10px; width: 200px; outline: none; color: #fff; border-radius: 24px; transition: 0.25s;">';
    echo '<input class="btn btn-ghost-primary btn btn-pill btn-primary btn-lg" type="submit" value="valider" style="margin-left: 5px">';
    echo '</form>';

    echo '</body>
    </html>';
}