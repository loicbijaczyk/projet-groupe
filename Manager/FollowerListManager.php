<?php
require_once ('../Component/Bdd.php');

/**
 * Created by PhpStorm.
 * User: loic
 * Date: 23/01/2017
 * Time: 15:00
 */
class FollowerListManager //extends Manager
{

    private $connection;
    const TABLE_FOLLOWER = 'follower';

    public function __construct(Bdd $connection)
    {
        $this->connection = $connection;
    }

    /**
     * @param $object
     */
    public function save($object)
    {
    $qb = $this->connection->createQueryBuilder();
    $qb->createInsertQuery(self::TABLE_FOLLOWER, [
        'follower_id'   => $object->getId(),
        'name'          => $object->getName(),
        'screen_name'   => $object->getScreenName(),
        'description'   => $object->getDescription(),
        'created_at'    => $object->getCreatedAt(),
        'location'      => $object->getLocation()
        ]);

    $this->connection->execute($qb);

    }

    public function load($param)
    {
        $qb = $this->connection->createQueryBuilder();
        $qb->createSelectQuery(self::TABLE_FOLLOWER);
        foreach ($param as $key => $val) {
            $qb->andWhere("$key = :$key");
            $qb->setParameter("$key, $val");
        }
//        var_dump($qb);
        $query = $this->connection->getResult($qb);
//        var_dump($query);
        $result = [];
        foreach ($query as $val){
            $result[] = new Follower($val);
        }
//var_dump($result);
        return $result;

    }

    public function update($object)
    {

    }

}