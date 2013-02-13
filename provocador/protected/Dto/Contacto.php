<?php
namespace Dto;
/**
 * Entidad de contacto para ONG
 * @package Dto
 * @author Angel Barrientos <Angel@pengostores.com>
 * @Entity
 * @table(name="tbl_contacto")
 */
class Dto_Contacto {
	/** @Id @GeneratedValue(strategy="AUTO")
	 * @Column(type="integer", name="id_contacto")	 */
	private $idContacto;
	/**
	 * @OneToOne(targetEntity="Dto_Ong", mappedBy="tbl_concacto")
         * @JoinColumn(name="id_ong", referencedColumnName="id_ong")
	 */
	private $ong;
	/** 
         * @Column(type="string", name="main_phone", length=20)  
         */
	private $phone;
	/** 
         * @Column(type="string", name="call_center", length=25) 
         */
	private $callCenter;
	/** 
         * @Column(type="string", name="secundary_phone_one", length=20)
         */
	private $phone1;
	/** 
         * @Column(type="string", name="secundary_phone_two", length=20)
         */
	private $phone2;
	/** 
         * @Column(type="string", name="main_website", length=100)
         */
	private $web;
	/**
	 * @Column(type="string", name="secondary_site_one", length=100)
	 */
	private $web1;
	/**
	 * @Column(type="string", name="secondary_site_two", length=100)
	 */
	private $web2;
	/**
	 * @Column(type="string", name="email_principal", length=50)
	 */
	private $email;
        /**
         * @Column(type="string", name="email_secundario", length=50)
         */
        private $email2;
        /**
         * @Column(type="string", name="email_secundario2", length=50)
         */
        private $email3;
	/**
	 * @Column(type="string", length=20)
	 */
	private $fax;
	function __construct() {

	}
        
        public function getIdContacto() {
            return $this->idContacto;
        }

        public function getOng() {
            return $this->ong;
        }

        public function setOng($ong) {
            $this->ong = $ong;
        }

        public function getPhone() {
            return $this->phone;
        }

        public function setPhone($phone) {
            $this->phone = $phone;
        }

        public function getCallCenter() {
            return $this->callCenter;
        }

        public function setCallCenter($callCenter) {
            $this->callCenter = $callCenter;
        }

        public function getPhone1() {
            return $this->phone1;
        }

        public function setPhone1($phone1) {
            $this->phone1 = $phone1;
        }

        public function getPhone2() {
            return $this->phone2;
        }

        public function setPhone2($phone2) {
            $this->phone2 = $phone2;
        }

        public function getWeb() {
            return $this->web;
        }

        public function setWeb($web) {
            $this->web = $web;
        }

        public function getWeb1() {
            return $this->web1;
        }

        public function setWeb1($web1) {
            $this->web1 = $web1;
        }

        public function getWeb2() {
            return $this->web2;
        }

        public function setWeb2($web2) {
            $this->web2 = $web2;
        }

        public function getFax() {
            return $this->fax;
        }

        public function setFax($fax) {
            $this->fax = $fax;
        }
        
        public function getEmail() {
            return $this->email;
        }

        public function setEmail($email) {
            $this->email = $email;
        }

        public function getEmail2() {
            return $this->email2;
        }

        public function setEmail2($email2) {
            $this->email2 = $email2;
        }

        public function getEmail3() {
            return $this->email3;
        }

        public function setEmail3($email3) {
            $this->email3 = $email3;
        }
}
?>