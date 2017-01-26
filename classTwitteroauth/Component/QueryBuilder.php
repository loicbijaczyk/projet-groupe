<?php



/**
 * Class QueryBuilder
 * @package Component
 * @author  Boris MALEZYK <boris.malezyk@agenda-journalistes.com>
 *
 */
class QueryBuilder
{
    protected $query      = null;
    protected $parameters = [];

    /**
     * @param $table
     */
    public function createSelectQuery($table)
    {
        $this->query = "SELECT * FROM ".$table." WHERE 1=1";
    }

    public function andWhere($params)
    {
        $this->query .= " AND $params";
    }

    public function orWhere($params)
    {
        $this->query .= "OR $params";
    }

    /**
     * @return null
     */
    public function getQuery()
    {
        return $this->query;
    }

    /**
     * @param null $query
     */
    public function setQuery($query)
    {
        $this->query = $query;
    }

    /**
     * @return array
     */
    public function getParameters()
    {
        return $this->parameters;
    }

    /**
     * @param $int
     */
    public function setMaxResult($int)
    {
        $this->query .= " LIMIT $int";
    }

    /**
     * @param       $table
     * @param array $fields
     */
    public function createInsertQuery($table, array $fields)
    {
        $params = array_keys($fields);
        $this->setParameters($fields);
        $this->query = "INSERT INTO $table (".implode($params, ',').") VALUES (:".implode($params, ',:').")";
    }

    /**
     * @param array $params
     */
    public function setParameters(array $params)
    {
        $this->parameters = $params;
    }

    /**
     * @param       $table
     * @param array $fields
     */
    public function createUpdateQuery($table, array $fields, $id)
    {
        $query  = "UPDATE $table SET ";
        $params = array_keys($fields);
        $this->setParameters($fields);
        $last_key = count($params) - 1;
        foreach ($params as $key => $param) {
            $query .= $param.' = :'.$param;
            if ($last_key != $key) {
                $query .= ', ';
            }
        }
        $query .= ' WHERE id = :id';
        $this->setParameter('id', $id);
        $this->query = $query;

    }

    /**
     * @param $key
     * @param $param
     */
    public function setParameter($key, $param)
    {
        $this->parameters[$key] = $param;
    }
}
