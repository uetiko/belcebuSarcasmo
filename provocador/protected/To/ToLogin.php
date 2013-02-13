<?php
namespace To;

class ToLogin {
    private $toUsuario = NULL;
    private $status = NULL;
    function __construct() {
        
    }
    
    public function setToUsuario(\To\ToUsuario $tuUsuario){
        $this->toUsuario = $tuUsuario;
    }
    
    public function getToUsuario(){
        return $this->toUsuario;
    }
    
    public function setStatus($status){
        $this->status = $status;
    }
    
    public function getStatus(){
        return $this->status;
    }

}
?>
