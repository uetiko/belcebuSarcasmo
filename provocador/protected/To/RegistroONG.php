<?php
/**
 * Clase bean serializable para el paso de parametros
 * @package TO
 * @author Angel Barrientos <angel@pengostores.com>
 */
namespace To;

class To_RegistroONG {

    private $datos = array();

    public function __construct(array $datos) {
        $this->datos = $datos;
    }

    public function getNombreOng() {
        return $this->datos['nombreOng'];
    }

    public function setNombreOng($nombreOng) {
        $this->datos['nombreOng'] = $nombreOng;
    }

    public function getKeywords() {
        return $this->datos['keywords'];
    }

    public function setKeywords($keywords) {
        $this->datos['keywords'] = $keywords;
    }

    public function getFundacionAnnio() {
        return $this->datos['fundacionAnnio'];
    }

    public function setFundacionAnnio($fundacionAnnio) {
        $this->datos['fundacionAnnio'] = $fundacionAnnio;
    }

    public function getMision() {
        return $this->datos['mision'];
    }

    public function setMision($mision) {
        $this->datos['mision'] = $mision;
    }

    public function getVision() {
        return $this->datos['vision'];
    }

    public function setVision($vision) {
        $this->datos['vision'] = $vision;
    }

    public function getObjetivo() {
        return $this->datos['objetivo'];
    }

    public function setObjetivo($objetivo) {
        $this->datos['objetivo'] = $objetivo;
    }

    public function getValor() {
        return $this->datos['valor'];
    }

    public function setValor($valor) {
        $this->datos['valor'] = $valor;
    }

    public function getDescripcionONG() {
        return $this->datos['descripcionONG'];
    }

    public function setDescripcionONG($descripcionONG) {
        $this->datos['descripcionONG'] = $descripcionONG;
    }

    public function getPremiosReconocimientos() {
        return $this->datos['premiosReconocimientos'];
    }

    public function setPremiosReconocimientos($premiosReconocimientos) {
        $this->datos['premiosReconocimientos'] = $premiosReconocimientos;
    }

    public function getGenerosSubgeneros() {
        return $this->datos['generosSubgeneros'];
    }

    public function setGenerosSubgeneros($generosSubgeneros) {
        $this->datos['generosSubgeneros'] = $generosSubgeneros;
    }

    public function getServiciosProporcionados() {
        return $this->datos['serviciosProporcionados'];
    }

    public function setServiciosProporcionados($serviciosProporcionados) {
        $this->datos['serviciosProporcionados'] = $serviciosProporcionados;
    }

    public function getDestinatarios() {
        return $this->datos['destinatarios'];
    }

    public function setDestinatarios($destinatarios) {
        $this->datos['destinatarios'] = $destinatarios;
    }

    public function getCobertura() {
        return $this->datos['cobertura'];
    }

    public function setCobertura($cobertura) {
        $this->datos['cobertura'] = $cobertura;
    }

    public function getRazonLegal() {
        return $this->datos['razonLegal'];
    }

    public function setRazonLegal($razonLegal) {
        $this->datos['razonLegal'] = $razonLegal;
    }

    public function getRfc() {
        return $this->datos['rfc'];
    }

    public function setRfc($rfc) {
        $this->datos['rfc'] = $rfc;
    }

    public function getDonataria() {
        return $this->datos['donataria'];
    }

    public function setDonataria($donataria) {
        $this->datos['donataria'] = $donataria;
    }

    public function getCluni() {
        return $this->datos['cluni'];
    }

    public function setCluni($cluni) {
        $this->datos['cluni'] = $cluni;
    }

    public function getFiguraLegal() {
        return $this->datos['figuraLegal'];
    }

    public function setFiguraLegal($figuraLegal) {
        $this->datos['figuraLegal'] = $figuraLegal;
    }

    public function getNumeroEmpleados() {
        return $this->datos['numeroEmpleados'];
    }

    public function setNumeroEmpleados($numeroEmpleados) {
        $this->datos['numeroEmpleados'] = $numeroEmpleados;
    }

