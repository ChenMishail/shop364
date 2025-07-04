<?php
session_start();
if (empty($_SESSION['user_id_session'])) {
    header("Location: /index.php");
}
// Подключаемся к базе данных
require_once $_SERVER['DOCUMENT_ROOT'] . '/connection-bd/connection-bd.php';
$user_id = $_SESSION['user_id_session'];

// Запрашиваем данные о пользователе из базы
$sql = "SELECT name, password FROM authorization WHERE id = $user_id";
$result = mysqli_query($conn_main, $sql);

if (!$result || mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    $name = $row['name'];
} else {
    echo "Пользователь с ID $user_id не найден";
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
if(strcmp($form_name, $name) != 0){
    $sql = "UPDATE authorization SET name = '$form_name' WHERE id = $user_id";
    if(!($conn_main->query($sql))){
        echo "ERROR" . $conn_main->error;
    }
}

if(trim($form_password) === '') {
    header("Location: /index.php");
    exit();
}

// Хеширование пароля
$hashed_password = password_hash($form_password, PASSWORD_DEFAULT);

// изминяем пароль пользователя
$sql = "UPDATE authorization
SET password = '$hashed_password'
WHERE id = $user_id";
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