<?php

require_once ('QueryBuilder.php');
/**
 * Created by PhpStorm.
 * User: loic
 * Date: 23/01/2017
 * Time: 14:26
 */
class Bdd extends PDO
{
    const DB_HOST = 'localhost';
    const DB_NAME = 'twittertest';
    const DB_USER = 'root';
    const DB_PASS = '';

    public function __construct()
    {
        try {
            parent::__construct('mysql:host='.self::DB_HOST.';dbname='.self::DB_NAME, self::DB_USER, self::DB_PASS);

            $this->setAttribute(parent::ATTR_ERRMODE, parent::ERRMODE_EXCEPTION);
            //echo 'connection ok';
        } catch (\Exception $e) {
            die('Erreur : '.$e->getMessage());
        }
    }

    /**
     * @return QueryBuilder
     */
    public function createQueryBuilder()
    {
        return new QueryBuilder();
    }

    /**
     * @param QueryBuilder $qb
     *
     * @return array|bool
     */
    public function getSingleResult($qb)
    {
        $qb->setMaxResult(1);
        $array = $this->getResult($qb);

        if (!empty($array)) {
            return $array[0];
        }

        return false;
    }

    /**
     * @param QueryBuilder $qb
     *
     * @return array|bool
     */
    public function getResult(QueryBuilder $qb)
    {
        if ($query = $this->execute($qb)) {
            $result = [];
            while ($row = $query->fetch(parent::FETCH_ASSOC)) {
                $result[] = $row;
            }

            return $result;
        }

        return false;
    }

    /**
     * @param QueryBuilder $qb
     *
     * @return mixed
     */
    public function execute(QueryBuilder $qb)
    {
        $result = $this->prepare($qb->getQuery());
        foreach ($qb->getParameters() as $key => $val) {
            $result->bindValue($key, $val);
        }

        return ($result->execute()) ? $result : false;
    }

}