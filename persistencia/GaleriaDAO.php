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
            $arrayGalerias = new Galeria($valor[0], $valor[1], $valor[2], $valor[3], $valor[4], $valor[5], $valor[6]);
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
            $arrayGalerias[$clave] = new Galeria($valor[0], $valor[1], $valor[2], $valor[3], $valor[4], $valor[5], $valor[6]);
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
            $arrayGalerias[$clave] = new Galeria($valor[0], $valor[1], $valor[2], $valor[3], $valor[4], $valor[5], $valor[6]);
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
            $arrayGalerias[$clave] = new Galeria($valor[0], $valor[1], $valor[2], $valor[3], $valor[4], $valor[5], $valor[6]);
        }
        return $arrayGalerias;
    }


    public function addGaleria(Galeria $galeria){
        try{
            $consulta="INSERT INTO galeria (id, nombre, descripcion, autor, fecha_creacion, visitas, tipo) values (null,?,?,?,?,?,?)";
            $query=$this->db->preparar($consulta);
            @$query->bindParam(1,$galeria->getNombre());
            @$query->bindParam(2,$galeria->getDescripcion());
            @$query->bindParam(3,$galeria->getAutor());
            @$query->bindParam(4,$galeria->getFechaCreacion());
            @$query->bindParam(5,$galeria->getVisitas());
            @$query->bindParam(6,$galeria->getTipo());

            $query->execute();

            try{
                $consulta="SELECT MAX(id) FROM galeria";
                $query=$this->db->preparar($consulta);
                $query->execute();
                $id=$query->fetchAll();
            }catch (Exception $ex){
                $id = 0;
            }
        }catch (Exception $ex){
            $id = 0;
        }
        return $id[0][0];
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

    public function countGaleriasByUser($userId)
    {

        try {
            $consulta="SELECT count(*) FROM galeria WHERE autor = " . $userId;

            $query=$this->db->preparar($consulta);

            $query->execute();
            $lGalerias=$query->fetchAll();

        } catch (Exception $ex) {
            echo "Se ha producido un error en countGaleriasByUser";
        }

        return $lGalerias[0][0];
    }
    
    
    
    
    
    
    
    
    
    
    
    
    
    
}