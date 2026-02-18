<?php

namespace actions;

use Db\MySQL;
use src\Helpers;

require_once "../Helpers.php";
require_once "../Db/MYSQL.php";

class login
{
    protected Helpers $helper;
    protected MySQL $mySQL;

    public function __construct()
    {
        $this->helper = new Helpers();
        $this->mySQL = new MySQL();
    }

    public function login()
    {
        $email = $_POST['email'];
        $password = $_POST['password'];
        $user = $this->mySQL->getAllByEmail($email);
        $passwordDb = $user['password'];


        if (empty($email)) {
            $this->helper->addValidationError('email', 'Введите почту');
        }

        if (empty($password)) {
            $this->helper->addValidationError('password', 'Введите пароль');
        }

        if (password_verify($password, $passwordDb)) {
            $this->helper->addValidationError('password', 'Неверный пароль');
        }

        if ($passwordDb === null) {
            $this->helper->addValidationError('email', 'Пользователь не найден');
        }


        $this->helper->addOldValue('email', $email);

        if (!empty($_SESSION['validation'])) {
            $this->helper->redirect('/');
        }

        $this->helper->setUserId($user['id']);

        $this->helper->redirect('/home.php');

    }
}

$login = new login();
$login->login();