<?php
namespace To;
/**
 * Clase bean serializable para el paso de parametros
 * @package TO
 * @author Angel Barrientos <angel@pengostores.com>
 */
class To_Registro {
    private $datos = array();
    
    public function __construct(array $datos) {
        $this->datos = $datos;
    }
    public function getUsuario() {
        return $this->datos['usuario'];
    }

    public function setUsuario($usuario) {
        $this->datos['usuario'] = $usuario;
    }

    public function getPassword() {
        return $this->datos['password'];
    }

    public function setPassword($password) {
        $this->datos['password'] = $password;
    }

    public function getNombre() {
        return $this->datos['nombre'];
    }

    public function setNombre($nombre) {
        $this->datos['nombre'] = $nombre;
    }

    public function getApellidos() {
        return $this->datos['apellidos'];
    }

    public function setApellidos($apellidos) {
        $this->datos['apellidos'] = $apellidos;
    }

    public function getEmial() {
        return $this->datos['email'];
    }

    public function setEmial($email) {
        $this->datos['email'] = $email;
    }

    public function getFechNacimiento() {
        return $this->datos['fechNacimiento'];
    }

    public function setFechNacimiento($fechNacimiento) {
        $this->datos['fechNacimiento'] = new \DateTime($fechNacimiento);
    }

    public function getTelefono() {
        return $this->datos['telefono'];
    }

    public function setTelefono($telefono) {
        $this->datos['telefono'] = $telefono;
    }
    
    public function getProfesion() {
        return $this->datos['profesion'];
    }

    public function setProfesion($profesion) {
        $this->datos['profesion'] = $profesion;
    }

    public function getEstado() {
        return $this->datos['estado'];
    }

    public function setEstado($estado) {
        $this->datos['estado'] = $estado;
    }

    public function getGenero() {
        return $this->datos['genero'];
    }

    public function setGenero($genero) {
        $this->datos['genero'] = $genero;
    }
    public function getTipoUsuario() {
        return $this->datos['tipoUsuario'];
    }

    public function setTipoUsuario($tipoUsuario) {
        $this->datos['tipoUsuario'] = $tipoUsuario;
    }

    public function getStatus() {
        return $this->datos['status'];
    }

    public function setStatus($status) {
        $this->datos['status'] = $status;
    }

    public function getProvincia() {
        return $this->datos['provincia'];
    }

    public function setProvincia($provincia) {
        $this->datos['provincia'] = $provincia;
    }
    /**
     * @access public
     * @method public array function getArray() devuelve un arreglo de todos los valores del bean
     * @return array Registros
     */
    public function getArray(){
        return $this->datos;
    }
}
?>
