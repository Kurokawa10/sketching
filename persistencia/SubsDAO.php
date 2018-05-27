<?php
/**
 * Created by PhpStorm.
 * User: Kuro
 * Date: 26/05/2018
 * Time: 16:54
 */

require_once 'Conexion.php';

class SubsDAO
{
    private static $instancia;
    private $db;

    function __construct() {
        $this->db = Conexion::singleton_conexion();
    }

    public static function singletonSubs() {
        if (!isset(self::$instancia)) {
            $miclase = __CLASS__;
            self::$instancia = new $miclase;
        }
        return self::$instancia;
    }

    public function getSubsByUser($userId)
    {

        try {
            $consulta="SELECT * FROM subs WHERE id_user = " . $userId;

            $query=$this->db->preparar($consulta);

            $query->execute();
            $lSubs=$query->fetchAll();

        } catch (Exception $ex) {
            echo "Se ha producido un error en getSubsByUser";
        }
        foreach ($lSubs as $clave => $valor){
            $arraySubs[$clave] = new Subs($valor[0], $valor[1], $valor[2], $valor[3]);
        }
        return $arraySubs;
    }

    public function getSubsByAutor($autorId)
    {

        try {
            $consulta="SELECT * FROM subs WHERE id_autor = " . $autorId;

            $query=$this->db->preparar($consulta);

            $query->execute();
            $lSubs=$query->fetchAll();

        } catch (Exception $ex) {
            echo "Se ha producido un error en getSubsByAutor";
        }
        foreach ($lSubs as $clave => $valor){
            $arraySubs[$clave] = new Subs($valor[0], $valor[1], $valor[2], $valor[3]);
        }
        return $arraySubs;
    }

    public function getSubByUserAndAutor($userId, $autorId)
    {
        try {
            $consulta="SELECT * FROM subs WHERE id_user = ". $userId ." AND id_autor = " . $autorId;

            $query=$this->db->preparar($consulta);

            $query->execute();
            $lSubs=$query->fetchAll();
            $arraySubs = null;
        } catch (Exception $ex) {
            echo "Se ha producido un error en getSubByUserAndAutor";
        }
        foreach ($lSubs as $clave => $valor){
            $arraySubs[$clave] = new Subs($valor[0], $valor[1], $valor[2], $valor[3]);
        }
        return $arraySubs[0];
    }

    public function countSubsByAutor($autorId)
    {

        try {
            $consulta="SELECT count(*) FROM subs WHERE id_autor = " . $autorId;

            $query=$this->db->preparar($consulta);

            $query->execute();
            $lSubs=$query->fetchAll();

        } catch (Exception $ex) {
            echo "Se ha producido un error en countSubsByAutor";
        }

        return $lSubs[0][0];
    }

    public function addSub($userId, $autorId, $tipo){
        try {
            $consulta="INSERT INTO subs (id, id_user, id_autor, tipo) values (null,?,?,?)";
            $query=$this->db->preparar($consulta);
            @$query->bindParam(1,$userId);
            @$query->bindParam(2,$autorId);
            @$query->bindParam(3,$tipo);

            $query->execute();
            $insertado=true;

        } catch (Exception $ex) {
            $insertado=false;
        }
        return  $insertado;
    }

    public function unSub($userId, $autorId){
        try {
            $consulta="DELETE FROM subs WHERE id_user = ? AND id_autor = ?";
            $query=$this->db->preparar($consulta);
            @$query->bindParam(1,$userId);
            @$query->bindParam(2,$autorId);

            $query->execute();
            $eliminado=true;

        } catch (Exception $ex) {
            $eliminado=false;
        }
        return  $eliminado;
    }

}