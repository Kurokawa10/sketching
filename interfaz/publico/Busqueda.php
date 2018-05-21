<?php
/**
 * Created by PhpStorm.
 * User: Kuro
 * Date: 12/05/2018
 * Time: 17:01
 */

session_start();
include_once '../templates/Template.php';
include_once '../../objetos/Usuario.php';
include_once '../../persistencia/UsuarioDAO.php';

//$ROOT = '/~robertogarcia/';
$ROOT = '/sketching/';

if(empty($_SESSION)){
    //Elementos Logged out
    $profImageURL = null;
}else{
    //Elementos logged in
    $profileImage = $_SESSION['profileImage'];
    $profImageURL = 'interfaz/profile_images/profile_'.$profileImage;
}
$template = new Template($ROOT);

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Sketching</title>


    <link rel="icon" href="../app_images/icono.png">


    <link href="../../css/main.css" type="text/css" rel="stylesheet" media="screen,projection"/>
    <link href="../../css/estilo_menu.css" type="text/css" rel="stylesheet" media="screen,projection"/>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet"/>
    <link type="text/css" rel="stylesheet" href="../../css/materialize.css"  media="screen,projection"/>

    <script src="https://code.jquery.com/jquery-1.10.2.js"></script>
    <script type="text/javascript" rel="script" src="../../js/materialize.js"></script>
    <script type="text/javascript" rel="script" src="../../js/menu.js"></script>


    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
</head>
<body>
<?php echo $template->navBar($profImageURL); ?>
<div class="columnaMenu" id="colmenu">
    <?php echo $template->menu(); ?>
</div>
<div class="columnaMain" id="colmain">
    <?php

    if(isset($_GET['search'])){
        $busqueda = $_GET['search'];
        $usuarioDao = UsuarioDAO::singletonUsuario();
        $listaUsuarios = $usuarioDao->getBusquedaUsuarios($busqueda);
        //var_dump($listaUsuarios);
        if(empty($listaUsuarios)){
            echo'<p><h4 class="center">Busquera erronea: Usuario no encontrado</h4></p>';
        }else{
        if(count($listaUsuarios) === 1){
            header('Location: '. $ROOT .$listaUsuarios[0]->getUsername());
        }
        else{
        ?>
        <table class="striped responsive-table">
            <thead>
            <tr>
                <th class="center">Autor</th>
                <th class="center"></th>
                <th class="center">estilo</th>
            </tr>
            </thead>

            <tbody>
            <?php foreach ($listaUsuarios as $valor){
                echo '<tr>
                    <td class="col s1" width="16%">
                        <a href="'. $ROOT. $valor->getUsername() .'">
                        <div class="row valign-wrapper">
                            <div class="s1">
                                <img src="../../interfaz/profile_images/profile_'. $valor->getProfileImage().'" alt="" class="circle" height="80px" width="80px">
                            </div>
                        </div>
                        </a>
                    </td>
                    <td class="left-align">
                    <a href="'. $ROOT. $valor->getUsername() .'">
                        <div class="row valign-wrapper">
                            <div class="col s10">
                                <span class="black-text">'. $valor->getUsername() .'</span>
                            </div>
                        </div>    
                        </a>     
                    </td>
          </tr>';
            } ?>
            </tbody>
        </table>
    <?php } }
    }else{
        ?>
        <p><h4>Busquera erronea: Campo vacio</h4></p>
    <?php
    }

     ?>
</div>
<?php echo $template->footer(); ?>

</body>
</html>