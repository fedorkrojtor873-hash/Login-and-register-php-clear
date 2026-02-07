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
    public function validationErrorAttr(string $fieldName)
    {
        echo isset($_SESSION['validation'][$fieldName]) ? 'aria-invalid="true" ' : '';
    }

    public function validationErrorMessage(string $fieldName)
    {
         echo $_SESSION['validation'][$fieldName] ?? '';
    }

    public function hasValidationError(string $fieldName): bool
    {
        return isset($_SESSION['validation'][$fieldName]);
    }
    public function addValidationError(string $fieldName, string $message)
    {
        $_SESSION['validation'][$fieldName] = $message;
    }
    public function clearValidationErrors()
    {
        $_SESSION['validation'] = [];
    }

    public function addOldValue(string $key, mixed $value)
    {
       $_SESSION['oldValues'][$key] = $value;
    }



    public function getOldValue(string $key)
    {
        return $_SESSION['oldValues'][$key] ?? null;
    }
    public function clearOldValue(string $key): void
    {
        $_SESSION['oldValues'][$key] = [];
    }
}