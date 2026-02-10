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

    public function checkEmail(string $email): bool
    {
        $connection = $this->dataBase->getConnection();


        $sql = "SELECT id FROM users WHERE email = '$email' LIMIT 1";

        $result = mysqli_query($connection, $sql);

        if (!$result) {
            return false; // ошибка запроса
        }

        return mysqli_num_rows($result) > 0;
    }

    public function storeUser(
        string $email,
        string $password,
        string $name,
        ?string $avatar
    )
    {
        return mysqli_query($this->dataBase->getConnection(),
            "INSERT INTO users (name, email ,password , avatar) VALUES ('$name', '$email' , '$password' , '$avatar')");
    }

}

