<?php

include('../../db/database.php');

use starFish\db\database\database;

try {

    $dbInstance = database::getInstance();
    $pdo = $dbInstance->connect();

    $sql = "INSERT INTO consumers (firstName, lastName, age)
    VALUES (:firstName, :lastName, :age); ";
    $stmt = $pdo->prepare($sql);

    $stmt->bindValue(":firstName", $_POST['firstName']);
    $stmt->bindValue(":lastName", $_POST['lastName']);
    $stmt->bindValue(":age", $_POST['age']);
    //Excecute
    $stmt->execute();

    $consumerId = $pdo->lastInsertId();

    $sql = "INSERT INTO addresses (address, consumer_id)
    VALUES (:address, :consumer_id);";
    $stmt = $pdo->prepare($sql);

    $stmt->bindValue(":address", $_POST['address']);
    $stmt->bindValue(":consumer_id", $consumerId);
    //Excecute
    $stmt->execute();

    header("Location: {$_SERVER['HTTP_REFERER']}");

} catch (\PDOException $e) {
    print_r("error: " . $e);
}

