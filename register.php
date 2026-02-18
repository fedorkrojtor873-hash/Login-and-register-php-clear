<?php

use src\Helpers;

require_once __DIR__ . "/src/Helpers.php";

$helper = new Helpers();

?>

<!DOCTYPE html>
<html lang="ru" data-theme="light">
<?php include_once __DIR__ . '/components/head.php' ?>
<body>

<form class="card" action="src/actions/register.php" method="post" enctype="multipart/form-data">
    <h2>Регистрация</h2>

    <label for="name">
        Имя
        <input
                type="text"
                id="name"
                name="name"
                placeholder="Иванов Иван"
                <?php $helper->validationErrorAttr('name'); ?>
                value="<?php echo $helper->getOldValue('name'); ?>">
        <?php if ($helper->hasValidationError('name')): ?>
            <small><?php $helper->validationErrorMessage('name'); ?></small>
        <?php endif; ?>
    </label>

    <label for="email">
        E-mail
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

    <label for="avatar">Изображение профиля
        <input
                type="file"
                id="avatar"
                name="avatar"
                <?php $helper->validationErrorAttr('avatar'); ?>
        >
        <?php if ($helper->hasValidationError('avatar')): ?>
            <small><?php $helper->validationErrorMessage('avatar'); ?></small>
        <?php endif; ?>
    </label>

    <div class="grid">
        <label for="password">
            Пароль
            <input
                    type="password"
                    id="password"
                    name="password"
                    placeholder="******"
            <?php $helper->validationErrorAttr('password'); ?>
            >
            <?php if ($helper->hasValidationError('password')): ?>
                <small><?php $helper->validationErrorMessage('password'); ?></small>
            <?php endif; ?>
        </label>

        <label for="password_confirmation">
            Подтверждение
            <input
                    type="password"
                    id="password_confirmation"
                    name="password_confirmation"
                    <?php $helper->validationErrorAttr('password_confirmation'); ?>
                    placeholder="******">
            <?php if ($helper->hasValidationError('password_confirmation')): ?>
                <small><?php $helper->validationErrorMessage('password_confirmation'); ?></small>
            <?php endif; ?>
        </label>
    </div>

    <fieldset>
        <label for="terms">
            <input
                    type="checkbox"
                    id="terms"
                    name="terms"
            >
            Я принимаю все условия пользования
        </label>
    </fieldset>

    <button
            type="submit"
            id="submit"
            disabled
    >Продолжить
    </button>
</form>
<?php
$helper->clearValidationErrors();
$helper->clearOldValue();
?>
<p>У меня уже есть <a href="/">аккаунт</a></p>
</body>
<?php include_once __DIR__ . '/components/scripts.php' ?>

</html>