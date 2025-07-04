<?php 
session_start();
if (empty($_SESSION['user_id_session'])) {
    header("Location: /page/authorization");
    exit();
}

require_once $_SERVER['DOCUMENT_ROOT'] . '/connection-bd/connection-bd.php';
$user_id = $_SESSION['user_id_session'];

$sql = "SELECT name, email FROM authorization WHERE id = $user_id";
$result = mysqli_query($conn_main, $sql);

if ($result && mysqli_num_rows($result) > 0) {
    $user = mysqli_fetch_assoc($result);
} else {
    $_SESSION['profile_error'] = "Ошибка загрузки данных пользователя";
    header("Location: " . $_SESSION['last_url']);
    exit();
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8" />
    <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">
    <link rel="stylesheet" href="/css/login_styles.css">
    <title>Change Personal Data</title>
</head>
<body>
    <header class="header">
         <a href="#" class="logo"><i class='bx bx-basket'></i> ОНЛАЙН МАГАЗИН 364 ДНЯ</a>
    </header>
    <div class="wrapper">
        <h1>Личные данные</h1>     
        <?php if (isset($_SESSION['profile_error'])): ?>
            <div class="error-message">
                <?php 
                    echo $_SESSION['profile_error']; 
                    unset($_SESSION['profile_error']);
                ?>
            </div>
        <?php endif; ?>       
        <form action="/action/profile/edit.php" method="post" id="profileForm">
            <input type="text" class="form_name" name="form-name" 
                   placeholder="Введите ваше имя" 
                   value="<?php echo htmlspecialchars($user['name']); ?>" required>
                   
            <input type="password" class="form_password" name="form-password" 
                   placeholder="Введите новый пароль">
        </form>      
        <button type="submit" name="input_profile" class="button_form" form="profileForm">
            Изменить данные
        </button> 
        <div class="signup">
            <a href="<?php echo $_SESSION['last_url'] ?? '/'; ?>">Вернуться назад</a>
        </div>
    </div> 
</body>
</html>