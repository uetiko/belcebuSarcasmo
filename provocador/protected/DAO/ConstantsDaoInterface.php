<?php
namespace DAO;

/**
 * clase asbtracta para definir variables y algun método que sea común en las 
 * clases DAO.
 * @package DAO
 * @abstract
 * @author Ange Barrientos <angel@pengostores.com>
 */
abstract class ConstantsDaoInterface {

    public static $SUCCESS = "success";
    public static $FAIL = "fail";
}
?>