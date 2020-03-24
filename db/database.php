<?php

namespace starFish\db\database;

include('config.php');

use starFish\db\config;
use \PDO;


class Database
{

    private static $_instance = null;

    private $host;
    private $port;
    private $database;
    private $user;
    private $password;

    private function __construct()
    {
        $this->host = config\DB_HOST;
        $this->port = config\DB_PORT;
        $this->database = config\DB_DATABASE;
        $this->user = config\DB_USER;
        $this->password = config\DB_PASSWORD;
    }

    public static function getInstance()
    {
        if (!self::$_instance) {
            self::$_instance = new Database();
        }
        return self::$_instance;
    }

    public function connect()
    {
        try {
            $conn = new PDO('mysql:host=' . $this->host . ';dbname=' . $this->database . ';port=' . $this->port, $this->user, $this->password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $conn;
        } catch (\Exception $e) {
            return "error: " . $e;
        }
    }

}