<?php

namespace DAO;

use \Exception,
    Doctrine\ORM\NoResultException,
    Doctrine\ORM\ORMException,
    Doctrine\ORM\ORMInvalidArgumentException;
/**
 * Clase para el registro de usuarios y ONG's
 * @package DAO
 * @author Angel Barrientos <angel@pengostores.com>
 * @version 0.1
 */
class DAO_RegistroDAO extends \DAO\ConstantsDaoInterface {

    private $logger;
    private static $ERR_INSERT = "Error al insertanr en la base de datos";

    public function __construct() {
        $this->logger = \utils\JJLogger::InstanceOfJJLogger();
    }

    /**
     * Método para dar de alta a un nuevo usuario
     * @param \Dto\Dto_Usuario $usuario
     * @param \Dto\Dto_UsuarioDatos $datosUsuario
     * @param string $genero
     * @return HashMap regresa success si se inserto en la base correctamente, o fail y el mensaje de error en msg
     */
    public function registraUsuario(\Dto\Dto_Usuario $usuario, \Dto\Dto_UsuarioDatos $datosUsuario, $genero) {
        $result = new \utils\HashMap();
        $genero = new \utils\ArrayList();
        $status = new \utils\ArrayList();
        if (FALSE !== $em = \lib\EntityManagerFactory::getEntityManager()) {
            //$em = new \Doctrine\ORM\EntityManager();
            $perfil = new \Dto\Dto_Perfil();
            $query = NULL;
            try {
                $query = $em->createQuery("select g from  \Dto\Dto_Genero g where g.genero = '{$genero}'");
                $genero->add($query->getResult());
                $query = $em->createQuery("select s from \Dto\Dto_Status s where s.status ='A'");
                $status->add($query->getResult());
                $datosUsuario->setGenero($genero->get(0));
                $usuario->setStatus($status->get(0));
                $em->persist($usuario);
                $em->persist($datosUsuario);
                $datosUsuario->setUsuario($usuario);
                $perfil->setUsuario($usuario);
                $perfil->setUsuario($usuario);
                $perfil->setDatosPersonal($datosUsuario);
                $em->persist($perfil);
                $em->flush();
                $result->put("status", parent::$SUCCESS);
            } catch (\Doctrine\ORM\ORMException $e) {
                $this->logger->log($e->getTraceAsString(), $e->getMessage(), "SEVERE");
                $this->logger->querys($query->getDQL(), "Registro de usuario: {$usuario->getUserName()}");
                $result->put("status", parent::$FAIL);
                $result->put("msg", $e->getMessage());
            } catch (ORMInvalidArgumentException $ormiae) {
                $this->logger->log($ormiae->getTraceAsString(), $ormiae->getMessage(), "SEVERE");
                $this->logger->querys($query->getDQL(), "Registro de usuario: {$usuario->getUserName()}");
                $result->put("status", parent::$FAIL);
                $result->put("msg", $ormiae->getMessage());
            } catch (\Exception $exc) {
                $this->logger->log($exc->getTraceAsString(), $exc->getMessage(), "SEVERE");
                $this->logger->querys($query->getDQL(), "Registro de usuario: {$usuario->getUserName()}");
                $result->put("status", parent::$FAIL);
                $result->put("msg", $exc->getMessage());
            }
            return $result;
        }
    }
    /**
     * 
     * @param \DAO\To\To_Registro $registrometodo para el registro de datos de usuarios
     */
    public function registroDatosUsuario(To\To_Registro $registro) {
        
    }
    /**
     * Método para el registro de datos de ONG's
     * @param \To\To_RegistroONG $registro
     * @param int $idUsuario
     * @return string
     */
    public function registraONG(\To\To_RegistroONG $registro, $idUsuario) {
        $em = \lib\EntityManagerFactory::getEntityManager();
        $em = new \Doctrine\ORM\EntityManager();
        $estado = new \Dto\Dto_Estados();
        $perfil = NULL;
        try {
            $query = $em->createQuery("select e from \Dto\Dto_Estados e where e.estado = '{$registro->getEstado()}'");
            $this->logger->querys();
            $estado = $em->getResult();
            $estado = $estado[0];
            $query = $em->createQuery("select p from \Dto\Dto_Perfil p where p.usuario = {$idUsuario}");
            $perfil = $query->getResult();
            $perfil = $perfil[0];
        } catch (Exception $exc) {
            $this->logger->log($exc->getTraceAsString(), $exc->getMessage(), "SEVERE");
        }
        $ong = new \Dto\Dto_Ong();
        $direccion = new \Dto\Dto_Direccion();
        $contacto = new \Dto\Dto_Contacto();
        $redSocial = new \Dto\Dto_Redes();
        $direccion->setCalle($registro->getCalle());
        $direccion->setColonia($registro->getColonia());
        $direccion->setCodigoPostal($registro->getCodigoPortal());
        $direccion->setEstado($estado);
        $direccion->setDelegacion($registro->getDelegacion());
        $contacto->setPhone($registro->getTelefono());
        $contacto->setPhone1($registro->getTelefono2());
        $contacto->setPhone2($registro->getTelefono3());
        $contacto->setFax($registro->getFax());
        $contacto->setCallCenter($registro->getCallCenter());
        $contacto->setEmail($registro->getEmail());
        $contacto->setEmail2($registro->getEmail2());
        $contacto->setEmail3($registro->getEmail3());
        $contacto->setWeb($registro->getWebSite());
        $contacto->setWeb2($registro->getWebSite2());
        $redSocial->setTwitter($registro->getTwitter());
        $redSocial->setFacebook($registro->getFacebook());
        $redSocial->setYoutube($registro->getYoutube());
        $ong->setInformation($direccion);
        $ong->setConacto($conacto);
        try {
            $query = $em->createQuery("select o from \Dto\Dto_Perfil where o.id_usuario = {$idUsuario}");
            $this->logger->querys($query->getSQL(), "select para tbl_perfil");
            $perfil = $query->getResult();
            $em->persist($direccion);
            $em->persist($contacto);
            $em->persist($redSocial);
            $em->persist($ong);
            $perfil->setONG($ong);
            $em->merge($perfil);
            $em->flush();
            return self::$SUCCESS;
        } catch (\Doctrine\ORM\ORMException $orme) {
            $this->logger->log($orme->getTraceAsString(), $orme->getMessage(), "SEVERE");
            return self::$FAIL;
        } catch (ORMInvalidArgumentException $ormiae) {
            $this->logger->log($ormiae->getTraceAsString(), $ormiae->getMessage(), "SEVERE");
            return self::$FAIL;
        } catch (\Exception $exc) {
            $this->logger->log($exc->getTraceAsString(), $exc->getMessage(), "SEVERE");
            return self::$FAIL;
        }
    }
    /**
     * Método para validar su un usuario existe
     * @param \To\ToUsuario $toUsuario
     * @return string
     */
    public function validaUserName($name) {
        $em = \lib\EntityManagerFactory::getEntityManager();
        $result = NULL;
        try {
            $query = $em->createQuery("select count(u) from \Dto\Dto_Usuario u where u.userName REGEXP '^{$name}'");
            $this->logger->querys($query->getSQL(), "verifica si un nombre de usuario existe en la base de datos");
            $result = $query->getScalarResult();
        } catch (\Doctrine\ORM\ORMException $orme) {
            $this->logger->log($orme->getTraceAsString(), $orme->getMessage(), "SEVERE");
        } catch (\Exception $e) {
            $this->logger->log($e->getTraceAsString(), $e->getMessage(), "SEVERE");
        }
        if ($result > 0) {
            return self::$SUCCESS;
        } else {
            return self::$FAIL;
        }
    }

