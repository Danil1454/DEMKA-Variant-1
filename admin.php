<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="utf-8">
    <title>Администратор | Пользователи</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="wrapper">
        <div class="title">
            Панель администратора
        </div>
        <div class="admin-panel">
            <div class="users-list">
                <h2>Список пользователей</h2>
                <table id="usersTable">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Имя пользователя</th>
                            <th>Электронная почта</th>
                            <th>Действия</th>
                        </tr>
                    </thead>
                    <tbody id="usersTbody">
                        <!-- Данные пользователей будут выводиться здесь -->
                        <tr>
                            <td>1</td>
                            <td>Danil Slesarenko</td>
                            <td>danil@gmail.com</td>
                            <td>
                                <button class="edit-btn">Редактировать</button>
                                <button class="delete-btn">Удалить</button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="add-user">
                <h2>Добавить пользователя</h2>
                <form id="addUserForm">
                    <div class="field">
                        <input type="text" name="username" required>
                        <label>Имя пользователя</label>
                    </div>
                    <div class="field">
                        <input type="email" name="email" required>
                        <label>Электронная почта</label>
                    </div>
                    <div class="field">
                        <input type="password" name="password" required>
                        <label>Пароль</label>
                    </div>
                    <div class="field">
                        <input type="submit" value="Добавить">
                    </div>
                </form>
            </div>
            <div class="edit-user" style="display: none;">
                <h2>Редактировать пользователя</h2>
                <form action="#" method="POST">
                    <div class="field">
                        <input type="text" name="username" required>
                        <label>Имя пользователя</label>
                    </div>
                    <div class="field">
                        <input type="email" name="email" required>
                        <label>Электронная почта</label>
                    </div>
                    <div class="field">
                        <input type="password" name="password" required>
                        <label>Пароль</label>
                    </div>
                    <div class="field">
                        <input type="submit" value="Сохранить">
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        // JavaScript для добавления пользователей в таблицу
        document.getElementById('addUserForm').addEventListener('submit', function(event) {
            event.preventDefault(); // Отменяем стандартное поведение формы

            // Получаем значения из формы
            var username = document.querySelector('input[name="username"]').value;
            var email = document.querySelector('input[name="email"]').value;
            var password = document.querySelector('input[name="password"]').value;

            // Генерируем новый ID (в реальности это должно браться из базы данных)
            var newId = Math.floor(Math.random() * 1000);

            // Создаем новую строку таблицы
            var newRow = document.createElement('tr');
            newRow.innerHTML = `
                <td>${newId}</td>
                <td>${username}</td>
                <td>${email}</td>
                <td>
                    <button class="edit-btn">Редактировать</button>
                    <button class="delete-btn">Удалить</button>
                </td>
            `;

            // Добавляем новую строку в таблицу
            document.getElementById('usersTbody').appendChild(newRow);

            // Очищаем форму
            document.getElementById('addUserForm').reset();

            // Добавляем обработчики для новых кнопок редактирования и удаления
            document.querySelectorAll('.edit-btn').forEach(button => {
                button.addEventListener('click', function() {
                    document.querySelector('.edit-user').style.display = 'block';
                });
            });

            document.querySelectorAll('.delete-btn').forEach(button => {
                button.addEventListener('click', function() {
                    // Код для удаления строки таблицы
                    var row = button.parentNode.parentNode;
                    row.parentNode.removeChild(row);
                });
            });
        });

        // JavaScript для показа/скрытия формы редактирования
        document.querySelectorAll('.edit-btn').forEach(button => {
            button.addEventListener('click', function() {
                document.querySelector('.edit-user').style.display = 'block';
            });
        });

        // JavaScript для удаления строк таблицы
        document.querySelectorAll('.delete-btn').forEach(button => {
            button.addEventListener('click', function() {
                var row = button.parentNode.parentNode;
                row.parentNode.removeChild(row);
            });
        });
    </script>
</body>
</html>
