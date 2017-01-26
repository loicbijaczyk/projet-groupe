<?php
require_once ('../Component/Bdd.php');
require_once ('Manager.php');
/**
 * Created by PhpStorm.
 * User: loic
 * Date: 23/01/2017
 * Time: 15:00
 */
class FriendListManager //extends Manager
{
    private $connection;
    const TABLE_FRIEND = 'friend';

    public function __construct(Bdd $connection)
    {
        $this->connection = $connection;
    }

    /**
     * @param $object
     */
    public function save($object)
    {
        $query = 'INSERT INTO ' . self::TABLE_FRIEND . " (friend_id, name, screen_name, description, created_at) VALUES (:friend, :name, :screen_name, :description, :created_at)";
//        var_dump($query);

//        $sth = $this->connection->prepare($query);
//        var_dump($sth);
//        $sth->bindValue('friend_id', $object->id );
//        $sth->bindValue('name', $object->name);
//        $sth->bindValue('screen_name', $object->screen_name);
//        $sth->bindValue('description', $object->description);
//        $sth->bindValue('created_at', $object->created_at);
//
//        return $sth->execute();

        $qb = $this->connection->createQueryBuilder();
        $qb->createInsertQuery(self::TABLE_FRIEND, [
            'friend_id'     => $object->getId(),
            'name'          => $object->getName(),
            'screen_name'   => $object->getScreenName(),
            'description'   => $object->getDescription(),
            'created_at'    => $object->getCreatedAt()
        ]);
//        var_dump($qb);
        $this->connection->execute($qb);
        return true;
    }

    /**
     * @param $param
     */
    public function load($param)
    {
        $qb = $this->connection->createQueryBuilder();
        $qb->createSelectQuery(self::TABLE_FRIEND);
        foreach ($param as $key => $val) {
            $qb->andWhere("$key = :$key");
            $qb->setParameter("$key, $val");
        }
//        var_dump($qb);
        $query = $this->connection->getResult($qb);
//        var_dump($query);
        $result = [];
        foreach ($query as $val){
            $result[] = new Friend($val);
        }
//var_dump($result);
        return $result;

    }
/*
 *
 */
    public function update($object)
    {

    }

}