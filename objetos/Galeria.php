<?php
/**
 * Created by PhpStorm.
 * User: Kuro
 * Date: 07/05/2018
 * Time: 21:40
 */

class Galeria
{
    private $id;
    private $nombre;
    private $autor;
    private $fechaCreacion;
    private $visitas;

    /**
     * Galeria constructor.
     * @param $id
     * @param $nombre
     * @param $autor
     * @param $fechaCreacion
     * @param $visitas
     */
    public function __construct($id, $nombre, $autor, $fechaCreacion, $visitas)
    {
        $this->id = $id;
        $this->nombre = $nombre;
        $this->autor = $autor;
        $this->fechaCreacion = $fechaCreacion;
        $this->visitas = $visitas;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id): void
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * @param mixed $nombre
     */
    public function setNombre($nombre): void
    {
        $this->nombre = $nombre;
    }

    /**
     * @return mixed
     */
    public function getAutor()
    {
        return $this->autor;
    }

    /**
     * @param mixed $autor
     */
    public function setAutor($autor): void
    {
        $this->autor = $autor;
    }

    /**
     * @return mixed
     */
    public function getFechaCreacion()
    {
        return $this->fechaCreacion;
    }

    /**
     * @param mixed $fechaCreacion
     */
    public function setFechaCreacion($fechaCreacion): void
    {
        $this->fechaCreacion = $fechaCreacion;
    }

    /**
     * @return mixed
     */
    public function getVisitas()
    {
        return $this->visitas;
    }

    /**
     * @param mixed $visitas
     */
    public function setVisitas($visitas): void
    {
        $this->visitas = $visitas;
    }

}