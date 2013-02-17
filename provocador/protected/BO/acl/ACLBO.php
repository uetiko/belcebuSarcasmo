<?php
/**
 * 
 * @package \BO\acl
 * @uses Zend\Permissions\Acl 
 * @uses Zend\Permissions\Acl\Role\GenericRole 
 * @uses Zend\Permissions\Acl\Resource\GenericResource 
 */
namespace BO\acl;
use Zend\Permissions\Acl,
 Zend\Permissions\Acl\Role\GenericRole as Role,
 Zend\Permissions\Acl\Resource\GenericResource as Resource;
class ACLBO extends \Zend\Permissions\Acl{
    //const DEFAUTL_ROLE = "usuario";
    private $roles;
    private $conf;
    function __construct() {
        $this->conf = \Config\ACLConfig::getInstance();
        $this->roles = $this->conf['acl']['rol'];
    }
    

}
?>
