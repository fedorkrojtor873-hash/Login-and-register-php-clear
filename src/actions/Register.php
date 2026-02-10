<?php

namespace src\actions;

use src\Helpers;

require_once __DIR__ . '/../Helpers.php';


class Register
{

    protected Helpers $helper;

    public function __construct()
    {
        $this->helper = new Helpers();
    }

    protected function returnOldValueName(): void
    {
        $this->helper->addOldValue('name', $this->helper->getAllOfUsers()['name']);
    }

    protected function returnOldValueEmail(): void
    {
        $this->helper->addOldValue('email', $this->helper->getAllOfUsers()['email']);
    }

    public function validation(): void
    {
        $_SESSION['validation'] = [];


        if (empty($this->helper->getAllOfUsers()['name'])) {
            $this->helper->addValidationError('name', 'Введите имя');
        }

        if (!filter_var($this->helper->getAllOfUsers()['email'], FILTER_VALIDATE_EMAIL)) {
            $this->helper->addValidationError('email', 'Указана неправильная почта');
        }

        if (empty($this->helper->getAllOfUsers()['password'])) {
            $this->helper->addValidationError('password', 'Введите пароль');
        }
        if ($this->helper->getAllOfUsers()['password'] !== $this->helper->getAllOfUsers()['password_confirmation']) {
            $this->helper->addValidationError('password_confirmation', 'Пароли не совпадают');
        }

        $this->helper->addOldValue('name', $this->helper->getAllOfUsers()['name']);
        $this->helper->addOldValue('email', $this->helper->getAllOfUsers()['email']);


        $this->helper->redirect('/register.php');

    }
}

$register = new Register();
$register->validation();



