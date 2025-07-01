<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8" />
    <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">
    <link rel="stylesheet" href="login_styles.css">
    <title>Login Form</title>

</head>
<body>
    <div class="wrapper">
        <h1>Регистрация</h1>
        <p>Присоединяйтесь к нам!</p>
        <form action="/action/registration/" method="post" id="authForm">
            <input class="form_name" type="text" name="form-name" placeholder="Введите ваше имя" required>
            <input class="form_email" type="email" name="form-email" placeholder="Введите почту" required>
            <input class="form_password" type="password" autocomplete="off" name="form-password" placeholder="Придумайте пароль"  required>
        </form>
        <button type="submit" name="input_registration" class="button_form" form="authForm">
            Зарегистрироваться
        </button>
    </div> 
</body>
</html>