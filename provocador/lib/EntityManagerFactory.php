<?php
namespace lib;

use \Doctrine\ORM\Configuration,
    \Doctrine\ORM\EntityManager,
    \Doctrine\Common\Cache\ApcCache,
    \Doctrine\Common\ClassLoader,
    \Exception,
    \utils\JJLogger;
/* */
/**
 * 
 */
class EntityManagerFactory {

    private static $entityManager = NULL;

    protected static function creaEntityManager() {
        //$logger = \utils\JJLogger::InstanceOfJJLogger("error_log", "note_log", "query_log", "logs");
        $config = \config\ConfigDB::getInstance();
        $conf = new \Doctrine\ORM\Configuration();
        $cache = new \Doctrine\Common\Cache\ArrayCache();
        $conf->setMetadataCacheImpl($cache);
        $conf->setMetadataDriverImpl($conf->newDefaultAnnotationDriver(array(realpath(__DIR__ . '/../protected/Dto'))));
        $conf->setProxyDir(realpath(__DIR__ . '/../protected/proxies'));
        $conf->setProxyNamespace('proxies');
        $connectionOptions = array(
            'driver' => $config->getDriver(),
            'host' => $config->getHost(),
            'dbname' => $config->getDBName(),
            'user' => $config->getUser(),
            'password' => $config->getPassword()
        );
        try{
            $entity = \Doctrine\ORM\EntityManager::create($connectionOptions, $conf);
            return $entity;
        }  catch (\Exception $e){
            $logger->log($e->getTraceAsString(), $e->getMessage(), "SEVERE");
            return FALSE;
        }
        
    }

    public static function getEntityManager() {
        try{
        if (!isset(self::$entityManager)) {
            return self::$entityManager = self::creaEntityManager();
        } else {
            return self::$entityManager;
        }
        }  catch (\Exception $e){
        }
    }

}

?>
