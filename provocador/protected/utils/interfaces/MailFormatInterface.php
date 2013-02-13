<?php
namespace utils\interfaces;
/**
 * MailFormat es una clase estatica para el formateo de mensajes de los correos que semandan
 * @package utils
 * @subpackage interfaces
 * @author Angel Barrientos <angel@pengostores.com>
 */
abstract class MailFormatInterface {
    public static $NOMBRE = "{nombre}";
    public static $APELLIDO = "{apellido}";
    public static $LINK = "{link}";
    public static $PASSWORD = "{password}";

    abstract public static function subjetFormat($subjet, $nombre, $apellido);
    abstract public static function bodyFormat($body, $nombre, $apellido);
}

?>
