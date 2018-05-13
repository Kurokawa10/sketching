<?php
/**
* Created by PhpStorm.
* User: Kuro
* Date: 12/05/2018
* Time: 0:56
*/
session_start();


if(isset($_POST['logout'])){
    session_destroy();
    session_start();
}

include 'interfaz/templates/Template.php';
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


    <link rel="icon" href="interfaz/app_images/icono.png">


    <link href="css/main.css" type="text/css" rel="stylesheet" media="screen,projection"/>
    <link href="css/estilo_menu.css" type="text/css" rel="stylesheet" media="screen,projection"/>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet"/>
    <link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>

    <script src="https://code.jquery.com/jquery-1.10.2.js"></script>


    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
</head>

<body>
    <?php echo $template->navBar();?>
    <div class="columnaMenu" id="index-menu">
        <?php echo $template->menu();?>
    </div>
    <div class="columnaMain">
        <div class="section no-pad-bot" id="index-banner">
            <div id="main_body" class="container light-green lighten-4">
                <div class="columnaMainLeft" style="margin: auto">
                    <img src="interfaz/app_images/logo.png" width="100%" height="100%">
                </div>
                <div class="columnaMainRight">
                    <form method="post" name="login">
                        <label for="user">Usuario</label>
                        <input id="user" type="text" name="username"/><br/>
                        <label for="pass">Contraseña</label>
                        <input id="pass" type="password" name="password"/><br/>
                        <button class="btn waves-effect waves-light" type="submit" name="action">Login</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <?php echo $template->footer();?>
</body>
</html>
