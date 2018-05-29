<?php
/**
 * Created by PhpStorm.
 * User: Kuro
 * Date: 13/05/2018
 * Time: 21:00
 */
session_start();

require_once '../../persistencia/UsuarioDAO.php';
require_once '../../objetos/Usuario.php';
include '../templates/Template.php';


if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $name = $_POST['name'];
    $lastName = $_POST['lastname'];
    $birthDate = $_POST['birthdate'];
    $descripcion = $_POST['description'];
    $imageProfile = "";

    if (!empty($_FILES['imagefile']['name'])){
        $nombreOriginal=$_FILES['imagefile']['name'];
        $posPunto=strpos($nombreOriginal,".")+1;
        $extensionOriginal=  substr($nombreOriginal, $posPunto, 3);
        $nuevaRuta = "../profile_images/profile_" . $username . "." . $extensionOriginal;
        move_uploaded_file($_FILES['imagefile']['tmp_name'], $nuevaRuta);
        $imageProfile = $username. '.' . $extensionOriginal;
    }else{
        $imageProfile = $_SESSION['profileImage'];
    }

    $usuarioDao = UsuarioDAO::singletonUsuario();
    $user = new Usuario(null, $username, $email, $name, $lastName, $birthDate, $imageProfile, $descripcion, null);
    $usuarioDao->actualizarUsuario($user, $_SESSION['username']);
    if (!is_null($user)) {
        //Guardar datos de este usuario en la sessión
        $_SESSION['username'] = $username;
    }
}

if(empty($_SESSION)){
    //Elementos Logged out
    header('Location: ../../index');
}else{
    //Elementos logged in
    $profileImage = $_SESSION['profileImage'];
    $profImageURL = '../../interfaz/profile_images/profile_'.$profileImage;
    $usuarioDao = UsuarioDAO::singletonUsuario();
    $placeUser = $usuarioDao->getUserByName($_SESSION['username']);
}


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

    <script src="https://code.jquery.com/jquery-1.10.2.js"></script>
    <script src="http://momentjs.com/downloads/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.12.0/moment.js"></script>

    <script type="text/javascript" rel="script" src="../../js/materialize.js"></script>
    <script type="text/javascript" rel="script" src="../../js/menu.js"></script>
    <script type="text/javascript" rel="script" src="../../js/modify.js"></script>


    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
</head>
<body>
<?php echo $template->navBar($profImageURL);?>
<div class="columnaMenu" id="colmenu">
    <?php echo $template->menu();?>
</div>
<div class="columnaMain" id="colmain">
    <div class="section no-pad-bot" id="index-banner">
        <div class="light-green lighten-4">
            <form method="post" action="Profile" name="modify" enctype="multipart/form-data">
                <div class="columnaMainLeft">
                    <label for="user_modify" class="text-lighten-2 col s4"><h6><strong id="user_modify_label">Username</strong></h6></label>
                    <input id="user_modify" type="text" name="username" value="<?php echo $placeUser->getUsername(); ?>" required/><br/>
                    <label for="email_modify" class="text-lighten-2 col s4"><h6><strong id="email_modify_label">E-mail</strong></h6></label>
                    <input id="email_modify" type="email" name="email" value="<?php echo $placeUser->getEmail(); ?>" required/><br/>
                    <label for="description_modify" class="text-lighten-2 col s4"><h6><strong>Description</strong></h6></label>
                    <textarea id="description_modify" type="text" name="description" class="materialize-textarea"><?php echo $placeUser->getDescripcion(); ?></textarea><br/>
                    <div class="right-align"><button class="btn-large waves-effect waves-light light-blue right-aligned" id="submit_modify" type="submit" name="submit" value="modify">Save Profile</button></div>
                </div>
                <div class="columnaMainRight">
                    <label for="name_modify" class="text-lighten-2 col s4"><h6><strong>Name</strong></h6></label>
                    <input id="name_modify" type="text" name="name" value="<?php echo $placeUser->getNombre(); ?>" required/><br/>
                    <label for="lastname_modify" class="text-lighten-2 col s4"><h6><strong>Last Name</strong></h6></label>
                    <input id="lastname_modify" type="text" name="lastname" value="<?php echo $placeUser->getAppelido(); ?>" required/><br/>
                    <label for="birth_modify" class="text-lighten-2 col s4"><h6><strong id="birth_modify_label">Birth date</strong></h6></label>
                    <input id="birth_modify" type="date" name="birthdate" value="<?php echo $placeUser->getBirthDate(); ?>" required/><br/>
                    <div class="file-field input-field">
                        <div class="btn waves-effect waves-light light-blue">
                            <span>Change Profile image</span>
                            <input type="file" name="imagefile" id="id_image">
                        </div>
                        <div class="file-path-wrapper">
                            <input class="file-path validate" type="text" id="image_modify" name="profileimage">
                        </div>
                        <h6 id="image_modify_label" class="red-text"></h6>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<?php echo $template->footer();?>
</body>
</html>

