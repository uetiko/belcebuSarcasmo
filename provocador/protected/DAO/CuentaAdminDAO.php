<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of CuentaAdminDAO
 *
 * @author silent
 */
class CuentaAdminDAO {
    private $logger;
    public function __construct() {
        $this->logger = new \utils\JJLogger("error_log", "note_log", "query_log", "logs");
    }
    
    public function cambioPassword(\To\CambioPassword $passwd){
        $em = \lib\EntityManagerFactory::getEntityManager();
        try {
            $query = $em->createQuery("select count(u.id_usuario) from \Dto\Dto_Usuario u where u.password = '{$passwd->getOldPassword()}'");
            $count = $query->getSingleScalarResult();
            if($count < 0){
                $query = $em->createQuery("update \Dto\Dto_Usuario u set u.password = '{$passwd->getNewPassword()}' where  u.usuario = '{$passwd->getUsuario()}'and u.passwrd = '{$passwd->getOldPassword()}'");
                $count = $query->execute();
            }else{
                
            }
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
            
    }
}
?>
