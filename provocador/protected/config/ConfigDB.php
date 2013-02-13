<?php

namespace config;
/**
 * 
 */
class ConfigDB {

    /**
     * @access private
     * @var array proterties
     */
    private $properties;
    private static $INSTANCE = NULL;

    /**
     * @return void 
     * @access public
     */
    private function __construct() {
        $this->properties = \spyc\Spyc::YAMLLoad(realpath(__DIR__ . '/../resources/ConfigDB.yml'));
    }

    /**
     * @return string el nombre del driver a usar
     */
    public function getDriver() {
        return $this->properties['base']['driver'];
    }

    /**
     * @return string Nombre de la base de datos.
     */
    public function getHost() {
        return $this->properties['base']['host'];
    }

    /**
     * @return string Nombre de la base de datos
     */
    public function getDBName() {
        return $this->properties['base']['dbname'];
    }

    /**
     * @return string Nombre del usuario de la base de datos
     */
    public function getUser() {
        return $this->properties['base']['user'];
    }

    /**
     * @return string Password de la base de datos.
     * @access public
     */
    public function getPassword() {
        return $this->properties['base']['password'];
    }

    /**
     * @access private
     */
    public function __destruct() {
        $this->properties = NULL;
    }
    /**
     * 
     * @return \Config\ConfigDB Instancia de la clase config_ConfigDB
     */
    public static function getInstance(){
        if(!isset(self::$INSTANCE)){
            return self::$INSTANCE = new \Config\ConfigDB();
        }else{
            return self::$INSTANCE;
        }
    }

}

?>