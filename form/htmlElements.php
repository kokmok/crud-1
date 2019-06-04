<?php
/**
 * Created by PhpStorm.
 * User: jona
 * Date: 28/05/19
 * Time: 15:33
 */
include_once 'form/connect.php';

function getPageMenu(){

    $pages = [
        "index"=>'Home',
        "presentation"=>"About me",
        "services"=> "Services",
        "portfolio"=>"Portfolio",
        "contact"=>"Contact"
    ];
    //'.ConnectDb().'
    $menu = '<a href="?page=index" class="logo">HEY ! MY NAME IS CEDRIC</a>
    <div class="menu-toggle"></div>
    <nav>
        <ul>
        ';
    foreach ($pages as $pageLink => $pageName){
        $active = '';
        if (isset($_GET['page']) && $_GET['page']===$pageLink ){
            $active= 'class="active"';
        }
        $menu .= '<li><a href="?page='.$pageLink.'" '.$active.'>'.$pageName.'</a></li>';
    }
    $menu .= '</ul>
    </nav>
    <div class="clear"></div>';

    return $menu;
}

function affichePAge($content){
    echo '<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>presentation</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="screen.css" media="screen" rel="stylesheet" type="text/css">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/@coreui/coreui/dist/css/coreui.min.css">
</head>
<body>
<header>
  '.getPageMenu().'
</header>
<script src="https://code.jquery.com/jquery-3.4.1.js"
        integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="
        crossorigin="anonymous"></script>
<script type="text/javascript">
    $(document).ready (function(){
        $(\'.menu-toggle\').click(function(){
            $(\'.menu-toggle\').toggleClass(\'active\')
            $(\'nav\').toggleClass(\'active\')
        })
    })
</script>';
    echo $content;

    echo '
        </div>
</section>
</div>
    
<footer>

    <p class="footext">&copy; Copyright 2019 Cédric Devalet - Tous Droits Réservés &nbsp; Designed By Cédric Devalet</p>
    
    <div class="social_button">
    
        <button type="button" class="btn btn-brand btn-facebook">
          <i class="fa fa-facebook"></i><span><a class="social_link" href="https://www.facebook.com/cedric.devalet" target="_blank">Facebook</a></span>
        </button>
        
        <button type="button" class="btn btn-brand btn-instagram">
          <i class="fa fa-instagram"></i><span><a class="social_link" href="https://www.instagram.com/cedric.devalet/" target="_blank">Instagram</a></span>
        </button>
        
        <button type="button" class="btn btn-brand btn-tumblr">
          <i class="fa fa-flickr"></i><span><a class="social_link" href="https://www.flickr.com/photos/162451126@N03/" target="_blank">Flickr</a></span>
        </button>
        
        <button type="button" class="btn btn-brand btn-twitter">
          <i class="fa fa-twitter"></i><span><a class="social_link" href="https://twitter.com/DevaletC?lang=fr" target="_blank">Twitter</a></span>
        </button>
    
    </div>

</footer>
</body>
</html>';
}