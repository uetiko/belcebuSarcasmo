<?php
namespace Dto;
/**
 * @Entity
 * @table(name="tbl_profiles")
 */
class Dto_Profiles {
	/** @Id @GenerateValue(strategy="AUTO")
	 * @Column(type="integer", name="id_profile") */
	protected $idProfile;
	/** @Column(type="string", name="id_session") */
	protected $idSession;
	/** @Column(type="date") */
	protected $date;
	function __construct() {
		
	}
        public function getIdProfile() {
            return $this->idProfile;
        }

        public function setIdProfile($idProfile) {
            $this->idProfile = $idProfile;
        }

        public function getIdSession() {
            return $this->idSession;
        }

        public function setIdSession($idSession) {
            $this->idSession = $idSession;
        }

        public function getDate() {
            return $this->date;
        }

        public function setDate($date) {
            $this->date = $date;
        }

	
}

?>