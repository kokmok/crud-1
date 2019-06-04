<?php
/**
 * Created by PhpStorm.
 * User: deval
 * Date: 20-05-19
 * Time: 22:46
 */
include_once 'form/connect.php';
function formPresent($db){
    $requestPresent = 'SELECT titre,texte from `te_present`';
    $reponsePresent = crudDb($db, $requestPresent);
    $linePresent = $reponsePresent->fetch();

    $requestImage='SELECT nom_dossier,nom_fichier,extension FROM `te_image` where position ="presentation" ';
    $reponseImage=crudDb($db,$requestImage);
    $lineImage=$reponseImage->fetch();
    $image = $lineImage['nom_dossier'].'/'.$lineImage['nom_fichier'].$lineImage['extension'];

    $toREturn = '    <div class="wrapper">
    <section class="first-sec">
        <div class="left-pr">
            <h2>'.$linePresent['titre'].'</h2>
            <p class="txt-pr">'.$linePresent['texte'].'</p>
        </div>
        <div class="right-pr">
            <img class="pic-pr" src="'.$image.'">
        </div>
        </section>
        </div>';



    return $toREturn;
}