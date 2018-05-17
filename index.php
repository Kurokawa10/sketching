<?php
/**
* Created by PhpStorm.
* User: Kuro
* Date: 12/05/2018
* Time: 0:56
*/
session_start();
//$ROOT = '/~robertogarcia/';
$ROOT = '/sketching/';

$path = ltrim($_SERVER['REQUEST_URI'], '/');    // Trim leading slash(es)
$elements = explode('/', $path);                // Split path on slashes
if(empty($elements[0])) {                       // No path elements means home

} else{
    echo 'HOLA: ';
    var_dump($elements);
    array_shift($elements);
    if(count($elements) >= 2){
        header('Location: '. $ROOT .'index');
    }else{
        #Redirigir al perfil publico del usuario.
    }
}

if(isset($_POST['logout'])){
    session_destroy();
    session_start();
}

var_dump($_SESSION);

if(empty($_SESSION)){
    //Elementos Logged out
    $profImageURL = null;
}else{
    //Elementos logged in
    $profileImage = $_SESSION['profileImage'];
    $profImageURL = 'interfaz/profile_images/profile_'.$profileImage;
}

include 'interfaz/templates/Template.php';
$template = new Template($ROOT);
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Sketching</title>


    <link rel="icon" href="interfaz/app_images/icono.png">


    <link href="css/main.css" type="text/css" rel="stylesheet" media="screen,projection"/>
    <link href="css/estilo_menu.css" type="text/css" rel="stylesheet" media="screen,projection"/>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet"/>
    <link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>

    <script src="https://code.jquery.com/jquery-1.10.2.js"></script>
    <script type="text/javascript" rel="script" src="js/materialize.js"></script>
    <script type="text/javascript" rel="script" src="js/menu.js"></script>



    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
</head>

<body>
    <?php echo $template->navBar($profImageURL);?>
    <div class="columnaMenu" id="colmenu" >
        <?php echo $template->menu();?>
    </div>
    <div class="columnaMain" id="colmain">
        <div class="section no-pad-bot" id="index-banner">
            <div class="container light-green lighten-4">
                <div class="columnaMainLeft" style="margin: auto">
                    <img class="responsive-img" src="interfaz/app_images/logo.png">
                </div>
                <div class="columnaMainRight">
                    <h1>BIENVENIDO</h1>
                </div>
            </div>
        </div>
    </div>
    <?php echo $template->footer();?>
</body>
</html>
