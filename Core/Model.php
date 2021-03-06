<?php

namespace Core;

use App\Config;
use PDO;
use PDOException;

abstract class Model 
{
    protected static function getDB()
    {
        static $db = null;
            
            try {

                $dsn = 'mysql:host=' .Config::DB_HOST . ';dbname=' . Config::DB_NAME . ';charset=utf8';

                $db = new PDO($dsn, Config::DB_USER, Config::DB_PASSWORD);

                // Throw an Exception
                $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                return $db;

            }catch(PDOException $e){
                echo $e->getMessage();
            }
    }
}