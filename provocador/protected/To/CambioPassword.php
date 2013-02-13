<?php
namespace To;
/**
 * Description of ToCambioPassword
 *
 * @author silent
 */
class CambioPassword {
    
    private $usuario;
    private $oldPassword;
    private $newPassword;
    public function __construct() {
    }
    
    public function getUsuario() {
        return $this->usuario;
    }

    public function setUsuario($usuario) {
        $this->usuario = $usuario;
    }

    public function getOldPassword() {
        return $this->oldPassword;
    }

    public function setOldPassword($oldPassword) {
        $this->oldPassword = $oldPassword;
    }

    public function getNewPassword() {
        return $this->newPassword;
    }

    public function setNewPassword($newPassword) {
        $this->newPassword = $newPassword;
    }
}

?>