<?php
declare(strict_types=1);

namespace App\Kernel;

class Config
{
    private static array $config = [];

    private static function getConfig(): array
    {
        return self::$config = require __DIR__ . '/../../app/config.php';
    }

    public static function getDbSettings(): array
    {
        return self::getConfig()['db'];
    }

    public static function getRouter(): array
    {
        return self::getConfig()['router'];
    }

    public static function getNavigation(): array
    {
        return self::getConfig()['navigation'];
    }
}



//DB_HOST = 'localhost';
//private const DB_PORT = '3306';
//private const DB_USER = 'homestead';
//private const DB_PASSWORD = 'secret';
//private const DB_NAME = 'electro';