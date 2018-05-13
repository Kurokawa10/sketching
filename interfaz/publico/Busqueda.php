<?php
/**
 * Created by PhpStorm.
 * User: Kuro
 * Date: 12/05/2018
 * Time: 17:01
 */

include '../templates/Template.php';
$template = new Template();

?>
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
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
    <?php

    if(isset($_GET['search'])){
        ?>
        <p><h2>Busquera En curso</h2></p>
        <?php
    }else{
        ?>
        <p><h4>Busquera erronea: Campo vacio</h4></p>
    <?php
    }

    ?>
</div>
<?php echo $template->footer();?>

</body>
</html>
