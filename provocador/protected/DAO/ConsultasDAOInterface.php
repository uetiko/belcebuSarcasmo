<?php
namespace DAO;
/**
 *interface para las clases DAO genericas
 * @author Angel Barrientos <angel@pengostores.com>
 */
interface DAO_ConsultasDAOInterface {
    /**
     * 
     * @param Doctrine\ORM\EntityManager $em
     * @param array $tables
     */
    public function simpleQuery($em, $tables);
    /**
     * 
     * @param Doctrine\ORM\EntityManager $em
     * @param array $tables
     * @param array $params
     * @param array $conditions Description
     */
    public function query(Doctrine\ORM\EntityManager $em, array $tables, array $conditions);
    /**
     * 
     * @param Doctrine\ORM\EntityManager $em
     * @param arrar $tables
     */
    public function update(Doctrine\ORM\EntityManager $em, arrar $tables, array $conditions);
    /**
     * 
     * @param Doctrine\ORM\EntityManager $em
     * @param array $tables
     * @param array $conditions
     */
    public function delete(Doctrine\ORM\EntityManager $em, array $tables, array $conditions);
}

?>
