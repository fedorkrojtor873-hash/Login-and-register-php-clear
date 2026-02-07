<?php

namespace src\Actions;

use src\Helpers;

require_once __DIR__ . '/../Helpers.php';


class Register
{

    protected Helpers $helper;

    public function __construct()
    {
        $this->helper = new Helpers();
    }

    public function validation()
    {

        $_SESSION['validation'] = [];


        if (empty($this->helper->getAllOfUsers()['name'])) {
           $_SESSION['validation']['name'] = 'Неверное имя';

        }

        if (!empty($_SESSION['validation'])) {
            $this->helper->redirect('/register.php');
        }

    }
}

$register = new Register();
$register->validation();



