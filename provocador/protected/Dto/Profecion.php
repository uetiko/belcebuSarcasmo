<?php
namespace Dto;
/**
 * Entidad relacionada con la tabla cat_profecion, la cual contendra un cattalogo
 * de profeciones.
 * @package Dto
 * @author Angel Barrientos <angel@pengostores.com >
 * @Entity
 * @Table(name="cat_profecion")
 */
class Dto_Profecion{
    /**
     * @Id @Column(name="id_profecion", type="integer")
     * @GeneratedValue(strategy="AUTO")
     */
    private $idProfecion;
    /**
     * @Column(type="string", length=80)
     */
    private $profecion;
    /**
     * @Column(type="string", length=140)
     */
    private $descripcion;
    public function __construct() {
        
    }
    
    public function getIdProfecion() {
        return $this->idProfecion;
    }

    public function getProfecion() {
        return $this->profecion;
    }

    public function setProfecion($profecion) {
        $this->profecion = $profecion;
    }

    public function getDescripcion() {
        return $this->descripcion;
    }

    public function setDescripcion($descripcion) {
        $this->descripcion = $descripcion;
    }
}
?>
