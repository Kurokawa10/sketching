<?php
/**
 * Created by PhpStorm.
 * User: Kuro
 * Date: 27/05/2018
 * Time: 18:29
 */

session_start();

require_once '../../persistencia/GaleriaDAO.php';
require_once '../../persistencia/UsuarioDAO.php';
require_once '../../objetos/Usuario.php';
require_once '../../objetos/Galeria.php';

include '../templates/Template.php';


if (isset($_POST['submit'])) {
    $nombre = $_POST['name'];
    $descripcion = $_POST['description'];
    $autor = $_SESSION['username'];
    $creacion = date('Y/m/d h:i:s', time());
    $type = $_POST['type'];
    var_dump($type);
    switch ($type){
        case '1':
            $tipo = 1;
            break;
        case '3':
            $tipo = 3;
            break;
        case '5':
            $tipo = 5;
            break;
        default:
            $tipo = 0;
            break;
    }

    $galeriaDao = GaleriaDAO::singletonGaleria();
    $usuarioDao = UsuarioDAO::singletonUsuario();
    $userId = $usuarioDao->getIdByName($autor);
    $galeria = new Galeria(null, $nombre, $descripcion, $userId, $creacion, 0, $tipo);
    $added = $galeriaDao->addGaleria($galeria);


    if ($added !== 0 && !empty($_FILES['imagesfile'])){

        mkdir('../galerias/'.$autor.'/'.$added, 700, true);

        $arrayImages = $_FILES['imagesfile'];

        foreach ($arrayImages['name'] as $key => $value){
            $nombreOriginal = $value;
            $posPunto = strpos($nombreOriginal, ".") + 1;
            $extensionOriginal=  substr($nombreOriginal, $posPunto, 3);
            if($key === 0){
                $extensionOriginal = 'jpg';
            }
            $path = "../galerias/". $autor ."/". $added ."/". $key . "." . $extensionOriginal;
            move_uploaded_file($arrayImages['tmp_name'][$key], $path);
        }
        header('Location: ../../../'.$autor);
    }
}

if(empty($_SESSION)){
    //Elementos Logged out
    header('Location: ../../index');
}else{
    //Elementos logged in
    $profileImage = $_SESSION['profileImage'];
    $profImageURL = '../../interfaz/profile_images/profile_'.$profileImage;
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


    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
</head>
<body>
<?php echo $template->navBar($profImageURL);?>
<div class="columnaMenu" id="colmenu">
    <?php echo $template->menu();?>
</div>
<div class="columnaMain" id="colmain">
    <div class="section no-pad-bot" id="index-banner">
        <form method="post" action="uploadgallery" name="uploadGallery" enctype="multipart/form-data">
            <div class="columnaUploadGallery">
                <label for="name_upload" class="black-text text-lighten-2 col s4"><h6><strong id="user_modify_label">Gallery Name</strong></h6></label>
                <input id="name_upload" type="text" name="name" required/><br/>
                <div class="input-field col s12">
                    <select id="tipo_upload" name="type" required>
                        <option value="" disabled selected>Choose your Gallery type</option>
                        <option value="0">Public</option>
                        <option value="1">1&euro;</option>
                        <option value="3">3&euro;</option>
                        <option value="5">5&euro;</option>
                    </select>
                    <label for="tipo_upload" class="black-text"></label>
                </div>
                <label for="description_upload" class="black-text text-lighten-2 col s4"><h6><strong>Description</strong></h6></label>
                <textarea id="description_upload" type="text" name="description" class="materialize-textarea"></textarea><br><br>

                <div class="file-field input-field">
                    <div class="btn">
                        <span>Images</span>
                        <input id="imagesUpload" type="file" name="imagesfile[]" multiple="multiple">
                    </div>
                    <div class="file-path-wrapper">
                        <input class="file-path validate" type="text" placeholder="Upload one or more files">
                    </div>
                </div>
                <label id="images_label"></label>
                <div class="tip">
                    <label class="black-text text-lighten-2 col s4"></label><h6>Tip: If You want your gallery to be ordered name it as number of pages.<br><br>E.g. 0.jpg for the cover,<br><br>1.jpg for the first page...</h6></label>
                </div>
                <br>

                <div class="center"><button class="btn-large waves-effect waves-light light-blue right-aligned" id="submit_modify" type="submit" name="submit" value="modify">Upload Gallery</button></div>
            </div>
        </form>
    </div>
</div>
<?php echo $template->footer();?>
<script type="text/javascript" rel="script" src="../../js/init.js"></script>
<script>
    let images = $('#imagesUpload');
    images.on('change', function () {
        $('#images_label').text(images.val());
        /*let posPunto = image.val().indexOf('.') + 1;
        if((image.val().indexOf('jpg', posPunto) !== -1) || (image.val().indexOf('jpeg', posPunto) !== -1) || (image.val().indexOf('png', posPunto) !== -1) || (image.val().indexOf('gif', posPunto) !== -1) ){
            $('#image_singup_label').text('');
        }else{
            $('#image_singup_label').text('Invalid file!');
        }*/
    });
</script>
</body>
</html>