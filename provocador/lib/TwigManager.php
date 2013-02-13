<?php
namespace lib;

/**
 * Description of EntityManagerTwig
 *
 * @author Angel Barrientos <uetiko@gmail.com>
 */
class TwigManager {
    private $fileSystemLoader = NULL;
    private $environment = NULL;
    private static $INSTANCE = NULL;
    private $logger = NULL;
    private function __construct($fileSystemTemplatePath, \utils\HashMap $hash) {
        $this->fileSystemLoader = new \Twig_Loader_Filesystem($fileSystemTemplatePath);
        $this->environment = new \Twig_Environment($this->fileSystemLoader, $hash->toArray());
        $this->logger = \utils\JJLogger::InstanceOfJJLogger();
    }
    /**
     * 
     * @param string $file ruta donde se encuentran los templates
     * @param \utils\HashMap $hash 
     * @return \lib\EntityManagerTwig instance
     */
    public function getInstance($file, \utils\HashMap $hash) {
        if(!(self::$INSTANCE instanceof \lib\EntityManagerTwig)){
            self::$INSTANCE = new \lib\EntityManagerTwig($file, $hash);
        }
        return self::$INSTANCE;
    }
    
    public function displayTemplate($templateName, \utils\HashMap $valores){
        try{
        $template = $this->environment->loadTemplate($templateName);
        }  catch (\Exception $e){
            
        }
        return $template->render($valores->toArray());
    }
}
?>
