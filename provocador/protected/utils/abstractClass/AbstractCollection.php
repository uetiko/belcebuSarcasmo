<?php
namespace utils\abstractClass;
/**
 * La clase AbstractList implementa la interface Collection para envolver a un 
 * array en un objeto y darle metodos comunes para operaciones con el mismo.
 *
 * Esta clase esta inspirada en la clase abstracta de java.
 * 
 * @author Angel Barrientos <uetiko@gmail.com>
 * @package utils\abstractClass
 * @access public
 * @license http://www.gnu.org/licenses/gpl.html LGP
 */
abstract class AbstractCollection implements \utils\interfaces\Collection{
    protected $collection = NULL;
    protected function __construct() {
        $this->collection = array();
    }
    /**
     * 
     * @param E $element
     * @return boolean
     */
    public function add($element) {
        array_push($this->collection, $element);
        return TRUE;
    }
    /**
     * 
     * @param array $collection
     * @return boolean
     */
    public function addAll(array $collection) {
        for ($index = 0; $index < count($collection); $index++) {
            $this->add($collection[$index]);
        }
        return TRUE;
    }
    /**
     * 
     * @param type $element
     * @return boolean
     */
    public function contains($element) {
        $result = FALSE;
        for ($index = 0; $index < count($this->collection); $index++) {
            if($this->collection[$index] == $element){
                $result = TRUE;
                break;
            }
        }
        return $result;
    }
    /**
     * No implementado aún.
     * @param type $element
     */
    public function equals($element) {
    }
    /**
     * 
     * @return int regresa un hash sha1 de la colección existente.
     */
    public function hashCode() {
        return sha1(serialize($this->collection));
    }
    /**
     * comprueba si la colección esta vacia.
     * @return boolean Regresa TRUE si esta vacia.
     */
    public function isEmpty() {
        if(count($this->collection) <= 0){
            return TRUE;
        }else{
            return FALSE;
        }
    }
    /**
     * Remueve un elemento de la colección.
     * @param E $element
     */
    public function remove($element) {
        for ($index = 0; $index < count($this->collection); $index++) {
            if($this->collection[$index] == $element){
                unset($this->collection[$index]);
                break;
            }
        }
    }
    /**
     * Remueve todos los elementos de la colección que se le pasan por medio de un array
     * @param array $collection
     */
    public function removeAll(array $collection) {
        for ($index = 0; $index < count($collection); $index++) {
            for ($index1 = 0; $index1 < count($this->collection); $index1++) {
                if($this->collection[$index1] == $collection[$index]){
                    unset($this->collection[$index1]);
                }
            }
        }
    }
    /**
     * regresa el tamaño de la colección.
     * @return int
     */
    public function size() {
        return count($this->collection);
    }
    /**
     * Regresa un array con los elementos de la colección.
     * @return array
     */
    public function toArray() {
        return $this->collection;
    }
    /**
     * Remueve todos los elementos de una colección
     * @return void 
     */
    public function clear(){
        unset($this->collection);
        $this->collection = array();
    }
}
?>
