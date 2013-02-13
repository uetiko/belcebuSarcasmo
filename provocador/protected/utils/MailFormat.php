<?php
namespace utils;

/**
 * MailFormat es una clase estatica para el formateo de mensajes de los correos que semandan
 * @package utils
 * @author Angel Barrientos <angel@pengostores.com>
 */
class MailFormat extends \utils\interfaces\MailFormatInterface{
    /**
     * Pone el nombre y el apellido al mensaje deseado
     * @param string $body
     * @param string $nombre
     * @param string $apellido
     * @return string
     */
    public static function bodyFormat($body, $nombre, $apellido) {
        return ereg_replace(self::$NOMBRE, $nombre, ereg_replace(self::$APELLIDO, $apellido, $body));
    }
    /**
     * 
     * @param string $subjet
     * @param string $nombre
     * @param string $apellido
     * @return string
     */
    public static function subjetFormat($subjet, $nombre, $apellido = NULL) {
        return ereg_replace(self::$NOMBRE, $nombre, $subjet);
    }
    /**
     * pone el nombre, apellio y password al mensaje predeterminado
     * @param string $body
     * @param string $nombre
     * @param string $apellido
     * @param string $password
     * @return string
     */
    public static function bodyNewPassword($body, $nombre, $apellido, $password){
        return eregi_replace(self::$NOMBRE, $nombre, eregi_replace(self::$APELLIDO, $apellido, eregi_replace(self::$PASSWORD, $password, $body)));
    }
}

?>
