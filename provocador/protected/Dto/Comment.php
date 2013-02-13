<?php
namespace Dto;
/**
 * Entidad para comentario de articulos
 * @package Dto
 * @author Angel Barrientos <angel@pengostores.com>
 * @Entity
 * @Table(name="tbl_comment")
 */
class Dto_Comment {
	/**
	 * @Id @GeneratedVale(strategy="AUTO")
	 * @Column(type="integer", name="id_comment")
	 */
	protected $idComment;
	
	/**
	 * @Column(type="text", length=140)
	 */
	protected $comment;
	function __construct() {

	}
        
        public function getIdComment(){
            return $this->idComment;
        }
        
        public function setIdComment($idComment){
            $this->idComment = $idComment;
        }

        public function setComment($comment) {
		$this -> comment = $comment;
	}

	public function getComment() {
		return $this -> comment;
	}

}
?>