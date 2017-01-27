<?php
require_once ('../Component/Bdd.php');

/**
 * Created by PhpStorm.
 * User: loic
 * Date: 23/01/2017
 * Time: 15:00
 */
class FollowerListManager extends Manager
{

    const TABLE_FOLLOWER = 'follower';

//    public function __construct(Bdd $connection)
//    {
//        $this->conection = $connection;
//    }

    /**
     * @param Follower $follower
     */
    public function save(Follower $follower)
    {
    $qb = $this->conection->createQueryBuilder();
    $qb->createInsertQuery(self::TABLE_FOLLOWER, [
        'follower_id'   => $follower->getId(),
        'name'          => $follower->getName(),
        'screen_name'   => $follower->getScreenName(),
        'description'   => $follower->getDescription(),
        'created_at'    => $follower->getCreatedAt()
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


    }

    public function update(Follower $follower)
    {

    }

}