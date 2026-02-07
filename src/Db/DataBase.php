<?php

namespace Db;

class DataBase
{
    protected function getHost(): string
    {
        return 'localhost';
    }

    protected function getUserName(): string
    {
        return 'root';
    }

    protected function getPassword(): string
    {
        return '';
    }

    protected function getDatabaseName(): string
    {
        return 'crud';
    }

    public function getConnection()
    {
        $mysqli = mysqli_connect($this->getHost(), $this->getUserName(), $this->getPassword(), $this->getDatabaseName());
        if (!$mysqli) {
            die('Ошибка подключения: ' . mysqli_connect_error());
        }
        return $mysqli;
    }
}
