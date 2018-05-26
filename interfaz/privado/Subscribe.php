<?php
session_start();
//include_once '';

if(isset($_SESSION['subs'])){
    $autorSub = $_SESSION['autorsub'];
    switch ($_SESSION['subs']){
        case '1mes':
            $tipoSub = 1;
            break;
        case '3mes':
            $tipoSub = 3;
            break;
        case '5mes':
            $tipoSub = 5;
            break;
        default :
            header('Location: 404');
    }
    unset($_SESSION['subs']);
}else{
    header('Location: 404');
}
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
        <title></title>
    </head>
    <body>
        <h1>HOLA</h1>
        <?php
        // put your code here
        ?>
    </body>
</html>
