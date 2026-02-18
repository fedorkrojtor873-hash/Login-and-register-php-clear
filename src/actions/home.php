<?php

namespace actions;

use Db\MySQL;

require_once __DIR__ . "/../Db/MySQL.php";


class home
{

    protected MySQL $mySQL;

    public function __construct()
    {
        $this->mySQL = new MySQL();
    }


    public function getUser()
    {
        if (!isset($_SESSION['user']['id'])) {
            header('Location: /');
            exit;
        }

        $id = $_SESSION['user']['id'];
        return $this->mySQL->getAllById($id);
    }


}



