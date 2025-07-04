<?php session_start();
if (!empty($_SESSION['user_id_session'])) {
    header("Location: /index.php");
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8" />
    <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">
    <link rel="stylesheet" href="/css/login_styles.css">
    <title>Login Form</title>

</head>
<body>
    <header class="header">
         <a href="#" class="logo"><i class='bx bx-basket'></i> ОНЛАЙН МАГАЗИН 364 ДНЯ</a>
    </header>
    <div class="wrapper">
        <h1>Здраствуйте</h1>
        <!-- Блок для вывода ошибок -->
        <?php if (isset($_SESSION['login_error'])): ?>
            <div class="error-message">
                <?php 
                    echo $_SESSION['login_error']; 
                    unset($_SESSION['login_error']); // Удаляем ошибку после показа
                ?>
            </div>
        <?php endif; ?>
        <p>С возвращенем!<br>
        Мы скучали по Вам!</p>
        <form action="/action/authorization/" method="post" id="authForm">
            <input type="email" class="form_email" name="form-email" pattern="[^@\s]+@[^@\s]+\.[^@\s]+" title="Введите корректный email (например, user@example.com)" placeholder="Введите почту или имя пользователя" required>
            <input type="password" class="form_password" name="form-password" placeholder="Введите пароль" required>
        </form>
        <button type="submit" name="input_authorization" class="button_form" form="authForm">Войти</button>
        <p class="or">Авторизоваться через социальные сети</p>
        <div class="icons">
            <i class="bx bxl-instagram"></i>
            <i class="bx bxl-facebook"></i>
            <i class="bx bxl-youtube"></i>
        </div>
        <div class="signup">
            Впервые здесь? <a href="/page/registration">Зарегистрируйтесь  здесь</a>
        </div>
    </div> 
</body>
</html>