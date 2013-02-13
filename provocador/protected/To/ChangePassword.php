<?php
namespace To;

class To_ChangePassword {
    private $newPassword;
    private $token;
    private $usuario;
    function __construct() {
        
    }
    
    public function getNewPassword() {
        return $this->newPassword;
    }

    public function setNewPassword($newPassword) {
        $this->newPassword = $newPassword;
    }

    public function getToken() {
        return $this->token;
    }

    public function setToken($token) {
        $this->token = $token;
    }

    public function getUsuario() {
        return $this->usuario;
    }

    public function setUsuario($usuario) {
        $this->usuario = $usuario;
    }
}
?>
