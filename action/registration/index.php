<?php
session_start();
if (isset($_POST['input_registration'])){
    $form_name = test_input($_POST['form-name']);
    $form_email = test_input($_POST['form-email']);
    $form_password = test_input($_POST['form-password']);
}
//подключение базы данных
require_once $_SERVER['DOCUMENT_ROOT'] . '/connection-bd/connection-bd.php';

// Проверка почты в системе
$result = mysqli_query($conn_main, "SELECT id FROM authorization WHERE email = '$form_email'");
if (mysqli_num_rows($result) > 0) {
    echo "пользователь с такой почтой уже существует";
    exit();
}else{
    echo "ERROR" . $conn_main->error;
}

$sql = "INSERT INTO authorization (email, password, name) VALUES ('$form_email', '$form_password', '$form_name')";
if($conn_main->query($sql)){
    $user_id = $conn_main->insert_id;
    $_SESSION['user_id_session'] = $user_id;
    header("Location: /index.php");
    exit();    // прерываем работу скрипта, чтобы забыл о прошлом
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