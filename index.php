<?php

use src\Helpers;

require_once __DIR__ . "/src/Helpers.php";

$helper = new Helpers();

?>
<!DOCTYPE html>
<html lang="ru" data-theme="light">
<?php include_once __DIR__ . '/components/head.php'?>
<body>

<form class="card" action="src/actions/login.php" method="post">
    <h2>Вход</h2>

    <label for="email">
        Email
        <input
            type="text"
            id="email"
            name="email"
            placeholder="email@gmail.com"
            <?php $helper->validationErrorAttr('email'); ?>
            value="<?php echo $helper->getOldValue('email'); ?>">
        <?php if ($helper->hasValidationError('email')): ?>
            <small><?php $helper->validationErrorMessage('email'); ?></small>
        <?php endif; ?>
    </label>

    <label for="password">
        Пароль
        <input
            type="password"
            id="password"
            name="password"
            placeholder="******"
        <?php $helper->validationErrorAttr('password'); ?> >
        <?php if ($helper->hasValidationError('password')): ?>
            <small><?php $helper->validationErrorMessage('password'); ?></small>
        <?php endif; ?>
    </label>

    <button
        type="submit"
        id="submit"
    >Продолжить</button>
</form>

<p>У меня еще нет <a href="/register.php">аккаунта</a></p>
<?php include_once __DIR__ . '/components/scripts.php' ?>
<?php
$helper->clearValidationErrors();
$helper->clearOldValue();
?>
</body>
</html>