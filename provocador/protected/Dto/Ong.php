<?php
namespace Dto;
/**
 * Entidad ligada a la tabla pivote tbl_ong
 * @package Dto
 * @author Angel Barrientos <angel@pengostores.com> 
 * @Entity
 * @Table(name="tbl_ong")
 */
class Dto_Ong {
	/**
	 * @Id @GeneratedValue(strategy="AUTO")
	 * @Column(type="integer", name="id_ong")
	 */
	private $idOng;
	/**
	 * @OneToOne(targetEntity="Dto_Informacion")
	 * @JoinColumn(name="id_informacion", referencedColumnName="id_informacion")
	 */
	private $information;
	/**
	 * @OneToOne(targetEntity="Dto_Contacto")
	 * @JoinColumn(name="id_contacto", referencedColumnName="id_contacto")
	 */
	private $conacto;
	/**
	 * @OneToOne(targetEntity="Dto_Redes")
	 * @JoinColumn(name="id_redes", referencedColumnName="id_redes")
	 */
	private $redes;

	function __construct($argument) {

	}

        public function setIdOng($idOng) {
            $this->idOng = $idOng;
        }

        public function getInformation() {
            return $this->information;
        }

        public function setInformation($information) {
            $this->information = $information;
        }

        public function getConacto() {
            return $this->conacto;
        }

        public function setConacto($conacto) {
            $this->conacto = $conacto;
        }

        public function getRedes() {
            return $this->redes;
        }

        public function setRedes($redes) {
            $this->redes = $redes;
        }


}
?>
