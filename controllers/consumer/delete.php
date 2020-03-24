<?php

include('../../db/database.php');

use starFish\db\database\database;

try {

    $dbInstance = database::getInstance();
    $pdo = $dbInstance->connect();

    $sql = "DELETE FROM consumers WHERE id = :id";
    $stmt = $pdo->prepare($sql);

    $stmt->bindValue(":id", $_POST['id']);
    //Excecute
    $stmt->execute();

    return json_encode(["status"=>201]);

} catch (\PDOException $e) {
    print_r("error: " . $e);
}
