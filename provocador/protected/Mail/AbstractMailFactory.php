<?php
namespace Mail;
use \Exception;
/**
 * Método abstracto AbstractMailFactory basado en el patron de fabrica para correo
 * @abstract
 * @package Mail
 * @uses \Exception Clase Exception de php
 * @author Angel Barrientos <angel@pangostores.com>
 */
abstract class AbstractMailFactory {
    public abstract function sendMail($correo, $asunto, $mensaje, $filePath = NULL, $fileName = NULL);
    public abstract function configSMTP($withAuth);
    public abstract function addFile($pathFile, $name);
    public abstract function addAdreess($correo, $name = null);
    /**
     * 
     * @param string $mail "info", "prueba", "newsletter"
     * @return \Mail\PruebaMailFactory|\Mail\InfoMailFactory|\Mail\NewsletterFactory
     */
    public static function getMailFactory($mail){
        switch ($mail) {
            case 'prueba':
                return new \Mail\PruebaMailFactory();
                break;
            case 'info':
                return new \Mail\InfoMailFactory();
                break;
            case 'newsletter':
                return new \Mail\NewsletterFactory();
                break;
            default:
                break;
        }
    }
}
?>
