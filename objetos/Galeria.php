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
    private $descripcion;
    private $autor;
    private $fechaCreacion;
    private $visitas;

    function __construct($id, $nombre, $descripcion, $autor, $fechaCreacion, $visitas) {
        $this->id = $id;
        $this->nombre = $nombre;
        $this->descripcion = $descripcion;
        $this->autor = $autor;
        $this->fechaCreacion = $fechaCreacion;
        $this->visitas = $visitas;
    }

    function getId() {
        return $this->id;
    }

    function getNombre() {
        return $this->nombre;
    }

    function getDescripcion() {
        return $this->descripcion;
    }

    function getAutor() {
        return $this->autor;
    }

    function getFechaCreacion() {
        return $this->fechaCreacion;
    }

    function getVisitas() {
        return $this->visitas;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    function setDescripcion($descripcion) {
        $this->descripcion = $descripcion;
    }

    function setAutor($autor) {
        $this->autor = $autor;
    }

    function setFechaCreacion($fechaCreacion) {
        $this->fechaCreacion = $fechaCreacion;
    }

    function setVisitas($visitas) {
        $this->visitas = $visitas;
    }
}