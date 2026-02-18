<?php

namespace src\actions;

use Db\MySQL;
use src\Helpers;

require_once __DIR__ . '/../Helpers.php';
require_once __DIR__ . '/../Db/MYSQL.php';


class register
{

    protected Helpers $helper;
    protected MySQL $mySQL;

    public function __construct()
    {
        $this->helper = new Helpers();
        $this->mySQL = new MySQL();
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

        if (!empty($this->helper->getAllOfUsers()['email'])) {
            if ($this->mySQL->checkEmail($this->helper->getAllOfUsers()['email'])) {
                $this->helper->addValidationError('email', 'Почта уже используется');
            }
        }

        if (empty($this->helper->getAllOfUsers()['password'])) {
            $this->helper->addValidationError('password', 'Введите пароль');
        }
        if ($this->helper->getAllOfUsers()['password'] !== $this->helper->getAllOfUsers()['password_confirmation']) {
            $this->helper->addValidationError('password_confirmation', 'Пароли не совпадают');
        }

        if (!empty($this->helper->getAllOfUsers()['avatar']['tmp_name'])) {
            $types = ['image/png', 'image/jpeg'];

            if (!in_array($this->helper->getAllOfUsers()['avatar']['type'], $types)) {
                $this->helper->addValidationError('avatar', 'Изображение профиля имеет не верный тип');
            }

            if ($this->helper->getAllOfUsers()['avatar']['size'] / 1000000 >= 1) {
                $this->helper->addValidationError('avatar', 'Изображение должно быть меньше одного мб');
            }
        }

        $this->helper->addOldValue('name', $this->helper->getAllOfUsers()['name']);
        $this->helper->addOldValue('email', $this->helper->getAllOfUsers()['email']);

    }

    public function register(): void
    {
        $this->validation();
        

        if (!empty($_SESSION['validation'])) {
            $this->helper->redirect('/register.php');
        }
        $password = Password_hash($this->helper->getAllOfUsers()['password'], PASSWORD_DEFAULT);
        $upload = $this->helper->uploadFile($this->helper->getAllOfUsers()['avatar'], 'avatar_');
        $this->mySQL->storeUser($this->helper->getAllOfUsers()['name'], $this->helper->getAllOfUsers()['email'] , $password, $upload);
        $this->helper->redirect('/');

    }

}

$register = new register();
$register->register();



