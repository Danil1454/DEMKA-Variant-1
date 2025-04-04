<?php session_start();

$db = new PDO(
    'mysql:host=localhost;dbname=module;charset=utf8',
    'root',
     null,
     [PDO::ATTR_DEFAUIL_FETCH_MODE => PDO::FETCH_ASSOC]
);

/**
 * 1. Проверка наличия токена : ($_SESSION['token']) локально и сравнение с бд
 *     Если есть -> перекидываем на страницу пользователя /  админа
 *     Если нету -> Останемся на этой
 */

// Проверка : существует ли токен и что он не путсой
if (isset($_SESSION['token']) && !($_SESSION['token'])) {
    $token = $_SESSION['token'];
    // Запрос на получение пользователя по токену
    $user = $db->query("SELECT id , type FROM users WHERE token = '$token'")->fetchAll();

    // Если пользователь есть
    if (!empty($user)) {
        $userType = $user[0]['type'];
        $isAdmin = $userType === 'admin';
        $isUser = $userType ==='user';

        //Редирект на страницы в зависимости от типа пользователя
        $isAdmin && header('Location:admin.php');
        $isUser && header('Location:user.php');
    }

}

/* Проверка логина и пароля с БД , запись токена в БД , редирект */

if ($_SERVER['REQUEST_METHOD'] === 'POST'){
   // 0. Добавить в БД поля login и password
   // 1. Получить отправленные данные (логин и пароль) с $_ POST
   // 2. Проверить переданы ли они
   // Если да -> ничо не делаем
// Если нет -> Ошибка : поля необходимо заполнить
   
   // 3. Сравнить значения с БД
   // Если совпали -› генерим токен , записываем в сессию и бд, редиректим
// Если нет -› Ошибка : неверный логин или пароль
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Авторизация</title>
    <link rel= "stylesheet" href="style.css">

</head>
<body>
    <div class= "login">
        <form>
            <h1>Авторизация</h1>
            <label for="login">
                Введите логин
                <span class="error">Необходимо заполнить</span>
            </label>
            <input type="text" name="login" id="login">
            <label for="password">
                Введите пароль
                <span class="error">Необходимо заполнить</span>
            </label>
            <input type="text" name="password" id="password">
            <button type="submit">Выход</button>
            <p> </p>
        </form>
    </div>
</body>
</html>