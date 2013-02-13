<?php
namespace Dto;
/**
 * Entidad relacionada con la tabla de cat_roles que gestiona el rol de cada usuario.
 * @package Dto 
 * @author Angel Barrientos <angel@pengostores.com>
 * @Entity
 * @Table(name="cat_roles")
 */
class Dto_Roles {

    /**
     * @Id @GeneratedValue(strategy="AUTO")
     * @Column(type="integer", name="id_rol")
     * */
    private $idRol;

    /**
     * @Column(type="string", length=45)
     * */
    private $rol;

    /**
     * @Column(type="string", length=80)
     * */
    private $descripcion;

    function __construct() {
        
    }

    public function getId() {
        return $this->idRol;
    }

    public function getRol() {
        return $this->rol;
    }

    public function getDescripcion() {
        return $this->descripcion;
    }
    public function setRol($rol){
        $this->rol = $rol;
    }
    public function setDescripcion($descripcion){
        $this->descripcion = $descripcion;
    }

}

?>