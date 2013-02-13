<?php
namespace Config;

 /**
 * Clase de configuración basica para envío de
 * correo electrónico por medio del protocolo
 * SMTP
 * @package Config
 * @author Angel Barrientos uetiko <at> gmail <dot> com
 * @copyright 2012
 * @license http://www.gnu.org/copyleft/lesser.html Distributed under the Lesser General Public License (LGPL)
 * @version 0.1
 */
class config_MailConfig {

    private $properties = NULL;
    private static $INSTANCE = NULL;
    /**
     * @access private
     * @method private void __construct() Método constructor.
     */
    private function __construct() {
        $this->properties = \spyc\Spyc::YAMLLoad(realpath(__DIR__ .'/../resources/MailConfig.yml'));
    }
    /**
     * @access public
     * @method public \Config\MailConfig getMailConfig() Método singleton que regresa una instancia de la clase
     * @return Object \Config\MailConfig
     */
    public static function getInstance() {
        if(self::$INSTANCE instanceof \Config\config_MailConfig){
            return self::$INSTANCE;
        }else{
            return self::$INSTANCE = new \Config\config_MailConfig();
        }
    }
    /**
     * @access public
     * @method public string getUsuarioPrueba() Método que regresa el nombre de usuario
     * @return string nombre de usuario
     */
    public function getUsuarioPrueba() {
        return $this->properties['correo']['prueba']['usuario'];
    }
    /**
     * 
     * @method public string getUsuarioInfo(void)
     * @return sting
     */
    public function getUsuarioInfo(){
        return $this->properties['correo']['info']['usuario'];
    }
    /**
     * 
     * @method public string getUsuarioNewsletter(void)
     * @return sting
     */
    public function getUsuarioNewsletter(){
        return $this->properties['correo']['newsletter']['usuario'];
    }

    /**
     * @access public
     * @return string
     * @method string getPassword(void) Regresa el password del correo
     */
    public function getPasswordPrueba() {
        return $this->properties['correo']['prueba']['password'];
    }
    
    public function getPasswordInfo(){
        return $this->properties['correo']['info']['password'];
    }
    
    public function getPasswordNewsletter(){
        return $this->properties['correo']['newsletter']['password'];
    }

    /**
     * @access public 
     * @return string 
     * @method string getCorreo(void) regresa el string del correo
     */
    public function getCorreoPrueba() {
        return $this->properties['correo']['prueba']['correo'];
    }
    
    public function getCorreoInfo() {
        return $this->properties['correo']['info']['correo'];
    }
    
    public function getCorreoNewsletter() {
        return $this->properties['correo']['newsletter']['correo'];
    }

    /**
     * @access public 
     * @method string getEmisor(void)
     * @return string regresa el nombre del emisor del correo electronico
     */
    public function getEmisorPrueba() {
        return $this->properties['correo']['prueba']['nombre'];
    }
    
    public function getEmisorInfo() {
        return $this->properties['correo']['info']['nombre'];
    }
    
    public function getEmisorNewsletter() {
        return $this->properties['correo']['newsletter']['nombre'];
    }

    /**
     * @access public 
     * @method string getSMTPConfig(void)
     * @return string regresa un arreglo con la configuración del smtp
     */
    public function getSMTPConfig() {
        return $this->properties['smtp'];
    }

    /**
     * @access public 
     * @return array regresa una matriz con la configuración de la cuenta de correo electronico.
     */
    public function getProperties() {
        return $this->properties;
    }

    /**
     * Regresa el servidor SMTP
     * @access public 
     * @return SMTPServer direccion
     */
    public function getSmtpServer() {
        return $this->properties['smtp']['server'];
    }

    /**
     * Regresa un booleano para la autentificacion
     * @access public 
     * @return true
     */
    public function getAuth() {
        return $this->properties['smtp']['SMTPAuth'];
    }

    /**
     * Regresa un false para indicar que no hay 
     * autentificacion
     * @access public 
     * @return false
     */
    public function getNoAuth() {
        return $this->properties['smtp']['NoSMTPAuth'];
    }

    /**
     * @access public 
     * @return string Puerto del smtp
     */
    public function getPuerto() {
        return $this->properties['smtp']['puerto'];
    }

    /**
     * @access public
     * @return string seguridad del smtp
     */
    public function getSMTPSecure() {
        return $this->properties['smtp']['SMTPSecure'];
    }

    /**
     * @access public 
     * @return string asunto
     */
    public function getAsunto() {
        return $this->properties['mensaje']['asunto'];
    }

    public function getMensaje() {
        return $this->properties['mensaje']['cuerpo'];
    }

    public function getMensajeInfoRegistro(){
        return $this->properties['mensaje']['info']['registro']['mensaje'];
    }
    
    public function getAsuntoInfoRegistro(){
        return $this->properties['mensaje']['info']['registro']['asunto'];
    }
    
    public function getAsuntoMensajeRegistro(){
        return $this->properties['mensaje']['info']['registro']['usuario']['asunto'];
    }
    
    public function getBodyMensajeRegistro(){
        return $this->properties['mensaje']['info']['registro']['usuario']['mensaje'];
    }
    
    public function getAsuntoNuevoPassword(){
        return $this->properties['mensaje']['info']['recuperacion']['usuario']['asunto'];
    }
    
    public function getBodyNuevoPassword(){
        return $this->properties['mensaje']['info']['recuperacion']['usuario']['mensaje'];
    }
}
?>
