<?php

namespace Db;

use src\Helpers;

require_once('DataBase.php');

class MySQL
{

    protected DataBase $dataBase;

    public function __construct()
    {
        $this->dataBase = new DataBase();
    }


    public function storeUser(
        string $email,
        string $password,
        string $name,
        string $avatar
    ): bool
    {
        $connection = $this->dataBase->getConnection();

        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        $sql = "
        INSERT INTO users (name, email, password, avatar)
        VALUES (?, ?, ?, ?)
    ";

        $stmt = $connection->prepare($sql);

        if (!$stmt) {
            return false;
        }

        $stmt->bind_param(
            'ssss',
            $name,
            $email,
            $hashedPassword,
            $avatar
        );

        return $stmt->execute();
    }

}

$mysql = new MySQL();
