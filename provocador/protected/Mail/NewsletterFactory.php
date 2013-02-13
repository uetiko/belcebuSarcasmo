<?php
namespace Mail;
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of NewsletterFactory
 *
 * @author silent
 */
class NewsletterFactory extends \Mail\AbstractMailFactory{
    private $conf = NULL;
    private $service = NULL;
    public function __construct() {
        $this-> conf = \Config\config_MailConfig::getInstance();
        $this->service = new \PHPMailer\PHPMailer();
    }

    public function addAdreess($correo, $name = null) {
        $this->service->AddAddress($correo, $name);
    }

    public function addFile($pathFile, $name) {
        $this->service->AddAttachment($path, $name);
    }

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
        $this->service->Username = $this->conf->getUsuarioNewsletter();
        $this->service->Password = $this->conf->getPasswordNewsletter();
    }

    public function sendMail($correo, $asunto, $mensaje, $filePath = NULL, $fileName = NULL) {
        $this->service->SetFrom($this->conf->getCorreoNewsletter(), $this->conf->getEmisorNewsletter());
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
