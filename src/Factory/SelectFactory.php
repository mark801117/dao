<?php
namespace Dao\Factory;

use Dao\Selecter;

class SelectFactory
{
    /**
     * @var SelectFactory|null
     */
    protected static $SelectFactory;

    public static function create($dbh) : Selecter
    {
        static::$SelectFactory = static::$SelectFactory ?? new Selecter($dbh);
        return static::$SelectFactory;
    }
}