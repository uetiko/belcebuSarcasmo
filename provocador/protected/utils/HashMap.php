<?php
namespace utils;
/**
 * Clase HashMap, pretende envolver a los arrays asociativos para un manejo de
 * mas simple. Esta clase ha sido inspirada en la clase HashMap de java.
 *
 * @package utils
 * @author Angel Barrientos <uetiko@gmail.com>
 * @access public
 * @license http://www.gnu.org/licenses/gpl.html LGP
 */
class HashMap extends \utils\abstractClass\AbstractMap{
    public function __construct() {
        parent::__construct();
    }
    /**
     * Regresa un array.
     * @return array
     */
    public function toArray(){
        return $this->map;
    }
}

?>
