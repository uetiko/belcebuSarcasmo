<?php

namespace DAO;

use \Exception,
    Doctrine\ORM\NoResultException,
    Doctrine\ORM\ORMException,
    Doctrine\ORM\ORMInvalidArgumentException;

/**
 * Clase PasswordDAO para la administración de contraseñas
 *
 * @author Angel Barrientos <angel@pengostores.com>
 */
class PasswordDAO extends \DAO\ConstantsDaoInterface {

    private $loggin = NULL;

    public function __construct() {
        $this->loggin = \utils\JJLogger::InstanceOfJJLogger();
    }
    /**
     * Método para el cambio 
     * @param \To\CambioPassword $password
     * @return string
     */
    public function cambioPassword(\To\CambioPassword $password) {
        $em = new \Doctrine\ORM\EntityManager;
        $em = \lib\EntityManagerFactory::getEntityManager();
        $request = NULL;
        try {
            $query = $em->createQuery("select d from \Dto\Dto_UsuarioDatos d where d.mail='{$ToUsuario->getMail()}'");
            $this->logger->querys($query->getDQL(), "consulta de la tabla tbl_usuario_datos");
            $u = $query->getResult();
            $u = $u[0];
            $u = $u->getUsuario();
            $u->setPassword(sha1($ToUsuario->getPassword()));
            $em->merge($u);
            $em->flush();
            return self::$SUCCESS;
        } catch (ORMException $orme) {
            $this->loggin->log($orme->getTraceAsString(), $orme->getMessage(), "SEVERE");
            return self::$FAIL;
        } catch (ORMInvalidArgumentException $ormiae){
            $this->loggin->log($ormiae->getTraceAsString(), $ormiae->getMessage(), "SEVERE");
            return self::$FAIL;
        } catch (NoResultException $nre){
            $this->loggin->log($nre->getTraceAsString(), $nre->getMessage(), "SEVERE");
            return self::$FAIL;
        } catch (\Exception $e){
            $this->loggin->log($e->getTraceAsString(), $e->getMessage(), "SEVERE");
            return self::$FAIL;
        }
    }

    public function querySQL() {
        
    }

}

?>
