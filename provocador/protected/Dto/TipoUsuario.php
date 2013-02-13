<?php
namespace Dto;
/**
 * Entidad relacionada con la tabla cat_tipo_usuario que contiene un catalogo de 
 * tipos de usuario.
 * @package Dto
 * @author Angel Barrientos <angel@pengostores.com>
 * @Entity
 * @Table(name="cat_tipo_usuario")
 */
class Dto_TipoUsuario {
	/** 
	 * @Id @GeneratedValue(strategy="AUTO") 
	 * @Column(type="integer", name="id_tipo_usuario") 
	 **/
	private $idTipoUsuario;
	/** 
	 * @Column(type="string", length=45) 
	 **/
	private $tipo;
	/** 
	 * @Column(type="string", length=80) 
	 **/
	private $descripcion;
	function __construct() {

	}
        public function getIdTipoUsuario() {
            return $this->idTipoUsuario;
        }

        public function getCatRol() {
            return $this->catRol;
        }

        public function setCatRol($catRol) {
            $this->catRol = $catRol;
        }

        public function getTipo() {
            return $this->tipo;
        }

        public function setTipo($tipo) {
            $this->tipo = $tipo;
        }

        public function getDescripcion() {
            return $this->descripcion;
        }

        public function setDescripcion($descripcion) {
            $this->descripcion = $descripcion;
        }
}
?>