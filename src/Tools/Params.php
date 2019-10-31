<?php
namespace Dao\Tools;
use PDO;

class Params
{
    protected $item = array();
    public function __construct()
    {
    }
    public function push($bind, $val)
    {
        $type = $this->getValType($val);
        $this->item[] = [$bind, $val, $type];
    }
    public function get()
    {
        return $this->item;
    }
    public function clear()
    {
        $this->item = [];
    }
    private function getValType($val)
    {
        return is_numeric($val) ? PDO::PARAM_INT : PDO::PARAM_STR;
    }
}