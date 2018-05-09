<?php
/**
 * Created by PhpStorm.
 * User: Kuro
 * Date: 07/05/2018
 * Time: 21:37
 */

require_once 'Conexion.php';
require_once '../objetos/Usuario.php';

class UsuarioDAO
{
    private static $instancia;
    private $db;

    function __construct() {
        $this->db = Conexion::singleton_conexion();
    }

    public static function singletonUsuario() {
        if (!isset(self::$instancia)) {
            $miclase = __CLASS__;
            self::$instancia = new $miclase;
        }
        return self::$instancia;
    }


}