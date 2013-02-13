<?php
namespace Mail;
/**
 * Método de fabrica para instanciar un correo de prueba
 * @package Mail
 * @uses \Exception Clase Exception de php
 * @uses \PHPMailer\phpmailerException Clase de excepcion de la libreria PHPMailer
 * @uses \utils\JJLogger Clase para creación de logs
 * @author Angel Barrientos <angel@pangostores.com>
 */
class PruebaMailFactory extends \Mail\AbstractMailFactory{
    private $conf = null;
    private $service = NULL;
    public function __construct() {
        //$this->conf = new \Config\config_MailConfig();
        $this-> conf = \Config\config_MailConfig::getInstance();
        $this->service = new \PHPMailer\PHPMailer();
    }
    /**
     * 
     * @param boolean $withAuth
     */
    public function configSMTP($withAuth) {
        $this->service->IsSMTP();
        if(FALSE !== $withAuth){
            $this->service->SMTPAuth = $this->conf->getAuth();
            $this->service->SMTPSecure = $this->conf->getSMTPSecure();
        }  else {
            $this->service->SMTPAuth = $this->conf->getNoAuth();
        }
        $this->service->Host = $this->conf->getSmtpServer();
        $this->service->Port = $this->conf->getPuerto();
        $this->service->Username = $this->conf->getUsuarioPrueba();
        $this->service->Password = $this->conf->getPasswordPrueba();
    }
    /**
     * @access public
     * @param string $pathFile
     * @param string $name
     */
    public function addFile($pathFile, $name) {
        $this->service->AddAttachment($path, $name);
    }
    /**
     * 
     * @param string $correo
     * @param string $name
     */
    public function addAdreess($correo, $name = '') {
        $this->service->AddAddress($correo, $name);
    }
    /**
     * 
     * @param string $correo
     * @param string $asunto
     * @param string $mensaje
     * @param string $filePath
     * @param string $fileName
     */
    public function sendMail($correo, $asunto, $mensaje, $filePath = NULL, $fileName = NULL) {
        $this->service->SetFrom($this->conf->getCorreoPrueba(), $this->conf->getEmisorPrueba());
        $this->service->Subject = $asunto;
        $this->service->Body = $mensaje;
        $this->service->AddAddress($correo);
        if(NULL !== $fileName){
            $this->service->AddAttachment($filePath, $fileName);
        }
        try {
            if($this->service->Send()){
                return TRUE;
            }else{
                return FALSE;
            }
        } catch (\Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }
}

?>