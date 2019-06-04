<?php
/**
 * Created by PhpStorm.
 * User: deval
 * Date: 20-05-19
 * Time: 23:09
 */
include_once 'form/connect.php';
function formContact($db)
{
    // Insérer les données du formulaire dans la db

    $nom = filter_input(INPUT_POST, "nom", FILTER_SANITIZE_STRING);
    $prenom = filter_input(INPUT_POST, "prenom", FILTER_SANITIZE_STRING);
    $email = filter_input(INPUT_POST, "email", FILTER_SANITIZE_STRING);
    $message = filter_input(INPUT_POST, "message", FILTER_SANITIZE_STRING);
    if (!empty($nom && $prenom && $email && $message)) {
        $request = "INSERT INTO `te_contact`(`nom`,`prenom`,`email`,`message`) VALUES (:nom,:prenom,:email,:message)";
        crudDb($db, $request, ['nom' => $_POST['nom'], 'prenom' => $_POST['prenom'], 'email' => $_POST['email'], 'message' => $_POST['message']]);
        header('Location: ?page=index');
    }

    $toREturn= '<div class="wrapper">

    <section class="#">
        <div class="contact_form">
                    <form action="" id="contact_form" method="post">
            <ul id="formulaire">
                <li><label>Nom<span class="required">*</span><br></label><input type="text" name="nom" id="name" value=""  required></li>
                <li><label>Prénom<span class="required">*</span><br></label><input type="text" name="prenom" id="prenom" value=""  required></li>
                <li><label>Email<span class="required">*</span><br></label><input type="email" name="email" id="email" value=""  required style="width: 100%;padding: 12px;border: 1px solid #ccc;border-radius: 4px;box-sizing: border-box;margin-top: 6px;margin-bottom: 16px;resize: vertical;background-color: #A9A9A9;"></li>
                <li class="textarea"><label>Message<span class="required">*</span><br></label><textarea name="message" id="message" required></textarea></li>
                <li class="button_form"><input class = "button" name="submitted" id="submitted" value="Envoyez" type="submit">
                    <input class="button" id="reset" type="reset" value="Effacer" ></li>
            </ul>
        </form>
        </div>
    </section>
    </div>';

    return $toREturn;
}