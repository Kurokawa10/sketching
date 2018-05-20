<?php
session_start();
//include_once '';

if(isset($_POST['reward'])){
    
    switch ($_POST['reward']){
        case '1':
            
            break;
        case '3':
            
            break;
        case '5':
            
            break;
        default :
            header('Location: 404');
    }
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
