<?php
/**
 * Created by PhpStorm.
 * User: deval
 * Date: 20-05-19
 * Time: 22:24
 */
include_once 'form/htmlElements.php';
include_once 'form/connect.php';
include_once 'form/home.php';
include_once 'form/presentation.php';
include_once 'form/portfolio.php';
include_once 'form/services.php';
include_once 'form/contact.php';
// donne une valeur à $page
$page="index";

if (isset($_GET['page'])){
    $page = $_GET['page'];
}
// si page = index, affiche la page HOME
if ($page=="index"){
    $content = formHome($db);
}
else if ($page=="presentation"){
    //Ne pas faire des echos dans la methode mais un return de chaine de chars.
$content = formPresent($db);
}else if ($page=="services") {
    $content = formService($db);
}else if ($page=="portfolio") {
    $content = formPortfolio($db);
}else if ($page=="contact"){
    $content =formContact($db);
}

affichePAge($content);




function crudDb(PDO $db, $request,$params =[])
{
    try {
        $reponse = $db->prepare($request);
        $reponse->execute($params);
    } catch (Exception $ex) {

    }
    return $reponse;
}