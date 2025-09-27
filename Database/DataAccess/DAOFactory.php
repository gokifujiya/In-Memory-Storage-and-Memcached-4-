<?php
namespace Database\DataAccess;

use Database\DataAccess\Implementations\ComputerPartDAOImpl;
use Database\DataAccess\Implementations\ComputerPartDAOMemcachedImpl;
use Database\DataAccess\Interfaces\ComputerPartDAO;

// If your project already has Helpers\Settings::env(), this will use it.
// If not, we safely fall back to getenv().
use Helpers\Settings;

class DAOFactory
{
    public static function getComputerPartDAO(): ComputerPartDAO
    {
        $driver = null;
        if (class_exists(Settings::class) && method_exists(Settings::class, 'env')) {
            $driver = Settings::env('DATABASE_DRIVER') ?? 'mysql';
        } else {
            $driver = getenv('DATABASE_DRIVER') ?: 'mysql';
        }

        return match (strtolower($driver)) {
            'memcached' => new ComputerPartDAOMemcachedImpl(),
            default     => new ComputerPartDAOImpl(), // mysql
        };
    }
}
