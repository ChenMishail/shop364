<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/module/last_user.php';
// Подключаемся к базе данных
require_once $_SERVER['DOCUMENT_ROOT'] . '/connection-bd/connection-bd.php';
$user_id = $_SESSION['user_id_session'];

// Запрашиваем данные о пользователе из базы
$sql = "SELECT name, password FROM authorization WHERE id = $user_id";
$result = mysqli_query($conn_main, $sql);

if (!$result || mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
} else {
    echo "Пользователь с ID $user_id не найден";
}

$row = mysqli_fetch_assoc($result);
$nickname = htmlspecialchars($row['name'] ?? 'Гость'); // Защита от XSS
?>
    <form action="/action/profile/edit.php" method="post" id="authForm">
            <input class="form_name" type="text" name="form-name" placeholder="Введите ваше имя" value="<?php echo htmlspecialchars($user['name']); ?>" required>
            <input class="form_password" type="password" autocomplete="off" name="form-password" placeholder="Введите новый пароль">
    </form>
    <button type="submit" name="input_profile" class="button_form" form="authForm">