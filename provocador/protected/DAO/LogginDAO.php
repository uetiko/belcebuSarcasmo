<?php
namespace DAO;

use \Exception,
    Doctrine\ORM\EntityNotFoundException,
    Doctrine\ORM\ORMInvalidArgumentException,
    Doctrine\ORM\ORMException;

/**
 * Clase LogginAction, perteneciente a la capa del modelo. 
 * Se encarga de la interacción con el ORM Doctrine.
 * @package DAO
 * @author Angel Barrientos <angel@pengostores.com>
 */
class LogginDAO extends \DAO\ConstantsDaoInterface {

    /** @var \utils\JJLogger Instancia de la clase JJLogger */
    private $logger;

    public function __construct() {
        $this->logger = \utils\JJLogger::InstanceOfJJLogger();
    }

    /**
     * Comprueba si un usuario existen en la base de datos por medio de usuario y el sha1 
     * del password
     * @param \To\ToUsuario $toUsusario
     * @return string
     */
    public function login(\To\ToLogin $toUsusario) {
        $em = \lib\EntityManagerFactory::getEntityManager();
        //$em = new \Doctrine\ORM\EntityManager();
        $select = "select count(u) from \Dto\Dto_Usuario u where u.userName = '{$toUsusario->getToUsuario()->getUsuario()}' and u.password = '{$toUsusario->getToUsuario()->getPassword()}'";
        try {
            $query = $em->createQuery($select);
            $this->logger->querys($query->getDQL(), "select login");
            $result = $query->getSingleScalarResult();
            //$u = $query->getResult();
            //$u = $u[0];
            //$u->setLoginToken($toUsusario->getToken());
            //$em->persist($u);
            //$em->merge($u);
            $this->logger->querys($result, "valor regresado");
            if ($result <> 0) {
                return self::$SUCCESS;
            } else {
                return self::$FAIL;
            }
        } catch (\Exception $e) {
            $this->logger->log($e->getTraceAsString(), $e->getMessage(), "SEVERE");
            return self::$FAIL;
        }catch(ORMException $orme){
            $this->logger->log($orme->getTraceAsString(), $orme->getMessage(), "SEVERE");
            return self::$FAIL;
        }
    }

    /**
     * Método para cambio del password de un usuario.
     * @param \To\ToUsuario $ToUsuario
     * @return string
     */
    public function changePassword(\To\ToUsuario $ToUsuario) {
        $u = new \Dto\Dto_Usuario();
        $em = \lib\EntityManagerFactory::getEntityManager();
        try {
            $query = $em->createQuery("select d from \Dto\Dto_UsuarioDatos d where d.mail='{$ToUsuario->getMail()}'");
            $this->logger->querys($query->getDQL(), "consulta de la tabla tbl_usuario_datos");
            $u = $query->getResult();
            $u = $u[0];
            $u = $u->getUsuario();
            $u->setPassword($ToUsuario->getPassword());
            $em->merge($u);
            $em->flush();
            return self::$SUCCESS;
        } catch (\Exception $exc) {
            $this->logger->log($exc->getTraceAsString(), $exc->getMessage(), "SEVERE");
            return self::$FAIL;
        }
    }

    /**
     * Método que regresa los datos de un usuario ligados a un correo.
     * @param \To\ToUsuario $usuario trasnfer Object con el correo del usuario
     * @return mixter Regresa los datos del usuario en un objeto UsuarioDatos del paquete Dto, en caso de no existir, regresa una string "fail"
     */
    public function getUserDataForMail(\To\ToUsuario $usuario) {
        $em = \lib\EntityManagerFactory::getEntityManager();
        $user = new \utils\ArrayList();
        try {
            $query = $em->createQuery("select d from \Dto\Dto_UsuarioDatos d where d.mail='{$usuario->getMail()}'");
            $this->logger->querys($query->getSQL(), "recuperando password");
            $user->add($query->getResult());
            return $user->get(0);
        } catch (\Exception $exc) {
            $this->logger->log($exc->getTraceAsString(), $exc->getMessage(), "SEVERE");
            return self::$FAIL;
        }
    }

    public function validaToken(\To\ToUsuario $toUser) {
        $em = \lib\EntityManagerFactory::getEntityManager();
        //$em = new \Doctrine\ORM\EntityManager();
        try {
            $query = $em->createQuery("select count(u) from \Dto\Dto_Usuario u where u.token_login = {$toUser->getToUsuario()->getLoginToken()} and u.userName = {$toUser->getToUsuario()->getUserName()}");
            $this->logger->querys($query->getSQL(), "sql para verificación de token del login");
            if ($query->getSingleScalarResult() <> 0) {
                return $toLogin->setStatus(self::$SUCCESS);
            } else {
                return $toLogin->setStatus(self::$FAIL);
            }
        } catch (Doctrine\ORM\EntityNotFoundException $enfe) {
            $this->logger->log($enfe->getTraceAsString(), $enfe->getMessage(), "SEVERE");
            return $toLogin->setStatus(self::$FAIL);
        } catch (ORMInvalidArgumentException $oiae) {
            $this->logger->log($oiae->getTraceAsString(), $oiae->getMessage(), "SEVERE");
            return $toLogin->setStatus(self::$FAIL);
        } catch (ORMException $oe) {
            $this->logger->log($oe->getTraceAsString(), $oe->getMessage(), "SEVERE");
            return $toLogin->setStatus(self::$FAIL);
        } catch (\Exception $e) {
            $this->logger->log($e->getTraceAsString(), $e->getMessage(), "SEVERE");
            return $toLogin->setStatus(self::$FAIL);
        }
    }

    public function querySQL() {
        
    }

}

?>