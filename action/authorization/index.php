<?php
session_start();
if (isset($_POST['input_authorization'])){
    $form_email = test_input($_POST['form-email']);
    $form_password = test_input($_POST['form-password']);
}else {
    exit('Некорректный метод POST.');
}
//подключение базы данных
require_once $_SERVER['DOCUMENT_ROOT'] . '/connection-bd/connection-bd.php';
mysqli_set_charset($conn_main, "utf8");

$sql = "SELECT * FROM authorization WHERE email = '$form_email'";
$result = mysqli_query($conn_main, $sql);
// Проверка наличия почты
if(mysqli_num_rows($result) == 0){
    $_SESSION['login_error'] = "Неверная почта";
    header("Location: /page/authorization/");
    exit();
}
$row = $result->fetch_assoc();
$user_email = $row["email"];
$user_password = $row["password"]; // получаем хешированный пароль из базы
$user_name = $row["name"];
$user_id = $row["id"];   

// Сравнение пароля с хешем
if (password_verify($form_password, $user_password)) {
    // Если хеш устарел (например, изменился алгоритм), обновляем его
    if (password_needs_rehash($user_password, PASSWORD_DEFAULT)) {
        $new_hash = password_hash($form_password, PASSWORD_DEFAULT);
        mysqli_query($conn_main, "UPDATE authorization SET password = '$new_hash' WHERE id = $user_id");
    }
    
    $_SESSION['user_id_session'] = $user_id;
    header("Location: /index.php");
    exit();
} else {
    $_SESSION['login_error'] = "Неверный пароль";
    header("Location: /page/authorization/");
    exit();
}

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>