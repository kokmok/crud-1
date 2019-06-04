<?php
/**
 * Created by PhpStorm.
 * User: deval
 * Date: 20-05-19
 * Time: 23:17
 */
include_once 'form/connect.php';
function formService($db){
    // Récupération des données dans la db
    $requestSelect='SELECT nom FROM `te_services`';
    $reponse=crudDb($db,$requestSelect);
    $lines = $reponse->fetchAll();
    $content = '<ul>';
    foreach ($lines as $line){

        $content .= '<li>'.$line['nom'].'</li>';

    }
    $content .= '</ul>';


    $requestImage='SELECT nom_dossier,nom_fichier,extension FROM `te_image` where position="services"';
    $reponseImage=crudDb($db,$requestImage);
    $lineImage=$reponseImage->fetch();
    $image = $lineImage['nom_dossier'].'/'.$lineImage['nom_fichier'].$lineImage['extension'];

    $toREturn= '<div class="wrapper">
        <div class="skill">
            <p>Voici une liste des langages que je maîtrise:</p>'.$content.'
        </div>
        
            <img class="img_skill" src="'.$image.'">
        

</div>';



    return $toREturn;
}