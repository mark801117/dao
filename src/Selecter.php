<?php
namespace Dao;

use PDO;

class Selecter extends BaseDao
{
    public function __construct($dbh)
    {
        parent::__construct($dbh);
    }
    public function find($sqlStr, $params = [], $fetch_type = PDO::FETCH_ASSOC)
    {
        $this->params = $params;
        $this->exec($sqlStr);
        $row = $this->fetch($fetch_type);
        $this->closecurSor();
        return $row;
    }
    public function findList($sqlStr, $params = [], $fetch_type = PDO::FETCH_ASSOC)
    {
        $this->params = $params;
        $this->exec($sqlStr);
        $rows = $this->fetchAll($fetch_type);
        $this->closecurSor();
        return $rows;
    }
    public function findPageList($sqlStr, $params = [], $fetch_type = PDO::FETCH_ASSOC)
    {
        $this->params = $params;
        $this->exec($sqlStr);
        $rows = $this->fetchAll($fetch_type);
        $this->closecurSor();
        $this->exec("SELECT FOUND_ROWS() AS `count`");
        $count = $this->fetchColumn(0);
        $this->closecurSor();
        return [
            'rows' => $rows,
            'count' => $count
        ];
    }
}