<?php
namespace Dto;
/**
 * Entidad para el registro de newsletter asociado a la tabla tbl_Newsletter
 * @package Dto
 * @author Angel Barrientos <angel@pengostores.com>
 * @Entity
 * @Table(name="tbl_Newsletter")
 */
class Dto_Newsletter {
	/** @Id @GeneratedValue(strategy="AUTO")
	 * @Column(type="integer", name="id_newsletter")*/
	private $idSubscripcion;
	/** 
         * @Column(type="string", name="mail_subscripcion")
         */
	private $mailSubscripcion;
	/** 
         * @Column(type="date", name="fecha")
         */
	private $fecha;
	function __construct() {
		
	}
        
        public function getIdSubscripcion(){
        return $this->idSubscripcion;
        }
        public function setMailSubscripcion($mailSubscripcion){
            $this->mailSubscripcion = $mailSubscripcion;
        }
        
        public function getMailSubscripcion(){
            return $this->mailSubscripcion;
        }
        public function setFecha($fecha){
            $this->fecha = $fecha;
        }
        
        public function getFecha(){
            return $this->fecha;
        }
}

?>