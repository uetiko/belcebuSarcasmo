<?php
namespace BO;
use \Exception;
/**
 * Description of CMSBO
 * @package BO 
 * @author Angel Barrientos <angel@pengostores.com>
 */
class CMSBO {

    private $logger = NULL;

    public function procesaTiporticulo() {
        $tipo = array();
        $dao = new \DAO\CMSDAO();
        $ar = $dao->getTipoArticulo();
        foreach ($rest as $key) {
            $tipo[] = array('clave' => $key->getTipo(), 'valor' => $key->getDescripcion());
        }
        return $tipo;
    }
    
    public function guardaArticulo(\To\ToCms $cms){
        $daoConsulta = new \DAO\ConsultasDAO();
        $usuario = $daoConsulta->getIdUser($cms->getAutor());
        $profile = $daoConsulta->getONG($usuario->getIdUsuario());
        $cms->setOng($profile->getONG());
    }
}

?>
