<?php
namespace To;
/**
 * Clase bean serializable para el paso de parametros
 * @package TO
 * @author Angel Barrientos <angel@pengostores.com>
 */
class To_PasswordLost {
    private $datos =array();
    function __construct(array $datos) {
        $this->datos = $datos;
    }
    public function getUser() {
        return $this->datos['user'];
    }

    public function setUser($user) {
        $this->datos['user'] = $user;
    }

    public function getEmail() {
        return $this->datos['email'];
    }

    public function setEmail($email) {
        $this->datos['email'] = $email;
    }
    
    public function getArray(){
        return $this->datos;
    }
}
?>
