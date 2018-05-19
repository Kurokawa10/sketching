<?php
/**
* Created by PhpStorm.
* User: Kuro
* Date: 12/05/2018
* Time: 0:56
*/

session_start();

include_once 'persistencia/UsuarioDAO.php';
include_once 'objetos/Usuario.php';
include_once 'interfaz/templates/Funciones.php';

//$ROOT = '/~robertogarcia/';
$ROOT = '/sketching/';

$path = ltrim($_SERVER['REQUEST_URI'], '/');    // Trim leading slash(es)
$elements = explode('/', $path);                // Split path on slashes
if(empty($elements[0])) {                       // No path elements means home

} else{
    array_shift($elements);
    //var_dump($elements);
    if(count($elements) >= 2){
        header('Location: '. $ROOT .'index');
    }else{
        if(empty($elements[0]) || $elements[0] === 'index'){
            //pagina principal
        }else{
            $userSelec = $elements[0];
            $usuarioDao = UsuarioDAO::singletonUsuario();
            $autor = $usuarioDao->getUserbyName($userSelec);
            if(empty($autor)){
                header('Location: '. $ROOT .'interfaz/publico/Busqueda.php');
            }
        }
    }
}

if(isset($_POST['logout'])){
    session_destroy();
    session_start();
}

//var_dump($_SESSION);

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
    <?php echo $template->navBar($profImageURL); ?>
    <div class="columnaMenu" id="colmenu" >
        <?php echo $template->menu(); ?>
    </div>
    <div class="columnaMain" id="colmain">
        <?php if(empty($autor)){
            echo $template->indexDefault();
        }else{ ?>
        <div class="section no-pad-bot" id="index-banner">
            <div class="container light-green lighten-4">
                <div class="columnaPostLeft">
                    <img class="responsive-img" src="interfaz/app_images/logo.png">
                </div>
                <div class="columnaPostRight">
                    <div class="card-panel grey lighten-5 z-depth-1 col s12">
                      <div class="row valign-wrapper">
                        <div class="col s2">
                          <img class="circle" src="<?php echo Funciones::showImageProfile('interfaz/profile_images/profile_' . $autor->getProfileImage()); ?>" width="60px" height="60px">
                        </div>
                        <div class="col s10">
                          <span class="black-text">
                              kurokawa
                          </span>
                        </div>
                      </div>
                    </div>
                </div>
            </div>
        </div>
         <?php } ?>
    </div>
    <?php echo $template->footer(); ?>
</body>
</html>

