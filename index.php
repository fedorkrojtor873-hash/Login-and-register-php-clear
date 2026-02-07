
<!DOCTYPE html>
<html lang="ru" data-theme="light">
<?php include_once __DIR__ . '/components/head.php'?>
<body>

<form class="card" action="" method="post">
    <h2>Вход</h2>



    <label for="email">
        Имя
        <input
            type="text"
            id="email"
            name="email"
            placeholder="ivan@areaweb.su"
            value="">
    </label>

    <label for="password">
        Пароль
        <input
            type="password"
            id="password"
            name="password"
            placeholder="******">
    </label>

    <button
        type="submit"
        id="submit"
    >Продолжить</button>
</form>

<p>У меня еще нет <a href="/register.php">аккаунта</a></p>
<?php include_once __DIR__ . '/components/scripts.php' ?>

</body>
</html>