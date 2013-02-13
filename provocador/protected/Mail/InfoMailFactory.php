<?php

namespace Mail;

use \PHPMailer\phpmailerException,
    \Exception,
    \utils\JJLogger;
/**
 * Método de fabrica para instanciar un correo de info@activismo.com
 * @package Mail
 * @uses \Exception Clase Exception de php
 * @uses \PHPMailer\phpmailerException Clase de excepcion de la libreria PHPMailer
 * @uses \utils\JJLogger Clase para creación de logs
 * @author Angel Barrientos <angel@pangostores.com>
 */
class InfoMailFactory extends \Mail\AbstractMailFactory {

    private $conf = NULL;
    private $service = NULL;
    private $logger;

    public function __construct() {
        $this->conf = \Config\config_MailConfig::getInstance();
        $this->service = new \PHPMailer\PHPMailer();
        $this->logger = \utils\JJLogger::InstanceOfJJLogger();
    }
    /**
     * Método para agregar una dirección
     * @param string $correo correo
     * @param string $name nombre del destinatario (Opcional)
     */
    public function addAdreess($correo, $name = null) {
        $this->service->AddAddress($correo, $name);
    }
    /**
     * Método para agregar un archivo adjunto.
     * @param string $pathFile ruta del archivo
     * @param string $name nombre del archivo.
     */
    public function addFile($pathFile, $name) {
        $this->service->AddAttachment($path, $name);
    }
    /**
     * Método para la configuración del smtp.
     * @param boolean $withAuth
     */
    public function configSMTP($withAuth) {
        $this->service->IsSMTP();
        if (FALSE !== $withAuth) {
            $this->service->SMTPAuth = $this->conf->getAuth();
            $this->service->SMTPSecure = $this->conf->getSMTPSecure();
        } else {
            $this->service->SMTPAuth = $this->conf->getNoAuth();
        }
        $this->service->Host = $this->conf->getSmtpServer();
        $this->logger->querys($this->service->Host,"host smpt");
        $this->service->Port = $this->conf->getPuerto();
        $this->service->Username = $this->conf->getUsuarioInfo();
        $this->service->Password = $this->conf->getPasswordInfo();
        $this->service->IsHTML(TRUE);
        $this->service->Mailer = "smtp";
        $this->service->SMTPDebug = 0;
        $this->service->SMTPKeepAlive = TRUE;
    }
    /**
     * Método para envio de correo electronico con archivo adjunto opcional
     * @param string $correo
     * @param string $asunto
     * @param string $mensaje
     * @param string $filePath
     * @param string $fileName
     * @return boolean
     */
    public function sendMail($correo, $asunto, $mensaje, $filePath = NULL, $fileName = NULL) {
        $this->service->SetFrom($this->conf->getCorreoInfo(), $this->conf->getEmisorInfo());
        $this->service->Subject = $asunto;
        $this->service->Body = $mensaje;
        $this->service->AddAddress($correo);
        if (NULL !== $fileName) {
            $this->service->AddAttachment($filePath, $fileName);
        }
        try {
            if ($this->service->Send()) {
                return TRUE;
            } else {
                return FALSE;
            }
        } catch (\PHPMailer\phpmailerException $epm) {
            $this->logger->log($epm->getTraceAsString(), $epm->errorMessage(), "WARNING");
        } catch (\Exception $exc) {
            $this->logger->log($exc->getTraceAsString(), $exc->getMessage(), "WARNING");
        }
    }
    /**
     * Método para envío de correo electronico son archivo adjunto
     * @param string $correo
     * @param string $nombre
     * @param string $apellido
     * @return boolean
     */
    public function enviaCorreo($correo, $nombre, $apellido) {
        $this->service->SetFrom($this->conf->getCorreoInfo(), $this->conf->getEmisorInfo());
        $this->service->AddAddress($correo);
        $this->service->Subject = \utils\MailFormat::subjetFormat($this->conf->getAsuntoMensajeRegistro(), $nombre);
        $this->service->Body = \utils\MailFormat::bodyFormat($this->conf->getBodyMensajeRegistro(), $nombre, $apellido);
        try {
            if ($this->service->Send()) {
                return TRUE;
            } else {
                return FALSE;
            }
        } catch (\PHPMailer\phpmailerException $epm) {
            $this->logger->log($epm->getTraceAsString(), $epm->errorMessage(), "WARNING");
        } catch (\Exception $exc) {
            $this->logger->log($exc->getTraceAsString(), $exc->getMessage(), "WARNING");
        }
    }
    /**
     * Método para el envio de correo electronico para la recuperacíon de contraseñas.
     * @param string $correo
     * @param string $nombre
     * @param string $apellido
     * @param string $password
     * @return boolean
     */
    public function enviaNuevoPassword($correo, $nombre, $apellido, $password) {
        $this->service->SetFrom($this->conf->getCorreoInfo(), $this->conf->getEmisorInfo());
        $this->service->AddAddress($correo);
        $this->service->Subject = \utils\MailFormat::subjetFormat($this->conf->getAsuntoNuevoPassword(), $nombre);
        $this->service->Body = \utils\MailFormat::bodyNewPassword($this->conf->getBodyNuevoPassword(), $nombre, $apellido, $password);
        try {
            if ($this->service->Send()) {
                return TRUE;
            } else {
                return FALSE;
            }
        } catch (\PHPMailer\phpmailerException $epm) {
            $this->logger->log($epm->getTraceAsString(), $epm->errorMessage(), "WARNING");
        } catch (\Exception $exc) {
            $this->logger->log($exc->getTraceAsString(), $exc->getMessage(), "WARNING");
        }
    }

}
?>