    public function simpleQuery() {
        //$em = new \Doctrine\ORM\EntityManager();
        $em = \lib\EntityManagerFactory::getEntityManager();
        try {
            $query = $em->createQuery("select p from \Dto\Dto_Perfil p where p.usuario = 56");
            $this->logger->querys($query->getSQL(), "Pruebas");
            $usuario = $query->getResult();
            $perfil = $usuario[0];
            print_r($perfil);
            //$query = $em->createQuery("select s from \Dto\Dto_Usuario u join \Dto\Dto_Status s where u.idUsuario = {$perfil->getIdUsuario()}");
            //$user = $query->getResult();
        } catch (ORMException $orme) {
            $this->loggin->log($orme->getTraceAsString(), $orme->getMessage(), "SEVERE");
            return self::$FAIL;
        } catch (ORMInvalidArgumentException $ormiae) {
            $this->loggin->log($ormiae->getTraceAsString(), $ormiae->getMessage(), "SEVERE");
            return self::$FAIL;
        } catch (NoResultException $nre) {
            $this->loggin->log($nre->getTraceAsString(), $nre->getMessage(), "SEVERE");
            return self::$FAIL;
        } catch (\Exception $e) {
            $this->loggin->log($e->getTraceAsString(), $e->getMessage(), "SEVERE");
            return self::$FAIL;
        }
    }

    public function select() {
        
    }

    public function querySQL() {
        
    }

}

?>
