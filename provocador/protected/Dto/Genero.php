<?php
namespace Dto;
/**
 * Entidad para genero
 * @Entity
 * @Table(name="cat_genero")
 */
class Dto_Genero {
    /**
     * @Id @Column(name="id_genero", type="integer")
     * @GeneratedValue(strategy="AUTO")
     */
    private $idGenero;
    /**
     * @Column(type="string", length=1)
     */
    private $genero;
    /**
     * @Column(type="string", length=80)
     */
    private $descripcion;
    function __construct() {
        
    }
    public function getIdGenero() {
        return $this->idGenero;
    }

    public function getGenero() {
        return $this->genero;
    }

    public function setGenero($genero) {
        $this->genero = $genero;
    }

    public function getDescripcion() {
        return $this->descripcion;
    }

    public function setDescripcion($descripcion) {
        $this->descripcion = $descripcion;
    }
    
}
?>
