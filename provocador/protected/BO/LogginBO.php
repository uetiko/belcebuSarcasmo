<?php
namespace BO;

/**
 * Clase que se encarga de la lógica o reglas de negocio.
 * @package BO
 * @author Angel Barrientos <angel@pengostores.com>
 */
class LogginBO {
    private static $SUCCESS = TRUE;
    private static $FAIL = FALSE;
    private $logger;

    /**
     * Método constructor, el cual se encarga de inicializar el logger para el
     * seguimiento de errores y alguna otra información}
     * @access public
     * @return void 
     */
    public function __construct() {
        $this->logger = \utils\JJLogger::InstanceOfJJLogger();
    }

    /**
     * Este metodo se encarga de sacar el hash sha1 del password para que
     * pueda ser comparada con la base.
     * @param \To\ToUsuario $toUsuario 
     * @return array 
     */
    public function loginBO(\To\ToUsuario $toUsuario) {
        $result = new \utils\HashMap();
        $dao = new \DAO\LogginDAO();
        $to = new \To\ToLogin();
        $toUsuario->setToken($token = \utils\utils_JJUtils::createGenericsKey());
        $toUsuario->setPassword(sha1($toUsuario->getPassword()));
        $to->setToUsuario($toUsuario);
        $to->setStatus($dao->login($to));
        $this->logger->querys(strcmp($to->getStatus(), "success"), "valor regresado en el TO");
        if (strcmp($to->getStatus(), "success") == 0) {
            $result->put("success", self::$SUCCESS);
            $result->put("token", $to->getToUsuario()->getToken);
            $result->put("usr", $to->getToUsuario()->getUsuario());
        } else {
            $result->put("success", self::$FAIL);
            $result->put("msg", 'La combinación de Usuario / email y contraseña son incorrectas, por favor revísalo e inténtalo de nuevo');
        }
        
        return $result->toArray();
    }
    /**
     * Método que se encarga de la logica de la recuperación de la contraseña del usuario
     * @access public
     * @param \To\ToUsuario $usuario
     * @return array Regresa un array con el estado de la petición y un mensaje relacionado al status.
     */
    public function recuperaPassword(\To\ToUsuario $usuario) {
        $result = new \utils\HashMap();
        $dao = new \DAO\LogginDAO();
        $user = new \Dto\Dto_UsuarioDatos();
        $user = $dao->getUserDataForMail($usuario);
        if ($user !== "fail") {
            $password = \utils\utils_JJUtils::createshortToken();
            $usuario->setPassword(sha1($password));
            if ($dao->changePassword($usuario)) {
                $mail = new \Mail\MailClass("info", "nuevoPassword");
                if($mail->enviaCorreoGenerico($user->getMail(), $user->getNombre(), $user->getApellido(), $password)){
                    $result->put("success", self::$SUCCESS);
                    $result->put("msg", 'Se ha mandado su nueva contraseña a su correo electronico.');
                }else{
                    $result->put("success", self::$FAIL);
                    $result->put("msg", 'No se pudo completar su petición.');
                }
            }
        } else {
            $result->put("success", self::$FAIL);
            $result->put("msg", 'No esta registrado el correo electronico a una cuenta.');
        }
        return $result->toArray();
    }

    /**
     * Método que se encarga de la logica del negocio para el cambio de contraseñas de los usuarios
     * @param \To\ToUsuario $toUsuario
     */
    public function cambiaPassword(\To\ToUsuario $toUsuario) {
        $result = new \utils\HashMap();
        $dao = new \DAO\LogginDAO();
        $toUsuario->setPassword(sha1($toUsuario->getPassword()));
        if ($dao->changePassword($toUsuario)) {
            $result->put("success", self::$SUCCESS);
            $result->put("msg", 'Se ha guardado su contraseña exitosamente.');
        } else {
            $result->put("success", self::$FAIL);
            $result->put("msg", 'No se pudo guardar su contraseña, vuela a intentarlo.');
        }
        return $result->toArray();
    }
    
    public function validaToken(\To\ToLogin $toLogin){
        $result = new \utils\HashMap();
        $dao = new \DAO\LogginDAO();
        $toLogin = $dao->validaToken($toLogin);
        if($toLogin->getStatus() !== 'success'){
            $result->put("success", self::$FAIL);
        }else{
            $result->put("success", self::$SUCCESS);
        }
        return $result->toArray();
    }
    
    public function usuarioToken(\To\ToUsuario $user){
        $dao = new \DAO\LogginDAO();
        return array('msg' => $dao->validaToken($user));
    }
}
?>