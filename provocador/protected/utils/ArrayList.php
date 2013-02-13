<?php
namespace utils;
/**
 * Clase ArrayList es un wrapper inspirado en la clase ArrayList de java
 * el cual pretende ser un wrapper para las distintas operaciones con arrays en
 * php y facilitar su uso y desarrollo.
 *
 * @author Angel Barrientos <uetiko@gmail.com>
 * @access public
 * @license http://www.gnu.org/licenses/gpl.html LGP
 */
class ArrayList extends \utils\abstractClass\AbstractCollection{
    public function __construct() {
        parent::__construct();
    }
    /**
     * 
     * @param int $index La posición de la lista.
     * @return <E> Regresa el elemento de una posición especifica en la lista.
     */
    public function get($index){
        return $this->collection[$index];
    }
    /**
     * 
     * @param <E> $element Elemento en la lista.
     * @return int Regresa la posición en la lista del elemento indicado.
     */
    public function indexOf($element){
        $result = 0;
        for ($index = 0; $index < count($array); $index++) {
            if($this->collection[$index] == $element){
                $result = $index;
                break;
            }
        }
        return $result;
    }
    /**
     * Regresa un elemento de la lista y lo remueve de la misma.
     * @param int $index
     * @return <E>
     */
    public function getAndRemove($index){
        $element = $this->collection[$index];
        unset($this->collection[$index]);
        return $element;
    }
    /**
     * Devuelve un subarray del array contenido en el objeto desde la posición n 
     * hasta otra n posición.
     * @param int $initIndex
     * @param int $endIndex
     * @return array
     */
    public function subList($initIndex, $endIndex){
        $subList = array();
        for ($index = $initIndex; $index = $endIndex; $index++) {
            array_push($subList, $this->collection[$index]);
        }
        return $subList;
    }
}
?>
