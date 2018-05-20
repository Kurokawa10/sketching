<?php
/**
 * Created by PhpStorm.
 * User: Kuro
 * Date: 07/05/2018
 * Time: 21:55
 */

class GaleriaDAO
{
    private static $instancia;
    private $db;

    function __construct() {
        $this->db = Conexion::singleton_conexion();
    }

    public static function singletonGaleria() {
        if (!isset(self::$instancia)) {
            $miclase = __CLASS__;
            self::$instancia = new $miclase;
        }
        return self::$instancia;
    }
    
    public function getGaleriasByUser($userId)
    {

        try {
            $consulta="SELECT * FROM galerias WHERE autor = " . $userId;

            $query=$this->db->preparar($consulta);

            $query->execute();
            $lGalerias=$query->fetchAll();

        } catch (Exception $ex) {
            echo "Se ha producido un error en getGaleriasByUser";
        }
        foreach ($lGalerias as $clave => $valor){
            $arrayGalerias[$clave] = new Galeria($valor[0], $valor[1], $valor[2], $valor[3], $valor[4], $valor[5]);
        }
        return $arrayGalerias;
    }
    
    public function getUltGaleriasByUser($userId)
    {
        try {
            $consulta="SELECT * FROM galerias WHERE autor = " . $userId . " ORDER BY id DESC LIMIT 5" ;
            $query=$this->db->preparar($consulta);
            $query->execute();
            $lGalerias=$query->fetchAll();

        } catch (Exception $ex) {
            echo "Se ha producido un error en getUltGaleriasByUser";
        }
        foreach ($lGalerias as $clave => $valor){
            $arrayGalerias[$clave] = new Usuario($valor[0], $valor[1], $valor[2], $valor[3], $valor[4], $valor[5]);
        }
        return $arrayGalerias;
    }
    
    public function getLimGaleriasByUser($userId, $lim)
    {
        try {
            $consulta="SELECT * FROM galerias WHERE autor = " . $userId . " AND id < $lim ORDER BY id DESC LIMIT 5" ;
            $query=$this->db->preparar($consulta);
            $query->execute();
            $lGalerias=$query->fetchAll();

        } catch (Exception $ex) {
            echo "Se ha producido un error en getLimGaleriasByUser";
        }
        foreach ($lGalerias as $clave => $valor){
            $arrayGalerias[$clave] = new Usuario($valor[0], $valor[1], $valor[2], $valor[3], $valor[4], $valor[5]);
        }
        return $arrayGalerias;
    }
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
}