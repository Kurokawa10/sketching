<?php
/**
* Created by PhpStorm.
* User: Kuro
* Date: 12/05/2018
* Time: 0:56
*/

session_start();

include_once 'persistencia/UsuarioDAO.php';
include_once 'persistencia/GaleriaDAO.php';
include_once 'persistencia/SubsDAO.php';

include_once 'objetos/Usuario.php';
include_once 'objetos/Galeria.php';
include_once 'objetos/Subs.php';

include_once 'interfaz/templates/Funciones.php';

$path = ltrim($_SERVER['REQUEST_URI'], '/');    // Trim leading slash(es)
$elements = explode('/', $path);                // Split path on slashes

if(empty($elements[0])) {                       // No path elements means home

} else{
    if(count($elements) >= 2){
        header('Location: ../index');
    }else{
        if(empty($elements[0]) || $elements[0] === 'index'){
            //pagina principal
        }else{
            $userSelec = $elements[0];
            $usuarioDao = UsuarioDAO::singletonUsuario();
            $autor = $usuarioDao->getUserbyName($userSelec);
            if(empty($autor)){
                header('Location: interfaz/publico/Busqueda.php');
            }
        }
    }
}

if(isset($_POST['logout'])){
    session_destroy();
    session_start();
}

if(isset($_POST['follow'])){
    $user = $_SESSION['username'];
    $usuarioDao = UsuarioDAO::singletonUsuario();
    $userId = $usuarioDao->getIdByName($user);
    $autorId = $usuarioDao->getIdByName($userSelec);

    $resultado = SubsDAO::singletonSubs()->addSub($userId, $autorId, 0);
}

