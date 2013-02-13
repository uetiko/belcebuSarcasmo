<?php
namespace Dto;
/**
 * Entidad para la estados de la republica
 * @package Dto
 * @author Angel Barrientos Cruz <angel@pengostores.com>
 * @Entity
 * @Table(name="cat_estados")
 */
class Dto_Estados {
	/** @Id @GeneratedValue(strategy="AUTO")
	 * @Column(type="integer", name="id_estado")	 */
	private $idEstado;
	/** @Column(type="string", length=50) */
	private $estado;
	function __construct() {
		
	}
        public function getIdEstado() {
            return $this->idEstado;
        }

        public function getEstado() {
            return $this->estado;
        }

        public function setEstado($estado) {
            $this->estado = $estado;
        }


}

?>