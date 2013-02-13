<?php
namespace Dto;
/**
 * Entidad relacionada con la tabla tbl_perfil para poder minar el perfil 
 * relacionado con un usuario o una ong.
 * @package Dto
 * @author Angel Barrientos <angel@pengostores.com>
 * @Entity
 * @Table(name="tbl_perfil")
 */
class Dto_Perfil {
    /**
     * @Id @GeneratedValue(strategy="AUTO")
     * @Column(type="integer", name="id_perfil")
     */
    private $idPerfil;
    /**
     * @OneToOne(targetEntity="Dto_Usuario")
     * @JoinColumn(name="id_usuario", referencedColumnName="id_usuario")
     */
    private $usuario;
    /**
     * @OneToOne(targetEntity="Dto_usuarioDatos")
     * @JoinColumn(name="id_dato", referencedColumnName="id_dato")
     */
    private $datosPersonal;
    /**
     * @OneToOne(targetEntity="Dto_TipoUsuario")
     * @JoinColumn(name="id_tipo_usuario", referencedColumnName="id_tipo_usuario")
     */
    private $usuarioTipo;
    /**
     * @ManyToOne(targetEntity="Dto_Ong", cascade={"all"}, fetch="EAGER")
     * @JoinColumn(name="id_ong", referencedColumnName="id_ong")
     */
    private $ong;
    
    public function __construct() {
        
    }
    public function getIdPerfil() {
        return $this->idPerfil;
    }

    public function getUsuario() {
        return $this->usuario;
    }

    public function setUsuario($usuario) {
        $this->usuario = $usuario;
    }

    public function getDatosPersonal() {
        return $this->datosPersonal;
    }

    public function setDatosPersonal($datosPersonal) {
        $this->datosPersonal = $datosPersonal;
    }

    public function getUsuarioTipo() {
        return $this->usuarioTipo;
    }

    public function setUsuarioTipo($usuarioTipo) {
        $this->usuarioTipo = $usuarioTipo;
    }
    
    public function setONG($ong){
        $this->ong = $ong;
    }
    
    public function getONG(){
        return $this->ong;
    }
}
?>