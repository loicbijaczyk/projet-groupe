<?php

/**
 * Created by PhpStorm.
 * User: loic
 * Date: 25/01/2017
 * Time: 11:51
 */
class Friend
{
    private $id;
    private $name;
    private $screen_name;
    private $description;
    private $created_at;


    public function __construct($params = [])
    {

        if (!empty($params)) {
            foreach ($params as $key => $param) {
                if ($key == 'friend_id') {
                    $this->id = (int)$param;
                }
                if ($key == 'name') {
                    $this->name = $param;
                }
                if ($key == 'screen_name') {
                    $this->screen_name = $param;
                }
                if ($key == 'description'){
                    $this->description = $param;
                }
                if ($key == 'created_at'){
                    $this->created_at = $param;
                }
            }
        }
    }



    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getScreenName()
    {
        return $this->screen_name;
    }

    /**
     * @param mixed $screen_name
     */
    public function setScreenName($screen_name)
    {
        $this->screen_name = $screen_name;
    }

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param mixed $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     * @return mixed
     */
    public function getCreatedAt()
    {
        return $this->created_at;
    }

    /**
     * @param mixed $created_at
     */
    public function setCreatedAt($created_at)
    {
        $this->created_at = $created_at;
    }



}