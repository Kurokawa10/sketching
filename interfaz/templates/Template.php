<?php
/**
 * Created by PhpStorm.
 * User: Kuro
 * Date: 12/05/2018
 * Time: 16:05
 */

include_once 'Funciones.php';

class template
{
    private $ROOT;

    public function __construct( String $ROOT )
    {
        $this->ROOT = $ROOT;
    }

    /**
     * 
     * @param type $profileImage
     * @return string
     */
    public function navBar($profileImage){
        $html = '<nav id="naveBar" class="white lighten-1 navbar-fixed" role="navigation">
        <a style="height:60px;" href="'. $this->ROOT .'index" class="brand-logo"><img src="'. $this->ROOT .'interfaz/app_images/icono.png" height="60" width="60"></a>
        <div class="nav-wrapper container">
            <ul class="right hide-on-med-and-down">
                <li>
                    <form method="get" name="search" action="'. $this->ROOT .'interfaz/publico/Busqueda">
                        <div class="row">
                        <div class="input-field col s10">
                        <p>
                          <i class="black-text material-icons prefix">search</i>
                          <input id="search" name="search" type="search" placeholder="Search" class="validate">
                          </p>
                        </div>
                      </div>
                    </form>
                </li>' ;
                if(empty($_SESSION)){
                    $html .= '<li><a class="black-text" href="'. $this->ROOT .'interfaz/publico/Singup">Sing up</a></li>
                    <li><a class="black-text" href="'. $this->ROOT .'interfaz/publico/Login">Log in</a></li>';
                }else {
                    $html .= '<li>
                                <div class="row nav-wrapper">
                                    <a class="black-text" href="'. $this->ROOT . $_SESSION['username'].'">
                                        <div class="col">
                                            <img src="'. Funciones::showImageProfile($profileImage, $this->ROOT) .'" alt="" class="circle" height="60px" width="60px">
                                        </div>
                                        <div class="col s5">
                                            <span >
                                                Profile
                                            </span>
                                        </div>
                                    </a>
                                </div></li>
                        <li><form name="formLogout" action="'. $this->ROOT .'index" method="POST" enctype="multipart/form-data">
                        <input type="submit" value="logout" name="logout" class="small btn mdi-navigation-arrow-drop-down right relaxing-red">
                    </form></li>
';
                }
            $html .= '
            </ul>
        </div>
    </nav>';
        return $html;
    }

    public function menu(){
        $html = '
    <div id="menu-oculto" style="display:none"><a><i class="small material-icons">menu</i></a></div>
    <div id="index-menu">
    <header id="menu" class="white lighten-1">
        <ul class="menu">
            <li><a><i class="icono izquierda fa fa-cogs" aria-hidden="false"></i>Navigate<i id="boton-menu" class="small material-icons icono derecha fa fa-chevron-down" aria-hidden="true">menu</i></a>
                <ul class="submenu">
                    <li>
                        <form method="get" name="search" action="'. $this->ROOT .'interfaz/publico/Busqueda">
                            <div class="input-field col s10">
                                <p>
                                    <i class="black-text material-icons prefix">search</i>
                                    <input id="search" name="search" type="search" placeholder="Search" class="validate">
                                </p>
                            </div>
                        </form>
                    </li>
                    <li><a href="#">Categories</a>
                    <ul class="submenu">
                        <li><a href="#">Categories</a>
                        <li><a href="#">Categories</a>
                        <li><a href="#">Categories</a>
                        <li><a href="#">Categories</a>
                        <li><a href="#">Categories</a>
                        <li><a href="#">Categories</a>
                        <li><a href="#">Categories</a>
                    </ul>
                    </li>
                    
                </ul>
            </li>
        </ul>
    </header>
    </div>';
        
    return $html; 
    }

    public function indexDefault(){
     
        $html = '<div class="section no-pad-bot" id="index-banner">
            <div class="container white lighten-4">
                <div class="columnaMainLeft" style="margin: auto">
                    <img class="responsive-img" src="interfaz/app_images/logo.png">
                </div>
                <div class="columnaMainRight">
                    <h1>WELCOME</h1>
                </div>
            </div>
        </div>';
        
        return $html;
    }

    public function footer(){
        return '
        <script async defer src="https://buttons.github.io/buttons.js"></script>
        <script async src="https://platform.twitter.com/widgets.js"></script>
        <footer class="page-footer relaxing-grey">
          <div class="container">
            <div class="row">
              <div class="col l4 s4">
                <h5 class="black-text">Footer Content</h5>
                <p class="black-text text-lighten-4">Final project for Cross-platform Apps development.</p>
              </div>
              <div class="col l4 offset-l1 s4">
                <h5 class="black-text">Links</h5>
                <ul>
                  <li><a class="black-text text-lighten-3" href="https://iescastelar.educarex.es/">I.E.S. Castelar</a></li>
                  <li><a class="black-text text-lighten-3" href="http://github.homelinux.com:8085/RobertoGarcia/sketching">Mi Proyecto <img height="30px" src="'. $this->ROOT .'interfaz/app_images/gitlab-icon.png" alt=""></a></li>
                </ul>
              </div>
              <div class="col l3 s4" style="overflow: hidden;">
                <h5 class="black-text">Connect</h5>
                <a class="github-button" href="https://github.com/kurokawa10" data-size="large" data-show-count="true" aria-label="Follow @kurokawa10 on GitHub">Follow @kurokawa10</a>
                <br>
                <a class="twitter-follow-button" href="https://twitter.com/GgRobert10" data-size="large"> Follow @GgRobert10</a>
                </div>
            </div>
          </div>
          <div  class="footer-copyright black-text">
            <div class="container">
            © 2018 Copyright Text
            </div>
          </div>
        </footer>';
    }

}