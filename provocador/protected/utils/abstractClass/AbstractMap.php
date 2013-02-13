<?php
namespace utils\abstractClass;
/**
 * Description of AbstractMap
 *
 * @author Angel Barrientos <uetiko@gmail.com>
 * @access public
 * @license http://www.gnu.org/licenses/gpl.html LGP
 */
abstract class AbstractMap implements \utils\interfaces\Map{
    protected $map;
    protected function __construct() {
        $this->map = array();
    }
    /**
     * Remueve todos los elementos del array asociativo.
     * @return void 
     */
    public function clear(){
        unset($this->map);
        $this->map = array();
    }
    /**
     * Verifica si existe una clave en la colección clave valor.
     * @param <K> $key clave el el array asociativo. 
     */
    public function containsKey($key){
        $result = FALSE;
        foreach ($this->map as $Key => $value) {
            if($Key === $Key){
                $result = TRUE;
                break;
            }
        }
        return $result;
    }
    /**
     * Comprueba si un valor se encuentra dentro del mapa de hash
     * @param <V> $value
     * @return boolean
     */
    public function containsValue($value){
        $result = FALSE;
        foreach ($this->map as $Value) {
            if($Value === $value){
                $result = TRUE;
                break;
            }
        }
        return $result;
    }
    /**
     * Regresa el valor asociado a una clave.
     * @param type $key
     * @return type
     */
    public function get($key){
        return $this->map[$key];
    }
    /**
     * Regresa un hash en sha1 de la colección que contiene.
     * @return string
     */
    public function hashCode(){
        return sha1(serialize($this->map));
    }
    /**
     * Regresa un arreglo con todas las claves del hash.
     * @return array<K>
     */
    public function keySet(){
        return array_keys($this->map);
    }
    /**
     * Verifia si el hash esta vacio.
     * @return boolean regresa true si esta vacio.
     */
    public function isEmpty(){
        if(count($this->map) == 0){
            return TRUE;
        }else{
            return FALSE;
        }
    }
    /**
     * Inserta una nueva posición 
     * @param <K> $key clave
     * @param <V> $value valor
     * @return boolean
     */
    public function put($key, $value){
        $this->map[$key] = $value;
        return TRUE;
    }
    /**
     * Inserta un arreglo relacional en el hash.
     * @param array $HashMap
     */
    public function putAll(array $HashMap){
        foreach ($HashMap as $key => $value) {
            $this->put($key, $value);
        }
    }
    /**
     * Regresa el valor asociado con la clave y lo elimina del hash.
     * @param <K> $key
     * @return <V>
     */
    public function remove($key){
        $value = $this->get($key);
        unset($this->map[$key]);
        return $value;
    }
    /**
     * Regresa el tamaño del hash
     * @return int
     */
    public function size(){
        return count($this->map);
    }
    /**
     * Regresa un arreglo con todos los valores del hash.
     * @return array Regresa un arreglo con todos los valores del hash.
     */
    public function values(){
        $collection = array();
        foreach ($this->map as $value) {
            array_push($collection, $value);
        }
        return $collection;
    }
}

?>
