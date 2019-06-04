<?php
/**
 * Created by PhpStorm.
 * User: deval
 * Date: 31-05-19
 * Time: 14:26
 */
try{
    $db = new PDO('mysql:host=localhost;dbname=devalet;', 'devalet', '0cI6C0lH');
    $db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

}
catch(PDOException $e){

}