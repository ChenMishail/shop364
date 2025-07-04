<?php session_start();?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8" />
    <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">
    <link rel="stylesheet" href="/css/login_styles.css">
    <title>Registration Form</title>

</head>
<body>
    <header class="header">
        <a href="#" class="logo"><i class='bx bx-basket'></i> ОНЛАЙН МАГАЗИН 364 ДНЯ</a>
    </header>
    <div class="wrapper">
        <h1>Регистрация</h1>
        <!-- Блок для вывода ошибок -->
        <?php if (isset($_SESSION['login_error'])): ?>
            <div class="error-message" style="color: red; margin-bottom: 15px;">
                <?php 
                    echo $_SESSION['login_error']; 
                    unset($_SESSION['login_error']); // Удаляем ошибку после показа
                ?>
            </div>
        <?php endif; ?>
        <p>Присоединяйтесь к нам!</p>
        <form action="/action/registration/" method="post" id="authForm">
            <input class="form_name" type="text" name="form-name" placeholder="Введите ваше имя" required>
            <input class="form_email" type="email" name="form-email" pattern="[^@\s]+@[^@\s]+\.[^@\s]+" title="Введите корректный email (например, user@example.com)" placeholder="Введите почту" required>
            <input class="form_password" type="password" autocomplete="off" name="form-password" placeholder="Придумайте пароль"  required>
        </form>
        <button type="submit" name="input_registration" class="button_form" form="authForm">
            Зарегистрироваться
        </button>
    </div> 
</body>
</html>