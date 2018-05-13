<?php
/**
 * Created by PhpStorm.
 * User: Kuro
 * Date: 12/05/2018
 * Time: 17:02
 */
session_start();

require_once '../../persistencia/UsuarioDAO.php';
require_once '../../objetos/Usuario.php';

if(!empty($_SESSION)){
    $direccion = '/sketching/index.php';
    header('Location: '.$direccion);
}

if (isset($_POST['submit'])) {
    $login = $_POST['login'];
    $password = $_POST['password'];
    //$password = hash('sha256', $_POST['password']);

    echo "El login introducido es: $login<br>";
    echo "El password encriptado es: $password<br>";
    if (isset($login) && isset($password)) {

        $usuarioDao = UsuarioDAO::singletonUsuario();
        $u = $usuarioDao->getLoginPassword($login, $password);
        if (!is_null($u) && $u->getActivo() == 1) {
            //Guardar datos de este usuario en la sessión
            $_SESSION['idUsuario'] = $u->getIdUsuario();
            $_SESSION['login'] = $u->getLogin();
            $_SESSION['tipoUsuario'] = $u->getTipo();
            $_SESSION['nombre'] = $clie->getNombre() ;
            $_SESSION['apellido1'] = $clie->getApellido1();
            $_SESSION['apellido2'] = $clie->getApellido2();
            header('Location: /sketching/index.php');
            }
        } else {
            header('Location: login.php?identificado=1');
        }
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


    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
</head>
<body>
<?php echo $template->navBar();?>
<div class="columnaMenu" id="index-menu">
    <?php echo $template->menu();?>
</div>
<div class="columnaMain">

</div>
<?php echo $template->footer();?>

</body>
</html>
