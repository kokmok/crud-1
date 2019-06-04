<?php
/**
 * Created by PhpStorm.
 * User: deval
 * Date: 20-05-19
 * Time: 22:34
 */

include_once 'form/connect.php';

function formHome($db){
    $requestHome = 'SELECT titre,texte,slug from `te_home_box` ORDER BY  `id`';
    $reponseHome = crudDb($db, $requestHome);
    $lineHomes = $reponseHome->fetchAll();

    //$requestLien = 'SELECT lien FROM `te_liens` WHERE POSITION ="home" ORDER BY `id`';
    //$reponseLien = crudDb($db,$requestLien);
    //$linelien = $reponseLien->fetch();
    //'.$linelien['lien'].'

    $toREturn = '
    <div class="wrapper">
    <section>
        <div class="container-home">';

    //boucle sur table pour afficher chaque box selon position

    foreach ($lineHomes as $lineHome){
        $lineHomes = 0;
        if($lineHomes == 4){
            $toREturn .= '        <div class="box-home last">
                <div class="content-home">
                    <h3>'.$lineHome['titre'].'</h3>
                    <p>'.$lineHome['texte'].'</p>
                    <a href="?page='.$lineHome['slug'].'">Read More</a>
                </div>
            </div>
        ';

        }
        else{
            $toREturn .= '        <div class="box-home">
                <div class="content-home">
                    <h3>'.$lineHome['titre'].'</h3>
                    <p>'.$lineHome['texte'].'</p>
                    <a href="?page='.$lineHome['slug'].'">Read More</a>
                </div>
            </div>
        ';

        }


    }

    return $toREturn;




}
