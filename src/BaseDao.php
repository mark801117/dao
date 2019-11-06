<?php
namespace Dao;

use PDO;

/**
 * Description of BaseDao
 *
 * @author Cloud
 */
class BaseDao
{
    protected $dbh;
    protected $stmt;
    protected $params = array();
    public function __construct($dbh) 
    {
        $this->dbh = $dbh;
    }
    public function bindValue()
    {
        $params = $this->params;
        if (!empty($params)) {
            foreach ($params AS $param) {
                $this->stmt->bindValue($param[0], $param[1], $param[2]);
            }
        }
    }
    public function prepare($sqlStr)
    {
        $this->stmt=$this->dbh->prepare($sqlStr);
    }
    public function execute()
    {
        $this->stmt->execute();
    }
    public function closecurSor()
    {
        $this->stmt->closecurSor();
    }
    public function fetch($fetch_type)
    {
        return $this->stmt->fetch($fetch_type);
    }
    public function fetchAll($fetch_type)
    {
        return $this->stmt->fetchAll($fetch_type);
    }
    public function fetchColumn($col)
    {
        return $this->stmt->fetchColumn($col);
    }
    protected function exec($sqlStr)
    {
        $this->prepare($sqlStr);
        $this->bindValue();
        $this->execute();
    }
}
