<?php
/**
 * Created by PhpStorm.
 * User: deval
 * Date: 21-05-19
 * Time: 02:07
 */
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
    <body class="#" style="font-family: Poppins, sans-serif; background: #34495e;">';

function formHome(){
    echo '<form method="post" action="">';

    echo '<div class="form-group">';
    echo '<label for="titre" style="color: #ffffff">Titre</label>';
    echo '<input type="text" name="titre" class="form-control">';
    echo '</div>';

    echo '<div class="form-group">';
    echo '<label for="texte" style="color: #ffffff">Texte</label>';
    echo '<input type="text" name="texte" class="form-control">';
    echo '</div>';

    echo '<div class="form-group">';
    echo '<label for="texte" style="color: #ffffff">Slug</label>';
    echo '<input type="text" name="slug" class="form-control">';
    echo '</div>';

    echo '<button type="submit" class="btn btn-pill btn-success">Envoyer</button>';

    echo '</form>';
}
function formPresent(){
    echo '<form method="post" action="">';

    echo '<div class="form-group">';
    echo '<label for="titre" style="color: #ffffff">Titre</label>';
    echo '<input type="text" name="titre" class="form-control">';
    echo '</div>';


    echo '<div class="form-group">';
    echo '<label for="texte" style="color: #ffffff">Texte</label>';
    echo '<input type="text" name="texte" class="form-control">';
    echo '</div>';

    echo '<button type="submit" class="btn btn-pill btn-success">Envoyer</button>';

    echo '</form>';
}
function formService(){
    echo '<form method="post" action="">';

    echo '<div class="form-group">';
    echo '<label for="nom" style="color: #ffffff">Nom</label>';
    echo '<input type="text" name="nom" class="form-control">';
    echo '</div>';

    echo '<button type="submit" class="btn btn-pill btn-success">Envoyer</button>';

    echo '</form>';
}
function formPortfolio(){
    echo '<form method="post" action="">';

    echo '<div class="form-group">';
    echo '<label for="texte" style="color: #ffffff">Texte</label>';
    echo '<input type="text" name="texte" class="form-control">';
    echo '</div>';

    echo '<button type="submit" class="btn btn-pill btn-success">Envoyer</button>';

    echo '</form>';
}
function formContact(){
    echo '<form method="post" action="">';

    echo '<div class="form-group">';
    echo '<label for="nom" style="color: #ffffff">Nom</label>';
    echo '<input type="text" name="nom" class="form-control">';
    echo '</div>';

    echo '<div class="form-group">';
    echo '<label for="prenom" style="color: #ffffff">Prénom</label>';
    echo '<input type="text" name="prenom" class="form-control">';
    echo '</div>';

    echo '<div class="form-group">';
    echo '<label for="email" style="color: #ffffff">Email</label>';
    echo '<input type="text" name="email" class="form-control">';
    echo '</div>';

    echo '<div class="form-group">';
    echo '<label for="message" style="color: #ffffff">Message</label>';
    echo '<input type="text" name="message" class="form-control">';
    echo '</div>';

    echo '<button type="submit" class="btn btn-pill btn-success">Envoyer</button>';

    echo '</form>';

}
function formImage(){
    echo '<form method="post" action="" enctype="multipart/form-data">';

    echo '<div class="form-group">';
    echo '<label for="nom_dossier" style="color: #ffffff">Nom dossier </label>';
    echo '<input type="text" name="nom_dossier" required class="form-control">';
    echo '</div>';

    echo '<div class="form-group">';
    echo '<label for="nom_fichier" style="color: #ffffff">Nom fichier</label>';
    echo '<input type="text" name="nom_fichier" required class="form-control">';
    echo '</div>';

    echo '<div class="form-group">';
    echo '<label for="extension" style="color: #ffffff">extension</label>';
    echo '<input type="text" name="extension" required class="form-control">';
    echo '</div>';

    echo '<div class="form-group">';
    echo '<label for="position" style="color: #ffffff">position</label>';
    echo '<input type="text" name="position" required class="form-control">';
    echo '</div>';

    echo '<div class="form-group">';
    echo'<label for="avatar" style="color: #ffffff">Pousse ton fichier</label>';
    echo '<button type="button" class="btn btn-outline-success"><input type="file" name="avatar" id="avatar" required class="form-control-file"></button>';
    echo '</div>';

    echo '<button type="submit" class="btn btn-pill btn-success">Envoyer</button>';

    echo '</form>';

}
function formLien(){
    echo '<form method="post" action="">';

    echo '<div class="form-group">';
    echo '<label for="lien" style="color: #ffffff">Lien</label>';
    echo '<input type="text" name="lien" class="form-control">';
    echo '</div>';

    echo '<div class="form-group">';
    echo '<label for="position" style="color: #ffffff">Position</label>';
    echo '<input type="text" name="position" class="form-control">';
    echo '</div>';

    echo '<button type="submit" class="btn btn-pill btn-success">Envoyer</button>';

    echo '</form>';
}

echo '</body>
</html>';