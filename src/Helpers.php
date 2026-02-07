<?php

namespace src;

session_start();
class Helpers
{
    public function redirect(string $url)
    {
        header("Location: $url");
        die();
    }

    public function getAllOfUsers(): array
    {
        return [
            'name' => $_POST['name'] ?? '',
            'email' => $_POST['email'] ?? '',
            'password' => $_POST['password'] ?? '',
            'password_confirmation' => $_POST['password_confirmation'] ?? ''
        ];
    }
    public function mayBeHasError(string $fieldName)
    {
        echo isset($_SESSION['validation'][$fieldName]) ? 'aria-invalid="true" ' : '';
    }

    public function getErrorMessage(string $fieldName)
    {
         echo $_SESSION['validation'][$fieldName] ?? '';
    }
}