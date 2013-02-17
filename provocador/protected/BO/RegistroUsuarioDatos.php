<?php
namespace BO;
use \Exception;

/**
 * Clase que incorpora la lógica del negocio o las reglas de negocio
 * @package BO
 * @author Angel Barrientos <uetiko@gmail.com> 
 */
class RegistroUsuarioDatos {

    private $logger;
    private $dao;
    private static $ERR_INSERT = "Error al insertar usuarios";

    /**
     * 
     */
    public function __construct() {
        $this->logger = \utils\JJLogger::InstanceOfJJLogger("error_log", "note_log", "query_log", "logs");
        $this->dao = new \DAO\DAO_RegistroDAO();
    }

    /**
     * Método que contiene las reglas de negocio del registro de usuario
     * @param \To\To_Registro $registro
     * @return array
     */
    public function registraUsuario(\To\To_Registro $registro) {
        $arrayResult = new \utils\HashMap();
        $result = new \utils\HashMap();
        $usuario = new \Dto\Dto_Usuario();
        $datosUsuario = new \Dto\Dto_UsuarioDatos();
        $usuario->setUserName($registro->getUsuario());
        $usuario->setPassword(sha1($registro->getPassword()));
        $datosUsuario->setNombre($registro->getNombre());
        $datosUsuario->setApellido($registro->getApellidos());
        $datosUsuario->setFecNacimiento(new \DateTime(str_replace("/", "-", $registro->getFechNacimiento())));
        $datosUsuario->setMail($registro->getEmial());
        $arrayResult = $this->dao->registraUsuario($usuario, $datosUsuario, $registro->getGenero());
        $result->put('status', $arrayResult->get('status'));
        if ($arrayResult->get('status') == 'success') {
            $mail = new \Mail\MailClass("info");
            if ($mail->enviaCorreoGenerico($datosUsuario->getMail(), $datosUsuario->getNombre(), $datosUsuario->getApellido())) {
                $result->put('msg', "Ha sido registrado exitosamente {$datosUsuario->getNombre()} {$datosUsuario->getApellido()}");
            } else {
                $result->put('msg', "Ha sido registrado exitosamente {$user->getNombre()} {$user->getApellido()}, el correo fallo");
            }
        } else {
            $result->put('msg', 'No se pudo completar su registro, favor de cominicarse con el Administrador del sistema');
        }
        return $result->toArray();
    }

    /**
     * Método con las reglas de negocio para el registro de ONG's
     * @param \To\To_Registro $registro
     * @param int $idUsuario
     * @return array
     */
    public function registraONG(\To\To_Registro $registro, $idUsuario) {
        $ong = new \Dto\Dto_Informacion();
        $arrayResult = array();
        $ong->setFundationName($registro->getNombreOng());
        $ong->setAnnioFundacion($registro->getFundacionAnnio());
        $ong->setMetaTags($registro->getKeywords());
        $ong->setFiles($registro->getFile());
        $ong->setMision($registro->getMision());
        $ong->setVision($registro->getVision());
        $ong->setObjetivo($registro->getObjetivo());
        $ong->setValores($registro->getValor());
        $ong->setDescripcion($registro->getDescripcionONG());
        $ong->setReconocimientos($registro->getPremiosReconocimientos());
        if ($registro->getCompany()) {
            $ong->setNameit($registro->getNameIt());
        }
        $ong->setCompany($registro->getCompany());
        $ong->setSubgeneres($registro->getGenerosSubgeneros());
        $ong->setServicios($registro->getServiciosProporcionados());
        $ong->setDestinatarios($registro->getDestinatarios());
        $ong->setCobertura($registro->getCobertura());
        $ong->setRazonLegal($registro->getRazonLegal());
        $ong->setRfc($registro->getRfc());
        $ong->setDonatariaAutorizada($registro->getDonataria());
        $ong->setCluni($registro->getCluni());
        $ong->setNumberEmployeers($registro->getNumeroEmpleados());
        $ong->setNumberVolunteers($registro->getNumeroVoluntarios());
        if ($this->dao->registraONG($ong, $idUsuario) == "success") {
            return array("success" => "success", "Se ha guardado la informacion con éxito");
        } else {
            return array("success" => "fail", "Se ha produccido un error");
        }
    }
    
    public function validaNombreUsuario($usuario){
        $dao = new \DAO\ConsultasDAO();
        return array('success' => $dao->checaNombreUsuario($usuario));
    }
}
?>