if(isset($_POST['unfollow'])){
    $user = $_SESSION['username'];
    $usuarioDao = UsuarioDAO::singletonUsuario();
    $userId = $usuarioDao->getIdByName($user);
    $autorId = $usuarioDao->getIdByName($userSelec);
    $resultado = SubsDAO::singletonSubs()->unSub($userId, $autorId);
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
$template = new Template('');
?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/html">
<head>
    <meta charset="UTF-8">
    <title>Sketching</title>


    <link rel="icon" href="interfaz/app_images/icono.png">


    <link href="css/main.css" type="text/css" rel="stylesheet" media="screen,projection"/>
    <link href="css/estilo_menu.css" type="text/css" rel="stylesheet" media="screen,projection"/>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet"/>
    <link type="text/css" rel="stylesheet" href="css/materialize.css"  media="screen,projection"/>

    <script src="https://code.jquery.com/jquery-1.10.2.js"></script>
    
    <script type="text/javascript" rel="script" src="js/materialize.js"></script>
    <script type="text/javascript" rel="script" src="js/menu.js"></script>
    <script type="text/javascript" rel="script" src="js/infinitescroll.js"></script>
    <script type="text/javascript" rel="script" src="js/init.js"></script>



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
        }else{
            $galeriaDao = GaleriaDAO::singletonGaleria();
            $galerias1 = $galeriaDao->getUltGaleriasByUser($autor->getId());
            ?>
        <div class="columnaPostLeft">
            <?php if(isset($_SESSION['username']) && $_SESSION['username'] === $autor->getUsername()){ ?>
                <div class="valign-wrapper">
                    <div class="col s8">
                        <a href="interfaz/privado/uploadgallery">
                            <button class="btn waves-effect waves-light light-blue">New Gallery</button>
                        </a>
                    </div>
                </div>
            <?php } ?>
            <p hidden id="need" aria-valuenow="<?php echo $autor->getId(); ?>"></p>
            <div class="row" id="alldata">
            <?php if(!empty($galerias1)){
                foreach ($galerias1 as $value) { ?>
                <div class="vikash" id="<?php echo $value->getId(); ?>">
                    <div class="col s12">
                        <div class="card large <?php
                        $subsDao = SubsDAO::singletonSubs();
                        $usuarioDao = UsuarioDAO::singletonUsuario();
                        $userId = $usuarioDao->getIdByName($_SESSION['username']);
                        $noSub = $subsDao->getSubTipo($userId, $autor->getId());
                        if( $value->getTipo() > $noSub && $autor->getUsername() !== $_SESSION['username'] ){ echo 'lock';} ?>">
                            <div class="card-image">
                                <a href="interfaz/galerias/gallery?autor=<?php echo $autor->getUsername(); ?>&gal=<?php echo $value->getId(); ?>">
                                    <img class="responsive-img materialboxed" src="interfaz/galerias/<?php echo $autor->getUsername().'/'.$value->getId().'/0.jpg'; ?>">
                                    <span class="card-title"><strong><?php echo $value->getVisitas(); ?> Views</strong></span>
                                </a>
                            </div>
                            <div class="card-content">
                                <a href="interfaz/galerias/gallery?autor=<?php echo $autor->getUsername(); ?>&gal=<?php echo $value->getId(); ?>">
                                    <h5><?php echo $value->getNombre(); ?></h5>
                                    <h6><?php if($value->getTipo() == 1){
                                            echo '1€ sub';
                                        }elseif ($value->getTipo() == 3){
                                            echo '3€ sub';
                                        }elseif ($value->getTipo() == 5){
                                            echo '5€ sub';
                                        }else{
                                            echo 'Public';
                                        } ?> Gallery</h6>
                                </a>
                                <a style="float: right" href="interfaz/galerias/gallery?autor=<?php echo $autor->getUsername(); ?>&gal=<?php echo $value->getId().'#disqus_thread'; ?>">comments</a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php }
            }else{ ?>
                <h5 class="center"><strong>Wow, looks like this Creator hasn´t uploaded any Gallery yet...</strong></h5>
           <?php } ?>
            </div>
        </div>
        <div class="columnaPostRight">
            <div class="card-panel grey lighten-5 z-depth-1 col s12">
                <?php if(isset($_SESSION['username']) && $_SESSION['username'] === $userSelec){ ?>
                    <div class="valign-wrapper">
                        <div class="col s8">
                            <a href="interfaz/privado/Profile">
                                <button class="btn waves-effect waves-light light-blue">Edit Profile</button>
                            </a>
                        </div>
                    </div>
                <?php } ?>
                <div class="row valign-wrapper">
                    <div class="col s4">
                        <img class="circle" src="<?php echo Funciones::showImageProfile('interfaz/profile_images/profile_' . $autor->getProfileImage(), ''); ?>" width="60px" height="60px">
                    </div>
                    <div class="col s8">
                        <span class="black-text">
                            <h5>
                                <b id="autor_name">
                                    <?php echo $autor->getUsername(); ?>
                                </b>
                            </h5>
                        </span>
                    </div>
                </div>
                <div class="col s12">
                    <span class="black-text center-align">
                            <h6>
                                <b>
                                    <?php $subsDao = SubsDAO::singletonSubs();
                                    $sub = $subsDao->countSubsByAutor($autor->getId());
                                    echo $sub; ?>
                                </b>
                                Followers<br><br>
                                <?php if(isset($_SESSION['username']) && $userSelec !== $_SESSION['username']){
                                    $usuario = $usuarioDao->getUserbyName($_SESSION['username']);
                                    $follow = $subsDao->getSubByUserAndAutor($usuario->getId(), $autor->getId());
                                    if(empty($follow)){ ?>
                                        <form method="post" action="<?php echo $userSelec; ?>" enctype="multipart/form-data">
                                            <button class="btn waves-effect waves-light white black-text" name="follow">Follow</button>
                                        </form>
                                <?php }else{ ?>
                                        <form method="post" action="<?php echo $userSelec; ?>" enctype="multipart/form-data">
                                            <button class="btn waves-effect waves-light red black-text" name="unfollow" >Unfollow</button>
                                        </form>
                                <?php }
                                } ?>
                            </h6>
                        <?php  if(empty($autor->getDescripcion())){
                            echo 'This creator doesn´t have any description yet...';
                        }else{
                            echo $autor->getDescripcion();
                        } ?>
                    </span>
                </div>
            </div>
            <div class="card">
                <div class="card-content">
                    <p>Rewards</p>
                </div>
                <div class="card-tabs">
                    <ul class="tabs tabs-fixed-width">
                        <li class="tab"><a href="#tab1">1€ Reward</a></li>
                        <li class="tab"><a class="active" href="#tab2">3€ Reward</a></li>
                        <li class="tab"><a href="#tab3">5€ Reward</a></li>
                    </ul>
                </div>
                <div class="card-content grey lighten-4">
                    <div id="tab1" class="center">
                        <p>Access to new content each month</p>
                        <br>
                        <form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">
                            <input type="hidden" name="cmd" value="_s-xclick">
                            <input type="hidden" name="hosted_button_id" value="9M2CD3LYFCY52">
                            <input type="image" src="https://www.paypalobjects.com/es_ES/ES/i/btn/btn_subscribeCC_LG.gif" border="0" name="submit" onclick="suscribir(1)" alt="PayPal, la forma rápida y segura de pagar en Internet.">
                            <img alt="" border="0" src="https://www.paypalobjects.com/es_ES/i/scr/pixel.gif" width="1" height="1">
                        </form>
                    </div>
                    <div id="tab2" class="center">
                        <p>Access to my WIP</p>
                        <br>
                        <form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">
                            <input type="hidden" name="cmd" value="_xclick-subscriptions">
                            <input type="hidden" name="business" value="robert5_gg@hotmail.com">
                            <input type="hidden" name="lc" value="ES">
                            <input type="hidden" name="item_name" value="suscripcion 3€/mes">
                            <input type="hidden" name="item_number" value="3mes">
                            <input type="hidden" name="no_note" value="1">
                            <input type="hidden" name="src" value="1">
                            <input type="hidden" name="a3" value="3.00">
                            <input type="hidden" name="p3" value="1">
                            <input type="hidden" name="t3" value="M">
                            <input type="hidden" name="currency_code" value="EUR">
                            <input type="hidden" name="bn" value="PP-SubscriptionsBF:btn_subscribeCC_LG.gif:NonHostedGuest">
                            <input type="image" src="https://www.paypalobjects.com/es_ES/ES/i/btn/btn_subscribeCC_LG.gif" border="0" name="submit" onclick="suscribir(3)" alt="PayPal, la forma rápida y segura de pagar en Internet.">
                            <img alt="" border="0" src="https://www.paypalobjects.com/es_ES/i/scr/pixel.gif" width="1" height="1">
                        </form>
                    </div>
                    <div id="tab3" class="center">
                        <p>Access to Exclusive content</p>
                        <br>
                        <form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">
                            <input type="hidden" name="cmd" value="_s-xclick">
                            <input type="hidden" name="hosted_button_id" value="3QBU8VCSQ88QW">
                            <input type="image" src="https://www.paypalobjects.com/es_ES/ES/i/btn/btn_subscribeCC_LG.gif" border="0" name="submit" onclick="suscribir(5)" alt="PayPal, la forma rápida y segura de pagar en Internet.">
                            <img alt="" border="0" src="https://www.paypalobjects.com/es_ES/i/scr/pixel.gif" width="1" height="1">
                        </form>

                    </div>
                </div>
            </div>
        </div>
         <?php } ?>
    </div>
    <?php echo $template->footer(); ?>
    <script>
        function suscribir(a){
            switch(a){
                case 1:
                    break;
                case 3:
                    break;
                case 5:
                    break;
            }
        }
    </script>
    <script id="dsq-count-scr" src="//sketchingcastelar.disqus.com/count.js" async></script>
</body>
</html>

