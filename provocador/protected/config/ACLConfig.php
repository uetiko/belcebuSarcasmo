<?php
namespace Config;

class ACLConfig{
    private $properties = NULL;
    private static $INSTANCE = NULL;
    private function __construct() {
        $this->properties = \spyc\Spyc::YAMLLoad(realpath(__DIR__ . '/../resources/ACLConfig.yml'));
    }
    public static function getInstance(){
        if(self::$INSTANCE instanceof \Config\ACLConfig){
            return self::$INSTANCE;
        }else{
            return self::$INSTANCE = new \Config\ACLConfig();
        }
    }
    
    public function getArrayACLconfig(){
        return $this->properties;
    }
}
?>
