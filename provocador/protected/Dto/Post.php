<?php
namespace Dto;
/**
 * Entidad realcionada con la tabla tbl_post para el posteo de articulos relacionados 
 * con una ONG.
 * @package Dto
 * @author Angel Barrientos <angel@pengostores.com>
 * @Entity
 * @Table(name="tbl_post")
 */
class Dto_Post {
	/**
	 * @Id @GeneratedValue(strategy="AUTO")
	 * @Column(type="integer", name="id_post")
	 */
	 protected $idPost;
	 /**
	  * @OneToOne(targetEntity="Dto_TipoPost")
	  * @JoinColumn(name="id_tipo_post", referencedColumnName="id_tipo_post")
	  */
	 protected $catTipoPost;
	 /**
	  * @OneToOne(targetEntity="Dto_Ong")
	  * @JoinColumn(name="id_ong", referencedColumnName="id_ong")
	  */
	 protected $ong;
	 /**
	  * @Column(type="text", name="post")
	  */
	 protected $post;
	  /**
	  * @OneToOne(targetEntity="Dto_Comment", mappedBy="tbl_post")
	  */
	 protected $Comment;
         /**
          * @Column(name="titulo", type="string", length=150)
          */
         protected $titulo;
         /**
          * @Column(name="fecha", type="date")
          */
         protected $fecha;
         /**
          *
          * @Column(name="autor", type="string", length=60)
          */
         protected $autor;
         
         function __construct(Dto_TipoPost $tipoPost, Dto\Dto_Ong $ong, Dto\Dto_Comment $comment) {
            $this->catTipoPost = $tipoPost;
            $this->ong = $ong;
            
	}
        
        public function getIdPost() {
            return $this->idPost;
        }

        public function setIdPost($idPost) {
            $this->idPost = $idPost;
        }

        public function getCatTipoPost() {
            return $this->catTipoPost;
        }

        public function setCatTipoPost($catTipoPost) {
            $this->catTipoPost = $catTipoPost;
        }

        public function getOng() {
            return $this->ong;
        }

        public function setOng($ong) {
            $this->ong = $ong;
        }

        public function getPost() {
            return $this->post;
        }

        public function setPost($post) {
            $this->post = $post;
        }

        public function getComment() {
            return $this->Comment;
        }

        public function setComment($Comment) {
            $this->Comment = $Comment;
        }

        public function getTitulo() {
            return $this->titulo;
        }

        public function setTitulo($titulo) {
            $this->titulo = $titulo;
        }

        public function getFecha() {
            return $this->fecha;
        }

        public function setFecha($fecha) {
            $this->fecha = $fecha;
        }

        public function getAutor() {
            return $this->autor;
        }

        public function setAutor($autor) {
            $this->autor = $autor;
        }
}

?>