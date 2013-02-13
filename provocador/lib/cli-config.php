<?php
//Autocargamos clases
//echo realpath(__DIR__ . '/../ac/config/');
include_once realpath(__DIR__ . '/../ac/Autoloader.php');
$load = new Autoloader();
$load->registro();

// (2) Configuración
$conf = \config\ConfigDB::getInstance();
$config = new \Doctrine\ORM\Configuration();

// (3) Caché
$cache = new \Doctrine\Common\Cache\ArrayCache();
$config->setMetadataCacheImpl($cache);
$config->setQueryCacheImpl($cache);

// (4) Driver
$driverImpl = $config->newDefaultAnnotationDriver(array(realpath(__DIR__ . '/../ac/Dto')));
$config->setMetadataDriverImpl($driverImpl);

// (5) Proxies
$config->setProxyDir(realpath(__DIR__ . '/proxies'));
$config->setProxyNamespace('proxies');

// (6) Conexión
$connectionOptions = array(
            'driver' => $conf->getDriver(),
            'host' => $conf->getHost(),
            'dbname' => $conf->getDBName(),
            'user' => $conf->getUser(),
            'password' => $conf->getPassword()
        );

// (7) EntityManager
$em = \Doctrine\ORM\EntityManager::create($connectionOptions, $config);

// (8) HelperSet
$helperSet = new \Symfony\Component\Console\Helper\HelperSet(array(
    'db' => new \Doctrine\DBAL\Tools\Console\Helper\ConnectionHelper($em->getConnection()),
    'em' => new \Doctrine\ORM\Tools\Console\Helper\EntityManagerHelper($em)
));
