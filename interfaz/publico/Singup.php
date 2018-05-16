<?php
/**
 * Created by PhpStorm.
 * User: Kuro
 * Date: 12/05/2018
 * Time: 17:02
 */

session_start();
//$ROOT = '/~robertogarcia/';
$ROOT = '/sketching/';

var_dump($_SESSION);

require_once '../../persistencia/UsuarioDAO.php';
require_once '../../objetos/Usuario.php';
require_once '../../objetos/Acceso.php';

if(!empty($_SESSION)){
    $direccion = $ROOT.'index';
    header('Location: '.$direccion);
}

include '../templates/Template.php';
$template = new Template($ROOT);

if (isset($_POST['submit'])) {
    /*$username = $_POST['username'];
    $password = $_POST['password'];

    echo "El login introducido es: $username<br>";
    echo "El password encriptado es: $password<br>";
    if (isset($username) && isset($password)) {

        $usuarioDao = UsuarioDAO::singletonUsuario();
        $u = $usuarioDao->getLoginPassword($username, $password);
        if (!is_null($u)) {
            //Guardar datos de este usuario en la sessión
            $_SESSION['username'] = $u->getUsername();
            $_SESSION['profileImage'] = $u->getProfileImage();
            $_SESSION['ultimoAceso'] = $u->getAcceso()->getUltimoAcceso();
            $_SESSION['rol'] = $u->getAcceso()->getRol();

            header('Location: /sketching/index');
        }else {
            header('Location: login?identificado=1');
        }
    }*/


}
?>

<html>
<head>
    <meta charset="UTF-8">
    <title>Sketching</title>

    <link rel="icon" href="../app_images/icono.png">


    <link href="../../css/main.css" type="text/css" rel="stylesheet" media="screen,projection"/>
    <link href="../../css/estilo_menu.css" type="text/css" rel="stylesheet" media="screen,projection"/>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet"/>
    <link type="text/css" rel="stylesheet" href="../../css/materialize.min.css"  media="screen,projection"/>

    <script src="https://code.jquery.com/jquery-1.10.2.js"></script>
    <script src="http://momentjs.com/downloads/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.12.0/moment.js"></script>

    <script type="text/javascript" rel="script" src="../../js/materialize.js"></script>
    <script type="text/javascript" rel="script" src="../../js/menu.js"></script>
    <script type="text/javascript" rel="script" src="../../js/singup.js"></script>


    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
</head>
<body>
<?php echo $template->navBar(null);?>
<div class="columnaMenu" id="colmenu">
    <?php echo $template->menu();?>
</div>
<div class="columnaMain">
    <div class="section no-pad-bot" id="index-banner">
        <div class="light-green lighten-4">
            <?php
            if (isset($_GET['identificado']))
                if ($_GET['identificado'] == 1) {
                    ?>
                    <span class="center-block red-text">
                            <b>Fallo de autenticación.Intentelo de nuevo</b>
                        </span>
                    <?php
                }
            ?>
            <form method="post" action="Singup" id="form_singup" name="singup">
            <div class="columnaMainLeft">
                <label  for="user_singup" class="text-lighten-2 col s4"><h6><strong id="user_singup_label">Username</strong></h6></label>
                <input id="user_singup" type="text" name="username" required/><br/>
                <label for="email_singup" class="text-lighten-2 col s4"><h6><strong id="email_singup_label">E-mail</strong></h6></label>
                <input id="email_singup" type="email" name="email" required/><br/>
                <label for="pass_singup" class="text-lighten-2 col s4"><h6><strong>Password</strong></h6></label>
                <input id="pass_singup" type="password" name="pass" required/><br/>
                <pre><label for="pass2_singup" class="text-lighten-2 col s4"><h6><strong id="pass2_singup_label">Repeat Password</strong></h6></label></pre>
                <input id="pass2_singup" type="password" name="password2" required/><br/>
                <div class="right-align"><button class="btn-large waves-effect waves-light right-aligned" id="submit_singup" type="submit" name="submit" value="singup" onclick="cifrar()" disabled>Login</button></div>
            </div>
            <div class="columnaMainRight">
                <label for="name_singup" class="text-lighten-2 col s4"><h6><strong>Name</strong></h6></label>
                <input id="name_singup" type="text" name="name" required/><br/>
                <label for="lastname_singup" class="text-lighten-2 col s4"><h6><strong>Last Name</strong></h6></label>
                <input id="lastname_singup" type="text" name="lastname" required/><br/>
                <label for="birth_singup" class="text-lighten-2 col s4"><h6><strong id="birth_singup_label">Birth date</strong></h6></label>
                <input id="birth_singup" type="date" name="birthdate" required/><br/>
                <div class="file-field input-field">
                    <div class="btn">
                        <span>Profile image</span>
                        <input type="file">
                    </div>
                    <div class="file-path-wrapper">
                        <input class="file-path validate" type="text" id="image_singup" name="profileimage">
                    </div>
                </div>
                <h6 id="image_singup_label" class="red-text"></h6>
            </div>

            </form>
        </div>
    </div>
</div>
<?php echo $template->footer();?>

<script src="../../js/sha256.js"></script>
<script>
    function cifrar(){
        let input_pass = document.getElementById("pass");
        input_pass.value = sha256(input_pass.value);
    }
</script>
</body>
</html>

