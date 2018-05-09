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
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet"/>
        <link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>

        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    </head>

    <body>
        <div>
            <div class="columnaMenu" id="index-menu">
                <object  name="menu_lateral" data="interfaz/templates/MenuLateral.php">
                </object>
            </div>
            <div class="grey">
                <div class=" columnaMain">
                    <div class="section no-pad-bot" id="index-banner">
                        <object  name="cabecera" data="interfaz/templates/HeaderNoLogged.php" width="100%" height="80">
                        </object>
                    </div>
                </div>
                <div>
                    <div class="columnaMainLeft" style="margin: auto">
                        <img src="interfaz/app_images/logo.png" width="80%" height="80%">
                    </div>
                    <div class="columnaMainRight">
                        <form>
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
        <script type="text/javascript" src="js/materialize.min.js"></script>
    </body>
</html>
