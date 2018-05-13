<?php
/**
 * Created by PhpStorm.
 * User: Kuro
 * Date: 12/05/2018
 * Time: 17:01
 */

include_once '../templates/Template.php';
include_once '../../objetos/Usuario.php';
include_once '../../persistencia/UsuarioDAO.php';


if(!isset($_SESSION)){
    //Elementos Logged out
    $profileImage = null;
}else{
    //Elementos logged in

    $profileImage = $_SESSION['profileImage'];
}

$template = new Template();

?>
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
<head>
    <meta charset="UTF-8">
    <title>Sketching</title>


    <link rel="icon" href="../app_images/icono.png">


    <link href="../../css/main.css" type="text/css" rel="stylesheet" media="screen,projection"/>
    <link href="../../css/estilo_menu.css" type="text/css" rel="stylesheet" media="screen,projection"/>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet"/>
    <link type="text/css" rel="stylesheet" href="../../css/materialize.min.css"  media="screen,projection"/>

    <script src="https://code.jquery.com/jquery-1.10.2.js"></script>


    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
</head>
<body>
<?php echo $template->navBar($profileImage);?>
<div class="columnaMenu" id="index-menu">
    <?php echo $template->menu();?>
</div>
<div class="columnaMain">
    <?php

    if(isset($_GET['search'])){
        $busqueda = $_GET['search'];
        $usuarioDao = UsuarioDAO::singletonUsuario();
        $listaUsuarios = $usuarioDao->getBusquedaUsuarios($busqueda);
        if(count($listaUsuarios) === 0){
            echo'<p><h4>Busquera erronea: Usuario no encontrado</h4></p>';
        }else if(count($listaUsuarios) === 1){
            //Hacer que si solo encuentre a uno lo mande directamente a su perfil
        }
        else{
        ?>
        <table class="striped responsive-table">
            <thead>
            <tr>
                <th>Autor</th>
                <th></th>
                <th>estilo</th>
            </tr>
            </thead>

            <tbody>
            <?php foreach ($listaUsuarios as $valor){
                echo '<tr><td>
                    <div class="row valign-wrapper">
                        <div class="col s2">
                            <img src="'. $valor->getProfileImage().'" alt="" class="circle responsive-img">
                        </div>
                        <div class="col s10">
                            <span class="black-text">
                               '. $valor->getUsername() .'
                            </span>
                        </div>
                    </div>
          </td></tr> ';
            } ?>
            </tbody>
        </table>
        <?php}
    }else{
        ?>
        <p><h4>Busquera erronea: Campo vacio</h4></p>
    <?php
    }

    ?>
</div>
<?php echo $template->footer();?>

</body>
</html>
