<?php
/**
 * Created by PhpStorm.
 * User: Kuro
 * Date: 10/05/2018
 * Time: 19:02
 */
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Sketching</title>
    <link href="../../css/main.css" type="text/css" rel="stylesheet" media="screen,projection"/>
    <link href="../../css/estilo_menu.css" type="text/css" rel="stylesheet" media="screen,projection"/>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet"/>
    <link type="text/css" rel="stylesheet" href="../../css/materialize.min.css"  media="screen,projection"/>

    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
</head>
<body>
    <div>
        <div class="columnaMainLeft" style="margin: auto">
            <img src="../../interfaz/app_images/logo.png" width="80%" height="80%">
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
</body>