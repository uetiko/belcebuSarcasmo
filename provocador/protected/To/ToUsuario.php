<?php
namespace To;
/**
 * Clase bean serializable para el paso de parametros.
 * @package TO
 * @author Angel Barrientos <angel@pengostores.com>
 */
class ToUsuario {
    protected $arrayList = NULL;
    
    public function __construct(array $usuario) {
        $this->arrayList = new \utils\HashMap();
        $this->arrayList->putAll($usuario);
    }
    
    public function setUsuario($usuario){
        $this->arrayList->put("usuario", $usuario);
    }
    
    public function getUsuario(){
        return $this->arrayList->get("usuario");
    }
    
    public function setPassword($password){
        $this->arrayList->put('password', $password);
    }
    
    public function getPassword(){
        return $this->arrayList->get('password');
    }
    
    public function setMail($mail){
        $this->arrayList->put('email', $mail);
    }
    
    public function getMail(){
        return $this->arrayList->get('email');
    }
    
    public function getToken(){
        return $this->arrayList->get('token');
    }
    
    public function setToken($token){
        $this->arrayList->put('token', $token);
    }
}
?>