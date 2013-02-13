<?php
namespace utils\interfaces;

/**
 * interface con firma de funciones estaticas para ser implementadas en las
 * clases que implementen.
 * @package utils\interefaces
 * @author Angel Barrientos <uetiko@gmail.com>
 */
interface JJInterface {

    public static function parseArrayToBean(array $params, $className);
    public static function parseBeanToArray($bean, $class);
    public static function createToken();
    public static function createGenericsKey();
}

?>
