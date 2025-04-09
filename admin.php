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
            <button class="logout-btn">Выход из аккаунта</button>
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
            <!-- Форма редактирования -->
            <div class="edit-user" style="display: none;">
                <h2>Редактировать пользователя</h2>
                <form id="editUserForm">
                    <!-- ID пользователя (скрытое поле) -->
                    <input type="hidden" name="userId">
                    <!-- Имя пользователя -->
                    <div class="field">
                        <input type="text" name="username" required>
                        <label>Имя пользователя</label>
                    </div>
                    <!-- Электронная почта -->
                    <div class="field">
                        <input type="email" name="email" required>
                        <label>Электронная почта</label>
                    </div>
                    <!-- Пароль -->
                    <div class="field">
                        <input type="password" name="password" required>
                        <label>Пароль</label>
                    </div>
                    <!-- Кнопка сохранения -->
                    <div class="field">
                        <input type="submit" value="Сохранить">
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- JavaScript -->
    <script>

        // Добавление нового пользователя
        document.getElementById('addUserForm').addEventListener('submit', function(event) {
            event.preventDefault();

            var username = document.querySelector('#addUserForm input[name="username"]').value;
            var email = document.querySelector('#addUserForm input[name="email"]').value;
            var password = document.querySelector('#addUserForm input[name="password"]').value;

            var newId = Math.floor(Math.random() * 1000);

            var newRow = document.createElement('tr');
            newRow.innerHTML = `
                <td>${newId}</td>
                <td>${username}</td>
                <td>${email}</td>
                <td><button class='edit-btn'>Редактировать</button><button class='delete-btn'>Удалить</button></td>`;
            
            document.getElementById('usersTbody').appendChild(newRow);
            document.getElementById('addUserForm').reset();
            addEventListenersToButtons();
        });

        // Функция для добавления обработчиков событий на кнопки
        function addEventListenersToButtons() {
            // Обработчик для кнопок "Редактировать"
            document.querySelectorAll('.edit-btn').forEach(button => {
                button.addEventListener('click', function() {
                    var row = button.parentNode.parentNode;       
                    var userId = row.children[0].textContent;
                    var username = row.children[1].textContent;
                    var email = row.children[2].textContent;
                    // Заполняем форму редактирования данными
                    document.querySelector('.edit-user input[name="userId"]').value = userId;
                    document.querySelector('.edit-user input[name="username"]').value = username;
                    document.querySelector('.edit-user input[name="email"]').value = email;
                    // Показываем форму редактирования
                    document.querySelector('.edit-user').style.display = 'block';
                });
            });
            // Обработчик для кнопок "Удалить"
            document.querySelectorAll('.delete-btn').forEach(button => {
                button.addEventListener('click', function() {
                    var row = button.parentNode.parentNode;
                    row.parentNode.removeChild(row);
                });
            });
        }
        // Сохранение изменений после редактирования
        document.getElementById('editUserForm').addEventListener('submit', function(event) {
            event.preventDefault();
            var userId = document.querySelector('#editUserForm input[name="userId"]').value;
            var username = document.querySelector('#editUserForm input[name="username"]').value;
            var email = document.querySelector('#editUserForm input[name="email"]').value;
            // Удаляем старую строку с этим ID
            var rows = document.querySelectorAll('#usersTable tbody tr');
            rows.forEach(row => {
                if (row.children[0].textContent === userId) {
                    row.parentNode.removeChild(row);
                }
            });
            // Добавляем обновленную строку в таблицу
            var updatedRow = document.createElement('tr');
            updatedRow.innerHTML = `
                <td>${userId}</td>
                <td>${username}</td>
                <td>${email}</td>
                <td><button class='edit-btn'>Редактировать</button><button class='delete-btn'>Удалить</button></td>`; 
            document.getElementById('usersTbody').appendChild(updatedRow);
            // Скрываем форму редактирования и очищаем её
            document.querySelector('.edit-user').style.display = 'none';
            addEventListenersToButtons();
        });
        // Обработчик для выхода из аккаунта
        document.querySelector('.logout-btn').addEventListener('click', function() {
            window.location.href = 'login.php';
        });
        // Инициализация обработчиков событий при загрузке страницы
        addEventListenersToButtons();
    </script>
</body>
</html>