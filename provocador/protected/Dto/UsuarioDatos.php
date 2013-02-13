<?php

namespace Dto;

/**
 * Entidad relacionada con la tabla tbl_usuaro_datos que contiene los datos del
 * usuario.
 * @package Dto
 * @author Angel Barrientos <angel@pengostores.com>
 * @Entity
 * @Table(name="tbl_usuario_datos")
 */
class Dto_UsuarioDatos {

    /** @Id @GeneratedValue(strategy="AUTO")
     * @Column(type="integer", name="id_dato") */
    private $idDato;

    /**
     * @ManyToOne(targetEntity="Dto_Profecion", cascade={"all"}, fetch="EAGER")
     * @JoinColumn(name="id_profecion", referencedColumnName="id_profecion", nullable=true)
     */
    private $profecion;

    /**
     * @ManyToOne(targetEntity="Dto_Genero", cascade={"all"}, fetch="EAGER")
     * @JoinColumn(name="id_genero", referencedColumnName="id_genero")
     */
    private $genero;

    /**
     * @OneToOne(targetEntity="Dto_Usuario")
     * @JoinColumn(name="id_usuario", referencedColumnName="id_usuario")
     */
    private $usuario;

    /**
     * @OneToOne(targetEntity="Dto_Estados")
     * @JoinColumn(name="id_estado", referencedColumnName="id_estado", nullable=true)
     */
    private $estado;

    /**
     * @Column(type="string", length=30)
     */
    private $nombre;

    /**
     * @Column(type="string", length=80)
     */
    private $apellido;

    /**
     * @Column(type="date", name="fech_nacimiento")
     */
    private $fecNacimiento;

    /** @Column(type="string", length=80) */
    private $mail;

    /** @Column(type="string", length=25, nullable=true) */
    private $telephone;

    public function __construct() {
        /*
          $args = func_get_args();
          if(!empty($args)){
            $argStr = NULL;
            foreach ($args as $arg) {
                $argStr .= "_" . get_class($arg);
            }
          if(method_exists($this, "__construct{$argStr}")){

          }
        } */
    }

    private function __construct_Dto_Usuario(\Dto\Dto_Usuario $usuario) {
        $this->usuario = $usuario;
    }

    /**
     * @param \Dto\Dto_Profecion $profecion
     * @param \Dto\Dto_Usuario $usuario
     * @param \Dto\Dto_Estados $estado
     */
    private function __construct_Dto_Profecion_Dto_Usuario_Dto_Estados(\Dto\Dto_Profecion $profecion, \Dto\Dto_Usuario $usuario, \Dto\Dto_Estados $estado) {
        $this->profecion = $profecion;
        $this->usuario = $usuario;
        $this->estado = $estado;
    }
    public function getIdDato() {
        return $this->idDato;
    }

    public function setIdDato($idDato) {
        $this->idDato = $idDato;
    }

    public function getProfecion() {
        return $this->profecion;
    }

    public function setProfecion($profecion) {
        $this->profecion = $profecion;
    }

    public function getGenero() {
        return $this->genero;
    }

    public function setGenero($genero) {
        $this->genero = $genero;
    }

    public function getUsuario() {
        return $this->usuario;
    }

    public function setUsuario($usuario) {
        $this->usuario = $usuario;
    }

    public function getEstado() {
        return $this->estado;
    }

    public function setEstado($estado) {
        $this->estado = $estado;
    }

    public function getNombre() {
        return $this->nombre;
    }

    public function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    public function getApellido() {
        return $this->apellido;
    }

    public function setApellido($apellido) {
        $this->apellido = $apellido;
    }

    public function getFecNacimiento() {
        return $this->fecNacimiento;
    }

    public function setFecNacimiento($fecNacimiento) {
        $this->fecNacimiento = $fecNacimiento;
    }

    public function getMail() {
        return $this->mail;
    }

    public function setMail($mail) {
        $this->mail = $mail;
    }

    public function getTelephone() {
        return $this->telephone;
    }

    public function setTelephone($telephone) {
        $this->telephone = $telephone;
    }
}

?>