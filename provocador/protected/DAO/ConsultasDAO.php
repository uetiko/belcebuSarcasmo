<?php
namespace DAO;
use \Exception,
    Doctrine\ORM\EntityNotFoundException,
    Doctrine\ORM\ORMInvalidArgumentException,
    Doctrine\ORM\ORMException;

/**
 * Description of ConsultasDAO
 *
 * @author Angel Barrientos <angel@pengostores.com>
 */
class ConsultasDAO extends ConstantsDaoInterface{
    private $logger;
    private $em;
    
    public function __construct() {
        $this->logger = \utils\JJLogger::InstanceOfJJLogger();
        $this->em = \lib\EntityManagerFactory::getEntityManager();
        //$this->em = new \Doctrine\ORM\EntityManager();
    }

    public function getONG($idUser){
        try{
            $query = $this->em->createQuery("select p from \Dto\Dto_Perfil p where p.usuario = '$idUser'");
            return $query->getResult();
        }catch(EntityNotFoundException $enfe){
            $this->logger->log($enfe->getTraceAsString(), $enfe->getMessage(), "SEVERE");
        }catch(ORMInvalidArgumentException $iae){
            $this->logger->log($iae->getTraceAsString(), $iae->getMessage(), "SEVERE");
        }catch(ORMException $oe){
            $this->logger->log($oe->getTraceAsString(), $oe->getMessage(), "SEVERE");
        }
    }
    
    public function getIdUser($user){
        try{
            $query = $this->em->createQuery("select u from \Dto\Dto_Usuario u where u.userName = '$user'");
            return $query->getResult();
        }catch(EntityNotFoundException $enfe){
            $this->logger->log($enfe->getTraceAsString(), $enfe->getMessage(), "SEVERE");
        }catch(ORMInvalidArgumentException $iae){
            $this->logger->log($iae->getTraceAsString(), $iae->getMessage(), "SEVERE");
        }catch(ORMException $oe){
            $this->logger->log($oe->getTraceAsString(), $oe->getMessage(), "SEVERE");
        }
    }
    
    public function checaNombreUsuario($usuario){
        try{
            $query = $this->em->createQuery("select count(u) from \Dto\Dto_Usuario u where u.userName = '$usuario'");
            $result = $query->getSingleScalarResult();
            if($result > 0){
                return self::$SUCCESS;
            }else{
                return self::$FAIL;
            }
        }catch(EntityNotFoundException $enfe){
            $this->logger->log($enfe->getTraceAsString(), $enfe->getMessage(), "SEVERE");
            return self::$FAIL;
        }catch(ORMInvalidArgumentException $iae){
            $this->logger->log($iae->getTraceAsString(), $iae->getMessage(), "SEVERE");
            return self::$FAIL;
        }catch(ORMException $oe){
            $this->logger->log($oe->getTraceAsString(), $oe->getMessage(), "SEVERE");
            return self::$FAIL;
        }
    }
}

?>
