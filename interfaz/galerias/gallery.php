<?php
/**
 * Created by PhpStorm.
 * User: Kuro
 * Date: 21/05/2018
 * Time: 19:33
 */

session_start();

include_once '../../persistencia/GaleriaDAO.php';
include_once '../../objetos/Galeria.php';
include_once '../../persistencia/UsuarioDAO.php';
include_once '../../objetos/Usuario.php';
include_once '../../persistencia/SubsDAO.php';
include_once '../../objetos/Subs.php';

//var_dump($_SESSION);


if(empty($_SESSION)){

    header('Location: index');
}else{
    //Elementos logged in
    $profileImage = $_SESSION['profileImage'];
    $profImageURL = '../profile_images/profile_'.$profileImage;
}

if(isset($_GET['autor']) && isset($_GET['gal'])) {

    $autor = $_GET['autor'];
    $gal = $_GET['gal'];

    $usuarioDao = UsuarioDAO::singletonUsuario();
    $autor = $usuarioDao->getUserbyName($autor);

    $galeriaDao = GaleriaDAO::singletonGaleria();
    if(!empty($_SESSION)){
        $user = $usuarioDao->getUserbyName($_SESSION['username']);
        $galeria = $galeriaDao->getGaleria($gal);

        $subsDao = SubsDAO::singletonSubs();
        $sub = $subsDao->getSubByUserAndAutor($user->getId(), $autor->getId());
        if($sub != null){
            if($sub->getTipo() >= $galeria->getTipo()){

            }else{
                header('Location: index');
            }

        }else{
            if($galeria->getTipo() == 0){

            }else{
                header('Location: index');
            }
        }

        $listaUsuarios = $galeriaDao->addvisita($gal);
    }


    include_once '../templates/Template.php';
    $template = new Template('../../');
?>

<html>
<head>
    <meta charset="UTF-8">
    <title>Sketching</title>

    <link rel="icon" href="../app_images/icono.png">


    <link href="../../css/main.css" type="text/css" rel="stylesheet" media="screen,projection"/>
    <link href="../../css/estilo_menu.css" type="text/css" rel="stylesheet" media="screen,projection"/>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet"/>
    <link type="text/css" rel="stylesheet" href="../../css/materialize.css"  media="screen,projection"/>

    <script src="https://code.jquery.com/jquery-1.10.2.js"></script><!-- jQuery is required -->
    <script src="../../dist/viewer.js"></script><!-- Viewer.js is required -->
    <link  href="../../dist/viewer.css" rel="stylesheet">
    <script src="../../dist/jquery-viewer.js"></script>
    <script type="text/javascript" rel="script" src="../../js/materialize.js"></script>
    <script type="text/javascript" rel="script" src="../../js/menu.js"></script>


    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
</head>
<body>
<?php echo $template->navBar($profImageURL);?>
<div class="columnaMenu" id="colmenu">
    <?php echo $template->menu();?>
</div>
<div class="columnaMain">
    <div class="section no-pad-bot" id="index-banner">
        <div class="light-green lighten-4">
            <div id="images" class="columnaPostLeft">
                <?php
                $fotos = scandir($autor->getUsername().'/'.$gal);
                //para eliminar las entradas ./ ../
                array_shift($fotos);
                array_shift($fotos);
                foreach ($fotos as $value){ ?>
                    <div class="row row-image white lighten-5 z-depth-1-half">
                        <div class=" valign-wrapper">
                            <img id="image" class="responsive-img" src="<?php echo $autor->getUsername().'/'.$gal.'/'.$value; ?>"/>
                        </div>
                    </div>
                <?php } ?>
            </div>
            <div class="columnaPostRight">
                <div class="card-panel grey lighten-5 z-depth-1 col s12">
                    <div class="row valign-wrapper">
                        <div class="col s12">
                            <span class="black-text center">
                                <h5>
                                    <b>
                                        <?php echo $galeria->getNombre(); ?>
                                    </b>
                                </h5>
                            </span>
                        </div>
                    </div>
                    <div class="col s10">
                        <span class="black-text center-align">
                                <h6><b><?php echo $galeria->getVisitas(); ?></b> Views</h6>
                        </span>
                    </div>
                    <div class="col s10">
                        <span class="black-text center-align">
                                <?php echo $galeria->getDescripcion(); ?>
                        </span>
                    </div>
                </div>
                <div class="card-panel grey lighten-5 z-depth-1 col s12">
                    <a href="<?php echo '../../' . $autor->getUsername(); ?>">
                    <div class="row valign-wrapper">
                        <div class="col s4">
                            <img class="circle" src="<?php echo Funciones::showImageProfile('../profile_images/profile_' . $autor->getProfileImage(), '../../'); ?>" width="60px" height="60px">
                        </div>
                        <div class="col s8">
                        <span class="black-text">
                            <h5>
                                <b>
                                    <?php echo $autor->getUsername(); ?>
                                </b>
                            </h5>
                        </span>
                        </div>
                    </div>
                    <div class="col s12">
                    <span class="black-text center-align">
                        <p>
                            <h6>
                                <b>
                                    <?php
                                    $sub = $subsDao->countSubsByAutor($autor->getId());
                                    echo $sub; ?>
                                </b>
                                Followers
                            </h6>
                        </p>
                        <?php echo $autor->getDescripcion(); ?>
                    </span>
                    </div>
                    </a>
                </div>
            </div>
        </div>
    </div>


    <div id="disqus_thread"></div>
    <script>

        $('#images').on('click', function () {
            var $image = $('#images');
            $image.viewer({
                rotatable: false,
                title: false,
                movable: false,
                scalable: false,
                viewed: function () {
                    $image.viewer('zoomTo', 1);
                }
            });
            var viewer = $image.data('viewer');
        });

        var disqus_config = function () {
        this.page.url = 'http://sketching.sytes.net/interfaz/galerias/gallery?user=<?php echo $user; ?>&gal=<?php echo $gal; ?>';  // Replace PAGE_URL with your page's canonical URL variable
        this.page.identifier = '<?php echo $gal; ?>'; // Replace PAGE_IDENTIFIER with your page's unique identifier variable
        };

        (function() { // DON'T EDIT BELOW THIS LINE
            var d = document, s = d.createElement('script');
            s.src = 'https://sketchingcastelar.disqus.com/embed.js';
            s.setAttribute('data-timestamp', +new Date());
            (d.head || d.body).appendChild(s);
        })();
    </script>
    <noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>

</div>
<?php echo $template->footer();?>

</body>
</html>
<?php }else{
    header('Location: /interfaz/galerias/gallery.php');
} ?>