<?php
namespace Dao\Factory;

use Dao\Inserter;

class InsertFactory
{
    /**
     * @var InsertFactory|null
     */
    protected static $insertFactory;

    public static function create($dbh) : Inserter
    {
        static::$insertFactory = static::$insertFactory ?? new Inserter($dbh);
        return static::$insertFactory;
    }
}