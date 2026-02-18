<?php

namespace actions;

class logout
{
    public function logout()
    {
        $_SESSION = [];
        session_destroy();

        header('Location: /');
        exit;
    }
}

$logout = new logout();
$logout->logout();