<?php
namespace Dao\Factory;

use Dao\Deleter;

class DeleteFactory
{
    /**
     * @var DeleteFactory|null
     */
    protected static $deleteFactory;

    public static function create($dbh) : Deleter
    {
        static::$deleteFactory = static::$deleteFactory ?? new Deleter($dbh);
        return static::$deleteFactory;
    }
}