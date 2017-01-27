<?php

require_once ('../Component/Bdd.php');
/**
 * Created by PhpStorm.
 * User: loic
 * Date: 24/01/2017
 * Time: 15:12
 */
abstract class Manager
{
    /**
     * @var BDD
     */
    protected $connection;

    public function __construct(BDD $connection)
    {
        $this->connection = $connection;
    }

    /**
     * @param $param
     *
     * @return mixed
     */
    abstract public function load($param);

    /**
     * @param $object
     *
     * @return mixed
     */
    abstract public function save($object);

    /**
     * @param $object
     *
     * @return mixed
     */
    abstract public function update($object);

}