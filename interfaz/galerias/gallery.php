<?php
/**
 * Created by PhpStorm.
 * User: Kuro
 * Date: 21/05/2018
 * Time: 19:33
 */

session_start();
//$ROOT = '/~robertogarcia/';
$ROOT = '/sketching/';

//var_dump($_SESSION);


$direccion = $ROOT.'index';
if(empty($_SESSION)){

    header('Location: '.$direccion);
}else{
    //Elementos logged in
    $profileImage = $_SESSION['profileImage'];
    $profImageURL = '../profile_images/profile_'.$profileImage;
}

if(isset($_GET['user']) && isset($_GET['gal'])) {

    $user = $_GET['user'];
    $gal = $_GET['gal'];


}

include_once '../templates/Template.php';
$template = new Template($ROOT);
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

    <script src="https://code.jquery.com/jquery-1.10.2.js"></script>
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
            <div class="columnaMainLeft" style="margin: auto">
                <img class="responsive-img" src="../app_images/logo.png">
            </div>
            <div class="columnaMainRight">
                <form method="post" action="Login" name="login">
                    <label for="user" class="text-lighten-2"><h6><strong>Usuario</strong></h6></label>
                    <input id="user" type="text" name="username" required/><br/>
                    <label for="pass"><h6><strong>Contraseña</strong></h6></label>
                    <input id="pass" type="password" name="password" required/><br/>
                    <button class="btn waves-effect waves-light" type="submit" name="submit" value="enviar" onclick="cifrar()">Login</button>
                </form>
            </div>
        </div>
    </div>


    <div id="disqus_thread"></div>
    <script>
        var disqus_config = function () {
        this.page.url = 'http://localhost/sketching/interfaz/galerias/gallery?user=<?php echo $user; ?>&gal=<?php echo $gal; ?>';  // Replace PAGE_URL with your page's canonical URL variable
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
<script id="dsq-count-scr" src="//sketchingcastelar.disqus.com/count.js" async></script>
</body>
</html>