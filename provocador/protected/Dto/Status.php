<?php
namespace Dto;
/**
 * Entidad relacionada con la tabla cat_status que contiene un catalogo de estados
 * de usuario.
 * @package Dto
 * @author Angel Barrientos <angel@pengostores.com>
 * @Entity
 * @Table(name="cat_status")
 */
class Dto_Status {
    /**
     * @Id @Column(type="integer", name="id_status")
     * @GeneratedValue(strategy="AUTO")
     */
    private $idStatus;
    /**
     * @Column(type="string", name="status", length=1)
     */
    private $status;
    /**
     * @Column(name="descripcion", type="string", length=50)
     */
    private $descripcion;
    function __construct() {
    }
    public function getIdStatus() {
        return $this->idStatus;
    }

    public function getStatus() {
        return $this->status;
    }

    public function setStatus($status) {
        $this->status = $status;
    }

    public function getDescripcion() {
        return $this->descripcion;
    }

    public function setDescripcion($descripcion) {
        $this->descripcion = $descripcion;
    }
}
?>