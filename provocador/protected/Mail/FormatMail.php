<?php
/**
 * Description of FormatMail
 *
 * @author silent
 */
abstract class FormatMail {
    abstract public function subjetFormat($string);
    abstract public function bodyFormat($string);
}

?>
