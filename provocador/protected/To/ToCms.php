<?php
namespace To;
/**
 * Description of ToCms
 *
 * @author Angel Barrientos
 */
class ToCms extends \To\ToUsuario{
    private $datos = array();
    
    public function __construct(array $datos) {
        if(is_array($datos)){
            parent::__construct($datos);
            $this->datos = parent::arrayList;
        }
    }
    
    public function setTipo($tipo){
        $this->datos->put('tipo', $tipo);
    }
    
    public function getTipo(){
        return parent::arrayList->get('tipo');
    }
    
    public function setTitulo($titulo){
        $this->datos['titulo'] = $titulo;
    }
    
    public function getTitulo(){
        return $this->datos['titulo'];
    }
    
    public function setFechaPublicacion($fecha){
        $this->datos['fecha'] = $fecha;
    }
    
    public function getFechaPublicacion(){
        return $this->datos['fecha'];
    }
    
    public function setPublicacion($articulo){
        $this->datos['articulo'] = $articulo;
    }
    
    public function getPublicacion(){
        return $this->datos['articulo'];
    }
    
    public function setAutor($autor){
        $this->datos['autor'] = $autor;
    }
    
    public function getAutor(){
        return $this->datos['autor'];
    }
    
    public function setToken($token){
        $this->datos['token'] = $token;
    }
    
    public function getToken(){
        return $this->datos['token'];
    }
    
    public function setOng($ong){
        $this->datos['ong'] = $ong;
    }
    
    public function getOng(){
        return $this->datos['ong'];
    }
}
?>