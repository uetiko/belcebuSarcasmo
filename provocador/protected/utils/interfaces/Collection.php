<?php
namespace utils\interfaces;
/**
 * Interface de collecciones. <Inspirado en java>
 * @author Angel Barrientos <uetiko@gmail.com>
 * @access public
 * @license http://www.gnu.org/licenses/gpl.html LGP
 */
interface Collection {
    /**
     * Agrega un elemento a la colección
     * @param mixted $element
     * @return boolean 
     */
    public function add($element);
    /**
     * Agrega un array a la colección.
     * @param array $collection
     */
    public function addAll(array $collection);

    /**
     * @return boolean Retorna verdadero si la colección contiene al elemento.
     * @param mixted $element Elemento que se desea buscar en la colección.
     */
    public function contains($element);
    /**
     * 
     * @param type $element
     */
    public function equals($element);
    /**
     * 
     */
    public function hashCode();
    /**
     * 
     */
    public function isEmpty();
    /**
     * 
     * @param type $element
     */
    public function remove($element);
    /**
     * 
     */
    public function removeAll(array $collection);
    /**
     * 
     */
    public function size();
    /**
     * 
     */
    public function toArray();
}

?>
