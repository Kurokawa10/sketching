
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
<div style="padding-top: 5px">
    <nav class="light-blue lighten-1" role="navigation">
        <a id="logo-container" href="index.php" class="brand-logo"><img src="interfaz/app_images/icono.png" height="60" width="60"></a>
        <div class="nav-wrapper container">
            <ul class="right hide-on-med-and-down">
                <li><a href="#">Sing up</a></li>
                <li><a href="#">Log in</a></li>
            </ul>

            <ul id="nav-mobile" class="sidenav">
                <li><a href="#">Sing up</a></li>
                <li><a href="#">Log in</a></li>
            </ul>
            <a href="#" data-target="nav-mobile" class="sidenav-trigger"><i class="material-icons">menu</i></a>
        </div>
    </nav>
    <div id="menu-oculto" style="display: none"><a><i class="small material-icons">menu</i></a></div>
    <div class="columnaMenu" id="index-menu">
        <header id="menu" class="light-blue lighten-1">
            <header id="logo">
            </header>
            <ul class="menu">
                <li><a href="#"><i class="icono izquierda fa fa-cogs" aria-hidden="false"></i>Navegar<i id="boton-menu" class="small material-icons icono derecha fa fa-chevron-down" aria-hidden="true">menu</i></a>
                    <ul class="submenu">
                        <li><a href="#">Galerias<i class="icono derecha fa fa-chevron-down" aria-hidden="true"></i></a></li>
                        <li><a href="#">Artistas</a></li>
                        <li><a href="#"></a></li>
                        <li><a href="#">Grupo<i class="icono derecha fa fa-chevron-down" aria-hidden="true"></i></a></li>
                        <li><a href="#">item 5</a></li>
                        <li><a href="#">item 6</a></li>
                        <li><a href="#">item 7</a></li>
                        <li><a href="#">item 8</a></li>
                        <li><a href="#">item 9</a></li>
                        <li><a href="#">item 10 largo </a></li>
                    </ul>
                </li>
            </ul>
        </header>
    </div>
    <div class="grey">
        <div class="columnaMain">
            <div class="section no-pad-bot" id="index-banner">

                <div class="container light-green lighten-4">

                    <object name="principal" data="interfaz/templates/mainBody.php" width="100%" height="1000">
                        <!--Contenedor de información variada-->
                    </object>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript" src="js/materialize.min.js"></script>

<script>
    $("#menu-oculto").click(function() {
        $(this).hide();
        $("#index-menu").show();
    });

    $("#boton-menu").click(function() {
        $("#index-menu").hide();
        $("#menu-oculto").show();
    });
</script>
</body>
</html>
