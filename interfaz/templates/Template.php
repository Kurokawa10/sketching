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

    public function navBar($profileImage){
        $html = '<nav id="naveBar" class="light-blue lighten-1" role="navigation">
        <a id="logo-container" href="/sketching/index" class="brand-logo"><img src="/sketching/interfaz/app_images/icono.png" height="60" width="60"></a>
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
                </li>' ;
                if(empty($_SESSION)){
                    $html .= '<li><a href="/sketching/interfaz/publico/Singup">Sing up</a></li>
                    <li><a href="/sketching/interfaz/publico/Login">Log in</a></li>';
                }else {
                    $html .= '<li>
                                <div class="row valign-wrapper">
                                    <div class="col">
                                      <img src="'.$profileImage.'" alt="" class="circle responsive-img" height="60" width="60">
                                    </div>
                                    <div class="col s5">
                                      <span class="black-text">
                                        <a href="/sketching/interfaz/privado/Profile">Profile</a>
                                      </span>
                                    </div>
                                </div></li>
                        <li><form name="formLogout" action="/sketching/index" method="POST" enctype="multipart/form-data">
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
        return '
        <script async defer src="https://buttons.github.io/buttons.js"></script>
        <script async src="https://platform.twitter.com/widgets.js"></script>
        <footer class="page-footer light-green">
          <div class="container">
            <div class="row">
              <div class="col l4 s4">
                <h5 class="white-text">Footer Content</h5>
                <p class="grey-text text-lighten-4">You can use rows and columns here to organize your footer content.</p>
              </div>
              <div class="col l4 offset-l1 s4">
                <h5 class="white-text">Links</h5>
                <ul>
                  <li><a class="grey-text text-lighten-3" href="https://iescastelar.educarex.es/">I.E.S. Castelar</a></li>
                  <li><a class="grey-text text-lighten-3" href="http://github.homelinux.com:8085/RobertoGarcia">Mi Proyecto <img height="30px" src="../app_images/gitlab-icon.png" alt=""></a></li>
                </ul>
              </div>
              <div class="col l3 s4" style="overflow: hidden;">
                <h5>Connect</h5>
                <a class="github-button" href="https://github.com/kurokawa10" data-size="large" data-show-count="true" aria-label="Follow @kurokawa10 on GitHub">Follow @kurokawa10</a>
                <br>
                <a class="twitter-follow-button" href="https://twitter.com/GgRobert10" data-size="large"> Follow @GgRobert10</a>
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