<?php

$login = filter_var(trim($_POST['login']), FILTER_SANITIZE_STRING); // Удаляет все лишнее и записываем значение в переменную //$login
$name = filter_var(trim($_POST['name']), FILTER_SANITIZE_STRING);
$pass = filter_var(trim($_POST['pass']), FILTER_SANITIZE_STRING);

if (mb_strlen($login) < 5 || mb_strlen($login) > 50) {
    echo 'Недопустимая длина логина';
    exit();
} elseif (mb_strlen($name) < 5) {
    echo 'Недопустимая длина имени.';
    exit();
} // Проверяем длину имени

password_hash(string $password, string|int|null $algo, array $options = []): string // Создаем хэш из пароля

$mysql = new mysqli(
    'localhost',
    'ghfjufqp_nutrition',
    '18Masha07',
    'ghfjufqp_nutrition'
);

$result1 = $mysql->query("SELECT * FROM `users` WHERE `login` = '$login'");
$user1 = $result1->fetch_assoc(); // Проверка на совпадение
if (!empty($user1)) {
    echo 'Данный логин уже используется!';
    exit();
}

header('Location: /');
exit();
?>
