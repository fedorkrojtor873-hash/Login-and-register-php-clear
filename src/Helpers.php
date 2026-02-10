<?php

namespace src;

session_start();

class Helpers
{
    public function redirect(string $url): bool
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
            'password_confirmation' => $_POST['password_confirmation'] ?? '',
            'avatar' => $_FILES['avatar'] ?? ''
        ];
    }

    public function validationErrorAttr(string $fieldName): void
    {
        echo isset($_SESSION['validation'][$fieldName]) ? 'aria-invalid="true" ' : '';
    }

    public function validationErrorMessage(string $fieldName): void
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

    public function clearValidationErrors(): void
    {
        $_SESSION['validation'] = [];
    }

    public function addOldValue(string $key, mixed $value): void
    {
        $_SESSION['oldValues'][$key] = $value;
    }


    public function getOldValue(string $key)
    {
        return $_SESSION['oldValues'][$key] ?? null;
    }

    public function clearOldValue(): void
    {
        $_SESSION['oldValues'] = [];
    }

    public function uploadFile(array $file, string $prefix = ''): string
    {
        $uploadPatch = __DIR__ . '/../uploads/';

        if (!is_dir($uploadPatch)) {
            mkdir($uploadPatch, 0755, true);
        }
        $extension = pathinfo($file['name'], PATHINFO_EXTENSION);

        $fileName = $prefix . time() . '.' . $extension;

        $path = "$uploadPatch/$fileName";

        if (!move_uploaded_file($file['tmp_name'], $path)) {
            die('Ошибка');
        }
        return $path;

    }
}