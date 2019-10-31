<?php
namespace Dao;

use Dao\Strategy\StringStrategy;
use Dao\Tools\Params;
use Dao\Tools\Where;

class Updater extends BaseDao
{
    protected $params_handler;
    protected $where_handler;
    public function __construct($dbh)
    {
        parent::__construct($dbh);
        $this->params_handler = new Params();
        $this->where_handler = new Where($this->params_handler);
    }
    /**
     * 依照傳入的資料表, 欄位, 條件來更新資料表
     *
     * @param [type] $table
     * @param [type] $columns
     * @param [type] $where
     * @return void
     */
    public function run($table, $column_ary, $where_ary)
    {
        $this->params_handler->clear();
        $this->where_handler->clear();
        $column = '';
        foreach ($column_ary as $col => $val) {
            $bind = ":{$col}";
            $this->params_handler->push($bind, $val);
            $column .= " `{$col}` = {$bind},";
        }
        $column = StringStrategy::clearLastChar($column);

        foreach ($where_ary as $where) {
            $w_col = $where[0];
            $w_val = $where[1];
            $operator = isset($where[2]) ? $where[2] : '=';
            $this->where_handler->push($w_col, $w_val, $operator);
        }
        
        $this->params = $this->params_handler->get();
        $where = $this->where_handler->getWhereCondition();
        $sqlStr = "UPDATE `{$table}` SET {$column} WHERE 1 {$where}";
        $this->exec($sqlStr);
    }
}