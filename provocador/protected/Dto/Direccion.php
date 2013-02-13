<?php

namespace Dto;

/**
 * Entidad para la direccion
 * @package Dto
 * @Entity
 * @Table(name="tbl_direccion")
 */
class Dto_Direccion {

    /**
     * @Id @ GeneratedValue(strategy="AUTO")
     * @Column(name="id_direccion")
     */
    private $idDireccion;

    /**
     * @Column(type="string", length=20)
     */
    private $calle;

    /**
     * @Column(type="string", length=6, nullable=true)
     */
    private $numero;
    /**
     * @Column(type="string", length=200)
     */
    private $colonia;

    /**
     * @Column(type="string", length=10)
     */
    private $codigoPostal;

    /**
     * @Column(type="string", length=80)
     */
    private $delegacion;

    /**
     * @OneToOne(targetEntity="Dto_Estados")
     * @JoinColumn(name="id_estado", referencedColumnName="id_estado")
     */
    private $estado;

    function __construct() {
        
    }

    public function getIdDireccion() {
        return $this->idDireccion;
    }

    public function getCalle() {
        return $this->calle;
    }

    public function setCalle($calle) {
        $this->calle = $calle;
    }

    public function getColonia() {
        return $this->colonia;
    }

    public function setColonia($colonia) {
        $this->colonia = $colonia;
    }

    public function getCodigoPostal() {
        return $this->codigoPostal;
    }

    public function setCodigoPostal($codigoPostal) {
        $this->codigoPostal = $codigoPostal;
    }

    public function getDelegacion() {
        return $this->delegacion;
    }

    public function setDelegacion($delegacion) {
        $this->delegacion = $delegacion;
    }

    public function getEstado() {
        return $this->estado;
    }

    public function setEstado($estado) {
        $this->estado = $estado;
    }

}

?>