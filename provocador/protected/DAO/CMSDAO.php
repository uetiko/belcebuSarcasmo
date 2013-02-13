<?php
namespace DAO;
use \Exception,
    Doctrine\ORM\EntityNotFoundException,
    Doctrine\ORM\ORMInvalidArgumentException,
    Doctrine\ORM\ORMException;

/**
 * Description of CMSDAO
 * 
 * @author Angel Barrientos <angel@pengostores.com>
 */
class CMSDAO extends ConstantsDaoInterface {

    private $logger = NULL;
    private $em = NULL;

    public function __construct() {
        $this->logger = \utils\JJLogger::InstanceOfJJLogger();
        $this->em = \lib\EntityManagerFactory::getEntityManager();
        $this->em = new \Doctrine\ORM\EntityManager();
    }

    public function getTipoArticulo() {
        $result = array();
        try {
            $query = $this->em->createQuery("select t from \Dto\Dto_TipoPost t");
            $result = $query->getResult();
        } catch (EntityNotFoundException $enfe) {
            $this->logger->log($enfe->getTraceAsString(), $enfe->getMessage(), "SEVERE");
        } catch (ORMInvalidArgumentException $ORME) {
            $this->logger->log($ORME->getTraceAsString(), $ORME->getMessage(), "SEVERE");
        } catch (ORMException $ORMExc){
            $this->logger->log($ORMExc->getTraceAsString(), $ORMExc->getMessage(), "SEVERE");
        } catch (\Exception $e){
            $this->logger->log($e->getTraceAsString(), $e->getMessage(), "SEVERE");
        }
        return $result;
    }
    
    public function guardaPublicacion(\To\ToCms $cms){
        $post = new \Dto\Dto_Post();
        $post->setTitulo($cms->getTitulo());
        $post->setPost($cms->getPublicacion());
        $post->setFecha($cms->getFechaPublicacion());
        $post->setCatTipoPost($cms->getTipo());
        $post->setFecha($cms->getFechaPublicacion());
        $post->setAutor($cms->getAutor());
        $post->setOng($cms->getOng());
        try {
            $this->em->persist($post);
            $this->em->flush();
            return self::$SUCCESS;
        } catch (EntityNotFoundException $enfe) {
            $this->logger->log($enfe->getTraceAsString(), $enfe->getMessage(), "SEVERE");
            return self::$FAIL;
        } catch (ORMInvalidArgumentException $ORME) {
            $this->logger->log($ORME->getTraceAsString(), $ORME->getMessage(), "SEVERE");
            return self::$FAIL;
        } catch (ORMException $ORMExc){
            $this->logger->log($ORMExc->getTraceAsString(), $ORMExc->getMessage(), "SEVERE");
            return self::$FAIL;
        } catch (\Exception $e){
            $this->logger->log($e->getTraceAsString(), $e->getMessage(), "SEVERE");
            return self::$FAIL;
        } 
    }
    
    public function getLastFivePost(\To\ToCms $cms){
        $result = array();
        try{
            
        } catch (EntityNotFoundException $enfe) {
            $this->logger->log($enfe->getTraceAsString(), $enfe->getMessage(), "SEVERE");
            return self::$FAIL;
        } catch (ORMInvalidArgumentException $ORME) {
            $this->logger->log($ORME->getTraceAsString(), $ORME->getMessage(), "SEVERE");
            return self::$FAIL;
        } catch (ORMException $ORMExc){
            $this->logger->log($ORMExc->getTraceAsString(), $ORMExc->getMessage(), "SEVERE");
            return self::$FAIL;
        } catch (\Exception $e){
            $this->logger->log($e->getTraceAsString(), $e->getMessage(), "SEVERE");
            return self::$FAIL;
        }
    }
    
    public function getAllPost(\To\ToCms $cms){
        $obj = array();
        try{
            $query = $this->em->createQuery("select p from \Dto\Dto_Post p where p.ong = {$cms->getOng()}");
            $result = $query->getResult();
            foreach ($result as $key){
                $obj[] = $key;
            }
        } catch (EntityNotFoundException $enfe) {
            $this->logger->log($enfe->getTraceAsString(), $enfe->getMessage(), "SEVERE");
            return self::$FAIL;
        } catch (ORMInvalidArgumentException $ORME) {
            $this->logger->log($ORME->getTraceAsString(), $ORME->getMessage(), "SEVERE");
            return self::$FAIL;
        } catch (ORMException $ORMExc){
            $this->logger->log($ORMExc->getTraceAsString(), $ORMExc->getMessage(), "SEVERE");
            return self::$FAIL;
        } catch (\Exception $e){
            $this->logger->log($e->getTraceAsString(), $e->getMessage(), "SEVERE");
            return self::$FAIL;
        }
        return $obj;
    }
    
    public function getEspecificPost(\To\ToCms $cms){
        $result = array();
        try{
            
        } catch (EntityNotFoundException $enfe) {
            $this->logger->log($enfe->getTraceAsString(), $enfe->getMessage(), "SEVERE");
            return self::$FAIL;
        } catch (ORMInvalidArgumentException $ORME) {
            $this->logger->log($ORME->getTraceAsString(), $ORME->getMessage(), "SEVERE");
            return self::$FAIL;
        } catch (ORMException $ORMExc){
            $this->logger->log($ORMExc->getTraceAsString(), $ORMExc->getMessage(), "SEVERE");
            return self::$FAIL;
        } catch (\Exception $e){
            $this->logger->log($e->getTraceAsString(), $e->getMessage(), "SEVERE");
            return self::$FAIL;
        }
    }
}
?>
