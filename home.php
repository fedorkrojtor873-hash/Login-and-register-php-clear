<?php
session_start();
use actions\home;
include_once __DIR__ . "/src/actions/home.php";

$home = new home();
$user = $home->getUser();

?>
<!DOCTYPE html>
<html lang="ru" data-theme="light">
<?php include_once __DIR__ . '/components/head.php'?>
<body>

<div class="card home">
    <img
        class=""
        src="<?php echo $user['avatar']?>"
        alt=""
    >
    <h1>Привет, <?php echo $user['name'] ?>!</h1>
    <form action="src/actions/logout.php" method="post">
        <button role="button">Выйти из аккаунта</button>
    </form>
</div>


</body>
<?php include_once __DIR__ . '/components/scripts.php' ?>

</html>