<?php

namespace starFish\model\consumer;

include('db/database.php');

use starFish\db\database\database;

class Consumer
{

    public $firstName;
    public $lastName;
    public $age;

    public static function findAll()
    {
        try {
            $dbInstance = database::getInstance();
            $pdo = $dbInstance->connect();

            $stmt = $pdo->prepare("SELECT * FROM consumers ORDER BY id DESC");

            $stmt->execute();
            return $stmt->fetchAll(\PDO::FETCH_CLASS, self::class);
        } catch (\PDOException $e) {
            print_r("error: " . $e);
        }

    }

}