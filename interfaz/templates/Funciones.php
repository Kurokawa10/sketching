<?php

/**
 * Description of funciones
 *
 * @author Roberto
 */
class Funciones {
    //put your code here
    public static function showImageProfile($image, $root){
    
        if($image === 'interfaz/profile_images/profile_'){
            $image = $root . "interfaz/app_images/profile-alt.png";
        }
        return $image;
}
    
    
}
