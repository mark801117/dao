<?php
namespace Dao\Tools;

class Where
{
    protected $params_handler;
    protected $where_condition = '';
    public function __construct(Params $params_handler)
    {
        $this->params_handler = $params_handler ?? new Params();
    }
    public function push($col, $val, $operator)
    {
        $bind = ":w_{$col}";
        $this->setWhereCondition($col, $bind, $operator);
        $this->setParams($bind, $val);
    }
    public function clear()
    {
        $this->where_condition = '';
    }
    public function getWhereCondition()
    {
        return $this->where_condition;
    }
    private function setWhereCondition($col, $bind, $operator)
    {
        $this->where_condition .= " AND `{$col}` {$operator} {$bind}";
    }
    private function setParams($bind, $val)
    {
        $this->params_handler->push($bind, $val);
    }
}