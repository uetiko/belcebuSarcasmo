<?php
namespace Dto;
/**
 * Entidad para guardar la información de la ong ligada a la tabla tbl_informacion.
 * @package Dto
 * @author Angel Barrientos <angel@pengostores.com>
 * @Entity
 * @Table(name="tbl_informacion")
 */
class Dto_Informacion {
	/** @Id @GeneratedValue(strategy="AUTO")
	 * @Column(type="integer", name="id_informacion") */
	private $idInformacion;
	/**  @OneToOne(targetEntity="Dto_Profiles")
	 * @JoinColumn(name="id_profile", referencedColumnName="id_profile")*/
	private $Profile;
	/** 
	 * @Column(type="string", name="nombre_fundacion") 
	 **/
	private $fundationName;
	/** 
	 * @Column(type="string", name="files") 
	 **/
	private $files;
	/** 
	 * @Column(type="string", name="metatags", nullable=true) 
	 * */
	private $metaTags;
	/** 
	 * @Column(type="integer", name="fundacion_annio")
	 **/
	private $annioFundacion;
	/** 
	 * @Column(type="text", nullable=true) 
	 **/
	private $mision;
	/** 
	 * @Column(type="text", nullable=true)
	 **/
	private $vision;
	/** 
	 * @Column(type="text", nullable=true)
	 * */
	private $objetivo;
	/** 
	 * @Column(type="text", name="valores", nullable=true)
	 **/
	private $valores;
	/** 
	 * @Column(type="text", name="ong_descripcion", nullable=true)
	 **/
	private $descripcion;
	/** 
	 * @Column(type="text", name="reconocimientos_premios", nullable=true) 
	 **/
	private $reconocimientos;
	/** 
	 * @Column(type="boolean", name="compania") 
	 **/
	private $company;
	/** 
	 * @Column(type="string")
	 * */
	private $nameit;
	/** 
	 * @Column(type="text", name="generos_subgeneros") 
	 * */
	private $subgeneres;
	/** 
	 * @Column(type="text", name="servicios") 
	 * */
	private $servicios;
	/** 
	 * @Column(type="text", name="destinatarios") 
	 * */
	private $destinatarios;
	/** 
	 * @Column(type="text", name="cobertura")
	 * */
	private $cobertura;
	/** 
	 * @Column(type="string", name="razon_legal") 
	 * */
	private $razonLegal;
	/** 
	 * @Column(type="string", length=30) 
	 * */
	private $rfc;
	/** 
	 * @Column(type="boolean", name="donataria_autorizada")
	 * */
	private $donatariaAutorizada;
	/** 
	 * @Column(type="string", nullable=true, length=100)
	 * */
	private $cluni;
	/** 
	 * @Column(type="string", name="figura_legal", length=20)
	 * */
	private $figuraLegal;
	/** 
	 * @Column(type="string", name="numero_empleados", length=30)
	 * */
	private $numberEmployeers;
	/** 
         * @Column(type="string", name="numero_voluntarios", length=30  )
         */
	private $numberVolunteers;
	/** 
         * @Column(type="string", name="annual_income")
         */
	private $annualIncome;
	function __construct() {
            
	}
       
        public function getIdInformacion() {
            return $this->idInformacion;
        }

        public function getProfile() {
            return $this->Profile;
        }

        public function setProfile($Profile) {
            $this->Profile = $Profile;
        }

        public function getFundationName() {
            return $this->fundationName;
        }

        public function setFundationName($fundationName) {
            $this->fundationName = $fundationName;
        }

        public function getFiles() {
            return $this->files;
        }

        public function setFiles($files) {
            $this->files = $files;
        }

        public function getMetaTags() {
            return $this->metaTags;
        }

        public function setMetaTags($metaTags) {
            $this->metaTags = $metaTags;
        }

        public function getAnnioFundacion() {
            return $this->annioFundacion;
        }

        public function setAnnioFundacion($annioFundacion) {
            $this->annioFundacion = $annioFundacion;
        }

        public function getMision() {
            return $this->mision;
        }

        public function setMision($mision) {
            $this->mision = $mision;
        }

        public function getVision() {
            return $this->vision;
        }

        public function setVision($vision) {
            $this->vision = $vision;
        }

        public function getObjetivo() {
            return $this->objetivo;
        }

        public function setObjetivo($objetivo) {
            $this->objetivo = $objetivo;
        }

        public function getValores() {
            return $this->valores;
        }

        public function setValores($valores) {
            $this->valores = $valores;
        }

        public function getDescripcion() {
            return $this->descripcion;
        }

        public function setDescripcion($descripcion) {
            $this->descripcion = $descripcion;
        }

        public function getReconocimientos() {
            return $this->reconocimientos;
        }

        public function setReconocimientos($reconocimientos) {
            $this->reconocimientos = $reconocimientos;
        }

        public function getCompany() {
            return $this->company;
        }

        public function setCompany($company) {
            $this->company = $company;
        }

        public function getNameit() {
            return $this->nameit;
        }

        public function setNameit($nameit) {
            $this->nameit = $nameit;
        }

        public function getSubgeneres() {
            return $this->subgeneres;
        }

        public function setSubgeneres($subgeneres) {
            $this->subgeneres = $subgeneres;
        }

        public function getServicios() {
            return $this->servicios;
        }

        public function setServicios($servicios) {
            $this->servicios = $servicios;
        }

        public function getDestinatarios() {
            return $this->destinatarios;
        }

        public function setDestinatarios($destinatarios) {
            $this->destinatarios = $destinatarios;
        }

        public function getCobertura() {
            return $this->cobertura;
        }

        public function setCobertura($cobertura) {
            $this->cobertura = $cobertura;
        }

        public function getRazonLegal() {
            return $this->razonLegal;
        }

        public function setRazonLegal($razonLegal) {
            $this->razonLegal = $razonLegal;
        }

        public function getRfc() {
            return $this->rfc;
        }

        public function setRfc($rfc) {
            $this->rfc = $rfc;
        }

        public function getDonatariaAutorizada() {
            return $this->donatariaAutorizada;
        }

        public function setDonatariaAutorizada($donatariaAutorizada) {
            $this->donatariaAutorizada = $donatariaAutorizada;
        }

        public function getCluni() {
            return $this->cluni;
        }

        public function setCluni($cluni) {
            $this->cluni = $cluni;
        }

        public function getFiguraLegal() {
            return $this->figuraLegal;
        }

        public function setFiguraLegal($figuraLegal) {
            $this->figuraLegal = $figuraLegal;
        }

        public function getNumberEmployeers() {
            return $this->numberEmployeers;
        }

        public function setNumberEmployeers($numberEmployeers) {
            $this->numberEmployeers = $numberEmployeers;
        }

        public function getNumberVolunteers() {
            return $this->numberVolunteers;
        }

        public function setNumberVolunteers($numberVolunteers) {
            $this->numberVolunteers = $numberVolunteers;
        }

        public function getAnnualIncome() {
            return $this->annualIncome;
        }

        public function setAnnualIncome($annualIncome) {
            $this->annualIncome = $annualIncome;
        }
}
?>