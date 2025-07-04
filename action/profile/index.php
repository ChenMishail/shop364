<?php
session_start();
if (empty($_SESSION['user_id_session'])) {
    header("Location: /index.php");
}

if (isset($_POST['input_profile'])){
    $form_password = test_input($_POST['form-password']);
    $form_name = test_input($_POST['form-name']);
}else {
    exit('Некорректный метод POST.');
}
//подключение базы данных
require_once $_SERVER['DOCUMENT_ROOT'] . '/connection-bd/connection-bd.php';

// изминяем имя пользователя
if($form_name != $user['name'])
$sql = "UPDATE authorization
SET name = '$form_name'
WHERE id = $_SESSION['user_id_session']";
if(!($conn_main->query($sql))){
    echo "ERROR" . $conn_main->error;
}

if (empty($form_password)) {
    header("Location: /index.php");
}

// Хеширование пароля
$hashed_password = password_hash($form_password, PASSWORD_DEFAULT);

// изминяем пароль пользователя
$sql = "UPDATE authorization
SET password = '$hashed_password'
WHERE id = $_SESSION['user_id_session']";
if($conn_main->query($sql)){
    header("Location: /index.php");
    exit();
}else{
    echo "ERROR" . $conn_main->error;
}

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>