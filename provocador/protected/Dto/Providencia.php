<?php
namespace Dto;
/**
 * Entidad relacionada con la tabla tbl_provincias
 * @package Dto
 * @author Angel Barrientos <angel@pengostores.com>
 * @Entity
 * @Table(name="tbl_provincias")
 */
class Dto_Provincia {
	/** 
	 * @Id @GeneratedValue(strategy="AUTO")
	 * @Column(type="integer", name="id_provincia")
	 **/
	protected $idProvincia;
	/** 
         * @ManyToOne(targetEntity="Dto_Estados", cascade={"all"}, fetch="EAGER")
	 * @JoinColumn(name="id_estado", referencedColumnName="id_estado")
	 **/
	protected $estado;
	/** 
	 * @Column(type="string", length=80) 
	 **/
	protected $providence;
	function __construct(Dto_Provincia $providence) {
            $this->providence = $providence;
	}
        public function getIdProvincia() {
            return $this->idProvincia;
        }

        public function getEstado() {
            return $this->estado;
        }

        public function setEstado($estado) {
            $this->estado = $estado;
        }

        public function getProvidence() {
            return $this->providence;
        }

        public function setProvidence($providence) {
            $this->providence = $providence;
        }
}

?>