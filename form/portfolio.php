<?php
/**
 * Created by PhpStorm.
 * User: deval
 * Date: 20-05-19
 * Time: 23:09
 */
include_once 'form/connect.php';
function formPortfolio($db){

    $requestPortfolio= 'SELECT texte from `te_portfolio`';
    $reponsePortfolio=  crudDb($db, $requestPortfolio);
    $linePortfolio=$reponsePortfolio->fetch();


    $requestLien='SELECT lien FROM `te_liens` WHERE POSITION ="portfolio"';
    $reponseLien=crudDb($db,$requestLien);
    $linelien = $reponseLien->fetch();
    //'.$lien['lien'].'



    $toREturn= '<div class="wrapper">
    <section class="#">
    
        <div class="work_txt">
            <p>'.$linePortfolio['texte'].'</p>
            <br>
            <a class="link-work" href="'.$linelien['lien'].'" target="_blank">>> LISTE COMPLETE DE MON TRAVAIL <<</a>
        </div>
        
    </div>
    </section>';

    return $toREturn;

}