    public function getNumeroVoluntarios() {
        return $this->datos['numeroVoluntarios'];
    }

    public function setNumeroVoluntarios($numeroVoluntarios) {
        $this->datos['numeroVoluntarios'] = $numeroVoluntarios;
    }

    public function setFile($file) {
        $this->datos['file'] = $file;
    }

    public function getFile() {
        return $this->datos['file'];
    }

    public function getCompany() {
        return $this->datos['company'];
    }

    public function setCompany($company) {
        $this->datos['company'] = $company;
    }

    public function setNameIt($nameIt) {
        $this->datos['nameIt'] = $nameIt;
    }

    public function getNameIt() {
        return $this->datos['nameIt'];
    }

    public function getCalle() {
        return $this->datos['calle'];
    }

    public function setCalle($calle) {
        $this->datos['calle'] = $calle;
    }

    public function getNumero() {
        return $this->datos['numero'];
    }

    public function setNumero($numero) {
        $this->datos['numero'] = $numero;
    }

    public function getColonia() {
        return $this->datos['colonia'];
    }

    public function setColonia($colonia) {
        $this->datos['colonia'] = $colonia;
    }

    public function getCodigoPortal() {
        return $this->datos['CodigoPortal'];
    }

    public function setCodigoPortal($CodigoPortal) {
        $this->datos['CodigoPortal'] = $CodigoPortal;
    }

    public function getDelegacion() {
        return $this->datos['delegacion'];
    }

    public function setDelegacion($delegacion) {
        $this->datos['delegacion'] = $delegacion;
    }

    public function getEstado() {
        return $this->datos['estado'];
    }

    public function setEstado($estado) {
        $this->datos['estado'] = $estado;
    }

    public function getTelefono() {
        return $this->datos['telefono'];
    }

    public function setTelefono($telefono) {
        $this->datos['telefono'] = $telefono;
    }

    public function getMunicipio() {
        return $this->datos['municipio'];
    }

    public function setMunicipio($municipio) {
        $this->datos['municipio'] = $municipio;
    }

    public function getCallCenter() {
        return $this->datos['callCenter'];
    }

    public function setCallCenter($callCenter) {
        $this->datos['callCenter'] = $callCenter;
    }

    public function getTelefono2() {
        return $this->datos['telefono2'];
    }

    public function setTelefono2($telefono2) {
        $this->datos['telefono2'] = $telefono2;
    }

    public function getTelefono3() {
        return $this->datos['telefono3'];
    }

    public function setTelefono3($telefono3) {
        $this->datos['telefono3'] = $telefono3;
    }

    public function getFax() {
        return $this->datos['fax'];
    }

    public function setFax($fax) {
        $this->datos['fax'] = $fax;
    }

    public function getEmail() {
        return $this->datos['email'];
    }

    public function setEmail($email) {
        $this->datos['email'] = $email;
    }

    public function getEmail2() {
        return $this->datos['email2'];
    }

    public function setEmail2($email2) {
        $this->datos['email2'] = $email2;
    }

    public function getEmail3() {
        return $this->datos['email3'];
    }

    public function setEmail3($email3) {
        $this->datos['email3'] = $email3;
    }

    public function getWebSite() {
        return $this->datos['webSite'];
    }

    public function setWebSite($webSite) {
        $this->datos['webSite'] = $webSite;
    }

    public function getWebSite2() {
        return $this->datos['webSite2'];
    }

    public function setWebSite2($webSite2) {
        $this->datos['webSite2'] = $webSite2;
    }

    public function getTwitter() {
        return $this->datos['twitter'];
    }

    public function setTwitter($twitter) {
        $this->datos['twitter'] = $twitter;
    }

    public function getFacebook() {
        return $this->datos['facebook'];
    }

    public function setFacebook($facebook) {
        $this->datos['facebook'] = $facebook;
    }

    public function getYoutube() {
        return $this->datos['youtube'];
    }

    public function setYoutube($youtube) {
        $this->datos['youtube'] = $youtube;
    }

    public function getArray() {
        return $this->datos;
    }

}

?>