<?php
namespace Mail;

/**
 * MailClass es un método fabrica para servir el tipo de instancia para el envío
 * de correo electronico
 * @package Mail
 * @author Angel Barrientos <angel@pangostores.com>
 */
class MailClass{
    private $option = NULL;
    private $subOption = NULL;
    private $mail = NULL;
    /**
     * Metodo constructor que establece que tipo de correo usar y si existe una subObcion. Los valores son: 'info', 'newsletter'.
     * @param string $subOption subcategoria para el envio de correos electronicos. este valor es opcional.
     * @param string $option  las opciones que recive son: prueba, info, newsletter
     */
    public function __construct($option, $subOption = NULL) {
        $this->option= $option;
        $this->subOption = $subOption;
        $this->mail = \Mail\AbstractMailFactory::getMailFactory($option);
        $this->mail->configSMTP(TRUE);
    }
    /**
     * Metodo para envio de correo especifico.
     * @param string $correo
     * @param string $asunto
     * @param string $mensaje
     * @param string $filePath
     * @param string $fileName
     * @return boolean
     */
    public function enviaCorreo($correo, $asunto, $mensaje, $filePath = NULL, $fileName = NULL){
        return $this->mail->sendMail($correo, $asunto, $mensaje, $filePath = NULL, $fileName = NULL);  
    }
    /**
     * Método para envio de correo generico a partir de plantillas definidas en el archovo MailConfig.yml
     * @param string $correo
     * @param string $nombre
     * @param string $apellido
     * @param string $password
     * return boolean
     */
    public function enviaCorreoGenerico($correo, $nombre, $apellido, $password = NULL){
        switch ($this->option) {
            case 'prueba':
                break;
            case 'info':
                if($this->subOption == NULL){
                    return $this->mail->enviaCorreo($correo, $nombre, $apellido);
                }else{
                    switch ($this->subOption) {
                        case 'nuevoPassword':
                            return $this->mail->enviaNuevoPassword($correo, $nombre, $apellido, $password);
                            break;
                        default:
                            break;
                    }
                }
                break;
            case 'newsletter':
                break;
            default:
                break;
        }
    }
}
?>
