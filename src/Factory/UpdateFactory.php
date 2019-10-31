<?php
namespace Dao\Factory;

use Dao\Updater;

class UpdateFactory
{
    /**
     * @var UpdateFactory|null
     */
    protected static $updateFactory;

    public static function create($dbh) : Updater
    {
        static::$updateFactory = static::$updateFactory ?? new Updater($dbh);
        return static::$updateFactory;
    }
}