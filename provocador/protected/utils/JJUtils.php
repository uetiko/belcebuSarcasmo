<?php
namespace utils;
use \Exception;
/**
 * Clase con funciones variadas para tareas comunes cono formateo de fechas, cadenas o parceos.
 * @package utils
 * @author Angel Barrientos <uetiko@gmail.com>
 */
abstract class utils_JJUtils implements \utils\interfaces\JJInterface{
    /**
     * funcion estatica que parsea un array a un bean TO determinado
     * @override
     * @param array $params
     * @param string $className
     * @return \To\{$className}
     */
    public static function parseArrayToBean(array $params, $className) {
        $class = "\To\\" . $className;
        if(class_exists($class)){
            return new $class($params);
            //return serialize($class($params));
        }else {
            throw new \Exception("La clase $class no existe");
        }
    }
    /**
     * Función para parseo de un objeto Bean \To a un array
     * @override
     * @param string $bean
     * @param string $class
     * @return array 
     * @return boolean false si el objeto no puede regresar el arreglo
     */
    public static function parseBeanToArray($bean, $class) {
        if($bean instanceof $class && method_exists($bean, "getArray")){
            return $bean->getArray();
        }else{    
            return FALSE;
        }
    }
    /**
     * crea un string sha1 a partir de la fecha actual del sistema y numeros aleatorios
     * @return strring
     */
    public static function createToken() {
        return sha1(date('dmYHis') . rand(10000, 99999));
    }
    /**
     * Crea una llave generica separada por '-'
     * @return string
     */
    public static function createGenericsKey() {
        $date = new \DateTime();
        $cad0 = md5($date->getTimestamp() . rand(10000, 99999));
        return substr($cad0, 0, 8) . '-' . substr($cad0, 8, 4) . '-' . substr($cad0, 12, 4) . '-' . substr($cad0, 16, 4) . '-' . substr($cad0, 20, 12);
    }

    /**
     * parsea una cadena json a un array
     * @param string $json String en formato json
     * @return array regresa un arreglo asociativo
     */
    public static function parseJsonToArray($json) {
        return self::clearDataArray(json_decode($json, TRUE));
    }
    /**
     * Parsea un array a una cadena en formaro json
     * @param array $data un arreglo de datos
     * @return string regresa una cadena en formato json
     */
    public static function parseArrayToJson(array $data){
        return json_encode($data);
    }
    /**
     * regresa un string de numeros aleatorios de 11 caracteres
     * @return string
     */
    public static function createshortToken(){
        return substr(self::createToken(), 0,10);
    }
    /**
     * Funcion que desencripta password a partir de un tiken (semilla).
     * @deprecated since version 0.2
     * @param string $cypt
     * @param string $token
     */
    public function deencripaPassword($cypt, $token){
        $suma = 0;
        $pass = NULL;
        for($x = 0; $x < strlen($token); $x++){
            //suma += ord($token);
        }
    }
	/**
	 * Metodo para limpiar cualquier codigo maicioso que se introdusca.
         * @access public
         * @param array $data arreglo de los datos de los campos.
         * @return array array formateado.
	 */
	public static function clearDataArray(array $data){
		$keys = array_keys($data);
		for($i = 0; $i < count($keys); $i++) {
			$key = $data[$keys[$i]];
			if(is_array($data[$keys[$i]])){
				$data[$keys[$i]] = self::clearDataArray($data[$keys[$i]]);
				
			}else{
				$data[$keys[$i]] = strip_tags($key);
			}
		}
		return $data;
	}
}
?>