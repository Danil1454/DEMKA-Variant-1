<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Изменение пароля</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="change-password">
        <form action="" method="POST">
            <h1>Изменение пароля</h1>
            <label for="old_password">
                <h2>Введите старый пароль</h2>
                <span class="error"> Необходимо заполнить</span>
            </label>
            <input type="password" name="old_password" id="old_password">
            <label for="new_password">
            <h2>Введите новый пароль</h2>
                
                <span class="error"> Необходимо заполнить</span>
            </label>
            <input type="password" name="new_password" id="new_password">
            <label for="confirm_password">
               <h2> Подтвердите новый пароль</h2>
            </label>
            <input type="password" name="confirm_password" id="confirm_password">
            <button type="submit" name="submit">Сохранить</button>
            <p> </p>
        </form>
    </div>
</body>
</html>
