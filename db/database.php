<?php

namespace starFish\db\database;

use starFish\db\config;
use \PDO;


class database
{

    private $host;
    private $port;
    private $database;
    private $user;
    private $password;

    protected function __construct()
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
            self::$_instance = new self();
        }
        return self::$_instance;
    }

    public function connect()
    {
        try {
            return new \PDO('mysql: host=' . $this->host . ';dbname=' . $this->database . ';port=' . $this->port, $this->user, $this->password);
        } catch (\Exception $e) {
            return $e;
        }
    }

}