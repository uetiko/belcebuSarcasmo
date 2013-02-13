<?php

namespace Dto;

/**
 * Entidad relacionada con la tabla tbl_usuario encargada de contener los datos 
 * básicos del usuario
 * @package Dto
 * @author Angel Barrientos <angel@pengostores.com>
 * @Entity
 * @Table(name="tbl_usuario")
 */
class Dto_Usuario {

    /**
     * @Id @GeneratedValue(strategy="AUTO")
     * @Column(type="integer", name="id_usuario") 
     * */
    private $idUsuario;

    /**
     * @ManyToOne(targetEntity="Dto_TipoUsuario", cascade={"all"}, fetch="EAGER")
     * @JoinColumn(name="id_tipo_usuario", referencedColumnName="id_tipo_usuario")
     * */
    private $tipoUsuario;

    /**
     * @ManyToOne(targetEntity="Dto_Status", cascade={"all"}, fetch="EAGER")
     * @JoinColumn(name="id_status", referencedColumnName="id_status", nullable=false)
     * */
    private $status;

    /**
     * @Column(type="string", name="usuario", length=30,  nullable=false)
     */
    private $userName;

    /**
     * @Column(type="string", name="password", length=300, nullable=false) 
     * */
    private $password;

    /**
     * @Column(type="string", name="fb_oauth_uid", length=200, nullable=true)
     */
    private $fbUid;

    /**
     * @Column(name="fb_oauth_provider", type="string", length=200, nullable=true)
     */
    private $fbProvider;

    /**
     * @Column(name="twitter_oauth_token", type="string", length=200, nullable=true)
     */
    private $twToken;

    /**
     * @Column(name="twitter_oauth_token_secret", type="string", length=200, nullable=true)
     */
    private $twTokenSecret;
    /** 
     * @Column(name="token_login", type="string", length=100, nullable=true)

     */
    private $token_login;

    function __construct() {

    	/*
        $args = func_get_args();

        if (!empty($args)) {
            $argStr = NULL;
            foreach ($args as $arg) {
                $argStr .= "_" . get_class($arg);
            }
            if (method_exists($this, "__construct" . $argStr)) {
                call_user_func_array("_construct{$argStr}", $args);
            }
        }*/
    }
	/*
    private function __construct_Dto_TipoUsuario(Dto\Dto_TipoUsuario $tipoUsuario) {
        $this->tipoUsuario = $tipoUsuario;
    }

    private function __construct_Dto_TipoUsuario_Dto_Status(Dto\Dto_TipoUsuario $tipoUsuario, Dto\Dto_Status $status) {
        $this->tipoUsuario = $tipoUsuario;
        $this->status = $status;
    }**/

    public function setIdUsuario($idUsuario){
        $this->idUsuario = $idUsuario;
    }

    public function getIdUsuario() {
        return $this->idUsuario;
    }

    public function getTipoUsuario() {
        return $this->tipoUsuario;
    }

    public function setTipoUsuario($tipoUsuario) {
        $this->tipoUsuario = $tipoUsuario;
    }

    public function getStatus() {
        return $this->status;
    }

    public function setStatus(\Dto\Dto_Status $status) {
        $this->status = $status;
    }

    public function getUserName() {
        return $this->userName;
    }

    public function setUserName($userName) {
        $this->userName = $userName;
    }

    public function getPassword() {
        return $this->password;
    }

    public function setPassword($password) {
        $this->password = sha1($password);
    }

    public function setFBUid($fbUid) {
        $this->fbUid = $fbUid;
    }

    public function getFBUid() {
        return $this->fbUid;
    }

    public function setFBProvider($fbProvider) {
        $this->fbProvider = $fbProvider;
    }

    public function getFBProvider() {
        return $this->fbProvider;
    }

    public function setTwitterToken($twToken) {
        $this->twToken = $twToken;
    }

    public function getTwitterToken() {
        return $this->twToken;
    }

    public function setTwitterTokenSecret($twTokenSecret) {
        $this->twTokenSecret = $twTokenSecret;
    }

    public function getTwitterTokenSecret() {
        return $this->twTokenSecret;
    }
    
    public function setLoginToken($login){
        $this->token_login = $login;
    }
    
    public function getLoginToken(){
        return $this->token_login;
    }/**/

}
?>
 
