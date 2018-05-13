<?php
/**
 * Created by PhpStorm.
 * User: Kuro
 * Date: 12/05/2018
 * Time: 16:05
 */

class template
{

    public function __construct()
    {
    }

    public function navBar(){
        $html = '<nav id="naveBar" class="light-blue lighten-1" role="navigation">
        <a id="logo-container" href="/sketching/index.php" class="brand-logo"><img src="/sketching/interfaz/app_images/icono.png" height="60" width="60"></a>
        <div class="nav-wrapper container">
            <ul class="right hide-on-med-and-down">
                <li>
                    <form method="get" name="search" action="/sketching/interfaz/publico/Busqueda">
                        <div class="row">
                        <div class="input-field col s12">
                          <i class="material-icons prefix">search</i>
                          <input id="search" name="search" type="text" placeholder="Search" class="validate">
                        </div>
                      </div>
                    </form>
                </li>';
                if(empty($_SESSION)){
                    $html .= '<li><a href="/sketching/interfaz/publico/Singup.php">Sing up</a></li>
                    <li><a href="/sketching/interfaz/publico/Login.php">Log in</a></li>';
                }else {
                    $html .= '<li><form name="formLogout" action="/sketching/interfaz/publico/Singup.php" method="POST" enctype="multipart/form-data">
                        <input type="submit" value="logout" name="logout" class="small btn mdi-navigation-arrow-drop-down right red">
                    </form></li>

';
                }
            $html .= '
            </ul>

            <ul id="nav-mobile" class="sidenav">
                <li><a href="#">Sing up</a></li>
                <li><a href="#">Log in</a></li>
            </ul>
            <a href="#" data-target="nav-mobile" class="sidenav-trigger"><i class="material-icons">menu</i></a>
        </div>
    </nav>';
        return $html;
    }

    public function menu(){
        return '
<div id="menu-oculto" style="display: none"><a><i class="small material-icons">menu</i></a></div>

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
<script type="text/javascript" src="../../js/materialize.min.js"></script>

<script>
    $("#menu-oculto").click(function() {
        $(this).hide();
        $("#index-menu").show();
    });

    $("#boton-menu").click(function() {
        $("#index-menu").hide();
        $("#menu-oculto").show();
    });
</script>';
    }

    public function footer(){
        return '<footer class="page-footer light-green">
          <div class="container">
            <div class="row">
              <div class="col l6 s12">
                <h5 class="white-text">Footer Content</h5>
                <p class="grey-text text-lighten-4">You can use rows and columns here to organize your footer content.</p>
              </div>
              <div class="col l4 offset-l2 s12">
                <h5 class="white-text">Links</h5>
                <ul>
                  <li><a class="grey-text text-lighten-3" href="#!">Link 1</a></li>
                  <li><a class="grey-text text-lighten-3" href="#!">Link 2</a></li>
                  <li><a class="grey-text text-lighten-3" href="#!">Link 3</a></li>
                  <li><a class="grey-text text-lighten-3" href="#!">Link 4</a></li>
                </ul>
              </div>
            </div>
          </div>
          <div class="footer-copyright">
            <div class="container">
            © 2018 Copyright Text
            <a class="grey-text text-lighten-4 right" href="#!">More Links</a>
            </div>
          </div>
        </footer>';
    }

}