<?php
namespace utils;

/**
 * MailFormat es una clase estatica para el formateo de mensajes de los correos que semandan
 * @package utils
 * @author Angel Barrientos <uetiko@gmail.com>
 */
abstract class MailFormat extends \utils\interfaces\MailFormatInterface{
    /**
   This site provides a collection of schemas, i.e., html tags, that webmasters can use to markup their pages in ways recognized by major search providers. Search engines including Bing, Google, Yahoo! and Yandex rely on this markup to improve the display of search results, making it easier for people to find the right web pages.
Many sites are generated from structured data, which is often stored in databases. When this data is formatted into HTML, it becomes very difficult to recover the original structured data. Many applications, especially search engines, can benefit greatly from direct access to this structured data. On-page markup enables search engines to understand the information on web pages and provide richer search results in order to make it easier for users to find relevant information on the web. Markup can also enable new tools and applications that make use of the structure.
A shared markup vocabulary makes it easier for webmasters to decide on a markup schema and get the maximum benefit for their efforts. So, in the spirit of sitemaps.org, search engines have come together to provide a shared collection of schemas that webmasters can use.  * Pone el nombre y el apellido al mensaje deseado
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
