<?php
/**
 * Created by PhpStorm.
 * User: deval
 * Date: 20-05-19
 * Time: 22:38
 */
session_start();

include_once 'form/htmlElements.php';
include_once 'form/connect.php';
include_once 'form/adminform.php';
include_once 'form/formtable.php';
include_once 'adminverif.php';

// Contenu afficher si l'utilasateur est connecté
function displayProtectedContent($db){

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

    echo '<ul class="nav nav-tabs">
  <li class="nav-item">
    <a class="nav-link active" href="?table=te_home_box"><h3>HOME</h3></a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="?table=te_present"><h3>PRESENTATION</h3></a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="?table=te_services"><h3>SERVICES</h3></a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="?table=te_portfolio"><h3>PORTFOLIO</h3></a>
  </li>
    <li class="nav-item">
    <a class="nav-link" href="?table=te_contact"><h3>CONTACT</h3></a>
  </li>
    <li class="nav-item">
    <a class="nav-link" href="?table=te_image"><h3>IMAGE</h3></a>
  </li>
    <li class="nav-item">
    <a class="nav-link" href="?table=te_liens"><h3>LIENS</h3></a>
  </li>
    <li class="nav-item">
    <a class="nav-link" href="?logout=1" style="color: #ff0000"><h3>LOGOUT</h3></a>
  </li>
</ul>';



    $table = filter_input(INPUT_GET,"table",FILTER_SANITIZE_STRING);

//---------------------------------------------------------------------------------------------------------------------

//Si on clique sur le bouton HOME BOX
    if ($table == 'te_home_box') {
        $action = filter_input(INPUT_GET, "action", FILTER_SANITIZE_STRING);

//CREATE
        echo '<button type="button" class="btn btn-outline-dark"><a href="?table=te_home_box&action=insert">Insérer une donnée</a></button><br><br>';
        if ($action == "insert") {
            formHome();
            $titre = filter_input(INPUT_POST, "titre", FILTER_SANITIZE_STRING);
            $texte = filter_input(INPUT_POST, "texte", FILTER_SANITIZE_STRING);
            $slug = filter_input(INPUT_POST, "slug", FILTER_SANITIZE_STRING);
            if (!empty($titre && $texte && $slug)) {

                $request = "INSERT INTO `te_home_box`(`titre`,`texte`,`slug`) VALUES (:titre,:texte,:slug)";

                crudDb($db, $request, ['titre' => $_POST['titre'], 'texte' => $_POST['texte'],'slug' => $_POST['slug']]);
                header('Location: admin.php?table=te_home_box');


            } else {
                echo "Insérer une valeur à chaque champ";
        }
    }

    $requestSelect='SELECT * FROM `te_home_box`';
    $reponse=crudDb($db,$requestSelect);

    $lines = $reponse->fetchAll();

// Affichage de la table
        $requestSelect='SELECT * FROM `te_home_box`';
        $reponse=crudDb($db,$requestSelect);
        $lines = $reponse->fetchAll();

    formTableHome($lines);
//UPDATE
    if ($action== "update" ){

        formHome();
        $titre = filter_input(INPUT_POST,"titre",FILTER_SANITIZE_STRING);
        $texte = filter_input(INPUT_POST,"texte",FILTER_SANITIZE_STRING);
        $slug = filter_input(INPUT_POST, "slug", FILTER_SANITIZE_STRING);
        if (!empty($titre && $texte && $slug)) {
            $request= 'UPDATE `te_home_box` SET `titre` = :titre,`texte` = :texte,`slug` = :slug  WHERE `id` = :id';

            crudDb($db,$request,['titre'=>$_POST['titre'],'texte'=>$_POST['texte'],'slug' => $_POST['slug'],'id' => $_GET['id']]);

            header('Location: admin.php?table=te_home_box');
        }
        else{
            echo 'Insérer une valeur a chaque champs';
        }
    }
//DELETE
        if ($action== "delete") {
            $request= 'DELETE FROM `te_home_box` WHERE `id` = :id';
            crudDb($db,$request,['id'=>$_GET['id']]);
            header('Location: admin.php?table=te_home_box');
        }
}

//---------------------------------------------------------------------------------------------------------------------

//Si on clique sur le bouton PRESENTATION
    if ($table == 'te_present') {
        $action = filter_input(INPUT_GET, "action", FILTER_SANITIZE_STRING);

//CREATE
        echo '<button type="button" class="btn btn-outline-dark"><a href="?table=te_present&action=insert">Insérer une donnée</a></button><br><br>';
        if ($action == "insert") {
            formPresent();
            $titre = filter_input(INPUT_POST, "titre", FILTER_SANITIZE_STRING);
            $texte = filter_input(INPUT_POST, "texte", FILTER_SANITIZE_STRING);

            if (!empty($titre && $texte)) {

                $request = "INSERT INTO `te_present`(`titre`,`texte`) VALUES (:titre,:texte)";

                crudDb($db, $request, ['titre' => $_POST['titre'], 'texte' => $_POST['texte']]);
                header('Location: admin.php?table=te_present');


            } else {
                echo "Insérer une valeur à chaque champ";
            }
        }

        $requestSelect='SELECT * FROM `te_present`';
        $reponse=crudDb($db,$requestSelect);

        $lines = $reponse->fetchAll();

// Affichage de la table
        $requestSelect='SELECT * FROM `te_present`';
        $reponse=crudDb($db,$requestSelect);
        $lines = $reponse->fetchAll();

        formTablePresent($lines);
//UPDATE
        if ($action== "update" ){

            formPresent();
            $titre = filter_input(INPUT_POST,"titre",FILTER_SANITIZE_STRING);
            $texte = filter_input(INPUT_POST,"texte",FILTER_SANITIZE_STRING);
            if (!empty($titre && $texte)) {
                $request= 'UPDATE `te_present` SET `titre` = :titre, `texte` = :texte  WHERE `id` = :id';

                crudDb($db,$request,['titre'=>$_POST['titre'],'texte'=>$_POST['texte'],'id' => $_GET['id']]);

                header('Location: admin.php?table=te_present');
            }
            else{
                echo 'Insérer une valeur a chaque champs';
            }
        }
//DELETE
        if ($action== "delete") {
            $request= 'DELETE FROM `te_present` WHERE `id` = :id';
            crudDb($db,$request,['id'=>$_GET['id']]);
            header('Location: admin.php?table=te_present');
        }
    }

//---------------------------------------------------------------------------------------------------------------------

// Si on clique sur le bouton SERVICES
    if ($table == 'te_services') {
        $action = filter_input(INPUT_GET,"action",FILTER_SANITIZE_STRING);
// Insérer une compétence

        echo '<button type="button" class="btn btn-outline-dark"><a href="?table=te_services&action=insert">Insérer une donnée</a></button><br><br>';
        if ($action== "insert") {
            formService();
            $nom = filter_input(INPUT_POST,"nom",FILTER_SANITIZE_STRING);
            if (!empty($nom)) {
                $request = "INSERT INTO `te_services`(`nom`) VALUES (:nom)";

                crudDb($db, $request,['nom'=>$_POST['nom']]);
                header('Location: admin.php?table=te_services');
            }
            else{
                echo"Insérer une valeur à chaque champ";
            }

        }

// Affichage de la table
        $requestSelect='SELECT * FROM `te_services`';
        $reponse=crudDb($db,$requestSelect);
        $lines = $reponse->fetchAll();






        formTableServices($lines);

// Update une compétence
        if ($action== "update" ){

            formService();
            $nom = filter_input(INPUT_POST,"nom",FILTER_SANITIZE_STRING);
            if (!empty($nom)) {
                $request= 'UPDATE `te_services` SET `nom` = :nom WHERE `id` = :id';

                crudDb($db,$request,['nom'=>$_POST['nom'],'id'=>$_GET['id']]);

                header('Location: admin.php?table=te_services');
            }
            else{
                echo"Insérer une valeur à chaque champ";
            }

        }
// Delete une compétence

        if ($action== "delete") {
            $request= 'DELETE FROM `te_services` WHERE `id` = :id';
            crudDb($db,$request,['id'=>$_GET['id']]);
            header('Location: admin.php?table=te_services');
        }

    }

//---------------------------------------------------------------------------------------------------------------------

// Si on clique sur le bouton PORTFOLIO
    if ($table == 'te_portfolio') {
        $action = filter_input(INPUT_GET,"action",FILTER_SANITIZE_STRING);
// Insérer une compétence

        echo '<button type="button" class="btn btn-outline-dark"><a href="?table=te_portfolio&action=insert">Insérer une donnée</a></button><br><br>';
        if ($action== "insert") {
            formPortfolio();
            $texte = filter_input(INPUT_POST,"texte",FILTER_SANITIZE_STRING);
            if (!empty($texte)) {
                $request = "INSERT INTO `te_portfolio`(`texte`) VALUES (:texte)";

                crudDb($db, $request,['texte'=>$_POST['texte']]);
                header('Location: admin.php?table=te_portfolio');
            }
            else{
                echo"Insérer une valeur à chaque champ";
            }

        }

// Affichage de la table
        $requestSelect='SELECT * FROM `te_portfolio`';
        $reponse=crudDb($db,$requestSelect);
        $lines = $reponse->fetchAll();



        formTablePortfolio($lines);

// Update une compétence
        if ($action== "update" ){

            formPortfolio();
            $texte = filter_input(INPUT_POST,"texte",FILTER_SANITIZE_STRING);
            if (!empty($texte)) {
                $request= 'UPDATE `te_portfolio` SET `texte` = :texte WHERE `id` = :id';

                crudDb($db,$request,['texte'=>$_POST['texte'],'id'=>$_GET['id']]);

                header('Location: admin.php?table=te_portfolio');
            }
            else{
                echo"Insérer une valeur à chaque champ";
            }

        }
// Delete une compétence

        if ($action== "delete") {
            $request= 'DELETE FROM `te_portfolio` WHERE `id` = :id';
            crudDb($db,$request,['id'=>$_GET['id']]);
            header('Location: admin.php?table=te_portfolio');
        }

    }

//---------------------------------------------------------------------------------------------------------------------

    //Si on clique sur le bouton contact
        else if ($table == 'te_contact') {
        $action = filter_input(INPUT_GET,"action",FILTER_SANITIZE_STRING);
// Insérer un contact
        echo '<button type="button" class="btn btn-outline-dark"><a href="?table=te_contact&action=insert">Insérer une donnée</a></button><br><br>';
        if ($action== "insert") {
            formContact();
            $nom = filter_input(INPUT_POST,"nom",FILTER_SANITIZE_STRING);
            $prenom = filter_input(INPUT_POST,"prenom",FILTER_SANITIZE_STRING);
            $email = filter_input(INPUT_POST,"email",FILTER_SANITIZE_STRING);
            $message = filter_input(INPUT_POST,"message",FILTER_SANITIZE_STRING);
            if (!preg_match("#^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$#", $email)) {
                echo "Insérer un email valide";
            }else {
                if (!empty ($nom && $prenom && $email && $message)) {
                    $request = "INSERT INTO `te_contact`(`nom`,`prenom`,`email`,`message`) VALUES (:nom,:prenom,:email,:message)";
                    crudDb($db, $request, ['nom' => $_POST['nom'], 'prenom' => $_POST['prenom'], 'email' => $_POST['email'], 'message' => $_POST['message']]);
                    header('Location: admin.php?table=te_contact');

                } else {
                    echo "Insérer une valeur à chaque champ";
                }
            }
        }
        $requestSelect='SELECT * FROM `te_contact`';
        $reponse=crudDb($db,$requestSelect);

        $lines = $reponse->fetchAll();

        formTableContact($lines);
// Update un contact
        if ($action == "update" ){

            formContact();
            $nom = filter_input(INPUT_POST,"nom",FILTER_SANITIZE_STRING);
            $prenom = filter_input(INPUT_POST,"prenom",FILTER_SANITIZE_STRING);
            $email = filter_input(INPUT_POST,"email",FILTER_SANITIZE_STRING);
            $message = filter_input(INPUT_POST,"message",FILTER_SANITIZE_STRING);
            if (!preg_match("#^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$#", $email)) {
                echo "Insérer un email valide";
            }else {
                if (!empty($nom && $prenom && $email && $message)) {

                    $request = "UPDATE `te_contact` SET `nom` = :nom, `prenom` =  :prenom, `email` = :email, `message` = :message WHERE `id` = :id";
                    crudDb($db, $request, ['nom' => $_POST['nom'], 'prenom' => $_POST['prenom'], 'email' => $_POST['email'], 'message' => $_POST['message'], 'id' => $_GET['id']]);

                    header('Location: admin.php?table=te_contact');
                } else {
                    echo "Insérer une valeur à chaque champ";
                }
            }
        }
// Delete un contact
        if ($action== "delete") {
            $request= 'DELETE FROM `te_contact` WHERE `id` = :id';
            crudDb($db,$request,['id'=>$_GET['id']]);
            header('Location: admin.php?table=te_contact');
        }
    }

//---------------------------------------------------------------------------------------------------------------------
// Si on clique sur le bouton IMAGES
    else if ($table == 'te_image') {
        $action = filter_input(INPUT_GET,"action",FILTER_SANITIZE_STRING);
// Insérer une image
        echo '<button type="button" class="btn btn-outline-dark"><a href="?table=te_image&action=insert">Insérer une donnée</a></button><br><br>';
        if ($action== "insert") {
            formImage();


            $nom_dossier = filter_input(INPUT_POST,"nom_dossier",FILTER_SANITIZE_STRING);
            $nom_fichier = filter_input(INPUT_POST,"nom_fichier",FILTER_SANITIZE_STRING);
            $extension = filter_input(INPUT_POST,"extension",FILTER_SANITIZE_STRING);
            $position = filter_input(INPUT_POST,"position",FILTER_SANITIZE_STRING);
            if (!empty($nom_dossier && $nom_fichier && $extension && $position )) {
                $fileSizeEnMega = 2;
                $maxFileSize = $fileSizeEnMega *1000000;
                $allowedExtensions = ['jpg'=>"image/jpeg",'jpeg'=>"image/jpeg",'png'=>"image/png",'gif'=>"image/gif"];
                if (isset($_FILES['avatar']) && $_FILES['avatar']['error'] == 0){
                    if ($_FILES['avatar']['size'] <= $maxFileSize){
                        $pathInfo = pathinfo($_FILES['avatar']['name']);

                        $extension2 = $pathInfo['extension'];
                        if (array_key_exists($extension2,$allowedExtensions) && mime_content_type($_FILES['avatar']['tmp_name']) == $allowedExtensions[$extension2] && $extension==$extension2){

                            $uploadedFilePath = './'.$nom_dossier.'/'.$nom_fichier.'.'.$extension2;
                            move_uploaded_file($_FILES['avatar']['tmp_name'],$uploadedFilePath);

                        }

                    }
                    else{
                        echo 'fichier trop gros';
                    }



                }
                if ($extension==$extension2) {
                    $request = "INSERT INTO `te_image`(`nom_dossier`,`nom_fichier`,`extension`,`position`) VALUES (:nom_dossier,:nom_fichier,:extension,:position)";

                    crudDb($db, $request, ['nom_dossier' => $_POST['nom_dossier'], 'nom_fichier' => $_POST['nom_fichier'], 'extension' => $_POST['extension'], 'position' => $_POST['position']]);
                    header('Location: admin.php?table=te_image');
                }
                else{
                    echo 'Extension différente';
                }

            }
            else{
                echo"Insérer une valeur à chaque champ";
            }
        }
        $requestSelect='SELECT * FROM `te_image`';
        $reponse=crudDb($db,$requestSelect);

        $lines = $reponse->fetchAll();



        formTableImage($lines);
// Update une image
        if ($action== "update" ){

            formImage();
            $nom_dossier = filter_input(INPUT_POST,"nom_dossier",FILTER_SANITIZE_STRING);
            $nom_fichier = filter_input(INPUT_POST,"nom_fichier",FILTER_SANITIZE_STRING);
            $extension = filter_input(INPUT_POST,"extension",FILTER_SANITIZE_STRING);
            $position = filter_input(INPUT_POST,"position",FILTER_SANITIZE_STRING);
            if (!empty($nom_dossier && $nom_fichier && $extension && $position)) {

                $request="UPDATE `te_image` SET `nom_dossier` = :nom_dossier , `nom_fichier` =  :nom_fichier, `extension` = :extension, `position` = :position WHERE `id` = :id";
                crudDb($db,$request,['nom_dossier'=>$_POST['nom_dossier'],'nom_fichier'=>$_POST['nom_fichier'],'extension'=>$_POST['extension'],'position'=>$_POST['position'],'id'=>$_GET['id']]);

                header('Location: admin.php?table=te_image');
            }
            else{
                echo"Insérer une valeur à chaque champ";
            }
        }
// Delete une image
        if ($action== "delete") {
            $request= 'DELETE FROM `te_image` WHERE `id` = :id';
            crudDb($db,$request,['id'=>$_GET['id']]);
            header('Location: admin.php?table=te_image');
        }

    }

//---------------------------------------------------------------------------------------------------------------------

    //Si on clique sur le bouton LIENS
    if ($table == 'te_liens') {
        $action = filter_input(INPUT_GET, "action", FILTER_SANITIZE_STRING);

//CREATE
        echo '<button type="button" class="btn btn-outline-dark"><a href="?table=te_liens&action=insert">Insérer une donnée</a></button><br><br>';
        if ($action == "insert") {
            formLien();
            $lien = filter_input(INPUT_POST, "lien", FILTER_SANITIZE_STRING);
            $position = filter_input(INPUT_POST, "position", FILTER_SANITIZE_STRING);

            if (!empty($lien && $position)) {

                $request = "INSERT INTO `te_liens`(`lien`,`position`) VALUES (:lien,:position)";

                crudDb($db, $request, ['lien' => $_POST['lien'], 'position' => $_POST['position']]);
                header('Location: admin.php?table=te_liens');


            } else {
                echo "Insérer une valeur à chaque champ";
            }
        }

        //$requestSelect='SELECT * FROM `te_liens`';
        //$reponse=crudDb($db,$requestSelect);

        //$lines = $reponse->fetchAll();

// Affichage de la table
        $requestSelect='SELECT * FROM `te_liens`';
        $reponse=crudDb($db,$requestSelect);
        $lines = $reponse->fetchAll();

        formTableLiens($lines);
//UPDATE
        if ($action== "update" ){

            formLien();
            $lien = filter_input(INPUT_POST, "lien", FILTER_SANITIZE_STRING);
            $position = filter_input(INPUT_POST, "position", FILTER_SANITIZE_STRING);
            if (!empty($lien && $position)) {
                $request= "UPDATE `te_liens` SET `lien` = :lien, `position` = :position  WHERE `id` = :id";

                crudDb($db,$request,['lien'=>$_POST['lien'],'position'=>$_POST['position'],'id' => $_GET['id']]);

                header('Location: admin.php?table=te_liens');
            }
            else{
                echo 'Insérer une valeur a chaque champs';
            }
        }
//DELETE
        if ($action== "delete") {
            $request= 'DELETE FROM `te_liens` WHERE `id` = :id';
            crudDb($db,$request,['id'=>$_GET['id']]);
            header('Location: admin.php?table=te_liens');
        }
    }

}

//---------------------------------------------------------------------------------------------------------------------

function crudDb(PDO $db, $request,$params =[])
{
    try {
        $reponse = $db->prepare($request);
        $reponse->execute($params);
    } catch (Exception $ex) {

    }
    return $reponse;
}

echo '<footer class="app-footer">
  <div>
    <span>&copy; 2019.</span>
    <a href="https://devalet.bes-webdeveloper-seraing.be/" target="_blank">Test</a>
  </div>
  <div class="ml-auto">
    <span>Powered by</span>
    <a href="https://devalet.bes-webdeveloper-seraing.be/portfolio" target="_blank">DEVALET Cédric</a>
  </div>
</footer>

</body>
</html>';