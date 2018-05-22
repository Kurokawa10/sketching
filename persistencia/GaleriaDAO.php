<?php
/**
 * Created by PhpStorm.
 * User: Kuro
 * Date: 07/05/2018
 * Time: 21:55
 */

require_once 'Conexion.php';

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

    public function getGaleria($id)
    {
        try {
            $consulta="SELECT * FROM galeria WHERE id = " . $id;

            $query=$this->db->preparar($consulta);

            $query->execute();
            $lGalerias=$query->fetchAll();

        } catch (Exception $ex) {
            echo "Se ha producido un error en getGaleria";
        }
        foreach ($lGalerias as $clave => $valor){
            $arrayGalerias = new Galeria($valor[0], $valor[1], $valor[2], $valor[3], $valor[4], $valor[5]);
        }
        return $arrayGalerias;
    }
    
    public function getGaleriasByUser($userId)
    {

        try {
            $consulta="SELECT * FROM galeria WHERE autor = " . $userId;

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
            $consulta = "SELECT * FROM galeria WHERE autor = " . $userId . " ORDER BY id DESC LIMIT 5";
            $query = $this->db->preparar($consulta);
            $query->execute();
            $lGalerias = $query->fetchAll();

        } catch (Exception $ex) {
            echo "Se ha producido un error en getUltGaleriasByUser";
        }

        $arrayGalerias = null;

        foreach ($lGalerias as $clave => $valor) {
            $arrayGalerias[$clave] = new Galeria($valor[0], $valor[1], $valor[2], $valor[3], $valor[4], $valor[5]);
        }
        return $arrayGalerias;
    }
    
    public function getLimGaleriasByUser($userId, $lim)
    {
        try {
            $consulta="SELECT * FROM galeria WHERE autor = " . $userId . " AND id < $lim ORDER BY id DESC LIMIT 5" ;
            $query=$this->db->preparar($consulta);
            $query->execute();
            $lGalerias=$query->fetchAll();

        } catch (Exception $ex) {
            echo "Se ha producido un error en getLimGaleriasByUser";
        }
        $arrayGalerias = null;

        foreach ($lGalerias as $clave => $valor){
            $arrayGalerias[$clave] = new Galeria($valor[0], $valor[1], $valor[2], $valor[3], $valor[4], $valor[5]);
        }
        return $arrayGalerias;
    }

    public function addvisita($idGaleria)
    {
        try {
            $consulta="UPDATE galeria SET visitas = visitas + 1 WHERE id = ".$idGaleria ;
            $query=$this->db->preparar($consulta);
            $rGaleria = $query->execute();

        } catch (Exception $ex) {
            echo "Se ha producido un error en addvisita";
            $rGaleria = false;
        }


        return $rGaleria;
    }
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
}