<?php
namespace utils\interfaces;
/**
 *
 * @author Angel Barrientos <uetiko@gmail.com>
 * @access public
 * @license http://www.gnu.org/licenses/gpl.html LGP
 */
interface Map {
    public function clear();
    public function containsKey($key);
    public function containsValue($value);
    public function get($key);
    public function hashCode();
    public function keySet();
    public function isEmpty();
    public function put($key, $value);
    public function putAll(array $HashMap);
    public function remove($key);
    public function size();
    public function values();
}

?>
