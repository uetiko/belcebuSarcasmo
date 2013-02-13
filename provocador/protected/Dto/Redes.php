<?php
namespace Dto;
/**
 * Entidad relacionada con la tabla tbl_redes_socilales realcionada con el 
 * almacenamiento de rede sociales de las ONG's y los usuarios.
 * @package Dto
 * @author Angel Barrientos <angel@pengostores.com>
 * @Entity
 * @Table(name="tbl_redes_socilales")
 */
class Dto_Redes {
	/**
	 * @Id @Column(name="id_redes", type="integer")
	 * @GeneratedValue(strategy="AUTO")
	 */
	private $idRedes;
	/**
	 * @Column(type="string", length=45)
	 */
	private $twitter;
	/**
	 * @Column(type="string", length=100)
	 */
	private $facebook;
	/**
	 * @Column(type="string", length=100)
	 */
	private $youtube;
	/**
	 * @Column(type="string", length=100)
	 */
	private $gplus;
	/**
	 * @Column(type="string", length=100)
	 */
	private $tumblr;
	/**
	 * @Column(type="string", length=100)
	 */
	private $blog;
	/**
	 * @OneToOne(targetEntity="Dto_Ong", mappedBy="tbl_redes_socilaes")
	 */
	private $ong;
	
	function __construct() {

	}

	public function setTwitter($twitter) {
		$this -> twitter = $twitter;
	}

	public function getTwitter() {
		return $this -> twitter;
	}

	public function setFacebook($facebook) {
		$this -> facebook = $facebook;
	}

	public function getFacebook() {
		return $this -> facebook;
	}
	
	public function setYoutube($youtube){
		$this->youtube = $youtube;
	}
	
	public function getYoutube(){
		return $this->youtube;
	}
	
	public function setTumblr($tumblr){
		$this->tumblr = $tumblr;
	}
	
	public function getTumblr(){
		return $this->tumblr;
	}
	
	public function setBlog($blog){
		$this->blog = $blog;
	}
	
	public function getBlog(){
		return $this->blog;
	}
	
	public function setGPlus($gplus){
		$this->gplus = $gplus;
	}
	
	public function getGPlus(){
		return $this->gplus;
	}
        
        public function setONG($ong){
            $this->ong = $ong;
        }
        
        public function getONG(){
            return $this->ong;
        }

}
?>
