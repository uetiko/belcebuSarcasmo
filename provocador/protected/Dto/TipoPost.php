<?php
namespace Dto;
/**
 * Entidad relacionada con la tabla tbl_tipo_post encargada de definir el tipo 
 * de articulo de cada ONG
 * @Entity
 * @Table(name="tbl_tipo_post")
 */
class Dto_TipoPost{
	/**
	 * @Id @GeneratedValue(strategy="AUTO")
	 * @Column(name="id_tipo_post", type="integer")
	 */
	protected $idTipoPost;
	/**
	 * @column(type="string", length=3)
	 */ 
	protected $tipo;
	/**
	 * @Column(type="string", length=80)
	 */
	protected $descripcion;
	function __construct() {
		
	}
        public function getIdTipoPost() {
            return $this->idTipoPost;
        }

        public function setIdTipoPost($idTipoPost) {
            $this->idTipoPost = $idTipoPost;
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