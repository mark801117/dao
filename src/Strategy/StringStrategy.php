<?php
namespace Dao\Strategy;

/**
 * 字串策略
 */
class StringStrategy
{
    /**
     * 清除字串中最後一個字元
     *
     * @param [type] $col
     * @return void
     */
    public static function clearLastChar($col)
    {
        return substr($col, 0, -1);
    }
}