<?php

namespace starFish\model\address;

require_once('db/database.php');

use starFish\db\database\database;

class Address
{

    public $address;
    public $consumer_id;

    public static function findWithConsumerId($consumerId)
    {

        try {
            $dbInstance = database::getInstance();
            $pdo = $dbInstance->connect();

            $stmt = $pdo->prepare("SELECT * FROM addresses WHERE consumer_id = :consumer_id ORDER BY id DESC");
            $stmt->bindValue(":consumer_id", $consumerId);

            $stmt->execute();
            return $stmt->fetchAll(\PDO::FETCH_CLASS, self::class);
        } catch (\PDOException $e) {
            print_r("error: " . $e);
        }

    }

}